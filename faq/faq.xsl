<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>
<xsl:key name="ent" match="entry" use="category"/>

<!-- show filter form inputs? by default, no. need HTML/PHP wrapper to enable this, -->
<!-- since can't pass querystring params to XSL without HTML or PHP wrapper -->
<xsl:param name="showFiltersOrHeaderFooter"></xsl:param> <!-- LEAVE BLANK - pass value of '1' into stylesheet via javascript -->

	<!-- XSD defaults -->
<!--	<xsl:param name="FAQ">XSD</xsl:param>
	<xsl:param name="filterName1">Category</xsl:param>
	<xsl:param name="filterVal1">xsd</xsl:param>
	<xsl:param name="filterName2">Question</xsl:param>
	<xsl:param name="filterVal2">XSD</xsl:param>
	<xsl:param name="filterName3">Answer</xsl:param>
	<xsl:param name="filterVal3">XSD</xsl:param> -->

	<!-- SDO defaults -->
<!--	<xsl:param name="FAQ">SDO</xsl:param>
	<xsl:param name="filterName1">Category</xsl:param>
	<xsl:param name="filterVal1">sdo</xsl:param>
	<xsl:param name="filterName2">Question</xsl:param>
	<xsl:param name="filterVal2">SDO</xsl:param>
	<xsl:param name="filterName3">Answer</xsl:param>
	<xsl:param name="filterVal3">SDO</xsl:param> -->

	<!-- EMF defaults -->
<!--	<xsl:param name="FAQ">EMF</xsl:param>
	<xsl:param name="filterName1">Category</xsl:param>
	<xsl:param name="filterVal1">emf</xsl:param>
	<xsl:param name="filterName2">Question</xsl:param>
	<xsl:param name="filterVal2">EMF</xsl:param>
	<xsl:param name="filterName3">Answer</xsl:param>
	<xsl:param name="filterVal3">EMF</xsl:param> -->

	<!-- ALL defaults -->
	<xsl:param name="FAQ"></xsl:param>
	<xsl:param name="filterName1">Category</xsl:param>
	<xsl:param name="filterVal1"></xsl:param>
	<xsl:param name="filterName2">Question</xsl:param>
	<xsl:param name="filterVal2"></xsl:param>
	<xsl:param name="filterName3">Answer</xsl:param>
	<xsl:param name="filterVal3"></xsl:param> 

<xsl:variable name="xx">
  <xsl:call-template name="show_faq">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_faq" match="/">
