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

	header("Content-Type: text/html");

	$bug = $_GET["bug"]; if (!$bug) { $bug="61639"; }
	$query = $_POST["query"];
	
	$query = ($query?$query:"SELECT DISTINCT
  BUG.bug_id, 
  PROD.name as PNAME, CMP.name as CNAME, 
  PROF.realname, 
  BUG.short_desc, 
  BUG.priority, BUG.bug_severity, 
  BUG.bug_status, BUG.resolution, 
  BUG.creation_ts, BUG.lastdiffed, 
  BUG.version, BUG.target_milestone, BUG.votes 
FROM 
  bugs as BUG, 
  profiles as PROF, 
  bugs_activity as ACT, 
  products as PROD, 
  components as CMP, 
  longdescs as TXT 
WHERE 
  BUG.reporter = PROF.userid AND 
  CMP.id = BUG.component_id AND 
  PROD.id = BUG.product_id AND 
  BUG.bug_id = TXT.bug_id AND 
  BUG.bug_id = ACT.bug_id AND 
  BUG.bug_id = $bug");

	echo '
<html>
<head></head>
<body>
<table><form method=post><tr valign="top"><td align="right">
	<pre>Query:</pre>
	<textarea style="font-size:10px" name=query rows=30 cols=60>'.$query.'</textarea><br>
	<input type=submit name="Submit" style="font-size:12px">
</td><td>&nbsp;&nbsp;</td>
<td><pre>Results:</pre>';
	
	if ($query) { 
		echo "<pre style=\"color:blue\">";
		# Connect to database
		$dbc 	= new DBConnectionBugs();
		$dbh 	= $dbc->connect();

		$rs 	= mysql_query($query, $dbh);
		
		if(mysql_errno($dbh) > 0) {
			echo "There was an error processing the request:\n\n$query\n\n".
			# Mysql disconnects automatically, but I like my disconnects to be explicit.
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
	}

	echo '
</pre>
</td></tr></form></table>
</body>
</html>
';

?>
