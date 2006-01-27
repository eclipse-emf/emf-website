<?php

$pre = "../";

// TODO: add flags (html) and/or tld values (xml)

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

$user = $qsvars["user"];
$pass = $qsvars["pass"];
$gooduser = "emf-dev";
$goodpass = "do-not-collect-200-dollars";
$debug = $qsvars["debug"];
$interval = $qsvars["interval"] && $qsvars["interval"] <= 30 ? $qsvars["interval"] - 0 : 7; 
$filename = $qsvars["filename"] && strlen($qsvars["filename"]) >= 10 ? $qsvars["filename"] : "emf-sdo-xsd-SDK-2.2";
$limit = $qsvars["limit"] && $qsvars["limit"] > 0 ? "LIMIT ".($qsvars["limit"] - 0) : "";
 
if ($qsvars["ctype"] || $qsvars["Content-Type"]) {
	$ctype=($qsvars["ctype"]?"text/".$qsvars["ctype"]:$qsvars["Content-Type"]);
	header('Content-type: '.$ctype);
}

if ($user == $gooduser && $pass == $goodpass) { 

	$queries = array(
		"Download" => 
			"SELECT COUNT(*) AS Count, DOW.file as File FROM downloads AS DOW " .
			"FORCE INDEX(idx_downloads_date) WHERE " .
			"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$interval." DAY) AND " .
			"DOW.file LIKE \"%".$filename."%\" GROUP BY DOW.file ".$limit 
		,"Request" => 
			"SELECT COUNT(*) AS Count, DOW.remote_host as Host FROM downloads AS DOW " .
			"FORCE INDEX(idx_downloads_date) WHERE " .
			"DOW.date >= DATE_SUB(CURDATE(), INTERVAL ".$interval." DAY) AND " .
			"DOW.file LIKE \"%".$filename."%\" GROUP BY DOW.remote_host ".$limit
//		,"Custom" => $qsvars["query"]." LIMIT 200"              
	);
	
	if ($qsvars["table"] && array_key_exists($qsvars["table"],$queries)) {
		if (false!==strpos($ctype,"xml")) { 
			echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
			echo "<data";
			$results = doQuery($queries[$qsvars["table"]]);
			echo " elapsed=\"".$time->displaytime()."s\">\n";
			echo displayXMLResults($qsvars["table"],$results);
			echo "</data>\n";
		} else {
			include $pre . "includes/header.php";
			echo "Querying ... ";
			$results = doQuery($queries[$qsvars["table"]]);
			echo "done (".$time->displaytime()." seconds).<br/><br/>";
			echo displayHTMLResults($qsvars["table"],$results);
			include $pre . "includes/footer.php";
		}
	} else {
		include $pre . "includes/header.php";
		echo "<p>Choose a table &amp; display format. Query may take over 2 minutes. Please be patient.</p>\n<ul>";
		foreach ($queries as $title => $query) {
			echo "<li>" .
				"$title: <a href=\"$PHP_SELF?".doQS(array("table" => $title))."\">HTML</a>, " .
						"<a href=\"$PHP_SELF?".doQS(array("table" => $title, "ctype", "xml"))."\">XML</a>" .
				"</li>\n";
		}
		echo "</ul><p>&#160;</p>";
		include $pre . "includes/footer.php";
	}
} else {
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
		if ($qs) $qs .= "&";
		$qs=$label."=".urlencode($value);
	}
	return $qs;
	
}

function displayXMLResults($title, $results) {
	$count=0;
	$out = "";
	foreach ($results as $i => $data) {
		$out .= "\n\t<".strtolower($title);
		foreach ($data as $label => $datum) { 
			if ($label=="Count") $count+=($datum-0);
			$out .= " ".strtolower($label)."=\"$datum\"";
		}
		$out .= "/>\n";
	}
	$out .= "<summary ".strtolower($title)."s=\"".sizeof($results)."\" count=\"".$count."\""."/>";
	return $out;
}   
     
function displayHTMLResults($title, $results) {
	$count=0;
	$out = "";
	$out .= "<p><table cellspacing=\"0\" cellpadding=\"2\"><tr><td colspan=\"\"><b>$title</b></td></tr>";
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
	$out .= "<p>".$title."s: ".sizeof($results).", total count: ".$count."</p>\n";
	$out .= "<hr noshade=\"noshade\" size=\"1\"/>\n";
	return $out;
}   
     
# There are usually in excess of 30 million records.. watch your queries!!
function doQuery($sql) {
	$arr = array();
	
    # Connect to database & get results set
    $dbc = new DBConnectionDownloads(); $dbh = $dbc->connect(); $rs = mysql_query($sql, $dbh);
    
    if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request";
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

<!-- $Id: stats.php,v 1.11 2006/01/27 19:35:46 nickb Exp $ -->