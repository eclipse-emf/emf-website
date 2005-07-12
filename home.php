<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
		$HTMLTitle = "Eclipse Tools - EMF Home";
		$noHeader=true; 
		$newsInSidebar=true; // don't include news in footer
		include $pre."includes/header.php"; ?>

<!-- wrapper for left nav -->
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top"><td colspan="1" align="left" width="100%">
    <table border="0" cellspacing="0" cellpadding="0" WIDTH="100%" BGCOLOR="#006699" >

     <tr>
          <td BGCOLOR="#000000" width="116" ><a name="top"></a><a href="http://eclipse.org" target="_top"><img src="http://eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
          <td WIDTH="637"><img SRC="http://eclipse.org/images/gradient.jpg" border="0" height="50" width="282"/></td>
          <td WIDTH="250"><img src="http://eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
     </tr>
    </table>
   </td>
  </tr>
</table>
<table cellspacing="0" cellpadding="0" border="0">
	<tr valign=top>
		<td align=left width=115 bgcolor="#6699CC"><?php include_once $pre."includes/nav.xml"; ?></td>
		<td><img src="http://eclipse.org/emf/images/c.gif" border="0" width="3" height="1"></td><td align="left" width="100%">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop"><?php if (!$ProjectName[0]) { echo "EMF"; } else { echo $ProjectName[0]; } ?></font><br>
        <font class="indexsub"><?php if (!$ProjectName[1]) { echo "Eclipse Modeling Framework"; } else { echo $ProjectName[1]; } ?></font>
      </td>
      <td width="40%">
        <img src="<?php if (!$ProjectName[3]) { echo "http://eclipse.org/emf/images/c.gif"; } else { echo (strstr($ProjectName[3],$WWWpreEMF)?$ProjectName[3]:$WWWpreEMF.$ProjectName[3]); } ?>" align="right"/>
      </td>

    </tr>
  </tbody>            
</table>

<table BORDER=0 CELLPADDING=2 WIDTH="100%" >
<tr>
<td ALIGN=right VALIGN=TOP><b><font face="Arial,Helvetica"><small><a href="#quicknav">Quick Nav</a></small></td>
</tr>
</table>


<!-- main content starts here -->
<table border=0 cellpadding=2 width="100%" >
<tr valign="top">

<?php if ($page=="" || $page=="emf") { ?>

	<td width="100%"> <!-- EMF --> 
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td nowrap class="head_section"><b>Eclipse Modeling Framework (EMF)</b><a name="top">&#160;</a></td>
		</tr>
		<tr>
			<td class="box-9pt" width="100%">
				<?php include_once "emf-contents.php"; displayEMFIntro(); 
						if ($page == "" || $page == "emf") { 
							echo "<br/><br/><b>What is EMF?</b><br/><br/>\n\n"; displayEMFIntro2(); 
						} else { 
							doMoreLink("home.php?page=emf"); 
						} ?>
			</td>
		</tr>
	</table>
	</td> 

<?php } ?>
<?php if ($page=="sdo") { ?>

	<td width="100%"> <!-- SDO --> 
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td nowrap class="head_section"><b>Service Data Objects (SDO)</b><a name="top">&#160;</a></td>
		</tr>
		<tr>
			<td class="box-9pt" width="100%">
				<?php include_once "sdo-contents.php"; displaySDOIntro(); 
						if ($page == "sdo") { 
							echo "<br/><br/><b>What is SDO?</b><br/><br/>\n\n"; displaySDOIntro2(); 
						} else {
							doMoreLink("home.php?page=sdo"); 
						} ?>
			</td>
		</tr>
	</table>
	</td> 

<?php } ?>
<?php if ($page=="xsd") { ?>

	<td width="100%"> <!-- XSD --> 
	<table cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td nowrap class="head_section"><b>XML Schema Infoset Model (XSD)</b><a name="top">&#160;</a></td>
		</tr>
		<tr>
			<td class="box-9pt" width="100%">
				<?php include_once "xsd-contents.php"; displayXSDIntro(); 
						if ($page == "xsd") { 
							echo "<br/><br/><b>What is XSD?</b><br/><br/>\n\n"; displayXSDIntro2();
							echo "<br/><br/>\n\n"; displayXSDModelImage(); 
						} else {
							doMoreLink("home.php?page=xsd"); 
						} ?>
			</td>
		</tr>
	</table>
	</td> 

<?php } ?>

	<td rowspan="2" width="20%" valign="top">

	<table width="212" cellpadding="2" cellspacing="2" border="0">
		<tr>

			<td colspan="3" class="head_section">
				<b>News</b>
			</td>
		</tr>
		<tr>
			<td class="box">	
				<br />
					<table>
					<?php getNews(3,"whatsnew","vert"); ?>
					</table>
				<br/>

	- <a href="http://eclipse.org/emf/docs.php?doc=docs/whatsnew/emf2.1.html">What's New in EMF 2.1?</a> Overview <br><br>

	- <a href="http://eclipse.org/emf/docs.php?doc=docs/dev-plans/EMF_2.1_Release_Review.pdf">EMF 2.1 Release Review Presentation</a> <br><br>

	- <a href="http://eclipse.org/emf/news/release-notes.xml">EMF Release Notes</a><br><br>

	- <a href="<?php echo $pre; ?>news-whatsnew.php">What's New</a> [<a href="<?php echo $pre; ?>news-whatsnew.php">more</a>]</a><br><br>



			</td>
		</tr>
	</table>

	<br />

	<table width="212" cellpadding="2" cellspacing="2" border="0">
		<tr>

			<td colspan="3" class="head_section">
				<b>Eclipse Modeling Corner</b>
			</td>
		</tr>
		<tr>
			<td class="box">	<br/>
