<div class="homeitem">
	<h3>Downloads</h3>
	<p>
		<a href="<?php if (!$isEMFserver) { ?>http://www.eclipse.org/emf/downloads/<?php } else { ?>/tools/emf/scripts/downloads.php<?php } ?>">Downloads</a><br/>
		<a href="<?php if (!$isEMFserver) { ?>http://www.eclipse.org/emf/updates/<?php } else { ?>/tools/emf/updates<?php } ?>">Update Manager</a>
		<?php if ($isEMFserver) { ?>
		:: <a href="http://emf.torolab.ibm.com/emf/build/">New Build</a>
		:: <a href="http://emf.torolab.ibm.com/emf/build/promo.php">Promote</a>
		:: <a href="http://emf.torolab.ibm.com/emf/downloads/downloads.php" target="_new">Live Stats</a>
		<?php } ?>
		<br/>
		v2.x: <a href="<?php if (!$isEMFserver) { ?>http://www.eclipse.org/emf/downloads/<?php } else { ?>/tools/emf/scripts/downloads.php<?php } ?>">EMF, SDO &amp; XSD</a>, 
		v1.x: <a href="http://www.eclipse.org/emf/downloads/dl-emf1x.html">EMF &amp; XSD</a> 
	</p>

	<?php if ($isEMFserver) { ?>
		<p>
			Test Results:
			<a href="http://emf.torolab.ibm.com/tests/results-jdk13.php">1.3</a>,
			<a href="http://emf.torolab.ibm.com/tests/results-jdk14.php">1.4</a>,
			<a href="http://emf.torolab.ibm.com/tests/results-jdk50.php">5.0</a>,
			<a href="http://emf.torolab.ibm.com/tests/results.php">BVT, FVT, SVT</a>,
			<a href="http://emf.torolab.ibm.com/tests/results-perf.php">Perf</a>,
			<a href="http://emftest03.torolab.ibm.com/tests/results-perf.php">Perf2</a>
			<br/>
			<a href="http://emf.torolab.ibm.com/emf/secure/patch.php">New Test</a> <span class="info">(with optional patch or continuous perf)</span> <!--:: <a href="http://emf.torolab.ibm.com/emf/secure/performance/">Perf</a> :: <a href="http://emf.torolab.ibm.com/emf/secure/junit-results.php">JUnit</a> -->
		</p>
	<?php } ?>
	<p>
		Release notes: 
		<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.2">2.2</a>,
		<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.1">2.1</a>,
		<a href="http://www.eclipse.org/emf/news/release-notes.php?version=2.0">2.0</a>,
		<a href="http://www.eclipse.org/emf/news/release-notes-1.x.php">1.x</a>
	</p>
</div>

<div class="homeitem">
	<h3>Community</h3>
	<p>
		<a href="http://www.eclipse.org/emf/newsgroup-mailing-list.php" target="_top">EMF &amp; XSD newsgroups</a>
		<span class="info">(<a href="http://www.eclipse.org/newsgroups/index.html" target="_new">Password required</a>)</span><br/>
		<a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.tools.emf&amp;wm=wrd&amp;t=News&amp;t=Mail&amp;q=emf">Search</a>,
		<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf">Browse: EMF &amp; SDO</a>,
		<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.technology.xsd">XSD</a><br/>
		<a href="http://www.eclipse.org/emf/newsgroup-mailing-list.php">Mailing List</a>,
		<a href="http://dev.eclipse.org/mhonarc/lists/emf-dev/maillist.html">Archives: EMF &amp; SDO</a>,
		<a href="http://dev.eclipse.org/mhonarc/lists/xsd-dev/maillist.html">XSD</a>
	</p>
	<p>
		<a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Modeling Corner</a> :: 
		<a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Contribute!</a>
	</p>
</div>

