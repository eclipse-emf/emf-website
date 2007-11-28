<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * Web app for retrieving database schema information. For REST API (plain text) output, see ../web-api/schema.php
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$theme = "Phoenix";

ini_set('display_errors', 1); ini_set('error_reporting', E_ALL);

# Load up the classfile
require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

$_dbc  = new DBConnectionBugs();
$_dbh  = $_dbc->connect();

$_query0 = "SHOW TABLES";

$tables = array();
$pageTitle = "Bugzilla Explorer - Database Schema";

print "<div id=\"midcolumn\">\n";

print "<h1>$pageTitle</h1>";

print "<div class=\"homeitem3col\">\n";
print "<h3>Tables</h3>\n";

$result = mysql_query($_query0,$_dbh);
if (!$result) 
{
  	print "<p><ul><li><i>MySQL Error: ".mysql_error()."</i></li></ul></p>\n";
} 
else 
{
	print "<p><table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">" . 
			"<tr><td valign=\"top\" style=\"padding-left:0px\">" . 
				"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\n";
	$cnt = 0;
	$lim = mysql_num_rows($result);
	$split_thresh = $lim > 5 ? ceil($lim/5) : 5;
	while($row = mysql_fetch_row($result))
	{
		if ($cnt % $split_thresh == 1) 
		{
			print "</table></td><td valign=\"top\" style=\"padding-left:6px\"><table cellspacing=\"0\" cellpadding=\"0\" border=\"1\">\n"; 
		}
		$cnt++;
  		$tables[] = $row[0];
  		print "<tr bgcolor=\"" . "\"> <td valign=\"top\" align=\"left\" style=\"padding-left:6px\"><a href=\"#" . $row[0] . "\">" . ucfirst($row[0]) . "</a></td</tr>\n";
  	}
	print "</table></td></tr></table></p>\n";
}

print "</div>\n";


$desc_cols = array("Field", "Type", "Null", "Key", "Default", "Extra");

foreach ($tables as $tablename) 
{
	$_query1 = "DESCRIBE $tablename";
	print "<div class=\"homeitem3col\">\n";
	print "<h3><a name=\"$tablename\"></a>" . ucfirst($tablename) . " Table</h3>\n";
	$result = mysql_query($_query1,$_dbh);
	if (!$result) 
	{
	  	print "<p><ul><li><i>MySQL Error: ".mysql_error()."</i></li></ul></p>\n";
	} 
	else 
	{
		print "<p><blockquote><table border=\"1\" cellspacing=\"0\" cellpadding=\"2\"><tr>\n";
  		foreach ($desc_cols as $col)
  		{
    			print "<th>$col</th>\n";
  		}
		print "</tr>\n";
		while($row = mysql_fetch_assoc($result))
	  	{
			print "<tr>\n";
	  		foreach ($desc_cols as $col)
	  		{
    				print "<td>" . $row[$col] . "</td>\n";
	  		}
			print "</tr>\n";
	  	}
	  	print "</table></blockquote></p>&#160;\n";
	}
	print "</div>";
}

print "</div>\n"; // midcolumn

print "<div id=\"rightcolumn\">\n";

print "<div class=\"sideitem\">\n";
print "<h6>About</h6>\n";
print "<p>Updated:<br/>" . date("Y-m-d H:i T") . "</p>\n";
print "</div>\n";

print "<div class=\"sideitem\">\n";
print "<h6>Data</h6>\n";
print "<p>See <a href=\"../web-api/schema.php\">REST API</a>.</p>\n";
print "</div>\n";

print "</div>\n"; // rightcolumn

print "</div>\n"; 

$html = ob_get_contents();
ob_end_clean();

$pageKeywords = ""; 
$pageAuthor = "Nick Boldt";

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>