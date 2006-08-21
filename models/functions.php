<?php
function put($name, $default = "", $nov = false)
{
	$ret = $_POST[$name];
	if (get_magic_quotes_gpc())
	{
		$ret = stripslashes($ret);
	}

	$ret = ($ret != "" ? $ret : $default);
	$ret = htmlentities($ret);
	return ($nov ? $ret : " value=\"$ret\"");
}
?>
