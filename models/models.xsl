<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>
<xsl:key name="modelCatg" match="model" use="@category"/>
<xsl:key name="reviewmodelID" match="review" use="@modelID"/>

<xsl:variable name="xx">
  <xsl:call-template name="show_models">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_models" match="/">
<xsl:for-each select="data">
	<html>
	<head>
    <title>Eclipse Tools - EMF and SDO - EMF Corner</title>
    <link REL="SHORTCUT ICON" HREF="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32.ico"/>
	<link rel="stylesheet" href="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/scripts/includes/style.css" type="text/css"/>
	<style>@import url("models.css");</style>
	<script type="text/javascript" language="javascript" src="models.js"> </script>
	</head>
	<body>

<!-- wrapper for left nav -->
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top"><td colspan="3" align="left" width="100%">
    <table border="0" cellspacing="0" cellpadding="0" WIDTH="100%" BGCOLOR="#006699" >

     <tr>
          <td BGCOLOR="#000000" width="116" ><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
          <td WIDTH="637"><img SRC="http://www.eclipse.org/images/gradient.jpg" border="0" height="50" width="282"/></td>
          <td WIDTH="250"><img src="http://www.eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
     </tr>

    </table>
   </td>
  </tr>
	<tr valign="top">
		<td align="left" width="115" bgcolor="#6699CC"><table border="0" cellspacing="0" cellpadding="0" BGCOLOR="#90C8FF" height="45" width="116">
  <!-- common links - both projects -->
  <tr> 
    <td Valign="CENTER" HEIGHT="21" BGCOLOR="#0080C0">&#160; <a href="http://www.eclipse.org/emf/" target="_top" class="navhead">emf/sdo</a></td>

  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/downloads.php" class="nav">Downloads</a>
		</p>
    </td>

  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"><p>&#160; <a href="http://download.eclipse.org/tools/emf/updates/" class="nav">Update Manager</a></p></td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/docs.php" class="nav">Documentation</a><br/>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/faq.php" class="nav">FAQs</a>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/news-release-notes.php" class="nav">Release Notes</a>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="models.xml" class="nav">EMF Corner</a><br/>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf/" class="nav">CVS</a>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf" class="nav">What&#39;s New, CVS?</a></p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>

  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="javascript:void(goBugzLink())" onclick="goBugzLink()" class="nav">Open Bugs</a>
		</p>
    </td>
  </tr>
		
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>

  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a
 href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf" class="nav">Newsgroup</a>
		</p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>

  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew.php" class="nav">Site News</a></p>
    </td>
  </tr>
	
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/c.gif" height="1" width="1"/></td>
  </tr>

</table>

<table border="0" cellspacing="0" cellpadding="0" cols="1" WIDTH="116" BGCOLOR="#90C8FF" height="45" >
  <tr> 
    <td Valign="CENTER" HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="http://www.eclipse.org/http://www.eclipse.orgtools/index.html" target="_top" class="navhead">
      tools</a></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/downloads.html" class="nav">Downloads</a></p>
    </td>

  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/cdt" class="nav" target="_top">CDT</a></p>
    </td>
  </tr>

  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/gef" class="nav" target="_top">GEF</a></p>
    </td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/cobol" class="nav" target="_top">COBOL</a></p>
    </td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>

  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/test-and-performance" class="nav" target="_top">Hyades</a></p>
    </td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/emf" class="nav" target="_top">EMF</a></p>

    </td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/vep" class="nav" target="_top">VE</a></p>
    </td>

  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/uml2" class="nav" target="_top">UML2</a></p>
    </td>
  </tr>

  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  
  
