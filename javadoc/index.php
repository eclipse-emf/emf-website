<?php
$isWWWserver = (preg_match("/^(?:www.|)eclipse.org$/", $_SERVER["SERVER_NAME"]));

if ($isWWWserver)
{
	$PWD = "/home/data/httpd/download.eclipse.org/tools/emf/";
	$jdPWD = "/downloads/download.php?file=/tools/emf/";
}
else
{
	if (is_dir("../../../../tools/emf/"))
	{
		$PWD = "../../../../tools/emf/"; // in a javadoc folder in the /tools/emf area
	}
	else
		if (is_dir("../../tools/emf/"))
		{
			$PWD = "../../tools/emf/"; // in the web folder in /emf/
		}
	$jdPWD = $PWD;
}

$subprojs = array (
	"EMF" => "emf",
	"SDO" => "sdo",
	"XSD" => "xsd"
);

// REDIRECT to latest version of javadoc for the specified path
if ($_SERVER["QUERY_STRING"])
{
	// given       http://emf.torolab.ibm.com/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details
	// or                    http://emf.torolab.ibm.com/emf/javadoc?org/eclipse/xsd/package-summary.html#details
	// serve http://emf.torolab.ibm.com/tools/emf/xsd/javadoc/2.1.0/org/eclipse/xsd/package-summary.html#details (latest version)
	$subprojsR = array_reverse($subprojs, true);
	$vers = array ();
	foreach ($subprojsR as $label => $projct)
	{
		if (false !== strpos($_SERVER["QUERY_STRING"], $projct))
		{
			$vers = loadSubDirs($PWD . $projct . "/javadoc", "(\d\.\d|\d\.\d\.\d+)");
			break;
		}
	}
	if (sizeof($vers) > 0)
	{
		rsort($vers);
		$redirect = "Location: " . $PWD . $projct . "/javadoc/" . $vers[0] . "/" . str_replace("//", "/", str_replace("..", "", $_SERVER["QUERY_STRING"]));
	}
	else
	{
		$redirect = "Location: http://www.eclipse.org/emf/javadoc/";
	}
	//print $redirect;
	header($redirect);
	exit;
}

$projDetails = array (
	/* path => project's downloads path, downloads page path, includes path, and vanity name */
	"/tools/emf" => array (
		"/emf/downloads",
		"/emf",
		"EMF"
	),
	"/technology/emft" => array (
		"/emft/downloads",
		"/emft",
		"EMFT"
	),
	"/modeling/mdt" => array (
		"/modeling/mdt/downloads",
		"/modeling",
		"MDT"
	)
);

foreach ($projDetails as $searchPath => $details)
{
	if (false !== strpos($_SERVER["SCRIPT_NAME"], $searchPath))
	{
		$projectDownloadsPath = $searchPath;
		$projectDownloadsPagePath = $details[0];
		$projectIncludesPath = $details[1];
		$projectName = $details[2];
		break;
	}
}

$doPhoenix = false;
if (is_file($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"))
{
	$doPhoenix = true;
}
//$doPhoenix = false; // uncomment to test degraded version

$isBuildServer = preg_match("/^(build|emft).eclipse.org$/", $_SERVER["SERVER_NAME"]) || preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]);

if ($doPhoenix)
{
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
	require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

	$App = new App();
	$Nav = new Nav();
	$Menu = new Menu();
	if (is_file($App->getProjectCommon()))
	{
		include ($App->getProjectCommon());
	}
	ob_start();
}
else
{
	print '<html>' . "\n" .
	'<head>' . "\n" .
	'  <title>' . $projectName . ' Javadoc</title>' . "\n" .
	'  <link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n" .
	'</head>' . "\n" .
	'<body>' . "\n";
}

print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Javadoc</h3>
<ul>
';

foreach ($subprojs as $label => $subproj)
{
	print '<li><b> ' . $label . '</b>' . "\n";
	$vers = loadSubDirs("$PWD$subproj/javadoc", "(\d\.\d|\d\.\d\.\d+)");
	rsort($vers);
	reset($vers);
	foreach ($vers as $ver)
	{
		print '<ul><li><a href="' . $jdPWD . $subproj . '/javadoc/' . $ver . '/">' . $subproj . ' ' . $ver . '</a></li></ul>' . "\n";
	}
	print '</li>' . "\n";
}

print "</ul>\n";
print "</div></div>\n";

if ($doPhoenix)
{
	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "EMF - Javadoc";
	$pageKeywords = "";
	$pageAuthor = "Nick Boldt";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="http://' . ($isBuildServer ? $_SERVER["SERVER_NAME"] : "www.eclipse.org") . '/modeling/includes/downloads.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
}
else
{
	print "</body></html>\n";
}

function loadSubDirs($dir, $ext)
{
	$stuff = array ();

	if (is_dir($dir) && is_readable($dir))
	{
		$handle = opendir($dir);
		while (($file = readdir($handle)) !== false)
		{
			if (preg_match("/$ext$/", $file) && !preg_match("/^\.{1,2}$/", $file) && is_dir("$dir/$file"))
			{
				$stuff[] = $file;

			}
		}
		closedir($handle);
	}

	return $stuff;
}
?>