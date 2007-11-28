<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * The REST web-api for retrieving database schema information. For HTML output, see ../web-app/schema.php
 */
header("Content-type: text/plain");
ini_set('display_errors', 1); ini_set('error_reporting', E_ALL);

print "Bugzilla Explorer - Database Schema\n\n";

# Load up the classfile
require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

$_dbc  = new DBConnectionBugs();
$_dbh  = $_dbc->connect();

$_query0 = "SHOW TABLES";

$tables = array();

print "# $_query0\n";
$result = mysql_query($_query0,$_dbh);
if (!$result) 
{
  	print "MySQL Error: ".mysql_error()."\n";
} 
else 
{
  	while($row = mysql_fetch_row($result))
  	{
  		$tables[] = $row[0];
    	print $row[0] . "\n";
  	}
}

$desc_cols = array("Field", "Type", "Null", "Key", "Default", "Extra");

foreach ($tables as $tablename) 
{
	print "\n";
	$_query1 = "DESCRIBE $tablename";
	print "# $_query1\n";
	$result = mysql_query($_query1,$_dbh);
	if (!$result) 
	{
  		print "MySQL Error: ".mysql_error()."\n";
	} 
	else 
	{
  		foreach ($desc_cols as $col)
  		{
    			print $col . "\t";
  		}
		print "\n";
	  	while($row = mysql_fetch_assoc($result))
	  	{
	  		foreach ($desc_cols as $col)
	  		{
	    			print $row[$col] . "\t";
	  		}
	  		print "\n";
	  	}
	}
}
?>