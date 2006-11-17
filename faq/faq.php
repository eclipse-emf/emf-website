<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$fileBase = 'file://' . getcwd() . '/';
$XMLfile = "faq.xml";
$XSLfile = "faq.xsl";
$params = array();
$result = "";

/*
 * To work, this script must be run with a version of PHP4 with Sablotron XSLT or PHP 5 with XSL
 */

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
		$_SERVER["SCRIPT_NAME"] . "\">http://www.eclipse.org" . 
		$_SERVER["SCRIPT_NAME"] . "</a></li>" .
			"</ul>\n";
	print "</div></div>\n";	
}
echo $result; 

$html = ob_get_contents();
ob_end_clean();
$html = preg_replace('/^\Q<?xml version="1.0" encoding="ISO-8859-1"?>\E/', "", $html);
$html = preg_replace("/<(link|div) xmlns:\S+/", "<$1", $html);

$pageTitle = "Eclipse Tools - EMF FAQ";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/faq.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
