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
$files = loadDirSimple("$dirName",".*");
print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Presentation Materials '.($dirName!='presentations'?'From '.$dirName:'').'</h3>
<ul>
';
if (sizeof($files)>0) { 
	rsort($files);
	foreach ($files as $file) { 
		print '<li><a href="'.$file.'">'.$file.'</a></li>'."\n";
	}
} else {
	print "<li>No presentation materials found!</li>\n";
}
print '</ul>
</div>
</div>';

/**********************/

function loadDirSimple($dir,$ext) { // 1D array
	$stuff = array();
	if (is_dir($dir) && is_readable($dir)) { 
		ini_set("display_errors","0"); // suppress file not found errors
		$handle=opendir($dir);
		while (($file = readdir($handle))!==false) {
		  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $file!="CVS" && $file!="index.php") { 
			  $stuff[] = "$file"; 
		  }
		}
		closedir($handle); 
		ini_set("display_errors","1"); // and turn 'em back on.
	} else {
		//exit;
	}
	return $stuff;
}
?>