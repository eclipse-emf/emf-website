<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF and SDO - What's New";
		$ProjectName = array(
			"What's New",
			'Eclipse Modeling Framework Documents',
			"What's New",
			"images/reference.gif"
			);
		include $pre."includes/header.php"; ?>

<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td>&#160;&#160;&#160; </td>
<td>
<?php getNews(-1,"all"); ?>
</td>
</tr>
</table>
<?php include $pre."includes/footer.php"; ?>

<!-- $Id: news-whatsnew.php,v 1.3 2005/05/06 21:44:37 nickb Exp $ -->