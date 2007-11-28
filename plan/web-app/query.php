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

$query = stripslashes($_POST["query"]);

print "<div id=\"midcolumn\">\n";

print "<h1>Query Tool</h1>";

print "<div class=\"homeitem3col\">\n";
print "<h3>Query</h3>\n";

   echo '
<form method=post><tr valign="top"><td align="left">
   <pre style="font-size:12px"><i style="font-size:11px">separate multiple queries with semi-colon (";")
  -&gt; <a href="schema.php">database schema</a> (tables, fields)</i></pre>
   <textarea style="font-size:12px" name=query rows=20 cols=110>'.$query.'</textarea><br/>
   <input type=submit name="Submit" style="font-size:12px">
   <a href="http://www.eclipse.org/emf/plan/query.php">Sample queries</a>
';
print "</div>\n";
   
print "<div class=\"homeitem3col\">\n";
print "<h3>Results</h3>\n";
   
if (false!==strpos($query,";")) {
	$queries = explode(";",$query);
} else {
	$queries = array($query);
}
foreach ($queries as $i => $query) { 
	if (trim($query)) { 
		displayQuery($query);
	}
}

print "</div>\n";

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";
	
print "</div>\n"; // rightcolumn

print "</div>\n"; 

$html = ob_get_contents();
ob_end_clean();

$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>