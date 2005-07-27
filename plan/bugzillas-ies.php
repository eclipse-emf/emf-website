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
	echo '
<html>
<head></head>
<body>
';

$queries = array(
"Defects Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07'",

"Defects Fixed or Resolved of Those Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07' AND

    (BUG.bug_status = 'RESOLVED' OR BUG.resolution = 'FIXED')",

"Defects NOT Fixed or Resolved of Those Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07' AND

    (BUG.bug_status != 'RESOLVED' AND BUG.resolution != 'FIXED')",

"Defects Fixed or Resolved Between 2004-07-01 and 2005-07-07 (GA) (including older bugs)" =>
"SELECT DISTINCT 
   count(BUG.bug_id) as CNT
FROM 
  bugs as BUG,
  bugs_activity as ACT,
  products as PROD, 
  fielddefs as FLD
WHERE 
  FLD.fieldid = ACT.fieldid AND
  PROD.id = BUG.product_id AND 
  BUG.bug_id = ACT.bug_id AND 
  ACT.bug_when >= '2004-07-01' AND ACT.bug_when <= '2005-07-07' AND

  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
    ( (FLD.description = 'Resolution' AND ACT.added = 'FIXED') OR
      (FLD.description = 'Status' AND ACT.added = 'RESOLVED') 
    )",

"Critical Defects NOT Fixed or Resolved of Those Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07' AND
    (BUG.bug_status != 'RESOLVED' AND BUG.resolution != 'FIXED') AND

    BUG.bug_severity = 'critical'",

"Blocker Defects NOT Fixed or Resolved of Those Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07' AND
    (BUG.bug_status != 'RESOLVED' AND BUG.resolution != 'FIXED') AND

    BUG.bug_severity = 'blocker'",

"P1 Defects NOT Fixed or Resolved of Those Entered, 2004-07-01 to 2005-07-07 (GA)" =>
"SELECT DISTINCT
  count(BUG.bug_id) AS CNT
FROM 
  bugs as BUG, 
  products as PROD 
WHERE 
  PROD.id = BUG.product_id AND 
  (PROD.name = 'EMF' OR PROD.name = 'XSD') AND
  BUG.creation_ts >= '2004-07-01' AND BUG.creation_ts <= '2005-07-07' AND
    (BUG.bug_status != 'RESOLVED' AND BUG.resolution != 'FIXED') AND

    BUG.priority = 'P1'"

);

echo '
<p><table>
';

$cnt=0;
foreach ($queries as $label => $query) {
	$cnt++;

	echo '
<tr><td colspan="3">
	<pre style="font-size:12px;color:red">'.$cnt.'. </pre><pre style="font-size:12px;color:blue">'.$label.'</pre></td></tr>
	
<tr valign="top">
	<td><pre style="font-size:12px;color:navy">'.$query.'</pre></td>
	<td>&nbsp;&nbsp;</td>
	<td>';
	if ($query) { 
		echo "<pre style=\"color:#008000\">";
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
	</td>
</tr>
<tr><td colspan="3"><hr noshade="noshade" size="1"/></td></tr>
';
}
echo '
</table></p>
</body></html>
';

?>
