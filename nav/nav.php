<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<?php 
	include_once "../includes/scripts.php"; 

	$sep_line = '
  <tr> 
    <td BGCOLOR="#CFFFFF"><img SRC="../../projects/images/c.gif" height=1 width=1></td>
  </tr>
'
; ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Eclipse EMF Project navigator</title>
<base target="main">
<link rel="stylesheet" href="../../nav_style.css" type="text/css">
</head>
<body text="#000000" bgcolor="#6699CC" link="#FFFFCC" vlink="#551A8B" alink="#FF0000">

<table BORDER=0 CELLSPACING=0 CELLPADDING=0 COLS=1 WIDTH="100%" BGCOLOR="#90C8FF" height="45" >
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&nbsp;<a href="eclipse_nav.php" target="_self" class="navhead">eclipse nav</a></td>
  </tr>
	<?php echo $sep_line; ?>
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="../../emf/" target="_top" class="navhead">emf/sdo</a> <span class="navhead"> &amp; </span><a href="../../xsd/" target="_top" class="navhead">xsd</a></td>
  </tr>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="downloads.php" class="nav">Downloads</a>: <small class="nav"><a href="downloads.php" class="nav">v2.x</a> | <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/~checkout~/emf-home/downloads/dl.html" class="nav">v1.x</a></small>
		</p>
    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="mirrors.php" class="nav">Mirrors</a></p>
    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="updates/" class="nav">Update Manager</a></p>
    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://bugs.eclipse.org/bugs" class="nav" target="_bz">Bugzilla</a><br/>
<?php
	
	$statuses = array(
		"Open" => "%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED",
		"Closed This Week" => "%26bug_status%3DRESOLVED%26bug_status%3DVERIFIED%26bug_status%3DCLOSED%26changedin%3D7"
	);
	foreach ($statuses as $statusLabel => $statusString) { 
		$bugzLinks = array(
			"EMF/SDO" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=%26product%3DEMF".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id&column_changeddate=on&column_severity=on&column_priority=on&column_platform=on&column_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_summary=on",
			"XSD" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=%26product%3DXSD".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id&column_changeddate=on&column_severity=on&column_priority=on&column_platform=on&column_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_summary=on",
			"All" => "https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=%26product%3DEMF%2CXSD".$statusString."%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id&column_changeddate=on&column_severity=on&column_priority=on&column_platform=on&column_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_summary=on"
		);
		$blcnt=0;
		echo '<small class="nav">&#160; &#160; &#160; '.$statusLabel.":</small><br>&#160; &#160; &#160; \n";
		foreach ($bugzLinks as $label => $url) { 
			if ($blcnt>0) { echo ", "; } $blcnt++;
			echo "".'<small class="nav"><a href="'.$url.'" target="_bugz" class="nav">'.$label.'</a></small>';
		} 
		echo "<br>";
	}
?>

		</p>
    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="docs.php" class="nav" target="_top">Documentation</a><br>
		<small class="nav">&#160; &#160; &#160; Overviews:<br>&#160; &#160; &#160; 
		<a class="nav" href="docs.php?doc=references/overview/EMF.html">EMF</a>, <a class="nav" href="docs.php?doc=references/overview/EMF.Edit.html">EMF.Edit</a>, <a class="nav" href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">SDO</a> </small>
		</p>

    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
<?php 
	$files = loadDirSimple("../news","release-notes(.*)\.html","f");
	rsort($files); reset($files);

	$didBreak=0;
	$stored_ver="";
	foreach ($files as $i => $file) { 
		preg_match("/release-notes(.*)\.html/",$file,$m);
		$vver = $m[1];
		if ($i>0) { $out .= ', '; }
		if ($i%3==2 && preg_match("/^1\.\d+/",$vver)) { $out .= '<br>&#160; &#160; &#160; '."\n"; }
		$out .= '<a class="nav" href="'.$pre.'news-release-notes.php?ver='.$vver.'">'.$vver.'</a>';
		if (!$stored_ver) { $stored_ver=$vver; }
	}
	?>
      <p>&#160; <a href="news-release-notes.php?ver=<?php echo $vver; ?>" class="nav" target="_top">Release Notes</a><br>
		<small class="nav">&#160; &#160; &#160;  <?php echo $out; ?>
		</small>
		</p>

    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="news://news.eclipse.org/eclipse.tools.emf" class="nav" target="_top">Newsgroup</a><br>
		<small class="nav">&#160; &#160; &#160;  <a href="news://news.eclipse.org/eclipse.tools.emf" class="nav">EMF</a> | <a href="news://news.eclipse.org/eclipse.technology.xsd" class="nav">XSD</a>
		</small>
		</p>

    </td>
  </tr>

	<?php echo $sep_line; ?>

  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://www.eclipse.org/uml2" class="nav" target="_top">UML2</a></p>

    </td>
  </tr>

	<?php echo $sep_line; ?>

</table>
</body>
