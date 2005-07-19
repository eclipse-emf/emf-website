<?php
	# Props to Denis Roy (webmaster@eclipse.org) for the basecode from which this script grew.
	# --
	# Sample PHP code to issue a Bugzilla query.
	# Logic, DB and Presentation lumped here for simplicity.
	#
	# Please avoid using aggregate functions (COUNT, SUM, MAX, MIN, etc) on busy web pages.
	# For bugzilla this is not critical as the tables are small (<10,000,000 records)
	# but imagine if every project displays a COUNT(*) for their project's bugs right on the front page!
	#
	# I use phpeclipse.de's PHP plugin for Eclipse.
	#
	# D.
	# --
	
	# Load up the classfile
	# You need to tell the WebMaster from which URL you are loading this class from, 
	# otherwise the connect() will fail.
	require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";

	$bug = $_GET["bug"];
	
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();


	# Please note: some columns are not SELECTable, such as the password and e-mail address.
	# They will return an error.
	$sql_info = "SELECT 
						BUG.bug_id, 
						BUG.short_desc,
						USR.realname AS somedude
				FROM 
						bugs AS BUG
						INNER JOIN profiles AS USR ON USR.userid = BUG.reporter
				WHERE
						BUG.bug_id = $bug";
	
	$rs 	= mysql_query($sql_info, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing this request".
		
		# For debugging purposes - don't display this stuff in a production page.
		# echo mysql_error($dbh);
		
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
	}
		
	while($myrow = mysql_fetch_assoc($rs)) {
		echo "Bug ID: " . $myrow['bug_id'] . " Description: " . $myrow['short_desc'] . " Reporter: " . $myrow['somedude'];
		
	}
	
	$dbc->disconnect();

	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
?>