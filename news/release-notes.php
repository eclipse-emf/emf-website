<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

// Process query string
$params = array();
if (preg_match("/^(\d\.\d(?:\.\d)?)$/", $_GET["version"], $regs))
{
	$params["version"] = $regs[1];
}
else
{
	$params["version"] = "";
}

// if available, bounce to a static file rather than the xslt'd xml
if ($params["version"] && is_file("release-notes" . $params["version"] . ".php"))
{
	header("Location: http://www.eclipse.org/emf/news/release-notes" . $params["version"] . ".php");
	exit;
}

if (preg_match("/^(" . join($projects, "|") . ")$/", $_GET["project"], $regs))
{
	$params["project"] = $regs[1];
}
else
{
	$params["project"] = "";
}

$projectArray = $projects;

/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet:
 *  
 * 	<xsl:param name="project"></xsl:param> <!-- this is used for multiple projects in the same file -->
 * 	<xsl:param name="version"></xsl:param>
 */

print '<div id="midcolumn"><h1>Release Notes</h1>'."\n";
//print doSelectProject($projectArray, $proj, $nomenclature, "homeitem3col"); // not required yet
print "</div>\n";	

if (true)
{
	// define XML and XSL sources 
	$ver = $params["version"];
	$XMLfile = "release-notes" .  ($ver == "" ? "" : "-$ver") . ".xml";
	$XMLfile = (is_file($XMLfile) ? $XMLfile : "release-notes.xml");
	if (is_file($XMLfile))
	{
		$XSLfile = "release-notes.xsl";
		
		$processor = xslt_create();
		$fileBase = 'file://' . getcwd() . '/';
		xslt_set_base($processor, $fileBase);
		$result = xslt_process($processor, $fileBase . $XMLfile, $fileBase . $XSLfile, NULL, array(), $params);
		
		if (!$result)
		{
			print "Trying to parse $XMLfile with $XSLfile...<br/>";
			print "ERROR #" . xslt_errno($processor) . " : " . xslt_error($processor);
		}
		
		print $result;
	} 
}

$html = ob_get_contents();
ob_end_clean();
$html = preg_replace('/^\Q<?xml version="1.0" encoding="ISO-8859-1"?>\E/', "", $html);
$html = preg_replace("/<(link|div) xmlns:\S+/", "<$1", $html);

$pageTitle = "Eclipse Modeling - EMF - Release Notes";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch, Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/relnotes.css"/>' . "\n");
$App->AddExtraHtmlHeader('<script src="/emf/includes/toggle.js" type="text/javascript"></script>' . "\n"); //ie doesn't understand self closing script tags, and won't even try to render the page if you use one
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
