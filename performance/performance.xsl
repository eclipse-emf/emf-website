<xsl:stylesheet version = '1.0' xmlns:xsl='http://www.w3.org/1999/XSL/Transform' xmlns:msxsl="urn:schemas-microsoft-com:xslt">
<xsl:output method="html" encoding="ISO-8859-1"/>

	<xsl:param name="XMLfile"></xsl:param> <!-- LEAVE BLANK - pass value of the xml doc being parsed into stylesheet via javascript -->
	<xsl:param name="showFiltersOrHeaderFooter"></xsl:param> <!-- LEAVE BLANK - pass value of '1' into stylesheet via javascript -->
	<xsl:param name="threshholdPercentage">3</xsl:param>
	<xsl:param name="filter">CPU Time</xsl:param>
	<xsl:param name="unitSigDigs">100000</xsl:param> <!-- number of decimal places to keep in displaying values -->
	<xsl:param name="pcntSigDigs">10</xsl:param> <!-- number of decimal places to keep in displaying percentages -->

<xsl:variable name="xx">
  <xsl:call-template name="show_perf_data">
  </xsl:call-template>
</xsl:variable>

<xsl:template name="show_perf_data" match="/">
<xsl:for-each select="data">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
    <title>Eclipse Tools - EMF, SDO and XSD - Performance Data<xsl:if test="$filter != 'all'">: <xsl:value-of select="$filter" /></xsl:if></title>
    <link REL="SHORTCUT ICON" HREF="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/scripts/includes/nav.js"></script>
	<link rel="stylesheet" href="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/scripts/includes/style.css" type="text/css"/>
	<!-- <style>@import url("performance.css");</style> -->
	</head>
	<body>

	<xsl:if test="$showFiltersOrHeaderFooter!='1'">

	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr valign="top"><td colspan="1" align="left" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" BGCOLOR="#006699" >

		 <tr>
			  <td BGCOLOR="#000000" width="116" height="50"><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
			  <td width="637" height="50" style="background-repeat: repeat-y;" background="http://www.eclipse.org/images/gradient.jpg"></td>
			  <td width="250" height="50"><img src="http://www.eclipse.org/images/eclipse-org-simple-small.GIF" width="250" height="48"/></td>
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
		Performance Data<xsl:if test="$filter != 'all'">: <xsl:value-of select="$filter" /></xsl:if>
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

<td align="LEFT" valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica" color="#FFFFFF">
	Performance Data for <xsl:value-of select="build[1]/@id" /> (<xsl:value-of select="build[1]/@type" />)
	and <xsl:value-of select="build[2]/@id" /> (<xsl:value-of select="build[2]/@type" />)<xsl:if test="$filter != 'all'">: <xsl:value-of select="$filter" /></xsl:if>
</font></b><a name="top">&#160;</a></td>
</tr>
</table>
<table border="0" cellpadding="2" width="100%" >
<tr>
<td align="right" valign="TOP"><b><small><a href="#quicknav">Quick Nav</a></small></b></td>
</tr>
<tr>
<td>

<!-- header stuff -->

</td>
</tr>
</table>

	<!-- form controls -->
	<xsl:if test="$showFiltersOrHeaderFooter='1'">
		<form action="performance.php" method="get" name="mainform">
			<table border="0">
					<tr>
				<td><b>Threshhold Percentage</b><br/><small>
				Absolute value of deltas less than<br/>
				this percentage will be omitted from<br/>
				the plot. To include all, use -1.</small></td>
				<td>&#160;</td>
				<td colspan="2"><input class="field9px" size="3" name="threshholdPercentage" value="{$threshholdPercentage}"/></td>
					</tr>
				<td colspan="3"><b>Filter</b><br/>
				<select class="field9px" name="filter" size="1">
					<option value="CPU Time">
						CPU Time [User Time + Kernel/System Time] (s)</option>
					<option value="Kernel time">
						Kernel/System Time (s)</option>
					<option value="Soft Page Faults">
						Soft Page Faults [Minor fault: no load from disk] </option>
					<option value="Hard Page Faults">
						Hard Page Faults [Major fault, process + children]</option>
					<option value="Working Set">
						Working Set (bytes)</option>
					<option value="Text Size">
						Text/Code Size (bytes)</option>
					<option value="Library Size">
						Library Size (bytes) </option>
					<option value="Data Size">
						Data/Stack Size (bytes)</option>
					<option value="Used Java Heap">
						Used Java Heap [Used Memory] (bytes)</option>
			</select>
			<a href="#legend"><img src="http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/question.gif" border="0"/></a>
			<br/>
		 <input type="submit" value="Compare"/>
		 <input type="hidden" name="XMLfile" value="{$XMLfile}"/>
		 </td>
			</table>
		</form>
	</xsl:if>

