<?php
$pre = "../../"; 
require_once($_SERVER['DOCUMENT_ROOT'] . "/emf/includes/header.php");  
internalUseOnly(); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$VER = $_GET["version"] && preg_match("/(14|50)/",$_GET["version"])? $_GET["version"] : "50"; 
$PR = $_GET["project"] && preg_match("/(emf|uml2)/",$_GET["project"])? $_GET["project"] : "emf"; 
$hadLoadDirSimpleError=1;

?>

<div id="midcolumn">
<?php
	$doRefreshPage = false;
	$dropsPWD = getPWD("downloads/drops"); // see scripts.php
	$testsPWD = "/home/www-data/oldtests"; // path on emf.torolab.ibm.com
	$PWD		 = $showAllResults?$testsPWD:$dropsPWD; // path on emf.torolab.ibm.com

	$workDir = "/home/www-data/build/".$PR;


	if (!is_dir($PWD) || !is_readable($PWD)) { 
			echo "<p> Download Drops Directory ($PWD) not found or not readable! </p>";
			echo "<p> Please report this problem to <a href=\"mailto:codeslave@ca.ibm.com?Subject=Download Drops Directory not found or not readable in downloads-common.php, line 17\">codeslave@ca.ibm.com</a> </p>";
			exit;
	}

	$buildOptionsFile = $pre."build.options.txt"; // read only

	if (!$showMax) { $showMax = 10; } // max # of builds to show on the page
	$showBuildsIfDirNotExist = 0;

	$debug=-1;

	// get options file data
	$options = loadOptionsFromFile($buildOptionsFile);
	$options["BuildType"] = array(
			"Release=R",
			"Stable=S",
			"Integration=I",
			"Maintenance=M",
			"Nightly=N|selected"
	);

	//if ($debug>0) { w("OPTIONS:",1); wArr($options,"<br>",true,""); w("<hr noshade size=1 />"); }

	// get build types from options file
	$buildTypes = getBuildTypes($options); 

	//if ($debug>0) { w("BUILD TYPES:",1); wArr($buildTypes,"<br>",true,""); w("<hr noshade size=1 />"); }


	// get branches from options file
	$branches = getBranches($options);
	//if ($debug>0) { w("BRANCHES:",1); wArr($branches,"<br>",true,""); w("<hr noshade size=1 />"); }

	$sortBy  = array_key_exists("sortBy",$_GET)  ? $_GET["sortBy"]  : "";
	$showAll = array_key_exists("showAll",$_GET) ? $_GET["showAll"] : "";
	$showAllResults = array_key_exists("showAllResults",$_GET) ? $_GET["showAllResults"] : "";

	if ($sortBy!="date") {
		$builds = getBuildsFromDirs($branches);
		$builds = reorderArray($builds,$buildTypes);
		$latest = getLatest($builds);	
		$latest = reorderArray($latest,$buildTypes);
	} else {
		$builds = getBuildsFromDirs("");
		$builds = reorderArray($builds,"");
		$latest = array();
		$showMax = 10;
	}

	//if ($debug>0) { w("LATEST:",1); wArr($latest,"<br>",true,""); w("<hr noshade size=1 />"); }
	//if ($debug>0) { w("BUILDS:",1); wArr($builds,"<br>",true,""); w("<hr noshade size=1 />"); }

	$cols1 = '
	 <td><b>Build Name</b></td>
	 <td><b><a href="?project='.$PR.'&amp;version='.$VER.'&amp;showAllResults='.$showAllResults.'&amp;showAll='.$showAll.'&amp;sortBy=date">Build Date</b></td>';

		 $numHeaders = 0;
		 $k=-1;

		if ($sortBy=="date") { 
			print '<div class="homeitem3col"><h3>Latest Test Results</h3>'."\n";
			echo "<table cellspacing=3 cellpadding=0>";
		}
		
		foreach($builds as $t_branch => $builds2) {
			 foreach($builds2 as $t_type => $builds3) {
				 if ($sortBy!="date") { 
					 $branch=$t_branch;
					 $type=$t_type;
					 $name = $buildTypes[$branch][$type];
					 print '<div class="homeitem3col"><h3>'.$name.'s Results</h3>'."\n";
					 echo "<table cellspacing=3 cellpadding=0>";
				 }
				 if ($numHeaders==0 || $sortBy!="date") { 
					 echo "
					 <tr valign=bottom>".
					 ($sortBy=="date"?"<td><b><a href=\"?project=$PR&amp;version=$VER&amp;showAllResults=".$showAllResults."&amp;showAll=".$showAll."&amp;sortBy=type\">Type</a><a name=\"latest\">&#160;</a></b></td>":"")
					 .$cols1;
					 $numHeaders++;
				 } 

				ini_set("display_errors","0"); // suppress file not found errors
				foreach($builds3 as $t_k => $t_ID) {

					if ($sortBy=="date") { // need to change some values around
						$ID = explode("/",$t_ID); // 2.0.1/M/M200407280859
						$branch=$ID[0];
						$type=$ID[1];
						$ID = $ID[2];
						$k++;
					} else {
						$ID = $t_ID;
						$k = $t_k;
					}

					if ($showAll || $k<$showMax) { 
						$bgcolor = ($bgk%2==1?"FFFFFF":"EEEEEE"); $bgk++;
						 echo "<tr valign=top bgcolor=\"#$bgcolor\">";
								 
						$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

						echo ($sortBy=="date"?"<td>".$type."</td>":"");

						$zips_in_folder = loadDirSimple("$dropsPWD/$branch/$ID/","(\.zip)","f"); //wArr($zips_in_folder);
						// for testing, you can find a list of files like this:
						// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`
						$ziplabel = (sizeof($zips_in_folder)<1) ? $ID : 
							preg_replace("/(.+)\-([^\-]+)(\.zip)/","$2",$zips_in_folder[0]); // grab first entry

						// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
						$IDlabel = $ziplabel;

						 echo "<td><a href=\"".$pre."downloads/?showAll=1&amp;hlbuild=".$ID."#".$ID."\">$IDlabel</a></td>\n";
						 
						 echo "<td><small>".IDtoDateStamp($ID,1)."</small></td>\n";

						 echo "<td>".(strstr($_SERVER["SERVER_NAME"],"eclipse.org")?'':
							 getAllOldTestResults("$testsPWD/","$branch/$ID/")."</td>\n");

						 echo "</tr>\n";
					}
		 		 }
				 if ($sortBy!="date" && sizeof($builds3)>$showMax) { 
					 if (!$showAll || $showAll=="false") {
						 echo "<tr><td>&#160;</td>";
						 echo "<td align=center><small>(<a href=\"$PHP_SELF?showAllResults=$showAllResults&showAll=true&sortBy=$sortBy\">show all ".sizeof($builds3)." builds</a>)</small></td></tr>\n";
					 } else {
						 echo "<tr><td>&#160;</td>";
						 echo "<td align=center><small>(<a href=\"$PHP_SELF?showAllResults=$showAllResults&showAll=&sortBy=$sortBy\">show only ".$showMax." builds </a>)</small></td></tr>\n";
					 }
				 }
				 if ($sortBy!="date") { 
					 echo "</table>";
					print '</div>'."\n";
				 }
			 }
		 }
		 if ($sortBy=="date") { 
			if (sizeof($builds)>$showMax) {
				if (!$showAll || $showAll=="false") {
					echo "<tr><td>&#160;</td><td>&#160;</td><td align=center><small>(<a href=\"?project=$PR&amp;version=$VER&amp;showAllResults=$showAllResults&amp;showAll=true&amp;sortBy=$sortBy\">show all ".sizeof($builds)." builds</a>)</small></td></tr>\n";
				} else {
					echo "<tr><td>&#160;</td><td>&#160;</td><td align=center><small>(<a href=\"?project=$PR&amp;version=$VER&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy\">show only ".$showMax." builds </a>)</small></td></tr>\n";
				}
			}
			 echo "</table>";
			print '</div>'."\n";
		 }

