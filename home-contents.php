<?php 

$content["emf"] = <<<EOF
<div class="homeitem3col">
<h3>Eclipse Modeling Framework (EMF)</h3>
<p>EMF is a modeling framework and code generation facility for building
tools and other applications based on a structured data model. From a model
specification described in XMI, EMF provides tools and runtime support
to produce a set of Java classes for the model, a
set of adapter classes that enable viewing and command-based editing of
the model, and a basic editor. Models can be specified using
annotated Java, XML documents, or modeling tools like Rational Rose, then
imported into EMF. Most important of all, EMF provides the foundation for
interoperability with other EMF-based tools and applications. For more detailed 
information see the <a href="http://www.eclipse.org/emf/docs.php#overviews">EMF Overviews</a> and <a href="http://www.eclipse.org/emf/docs.php#plandocs">Project Plan</a>.</p>

<p>EMF includes the <a href="http://www.eclipse.org/emf/xsd.php">XML Schema Infoset Model (XSD) project</a> and an <a href="http://www.eclipse.org/emf/sdo.php">EMF-based implementation of Service Data Objects (SDO)</a>.</p>
</div>

<div class="homeitem3col">
<h3><b>XML Schema Infoset Model (XSD)</b></h3>

<p>XSD is a library that provides an 
<a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a>
for manipulating the components of an XML
Schema as described by 
the <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>
specifications, as well as an API for
manipulating the DOM-accessible representation of XML Schema as a series
of XML documents, and for keeping these representations in agreement as
schemas are modified. [<a href="http://www.eclipse.org/emf/xsd.php">more</a>]</p>
</div>

<div class="homeitem3col">
<h3><b>Service Data Objects (SDO)</b></h3>

<p>Service Data Objects (SDO) is a framework that simplifies and unifies data application development in a service oriented architecture (SOA). It supports and integrates XML and incorporates J2EE patterns and best practices. [<a href="http://www.eclipse.org/emf/sdo.php">more</a>]</p>
</div>
EOF;

$content["emf2"] = <<<EOF
<div class="homeitem3col">
<h3>What is EMF?</h3>
<p>EMF consists of three fundamental pieces:</p>

<ul>
<li><b>EMF</b> - The core EMF framework includes a <a href="http://download.eclipse.org/tools/emf/javadoc?org/eclipse/emf/ecore/package-summary.html#details">meta
model (Ecore)</a> for describing models and runtime support for the
models including change notification, persistence support with
default XMI serialization, and a very efficient reflective API for
manipulating EMF objects generically.</li>

<li class="outerli"><b>EMF.Edit -</b> The EMF.Edit framework includes generic
reusable classes for building editors for EMF models. It
provides
<ul>
<li>Content and label provider classes, property source support,
and other convenience classes that allow EMF models to be displayed
using standard desktop (JFace) viewers and property sheets.</li>

<li>A command framework, including a set of generic command
implementation classes for building editors that support fully
automatic undo and redo.</li>
</ul>
</li>

<li><b>EMF.Codegen</b> - The EMF code generation facility is
capable of generating everything needed to build a complete editor
for an EMF model. It includes a GUI from which generation options
can be specified, and generators can be invoked. The generation
facility leverages the JDT (Java Development Tooling) component of
Eclipse.</li>
</ul>

<p>Three levels of code generation are supported:</p>

<ul>
<li><b>Model</b> - provides Java interfaces and implementation
classes for all the classes in the model, plus a factory and
package (meta data) implementation class.</li>

<li><b>Adapters</b> - generates implementation classes (called
ItemProviders) that adapt the model classes for editing and
display.</li>

<li><b>Editor</b> - produces a properly structured editor that
conforms to the recommended style for Eclipse EMF model editors and
serves as a starting point from which to start customizing.</li>
</ul>

<p>All generators support regeneration of code while preserving user
modifications. The generators can be invoked either through the GUI
or headless from a command line.</p>

