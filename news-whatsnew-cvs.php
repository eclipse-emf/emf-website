<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools/Technology - What's New, CVS?";
		$ProjectName = array(
			"What's New, CVS?",
			'Eclipse Tools/Technology',
			"What's New, CVS?",
			"images/cvs.gif"
			);
		include $pre."includes/header.php"; 
		
		if (!$source) { $source = "emf"; } 

		if (strstr($SERVER_NAME,"emf.torolab.ibm.com")) {
			$logs = array("emf","sdo","xsd","uml2","emf-home","xsd-home","uml2-home","pde.build","releng.basebuilder","emf.releng.build","uml2.releng");
		} else {
			$logs = array("emf","sdo","xsd","emf-home","xsd-home");
		}

		// determine which file to source - must be on same server as php script for this to work
		// but since this is an internal-only thing, no worries. no need to mirror this to fullmoons or public just yet.
		// when we want it public we'll need to have the script file() to get the remote file, then save that as local /tmp/file.xml and then grab that file... or else figure out another way to embed XML inside HTML, transformed by XSL.

		if ($source=="sample") { 
			$XMLfile = "http://emf.torolab.ibm.com/viewcvs/indextools.cgi/~checkout~/emf-home/whatsnew-cvs/sample-log.xml"; // web
		} else {
			if ($bug) { 
				$XMLfile = "../whatsnew-cvs/bugz-logs/".$bug."-".$source."-log.xml"; // rel
			} else {
				$XMLfile = "../whatsnew-cvs/logs/".$source."-log.xml"; // rel
			}
		}

		//$Bugzilla = ($Bugzilla?$Bugzilla:($bug?$bug:"")); // if a search value, use that; if not, default to $bug value, or blank

		//$f = file ($XMLfile); foreach ($f as $row) { echo htmlspecialchars($row)."<br>"; }

		$iesDate="";

		$drvDateFile = file($CVSpreEMF."news/news.xml");
		$drvDate="";
		foreach ($drvDateFile as $line) { 
			if (!$drvDate && preg_match("/.+\#[IMNRS](\d{4})(\d{2})(\d{2})(\d{2})(\d{2})\".+/",$line,$m)) { // get the first occurence
				$drvDate = $m[1]."-".$m[2]."-".$m[3]." ".$m[4].":".$m[5].":"."00"; // get date as yymmddhhmm -> yyyy-mm-dd hh:mm:ss
				$iesDate = $m[1]."-".$m[2]."-".$m[3]." ".$m[4].":".$m[5].":"."00"; // get date as yymmddhhmm -> yyyy-mm-dd hh:mm:ss
			} else if ($drvDate && preg_match("/.+\#[IMNRS](\d{4})(\d{2})(\d{2})(\d{2})(\d{2})\".+/",$line,$m)) { // get the second occurence
				$drvDate = $m[1]."-".$m[2]."-".$m[3]." ".$m[4].":".$m[5].":"."00"; // get date as yymmddhhmm -> yyyy-mm-dd hh:mm:ss
				break;
			}
		}
		?>

<style>@import url("../whatsnew-cvs/whatsnew-cvs.css");</style>
<script type="text/javascript">
	var returnval = 0;
	var stylesheet, xmlFile, cache, doc;

	var drvDate = "<?php echo $drvDate; ?>";
	var iesDate = "<?php echo $iesDate; ?>";

	var cvsServer = "<?php echo ($cvsServer?$cvsServer:'http://dev.eclipse.org'); ?>"; // used in links to cvs files
	var CVSpreEMF= "<?php echo $CVSpreEMF; ?>"; // used to reference images

	var source= "<?php echo $source; ?>"; 	// used to reference which source xml to load (eg., emf-log.xml)
	var bug= "<?php echo $bug; ?>"; 		// used to reference which source xml to load (eg., 78619-emf-log.xml)

	var sortMethod1= "<?php echo ($sortMethod1?$sortMethod1:'date'); ?>";
	var sortDir1= "<?php echo ($sortDir1?$sortDir1:'descending'); ?>";

	var sortMethod2= "<?php echo ($sortMethod2?$sortMethod2:'file'); ?>";
	var sortDir2= "<?php echo ($sortDir2?$sortDir2:'ascending'); ?>";