print "</div>\n";

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
$newresults = ($showAllResults ? "" : "true");
$newresults_label = $newresults ? "Current + Deleted Builds" : "Current Builds Only";
print "<ul>\n";
$newsort = ($sortBy == "date" ? "type" : "date");
print "<li><a href=\"?project=$PR&amp;version=$VER&amp;showAll=$showAll&amp;sortBy=$newsort&amp;showAllResults=$showAllResults\">Sort By ".ucfirst($newsort)."</a></li>\n";
print "<li><a href=\"?project=$PR&amp;version=$VER&amp;showAll=$showAll&amp;sortBy=$sortBy&amp;showAllResults=$newresults\">$newresults_label</a></li>\n";
print "</ul>\n";
print "</div>\n";

if ($isEMFserver) { include_once $pre."build/sideitems-common.php"; }

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF Test Results";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

	function reorderArray($arr,$buildTypes) { 
		global $debug;
		// resort the 2D or 3D array (latest or builds), 
		// using branches as the sort order for 1D, and 
		// build types for 2D. 
		// If 3D, rsort() the last dimension

		//wArr($buildTypes);
		//w("<b>BEFORE:</b>",1);	wArr($arr,"<br>",true,""); w("<hr noshade size=1 />",1);

		$new = array();

		if ($buildTypes) { 
			foreach ($buildTypes as $br => $types) {
				//w("br: $br -->");
				$new[$br] = array();

				foreach ($types as $bt => $names) {
					if (array_key_exists($br,$arr) && array_key_exists($bt,$arr[$br]) && $arr[$br][$bt]) {
						//w("bt: $bt -->");
						$new[$br][$bt] = $arr[$br][$bt];
						if (is_array($new[$br][$bt])) { 
							$new[$br][$bt] = array_unique($new[$br][$bt]);
							rsort($new[$br][$bt]); reset($new[$br][$bt]);

							//wArr($new[$br][$bt]);
						} else {
							//w($new[$br][$bt],1);
						}
					}
				}
			}
		} else {
			krsort($arr); reset($arr);
			foreach ($arr as $dt_id => $dirs) {
				foreach ($dirs as $br_ty => $list) {
					$br = substr($br_ty,0,-1);	// branch: 2.0 (all but last char)
					$ty = substr($br_ty,-1,1); // last char: N
					$dt = substr($dt_id,0,12); // 200404051234
					$dir = $ty.$dt;				// dir: N200404051234
					if ($debug>0) { echo "$dt_id => $br_ty => $list:".sizeof($list)." ... $br, $ty, $dir<br>\n"; }

					// want [dt][dt][br/ty/dir]
					if (!array_key_exists($dt,$new) || !is_array($new[$dt])) { $new[$dt] = array(); }
					if (!array_key_exists($dt,$new[$dt]) || !is_array($new[$dt][$dt])) { $new[$dt][$dt] = array(); }
					$new[$dt][$dt][] = $br."/".$ty."/".$list[0];
				}
			}
		}
		if ($debug>0) { 
			w("<b>AFTER:</b>",1); wArr($new,"<br>",true,""); w("<hr noshade size=1 />",1);
		}
		return $new;
	}

	function getBuildsFromDirs($branches) { 
		// sort the $builds into a 3D array

		global $PWD, $showBuildsIfDirNotExist, $sortBy, $debug;

		$builds_temp = array();

		$branchDirs = loadDirSimple($PWD,".*","d");

		$buildDirs = array();
		foreach ($branchDirs as $branch) { 
			$buildDirs[$branch] = loadDirSimple($PWD."/".$branch,"(I|N|S|R|M)\d{12}","d");
			//w("BUILD DIRS [$branch]:",1); wArr($buildDirs[$branch],"<br>",true,""); w("<hr noshade size=1 />");			
		}

		if ($buildDirs && is_array($buildDirs)) {
			foreach ($buildDirs as $br => $dirList) { 
				foreach ($dirList as $i => $dir) { 
					$ty = substr($dir,0,1); // first char				// w($ty,1);

					if ($sortBy!="date") { 
						if (!array_key_exists($br,$builds_temp) || !$builds_temp[$br]) {				$builds_temp[$br] = array();				}//b[3.0]
						if (!array_key_exists($ty,$builds_temp[$br]) || !$builds_temp[$br][$ty]) { $builds_temp[$br][$ty] = array(); }			 //b[3.0][N]
						$builds_temp[$br][$ty][] = $dir;
					} else {
						$dttm = substr($dir,1); // last 12 digits		
						//if ($debug>1) { w("dttm = ".$dttm.", dir = ".$dir); }
						$a = $dttm.$ty;
						$b = $br.$ty;

						if (!array_key_exists($a,$builds_temp) || !$builds_temp[$a]) {				$builds_temp[$a] = array();				}
						if (!array_key_exists($b,$builds_temp[$a]) || !$builds_temp[$a][$b]) { $builds_temp[$a][$b] = array(); }
						$builds_temp[$a][$b][] = $dir;
						//if ($debug>1) { w(' -- $builds_temp['.$a.']['.$b.'][] = '.$dir.';',1); }
					}
				}
			}
		}

		//wArr($builds_temp); 

		return $builds_temp;
	}	

	function getAllOldTestResults($testsPWD,$path) { // given a build ID, determine any test results for BVT, FVT, SVT
		global $pre;
		$mid = "../"."../../tools/emf/"."tests/"; // this is a symlink on the filesystem!

		// return four <td> cells, one per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log

		// $testsPWD is path to root of tests; $path defines 2.0/I200405131234/ ... also need to then check subdirs

		$ret = "";
		$tests = array ("bvt","fvt","svt");
		$testDirs = array();
		if (is_dir($testsPWD.$path) && is_readable($testsPWD.$path)) { 
			$testDirs = loadDirSimple($testsPWD.$path,"\d{12}","d"); // get dirs
			rsort($testDirs); reset($testDirs);
		}

		if (!is_file($testsPWD.$path.$testDirs[0]."/testlog.txt")) { 
			return "";
		}

		$ret .= "<table width=\"100%\">";
		foreach ($testDirs as $testDir) { 
			$ret .= "<tr>";
			foreach ($tests as $t) {
				$cnt = getTestResultsFailureCount($testsPWD.$path,$testDir,"results/".$t.".html","testlog.txt");
				if ($cnt==="BUILD FAILED") { 
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a href=\"".
						(is_file($testsPWD.$path.$testDir."/results/".$t.".html") ? 
							$pre.$mid.$path.$testDir."/results/".$t.".html#_Test_Results" : $pre.$mid.$path.$testDir."/testlog.txt").
						"\"><span class=\"errors\"><abbr title=\"$t\"><img src=\"".$pre."images/not.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"BUILD FAILED!\"></abbr></a>&nbsp;</td>"."\n";
				} else if ($cnt==="...") { 
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a style=\"text-decoration:none\" href=\"".($pre.$mid.$path.$testDir."/testlog.txt")."\"><span class=\"inprogress\"><abbr title=\"$t\">.&nbsp;.&nbsp;.</abbr></a>&nbsp;</td>"."\n";
				} else if ($cnt==="") { 
					$ret .= "<td bgcolor=\"#FFFFFF\"><span class=\"errors\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"."\n";
				} else if ($cnt===0) { 
					$ret .= "<td bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/results/".
						$t.
						".html#_Test_Results\"><abbr title=\"$t\"><img src=\"".$pre."images/check.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"Passed!\"></abbr></a>&nbsp;</td>"."\n";
				} else {
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/results/".
						$t.
						".html#_Test_Results\"><span class=\"errors\"><abbr title=\"$t\">".
						$cnt.
						"&nbsp;F</abbr></span></a>&nbsp;</td>".
						"\n";
				}
			}

			global $SERVER_NAME;
			$ret.="<td bgcolor=\"#FFFFFF\">".(is_file($testsPWD.$path.$testDir."/testlog.txt")?("<a href=\"".(strstr($SERVER_NAME,"emf.torolab.ibm.com")?"/emf/build/log-viewer.php?test=$path".$testDir."/":$pre.$mid.$path.$testDir."/testlog.txt")."\" class=\"buildlog\"><span class=\"buildlog\">".makeDateTime($testDir)."</span></a>"):"<span class=\"buildlog\">&nbsp;&nbsp;&nbsp;</span>")."</td>";
			$ret .= "</tr>";
		}
		$ret .= "</table>";
		return $ret; 
	}

	function getTestResultsFailureCount($path,$testDir,$file,$log) {
		$fails=0;
		//echo "checking $path -- $testDirs -- $file ...\n<br>";
		$file = $path.$testDir."/".$file;
		$log = $path.$testDir."/".$log;
		if (is_file($file) && is_readable($file)) { 
			$f = file($file);
			foreach ($f as $line) { 
				if (strstr($line,">failed<")) { 
					$fails++;
				} else if (false !== strpos($line,"Pass rate = <font color=#0000BB>0%</font><br>")) { 
					return "BUILD FAILED";
				} else if (false !== strpos($line,"<font color=#0000BB>0</font> out of")) {
					return "BUILD FAILED";
				}
			}
			//w("<b>$fails</b>",1);
			return $fails;
		} else if (is_file($log) && is_readable($log)) { 
			$f = file($log);
			foreach ($f as $line) { 
				if (false!==strpos($line,"BUILD FAILED")) {
					return "BUILD FAILED";
				} else if (false!==strpos($line,"start.sh finished on:")) {
					return "BUILD FAILED";
				}
			}
			return "...";
		} else {
			return "";
		}
	}

	function getBranches($options) { 
		$arr = array();
		if ($options["Branch"] && is_array($options["Branch"])) {
			foreach ($options["Branch"] as $br => $branch) { 
					$arr[	getValueFromOptionsString($branch,"name")] = 
							getValueFromOptionsString($branch,"value");
			}
		}
		return $arr;
	}

	function getBuildTypes($options) { 
		$arr = array();
		if ($options["Branch"] && is_array($options["Branch"])) {
			foreach ($options["Branch"] as $br => $branch) { 
				foreach ($options["BuildType"] as $bt => $buildType) { 
					$v = getValueFromOptionsString($branch,"value");
					if (!array_key_exists($v,$arr) || !$arr[$v]) { 
						$arr[$v] = array();
					}
					$arr
						[$v]				// [2.0]
						[getValueFromOptionsString($buildType,"value")] =		// [N]
							$v. " " . 
							getValueFromOptionsString($buildType,"name") . " Build";
				}
			}
		}
		//wArr($arr);
		return $arr;
	}

	function getValueFromOptionsString($opt,$nameOrValue) { 
		if (strstr($opt,"|selected")) {  // remove the |selected keyword
			$opt = substr($opt,0,strpos($opt,"|selected"));
		}
		if (strstr($opt,"=")) {  // split the name=value pairs, if present
			if ($nameOrValue=="name" || $nameOrValue===0) { 
				$opt = substr($opt,0,strpos($opt,"="));
			} else if ($nameOrValue=="value" || $nameOrValue==1) { 
				$opt = substr($opt,strpos($opt,"=")+1);
			}
		}
		return $opt;
	}

	function listOptions($options,$bool) {
		if ($options["reversed"]) {
			// pop that item out
			array_shift($options);
			$options = array_reverse($options);
		}

		foreach ($options as $o => $option) {
			$opt = $option;
			$isSelected = false;
			if (strstr($opt,"|selected")) {  // remove the |selected keyword
				$isSelected=true;
				$opt = substr($opt,0,strpos($opt,"|selected"));
			}
			if (strstr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
				if (!$bool) { 
					echo trim($matches[2]);
				} else { 
					echo trim($matches[1]);
				}
			} else { // turn foo into <option value="foo">foo</option>
				echo $opt;
			}
			echo "<br />";
		}
	}

	function loadOptionsFromFile($file) { 
		ini_set("display_errors","0"); // suppress file not found errors
		$sp = file($file);
		ini_set("display_errors","1"); // and turn 'em back on.
		if (!$sp) { $sp = array();	}
		$options = loadOptionsFromArray($sp);
		return $options;
	}

	function makeDateTime($date) { 
		return substr($date,0,4)."-".substr($date,4,2)."-".substr($date,6,2)." ".
			substr($date,8,2).":".substr($date,10,2)." ".substr($date,12);
	}

	function loadOptionsFromArray($sp) {
		global $debug;
		$options = array();
		//$debug=1;
		$doSection = "";

		foreach ($sp as $s) { 
			$matches=null;
			if (strpos($s,"#")===0) { // skip, comment line
			} else if (preg_match("/\[([a-zA-Z\_\|]+)\]/",$s,$matches)) { // section starts
				if (strlen($s)>2) { 
					$isReversed = false;
					if (strstr($s,"|reversed")) {  // remove the |reversed keyword
						$isReversed=true;
						$doSection = trim($matches[1]);
						$doSection = substr($doSection,0,strpos($doSection,"|reversed"));
					} else {
						$doSection = trim($matches[1]);
					}
					if ($debug>1) echo "Section: $s --> $doSection<br>";

					$options[$doSection] = array();
					if ($isReversed) { $options[$doSection]["reversed"] = $isReversed; }
				}
			} else if (!preg_match("/\[([a-zA-Z\_]+)\]/",$s,$matches)) { 
				if (strlen($s)>2) { 
					if ($debug>1) echo "Loading: $s<br>";
					$options[$doSection][] = trim($s);
				}
			}
		}

		return $options;
	}

	function getLatest($builds) { 
		// given a list of dirs, determine the most recent ones by date/time sequence 
		$latest = array();
		foreach ($builds as $branch => $builds2) {
			foreach ($builds2 as $type => $builds3) {
				arsort($builds3); reset($builds3);
				foreach ($builds3 as $k => $build) {
					if (!array_key_exists($branch,$latest) || !$latest[$branch]) { $latest[$branch] = array(); } //l[2.0]
					if (!array_key_exists($type,$latest[$branch]) || !$latest[$branch][$type]) { // found the first one
						$latest[$branch][$type] = $build;
						//w('latest['.$branch.']['.$type."] = $build",1);
						break 1;
					}
				}
			}
		}

		return $latest;
	}

	function IDtoDateStamp($ID,$style) { // given N200402121441, return date("D, j M Y -- H:i (O)")
		if ($ID && !preg_match("/\_/",$ID)) { 
			 $year = substr($ID, 1, 4);
			 $month = substr($ID, 5, 2);
			 $day = substr($ID, 7, 2);
			 $hour = substr($ID,9,2);
			 $minute = substr($ID,11,2);
			 $timeStamp = mktime($hour, $minute, 0, $month, $day, $year);
			 return date( ($style?"D, j M Y -- H:i (O)":'Y/m/d H:i'), $timeStamp);
		} else if ($ID && preg_match("/\_/",$ID)) { 
			 $year = substr($ID, 0, 4);
			 $month = substr($ID, 4, 2);
			 $day = substr($ID, 6, 2);
			 $hour = substr($ID,9,2);
			 $minute = substr($ID,11,2);
			 $timeStamp = mktime($hour, $minute, 0, $month, $day, $year);
			 return date( ($style?"D, j M Y -- H:i (O)":'Y/m/d H:i'), $timeStamp);
		} else { 
			return "";
		}
	}

 ?>
