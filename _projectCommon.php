<?php
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipsStandard|Industrial|Lazarus|Miasma|OldStyle|Phoenix|PlainText)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Phoenix";
}

$Nav->setLinkList(null);

$isEMFserver = (preg_match("/emf(?:\.torolab\.ibm\.com)?/", $_SERVER["SERVER_NAME"]));
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.)eclipse.org$/", $_SERVER["SERVER_NAME"]));

$rooturl = "http://www.eclipse.org/emf";
$downurl = (preg_match("/^(emf\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"], $regs) ? "http://$regs[1]" : "http://www.eclipse.org");
$bugurl = "https://bugs.eclipse.org";

$projects = array (
	"EMF, SDO & XSD" => "",
	"EMF &amp; SDO" => "emf",
	"XSD" => "xsd"
);

$cvsprojs = array(
	"emf" => "org.eclipse.emf",
	"xsd" => "org.eclipse.xsd"
);

$cvscoms = array();

$nomenclature = "Component"; //are we dealing with "components" or "projects"?

$regs = null;
$proj = (isset ($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : "");
$PR = "emf";

// this isn't quite the same as EMFT or MDT... yet
$Nav->addNavSeparator("EMF", "$rooturl/emf.php");
$Nav->addCustomNav("SDO", "$rooturl/sdo.php", "_self", 2);
$Nav->addCustomNav("XSD", "$rooturl/xsd.php", "_self", 2);

$Nav->addNavSeparator("Downloads", "$downurl/emf/downloads/");
$Nav->addCustomNav("Installation", "$rooturl/downloads/install.php", "_self", 2);
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "$rooturl/docs/");
$Nav->addCustomNav("Getting Started", "http://dev.eclipse.org/viewcvs/indextools.cgi/*checkout*/org.eclipse.emf/doc/org.eclipse.emf.doc/references/overview/EMF.html", "_self", 2);
$Nav->addCustomNav("FAQ", "$rooturl/faq/faq.php", "_self", 2);
$Nav->addCustomNav("Release Notes", "http://www.eclipse.org/modeling/emf/news/relnotes.php?project=emf&version=HEAD", "_self", 2);
$Nav->addCustomNav("Search CVS", "$rooturl/searchcvs.php?q=project%3A+org.eclipse.emf+days%3A+7", "_self", 2);

$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/Eclipse_Modeling_Framework", "_self", 2);
$Nav->addCustomNav("Newsgroup", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMF", "_self", 2);
$Nav->addCustomNav("Contributors", "$rooturl/eclipse-project-ip-log.csv", "_self", 2);

include_once $_SERVER["DOCUMENT_ROOT"] . "/emf/includes/scripts.php";
?>
