<?php

	include_once $pre."includes/php42fix.php"; 
	include_once $pre."includes/scripts.php"; 

	if ($doc) {
		$ext = substr( $doc,-4 );
		switch( $ext ){
			case ".pdf": $ctype="application/pdf";	break;
			case ".zip": $ctype="application/zip";	break;
			default:		 $ctype="text/html";
		}

		if ($ctype!="text/html" || $noHeader==true) { // don't parse the file; track view, then redirect as is to the page
			//include_once $pre."includes/clickthru-tracker.php";
			echo "\n"."<html><body onload=\"document.location.href='$doc';\"></body>\n";
			exit();
		}
	}

	$pre = "";
	$HTMLTitle = "Eclipse Tools - EMF Documents";
	$ProjectName = array(
		"EMF Documents",
		'Eclipse Modeling Framework Documents',
		$doc?'EMF Documents':($showNews?'What\'s New? | <a style="color:white;text-decoration:none" href="docs.php?showNews=">Hide</a>':'Documents | <a style="color:white;text-decoration:none" href="docs.php?showNews=true">What\'s New?</a>'),
		"images/reference.gif"
		);
	include_once $pre."includes/header.php"; 
		
	if (!$doc) { ?>
<script language="javascript" src="includes/popup.js"></script>
<table><tr><td><img src="images/<?php echo $pre; ?>images/c.gif" width=1 height=1></td></tr></table>

<?php 
		if ($showNews) {
			getNews(-1,"docs");
			echo '<table>
    <tr>
      <td>
        <a name="documents">
          <img src="images/images/c.gif" width="1" border="0"
          height="5" />
        </a>
      </td>
    </tr>
  </table>

  <table border="0" cellpadding="3" cellspacing="0"
  style="border-collapse: collapse;" bordercolor="#111111"
  width="100%">
    <tr>
      <td bgcolor="#0070a0" width="100%">
        <font color="#ffffff">
          <b>Documents</b>
        </font>

        <br />
      </td>
    </tr>
  </table>'.
  '<table>
    <tr>
      <td>
          <img src="images/images/c.gif" width="1" border="0"
          height="8" />
      </td>
    </tr>
  </table>';
		}
		$doc = "docs/docs.xml";	
		 
	}
	// check doc plugin first, then check emf-home

	ini_set("display_errors","0"); // suppress file not found errors
	if (strstr($doc,"http://") || strstr($doc,"https://")) {
		$CVSpreUsed = "";					$f = file($doc); 						// emf-home (or other remote)
	} else if (false!==strpos($doc,"org.eclipse.xsd.doc/")) { // xsd docs
		$doc = str_replace("org.eclipse.xsd.doc/","",$doc);
		$CVSpreUsed = $CVSpreDocXSD;	$f = file($CVSpreDocXSD.$doc);	// org.eclipse.xsd
	} else if (false!==strpos($doc,"org.eclipse.emf.ecore.sdo.doc/")) { // sdo docs
		$doc = str_replace("org.eclipse.emf.ecore.sdo.doc/","",$doc);
		$CVSpreUsed = $CVSpreDocSDO;	$f = file($CVSpreDocSDO.$doc);	// org.eclipse.emf.ecore.sdo
	} else if (strstr($doc,"docs/")) { 
		$CVSpreUsed = $CVSpre;			$f = file($CVSpre.$doc); 			// emf-home
	} else if (strstr($doc,"references/") || strstr($doc,"tutorials/")) { 
		$CVSpreUsed = $CVSpreDocEMF;	$f = file($CVSpreDocEMF.$doc);	// org.eclipse.emf
	} 
	ini_set("display_errors","1"); // and turn 'em back on.

	$folder = preg_replace("/(.+\/)[^\/]+\.(html|xml)$/","$1",$doc);
	if ($folder==$doc) { $folder=""; }

	if (!$f) { 
		echo "$doc document not found!";
		$f = array();
	} else { 
		echo "<!-- /* doc: $doc found in $CVSpreUsed */ -->\n";
	}

	$stopped=1;
	if (strstr($doc,".java") || strstr($doc,".xsd") || strstr($doc,".mdl")) {
		echo "<pre>";
	}
	foreach ($f as $line) { 
		if (strstr($doc,".xsd") || strstr($doc,".mdl")) {
			echo htmlentities($line);
		} else {
			// omit the XSL sheet if redisplayed thru PHP wrapper (to fix links)
			$line = ( false!==strpos($doc,"docs/docs.xml") 
				? str_replace('<?xml-stylesheet type="text/xsl" href="faq.xsl"?>',"",$line) 
				: $line );
			if (false!==strpos($line,"<body")) {	$stopped=0;	}
			if (false!==strpos($line,"see most recent build date") && !strstr($SERVER_NAME,"emf.torolab.ibm.com")) {
				// get filemtime from the folder:
				$jPWD = "../javadoc"; // path on downloads.eclipse.org & mirrors
				if (is_dir($jPWD) && is_readable($jPWD)) { 
					echo date ('F j\<\s\u\p\>S\<\/\s\u\p\> Y', filemtime ($jPWD));
				} else {
					echo "<i>See most recent build date</i>";
				}
			} else if (strstr($line,"<!-- header begins -->")) { // temporarily stop echoing (header already included)
				$stopped=1;
			} else if (strstr($line,"<!-- header ends -->")) { // resume echoing
				$stopped=0;
			} else if (!$stopped) { 

				// if href="images/ ... " OR src="images/ ..." change relative paths to CVS paths
				if (strstr($folder,"references/") || strstr($folder,"tutorials/")) { 
					$line = preg_replace("/\"images\//","\"".$CVSpreUsed.$folder."images/",$line); // emf.doc
				} else if (strstr($folder,"docs/") && !strstr($folder,"http://") && !strstr($folder,"https://")) {
					$line = preg_replace("/\"images\//","\"".$CVSpreUsed.$folder."images/",$line); // emf-home
				} else if (strstr($folder,"docs/")) {
					$line = preg_replace("/\"images\//","\"".$folder."images/",$line); // remote
				}

				// if href="../../docs ... " OR href="../../tutorials ... " OR href="../../references ... " change relative paths to CVS paths for related .html files
				$line = preg_replace("/\.\.\/\.\.\/docs\//","docs.php?doc=docs/",$line);
				$line = preg_replace("/\.\.\/\.\.\/tutorials\//","docs.php?doc=tutorials/",$line);
				$line = preg_replace("/\.\.\/\.\.\/references\//","docs.php?doc=references/",$line);

				// link from an SDO doc to an EMF one:
				$line = preg_replace("/\.\.\/\.\.\/\.\.\/org\.eclipse\.emf\.doc\/tutorials\//","docs.php?doc=tutorials/",$line);

				$line = preg_replace("/\%\%CVSpreEMF\%\%\//","$CVSpreEMF",$line);
				$line = preg_replace("/\%\%CVSpreXSD\%\%\//","$CVSpreXSD",$line);

				echo $line;
			}
			if (false!==strpos($line,"</body")) { 	$stopped=1;	}
		}
	}
	if (strstr($doc,".java") || strstr($doc,".xsd") || strstr($doc,".mdl")) {
		echo "</pre>";
	}
	
include_once $pre."includes/footer.php"; 
//if ($doc && false===strpos($doc,"docs.xml")) { include_once $pre."includes/clickthru-tracker.php"; } ?>

<!-- $Id: docs.php,v 1.5 2005/05/06 22:28:45 nickb Exp $ -->