<?php 
	$filterNames = array("",
		"File","Date","Author","Bugzilla","Comments"
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
			stylesheet.load("../whatsnew-cvs/whatsnew-cvs.xsl");
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
			stylesheet.load("../whatsnew-cvs/whatsnew-cvs.xsl");
			cache = new ActiveXObject("msxml2.XSLTemplate.3.0");
			cache.stylesheet = stylesheet;
			transformData();
		}
	}
	// separate transformation function for IE 6.0+
	function transformData(){
		var processor = cache.createProcessor();
		processor.input = xmlFile;

		processor.addParameter("drvDate", drvDate,"");
		processor.addParameter("iesDate", iesDate,"");

		processor.addParameter("CVSpreEMF", CVSpreEMF,"");
		processor.addParameter("cvsServer", cvsServer,"");

		processor.addParameter("source", source,"");
		processor.addParameter("bug", bug,"");

		processor.addParameter("sortMethod1",sortMethod1,"");
		processor.addParameter("sortDir1",sortDir1,"");

		processor.addParameter("sortMethod2",sortMethod2,"");
		processor.addParameter("sortDir2",sortDir2,"");

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

			processor.setParameter("","drvDate", drvDate);
			processor.setParameter("","iesDate", iesDate);

			processor.setParameter("","CVSpreEMF",CVSpreEMF);
			processor.setParameter("","cvsServer", cvsServer);

			processor.setParameter("","source",source);
			processor.setParameter("","bug",bug);

			processor.setParameter("","sortMethod1",sortMethod1);
			processor.setParameter("","sortDir1",sortDir1);

			processor.setParameter("","sortMethod2",sortMethod2);
			processor.setParameter("","sortDir2",sortDir2);

<?php for ($i=1;$i<=5;$i++) { 
	echo "			processor.setParameter(\"\",\"filterName$i\",filterName$i);\n";
	echo "			processor.setParameter(\"\",\"filterVal$i\",filterVal$i);\n";
} ?>

			doc = processor.transformToDocument(xmlFile);
			//alert("iesDate="+processor.getParameter("","iesDate"));
			document.getElementById("data").innerHTML = doc.documentElement.innerHTML;
		}
	}
</script>
<body onload="init();">

<?php 
	echo "Choose a log to view: ";
	foreach ($logs as $lk => $ls) { 
		if ($lk>0) { echo " &nbsp;|&nbsp; "; }
		if ($ls==$source) { 
			echo '<b class="navy">'.$ls.'</b>'."\n";
		} else {
			echo '<a class="navy" href="news-whatsnew-cvs.php?source='.$ls.($bug?"&bug=$bug":"").'">'.$ls.'</a>'."\n";

		}
	}
	if (strstr($SERVER_NAME,"emf.torolab.ibm.com")) {
		echo " &nbsp;|&nbsp; ".'<a class="red" href="/whatsnew-cvs/build.php">Regenerate Log Results Or Change Date Range</a>'."\n";
	}
	echo "<br/><br/>";
?>

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<div id="data">
<!-- this is where the transformed XML data goes -->
			<p><b class="big-header">XML now loading...</b></p> 
			<p>Your browser must support XML & XSL.</p>
			<p>Try <a target="_new" href="http://channels.netscape.com/ns/browsers/download.jsp">Netscape 7.1</a>, <a target="_new" href="http://mozilla.org/products/mozilla1.x/">Mozilla 1.7</a>, or <a target="_new" href="http://www.microsoft.com/windows/ie/default.asp">Internet Explorer 6.0</a>.</p>

</div>

<p><a href="<?php echo $XMLfile; ?>" class="red">View as XML</a></p>

<?php include $pre."includes/footer.php"; ?>
