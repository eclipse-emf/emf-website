<?php
/*
 * This script is to be used to collect stats from the database, 
 * and produce XML data from which comparison statistics (eg., weekly trending)
 * can be derived. There is also a simple HTML output UI which can be used 
 * for single one-off daily queries.
 **/
$pre = "../"; // relative path marker

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

$qsvars = $_GET;

$debug = $qsvars["debug"]; //if ($debug) { foreach ($qsvars as $k => $v) echo "$k => $v<br>\n"; }

$user = $qsvars["user"];	$gooduser = "emf-dev";
$pass = $qsvars["pass"];	$goodpass = "trilobyt3";

if ($user != $gooduser || $pass != $goodpass) { 
	$HTMLTitle = "Eclipse Tools - EMF Download Stats";
	$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
	include $pre . "includes/header.php";
	echo "<p>Sorry, you're not authorized. Please contact codeslave (at) ca (dot) ibm (dot) com.</p>\n";
	echo "<p>&#160;</p>";
	include $pre . "includes/footer.php";
	exit;
}

##########################################################################################

/***** DATE FILTER *****/ 
if ($qsvars["month"] && $qsvars["month"] - 0 >= 1 && $qsvars["month"] - 0 <= 12) {
	$interval = "MONTH(DOW.download_date) - 0 = ".$qsvars["month"];
} else if ($qsvars["week"] && $qsvars["week"] - 0 >= 0 && $qsvars["week"] - 0 <= 53) {
	$interval = "WEEK(DOW.download_date) - 0 = ".$qsvars["week"];
} else if ($qsvars["date"]) {
	$ts = strtotime($qsvars["date"]);
	if ($ts!==-1 && $ts!==false) { // valid datestamp
		$interval = "(DOW.download_date >= '".date("Y-m-d",$ts)." 00:00:00' AND DOW.download_date <= '".date("Y-m-d",$ts)." 23:59:59')"; // per Denis' suggestion
	} else { // invalid datestamp, default to yesterday's data
		$interval = "DOW.download_date >= DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
	} 
} else if ($qsvars["interval"]=="lastmonth") { // previous FULL month
	$interval = "EXTRACT(YEAR_MONTH FROM DOW.download_date) - ".date("Ym",strtotime("-1 month"))." = 0";
} else {
	$qsvars["interval"] = $qsvars["interval"] && $qsvars["interval"] <= 30 ? $qsvars["interval"] - 0 : 1; // default
	$interval = "DOW.download_date >= DATE_SUB(CURDATE(), INTERVAL ".$qsvars["interval"]." DAY)"; 
}

/***** FILENAME FILTER *****/ 
if ($qsvars["filenames"] && !is_array($qsvars["filenames"])) { 
	$qsvars["filenames"] = array($qsvars["filenames"]);
} else if (!$qsvars["filenames"] || (is_array($qsvars["filenames"]) && !$qsvars["filenames"][0])) {
	if ($qsvars["xsd"]) { // for XSD numbers use these default queries
		$qsvars["filenames"] = array( 
			'%/emf-sdo-xsd-Standalone-%.zip', // overlap w/ EMF
		 	'%/emf-sdo-xsd-SDK-%.zip', // overlap w/ EMF
		 	'%/xsd-SDK-%.zip',
		 	'%/xsd-runtime-%.zip',
		 	'%/org.eclipse.xsd\_%.jar'
			// _ = any 1 char, % = 0 or more chars, so must escape the _
		);
	} else if ($qsvars["uml2"]) { // for UML2 numbers use these default queries
		$qsvars["filenames"] = array( 
			'%/uml2-%.zip',
			'%/org.eclipse.uml2.common\_%.jar' 
			// _ = any 1 char, % = 0 or more chars, so must escape the _
		);
	} else { // for EMF numbers use these default queries
		$qsvars["filenames"] = array( 
			'%/emf-sdo-xsd-Standalone-%.zip',
			'%/emf-sdo-xsd-SDK-%.zip',
			'%/emf-sdo-SDK-%.zip',
			'%/emf-sdo-runtime-%.zip',
			'%/org.eclipse.emf.ecore\_%.jar' 
			// _ = any 1 char, % = 0 or more chars, so must escape the _
		);
	}	
}
$filenames = "";
foreach ($qsvars["filenames"] as $i => $fn) {
	if (strlen($fn) >= 10) {
		if ($filenames) { $filenames .=" OR "; }
		$filenames .= "IDX.file_name LIKE '".$fn."'";
	}
}
$filenames = "(".$filenames.")";

