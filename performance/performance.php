<?php 
	$HTMLTitle = "EMF, SDO, XSD Performance Data";
	$ProjectName = array(
		"EMF, SDO, XSD Performance Data",
		"EMF, SDO, XSD Performance Data",
		"EMF, SDO, XSD Performance Data",
		"images/reference.gif"
		);
	include "includes/header.php"; 
		
	$XSLfile = "performance.xsl";

	// set default querystring options
	if (!$unitSigDigs) { $unitSigDigs = 10000; } // 5 decimals
	if (!$pcntSigDigs) { $pcntSigDigs = 10; } // one decimal
	if (!$threshholdPercentage) { $threshholdPercentage = 3; } // minimum 3% before we show a value
	if (!$filter) { $filter = "CPU Time"; }  

	if ($XMLfile) { 
		doXML();
	} else {
		doFileList(loadDirSimple(".",".xml","f")); // get all *.xml files in current dir
	}

	function doFileList($files = array()) {
		global $PHP_SELF, $filter;
		rsort($files); reset($files);
		
		echo "<style>@import url(\"performance.css\");</style>\n";
		echo "<body>\n";
		echo "Choose a performance delta to view:\n\n<ul>\n";
		foreach ($files as $file) {
			$baseline = preg_split("/[\-\.]+/",$file);
			$delta = $baseline[1]; 
			$baseline = $baseline[2];
			echo 
				"<li><a href=\"".$PHP_SELF."?filter=".urlencode($filter)."&XMLfile=".$file."\">".			
				"$delta vs. $baseline"."</a></li><br/>"."\n";
		}
		echo "</ul>\n\n";
	}

	function doXML() {
		global $threshholdPercentage,$filter,$unitSigDigs,$pcntSigDigs;
		global $XMLfile,$XSLfile; ?>
<style>@import url("performance.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlDocObj, cache, doc;

	var threshholdPercentage = "<?php echo $threshholdPercentage; ?>";
	var filter = "<?php echo $filter; ?>";
	var unitSigDigs = "<?php echo $unitSigDigs; ?>";
	var pcntSigDigs = "<?php echo $pcntSigDigs; ?>";
	var XMLfile = "<?php echo $XMLfile; ?>";
	var showFiltersOrHeaderFooter = '1'; // set to '1' for YES, anything else for NO

	function init(){
		// NSCP 7.1+ / Mozilla 1.4.1+
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlDocObj = document.implementation.createDocument("", "", null);
			stylesheet = document.implementation.createDocument("", "", null);
			xmlDocObj.load("<?php echo $XMLfile; ?>");
			stylesheet.load("<?php echo $XSLfile; ?>");
			xmlDocObj.addEventListener("load", transform, false);
			stylesheet.addEventListener("load", transform, false);
		}
		//IE 6.0+ solution
		else if (window.ActiveXObject) {
			xmlDocObj = new ActiveXObject("msxml2.DOMDocument.3.0");
			xmlDocObj.async = false;
			xmlDocObj.load("<?php echo $XMLfile; ?>");
			stylesheet = new ActiveXObject("msxml2.FreeThreadedDOMDocument.3.0");
			stylesheet.async = false;
			stylesheet.load("<?php echo $XSLfile; ?>");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlDocObj;

		processor.addParameter("threshholdPercentage", threshholdPercentage,"");
		processor.addParameter("filter", filter,"");
		processor.addParameter("unitSigDigs", unitSigDigs,"");
		processor.addParameter("pcntSigDigs", pcntSigDigs,"");
		processor.addParameter("XMLfile", XMLfile,"");
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

			processor.setParameter("","threshholdPercentage", threshholdPercentage);
			processor.setParameter("","filter", filter);
			processor.setParameter("","unitSigDigs", unitSigDigs);
			processor.setParameter("","pcntSigDigs", pcntSigDigs);
			processor.setParameter("","XMLfile", XMLfile);
			processor.setParameter("","showFiltersOrHeaderFooter", showFiltersOrHeaderFooter);

			doc = processor.transformToDocument(xmlDocObj);
			document.getElementById("data").innerHTML = doc.documentElement.innerHTML;
		}
	}
</script>
<body onload="init();">

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>
<div id="data">
	<!-- this is where the transformed XML data goes -->
	<p><b class="big-header">XML now loading...</b></p> 
	<p>Your browser must support XML &amp; XSL.</p>
	<p>Try 
		<a target="_new" href="http://channels.netscape.com/ns/browsers/download.jsp">Netscape 7.1</a>, 
		<a target="_new" href="http://mozilla.org/products/mozilla1.x/">Mozilla 1.7</a>, or 
		<a target="_new" href="http://www.microsoft.com/windows/ie/default.asp">Internet Explorer 6.0</a>.
	</p>
</div>

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php 	
	}
	
	function loadDirSimple($dir,$ext,$type) { // 1D array, not 2D
		$stuff = array();
		if (is_dir($dir) && is_readable($dir)) { 
			ini_set("display_errors","0"); // suppress file not found errors
			$handle=opendir($dir);
			while (($file = readdir($handle))!==false) {
			  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="f") { 
				  $stuff[] = "$file"; 
			  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
				  $stuff[] = "$file"; 
			  }
			}
			closedir($handle); 
			ini_set("display_errors","1"); // and turn 'em back on.
		}
		return $stuff;
	} 

	include "../includes/footer.html"; ?>
<!-- $Id$ -->
