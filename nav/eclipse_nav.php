<?php 
	$f = file('../../home_nav.html');
	foreach ($f as $l) { echo str_replace("../","../../",$l); }
	$f = file('../../tools/nav.html');
	foreach ($f as $l) { echo str_replace("../","../../",$l); }
?>
<table BORDER=0 CELLSPACING=0 CELLPADDING=0 COLS=1 WIDTH="100%" BGCOLOR="#90C8FF" height="21" >
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&nbsp;<a href="nav.php" target="_self" class="navhead">emf/sdo &amp; xsd nav</a></td>
  </tr>
</table>