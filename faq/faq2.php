<?php

/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet:
 *  
 * 	<xsl:param name="FAQ"></xsl:param>
 * 	<xsl:param name="filterName1">Category</xsl:param>
 * 	<xsl:param name="filterVal1"></xsl:param>
 * 	<xsl:param name="filterName2">Question</xsl:param>
 * 	<xsl:param name="filterVal2"></xsl:param>
 * 	<xsl:param name="filterName3">Answer</xsl:param>
 * 	<xsl:param name="filterVal3"></xsl:param> 
 * 	
 */

// Process query string to $params array

$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qs[$var[0]] = $var[1];
}

$params = array();
$params["FAQ"] = $qs["FAQ"];

// simplified QS input for canned queries
switch ($qs["FAQ"]) {
	case "EMF":
		$qs["Category"] = "emf";
		$qs["Question"] = "EMF";
		$qs["Answer"] = "EMF";
		break;
	case "SDO":
		$qs["Category"] = "sdo";
		$qs["Question"] = "SDO";
		$qs["Answer"] = "SDO";
		break;
	case "XSD":
		$qs["Category"] = "xsd";
		$qs["Question"] = "XSD";
		$qs["Answer"] = "XSD";
		break;
	default:
		break;
}

// other mappings of filterNameX to filterNameValX
$filterNames = array("","Category","Question","Answer");
for ($i=1;$i<=3;$i++) { 
  $fn = $filterNames[$i];
  $params["filterName".$i] = $fn; // filterName1 = Category
  $params["filterVal".$i] = $qs[$fn]; // filterVal1 = $qs["Category"]
} 

$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$result = xslt_process($processor, $fileBase.'faq.xml', $fileBase.'faq.xsl', NULL, array(), $params);

if(!$result) echo xslt_errno($processor) . " : " . xslt_error($processor);
echo $result;

?>
