<?php if ($FAQ=="XSD") { 
			$HTMLTitle = "XML Schema Infoset Model FAQ";
			$ProjectName = array(
				"XML Schema Infoset Model FAQ",
				"XML Schema Infoset Model FAQ",
				"XML Schema Infoset Model FAQ",
				"images/reference.gif"
				);
				if (!$Question && !$Answer && !$Category) { 
					$Question="XSD";
					$Answer="XSD";
					$Category="xsd";
				}
		} else if ($FAQ=="SDO") { 
			$HTMLTitle = "Service Data Objects FAQ";
			$ProjectName = array(
				"Service Data Objects FAQ",
				"Service Data Objects FAQ",
				"Service Data Objects FAQ",
				"images/reference.gif"
				);
				if (!$Question && !$Answer && !$Category) { 
					$Question="SDO";
					$Answer="SDO";
					$Category="sdo";
				}
		} else if ($FAQ=="EMF") { 
			$HTMLTitle = "Eclipse Modeling Framework FAQ";
			$ProjectName = array(
				"Eclipse Modeling Framework FAQ",
				"Eclipse Modeling Framework FAQ",
				"Eclipse Modeling Framework FAQ",
				"images/reference.gif"
				);
				if (!$Question && !$Answer && !$Category) { 
					$Question="EMF";
					$Answer="EMF";
					$Category="emf";
				}
		} else {
			$HTMLTitle = "Eclipse Modeling Framework FAQ";
			$ProjectName = array(
				"Eclipse Modeling Framework FAQ",
				"Eclipse Modeling Framework FAQ",
				"Eclipse Modeling Framework FAQ",
				"images/reference.gif"
				);
		}
		include "includes/header.php"; 
		
		if (!$doc) { 
			$XMLfile = "../faq/faq.xml";
		} else {
			$XMLfile = $doc; 
		}

		//$f = file ($XMLfile); foreach ($f as $row) { echo htmlspecialchars($row)."<br>"; }

		?>

<style>@import url("../faq/faq.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlFile, cache, doc;

	var FAQ = "<?php echo $FAQ; ?>";
	var showFiltersOrHeaderFooter = '1'; // set to '1' for YES, anything else for NO
<?php 
	$filterNames = array("",
		"Category","Question","Answer"
	);
	for ($i=1;$i<=5;$i++) { 
	$fv = $filterNames[$i];
	echo "	var filterName$i= \"".$fv."\";\n";
	echo "	var filterVal$i= \"".$$fv."\";\n";
} ?>

	function init(){
		// NSCP 7.1+ / Mozilla 1.4.1+
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlFile = document.implementation.createDocument("", "", null);
			stylesheet = document.implementation.createDocument("", "", null);
			xmlFile.load("<?php echo $XMLfile; ?>");
			stylesheet.load("../faq/faq.xsl");
			xmlFile.addEventListener("load", transform, false);
			stylesheet.addEventListener("load", transform, false);
		}
		//IE 6.0+ solution
		else if (window.ActiveXObject) {
			xmlFile = new ActiveXObject("msxml2.DOMDocument.3.0");
			xmlFile.async = false;
			xmlFile.load("<?php echo $XMLfile; ?>");
			stylesheet = new ActiveXObject("msxml2.FreeThreadedDOMDocument.3.0");
			stylesheet.async = false;
			stylesheet.load("../faq/faq.xsl");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;

		processor.addParameter("FAQ", FAQ,"");
		processor.addParameter("showFiltersOrHeaderFooter", showFiltersOrHeaderFooter,"");

<?php for ($i=1;$i<=5;$i++) { 
	echo "		processor.addParameter(\"filterName$i\",filterName$i,\"\");\n";
	echo "		processor.addParameter(\"filterVal$i\",filterVal$i,\"\");\n";
} ?>

		processor.transform();
		data.innerHTML = processor.output;
	}
	// separate transformation function for NSCP 7.1+ and Mozilla 1.4.1+ 
	function transform(){
		returnval+=1;
		if (returnval==2){
			var processor = new XSLTProcessor();
			processor.importStylesheet(stylesheet); 

			processor.setParameter("","FAQ", FAQ);
			processor.setParameter("","showFiltersOrHeaderFooter", showFiltersOrHeaderFooter);

<?php for ($i=1;$i<=5;$i++) { 
	echo "			processor.setParameter(\"\",\"filterName$i\",filterName$i);\n";
	echo "			processor.setParameter(\"\",\"filterVal$i\",filterVal$i);\n";
} ?>

			doc = processor.transformToDocument(xmlFile);
			document.getElementById("data").innerHTML = doc.documentElement.innerHTML;
		}
	}
</script>
<body onload="init();">

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<div id="data">
<!-- this is where the transformed XML data goes -->
			<p><b class="big-header">XML now loading...</b></p> 
			<p>Your browser must support XML & XSL.</p>
			<p>Try <a target="_new" href="http://channels.netscape.com/ns/browsers/download.jsp">Netscape 7.1</a>, <a target="_new" href="http://mozilla.org/products/mozilla1.x/">Mozilla 1.7</a>, or <a target="_new" href="http://www.microsoft.com/windows/ie/default.asp">Internet Explorer 6.0</a>.</p>

</div>

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php $pre="../"; include "../includes/footer.php"; ?>
<!-- $Id: faq.php,v 1.7 2005/05/06 23:11:54 nickb Exp $ -->
