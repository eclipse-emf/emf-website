<?php $HTMLTitle = "EMF, SDO, XSD Release Notes";
		$ProjectName = array(
			"EMF, SDO, XSD Release Notes",
			"EMF, SDO, XSD Release Notes",
			"EMF, SDO, XSD Release Notes",
			"images/reference.gif"
			);
		$pre = "../";
		include "../includes/header.php"; 
		
		if (!$doc) { 
			$XMLfile = "../news/release-notes.xml";
		} else {
			$XMLfile = $doc; 
		}

		//$f = file ($XMLfile); foreach ($f as $row) { echo htmlspecialchars($row)."<br>"; }

		?>

<style>@import url("../news/release-notes.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlFile, cache, doc;

	var project = "<?php echo $project; ?>";
	var version = "<?php echo $version; ?>";
	var showFiltersOrHeaderFooter = '1'; // set to '1' for YES, anything else for NO

	function init(){
		// NSCP 7.1+ / Mozilla 1.4.1+
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlFile = document.implementation.createDocument("", "", null);
			stylesheet = document.implementation.createDocument("", "", null);
			xmlFile.load("<?php echo $XMLfile; ?>");
			stylesheet.load("../news/release-notes.xsl");
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
			stylesheet.load("../news/release-notes.xsl");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;

		processor.addParameter("project", project,"");
		processor.addParameter("version", version,"");
		processor.addParameter("showFiltersOrHeaderFooter", showFiltersOrHeaderFooter,"");

		processor.transform();
		data.innerHTML = processor.output;
	}
	// separate transformation function for NSCP 7.1+ and Mozilla 1.4.1+ 
	function transform(){
		returnval+=1;
		if (returnval==2){
			var processor = new XSLTProcessor();
			processor.importStylesheet(stylesheet); 

			processor.setParameter("","project", project);
			processor.setParameter("","version", version);
			processor.setParameter("","showFiltersOrHeaderFooter", showFiltersOrHeaderFooter);

			doc = processor.transformToDocument(xmlFile);
			document.getElementById("data").innerHTML = doc.documentElement.innerHTML;
		}
	}
</script>
<body onload="init();">

<div id="data">
<!-- this is where the transformed XML data goes -->
			<p><b class="big-header">XML now loading...</b></p> 
			<p>Your browser must support XML & XSL.</p>
			<p>Try <a target="_new" href="http://channels.netscape.com/ns/browsers/download.jsp">Netscape 7.1</a>, <a target="_new" href="http://mozilla.org/products/mozilla1.x/">Mozilla 1.7</a>, or <a target="_new" href="http://www.microsoft.com/windows/ie/default.asp">Internet Explorer 6.0</a>.</p>

</div>

<p><a href="view-source:<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php $pre="../"; include "../includes/footer.php"; ?>
<!-- $Id: release-notes.php,v 1.6 2005/07/07 06:37:39 nickb Exp $ -->
