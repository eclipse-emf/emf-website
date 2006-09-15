<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="xml" encoding="ISO-8859-1"/>

	<xsl:key name="entryProj" match="entry" use="@project"/>
	<xsl:key name="versionDefVer" match="version-def" use="@version"/>

	<xsl:param name="project"></xsl:param>
	<xsl:param name="version"></xsl:param>

<xsl:variable name="xx">
	<xsl:call-template name="show_notes">
	</xsl:call-template>
</xsl:variable>

<xsl:template name="show_notes" match="/">
<xsl:for-each select="data">
	<div id="midcolumn">
	<!-- form controls -->
	<xsl:copy-of select="document('release-notes-form-controls.xml')/div/node()"/>

	<!-- nav header table (release/milestone list) -->
	<xsl:for-each select="project-def">
		<xsl:if test="((count(key('entryProj',@project)) != 0 and $project = @project) or $project = '')">
			<div class="homeitem3col">
			<h3><a class="projtitle" href="#{@project}"><xsl:value-of select="@label"/></a></h3>
			<ul>
			<li class="header">
			<div class="fr">Bugs Closed</div>
			</li>
			<xsl:variable name="thisProject"><xsl:value-of select="@project"/></xsl:variable>
			<xsl:for-each select="//version-def">
				<xsl:if test="not(contains(@label,'.x')) and (starts-with(@version,$version) or $version = '') and ($project = $thisProject or $project = '')">
					<li>
					<xsl:variable name="thisVersion"><xsl:value-of select="@version"/></xsl:variable>
					<xsl:variable name="matchCount">
						<xsl:for-each select="//bug">
							<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">1</xsl:if>
						</xsl:for-each>
					</xsl:variable>

					<xsl:variable name="isReleaseBuild">
						<xsl:for-each select="//entry">
							<xsl:if test="@build = @version and @version = $thisVersion">1</xsl:if>
						</xsl:for-each>
					</xsl:variable>

					<!-- project: <xsl:value-of select="$thisProject" />, version: <xsl:value-of select="$thisVersion" /> -->
					<div class="cb">
					<div class="fr">
					<xsl:if test="string-length($matchCount)>=0">
						<xsl:value-of select="string-length($matchCount)"/>
					</xsl:if>
					</div>
					<xsl:choose>
						<xsl:when test="string-length($isReleaseBuild) &lt; 1">
							<b><xsl:value-of select="$thisVersion"/> Release</b>
						</xsl:when>
						<xsl:otherwise>
							<b><a href="#r{$thisVersion}"><xsl:value-of select="$thisVersion"/> Release</a></b>
						</xsl:otherwise>
					</xsl:choose>
					<xsl:if test="string-length($isReleaseBuild) &lt; 1"> (In Progress)</xsl:if>
					</div>
					<div style="display:none" id="{$thisProject}-{$thisVersion}">
					<xsl:for-each select="//bug">
						<xsl:sort select="@id" data-type="number" order="descending" />
						<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">
							<div class="fl">
							<a href="http://www.eclipse.org/emf/searchcvs.php?q={@id}"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Delta"/></a>
							<a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id={@id}" target="_bugz"><xsl:value-of select="@id"/></a>, <xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text>
							</div>
						</xsl:if>
					</xsl:for-each>
					<div class="fl">&#9632;</div>
					</div>
					<div class="cb"><a id="{$thisProject}-{$thisVersion}-tog" href="javascript:toggle('{$thisProject}-{$thisVersion}')">show bug numbers</a></div>
					</li>
				</xsl:if>
			</xsl:for-each>
			</ul>
			</div>
		</xsl:if>
		<xsl:if test="count(key('entryProj',@project)) = 0">
			&#187; No Release Notes found for <xsl:value-of select="@project"/>.
		</xsl:if>
	</xsl:for-each>

	<!-- content! -->
	<xsl:for-each select="project-def">
		<xsl:if test="((count(key('entryProj',@project)) != 0 and $project = @project) or $project = '')">
			<div class="homeitem3col">
			<h3><xsl:value-of select="@label"/><a name="{@project}"><xsl:text disable-output-escaping="yes">&#038;nbsp;</xsl:text></a></h3>
			<ul>
			<xsl:for-each select="key('entryProj',@project)">
				<xsl:sort select="@build" order="ascending" data-type="number"/>
				<xsl:if test="(starts-with(@version,$version) or $version = '') and ($project = @project or $project = '')">
					<xsl:variable name="thisVersion"><xsl:value-of select="@version"/></xsl:variable>
					<xsl:variable name="thisProject"><xsl:value-of select="@project"/></xsl:variable>
					<xsl:variable name="matchCount">
						<xsl:for-each select="//bug">
							<xsl:if test="starts-with(../@version,$thisVersion) and ../@project = $thisProject">1</xsl:if>
						</xsl:for-each>
					</xsl:variable>

					<xsl:if test="@build = @version">
						<!-- {@project}.{@version}.{@build} -->
						<li class="release">
						<xsl:value-of select="@build"/> Release
						<xsl:if test="string-length($matchCount)>1"><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text>(<xsl:value-of select="string-length($matchCount)"/> Bugs)</xsl:if>
						<a name="r{@version}"><xsl:text disable-output-escaping="yes">&#038;nbsp;</xsl:text></a>
						</li>
					</xsl:if>

					<li class="outerli">
					<xsl:choose>
						<xsl:when test="@build = @version"><xsl:value-of select="@build"/> Release</xsl:when>
						<xsl:when test="starts-with(@build,@version)"><xsl:value-of select="@build"/></xsl:when>
						<xsl:otherwise><xsl:value-of select="@version"/><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text><xsl:value-of select="@build"/></xsl:otherwise>
					</xsl:choose>
					<xsl:if test="count(bug)>1"> (<xsl:value-of select="count(bug)"/> Bugs)</xsl:if>

					<xsl:if test="count(bug)>0">
						<xsl:if test="note!=''">
							<xsl:copy-of select="note/node()"/>
						</xsl:if>
						<ul>
						<xsl:for-each select="bug">
						<xsl:sort select="@id" data-type="number" order="descending"/>
							<li>
							<div class="fr">
							<xsl:choose>
								<xsl:when test="@sub = 'emf,sdo'"><img src="../images/icon-emf.gif" alt="EMF"/><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text><img src="../images/icon-sdo.gif" alt="SDO"/></xsl:when>
								<xsl:when test="@sub = 'sdo'"><img src="../images/icon-sdo.gif" alt="SDO"/></xsl:when>
								<xsl:otherwise><img src="../images/icon-{../@project}.gif" alt="{../@project}"/></xsl:otherwise>
							</xsl:choose>
							</div>
						    <a href="http://www.eclipse.org/emf/searchcvs.php?q={@id}"><img src="http://www.eclipse.org/emf/images/delta.gif" alt="CVS Delta"/></a><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text>
							<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id={@id}" target="_bugz"><xsl:value-of select="@id"/></a><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text>
							<xsl:value-of select="."/>
							</li>
						</xsl:for-each>
						</ul>
					</xsl:if>
					</li>
				</xsl:if>
			</xsl:for-each>
			</ul>
			</div>
		</xsl:if>
		<xsl:if test="count(key('entryProj',@project)) = 0">
			<div>n/a</div> <!-- will this ever happen? -->
		</xsl:if>
	</xsl:for-each>
	</div>
</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: release-notes.xsl,v 1.43 2006/09/15 04:14:10 nickb Exp $ -->
