<!-- $Id: nav.php,v 1.17 2005/08/04 20:57:17 nickb Exp $ -->
<!-- quick nav -->
		&#160;
		<table border="0" width="100%">
			<tr>
			<td width="80%" valign="top">
				<table width="100%" cellpadding="2" cellspacing="2" border="0">
					<tr>
					<td colspan="1" class="head_section">
						<a name="quicknav"><b>Quick Nav</b></a>
					</td>
					</tr>
				</table>
			</td>
		<?php if (!$newsInSidebar) { ?>
			<td>
			</td>
			<td width="20%" valign="top">
				<table width="212" cellpadding="2" cellspacing="2" border="0">
					<tr>
					<td colspan="1" class="head_section">
						<b>News</b>
					</td>
					</tr>
				</table>
			</td>
		<?php } ?>
			</tr>
		<tr>
      <td width="100%" valign="top">

		<table width="100%" id="AutoNumber1" border="0" bordercolor="#111111"
 style="border-collapse: collapse;" cellspacing="0" cellpadding="0">
          <tr>
            <td> <a
 href="<?php if (!$isEMFserver) { ?>http://download.eclipse.org<?php } ?>/tools/emf/scripts/downloads.php"><img
 src="http://www.eclipse.org/emf/images/download.gif" border="0"></a></td>

<td height="42"> 

	<a href="<?php if (!$isEMFserver) { ?>http://download.eclipse.org<?php } ?>/tools/emf/scripts/downloads.php" target="_self" class="category">Downloads</a>
	:: <a href="<?php if (!$isEMFserver) { ?>http://download.eclipse.org<?php } ?>/tools/emf/updates" target="_self" class="category">UM Site</a>
	<?php if ($isEMFserver) { ?>
	:: <a href="http://emf.torolab.ibm.com/emf/build.php" target="_self" class="category">New Build</a>
	:: <a href="http://emf.torolab.ibm.com/emf/secure/promo.php" target="_self" class="category">Promo</a>
	:: <a href="http://eclipse.org/downloads/stats.php" target="_new" class="category">Stats</a>

	<?php } ?>
	<br>
	<a name="over2" class="category">v2.x:</a> <a href="<?php if (!$isEMFserver) { ?>http://download.eclipse.org<?php } ?>/tools/emf/scripts/downloads.php" target="_self" class="subcategory">EMF,	SDO &amp; XSD</a>, 
	<a name="over1" class="category">v1.x:</a> <a href="http://www.eclipse.org/emf/downloads/dl-emf1x.html" class="subcategory">EMF &amp; XSD</a> 

	<?php if ($isEMFserver) { ?>
		<br>
		<a name="testResults" class="category">Test Results:</a> <a href="http://emf.torolab.ibm.com/tests/results-jdk13.php" target="_self" class="category">1.3</a>, <a href="http://emf.torolab.ibm.com/tests/results-jdk14.php" target="_self" class="category">1.4</a>, <a href="http://emf.torolab.ibm.com/tests/results-jdk50.php" target="_self" class="category">5.0</a>, <a href="http://emf.torolab.ibm.com/tests/results.php" target="_self" class="category">BVT, FVT, SVT</a>, <a href="http://emf.torolab.ibm.com/tests/results-perf.php" target="_self" class="category">Perf</a>, <a href="http://emftest03.torolab.ibm.com/tests/results-perf.php" target="_self" class="category">Perf2</a>
		<br>
		<a href="http://emf.torolab.ibm.com/emf/secure/patch.php" target="_self" class="category">New Test</a> <i><small class="subcategory">(with optional patch or continuous perf)</small></i> <!--:: <a href="http://emf.torolab.ibm.com/emf/secure/performance/" target="_self" class="category">Perf</a> :: <a href="http://emf.torolab.ibm.com/emf/secure/junit-results.php" target="_self" class="category">JUnit</a> -->
	<?php } ?>

	</td>

	<td width="10" rowspan="7"><img src="http://www.eclipse.org/emf/images/c.gif" border="0" width=10 height=1></td>

 <td> <a href="news://news.eclipse.org/eclipse.tools.emf"> <img
 src="http://www.eclipse.org/emf/images/news.gif" border="0"></a></td>
            <td> <a href="news://news.eclipse.org/eclipse.tools.emf"
 class="category" target="_top">EMF newsgroup</a><br>

            <a href="http://www.eclipse.org/search/search.cgi"
 target="_self" class="subcategory">Search</a>, <a
 href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf"
 target="_self" class="subcategory">Web