<xsl:call-template name="show_perf_data_columns"></xsl:call-template>

<!-- legend -->
<p>
<table border="0" cellpadding="0" cellspacing="0">
<tr><td colspan="4"><b><a name="legend">Legend</a></b></td></tr>
<tr bgcolor="#EEEECC"><td><b><small>Property</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Description</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Units</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Calculated From</small></b></td></tr>
<tr bgcolor="#FFFFFF"><td><b><small>CPU Time</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>User Time + Kernel/System Time</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>ms or &#956;s</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/stat</small></b></td></tr>
<tr bgcolor="#EEEEEE"><td><b><small>Kernel Time</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Kernel/System Time</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>ms or &#956;s</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/stat</small></b></td></tr>
<tr bgcolor="#FFFFFF"><td><b><small>Soft Page Faults</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Minor fault: no load from disk</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small></small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/stat</small></b></td></tr>
<tr bgcolor="#EEEEEE"><td><b><small>Hard Page Faults</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Major fault, process + children</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small></small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/stat</small></b></td></tr>
<tr bgcolor="#FFFFFF"><td><b><small>Working Set</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Working Set</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>bytes</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/statm</small></b></td></tr>
<tr bgcolor="#EEEEEE"><td><b><small>Text Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Text/Code Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>bytes</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/statm</small></b></td></tr>
<tr bgcolor="#FFFFFF"><td><b><small>Library Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Library Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>bytes</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/statm</small></b></td></tr>
<tr bgcolor="#EEEEEE"><td><b><small>Data Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Data/Stack Size</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>bytes</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>/proc/self/statm</small></b></td></tr>
<tr bgcolor="#FFFFFF"><td><b><small>Used Java Heap</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>Used Memory</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>bytes</small></b></td>
	<td>&#160;&#160;</td>
	<td><b><small>free -b</small></b></td></tr>
</table>
</p>

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

