<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$pre = "../";

/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 */

$processor = xslt_create();
$fileBase = 'file://' . getcwd() . '/';
xslt_set_base($processor, $fileBase);
$XMLfile = "faq.xml";
$result = xslt_process($processor, $fileBase . $XMLfile, $fileBase . 'faq.xsl', NULL, array(), array());

if(!$result) echo xslt_errno($processor) . " : " . xslt_error($processor);
echo $result; ?>

<?php
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