<xsl:for-each select="faq">

	<xsl:variable name="pageTitle">
		<xsl:choose>
			<xsl:when test="$FAQ='SDO'">Service Data Objects FAQ</xsl:when>
			<xsl:when test="$FAQ='XSD'">XML Schema Infoset Model FAQ</xsl:when>
			<xsl:otherwise>Eclipse Modeling Framework FAQ</xsl:otherwise>
		</xsl:choose>
	</xsl:variable>

	<html xmlns="http://www.w3.org/1999/xhtml">
	<xsl:if test="$showFiltersOrHeaderFooter='1'">
	<style>@import url("faq.css");</style>
	</xsl:if>
	<xsl:if test="$showFiltersOrHeaderFooter!='1'">
	<head>
	<title><xsl:copy-of select="$pageTitle" /></title>
    <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
	<style>@import url("faq.css");</style>
	</head>

	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="99%">
		<tr valign="top"><td colspan="1" align="left" width="99%"><table border="0" cellspacing="0" cellpadding="0" width="99%" BGCOLOR="#006699" >

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
			<xsl:if test="$showFiltersOrHeaderFooter!='1'">
			<td align="left" width="115" bgcolor="#6699CC">
			<!-- left nav here -->
				<xsl:copy-of select="document('../includes/nav.xml')/div"/>
			</td>
			</xsl:if>

			<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="99%">
	<xsl:if test="$showFiltersOrHeaderFooter!='1'">
		&#160;
		<table border="0" cellpadding="2" width="99%">
		  <tbody>

			<tr>
			  <td align="left" width="60%">
				<font class="indextop">FAQ</font>

			  </td>
			  <td width="40%">
				<img src="http://www.eclipse.org/emf/images/reference.gif" hspace="50" align="right"/>
			  </td>

			</tr>
		  </tbody>            
		</table>

		<table border="0" cellpadding="2" width="99%" >
		<tr>

		<td align="LEFT" valign="TOP" BGCOLOR="#0070A0">
		<b><font face="Arial,Helvetica"><font color="#FFFFFF">
		<xsl:copy-of select="$pageTitle" />
		</font></font></b></td>
		</tr>
		</table>
	</xsl:if>

	<table border="0" cellpadding="2" width="99%" >
	<tr>
	<td><font class="indexsub"><xsl:if test="($FAQ!='') or $filterVal1!='' or $filterVal2!='' or $filterVal3!=''"><em class="log-text" style="font-style:italic"> - - (A subset of the Eclipse Modeling Framework FAQ) - - </em><br/><br/></xsl:if></font>
	<b class="big-header">Last modified: 
			<xsl:value-of select="substring-before(substring-after(modified,concat('$','Date',':')),'$')"/>
			<!-- by <xsl:value-of select="substring-before(substring-after(author,concat('$','Author',':')),'$')" /> -->
	</b></td>
	</tr>
	</table>

	<!-- form controls -->
	<form action="faq.php" method="get" name="mainform">
	<table width="99%">
			<tr>
				<td width="75%">
				<table>
					<tr><td colspan="13">
	
					<hr size="1" width="100%"/>
						<span class="log-text">To filter, enter a search term in a field and hit <b>Go!</b> Multiple terms are treated as an <b>OR</b> search.</span><br/>
						<span class="log-text">You can also use these predefined filters: 
						<a href="faq.php?FAQ=EMF">EMF FAQ</a> :: 
						<a href="faq.php?FAQ=SDO">SDO FAQ</a> :: 
						<a href="faq.php?FAQ=XSD">XSD FAQ</a> :: 
						<a href="faq.php?FAQ=">Complete FAQ</a></span>
					<hr size="1" width="100%"/>
					</td></tr>
					<tr>
						<xsl:if test="$filterName1!=''"><td><b class="big-header"><xsl:copy-of select="$filterName1" />:</b></td>
						<td> </td>
						<td><select class="log-text" name="{$filterName1}" size="1">
							<option value=""> Choose... </option>
							<xsl:for-each select="category-def">
							<xsl:choose>
								<xsl:when test="$filterVal1!='' and contains(@category,$filterVal1)">
									<option value="{@category}" selected="selected"><xsl:value-of select="@label" /></option>
								</xsl:when>
								<xsl:otherwise>
									<option value="{@category}"><xsl:value-of select="@label" /></option>
								</xsl:otherwise>
							</xsl:choose>
							</xsl:for-each>
							<option value=""> - None - </option>
						</select></td>
						<td> </td></xsl:if>
						<xsl:if test="$filterName2!=''"><td><b class="big-header"><xsl:copy-of select="$filterName2" />:</b></td>
						<td> </td>
						<td><input type="text" class="log-text" name="{$filterName2}" value="{$filterVal2}" size="4"/></td>
						<td> </td></xsl:if>
						<xsl:if test="$filterName3!=''"><td><b class="big-header"><xsl:copy-of select="$filterName3" />:</b></td>
						<td> </td>
						<td><input type="text" class="log-text" name="{$filterName3}" value="{$filterVal3}" size="4"/></td>
						<td> </td></xsl:if>
						<td><input class="black-no-underline" type="submit" name="z" value="Go!"/></td>
					</tr>
				</table>
				</td>
			</tr>
	</table>
	</form>

	<!-- table of contents -->
	<table width="99%" border="0" cellspacing="1" cellpadding="3">
