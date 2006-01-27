<?php

/*
 * This script is to be used to collect stats from the database, 
 * and produce XML data from which comparison statistics (eg., weekly trending)
 * can be derived. There is also a simple HTML output UI which can be used 
 * for single one-off daily queries.  
 * */

$pre = "../";

class Timer { 
	/* thanks to http://ca.php.net/microtime -> ed [at] twixcoding [dot] com */
	// Starts, Ends and Displays Page Creation Time
	function getmicrotime() {
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}    
	    
	function starttime() {
		$this->st = $this->getmicrotime();
	}
	    
	function displaytime() {
	    $this->et = $this->getmicrotime();
	    return round(($this->et - $this->st), 3);
	}
}

$time = new Timer; $time->starttime();

require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_downloads_ro.class.php";

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qsvars[$var[0]] = $var[1];
}

$debug = $qsvars["debug"];

$user = $qsvars["user"];	$gooduser = "emf-dev";
$pass = $qsvars["pass"];	$goodpass = "trilobyt3";

// defaults
$qsvars["interval"] = $qsvars["interval"] && $qsvars["interval"] <= 30 ? $qsvars["interval"] - 0 : 7; 
$qsvars["filename"] = $qsvars["filename"] && strlen($qsvars["filename"]) >= 10 ? urldecode($qsvars["filename"]) : "emf-sdo-xsd-SDK-2.2";
$limit = $qsvars["limit"] && $qsvars["limit"] > 0 ? "LIMIT ".($qsvars["limit"] - 0) : "";
 
$queries = array(
//	"Path" => 
//		"SELECT COUNT(*) AS Count, DOW.file as URL FROM downloads AS DOW " .
//		"FORCE INDEX(idx_downloads_date) WHERE " .
//		"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$qsvars["interval"]." DAY) AND " .
//		"DOW.file LIKE \"%".$qsvars["filename"]."%\" GROUP BY URL ".$limit 
//	,
	"File" => 
		"SELECT COUNT(*) AS Count, SUBSTRING_INDEX(DOW.file,'/',-1) as URL FROM downloads AS DOW " .
		"FORCE INDEX(idx_downloads_date) WHERE " .
		"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$qsvars["interval"]." DAY) AND " .
		"DOW.file LIKE \"%".$qsvars["filename"]."%\" GROUP BY URL ORDER BY Count DESC ".$limit 
	,
//	"Request" => 
//		"SELECT COUNT(*) AS Count, DOW.remote_host as Host FROM downloads AS DOW " .
//		"FORCE INDEX(idx_downloads_date) WHERE " .
//		"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$qsvars["interval"]." DAY) AND " .
//		"DOW.file LIKE \"%".$qsvars["filename"]."%\" GROUP BY Host ORDER BY Host DESC ".$limit
//	,
	"Domain" => // temporary solution for getting country codes
		"SELECT COUNT(*) AS Count, " .
			"IF(SUBSTRING_INDEX(DOW.remote_host,'.',-1)<1," .
				"LOWER(SUBSTRING_INDEX(DOW.remote_host,'.',-1))," .
				"'?') " .
			"as TLD " .
		"FROM downloads AS DOW " .
		"FORCE INDEX(idx_downloads_date) WHERE " .
		"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$qsvars["interval"]." DAY) AND " .
		"DOW.file LIKE \"%".$qsvars["filename"]."%\" GROUP BY TLD ".$limit
);

if ($user == $gooduser && $pass == $goodpass) { 
	if ($qsvars["table"] && array_key_exists($qsvars["table"],$queries)) {
		if ($qsvars["ctype"]=="xml") { 
			header('Content-type: text/xml');
			echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			echo "<data>\n";
			$results = doQuery($queries[$qsvars["table"]]);
			echo displayXMLResults($qsvars["table"],$results);
			echo "</data>\n";
		} else {
			$HTMLTitle = "Eclipse Tools - EMF Download Stats";
			$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
			include $pre . "includes/header.php";
			echo "Querying ... ";
			$results = doQuery($queries[$qsvars["table"]]);
			echo "done (".$time->displaytime()." seconds).<br/><br/>";
			echo displayHTMLResults($qsvars["table"],$results);
			include $pre . "includes/footer.php";
		}
	} else {
		$HTMLTitle = "Eclipse Tools - EMF Download Stats";
		$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
		include $pre . "includes/header.php";
		echo "<p>Choose a table &amp; display format. Query may take over 2 minutes. Please be patient.</p>\n<ul>";
		foreach ($queries as $title => $query) {
			echo "<li>".$title."s: <a href=\"$PHP_SELF?".
							doQS(array("table" => $title))."\">HTML</a>, " .
						"<a href=\"$PHP_SELF?".
							doQS(array("table" => $title, "ctype" => "xml"))."\">XML</a>" .
				"</li>\n";
		}
		echo "</ul><p>&#160;</p>";
		include $pre . "includes/footer.php";
	}
} else {
	$HTMLTitle = "Eclipse Tools - EMF Download Stats";
	$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
	include $pre . "includes/header.php";
	echo "<p>Sorry, you're not authorized. Please contact codeslave (at) ca (dot) ibm (dot) com.</p>\n";
	echo "<p>&#160;</p>";
	include $pre . "includes/footer.php";
} 

