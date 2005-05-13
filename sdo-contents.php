<?php 

function displaySDOIntro() {
	echo '
Service Data Objects (SDO) is a framework that simplifies and unifies data application development in a service oriented architecture (SOA). It supports and integrates XML and incorporates J2EE patterns and best practices. EMF includes an EMF-based implementation of Service Data Objects. 
';
}

function displaySDOIntro2() {
	echo '
Unlike some of the other data integration models, Service Data Objects don\'t stop at data abstraction. The Service Data Objects framework also incorporates a good number of J2EE patterns and best practices. SDO supports a disconnected programming model. The SDO programming model prescribes patterns of usage that allow clean separation of each of these concerns.
<br><br>
Put simply, Service Data Objects is a framework for data application development, which includes an architecture and API. Service Data Objects simplify the J2EE data programming model and abstract data in a service oriented architecture (SOA). SDO unifies data application development, supports, and integrates XML. Service Data Objects incorporate J2EE patterns and best practices.
<br><br>
To learn more about Service Data Objects, check out the <a label="Service Data Object (SDO) Overview" id="Service Data Object (SDO) Overview" href="http://www.eclipse.org/emf/docs.php#overviews">Overview</a> <a label="Service Data Object (SDO) Overview" id="Service Data Object (SDO) Overview" href="http://www.eclipse.org/emf/docs.php#overviews"><img src="http://www.eclipse.org/emf/images/misc/page.png" width="9" height="8" border="0" alt="Service Data Object (SDO) Overview"></a>, <a label="Service Data Object (SDO) Documentation" id="Service Data Object (SDO) Documentation" href="http://www.eclipse.org/emf/docs.php">Documentation</a> <a label="Service Data Object (SDO) Documentation" id="Service Data Object (SDO) Documentation" href="http://www.eclipse.org/emf/docs.php"><img src="http://www.eclipse.org/emf/images/misc/page.png" width="9" height="8" border="0" alt="Service Data Object (SDO) Documentation"></a>, <a label="Service Data Object (SDO) Javadoc" id="Service Data Object (SDO) Javadoc" href="'.
(!$isEMFserver?'http://download.eclipse.org':'').
'/tools/emf/sdo/javadoc/">Javadoc</a> <a label="Service Data Object (SDO) Javadoc" id="Service Data Object (SDO) Javadoc" href="'.
(!$isEMFserver?'http://download.eclipse.org':'').
'/tools/emf/sdo/javadoc/"><img src="http://www.eclipse.org/emf/images/misc/page.png" width="9" height="8" border="0" alt="Service Data Object (SDO) Javadoc"></a>, or <a label="Service Data Object (SDO) Downloads" id="Service Data Object (SDO) Downloads" href="'.
(!$isEMFserver?'http://download.eclipse.org':'').
'/tools/emf/scripts/downloads.php">Downloads</a> <a label="Service Data Object (SDO) Downloads" id="Service Data Object (SDO) Downloads" href="'.
(!$isEMFserver?'http://download.eclipse.org':'').
'/tools/emf/scripts/downloads.php"><img src="http://www.eclipse.org/emf/images/misc/page.png" width="9" height="8" border="0" alt="Service Data Object (SDO) Downloads"></a> pages.
';
}
function displaySDOHome() {
		$HTMLTitle = "Eclipse Tools - SDO - Home";
		$ProjectName = array(
			"Service Data Objects",
			'Service Data Objects',
			'Service Data Objects',
			""
			);
		include $pre."includes/header.php"; ?>


<table border="0" cellpadding="2" width="100%">
<tr valign=top>
<td>
	<?php displaySDOIntro(); ?>

<p>
<table border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b><font face=
"Arial,Helvetica" color="#FFFFFF"><a name="emf_components">What is
SDO?</a></font></b> </td>
</tr>
</table>
</p>
	<?php displaySDOIntro2(); ?>

</td>

</tr>
</table>

<?php include $pre."includes/footer.php"; ?>

<!-- $Id: sdo-contents.php,v 1.4 2005/05/13 16:38:25 nickb Exp $ -->
</body></html>

<?php } 

if (!$noHeader) { displaySDOHome(); }
?>
