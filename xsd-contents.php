<?php 

function displayXSDIntro() {
	echo '
The XML Schema Infoset Model is a reference library that provides an 
<a href="http://download.eclipse.org/tools/emf/xsd/latest/javadoc/org/eclipse/xsd/package-summary.html#details">API</a> for use with any code that
examines, creates or modifies <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a> (standalone or as part of
other artifacts, such as XForms or WSDL documents).
';
}

function displayXSDIntro2() {
	echo '
XSD is a library that provides an 
<a href="http://download.eclipse.org/tools/emf/xsd/latest/javadoc/org/eclipse/xsd/package-summary.html#details">API</a>
for manipulating the components of an XML
Schema as described by 
the <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>
specifications, as well as an API for
manipulating the DOM-accessible representation of XML Schema as a series
of XML documents, and for keeping these representations in agreement as
schemas are modified.
<br><br>
The library will include services to serialize
and deserialize XML Schema documents, and to do integrity checking of
schemas (for example, not using a maximum value for a simpleType which
is invalid considering the base type of that simpleType). The project
goal is to support 100% of the functionality of XML schema
representation, but not necessarily to provide document against schema
assessment or validation services, which are normally provided by a
validating parser,
such as Apache\'s <a href="http://xml.apache.org/xerces2-j/">Xerces-J</a>.
';
}

function displayXSDModelImage() {
	echo '
<img src="http://www.eclipse.org/emf/images/xsd/XMLSchemaInfosetModel.gif" align="middle">
';
}

function displayXSDHome() {
		$HTMLTitle = "Eclipse Tools - XSD - Home";
		$ProjectName = array(
			"XML Schema Infoset Model",
			'XML Schema Infoset Model',
			'XML Schema Infoset Model',
			""
			);
		include $pre."includes/header.php"; ?>


<table border="0" cellpadding="2" width="100%">
<tr valign=top>
<td>
	<?php displayXSDIntro(); ?>
</td>
</tr>
</table>

<table border="0" cellpadding="2" width="100%">
<tr>
<td colspan=2 align="LEFT" valign="TOP" bgcolor="#0070A0"><b><font face=
"Arial,Helvetica" color="#FFFFFF"><a name="emf_components">What is
XSD?</a></font></b> </td>
</tr>

  <tr>
    <td valign=top>

	<?php displayXSDIntro2(); ?>

<br/><br/>
Since April 2004, there have been over 200,000 downloads of EMF, SDO, and XSD.

    </td>
    <td valign=top>
	 <?php displayXSDModelImage(); ?>
    </td>
  </tr>
</table>

<?php include $pre."includes/footer.php"; ?>

<!-- $Id: xsd-contents.php,v 1.3 2005/06/10 15:18:31 nickb Exp $ -->
</body></html>

<?php } 

if (!$noHeader) { displayXSDHome(); }
?>
