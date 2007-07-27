<?php 

	// $Id: scripts.php,v 1.26 2007/07/27 16:20:12 nickb Exp $ 
	$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
	$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
	$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));

	function getPWD($suf="") {
		$PWD="";
		global $_SERVER, $isEMFserver, $isWWWserver, $isEclipseCluster, $App;

		$debug_echoPWD=1; // set 0 to hide (for security purposes!)

		//dynamic assignments
		$PWD = preg_replace("/(.+\/)scripts\/[^\/]+\.php/","$1",$_SERVER["SCRIPT_FILENAME"]); // strip php filename from path 
		$PWD = $PWD.$suf;

		if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { echo "<!-- Found[1dyn]: PWD -->"; $debug_echoPWD=0; }

		//static assignments
		
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			if ($_SERVER["HTTP_HOST"]=="emf.torolab.ibm.com" || $_SERVER["HTTP_HOST"]=="emf") {
				$PWD = "/home/www-data/build/emf/tools/emf/downloads/drops"; 
			} else if ($isEclipseCluster) {
				$PWD = $App->getDownloadBasePath() . "/tools/emf/".$suf;
			} else if ($_SERVER["HTTP_HOST"]=="fullmoon.torolab.ibm.com") {
				$PWD = "/home/www/tools/emf/".$suf; 
			}
		}

		if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { echo "<!-- Found[2stat]: PWD -->"; $debug_echoPWD=0; }

		//try a default guess: /home/www, two options
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			$PWD = $App->getDownloadBasePath(); 
			if (is_dir($PWD) && is_readable($PWD)) { 
				// try 1:
				$PWD = $App->getDownloadBasePath() . "/tools/emf/".$suf; // default path

				if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
					if ($debug_echoPWD ) { echo "<!-- Found[3def-a]: PWD -->"; $debug_echoPWD=0; }
				} else {
					// try 2:
					$PWD = "/home/www/eclipse/tools/emf/".$suf; // default path
					if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
						if ($debug_echoPWD ) { echo "<!-- Found[3def-b]: PWD -->"; $debug_echoPWD=0; }
					}
				}
			}
		}

		//try a second default guess: /var/www, two options
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			$PWD = "/var/www/"; 
			if (is_dir($PWD) && is_readable($PWD)) { 
				// try 1:
				$PWD = "/var/www/tools/emf/".$suf; // default path

				if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
					if ($debug_echoPWD) { echo "<!-- Found[4def-a]: PWD -->"; $debug_echoPWD=0; }
				} else {
					// try 2:
					$PWD = "/var/www/eclipse/tools/emf/".$suf; // default path
					if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
						if ($debug_echoPWD) { echo "<!-- Found[4def-b]: PWD -->"; $debug_echoPWD=0; }
					}
				}
			}
		}

		if ($PWD=="" || !is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			echo "<!-- PWD not found! -->";
		}

		//okay, give up
		/*if ($PWD=="" || !is_dir($PWD) || !is_readable($PWD)) { 
				$dir = $PWD;
				echo "<p> Directory ($dir) <b>".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))."</b> on mirror: <b>".$_SERVER["HTTP_HOST"]."</b>! </p>";
				echo "<p> Please report this error to <a href=\"mailto:codeslave@ca.ibm.com?Subject=Directory ($dir) ".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))." in scripts.php::getPWD() on mirror ".$_SERVER["HTTP_HOST"]."\">codeslave@ca.ibm.com</a>, or make directory readable. </p>";
				exit;
		}*/

		return $PWD;
	}

	// load a directory into an array of filenames or subdir names
	//usage: getDirList("./some-folder/","(\.html)","f"); // get files
	//usage: getDirList("./some-folder/","(folderExt)","d"); // get dirs
	function loadDir($dir,$ext,$type) {	// 2D array, not 1D
		//$index=0;
		$stuff = array();
		if (is_dir($dir)) { 
			// FIXED FEB 04 - must use krsort on returned dirs to sort by KEY, not VALUE
			//$i=0;
			$handle=opendir($dir);
			while (($file = readdir($handle))!==false) {
				//echo $file;
			  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $type=="f") { 
				  $i=filemtime("$dir/$file"); // new, Jan 3
					  $stuff[substr($file,0,1)]["f".$i] = "$file"; 
				  //$index++;
				  //w("$index, $dir, $file, f$i",1);
			  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
				  $i=filemtime("$dir/$file"); // new, Jan 3
					  $stuff[substr($file,0,1)]["d".$i] = "$file"; 
				  //$index++;
				  //w("$index, $dir, $file, d$i",1);
			  }
			}
			closedir($handle); 
		} 
		return $stuff;
	}

	function loadDirSimple($dir,$ext,$type) { // 1D array, not 2D
		$stuff = array();
		if (is_dir($dir) && is_readable($dir)) { 
			ini_set("display_errors","0"); // suppress file not found errors
			$handle=opendir($dir);
			while (($file = readdir($handle))!==false) {
			  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="f") { 
				  $stuff[] = "$file"; 
				  //w("$index, $dir, $file, f$i",1);
			  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
				  $stuff[] = "$file"; 
				 //w("$index, $dir, $file, d$i",1);
			  }
			}
			closedir($handle); 
			ini_set("display_errors","1"); // and turn 'em back on.
		} else {
			global $hadLoadDirSimpleError;
			if (!$hadLoadDirSimpleError) { 
				global $_SERVER;
				echo "<p> Directory ($dir) <b>".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))."</b> on mirror: <b>".$_SERVER["HTTP_HOST"]."</b>! </p>";
				echo "<p> Please report this error to <a href=\"mailto:webmaster@eclipse.org?Subject=Directory ($dir) ".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))." in scripts.php::loadDirSimple() on mirror ".$_SERVER["HTTP_HOST"]."\">webmaster@eclipse.org</a>, or make directory readable. </p>";
				/*echo '
					<p> While this problem is being resolved, you can get a copy of the latest EMF, SDO, or XSD from here:
					<ul>
						<li><a href="http://download.eclipse.org/tools/emf/downloads/drops/2.0/I200406030436/">http://download.eclipse.org/tools/emf/downloads/drops/2.0/I200406030436/</a> [Main Public Mirror]</li>
						<li><a href="http://fullmoon.toronto.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/">http://fullmoon.toronto.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/</a> [IBM Only]</li>
						<li><a href="http://fullmoon.hursley.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/">http://fullmoon.hursley.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/</a> [IBM Only]</li>
					</ul>
					</p>
					<p> Thanks for your patience! </p>
					';*/
				$hadLoadDirSimpleError=1;
			}
			//exit;
		}
		return $stuff;
	}

	function wArr($arr) {
		print "<pre>\n";
		print_r($arr);
		print "</pre>\n";
	} 

	function w($s) { // shortcut for echo() with second parameter: "add break+newline"
		if (func_num_args()<=1) { 
			$br=""; // no break/newline
		} else { 
			$br=func_get_arg(1);
			if (stristr($br,"b")) {
				$br="<br/>";
			} else if (stristr($br,"n")) {
				$br="\n";
			} else if ($br) { 
				$br="<br/>\n"; 
			}
		}
		echo($s.$br); 
	}

