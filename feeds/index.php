<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));

$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());

if ($isWWWserver)
{
	$PWD = "/home/local/data/httpd/download.eclipse.org/tools/emf/";
	$jdPWD = "/downloads/download.php?file=/tools/emf/";
}
else
{
	$PWD = "../../tools/emf/";
	$jdPWD = $PWD;
}

ob_start();

print '<div id="midcolumn">
<div class="homeitem3col">
<h3>RSS Feeds</h3>
<ul>
';

print '<li><b>Build Feeds</b>' . "\n";
$feeds = loadDirSimple(".", "builds-.+\.xml", "f");
sort($feeds);
reset($feeds);
foreach ($feeds as $feed)
{
	if (false === strpos($feed, "-N.xml"))
	{
		print '<ul><li><a href="' . $jdPWD . 'feeds/' . $feed . '">' . strtoupper(preg_replace("/builds-(.+).xml/", "$1", $feed)) . '</a></li></ul>' . "\n";
	}
}
print '</li>' . "\n";

print "</ul>\n";

print "</div></div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF - RSS Feeds";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>