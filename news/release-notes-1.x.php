	<html>
	<head>
    <title>EMF, SDO, XSD Release Notes</title>
    <link REL="SHORTCUT ICON" HREF="http://http://www.eclipse.org/emf/images/eclipse-icons/eclipse32.ico"/>
	<script type="text/javascript" src="http://www.eclipse.org/emf/includes/nav.js"></script>
	<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/style.css" type="text/css"/>
	<style>@import url("release-notes.css");</style>
	</head>
	<body>

	<!-- wrapper for left nav -->
	<table cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr valign="top"><td colspan="1" align="left" width="100%"><table border="0" cellspacing="0" cellpadding="0" width="100%" BGCOLOR="#006699" >

		 <tr>
			  <td BGCOLOR="#000000" width="116" height="50"><a name="top"></a><a href="http://www.eclipse.org" target="_top"><img src="http://www.eclipse.org/images/EclipseBannerPic.jpg" width="115" height="50" border="0"/></a></td>
			  <td width="637" height="50" style="background-repeat: repeat-y;" background="http://www.eclipse.org/images/gradient.jpg"></td>
			  <td width="250" height="50"><img src="http://www.eclipse.org/images/eproject-simple.GIF" width="250" height="48"/></td>
		 </tr>

		</table></td>
	  </tr>
	</table>
	
<table cellspacing="0" cellpadding="0" border="0" width="100%">
	<tr valign="top">
		<td align="left" width="115" bgcolor="#6699CC">

			<?php include_once '../includes/nav.xml'; ?>

		</td>

		<td><img src="http://www.eclipse.org/images/c.gif" height="1" width="3"/></td><td align="left" width="100%">
&#160;
<table border="0" cellpadding="2" width="100%">
  <tbody>

    <tr>
      <td align="left" width="60%">
        <font class="indextop">
		Release Notes
		</font><br/>
        <font class="indexsub">Eclipse Modeling Framework</font>

      </td>
      <td width="40%">
        <img src="http://www.eclipse.org/emf/images/c.gif" align="right"/>
      </td>

    </tr>
  </tbody>            
</table>

<table border="0" cellpadding="2" width="100%" >
<tr>

<td align="LEFT" valign="TOP" BGCOLOR="#0070A0"><b><font face="Arial,Helvetica"><font color="#FFFFFF">
	Release Notes
</font></font></b><a name="top">&#160;</a></td>
</tr>
</table>
<table border="0" cellpadding="2" width="100%" >
<tr>
<td align="left" valign="TOP"><b>
&#160; &#160; <a href="release-notes.php?version=2.1">EMF 2.1.x</a> :: <a href="release-notes.php?version=2.0">EMF 2.0.x</a> :: <a href="#emf_111">EMF 1.1.1</a> :: <a href="#emf_110">EMF 1.1.0</a> :: <a href="#emf_102">EMF 1.0.2</a> :: <a href="#emf_101">EMF 1.0.1</a> <br>
&#160; &#160; <a href="release-notes.php?version=2.1&project=xsd">XSD 2.1.x</a> :: <a href="release-notes.php?version=2.0&project=xsd">XSD 2.0.x</a> :: <a href="#xsd_111">XSD 1.1.1</a> :: <a href="#xsd_110">XSD 1.1.0</a> :: <a href="#xsd_102">XSD 1.0.2</a> :: <a href="#xsd_101">XSD 1.0.1</a>
</b></td>
<td align="right" valign="TOP"><b><small><a href="#quicknav">Quick Nav</a></small></b></td>
</tr>
</table>

<table summary="" border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b style="color:white"><a id="emf_111"
name="emf_111">What's new in EMF 1.1.1?</a></b></td>
</tr>

<tr>
<td>
<ol>
<li><b><a id="emf_111a" name="emf_111a">Build 20030819_0612SL: Bug
Fixes and Improvements</a></b> 

<p>There are numerous bug fixes and improvements included with this
build, some of which are described below. Where the description
applies to a fix for a bug reported through Bugzilla, the Bugzilla
number is included after the description.<br />
&#160;</p>

<ul>
<li>Better JET encoding support has been added. UTF-8 encoded
templates are supported now. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38074">38074</a>,
<a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38075">38075</a>,
<a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38078">38078</a>,
<a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41723">41723</a>)</li>

<li>The org.eclipse.emf.codegen.jet.JETSkeleton.java class has been
changed to generate code with platform-specific linefeeds.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=24371">24371</a>)</li>

<li>The org.eclipse.emf.codegen.jmerge.JMerger.java class has been
changed to accommodate platform-dependent line separator
character(s).</li>

<li>The org.eclipse.emf.common.util.BasicEMap.java class has been
updated to fix a recursive cycle bug encountered when using the
putEntry(Entry entry, Object value) method to put a new value to an
existing key.</li>

<li>The org.eclipse.emf.common.util.URI.java class has been updated
to handle resolution of JAR-scheme URIs. Also, comparison of
schemes has been made case-insensitive in all URI operations,
including testing equality.</li>

<li>Changes have been made to handle xsi:noNamespaceSchemaLocation
in XML and XMI instance documents. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39440">39440</a>)</li>

<li>The setAttribValue(EObject object, String name, String value)
in the org.eclipse.emf.ecore.xmi.impl.XMLHandler.java class has
been changed to properly handle qualified attributes.</li>

<li>The org.eclipse.emf.edit.ui.celleditor.FeatureEditorDialog.java
class has been modified to make it more generally useful. A new
constructor has been added that enables you to instantiate a
FeatureEditorDialog that can be used to edit any set of values that
are passed to it during construction, rather than the values of a
specified feature of a specified EObject. The new constructor is
used by the createPropertyEditor(Composite composite) method in the
org.eclipse.emf.edit.ui.provider.PropertyDescriptor.java class,
which fixes a problem that can occur when using an
ItemPropertyDescriptorDecorator to customize a multi-valued
property.</li>