function getNews($lim, $key, $linkOnly=false, $dateFmtPre="", $dateFmtSuf="")
{
	global $PR;

	$xml = file_contents($_SERVER["DOCUMENT_ROOT"] . "/$PR/" . "news/news.xml"); 
	$news_regex = "%
		^<news\ date=\"([^\"]+)\"(?:\ showOn=\"([^\"]+)\")?>$\\n
		((?:^[^<].+$\\n)+)
		^</news>$\\n
		%mx";

	if (!$xml)
	{
		print "<p><b><i>Error</i></b> Couldn't find any news!</p>\n";
	}

	$regs = null;
	preg_match_all($news_regex, $xml, $regs);
	$i_real = 0;
	foreach (array_keys($regs[0]) as $i)
	{
		if ($i_real >= $lim && $lim > 0)
		{
			return;
		}

		$showOn = explode(",", $regs[2][$i]);
		if ($key == "all" || in_array($key, $showOn))
		{
			$i_real++;
			print "<p>\n";
			if (strtotime($regs[1][$i]) > strtotime("-3 weeks"))
			{
				if (preg_match("/update/i",$regs[3][$i]))
				{
					print '<img src="/modeling/images/updated.gif" alt="Updated!"/> ';					
				}
				else
				{
					print '<img src="/modeling/images/new.gif" alt="New!"/> ';
				}
				
			}
			if (!$dateFmtPre && !$dateFmtSuf)
			{
				$app = (date("Y", strtotime($regs[1][$i])) < date("Y") ? ", Y" : "");	
				print date("M" . '\&\n\b\s\p\;jS' . $app, strtotime($regs[1][$i])) . ' - ' . "\n";
			} else if ($dateFmtPre)
			{
				print date($dateFmtPre,strtotime($regs[1][$i]));
			}
			if ($linkOnly)
			{
				$link = preg_replace("#.+(<a .+</a>).+#","$1",$regs[3][$i]);
			}
			else
			{
				$link = $regs[3][$i];
			}
			print $link;
			if ($dateFmtSuf)
			{
				print date($dateFmtSuf,strtotime($regs[1][$i]));
			}
			print "</p>\n";
		}
	}
}

