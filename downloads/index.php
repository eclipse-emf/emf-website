<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

/* config */
$pre = "../";
include $pre . "includes/header.php";

$dls = array(
	"EMF, SDO, and XSD" => array(
		"SDK (runtimes, source, docs)" => "SDK",
		"Standalone" => "Standalone",
		"Models" => "Models",
		"Automated Tests" => "Automated-Tests",
		"Examples" => "Examples"
	),
	"EMF and SDO" => array(
		"SDK" => "SDK",
		"Runtimes" => "runtime"
	),
	"XSD" => array(
		"SDK (runtime, source, docs)" => "SDK",
		"Runtime" => "runtime"
	)
);

$filePre = array( // file prefixes - also defines the DL image to use, and image alt tag
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo-xsd",
	"emf-sdo",
	"emf-sdo",
	"xsd",
	"xsd"
);

$rssfeed = "<a href=\"http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds.xml\"><img style=\"float:right\" alt=\"EMF Build Feed\" src=\"../images/rss-atom10.gif\"></a>";

$debug = -1;
$hadLoadDirSimpleError = 1; //have we echoed the loadDirSimple() error msg yet? if 1, omit error; if 0, echo at most 1 error
$sortBy = (preg_match("/^(date)$/", $_GET["sortBy"], $regs) ? $regs[1] : "");
$showAll = (preg_match("/^(1)$/", $_GET["showAll"], $regs) ? $regs[1] : "0");
$showMax = (preg_match("/^(\d+)$/", $_GET["showMax"], $regs) ? $regs[1] : ($sortBy == "date" ? "10" : "5"));
$doRefreshPage = false;
$hideInstructions = 0;

$PWD = getPWD("downloads/drops"); // see scripts.php
$buildOptionsFile = "$pre/build.options.txt"; // read only

if (preg_match("/(?:emf|fullmoon)\./", $_SERVER["HTTP_HOST"])) //internal
{
	$downloadScript = "../../../tools/emf/scripts/download.php?dropFile=";
	$downloadPre = "../../..";
}
else // all others
{
	$downloadScript = "http://www.eclipse.org/downloads/download.php?file=";
	$downloadPre = "";
}

$jdk14testsPWD = ""; //superfluous
$jdk50testsPWD = "";
if ($isEMFserver)
{
	$testsPWD = "/home/www-data/tests/tools/emf/tests"; // path on emf.torolab.ibm.com ONLY
	$jdk14testsPWD = "/home/www-data/jdk14tests"; // path on emf.torolab.ibm.com ONLY
	$jdk50testsPWD = "/home/www-data/jdk50tests"; // path on emf.torolab.ibm.com ONLY
}
/* end config */

print "<div id=\"midcolumn\">\n";
print doRequirements();

if (($options = loadOptionsFromFile($buildOptionsFile)) && is_array($options["Branch"]))
{
	$buildTypes = getBuildTypes($options);
}

$builds = getBuildsFromDirs();
if ($sortBy != "date")
{
	$builds = reorderArray($builds, $buildTypes);
}
else
{
	krsort($builds);
}

if (sizeof($builds) == 0)
{
	print "<div class=\"homeitem3col\">\n";
	print "<h3>${rssfeed}Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	print "<li><i><b>Error!</b></i> No builds found on this server!</li>";
	print "</ul>\n";
	print "</div>\n";
}

if ($sortBy != "date")
{
	$c = 0;
	foreach ($builds as $branch => $types)
	{
		foreach ($types as $type => $IDs)
		{
			print "<div class=\"homeitem3col\">\n";
			print "<h3>$rssfeed" . $buildTypes[$branch][$type] . "s</h3>\n";
			print "<ul class=\"releases\">\n";
			$i = 0;
			foreach ($IDs as $ID)
			{
				print outputBuild($branch, $ID, $c++);
				$i++;

				if (!$showAll && $i == $showMax && $i < sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
					break;
				}
				else if ($showAll && sizeof($IDs) > $showMax && $i == sizeof($IDs))
				{
					print showToggle($showAll, $showMax, $sortBy, sizeof($IDs));
				}
			}
			print "</ul>\n";
			print "</div>\n";
		}
	}
}
else if ($sortBy == "date")
{
	print "<div class=\"homeitem3col\">\n";
	print "<a name=\"latest\"></a><h3>${rssfeed}Latest Builds</h3>\n";
	print "<ul class=\"releases\">\n";
	$c = 0;
	foreach ($builds as $rID => $rbranch)
	{
		$ID = preg_replace("/^(\d{12})([IMNRS])$/", "$2$1", $rID);
		$branch = preg_replace("/.$/", "", $rbranch);
		print outputBuild($branch, $ID, $c++);

		if (!$showAll && $c == $showMax && $c < sizeof($builds))
		{
			print showToggle($showAll, $showMax, $sortBy, sizeof($builds));
			break;
		}
		else if ($showAll && sizeof($builds) > $showMax && $c == sizeof($builds))
		{
			print showToggle($showAll, $showMax, $sortBy, sizeof($builds));
		}
	}
	print "</ul>\n";
	print "</div>\n";
}

if ($doRefreshPage)
{ ?>
<script type="text/javascript">
	setTimeout('document.location.reload()', 60*1000); // refresh every 60 seconds if there's a build in progress
</script>
<?php }

