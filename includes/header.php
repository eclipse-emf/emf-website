<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<?php include_once $pre."includes/php42fix.php"; 
		include_once $pre."includes/scripts.php"; 
		if (strstr($SERVER_NAME,"emf.torolab.ibm.com")) {
			$CVSpre			= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreEMF		= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreXSD		= "http://emf.torolab.ibm.com/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
			$CVSpreDocEMF	= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
			$CVSpreDocSDO	= "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
		} else { 
			$CVSpre			= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreEMF		= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/emf-home/"; 
			$CVSpreXSD		= "http://dev.eclipse.org/viewcvs/indextech.cgi/%7Echeckout%7E/xsd-home/"; 
			$CVSpreDocEMF	= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/"; 
			$CVSpreDocSDO	= "http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf.ecore.sdo/doc/org.eclipse.emf.ecore.sdo.doc/";
		} ?>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="GENERATOR" content="Mozilla/4.72 [en] (Windows NT 5.0; U) [Netscape]">
   <title><?php if (!$HTMLTitle) { echo "Eclipse Tools - EMF Project - $scn"; } else { echo $HTMLTitle; } ?></title>
   <link REL="SHORTCUT ICON" HREF="<?php echo $CVSpreEMF; ?>images/eclipse-icons/eclipse32.ico">
   <link rel="stylesheet" href="http://dev.eclipse.org/default_style.css"
 type="text/css">
   <style type="text/css">
body{font-family:Verdana,Arial,Helvetica;font-size:8pt}
.normal{font-family:Verdana;font-size:8pt}
p{font-family:Verdana;font-size:8pt}
a.category{text-decoration:none;font-size:8pt;font-family:Verdana,Arial,Helvetica;font-weight:bold}
a:hover.category {text-decoration:underline}
.whatsnew {border-left:solid #8ABDBF 1px; border-right:solid #8ABDBF 1px;border-bottom:solid #8ABDBF 1px;}
a.subcategory{text-decoration:none;font-size:8pt;font-family:Verdana,Arial,Helvetica}
a:hover.subcategory {text-decoration:underline}

tt.code            { color: #4444CC; }
pre.code           { color: #4444CC; }
.highlight         {  background-color: #FFFFCC; }

   </style>
<!-- $Id: header.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
<!-- PHP version: <?php echo phpversion(); ?> -->
</head>
<body>
<?php if (!$noHeader) { ?>
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop"><?php if (!$ProjectName[0]) { echo "EMF"; } else { echo $ProjectName[0]; } ?></font><br>
        <font class="indexsub"><?php if (!$ProjectName[1]) { echo "Eclipse Modeling Framework"; } else { echo $ProjectName[1]; } ?></font>
      </td>
      <td width="40%">
        <img src="<?php if (!$ProjectName[3]) { echo "http://dev.eclipse.org/images/Idea.jpg"; } else { echo (strstr($ProjectName[3],$CVSpre)?$ProjectName[3]:$CVSpre.$ProjectName[3]); } ?>" hspace="50" align="middle"/>
      </td>

    </tr>
  </tbody>            
</table>

<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td ALIGN=LEFT VALIGN=TOP BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF"><?php if (!$ProjectName[2]) { echo "Eclipse Modeling Framework"; } else { echo $ProjectName[2]; } ?></font></font></b><a name="top">&nbsp;</a></td>
</tr>
</table>
<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td ALIGN=right VALIGN=TOP><b><font face="Arial,Helvetica"><small><a href="#quicknav">Quick Nav</a></small></td>
</tr>
</table>
<?php } // end if $noHeader ?>