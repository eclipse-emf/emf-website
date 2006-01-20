<?php 

$pre = "../";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  echo "\$vars[".$i."] = ".$vars[$i]." --> ";
  $var = explode("=", $vars[$i]);
  echo sizeof($var). " --> ";
  $qs[$var[0]] = $var[1];
  echo "\$qs[".$vars[0]."] = ".$vars[1]."<br/>";
}

$params = array();
$params["project"] = $qs["project"];
$params["version"] = $qs["version"];
$params["showFiltersOrHeaderFooter"] = 1;

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
$XMLfile = "release-notes.xml";
$XSLfile = "release-notes.xsl";

$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$result = xslt_process($processor, $fileBase.$XMLfile, $fileBase.$XSLfile, NULL, array(), $params);

if(!$result) {
	echo "Trying to parse ".$XMLfile." with ".$XSLfile."...<br/>";
	echo "ERROR #".xslt_errno($processor) . " : " . xslt_error($processor);
}
echo $result; ?>

<p><a href="view-source:http://eclipse.org/emf/news/<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre . "includes/footer.php"; ?>
<!-- $Id: release-notes2.php,v 1.4 2006/01/20 22:10:16 nickb Exp $ -->
