<?php
	include_once $pre . "includes/scripts.php"; 
	$WWWpre = "http://www.eclipse.org/emf/"; 
	$WWWprePhysical = "/home/data/httpd/www.eclipse.org/html/emf/";
	$WWWpreXSD = "http://www.eclipse.org/xsd/";

	$isEMFserver = (preg_match("/emf/", $_SERVER["SERVER_NAME"]));
	$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
	$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.)eclipse.org$/", $_SERVER["SERVER_NAME"]));

	$_url = "";
	if ($isEMFserver)
	{
		$_url = "http://emf.torolab.ibm.com";
	}
	else
	{ 
		$_url = "http://dev.eclipse.org";
	}
	// TODO: all these docs should be migrated out of emf-home and into www/emf
	$CVSpre       = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
	$CVSpreEMF    = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
	$CVSpreXSD    = "$_url/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
	$CVSpreDocEMF = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
	$CVSpreDocSDO = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
	$CVSpreDocXSD = "$_url/viewcvs/indextech.cgi/%7Echeckout%7E/org.eclipse.xsd/doc/org.eclipse.xsd.doc/";
?>
