<html>
<head>
<title>Eclipse - EMF, SDO, and XSD - Download Click Through</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="http://eclipse.org/default_style.css" type="text/css">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
    if (file_exists($dropFile)) {
        echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.$dropFile.'">';
        echo '<b><font size "+4">Downloading: '.preg_replace("/\.\.\//","",$dropFile).'</font></b>';
        echo '<BR>';
        echo '<BR>';
        echo 'If your download does not begin automatically click <a href="'.$dropFile.'">here</a>.';
    }
?>
<p>
<?php include "includes/scripts.php"; ?>
<?php include "includes/clickthru-tracker.php"; ?>
</p>
<!-- $Id: download.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
</body>
</html>
