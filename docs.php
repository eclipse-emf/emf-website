<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
include_once $pre . "includes/header.php";  //actually needed here, for $CVSpre stuff
$doc = $_GET["doc"]; //FIXME: gaping security hole!
if ($doc && $doc != "docs/docs.xml")
{
	if (preg_match("/^http/", $doc))
	{
		header("Location: " . $doc);
		exit;
	} 
	else
	{
		if (false !== strpos($doc, "org.eclipse.xsd.doc/")) // xsd docs
		{
			$doc = str_replace("org.eclipse.xsd.doc/", "", $doc);
			header("Location: " . $CVSpreDocXSD . $doc);
			exit;
		}
		else if (false !== strpos($doc, "org.eclipse.emf.ecore.sdo.doc/")) // sdo docs
		{
			$doc = str_replace("org.eclipse.emf.ecore.sdo.doc/", "", $doc);
			header("Location: " . $CVSpreDocSDO . $doc);
			exit;
		}
		else if (strstr($doc, "docs/"))
		{ 
			header("Location: " . $CVSpre . $doc);
			exit;
		}
		else if (strstr($doc, "references/") || strstr($doc, "tutorials/"))
		{ 
			header("Location: " . $CVSpreDocEMF . $doc);
			exit;
		} 
	}
}
$pre = "";

echo "<div id=\"midcolumn\">\n";
include("docs/docs.xml");
echo "</div>\n";

$html = ob_get_contents();
ob_end_clean();

/* get filemtime from the directory: */
$jPWD = "../javadoc"; // path on downloads.eclipse.org & mirrors
if (is_dir($jPWD) && is_readable($jPWD))
{ 
	$rep = date('F j\<\s\u\p\>S\<\/\s\u\p\> Y', filemtime($jPWD));
	$html = preg_replace("/see most recent build date/", $rep, $html);
} 

$pageTitle = "Eclipse Tools - EMF Documents";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/docs.css"/>' . "\n");

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>

<!-- $Id: docs.php,v 1.12 2006/08/21 21:29:41 nickb Exp $ -->