<p>Want to learn more about how easy it is to use this exciting new
technology to help you boost your Java programming productivity,
application compatibility and integration? Start by reading the <a
href="http://www.eclipse.org/emf/docs.php">overview documents and the tutorial</a>,
followed by <a href="http://download.eclipse.org/tools/emf/scripts/downloads.php">downloading the driver</a>,
and then sit back and watch your applications write themselves!
Well, not completely, but this wouldn't be a sales pitch if there
weren't a little bit of exaggeration.</p>
</div>
EOF;

$content["sdo"] = <<<EOF
<div class="homeitem3col"><h3>Service Data Objects (SDO)</h3>
<p>Service Data Objects (SDO) is a framework that simplifies and unifies data application development in a service oriented architecture (SOA). It supports and integrates XML and incorporates J2EE patterns and best practices. EMF includes an EMF-based implementation of Service Data Objects.</p></div>
EOF;

$content["sdo2"] = <<<EOF
<div class="homeitem3col">
<h3>What is SDO?</h3>
<p>Unlike some of the other data integration models, Service Data Objects don't stop at data abstraction. The Service Data Objects framework also incorporates a good number of J2EE patterns and best practices. SDO supports a disconnected programming model. The SDO programming model prescribes patterns of usage that allow clean separation of each of these concerns.</p>
<p>Put simply, Service Data Objects is a framework for data application development, which includes an architecture and API. Service Data Objects simplify the J2EE data programming model and abstract data in a service oriented architecture (SOA). SDO unifies data application development, supports, and integrates XML. Service Data Objects incorporate J2EE patterns and best practices.</p>
<p>Also see:</p>
<ul class="sdo">
<li><a href="http://www.eclipse.org/emf/docs.php#overviews">Overview</a></li>
<li><a href="http://www.eclipse.org/emf/docs.php">Documentation</a></li>
<li><a href="http://download.eclipse.org/tools/emf/sdo/javadoc/">Javadoc</a></li>
<li><a href="http://download.eclipse.org/tools/emf/scripts/downloads.php">Downloads</a></li>
</ul>
</div>
EOF;

$content["xsd"] = <<<EOF
<div class="homeitem3col"><h3>XML Schema Infoset Model (XSD)</h3>
<p>The XML Schema Infoset Model is a reference library that provides an 
<a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a> for use with any code that
examines, creates or modifies <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a> (standalone or as part of
other artifacts, such as XForms or WSDL documents).</p></div>
EOF;

$content["xsd2"] = <<<EOF
<div class="homeitem3col"><h3>What is XSD?</h3>
<p>XSD is a library that provides an 
<a href="http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details">API</a>
for manipulating the components of an XML
Schema as described by 
the <a href="http://www.w3.org/TR/XMLSchema-0">W3C XML Schema</a>
specifications, as well as an API for
manipulating the DOM-accessible representation of XML Schema as a series
of XML documents, and for keeping these representations in agreement as
schemas are modified.</p>
<p>The library will include services to serialize
and deserialize XML Schema documents, and to do integrity checking of
schemas (for example, not using a maximum value for a simpleType which
is invalid considering the base type of that simpleType). The project
goal is to support 100% of the functionality of XML schema
representation, but not necessarily to provide document against schema
assessment or validation services, which are normally provided by a
validating parser,
such as Apache's <a href="http://xml.apache.org/xerces2-j/">Xerces-J</a>.</p></div>

<div class="homeitem3col">
<h3>XML Schema Infoset Model</h3>
<img src="images/xsd/XMLSchemaInfosetModel.gif" alt="XML Schema Infoset Model"/>
<ul></ul> <!-- hack for ie, without this, it inexplicably renders the nav bar as 1 column instead of 2 -->
</div>
EOF;

function displayIntro($proj)
{
	global $content;

	print $content[$proj];
	print $content[$proj . "2"];
}
?>