<div class="homeitem">
	<h3>Documentation</h3>
	<p>
		<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=EMF">EMF FAQ</a> ::
		<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=SDO">SDO FAQ</a> ::
		<a href="http://www.eclipse.org/emf/faq/faq.php?FAQ=XSD">XSD FAQ</a><br/>
		<a href="http://www.eclipse.org/eclipse/faq/eclipse-faq.html">Eclipse FAQ</a>
	</p>
	<p>
		<a href="http://www.eclipse.org/emf/docs.php">Index</a>
		:: <a href="http://wiki.eclipse.org/index.php/Eclipse_Modeling_Framework">Wiki</a>
		<?php if ($isEMFserver) { ?>
			 :: <a href="http://instawiki.webahead.ibm.com/pilot/wiki/Wiki.jsp?page=EMF&amp;wiki=Rational_Modeling_Tools_Team">w3 Wiki</a>
		<?php } ?>
		<br/>
		<a href="http://www.awprofessional.com/titles/0131425420">EMF Book</a>: <a href="http://www.awprofessional.com/titles/0131425420">Overview and Developer's Guide</a><br/>
		Overviews: <a href="http://www.eclipse.org/emf/docs.php?doc=references/overview/EMF.html">EMF</a>, 
		<a href="http://www.eclipse.org/emf/docs.php?doc=references/overview/EMF.Edit.html">EMF.Edit</a>, <a href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">SDO</a><br/>
		<a href="http://www.eclipse.org/emf/docs/xsd/XSD.mdl">UML model</a>, 

		<a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">XSD UML diagrams</a><br/>
		Performance: <a href="http://www.eclipse.org/emf/docs.php?doc=http://www.eclipse.org/emf/docs/performance/EMFPerformanceTestsResults.html">EMF 2.1.0 vs. 2.0.1</a>
	</p>
</div>

<div class="homeitem">
	<h3>Development</h3>
	<p>
		<a href="http://www.eclipse.org/emf/searchcvs.php?q=project%3A+org.eclipse.emf+days%3A+7">Search CVS</a> <br/>
		<a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf/">EMF</a>, 
		<a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf.ecore.sdo/">SDO</a>,
		<a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.xsd/">XSD</a>
	</p>

	<p>
		<a href="http://bugs.eclipse.org/bugs">Bugzilla</a>
		<?php if ($isEMFserver) { ?>
			:: <a href="https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DASSIGNED%26order%3Dbugs.bug_id%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0">Assigned</a>
			:: <a href="javascript://" style="color:red" onclick="if (confirm('To regenerate plan-*.xml, follow this link, wait about 30 seconds\nfor the page to display, then view-source (CTRL-U) and copy that\nsource into the appropriate www/emf/plan/plan-*.xml document\nand it commit to CVS. Content should refresh on public site\n(http://www.eclipse.org/emf/plan/plan-*.xml) within a minute or two.')) { document.location.href='/emf/plan/plan.php?votes=true&amp;blocks=true'; }"> Regenerate Prioritized Bug List</a>
		<?php } ?>
		<br/>
		Submit new bug:
		<a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=EMF" target="_bugz">EMF &amp; SDO</a>,
		<a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=XSD" target="_bugz">XSD</a>, 
		<a href="https://bugs.eclipse.org/bugs/describekeywords.cgi" target="_bugz">Keywords</a>
		<br/>
		<?php
		$statuses = array(
			"Open:" => "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED",
			"Closed this week:" => "%26bug_status%3DRESOLVED%26bug_status%3DVERIFIED%26bug_status%3DCLOSED%26changedin%3D7"
		);
		$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
		foreach ($statuses as $statusLabel => $statusString)
		{
			$bugzLinks = array(
				"EMF &amp; SDO" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF$statusString%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id$collist",
				"XSD" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DXSD$statusString%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id$collist",
				"All" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD$statusString%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id$collist"
			);

			print "$statusLabel\n";
			foreach (array_keys($bugzLinks) as $z)
			{
				$bugzLinks[$z] = preg_replace("/^(.+)$/", "<a href=\"$1\" target=\"_bugz\">$z</a>", $bugzLinks[$z]);
			}
			print join(", ", $bugzLinks) . "<br/>\n";
		}
		?>

		Component owners: 
		<a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=EMF" target="_bugz">EMF &amp; SDO</a>, 
		<a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=XSD" target="_bugz">XSD</a>		
	</p>
</div>
