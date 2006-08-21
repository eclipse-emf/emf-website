<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="xml" encoding="ISO-8859-1"/>
<xsl:key name="ent" match="entry" use="category"/>

<!-- since can't pass querystring params to XSL without HTML or PHP wrapper -->
<xsl:variable name="xx">
  <xsl:call-template name="show_faq">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_faq" match="/">
<div id="midcolumn">
<xsl:for-each select="faq">
	<div class="homeitem3col">
	<h3>Index</h3>
	<ul>
	<xsl:for-each select="category-def">
		<li><a href="#{@category}"><xsl:value-of select="@label"/></a></li>
	</xsl:for-each>
	</ul>
	</div>
	<xsl:for-each select="category-def">
		<div class="homeitem3col">
		<h3><xsl:value-of select="@label"/><a name="{@category}"><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text></a>(<xsl:value-of select="count(key('ent',@category))"/>)</h3>
		<xsl:variable name="catgKey"><xsl:value-of select="@category"/></xsl:variable>
		<ul>
		<xsl:for-each select="key('ent',@category)">
			<xsl:variable name="catg">
				<xsl:for-each select="category">
					<xsl:if test="(.)=($catgKey)"><xsl:value-of select="."/></xsl:if>
				</xsl:for-each>
			</xsl:variable>

			<xsl:choose>
			<xsl:when test="question!=''">
				<li>
				<a href="#{$catg}{@UNID}">
				<xsl:for-each select="question">
					<xsl:copy-of select="./node()"/>
				</xsl:for-each>
				</a>
				</li>
			</xsl:when>
			<xsl:otherwise>
				<a href="#{$catg}{@UNID}"><xsl:value-of select="@category"/> - <xsl:value-of select="@date"/></a>
			</xsl:otherwise>
			</xsl:choose>
		</xsl:for-each>
		</ul>
		</div>
	</xsl:for-each>

	<!-- content! -->
	<xsl:for-each select="category-def">
	<div class="homeitem3col">
		<h3><a name="{@category}"><xsl:value-of select="@label"/></a> (<xsl:value-of select="count(key('ent',@category))"/>)</h3>
		<xsl:variable name="catgKey"><xsl:value-of select="@category"/></xsl:variable>
		<ul>
		<xsl:for-each select="key('ent',@category)">
			<xsl:variable name="catg">
				<xsl:for-each select="category">
					<xsl:if test="(.)=($catgKey)"><xsl:value-of select="."/></xsl:if>
				</xsl:for-each>
			</xsl:variable>

			<li class="outerli">
			<div><a name="{$catg}{@UNID}"><xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text></a><a href="#top">top</a></div>
			<xsl:for-each select="question">
				<xsl:copy-of select="./node()"/>
			</xsl:for-each>
			<ul>
			<li>
			<xsl:for-each select="answer">
				<xsl:copy-of select="./node()"/>
			</xsl:for-each>
			</li>
			</ul>
			</li>
		</xsl:for-each>
		</ul>
	</div>
	</xsl:for-each>
	<p>Last modified: <xsl:value-of select="substring-before(substring-after(modified,concat('$','Date',':')),'$')"/></p>
</xsl:for-each>
</div>
</xsl:template>

</xsl:stylesheet>
