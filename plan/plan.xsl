<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>

	<xsl:key name="bugEntry" match="bug" use="product"/>

	<xsl:param name="showFiltersOrHeaderFooter"></xsl:param> <!-- LEAVE BLANK - pass value of '1' into stylesheet via javascript -->
	<xsl:param name="product"></xsl:param> 
	<xsl:param name="version"></xsl:param>

<xsl:variable name="xx">
  <xsl:call-template name="show_plan_items">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_plan_items" match="/">
<xsl:for-each select="plan">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <title>Eclipse Tools - EMF, SDO and XSD - Development Plan</title>
    <link REL="SHORTCUT ICON" HREF="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/scripts/includes/nav.js"></script>
	<link rel="stylesheet" href="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/scripts/includes/style.css" type="text/css"/>
	<style>@import url("plan.css");</style>
	</head>
	<body>
	<div id="dhtmltooltip"></div>
	<script type="text/javascript" src="plan.js"></script>

	<xsl:if test="$showFiltersOrHeaderFooter!='1'">
	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr valign="top"><td colspan="1" align="left" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" BGCOLOR="#006699" >

		 <tr>
			  <td BGCOLOR="#000000" width="116" height="50"><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
			  <td width="637" height="50" style="background-repeat: repeat-y;" background="http://www.eclipse.org/images/gradient.jpg"></td>
			  <td width="250" height="50"><img src="http://www.eclipse.org/images/eproduct-simple.GIF" width="250" height="48"/></td>
		 </tr>

		</table></td>
	  </tr>
	</table>
	</xsl:if>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top">
		<td align="left" width="115" bgcolor="#6699CC">

			<!-- left nav here -->
			<xsl:if test="$showFiltersOrHeaderFooter!='1'">
				<xsl:copy-of select="document('../includes/nav.xml')/div"/>
			</xsl:if>

		</td>

		<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="100%">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop">
		Development Plan<xsl:if test="$product!='' or $version!=''">:
			<xsl:if test="$product!=''"><xsl:value-of select="$product" />&#160;</xsl:if>
			<xsl:if test="$version!=''"><xsl:value-of select="$version" />&#160;</xsl:if>
		</xsl:if>
		</font><br/>
        <font class="indexsub">Eclipse Modeling Framework</font>

      </td>
      <td width="40%">
			<img src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/reference.gif" hspace="50" align="right"/>
      </td>

    </tr>
  </tbody>            
</table>

<table border="0" cellpadding="2" width="100%" >
<tr>

<td align="LEFT" valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF">
	Development Plan<xsl:if test="$product!='' or $version!=''">:
		<xsl:if test="$product!=''"><xsl:value-of select="$product" />&#160;</xsl:if>
		<xsl:if test="$version!=''"><xsl:value-of select="$version" />&#160;</xsl:if>
	</xsl:if>
</font></font></b><a name="top">&#160;</a></td>
</tr>
</table>
<table border="0" cellpadding="2" width="100%" >
<tr>
<td align="right" valign="TOP"><b><small><a href="#quicknav">Quick Nav</a></small></b></td>
</tr>
<tr>
<td>
	<b class="big-header">Last modified: 
	<xsl:value-of select="substring-before(substring-after(modified,concat('$','Date',':')),'$')"/>
	</b>
	<p>
	<table>
		<tr><td>Development Plans: </td><td><a href="#EMF">EMF</a> :: <a href="#XSD">XSD</a></td></tr>
	</table>
	</p>
	<p>Plan Priorities are on a scale from 1 to 4 where 1 is most prioritized, 4 is least prioritized.<br/>
	Plan Estimates are annotated in units of days (d), weeks (w), or months (m), where 1m = 4w = 20d.<br/>
	This Plan is subject to change.
	</p>
	<p>&#160;</p>

</td>
</tr>
</table>

	<!-- form controls -->
