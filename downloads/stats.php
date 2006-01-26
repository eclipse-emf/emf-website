<?php

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

foreach ($queries as $title => $query) { 
	$results = doQuery($query);
	echo "<p><table cellspacing=\"0\" cellpadding=\"2\"><tr><td colspan=\"\">$title</td></tr>";
	foreach ($results as $i => $data) {
   		if (!$i) { # do column header
   			echo "<tr bgcolor=\"navy\">\n";
			foreach ($data as $label => $datum) { 
    			echo "\t<td><b style=\"color:white\">$label</b></td>\n";
    		}
   			echo "</tr>\n";
		}
		echo "<tr bgcolor=\"".($i%2==1?"#EEEEEE":"#FFFFFF")."\">\n";
		foreach ($data as $label => $datum) { 
			echo "\t<td>$datum</td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table></p>";
	echo "<hr noshade=\"noshade\" size=\"1\"/>";
}
echo '<p align="right">Script took '.$time->displaytime().' seconds to execute.</p>';
        
##########################################################################################
        
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

<!-- $Id: stats.php,v 1.5 2006/01/26 22:22:24 nickb Exp $ -->