/***** RESULTS LIMIT FILTER (OPTIONAL) *****/ 
$limit = $qsvars["limit"] && $qsvars["limit"] > 0 ? "LIMIT ".($qsvars["limit"] - 0) : "";

/***** COMPOSE + RUN FIRST QUERY: get file ids matching filename filter *****/
$preQuery = "SELECT IDX.file_id " .
			"FROM download_file_index AS IDX " .
			"INNER JOIN downloads AS DOW ON IDX.file_id = DOW.file_id WHERE " . 
			$filenames . "GROUP BY IDX.file_id";
$file_id_csv = doQueryCSV($preQuery);

/***** COMPOSE SECOND QUERY: get filenames, counties, or domains matching date + limit filters for the above file ids *****/
$queries = array(
	"File" => 
		"SELECT COUNT(DOW.file_id) AS N, " .
			"SUBSTRING_INDEX(IDX.file_name,'/',-1) as F " . // trash the full path, just need the filename
		"FROM download_file_index AS IDX " .
		"INNER JOIN downloads AS DOW ON DOW.file_id = IDX.file_id WHERE IDX.file_id in ($file_id_csv) AND " . 
		$interval . " GROUP BY F " . $limit 
	,
	"Country" => 
		"SELECT COUNT(DOW.ccode) AS N, " .
			"DOW.ccode as C " .
		"FROM download_file_index AS IDX " .
		"INNER JOIN downloads AS DOW ON DOW.file_id = IDX.file_id WHERE IDX.file_id in ($file_id_csv) AND " . 
		$interval . " GROUP BY C " . $limit
	,
	"Domain" => // FQDNs
		"SELECT COUNT(*) AS N, " .
			"IF(SUBSTRING_INDEX(SUBSTRING_INDEX(DOW.remote_host,'.',-2),'.',1)='co'," .
				"LOWER(SUBSTRING_INDEX(DOW.remote_host,'.',-3))," .
				"IF(SUBSTRING_INDEX(DOW.remote_host,'.',-2)=0," .
					"LOWER(SUBSTRING_INDEX(DOW.remote_host,'.',-2))," .
					"'?')) " .
			"as D " .
		"FROM download_file_index AS IDX " .
		"INNER JOIN downloads AS DOW ON DOW.file_id = IDX.file_id WHERE IDX.file_id in ($file_id_csv) AND " . 
		$interval . " GROUP BY D " . $limit
);

/***** RUN SECOND QUERY + DISPLAY RESULTS as HTML or XML *****/

$qsvarsToShow = array("sql", "generator"); // extra information to echo - generator version + SQL run
$qsvars["generator"] = '$Id: stats.php,v 1.91 2006/03/03 20:04:52 nickb Exp $';
$qsvars["sql"] = $qsvars["table"] && array_key_exists($qsvars["table"],$queries) ? htmlentities($preQuery.";\n".$queries[$qsvars["table"]]) : ""; 

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
		echo "<li>".$title.": <a href=\"$PHP_SELF?".
			doQS(array("table" => $title, "ctype" => "html"))."\">HTML</a>, " .
			"<a href=\"$PHP_SELF?".
			doQS(array("table" => $title, "ctype" => "xml"))."\">XML</a>" .
			"</li>\n";
	}
	echo "</ul><p>&#160;</p>";
	include $pre . "includes/footer.php";
}

/***** DONE. *****/

##########################################################################################

