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

$processor = xslt_create();
$fileBase = 'file://' . getcwd () . '/';
xslt_set_base ( $processor, $fileBase );
$result = xslt_process($processor, $fileBase.'faq.xml', $fileBase.'faq.xsl');

if(!$result) echo xslt_errno($processor) . " : " . xslt_error($processor);
echo $result;

?>