Wanted to <a href="http://eclipse.org/emf/models/models.xml">contribute</a> models, projects, files, ideas, utilities, or code to <a href="http://eclipse.org/emf/emf.php">EMF</a>, <a href="http://eclipse.org/emf/sdo.php">SDO</a>, or <a href="http://eclipse.org/emf/xsd.php">XSD</a>? Now you can!<br/><br/>
			Have a look, post your comments, <a href="http://eclipse.org/emf/models/models.xml">submit</a> your code, or just read what others have written. <a href="mailto:codeslave(at)ca(dot)ibm(dot)com?Subject=EMF Corner Comments">Feedback here</a>.<br><br>
		</td>
		</tr></table>

	<br/>

<!--	<table width="212" cellpadding="2" cellspacing="2" border="0">
		<tr>

			<td colspan="3" class="head_section">
				<b>Subprojects</b>
			</td>
		</tr>
		<tr>
			<td class="box">	
				<br />
				- <a href="/emf/emf.php">Eclipse Modeling Framework (EMF)</a><br /><br />

				- <a href="/emf/sdo.php">Service Data Objects (SDO)</a><br /><br />

				- <a href="/emf/xsd.php">XML Schema Infoset Model (XSD)</a><br /><br />
				
			</td>
		</tr>
	</table>

	<br /> -->

	<table width="212" cellpadding="2" cellspacing="2" border="0">
		<tr>
			<td colspan="3" class="head_section">
				<b>Related links</b>

			</td>
		</tr>
		<tr>
			<td class="box">	
				<br />
					- <a href="http://eclipse.org/uml2">UML2</a><br /><br />
					- <a href="docs.php?doc=docs/UsingUpdateManager/UsingUpdateManager.html">Using Update Manager</a><br /><br />
					- <a href="http://eclipse.org/eclipse/development/eclipse_project_plan_3_1.html">Eclipse 3.1 Project Plan</a><br/><br/>
					- <a href="../newsgroups">Eclipse newsgroups</a><br /><br />

				</ul>
			</td>
		</tr>
	</table>

	</td>

</tr>

<tr><td colspan="1">
<?php include $pre."includes/nav.php"; ?>

</td></tr>

</table>

<p>
	<a href="<?php if ($isWWWserver) { ?>/emf<?php } else { ?>/tools/emf/scripts<?php } ?>/emf.php">EMF Home</a> |
	<a href="<?php if ($isWWWserver) { ?>/emf<?php } else { ?>/tools/emf/scripts<?php } ?>/sdo.php">SDO Home</a> | 
	<a href="<?php if ($isWWWserver) { ?>/emf<?php } else { ?>/tools/emf/scripts<?php } ?>/xsd.php">XSD Home</a> | 
	<a href="#top">Top of Page</a>
</p>

<!-- $Id: home.php,v 1.17 2005/07/12 22:22:56 nickb Exp $ -->
</body></html>

<?php function doMoreLink($url) { 
	echo '<a href="'.$url.'">More...</a>';
} ?>
