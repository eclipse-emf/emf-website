<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<?php include_once $pre."includes/php42fix.php"; 
		include_once $pre."includes/scripts.php"; 
		$WWWpreEMF = "http://www.eclipse.org/emf/";
		$WWWpreXSD = "http://www.eclipse.org/xsd/";

		$isEMFserver = $EMFserver!="false"&&false!==strpos($SERVER_NAME,"emf");	//$isEMFserver = 0; //testing

		if ($isEMFserver) {
			$CVSpre			= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreEMF		= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreXSD		= "http://emf.torolab.ibm.com/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
			$CVSpreDocEMF	= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
			$CVSpreDocSDO	= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
			$CVSpreDocXSD	= "http://emf.torolab.ibm.com/viewcvs/indextech.cgi/%7Echeckout%7E/org.eclipse.xsd/doc/org.eclipse.xsd.doc/";
		} else { 
			$CVSpre			= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreEMF		= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreXSD		= "http://dev.eclipse.org/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
			$CVSpreDocEMF	= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
			$CVSpreDocSDO	= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
			$CVSpreDocXSD	= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.xsd/doc/org.eclipse.xsd.doc/";
		} ?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="GENERATOR" content="Mozilla/4.72 [en] (Windows NT 5.0; U) [Netscape]">
   <title><?php if (!$HTMLTitle) { echo "Eclipse Tools - EMF Project - $scn"; } else { echo $HTMLTitle; } ?></title>
   <link REL="SHORTCUT ICON" HREF="http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico">
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css">
<!-- $Id: header.php,v 1.3 2005/05/06 19:27:33 nickb Exp $ -->
<!-- PHP version: <?php echo phpversion(); ?> -->
</head>
<body>
<?php if (!$noHeader) { ?>
<!-- wrapper for left nav -->
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top"><td colspan="1" align="left" width="100%">
    <table border="0" cellspacing="0" cellpadding="0" WIDTH="100%" BGCOLOR="#006699" >

     <tr>
          <td BGCOLOR="#000000" width="116" ><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
          <td WIDTH="637"><img SRC="http://www.eclipse.org/images/gradient.jpg" border="0" height="50" width="282"/></td>
          <td WIDTH="250"><img src="http://www.eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
     </tr>
    </table>
   </td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" border="0">
	<tr valign=top>
		<td align=left width=115 bgcolor="#6699CC"><?php include_once $pre."includes/nav.xml"; ?></td>
		<td><img src="http://www.eclipse.org/emf/images/c.gif" border="0" width="3" height="1"></td><td align="left" width="100%">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop"><?php if (!$ProjectName[0]) { echo "EMF"; } else { echo $ProjectName[0]; } ?></font><br>
        <font class="indexsub"><?php if (!$ProjectName[1]) { echo "Eclipse Modeling Framework"; } else { echo $ProjectName[1]; } ?></font>
      </td>
      <td width="40%">
        <img src="<?php if (!$ProjectName[3]) { echo "http://www.eclipse.org/images/Idea.jpg"; } else { echo (strstr($ProjectName[3],$WWWpreEMF)?$ProjectName[3]:$WWWpreEMF.$ProjectName[3]); } ?>" hspace="50" align="right"/>
      </td>

    </tr>
  </tbody>            
</table>

<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td ALIGN=LEFT VALIGN=TOP BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF"><?php if (!$ProjectName[2]) { echo "Eclipse Modeling Framework"; } else { echo $ProjectName[2]; } ?></font></font></b><a name="top">&#160;</a></td>
</tr>
</table>
<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td ALIGN=right VALIGN=TOP><b><font face="Arial,Helvetica"><small><a href="#quicknav">Quick Nav</a></small></td>
</tr>
</table>
<?php } // end if $noHeader ?>