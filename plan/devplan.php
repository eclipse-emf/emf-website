<?php
	// Props to Denis Roy (webmaster@eclipse.org) for the basecode from which this script grew.
	// Logic, DB and Presentation lumped here for simplicity.
	// Please avoid using aggregate functions (COUNT, SUM, MAX, MIN, etc) on busy web pages.
	// For bugzilla this is not critical as the tables are small (<10,000,000 records)
	// but imagine if every project displays a COUNT(*) for their project's bugs right on the front page!
	// ** NOTE ** You need to tell the WebMaster from which URL you are loading this class from, 
	// otherwise the connect() will fail.
	
	// Load up the classfile
	require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

	header("Content-Type: text/plain");

	$bug = $_GET["bug"];
	echo "Data for bug $bug ...\n";

	// Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();

	// Please note: some columns are not SELECTable, such as the password and e-mail address.
	// They will return an error.
	$query = "SELECT DISTINCT
	BUG.bug_id,
	BUG.short_desc,
	BUG.bug_severity,
	BUG.bug_status,
	BUG.resolution,
	BUG.creation_ts,
	BUG.delta_ts,
	BUG.lastdiffed,
	BUG.estimated_time,
	BUG.remaining_time,
	BUG.priority,
	BUG.version,
	BUG.target_milestone,
	BUG.votes,
	PROF.realname
FROM 
	bugs as BUG,
	profiles as PROF
WHERE
	BUG.reporter = PROF.userid AND
	BUG.bug_id = $bug";

	$rs 	= mysql_query($sql_info, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing the request:\n\n$query".
		// Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		$dbh = null;
		$dbc = null;
		exit;
	}

	while($myrow = mysql_fetch_assoc($rs)) {
		foreach ($myrow as $k => $v) { 
			echo "$k => $v\n";
		}
	}

	$dbc->disconnect();
	$rs  = null;
	$dbh = null;
	$dbc = null;
?>