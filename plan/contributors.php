<?php
# Props to Denis Roy (webmaster@eclipse.org) for the basecode from which this script grew.
# Logic, DB and Presentation lumped here for simplicity.
# Please avoid using aggregate functions (COUNT, SUM, MAX, MIN, etc) on busy web pages.
# For bugzilla this is not critical as the tables are small (<10,000,000 records)
# but imagine if every project displays a COUNT(*) for their project's bugs right on the front page!
# ** NOTE ** You need to tell the WebMaster from which URL you are loading this class from, 
# otherwise the connect() will fail.
   
# Load up the classfile
require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

header("Content-Type: text/plain");

$bugs = $_GET["bugs"]; 
$debug = isset($_GET["debug"]);

if (!$bugs) 
{ 
	echo "Enter a list of bugs to return csv data, eg:\n?bugs=147594,149770,161744,165770,166967,166112,170204,156783,170223,136881,179004,185971\n\n"; 
	exit; 
}

# Component,Bug #,Contributor,Size,Committer
$query = "
SELECT DISTINCT
  BUG.bug_id, PROF.login_name, TXT.thetext
FROM 
  bugs as BUG, 
  profiles as PROF, 
  longdescs as TXT 
WHERE 
  TXT.who = PROF.userid AND 
  BUG.bug_id = TXT.bug_id AND 
  TXT.thetext like '%[contrib%]%' AND
  BUG.bug_id IN (".$bugs.")
ORDER BY
  TXT.bug_when
ASC";
   
$data = array();
$contributors = array();

# Connect to database
$dbc = new DBConnectionBugs();
$dbh = $dbc->connect();

if ($debug)
{
	print "QUERY:\n$query\n";
}
$rs = mysql_query($query, $dbh);
if(mysql_errno($dbh) > 0) 
{
	echo "Error ".mysql_errno($dbh). ": ".mysql_error($dbh)."\n\n";
	# Mysql disconnects automatically, but I like my disconnects to be explicit.
	$dbc->disconnect();
	$dbh = null;
	$dbc = null;
} 
else 
{
	while($myrow = mysql_fetch_row($rs)) 
	{
		$contrib_email = preg_replace("/.*(\\[contrib email=\".+\"\/\\]).*/","$1",str_replace("\n"," ",$myrow[2]));
		$data["b".$myrow[0]] = ",".$myrow[0].",%%CONTRIB_EMAIL=".$contrib_email."%%,,".preg_replace("/().+)\@.+/","$1",$myrow[1]);
		$contributors[$contrib_email] = $contrib_email; 
	}
	if ($debug)
	{
		print "\nDATA:\n"; print_r($data);
		print "\nCONTRIBUTORS:\n"; print_r($contributors);
	}
	
	$myrow = null;
	$query = "
	SELECT DISTINCT
	  PROF.login_name, PROF.realname 
	FROM 
	  profiles as PROF 
	WHERE 
	  PROF.login_name IN ('".join($contributors,"', '")."')";
	if ($debug)
	{
		print "QUERY:\n$query\n";
	}
	$rs = mysql_query($query, $dbh);
	if(mysql_errno($dbh) > 0) 
	{
		echo "Error ".mysql_errno($dbh). ": ".mysql_error($dbh)."\n\n";
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		$dbh = null;
		$dbc = null;
	}
	else 
	{
		while($myrow = mysql_fetch_row($rs)) 
		{
			$contributors[$myrow[0]] = $myrow[1];
		}
	}
	if ($debug)
	{
		print "\nCONTRIBUTORS:\n"; print_r($contributors);
	}
	$dbc->disconnect();
	$rs  = null;
	$dbh = null;
	$dbc = null;
	
	foreach ($data as $b => $line)
	{
		$m = null;
		preg_match("/%%CONTRIB_EMAIL=(.+)%%/",$line,$m);
		if ($debug)
		{
			print "\nCONTRIB_EMAIL: "; print($m[1]);
		}
		if (array_key_exists($m[1],$contributors) && isset($contributors[$m[1]]))
		{
			if ($debug)
			{
				print "\nCONTRIB_NAME: "; print($contributors[$m[1]]);
			}
			$data[$b] = preg_replace("/%%CONTRIB_EMAIL=.+%%/",$contributors[$m[1]],$line);
		}
	}
	if ($debug)
	{
		print "\nDATA:\n"; print_r($data);
	}
}

foreach ($data as $b => $line)
{
	print $line."\n";
}
?>