function build_news($cvsprojs, $cvscoms, $proj, $limit = 4)
{
	global $projects, $PR;

	$types = array(
		"I" => "integration",
		"M" => "maintenance",
		"N" => "nightly",
		"R" => "release",
		"S" => "stable"
	);

	$limit = ($limit >= 0 ? "LIMIT $limit" : "");

	$projectsf = array_flip($cvsprojs);
	$q = array();

	foreach (array_keys($cvsprojs) as $z)
	{
		$q[$z] = "(CONVERT('$cvsprojs[$z]' USING utf8), CONVERT('' USING utf8))";
	}

	foreach (array_keys($cvscoms) as $z)
	{
		foreach (array_keys($cvscoms[$z]) as $y)
		{
			$q[$y] = "(CONVERT('$z' USING utf8), CONVERT('{$cvscoms[$z][$y]}' USING utf8))";
		}
	}

	$tmp = array_keys($q);
	$proj = (isset($q[$proj]) ? $proj : $tmp[0]);
	if ($proj && isset($q[$proj]))
	{
		$where = $q[$proj];
	}
	else
	{
		$where = join(",", $q);
	}

	$result = wmysql_query("SELECT `project`, `vanityname`, `branch`, CONCAT(DATE_FORMAT(`buildtime`, '%b %D '), IF(YEAR(`buildtime`) = YEAR(NOW()), '', YEAR(`buildtime`))), `type`, `buildtime` >= NOW() - INTERVAL 3 WEEK, CONCAT(`type`, DATE_FORMAT(buildtime, '%Y%m%d%H%i')) FROM `releases` WHERE (`project`, `component`) IN($where) ORDER BY `buildtime` DESC $limit");
	if ($result)
	{
		while ($row = mysql_fetch_row($result))
		{
			$img = ($row[5] ? "<img src=\"/modeling/images/new.gif\" alt=\"New!\"/>" : "");
			$link = "<a href=\"/$PR/downloads/?showAll=1&amp;project=" . $projectsf[$row[0]] . "&amp;hlbuild=$row[6]#$row[6]\">";
			print "<p>$img $row[3] - $link" . strtoupper($projectsf[$row[0]]) . " $row[1]</a> ($row[2]) " . $types[$row[4]] . " build available for ${link}download</a></p>";
		}
	}
}

function file_contents($file) //TODO: remove this when we upgrade php to >= 4.3.0 everywhere
{
	if (function_exists("file_get_contents"))
	{
		return file_get_contents($file);
	}
	else
	{
		return join("", file($file));
	}
}
	
function doSelectProject($projectArray, $proj, $nomenclature, $style = "homeitem3col", $showAll = "", $showMax = "", $sortBy = "")
{
	$vars = array("showAll", "showMax", "sortBy", "hlbuild");

	$hlbuild = (isset($_GET["hlbuild"]) && preg_match("/^[IMNRS]\d{12}$/", $_GET["hlbuild"]) ? $_GET["hlbuild"] : "");

	$out = "<div class=\"" . ($style == "sideitem" ? "sideitem" : "homeitem3col") . "\">\n";
	$out .= "<" . ($style == "sideitem" ? "h6" : "h3") . ">$nomenclature selection</" . ($style == "sideitem" ? "h6" : "h3") . ">\n";
	$out .= "<form action=\"" . $_SERVER["SCRIPT_NAME"] . "\" method=\"get\" id=\"subproject_form\">\n";
	$out .= "<p>\n";
	$out .= "<label for=\"project\">$nomenclature: </label>\n";
	$out .= "<select id=\"project\" name=\"project\" onchange=\"javascript:document.getElementById('subproject_form').submit()\">\n";

	foreach ($projectArray as $k => $v) 
	{
		$out .= "<option value=\"$v\"" . ("") . ">$k</option>\n";
	}
	$out .= "</select>\n";
	foreach ($vars as $z)
	{
		if ($$z !== "")
		{
			$out .= "<input type=\"hidden\" name=\"$z\" value=\"" . $$z . "\"/>\n";
		}
	}
	$tmp = preg_replace("#^/#", "", $proj);
	$out = preg_replace("#<option (value=\"$tmp\")>#", "<option selected=\"selected\" $1>", $out);
	$out .= "<input type=\"submit\" value=\"Go!\"/>\n";
	$out .= "</p>\n";
	$out .= "</form>\n";
	$out .= "</div>\n";

	return $out;
}

?>
