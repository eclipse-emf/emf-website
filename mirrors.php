<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF and SDO - Mirrors &amp; Links";
		$ProjectName = array(
			"Mirrors &amp; Links",
			'Eclipse Modeling Framework',
			"Mirrors &amp; Links",
			"images/download.gif"
			);
		include $pre."includes/header.php"; 
		
		$XMLfile = "../mirrors/mirrors.xml"; // web

		//$f = file ($XMLfile); foreach ($f as $row) { echo htmlspecialchars($row)."<br>"; }

		?>

<style>@import url("../mirrors/mirrors.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlFile, cache, doc;
	function init(){
		// NSCP 7.1+ / Mozilla 1.4.1+
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlFile = document.implementation.createDocument("", "", null);
			stylesheet = document.implementation.createDocument("", "", null);
			xmlFile.load("<?php echo $XMLfile; ?>");
			stylesheet.load("../mirrors/mirrors.xsl");
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
			stylesheet.load("../mirrors/mirrors.xsl");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;
		processor.transform();
		data.innerHTML = processor.output;
	}
	// separate transformation function for NSCP 7.1+ and Mozilla 1.4.1+ 
	function transform(){
		returnval+=1;
		if (returnval==2){
			var processor = new XSLTProcessor();
			processor.importStylesheet(stylesheet); 
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

<?php include $pre."includes/footer.php"; ?>
<!-- $Id: mirrors.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->