Interface</a>, <a href="http://eclipse.org/newsgroups/index.html" target="_new" class="subcategory">Pwd Req.</a><br>
<a href="http://eclipse.org/emf/newsgroup-mailing-list.php" class="subcategory" target="_self">Mailing List</a>, <a href="http://dev.eclipse.org/mhonarc/lists/emf-dev/maillist.html" target="_self" class="subcategory">Archives: EMF &amp; SDO</a>, <a href="http://dev.eclipse.org/mhonarc/lists/xsd-dev/maillist.html" target="_self" class="subcategory"><span style="color:#999999">XSD</span></a> <small class="subcategory"><em style="font-style:italic"> (deprecated)</em></small>
 </td>
			</tr>
			<tr><td><img src="http://www.eclipse.org/emf/images/c.gif" border="0" width=1 height=3></td></tr>
          <tr>

<td> <a href="http://bugs.eclipse.org/bugs"> <img
 src="http://www.eclipse.org/emf/images/bugzilla.gif" border="0"></a></td>

            <td height="42"> <a href="http://bugs.eclipse.org/bugs" class="category">Bugzilla</a>

				<?php if ($isEMFserver) { ?>
				:: <a href="https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DASSIGNED%26order%3Dbugs.bug_id%26query_format%3Dadvanced&column_changeddate=on&column_bug_severity=on&column_priority=on&column_rep_platform=on&column_bug_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_short_short_desc=on&splitheader=0" class="subcategory">Assigned</a>
				<?php } ?>
				<br>

<?php
	
	$statuses = array(
		"Open" => "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED",
		"Closed This Week" => "%26bug_status%3DRESOLVED%26bug_status%3DVERIFIED%26bug_status%3DCLOSED%26changedin%3D7"
	);
	$collist = "%26query_format%3Dadvanced&column_changeddate=on&column_bug_severity=on&column_priority=on&column_rep_platform=on&column_bug_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_short_short_desc=on&splitheader=0";
	foreach ($statuses as $statusLabel => $statusString) { 
		$bugzLinks = array(
			"EMF &amp; SDO" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id".$collist,
			"XSD" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DXSD".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id".$collist,
			"All" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id".$collist
		);
		$blcnt=0;
		echo '<a name="'.$statusLabel.'" class="category">'.$statusLabel.":</a> \n";
		foreach ($bugzLinks as $label => $url) { 
			if ($blcnt>0) { echo ", "; } $blcnt++;
			echo "\n\t\t".'<a href="'.$url.'" target="_bugz" class="subcategory">'.$label.'</a>';
		} 
		echo "<br>";
	}
?>

<!-- new sep 27 -->
<a name="Component_Owners" class="category">Component Owners:</a> 
		<a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=EMF" target="_bugz" class="subcategory">EMF &amp; SDO</a>, 
		<a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=XSD" target="_bugz" class="subcategory">XSD</a>
<br>

</td>
				<td> <a
 href="http://www.eclipse.org/emf/models/models.xml"> <img
 src="http://www.eclipse.org/emf/images/eclipse-icons/emf_corner_sm.gif" border="0"></a></td>
            <td height="42"> <a
 href="http://www.eclipse.org/emf/models/models.xml" class="category"
 target="_self">EMF Corner</a><br>
            <a
 href="http://www.eclipse.org/emf/models/models-submit.php"
 target="_self" class="subcategory">Submit!</a></td>

          </tr>
			<tr><td><img src="http://www.eclipse.org/emf/images/c.gif" border="0" width=1 height=3></td></tr>
          <tr>
            <td rowspan=1 valign=top> <img src="http://www.eclipse.org/emf/images/reference.gif"
 border="0"></td>
            <td height="42" rowspan=1> <a
 href="http://www.eclipse.org/emf/docs.php" class="category"
 target="_self">Documentation</a><br>

