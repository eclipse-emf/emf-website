<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF, XSD, SDO - Download an EMF, XSD, or SDO Build";
		$ProjectName = array(
			"EMF, XSD, SDO",
			'Eclipse Modeling Framework, including XSD & SDO',
			'Downloading EMF, XSD & SDO',
			""
			);
		$noHeader=true;
		include $pre."includes/header.php"; ?>

<style>
	.header {
		font-size: 14px; color: #0080C0; font-weight: bold;
	}
</style>
<script language="javascript">
	function getFile(thefile) { 
		document.location.href="download.php?dropFile="+thefile;
	}
</script>

<table cellpadding= cellspacing=0 border=0><tr><td style="background-color: #ffffff; padding-left:7px; padding-right:5px; padding-top:10px; padding-bottom:10px;">
				<b class="header">XSD Model Loading: Crimson DOM Bug, Workaround & Download</b>

				<ul>
				<li>If you use the <b>IBM JDK 1.4</b> instead of the <b>SUN JDK 1.4</b>, this workaround does not apply. [<a href="javascript:window.close()">close this window</a>]<br><br>
				</li>

				<li><b>If you <b style="color:red">will NOT</b> be loading or importing model(s) from XML Schema</b>, or do not plan to use the XSD plugin, but intend to generate models from Rose, annotated java code, or using pre-existing ecore file(s), this workaround does not apply to you. EMF & SDO will work fine without Xerces. [<a href="javascript:window.close()">close this window</a>]<br><br>
				</li>

				<li><b>If you <b style="color:green">will be</b> loading or importing model(s) from XML Schema</b>, you need to be aware of the following bug & its workaround.<br><br>

				The Crimson DOM implementation in (some versions of) the Sun JDK has a bug in the implementation of<br>
				<tt>hasAttributeNS</tt>. This bug can be seen, <i>when importing a model from XML Schema</i>, as either:
					<ul>
					<li>a null pointer exception, or
					<li>the error message "Specify a valid XML Schema and try loading again".
					</ul>
				
				</li><br>

				To avoid this, use the following to control the JAXP implementation:
				<pre style="background-color:yellow"><b>&lt;eclipse-install-dir&gt;</b>eclipse.exe -vmargs <br>&nbsp;&nbsp;&nbsp;-D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a>=<b>&lt;path-to-your-xerces-jars-folder&gt;</b></pre>

				</li>

				<li><i><b>For your convenience</b></i>, we are providing the Xerces2-J 2.6.2 jars (dated 2004/2/20), <i>as-is, without warranty or support</i>, for anyone wishing to use Eclipse more recent than 3.0M8 (which included XML4J 4.0.13, from 2003/06/18). 
				
				<table cellspacing=0 cellpadding=0 border=0><tr valign=middle>
					<td><a href="javascript:void(getFile('../../../technology/xsd/org.apache.xerces_2.6.2.zip'))"><img border=0 src="<?php echo $CVSpreEMF; ?>images/dl-other.gif"></a></td>
						<td>&nbsp;</td>
					<td><a href="javascript:void(getFile('../../../technology/xsd/org.apache.xerces_2.6.2.zip'))">Download Xerces2-J 2.6.2 from eclipse.org</a></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j"><img border=0 src="<?php echo $CVSpreEMF; ?>images/dl-other.gif"></a></td>
						<td>&nbsp;</td>
					<td><a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j">Download XML4J from IBM alphaWorks</a></td>
				</tr><tr valign=middle>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi"><img border=0 src="<?php echo $CVSpreEMF; ?>images/dl-other.gif"></a></td>
						<td>&nbsp;</td>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi">Download Xerces2-J from apache.org</a></td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/"><img border=0 src="<?php echo $CVSpreEMF; ?>images/dl-other.gif"></a></td>
						<td>&nbsp;</td>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/">About the Apache Xerces2 Java Project</a></td>
				</tr></table>
				</li>
				<br><img border=0 src="<?php echo $CVSpreEMF; ?>images/c.gif" width=1 height=3><br>

				<li>Please do NOT open any bugzillas or post comments to the newsgroup regarding the absence of Xerces in the Eclipse plugin directory or that the above workaround no longer works. 
				
				This download is a convenience for our clients to work around a bug in the Sun JDK; we may choose to stop offering this convenience in the future.
				</li>
				
				<br>

				</ul>

<p align="center">[<a href="javascript:window.close()">close this window</a>]</p>
</td></tr></table>
<!-- $Id: downloads-xerces.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
