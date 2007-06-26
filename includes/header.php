<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php"; 
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
// TODO: verify if any of these are still needed: only used in this file, includes/scripts.php and docs/index.php
$CVSpre       = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
$CVSpreEMF    = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
$CVSpreXSD    = "$_url/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
$CVSpreDocEMF = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
$CVSpreDocSDO = "$_url/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
$CVSpreDocXSD = "$_url/viewcvs/indextech.cgi/%7Echeckout%7E/org.eclipse.xsd/doc/org.eclipse.xsd.doc/";

function isAuthorized () 
{
	global $theme, $isEMFserver;
	
	// must be on a build server and must not be on www.eclipse.org
	if ($isEMFserver && $_SERVER["DOCUMENT_ROOT"] != "/home/data/httpd/www.eclipse.org/html") 
	{
		return true;
	}
	$server_name = domainSuffix($_SERVER["SERVER_NAME"]); 
	$host_ip = $_SERVER["SERVER_NAME"] ? gethostbyname($server_name) : null;
	$host_name = $_SERVER["SERVER_ADDR"] ? domainSuffix(gethostbyaddr($_SERVER["SERVER_ADDR"])) : null;
	if ($host_ip && $host_name && $host_ip == $_SERVER["SERVER_ADDR"] && $host_name == $_SERVER["SERVER_NAME"])
	{
		return true;
	}
	return false; 
}

function domainSuffix($domain)
{
	return preg_replace("/.*([^\.]+\.[^\.]+)$/","$1",$domain);
}

function internalUseOnly () 
{
	global $theme;
	if (!isAuthorized()) {
		require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
		ob_start(); ?>
	
	<div id="midcolumn">
	
	<div class="homeitem3col">
	<h3>For Internal Use Only</h3>
	<p>Sorry, this script must be run from a sanctioned build server. Contact Nick Boldt (codeslave[at]ca[dot]ibm[dot]com) for details.</p>
	</div>
	</div>	
	<?php 			
		$html = ob_get_contents();
		ob_end_clean();
		
		$pageTitle = "EMF";
		$pageKeywords = "";
		$pageAuthor = "Nick Boldt";
		
		$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
		exit; 
	}
}
?>
