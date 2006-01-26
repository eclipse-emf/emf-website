<?php

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

$queries = array(
	"Zips" => "SELECT DOW.file as Zipfile, COUNT(*) AS Requests FROM downloads AS DOW WHERE
                DOW.file LIKE \"%emf-sdo-xsd-SDK-2.2.0M%\" GROUP BY DOW.file LIMIT 100", 
	"Countries" => "SELECT DOW.remote_host as Requester, COUNT(*) AS Requests FROM downloads AS DOW WHERE
                DOW.file LIKE \"%emf-sdo-xsd-SDK-2.2.0M%\" GROUP BY DOW.remote_host LIMIT 100"
);

// Process query string
$vars = explode("&", $_SERVER['QUERY_STRING']);
for ($i=0;$i<=count($vars);$i++) {
  $var = explode("=", $vars[$i]);
  $qsvars[$var[0]] = $var[1];
}

include $pre . "includes/header.php"; 

if ($qsvars["table"] && array_key_exists($qsvars["table"],$queries)) {
	displayResults($qsvars["table"], $queries[$qsvars["table"]]);
	echo '<p align="right">Query took '.$time->displaytime().' seconds.</p>';
} else {
	echo "<p>Choose a table to display. Query may take over 2 minutes.</p>\n<ul>";
	foreach ($queries as $title => $query) {
		echo "<li><a href=\"$PHP_SELF?table=$title\">$title</a></li>\n";
	}
	echo "</ul>";
} 

include $pre . "includes/footer.php";
        
##########################################################################################

function displayResults($title, $query) {
	$out = "";
	$results = doQuery($query);
	$out .= "<p><table cellspacing=\"0\" cellpadding=\"2\"><tr><td colspan=\"\">$title</td></tr>";
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
			$out .= "\t<td>$datum</td>\n";
		}
		$out .= "</tr>\n";
	}
	$out .= "</table></p>";
	$out .= "<hr noshade=\"noshade\" size=\"1\"/>";
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

<!-- $Id: stats.php,v 1.6 2006/01/26 22:33:14 nickb Exp $ -->