if (!$hideInstructions)
{
	requirementsNote();
}
showArchived();
doLanguagePacks(); ?>
	<div class="homeitem3col">
		<h3>Questions?</h3>
		<p>If you have problems downloading the drops, contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>.</p>
		<p>These are the minimum required downloads for using EMF, SDO and XSD:</p>
		<ul>
			<li>To use <b class="emf">EMF</b> alone, you require only the EMF Runtime.</li>
			<li>To use <b class="emf">EMF</b> w/ XSD models, you require both the EMF &amp; XSD Runtimes.</li>
			<li>To use <b class="xsd">XSD</b>, you require both the EMF &amp; XSD Runtimes.</li>
			<li>To use <b class="sdo">SDO</b> alone, you require both the EMF &amp; SDO Runtimes.</li>
			<li>To use <b class="sdo">SDO</b> w/ XSD models, you require all 3 Runtimes: EMF, SDO &amp; XSD (or the SDK).</li>
		</ul>
		<p>All downloads are provided under the terms and conditions of the <a href="http://www.eclipse.org/legal/epl/notice.html">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
	</div>
</div>

<?php

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>Additional Info</h6>\n";
print "<ul>\n";
print "<li><a href=\"http://www.eclipse.org/emf/faq/faq.php\">FAQs</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/downloads/install.php\">Installation Issues</a></li>\n";
print "<li><a href=\"#archives\">Archived Releases</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/downloads/build-types.php\">About Build Types</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/downloads/verifyMD5.php\">Using md5 Files</a></li>\n";
print '<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=EMF&amp;bug_status=UNCONFIRMED&amp;bug_status=NEW&amp;bug_status=ASSIGNED&amp;bug_status=REOPENED">Open Bugs</a></li>'."\n";
print "<li><a href=\"http://www.eclipse.org/emf/news/release-notes.php\">Release Notes</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Language Packs</h6>\n";
print "<ul>\n";
print "<li><a href=\"#NL22x\">2.2.x</a></li>\n";
print "<li><a href=\"#NL21x\">2.1.x</a></li>\n";
print "<li><a href=\"#NL20x\">2.0.x</a></li>\n";
print "</ul>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Sort</h6>\n";
$newsort = ($sortBy == "date" ? "type" : "date");
print "<ul>\n";
print "<li><a href=\"?showAll=$showAll&amp;showMax=$showMax&amp;sortBy=$newsort\">By ".ucfirst($newsort)."</a></li>\n";
print "</ul>\n";
print "</div>\n";

if ($isEMFserver)
{
?>
<div class="sideitem">
	<h6>Actions</h6>
	<ul>
		<li><a href="http://emf.torolab.ibm.com/emf/build/">New Build</a></li>
		<li><a href="http://emf.torolab.ibm.com/emf/build/patch.php">New Test</a></li>
		<li><a href="http://emf.torolab.ibm.com/emf/build/promo.php">Promote</a></li>
	</ul>
</div>
<div class="sideitem">
	<h6>Info</h6>
	<ul>
		<li><a href="http://instawiki.webahead.ibm.com/pilot/wiki/Wiki.jsp?page=EMF&wiki=Rational_Modeling_Tools_Team">w3 Wiki</a></li>
		<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=EMFT&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
		<li><a href="http://emf.torolab.ibm.com/emf/downloads/downloads.php">Download Stats</a></li>
	</ul>
</div>
<div class="sideitem">
	<h6>Tests</h6>
	<ul>
		<li><a href="http://emf.torolab.ibm.com/tests/results-jdk14.php">JDK 1.4</a></li>
		<li><a href="http://emf.torolab.ibm.com/tests/results-jdk50.php">JDK 5.0</a></li>
		<li><a href="http://emf.torolab.ibm.com/tests/results.php">BVT, FVT, SVT</a></li>
	</ul>
</div>
<?php
}
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - EMF Downloads";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

# Generate the web page
$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds.xml"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="' . $pre . 'includes/downloads.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

function reorderArray($arr, $buildTypes)
{
	// the first dimension's order is preserved (kept as it is in the config file)
	// sort the second dimension using the IMNRS order in $buildTypes
	// rsort the third dimension

	$new = array();
	foreach ($buildTypes as $br => $types)
	{
		foreach ($types as $bt => $names)
		{
			if (array_key_exists($br, $arr) && array_key_exists($bt, $arr[$br]) && is_array($arr[$br][$bt]))
			{
				$new[$br][$bt] = $arr[$br][$bt];
				rsort($new[$br][$bt]);
			}
		}
	}

	return $new;
}

function getBuildsFromDirs() // massage the builds into more useful structures
{
	global $PWD, $sortBy;

	$branchDirs = loadDirSimple($PWD, ".*", "d");
	$buildDirs = array();

	foreach ($branchDirs as $branch)
	{
		if ($branch != "OLD")
		{
			$buildDirs[$branch] = loadDirSimple("$PWD/$branch", "[IMNRS]\d{12}", "d");
		}
	}

	$builds_temp = array();
	foreach ($buildDirs as $br => $dirList)
	{
		foreach ($dirList as $dir)
		{
			$ty = substr($dir, 0, 1); //first char

			if ($sortBy != "date")
			{
				$builds_temp[$br][$ty][] = $dir;
			}
			else
			{
				$dttm = substr($dir, 1); // last 12 digits
				$a = $dttm . $ty;
				$b = $br . $ty;

				$builds_temp[$a] = $b;
			}
		}
	}

	return $builds_temp;
}