<li>Drag and drop for the generated editor has been fixed on Linux.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39151">39151</a>)</li>

<li>The next() method in the
org.eclipse.emf.common.util.AbstractTreeIterator.java class has
been changed so that it doesn't return the root if it's not
supposed to, even if the hasNext() method hasn't been called.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39893">39893</a>)</li>
</ul>
</li>

<li><b><a id="emf_111b" name="emf_111b">Build 20030913_1427WL: Bug
Fixes and Improvements</a></b> 

<p>There are bug fixes and improvements included with this build,
some of which are described below. Where the description applies to
a bug reported through Bugzilla, the Bugzilla number is included
after the description.<br />
 &#160;</p>

<ul>
<li>The eBasicSetContainer(InternalEObject newContainer, int
newContainerFeatureID, NotificationChain msgs) method in the
org.eclipse.emf.ecore.impl.EObjectImpl.java class has been changed
so that eBasicSetContainer(newContainer, newContainerFeatureID) is
called before newResource.attached(this). (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41907">41907</a>)</li>

<li>The painting problem with the ExtendedTableTreeViewer on
Linux-GTK has been fixed. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=39707">39707</a>)</li>

<li>The version numbers for the plugins in the feature.xml files
have been updated to 1.1.1. Additionally, in the feature.xml file
for the org.eclipse.emf feature, the following updates have been
made in the requires element: 

<ul>
<li>in the import element for the org.eclipse.core.resources
plugin, the version has been changed to 2.1.1</li>

<li>in the import element for the org.apaches.xerces plugin, the
version has been changed to 4.0.13</li>
</ul>
</li>
</ul>

<br />
</li>

<li><b><a id="emf_111c" name="emf_111c">Build 20031020_1612WL: Bug
Fixes and Improvements</a></b> 

<p>There are bug fixes and improvements included with this build,
some of which are described below. Where the description applies to
a bug reported through Bugzilla, the Bugzilla number is included
after the description.<br />
&#160;</p>

<ul>
<li>The org.eclipse.emf.ecore.util.EcontentAdapter.java class has
been improved. Included are the following changes: 

<ul>
<li>REMOVING_ADAPTER notification is now used to remove children
recursively.</li>

<li style="list-style: none">(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43417">43417</a>)</li>

<li>super.setTarget(target) is now called during the
setTarget(Notifier target) method.</li>

<li style="list-style: none">(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43416">43416</a>)</li>
</ul>
</li>

<li>Importing a Rose model containing a reference from a class to
another class that is stereotyped &lt;&lt;datatype&gt;&gt; is now
supported. Previously, this would result in a ClassCastException.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41993">41993</a>)</li>

<li>EMF now avoids generating methods that collide with feature
methods. For example, suppose that you have an interface A, and
that A extends an interface containing a method with the signature
Foo getFoo(). If A also has an attribute named foo of type Foo,then
the accessor method with the signature Foo getFoo() would collide
with the method from the parent interface. In this case, the
generated interface A will contain only one Foo getFoo() method.
Further, the implementation of the Foo getFoo() method in the
generated AImpl.java class will be that for the accessor method.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38602">38602</a>)</li>

<li>The package name resolution algorithm in the method
resolve(EModelElement eModelElement, String typeName, boolean
recordDemandCreatedEDataType) in the
org.eclipse.emf.codegen.ecore.JavaEcoreBuilder.java class has been
improved. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=44080">44080</a>)</li>

<li>The braceLine attribute in the
org.eclipse.emf.codegen.jmerge.JMerger.java class has been changed
to escape the brace. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=45182">45182</a>)</li>

<li>EMF now throws a PackageNotFoundException if you try to
reference a Resource that references an unregistered package.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43123">43123</a>)</li>

<li>The resetPropertyValue(Object object) method in the
org.eclipse.emf.edit.provider.ItemPropertyDescriptior.java class
has now been implemented. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41706">41706</a>)</li>
</ul>
</li>

<li><b><a id="emf_111d" name="emf_111d">Build 20031120_1149WL: Bug
Fixes and Improvements</a></b> 

<p>Only XSD has changed for this maintenance release.<br />
</p>
</li>

<!--- end of copy -->
</ol>
</td>
</tr>
</table>

<table summary="" border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b style="color:white"><a id="emf_110"
name="emf_110">What's new in EMF 1.1.0?</a></b></td>
</tr>

<tr>
<td>
<ol>
<li>
<b><a id="emf_110a" name="emf_110a">Build 20030501_0612VL: Bug Fixes and Improvements</a></b><br />
<br />
<ol type="I">
<li><b><a name="emf110_1">Eclipse 2.1 based</a></b> 

<p>As with EMF 1.0.2, the EMF 1.1.0 drivers will only work well
with Eclipse 2.1 or Eclipse 2.1.1. They should work with 2.0.2, but
they won't get the CLASSPATH correct for .editor projects.<br />
&#160;</p>
</li>

<li><b><a name="emf110_2">Migration from 1.0.2</a></b> 

<p>Code regeneration of 1.0.2 projects is recommended, but not
required. (See "Bug Fixes and Improvements" below.)<br />
&#160;</p>
</li>

<li><b><a name="emf110_3">New Mapping Plugins</a></b>


<p>Two new mapping plugins (org.eclipse.emf.mapping and
org.eclipse.emf.mapping.ui) have been added. Documentation for
these new plugins will be forthcoming soon. A sample of their use
is provided by the two xsd2ecore plugins
(org.eclipse.emf.mapping.xsd2ecore and
org.eclipse.emf.mapping.xsd2ecore.editor) in the XSD (XML Schema
Infoset Model) Eclipse Tools Subproject, Version 1.1.0.<br />
&#160;</p>
</li>
</ol>

<p>There are numerous bug fixes and improvements included with this
build, some of which are described below. Where the description
applies to a fix for a bug reported through Bugzilla, the Bugzilla
number is included after the description.<br />
&#160;</p>

<ul>
<li>XMI files created by the org.eclipse.emf.ecore.xmi plugin are
now saved with a system-specific line separator. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=36913">36913</a>).</li>

<li>You can now use the empty String ("") as the default value for
a String attribute in your Rose model.</li>

<li>EMF now writes the .ecore and .genmodel files using UTF-8 as
the encoding when the default Java locale's language is not
English.</li>

<li>EMF can now read a Rose .mdl file created by a Japanese version
of Rose (Rose 2001A.04.00 Japanese version). (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=36651">36651</a>).</li>

<li>The EMF code generator now supports classes (or more generally
types) whose names end in "Impl". (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=35952">35952</a>).</li>

<li>A number of improvements have been made to the XSD to Ecore
conversion, including improvements in the ability to parse
according to the originating schema.</li>

<li>The implementation for dynamic EMF has been reworked to be
faster and to use less space.</li>

<li>We have introduced org.eclipse.emf.common.util.DelegatingEList,
org.eclipse.emf.common.notify.impl.DelegatingNotifyingListImpl, and
org.eclipse.emf.ecore.util.DelegatingEcoreEList to allow clients to
wrap an existing list implementation that they may have as the
"backing store" for a list that implements all the correct EMF
behaviors.</li>

<li><b>Important!</b> Template changes to improve performance and
to ensure that dynamic EMF works properly for multiple inheritance
will be picked up only if clients regenerate their models, so it is
recommended but not required that clients regenerate.<br />
</li>
</ul>
</li>


<li>
<b><a name="emf_110e">Build 20030513_0618VL: Bug Fixes and Improvements</a></b> 

<p>There are numerous bug fixes and improvements included with this
build, some of which are described below. Where the description
applies to a fix for a bug reported through Bugzilla, the Bugzilla
number is included after the description. You can link directly to
the Bugzilla bug using this number.<br />
&#160;</p>

<ul>
<li>The method URI.createDeviceURI is deprecated in favor of using
URI.createURI which will always recognize a leading device
component just as URI.createDeviceURI did previously. We ask that
clients remove uses of createDeviceURI so that we can remove the
method from a subsequent drop. In general, any deprecation warning
should be eliminated in anticipation of the support
disappearing.</li>

<li>The feature order of serialized instances is now preserved when
going from XSD to Ecore.</li>

<li>The infinite loop caused by a missing resource for the
org.eclipse.emf.common plugin has been fixed. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37193">37193</a>).</li>

<li>The generated model editor wizard now provides an encoding
choice. <b>Important!</b> Because of this change, a newly generated
editor plugin will now require (and include) the following import
in its plugin.xml file: 

<p>&lt;import plugin="org.eclipse.emf.ecore.xmi"/&gt;</p>

<p>However, because the plugin.xml file is not regenerated or
merged, clients who are regenerating an editor that they have
generated before will need either to remove the plugin.xml file and
let it be regenerated anew, or to add this import manually to the
existing plugin.xml file. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37366">37366</a>).</p>
</li>

<li>The .properties file used by the generated editor plugin is now
ISO-8859-1 encoded. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37367">37367</a>).</li>

<li>The getPropertyDescriptor(Object object, Object propertyId)
method in the
org.eclipse.emf.edit.provider.ItemProviderAdapter.java now demand
creates properties. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37190">37190</a>).</li>

<li>OPTION_ENCODING is now supported an an alternative/override to
setEncoding() when saving an XMLResource
(org.eclipse.emf.ecore.xmi.XMLResource). An example of its use is
as follows: 

<pre>
    Map options = new HashMap();
    options.put(XMLResource.OPTION_ENCODING, initialObjectCreationPage.getEncoding());
    resource.save(options);
</pre>
</li>

<li>Some minor API changes include removing the empty XMIHelper
interface, eliminating XMLResource.changed in favor of supporting
repeating calls to XMLResource.setID, and changing
EObject.eContainmentFeature's result type from EStructuralFeature
to EReference.</li>

<li>Notification.CREATE in
org.eclipse.emf.common.notify.Notification.java has been
deprecated. We ask that clients remove uses of Notification.CREATE
so that we can remove it from a subsequent drop. In general, any
deprecation warning should be eliminated in anticipation of the
support disappearing.</li>

</ul>
</li>

<li>
<b><a name="emf_110f">Build 20030519_0521VL: Bug Fixes and Improvements</a></b> 

<p>There are numerous bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>The following now applies to the xsd2ecore mapping: 

<ul>
<li>If an attribute's type is primitive (or it is an enum), it
should be unsettable when mapped to Ecore.</li>

<li>If its type is not primitive (and not an enum) and it has a
default value different from null, it should be unsettable when
mapped to Ecore.</li>

<li>Also, support for promoting a primitive type to a wrapper type
for nillable elements has been added.</li>
</ul>
</li>

<li>The eSettingDelegate() accessor method in the EObjectImpl.java
class has been added to provide access to SettingDelegate.</li>

<li>For the EMF .ecore/.genmodel editors and the generated model
editors, the menubar Edit menu items are now enabled when the
outline and properties views have focus.</li>

<li>Multiline @model annotations are now supported.</li>

<li>A check has been added to ensure that the GenPackage's prefix
is always made to begin with an uppercase letter, if it does not
already.</li>

</ul>
</li>

<li>
<b><a name="emf_110g">Build 20030527_0913VL: Bug Fixes and Improvements</a></b> 

<p>There are some bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>The prepare() method in ReplaceCommand has been corrected to
accept objects of the correct class. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37953">37953</a>).</li>

<li>Both IntegerCellEditor and FloatCellEditor have been deprecated
in org.eclipse.emf.edit.ui.provider.PropertyDescriptor.java;
EDataTypeCellEditor should be used instead. We ask that clients
remove uses of both IntegerCellEditor and FloatCellEditor so that
we can remove them from a subsequent drop. In general, any
deprecation warning should be eliminated in anticipation of the
support disappearing.</li>

<li>In the org.eclipse.emf.codegen.jet package, two constructors
have been added to the JETEmitter.java class to enable the class
loader to be provided explicitly. Also, the GenModelImpl.java class
in the org.eclipse.emf.codegen.ecore.genmodel.impl package has been
changed to use them.</li>

<li>When using Java annotations, the following will be
ignored:<br />
<br />
 -an interface that appears in the @extends or @implements notation
in the comment (i.e., an interface that is being extended or
implemented)<br />
<br />
The reasoning for this is as follows: If you want to model this,
you would not use @extends (or @implements, as appropriate).
Therefore, the appearance of an interface in the
@extends/@implements implies that it is intentionally outside of
the model.</li>

</ul>
</li>

<li>
<b><a name="emf_110h">Build 20030602_1759VL: Bug Fixes and Improvements</a></b> 

<p>There are some bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>In the org.eclipse.emf.ecore.util package, the following
EcoreEList subclass inheritance bugs have been fixed: 

<ul>
<li>EObjectContainmentElist.Unsettable now extends
EObjectContainmentEList instead of EObjectEList.</li>

<li>EObjectWithInverseResolvingEList.Unsettable.ManyInverse now
extends EObjectWithInverseResolvingEList.Unsettable instead of
EObjectWithInverseEList.Unsettable.</li>
</ul>
</li>

<li>The org.eclipse.emf.ecore.util.ECoreUtil class has been made
noninstantiable.</li>

<li>The visibility of the prepare() method in the
org.eclipse.emf.edit.command.SetCommand class has been changed from
public to protected.</li>

</ul>
</li>

<li>
<b><a name="emf_110i">Build 20030605_1020SL: Bug Fixes and Improvements</a></b> 

<p>There are some bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>The change that made the org.eclipse.emf.ecore.util.ECoreUtil
class noninstantiable has been reversed.</li>

<li style="list-style: none"><br />
 &#160;</li>
</ul>
</li>

<li>
<b><a name="emf_110j">Build 20030611_1435VL: Bug Fixes and Improvements</a></b> 

<p>There are some bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>The setSelectionToWidget((List list, boolean reveal) method in
the org.eclipse.emf.mapping.presentation.MappingEditor.java class
has been changed to guard against the list being null. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38693">38693</a>)</li>

<li>The generated code for an attribute with isUnique=False now
ensures that isUnique is set to false.</li>

<li>The prerequisites section of the "Generating an EMF Model Using
XML Schema" tutorial has been updated to include a link to the XSD
Downloads page. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38217">38217</a>)</li>
</ul>
</li>


<li>
<b><a name="emf_110k">Build 20030616_1530VL: Bug Fixes and Improvements</a></b> 

<p>There are some bug fixes and improvements included with this
build, some of which are described below.<br />
&#160;</p>

<ul>
<li>The value of FEEDBACK_INSERT_AFTER has been changed in the
org.eclipse.emf.edit.command.DragAndDropFeedback.java class as a
reault of changes in the SWT constants.</li>

<li>When JETEmitter creates the .JETEmitters project, it now checks
for the existence of the "src" and "runtime" folders before trying
to create them. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38238">38238</a>)</li>

<li>The org.eclipse.emf.codegen.CodeGenPlugin.java class has been
changed to be an EMFPlugin so that exceptions can be easily logged.
(Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38087">38087</a>)</li>

<li>&lt;package prefix=...&gt; elements have been addded to the
plugin.xml files for all the EMF and XSD plugins. (Bugzilla <a
href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38225">38225</a>)</li>

<li>As per the newsgroup discussion, the following two constructors
have been added in the
org.eclipse.emf.common.ui.celleditor.ExtendedComboBoxEditor.java
class: 

<ul>
<li>public ExtendedComboBoxCellEditor(Composite composite, List
list, ILabelIProvider labelProvider, int style)</li>

<li>public ExtendedComboBoxCellEditor(Composite composite, List
list, ILabelProvider labelProvider, boolean sorted, int style)</li>
</ul>

The existing constructors have been updated to call these with the
default value for the style argument set to use SWT.READ_ONLY.</li>
</ul>
</li>


<li><b><a id="emf_110l" name="emf_110l">Build 20030620_1105VL: Bug
Fixes and Improvements</a></b> 

<p>This build is a refresh of EMF being delivered with the
corresponding build of XSD.<br />
&#160;</p>
</li>

<!--- end of copy -->
</ol>
</td>
</tr>
</table>

<table summary="" border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b style="color:white"><a id="emf_102"
name="emf_102">What's new in EMF 1.0.2?</a></b> </td>
</tr>

<tr>
<td>
<ol>
<li><b><a id="emf_102b" name="emf_102b">Build
20030314_1622TL</a></b><br />
<br />
 

<ol type="I">
<li><b><a id="emf_102b_1" name="emf_102b_1">Eclipse 2.1
based</a></b> 

<p>The EMF 1.0.2 drivers will only work well with Eclipse 2.1. They
should work with 2.0.2, but they won't get the CLASSPATH correct
for .editor projects. Sorry.<br />
&#160;</p>
</li>
</ol>

<ul>
<li>EcoreUtil.Copier.copyContainment's first argument has changed
from EStructuralFeature to EReference.</li>

<li>New icons for EMF.Edit, Ecore, and GenModel.</li>

<li>Bug fixes...<br />
&#160;</li>
</ul>
</li>

<li><b><a id="emf_102a" name="emf_102a">Build
20030310_0656VL</a></b><br />
&#160; 

<ul>
<li>Eliminated unneeded imports in generated files</li>

<li>Performance improvement in eNotify() method</li>

<li>Performance improvement in Dynamic EMF - array instead of Map
based implementation</li>

<li>Bug fixes...</li>
</ul>
</li>

<li><b><a id="emf_102c" name="emf_102c">Build
20030322_1237VL</a></b><br />
&#160; 

<ul>
<li>Bug fixes...</li>
</ul>
</li>

<li><b><a id="emf_102d" name="emf_102d">Build
20030326_0335VL</a></b><br />
&#160; 

<ul>
<li>Doc fixes...</li>
</ul>
</li>
</ol>
</td>
</tr>
</table>

<table summary="" border="0" cellpadding="2" width="100%">
<tr>
<td align="LEFT" valign="TOP" bgcolor="#0070A0"><b style="color:white"><a id="emf_101"
name="emf_101">What's new in EMF 1.0.1?</a></b></td>
</tr>

<tr>
<td>
<ol>

<li><b><a id="emf_101b" name="emf_101b">Build 20021023_1900TL
additions</a></b><br />
&#160; 

<ol type="I">
<li><b><a id="emf_101b_1" name="emf_101b_1">1.0.0
Incompatibility</a></b> 

<p>EMF 1.0.1 uses classpath variables in the java projects it
creates. The generator also updates the classpath during generation
(although this feature can be turned off via a genmodel property).
The gist of this is that there can be conflicts with the bare jar
classpath entries used in 1.0.0 projects and therefore, you need to
delete old 1.0.0 classpath entries and then regenerate to create
them correctly. Also, although plugin.property's merge correctly
now (see below), plugin.xml's do not. Because of this, you should
delete old 1.0.0 plugin.xml's and regenerate them for 1.0.1. We
also recommend deleting 1.0.0 genmodels, and recreating them in
1.0.1, because they now support proper reload with persistent
genmodel settings, while the 1.0.0 versions do not.<br />
&#160;</p>
</li>

<li><b><a id="emf_101b_2" name="emf_101b_2">Documentation
Plugin</a></b> 

<p>There is now a documentation plugin, org.eclipse.emf.doc,
included in the download. All the EMF documentation is now
available from the desktop Help menu. We've put the documentation
plugin into the Runtime zip file, so its download size has
increased by more than 2M. We're thinking about moving it into the
Source zip, or maybe into its own zip file, in the future. If you
have an opinion, please feel free to post it to the emf
newsgroup.<br />
&#160;</p>
</li>

<li><b><a id="emf_101b_3" name="emf_101b_3">Bug Fixes</a></b><br />
&#160; 

<ul>
<li>Importing a Rose model with nested packages, where the parent
package(s) have no classes in them, caused the generator to ignore
(not generate) all of the classes in the nested package(s).</li>

<li>If you imported annotated Java classes that were in the default
Java package (i.e., no explicit package), the importer crashed and
produced an empty editor window. Now it produces an error message
instead.</li>

<li>Java @model annotations no longer need to be on a line by
themselves in the comment. The importer will recognize @model
followed by 0 or more name=value pairs, anywhere in the comment.
This fixes a problem several people were having with the tutorial,
whereby the import from annotation wasn't finding any classes
because of the formatting of the comments.</li>

<li>Other minor bug fixes. Details available upon request.<br />
&#160;</li>
</ul>
</li>

<li><b><a id="emf_101b_4" name="emf_101b_4">Generator
Enhancements</a></b><br />
&#160; 

<ul>
<li>The Ecore Model Project wizard now lets you create a genmodel
from an Ecore XMI file. In 1.0.0 it was only possible to create a
genmodel from a Rose model or annotated Java files.</li>

<li>You can now reload a genmodel from any source, not just from
Rose. The "Reload from Rose" menu item is now just
"Reload...".</li>

<li>Added the ability to control whether you want the edit and
editor code to be generated into their own plugin/project or not.
In 1.0.0, you had no choice but to generate the edit and editor
components into separate plugins.</li>

<li>Added more flexibility in the EMF.Edit generation. You can now
choose (by setting properties in the genmodel editor) which classes
to generate item providers for. In 1.0.0, you were forced to have
one for every class. Also, which features should be properties and
which should generate notification, is now user controllable.</li>

<li>The generator now merges plugin.properties as well as Java
files. In 1.0.0, if you regenerated an edit or editor plugin, it
would not change or overwrite an existing plugin.properties file.
If the model had new properties, you needed to manually add them,
or delete the old plugin.properties file before regenerating.
Plugin.xml's still need to be deleted if you want to regenerate
them.<br />
&#160;</li>
</ul>
</li>

<li><b><a id="emf_101b_5" name="emf_101b_5">Added a basic
EMF-generated Ecore model editor</a></b> 

<p>You can use it, instead of the text editor, to view or edit
".ecore" model files. Of course, once we have nice graphical Ecore
editors, this won't be nearly as interesting.</p>
</li>


<li><b><a id="emf_101b_6" name="emf_101b_6">Technology Preview -
Import model from XML Schema</a></b> 

<p>In EMF 1.0.1 you can import your ecore model from an XML Schema,
in addition to Rose or annotated Java. To enable this support, you
need to download and install the <a
href="http://www.eclipse.org/xsd">XML Schema Project</a> plugins
first. Here is <a target="_code"
href="http://dev.eclipse.org/viewcvs/indextools.cgi/%7Echeckout%7E/org.eclipse.emf/doc/org.eclipse.emf.doc/tutorials/xlibmod/library.xsd">library.xsd</a>,
the Library model expressed in XML Schema. To use it, run the Ecore
Model Project wizard and choose "Load from XML Schema" when
prompted. This is documented in this <a href="http://www.eclipse.org/emf/docs.php?doc=tutorials/xlibmod/xlibmod.html">tutorial</a>. Give
it a try.</p>

<p>One very important difference (advantage) to using XML Schema to
define the model is that, in addition to the default XMI, instances
of the model will (not currently, but in the coming weeks) be
serializable according to the Schema.</p>

<p>Another interesting observation is that the "Book.author" and
"Writer.books" reference types, and the fact that they are opposite
ends of a bidirectional association, are not expressed in the XML
Schema. Consequently, the generator will simply treat them as two
independent one-way references of type EObject. We're looking into
ways of annotating the schema (similar to the Java annotation
approach) with the missing information. If you have any ideas or
suggestions, please feel free to post them to the emf
newsgroup.</p>

<p>Note: This support is very preliminary and highly subject to
change. It is meant to demonstrate the concepts and works well only
with simple schemas.</p>
</li>


<li><b><a id="emf_101b_7" name="emf_101b_7">Proposal to add
annotations to Ecore model objects</a></b> 

<p>Class EAnnotation has been added to the Ecore model as a
proposed design for supporting annotations which follows closely
the design of the XML Schema model's XSDAnnotation. The current
design uses a &lt;&lt;0..*&gt;&gt; details : String, which we
recognize is unacceptably limiting and plan to change it, probably
to a Map, once we've worked out the details of serialization
support for a Map. We would like to solicit feedback on the
EAnnotation design. It will definitely change before the design is
committed to a Release Build. For example, adding a black diamond
relation from EAnnotation to EObject would make it essentially
identical in function to XSDAnnotation; it would mean that no one
would ever have to extend EAnnotation in order to add annotations
and it would ensure that the arbitrary EObjects are well separated
and have a well managed lifetime relative to that which they
annotate.</p>
</li>
</ol>

<ul>
<li>Generated code is now formatted according to the project (Java
Code Formatter) preferences.</li>

<li>EMF.Edit (e.g., item providers) can now be used in stand-alone
applications (see FAQ for details).</li>

<li>More XML Schema Technology preview. Along with the Java
classes, an XML Schema can now be generated for an Ecore model.
This is the opposite of the import from Schema support (described
above).</li>

<li>EAnnotation design (described above) has been completed.</li>

<li>Added support for map (i.e., EMap) type attributes. See
EAnnotation (attribute "details") for an example.</li>

<li>Some XMI and XML Resource implementation restructuring.</li>

<li>Added simple logging support. There is now a log() method
callable on generated Plugin classes.</li>

<li>More minor bug fixes and cleanup...</li>
</ul>
</li>


<li><b><a id="emf_101c" name="emf_101c">Build 20021127_0721VL
additions</a></b><br />
&#160; 

<ul>
<li>Code is now compiled with debug information (-g).</li>

<li>Source plugin is now properly structured for Eclipse
development.</li>

<li>Support Empty EMF project creation.</li>

<li>New reflective item provider and editor.</li>

<li>Second tutorial added to documentation plugin.</li>

<li>Added reconcile() method on GenModel.</li>

<li>More minor bug fixes...</li>
</ul>
</li>


<li><b><a id="emf_101d" name="emf_101d">Build 20021219_1544VL
additions</a></b><br />
&#160; 

<ul>
<li>Generated editors now include property editing for multi-valued
features.</li>

<li>More bug fixes...</li>
</ul>
</li>


<li><b><a id="emf_101e" name="emf_101e">Build 20030225_1207VL
additions</a></b><br />
&#160; 

<ul>
<li>Unsettable reference support. The unsettable feature has been
moved from EAttribute to EStructuralFeature.</li>

<li>More bug fixes...</li>

<li>This is the candiate 1.0.1 "release" build. If no problems are
encountered we will publish this build as the "Latest Release" and
then start dropping 1.0.2 builds (which will be based on Eclipse
2.1).</li>

<li>The online JavaDoc (and Ecore class diagram) has been updated
to reflect this build (i.e., the latest release).</li>
</ul>
</li>
</ol>
</td>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" bordercolor="#111111" width="100%">
<tbody>
  <tr>
    <td bgcolor="#0070a0">
      <font color="#ffffff"><b>
        <a name="xsd_111">What's new in XSD 1.1.1?</a>
      </b></font>
    </td>
  </tr>
  <tr>
    <td>
      <ol>        
        <li>
	<b><a name="xsd_111a">Build 20030819_0612SL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are numerous bug fixes and improvements included with this build, the most significant of which is described below.
          <ul>
            <li>                
            The org.eclipse.emf.common.util.URI.java class has been updated to handle resolution of JAR-scheme URIs.  Also, comparison of schemes has been made case-insensitive in all URI operations, including testing equality.
            </li>
          </ul>
         </p>
<br>
		<li>
	<b><a name="xsd_111b">Build 20030909_1427WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            0 and 1 are now accepted as valid boolean XML Schema literals.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41898">41898</a>)
            </li>

            <li>
            The MagicXMLSchema.xsd, XMLSchema.xsd files in the 1999 and <nobr>2000\10 </nobr>sub-directories of the
            <nobr>plugins\org.eclipse.xsd_1.1.1\cache\www.w3.org </nobr>directory have been updated to fix a problem
            with old namespace schemas; xml.xsd files, with corresponding old namespace names, have been
            added to those directories as well.  
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=41913">41913</a>) 
            </li>

            <li>
            The handleAnalysis() method in the org.eclipse.xsd.impl.XSDComplexTypeDefinitionImpl.java class
            has been updated to handle an empty complex extension of a simple complex type.  For example, it
            can now handle the following schema:

<pre>
&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;xsd:schema xmlns:xsd="http://www.w3.org/2001/XMLSchema"&gt;
    &lt;xsd:complexType name="ServiceCategory"&gt;
        &lt;xsd:simpleContent&gt;
            &lt;xsd:extension base="xsd:boolean"/&gt;
        &lt;/xsd:simpleContent&gt;
    &lt;/xsd:complexType&gt;
    &lt;xsd:element name="DialARide"&gt;
        &lt;xsd:complexType&gt;
            &lt;xsd:complexContent&gt;
                &lt;xsd:extension base="ServiceCategory"/&gt;
            &lt;/xsd:complexContent&gt;
        &lt;/xsd:complexType&gt;
    &lt;/xsd:element&gt;
&lt;/xsd:schema&gt;
</pre>

            </li>

            <li>
            The version numbers for the plugins in the feature.xml files have been updated to 1.1.1.
            Additionally, in the feature.xml file for the org.eclipse.xsd feature, the following updates
            have been made in the requires element:

            <ul>
              <li>
              in the import element for the org.eclipse.core.resources plugin, the version has been changed to 2.1.1
              </li>
              <li>
              in the import element for the org.apaches.xerces plugin, the version has been changed to 4.0.13
              </li>
              <li>
              in the import element for the org.eclipse.emf.ecore plugin, the version has been changed to 1.1.1
              </li>
            </ul>

            <li>
            The duplicate value feature has been fixed in the org.eclipse.xsd.ecore.XSD2EcoreBuilder.java class.
            For example, for a schema like this:

<pre>
&lt;?xml version = "1.0" encoding = "UTF-8"?&gt;
&lt;xsd:schema xmlns:xsd = "http://www.w3.org/2001/XMLSchema"&gt;

        &lt;xsd:complexType name = "ServiceCategory"&gt;
                &lt;xsd:simpleContent&gt;
                        &lt;xsd:extension base = "xsd:boolean"/&gt;
                &lt;/xsd:simpleContent&gt;
        &lt;/xsd:complexType&gt;

        &lt;xsd:element name = "DialARide"&gt;
                &lt;xsd:complexType&gt;
                        &lt;xsd:complexContent&gt;
                                &lt;xsd:extension base = "ServiceCategory"/&gt;
                        &lt;/xsd:complexContent&gt;
                &lt;/xsd:complexType&gt;
        &lt;/xsd:element&gt;

&lt;/xsd:schema&gt;
</pre>

            The EClass for DialARide previously had a second boolean feature named value1 that is now eliminated.
            </li>
          </ul>
         </p>
<br>
        <li>
	<b><a name="xsd_111c">Build 20031020_1612WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            The import of a null namespace no longer generates a warning.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=43171">43171</a>)
            </li>
          </ul>
<br>
        <li>
	<b><a name="xsd_111d">Build 20031120_1149WL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          Where the description is for a bug reported through Bugzilla, the Bugzilla number is included after the description.
          <ul>
            <li>
            Support configurable handling of schemaLocation resolution via org.eclipse.xsd.util.XSDSchemaLocationResolver
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=46188">46188</a>)
            </li>
          </ul>

      </ol>
    <br>
    </td>
  </tr>
</tbody>            
</table>

<table border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" bordercolor="#111111" width="100%">
<tbody>
  <tr>
    <td bgcolor="#0070a0">
      <font color="#ffffff"><b>
        <a name="xsd_110">What's new in XSD 1.1.0?</a>
      </b></font>
    </td>
  </tr>
  <tr>
    <td>
      <ol>

        <li>
	<b><a name="xsd_110a">Build 20030501_0612VL: Bug Fixes and Improvements</a></b>

         <ol type="I">
			<li><b><a name="xsd_110a_1">New Plugins</a></b>
          <p>
           The xsd2ecore plugins (org.eclipse.emf.mapping.xsd2ecore and org.eclipse.emf.mapping.xsd2ecore.editor) have been added.  They illustrate how to use the mapping framework, and the editor can be used to view the mapping produced during XSD to Ecore conversion.  Documentation will be forthcoming soon.
           <br>&#160;
        </li>

			<br>
			<li><b><a name="xsd_110a_2">Bugzilla Fixes</a></b>

          There are numerous bug fixes and improvements included with this build, some of which are described below.  Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description.        
          <ul>
            <li>                
             XSD_ENCODING is now supported as an option for specifying the encoding for XSD resources.
            </li>
            <li>
             The visibility of the isTypeDerivedFrom method in the XSDSchemaQueryTools class has been changed from protected to public.  
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=36062">36062</a>)
            </li>
            <li>
             The XSD to Ecore conversion utilities have been moved to org.eclipse.xsd.ecore in the org.eclipse.xsd plugin for more flexible reuse.
            </li>
          </ul>

			 </ol>

<br>
        <li>
	<b><a name="xsd_110b">Build 20030513_0618VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.  
          <ul>
            <li>                
             In order to have value objects that implement equals() correctly, values of simple types based on int[] and byte[] in Xerces need to be wrapped.  Therefore, the types:
              <ul>	
               <li>
                 org.eclipse.xsd.types.XSDAnySimpleType.IntSequence and
               </li>
               <li>
                 org.eclipse.xsd.types.XSDAnySimpleType.ByteSequence 
               </li>
              </ul>
              will be used in place of int[] and byte[], respectively.  (Later versions of Xerces have their own wrapper type which we will use when we switch to a newer version.)
            </li>
            <li>
            We have refreshed the cached version of XMLSchema.xsd to the latest version on the web in order to pick up the errata changes to that version.
            </li>            
          </ul>
           &#160;<br>
        <li>
	<b><a name="xsd_110c">Build 20030519_0521VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
             The XSD editor now detects the encoding of your XSD file and sets the encoding of the editor to match. (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37630">37630</a>).
            <li>
             The getBadTypeDerivation() method in XSDComplexTypeDefinitionImpl.java  now handles a null base type.
            </li>
            <li>
             XSD now populates the XSDFacet.annotation. (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=37673">37673</a>).
            </li>
            <li>
             XSDParser has been upgraded to support a LexicalHandler for creating Comment nodes.
            </li>
            <li>
             XSDMainTest has been upgraded to support -validate for validating a schema from the command line.
            </li>                        
          </ul>
          &#160;<br>

        <li>
	<b><a name="xsd_110d">Build 20030527_0913VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          Minor bug fixes and improvements.  
          &#160;<br>
          <br>

        <li>
	<b><a name="xsd_110e">Build 20030602_1759VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          This build is a refresh of XSD being delivered with the corresponding build of EMF.  
          &#160;<br>
          <br>

        <li>
	<b><a name="xsd_110f">Build 20030605_1020SL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          This build is a refresh of XSD being delivered with the corresponding build of EMF.  
          &#160;<br>
          <br>

        <li>
	<b><a name="xsd_110g">Build 20030611_1435VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
             The following static methods in the org.eclipse.xsd.impl.XSDSchemaImpl.java class have been made synchronized:  
             <ul>
              <li>createMetaSchema(Node node)</li>
              <li>getGlobalResourceSet()</li>
              <li>getMagicSchemaForSchema(String namespace)</li>
              <li>getSchemaForSchema(String namespace)</li>
              <li>getSchemaInstance(String namespace)</li>
             </ul>
            </li>

            <li>
             Complex type serialization now avoids the potential for introducing a redundant QName prefix.
            </li>

            <li>
             The xsd2ecore mapping has been changed to map an XSD ID-type attribute as an ID EAttribute. 
            </li>

            <li>
             The xsd2ecore mapping has been updated to handle abstract elements and substitution groups.
            </li>

            <li>
             XSD has been updated to recognize schema constraints referenced via include. 
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38779">38779</a>)
            </li>

            <li>
             The xsd2ecore editor has been updated to use translated strings for the name and description. 
             (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38174">38174</a>)
            </li>                       
          </ul>
          &#160;<br>

        <li>
	<b><a name="xsd_110h">Build 20030616_1530VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below. Where the description applies to a fix for a bug reported through Bugzilla, the Bugzilla number is included after the description. You can link directly to the Bugzilla bug using this number.  
          <ul>
            <li>
            The getEClassifier(XSDTypeDefinition xsdTypeDefinition, boolean supportNull) method in the org.eclipse.xsd.ecore.XSDEcoreBuilder.java class has been updated to ensure that an XSD abstract complex type becomes an abstract EClass.
            </li>

            <li>
            The doSave(OutputStream os, Map options) method in the org.eclipse.xsd.util.XSDResourceImpl.java class has been updated so that if the schema element is null, the updateElement() method is called on the schema.
            </li>

            <li>
            &lt;package prefix=...&gt; elements have been addded to the plugin.xml files for all the EMF and XSD plugins.
            (Bugzilla <a href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=38225">38225</a>)
            </li>

            <li>
            The getBadTypeDerivation(XSDTypeDefinition xsdTypeDefinition, boolean extension, boolean restriction) method in the org.eclipse.xsd.impl.XSDSimpleTypeDefintionImpl.java class has been updated because a simple type needs to be considered to be derived from complex anyType.
            </li>

            <li>
            The javadoc in the org.eclipse.xsd.XSDComplexTypeDefinition.java file has been updated for the XSDParticle getSyntheticParticle() method.
            </li>
    
          </ul>
          &#160;<br>

        <li>
	<b><a name="xsd_110i">Build 20030620_1105VL: Bug Fixes and Improvements</a></b>
        </li>
         <p>
          There are bug fixes and improvements included with this build, some of which are described below.
          <ul>
            <li>
            National Language Support is now available for standalone clients.
            </li>

          </ul>
          &#160;<br>

      </ol>

    </td>
  </tr>

</tbody>            
</table>

<table border="0" cellspacing="0" cellpadding="2" style="border-collapse: collapse;" bordercolor="#111111" width="100%">
<tbody>
  <tr>
    <td bgcolor="#0070a0">
      <font color="#ffffff"><b>
        <a name="xsd_102">What's new in XSD 1.0.2?</a>
      </b></font>
    </td>
  </tr>
  <tr>
    <td>
      <ol>
        <li>
          <b>Bug Fixes...</b>
          <br>&#160;
        </li>
        <li>
          <b>Validation Support</b>
          <p>
            A schema can be validated to determine whether it is a fully valid instance according to the 1.0 specification;
            since this had been working for several months, it isn't really all that new.
          <br>&#160;
        </li>
      </ol>
    </td>
  </tr>
  <tr>
    <td bgcolor="#0070a0">
      <font color="#ffffff"><b>
        <a name="xsd_101">What's new in XSD 1.0.1?</a>
      </b></font>
    </td>
  </tr>
  <tr>
    <td>
      <ol>
        <li>
         <b>Bug Fixes...</b>
          <br>&#160;
        </li>
        <li>
          <b>Documentation Plugin</b>
          <p>
            There is now a documentation plugin, org.eclipse.xsd.doc,
            included in the download. All the XSD documentation is now
            available from the desktop Help menu. We've put the documentation
            plugin into the Runtime zip file, so its download size has increased.
            We're thinking about moving it into the Source zip,
            or maybe into its own zip file, in the future. If you have an
            opinion, please feel free to post it to the XSD newsgroup. 
          <br>&#160;
        </li>
      </ol>
    </td>
  </tr>
</tbody>            
</table>

<?php $pre="../"; include "../includes/footer.php"; ?>
<!-- $Id: release-notes-1.x.php,v 1.10 2006/04/03 19:27:42 nickb Exp $ -->