<xsl:template name="show_perf_data_columns" match="data">
	<!-- begin comparison columns -->

	<table cellpadding="0" cellspacing="0">

	<xsl:for-each select="build[1]/testsuite">
		<xsl:variable name="package"><xsl:value-of select="@package" /></xsl:variable>
		<tr><td colspan="13">
		<h4><xsl:value-of select="@package" /></h4>
		</td></tr>

		<!-- improvements -->
		<tr bgcolor="#EEEECC">
		<td colspan="3" width="201"><b><small style="color:green">Improvements</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>Build</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>Reference</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>ClassName</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>testMethod()</small></b></td>
		<xsl:if test="$filter = 'all'">
			<td><small>&#160;</small></td>
			<td><a href="#legend" style="color:black"><b><small>Property</small></b></a></td>
		</xsl:if>
		<td><small>&#160;</small></td>
		<td align="right"><b><small>#</small></b></td>
		</tr>
		<xsl:for-each select="testcase">
			<xsl:variable name="classname"><xsl:value-of select="@classname" /></xsl:variable>
			<xsl:variable name="name"><xsl:value-of select="@name" /></xsl:variable>
			<xsl:for-each select="property">
				<xsl:if test="./@name != 'Iterations' and ($filter = 'all' or contains(./@name,$filter))">
					<xsl:variable name="property"><xsl:value-of select="./@name" /></xsl:variable>
					<xsl:variable name="iterations1"><xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name='Iterations']/@value" /></xsl:variable>
					<xsl:variable name="iterations2"><xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name='Iterations']/@value" /></xsl:variable>

					<xsl:variable name="value1">
					<xsl:choose>
					<!-- normalize only for time values -->
					<xsl:when test="contains($property,'time') or contains($property,'Time')">
						<xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value div $iterations1" />
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value" />
					</xsl:otherwise>
					</xsl:choose>
					</xsl:variable>

					<xsl:variable name="value2">
					<xsl:choose>
					<!-- normalize only for time values -->
					<xsl:when test="contains($property,'time') or contains($property,'Time')">
						<xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value div $iterations2" />
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value" />
					</xsl:otherwise>
					</xsl:choose>
					</xsl:variable>

					<!-- note that ordering here ensures a positive value for $delta; we want greater-than-or-equal zero -->
					<xsl:variable name="delta"><xsl:value-of select="round(($value2 - $value1) div $value2 * 100 * $pcntSigDigs) div $pcntSigDigs" /></xsl:variable>
					<xsl:if test="$delta &gt;= 0 and ($threshholdPercentage &lt; 0 or $delta &gt;= $threshholdPercentage)">
						<tr>
						<xsl:choose>
						<xsl:when test="$delta &gt;= 250">
							<xsl:attribute name="bgcolor">#EEEECC</xsl:attribute>
						</xsl:when>
						<xsl:otherwise>
							<xsl:attribute name="bgcolor">#FFFFFF</xsl:attribute>
						</xsl:otherwise>
						</xsl:choose>

						<xsl:variable name="width"><xsl:choose>
							<xsl:when test="$delta &gt; 100">100</xsl:when><xsl:otherwise><xsl:value-of select="$delta" /></xsl:otherwise>
						</xsl:choose></xsl:variable>
						<td align="right"><small>
							<xsl:value-of select="$delta" />%&#160;</small></td>
						<td bgcolor="black" width="1"><small>&#160;</small></td>
						<td align="left"><img src="http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/misc/bar-green.png" width="{$width}" height="5" border=""/></td>
						<td><small>&#160;</small></td>
						<td><small style="color:navy"><xsl:choose>
							<xsl:when test="(contains($property,'time') or contains($property,'Time')) and $value1 &lt; 0.01">
								<xsl:value-of select="round($value1 * 1000 * $unitSigDigs) div $unitSigDigs" />&#160;&#956;s
							</xsl:when>
							<xsl:when test="contains($property,'time') or contains($property,'Time')">
								<xsl:value-of select="round($value1 * $unitSigDigs) div $unitSigDigs" />&#160;ms
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$value1" /></xsl:otherwise>
						</xsl:choose></small></td>
						<td><small>&#160;&#160;&#160;</small></td>
						<td><small style="color:#003333"><xsl:choose>
							<xsl:when test="(contains($property,'time') or contains($property,'Time')) and $value2 &lt; 0.01">
								<xsl:value-of select="round($value2 * 1000 * $unitSigDigs) div $unitSigDigs" />&#160;&#956;s
							</xsl:when>
							<xsl:when test="contains($property,'time') or contains($property,'Time')">
								<xsl:value-of select="round($value2 * $unitSigDigs) div $unitSigDigs" />&#160;ms
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$value2" /></xsl:otherwise>
						</xsl:choose></small></td>
						<td><small>&#160;&#160;&#160;</small></td>
						<td nowrap="nowrap"><nobr><small><xsl:value-of select="substring-after($classname,concat($package,'.'))" /></small></nobr></td>
						<td><small>&#160;</small></td>
						<td nowrap="nowrap"><nobr><small><xsl:value-of select="$name" />()</small></nobr></td>
						<xsl:if test="$filter = 'all'">
							<td><small>&#160;</small></td>
							<td nowrap="nowrap"><nobr><small><xsl:value-of select="$property" /></small></nobr></td>
						</xsl:if>
						<td><small>&#160;</small></td>
						<td nowrap="nowrap" align="right"><nobr><small>
						<xsl:choose>
							<xsl:when test="not(contains($property,'time')) and not(contains($property,'Time'))">1</xsl:when>
							<xsl:when test="$iterations1 &gt; $iterations2">
							<xsl:value-of select="$iterations1" /> &gt;
							<xsl:value-of select="$iterations2" />
							</xsl:when>
							<xsl:when test="$iterations1 &lt; $iterations2">
							<xsl:value-of select="$iterations1" /> &lt;
							<xsl:value-of select="$iterations2" />
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$iterations1" /></xsl:otherwise>
						</xsl:choose>
						</small></nobr></td>
						</tr>
						<tr>
						<td colspan="1" bgcolor="#EEEEEE" height="1"></td>
						<td colspan="1" bgcolor="#000000" height="1"></td>
						<td colspan="11" bgcolor="#EEEEEE" height="1"></td>
						</tr>
					</xsl:if>
				</xsl:if>
			</xsl:for-each>
		</xsl:for-each>

		<tr><td>&#160;</td></tr>

		<!-- regressions -->
		<tr bgcolor="#FFFFCC">
		<td colspan="3"><b><small style="color:red">Regressions</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>Build</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>Reference</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>ClassName</small></b></td>
		<td><small>&#160;</small></td>
		<td><b><small>testMethod()</small></b></td>
		<xsl:if test="$filter = 'all'">
			<td><small>&#160;</small></td>
			<td><a href="#legend" style="color:black"><b><small>Property</small></b></a></td>
		</xsl:if>
		<td><small>&#160;</small></td>
		<td align="right"><b><small>#</small></b></td>
		</tr>
		<xsl:for-each select="testcase">
			<xsl:variable name="classname"><xsl:value-of select="@classname" /></xsl:variable>
			<xsl:variable name="name"><xsl:value-of select="@name" /></xsl:variable>
			<xsl:for-each select="property">
				<xsl:if test="./@name != 'Iterations' and ($filter = 'all' or contains(./@name,$filter))">
					<xsl:variable name="property"><xsl:value-of select="./@name" /></xsl:variable>
					<xsl:variable name="iterations1"><xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name='Iterations']/@value" /></xsl:variable>
					<xsl:variable name="iterations2"><xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name='Iterations']/@value" /></xsl:variable>

					<xsl:variable name="value1">
					<xsl:choose>
					<!-- normalize only for time values -->
					<xsl:when test="contains($property,'time') or contains($property,'Time')">
						<xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value div $iterations1" />
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="//build[1]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value" />
					</xsl:otherwise>
					</xsl:choose>
					</xsl:variable>

					<xsl:variable name="value2">
					<xsl:choose>
					<!-- normalize only for time values -->
					<xsl:when test="contains($property,'time') or contains($property,'Time')">
						<xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value div $iterations2" />
					</xsl:when>
					<xsl:otherwise>
						<xsl:value-of select="//build[2]/testsuite[@package=$package]/testcase[@classname=$classname and @name=$name]/property[@name=$property]/@value" />
					</xsl:otherwise>
					</xsl:choose>
					</xsl:variable>

					<!-- note that ordering here ensures a positive value for $delta; we want greater-than zero only -->
					<xsl:variable name="delta"><xsl:value-of select="round(($value1 - $value2) div $value2 * 100 * $pcntSigDigs) div $pcntSigDigs" /></xsl:variable>
					<xsl:if test="$delta &gt; 0 and ($threshholdPercentage &lt; 0 or $delta &gt;= $threshholdPercentage)">
						<tr>
						<xsl:choose>
						<xsl:when test="$delta &gt;= 250">
							<xsl:attribute name="bgcolor">#FFFFCC</xsl:attribute>
						</xsl:when>
						<xsl:otherwise>
							<xsl:attribute name="bgcolor">#FFFFFF</xsl:attribute>
						</xsl:otherwise>
						</xsl:choose>

						<xsl:variable name="width"><xsl:choose>
							<xsl:when test="$delta &gt; 100">100</xsl:when><xsl:otherwise><xsl:value-of select="$delta" /></xsl:otherwise>
						</xsl:choose></xsl:variable>
						<td align="right"><img src="http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/images/misc/bar-red.png" width="{$width}" height="5" border=""/></td>
						<td bgcolor="black" width="1"><small>&#160;</small></td>
						<td align="left"><small>&#160;<xsl:choose>
							<xsl:when test="$delta &gt;= 75">
								<b style="color:red;font-size:13px">&#160;<xsl:value-of select="$delta" />%</b>
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$delta" />%</xsl:otherwise>
						</xsl:choose></small></td>
						<td><small>&#160;</small></td>
						<td><small style="color:navy"><xsl:choose>
							<xsl:when test="(contains($property,'time') or contains($property,'Time')) and $value1 &lt; 0.01">
								<xsl:value-of select="round($value1 * 1000 * $unitSigDigs) div $unitSigDigs" /> &#956;s
							</xsl:when>
							<xsl:when test="contains($property,'time') or contains($property,'Time')">
								<xsl:value-of select="round($value1 * $unitSigDigs) div $unitSigDigs" /> ms
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$value1" /></xsl:otherwise>
						</xsl:choose></small></td>
						<td><small>&#160;&#160;&#160;</small></td>
						<td><small style="color:#003333"><xsl:choose>
							<xsl:when test="(contains($property,'time') or contains($property,'Time')) and $value2 &lt; 0.01">
								<xsl:value-of select="round($value2 * 1000 * $unitSigDigs) div $unitSigDigs" /> &#956;s
							</xsl:when>
							<xsl:when test="contains($property,'time') or contains($property,'Time')">
								<xsl:value-of select="round($value2 * $unitSigDigs) div $unitSigDigs" /> ms
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$value2" /></xsl:otherwise>
						</xsl:choose></small></td>
						<td><small>&#160;&#160;&#160;</small></td>
						<td nowrap="nowrap"><nobr><small><xsl:value-of select="substring-after($classname,concat($package,'.'))" /></small></nobr></td>
						<td><small>&#160;</small></td>
						<td nowrap="nowrap"><nobr><small><xsl:value-of select="$name" />()</small></nobr></td>
						<xsl:if test="$filter = 'all'">
							<td><small>&#160;</small></td>
							<td nowrap="nowrap"><nobr><small><xsl:value-of select="$property" /></small></nobr></td>
						</xsl:if>
						<td><small>&#160;</small></td>
						<td nowrap="nowrap" align="right"><nobr><small>
						<xsl:choose>
							<xsl:when test="not(contains($property,'time')) and not(contains($property,'Time'))">1</xsl:when>
							<xsl:when test="$iterations1 &gt; $iterations2">
							<xsl:value-of select="$iterations1" /> &gt;
							<xsl:value-of select="$iterations2" />
							</xsl:when>
							<xsl:when test="$iterations1 &lt; $iterations2">
							<xsl:value-of select="$iterations1" /> &lt;
							<xsl:value-of select="$iterations2" />
							</xsl:when>
							<xsl:otherwise><xsl:value-of select="$iterations1" /></xsl:otherwise>
						</xsl:choose>
						</small></nobr></td>
						</tr>
						<tr>
						<td colspan="1" bgcolor="#EEEEEE" height="1"></td>
						<td colspan="1" bgcolor="#000000" height="1"></td>
						<td colspan="11" bgcolor="#EEEEEE" height="1"></td>
						</tr>
					</xsl:if>
				</xsl:if>
			</xsl:for-each>
		</xsl:for-each>

		<tr><td>&#160;<br/></td></tr>

	</xsl:for-each>

	</table>
	<!-- end comparison columns -->
</xsl:template>

</xsl:stylesheet>
<!-- $Id$ -->