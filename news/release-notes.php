<?php 

$pre = "../";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qsvars[$var[0]] = $var[1];
}

$params = array();
$params["project"] = $qsvars["project"]; 
$params["version"] = $qsvars["version"];
$params["showFiltersOrHeaderFooter"] = 1;

// default if no QS values
if (!$params["project"] && !$qsvars["version"]) $params["version"] = "";

if (is_file("release-notes".$params["version"].".php")) {
    header("Location: http://www.eclipse.org/emf/news/release-notes".$params["version"].".php");
    exit;
}

$HTMLTitle = "Eclipse Tools - EMF Release Notes";
$ProjectName = array(
	"Release Notes",
	"Eclipse Modeling Framework",
	"Release Notes",
	"images/reference.gif"
);

include $pre . "includes/header.php"; 

/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet:
 *  
 * 	<xsl:param name="project"></xsl:param>
 * 	<xsl:param name="version"></xsl:param>
 *  <xsl:param name="showFiltersOrHeaderFooter"></xsl:param>
 * 	
 */

// define XML and XSL sources 
$XMLfile = "release-notes" . ($params["version"] && strlen($params["version"])>=3 ? "-" . substr($params["version"],0,3) : "") . ".xml";	
if (!is_file($XMLfile)) { $XMLfile = "release-notes.xml"; }	
$XSLfile = "release-notes.xsl";


$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$result = xslt_process($processor, $fileBase.$XMLfile, $fileBase.$XSLfile, NULL, array(), $params);

if(!$result) {
	echo "Trying to parse ".$XMLfile." with ".$XSLfile."...<br/>";
	echo "ERROR #".xslt_errno($processor) . " : " . xslt_error($processor);
}
echo $result; 

echo '<p><a href="view-source:http://www.eclipse.org/emf/news/'.$XMLfile.'" class="red">View as XML</a></p>'."\n";

include_once $pre . "includes/footer.php"; 

echo "<!-- $Id: release-notes.php,v 1.18 2006/07/20 16:55:05 nickb Exp $ -->"; 

?>