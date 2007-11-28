<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * The REST web-api for retrieving database schema information. For HTML output, see ../web-app/schema.php
 */
header("Content-type: text/plain");
require_once "../web-api/bugzilla-common.inc.php";

print "Bugzilla Explorer - Database Schema\n\n";

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