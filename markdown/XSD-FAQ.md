## Newbie / General

### What is XSD?

The XML Schema Definition is a reference library that provides an
[API](http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details)
for use with any code that examines, creates or modifies [W3C XML
Schema](http://www.w3.org/TR/XMLSchema-0) (standalone or as part of
other artifacts, such as XForms or WSDL documents).

XSD is a library that provides an
[API](http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details)
for manipulating the components of an XML Schema as described by the
[W3C XML Schema](http://www.w3.org/TR/XMLSchema-0) specifications, as
well as an API for manipulating the DOM-accessible representation of XML
Schema as a series of XML documents, and for keeping these
representations in agreement as schemas are modified.

The library will include services to serialize and deserialize XML
Schema documents, and to do integrity checking of schemas (for example,
not using a maximum value for a simpleType which is invalid considering
the base type of that simpleType). The project goal is to support 100%
of the functionality of XML schema representation, but not necessarily
to provide document against schema assessment or validation services,
which are normally provided by a validating parser, such as Apache's
[Xerces-J](http://xml.apache.org/xerces2-j/).

<b>XML Schema Definition Model</b>

The model incorporates many of the ideas that several people at IBM had
about an excellent API for schemas. These ideas were shared with the W3C
in February 2002, in a requirements document.

### My XSD file reports no errors, but I can't finish the New EMF Project wizard\! I plan to use XML Schema (XSD) with EMF. Are there any bugs with that? I get a NullPointerException when loading an XSD Model\! Is there a fix or workaround? Is there a bug in the Crimson DOM implementation of the SUN JDK 1.4? I get the error "Specify a valid XML Schema and try loading again"\! Why does EMF refuses to accept my schema file?

This bug can be seen, *when loading or importing a model from XML
Schema*, as either:

  - a null pointer exception, or
  - the error message "Specify a valid XML Schema and try loading
    again".

See [Sun JDK14 Crimson
DOM](MDT/XSD/FAQ/Sun_JDK14_Crimson_DOM "wikilink") for `hasAttributeNS`
bug details and workaround.

### I've created a model from an XML Schema. Why won't EMF load or save conforming instance documents (loading throws a `ClassNotFoundException`)?

EMF does some remapping to turn XML element and attribute names into
conventional Ecore attribute and reference names (i.e. conventional Java
field names). It annotates the model with the original XML names (and a
bunch of other information from the schema that can't be represented in
Ecore) via the `ExtendedMetaData` interface. Resources must use this
information to save and load conforming instance documents.

Look in the util package of the generated model code and you'll find a
resource factory implementation, `XxyResourceFactoryImpl`. This factory
returns instances of `XMLResource` with a few non-default options set.
Most importantly, it enables the use of `ExtendedMetaData`.

When you're running the editor under Eclipse, this resource factory will
automatically be registered. For standalone applications, you'll need to
perform the registration in your code. For example, to globally register
the generated library resource factory implementation against the
extension "library":

`Resource.Factory.Registry.INSTANCE.getExtensionToFactoryMap().put("library",`
`new LibraryResourceFactoryImpl());`

### Are there sample Java methods that show how to use the XSD API?

Sample code that includes links back to the javadoc is at:
XSDPrototypicalSchema.html.

Examples of convenience functions also illustrate the use of the bare
API. Those example convenience functions are in the source code. Info
about them is located at
[XSDSchemaBuildingTools.html](http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/util/XSDSchemaBuildingTools.html)
and
[XSDSchemaQueryTools.html](http://download.eclipse.org/tools/emf/xsd/javadoc?org/eclipse/xsd/util/XSDSchemaQueryTools.html).

## Installation / Setup

### How do I install XSD 2.x (for Eclipse 3.x)?

[Download](http://www.eclipse.org/emf/downloads/) the version of XSD
that <b>matches</b> your installation of Eclipse. Generally, the version
of Eclipse is one version greater than that of EMF; eg., EMF 2.1.2 is
build against (and for) Eclipse 3.1.2. Exit Eclipse, then unzip into
your Eclipse directory.

### How do I get XSD source from CVS?

See [Getting XSD from
CVS](http://www.eclipse.org/emf/docs/misc/cvsdoc/emfcvsug.html).

### Does XSD have a site that I can use with the Eclipse Update Manager?

Yes, as of June 21, 2004, there is an Update Manager site for XSD, for
2.x releases.

IBM Internal can use:

  - <http://fullmoon.torolab.ibm.com/tools/emf/updates/>
  - <http://emf.torolab.ibm.com/tools/emf/updates/>

The rest of the world can use:

  - <http://www.eclipse.org/emf/updates/>

If you're not familiar with Update Manager, surf to one of the above
URLs and read the instructions there.

Please note, however:

  - You cannot upgrade from EMF 1.x to EMF 2.x, since you must also
    upgrade versions of Eclipse (2.x -\> 3.0).
  - If you install a stable, integration build of EMF, such as
    2.0.0.I200406211000, when EMF 2.0.0 Final is launched, UM will
    consider this to be an OLDER version, rather than a newer version.
    So, if you wanted to use UM to stay abreast of changes between
    Eclipse 3.0 Milestones, when 3.0 Final was launched, you'd have to
    download EMF manually and remove your 2.0.0.yyyymmddhhmm version
    manually anyway. The same problem exists with updating Eclipse
    itself via UM to 3.0.0.yyyymmddhhmm - once 3.0.0 is launched, you
    won't be able to use UM to upgrade the the Final version, since
    3.0.0 \< 3.0.0.yyyymmddhhmm. However, we're planning to drop a new
    UM site build for every zipped build, so you should be able to
    continue to upgrade without having to download zips manually.

### Why is Eclipse 3.x required for XSD 2.x?

XSD 2.x, like 1.x, runs standalone, so in that sense, it doesn't require
Eclipse at all. But if you want to use the tools, like the Sample XML
Schema Editor within Eclipse, you need to get Eclipse 3.x.

## Standalone Uses

### I want to use XSD in my standalone project, or include only a working subset of the code. What libraries (jar files) do I need in my CLASSPATH?

<b>Eclipse Modeling Framework (EMF)</b> provides the infrastructure to
run the generated models and dynamic model based on existing ecore
files. It also provides XMI/XML serialization and deserialization.

The following jars can be used in standalone mode. Jars are found under
the plugins directory of your Eclipse installation - there will be a
release number appended to the plugin name, e.g.
`org.eclipse.emf.common`<b>`_2.2.1.v200609210005`</b>`.jar`. You can
extract these from the SDK, Runtime or Standalone zips, or use the
Update Manager jars.

Add to the following jars to your CLASSPATH or copy them into your
project. This includes, but is not limited to:

  - emf.common_2.\*.jar
  - emf.ecore_2.\*.jar
  - emf.ecore.change_2.\*.jar
  - emf.ecore.xmi_2.\*.jar (requires SAX parser - **see note below**)

<b>XML Schema Definition (XSD)</b> is a reference library for use with
any code that manipulates XML schemas and requires the EMF jars above
and the following jars to be used in standalone mode:

  - xsd_2.\*.jar (requires SAX parser - **see note below**)

<b>NOTE:</b> If using ecore.xmi or any of the XSD jars, you will require
a SAX parser such as
[Xerces](http://www.eclipse.org/emf/downloads/install.php).

For more information on working outside Eclipse, see the question [How
do I use EMF in standalone applications (such as an ordinary
main)?](#How_do_I_use_XSD_in_standalone_applications_.28such_as_an_ordinary_main.29.3F "wikilink").

### How do I use XSD in standalone applications (such as an ordinary main)?

An EMF model can be used without change in a standalone application with
couple of exceptions.

Default resource factories are not registered in the standalone EMF
environment. Therefore, for each file extension or scheme your
application wants to load or save, you need to register the
corresponding resource factory. For example, to load and save XMI
documents, add a line similar to the one below to your main program:

`Resource.Factory.Registry.INSTANCE.getExtensionToFactoryMap().put("library", new XMIResourceFactoryImpl());`

To load and save XML documents, register the following factory:

`Resource.Factory.Registry.INSTANCE.getExtensionToFactoryMap().put("xml", new XMLResourceFactoryImpl());`

In the above examples, the model is registered using the global static
resource factory registry instance. You can also register factories
local to the `ResourceSet` being used, e.g:

`ResourceSet rs = new ResourceSet();`
`rs.getResourceFactoryRegistry().getExtensionToFactoryMap().put(("xml", new XMLResourceFactoryImpl());`

In addition, you'll also need to register your package, which happens as
a side effect of accessing XyzPackage.eINSTANCE. For example, to
register the library model, add the following line to your main program:

`LibraryPackage packageInstance = LibraryPackage.eINSTANCE;`

You need to add to the CLASSPATH all the jars for the plugins (and their
dependent plugins) that you want to use standalone. The list is
dependent on exactly what plugins you want to use and is available by
looking at the runtime libraries in their `plugin.xml` files. This
includes, but is not limited to:

  - org.eclipse.emf.common/runtime/common.jar
  - org.eclipse.emf.common/runtime/common.resources.jar
  - org.eclipse.emf.ecore/runtime/ecore.jar
  - org.eclipse.emf.ecore/runtime/ecore.resources.jar
  - org.eclipse.emf.ecore.xmi/runtime/ecore.xmi.jar

The jars are found under the plugins directory of your Eclipse
installation. There will be a release number appended to the plugin
name, e.g. org.eclipse.emf.common<b>_2.1.0</b>.

For EMF.Edit you would also have to add the following jar files to your
classpath:

  - org.eclipse.emf.common.ui/runtime/common.ui.jar
  - org.eclipse.emf.common.ui/runtime/common.ui.resources.jar
  - org.eclipse.emf.edit/runtime/edit.jar
  - org.eclipse.emf.edit/runtime/edit.resources.jar


Also, to produce the right .jar file for standalone execution of a
generated project, you need to copy the `plugin.properties` file and the
icons directory to the directory containing the EMF XyzPlugin for the
project. This will put the resources in just the right place to be found
by the generated XyzPlugin during standalone execution. Such a project
will work as both a plugin and for standalone execution.

### How do I convert code that runs in an Eclipse environment to a standalone environment?

In an Eclipse environment the EPackage.Registry.INSTANCE is populated at
startup time by the registrations of the models in the plugin.xml, e.g.,

`   `<extension
      point="org.eclipse.emf.ecore.generated_package">
`   `<package
      uri = "http://www.eclipse.org/xsd/2002/XSD"
      class = "org.eclipse.xsd.XSDPackage" />
`   `</extension>

But in a standalone environment, this doesn't happen, so you need to
register each package explicitly.

If you have a package Xyz, accessing XyzPackage.eINSTANCE will create
the package and register it in the registry.

So if you add the line XyzPackage.eINSTANCE.getEFactoryInstance() to
your initialization code, the Xyz package will be properly registered.

### If using EMF in a non-Eclipse environment is feasible (licensing issues), what if any, advantages does using EMF have over using JAXB?

EMF and XSD are definitely intended to support standalone execution
outside of Eclipse. Only the EMF jars are needed for standalone
execution (as described in the FAQ). Within IBM, you should discuss
licensing issues with the WSWB folks, since that's the supported
distribution vehicle for EMF and XSD within IBM. I don't believe there
are any issues as long as you stick to using released (i.e., supported)
drivers.

JAXB produces a simple Java API given an XML Schema and it does so using
essentially a black box design. EMF produces an Ecore model given an XML
Schema and then uses template-based generator technology to generate a
rich Java API (of hand written quality). The XML Schema to Ecore
conversion can be tailored, the templates used to generate the Java API
can be tailored, and the resulting Java API can be tailored. The
generator supports merging regeneration so that it will preserve your
hand written changes. In other words, EMF is far richer and more
flexible, and supports a broader subset of XML Schema (especially in
2.0, where wildcards and mixed content will be supported).

## Validation

### Can I use XSD to help create XML instances that are valid according to a given schema?

No, but [Knowledge Integration
Ltd](http://developer.k-int.com/OpenXSD/). uses XSD to help support this
kind of cabability and have shared their results under the GPL.

### Does the XSD library allow me to supply an instance document and have it validated against the schema?

Yes, you can use XMLProcessor, but it requires the EMF libraries too.
Here's how: [XMLSchema Validation With
XMLProcessor](XMLSchema_Validation_With_XMLProcessor "wikilink").

### Is there a built-in facility to check whether a given value is valid compared to the effective facets of its type?

To determine if a literal is valid with respect to a simple type, you
can use either `XSDSimpleTypeDefinition.isValidLiteral` or
`XSDSimpleTypeDefinition.assess`.

## Registration

### Do I have to pre-register my static, generated package when running stand-alone (outside of Eclipse)?

No. Use the OPTION_SCHEMA_LOCATION_IMPLEMENTATION option to avoid
pre-registration of your generated packages. This is the recommended
approach to using static SDO.

When a model instance is saved with this option set, an
xsi:schemaLocation attribute will be added to the document element,
associating the package's namespace URI with the qualified name of the
generated package interface. When the package is needed at load-time,
the eINSTANCE field of that interface will be reflectively accessed to
obtain it.

The following code shows how to set the option in the resource
associated with an SDO data graph:

`((XMLResource)eDataGraph.getDataGraphResource()).getDefaultSaveOptions()`
`  .put(XMLResource.OPTION_SCHEMA_LOCATION_IMPLEMENTATION, Boolean.TRUE);`

### Do I have to initialize and pre-register my dynamic packages?

No. The package needed to load a model instance will be automatically
loaded from its serialized form, if available.

The simplest approach is to use an accessible URL as the package's
namespace URI, and to make the package serialization available at that
location (for example, via HTTP). If found, the package will be loaded
with no additional effort.

If the package is available at a different physical location, whether
public or on the local filesystem, you can serialize the model instance
with the OPTION_SCHEMA_LOCATION to include that location, so that it
can be found at load-time.

First, create a resource and add your package to it. For example:

`ResourceSet set = new ResourceSetImpl();`
`Resource packageResource = set.createResource(URI.createURI("`<file:///c:/data/company.ecore>`"));`
`packageResource.getContents().add(companyPackage);`
`packageResource.save(null);`

Then, use the OPTION_SCHEMA_LOCATION when you serialize your model
instance:

`Resource resource = set.createResource(URI.createURI("`<file:///c:/data/company.xml>`"));`
`Resource.getContents.add(company);`
`Map options = new HashMap();`
`options.put(XMLResource.OPTION_SCHEMA_LOCATION, Boolean.TRUE);`
`resource.save(options);`

This adds an xsi:schemaLocation attribute to company.xml, associating
the company package's namespace URI with the physical URI
"company.ecore" (this relative URI is automatically computed, allowing
the two files to be relocated, together).

## Other Topics

### Are there any "real" example EMF models in Eclipse?

Well, for starters, EMF itself contains two interesting models. The
Ecore model serves as the meta-model for any EMF model you create -- it
is the model that describes the structure of your models. The Genmodel
controls generation of an EMF model. In fact, the generator UI that is
used in the tutorial is the EMF.Edit editor for the Genmodel, which
explains why it looks so much like the library editor in the tutorial.
If you want to explore Ecore and Genmodel further, you'll find their
Rose models and Java code in the EMF source package available on our
download page. Of course, the code produced by the EMF generator is
meant to be a starting place, so you'll see that much functionality has
been manually added to both of these models. But, it's quite easy to see
the same sort of generated patterns that appear in the simple library
example. Ecore is in the org.eclipse.emf.ecore plugin, the Genmodel is
in org.eclipse.emf.codegen.ecore, and its editor UI is in
org.eclipse.emf.codegen.ecore.ui. You'll find the Rose models in the
"model" subdirectory of the source for the former two plugins.

Finally, an even more complex example of an EMF model is XSD, the [XML
Schema Definition](http://www.eclipse.org/xsd), a subproject of the
Eclipse Technology Project. XSD models the concrete and abstract
relationships expressed in an XML schema document, providing an API to
manipulate the model and an XML-schema-specific replacement for EMF's
default XMI serialization. Of course, there's also an EMF.Edit-based XML
schema editor built on it.

### EMF is failing to load a resource. How can I make it recognize a non-standard archive URI scheme? Why does EMF fail to load resources when running on an application server or other specialized runtime?

EMF recognizes a couple of well known archive schemes, such as "`zip`"
and "`jar`", so everything will work fine if the URI of an archived
resource starts, for example, with "`zip:`". Although most applications
probably use one of these recognized schemes, you may find that certain
runtimes use a different one. For example, when running in the IBM
WebSphere Application Server, `Class.getResource(String)` may return a
URL with a "`wsjar`" scheme, like
"`wsjar:`<file:/C:/dev/ws/default/sample_app/xsd.resources.jar!/org/eclipse/xsd/plugin.properties>".
By default, EMF will not recognize this as an archive URI and will fail
to handle it correctly, probably resulting in multiple unregistered
resources errors and/or null pointer exceptions. If you are facing this
problem, you will need to change EMF's set of recognized archive
schemes. This is done by defining a property named
"`org.eclipse.emf.common.util.URI.archiveSchemes`", whose value is the
desired space-separated list of archive schemes. Here's an example of
how you could define it when invoking your Java application:

`java MyApp -Dorg.eclipse.emf.common.util.URI.archiveSchemes="wsjar wszip jar zip"`

### Does EMF support OMG XMI?

EMF uses OMG XML Metadata Interchange (XMI<sup>TM</sup>) 2.0 as the
default XML serialization format for Ecore models and Ecore instances.
The EMF framework allows the use of other serialization formats also.
The XMI 2.0 document production rules are used because of more compact
representation than XMI 1.2.

### Can I create an EMF model using OMG XMI?

Yes. The XMI document that conforms to the EMF Ecore model can be
directly edited using your favorite text or an XML editor. Alternately
you can use a modeling tool that can produce the XMI document from a UML
model. You can also use annotated Java interfaces to define your input
model.

### I'm generating EMF models from xsd files. To generate relations between entities I use the following syntax...

I'm generating EMF models from xsd files. To generate relations between
entities I use the following syntax, with the ecore:reference attribute
on xsd:element.

`   `<xsd:complexType name="Writer">
`   `<xsd:sequence>
`   `<xsd:element name="name" type="xsd:string"/>
`   `<xsd:element maxOccurs="unbounded" minOccurs="0"
    name="books" type="xsd:anyURI" ecore:reference="lib:Book"/>
`   `</xsd:sequence>
`   `</xsd:complexType>

But I have to generate this XSD schema and for this I need the schema
that defines the ecore namespace. Where can I find this schema ?

I don't think you actually need it in order to generate a schema like
the one below. The XML Schema spec defines the wildcard for these
"non-schema namespace attributes" like this:

<xs:anyAttribute namespace="##other" processContents="lax"/>

so no schema needs to exist for that namespace in order for the schema
to be valid, you only need to ensure that the prefix is defined.

### I have an element that comprises four sub-elements derived from type <xs:string>. How can I examine the contents of an <xs:complexType>? How could I programmatically determine its restrictions/enumerations etc?

Here's snippet of code that does some of the things you mention:

`void handle(XSDElementDeclaration xsdElementDeclaration)`
`{`
` XSDTypeDefinition xsdTypeDefinition =`
`   xsdElementDeclaration.getTypeDefinition();`
` if (xsdTypeDefinition instanceof XSDSimpleTypeDefinition)`
` {`
`   XSDSimpleTypeDefinition xsdSimpleTypeDefinition =`
`     (XSDSimpleTypeDefinition)xsdTypeDefinition;`
`   for (Iterator i = xsdSimpleTypeDefinition.getFacets().iterator();`
`     i.hasNext(); )`
`   {`
`     XSDFacet xsdFacet = (XSDFacet)i.next();`
`     if (xsdFacet instanceof XSDEnumerationFacet)`
`     {`
`       for (Iterator j =`
`         ((XSDEnumerationFacet)xsdFacet).getValue().iterator(); j.hasNext(); )`
`       {`
`         Object enumerator = j.next();`
`       }`
`     }`
`     else if (xsdFacet instanceof XSDPatternFacet)`
`     {`
`     }`
`     // ...`
`   }`
` }`
` else`
` {`
`   XSDComplexTypeDefinition xsdComplexTypeDefinition =`
`     (XSDComplexTypeDefinition)xsdTypeDefinition;`
`   switch (xsdComplexTypeDefinition.getContentTypeCategory().getValue())`
`   {`
`     case XSDContentTypeCategory.EMPTY:`
`     {`
`       break;`
`     }`
`     case XSDContentTypeCategory.SIMPLE:`
`     {`
`       XSDSimpleTypeDefinition xsdSimpleTypeDefinition =`
`         (XSDSimpleTypeDefinition)xsdComplexTypeDefinition.getContentType();`
`       break;`
`     }`
`     case XSDContentTypeCategory.ELEMENT_ONLY:`
`     case XSDContentTypeCategory.MIXED:`
`     {`
`       XSDParticle xsdParticle =`
`         (XSDParticle)xsdComplexTypeDefinition.getContentType();`
`       XSDTerm xsdTerm = xsdParticle.getTerm();`
`       if (xsdTerm instanceof XSDModelGroup)`
`       {`
`         XSDModelGroup xsdModelGroup = (XSDModelGroup)xsdTerm;`
`         for (Iterator i = xsdModelGroup.getParticles().iterator();`
`           i.hasNext(); )`
`         {`
`           XSDParticle childXSDParticle = (XSDParticle)i.next();`
`         }`
`       }`
`       else if (xsdTerm instanceof XSDElementDeclaration)`
`       {`
`       }`
`       else if (xsdTerm instanceof XSDWildcard)`
`       {`
`       }`
`       break;`
`     }`
`   }`
` }`
`}`

### How does setIncrementalUpdate() work?

You can use XSDSchema.setIncrementalUpdate(false) to turn off the
expensive global updates and set it back to true, or call
XSDSchema.update(), afterwards. Calling update() does not cause
setIncrementalUpdate(true). Attached to this state is the warning that
names will no longer be re-resolved and non-concrete relations will no
longer be recomputed. If you aren't relying on these to drive your
actions, it won't matter.

### How can I load a XSDSchema from a simple Java String or from a DOM Tree?

Assuming you do something much like what's in `XSDMainTest` in
`org.eclipse.xsd.test`, this should do the trick:

` ResourceSet resourceSet = new ResourceSetImpl();`
` XSDResourceImpl xsdMainResource =`
` (XSDResourceImpl)resourceSet.createResource(URI.createURI("*.xsd"));`
` xsdMainResource.setURI(uri);`
` if (fromString)`
` {`
`   xsdMainResource.load(`***`ByteArrayInputStream``   ``created``
 ``from``   ``String`***`, resourceSet.getLoadOptions());`
` }`
` else`
` {`
`   XSDSchema xsdSchema = XSDPackage.eINSTANCE.createXSDSchema();`
`   xsdSdchema.setElement(`***`your``   `<schema>`   ``element`***`);`
`   xsdMainResource.getContents().add(xsdSchema);`
` }`

### How do target namespaces work?

A complex type has an attribute reference to a simple xsd:integer
attribute. XSD provides an AttributeUse with an AttributeDeclaration.

WITHOUT a target namespace declaration at the top level, the
AttributeDeclaration has as typeDefintion an XSDSimpleTypeDefinitionImpl
with name "integer", fine.

WITH a target namespace declaration at the top level, the same
typeDefiniion field is null.

When the target namespace is null, the implicit ns="" declaration allows
you to reference the name without a prefix, but when you define a target
namespace, you need to define an xmlns prefix for that namespace and
youneed to use that prefix to reference any name in the namespace.

The actual declarations do not need to be qualified, and you'd expect
that references also default to the target namespace, but in fact they
do not. Your schema may validate using XSV, but according to the XML
Schema spec part 1, the ref must be qualified, unless you have an ns=.

### Can the XSD library be used outside of the Eclipse environment?

Yes, it can be used within Eclipse and outside of Eclipse.

For more information on working outside Eclipse, see the question [I
want to use XSD in my standalone project, or include only a working
subset of the code. What libraries (jar files) do I need in my
CLASSPATH?](#I_want_to_use_XSD_in_my_standalone_project.2C_or_include_only_a_working_subset_of_the_code._What_libraries_.28jar_files.29_do_I_need_in_my_CLASSPATH.3F "wikilink")

### What version of W3C XML Schema is accepted as input to XSD?

The version specified on May 2, 2001 as a W3C Recommendation. This
version is described in XML Schema Part 0: Primer, XML Schema Part 1:
Structures, and XML Schema Part 2: Datatypes.

### For XML Schema simple types that are not included in the table on p.140 of the EMF book...

For XML Schema simple types that are not included in the table on p.140
of the EMF book (or derived from these), the book says we should get an
EDataType with name equal to the XML Schema type, and instanceClassName
of java.lang.String.

Which is wrong - me, the book or the code?

Unfortunately, the book.

The book's companion web site (http://www.aw.com/budinsky/) includes an
Errata
(http://wps.aw.com/aw_budinsky_eclipsemod_1/0,7999,967283-,00.html).
You'll notice that this problem comes up twice: on page 82 and on page
140.

The book describes the way it used to work, and then the current,
simpler approach was adopted later on in the publishing cycle. The text
was never updated to reflect the change.

Please continue refer to the Errata when things don't seem quite right,
and do let us know if you find any other problems that we haven't caught
yet, so that we can keep it up to date.

### It appears to us that XSDEcoreBuilder ignores user information in an annotation - is this true? Isn't this supported by the XSDEcoreBuilder?

Yes, it is ignored right now, but it is definitely a work item on our
list (for the 2.0 stream) to be able to carry over XML Schema
documentation into the Ecore model and then reproduce it in the
generated Javadoc.

### What happens if I pass a DOM which claims to be the XML representation of a Schema, but there are errors in the attribute values? Is there a function to inquire "Is this parsed or constructed schema completely correct?"

The schema can be validated to diagnose all such errors. You can call
validate on a schema and check whether there are any diagnostics. The
diagnostics may include warnings or informational messages, in addition
to error messages.

### Is there a way to have schema documents which reference other schema documents through <include> <import> or <redefine> be fetched from locations other than those given in the schemaLocation attribute?

Yes, you can use a ResourceSet's URIConverter's URI map to map logical
URIs to physical URIs. You can see an example of that code in
XSDProtocotypicalSchema traceLoading().

### When modifications are made to a schema document which was used by another schema document (which has been loaded by this library), will my code need to explicitly make the corresponding modifications to the using schema document?

Yes.

### Does the o1.equals(o2) method determine "semantic equivalence" between two schema components?

This version of the code returns true if o1 and o2 are the same object,
otherwise it returns false.

### What happens if I add a schema component to schema2 that I had previously added to schema1?

It is removed from schema1. This package maintains referential integrity
for black diamond relations (in the UML), i.e., containment relations.
When you add/set to a black diamond relation, the object will be
effectively removed from the current black diamond relation and is then
added/set to the new relation.

### ComplexTypes and SimpleTypes only have at most 1 annotation. Why is there XSDTypeDefinition.getAnnotations() in addition to getAnnotation(). What is getAnnotations() used for?

There can be at most one annotation in the element information item in
the XML Representation of schema which is a <simpleType> or
<complexType>. But there can also be an annotation in the <restriction>,
<extension>, <list>, <union> (getDerivationAnnotation), as well as one
in the <simpleContent>, <complexContent> (getContentAnnotation) element
information items that are part of (children of) the simpleType or
complexType element information item. The list returned by
getAnnotations() is the list of all these annotations.

### If I used one of the getEffectivePROPERTY() methods with a simpleType of the LIST or UNION type...

If I used one of the getEffectivePROPERTY() methods with a simpleType of
the LIST or UNION type, would any of the facet information from the
itemType (in the case of List) or the memberTypes (in the case of union)
be used to adjust or supplement the values returned (as happens with a
simpleType which is atomic and derived by restriction from another
type)?

No. We follow the concepts of effective properties from the W3C Schema
specifications, which do not cause facets of the memberTypes or item
types to be used in the case of UNION or LIST.

### What can cause some of the resources in a resource set, which correspond to schema documents referenced by <include> <import> or <redefine>, to return null from (XSDResourceImpl)resource.getSchema()?

This could be seen if you iterate through the resource in a ResourceSet,
for example:

` for (Iterator resources = resourceSet.getResources().iterator();`
` resources.hasNext();)`
` {`
`     Resource resource = (Resource)resources.next();`
`     /* Now use getSchema() */`
` }`

If the <include> <import> or <redefine> contained a schemaLocation which
has a relative file path, the library will not resolve it, and this can
be a symptom.

To get around this problem, have code which is guaranteed to turn the
URI into an absolute URI. For example:

`   File file = new File(schemaURL);`
`   if (file.isFile())`
`   {`
`       schemaURL =`
`           URI.createFileURI(file.getCanonicalFile().toString()).toString();`
`   }`

### How is a declaration of an attribute or element that specifies <strong>anySimpleType</strong> processed?

Following the clarifications to the spec, it is permissible to use
<strong>anySimpleType</strong> in user schemas. However, it is an error
to extend or restrict this type except in the schema for schemas.

Note that an element declaration with an anyType will resolve its type
to the complex version of "anyType" and an attribute declaration with an
anyType will resolve its type to the simple version of "anyType"; an
element's type may be simple or complex, but an attribute's type must be
simple.

### When will <strong>getElement()</strong> return null when used against a component?

If the component you have has been synthesized,
<strong>getElement()</strong> will return null. For example, if you have
selected the effective pattern facet, the model synthesized that facet
from the zero or more concrete pattern facets. Another effective facet
that comes from zero to an unlimited number of concrete facets is the
enumeration facet.

If an <strong>XSDComplexTypeDefinition</strong> exists that extends
another one, normally a synthesized <strong>XSDModelGroup</strong> is
produced, containing one or more synthesized
<strong>XSDParticle</strong> objects; <strong>getElement()</strong>
against those components would also return null.

### To obtain a component of a schema by name, or find out such a component does not exist in the schema, what sequence of code should be used?

The resolveXXXDeclaration and resolveXXXDefinition methods declared in
Interface org.eclipse.xsd.XSDConcreteComponent allow lookup of
components that have names. Note that these methods always return
something. If your schema does not have the component you are looking
for, the returned value will be a newly manufactured reference to it.

Here is an example method to return the component or return null if it
was not in the schema, in this case for an Attribute Declaration with a
particular name:

`   /**`
`   return the XSDAttributeDeclaration of a given namespace and name`
`   defined in a given schema`
`   or a schema it includes, redefines or imports`
`   */`
`   static XSDAttributeDeclaration`
`       getAttributeDeclaration(XSDSchema schema, String namespace,`
`           String name)`
`   {`
`       XSDAttributeDeclaration`
`           ret=schema.resolveAttributeDeclaration(namespace,name);`
`       if (ret.getContainer() == null())`
`       {`
`           return null;`
`       }`
`       else`
`       {`
`           return ret;`
`       }`
`   }`

\===How can the attribute maxOccurs="unbounded" be set on a particle?===

Use XSDParticle.setMaxOccurs(-1) to set an unbounded value for
maxOccurs. XSDParticle.getMaxOccurs will return -1 if a particle has an
unbounded value for maxOccurs.

### When passed an object of type XSDSchema, what method tells me if it was parsed from a Resource?

xsdSchema.eResource() returns a Resource, if one is associated, or
returns nill. The Resource returned has methods such as getURI().

### When passed an object of type XSDSchema, what method permits me to alter the Resource in which it will be serialized?

r = xsdSchema.eResource() returns the Resource associated with an
XSDSchema. You may invoke r.setURI(uri) if you wish the schema to be
saved in the future to another location.

### How do I remove a component from the Schema?

There is generic support for remove in EMF: `EcoreUtil.remove` The
removed component will look like an unresolved reference to any
components that still reference it.

### If I want the library to parse a Schema from a file which does not have the extension <strong>.xsd</strong>, or serialize a Schema to a file which does not have the extension <strong>.xsd</strong>, what do I do?

As part of your initialization, for each extension that will contain
schemas (shown as foo in this example), you should call

`org.eclipse.emf.resource.Resource.Factory.Registry`
`  .INSTANCE.registerExtension("foo", new XSDResourceFactoryImpl());`

### Is there a function to inquire "Did this parsed schema have unresolved <include> <import> or <redefine> directives?"

You can write code like this:

`   if (xsdSchema.getAllDiagnostics().isEmpty())`
`   {`
`       xsdSchema.validate();`
`   }`
`   if (xsdSchema.getAllDiagnostics().isEmpty())`
`   {`
`       /* No Unresolved directives */`
`   }`
`   else`
`   {`
`       */ Unresolved directives or other problems */`
`   }`

### Is there a way to determine if a string represents a value that a particular simpleType would consider valid?

Yes. The call
`yourSimpleTypeDefinition.isValidLiteral("a-particular-string")` will
give you the boolean answer.

### When I used the method type.getBaseTypeDefinition(), how do I know when I've reached "the top" -- something like anyType?

For simpleTypes, you would write:

`   yourStopVariable =`
`   yourSchema.getSchemaForSchema().resolveSimpleTypeDefinition("anyType");`
`   /*`
`   as you loop through from one type definition to another,`
`   via getBaseTypeDefinition() you compare it to yourStopVariable`
`   */`

For complexTypes, you would write:

`   yourStopVariable =`
`   yourSchema.getSchemaForSchema().resolveComplexTypeDefinition("anyType");`
`   /*`
`   as you loop through from one type definition to another,`
`   via getBaseTypeDefinition() you compare it to yourStopVariable`
`   */`

If you are not sure if your time is simple or complex, you could write:

`   yourStopVariable =`
`   yourSchema.getSchemaForSchema().resolveTypeDefinition("anyType");`

There are recognizers of the special types in XSDConstants:

`   XSDConstants.isURType`
`   XSDConstants.isAnyType`
`   XSDConstants.isAnySimpleType`

### What method can be called to tell whether the resulting type definition is synthesized or whether it comes from an existing instance?

Because `td = resolveTypeDefinition(String nsuri, String name)` may
return an unresolved instance, which is synthesized to hold the
namespace and name, if an existing instance cannot be found, what method
can be called to tell whether the resulting type definition is
synthesized or whether it comes from an existing instance?

XSDConcreteComponent.getContainer() will yield null for `td` if
resolveTypeDefinition returned a synthesized type definition.

### What steps should I take to install the XSD code in one Eclipse project, and to identify another project with my own code as dependent upon and using the XSD library?

To install the source code in an Eclipse new project, follow these steps
:

  - unzip org.eclipse.xsd.zip in <XSD_HOME> directory
  - create a new Eclipse project and import into it the content of
    <XSD_HOME>/plugins/org.eclipse.xsd
  - set the directory containing the source of the new project to "src"
    (this directory was imported in the previous step)
  - add the following locations to the classspath:
      - <ECLIPSE_HOME>/plugins/org.apache.xerces_4.0.13
        /xercesImpl.jar;
      - <ECLIPSE_HOME>/plugins/org.apache.xerces_4.0.13
        /xmlParserAPIs.jar;
      - <XSD_HOME>/plugins/org.eclipse.emf.ecore_1.1.0
        /runtime/ecore.jar;
      - <XSD_HOME>/plugins/org.eclipse.emf.common_1.1.0
        /runtime/common.jar;
    <ECLIPSE_HOME> is the directory where Eclipse has been installed and
    <XSD_HOME> is the directory where xsd.zip has been unzipped.

To identify another project with your own code as dependent upon and
using this library, follow these steps :

  - make sure that you have created a new project containing the code of
    this library as indicated previously;
  - right click on the project folder which should use this library,
    click on "properties" popup menu item
  - then, in the java Build Path section, go to the Project pane and
    check the project you previously created for this library.

### What happens if I pass a DOM which claims to be the XML representation of a Schema, but there are errors in the attribute values? Is there a function to inquire "Is this parsed or constructed schema completely correct?"

The schema can be validated to diagnose all such errors. You can call
validate on a schema and check whether there are any diagnostics. The
diagnostics may include warnings or informational messages, in addition
to error messages.

### Is there a way to have schema documents which reference other schema documents through <include> <import> or <redefine> be fetched from locations other than those given in the schemaLocation attribute?

Yes, you can use a ResourceSet's URIConverter's URI map to map logical
URIs to physical URIs. You can see an example of that code in
XSDProtocotypicalSchema traceLoading().

### When modifications are made to a schema document which was used by another schema document (which has been loaded by this library), will my code need to explicitly make the corresponding modifications to the using schema document?

Yes.

### How does the model choose what prefix to use in QNAMEs for a namespace URI in serializing the schema, when more than one prefix has been associated with that namespace?

One of the prefixes, or the no-prefix, will be chosen, and used
consistently whenever an XML representation of schema in the form of a
DOM is requested. This version of the code does not allow you to select
which one will be chosen.
