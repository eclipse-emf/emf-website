<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>
<xsl:key name="ent" match="entry" use="category"/>

<!-- show filter form inputs? by default, no. need HTML/PHP wrapper to enable this, -->
<!-- since can't pass querystring params to XSL without HTML or PHP wrapper -->
<xsl:param name="showFiltersOrHeaderFooter"></xsl:param> <!-- LEAVE BLANK - pass value of '1' into stylesheet via javascript -->

<xsl:variable name="xx">
  <xsl:call-template name="show_doc">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_doc" match="/">
<xsl:for-each select="/">

	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title>EMF, SDO &amp; XSD Documents</title>
    <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
	<style>@import url("book.css");</style>
	</head>
	<body>

	<xsl:if test="$showFiltersOrHeaderFooter!='1'">
	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr valign="top"><td colspan="1" align="left" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" BGCOLOR="#006699" >

		 <tr>
			  <td BGCOLOR="#000000" width="116" height="50"><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
			  <td width="637" height="50" style="background-repeat: repeat-y;" background="http://www.eclipse.org/images/gradient.jpg"></td>
			  <td width="250" height="50"><img src="http://www.eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
		 </tr>

		</table></td>
	  </tr>
	</table>
	</xsl:if>

	<table cellspacing="0" cellpadding="0" border="0">
		<tr valign="top">
			<td align="left" width="115" bgcolor="#6699CC">

			<!-- left nav here -->
			<xsl:if test="$showFiltersOrHeaderFooter!='1'">
				<xsl:copy-of select="document('../scripts/includes/nav.xml')/div"/>
			</xsl:if>

			</td>

			<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="100%">
	&#160;

			<xsl:if test="$showFiltersOrHeaderFooter!='1'">
				<xsl:copy-of select="document('./docs.xml')/body"/>
			</xsl:if>


<xsl:if test="$showFiltersOrHeaderFooter!='1'">

<p>
	<a href="../">EMF Home</a> |
	<a href="../../xsd">XSD Home</a> | 
	<a href="#top">Top of Page</a>
</p>

<!-- wrapper for left nav -->
</xsl:if>

</td></tr></table>

</body>
</html>

</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: docs.xsl,v 1.1 2005/05/06 22:32:45 nickb Exp $ -->