<a class="category" href="http://www.awprofessional.com/titles/0131425420">EMF Book</a>: <a class="subcategory" href="http://www.awprofessional.com/titles/0131425420">Overview and Developer's Guide</a><br>
<a name="overview11" class="category">Overviews:</a> <a class="subcategory" href="http://www.eclipse.org/emf/docs.php?doc=references/overview/EMF.html">EMF</a>, 
<a class="subcategory" href="http://www.eclipse.org/emf/docs.php?doc=references/overview/EMF.Edit.html">EMF.Edit</a>, <a class="subcategory" href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">SDO</a><br>
	<a class="subcategory" href="http://www.eclipse.org/emf/docs/xsd/XSD.mdl">UML model</a>, 

   <a class="subcategory" href="<?php if (!$isEMFserver) { ?>http://download.eclipse.org<?php } ?>/technology/xsd/javadoc/org/eclipse/xsd/package-summary.html#details">UML diagrams</a><br/>
	<a name="overview12" class="category">Performance:</a> <a class="subcategory" href="http://www.eclipse.org/emf/docs.php?doc=http://eclipse.org/emf/docs/performance/EMFPerformanceTestsResults.html">EMF 2.1.0 vs. 2.0.1</a>

				</td>
            <td> <a name="cvs1" class="category">
            <img src="http://www.eclipse.org/emf/images/cvs.gif" border="0"></a></td>
            <td> <a name="cvs2" class="category">CVS Repositories</a><br>
<?php if ($isEMFserver) { ?>
<a href="/tools/emf/scripts/news-whatsnew-cvs.php?source=emf" target="_self" class="subcategory">What's New, CVS?</a> :: <a href="/whatsnew-cvs/build.php" target="_self" class="subcategory">Regenerate</a> <br>
<?php } else { ?>
<a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf" target="_self" class="subcategory">What's New, CVS?</a><small class="subcategory"><em style="font-style:italic"> (weekly delta)</em></small><br>
<?php } ?>
 <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf/" target="_self" class="subcategory">EMF</a>, 
 <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf.ecore.sdo/" target="_self" class="subcategory">SDO</a>,
 <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.xsd/" target="_self" class="subcategory">XSD</a>

&#160;</td>
          </tr>
			<tr><td><img src="http://www.eclipse.org/emf/images/c.gif" border="0" width=1 height=3></td></tr>
			<tr><td><img src="http://www.eclipse.org/emf/images/release-notes.gif" border="0"></td>
	<td><a name="relnotes1" class="category">Release Notes:</a> 

	<a class="subcategory" href="http://www.eclipse.org/emf/news/release-notes.php?version=2.2">2.2</a>, <b><a class="subcategory" href="http://www.eclipse.org/emf/news/release-notes.php?version=2.1">2.1</a>, </b><a class="subcategory" href="http://www.eclipse.org/emf/news/release-notes.php?version=2.0">2.0</a>, <a class="subcategory" href="http://www.eclipse.org/emf/news/release-notes-1.x.php">1.x</a></td>

            <td> <a href="http://www.eclipse.org/emf/faq/faq.php"><img
 src="http://www.eclipse.org/emf/images/faq.gif" border="0"></a></td>

				<td>
				<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=EMF" target="_self" class="category">EMF FAQ</a> &#160; 
				<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=SDO" target="_self" class="category">SDO FAQ</a> &#160;
				<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=XSD" target="_self" class="category">XSD FAQ</a><br>
				<a href="http://www.eclipse.org/eclipse/faq/eclipse-faq.html" target="_self" class="subcategory">Eclipse FAQ</a>
				</td>
			 </tr>
        </tbody>

      </table>
      </td>

		<?php if (!$newsInSidebar) { ?>
		<td></td>
		<td width="20%" valign="top">
			<table width="212" cellpadding="2" cellspacing="2" border="0">
				<tr>
					<td class="box" width="212">	
						<br />
							<table>
							<?php 
								ini_set("display_errors","1"); 
								getNews(3,"whatsnew","vert"); 
								ini_set("display_errors","0"); ?>
							</table>
						<br/>
	- <a href="http://eclipse.org/emf/docs.php?doc=docs/whatsnew/emf2.1.html">What's New in EMF 2.1?</a> Overview <br><br>

	- <a href="http://eclipse.org/emf/docs.php?doc=docs/dev-plans/EMF_2.1_Release_Review.pdf">EMF 2.1 Release Review Presentation</a> <br><br>

	- <a href="http://eclipse.org/emf/news/release-notes.xml">EMF Release Notes</a><br><br>

	- <a href="<?php echo $pre; ?>news-whatsnew.php">What's New</a> [<a href="<?php echo $pre; ?>news-whatsnew.php">more</a>]</a><br><br>

					</td>
				</tr>
			</table>
		</td>
		<?php } ?>

    </tr>
  </tbody>
</table>
<table><tr><td><span style="font-size:1px">&#160;</span></td></tr></table>
