<?php $HTMLTitle = "EMF, SDO, XSD Performance Data";
	$ProjectName = array(
		"EMF, SDO, XSD Performance Data",
		"EMF, SDO, XSD Performance Data",
		"EMF, SDO, XSD Performance Data",
		"images/reference.gif"
		);
	include "includes/header.php"; 
		
	$XSLfile = "performance.xsl";

	if ($XMLfile) { 
		doXML();
	} else {
		doFileList(loadDirSimple(".",".xml","f")); // get all *.xml files in current dir
	}
	exit;

	function doFileList($files = array()) { 
		echo "<style>@import url(\"performance.css\");</style>\n";
		echo "<body>\n";
		echo "Choose a performance delta to view:\n\n<ul>\n";
		foreach ($files as $file) {
			$baseline = preg_split("/[\-\.]+/",$file);
			$delta = $baseline[1]; 
			$baseline = $baseline[2];
			echo 
				"<li><a href=\"".$PHP_SELF."?XMLfile=".$file."\">".			
				"$delta vs. $baseline"."</a></li><br/>"."\n";
		}
		echo "</ul>\n\n";
	}

	function doXML() {
		global $threshholdPercentage,$filter,$sortMethod,$unitSigDigs,$pcntSigDigs;
		global $XMLfile,$XSLfile; ?>
<style>@import url("performance.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlFile, cache, doc;

	var threshholdPercentage = "<?php echo $threshholdPercentage; ?>";
	var filter = "<?php echo $filter; ?>";
	var sortMethod = "<?php echo $sortMethod; ?>";
	var unitSigDigs = "<?php echo $unitSigDigs; ?>";
	var pcntSigDigs = "<?php echo $pcntSigDigs; ?>";
	var showFiltersOrHeaderFooter = '1'; // set to '1' for YES, anything else for NO

	function init(){
		// NSCP 7.1+ / Mozilla 1.4.1+
		// Use the standard DOM Level 2 technique, if it is supported
		if (document.implementation && document.implementation.createDocument) {
			xmlFile = document.implementation.createDocument("", "", null);
			stylesheet = document.implementation.createDocument("", "", null);
			xmlFile.load("<?php echo $XMLfile; ?>");
			stylesheet.load("<?php echo $XSLfile; ?>");
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
			stylesheet.load("<?php echo $XSLfile; ?>");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;

		processor.addParameter("threshholdPercentage", threshholdPercentage,"");
		processor.addParameter("filter", filter,"");
		processor.addParameter("sortMethod", sortMethod,"");
		processor.addParameter("unitSigDigs", unitSigDigs,"");
		processor.addParameter("pcntSigDigs", pcntSigDigs,"");
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
			processor.setParameter("","sortMethod", sortMethod);
			processor.setParameter("","unitSigDigs", unitSigDigs);
			processor.setParameter("","pcntSigDigs", pcntSigDigs);
			processor.setParameter("","showFiltersOrHeaderFooter", showFiltersOrHeaderFooter);

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
				  //w("$index, $dir, $file, f$i",1);
			  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
				  $stuff[] = "$file"; 
				 //w("$index, $dir, $file, d$i",1);
			  }
			}
			closedir($handle); 
			ini_set("display_errors","1"); // and turn 'em back on.
		} else {
			global $hadLoadDirSimpleError;
			if (!$hadLoadDirSimpleError) { 
				global $_SERVER;
				echo "<p> Directory ($dir) <b>".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))."</b> on mirror: <b>".$_SERVER["HTTP_HOST"]."</b>! </p>";
				echo "<p> Please report this error to <a href=\"mailto:webmaster@eclipse.org?Subject=Directory ($dir) ".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))." in scripts.php::loadDirSimple() on mirror ".$_SERVER["HTTP_HOST"]."\">webmaster@eclipse.org</a>, or make directory readable. </p>";
				/*echo '
					<p> While this problem is being resolved, you can get a copy of the latest EMF, SDO, or XSD from here:
					<ul>
						<li><a href="http://download.eclipse.org/tools/emf/downloads/drops/2.0/I200406030436/">http://download.eclipse.org/tools/emf/downloads/drops/2.0/I200406030436/</a> [Main Public Mirror]</li>
						<li><a href="http://fullmoon.toronto.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/">http://fullmoon.toronto.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/</a> [IBM Only]</li>
						<li><a href="http://fullmoon.hursley.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/">http://fullmoon.hursley.ibm.com/tools/emf/downloads/drops/2.0/I200406030436/</a> [IBM Only]</li>
					</ul>
					</p>
					<p> Thanks for your patience! </p>
					';*/
				$hadLoadDirSimpleError=1;
			}
			//exit;
		}
		return $stuff;
	} 
?>
<?php include "../includes/footer.html"; ?>
<!-- $Id$ -->
