<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

print "<div id=\"midcolumn\">\n";
print "<div class=\"homeitem3col\">\n";
print "<h3>All News</h3>\n";
getNews(-1, "all", "vert");
print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Modeling - EMF - News";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/docs.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
