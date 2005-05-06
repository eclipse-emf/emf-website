<?php 
	// PHP 4.2 compliance fix - convert $_GET["foo"] into $foo, etc.
	if (phpversion()-0 >= 4.2) { 
		$vars = $_GET;  foreach ($vars as $v => $ars) { if (!$$v) { $$v = $ars; } }
		$vars = $_POST; foreach ($vars as $v => $ars) {	if (!$$v) { $$v = $ars; } }
		if (!$PHP_SELF) {			$PHP_SELF =			$_SERVER["PHP_SELF"]; }
		if (!$QUERY_STRING) {	$QUERY_STRING =	$_SERVER["QUERY_STRING"]; }
		if (!$SERVER_NAME) {		$SERVER_NAME =		$_SERVER["SERVER_NAME"]; }
		if (!$HTTP_HOST) {		$HTTP_HOST =		$_SERVER["HTTP_HOST"]; }
		if (!$SCRIPT_FILENAME) {$SCRIPT_FILENAME =$_SERVER["SCRIPT_FILENAME"]; }
		$HTTP_GET_VARS = $_GET;
		$HTTP_POST_VARS = $_POST;
		$HTTP_COOKIE_VARS = $_COOKIE; // NEW NOV 26 2003
	} else {
		$vars = $HTTP_GET_VARS;  foreach ($vars as $v => $ars) { if (!$$v) { $$v = $ars; } }
		$vars = $HTTP_POST_VARS; foreach ($vars as $v => $ars) {	if (!$$v) { $$v = $ars; } }
		if (!$PHP_SELF) {			$PHP_SELF =			$HTTP_SERVER_VARS["PHP_SELF"]; }
		if (!$QUERY_STRING) {	$QUERY_STRING =	$HTTP_SERVER_VARS["QUERY_STRING"]; }
		if (!$SERVER_NAME) {		$SERVER_NAME =		$HTTP_SERVER_VARS["SERVER_NAME"]; }
		if (!$HTTP_HOST) {		$HTTP_HOST =		$HTTP_SERVER_VARS["HTTP_HOST"]; }
		if (!$SCRIPT_FILENAME) {$SCRIPT_FILENAME =$HTTP_SERVER_VARS["SCRIPT_FILENAME"]; }
	}

$qs = $QUERY_STRING;
$sn = $SERVER_NAME;
$scn = $PHP_SELF;

?>