function getJDKTestResults($testsPWD, $path, $type, &$status) //type is "jdk50" or "jdk14"
{
	global $pre, $isEMFserver;
	$mid = "../../../tools/emf/${type}tests/"; // this is a symlink on the filesystem!

	// one <li> per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log
	// $testsPWD is path to root of tests; $path defines 2.0/I200405501234/ ... also need to then check subdirs

	$ret = "";
	$tests = ($type == "jdk50" ? array("build", "junit") : array("build", "junit", "standalone"));
	$testDirs = array();
	if (is_dir($testsPWD . $path) && is_readable($testsPWD . $path))
	{
		$testDirs = loadDirSimple($testsPWD . $path, "\d{12}", "d"); // get dirs
		rsort($testDirs);
		reset($testDirs);
	}

	if (!is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		return;
	}

	$file = "$testsPWD$path$testDirs[0]/testlog.txt";

	$f = (is_file($file) && is_readable($file) ? file($file) : array());

	$cnt = 0;
	foreach ($tests as $t)
	{
		$stat = "";
		$sty = "";
		$testlog = ($isEMFserver ? "/emf/build/log-viewer.php?${type}test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt");
		if ($cnt === 0 || preg_match("/^[^EFP]+$/", $cnt)) // nothing, or no E or F or P
		{
			$cnt = ($type == "jdk50" ? getJDK50TestResultsFailureCount($f, $t) : getJDK14TestResultsFailureCount($f, $t));
			if ($cnt === "...") //not done (yet)
			{
				$stat = "<a href=\"$testlog\">...</a>";
			}
			else if ($cnt === "") //empty log file
			{
				$stat = "empty log";
			}
			else if (preg_match("/FAILED/", $cnt)) //build failed
			{
				$stat = "<a href=\"$testlog\"><img src=\"http://www.eclipse.org/emf/images/not.gif\" alt=\"BUILD FAILED!\"/></a>";
			}
			else if ($cnt === 0) //all passed, 0 F, E, and N
			{
				$stat = "<a href=\"$testlog\"><img src=\"http://www.eclipse.org/emf/images/check.gif\" alt=\"Passed!\"/></a>";
			}
			else //something else
			{
				$sty = (preg_match("/[EF]/", $cnt) ? "errors" : "warnings");
				$stat = "<a href=\"$testlog\">$cnt</a>";
			}
		}
		else // if we failed on the build, the JUnit stuff won't run (if javacFailOnError=true in runJDK14Tests.xml)
		{
			$stat = "<a href=\"$testlog\"><img src=\"http://www.eclipse.org/emf/images/question.gif\" alt=\"Did Not Run - Previous Test Failed!\"/></a>";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . preg_replace("/^(.)/e", "chr(ord($1)-32)", $t) . "</li>\n";

		$status .= $stat;
	}

	global $isEMFserver;
	$tmp = preg_replace("/^(.+?)(\d)(\d)$/e", "strtoupper($1) . \" $2.$3\"", $type) . " Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a href=\"" . ($isEMFserver ? "/emf/build/log-viewer.php?${type}test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">$tmp</a>";
	}

	return "<li>$tmp<ul>$ret</ul></li>";
}

function getOldTestResults($testsPWD, $path, &$status) // given a build ID, determine any test results for BVT, FVT, SVT
{
	global $pre, $isEMFserver;
	$mid = "../../../tools/emf/tests/"; // this is a symlink on the filesystem!

	// $testsPWD is path to root of tests; $path defines 2.0/I200405131234/ ... also need to then check subdirs

	$ret = "";
	$tests = array("bvt", "fvt", "svt");
	$testDirs = array();
	if (is_dir($testsPWD . $path) && is_readable($testsPWD . $path))
	{
		$testDirs = loadDirSimple($testsPWD . $path, "\d{12}", "d"); // get dirs
		rsort($testDirs);
		reset($testDirs);
	}
	if (!is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		return;
	}

	$logs = array();
	foreach ($tests as $t)
	{
		if (is_file("$testsPWD$path$testDirs[0]/results/$t.html"))
		{
			$logs[$t] = "results/$t.html";
		}
	}
	
	if (sizeof($logs) < 1)
	{
		$logs["..."] = "testlog.txt";
	}
	foreach ($logs as $t => $log)
	{
		$stat = "";
		$sty = "";
		$cnt = getTestResultsFailureCount($testsPWD . $path, $testDirs, $log);
		$testlog = ($isEMFserver ? "/emf/build/log-viewer.php?test=$path$testDirs[0]/$log" : "$pre$mid$path$testDirs[0]/$log");
		if ($cnt === "")
		{
			$stat = "<a href=\"" . ($isEMFserver ? "/emf/build/log-viewer.php?test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">...</a> ";
		}
		else if (preg_match("/FAILED/", $cnt)) //build failed
		{
			$stat = "<a href=\"$testlog\"><img src=\"http://www.eclipse.org/emf/images/not.gif\" alt=\"BUILD FAILED!\"/></a>";
		}
		else if ($cnt === 0)
		{
			$stat = "<a href=\"$testlog\"><img src=\"http://www.eclipse.org/emf/images/check.gif\" alt=\"Passed!\"/></a>";
		}
		else
		{
			$sty = "errors"; // it's always a failure here (see below)
			$stat = "<a href=\"$testlog\">$cnt F ($sty)</a>";
		}
		$ret .= "<li" . ($sty != "" ? " class=\"$sty\"" : "") . "><div>$stat</div>" . strtoupper($t) . "</li>\n";

		$status .= $stat;
	}

	global $isEMFserver;
	$tmp = "Old Tests";
	if (is_file("$testsPWD$path$testDirs[0]/testlog.txt"))
	{
		$tmp = "<a href=\"" . ($isEMFserver ? "/emf/build/log-viewer.php?test=$path$testDirs[0]/" : "$pre$mid$path$testDirs[0]/testlog.txt") . "\">$tmp</a>";
	}
	return "<li>$tmp<ul>$ret</ul></li>";
}

function getJDK14TestResultsFailureCount($f, $type = "")
{
	$issues = array("fail" => 0, "error" => 0, "note" => 0); //counts
	$steps = array(1 => "/runJUnitTests:/", 2 => "/runStandAloneJUnitTests:/"); //possible steps and delimiters
	$parse = array(
		0 => array("type" => "build", "regex" => array("/\[javac\] (\d+) (fail|error)/", "/\[javac\].+(deprecate)/")),
		1 => array("type" => "junit", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/")),
		2 => array("type" => "standalone", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/"))
	);

	return getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse);
}

function getJDK50TestResultsFailureCount($f, $type = "")
{
	$issues = array("fail" => 0, "error" => 0, "warning" => 0, "note" => 0); //counts
	$steps = array(1 => "/runJunitTests:/"); //possible steps and delimiters
	$parse = array(
		0 => array("type" => "build", "regex" => array("/\[javac\] (\d+) (fail|error|warning)/", "/\[javac\].+(deprecate)/")),
		1 => array("type" => "junit", "regex" => array("/\[java\] There (?:was|were) (\d+) (fail|error)/"))
	);

	return getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse);
}

/* TODO: investigate if lines with "fail" also have "error" in them, if not, then the old version was letting them slip through and was most likely a bug */
function getGenericTestResultsFailureCount($f, $type, $issues, $steps, $parse)
{
	$step = 0;
	$failed = false;
	$isDone = false;

	if (sizeof($f) == 0)
	{
		return "";
	}

	foreach ($f as $line)
	{
		$m = null;
		foreach (array_keys($steps) as $z)
		{
			if (preg_match($steps[$z], $line))
			{
				$step = $z;
			}
		}

		if (preg_match("/BUILD FAILED/", $line))
		{
			$failed = true;
			$isDone = true;
			break;
		}

		foreach (array_keys($parse) as $z)
		{
			if ($step == $z && $type == $parse[$z]["type"])
			{
				foreach ($parse[$z]["regex"] as $y)
				{
					if (preg_match($y, $line, $m))
					{
						if (sizeof($m) == 2) //1 match
						{
							$issues[$m[1]]++;
						}
						else if (sizeof($m) == 3) //2 matches
						{
							$issues[$m[2]] += $m[1];
						}
					}
				}
			}
		}

		if (preg_match("/finished on:/", $line))
		{
			$isDone = true;
		}
	}

	if (!$isDone)
	{
		return "...";
	}

	return parseIssues($issues, $failed);
}

function parseIssues($issues, $failed)
{
	$count = 0;
	foreach ($issues as $z)
	{
		$count += $z;
	}

	if ($count == 0 && !$failed)
	{
		return 0;
	}
	else
	{
		foreach (array_keys($issues) as $z)
		{
			if ($issues[$z] > 0)
			{
				$ret .= $issues[$z] . " " . strtoupper(substr($z, 0, 1)) . ", ";
			}
		}
		$ret = preg_replace("/, $/", "", $ret);

		if (!$ret && $failed)
		{
			$ret = "FAILED";
		}
		return $ret;
	}
}

function getTestResultsFailureCount($path, $testDirs, $file)
{
	$num = "";
	$file = "$path$testDirs[0]/$file";
	
	if (preg_match("/testlog\.txt/", $file))
	{
		$num = (grep("/BUILD FAILED/", $file) ? "FAILED" : "");
	}
	else
	{
		if (is_file($file) && is_readable($file))
		{
			$f = file_contents($file);
			$regs = null;
			$num = preg_match_all("/>failed</", $f, $regs);
		}
	}
	return $num;
}

function getBuildTypes($options)
{
	$arr = array();
	foreach ($options["Branch"] as $br => $branch)
	{
		foreach ($options["BuildType"] as $bt => $buildType)
		{
			$v = getValueFromOptionsString($branch, "value");
			if (!array_key_exists($v, $arr))
			{
				$arr[$v] = array();
			}
			$regs = null;
			if (preg_match("/^(.+)=([^\|]+)(?:\|selected)?$/", $buildType, $regs))
			{
				// [2.0][N]
				$arr[$v][$regs[2]] = "$v $regs[1] Build";
			}
		}
	}

	return $arr;
}

function getValueFromOptionsString($opt, $nameOrValue)
{
	$regs = null;
	if (preg_match("/^(.+)=([^\|]+)(?:\|selected)?$/", $opt, $regs))
	{
		return (preg_match("/^(?:name|0)$/", $nameOrValue) ? $regs[1] : $regs[2]);
	}
}

function loadOptionsFromFile($file)
{
	return (is_readable($file) ? loadOptionsFromArray(file($file)) : array());
}

function loadOptionsFromArray($sp)
{
  $doSection = null;
	foreach ($sp as $s)
	{
		if (preg_match("/^[^#].{2,}/", $s))
		{
			$matches = null;
			if (preg_match("/\[([a-zA-Z_]+)(\|reversed)?\]/", $s, $matches)) // section starts
			{
				$doSection = $matches[1];

				if ($matches[2] == "|reversed") //FIXME: reversed does nothing right now, apparently it's supposed to work
				{
					$options[$doSection]["reversed"] = true;
				}
			}
			else
			{
				$options[$doSection][] = trim($s); //TODO: this looks like a bug, $doSection could be ""
			}
		}
	}

	return $options;
}

function IDtoDateStamp($ID, $style) // given N200402121441, return date("D, j M Y -- H:i (O)")
{
	$styles = array('Y/m/d H:i', "D, j M Y -- H:i (O)", 'Y/m/d');
	$m = null;
	if (preg_match("/(\d{4})(\d\d)(\d\d)(?:_)?(\d\d)(\d\d)/", $ID, $m))
	{
		$ts = mktime($m[4], $m[5], 0, $m[2], $m[3], $m[1]);
		return date($styles[$style], $ts);
	}

	return "";
}

function createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePre, $ziplabel = "") // the new way - use a ziplabel pregen'd from a dir list!
{
	$uu = 0;
	$echo_out = "";
	$suf = array("emf-sdo-xsd" => "all", "emf-sdo" => "emf-sdo",
		"emf" => "emf-sdo", "xsd" => "xsd");

	if (!$ziplabel)
	{
		$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
		// for testing, you can find a list of files like this:
		// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`

		$ziplabel = preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry
	}

	foreach (array_keys($dls) as $z)
	{
		$echo_out .= "<li><img src=\"http://www.eclipse.org/emf/images/dl-" . $suf[$filePre[$uu]] . ".gif\" alt=\"" . $suf[$filePre[$uu]] . "\"/> $z\n<ul>\n";
		foreach ($dls[$z] as $label => $u)
		{
			$echo_out .= "<li>\n";
			if ($u) // for compatibilty with uml2, where there's no "RT" value in $u
			{
				$u = "-$u";
			}

			if (is_file("$PWD/$branch/$ID/$pre2$filePre[$uu]$u-$ziplabel.zip")) // for compatibilty with uml2, where there's no "RT" value in $u
			{
				$echo_out .= fileFound("$PWD/", "$branch/$ID/$pre2$filePre[$uu]$u-$ziplabel.zip", // again, for uml2
					$label);
			}
			else
			{
				$echo_out .= "...";
			}
			$echo_out .= "</li>\n";
			$uu++;
		}
		$echo_out .= "</ul>\n</li>\n";
	}

	return $echo_out;
}

function showBuildResults($PWD, $path) // given path to /../downloads/drops/M200402021234/
{
	global $pre, $isEMFserver;
	$mid = "../../../tools/emf/downloads/drops/"; // this is a symlink on the filesystem!

	$warnings = 0;
	$errors = 0;

	$result = "";
	$icon = "";

	$indexHTML = "";
	$testResultsPHP = "";

	$link = "";
	$link2 = "";

	if ($isEMFserver && is_file("$PWD${path}buildlog.txt") && filesize("$PWD${path}buildlog.txt") < (3*1024*1024)) // if the log's too big, don't open it!
	{
		if (grep("/BUILD FAILED/", "$PWD${path}buildlog.txt"))
		{
			$icon = "not";
			$result = "FAILED"; // BUILD
		}
	}

	if (is_file("$PWD${path}index.html"))
	{
		$indexHTML = file_contents("$PWD${path}index.html");
		$zips = loadDirSimple($PWD . $path, ".zip", "f"); // get files count
		$md5s = loadDirSimple($PWD . $path, ".zip.md5", "f"); // get files count

		if ((sizeof($zips) >= 7 && sizeof($md5s) >= 7))
		{
			//check testResults.php for results
			if (is_file("$PWD${path}testResults.php"))
			{
				$testResultsPHP = file("$PWD${path}testResults.php");
				$link2 = "$pre$mid${path}testResults.php";
				foreach ($testResultsPHP as $tr)
				{
					if (preg_match("/<td>(\d*)<\/td><td>(\d*)<\/td><\/tr>/", $tr))
					{
						$rows = explode("<tr>", $tr); // break into pieces
						foreach ($rows as $r => $row)
						{
							$m = null;
							if (preg_match("/<td>(\d*)<\/td><td>(\d*)<\/td><\/tr>/", $row, $m))
							{
								$errors   += $m[1];
								$warnings += $m[2];
							}
						}
					}
				}
			}

			if ($icon == "")
			{
				if ($errors)
				{
					$icon = "not";
					$result = "COMPILER ERROR";
				}
				else
				{
					$icon = ($warnings ? "check-maybe" : "check");
					$result = "";
				}
			}

		}

		// parse out the check/fail icons in index.html, if we haven't failed already
		if ($icon != "not")
		{
			if (preg_match("/<font size=\"-1\" color=\"#FF0000\">skipped<\/font>/", $indexHTML))
			{
				$result = "Skipped";
				$icon = "check-maybe";
			}
			else if (preg_match("/(?:<!-- Examples -->.*FAIL\.gif|FAIL\.gif.*<!-- Automated Tests -->)/s", $indexHTML))
			{
				$result = "FAILED";
				$icon = "not";
			}
			else if (preg_match("/<!-- Automated Tests -->.*FAIL\.gif.*<!-- Examples -->/s", $indexHTML))
			{
				$result = "TESTS FAILED";
				$icon = "check-tests-failed";
			}
		}
	}

	if (!$icon)
	{
		// display in progress icon & link to log
		$result = "...";
		$icon = "question";
	}

	global $doRefreshPage;
	if ($isEMFserver && $icon == "question" && is_file("$PWD${path}buildlog.txt") && filesize("$PWD${path}buildlog.txt") < (3*1024*1024))
	{
		if ($isEMFserver && grep("/\[start\] start\.sh finished on: /", "$PWD${path}buildlog.txt"))
		{
			$icon = "not"; //display failed icon - not in progress anymore!
			$result = "FAILED"; // BUILD
		}

		if ($result != "FAILED" && strtotime("now") - filemtime("$PWD${path}buildlog.txt") < 7200)
		{
			$doRefreshPage = true;
		}
		else
		{
			$mightHavePassed = false;
			if (grep("BUILD SUCCESSFUL", "$PWD${path}buildlog.txt"))
			{
				$mightHavePassed = true;
			}
			else if (grep("BUILD FAILED", "$PWD${path}buildlog.txt"))
			{
				$icon = "not"; //display failed icon
				$result = "FAILED"; // BUILD
			}

			if ($result != "FAILED" && $mightHavePassed)
			{
				$result = "Stalled!";
				$icon = "check-maybe";
			}
			else if ($result != "FAILED" && !$mightHavePassed)
			{
				$result = "FAILED";
				$icon = "not";
			}
		}
	}

	if (!$link) // return a string with icon, result, and counts (if applic)
	{
		$link = ($isEMFserver ? "/emf/build/log-viewer.php?build=$path" : "http://download.eclipse.org/"."$mid${path}buildlog.txt");
	}

	if (!$link2) // link to console log in progress if it exists
	{
		$ID = substr($path, -14);
		$conlog = "${path}testing/${ID}testing/linux.gtk_consolelog.txt";
		$testlog = "${path}testResults.php";
		$link2 = (is_file("$PWD$conlog") ? "$mid$conlog" : (is_file("$PWD$testlog") ? "$mid$testlog" : $link));
		$result = (is_file("$PWD$conlog") ? "Testing..." : $result);
	}
	$link2 = ($isEMFserver ? "" : "http://download.eclipse.org/").$link2;
	
	$out .= "<a href=\"$link2\">$result";
	$out .= ($errors == 0 && $warnings == 0) && !$result ? "Success" : "";
	$out .= ($errors > 0 || $warnings > 0) && $result ? ": " : "";
	$out .= ($errors > 0 ? "$errors E, $warnings W" : ($warnings > 0 ? "$warnings W" : ""));
	$out .= "</a> <a href=\"$link\"><img src=\"http://www.eclipse.org/emf/images/$icon.gif\" alt=\"$icon\"/></a>";

	return $out;
}

function fileFound($PWD, $url, $label) //only used once
{
	global $isEMFserver, $downloadScript, $downloadPre;

	$mid = "$downloadPre/tools/emf/downloads/drops/"; // new for www.eclipse.org centralized download.php script

	return (is_file("$PWD$url.md5") ? "<div>" . pretty_size(filesize("$PWD$url")) . " (<a href=\"" . ($isEMFserver ? "" : "http://download.eclipse.org") . "$mid$url.md5\">md5</a>)</div>" : "") . "<a href=\"$downloadScript$pre$mid$url\">$label</a>";
}

function pretty_size($bytes)
{
	$sufs = array("B", "K", "M", "G", "T", "P"); //emf shouldn't be larger than 999.9 petabytes any time soon, hopefully
	$suf = 0;

	while ($bytes >= 1000)
	{
		$bytes /= 1024;
		$suf++;
	}

	return sprintf("%3.1f%s", $bytes, $sufs[$suf]);
}

function requirementsNote()
{ ?>
<!-- requirements note -->
<div class="homeitem3col">
<h3>Usage notes</h3>
<ul>
	<li><i><b>Please note:</b></i><a name="emfruntimenote">&#160;</a>Use of XSD requires the EMF Runtime (RT) Package, or the complete SDK.</li>
	<li><i><b>Please note:</b></i><a name="xsdruntimenote">&#160;</a>Use of XML Schema (XSD) models with EMF or SDO, requires the XSD Runtime (RT) Package, or the complete SDK.</li>
</ul>
</div>
<?php }

function doRequirements()
{
?>
<!-- requirements -->
<div class="homeitem3col">
	<h3>Requirements</h3>
	<p><b>First-time users</b> can get started quickly by simply downloading the
	combined <b class="all">ALL</b> SDK bundle (includes source, runtime and docs
	for <b class="emf">EMF</b>, <b class="xsd">XSD</b>, and <b class="sdo">SDO</b>).
	Specific Eclipse and JDK requirements are below - to know which Eclipse driver was used to build a given EMF release,
	check below under <b>Build Dependencies</b>. </p>
	<p>Note that Eclipse is only required if you intend to use the UI - for runtime-only use, only a JDK is required.</p>

	
	<ul id="requirements">
		<li>
			<a href="javascript:toggle('req2_2_0')">EMF 2.2.1, 2.2.0</a>
			<ul id="req2_2_0">
				<li>Eclipse 3.2.1 or 3.2.0</li>
				<li>Java 1.4.2 or 1.5.0</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req2_1_0')">EMF 2.1.2, 2.1.1, 2.1.0</a>
			<ul id="req2_1_0" style="display: none">
				<li>Eclipse 3.1.2, 3.1.1, 3.1.0, respectively</li>
				<li>Java 1.4.2</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req2_0_0')">EMF 2.0.5-2.0.2, 2.0.1, 2.0.0</a>
			<ul id="req2_0_0" style="display: none">
				<li>Eclipse 3.0.2, 3.0.1, 3.0.0, respectively</li>
				<li>Java 1.4.2</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('req1_x')">EMF 1.x</a>
			<ul id="req1_x" style="display: none">
				<li>Eclipse 2.x</li>
				<li>Java 1.3.1</li>
			</ul>
		</li>
	</ul>
</div>

<?php }

function doLanguagePacks()
{
	global $downloadScript, $downloadPre; ?>
<!-- language packs -->
<div class="homeitem3col">
	<a name="NLS"></a>
	
	<h3>Language Packs</h3>

	<p>IBM is pleased to contribute translations for the Eclipse Modeling Framework.</p>
	<ul>
		<li>
			<a href="javascript:toggle('lang2_2')">2.2.x Language Packs</a><a name="NL22x"></a>
			<ul id="lang2_2">
					<?php
					$packs = array (
						"2.2.x NLS Translation Packs" => "NLpacks-"
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo",
						"XSD" => "xsd"
					);
					$subcols = array (
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.2.zip";
					$folder = "NLS/2.2/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpack2a - Danish, Dutch, Finnish, Greek, Norwegian, Portuguese, Swedish and Turkish</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 4 other zips (one for each of the language groups above). Unpack these zips into your Eclipse directory before starting Eclipse.</p>
					<p>These translations are based on EMF 2.2.0. The NLS translation fragment packs should work with all subsequent 2.2 maintenance releases, with any new strings remaining untranslated.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang2_1')">2.1.x Language Packs</a><a name="NL21x"></a>
			<ul id="lang2_1" style="display: none">
					<?php
					$packs = array (
						"2.1.x NLS Translation Packs" => "NLpacks-"
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo",
						"XSD" => "xsd"
					);
					$subcols = array (
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.1.zip";
					$folder = "NLS/2.1/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
						<li>NLpackBidi - Arabic</li>
					</ul>
					<p>Each language pack zip contains 6 other zips (two for each of the language groups above: an NLS translation fragment pack and a feature overlay). Unpack both these zips (for every language group you need) into your Eclipse directory before starting Eclipse. In particular, the feature overlay must actually write into the existing feature directories.</p>
					<p>These translations are based on EMF 2.1.1. The NLS translation fragment packs should work with all subsequent 2.1 maintenance releases, with any new strings remaining untranslated. The feature overlays will need to be reissued for each subsequent release.</p>
				</li>
			</ul>
		</li>

		<li>
			<a href="javascript:toggle('lang2_0')">2.0.x Language Packs</a><a name="NL20x"></a>
			<ul id="lang2_0" style="display: none">
					<?php
					$packs = array (
						"2.0.x NLS Translation Packs" => "NLpacks-",
					);
					$cols = array (
						"EMF, SDO" => "emf-sdo",
						"XSD" => "xsd"
					);
					$subcols = array (
						"SDK" => "SDK-",
						"Runtime" => "runtime-"
					);
					$packSuf = "2.0.zip";
					$folder = "NLS/2.0/";
					doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, true); ?>
				<li>
					<p>The language packs contain the following translations:</p>
					<ul>
						<li>NLpack1 - German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese, Simplified Chinese</li>
						<li>NLpack2 - Czech, Hungarian, Polish, Russian</li>
					</ul>
					<p>Each language pack zip contains 2 zips (one for each of the language groups above). Each language pack is distributed as a feature which you can install by downloading the zip file, unzipping it into your Eclipse directory and restarting Eclipse.</p>
					<p>These translations are based on the EMF, SDO and XSD 2.0.2 builds but should work with all subsequent 2.0 maintenance releases. If new strings are added to EMF, SDO or XSD after 2.0.2, they will not show up as translated in the 2.0.x stream when you install this language pack.</p>
				</li>
			</ul>
		</li>
	</ul>
</div>

<?php }

function doNLSLinksList($packs, $cols, $subcols, $packSuf, $folder, $isArchive = false)
{
	global $downloadScript, $downloadPre;
	$cnt = 0;

	foreach ($packs as $name => $packPre)
	{
		foreach ($cols as $alt => $packMid)
		{
			print "<li><img src=\"http://www.eclipse.org/emf/images/dl-$packMid.gif\" alt=\"$alt\"/> $alt: ";
			$cnt=0;
			foreach ($subcols as $alt2 => $packMid2)
			{
			  if ($cnt>0) { print ", "; }
			  print "<a href=\"".($isArchive?"http://archive.eclipse.org":$downloadScript).
			    "$downloadPre/tools/emf/downloads/drops/$folder$packPre$packMid-$packMid2$packSuf\">$alt2</a>";
			  $cnt++;
			}
			print "</li>\n";
		}
	}
}

function grep($pattern, $file)
{
	$filec = (is_file($file) && is_readable($file) ? file($file) : array());

	foreach ($filec as $z)
	{
		if (preg_match($pattern, $z))
		{
			return true;
		}
	}

	return false;
}

function outputBuild($branch, $ID, $c)
{
	global $PWD, $isEMFserver, $dls, $filePre, $jdk14testsPWD, $jdk50testsPWD, $testsPWD;
	$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

	$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/", "(\.zip)", "f");
	// for testing, you can find a list of files like this:
	// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`
	$ziplabel = (sizeof($zips_in_folder) < 1) ? $ID :
		preg_replace("/(.+)\-([^\-]+)(\.zip)/", "$2", $zips_in_folder[0]); // grab first entry

	// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
	$IDlabel = $ziplabel;

	if ($isEMFserver)
	{
	  // TODO: why is there no value for $summary?
		$tests = getJDKTestResults("$jdk14testsPWD/", "$branch/$ID/", "jdk14", $summary) . "\n";
		$summary .= ($summary ? "</span><span>" : "");
		$tests .= getJDKTestResults("$jdk50testsPWD/", "$branch/$ID/", "jdk50", $summary) . "\n";
		$summary .= ($summary ? "</span><span>" : "");
		$tests .= getOldTestResults("$testsPWD/", "$branch/$ID/", $summary) . "\n";
		$summary = ($summary ? "<span>$summary</span>" : "");
	}

	$ret = "<li>\n";
	$ret .= "<div>" . showBuildResults("$PWD/", "$branch/$ID/") . ($isEMFserver && $summary ? $summary : "") . "</div>";
	$ret .= "<a href=\"javascript:toggle('r$ID')\"><i>$IDlabel</i> (" . IDtoDateStamp($ID, ($isEMFserver ? 0 : 1)) . ")</a><a name=\"$ID\"> </a> <a href=\"?showAll=1&amp;hlbuild=$ID#$ID\"><img alt=\"Link to this build\" src=\"../images/link.png\"/></a>";

	$ret .= "<ul id=\"r$ID\"" . (($c == 0 && !isset($_GET["hlbuild"])) || $ID == $_GET["hlbuild"] ? "" : " style=\"display: none\"") . ">\n";
	$ret .= createFileLinks($dls, $PWD, $branch, $ID, $pre2, $filePre, $ziplabel);

	$ret .= $tests;
	$ret .= getBuildArtifacts("$PWD", "$branch/$ID");
	$ret .= "</ul>\n";
	$ret .= "</li>\n";

	return $ret;
}

function getBuildArtifacts($dir, $branchID)
{
	global $isEMFserver, $downloadPre;

	$deps = array(
		"eclipse" => "<a href=\"http://www.eclipse.org/eclipse/\">Eclipse</a>"
	);
	$mid = "$downloadPre/tools/emf/downloads/drops/";
	$file = "$dir/$branchID/build.cfg";
	$lines = (is_file($file) && is_readable($file) ? file($file) : array());

	foreach ($lines as $z)
	{
	  $regs = null;
		if (preg_match("/^((?:" . join("|", array_keys($deps)) . ")(?:DownloadURL|File|BuildURL))=(.+)$/", $z, $regs))
		{
			$opts[$regs[1]] = $regs[2];
		}
	}

	foreach (array_keys($deps) as $z)
	{
		$builddir[$z] = $opts["${z}DownloadURL"] . $opts["${z}BuildURL"];
		$buildID[$z] = (preg_match("/([IMNRS]?\d{8}-?\d{4})$/", $opts["${z}BuildURL"], $regs) ? $regs[1] : "");
		$buildfile[$z] = $builddir[$z] . "/" . $opts["${z}File"];
	}

	$ret = "";
		
	if (is_array($builddir) > 0)
	{
		$details = array(
			"Config File" => "build.cfg",
			"Map File" => "directory.txt",
			"Build Log" => "buildlog.txt"
		);
		
		$link = ($isEMFserver ? "" : "http://download.eclipse.org");
		
		$ret .= "<li>\n";
		$ret .= "<img src=\"http://www.eclipse.org/emf/images/dl-deps.gif\" alt=\"Upstream dependencies used to build this driver\"/> Build Dependencies\n";
		$ret .= "<ul>\n";
		foreach (array_keys($deps) as $z)
		{
			$ret .= "<li><div><a href=\"$builddir[$z]\">Build Page</a></div>$deps[$z] <a href=\"$buildfile[$z]\">$buildID[$z]</a></li>\n";
		}
		$ret .= "</ul>\n";
		$ret .= "</li>\n";

		$ret .= "<li>\n";
		$ret .= "<img src=\"http://www.eclipse.org/emf/images/dl-more.gif\" alt=\"More info about this build\"/> Build Details\n";
		$ret .= "<ul>\n";
		$ret .= "<li><a href=\"$link$mid${branchID}/testResults.php\">Test Results &amp; Compile Logs</a></li>\n";
		foreach (array_keys($details) as $label)
		{
			$details[$label] = preg_replace("/^(.+)$/", "<a href=\"$link$mid$branchID/$1\">$label</a>", $details[$label]);
		}
		$ret .= "<li>" . join(", ", $details) . "</li>\n";
		$ret .= "</ul>\n";
		$ret .= "</li>\n";
	}
	return $ret;
}

function showToggle($showAll, $showMax, $sortBy, $count)
{
	$ret = "<li><a href=\"" . $_SERVER["PHP_SELF"] . "?showAll=" . ($showAll == "1" ? "" : "1") . "&amp;showMax=$showMax&amp;sortBy=$sortBy\">" . ($showAll != "1" ? "show all $count" : "show only $showMax") . "...</a></li>\n";

	return $ret;
}

function showArchived()
{
	$oldrels = array("2.1.1" => "200509281310",
		"2.1.0" => "200507070200",
		"2.0.5" => "200511291418",
		"2.0.4" => "200509300951",
		"2.0.3" => "200506091052",
		"2.0.2" => "200503151315",
		"2.0.1" => "200409171617",
		"2.0.0" => "200406280827"
	);

	print "<div class=\"homeitem3col\">\n";
	print "<h3>Archived Releases<a name=\"archives\"> </a></h3>\n";
	print "<p>Older EMF, SDO and XSD releases have been moved to archive.eclipse.org, and can be accessed here:</p>";
	print "<ul id=\"archives\">\n";
	foreach (array_keys($oldrels) as $z)
	{
		print "<li><a href=\"http://archive.eclipse.org/tools/emf/downloads/drops/$z/R$oldrels[$z]\">$z</a> (" . IDtoDateStamp($oldrels[$z], 0) . ")</li>\n";
	}
	print "<li><a href=\"http://www.eclipse.org/emf/downloads/dl-emf1x.html\">1.x</a> (2003)</li>\n";
	print "</ul>\n";
	print "</div>\n";
}

function file_contents($file) //TODO: remove this when we upgrade php to >= 4.3.0 everywhere
{
	if (function_exists(file_get_contents))
	{
		return file_get_contents($file);
	}
	else
	{
		return join("", file($file));
	}
}
?>
