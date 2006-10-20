<?php 
$pre = "../../":$pre; 	
include_once $pre."includes/header.php"; 

if (!$isWWWserver) 
{ 
	header("Location: http://www.eclipse.org/emf/docs.php");
	exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$dirName = str_replace("/index.php","",$_SERVER["SCRIPT_NAME"]);
$dirName = explode("/",$dirName); $dirName = $dirName[sizeof($dirName)-1]; 
$files = loadDirSimple("$dirName",".*","f");
print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Presentation Materials '.($dirName!='presentations'?'From '.$dirName:'').'</h3>
<ul>
';
if (sizeof($files)>0) { 
	rsort($files);
	foreach ($files as $file) { 
		if (false===strpos($file,"CVS") && false===strpos($file,"index")) {
			echo '<li><a href="'.$file.'">'.$file.'</a></li>';
		}
	}
} else {
	echo "<li>No presentation materials found!</li>";
}
print '</ul>
</div>
</div>';

/**********************/

function loadDirSimple($dir,$ext,$type) { // 1D array
	$stuff = array();
	if (is_dir($dir) && is_readable($dir)) { 
		ini_set("display_errors","0"); // suppress file not found errors
		$handle=opendir($dir);
		while (($file = readdir($handle))!==false) {
		  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="f") { 
			  $stuff[] = "$file"; 
		  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
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