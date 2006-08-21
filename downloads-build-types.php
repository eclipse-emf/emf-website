<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();
include $pre . "includes/header.php";

$pre = "";
?>

<div id="midcolumn">
	<div class="homeitem3col">
		<h3>Releases</h3>
		<p>Releases are builds 
		that have been declared major releases by the development team - for example 
		&quot;R1.0&quot;. Releases are the right builds for people who want to 
		be on a stable, tested release, and don't need the latest greatest features 
		and improvements. Release builds always have an &quot;R&quot; at the beginning 
		of the name i.e. R1.0, R2.0 etc. Non-release 
		builds are named according to the date of the build - for example 20011027 
		is the build from Oct 27, 2001.</p>
	</div>

	<div class="homeitem3col">
		<h3>Stable Builds</h3>
		<p>Stable builds are integration 
		builds that have been found to be stable enough for most people to use. 
		They are promoted from integration build to stable build by the architecture 
		team after they have been used for a few days and deemed reasonably stable. 
		The latest stable build is the right build for people who want to stay up 
		to date with what is going on in the latest development stream, and don't 
		mind putting up with a few problems in order to get the latest greatest 
		features and bug fixes. The latest stable build is the one the development 
		team likes people to be using, because of the valuable and timely feedback.</p>
	</div>

	<div class="homeitem3col">
		<h3>Integration Builds</h3>
		<p>Periodically, component 
		teams version off their work in what they believe is a stable, consistent 
		state, and they update the build configuration to indicate that the next 
		integration build should take this version of the component. Integration 
		builds are built from these stable component versions that have been specified 
		by each component team as the best version available. Integration builds 
		may be promoted to stable builds after a few days of testing. Integration 
		builds are built whenever new stable component versions are released into 
		the build.</p>
	</div>

	<div class="homeitem3col">
		<h3>Nightly Builds</h3>
		<p>Nightly builds are produced 
		over night from whatever has been released into the HEAD stream of the 
		CVS repository. They are completely untested and will almost always have 
		major problems. Many will not work at all. These drops are normally only 
		useful to developers actually working on this project.</p>
		<p>Note: Nightly builds are produced only as requested, and not necessarily every night, by developers to build what was in HEAD.</p>
	</div>

	<div class="homeitem3col">
	<h3>Maintenance Builds</h3>
        <p>Periodically builds for maintenance
        of the current release will be performed. They will not necessarily be stable builds. When the maintenace is finalized and released, it will be moved up to a Release build. If the build name starts with an &quot;M&quot; i.e. M20031110, then it has not been tested for stability. If it is a release candidate, i.e. 0.5.0.1RC1, then it is a stable maintenance build.</p>
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - Build Types";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
