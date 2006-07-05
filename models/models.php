<?php 

$pre = "../";

$params = array();
$params["showFiltersOrHeaderFooter"] = 1;

$HTMLTitle = "Eclipse Modeling Framework Corner";
$ProjectName = array(
	"Eclipse Modeling Framework Corner",
	"Eclipse Modeling Framework Corner",
	"Eclipse Modeling Framework Corner",
	"images/reference.gif"
);

include $pre . "includes/header.php"; 

echo '<script type="text/javascript" language="javascript" src="models.js"></script>';
		
/*
 * To work, this script must be run with a version of PHP4 which
 * includes the Sablotron XSLT extension compiled into it
 * 
 * Params in stylesheet: (none)	
 */

$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$XMLfile = "models.xml";
$result = xslt_process($processor, $fileBase.$XMLfile, $fileBase.'models.xsl', NULL, array(), $params);

if(!$result) echo xslt_errno($processor) . " : " . xslt_error($processor);
echo $result; ?>

<p><a href="view-source:http://www.eclipse.org/emf/models/<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre . "includes/footer.php"; ?>
<!-- $Id: models.php,v 1.3 2006/07/05 17:15:24 nickb Exp $ -->