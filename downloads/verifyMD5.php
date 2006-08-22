<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
$pre = "";
	ob_start();
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>Verifying Downloads with md5sum</h3>
		<p>Downloads can be verified using md5sum, a Unix command line tool provided 
        in the <a href="http://www.gnu.org/software/textutils/textutils.html" target="_blank">GNU 
        Textutils</a> package. A Windows binary version is available <a href="http://www.etree.org/md5com.html" target="_blank">here</a>.</p>
		<p>1. Every download has an associated link &quot;(md5)&quot; to a *.md5 
        file containing its MD5 checksum. Download this file into the same directory as the appropriate zip file.</p>
		<p>2. Execute the command &quot;md5sum -c &lt;zipfilename&gt;.md5&quot;. 
        The result &quot;&lt;zipfilename&gt;: OK&quot; is indicative of an intact 
        download. </p>
	</div>
</div>
<?php
	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "Verifying Downloads with MD5 Checksum";
	$pageKeywords = ""; //TODO: add something here
	$pageAuthor = "Nick Boldt";

	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
