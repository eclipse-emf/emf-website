<?php
$connect = mysql_connect("emft.eclipse.org", "modelingwww", "mjNDPzJ88v6xZRa4");
mysql_select_db($db ? $db : "modeling", $connect) or die(mysql_error());

function wmysql_query($sql)
{
	#print $sql . "\n";
	$res = mysql_query($sql) or die("$sql\n" . mysql_error());
	return $res;
}
?>
