<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php 
		$pre = "";
		$HTMLTitle = "Eclipse Tools - EMF, XSD, SDO - Home";
		include $pre."includes/header.php"; ?>


<table border="0" cellpadding="2" width="100%">
<tr valign=top>
<td>
EMF is a modeling framework and code generation facility for building
tools and other applications based on a structured data model. From a model
specification described in XMI, EMF provides tools and runtime support
to produce a set of Java classes for the model, a
set of adapter classes that enable viewing and command-based editing of
the model, and a basic editor. Models can be specified using
annotated Java, XML documents, or modeling tools like Rational Rose, then
imported into EMF. Most important of all, EMF provides the foundation for
interoperability with other EMF-based tools and applications.
<br><br>EMF includes an EMF-based implementation of Service Data Objects (SDO). SDO is a framework that simplifies and unifies data application development in a service oriented architecture (SOA). It supports and integrates XML and incorporates J2EE patterns and best practices.
</td>
<td>&#160;</td>
<td><a href="../../../tools/emf/scripts/models.php"><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/emf_corner.gif" width="52" height="52" border="0" alt=""></a></td>
<td width="50%">
<?php		if (strtotime("Sept 30, 2004")>strtotime("-3 weeks")) { 
				echo '<b>Sept&#160;30<sup>th</sup></b> &#160;-&#160; <img src="http://www.eclipse.org/images/new.gif" width="31" height="14">';
			} ?> The <a href="../../../tools/emf/scripts/models.php">EMF Corner site</a> is now live! For everyone who's wanted to contribute models, projects, files, ideas, utilities, code, or discussion but haven't had a way to do so, now you can. You can contribute anything related to EMF, SDO, or XSD.<br/><br/>
			Have a look, post your comments, submit your models, or just read what others have written. Enjoy! <img src="<?php echo $CVSpreEMF; ?>images/smileys/NBcool.gif" width="18" height="18" border="0" alt="">
		<br><br>
		To provide comments about this prototype community project, please email <a href="mailto:codeslave@ca.ibm.com?Subject=EMF Corner Comments">codeslave@ca.ibm.com</a>.

<br><br>

		<!-- right column tables start -->
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
	       <tr>
            <td rowspan="2" height="15" bgcolor="#8ABDBF"><span style="color: #ffffff; font-weight:bold; font-size: 11px; font-family: Verdana,Arial,Helvetica;">&#160;&#160;&#160;What's New</span></td>
            <td width="60%">&#160;</td>
          </tr>
          <tr>
            <td height="3" bgcolor="#8ABDBF"><img src="<?php echo $CVSpre; ?>images/c.gif" width=1 height=10></td>
          </tr>
      </table>
      <table cellspacing="0" cellpadding="0" width="100%" border="0">
          <tr>
				<td bgcolor="#8ABDBF"><img src="<?php echo $CVSpre; ?>images/c.gif" width=2 height=1></td>
				<td bgcolor="white"><img src="<?php echo $CVSpre; ?>images/c.gif" width=5 height=1></td>
            <td width="100%">

<?php getNews(3,"whatsnew"); ?>

      <table cellspacing="0" cellpadding="0" width="100%" border="0">
          <tr><td><p class="normal">
<a href="<?php echo $pre; ?>news-whatsnew.php">What's New</a> [<a href="<?php echo $pre; ?>news-whatsnew.php">more</a>]</a><br><br>

<a href="<?php echo $pre; ?>news-release-notes.php?ver=2.1.0">EMF 2.1.0 Release Notes</a><br><br>
</td></tr></table>

            </td>
				<td bgcolor="white"><img src="<?php echo $CVSpre; ?>images/c.gif" width=5 height=1></td>
				<td bgcolor="#8ABDBF"><img src="<?php echo $CVSpre; ?>images/c.gif" width=2 height=1></td>
          </tr>
          <tr>
				<td bgcolor="#8ABDBF" colspan=5><img src="<?php echo $CVSpre; ?>images/c.gif" width=1 height=2></td>
			</tr>
      </table>
		<!-- end right column tables -->

</td>
</tr>
</table>

<table border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b><font face=
"Arial,Helvetica" color="#FFFFFF"><a name="emf_components">What is
EMF?</a></font></b> </td>
</tr>

<tr>
<td>EMF consists of three fundamental pieces: 

<ul>
<li><b>EMF</b> - The core EMF framework includes a <a href="<?php echo $pre; ?>../javadoc/org/eclipse/emf/ecore/package-summary.html#details">meta
model (Ecore)</a> for describing models and runtime support for the
models including change notification, persistence support with
default XMI serialization, and a very efficient reflective API for
manipulating EMF objects generically.</li>

<li><b>EMF.Edit -</b> The EMF.Edit framework includes generic
reusable classes for building editors for EMF models. It
provides</li>

<li style="list-style: none">
<ol>
<li>Content and label provider classes, property source support,
and other convenience classes that allow EMF models to be displayed
using standard desktop (JFace) viewers and property sheets.</li>

<li>A command framework, including a set of generic command
implementation classes for building editors that support fully
automatic undo and redo.</li>
</ol>
</li>

<li><b>EMF.Codegen</b> - The EMF code generation facility is
capable of generating everything needed to build a complete editor
for an EMF model. It includes a GUI from which generation options
can be specified, and generators can be invoked. The generation
facility leverages the JDT (Java Development Tooling) component of
Eclipse.</li>
</ul>

Three levels of code generation are supported: 

<ol>
<li><b>Model</b> - provides Java interfaces and implementation
classes for all the classes in the model, plus a factory and
package (meta data) implementation class.</li>

<li><b>Adapters</b> - generates implementation classes (called
ItemProviders) that adapt the model classes for editing and
display.</li>

<li><b>Editor</b> - produces a properly structured editor that
conforms to the recommended style for Eclipse EMF model editors and
serves as a starting point from which to start customizing.</li>
</ol>

All generators support regeneration of code while preserving user
modifications. The generators can be invoked either through the GUI
or&#160; headless from a command line. 

<br/><br/>
Want to learn more about how easy it is to use this exciting new
technology to help you boost your Java programming productivity,
application compatibility and integration? Start by reading the <a
href="<?php echo $pre; ?>docs.php">overview documents and the tutorial</a>,
followed by <a href="<?php echo $pre; ?>downloads.php">downloading the driver</a>,
and then sit back and watch your applications write themselves!
Well, not completely, but this wouldn't be a sales pitch if there
weren't a little bit of exaggeration.

<br/><br/>
One thing that isn't an exaggeration: since April 2004, there have been over 200,000 downloads of EMF, SDO, and XSD.
</td>
</tr>
</table>

<p>
	<a href="../../../tools/emf/scripts/home.php">EMF Home</a> |
	<a href="../../../technology/xsd/scripts/home.php">XSD Home</a> | 
	<a href="#top">Top of Page</a>
</p>

<!-- $Id: home.php,v 1.3 2004/12/07 22:40:39 nickb Exp $ -->
</body></html>