function doQS($replacements = array()) {
	global $qsvars;
	$qs = "";
	foreach ($replacements as $label => $value) {
		$qsvars[$label] = $value;
	}
	foreach ($qsvars as $label => $value) {
		if ($label && $label!="generator") { 
			if ($qs) $qs .= "&";
			$qs.=$label."=".urlencode($value);
		}
	}
	return $qs;
}

function displayXMLResults($title, $results) {
	global $qsvars,$qsvarsToShow,$time;
	$count=0;
	$out = "";
	$out .= "  <query" ." elapsed=\"".$time->displaytime()."s\">\n";
	foreach ($qsvarsToShow as $label) {
		$value = $qsvars[$label];
		if ($label && $value) { 
			$out .= "    <".$label.">".$value."</".$label.">\n";
		}
	}
	$out .= "  </query>\n";
	
	foreach ($results as $i => $data) {
		$out .= "  <".strtolower($title);
		foreach ($data as $label => $datum) { 
			if ($label=="N") $count+=($datum-0);
			$out .= " ".strtolower($label)."=\"$datum\"";
		}
		$out .= "/>\n";
	}
	$out .= "  <summary n=\"".$count."\" ".strtolower(substr($title,0,1))."=\"".sizeof($results)."\""."/>\n";
	return $out;
}   
     
function displayHTMLResults($title, $results) {
	global $qsvars,$qsvarsToShow;
	$count=0;
	$out = "";
	foreach ($results as $i => $data) {
   		if (!$i) { # do column header
   			$out .= "<tr bgcolor=\"navy\">\n";
			foreach ($data as $label => $datum) { 
    			$out .= "  <td><b style=\"color:white\">$label</b></td>\n";
    		}
   			$out .= "</tr>\n";
		}
		$out .= "<tr bgcolor=\"".($i%2==1?"#EEEEEE":"#FFFFFF")."\">\n";
		foreach ($data as $label => $datum) { 
			if ($label=="N") $count+=($datum-0);
			$out .= "  <td>$datum</td>\n";
		}
		$out .= "</tr>\n";
	}
	$out .= "</table></p>\n";
	
	// prepend
	$out = "<p><table cellspacing=\"0\" cellpadding=\"2\"><tr><td colspan=\"\"><b>".
		sizeof($results)." ".$title."s, ".$count." total</b></td></tr>".$out;

	$out .= "<p><table>\n";
	foreach ($qsvarsToShow as $label) {
		$value = $qsvars[$label];
		if ($label && $value) { 
			$out .= "  <tr valign=\"top\"><td>".$label."</td><td>&#160</td><td>".$value."</td></tr>\n";
		}
	}
	$out .= "</table></p>\n";
	$out .= "<hr noshade=\"noshade\" size=\"1\"/>\n";
	return $out;
}   
     
# There are usually in excess of 30 million records.. watch your queries!!
function doQuery($sql,$isCSV=false) {
	
	$out = $isCSV?"":array();
	
	if (!$sql) return $out; 

    # Connect to database + get results set
    $dbc = new DBConnectionDownloads(); $dbh = $dbc->connect(); $rs = mysql_query($sql, $dbh);
    
    if(mysql_errno($dbh) > 0) {
		echo "<b>SQL error processing query:</b><br/><small>\n$sql\n</small>\n";
		# For debugging purposes - don't display this stuff in a production page.
		# echo mysql_error($dbh);
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		echo "<p align=\"right\"><small>\n".
			 '$Id: stats.php,v 1.91 2006/03/03 20:04:52 nickb Exp $'.
			 "\n</small></p>\n";
		exit;
    }
    while($myrow = mysql_fetch_assoc($rs)) {
    	if ($isCSV) {
    		foreach ($myrow as $myr) $out .= ($out?",":"") . $myr;
    	} else {
    		$out[] = $myrow;
    	}
    }
    
    # dsconnect and destroy objects
    $dbc->disconnect();
    $rs = null; $dbh = null; $dbc = null;
    return $out;
}

function doQueryCSV($sql) {
	return doQuery($sql,true);
}
	
?>
