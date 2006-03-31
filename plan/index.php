<?php 
	/* if on www.eclipse.org, redirect to download; if on download or mirror, present a list of avail javadoc versions available */
	/* if querystring value, pick latest version of javadoc and serve up that page */

	$isWWWserver = ($SERVER_NAME=="www.eclipse.org"||$SERVER_NAME=="eclipse.org");
	
	if (!$isWWWserver) { 
		header("Location: http://eclipse.org/emf/plan/");
		exit;
	} else {
		$vers = loadDirSimple(".","plan-(\d\.\d|\d\.\d\.\d+)\.xml","f");
		if (sizeof($vers)>0) { ?><!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Eclipse Tools - EMF Development Plans</title>
<link rel="stylesheet" href="http://www.eclipse.org/default_style.css" type="text/css">
</head>
<body>
<?php
			echo "<table>\n";
			echo "<tr><td colspan=\"3\"><b>Choose plan version:</b></td></tr>";
			rsort($vers);
			foreach ($vers as $ver) { 
				echo '<tr><td> &#149; <a href="/emf/plan/'.$ver.'">EMF Development Plan '.preg_replace("/plan-([\d\.]+)\.xml/","$1",$ver).'</a> (<a href="view-source:http://eclipse.org/emf/plan/'.$ver.'">XML Source</a>)</td></tr>';
			}
			echo "</table>\n";
		} else {
			echo "No plan docs found!";
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