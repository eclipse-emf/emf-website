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

   $bug = $_GET["bug"]; if (!$bug) { $bug="185971"; }
   $query = stripslashes($_POST["query"]);
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
';
   echo <<<EOHTML
SELECT DISTINCT
  BUG.bug_id, PROF.realname, PROF.login_name, TXT.bug_when
FROM 
  bugs as BUG, 
  profiles as PROF, 
  longdescs as TXT 
WHERE 
  TXT.who = PROF.userid AND 
  BUG.bug_id = TXT.bug_id AND 
  PROF.realname NOT IN ('Nick Boldt','Marcelo Paternostro', 
	'Dave Steinberg', 'Ed Merks') AND
  BUG.bug_id IN (147594, 149770, 161744, 165770, 166967, 
  	166112, 170204, 156783, 170223, 136881, 179004, 185971)
ORDER BY
  TXT.bug_when
ASC;
SELECT DISTINCT
  BUG.bug_id, PROF.realname, TXT.bug_when, TXT.thetext
FROM 
  bugs as BUG, 
  profiles as PROF, 
  longdescs as TXT 
WHERE 
  TXT.who = PROF.userid AND 
  BUG.bug_id = TXT.bug_id AND 
  TXT.thetext like '%[contrib%]%' AND
  BUG.bug_id IN (147594, 149770, 161744, 165770, 166967, 
  166112, 170204, 156783, 170223, 136881, 179004, 185971)
ORDER BY
  TXT.bug_when
ASC

</pre>
</td><td>&nbsp;&nbsp;</td>
<td>
EOHTML;

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
				$header=false;
				while($myrow = mysql_fetch_assoc($rs)) {
					if (!$header)
					{
						foreach ($myrow as $k => $v) {
							echo "$k\t";
						}
						$header=true;
						echo "\n";
					}
					foreach ($myrow as $k => $v) {
						if ($k == "bug_id") { 
							echo "<a style=\"color:purple\" href=\"https://bugs.eclipse.org/bugs/show_bug.cgi?id=$v\" target=\"_bug\">$v</a>\t";
						} else if ($k == "thetext") {
							echo "\n".preg_replace("/.+(\[contrib.+\]).+/","\1",str_replace("\n"," ",$v));
						} else {
							echo "$v\t";
						}
					}
					echo "\n";
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
