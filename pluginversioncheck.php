<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

include("includes/db.php");

$debug=isset($_GET["debug"]) ? $_GET["debug"] : 0;
#$debuglimit="LIMIT 2";

/* Set params */
$pathtocvs = "./cvssrc/";
$modules = array( # cvs modules and viewcvs suffixes
  "org.eclipse.emf" => "?cvsroot=Tools_Project", 
  "org.eclipse.emf.ecore.sdo" => "?cvsroot=Tools_Project", 
  "org.eclipse.xsd" => "?cvsroot=Tools_Project");
$manifs = array(
	"MANIFEST.MF" => array("", "Bundle-Version: (\d+\.\d+\.\d+)\.qualifier", ""), # patterns to search for: start-searching, find-version, end-searching
	"feature.xml" => array("<feature", "version=\"(\d+\.\d+\.\d+)\.qualifier\"", ">"));
$replacements = array("/cvsroot/tools/",",v"); # list of strings to scrub from results

$startdate="2006-06-27 10:57"; # date of last major release
$targetVersion = "2.2.1"; # version of current release

/* Assemble query */

$sql = "SELECT cvsfiles.cvsname, MAX(commits.date) FROM cvsfiles,commits WHERE cvsfiles.fid = commits.fid ";
$sql .= "AND cvsfiles.cvsname NOT LIKE '%/Attic/%' ";
$sql .= "AND commits.date >= '$startdate' ";
$sql .= "AND (";
$sql_tmp = "";
foreach ($modules as $mod => $cvsrootsuffix) { 
  foreach ($manifs as $manif => $v) { 
    if ($sql_tmp) { $sql_tmp .= "OR "; }
    $sql_tmp .= "cvsfiles.cvsname LIKE '%$mod/%/$manif,v' ";
  }
}
$sql .= $sql_tmp . ") GROUP BY cvsfiles.cvsname"; $sql_tmp = null;
#if ($debug) { print_r ("Query: \n"); print_r (preg_replace("/(OR|AND|WHERE)/","\n$1",$sql)); print_r ("\n"); }

/* Run query */

$files = array();
$result = wmysql_query($sql . $debuglimit);
while ($row = mysql_fetch_row($result))
{
 foreach ($replacements as $replacement) { $row[0] = str_replace($replacement,"",$row[0]); }
 if ($row[0]) 
 {
   foreach ($manifs as $m => $v)
   { 
     if (false!==strpos($row[0],$m)) { 
       if (!array_key_exists($m,$files) || !is_array($files[$m])) { $files[$m] = array(); }
       array_push($files[$m],$row); 
     }
   }
 }
}

mysql_close($connect);
#if ($debug) { print date("[H:i:s] "); print ("Files: \n"); print_r ($files); }

/* Check files */

foreach ($files as $m => $filegroup)
{
  foreach ($filegroup as $a => $filearray) 
  {
    $filecontents = file($pathtocvs.$filearray[0]);
    array_push($files[$m][$a],$targetVersion); # load target version into array
    $i=0;
    foreach ($filecontents as $linenum => $line)
    {
      $matchPattern = $manifs[$m][$i];
      $match=null;
      if (!$matchPattern) { $i++; $matchPattern = $manifs[$m][$i]; }
      #if ($debug) { print ("$filearray[0] - $linenum: $i :: $matchPattern\n"); }
      preg_match("/".$matchPattern."/",$line,$match);
      if ($match && $i===0 && $match[0] === $matchPattern) { # look for pattern which defines where to search for a version string
        #if ($debug) { echo "$matchPattern == ".$match[0]."\n"; }
        $i++; 
      }
      else
      {
        if ($match && $i===1 && $match[1] === $targetVersion) { # look for a version string - version is as expected (match)
          #if ($debug) { print ("!! ".$match[1])." !!\n"; }
          array_push($files[$m][$a],$match[1]); break;
        }
        else if ($match && $i===1 && $match[1] !== $targetVersion) { # look for a version string - version is different than expected
          #if ($debug) { print ("?? ".$match[1])." ??\n"; }
          array_push($files[$m][$a],$match[1]." ?"); break;
        }
        #if ($debug) { print ("* $line\n"); }
        if ($i===1 && sizeof($manifs[$m])>2 && $manifs[$m][2] && preg_match("/".$manifs[$m][2]."/",$line)) { break; } # look for pattern which defines where to give up
      }
    }
    if (sizeof($files[$m][$a])==2) {
      array_push($files[$m][$a],"???");
    }
  }
}

$count=0;
foreach ($files as $m => $filegroup)
{
  $count += sizeof($filegroup);
}

if ($debug) { print date("[H:i:s] "); print ("Versions: \n"); print_r ($files); }

/* Produce HTML */

$output = '
<div id="container"><div id="midcolumn">


<div class="homeitem3col">
	<h3>Search</h3>
	<div id="searchdiv">
		<form action="searchcvs.php" method="get">
			<input type="text" size="60" id="q" name="q" value=""/>
			<input type="submit" value="Go!"/>
		</form>
	</div>
</div>

<div class="homeitem3col">
<h3><span>'.$count.' changes to '.$targetVersion.' since '.$startdate.'</span>Showing results for ';
$i=0;
foreach ($modules as $mod => $c) { 
 if ($i>0) { $output .= ", "; }
 $output .= $mod; $i++;
} 
$output .='</h3>

</div>

<div class="homeitem3col">
<ul>
';

foreach ($files as $m => $filegroup)
{
  foreach ($filegroup as $a => $filearray)
  {
    foreach ($modules as $mod => $cvsrootsuffix) { 
      if (false!==strpos($filearray[1],$mod)) { $suf = $cvsrootsuffix; break; }
    }
    $output .= '<li><div>'.$filearray[1].'</div>';
    $output .= ' <a href="http://www.eclipse.org/emf/searchcvs.php?q=file%3A'.urlencode($filearray[0]).'">'.$filearray[0].'</a>';
    $output .= ' (<a href="http://dev.eclipse.org/viewcvs/index.cgi/*checkout*/'.$filearray[0].$suf.'">CVS</a>)'."\n";
    $output .= ' <ul><li>Expected: '.$filearray[2].', Actual: <span class="'.(false!==strpos($filearray[3],"?")?"warning":"").'">'.$filearray[3].'</span></li></ul>'."\n";
    $output .= '</li>'."\n";
  }
}

$output .= '</ul>
</div>


</div></div>
';

?>
<div id="rightcolumn"></div>
<?php

print $output;
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - Plugin/Feature Version Check";
$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/searchcvs.css"/>' . "\n");
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/pluginversioncheck.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>
