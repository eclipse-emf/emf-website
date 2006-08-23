<?php
	if (preg_match("/^(Miasma|Industrial|Phoenix|Blue)$/", $_GET["skin"], $regs))
	{
		$theme = $regs[1];
	}
	else
	{
		$theme = "Phoenix";
	}

	$Nav->setLinkList(null);

	$rooturl = "http://www.eclipse.org";
	$downurl = (preg_match("/^(download\.eclipse\.org|emf\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"], $regs) ? "http://$regs[1]" : "http://download.eclipse.org");
	$bugurl = "https://bugs.eclipse.org";

	$Nav->addNavSeparator("EMF", "$rooturl/emf/emf.php");
	$Nav->addCustomNav("SDO", "$rooturl/emf/sdo.php", "_self", 2);
	$Nav->addCustomNav("XSD", "$rooturl/emf/xsd.php", "_self", 2);

	$Nav->addNavSeparator("Downloads", "$rooturl/emf/downloads/");
	$Nav->addCustomNav("Installation", "$rooturl/emf/downloads/install.php", "_self", 2);
	$Nav->addCustomNav("Update Manager", "$rooturl/tools/emf/updates/", "_self", 2);

	$Nav->addNavSeparator("Documentation", "$rooturl/emf/docs/");
	$Nav->addCustomNav("Getting Started", "http://dev.eclipse.org/viewcvs/indextools.cgi/~checkout~/org.eclipse.emf/doc/org.eclipse.emf.doc/references/overview/EMF.html", "_self", 2);
	$Nav->addCustomNav("FAQ", "$rooturl/emf/faq/faq.php", "_self", 2);
	$Nav->addCustomNav("Release Notes", "$rooturl/emf/news/release-notes.php", "_self", 2);
	$Nav->addCustomNav("What's New, CVS?", "$downurl/tools/emf/scripts/news-whatsnew-cvs.php?source=emf", "_self", 2);

	$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");
	$Nav->addCustomNav("Newsgroup", "$rooturl/emf/newsgroup-mailing-list.php", "_self", 2);
	$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);
	$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
	$Nav->addCustomNav("Open Bugs", "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
	$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMF", "_self", 2);
	$Nav->addCustomNav("Contributors", "$rooturl/emf/eclipse-project-ip-log.csv", "_self", 2);
?>