<!--	<form action="plan.php" method="get" name="mainform">
	<table width="60%">
			<tr>
				<td>
					
				</td>
			</tr>
	</table>
	</form> -->
	
	<!-- nav header table -->
	<table border="0" cellspacing="1" cellpadding="5" width="100%">
	<xsl:for-each select="product-def">
		<xsl:if test="((count(key('bugEntry',@product)) != 0 and $product = product) or $product = '')">
			<tr class="header">
				<td colspan="9" class="sub-header">
					<a name="{@product}"></a><xsl:value-of select="@label"/>: Summary (<xsl:value-of select="count(key('bugEntry',@product))" /> Bugs)
				</td>
			</tr>
			<tr class="content-header">
				<xsl:for-each select="//column-def">
					<xsl:if test="@column != 'product' and @column != 'reporter' and @column != 'assignee' and @column != 'pri' and @column != 'stat' and @column != 'plan-comments'">
						<td colspan="1" class="sub-header">
							<xsl:value-of select="@label" />
						</td>
					</xsl:if>
				</xsl:for-each>
			</tr>
			<xsl:for-each select="key('bugEntry',@product)">
				<xsl:sort select="plan-priority" data-type="text" order="ascending" />
				<xsl:if test="(starts-with(version,$version) or $version = '') and ($product = product or $product = '')">
					<tr valign="top">
						<xsl:choose>
						<xsl:when test="(position() mod 2 = 1)">
							<xsl:attribute name="class">dark-row2</xsl:attribute>
						</xsl:when>
						<xsl:otherwise>
							<xsl:attribute name="class">light-row</xsl:attribute>
						</xsl:otherwise>
						</xsl:choose>
						<xsl:for-each select="./*">
							<xsl:if test="name() != 'product' and name() != 'reporter' and name() != 'assignee' and name() != 'pri' and name() != 'stat' and name() != 'plan-comments'">
								<td>
								<xsl:choose>
									<xsl:when test="name() = 'sev' and substring(../sev,1,3) = 'enh'">
										<xsl:attribute name="class">italic</xsl:attribute>
									</xsl:when>
									<xsl:otherwise><xsl:attribute name="class">normal</xsl:attribute></xsl:otherwise>
								</xsl:choose>
								<xsl:choose>
									<xsl:when test="name() = 'id'">
										<a onMouseover="ddrivetip('{../stat}: {../summary}'); return true;" onMouseout="hideddrivetip(); return true;" href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={.}"><xsl:value-of select="." /></a>&#160;<xsl:value-of select="substring(../stat,1,1)" />
									</xsl:when>
									<xsl:when test="name() = 'comp'">
										<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={../id}" onMouseover="ddrivetip('Assigned To: {../assignee}'); return true;" onMouseout="hideddrivetip(); return true;"><xsl:value-of select="." /></a>
									</xsl:when>
									<xsl:when test="name() = 'opened'">
										<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={../id}" onMouseover="ddrivetip('Opened By: {../reporter}'); return true;" onMouseout="hideddrivetip(); return true;"><xsl:value-of select="substring(.,1,10)" /></a>
									</xsl:when>
									<xsl:when test="name() = 'sev'">
										<xsl:value-of select="substring(.,1,3)" />
									</xsl:when>
									<xsl:when test="name() = 'plan-priority'">
										<xsl:value-of select="." />&#160; <i>(<xsl:value-of select="../pri" />)</i>
									</xsl:when>
									<xsl:when test="name() = 'plan-estimate' and ../plan-comments != ''">
										<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={../id}" onMouseover="ddrivetip('{../plan-comments}'); return true;" onMouseout="hideddrivetip(); return true;"><xsl:value-of select="." />*</a>
									</xsl:when>
									<xsl:when test="name() = 'plan-estimate' and ../plan-comments = ''">
										<xsl:value-of select="." />
									</xsl:when>
									<xsl:otherwise><xsl:value-of select="." /></xsl:otherwise>
								</xsl:choose>
								</td>
							</xsl:if>
						</xsl:for-each>
					</tr>
				</xsl:if>
			</xsl:for-each>
			<tr><td class="spacer"><br/></td><td class="spacer"><br/></td></tr>
		</xsl:if>
		<xsl:if test="count(key('bugEntry',@product)) = 0">
			<tr><td colspan="3" class="normal">n/a</td></tr>
		</xsl:if>
	</xsl:for-each>
	</table>

<xsl:if test="$showFiltersOrHeaderFooter!='1'">

<p>
	<a name="quicknav">
	<a href="../">EMF Home</a> |
	<a href="../../xsd">XSD Home</a> | 
	<a href="#top">Top of Page</a>
	</a>
</p>

<!-- wrapper for left nav -->
</xsl:if>

</td></tr></table>

</body>
</html>
</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: plan.xsl,v 1.2 2005/03/01 20:32:03 nickb Exp $ -->