</table>
<table border="0" cellspacing="0" cellpadding="0" cols="1" WIDTH="116" BGCOLOR="#90C8FF" >
  <tr> 
    <td Valign="CENTER" HEIGHT="21" BGCOLOR="#0080C0">&#160; <a href="http://www.eclipse.org" target="_top" class="navhead"> 
      eclipse home</a></td>
  </tr>
  <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/org/index.html" class="nav" target="_top">about us</a></td>

  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
    <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/projects/index.html" class="nav" target="_top">projects</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/downloads/index.php" class="nav" target="_top">downloads</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/articles/index.html" class="nav" target="_top">articles</a></td>

  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/newsgroups/index.html" class="nav" target="_top">newsgroups</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr Valign="CENTER"> 
    <td Valign="CENTER" HEIGHT="21">&#160; <a href="http://www.eclipse.org/mail/index.html" class="nav" target="_top">mailing 
      lists</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr valign="CENTER"> 
    <td valign="CENTER" height="21">&#160; <a href="http://www.eclipse.org/community/index.html" class="nav" target="_top">community</a></td>

  </tr>
  <tr> 
    <td bgcolor="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
  <tr Valign="CENTER">
    <td HEIGHT="21">&#160; <a href="http://www.eclipse.org/search/search.cgi" class="nav">search</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>

  </tr>
  <tr Valign="CENTER"> 
    <td HEIGHT="21">&#160; <a href="https://bugs.eclipse.org/bugs/" class="nav">bugs</a></td>
  </tr>
  <tr> 
    <td BGCOLOR="#CFFFFF"><img src="http://www.eclipse.org/images/c.gif" height="1" width="1"/></td>
  </tr>
</table>

</td>

		<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop">EMF Corner</font><br/>
        <font class="indexsub">Eclipse Modeling Framework</font>

      </td>
      <td width="40%">
        <img src="http://dev.eclipse.org/images/Idea.jpg" hspace="50" align="middle"/>
      </td>

    </tr>
  </tbody>            
</table>

<table border="0" cellpadding="2" WIDTH="100%" >
<tr>

<td align="LEFT" Valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF">EMF Corner</font></font></b><a name="top">&#160;</a></td>
</tr>
</table>
<table border="0" cellpadding="2" WIDTH="100%" >
<tr>
<td align="right" Valign="TOP"><b><small><a href="#quicknav">Quick Nav</a></small></b></td>
</tr>
</table>

