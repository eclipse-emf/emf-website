<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF Installation";
		$ProjectName = array(
			"EMF Installation",
			'Eclipse Modeling Framework',
			'EMF Installation',
			""
			);
		include $pre."includes/header.php"; ?>
<style>
	.header {
		font-size: 14px; color: #0080C0; font-weight: bold;
	}
</style>
<script language="javascript">
	function getFile(thefile) { 
		document.location.href="<?php echo $downloadScript.$downloadPre; ?>"+thefile;
	}
</script>

<p align=center><TABLE CELLPADDING=0 CELLSPACING=0 align=center BORDER=0 BGCOLOR="#EEEEEE" width="95%"><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1><a name="install-instructions"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></a></TD></TR><TR><TD WIDTH=1 BGCOLOR="#000000"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD><TD><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD>

	<table cellspacing=0 cellpadding=5>
		<tr valign=top bgcolor="#EEEEEE">
		<td colspan=2>
			<b class="header">Download & Installation Requirements - </b><b style="color:#ff4444">PLEASE READ!</b>
		</td>
		</tr>
		<tr valign=top bgcolor="#FFFFFF">
		<td><img src="http://www.eclipse.org/emf/images/eclipse-icons/newhov_obj.gif"></td>
		<td><b>First-time users</b> can get started quickly by simply downloading the combined <b style="color:#B51464">ALL</b> SDK bundle (includes Source, Runtime and Docs for <b style="color:#BF5FBF">EMF</b>, <b style="color:#18187D">XSD</b>, and <b style="color:#C7568E">SDO</b>). <a href="http://eclipse.org/emf/downloads-build-types.php">What Build Type do I want?</a>
		<br/>		<br/>		<br/>
		</td>
		</tr>
		<tr valign=top bgcolor="#EEEEEE">
		<td><img src="http://www.eclipse.org/emf/images/eclipse-icons/featureshov_obj.gif"></td>
		<td>
			EMF, SDO and XSD 2.x require <a href="http://eclipse.org/downloads/" target="_eclipse">Eclipse 3.x</a> and <b>JDK 1.4</b>. As of Eclipse 3.2, you can also use a <b>JDK 1.5 / 5.0</b>, since this bug only exists in the <b>Sun JDK 1.4</b>.<br>
			<br>
			Note that the full Eclipse SDK is only required <i>if you intend to use the EMF, SDO or XSD graphical interfaces</i>, (ie., views, wizards, extensions) which are built for Eclipse. For <i>runtime-only applications</i>, only a JDK is required.
			<br><br>
			EMF, SDO and XSD are built against the latest Eclipse SDKs, eg., EMF 2.1.0 with Eclipse 3.1.0, and is thus as compatible with Eclipse 3.0 as Eclipse 3.1 is with 3.0. 

			To see or download the Eclipse build used for a particular package, click the link under <b>Build Name</b> and check the <b>Requirements</b> section.<br>
<br>			
			If you require <i><b>EMF or XSD 1.x downloads</b></i>, go here:
				<i><a href="http://www.eclipse.org/emf/downloads/dl-emf1x.html">EMF</a></i> & <i><a href="http://www.eclipse.org/emf/downloads/dl-xsd1x.html">XSD</a></i>.<br>&#160;
				</td>
		</tr>

		<tr valign=top bgcolor="#FFFFFF">
		<td><img src="http://www.eclipse.org/emf/images/eclipse-icons/rcpapphov_obj.gif"></td>
		<td><b class="header">XSD Model Loading: Crimson DOM Bug, Workaround & Download</b>

				<ul>
				<li>If you use the <b>IBM JDK 1.4</b> or a <b>1.5 / 5.0 JDK</b> instead of the <b>SUN JDK 1.4</b>, this workaround is not required. <br><br>
				</li>

				<li><b>If you <b style="color:red">will NOT</b> be loading or importing model(s) from XML Schema</b>, or do not plan to use the XSD plugin, but intend to generate models from Rose, annotated java code, or using pre-existing ecore file(s), this workaround is also not required. EMF & SDO will work fine without Xerces. <br><br>
				</li>

				<li><b>If you <b style="color:green">will be</b> loading or importing model(s) from XML Schema</b>, you need to be aware of the following bug & its workaround.<br><br>

				The Crimson DOM implementation in (some versions of) the Sun JDK 1.4 has a bug in the implementation of<br>
				<tt>hasAttributeNS</tt>. This bug can be seen, <i>when importing a model from XML Schema</i>, as either:
					<ul>
					<li>a null pointer exception, or
					<li>the error message "Specify a valid XML Schema and try loading again".
					</ul>
				
				</li><br>

				To avoid this, use the following to control the JAXP implementation:
				<pre style="background-color:yellow"><b>&lt;eclipse-install-dir&gt;</b>eclipse.exe -vmargs <br>&#160;&#160;&#160;-D<a href="http://java.sun.com/j2se/1.4.2/docs/guide/standards/index.html">java.endorsed.dirs</a>=<b>&lt;path-to-your-xerces-jars-folder&gt;</b></pre>

				</li>

				<li>For your convenience, here are some links to XML4J and Xerces2-J, for anyone wishing to use Eclipse 3.0M8 or later.
				
				<table cellspacing=0 cellpadding=0 border=0><tr valign=middle>
					<td><a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j"><img border=0 src="http://www.eclipse.org/emf/images/dl-other.gif"></a></td>
						<td>&#160;</td>
					<td><a target="_xml" href="http://alphaworks.ibm.com/tech/xml4j">Download XML4J from IBM alphaWorks</a></td>
						<td>&#160;&#160;&#160;&#160;&#160;&#160;</td>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi"><img border=0 src="http://www.eclipse.org/emf/images/dl-other.gif"></a></td>
						<td>&#160;</td>
					<td><a target="_xml" href="http://xml.apache.org/xerces2-j/download.cgi">Download Xerces2-J from apache.org</a></td>
				</tr></table>
				</li>
				<br><img border=0 src="http://www.eclipse.org/emf/images/c.gif" width=1 height=3><br>

				<li>Please do NOT open any bugzillas or post comments to the newsgroup regarding the absence of Xerces in the Eclipse plugin directory or that the above workaround no longer works. 
				</li>
				
				<br>

				</ul>
		</td>
		</tr>
	</table>
	
</TD></TR></TABLE></TD><TD WIDTH=1 BGCOLOR='#000000'><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR></TABLE></p>

<?php	include $pre."includes/footer.php"; ?>
<!-- $Id: downloads-xerces.php,v 1.6 2005/09/21 17:32:01 nickb Exp $ -->
