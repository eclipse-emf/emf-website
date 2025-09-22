## Newbie /General

### What is EMF?

The [Eclipse Modeling Framework](http://www.eclipse.org/modeling/emf) is
a Java/XML framework for generating tools and other applications based
on simple class models. EMF helps you rapidly turn models into
efficient, correct, and easily customizable Java code. It is intended to
provide the benefits of formal modeling, but with a very low cost of
entry. In addition to code generation, it provides the ability to save
objects as XML documents for interchange with other tools and
applications. Models can be created using annotated Java, XML documents,
or modeling tools like Rational Rose, then imported into EMF. The code
generator turns a model into a set of Java implementation classes. These
classes are extensible and regenerable - you can modify them by adding
user-defined methods and instance variables. When the model changes, you
can regenerate the implementation classes, and your modifications will
be retained. This works both ways - changes in the Java code can be used
to update the model.

### Where can I get EMF?

Publicly available builds are [always
listed](http://www.eclipse.org/modeling/emf/news-whatsnew.php#build) on
the [EMF website](http://www.eclipse.org/modeling/emf/).

To download them, go to the [downloads
page](http://www.eclipse.org/modeling/emf/downloads/?project=emf) or
install them via [update
manager](http://www.eclipse.org/modeling/emf/updates/).

Details about what was fixed in a given build can be seen on our
[release
notes](http://www.eclipse.org/modeling/emf/news/relnotes.php?project=emf&version=HEAD)
page.

### How do I get started with EMF?

Start by reading the [overview documents and the
tutorials](http://www.eclipse.org/modeling/emf/docs/), followed by
[downloading the
driver](http://www.eclipse.org/modeling/emf/downloads/).

After going through the tutorial, you will have generated a completely
working editor from nothing but a picture of the object model (i.e., the
simple libarary model shown in the tutorial). If you run the generated
editor, you can add and remove books and authors, edit the properties
(e.g., the book title), copy, paste, drag-and-drop, etc. All with
unlimited undo/redo. You can also save the document (the default
framework serialization format is XMI).

The purpose of the tutorial is to illustrate the power of a model driven
architecture (MDA). By providing a model for the data your application
will manipulate, you can use EMF to generate a Java implementation for
you. EMF.Edit can leverage the same model (meta) data to generate view
support and even a working editor. Read the overview documents for more
details.

### What version of Eclipse do I need for EMF and XSD? Which EMF version will run on my Eclipse version?

The most recent version requirements and [bleeding
edge](http://www.eclipse.org/modeling/emf/docs/#whatsnew) information
about requirements can be seen on the [EMF
Downloads](http://www.eclipse.org/modeling/emf/downloads/?project=emf)
page.

  - EMF <b>2.4.x</b> runs on Eclipse <b>3.4.x</b>.
  - EMF <b>2.3.x</b> runs on Eclipse <b>3.3.x</b>.

:\* EMF 2.3 includes support for
[generics](EMF_2.3_Generics "wikilink"), and therefore requires [JDK
1.5](EMF_2.3_JVM_Requirements "wikilink") (generator/runtime).

:\* EMF 2.3 can generate code that will run on JDK 1.4.2. See [Runtime /
Compilation
Compatibility](EMF_2.3_JVM_Requirements#Runtime_.2F_Compilation_Compatibility "wikilink").

  - EMF <b>2.2.x</b> runs on Eclipse <b>3.2.x</b>.
  - EMF <b>2.1.x</b> runs on Eclipse <b>3.1.x</b>.
  - EMF <b>2.0.2</b> through <b>2.0.5</b> run on Eclipse <b>3.0.2</b>.
    EMF <b>2.0</b> & <b>2.0.1</b> run on Eclipse <b>3.0</b> &
    <b>3.0.1</b>.
  - EMF <b>1.0</b> & <b>1.1</b> run on Eclipse <b>2.0</b> & <b>2.1</b>.

### What minimum version of Java do I need?

  - EMF <b>2.4.x</b> requires JRE 1.5 or later.
  - EMF <b>2.3.x</b> requires JRE 1.5 or later.
  - EMF <b>2.2.x</b> requires JRE 1.4.2 or later.
  - EMF <b>2.1.x</b> requires JRE 1.4.2 or later.
  - EMF <b>2.0.x</b> requires JRE 1.3.1 or later.
  - EMF <b>1.x</b> requires JRE 1.3.1 or later.

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
Schema Infoset Model](http://www.eclipse.org/xsd), a subproject of the
Eclipse Technology Project. XSD models the concrete and abstract
relationships expressed in an XML schema document, providing an API to
manipulate the model and an XML-schema-specific replacement for EMF's
default XMI serialization. Of course, there's also an EMF.Edit-based XML
schema editor built on it. For more on XML Schema, see the [XSD
FAQ](MDT-XSD-FAQ "wikilink").

### How does EMF perform in regard to serializing to relational databases? I am wondering if this framework suits central repository servers, where hundreds of thousand of instances are present. When is it mandatory to have a relational database as the EMF's object serialization target?

There is no out of the box EMF support for RDB persistence, but several
people have done or are doing such things themselves. It involves
customized resources, or in the case of SDO - mediators. See also
[CDO](http://www.eclipse.org/emft/projects/cdo/) and
[Teneo](http://www.eclipse.org/emft/projects/teneo/).

### If using EMF in a non-Eclipse environment is feasible (licensing issues), what if any, advantages does using EMF have over using JAXB?

EMF and XSD are definitely intended to support standalone execution
outside of Eclipse.Only the EMF jars are needed for standalone execution
(as described in the FAQ).Within IBM, you should discuss licensing
issues with the IBM Eclipse SDK folks, since that's the supported
distribution vehicle for EMF and XSD within IBM.I don't believe there
are any issues as long as you stick to using released (i.e., supported)
drivers.

JAXB produces a simple Java API given an XML Schema and it does so using
essentially a black box design.EMF produces an Ecore model given an XML
Schema and then uses template-based generator technology to generate a
rich Java API (of hand written quality).The XML Schema to Ecore
conversion can be tailored, the templates used to generate the Java API
can be tailored, and the resulting Java API can be tailored.The
generator supports merging regeneration so that it will preserve your
hand written changes.In other words, EMF is far richer and more
flexible, and supports a broader subset of XML Schema (especially in
2.0, where wildcards and mixed content will be supported). See
<http://www.theserverside.com/tt/articles/article.tss?l=BindingXMLJava>
for more details.

### Why does EMF need a GenModel as well as an Ecore model to generate code?

The GenModel is a decorator model for the Ecore model. It specifies
information not available in the Ecore model and gives fine grained
control over what's generated. For example, the Ecore model doesn't
indicate where the code should be generated and what the plugin ID (if
any) for that target should be; that's specified in the GenModel. The
GenModel also lets you choose among various generation patterns. For
example, do you want root interfaces to extend EObject, nothing, or
something of your own choosing? And do you want to generate an editor
that targets the Eclipse Rich Client Platform versus the Eclipse
Integrated Development Environment? So you can think of the GenModel as
a giant parameter for controlling and tailoring the code generation
process.

## Development

### EMF is failing to load a resource. How can I make it recognize a non-standard archive URI scheme? Why does EMF fail to load resources when running on an application server or other specialized runtime?

EMF recognizes a couple of well known archive schemes, such as "`zip`"
and "`jar`", so everything will work fine if the URI of an archived
resource starts, for example, with "`zip:`".Although most applications
probably use one of these recognized schemes, you may find that certain
runtimes use a different one.For example, when running in the IBM
WebSphere Application Server, `Class.getResource(String)` may return a
URL with a "`wsjar`" scheme, like
"`wsjar:`<file:/C:/dev/ws/default/sample_app/xsd.resources.jar!/org/eclipse/xsd/plugin.properties>".
By default, EMF will not recognize this as an archive URI and will fail
to handle it correctly, probably resulting in multiple unregistered
resources errors and/or null pointer exceptions. If you are facing this
problem, you will need to change EMF's set of recognized archive
schemes. This is done by defining a property named
"`org.eclipse.emf.common.util.URI.archiveSchemes`", whose value is the
desired space-separated list of archive schemes.Here's an example of how
you could define it when invoking your Java application:

`java MyApp -Dorg.eclipse.emf.common.util.URI.archiveSchemes="wsjar wszip jar zip"`

### Is there a built-in facility to check whether a given value is valid compared to the effective facets of its type?

To determine if a literal is valid with respect to a simple type, you
can use either `XSDSimpleTypeDefinition.isValidLiteral` or
`XSDSimpleTypeDefinition.assess`.

### I have a simple model consisting of a root that contains a single EList of children.The child type contains several attributes.I would like to create a custom editor such that the model is completely displayed in a table. How should I start? Overload getText() on the child item provider, and just return null for a property descriptor?

Try working within the generated editor and updating the tab with
existing table viewer support there until you have it working nicely.
You might want a plain table or a table tree.You can add some more
columns in the editor for the table/table tree and then use your item
provider's implementation of ITableItemLabelProvider to populate the
additional columns.Property descriptors will only be used when they are
needed, so you don't have to do anything to hide them.

### How big a job would it be to get the EMF editor generator to spit out Swing editor code instead of SWT/JFace code?

You'd want something similar to org.eclipse.emf.edit.ui, but for binding
the platform independent .edit support to Swing instead of to Eclipse,
and you'd want to replace the editor templates with stuff for Swing.
It's not a trivial task, but not a huge one either.

### Are there any examples of EMF used standalone?

Yes, definitely. In fact, SDO (Service Data Objects) is a standalone
application of EMF.
[Javadoc](http://download.eclipse.org/tools/emf/sdo/javadoc),
[Download](http://www.eclipse.org/modeling/emf/downloads/).

### Is it possible to convert back from EMF model (ecore files or generated Java code?) to UML?

It's possible in theory, but we don't have anything like the working in
practice.It shouldn't be too difficult to do the Ecore to UML2
conversion using Eclipse's EMF-based UML2 model.

Check the uml2 newsgroup. They may have plans or already have an Ecore
model importer.

### As of EMF 2.0.0.I20040408, it seems like the code templates in chapter 14.2.3 in the emf-book needs to be rewritten. Is this already done and published somewhere?

The existing mechanisms should continue to work, but will result in
deprecation warnings for 2.0. The framework was generalized so that a
number of places where only EReference was supported, now
EStructuralFeature is supported. It would certainly be a FAQ worthy
addition to outline the places where such changes would be made.

### Can I link parts of UML diagrams to portions of the code in the EMF editor?

Yes, but the [UML2
project](http://www.eclipse.org/modeling/mdt/?project=uml2#uml2) should
be able to provide you with most of the "model" code that you need, and
the [GEF project](http://www.eclipse.org/gef) will give you a huge
head-start when it comes to creating the "view" and "controller" bits.

I would guess that the best approach when it comes to linking your model
and code would be via the JET framework which is part of EMF, this will
handle most of the merging issues for you.

### Is there an electronic version of the EMF book?

There's an IBM "RedBook" on GEF which also has some chapters on EMF in
it, it's a free download at
<http://www.redbooks.ibm.com/redbooks/pdfs/sg246302.pdf>. You can buy an
electronic copy of the book here:
<http://www.awprofessional.com/titles/0131425420>. It's also available
on Safari Books Online (with subscription) at
<http://my.safaribooksonline.com/book/software-engineering-and-development/ide/9780321331885>.

### Is there a clean way to use an EMF model's generated editor in a standalone application?

The .edit projects can be used standalone (although you'd need to put
the plugin.properties and icons into a resource jar), but the .editor
projects are tightly integrated Eclipse components that will only
function within an Eclipse environment.

For more information on working outside Eclipse, see the question
<i>"How do I use EMF in standalone applications (such as an ordinary
main)?\]"</i>.

### I want to use EMF, SDO, or XSD in my standalone project, or include only a working subset of the code. What libraries (jar files) do I need in my CLASSPATH?

<b>Eclipse Modeling Framework (EMF)</b> provides the infrastructure to
run the generated models and dynamic model based on existing ecore
files. It also provides XMI/XML serialization and deserialization.

The following jars can be used in standalone mode. Jars are found under
the plugins directory of your Eclipse installation, e.g.
`org.eclipse.emf.common_`<b>`2.3.0`</b>`.v200706262000.jar`.

Add to the following jars to your CLASSPATH or copy them into your
project. For EMF 2.3.0, this includes, but is not limited to:

  - `org.eclipse.emf.common_2.3.0.v200706262000.jar`
  - `org.eclipse.emf.ecore_2.3.0.v200706262000.jar`
  - `org.eclipse.emf.ecore.change_2.3.0.v200706262000.jar`
  - `org.eclipse.emf.ecore.xmi_2.3.0.v200706262000.jar`

<b>Service Data Objects (SDO)</b> is an API specification in the format
of Java interfaces and the EMF implementation that requires the EMF jars
above and the following jars to be used in standalone mode:

  - `org.eclipse.emf.commonj.sdo_2.3.0.v200706262000.jar`
  - `org.eclipse.emf.ecore.sdo_2.3.0.v200706262000.jar`

<b>XML Schema Infoset Model (XSD)</b> is a reference library for use
with any code that manipulates XML schemas and requires the EMF jars
above and the following jars to be used in standalone mode:

  - `org.eclipse.xsd_2.3.0.v200706262000.jar`

For more information on working outside Eclipse, see the question [How
do I use EMF in standalone applications (such as an ordinary
main)?](EMF/FAQ#How_do_I_use_EMF_in_standalone_applications_\(such_as_an_ordinary_main\)? "wikilink").
See also [Standalone Zip removed in EMF
2.3](EMF_2.3:_Standalone_Zip_Removed "wikilink"). For EMF 2.1
standalone, see [the archives](EMF-FAQ_\(Archived\) "wikilink").

### Does it matter what node in the genmodel tree I invoke Generate from?

Definitely. To do a full generation, you need to invoke "Generate" or
"Generate EMF.Edit" from the root node in the genmodel editor. If you
invoke Generate lower down, you'll only generate the files associated
with the selected subtree.

### Can model classes be in the Java default package?

No. EMF does not allow model classes to be in the default Java package
because it would need to be handled specially in the code generator, and
since it's not a good Java convention anyway, we don't think it is worth
supporting. Make sure that if you load your model from annotated Java
that all the interfaces and classes with an @model tag also have an
explicit package declaration.

### Can annotated Java files use \* imports?

Currently no. Until our Java name lookup mechanisms are improved, we
really rely on explicit imports to resolve names, i.e., two \* imports
would confuse the code. It's best to entirely avoid \* imports for the
time being. We will improve identifier lookup in the coming weeks.

### Does regeneration/merge work for properties and plugin.xml files?

Not yet. The current generator does not support merge for the
plugin.properties and plugin.xml files, so it will not overwrite them if
they exist. If you want to regenerate them, you'll need to remove or
rename them before regenerating. This will also be improved in the
future.

### How do I use EMF in standalone applications (such as an ordinary main)?

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

`ResourceSet rs = new ResourceSetImpl();`
`rs.getResourceFactoryRegistry().getExtensionToFactoryMap().put("xml", new XMLResourceFactoryImpl());`

In addition, you'll also need to register your package, which happens as
a side effect of accessing XyzPackage.eINSTANCE. For example, to
register the library model, add the following line to your main program:

`LibraryPackage.eINSTANCE.eClass();`

You need to add to the CLASSPATH all the jars for the plugins (and their
dependent plugins) that you want to use standalone. The list is
dependent on exactly what plugins you want to use and is available by
looking at the runtime libraries in their `plugin.xml` files. This
includes, but is not limited to:

  - org.eclipse.emf.common_2.3.0.v200706262000.jar
  - org.eclipse.emf.ecore_2.3.0.v200706262000.jar
  - org.eclipse.emf.ecore.xmi_2.3.0.v200706262000.jar

The jars are found under the plugins directory of your Eclipse
installation. There will be a release number appended to the plugin
name, e.g. org.eclipse.emf.common<b>_2.3.0.v200706262000</b>.

For EMF.Edit you would also have to add the following jar files to your
classpath:

  - org.eclipse.emf.common.ui_2.3.0.v200706262000.jar
  - org.eclipse.emf.edit_2.3.0.v200706262000.jar

See also [EMF/FAQ\#I want to use EMF, SDO, or XSD in my standalone
project, or include only a working subset of the code. What libraries
(jar files) do I need in my
CLASSPATH?](EMF/FAQ#I_want_to_use_EMF,_SDO,_or_XSD_in_my_standalone_project,_or_include_only_a_working_subset_of_the_code._What_libraries_\(jar_files\)_do_I_need_in_my_CLASSPATH? "wikilink")
and [Standalone Zip removed in EMF
2.3](EMF_2.3:_Standalone_Zip_Removed "wikilink"). For EMF 2.1
standalone, see [the archives](EMF-FAQ_\(Archived\) "wikilink").

### How do I make my EMF standalone application Eclipse-aware?

An EMF standalone application may make use of some useful Eclipse
facilities.

EcorePlugin.ExtensionProcessor.process(null) may be invoked to analyze
the plugin.xml files on the application's classpath and populate EMF
registries from EMF extension points in the same way that they would be
if EMF had started under OSGI. This can avoid the need for manual
initialization of extension to ResourceFactory mappings and registration
of known EPackages.

A resourceSet may be initialized by

`resourceSet.getURIConverter().getURIMap().putAll(EcorePlugin.computePlatformURIMap(false));`

to install mappings from <platform:/resource/xxx> to
<platform:/plugin/xxx> to <file:/location/of/xxx>. This allows a user
file to be opened as

`resourceSet.getResource(URI.createPlatformResourceURI("xxx/model/XXX.ecore"), true));`

It is not necessary to know where project xxx is. Relative (../..)
navigation between platform: scheme files then works in the same way as
within Eclipse even though the multiple projects may not all be at
similar filesystem locations.

### How do I use EMF in a minimal OSGi application?

To use EMF in a minimal OSGi application that does not contain
org.eclipse.core.runtime, you need to set the system property
*org.eclipse.emf.ecore.EPackage.Registry.INSTANCE* to avoid classloading
issues.

`-Dorg.eclipse.emf.ecore.EPackage.Registry.INSTANCE=org.eclipse.emf.ecore.impl.EPackageRegistryImpl`

The reason behind this is that without org.eclipse.core.runtime
activated in the runtime, EMF considers the runtime to be a standalone
application. In this scenario it uses a classloader aware registry. This
way loading a model can result in a PackageNotFoundException, although
the initialization was processed without errors. By setting the system
property the EPackageRegistryImpl is used, which is also the default in
cases where org.eclipse.core.runtime is available.

### I get a PackageNotFoundException: e.g., "Package with uri 'http://com.example.company.ecore' not found." What do I need to do?

When an EMF model instance (or SDO data graph) is loaded from its
serialized form, the resource needs to obtain the correct metamodel,
which is to be instantiated. The metamodel, represented by EMF as an
EPackage, must be available (either in memory, or in serialized form),
and EMF must be able to locate it from its namespace URI, which appears
in the serialized model instance.
There are number of different ways this can occur, depending on a number
of factors:

  - Static or dynamic: static means code has been generated at
    development time to implement the model; dynamic means no code has
    been generated and the metamodel is built in memory.
  - Eclipse or standalone: you may be running your code under or outside
    of Eclipse. The latter is referred to as standalone.
  - EMF or SDO: you may be using non-SDO EMF, or SDO.

When using static SDO standalone, it is recommended to follow the
instructions described under <i>"Do I have to pre-register my static,
generated package when running standalone (outside of Eclipse)?"</i>

If you are using static EMF, the generated package interface (e.g.
CompanyPackage) will include a static field called eINSTANCE. Accessing
this field will cause the package to be initialized and registered in
the global package registry, allowing any resource to locate it. For
example, the following code accesses the eINSTANCE field of
CompanyPackage:

`CompanyPackage packageInstance = CompanyPackage.eINSTANCE;`

When running under Eclipse, this step is unnecessary, as a plug-in
manifest file drives automatic package registration.

In SDO, the package can be included in the serialized data graph, along
with the instance data that requires it. This is one option with
dynamic, for example. To do so, refer to <i>"How do I serialize the
model of an SDO data graph?"</i>

To register a dynamic model, refer to <i>"How do I register a dynamic
package?"</i> Alternatively, the metamodel can be automatically loaded
from its serialized form. For details, refer to <i>"Do I have to
initialize and pre-register my dynamic packages?"</i>

### I get a DanglingHREFException: e.g., "org.eclipse.emf.ecore.xmi.DanglingHREFException: The object 'com.example.Foo@2f5dda ()' is not contained in a resource." What do I need to do?

All objects need to be contained by a resource in order to be
serialized. That implies that for EObject x to be serialized, it must be
the case that x.eResource() \!= null. The resource will be non-null if
either x is directly contained by a resource, i.e., if for Resource r,
r.getContents().contains(x), or if x has a container that in turn is
contained by a resource, i.e., if for Resource r,
r.getContents().contains(x.eContainer()). This definition is recursive.
So an object must be contained by a resource directly, or indirectly by
virtue of being part of a containment reference where, recursively, the
container too must be contained by a resource.

So if you get the above exception, that means you have some object x
contained by a resource r that refers to another object y, that is not
directly or indirectly contained by any resource. It's possible to make
the EReference feature used by x to refer to y be transient, so that
it's not saved at all, or to make it a containment reference, so that y
is contained by the same resource as x, but barring changes to the Ecore
model itself, the one and only way to solve this problem is to add y to
some resource, i.e., r.getContents().add(y), or to add/set it to some
containment reference of an object z, i.e., z.getYs().add(y), where z is
already contained by a resource, i.e., z.eResource() \!= null.

### Do I have to pre-register my static, generated package when running standalone (outside of Eclipse)?

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
`.put(XMLResource.OPTION_SCHEMA_LOCATION_IMPLEMENTATION, Boolean.TRUE);`

### How do I register a dynamic package?

In order for EMF to locate a dynamic package that has been built up
programmatically, it must be registered in a package registry. For
example, the following code globally registers companyPackage:

`EPackage.Registry.INSTANCE.put(companyPackage.getNsURI(), companyPackage);`

Each resource set has its own local package registry, which is consulted
before the global registry. To avoid collisions, you may prefer to
register the dynamic package locally, instead of globally:

`ResourceSet set = new ResourceSetImpl();`
`set.getPackageRegistry().put(companyPackage.getNsURI(), companyPackage);`

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

### How can I ensure that an xsi:schemaLocation is serialized for my packages?

The save option XMLResource.OPTION_SCHEMA_LOCATION must be used to
indicate that you want to serialize schema location information. Even
when this option is used, the schema location is serialized only if the
ePackage.getNsURI() is different from ePackage.eResource().getURI() to
avoid useless schema locations of the form
xsi:schemaLocation="<http://www.example.org/Xyz>
<http://www.example.org/Xyz>". For a generated package, the
initializePackageContents contains this:

``` java
// Create resource
createResource(eNS_URI);
```

Adding a method like this:

``` java5
@Override
protected Resource createResource(String uri)
{
  return super.createResource("http://www.example.org/Xyz.ecore");
}
```

is a good way to specify a physical location of the schema. It's best to
specify an absolute URI as the location. EMF will serialize a relative
location if there is a relative path from the URI of document being
serialized to the schema location itself.

See also: [Saving the xsi:schemaLocation into EMF XMI file - Eclipse
Driven Rich Application Development
Blog](http://eclipsedriven.blogspot.com/2010/12/saving-xsischemalocation-into-emf-xmi.html)

### Is there a built-in facility to check whether a given value is valid compared to the effective facets of its type?

To determine if a literal is valid with respect to a simple type, you
can use either `XSDSimpleTypeDefinition.isValidLiteral` or
`XSDSimpleTypeDefinition.assess`

### I'm generating EMF models from xsd files. To generate relations between entities I use the following syntax, with the ecore:reference attribute on xsd:element...

<xsd:complexType name="Writer">
<xsd:sequence>
<xsd:element name="name" type="xsd:string"/>
<xsd:element maxOccurs="unbounded" minOccurs="0"
 name="books" type="xsd:anyURI" ecore:reference="lib:Book"/>
</xsd:sequence>
</xsd:complexType>

<i>... but I have to generate this XSD schema and for this I need the
schema that defines the ecore namespace. Where can I find this
schema?</i>

I don't think you actually need it in order to generate a schema like
the one below.The XML Schema spec defines the wildcard for these
"non-schema namespace attributes" like this:

<xs:anyAttribute namespace="##other" processContents="lax"/>

so no schema needs to exist for that namespace in order for the schema
to be valid, you only need to ensure that the prefix is defined.

### I have an element that comprises four sub-elements derived from type <xs:string>. How can I examine the contents of an <xs:complexType>? How could I programmatically determine its restrictions/enumerations/etc.?

Here's snippet of code that does some of the things you mention:

``` java
 void handle(XSDElementDeclaration xsdElementDeclaration)
  {
  XSDTypeDefinition xsdTypeDefinition =
  xsdElementDeclaration.getTypeDefinition();
  if (xsdTypeDefinition instanceof XSDSimpleTypeDefinition)
  {
  XSDSimpleTypeDefinition xsdSimpleTypeDefinition =
   (XSDSimpleTypeDefinition)xsdTypeDefinition;
  for (XSDFacet xsdFacet : xsdSimpleTypeDefinition.getFacets())
  {
   if (xsdFacet instanceof XSDEnumerationFacet)
   {
  for (Object enumerator : ((XSDEnumerationFacet)xsdFacet).getValue())
  {
  }
   }
   else if (xsdFacet instanceof XSDPatternFacet)
   {
   }
   // ...
  }
  }
  else
  {
  XSDComplexTypeDefinition xsdComplexTypeDefinition =
   (XSDComplexTypeDefinition)xsdTypeDefinition;
  switch (xsdComplexTypeDefinition.getContentTypeCategory().getValue())
  {
   case XSDContentTypeCategory.EMPTY:
   {
  break;
   }
   case XSDContentTypeCategory.SIMPLE:
   {
  XSDSimpleTypeDefinition xsdSimpleTypeDefinition =
  (XSDSimpleTypeDefinition)xsdComplexTypeDefinition.getContentType();
  break;
   }
   case XSDContentTypeCategory.ELEMENT_ONLY:
   case XSDContentTypeCategory.MIXED:
   {
  XSDParticle xsdParticle =
  (XSDParticle)xsdComplexTypeDefinition.getContentType();
  XSDTerm xsdTerm = xsdParticle.getTerm();
  if (xsdTerm instanceof XSDModelGroup)
  {
  XSDModelGroup xsdModelGroup = (XSDModelGroup)xsdTerm;
  for (XSDParticle childXSDParticle : xsdModelGroup.getParticles())
  {
  }
  }
  else if (xsdTerm instanceof XSDElementDeclaration)
  {
  }
  else if (xsdTerm instanceof XSDWildcard)
  {
  }
  break;
   }
  }
  }
 }
```

### How does setIncrementalUpdate() work?

You can use XSDSchema.setIncrementalUpdate(false) to turn off the
expensive global updates and set it back to true, or call
XSDSchema.update(), afterwards. Calling update() does not cause
setIncrementalUpdate(true). Attached to this state is the warning that
names will no longer be re-resolved and non-concrete relations will no
longer be recomputed.If you aren't relying on these to drive your
actions, it won't matter.

### How can I load a XSDSchema from a simple Java String or from a DOM Tree?

Assuming you do something much like what's in `XSDMainTest` in
`org.eclipse.xsd.test`, this should do the trick:

`ResourceSet resourceSet = new ResourceSetImpl();`
`XSDResourceImpl xsdMainResource =`
`(XSDResourceImpl)resourceSet.createResource(URI.createURI("*.xsd"));`
`xsdMainResource.setURI(uri);`
`if (fromString)`
`{`
` xsdMainResource.load(/* ByteArrayInputStream created from`
` String */, resourceSet.getLoadOptions());`
`}`
`else`
`{`
` XSDSchema xsdSchema =`
` XSDPackage.eINSTANCE.createXSDSchema();`
` xsdSdchema.setElement(/* your `<schema>` element */);`
` xsdMainResource.getContents().add(xsdSchema);`
`}`

### How do I convert code that runs in an Eclipse environment to a standalone environment?

In an Eclipse environment the EPackage.Registry.INSTANCE is populated at
startup time by the registrations of the models in the plugin.xml, e.g.,

<extension
 point="org.eclipse.emf.ecore.generated_package">
<package
 uri = "<nowiki><http://www.eclipse.org/xsd/2002/XSD></nowiki>`"`
`class = "org.eclipse.xsd.XSDPackage" />`
</extension>

But in a standalone environment, this doesn't happen, so you need to
register each package explicitly.

If you have a package Xyz, accessing XyzPackage.eINSTANCE will create
the package and register it in the registry.

So if you add the line XyzPackage.eINSTANCE.getEFactoryInstance() to
your initialization code, the Xyz package will be properly registered.

### How do I create a Map in EMF?

An EMap is basically a List of java.util.Map$Entry instances. Therefore
to create a Map you need to first model your map entry by following
these steps:

1.  Create an EClass with the name \[Type1\]To\[Type2\]Map where
    \[Type1\] represents the key's type and the \[Type2\] represents the
    value's type.
2.  Set the Instance Class Name property of the newly created EClass to
    java.util.Map$Entry.
3.  Create an EAttribute or EReference named "key" and set the EDataType
    or EClass for it.
4.  Create an EAttribute or EReference called "value" and set the
    EDataType or EClass for it.



Now, when you create an EReference somewhere that uses this map entry
class as its EClass, the EMF code generator will detect this special
case and generate a properly typed EMap getter/setter for you instead of
a normal EList getter/setter. For example, in any EClass where you would
like to have a map using the map entry type you defined above, do the
following:

1.  Create an EReference with its EClass set to be the map-entry class
    you created above.
2.  Set the Containment property of your EReference to be true.
3.  Set the upper-bound of your EReference to be -1 (unbounded).



Generate the code and see your map work.

A similar approach works with **XML Schema**. You need to make the
ecore:instanceClass of the <complexType> be java.util.Map$Entry and you
need to ensure that there is a feature called "key" and a feature called
"value". If the complex type does not contain an element or attribute
with these names, an ecore:name annotation can be used to give an
element or attribute an Ecore name different from the one that will be
used to read and write the XML instance. Here's an example that assumes
that the ecore prefix is defined as
xmlns:ecore="http://www.eclipse.org/emf/2002/Ecore":
<xsd:complexType ecore:instanceClass="java.util.Map$Entry" name="StringToStringMapEntry">

`   `<xsd:attribute name="source" ecore:name="key" type="xsd:string"/>
`   `<xsd:attribute name="target" ecore:name="value" type="xsd:string"/>
` `</xsd:complexType>

With help from Marco and Malai\!

In **Annotated Java**, some care must be taken to have a Map being
modeled equivalent to the above, i.e., an EReference to an
(automatically generated) \[Type1\]To\[Type2\]MapEntry class:

``` java5
/**
 * @model keyType="java.lang.String" valueType="java.lang.String"
 */
Map<String, String> getScoScoMap();
```

Omitting the keyType and valueType annotations would result in the Map
being modeled as an EAttribute, which would get serialized in XML as a
hex value using Java serialization, unless you specialize the
createFromString and convertToString methods for the map EDataType. In
the above correct example, the type information in the annotations and
Java type parameters is redundant; generally one would specify a
reference to the exact EDataType rather than just repeating the Java
type information, i.e., org.eclipse.emf.ecore.EString or
org.eclipse.emf.ecore.xml.type.String. The desired result in the Ecore
model looks like this:

``` xml
    <eStructuralFeatures xsi:type="ecore:EReference" name="scoScoMap" upperBound="-1"
        eType="#//EStringToEStringMapEntry" containment="true" resolveProxies="false"/>
```

The above could also be specified using this approach of explicitly
referring to the map entry EClass:

``` java5
/**
 * @model mapType="org.eclipse.emf.ecore.EStringToStringMapEntry<org.eclipse.emf.ecore.EString, org.eclipse.emf.ecore.EString>"
 */
Map<String, String> getScoScoMap();
```

For completeness, another form is supported:

``` java5
/**
 * @model kind="reference"
 */
Map<String, String> getScoScoMapNoTypeAnnotations();
```

This results in:

``` java5
<eStructuralFeatures xsi:type="ecore:EReference" name="scoScoMapNoTypeAnnotations">
    <eGenericType eClassifier="#//Map">
      <eTypeArguments eClassifier="ecore:EDataType http://www.eclipse.org/emf/2002/Ecore#//EString"/>
      <eTypeArguments eClassifier="ecore:EDataType http://www.eclipse.org/emf/2002/Ecore#//EString"/>
    </eGenericType>
</eStructuralFeatures>
```

So, for best results, **it is recommended to use keyType and valueType
annotations or a mapType annotation** for Maps in annotated Java code.

See also:
<http://tweakeclipse.blogspot.com/2009/02/create-maps-in-emf-other-way.html>

### What are Dynamic Templates?

*Dynamic Templates* allow overriding of the built-in EMF templates. They
are called "dynamic" because the code generators are dynamically created
from the templates. The built-in templates are considered "static" as
the code generators were already generated when EMF shipped.

### How do I use Dynamic Templates?

1.  Open the EMF Generator editor on a .genmodel file
2.  Right click in the editor and select **Show Properties View**
3.  Under **Templates & Merge** do the following:
    1.  Change **Dynamic Templates** to **true**
    2.  Optionally change **Force Overwrite** to **true**
    3.  Set **Template Directory** to the new templates directory, e.g.
        **<project name>/templates**
4.  Now you can selectively override the built-in templates by copying
    the templates from
    plugins/org.eclipse.emf.codegen.ecore_<version>.jar/templates. Make
    sure you keep the same template folder structure.
5.  If you want to include a dynamic template in Class.javajet like
    **\<%@ include file="Class/interface.javadoc.override.javajetinc"
    %\>** then place your interface.javadoc.override.javajetinc in
    **<project name>/templates/model/Class/**

### How can I easily listen to changes for a specific object?

Given eObject of type EObject you can listen to its changes like this:

`eObject.eAdapters().add`
`  (new AdapterImpl()`
`   {`
`     @Override`
`     public void notifyChanged(Notification msg)`
`     {`
`       // Look at notification to see what's changed.`
`     }`
`   });`

Any modeled object can be cast to EObject, even if it doesn't extend
EObject in its generated interface. Keep in mind that you will often
need to clean up these adapters, i.e., remove them from the eAdapters()
list, when they are no longer needed, i.e., when the view that adds them
is disposed.

### How can I retrieve an object and all of the objects it references(regardless of the kind of reference) and save them as a single resource?

these methods show one way of doing that. this is, for instance,
especially useful when creating a client-server architecture, where
objects can be stored and edited on the client- as well as the
server-side. The created resource can easily be serialized as a string,
f.e. for transmission via XMLRPC.

  - \[method for loading all referenced objects from the filesystem\]

-----

info:

  - this method takes a resource as param and locates all references for
    all objects in it.

-----

``` java
public Resource collectAll(Resource resource){
    //get the resourceset
    ResourceSet resourceSet = resource.getResourceSet();

    //search for other resources containing referenced objects
    List<Resource> resources = new ArrayList<Resource>();
    resources.add(resource);
        for(Resource r : resources){
            for(Iterator<EObject> j = r.getAllContents(); j.hasNext(); ){
                for(Object object : j.next().eCrossReferences()){
                    EObject eObject = (EObject)object;
                    Resource otherResource = eObject.eResource();
                    if(otherResource != null && !resources.contains(otherResource)){
                        resources.add(otherResource);
                    }
                }
            }
        }

        //create resource to hold all objects
        //replace .lobj with your own model extension!
        File tempFile = new File("completeTree.lobj");
        Resource complete_resource = resourceSet.createResource(URI.createFileURI(tempFile.getAbsolutePath()));

        //move all objects into one resource
        Collection cl = new ArrayList();
        for(Resource resource2 : resources){
            cl.addAll(resource2.getContents());
    }
        complete_resource.getContents().addAll(EcoreUtil.copyAll(cl));

        return complete_resource;
}
```

  - \[method for loading all referenced objects from a datastore, using
    teneo\]

-----

info:

  - the below method(readReferences) does not work for featuremaps and
    map.
  - don't use this when selecting via a HibernateResource(or other types
    of db-resources supported by teneo), use queries to select your
    object.

-----

usage:

``` java
//create session and transaction
Session session = getSession();
Transaction tx = session.getTransaction();

//Create a resourceset and a resource to hold the loaded objects
//always use an absolute path as uri, so relative paths can be built
//from it when moving objects around between resources
ResourceSet resourceSet = getResourceSet();


//replace .lobj with your own model extension!
File tempFile = new File("completeTree.lobj");
Resource rs = resourceSet.createResource(URI.createFileURI(tempFile.getAbsolutePath()));

tx.begin();

// query for object by ID
Query qry = session.createQuery("from "+eclassname+" where id='"+id+"'");
List list = qry.list();

tx.commit();

//fetch object and add it to the resource
EObject myObj = (EObject)list.get(0);
rs.getContents().add(myObj);

HashSet<EObject> preventCycles = new HashSet<EObject>();
ArrayList<EObject> rootList = new ArrayList<EObject>();

//collect all referenced & proxied objects
readReferences(myObj, preventCycles, rootList);

//add the collected referenced objects to the resource
rs.getContents().addAll(rootList);
```

-----

``` java
/**
* Recursively read all objects which are referenced from the passed eobject.
* The objects which do not have an econtainer are added to the rootList.
* The resulting rootList can be added to the contents of a resource.
*/
    private void readReferences(EObject eobject, HashSet<EObject> preventCycles, List<EObject> rootList) {
        if(preventCycles.contains(eobject)){ // been here get away
            return;
        }
        preventCycles.add(eobject);
        if(eobject.eContainer() != null){
            readReferences(eobject.eContainer(), preventCycles, rootList);
        }else{ // a root object
            rootList.add(eobject);
        }
        for(Object erefObj : eobject.eClass().getEAllReferences()){
            EReference eref = (EReference)erefObj;
            final Object value = eobject.eGet(eref);
            if (value == null) {
                continue;
            }
            if(value instanceof List){
                for(Object obj : (List<?>)value){
                    readReferences((EObject)obj, preventCycles, rootList);
                }
            }else{ // an eobject
                readReferences((EObject)value, preventCycles, rootList);
            }
        }
    }
```

### How do I serialize a resource to a String instead of a file?

``` java
public static String resourceToString(Resource rs, String encoding){
        Map options = new HashMap();
        //change as needed according to the type of resource
        //you are using
    options.put(XMIResource.OPTION_ENCODING, "UTF-8");

    StringWriter sw = new StringWriter();
    URIConverter.WriteableOutputStream uws = new URIConverter.WriteableOutputStream(sw, encoding);
    try{
        rs.save(uws, options);
    }catch(IOException e){
        //TODO handle exception
    }
    String resourceString = sw.toString();

    return resourceString;
}
```

### What EList implementation is generated When ?? - List of basic EList Implementations

I am documenting the most commonly generated list of EList that you may
find in your EMF generated model code along with the condition under
which it would be generated.

<table border="1">

<tr>

<th>

Types of Elist

</th>

<th>

When will it be generated

</th>

</tr>

<tr>

<td>

EDataTypeEList

</td>

<td>

If you define a Attribute with multiplicity more than 1

</td>

</tr>

<tr>

<td>

EDataTypeUniqueEList

</td>

<td>

If you define a Attribute with multiplicity more than 1 and set UNIQUE =
true

</td>

</tr>

<tr>

<td>

EObjectResolvingEList

</td>

<td>

If you have an Ereference with multiplicity more than 1 defined with
ResolveProxies = true

</td>

</tr>

<tr>

<td>

EObjectEList

</td>

<td>

If you have an Ereference with multiplicity more than 1 defined

</td>

</tr>

<tr>

<td>

EObjectWithInverseResolvingEList

</td>

<td>

If you have an Eopposite set for this Ereference with 0..\* and
resolveProxies = true

</td>

</tr>

<tr>

<td>

EObjectWithInverseEList

</td>

<td>

If you have an Eopposite set for this Ereference with 0..\* and
resolveProxies = false

</td>

</tr>

<tr>

<td>

EObjectContainmentEList

</td>

<td>

If your reference is a Containment

</td>

</tr>

</table>

These are some of the frequently generated EList types, there are
definitely more. Please do add them to this list if you find out more.

\-Malai

### What's the difference between the methods useIDs and useUUIDs in an XMLResourceImpl?

If useIDs returns true then the resource will maintain a map of
extrinsic IDs, i.e., IDs that are not modeled directly as an EAttribute
with isID true on the EObject, which we call intrinsic IDs. Extrinsic
IDs are set via XMLResource.setID and fetched via XMLResource.getID.
There are two-way maps to maintain them and these which are kept
up-to-date if the object is removed from the resource. When useUUIDs is
also true, it's assumed that the extrinsic IDs are universally unique
(not just unique to the resource). In that case, a UUID is generated
(EcoreUtil.generateUUID) for any object attached to the resource and
this UUID is preserved when the object is moved between resources.

### How can I use the EMF Ant tasks?

EMF provides a few [Ant](http://ant.apache.org/) tasks that you can use
in your build. The tasks are listed below, together with a short
description and the CVS links to their readme file and example
directory. Clicking on the name of a task opens the Javadoc of the class
that implements it.



<li>

JET and JMerger tasks



<li>

` `[<b>`emf.JETCompiler`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/ant/taskdefs/codegen/JETCompilerTask.html)
` `

  - <b>Description:</b> Exposes some functionalities available on the
    [JETCompiler](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/codegen/jet/JETCompiler.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/examples/jetcompiler/?root=Modeling_Project)

</li>



<li>

` `[<b>`emf.JETEmitter`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/ant/taskdefs/codegen/JETEmitterTask.html)
` `

  - <b>Description:</b> Exposes some functionalities available on the
    [JETEmitter](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/codegen/jet/JETEmitter.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/examples/jetemitter/?root=Modeling_Project)

</li>



<li>

` `[<b>`emf.JETMerger`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/ant/taskdefs/codegen/JMergerTask.html)
` `

  - <b>Description:</b> Exposes some functionalities available on the
    [JMerger](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/codegen/merge/java/JMerger.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.ant/examples/jmerger/?root=Modeling_Project)

</li>

</ul>

</li>



<li>

Generator tasks (used to create Ecore and Genmodel files, and to
generate code)



<li>

` `[<b>`emf.Ecore2Java`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/ecore/taskdefs/EcoreGeneratorTask.html)
` `

  - <b>Description:</b> Generates source code from models specified in
    Ecore files. Exposes the functionalities available on the
    [EcoreImporterApplication](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/ecore/EcoreImporterApplication.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.ecore/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.ecore/examples/?root=Modeling_Project)

</li>



<li>

` `[<b>`emf.Java2Java`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/java/taskdefs/JavaGeneratorTask.html)
` `

  - <b>Description:</b> Generates source code from models specified
    using Annotated Java. Exposes the functionalities available on the
    [JavaImporterApplication](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/java/JavaImporterApplication.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.java/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.java/examples/?root=Modeling_Project)

</li>



<li>

` `[<b>`emf.Rose2Java`</b>](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/rose/taskdefs/RoseGeneratorTask.html)
` `

  - <b>Description:</b> Generates source code from models specified in
    Rose files. Exposes the functionalities available on the
    [RoseImporterApplication](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/rose/RoseImporterApplication.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.rose/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.emf/org.eclipse.emf/plugins/org.eclipse.emf.importer.rose/examples/?root=Modeling_Project)

</li>



<li>

` [`<http://www.eclipse.org/modeling/mdt/javadoc/?project=xsd&page=org/eclipse/xsd/ecore/importer/taskdefs/XSDGeneratorTask.html><b>`emf.XSD2Java`</b>`]`
` `

  - <b>Description:</b> Generates source code from models specified in
    XML Schema files. Exposes the functionalities available on the
    [XSDImporterApplication](http://www.eclipse.org/modeling/mdt/javadoc/?project=xsd&page=org/eclipse/xsd/ecore/importer/XSDImporterApplication.html)
    class.
  - [readme](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.mdt/org.eclipse.xsd/plugins/org.eclipse.xsd.ecore.importer/readme.html?root=Modeling_Project&view=co)
  - [example](http://dev.eclipse.org/viewcvs/index.cgi/org.eclipse.mdt/org.eclipse.xsd/plugins/org.eclipse.xsd.ecore.importer/examples/?root=Modeling_Project)
  - contributed documents:
    [EasyWay](http://www.henriksensoftware.com/projects/autoxsd/EasyWay.html)
    by Jason Henriksen

</li>

</ul>

</li>

</ul>

</li>

<li>

Tips:

  - The Generator tasks support all the attributes of the corresponding
    Eclipse application either directly (via Ant attributes) or
    indirectly (via Ant's <arg> element). For example, the following
    snippet shows how use the "-editProject" argument of
    [EcoreImporterApplication](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/ecore/EcoreImporterApplication.html)
    with the
    [emf.Ecore2Java](http://www.eclipse.org/modeling/emf/javadoc/?project=emf&page=org/eclipse/emf/importer/ecore/taskdefs/EcoreGeneratorTask.html)
    task:
    ```
     <emf.Ecore2Java model="c:/lib/model/lib.ecore"
                    genModel="c:/lib/emf/lib.genmodel"
                    modelProject="c:/lib"
                    modelProjectFragmentPath="src">
            <arg line="-editProject result.edit src"/>
     </emf.Ecore2Java>
    ```

</li>

</ul>

### How can I split containment references across multiple resources to support cross resource containment?

Normally if you add a contained child to the contents of a resource, it
will be removed from its container, i.e., EObject.eContainer() will
become null. Since EMF 2.2, support was added so that if a containment
reference is proxy resolving (EReference.isResolveProxies() is true), an
object can be added to the contents of a resource without removing it
from its container's proxy resolving reference. For this setting of the
Ecore model to be respected by the generator, you must set the
GenModel's "Containment Proxies" property to true.

The Ecore model itself has examples of this, i.e.,
EPackage.getEClassifiers() is proxy resolving so you can store an EClass
is a separate resource from its containing EPackage. As a result, you
can right click on an EClass and invoke "Control..." to specify a new
resource in which to store the EClass. The "Control..." action is
available in the generated editors for any object that is contained by a
proxy resolving containment reference.

### Is EMF thread-safe?

EMF can safely be used in multi-threaded environments; however, EMF does
not, itself, ensure thread-safety in application model implementations.
Data structures are unsynchronized, for performance and to avoid
potential deadlock situations. The expectation is that a complete
instance of the model (including resources and resource set, if present)
should only be accessed by one thread at a time, and that the
synchronization should be provided by the application at a higher level.

Since it is shared among multiple instances of a given application
model, Ecore metadata is intended to be thread-safe for read-only
access. However, there was a thread safety bug involving Ecore
annotations, which is now fixed but will still affect older releases of
EMF. Also, the demand initialization of SDO metadata is not thread-safe.
See the following two questions for workarounds to these issues.

### I get a NullPointerException from BasicEMap.entryForKey() while loading in a multi-threaded application. What's the problem?

This is a known bug involving access to Ecore metadata from multiple
threads. The details map in an annotation on your model (probably an
extended metadata annotation on a model originally defined as an XML
Schema) is lazily initializing an index as a side-effect of being
accessed for the first time. This is not thread-safe.

The problem was originally fixed in EMF 2.2
([bug 131151](https://bugs.eclipse.org/bugs/show_bug.cgi?id=131151)) and
later backported to 2.0.6 and 2.1.3. If you are encountering this
problem in an earlier release of EMF 2.0 or 2.1, you should move up to
the latest release in the stream to pick up the fix.

Failing that, there is a workaround: you can simply ensure that you
access the details map on each annotation in your model before the
multiple loads start occuring. This can be done with a simple method
like this:

<code>

    public static void fixExtendedMetaData(EPackage ePackage)
    {
      for (Iterator i = ePackage.eAllContents(); i.hasNext(); )
      {
        Object o = i.next();
        if (o instanceof EAnnotation)
        {
          ((EAnnotation)o).getDetails().get("");
        }
      }
    }

</code>

If possible, you should add this directly into the generated init()
method in the implementation class for each affected package. For
example, for package foo, in FooPackageImpl:

<code>

    /**
     * @generated NOT
     */
    public static FooPackage init()
    {
      ...

      // Initialize created meta-data
      theFooPackage.initializePackageContents();

      // Add this (for each package above, if there are package interdependencies)
      fixExtendedMetaData(theFooPackage);

      ...
      return theFooPackage;
    }

</code>

If you don't have control over the generated model implementations
yourself, you will simply need to obtain each ePackage (from the package
registry, for instance) and invoke fixExtendedMetaData() on it at some
point before the multi-threaded access begins.

### I get a NullPointerException from EcoreUtil.getAdapter() while using SDO in a multi-threaded application. What's the problem?

This is a known limitation in EMF's implementation of SDO, which makes
SDO model elements adapters on the corresponding Ecore model elements,
so as to be easily retrievable. The attachment of the adapters is not
thread-safe. So, when SDOUtil.adaptType() or SDOUtil.adaptProperty() is
called to obtain a Type or Property for a given EClass or
EStructuralFeature, it can run into trouble trying to get an adapter
from the non-thread-safe adapter list.

This problem has not been fixed and probably won't be. However, there is
a workaround: you can pre-initialize the SDO metadata before the
multi-threaded access begins. Here is a method that does this:

<code>

    public static void fixSDOMetaData(EPackage ePackage)
    {
      for (Iterator i = ePackage.eAllContents(); i.hasNext(); )
      {
        Object o = i.next();
        if (o instanceof EClassifier)
        {
          SDOUtil.adaptType((EClassifier)o);
        }
        else if (o instanceof EStructuralFeature)
        {
          SDOUtil.adaptProperty((EStructuralFeature)o);
        }
      }
    }

</code>

Like the workaround described in the previous answer, this should be
done either from the generated init() method in the implementation class
for each affected package or, failing that, at some other point before
the multi-threaded access begins. Of course, if you are affected by both
problems, you can fix them both in a single pass.

### How do I preserve my property order, i. e. the order in the ecore model, in Property Sheet of the generated editor instead of default alphabetical ordering?

In your generated editor (MyEditor) find the method
getPropertySheetPage() and replace it with the following piece of code:
<code>

```
    private class MyExtendedPropertySheetPage extends
            ExtendedPropertySheetPage {

        private class MyPropertySheetSorter extends PropertySheetSorter {

            @Override
            public void sort(IPropertySheetEntry[] entries) {
                // do nothing;
            }

        }

        public MyExtendedPropertySheetPage(
                AdapterFactoryEditingDomain editingDomain) {
            super(editingDomain);
            setSorter(new MyPropertySheetSorter());
        }

        @Override
        public void setSelectionToViewer(List<?> selection) {
            MyEditor.this.setSelectionToViewer(selection);
            MyEditor.this.setFocus();
        }

        @Override
        public void setActionBars(IActionBars actionBars) {
            super.setActionBars(actionBars);
            getActionBarContributor().shareGlobalActions(this, actionBars);
        }

        @Override
        protected void setSorter(PropertySheetSorter sorter) {
            if (!(sorter instanceof MyPropertySheetSorter))
                sorter = new MyPropertySheetSorter();

            super.setSorter(sorter);
        }

    }


    public IPropertySheetPage getPropertySheetPage() {
        if (propertySheetPage == null) {
            propertySheetPage = new MyExtendedPropertySheetPage(
                    editingDomain);
            propertySheetPage
                    .setPropertySourceProvider(new AdapterFactoryContentProvider(
                            adapterFactory));
        }

        return propertySheetPage;
    }
```

</code>

### Platform URI Scheme

In [this blog
entry](http://lmap.blogspot.com/2008/03/platform-scheme-uri.html), I've
described the applications of URIs with the "platform" scheme and
suggested a few ideas of how they can be used in an application. This
knowledge is usually important while developing EMF applications due to
the intensive use of URIs by the framework.

### How do I map between an EMF Resource and an Eclipse IFile?

EMF uses platform resource URIs to access the workspace <code>

```
 platform:/resource/project[/relative-path]
```

</code> Be sure to encode the path when creating a URI for it, i.e.,
URI.createPlatformResourceURI(iFile.getFullPath().toString(), true). Use
workspaceRoot.getFile(new Path(uri.toPlatformResourceString(true))) to
convert it back to an IFile.

### How do I update my Ecore and GenModel after the originating model has changed?

Once you have an existing \*.genmodel resource, you can right click on
it to bring up the popup, or open it the editor and from the Generator
main menubar item, invoke "Reload..." to walk through the same wizard
steps that were used to create the \*.genmodel in the first place. The
wizard will remember the choices made the last time and your GenModel's
properties will be preserved during the reload processing.

### How can I control which instances are available as choices when editing a property in the properties view?

You can modify the generated item provider from this <code>

```
  /**
   * This adds a property descriptor for the Foo feature.
   * <!-- begin-user-doc -->
   * <!-- end-user-doc -->
   * @generated
   */
  protected void addFooPropertyDescriptor(Object object)
  {
    itemPropertyDescriptors.add
      (createItemPropertyDescriptor
        (((ComposeableAdapterFactory)adapterFactory).getRootAdapterFactory(),
         getResourceLocator(),
         getString("_UI_Abc_foo_feature"),
         getString("_UI_PropertyDescriptor_description", "_UI_Abc_foo_feature", "_UI_Abc_type"),
         XyzPackage.Literals.ABC__FOO,
         true,
         false,
         true,
         null,
         null,
         null));
  }
```

</code> to this <code>

```
  /**
   * This adds a property descriptor for the Foo feature.
   * <!-- begin-user-doc -->
   * <!-- end-user-doc -->
   * @generated NOT
   */
  protected void addFooPropertyDescriptor(Object object)
  {
    itemPropertyDescriptors.add
      (new ItemPropertyDescriptor
        (((ComposeableAdapterFactory)adapterFactory).getRootAdapterFactory(),
         getResourceLocator(),
         getString("_UI_Abc_foo_feature"),
         getString("_UI_PropertyDescriptor_description", "_UI_Abc_foo_feature", "_UI_Abc_type"),
         XyzPackage.Literals.ABC__FOO,
         true,
         false,
         true,
         null,
         null,
         null)
       {
        @Override
        public Collection<?> getChoiceOfValues(Object object)
        {
          List<Object> choiceOfValues = new ArrayList<Object>(super.getChoiceOfValues(object));
          // Filter the choices before returning them.
          return choiceOfValues;
        }
      });
  }
```

</code>

### I have a whole bunch of generator models. How can I generate many models at once?

Alt-Shift-G brings up a wizard that lets you choose which models in your
workspace you want to generate and to control which projects to generate
from them.

### How to get a EMF Ecore model into a Papyrus class diagram

Scope: The below steps assume that the Eclipse Modeling Framework (EMF)
plug-ins and Papyrus plug-ins are installed in Eclipse. This wiki page
and screen captures are based on Eclipse Juno 4.4.1, EMF 2.9.0, UML2
5.0.2 and Papyrus 1.0.2. [How to get a EMF Ecore model into a Papyrus
class
diagram](How_to_get_a_EMF_Ecore_model_into_a_Papyrus_class_diagram "wikilink")

## Downloading EMF

### How do I install EMF 2.x (for Eclipse 3.x)?

[Download](http://www.eclipse.org/modeling/emf/downloads/?project=emf)
the version of EMF, SDO and/or XSD that <b>matches</b> your installation
of Eclipse. Generally, the version of Eclipse is one version greater
than that of EMF; eg., EMF 2.3 is build against (and for) Eclipse 3.3.
Exit Eclipse, then unzip into your Eclipse directory.

### How do I install EMF or XSD 1.x for Eclipse 2.x?

[Download](http://www.eclipse.org/modeling/emf/downloads/dl-emf1x.html)
the version of EMF and/or XSD that matches your installation of Eclipse.
Exit Eclipse, then unzip into your Eclipse directory.

### How do I get EMF, SDO or XSD source from CVS?

See [Getting EMF Source](EMF/Getting_Source "wikilink").

### Does EMF, SDO or XSD have a site that I can use with the Eclipse Update Manager?

Yes, as of June 21, 2004, there is an Update Manager site for EMF, SDO,
and XSD.

This is only for the 2.x+ stream, not the 1.1.x stream.

IBM Internal can use:

  - <http://fullmoon.torolab.ibm.com/modeling/emf/updates/> or
    <http://emf.torolab.ibm.com/modeling/emf/updates/>

The rest of the world can use:

  - <http://download.eclipse.org/modeling/emf/updates/>

If you're not familiar with Update Manager, surf to one of the above
URLs and read the instructions there.

Please note, however:

  - You cannot upgrade from EMF 2.x to EMF 2.y, since you must also
    upgrade versions of Eclipse (3.x -\> 3.y).
  - EMF's update site moved from `/tools/emf/` to `/modeling/emf`, so
    old versions (2.0.x, 2.1.x) may not update properly anymore. Here
    are [three
    workarounds](http://dev.eclipse.org/blogs/releng/2007/10/16/forgive-me-update-manager-for-i-have-sinned/):
      - Update using '[search for
        new](IRC_FAQ#Where_can_I_get_project_XYZ.3F "wikilink")' instead
        of 'search for updates'
      - Install [from the
        zip](http://www.eclipse.org/modeling/emf/downloads/?project=emf)
      - Use a [policy file](Using_Policy_Files "wikilink") to force
        Eclipse to use the new URL

## Modeling Standards

### What is Model Driven Architecture (MDA)?

MDA is an industry architecture proposed by the OMG that addresses full
life cycle application development, data, and application integration
standards that work with multiple middleware (CORBA, J2EE), languages,
and interchange formats. MDA unifies some of the industry best practices
in software architecture, modeling, metadata management, and software
transformation technologies that allow a user to develop a modeling
specification once and target multiple technology implementations by
using precise transformations/mappings.

An example of the use of MDA is to use a UML model representation of a
tool or application and to use this model to automate (some or all) of
the Java interface, implementation, as well as any XML serialization for
the modeled objects. Many of the recent OMG standards such as UML, MOF,
and CWM were developed using MDA principles of using abstract models
(these are also referred to as Platform Independent Models - PIM) which
can be mapped to Platform Specific Models (PSM). Please note that
'platform independent' is a relative term\!

or more information on MDA and related MDA specifications including UML,
XMI, and MOF, please visit www.omg.org/mda.

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

### Can I create an EMF model using UML<sup>TM</sup> modeling tools?

EMF models can be defined using UML modeling tools such as Rational
Rose. You simply define a class model with the packages, attributes,
references, data types, and operations. This class model can be imported
into EMF for additional code generation. Since many Java developers are
familiar with simple class modeling, this serves as a 'gentle
introduction' to UML class modeling. In addition to UML class models,
EMF models can be created by using annotated Java interfaces or by
directly editing an XMI document using an XML editor. This approach is
used to allow the benefits of model based code generation (one of the
principles of the OMG Model Driven Architecture - MDA) to not just users
familiar with UML, but also the larger community of developers using
Java and XML.

### What is the relationship of OMG<sup>TM</sup> MOF<sup>TM</sup> to the EMF Ecore model?

The OMG MOF 1.4 Model has influenced the design of the EMF Ecore model.
The Ecore model evolved in parallel with the MOF 1.4 model.
Implementation experience in integrating a number of tools led to an
optimized implementation (focused on tool integration as opposed to the
original MOF focus of metadata repositories) that uses a subset of the
modeling concepts in MOF 1.4. For example, Ecore does not support 'first
class' Associations. Associations are mapped to a pair of Ecore
References. To minimize confusion, we have used the term 'Ecore' to
refer to the object model in the EMF framework. We use the terms 'Ecore
model' and 'EMF model' interchangeably in this FAQ, because the object
model of the Eclipse EMF framework is the Ecore model.

The designers of EMF are participating in the OMG process to influence
the design of MOF 2.0 and UML 2.0, which are still being defined.

### What is the relationship of EMF to OMG<sup>TM</sup> MDA<sup>TM</sup>?

One of the key goals of EMF is to use simple visual models to allow easy
integration of Java and XML tools. To accomplish this you can use a UML
class model as input to the EMF framework. This model is then used to
drive Java interface and implementation generation for EMF instances.
These Java interfaces define a consistent programming model for tools
built using EMF. The same EMF model is also used to generate the XML
serialization (XMI 2.0 format) for EMF instances. Essentially EMF
supports the key MDA concept of using models as input to development and
integration tools which produce multiple programming language (Java in
the case of Eclipse EMF itself) or data interchange format (XML)
representations. The code generation and XML serialization is 'driven'
from the same model.

EMF supports OMG XMI 2.0 XML serialization format and the use of UML
models for the analysis and design of EMF models.

### What is the relationship of EMF to JMI<sup>TM</sup>?

JMI (Java<sup>TM</sup> Metadata Interface) is a mapping of the OMG MOF
1.4 to the Java language developed by the Java Community Process. The
JMI spec and the Eclipse EMF model to Java mapping were developed in
parallel and are not the same. The Eclipse EMF Java mappings have been
optimized for in memory tool integration using Java and XML while JMI
has been optimized for metadata repository usage scenarios. Eclipse EMF
designers are actively involved in the ongoing development of MOF 2.0
and related mappings to XML and Java that are expected to proceed in the
OMG and Java Community Process respectively.
