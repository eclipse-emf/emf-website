<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>

	<xsl:key name="entryProj" match="entry" use="@project"/>

	<xsl:param name="showFiltersOrHeaderFooter"></xsl:param> <!-- LEAVE BLANK - pass value of '1' into stylesheet via javascript -->
	<xsl:param name="project"></xsl:param>
	<xsl:param name="version"></xsl:param>

<xsl:variable name="xx">
  <xsl:call-template name="show_notes">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_notes" match="/">
<xsl:for-each select="data">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <title>Eclipse Tools - EMF, SDO and XSD - Release Notes</title>
    <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/detaildiv.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
	<style>@import url("release-notes.css");</style>
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

<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top">
		<td align="left" width="115" bgcolor="#6699CC">

			<!-- left nav here -->
			<xsl:if test="$showFiltersOrHeaderFooter!='1'">
				<xsl:copy-of select="document('../includes/nav.xml')/div"/>
			</xsl:if>

		</td>

		<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="100%">
	<xsl:if test="$showFiltersOrHeaderFooter!='1'">
		&#160;
		<table border="0" cellpadding="2" width="100%">
		  <tbody>

			<tr>
			  <td align="left" width="60%">
				<font class="indextop">
				Release Notes<xsl:if test="$project!='' or $version!=''">:
					<xsl:if test="$project!=''"><xsl:value-of select="$project" />&#160;</xsl:if>
					<xsl:if test="$version!=''"><xsl:value-of select="$version" />&#160;</xsl:if>
				</xsl:if>
				</font><br/>
				<font class="indexsub">Eclipse Modeling Framework</font>

			  </td>
			  <td width="40%">
					<img src="http://www.eclipse.org/emf/images/reference.gif" hspace="50" align="right"/>
			  </td>

			</tr>
		  </tbody>            
		</table>

		<table border="0" cellpadding="2" width="100%" >
		<tr>

		<td align="LEFT" valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF">
			Release Notes<xsl:if test="$project!='' or $version!=''">:
				<xsl:if test="$project!=''"><xsl:value-of select="$project" />&#160;</xsl:if>
				<xsl:if test="$version!=''"><xsl:value-of select="$version" />&#160;</xsl:if>
			</xsl:if>
		</font></font></b><a name="top">&#160;</a></td>
		</tr>
		</table>
	</xsl:if>

	<!-- form controls -->
	<form action="http://eclipse.org/emf/news/release-notes.php" method="get" name="mainform">
	<input type="hidden" name="XMLfile" value="release-notes.xml"/>
	<input type="hidden" name="XSLfile" value="release-notes.xsl"/>
	<table width="60%">
			<tr>
				<td>
						<hr size="1" width="100%"/>
						<span class="log-text">To filter, enter a search term in a field and hit <b>Go!</b> 
						Multiple terms are treated as an <b>OR</b> search.</span><br/>
						<span class="log-text">You can also use these predefined filters: 
