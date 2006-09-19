<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

#print $_SERVER["DOCUMENT_ROOT"];
if (false===strpos($_SERVER["DOCUMENT_ROOT"],"eclipse.org/htdocs")) {
  # Enable polls on this page: Polls are good for 3 months!
  $App->usePolls();
  
  $Poll = new Poll(1, "What do you think of our new look?");
  $Poll->addOption(1, "Phoen-tast-ix!");
  $Poll->addOption(2, "Easier to use");
  $Poll->addOption(3, "Too purple!");
  $Poll->addOption(4, "Meh.");
  # $Poll->noGraph();  # uncomment to disable bar graph
  $pollHTML = $Poll->getHTML();
}
   
ob_start();
?>

<div id="midcolumn">
<?php
include "${pre}includes/scripts.php";

// default for no page selected
if (!$page) { $page = "emf"; }

include "home-contents.php";
displayIntro($page);

include "${pre}includes/nav.php";
?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
	<h6><a href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds.xml"><img align="right" style="float:right" alt="EMF Build Feed" src="images/rss-atom10.gif" width="45" height="13" border="0"></a>News</h6>
		<?php getNews(3, "whatsnew", "vert"); ?>
		<ul>
			<li><a href="http://www.eclipse.org/emf/docs/dev-plans/EMF_2.2_Release_Review.pdf">EMF 2.2 Release Review Presentation</a></li>
			<li><a href="http://www.eclipse.org/emf/news/release-notes.php">EMF Release Notes</a></li>
			<li><a href="http://www.eclipse.org/emf/docs/?doc=docs/whatsnew/emf2.1.html">What's New in EMF 2.1?</a></li>
			<li><a href="<?php echo $pre; ?>news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

<?php if (false===strpos($_SERVER["DOCUMENT_ROOT"],"eclipse.org/htdocs")) { ?>
	<div class="sideitem">
	<h6>Poll</h6>
	<?php echo $pollHTML; ?>
	</div>
<?php } ?>

	<div class="sideitem">
		<h6>Modeling Corner</h6>
		<p>Want to <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">contribute</a> models, projects, files, ideas, utilities, or code to 
		<a href="http://www.eclipse.org/emf/emf.php">EMF</a> or any other part of the <a href="http://www.eclipse.org/modeling/">Modeling Project</a>? 
		Now you can!</p>
		<p>Have a look, post your comments, submit a link, or just read what others have written. <a href="http://wiki.eclipse.org/index.php/Modeling_Corner">Details here</a>.</p>
	</div>

	<div class="sideitem">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling">Eclipse Modeling</a></li>
			<li><a href="http://www.eclipse.org/uml2">UML2</a></li>
			<li><a href="http://www.eclipse.org/emft">EMF Tech (EMFT)</a></li>
			<li><a href="http://www.eclipse.org/emf/docs/?doc=docs/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
			<li><a href="http://www.eclipse.org/eclipse/development/eclipse_project_plan_3_3.html">Eclipse 3.3 Project Plan</a></li>
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
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds.xml"/>' . "\n");
$App->AddExtraHtmlHeader('<style type="text/css">.homeitem { clear: none; }</style>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
