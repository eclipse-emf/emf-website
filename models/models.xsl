<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="xml" encoding="ISO-8859-1"/>
<xsl:key name="modelCatg" match="model" use="@category"/>
<xsl:key name="reviewmodelID" match="review" use="@modelID"/>

<xsl:variable name="xx">
	<xsl:call-template name="show_models">
	</xsl:call-template>
</xsl:variable>

<xsl:template name="show_models" match="/">
<xsl:for-each select="data">
	<div id="midcolumn">
	<p>
	<a href="models-submit.php">Submit an EMF, SDO, or XSD model, plugin, tool...</a>
	</p>

	<!-- table of contents -->
	<p>
	<b>Newest Contribution: </b> 
	<xsl:for-each select="model">
		<xsl:if test="(position()=1)">
			<xsl:value-of select="@date"/>
		</xsl:if>
	</xsl:for-each>

	<br/>
	<b>Newest Review: </b> 
	<xsl:for-each select="review">
		<xsl:if test="(position()=1)">
			<xsl:value-of select="@date"/>
		</xsl:if>
	</xsl:for-each>
	</p>

	<p>
	Welcome to the EMF Corner! On this page you will find projects, plugins, models, tools, and other materials contributed by the EMF Community. Want to contribute something? Just click <a href="models-submit.php">here</a> to add your contribution to this list.
	</p>
	<p>
	We welcome your feedback about this idea, as well as your feedback about contributions on this page. If enough people comment favourably about the code provided here, it may one day make its way into the EMF code base. Or into our test suite. Or something. 
	</p>
	<p>
	If you would like to update or revise an existing entry, please submit a new entry or review. Comments, feedback: <a href="mailto:codeslave(at)ca.ibm.com?Subject=EMF Corner Comments">codeslave(at)ca.ibm.com</a>.
	</p>

	<!-- hide header table if there's less than 10 models here - not a lot of point for #s less than that -->
	<xsl:if test="count(model) &gt; 20">
		<div class="homeitem3col">
		<h3>Index</h3>
		<ul>
		<li class="lastupdate">
		<div>Posted / Updated</div>
		</li>
		<xsl:for-each select="category-def">
			<xsl:if test="count(key('modelCatg',@category)) != 0">
				<li class="outerli">
				<b><xsl:value-of select="@label"/></b> (<xsl:value-of select="count(key('modelCatg',@category))"/>)
				<ul>
				<xsl:for-each select="key('modelCatg',@category)">
					<li>
					<xsl:sort select="@date" order="descending"/>
					<div>
					<xsl:value-of select="substring(@date,1,10)"/>
					</div>
					<xsl:choose>
						<xsl:when test="@modelName">
							<a href="#{@category}{position()}"><xsl:value-of select="@modelName"/></a>
						</xsl:when>
						<xsl:otherwise>
							<a href="#{@category}{position()}"><xsl:value-of select="@category"/> - <xsl:value-of select="@date"/></a>
						</xsl:otherwise>
					</xsl:choose>
					<xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text>
					<xsl:if test="text">
						<xsl:choose>
						<xsl:when test="string-length(text) &gt; 220">
							<xsl:value-of select="substring(text,1,220)"/>...
						</xsl:when>
						<xsl:otherwise>
							<xsl:value-of select="text"/>
						</xsl:otherwise>
						</xsl:choose>
					</xsl:if>
					<xsl:text disable-output-escaping="yes">&#038;#160;</xsl:text><a href="#{@category}{position()}">More...</a>
					</li>
				</xsl:for-each>
				</ul>
				</li>
			</xsl:if>
		</xsl:for-each>
		</ul>
		</div>
	</xsl:if>

	<!-- content! -->
	<xsl:for-each select="category-def">
		<xsl:if test="count(key('modelCatg',@category)) != 0">
			<div class="homeitem3col">
			<h3><xsl:value-of select="@label"/> (<xsl:value-of select="count(key('modelCatg',@category))"/>)</h3>
			<ul>
			<xsl:for-each select="key('modelCatg',@category)">
				<xsl:sort select="@date" order="descending"/>
				<li class="rootpoint">
				<xsl:choose>
					<xsl:when test="thumbnailURL!='' and screenshotURL!=''">
						<a target="_out" href="{screenshotURL}"><img class="screenshot" alt="Screenshot" src="{thumbnailURL}"/></a>
					</xsl:when>
					<xsl:when test="thumbnailURL!=''">
						<img class="screenshot" alt="image" src="{thumbnailURL}"/>
					</xsl:when>
				</xsl:choose>
				<b><a name="{@category}{position()}" target="_out" href="{modelURL}"><xsl:value-of select="@modelName"/></a></b>, 
				<xsl:choose>
					<xsl:when test="submitterURL!=''">
						by <a target="_out" href="{submitterURL}"><xsl:value-of select="submitter"/></a>, 
					</xsl:when>
					<xsl:otherwise>
						by <xsl:value-of select="submitter"/>, 
					</xsl:otherwise>
				</xsl:choose> 
				<xsl:value-of select="@date"/>
				<br/>
				<xsl:copy-of select="text/node()"/>
				<ul>
				<li>
				<a class="bold" target="_out" href="{modelURL}">Download</a>
				</li>
				<xsl:if test="submitterURL!=''">
					<li>
					<a target="_out" href="{submitterURL}">Visit Site</a>
					</li>
				</xsl:if>
				<xsl:if test="screenshotURL!=''">
					<li>
					<a target="_out" href="{screenshotURL}">Screenshot</a><br/>
					</li>
				</xsl:if>
				<li class="reviews">Reviews</li>
				<li class="outerli">
				<ul>
				<xsl:if test="count(key('reviewmodelID',@modelID)) != 0">
					<xsl:for-each select="key('reviewmodelID',@modelID)">
						<xsl:sort select="@date" order="descending"/>
						<!-- only show the 3 most recent reviews: need to sort by @date if so -->
						<!-- otherwise, sort by @rating for top-down numbering? -->
						<xsl:if test="(position() &lt; 4)">
							<li class="iehack">
							<xsl:if test="number(@rating) > 9">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x16.gif"/>
							</xsl:if>
							<xsl:if test="number(@rating) > 7">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x16.gif"/>
							</xsl:if>
							<xsl:if test="number(@rating) > 5">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x16.gif"/>
							</xsl:if>
							<xsl:if test="number(@rating) > 3">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x16.gif"/>
							</xsl:if>
							<xsl:if test="number(@rating) > 1">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x16.gif"/>
							</xsl:if>
							<xsl:if test="number(@rating) mod 2 = 1">
								<img alt="{@rating} of 10" src="/emf/images/eclipse-icons/eclipse32_16x8.gif"/>
							</xsl:if>
							<br/>
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
							<br/>
							<xsl:value-of select="text"/>
							<a target="_out" href="{reviewURL}"><i><xsl:value-of select="reviewURL"/></i></a>
							</li>
						</xsl:if>
					</xsl:for-each>
					<li>
					<a href="models-review.php?ModelID={@modelID}&amp;name={@modelName}">Submit a review</a>
					</li>
				</xsl:if>
				<xsl:if test="count(key('reviewmodelID',@modelID)) = 0">
					<li>
					<!-- reviews -->
					No reviews yet. <a href="models-review.php?ModelID={@modelID}&amp;name={@modelName}">Submit a review</a>
					</li>
				</xsl:if>
				</ul>
				</li>

				</ul>
				</li>
			</xsl:for-each>
			</ul>
			</div>
		</xsl:if>
	</xsl:for-each>

	<p><a href="models-submit.php">Submit an EMF, SDO, or XSD model, plugin, tool...</a></p>
	</div>
</xsl:for-each>
</xsl:template>

</xsl:stylesheet>
<!-- $Id: models.xsl,v 1.22 2006/08/21 21:28:59 nickb Exp $ -->