<!-- 		<tr class="light-row" valign="bottom">
			<td colspan="2" class="big-header" width="60%">
				Category
			</td>
			<td colspan="1" class="big-header" width="5%">
				Updated
			</td>
			<td colspan="1" class="big-header" width="35%">
				Keywords
			</td>
		</tr> -->
	<xsl:for-each select="category-def">
		<xsl:if test="count(key('ent',@category)) != 0">
			<xsl:variable name="doRowHeader">
				<xsl:for-each select="key('ent',@category)"><xsl:call-template name="do_filter"/>
				</xsl:for-each>
			</xsl:variable>
			<xsl:if test="$doRowHeader>='1'">
				<tr class="header">
					<td colspan="2" class="sub-header">
						<a name="{@category}"><xsl:value-of select="@label"/></a> (<xsl:value-of select="string-length($doRowHeader)"/>)
					</td>
				</tr>
				<xsl:variable name="catgKey"><xsl:value-of select="@category" /></xsl:variable>
				<xsl:for-each select="key('ent',@category)">
				<!--	<xsl:sort select="@date" order="descending"/>
					<xsl:sort select="question" order="ascending"/> -->

					<!-- for testing only --> 
					<!-- <b>\<xsl:value-of select="$catgKey" />, 
					<xsl:value-of select="category" />; 
					<xsl:copy-of select="category" />/</b><hr/>

					<xsl:for-each select="category">
							<xsl:if test="(.)=($catgKey)">
								<b>\\<xsl:value-of select="." />,//</b>
							</xsl:if>
					</xsl:for-each> -->

					<xsl:variable name="catg">
						<xsl:for-each select="category">
							<xsl:if test="(.)=($catgKey)"><xsl:value-of select="." /></xsl:if>
						</xsl:for-each>
					</xsl:variable>

					<!-- add filters -->
					<xsl:variable name="doRow"><xsl:call-template name="do_filter"/></xsl:variable>

					<!-- for testing only --> 
					<!-- 1 <xsl:value-of select="$filterVal1" />, <xsl:value-of select="contains(@category,$filterVal1)" />;<br/>
					2 <xsl:value-of select="$filterVal2" />, <xsl:value-of select="contains(question,$filterVal2)" />;<br/>
					3 <xsl:value-of select="$filterVal3" />, <xsl:value-of select="contains(answer,$filterVal3)" />;<br/> -->

					<xsl:if test="$doRow>='1'">
						<tr valign="top">
							<xsl:choose>
							<xsl:when test="(position() mod 2 = 1)">
								<xsl:attribute name="class">dark-row</xsl:attribute>
							</xsl:when>
							<xsl:otherwise>
								<xsl:attribute name="class">light-row</xsl:attribute>
							</xsl:otherwise>
							</xsl:choose>
							<td class="log-text" align="right" width="1%">
								<xsl:value-of select="position()"/>
							</td>
							<td class="log-text" width="99%">
								<xsl:choose>
								<xsl:when test="question!=''">
									<a style="text-decoration:none" href="#{$catg}{@UNID}">
									<!-- for testing only -->
									<!-- <xsl:value-of select="@UNID" /> | -->
									<xsl:for-each select="question">
										<xsl:copy-of select="."/>
										<xsl:if test="position() != last()"><br /></xsl:if>
									</xsl:for-each>
									</a>
								</xsl:when>
								<xsl:otherwise>
									<a href="#{$catg}{@UNID}"><xsl:value-of select="@category"/> - <xsl:value-of select="@date"/></a>
								</xsl:otherwise>
								</xsl:choose>
							</td>
							<!-- <td class="datestamp">
							<xsl:value-of select="substring(@date,1,10)"/>
							</td>
							<td class="log-text">
							<xsl:value-of select="@keywords"/>
							</td> -->
						</tr>
					</xsl:if>
				</xsl:for-each>
				<tr><td class="spacer"> </td></tr>
			</xsl:if>
		</xsl:if>
		<xsl:if test="count(key('ent',@category)) = 0">
		<!--	<tr><td colspan="3" class="log-text">n/a</td></tr> -->
		</xsl:if>
	</xsl:for-each>
	</table>

	<!-- content! -->
	<table width="99%" border="0" cellspacing="1" cellpadding="5">
	<xsl:for-each select="category-def">
		<xsl:if test="count(key('ent',@category)) != 0">
			<xsl:variable name="doRowHeader">
				<xsl:for-each select="key('ent',@category)"><xsl:call-template name="do_filter"/>
				</xsl:for-each>
			</xsl:variable>
			<xsl:if test="$doRowHeader>='1'">
				<tr class="content-header">
					<td colspan="3" class="sub-header" width="99%">
						<a name="{@category}"><xsl:value-of select="@label"/></a> 
						(<xsl:value-of select="string-length($doRowHeader)"/>)
					</td>
				</tr>
				<xsl:variable name="catgKey"><xsl:value-of select="@category" /></xsl:variable>
				<xsl:for-each select="key('ent',@category)">
					<!-- <xsl:sort select="@date" order="descending"/>
					<xsl:sort select="question" order="ascending"/> -->

					<xsl:variable name="catg">
						<xsl:for-each select="category">
							<xsl:if test="(.)=($catgKey)"><xsl:value-of select="." /></xsl:if>
						</xsl:for-each>
					</xsl:variable>

					<!-- add filters -->
					<xsl:variable name="doRow"><xsl:call-template name="do_filter"/></xsl:variable>

					<!-- for testing only -->
					<!-- <xsl:value-of select="$filterVal1" />, <xsl:value-of select="@category" />;<br/> --> 

					<xsl:if test="$doRow>='1'">
						<tr valign="top">
							<xsl:choose>
							<xsl:when test="(position() mod 2 = 1)">
								<xsl:attribute name="class">dark-row2</xsl:attribute>
							</xsl:when>
							<xsl:otherwise>
								<xsl:attribute name="class">light-row</xsl:attribute>
							</xsl:otherwise>
							</xsl:choose>

							<td class="log-text" align="right" width="1%">
								<xsl:value-of select="position()"/>
							</td>
							<td class="log-text" width="89%">
								<a name="{$catg}{@UNID}">
								<b class="question">
								<xsl:for-each select="question"><xsl:copy-of select="."/><br/></xsl:for-each>
								</b></a><br />

								<span class="answer">
								<xsl:for-each select="answer">
									<xsl:copy-of select="."/>
								<br/></xsl:for-each>
								</span>
								<br />
							</td>
							<td class="log-text" valign="bottom" align="right" width="10%">
							<a href="#top">top</a>
							</td>
						</tr>
					</xsl:if>
				</xsl:for-each>
				<tr><td class="spacer"><br/></td><td class="spacer"><br/></td></tr>
			</xsl:if>
		</xsl:if>
		<xsl:if test="count(key('ent',@category)) = 0">
		<!--	<tr><td colspan="3" class="log-text">n/a</td></tr> -->
		</xsl:if>
	</xsl:for-each>
	</table>

