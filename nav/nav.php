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
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="eclipse_nav.php" target="_self" class="navhead">eclipse nav</a></td>
  </tr>
	<?php echo $sep_line; ?>
<?php function common_links() { global $sep_line; ?>
  <!-- common links - both projects -->
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="../../emf/" target="_top" class="navhead">emf/sdo</a> <a href="../../xsd/" target="_top" class="navhead">&amp; xsd</a></td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/downloads.php" class="nav">Downloads</a>: <small class="nav"><a href="http://download.eclipse.org/tools/emf/scripts/downloads.php" class="nav">v2.x</a>, <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/~checkout~/emf-home/downloads/dl.html" class="nav">v1.x</a></small>
		</p>
    </td>
  </tr>
<!--	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/mirrors.php" class="nav">Mirrors</a></p>
    </td>
  </tr> -->
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/updates/" class="nav">Update Manager</a></p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/models.php" class="nav">EMF Corner</a><br>
		<small class="nav">&#160; &#160; &#160;  <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/models-submit.php">Contribute!</a>
		
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf" class="nav">What's New, CVS?</a><br>
		<small class="nav">&#160; &#160; &#160;  <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=emf/">EMF</a>, <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=sdo">SDO</a>, <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/news-whatsnew-cvs.php?source=xsd">XSD</a>
		
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf/" class="nav">CVS Repository</a><br>
		<small class="nav">&#160; &#160; &#160;  <a class="nav" href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf/">EMF</a>, <a class="nav" href="http://dev.eclipse.org/viewcvs/indextools.cgi/org.eclipse.emf.ecore.sdo/">SDO</a>, <a class="nav" href="http://dev.eclipse.org/viewcvs/indextech.cgi/org.eclipse.xsd">XSD</a>
		
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://bugs.eclipse.org/bugs" class="nav">Bugzilla</a><br/>
		<small class="nav"> 
			&#160; &#160; &#160; <a href="https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=%26product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id&column_changeddate=on&column_severity=on&column_priority=on&column_platform=on&column_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_summary=on" class="nav">Open</a> <br>
			&#160; &#160; &#160; <a href="https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=%26product%3DEMF%2CXSD%26bug_status%3DRESOLVED%26bug_status%3DVERIFIED%26bug_status%3DCLOSED%26changedin%3D7%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id&column_changeddate=on&column_severity=on&column_priority=on&column_platform=on&column_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_summary=on" class="nav">Closed This Week</a>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/faq.php" class="nav">FAQs</a><br>
		<small class="nav"> 
		
		&#160; &#160; &#160;  <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/faq.php?FAQ=EMF">EMF</a>, <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/faq.php?FAQ=SDO">SDO</a>, <a class="nav" href="http://download.eclipse.org/technology/xsd/scripts/faq.php">XSD</a> <br>
		&#160; &#160; &#160;  <a href="../../eclipse/faq/eclipse-faq.html" class="nav">Eclipse FAQ</a>
		
		</small>
		</p>
    </td>
  </tr>
		
	<?php echo $sep_line; ?>
<?php } ?>
<?php function emfsdo_links() { global $sep_line; ?>
  <!-- emf/sdo project links -->
  
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="../../emf/" target="_top" class="navhead">emf/sdo</a></td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/tools/emf/scripts/docs.php" class="nav">Documentation</a><br>
		<small class="nav">
		&#160; &#160; &#160; Overviews:<br>&#160; &#160; &#160;  
		<a class="nav" href="http://download.eclipse.org/tools/emf/scripts/docs.php?doc=references/overview/EMF.html">EMF</a>, <a class="nav" href="http://download.eclipse.org/tools/emf/scripts/docs.php?doc=references/overview/EMF.Edit.html">EMF.Edit</a>, <a class="nav" href="http://www-106.ibm.com/developerworks/java/library/j-sdo/">SDO</a> <br>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
<?php 
	$files = "";
	$files = loadDirSimple("../news","release-notes(.*)\.html","f");
	rsort($files,SORT_STRING); reset($files);
	$didBreak=0;
	$stored_ver="";
	$out="";
	foreach ($files as $i => $file) { 
		preg_match("/release-notes(.*)\.html/",$file,$m);
		$vver = $m[1];
		if ($i>0) { 
			$out .= ', '; 
			//if ($i%3==0) { $out .= '<br>&#160; &#160; &#160; '."\n"; }
		}
		$out .= '<a class="nav" href="../news-release-notes.php?ver='.$vver.'">'.$vver.'</a>';
		if ($i==0) { $stored_ver = $vver; } 
		if ($i==2) { break; } // only the first three
	}
	?>
      <p>&#160; <a href="../news-release-notes.php?ver=<?php echo $stored_ver; ?>" class="nav">Release Notes</a><br>
		<small class="nav">&#160; &#160; &#160;  <?php echo $out; ?> <a class="nav" href="../news-release-notes.php?ver=<?php echo $stored_ver; ?>#relnotes1">...</a>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="news://news.eclipse.org/eclipse.tools.emf" class="nav">Newsgroup</a><br>
		<small class="nav">&#160; &#160; &#160;  
		
		<a href="http://www.eclipse.org/search/search.cgi" class="nav">Search</a>, <a
 href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.tools.emf" class="nav">Web</a>, <a href="http://eclipse.org/newsgroups/index.html" class="nav">Pwds</a>,<br>
&#160; &#160; &#160;  <a href="../mailing-list.php" class="nav">Mailing List</a>, <a href="http://dev.eclipse.org/mhonarc/lists/emf-dev/maillist.html" class="nav">Archives</a>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="../news-whatsnew.php" class="nav">Site News</a></p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
<?php } ?>
<?php function xsd_links() { global $sep_line; ?>
  <!-- xsd project links -->
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="../../xsd/" target="_top" class="navhead">xsd</a></td>
  </tr>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="http://download.eclipse.org/technology/xsd/scripts/docs.php" class="nav">Documentation</a><br>
		<small class="nav">
		&#160; &#160; &#160;  
		<a class="nav" href="http://dev.eclipse.org/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/docs/XSD.mdl">UML model</a><br>
		&#160; &#160; &#160;  
		<a class="nav" href="http://download.eclipse.org/technology/xsd/javadoc/org/eclipse/xsd/package-summary.html#details">UML Diagrams</a>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
<?php 
	$files = "";
	$files = loadDirSimple("../../xsd/news","release-notes(.*)\.html","f");
	rsort($files,SORT_STRING); reset($files);
	$didBreak=0;
	$stored_ver="";
	$out="";
	foreach ($files as $i => $file) { 
		preg_match("/release-notes(.*)\.html/",$file,$m);
		$vver = $m[1];
		if ($i>0) { 
			$out .= ', '; 
			//if ($i%3==0) { $out .= '<br>&#160; &#160; &#160; '."\n"; }
		}
		$out .= '<a class="nav" href="../../xsd/news-release-notes.php?ver='.$vver.'">'.$vver.'</a>';
		if ($i==0) { $stored_ver = $vver; } 
		if ($i==2) { break; } // only the first three
	}
	?>
      <p>&#160; <a href="../../xsd/news-release-notes.php?ver=<?php echo $stored_ver; ?>" class="nav">Release Notes</a><br>
		<small class="nav">&#160; &#160; &#160;  <?php echo $out; ?> <a class="nav" href="../news-release-notes.php?ver=<?php echo $stored_ver; ?>#relnotes1">...</a>
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="news://news.eclipse.org/eclipse.technology.xsd" class="nav">Newsgroup</a><br>
		<small class="nav">&#160; &#160; &#160;  
		
		<a href="http://www.eclipse.org/search/search.cgi"
 class="nav">Search</a>, <a
 href="http://www.eclipse.org/newsportal/thread.php?group=eclipse.technology.xsd"
 class="nav">Web</a>, <a href="http://eclipse.org/newsgroups/index.html" class="nav">Pwds</a>,<br>
&#160; &#160; &#160;  <a href="../mailing-list.php" class="nav">Mailing List</a>, <a href="http://dev.eclipse.org/mhonarc/lists/xsd-dev/maillist.html" class="nav">Archives</a>
		
		</small>
		</p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
  <tr valign=CENTER> 
    <td valign=CENTER height="21"> 
      <p>&#160; <a href="../news-whatsnew.php" class="nav">Site News</a></p>
    </td>
  </tr>
	<?php echo $sep_line; ?>
<?php } ?>
<?php function other_links() { global $sep_line; ?>
  <!-- other project links -->
  <tr> 
    <td VALIGN=CENTER HEIGHT="21" BGCOLOR="#0080C0">&#160;<a href="../../uml2/" target="_top" class="navhead">uml2</a></td>
  </tr>
	<?php echo $sep_line; ?>
<?php } ?>
<?php 
	// echo content here
	common_links();
	if ($site=="xsd") {
		xsd_links();
		emfsdo_links();
	} else {
		emfsdo_links();
		xsd_links();
	}
	other_links();
	?>
</table>
</body>
