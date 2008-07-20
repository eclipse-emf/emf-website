<?php

$Nav->setLinkList(null);

$PR = "emf";

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
$isBuildServer = (preg_match("/^(emft|build)\.eclipse\.org$/", $_SERVER["SERVER_NAME"])) || $isEMFserver;
$isBuildDotEclipseServer = $_SERVER["SERVER_NAME"] == "build.eclipse.org";
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$isEclipseCluster = (preg_match("/^(?:www.||download.|download1.|build.)eclipse.org$/", $_SERVER["SERVER_NAME"]));
$debug = (isset ($_GET["debug"]) && preg_match("/^\d+$/", $_GET["debug"]) ? $_GET["debug"] : -1);
$writableBuildRoot = $isBuildDotEclipseServer ? "/opt/public/modeling" : "/home/www-data";

$rooturl = "http://" . $_SERVER["HTTP_HOST"] . "/$PR";
$downurl = ($isBuildServer ? "" : "http://www.eclipse.org");
$bugurl = "https://bugs.eclipse.org";

if (isset ($_GET["skin"]) && preg_match("/^(Blue|EclipseStandard|Industrial|Lazarus|Miasma|Modern|OldStyle|Phoenix|PhoenixTest|PlainText)$/", $_GET["skin"], $regs))
{
	$theme = $regs[1];
}
else
{
	$theme = "Phoenix";
}

/* projects/components in cvs */
/* "proj" => "cvsname" */
$cvsprojs = array(
	"emf" => "org.eclipse.emf",
	"sdo" => "org.eclipse.emf.ecore.sdo"
);

/* sub-projects/components in cvs for projects/components above (if any) */
/* "cvsname" => array("shortname" => "cvsname") */
$cvscoms = array(
	"org.eclipse.emf" => array (
		"query" => "org.eclipse.emf.query",
		"transaction" => "org.eclipse.emf.transaction",
		"validation" => "org.eclipse.emf.validation",
		"emfqtv" => "org.eclipse.emf.emfqtv"
	)
);

$projects = array(
	"EMF" => "emf",
	"Query" => "query",
	"Transaction" => "transaction",
	"Validation" => "validation",
	"QTV All-In-One" => "emfqtv",
	"SDO" => "sdo"
);
$tmp = array_flip($projects);

$level = array (
	"query" => 2,
	"transaction" => 2,
	"validation" => 2,
	"sdo" => 2
);

$emft_redirects = null;
$extraprojects = array("QTV All-In-One" => "emfqtv"); //projects with only downloads, no info yet, "prettyname" => "directory"
$nodownloads = array("emfqtv"); //projects with only information, no downloads, or no builds available yet, "projectkey"
$nonewsgroup = array ("sdo","query","transaction","validation", "emfqtv"); //projects without newsgroup
$nomailinglist = array ("sdo","query","transaction","validation", "emfqtv"); //projects without mailinglist
$incubating = array(); // projects which are incubating - EMF will never have incubating components!

$nomenclature = "Component"; //are we dealing with "components" or "projects"?

include_once $_SERVER["DOCUMENT_ROOT"] . "/modeling/includes/scripts.php";

$regs = null;
$proj = (isset($_GET["project"]) && preg_match("/^(" . join("|", $projects) . ")$/", $_GET["project"], $regs) ? $regs[1] : getProjectFromPath($PR));
$projct= preg_replace("#^/#", "", $proj);

$buildtypes = array(
	"R" => "Release",
	"S" => "Stable",
	"I" => "Integration",
	"M" => "Maintenance",
	"N" => "Nightly"
);

$Nav->addNavSeparator("EMF", "$rooturl/");
foreach (array_keys($projects) as $z)
{
	if ($projects[$z] != "emf" && !in_array($projects[$z],$extraprojects))
	{
		$Nav->addCustomNav($z, "$rooturl/?project=$projects[$z]", "_self", $level[$projects[$z]]);
	}
}

$Nav->addNavSeparator("Downloads", "$downurl/modeling/emf/downloads/?project=$proj");
$Nav->addCustomNav("Installation", "$rooturl/downloads/install.php", "_self", 2);
$Nav->addCustomNav("Update Manager", "$rooturl/updates/", "_self", 2);

$Nav->addNavSeparator("Documentation", "$rooturl/docs/");
$Nav->addCustomNav("Getting Started", "http://help.eclipse.org/ganymede/index.jsp?topic=/org.eclipse.emf.doc/references/overview/EMF.html", "_self", 2);
if (!$proj || $proj == "emf" || $proj == "sdo")
{
	$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/index.php/EMF-FAQ", "_self", 2);
	$Nav->addCustomNav("Release Notes", "$rooturl/news/relnotes.php?project=" . ($proj?$proj:"emf") . "&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "$rooturl/searchcvs.php?q=project%3A+org.eclipse.emf".($proj=="sdo"?".ecore.sdo":"")."+days%3A+7", "_self", 2);
}
else
{
	$Nav->addCustomNav("FAQ", "http://wiki.eclipse.org/index.php/EMF-".$tmp[$proj]."-FAQ", "_self", 2);
	$Nav->addCustomNav("Release Notes", "$rooturl/news/relnotes.php?project=$proj&amp;version=HEAD", "_self", 2);
	$Nav->addCustomNav("Search CVS", "$rooturl/searchcvs.php?q=file%3A+org.eclipse.emf%2F" . ($proj?"org.eclipse.emf.".$proj."%2F":"") . "+days%3A+7", "_self", 2);
}
$Nav->addNavSeparator("Community", "http://wiki.eclipse.org/index.php/Modeling_Corner");
$Nav->addCustomNav("Wiki", "http://wiki.eclipse.org/index.php/Eclipse_Modeling_Framework", "_self", 2);
$Nav->addCustomNav("Newsgroups", "$rooturl/newsgroup-mailing-list.php", "_self", 2);
$Nav->addCustomNav("Modeling Corner", "http://wiki.eclipse.org/index.php/Modeling_Corner", "_self", 2);
$collist = "%26query_format%3Dadvanced&amp;column_changeddate=on&amp;column_bug_severity=on&amp;column_priority=on&amp;column_rep_platform=on&amp;column_bug_status=on&amp;column_product=on&amp;column_component=on&amp;column_version=on&amp;column_target_milestone=on&amp;column_short_short_desc=on&amp;splitheader=0";
$Nav->addCustomNav("Open Bugs", "$bugurl/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id" . $collist, "_self", 2);
$Nav->addCustomNav("Submit A Bug", "$bugurl/bugs/enter_bug.cgi?product=EMF", "_self", 2);
$Nav->addCustomNav("Contributors", "$rooturl/project-info/team.php", "_self", 2);
addGoogleAnalyticsTrackingCodeToHeader();

?>