<xsl:if test="$showFiltersOrHeaderFooter!='1'">

<p>
	<a name="quicknav">
	<a href="/emf/emf.php">EMF Home</a> |
	<a href="/emf/sdo.php">SDO Home</a> | 
	<a href="/emf/xsd.php">XSD Home</a> | 
	<a href="#top">Top of Page</a>
	</a>
</p>

<!-- wrapper for left nav -->
</xsl:if>

</td></tr></table>

</html>

</xsl:for-each>
</xsl:template>

<xsl:template name="do_filter" match="entry">
	<xsl:choose>
		<!-- all three -->
		<xsl:when test="$filterName3='Answer' and $filterVal3!='' and $filterName2='Question' and $filterVal2!='' and $filterName1='Category' and $filterVal1!=''">
			<xsl:if test="contains(answer,$filterVal3) or contains(question,$filterVal2)">1</xsl:if> <!-- found -->
			<xsl:for-each select="category"><xsl:if test="(.)=$filterVal1">1</xsl:if></xsl:for-each> <!-- any matching catg -->
		</xsl:when>
		<!-- just two; 3 variations -->
		<xsl:when test="$filterName3='Answer' and $filterVal3!='' and $filterName2='Question' and $filterVal2!=''">
			<xsl:if test="contains(answer,$filterVal3) or contains(question,$filterVal2)">1</xsl:if> <!-- found -->
		</xsl:when>
		<xsl:when test="$filterName3='Answer' and $filterVal3!='' and $filterName1='Category' and $filterVal1!=''">
			<xsl:if test="contains(answer,$filterVal3)">1</xsl:if> <!-- found -->
			<xsl:for-each select="category"><xsl:if test="(.)=$filterVal1">1</xsl:if></xsl:for-each> <!-- any matching catg -->
		</xsl:when>
		<xsl:when test="$filterName2='Question' and $filterVal2!='' and $filterName1='Category' and $filterVal1!=''">
			<xsl:if test="contains(question,$filterVal2)">1</xsl:if> <!-- found -->
			<xsl:for-each select="category"><xsl:if test="(.)=$filterVal1">1</xsl:if></xsl:for-each> <!-- any matching catg -->
		</xsl:when>
		<!-- just one; 3 variations -->
		<xsl:when test="$filterName3='Answer' and $filterVal3!=''">
			<xsl:if test="contains(answer,$filterVal3)">1</xsl:if> <!-- found -->
		</xsl:when>
		<xsl:when test="$filterName2='Question' and $filterVal2!=''">
			<xsl:if test="contains(question,$filterVal2)">1</xsl:if> <!-- found -->
		</xsl:when>
		<xsl:when test="$filterName1='Category' and $filterVal1!=''">
			<xsl:for-each select="category"><xsl:if test="(.)=$filterVal1">1</xsl:if></xsl:for-each> <!-- any matching catg -->
		</xsl:when>
		<!-- none -->
		<xsl:otherwise>1</xsl:otherwise> <!-- no matching filters enabled, show all -->
	</xsl:choose>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: faq.xsl,v 1.24 2006/01/20 21:03:54 nickb Exp $ -->