##########################################################################################

function doQS($replacements = array()) {
	global $qsvars;
	$qs = "";
	foreach ($replacements as $label => $value) {
		$qsvars[$label] = $value;
	}
	foreach ($qsvars as $label => $value) {
		if ($label) { 
			if ($qs) $qs .= "&";
			$qs.=$label."=".urlencode($value);
		}
	}
	return $qs;
}

function displayXMLResults($title, $results) {
	global $qsvars,$time;
	$count=0;
	$out = "";
	$out .= "\t<query" ." elapsed=\"".$time->displaytime()."s\">\n";
	foreach ($qsvars as $label => $value) {
		if ($label && $label!="user" && $label!="pass" && $label!="ctype") { 
			$out .= "\t\t<".$label.">".$value."</".$label.">\n";
		}
	}
	$out .= "\t</query>\n";
	
	foreach ($results as $i => $data) {
		$out .= "\t<".strtolower($title);
		foreach ($data as $label => $datum) { 
			if ($label=="Count") $count+=($datum-0);
			$out .= " ".strtolower($label)."=\"$datum\"";
		}
		$out .= "/>\n";
	}
	$out .= "\t<summary ".strtolower($title)."s=\"".sizeof($results)."\" count=\"".$count."\""."/>\n";
	return $out;
}   
     
function displayHTMLResults($title, $results) {
	global $qsvars;
	$count=0;
	$out = "";
	foreach ($results as $i => $data) {
   		if (!$i) { # do column header
   			$out .= "<tr bgcolor=\"navy\">\n";
			foreach ($data as $label => $datum) { 
    			$out .= "\t<td><b style=\"color:white\">$label</b></td>\n";
    		}
   			$out .= "</tr>\n";
		}
		$out .= "<tr bgcolor=\"".($i%2==1?"#EEEEEE":"#FFFFFF")."\">\n";
		foreach ($data as $label => $datum) { 
			if ($label=="Count") $count+=($datum-0);
			$out .= "\t<td>$datum</td>\n";
		}
		$out .= "</tr>\n";
	}
	$out .= "</table></p>\n";
	
	// prepend
	$out = "<p><table cellspacing=\"0\" cellpadding=\"2\"><tr><td colspan=\"\"><b>".
		sizeof($results)." ".$title."s, ".$count." total</b></td></tr>".$out;

	$out .= "<p><table>\n";
	foreach ($qsvars as $label => $value) {
		if ($label && $label!="user" && $label!="pass" && $label!="ctype") { 
			$out .= "\t<tr><td>".$label."</td><td>&#160</td><td>".$value."</td></tr>\n";
		}
	}
	$out .= "</table></p>\n";

	$out .= "<hr noshade=\"noshade\" size=\"1\"/>\n";
	return $out;
}   
     
# There are usually in excess of 30 million records.. watch your queries!!
function doQuery($sql) {
	
	$arr = array();
	
	if (!$sql) return $arr; 

    # Connect to database & get results set
    $dbc = new DBConnectionDownloads(); $dbh = $dbc->connect(); $rs = mysql_query($sql, $dbh);
    
    if(mysql_errno($dbh) > 0) {
		echo "<b>SQL error processing \"$sql\"</b>";
		# For debugging purposes - don't display this stuff in a production page.
		# echo mysql_error($dbh);
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
    }
            
    while($myrow = mysql_fetch_assoc($rs)) { $arr[] = $myrow;
       # echo "File: " . $myrow['file'] . " Count: " . $myrow['RecordCount'] . "<br>\n";
    }
    
    # dsconnect and destroy objects
    $dbc->disconnect();
    $rs = null; $dbh = null; $dbc = null;
    
    return $arr;
}

?>

<!-- $Id: stats.php,v 1.33 2006/01/27 22:56:58 nickb Exp $ -->