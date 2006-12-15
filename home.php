<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/emf/includes/header.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

include($_SERVER["DOCUMENT_ROOT"] . "/emf/includes/db.php");

if ($isWWWserver && class_exists("Poll"))
{
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
else
{
	$pollHTML = "";
}
   
ob_start();
?>

<div id="midcolumn">
<?php
// default for no page selected
if (!$page) { $page = "emf"; }

include "home-contents.php";
displayIntro($page);

include "${pre}includes/nav.php";
?>
</div>

<div id="rightcolumn">
	<div class="sideitem">
	<h6>News</h6>
		<?php getNews(4, "whatsnew"); ?>
		<ul>
			<li><a href="/emf/news-whatsnew.php">Older news</a></li>
		</ul>
	</div>

	<div class="sideitem">
	<h6><a href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds-emf.xml"><img style="float:right" alt="EMF Build Feed" src="images/rss-atom10.gif"/></a>Build News</h6>
		<?php build_news($cvsprojs, $cvscoms, $proj); ?>
		<ul>
			<li><a href="/emf/news-whatsnew.php#build">Older build news</a></li>
		</ul>
	</div>

<?php if ($isWWWserver && $pollHTML) { ?>
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
		<h6>Plans</h6>
		<ul>
			<li><a href="http://wiki.eclipse.org/index.php/Callisto_Coordinated_Maintenance">Callisto 3.2.x Maintenance</a></li>
			<li><a href="http://wiki.eclipse.org/index.php/Europa_Simultaneous_Release">Europa 3.3 Plan</a></li>
			<li><a href="http://www.eclipse.org/eclipse/development/eclipse_project_plan_3_3.html">Eclipse 3.3 Plan</a></li>
			<li><a href="http://www.eclipse.org/emf/docs/dev-plans/emf_project_plan_2.3.html">EMF 2.3 Plan</a></li>
		</ul>
	</div>

	<div class="sideitem">
		<h6>Related links</h6>
		<ul>
			<li><a href="http://www.eclipse.org/modeling">Eclipse Modeling</a></li>
			<li><a href="http://www.eclipse.org/modeling/mdt/">MDT</a>, <a href="http://www.eclipse.org/modeling/mdt/?project=uml2-uml#uml2-uml">UML2</a></li>
			<li><a href="http://www.eclipse.org/emft">EMF Tech (EMFT)</a></li>
			<li><a href="http://www.eclipse.org/emf/docs/?doc=docs/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a></li>
		</ul>
	</div>
	
	<?php if ($isEMFserver) { $PR="emf"; include_once $pre."build/sideitems-common.php"; unset($PR); } ?>
	
</div>
<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - " . strtoupper($page) . " Home";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="includes/home.css"/>' . "\n");
$App->AddExtraHtmlHeader('<link type="application/rss+xml" rel="alternate" title="EMF Build Feed" href="http://www.eclipse.org/downloads/download.php?file=/tools/emf/feeds/builds-emf.xml"/>' . "\n");
$App->AddExtraHtmlHeader('<style type="text/css">.homeitem { clear: none; }</style>' . "\n"); //hack for ie, see https://bugs.eclipse.org/bugs/show_bug.cgi?id=154356
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
