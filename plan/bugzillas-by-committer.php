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
   if (!$query) { //default query
   	 $STARTDATE = "2005-01-01";
   	 $committers = array("Ed Merks", "Elena Litani", "Marcelo Paternostro", "Dave Steinberg","Nick Boldt");
   	 foreach ($committers as $COMMITTER) { 
   	   $NAME = str_replace(" ","_",$COMMITTER);
   	   if ($query) { $query .= ";\n"; }
	   $query .= 'SELECT DISTINCT count(TXT.bug_id) as '.$NAME.' 
FROM 
  bugs as BUG, profiles as PROF, 
  products as PROD, longdescs as TXT
WHERE 
  TXT.who = PROF.userid 
  AND TXT.bug_id = BUG.bug_id 
  AND PROD.id = BUG.product_id 
  AND BUG.bug_status = "RESOLVED" 
  AND (PROD.name = "EMF" OR PROD.name = "XSD")
  AND PROF.realname = "'.$COMMITTER.'"
  AND (
    TXT.thetext like "%to cvs%" OR 
    TXT.thetext like "%in cvs%")
  AND TXT.bug_when >= "'.$STARTDATE.'"';
     }
   }
   
   
   echo '
<html>
<head></head>
<body>
<table><form method=post><tr valign="top"><td align="left">
   <pre style="font-size:12px">Query:<br><i style="font-size:11px">separate multiple queries with semi-colon (";")
  -&gt; <a href="https://dev.eclipse.org/committers/committertools/dbo_bugs_schema.php">database schema</a> (fields, tables, constraints)</i></pre>
   <textarea style="font-size:12px" name=query rows=40 cols=60>'.$query.'</textarea><br/>
   <input type=submit name="Submit" style="font-size:12px">
   <pre style="font-size:12px;color:navy">

#--------#--------#--------#--------
# get bug assignments (cvs commits) for a given committer

SELECT DISTINCT

#// if using count(), no other fields can be specified
  count(TXT.bug_id) as COUNT

#// if not using count(), specify as many as you want
#  TXT.bug_id
#  , TXT.bug_when 
#  , TXT.thetext
#  , PROF.userid
#  , PROF.realname
#  , BUG.bug_status

FROM 
  bugs as BUG, 
  profiles as PROF, 
  products as PROD, 
  longdescs as TXT

WHERE 
  TXT.who = PROF.userid AND
  TXT.bug_id = BUG.bug_id AND 
  PROD.id = BUG.product_id AND 
  (PROD.name = "EMF" OR PROD.name = "XSD")

#// only closed bugs
#  AND BUG.bug_status = "RESOLVED"

#// choose commiter name
#  AND PROF.realname = "Ed Merks"
#  AND PROF.realname = "Elena Litani"
#  AND PROF.realname = "Marcelo Paternostro"
#  AND PROF.realname ="Dave Steinberg"
  AND PROF.realname = "Nick Boldt"

#// check for "The fix is in CVS" / "Committed to CVS" since 2005-01-01
  AND (
    TXT.thetext like "%to cvs%" OR 
    TXT.thetext like "%in cvs%")
  AND TXT.bug_when >= "2005-01-01"

#// ORDER, LIMIT, and DESC don't work with count() functions

#ORDER BY
#// use only one ordering field at a time
#  BUG.bug_id
#  TXT.bug_when
#// sort direction: ASC or DESC
#DESC
#LIMIT 10

</pre>
</td><td>&nbsp;&nbsp;</td>
<td>';
	if (false!==strpos($query,";")) {
		$queries = explode(";",$query);
	} else {
		$queries = array($query);
	}
	foreach ($queries as $i => $query) { 
		if ($query) { 
			echo "<pre>Results".(sizeof($queries)>1?"[".($i+1)."]":"").":</pre>\n";
			echo "<pre style=\"color:blue\">";
			# Connect to database
			$dbc  = new DBConnectionBugs();
			$dbh  = $dbc->connect();

			$rs   = mysql_query($query, $dbh);
			
			if(mysql_errno($dbh) > 0) {
				echo "There was an error processing the query.</pre>\n".
				# Mysql disconnects automatically, but I like my disconnects to be explicit.
				$dbc->disconnect();
				$dbh = null;
				$dbc = null;
			} else {
				while($myrow = mysql_fetch_assoc($rs)) {
					echo "<hr noshade size=1/>";
					foreach ($myrow as $k => $v) { 
						if ($k == "bug_id") { 
							echo "$k => <a style=\"color:purple\" href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=$v\" target=\"_bug\">$v</a>\n";
						} else {
							echo "$k => $v\n";
						}
					}
				}
				echo "</pre>";
				$dbc->disconnect();
				$rs  = null;
				$dbh = null;
				$dbc = null;
			}
		}
	}

	echo '
</td></tr></form></table>
</body>
</html>
';

?>
