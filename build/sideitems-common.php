<?php 
if ($isEMFserver) { ?>
<div class="sideitem">
	<h6>Actions</h6>
	<ul>
		<li><a href="http://emf.torolab.ibm.com/emf/build/?project=<?php print $PR; ?>">New Build</a></li>
		<?php if ($PR=="emf") { ?><li><a href="http://emf.torolab.ibm.com/emf/build/patch.php">New Test</a></li><?php } ?>
		<li><a href="http://emf.torolab.ibm.com/emf/build/promo.php?project=<?php print $PR; ?>">Promote</a></li>
	</ul>
</div>
<div class="sideitem">
	<h6>Info</h6>
	<ul>
		<li><a href="http://instawiki.webahead.ibm.com/pilot/wiki/Wiki.jsp?page=<?php print strtoupper($PR); ?>&wiki=Rational_Modeling_Tools_Team">w3 Wiki</a></li>
		<li><a href="https://bugs.eclipse.org/bugs/buglist.cgi?product=<?php print strtoupper($PR); ?>&amp;bug_status=ASSIGNED">Assigned Bugs</a></li>
		<li><a href="http://www.eclipse.org/modeling/emf/searchcvs.php?q=project%3Aorg.eclipse.emf+branch%3A+HEAD+days%3A+7">Development This Week</a></li>
		<li><a href="http://www.eclipse.org/modeling/emf/searchcvs.php?q=project%3Aorg.eclipse.emf+branch%3A+R+days%3A+7">Maintenance This Week</a></li>
		<li><a href="http://emf.torolab.ibm.com/<?php print $PR; ?>/downloads/downloads.php">Download Stats</a></li>
	</ul>
</div>
<?php 
} 
if ($isEMFserver && $PR=="emf") { ?>
<div class="sideitem">
	<h6>Tests</h6>
	<ul>
		<li><a href="/emf/build/tests/results-jdk.php?<?php echo "project=$PR&amp;version=14&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 1.4</a></li>
		<li><a href="/emf/build/tests/results-jdk.php?<?php echo "project=$PR&amp;version=50&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">JDK 5.0</a></li>
		<li><a href="/emf/build/tests/results.php?<?php echo "project=$PR&amp;version=&amp;showAllResults=$showAllResults&amp;showAll=&amp;sortBy=$sortBy"; ?>">BVT, FVT, SVT</a></li>
	</ul>
</div>
<?php 
} ?>
