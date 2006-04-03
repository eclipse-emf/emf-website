<?php 
	/* if on www.eclipse.org, redirect to download; if on download or mirror, present a list of avail javadoc versions available */
	/* if querystring value, pick latest version of javadoc and serve up that page */

	$isWWWserver = ($SERVER_NAME=="www.eclipse.org"||$SERVER_NAME=="eclipse.org");
	
	if (!$isWWWserver) { 
		header("Location: http://www.eclipse.org/emf/plan/");
		exit;
	} else {
		$files = loadDirSimple(".",".*","f");
		if (sizeof($files)>0) { ?><!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>EclipseCon Presentations: EMF</title>
<link rel="stylesheet" href="http://www.eclipse.org/default_style.css" type="text/css">
</head>
<body>
<?php
			echo "<table>\n";
			echo "<tr><td colspan=\"3\"><b>Choose:</b></td></tr>";
			rsort($files);
			foreach ($files as $file) { 
				if (false===strpos($file,"CVS") && false===strpos($file,"index")) {
					echo '<tr><td> &#149; <a href="/emf/docs/presentations/EclipseCon/'.$file.'">'.$file.'</a></td></tr>';
				}
			}
			echo "</table>\n";
		} else {
			echo "No presentation docs found!";
		}
	}

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