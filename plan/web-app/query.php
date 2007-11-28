<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * Web app for retrieving database schema information. For REST API (plain text) output, see ../web-api/schema.php
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$theme = "Phoenix";

require_once "../web-api/bugzilla-common.inc.php";

$pageTitle = "Bugzilla Query";
$query = stripslashes($_POST["query"]);

print "<div id=\"midcolumn\">\n";

print "<h1>$pageTitle</h1>\n";
print "<i>Separate multiple queries with semi-colon (\";\")</i><br/>\n";

print '<form method=post><textarea style="font-size:10px" name=query rows=20 cols=80>' . $query . '</textarea><br/><input type=submit name="Submit" style="font-size:12px">' . "\n";
print "<hr noshade size=\"1\" width=\"50%\"/>\n";
   
print "<h1>Results</h1>\n";
   
if (false!==strpos($query,";")) {
	$queries = explode(";",$query);
} else {
	$queries = array($query);
}
foreach ($queries as $i => $query) { 
	if (trim($query)) { 
		print "<pre>"; displayQuery(trim($query)); print "</pre>\n";
	}
}

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";
	
print "<div class=\"sideitem\">\n";
print "<h6>Help</h6>\n";
print "<p><ul><li><a href=\"schema.php\">Database Schema</a></li>\n";
print "<li><a href=\"http://www.eclipse.org/emf/plan/query.php\">Sample Queries</a></li></ul></p>\n";
print "</div>\n";
	
print "</div>\n"; // rightcolumn

print "</div>\n"; 

$html = ob_get_contents();
ob_end_clean();

$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>