<p><a href="models-submit.php">Submit an EMF or SDO model, plugin or tool</a></p>


	<!-- table of contents -->
	<table border="0" cellspacing="1" cellpadding="3">
		<tr class="light-row" valign="bottom">
			<td colspan="1" class="big-header">
				<h1 class="title">Eclipse Modeling Framework Corner</h1>

				<b class="big-header">Newest Model: </b> 
					<xsl:for-each select="model">
						<xsl:if test="(position()=1)">
							<span class="datestamp" style="font-weight:normal"><xsl:value-of select="@date"/></span>
						</xsl:if>
					</xsl:for-each>
				
				<br/>
				<b class="big-header">Newest Review: </b> 
					<xsl:for-each select="review">
						<xsl:if test="(position()=1)">
							<span class="datestamp" style="font-weight:normal"><xsl:value-of select="@date"/></span>
						</xsl:if>
					</xsl:for-each>

				<table border="0" cellspacing="0" cellpadding="5" width="560">
					<tr>
						<td>
					<p class="normal" style="font-weight:normal">
					Welcome to the EMF Corner! On this page you will find projects, plugins, models, tools, and other materials contributed by the EMF Community. Want to contribute something? Just click <a href="models-submit.php">here</a> to add your contribution to this list.
					</p>
					<p class="normal" style="font-weight:normal">
					We welcome your feedback about this idea, as well as your feedback about contributions on this page. If enough people comment favourably about the code provided here, it may one day make its way into the EMF code base. Or into our test suite. Or something. 
					</p>
					<p class="normal" style="font-weight:normal">
					Note that contributions and reviews are moderated by the EMF Team. 
					</p>
					<p class="normal" style="font-weight:normal">
					To provide comments about this prototype community project, please email <a href="mailto:codeslave@ca.ibm.com?Subject=EMF Corner Comments">codeslave@ca.ibm.com</a>, or <a href="models-submit.php">start a thread</a> under the 'General Discussion' category.
					</p>
						</td>
					</tr>
				</table>

			</td>
		</tr>
	</table>

	<!-- hide header table if there's less than 10 models here - not a lot of point for #s less than that -->
	<xsl:if test="count(model)>20">
		<table border="0" cellspacing="1" cellpadding="3">
			<tr class="light-row" valign="bottom">
				<td colspan="2" class="big-header">
					Model Category
				</td>
				<td colspan="1" class="big-header">
					Posted / Updated
				</td>
			</tr>
		<xsl:for-each select="category-def">
			<xsl:if test="count(key('modelCatg',@category)) != 0">
				<tr class="header">
					<td colspan="4" class="sub-header" width="60%">
						<a name="{@modelName}"><xsl:value-of select="@label"/></a> (<xsl:value-of select="count(key('modelCatg',@category))"/>)
					</td>
				</tr>
				<xsl:for-each select="key('modelCatg',@category)">
					<xsl:sort select="@date" order="descending"/>
						<tr valign="top">
							<xsl:choose>
							<xsl:when test="(position() mod 2 = 1)">
								<xsl:attribute name="class">dark-row</xsl:attribute>
							</xsl:when>
							<xsl:otherwise>	
								<xsl:attribute name="class">light-row</xsl:attribute>
							</xsl:otherwise>
							</xsl:choose>
							<td class="normal" align="right" width="10">
								<xsl:value-of select="position()"/>
							</td>
							<td class="normal">
								<xsl:choose>
								<xsl:when test="@modelName">
									<a href="#{@category}{position()}"><xsl:value-of select="@modelName"/></a>
								</xsl:when>
								<xsl:otherwise>
									<a href="#{@category}{position()}"><xsl:value-of select="@category"/> - <xsl:value-of select="@date"/></a>
								</xsl:otherwise>
								</xsl:choose>
								<xsl:if test="text"><span class="normal"><xsl:value-of select="text"/></span></xsl:if>
							</td>
							<td class="datestamp" width="50">
							<xsl:value-of select="substring(@date,1,10)"/>
							</td>
						</tr>
				</xsl:for-each>
				<tr><td class="spacer"> </td></tr>
			</xsl:if>
			<xsl:if test="count(key('modelCatg',@category)) = 0">
			<!--	<tr><td colspan="3" class="normal">n/a</td></tr> -->
			</xsl:if>
		</xsl:for-each>
		</table>
		<p> </p>
	</xsl:if>

	<!-- content! -->
	<table border="0" cellspacing="1" cellpadding="5">
	<xsl:for-each select="category-def">
		<xsl:if test="count(key('modelCatg',@category)) != 0">
			<tr class="content-header">
				<td colspan="3" class="sub-header">
					<a name="{@modelName}"><xsl:value-of select="@label"/></a> (<xsl:value-of select="count(key('modelCatg',@category))"/>)
				</td>
				<td colspan="2" class="sub-header">
					Reviews
				</td>
			</tr>
			<xsl:for-each select="key('modelCatg',@category)">
				<xsl:sort select="@date" order="descending"/>
					<tr valign="top">
						<xsl:choose>
						<xsl:when test="(position() mod 2 = 1)">
							<xsl:attribute name="class">dark-row2</xsl:attribute>
						</xsl:when>
						<xsl:otherwise>
							<xsl:attribute name="class">light-row</xsl:attribute>
						</xsl:otherwise>
						</xsl:choose>
						<td class="normal" align="right" width="10">
							<a name="{@category}{position()}"><xsl:value-of select="position()"/></a>
						</td>
						<td class="normal" align="center" width="80">
						<xsl:choose>
							<xsl:when test="thumbnailURL!='' and screenshotURL!=''">
							<a target="_out" href="{screenshotURL}"><img alt="Screenshot" src="{thumbnailURL}" width="{thumbnailURL//@width}" height="{thumbnailURL//@height}" border="1" /></a>
							<br /><br />
							</xsl:when>
							<xsl:when test="thumbnailURL!=''">
							<img alt="image" src="{thumbnailURL}" width="{thumbnailURL//@width}" height="{thumbnailURL//@height}" border="0" />
							<br /><br />
							</xsl:when>
							<xsl:when test="screenshotURL!=''">
							<a target="_out" href="{screenshotURL}">Screenshot</a>
							<br /><br />
							</xsl:when>
							<xsl:otherwise>
							</xsl:otherwise>
						</xsl:choose>
							<a class="bold" target="_out" href="{modelURL}">Download</a>
							<xsl:if test="submitterURL!=''">
							<br /><br />
							<a target="_out" href="{submitterURL}">Visit Site</a>
							</xsl:if>
						</td>
						<td class="normal">
							<xsl:choose>
								<xsl:when test="count(key('reviewmodelID',@modelID)) != 0">
									<xsl:attribute name="colspan">2</xsl:attribute>
								</xsl:when>
								<xsl:otherwise>	
									<xsl:attribute name="colspan">1</xsl:attribute>
								</xsl:otherwise>
							</xsl:choose>
							<a class="bold" target="_out" href="{modelURL}"><xsl:value-of select="@modelName"/></a>, 
							<xsl:choose>
								<xsl:when test="submitterURL!=''">
									by <a target="_out" href="{submitterURL}"><xsl:value-of select="submitter"/></a>, 
								</xsl:when>
								<xsl:otherwise>
									by <xsl:value-of select="submitter"/>, 
								</xsl:otherwise>
							</xsl:choose> 
							<xsl:value-of select="@date"/><br />
							<span class="normal"><xsl:copy-of select="text"/></span>
							<br />
							<xsl:if test="count(key('reviewmodelID',@modelID)) != 0">
								<hr noshade="" size="1" />
								<table>
								<xsl:for-each select="key('reviewmodelID',@modelID)">
									<xsl:sort select="@date" order="descending"/>
									<!-- only show the 3 most recent reviews: need to sort by @date if so -->
									<!-- otherwise, sort by @rating for top-down numbering? -->
									<xsl:if test="(position() &lt; 4)">
										<tr>
											<td>
												<!--
												<xsl:choose>
													<xsl:when test="number(@rating) > 7">
													<b class="green"><xsl:value-of select="@rating"/> out of 10</b>
													</xsl:when>
													<xsl:when test="number(@rating) > 4">
													<b class="blue"><xsl:value-of select="@rating"/> out of 10</b>
													</xsl:when>
													<xsl:otherwise>
													<b class="red"><xsl:value-of select="@rating"/> out of 10</b>
													</xsl:otherwise>
												</xsl:choose>
												-->
												<xsl:if test="number(@rating) > 9">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x16.gif" width="16" height="16"/>
												</xsl:if>
												<xsl:if test="number(@rating) > 7">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x16.gif" width="16" height="16"/>
												</xsl:if>
												<xsl:if test="number(@rating) > 5">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x16.gif" width="16" height="16"/>
												</xsl:if>
												<xsl:if test="number(@rating) > 3">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x16.gif" width="16" height="16"/>
												</xsl:if>
												<xsl:if test="number(@rating) > 1">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x16.gif" width="16" height="16"/>
												</xsl:if>
												<xsl:if test="number(@rating) mod 2 = 1">
													<img alt=" {@rating} of 10" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32_16x8.gif" width="8" height="16"/>
												</xsl:if>
											</td>
										</tr>
										<tr>
											<td class="normal">
												<b class="bold"><xsl:value-of select="@reviewName"/></b>, 
												<xsl:choose>
													<xsl:when test="reviewerURL">
														by <a target="_out" href="{reviewerURL}"><xsl:value-of select="reviewer"/></a>, 
													</xsl:when>
													<xsl:otherwise>
														by <xsl:value-of select="reviewer"/>, 
													</xsl:otherwise>
												</xsl:choose> 
												<xsl:value-of select="@date"/>
											</td>
										</tr>
										<tr>
											<td class="normal"><span class="normal"><xsl:value-of select="text"/></span></td>
										</tr>
										<tr>
											<td class="normal">
												<a target="_out" href="{reviewURL}"><i><xsl:value-of select="reviewURL"/></i></a>
											</td>
										</tr>
									</xsl:if>
								</xsl:for-each>
								</table>
								<p align="right">
								>> <a href="javascript:submitNewReview('{@modelID}','{@modelName}')">Submit a review</a>.
								</p>
							</xsl:if>
						</td>
						<xsl:if test="count(key('reviewmodelID',@modelID)) = 0">
							<td class="normal" valign="top" align="left">
							<!-- reviews -->
							No reviews yet.<br/><br/>
							>>&#160;<a href="javascript:submitNewReview('{@modelID}','{@modelName}')">Submit</a>.
							</td>
						</xsl:if>
						<td class="normal" valign="bottom" align="right" width="20">
						<a href="#top">top</a>
						</td>
					</tr>
			</xsl:for-each>
			<tr><td class="spacer"><br/></td><td class="spacer"><br/></td></tr>
		</xsl:if>
		<xsl:if test="count(key('modelCatg',@category)) = 0">
		<!--	<tr><td colspan="3" class="normal">n/a</td></tr> -->
		</xsl:if>
	</xsl:for-each>
	</table>

<p><a href="models-submit.php">Submit an EMF or SDO model, plugin or tool</a></p>

<p>
	<a href="../">EMF Home</a> |
	<a href="../../xsd">XSD Home</a> | 
	<a href="#top">Top of Page</a>

</p>

<!-- wrapper for left nav -->
</td></tr></table>

	</body>
	</html>
</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: models.xsl,v 1.1 2004/12/21 21:32:13 nickb Exp $ -->