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

	$logfile1="";
	$logfile2="";
	$buildbasedir="";
	$txt_build1 = array();
	$txt_build2 = array();
	$build1 = "";
	$build2 = "";

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
		echo "Choose a perfromance comparison to view:\n\n<ul>\n";
		foreach ($files as $file) {
			$build2 = explode("-",$file);
			$build1 = $build2[1]."/".$build2[2];
			$build2 = $build2[3]."/".$build2[4];
			$build2 = str_replace(".xml","",$build2);
			echo
				"<li><a href=\"".$PHP_SELF."?filter=".urlencode($filter)."&XMLfile=".$file."\">".
				"$build1 vs. $build2"."</a></li><br/>"."\n";
		}
		echo "</ul>\n\n";
	}

	function doTestProperties($XMLfile) {
	  global $logfile1,$logfile2,$buildbasedir;
	  global $txt_build1,$txt_build2,$build1,$build2;

		$build2 = explode("-",$XMLfile);
		$build1 = $build2[1]."/".$build2[2];
		$build2 = $build2[3]."/".$build2[4];
		$build2 = str_replace(".xml","",$build2);

		$buildbasedir = "http://download.eclipse.org/tools/emf/downloads/drops/";

		// get build1 details from gtk console log
		$txt_build1 = loadData($build1); // (txt, array)
		$logfile1 = $txt_build1[1]; // file loaded
		$txt_build1 = $txt_build1[0]; // complete file

		// get build2 details from gtk console log
		$txt_build2 = loadData($build2); // (txt, array)
		$logfile2 = $txt_build2[1]; // file loaded
		$txt_build2 = $txt_build2[0]; // complete file

		echo doProperties();

	}

	function doProperties() {
	  global $logfile1,$logfile2,$buildbasedir;
	  global $txt_build1,$txt_build2,$build1,$build2;

	  $build1basedir = $buildbasedir.$build1;
	  $props_build1 = getPropertyValues($txt_build1);
	  $props_build2 = getPropertyValues($txt_build2);
	  $cnt=0;
	  $o = "";

	  $o .= "<!-- test run properties (collected from gtk console log, only available within PHP wrapped XML/XSL, not within XML by itself -->\n";
	  $o .= "<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\">\n";
	  $o .= "<tr><td>&nbsp;</td></tr>\n";
	  $o .= "<tr><td colspan=\"5\"><b><a name=\"flags\">Test Run Properties</a></b></td></tr>\n";

	  $cnt++; $bgc=($cnt%2==1?"#EEEECC":"#FFFFCC");
	  $o .= "<tr bgcolor=\"$bgc\">";
	  $o .= "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
		  $o .= "<td>&nbsp;&nbsp;</td>";
	  $o .= "<td>";
	  if ($logfile1) { 
			$o .= "<a href=\"".$buildbasedir."\" style=\"color:navy\"><b><small style=\"color:navy\">$build1</small></b></a> :: <a href=\"".$buildbasedir.$build1."/testResults.php"."\" style=\"color:navy\"><b><small style=\"color:navy\">Test Results</small></b></a> :: <a href=\"".$logfile1."\" style=\"color:navy\"><b><small style=\"color:navy\">Log</small></b></a>";
	  } else {
			$o .= "<a href=\"".$buildbasedir."../../scripts/downloads.php\" style=\"color:navy\"><b><small style=\"color:navy\">$build1</small></b></a>";
	  }
	  $o .= "</td>";
	  $o .= "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	  $o .= "<td>";
	  if ($logfile2) { 
			$o .= "<a href=\"".$buildbasedir."\" style=\"color:#003333\"><b><small style=\"color:#003333\">$build2</small></b></a> :: <a href=\"".$buildbasedir.$build2."/testResults.php"."\" style=\"color:#003333\"><b><small style=\"color:#003333\">Test Results</small></b></a> :: <a href=\"".$logfile2."\" style=\"color:#003333\"><b><small style=\"color:#003333\">Log</small></b></a>";
	  } else {
			$o .= "<a href=\"".$buildbasedir."../../scripts/downloads.php\" style=\"color:navy\"><b><small style=\"color:navy\">$build2</small></b></a>";
	  }
	  $o .= "</td>";
	  $o .= "</tr>\n";
	  $props = sizeof($props_build2) > sizeof($props_build1) ? $props_build2 : $props_build1;
	  foreach ($props as $prop => $val) {
		  $cnt++; $bgc=($cnt%2==1?"#EEEEEE":"#FFFFFF");
		  $o .= "<tr bgcolor=\"$bgc\">";
		  $o .= "<td><b><small>".str_replace("["," [",$prop)."</small></b></td>\n";
		  $o .= "<td>&nbsp;&nbsp;</td>";
		  $o .= "<td colspan=\"1\"><b><small style=\"color:navy\">".showProp($props_build1[$prop])."</small></b></td>\n";
		  $o .= "<td>&nbsp;".equalsNotEquals($props_build1[$prop],$props_build2[$prop])."&nbsp;</td>";
		  $o .= "<td colspan=\"1\"><b><small style=\"color:#003333\">".showProp($props_build2[$prop])."</small></b></td>\n";
		  $o .= "</tr>\n";
	  }
	    $o .= "<tr><td>&#160;<br/></td></tr>\n\n";
	  $o .= "</table>\n";
	  return $o;
	}

	function equalsNotEquals($in1,$in2) {
		return (
			$in1==$in2 ?
			"<span style=\"color:green;\">=</span>" :
			(
				substr($in1,0,5) == substr($in2,0,5) ?
				"<span style=\"color:gray;\">~</span>" :
				"<span style=\"color:red;\">x</span>"
			)
		);
	}

	function showProp($in) {
		return $in?$in:"<span style=\"color:red;\">- n/a -</span>";
	}

	// given -Declipse.perf.dbloc=net://localhost:1527/ and asking for eclipse.perf.dbloc
	// return net://localhost:1527/
	// or, given  -Declipse.perf.config=build=N200502122006;branch=2.1.0;vm=ibm-java2-ws-jre-pj9xia32142-20040928a.tar.gz
	// and asking for eclipse.perf.config[vm] return ibm-java2-ws-jre-pj9xia32142-20040928a.tar.gz
	function getPropertyValues($txt) {
		$arr = array();
		$loading=0;
		if (sizeof($txt)>1) { 
			foreach ($txt as $line) {
				if (isIn($line,"Launching Eclipse")) {
					$loading=1;
				} else if (isIn($line,"Buildfile: test.xml")) {
					ksort($arr);reset($arr); //wArr($arr);
					return $arr; // done
				} else if ($loading && isIn($line,"-")) {
					//w($line,1);
					if (preg_match("/(-D|-X|-)([^\=]+)=(.+)/",trim($line),$m)) {
						$prop = $m[2]; // eclipse.perf.config
						if (isIn($m[3],";")) {
							$bits = explode(";",$m[3]); // build=N200502122006   branch=2.1.0   ...
						} else {
							$bits = array($m[3]); // build=N200502122006 (only one)
						}
					} else if (preg_match("/(-D|-X|-)([^\ ]+)\ (.+)$/",trim($line),$m)) { // -file test.xml
						$prop = $m[2]; // file
						$bits = array($m[3]); // test.xml
					} else if (preg_match("/(-D|-X|-)([^\=]+)$/",trim($line),$m)) { // -noupdate
						$prop = $m[2]; // noupdate
						$bits = array($m[2]); // noupdate
					}
						//w($prop,1);
						//wArr($bits);
						//w("<hr>",1);
					foreach ($bits as $bt) {
						if (isIn($bt,"=")) {
							$pair = explode("=",$bt);
							//wArr($pair);
							$arr[$prop."[".$pair[0]."]"] = $pair[1];
						} else {
							$arr[$prop]=$bt;
						}
					}
				}
			}
		}
		return $arr;
	}

	function loadData($buildID) { // given an array of a loaded file, return an array of the useful, parsed bits
		$filenames = array(
			"http://emf.torolab.ibm.com/tools/emf/downloads/drops/$buildID/testresults/consolelogs/linux.gtk_consolelog.txt",
			"http://download.eclipse.org/tools/emf/downloads/drops/$buildID/testresults/consolelogs/linux.gtk_consolelog.txt"
		);
		$arr = array();
		ini_set("display_errors","0"); 
		foreach ($filenames as $filename) { 
			$arr = file($filename); 
			//echo "Got: ".sizeof($arr)." for $filename<br>";
			if (sizeof($arr) > 1) {
				ini_set("display_errors","1");
				return array($arr,$filename);
			}
		}
		ini_set("display_errors","1");
		return array($arr,"");
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

<?php doTestProperties($XMLfile); ?>

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

	function isIn($haystack,$needle) {
	  return (false!==strpos($haystack,$needle));
	}

	function makeNumber($in) { 
	  $in = trim($in);
	  if (isIn($in," ")) {
		 $bits = explode(" ",$in);
		 if (isIn($bits[1],"ms")) {		// 476 ms -> .476
			return ($bits[0]-0)/1000;
		 } else {
			return $bits[0]-0;		// 1.2 s -> 1.2
		 }
	  } else if (isIn($in,"M")) {		// 2.57M -> 2694840.32
		 return round(($in-0)*1024*1024);
	  } else if (isIn($in,"K")) {		// 26K -> 26624
		 return ($in-0)*1024;
	  } else if (($in-0)>=0) {		// anything -> anything
		 return $in-0;
	  } else if (($in-0)<0) {		// -anything -> -1
		 return -1;
	  } else {
		 return 0;				// all else -> 0
	  }
	}

	function wArr($arr) { // ie., wArr(array,separator,showKeys,trailingCharacter);
	// since PHP won't display an array's contents when you do echo($array), this returns the array like this:
	/* usage: wArr($array)		// 0:apple, 1:peach, 2:grapes\n
			  wArr($array,"\n") (use "\n" as separator instead of ", ")
			  wArr($array,"",false); (use default separator, but don't display keys 			
			  wArr($array,"",false,false); (use default separator, but don't display keys and no trailing char	*/
		$sep=(func_num_args()>1&&func_get_arg(1))?func_get_arg(1):"<br>"; 
		$key=(func_num_args()>2)?func_get_arg(2):true;  // assume we want keys
		$trail=(func_num_args()>3)?func_get_arg(3):"\n";  // assume we want a trailing newline
		$i=0;
		if (is_array($arr) && sizeof($arr)>0) { 
			foreach ($arr as $ark => $arv) {
				w(($key?$ark.": ":"")); 
				if (is_array($arv)) { 
					w("<ul>");
					wArr($arv,$sep,$key,$trail);
					w("</ul>");
				} else {
					w($arv);
				}
				$i++;
				if ($i<sizeof($arr)) { w($sep); }
			} 	
			w($trail);
		} else {
			//w($arr.$trail);
		}
	} 

	function w($s) { // shortcut for echo() with second parameter: "add break+newline"
		if (func_num_args()<=1) { 
			$br=""; // no break/newline
		} else { 
			$br=func_get_arg(1);
			if (stristr($br,"b")) {
				$br="<br>";
			} else if (stristr($br,"n")) {
				$br="\n";
			} else if ($br) { 
				$br="<br>\n"; 
			}
		}
		echo($s.$br); 
	}


	include "../includes/footer.html"; ?>
<!-- $Id$ -->