<img src="../images/icon-emf.gif" border="0" alt="emf"/> 
<a href="http://eclipse.org/emf/news/release-notes.php?XMLfile=release-notes.xml&amp;XSLfile=release-notes.xsl&amp;project=emf">EMF</a> :: 
<img src="../images/icon-sdo.gif" border="0" alt="sdo"/> 
<a href="http://eclipse.org/emf/news/release-notes.php?XMLfile=release-notes.xml&amp;XSLfile=release-notes.xsl&amp;project=emf">SDO</a> :: 
<img src="../images/icon-xsd.gif" border="0" alt="xsd"/> 
<a href="http://eclipse.org/emf/news/release-notes.php?XMLfile=release-notes.xml&amp;XSLfile=release-notes.xsl&amp;project=xsd">XSD</a> :: 
<a href="http://eclipse.org/emf/news/release-notes.php?XMLfile=release-notes.xml&amp;XSLfile=release-notes.xsl">Complete 2.x Notes</a> :: 
						<a href="release-notes-1.x.php">Complete 1.x Notes</a></span>
					<hr size="1" width="100%"/>
					<select class="log-text" name="project" size="1">
						<option value=""> Choose... </option>
						<xsl:for-each select="project-def">
						<xsl:choose>
							<xsl:when test="$project = @project">
								<option value="{@project}" selected="selected"><xsl:value-of select="@label" /></option>
							</xsl:when>
							<xsl:otherwise>
								<option value="{@project}"><xsl:value-of select="@label" /></option>
							</xsl:otherwise>
						</xsl:choose>
						</xsl:for-each>
						<option value=""> - All - </option>
					</select>
					&#160; 
					<select class="log-text" name="version" size="1">
						<option value=""> Choose... </option>
						<xsl:for-each select="version-def">
						<xsl:choose>
							<xsl:when test="$version = @version">
								<option value="{@version}" selected="selected"><xsl:value-of select="@label" /></option>
							</xsl:when>
							<xsl:otherwise>
								<option value="{@version}"><xsl:value-of select="@label" /></option>
							</xsl:otherwise>
						</xsl:choose>
						</xsl:for-each>
						<option value=""> - All - </option>
					</select>
					&#160;
					<input class="black-no-underline" type="submit" name="z" value="Go!"/>
				</td>
			</tr>
	</table>
	
	<!-- nav header table (release list) -->
	<table border="0" cellspacing="1" cellpadding="3" width="100%">
	<xsl:for-each select="project-def">
		<xsl:if test="((count(key('entryProj',@project)) != 0 and $project = @project) or $project = '')">
			<tr class="header">
				<td colspan="1" class="sub-header">
					<a class="sub-header" style="text-decoration:none" href="#{@project}"><xsl:value-of select="@label" /></a>
				</td>
				<td colspan="1" class="sub-header">
					Bugs Closed
				</td>
			</tr>
			<xsl:for-each select="key('entryProj',@project)">
				<xsl:if test="@build = @version and (starts-with(@version,$version) or $version = '') and ($project = @project or $project = '')">
				<xsl:variable name="thisVersion"><xsl:value-of select="@version" /></xsl:variable>
				<xsl:variable name="thisProject"><xsl:value-of select="@project" /></xsl:variable>
				<xsl:variable name="matchCount"><xsl:for-each select="//bug">
					<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">1</xsl:if>
				</xsl:for-each></xsl:variable>
					<tr id="name{@project}.{@version}" valign="top" class="dark-row" onMouseOver="rowOver('{@project}.{@version}','#C0D8FF')" onMouseOut="rowOut('{@project}.{@version}','#EEEEFF')" >
						<td class="normal" width="22%" onclick="document.location.href='#{@project}.{@version}';" onMouseOver="window.status='Click for detailed list of bugs';return true" onMouseOut="window.status='';return true">
							<a href="javascript://" style="text-decoration:none"><xsl:choose>
								<xsl:when test="@build = @version"><b><xsl:value-of select="@build" /> Release</b></xsl:when>
								<xsl:when test="starts-with(@build,@version)"><b><xsl:value-of select="@build" /></b></xsl:when>
								<xsl:otherwise><xsl:value-of select="@version" />&#160;<xsl:value-of select="@build" /></xsl:otherwise>
							</xsl:choose></a>
						</td>
						<td class="normal" width="70%" onClick="servOC('{@project}.{@version}',{string-length(matchCount)})" onMouseOver="window.status='Click for list of bugs';return true" onMouseOut="window.status='';return true"><a href="javascript://" style="text-decoration:none"><xsl:if test="string-length($matchCount)>0"><xsl:value-of select="string-length($matchCount)" /> bugs</xsl:if></a>
						</td>
					</tr>
					<tr style="display:none" id="ihtr{@project}.{@version}"><td bgcolor="#C0D8FF" colspan="2"><table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="white"><tr><td width="10"></td><td style="border:0px solid #000000"><div frameborder="0" width="100%" id="ihif{@project}.{@version}">
						<img src="http://www.eclipse.org/images/c.gif" height="3" width="1"/><br/>
						<xsl:for-each select="//bug">
							<xsl:sort select="@id" data-type="number" order="descending" />
							<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">
								<nobr>
								<xsl:if test="(../@build = ../@version) or number(substring(../@build,2,8)) &gt;= 20041202 or contains(../@build,'RC')">
									<a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source={../@project}&amp;bug={@id}&amp;Bugzilla={@id}"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"/></a><img src="http://www.eclipse.org/images/c.gif" height="1" width="2"/>
								</xsl:if>
								<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={@id}" target="_bugz">
									<xsl:value-of select="@id" />
								</a>,
								</nobr>&#32;&#32;
							</xsl:if>
						</xsl:for-each> <a href="javascript:servOC('{@project}.{@version}',{string-length(matchCount)})" style="text-decoration:none;color:black">&#9632;</a>
						<br/><img src="http://www.eclipse.org/images/c.gif" height="3" width="1"/>
					</div></td><td width="10"></td></tr></table></td></tr>
				</xsl:if>
			</xsl:for-each>
			<tr><td class="spacer"> </td></tr>
		</xsl:if>
		<xsl:if test="count(key('entryProj',@project)) = 0">
			<tr><td colspan="2" class="normal"> &#187; No Release Notes found for <xsl:value-of select="@project" />.</td></tr>
		</xsl:if>
	</xsl:for-each>
	</table>
	<p> </p>

	<!-- content! -->
	<table border="0" cellspacing="1" cellpadding="5" width="100%">
	<xsl:for-each select="project-def">
		<xsl:if test="((count(key('entryProj',@project)) != 0 and $project = @project) or $project = '')">
			<tr class="content-header">
				<td colspan="1" class="sub-header">
					<a name="{@project}"><xsl:value-of select="@label"/></a>
				</td>
			</tr>
			<xsl:for-each select="key('entryProj',@project)">
				<xsl:if test="(starts-with(@version,$version) or $version = '') and ($project = @project or $project = '')">
				<xsl:variable name="thisVersion"><xsl:value-of select="@version" /></xsl:variable>
				<xsl:variable name="thisProject"><xsl:value-of select="@project" /></xsl:variable>
				<xsl:variable name="matchCount"><xsl:for-each select="//bug">
					<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">1</xsl:if>
				</xsl:for-each></xsl:variable>

					<xsl:if test="@build = @version">
						<!-- {@project}.{@version} -->
						<tr><td colspan="1" class="normal">&#160;</td></tr>
						<tr class="content-header">
							<td colspan="1" class="sub-header">
								<a name="{@project}.{@version}"><xsl:value-of select="@build"/> Release</a>
							<xsl:if test="string-length($matchCount)>1">&#160;(<xsl:value-of select="string-length($matchCount)" /> Bugs)</xsl:if>
							</td>
						</tr>
					</xsl:if>

					<xsl:variable name="rowColor">
						<xsl:choose>
							<xsl:when test="(position() mod 2 = 1)">#EEEEEE</xsl:when>
							<xsl:otherwise>#FFFFFF</xsl:otherwise>
						</xsl:choose>
					</xsl:variable>
					<tr valign="top" bgcolor="{$rowColor}">
						<td class="normal" align="left" width="100%">
							
							<a name="{@project}.{@version}"><b class="title">
								<xsl:choose>
									<xsl:when test="@build = @version"><b><xsl:value-of select="@build" /> Release</b></xsl:when>
									<xsl:when test="starts-with(@build,@version)"><b><xsl:value-of select="@build" /></b></xsl:when>
									<xsl:otherwise><xsl:value-of select="@version" />&#160;<xsl:value-of select="@build" /></xsl:otherwise>
								</xsl:choose>
							</b></a>
							<xsl:if test="count(bug)>1">&#160;(<xsl:value-of select="count(bug)" /> Bugs)</xsl:if>

							<xsl:if test="note!=''">
								<br/><span class="details"><xsl:copy-of select="note" /></span>
							</xsl:if>
							<xsl:if test="count(bug)>0">
								<table width="100%" cellspacing="0" cellpadding="2">
								<xsl:for-each select="bug">
									<xsl:sort select="@id" data-type="number" order="descending" />
									<tr id="name{../@project}{../@build}{position()}" onMouseOver="rowOver('{../@project}{../@build}{position()}','#C0D8FF')" onMouseOut="rowOut('{../@project}{../@build}{position()}','{$rowColor}')">
										<td>&#160;</td>
										<xsl:if test="(../@build = ../@version) or number(substring(../@build,2,8)) &gt;= 20041202 or contains(../@build,'RC')">
											<td><a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source={../@project}&amp;bug={@id}&amp;Bugzilla={@id}"><img src="http://www.eclipse.org/emf/images/delta.gif" border="0" alt="CVS Deltas - What's New, CVS?"/></a></td>
											<td>&#160;</td>
										</xsl:if>
										<td align="right"><a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={@id}" target="_bugz"><xsl:value-of select="@id" /></a></td>
										<td>&#160;</td>
										<td><nobr><xsl:choose>
											<xsl:when test="@sub = 'emf,sdo'"><img src="../images/icon-emf.gif" border="0" alt="emf"/>&#160;<img src="../images/icon-sdo.gif" border="0" alt="sdo"/></xsl:when>
											<xsl:when test="@sub = 'sdo'"><img src="../images/icon-sdo.gif" border="0" alt="sdo"/></xsl:when>
											<xsl:otherwise><img src="../images/icon-{../@project}.gif" alt="{../@project}"/></xsl:otherwise>
										</xsl:choose></nobr></td>
										<td>&#160;</td>
										<td width="100%"><xsl:value-of select="." /></td>
									</tr>
								</xsl:for-each>
								</table>
							</xsl:if>
							
						</td>
					</tr>
				</xsl:if>
			</xsl:for-each>
			<tr><td class="spacer"><br/></td><td class="spacer"><br/></td></tr>
		</xsl:if>
		<xsl:if test="count(key('entryProj',@project)) = 0">
			<tr><td colspan="1" class="normal">n/a</td></tr>
		</xsl:if>
	</xsl:for-each>
	</table>
	</form>

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

</body>
</html>
</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: release-notes_v2.xsl,v 1.12 2005/08/16 21:20:57 nickb Exp $ -->