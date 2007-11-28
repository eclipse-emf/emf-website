<?php
/* Copyright (c) 2007 IBM, made available under EPL v1.0
 * Contributors Nick Boldt
 *
 * The common parameter parsing module for the REST web-api 
 * for retrieving data from the database. This is NOT part
 * of the public web-api.
 *
 */
ini_set('display_errors', 1); ini_set('error_reporting', E_ALL);
$debug = isset($_GET["debug"]) ? $_GET["debug"] : 0;

$dbconnection_class_file = "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
if (is_file($dbconnection_class_file))
{
	# Load up the classfile
	require_once $dbconnection_class_file;
	
	$_dbc  = new DBConnectionBugs();
	$_dbh  = $_dbc->connect();
}
else
{
	$_dbh = null;
}

function displayQuery($_query)
{
	global $_dbh;
	echo( "# " . $_query . "\n" );
	$result = mysql_query($_query,$_dbh);
	if (!$result) {
		echo("MySQL Error: ".mysql_error());
	} else {
		while($row = mysql_fetch_array($result)){
			for ($i=0; $i<sizeof($row); $i++)
			{
				print isset($row[$i]) ? $row[$i] . "\t" : ""; 
			}
			print "\n";
		}
	}
	print "\n";
}

/* return array of lines from a given host and URL */
function http_file($host, $url, $qs=null)
{
	if (ini_get('allow_url_fopen'))
	{
		return file("http://" . $host . (isset($url) ? $url : '/') . (isset($qs) ? '?' . $qs : ''));
	}
	else
	{
		return preg_split("#(\n\r|\r\n|\n|\r)#", http_file_get_contents($host, $url));
	}
}

/* return a block of text (including newlines) from a given host and URL */
function http_file_get_contents($host, $url, $qs=null)
{
	if (ini_get('allow_url_fopen'))
	{
		return file_get_contents("http://" . $host . (isset($url) ? $url : '/') . (isset($qs) ? '?' . $qs : ''));
	}
	else
	{
		$file_contents = "";
		$fp = fsockopen($host, 80, $errno, $errstr, 30);
		if (!$fp)
		{
			return "ERROR connecting to $host: $errstr ($errno)";
		}
		else
		{
			fputs($fp, "GET " . (isset($url) ? $url : '/') . (isset($qs) ? '?' . $qs : '') . " HTTP/1.1\r\n");
			fputs($fp, "Host: $host\r\nUser-Agent: PHP Script\r\nContent-Type: application/x-www-form-urlencoded\r\nConnection: close\r\n\r\n");
			while (!feof($fp))
			{
				$file_contents .= fgets($fp, 128);
			}
			fclose($fp);
		}
		return $file_contents;
	}
}

function bgcol($row)
{
	return $row % 2 == 0 ? "#EEEEEE" : "#FFFFFF"; 
}
?>