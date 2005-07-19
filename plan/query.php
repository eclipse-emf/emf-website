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

	$query = $_GET["query"];
	$bug = $_GET["bug"];

	$query = ($query?$query:'SELECT 
		BUG.bug_id, 
		BUG.short_desc,
		USR.realname AS somedude
FROM 
		bugs AS BUG
		INNER JOIN profiles AS USR ON USR.userid = BUG.reporter
WHERE
		BUG.bug_id = '.$bug);
	echo '
<html>
<head></head>
<body><form method=post>
	<textarea name=query rows=10 cols=40>'.$query.'</textarea>
	<input type=submit>
</form>
<pre>';
	
	# Connect to database
	$dbc 	= new DBConnectionBugs();
	$dbh 	= $dbc->connect();

	$rs 	= mysql_query($query, $dbh);
	
	if(mysql_errno($dbh) > 0) {
		echo "There was an error processing the request:\n\n$query\n\n".
		
		# For debugging purposes - don't display this stuff in a production page.
		echo "Error: ".mysql_error($dbh);
		
		# Mysql disconnects automatically, but I like my disconnects to be explicit.
		$dbc->disconnect();
		exit;
	}
		
	while($myrow = mysql_fetch_assoc($rs)) {
		foreach ($myrow as $k => $v) { 
			echo "$k => $v\n";
		}
		//echo "Bug ID: " . $myrow['bug_id'] . "\n\tDescription: " . $myrow['short_desc'] . "\n\tReporter: " . $myrow['realname']."\n";
		
	}
	
	$dbc->disconnect();

	$rs 		= null;
	$dbh 		= null;
	$dbc 		= null;
?>
</pre>
</body>
</html>