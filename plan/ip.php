<?php 

require_once "/home/data/httpd/eclipse-php-classes/system/dbconnection_bugs_ro.class.php";
ini_set("display_errors","1");

$prod_id = $_GET["prod_id"];
$prod_name = $_GET["prod_name"];

if ($prod_name && !$prod_id) {
  $prod_id = getProductIDFromName($prod_name);
}

if (!$prod_id) { 
  doHeader("Choose your project");
  doSelectionForm();
  doFooter();
  exit;
}

if (!$prod_name && $prod_id) {
  $prod_name = getProductNameFromID($prod_id);
}
header("Content-type: text/csv");
echo "Your report for $prod_name ($prod_id) goes here...";
// etc.
doFooter(false);


/*******************************************************************/

function doSelectionForm() {
  $dbc = new DBConnectionBugs();
  $dbh = $dbc->connect();
  $sql_info = "SELECT description,name,id FROM products order by name";
  $rs = mysql_query($sql_info, $dbh);
  if(mysql_errno($dbh) > 0) {
    echo "There was an error processing the query.\n".
    $dbc->disconnect();
    $dbh = null;
    $dbc = null;
  } else {
    echo '
    Choose the project for which to generate a report:<br/>
    <form method="get">
      <select name="prod_id" onchange=\'document.forms[0].submit();\'>'."\n";
    while ($myrow  = mysql_fetch_assoc($rs)) {
     echo '        <option value="'.$myrow["id"].'">'.$myrow["name"].': '.$myrow["description"].'</option>'."\n";
    }
    echo '    </select><br/>
    <input type="submit">
  </form>'."\n";
  }
  $dbc->disconnect();
  $rs  = null;
  $dbh = null;
  $dbc = null;
}

function getProductIDFromName($name) {
  $dbc = new DBConnectionBugs();
  $dbh = $dbc->connect();
  if(mysql_errno($dbh) > 0) {
    echo "There was an error processing the query.\n".
    $dbc->disconnect();
    $dbh = null;
    $dbc = null;
  } else {
    $sql_info = "SELECT id FROM products WHERE name = '".$name."'";
    $rs = mysql_query($sql_info, $dbh);
    if ($rs) { 
      $myrow  = mysql_fetch_assoc($rs);
    }
    if ($myrow && is_array($myrow) && array_key_exists("id",$myrow)) {
      return $myrow["id"];
    } else {
      return 0;
    }
  }
  $dbc->disconnect();
  $rs  = null;
  $dbh = null;
  $dbc = null;
}

function getProductNameFromID($id) {
  $dbc = new DBConnectionBugs();
  $dbh = $dbc->connect();
  if(mysql_errno($dbh) > 0) {
    echo "There was an error processing the query.\n".
    $dbc->disconnect();
    $dbh = null;
    $dbc = null;
  } else {
    $sql_info = "SELECT name FROM products WHERE id = $id";
    $rs = mysql_query($sql_info, $dbh);
    if ($rs) { 
      $myrow  = mysql_fetch_assoc($rs);
    }
    if ($myrow && is_array($myrow) && array_key_exists("name",$myrow)) {
      return $myrow["name"];
    } else {
      return "?";
    }
  }
  $dbc->disconnect();
  $rs  = null;
  $dbh = null;
  $dbc = null;
}

function doHeader($name) {
	echo '
<html>
<head>
  <title>Eclipse Project IP Log - '.$name.'</title>
  <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
  <link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
</head>
<body>'."\n";
}

function doFooter($isHTML=true) {
	echo $isHTML ? "<pre><small><i>\n" : "\n";
	echo "--\n".'$Id: ip.php,v 1.2 2006/04/03 19:27:42 nickb Exp $'."\n";
	echo $isHTML ? "</i></small></pre>\n</body>\n</html>" : "\n";
}

?>