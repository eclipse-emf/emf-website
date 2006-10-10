<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

ob_start();

$pre = ""; 
?>
<div id="midcolumn">
<div class="homeitem3col">
<h3>EMF Newsgroups &amp; Mailing Lists</h3>
	<p>Welcome to the EMF &amp; XSD Newsgroups &amp; Mailing Lists Page.</p>
	
	<ul>
	<li>
		<p>
		<u>The best place for support for EMF, SDO, and XSD is in the EMF newsgroups, <b><i>NOT</i></b> in the mailing lists.</u>
		</p>
	
	<p>
	<b>NOTE:</b> XSD support used to reside in its own newsgroup, but since XSD has become a subproject of EMF, efforts are being made to streamline and simplify. You can still search or browse the old XSD newsgroup, but please post to the EMF newsgroup to have your questions answered. The XSD newsgroup may be removed at some point in the future.
	</p>

	<p>
	If you post to the mailing list, you will most likely be told "Please post 
	this to the newsgroup."
	</p>
	</li>
	<li>
	<p>
	Chances are your question has already been answered in the newsgroup, 
	and will save you time in not having to ask it again, and us in not having 
	to answer it again. You can also browse (<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf">EMF &amp; SDO</a>, 
	<a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.technology.xsd">XSD</a>) or 
	search (<a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.tools.emf&amp;wm=wrd&amp;t=News&amp;t=Mail">EMF &amp; SDO</a>,
	<a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.technology.xsd&amp;wm=wrd&amp;t=News&amp;t=Mail">XSD</a>)
	 the
	newsgroup archives online, if you prefer, but you will <a href="http://www.eclipse.org/newsgroups/index.html">require a password</a> first. 
	</p>
	
	<p>
	Frequently asked questions in the newsgroup will ultimately end up in the FAQs.
	See FAQ links below in the <a href="#quicknav">Quick Nav</a>.
	</p>
	</li>
	</ul>

	<p>
	If you're not familiar with news://, you'll need a newreader first, such as 
	<a href="http://www.mozilla.org/products/thunderbird/" target="_out">Thunderbird</a>, <a href="http://www.mozilla.org/products/mozilla1.x/" target="_out">Mozilla</a>, <a href="http://www.forteinc.com" target="_out">Forte Agent</a>, or even MS Outlook. Once installed, 
	you'll also need a password to access the newsgroups. Signup is easy: 
	just <a href="http://www.eclipse.org/newsgroups/index.html">request a password</a>.
	</p>

	<p>
	After that, just point your newsreader at the eclipse news server, <b>news.eclipse.org</b> and subscribe to <b>eclipse.tools.emf</b> for support of EMF and any of its subprojects, including SDO and XSD.
	</p>

	<p>
	In addition, should you want to search the newsgroups for old posts, you can do so online or offline in one of several ways. 
	Online, you can use Eclipse.org's <a
      href="http://wiki.eclipse.org/index.php/Searching_Eclipse_Newsgroups_With_Firefox">search capabilities</a>.
	Offline, here's two options:
      <a
      href="http://www.eclipse.org/emf/docs/?doc=docs/SearchingNewsgroups/SearchingNewsgroupsMozilla.html">
      with Mozilla</a>
      or
      <a
      href="http://www.eclipse.org/emf/docs/?doc=docs/SearchingNewsgroups/SearchingNewsgroupsOutlook.html">
      with Outlook Express</a>.
      </p>
</div>

	<div class="homeitem3col">
		<h3>Newsgroups</h3>
		<ul>
			<li class="header"><a href="news://news.eclipse.org/eclipse.tools.emf" target="_top">EMF, SDO</a></li>
			<li class="outerli">
				<ul>
					<li><a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.tools.emf&amp;wm=wrd&amp;t=News&amp;t=Mail" target="_self">Search</a></li>
					<li><a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf" target="_self">Browse</a></li>
					<li><a href="http://www.eclipse.org/newsgroups/index.html">Password Request</a></li>
				</ul>
			</li>

			<li class="header"><a href="news://news.eclipse.org/eclipse.technology.xsd" target="_top">XSD</a> (deprecated)</li>
			<li class="outerli">
				<ul>
					<li><a href="http://www.eclipse.org/search/search.cgi?cmd=Search%21&amp;form=extended&amp;wf=574a74&amp;ps=10&amp;m=all&amp;t=5&amp;ul=%2Fnewslists%2Fnews.eclipse.technology.xsd&amp;wm=wrd&amp;t=News&amp;t=Mail" target="_self">Search</a></li>
					<li><a href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.technology.xsd" target="_self">Browse</a></li>
				</ul>
			</li>
		</ul>
	</div>

	<div class="homeitem3col">
	<h3>Mailing lists (deprecated)</h3>
	<ul>
		<li class="header"><a href="mailto:emf-dev@eclipse.org">EMF, SDO</a></li>
		<li class="outerli">
			<ul>
				<li><a href="http://dev.eclipse.org/mailman/listinfo/emf-dev" target="_self">Mailing List</a></li>
				<li><a href="http://dev.eclipse.org/mhonarc/lists/emf-dev/maillist.html" target="_self">Archives</a></li>
			</ul>
		</li>

		<li class="header"><a href="mailto:xsd-dev@eclipse.org">XSD</a></li>
		<li class="outerli">
			<ul>
				<li><a href="http://dev.eclipse.org/mailman/listinfo/xsd-dev" target="_self">Mailing List</a></li>
				<li><a href="http://dev.eclipse.org/mhonarc/lists/xsd-dev/maillist.html" target="_self">Archives</a></li>
			</ul>
		</li>
	</ul>
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - EMF Newsgroups &amp; Mailing Lists";
$pageKeywords = ""; // TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/newsgroups.css"/>' . "\n");

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
