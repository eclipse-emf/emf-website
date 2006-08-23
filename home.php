<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

# Enable polls on this page: Polls are good for 3 months!
$App->usePolls();

$Poll = new Poll(1, "What do you think of our new look?");
$Poll->addOption(1, "Phoen-tast-ix!");
$Poll->addOption(2, "Easier to use");
$Poll->addOption(3, "Too purple!");
$Poll->addOption(4, "Meh.");
# $Poll->noGraph();  # uncomment to disable bar graph
$pollHTML = $Poll->getHTML();
   
ob_start();
?>

<div id="midcolumn">
<?php
include "${pre}includes/scripts.php";

include "home-contents.php";
displayIntro($page);

include "${pre}includes/nav.php";
?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
	<h6>News</h6>
		<?php getNews(3, "whatsnew", "vert"); ?>
		<ul>
			<li><a href="http://www.eclipse.org/emf/docs/dev-plans/EMF_2.2_Release_Review.pdf">EMF 2.2 Release Review Presentation</a></li>
			<li><a href="http://www.eclipse.org/emf/news/release-notes.php">EMF Release Notes</a></li>
			<li><a href="http://www.eclipse.org/emf/docs.php?doc=docs/whatsnew/emf2.1.html">What's New in EMF 2.1?</a></li>
			<li><a href="<?php echo $pre; ?>news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
	<h6>Poll</h6>
	<?php echo $pollHTML; ?>
	</div>

	<div class="sideitem">
		<h6>Modeling Corner</h6>
		<p>Wanted to <a href="http://www.eclipse.org/emf/models/models.php">contribute</a> models, projects, files, ideas, utilities, or code to <a href="http://www.eclipse.org/emf/emf.php">EMF</a>, <a href="http://www.eclipse.org/emf/sdo.php">SDO</a>, or <a href="http://www.eclipse.org/emf/xsd.php">XSD</a>? Now you can!</p>
		<p>Have a look, post your comments, <a href="http://www.eclipse.org/emf/models/models.php">submit</a> your code, or just read what others have written. <a href="mailto:codeslave(at)ca(dot)ibm(dot)com?Subject=EMF Corner Comments">Feedback here</a>.</p>
	</div>

	<div class="sideitem">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling">Eclipse Modeling</a></li>
			<li><a href="http://www.eclipse.org/uml2">UML2</a></li>
			<li><a href="http://www.eclipse.org/emft">EMF Tech (EMFT)</a></li>
			<li><a href="http://www.eclipse.org/emf/docs.php?doc=docs/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<!-- <li><a href="http://www.eclipse.org/eclipse/development/eclipse_project_plan_3_1.html">Eclipse 3.1 Project Plan</a></li> -->
		</ul>
	</div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - " . strtoupper($page) . " Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="includes/home.css"/>' . "\n");
$App->AddExtraHtmlHeader('<style type="text/css">.homeitem { clear: none; }</style>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
