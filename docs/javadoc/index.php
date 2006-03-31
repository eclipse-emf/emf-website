<?php 
	/* if on www.eclipse.org, redirect to download; if on download or mirror, present a list of avail javadoc versions available */
	/* if querystring value, pick latest version of javadoc and serve up that page */

	$isWWWserver = ($SERVER_NAME=="www.eclipse.org"||$SERVER_NAME=="eclipse.org");

	$pre = false!==strpos($SCRIPT_NAME,"sdo") || false!==strpos($SCRIPT_NAME,"xsd") ? "../../../" : "../../"; // or ../../../ for sdo/xsd
	$folder = substr($SCRIPT_NAME,0,strrpos($SCRIPT_NAME,"/"));
	
	if ($isWWWserver) { 
		header("Location: http://download.eclipse.org/tools/emf/javadoc/");
		exit;
	} else if ($QUERY_STRING) {
		// given http://emf.torolab.ibm.com/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details
		// serve http://emf.torolab.ibm.com/tools/emf/xsd/2.1.0/javadoc/org/eclipse/xsd/package-summary.html#details
		$vers = loadDirSimple("../","(\d\.\d|\d\.\d\.\d+)","d");
		if (sizeof($vers)>0) { 
			rsort($vers);
			//echo "Location: ".str_replace("javadoc",$vers[0]."/javadoc",$folder)."/".$QUERY_STRING; // test w/o redirect
			header("Location: ".str_replace("javadoc",$vers[0]."/javadoc",$folder)."/".$QUERY_STRING);
		} else {
			header("Location: http://download.eclipse.org/tools/emf/javadoc/");
		}
		exit;
	} else {
		$vers = loadDirSimple("../","(\d\.\d|\d\.\d\.\d+)","d");
		if (sizeof($vers)>0) { ?><!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Eclipse Tools - EMF Project - Javadoc</title>
<link rel="stylesheet" href="http://www.eclipse.org/default_style.css" type="text/css">
</head>
<body>
<?php
			echo "<table>\n";
			echo "<tr><td colspan=\"3\"><b>Choose Javadoc version:</b></td></tr>";
			rsort($vers);
			foreach ($vers as $ver) { 
				echo '<tr><td> &#149; <a href="'.$pre.'emf/'.$ver.'/javadoc">EMF '.$ver.'</td>';
				echo '<td> &#149; <a href="'.$pre.'emf/sdo/'.$ver.'/javadoc">SDO '.$ver.'</td>';
				echo '<td> &#149; <a href="'.$pre.'emf/xsd/'.$ver.'/javadoc">XSD '.$ver.'</td></tr>';
			}
			echo "</table>\n";
		} else {
			echo "No javadoc versions found!";
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