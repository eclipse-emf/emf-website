<div class="homeitem">
	<h3>Downloads</h3>
	<p>
		<a href="/emf/downloads/">Downloads</a><br/>
		<a href="/emf/updates/">Update Manager</a>
		<br/>
		v2.x: <a href="/emf/downloads/">EMF, SDO &amp; XSD</a>, 
		v1.x: <a href="/emf/downloads/dl-emf1x.html">EMF &amp; XSD</a> 
	</p>

	<p>
		Release notes: 
		<a href="/emf/news/release-notes.php?version=2.2">2.2</a>,
		<a href="/emf/news/release-notes.php?version=2.1">2.1</a>,
		<a href="/emf/news/release-notes.php?version=2.0">2.0</a>,
		<a href="/emf/news/release-notes-1.x.php">1.x</a>
	</p>
</div>

<div class="homeitem">
	<h3>Community</h3>
	<p>
		<a href="/emf/newsgroup-mailing-list.php" target="_top">EMF &amp; XSD newsgroups</a>
		<span class="info">(<a href="http://www.eclipse.org/newsgroups/index.html" target="_new">Password required</a>)</span><br/>
		<a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.tools.emf&amp;wm=wrd&amp;t=News&amp;t=Mail&amp;q=emf">Search</a>,
		<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf">Browse: EMF &amp; SDO</a>,
		<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.technology.xsd">XSD</a><br/>
		<a href="/emf/newsgroup-mailing-list.php">Mailing List</a>,
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
		<a href="/emf/faq/faq.php?FAQ=EMF">EMF FAQ</a> ::
		<a href="/emf/faq/faq.php?FAQ=SDO">SDO FAQ</a> ::
		<a href="/emf/faq/faq.php?FAQ=XSD">XSD FAQ</a><br/>
		<a href="http://www.eclipse.org/eclipse/faq/eclipse-faq.html">Eclipse FAQ</a>
	</p>
	<p>
		<a href="/emf/docs.php">Index</a>
		:: <a href="http://wiki.eclipse.org/index.php/Eclipse_Modeling_Framework">Wiki</a>
		<br/>
		<a href="http://www.awprofessional.com/titles/0131425420">EMF Book</a>: <a href="http://www.awprofessional.com/titles/0131425420">Overview and Developer's Guide</a><br/>
		Overviews: <a href="/emf/docs.php?doc=references/overview/EMF.html">EMF</a>, 
		<a href="/emf/docs.php?doc=references/overview/EMF.Edit.html">EMF.Edit</a>, <a href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">SDO</a><br/>
		<a href="/emf/docs/xsd/XSD.mdl">UML model</a>, 

		<a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">XSD UML diagrams</a><br/>
		Performance: <a href="/emf/docs.php?doc=/emf/docs/performance/EMFPerformanceTestsResults.html">EMF 2.1.0 vs. 2.0.1</a>
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
