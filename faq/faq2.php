<?php 

$pre = "../";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qs[$var[0]] = $var[1];
}

$params = array();
$params["FAQ"] = $qs["FAQ"];
$params["showFiltersOrHeaderFooter"] = 1;

// simplified QS input for canned queries
switch ($qs["FAQ"]) {
	case "EMF":
		$qs["Category"] = "emf";
		$qs["Question"] = "EMF";
		$qs["Answer"] = "EMF";
		$HTMLTitle = "Eclipse Modeling Framework FAQ";
		$ProjectName = array(
			"Eclipse Modeling Framework FAQ",
			"Eclipse Modeling Framework FAQ",
			"Eclipse Modeling Framework FAQ",
			"images/reference.gif"
		);
		break;
	case "SDO":
		$qs["Category"] = "sdo";
		$qs["Question"] = "SDO";
		$qs["Answer"] = "SDO";
		$HTMLTitle = "Service Data Objects FAQ";
		$ProjectName = array(
			"Service Data Objects FAQ",
			"Service Data Objects FAQ",
			"Service Data Objects FAQ",
			"images/reference.gif"
		);
		break;
	case "XSD":
		$qs["Category"] = "xsd";
		$qs["Question"] = "XSD";
		$qs["Answer"] = "XSD";
		$HTMLTitle = "XML Schema Infoset Model FAQ";
		$ProjectName = array(
			"XML Schema Infoset Model FAQ",
			"XML Schema Infoset Model FAQ",
			"XML Schema Infoset Model FAQ",
			"images/reference.gif"
		);
		break;
	default:
		$HTMLTitle = "Eclipse Modeling Framework FAQ";
		$ProjectName = array(
			"Eclipse Modeling Framework FAQ",
			"Eclipse Modeling Framework FAQ",
			"Eclipse Modeling Framework FAQ",
			"images/reference.gif"
		);
		break;
}

// other mappings of filterNameX to filterNameValX
$filterNames = array("","Category","Question","Answer");
for ($i=1;$i<=3;$i++) { 
  $fn = $filterNames[$i];
  $params["filterName".$i] = $fn; // filterName1 = Category
  $params["filterVal".$i] = $qs[$fn]; // filterVal1 = $qs["Category"]
} 
	
include $pre . "includes/header.php"; 
		
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


$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$XMLfile = "faq.xml";
$result = xslt_process($processor, $fileBase.$XMLfile, $fileBase.'faq.xsl', NULL, array(), $params);

if(!$result) echo xslt_errno($processor) . " : " . xslt_error($processor);
echo $result; ?>

<p><a href="view-source:http://eclipse.org/emf/faq/<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre . "includes/footer.php"; ?>
<!-- $Id: faq2.php,v 1.5 2006/01/20 20:40:34 nickb Exp $ -->