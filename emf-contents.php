<?php 

function displayEMFIntro() {
	echo '
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
';
}

function displayEMFIntro2() {
	global $isEMFserver;
	echo '
EMF consists of three fundamental pieces: 

<ul>
<li><b>EMF</b> - The core EMF framework includes a <a href="http://download.eclipse.org/tools/emf/javadoc?org/eclipse/emf/ecore/package-summary.html#details">meta
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
href="http://www.eclipse.org/emf/docs.php">overview documents and the tutorial</a>,
followed by <a href="'.
(!$isEMFserver?'http://download.eclipse.org':'').
'/tools/emf/scripts/downloads.php">downloading the driver</a>,
and then sit back and watch your applications write themselves!
Well, not completely, but this wouldn\'t be a sales pitch if there
weren\'t a little bit of exaggeration.
';
}

function displayEMFHome() {
		$HTMLTitle = "Eclipse Tools - EMF - Home";
		include $pre."includes/header.php"; ?>

<table border="0" cellpadding="2" width="100%">
<tr valign=top>
<td>
	<?php displayEMFIntro(); ?>
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
<td>

<?php displayEMFIntro2(); ?> 

<br/><br/>
One thing that isn't an exaggeration: since April 2004, there have been over 200,000 downloads of EMF, SDO, and XSD.
</td>
</tr>
</table>

<?php include $pre."includes/footer.php"; ?>

<!-- $Id: emf-contents.php,v 1.6 2005/06/10 21:54:02 nickb Exp $ -->
</body></html>

<?php } 

if (!$noHeader) { displayEMFHome(); }
?>
