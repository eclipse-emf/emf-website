<?php 
require_once($_SERVER['DOCUMENT_ROOT'] ."/emf/includes/header.php"); 

if (!$isWWWserver) 
{ 
	header("Location: http://www.eclipse.org/emf/docs.php");
	exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$dirName = str_replace("/index.php","",$_SERVER["SCRIPT_NAME"]);
$dirName = explode("/",$dirName); $dirName = $dirName[sizeof($dirName)-1]; 
$files = loadDirSimple($_SERVER['DOCUMENT_ROOT'] . "/emf/docs/presentations/" . ($dirName!='presentations'?$dirName:""), ".*", $dirName!='presentations'?"f":"d");
print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Presentation Materials '.($dirName!='presentations'?'From '.$dirName:'').'</h3>
<ul>
';
if (sizeof($files)>2) { 
	rsort($files);
	foreach ($files as $file) { 
		if ($file != "CVS" && $file !="index.php")
		print '<li><a href="'.$file.'">'.str_replace("_"," ",$file).'</a></li>'."\n";
	}
} else {
	print "<li>No presentation materials found!</li>\n";
}
print '</ul>
</div>
<div id="midcolumn">
<div class="homeitem3col">
<h3>Other Documentation</h3>
<ul>
	<li><a href="/emf/docs/">Other Documentation</a></li>
</ul>
</div>

</div>';

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Presentation Materials";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

?>