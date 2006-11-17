<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

// Process query string
$params = array();
if (isset($_GET["version"]) && preg_match("/^(\d\.\d(?:\.\d)?)$/", $_GET["version"], $regs))
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

if (isset($_GET["project"]) && preg_match("/^(" . join($projects, "|") . ")$/", $_GET["project"], $regs))
{
	$params["project"] = $regs[1];
}
else
{
	$params["project"] = "";
}

$projectArray = $projects;

/*
 * To work, this script must be run with a version of PHP4 with Sablotron XSLT or PHP 5 with XSL
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
		$fileBase = 'file://' . getcwd() . '/';
		$result = "";
		
		if (phpversion() >= 5 && class_exists('DOMDocument') && class_exists('XSLTProcessor'))
		{
	 		// PHP 5 w/ XSL
	 	    $doc = new DOMDocument();
		    $xsl = new XSLTProcessor();
		 
		    $doc->load($fileBase . $XSLfile);
		    $xsl->importStyleSheet($doc);
		 
		    $doc->load($fileBase . $XMLfile);
		    foreach ($params as $param => $paramVal)
		    {
			    $xsl->setParameter('', $param, $paramVal);
		    }
	 
		    $result = $xsl->transformToXML($doc);
			if (!$result)
			{
				
				print '<div id="midcolumn"><div class="homeitem3col"><h3>An error has occurred!</h3>'."\n";
				print "<ul><li><b>PHP5::XSL:</b> A problem occurred trying to parse $XMLfile with $XSLfile!</li></ul>";
				print "</div></div>\n";	
			}
		}
		else if (phpversion() >=4 && function_exists('xslt_create'))
		{
	 		// PHP 4 w/ Sablotron
			$processor = xslt_create();
			xslt_set_base($processor, $fileBase);
			$result = xslt_process($processor, $fileBase . $XMLfile, $fileBase . $XSLfile, NULL, array(), $params);
			if (!$result)
			{
				print '<div id="midcolumn"><div class="homeitem3col"><h3>An error has occurred!</h3>'."\n";
				print "<ul><li><b>PHP4::Sablotron XSLT:</b> Trying to parse $XMLfile with $XSLfile: ";
				print "ERROR #" . xslt_errno($processor) . " : " . xslt_error($processor);
				print "</li></ul></div></div>\n";	
			}
		}
		else
		{
			print '<div id="midcolumn"><div class="homeitem3col"><h3>An error has occurred!</h3>'."\n";
			print "<ul><li><b>PHP::No XSLT:</b> This page cannot be displayed. " .
					"Try here instead: <a href=\"http://www.eclipse.org" . 
				$_SERVER["SCRIPT_NAME"] . "?project=" . $params["project"] . "&amp;version=" . $params["version"] . "\">http://www.eclipse.org" . 
				$_SERVER["SCRIPT_NAME"] . "?project=" . $params["project"] . "&amp;version=" . $params["version"] . "</a></li>" .
					"</ul>\n";
			print "</div></div>\n";	
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
