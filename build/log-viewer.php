<?php 
# TODO: remove this when migrated to /modeling/emf
require_once($_SERVER['DOCUMENT_ROOT'] . "/emf/includes/header.php"); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

internalUseOnly(); 

/* from $_GET */
$params = array(
	"build" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/$#",
	"test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk13test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk14test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#",
	"jdk50test" => "#^\d+\.\d+\.\d+/[IMNRS]\d{12}/\d{12}/$#"
);

/* check these files, %s replaced with param from above */
$files = array(
	"build" => array("/var/www/tools/emf/downloads/drops/%sbuildlog.txt"),
	"test" => array("/var/www/tools/emf/tests/%stestlog.txt"),
	"jdk13test" => array("/var/www/tools/emf/jdk13tests/%stestlog.txt"),
	"jdk14test" => array("/var/www/tools/emf/jdk14tests/%stestlog.txt"),
	"jdk50test" => array("/var/www/tools/emf/jdk50tests/%stestlog.txt")
);

/* replace these values with key */
$reps = array(
	"o.e.emf" => "org.eclipse.emf",
	"o.e.e.r.build" => "org.eclipse.emf.releng.build",
	"o.e.r" => "org.eclipse.releng",
	"dd" => "/home/www-data/emf-build/tools/emf/downloads/drops",
	"tests" => "/home/www-data/tests/tools/emf/tests",
	"jdk13tests" => "/home/www-data/jdk13tests",
	"jdk14tests" => "/home/www-data/jdk14tests",
	"jdk50tests" => "/home/www-data/jdk50tests"
);

/* apply span class="key" */
$hl = array(
	"error" => "/(fail(?:ure)?|error|warning|could not|No such|cannot|usage:)/iS", //S for study (huge speed boost here)
	"fail" => "/(BUILD FAILED)/",
	"success" => "/(BUILD SUCCESSFUL)/"
);

/* remove these lines */
$filter = array(
	"/^\[CVS .+\] U.+$/" => "",
	"/^s+\n$/" => ""
);

foreach (array_keys($params) as $z)
{
	if (isset($_GET[$z]) && preg_match($params[$z], $_GET[$z]))
	{
		foreach ($files[$z] as $y)
		{
			$f = sprintf($y, $_GET[$z]);
			$args[] = "$z=" . $_GET[$z];
			if (!is_file($f) || !is_readable($f))
			{
				print "<b>Error:</b> $f is not a file or is not readable.\n";
				exit;
			}
		}
	}
}

if (isset($f))
{
	if (isset($_GET["head"]) && is_numeric($_GET["head"]))
	{
		exec("head -n" . $_GET["head"] . " $f", $log);
	}
	else if (isset($_GET["tail"]) && is_numeric($_GET["tail"]))
	{
		exec("tail -n" . $_GET["tail"] . " $f", $log);
	}
	else
	{
		exec("tail -n30 $f", $log);
	}
}
else
{
	print "Found nothing, quitting...\n";
	exit;
}

ob_start();

print "<div id=\"midcolumn\">\n";

options($args, $f);

/* batching all of these into one preg_replace is worth a very large (nearly an order of magnitude) speed boost */
$matches = preg_replace("/^(.+)$/", "!($1)!", array_values($reps));
$replacements = preg_replace("/^(.+)$/", "<abbr title=\"\\\$1\">$1</abbr>", array_keys($reps));

$matches = array_merge($matches, $hl);
$replacements = array_merge($replacements, preg_replace("/^(.+)$/", "<span class=\"$1\">\\\$1</span>", array_keys($hl)));

$matches = array_merge($matches, array_keys($filter));
$replacements = array_merge($replacements, $filter);

$log = preg_replace($matches, $replacements, $log);

$i = 0;
foreach ($log as $z)
{
	$i++;
	if ($z)
	{
		print "<pre><a name=\"l$i\" href=\"#l$i\">$i</a>" . wordwrap($z) . "</pre>\n";
	}
}

options($args, $f);

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - Log Viewer";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"/modeling/includes/log-viewer.css\"/>\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

function options($args, $f)
{
	print "<div class=\"options\">\n";
	print "<a href=\"?" . join("&amp;", $args) . "&amp;head=30\">head -n30</a>";
	print "<a href=\"?" . join("&amp;", $args) . "&amp;tail=30\">tail -n30</a>";
	print "<a href=\"" . preg_replace("#^/var/www#", "", $f) . "\">view unformatted</a>";
	print "</div>\n";
}
?>
