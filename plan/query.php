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
	$query = stripslashes($_POST["query"]);
	echo '
<html>
<head></head>
<body>
<table><form method=post><tr valign="top"><td align="left">
	<pre>Query:</pre>
	<textarea style="font-size:12px" name=query rows=40 cols=60>'.$query.'</textarea><br/>
	<input type=submit name="Submit" style="font-size:12px">
	<pre style="font-size:12px;color:navy">

#--------#--------#--------#--------
# get bug details for a given bug

SELECT DISTINCT
  BUG.bug_id, 
  PROD.name as PNAME, CMP.name as CNAME, 
  PROF.userid, PROF.realname, 
  BUG.short_desc, 
  BUG.priority, BUG.bug_severity, 
  BUG.bug_status, BUG.resolution, 
  BUG.creation_ts, BUG.lastdiffed, 
  BUG.version, BUG.target_milestone, BUG.votes 
FROM 
  bugs as BUG, 
  profiles as PROF, 
  products as PROD, 
  components as CMP
WHERE 
  BUG.reporter = PROF.userid AND 
  CMP.id = BUG.component_id AND 
  PROD.id = BUG.product_id AND 
  BUG.bug_id = 61639

#--------#--------#--------#--------
# get activity (changes) for a given bug
# fielddefs gives field names/descs

SELECT DISTINCT 
  ACT.bug_when, PROF.realname, 
  FLD.name, FLD.description, 
  ACT.removed, ACT.added
FROM 
  bugs as BUG,
  bugs_activity as ACT,
  profiles as PROF, 
  fielddefs as FLD
WHERE 
  ACT.who = PROF.userid AND 
  FLD.fieldid = ACT.fieldid AND
  BUG.bug_id = ACT.bug_id AND 
  BUG.bug_id = 61639
ORDER BY
  bug_when
ASC

#--------#--------#--------#--------
# get text (Description / Add. Comments) for a given bug

SELECT DISTINCT
  PROF.realname, TXT.bug_when, TXT.thetext
FROM 
  bugs as BUG, 
  profiles as PROF, 
  longdescs as TXT 
WHERE 
  TXT.who = PROF.userid AND 
  BUG.bug_id = TXT.bug_id AND 
  BUG.bug_id = 61639
ORDER BY
  bug_when
ASC

#--------#--------#--------#--------
# get committer name for a given id, from activity

SELECT DISTINCT
  PROF.userid, PROF.realname
FROM 
  profiles as PROF, 
  bugs_activity as ACT
WHERE 
  ACT.who = PROF.userid AND 
  ACT.who = 2253

#--------#--------#--------#--------
# get committer name for a given id, from comments

SELECT DISTINCT
  PROF.userid, PROF.realname
FROM 
  profiles as PROF, 
  longdescs as TXT 
WHERE 
  TXT.who = PROF.userid AND 
  TXT.who = 2253

#--------#--------#--------#--------
# get committer name for a given id, from bug

SELECT DISTINCT
  PROF.userid, PROF.realname
FROM 
  profiles as PROF, 
  bugs as BUG
WHERE 
  BUG.reporter = PROF.userid AND 
  BUG.reporter = 2253

</pre>
</td><td>&nbsp;&nbsp;</td>
<td>';
	if ($query) { 
		echo "<pre>Results:</pre>\n";
		echo "<pre style=\"color:blue\">";
		# Connect to database
		$dbc 	= new DBConnectionBugs();
		$dbh 	= $dbc->connect();

		$rs 	= mysql_query($query, $dbh);
		
		if(mysql_errno($dbh) > 0) {
			echo "There was an error processing the query.</pre>\n".
			# Mysql disconnects automatically, but I like my disconnects to be explicit.
			$dbc->disconnect();
			$dbh = null;
			$dbc = null;
			exit;
		}
			
		while($myrow = mysql_fetch_assoc($rs)) {
			echo "<hr noshade size=1/>";
			foreach ($myrow as $k => $v) { 
				echo "$k => $v\n";
			}
		}
		
		echo "</pre>";
		$dbc->disconnect();
		$rs  = null;
		$dbh = null;
		$dbc = null;
	}

	echo '
</td></tr></form></table>
</body>
</html>
';

?>
