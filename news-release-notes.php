<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF and SDO - Release Notes";
		$ProjectName = array(
			"EMF & SDO Release Notes",
			'Eclipse Modeling Framework Documents',
			'Release Notes',
			"images/reference.gif"
			);
		include $pre."includes/header.php"; ?>
<html><head><title></title><meta http-equiv=Content-Type content="text/html; charset=ISO-8859-1"></head>
<body lang="EN-US">
<?php 

	$debug=0; 

	// parse out the anchor links to gen a TOC
	if (!$ver || $ver=="@buildVer@" || $ver=='${buildVer}') { $ver="2.1.0"; } // current default if missing or not properly parsed
	if ($ver=="2.0") { $ver="2.0.0"; } // additional replacement - aliasing 2.0 to 2.0.0

	ini_set("display_errors","0"); // suppress file not found errors
	$f = file($CVSpre."news/release-notes".$ver.".html"); // moved from .doc plugin to *-home package (was in $CVSpreDocEMF)
	ini_set("display_errors","1"); 

	if (!$f) { $f = array();  echo "Release Notes for Version $ver not found. Please choose another version from the list below."; }
	$anchors = array();
	$currentAnchor = "";
	$bugs=0;
	$otherAnchors=01;
	foreach ($f as $k => $line) {
		if (preg_match("/\<a name\=\"([a-z]{3}\_([\d\.]+))\"\>(What\'s new in (.+)\?{0,1})\<\/a\>/",
					trim($f[$k-1]).trim($f[$k]).trim($f[$k+1]),$m)) { // have to combine three lines ...
					//	<a name="emf_2.0.1">
					//	What's new in EMF 2.0.1?
					//	</a>
				if (!$anchors[$m[2]]) { $anchors[$m[2]] = array(); }
				$anchors[$m[2]][$m[4]] = array($m[1],$m[3]); // link, label
				if ($debug) { w("<br>B:",1); wArr($m); }
				$currentAnchor = array($m[1],$m[3]);
			} else if (strstr($line,"What's new in")) {
			if (preg_match("/\<a name\=\"([a-z]+\_(\d+)([a-z]*))\"\>(What\'s new in (.+)\?{0,1})\<\/a\>/",$line,$m)) { 
				if (!$anchors[$m[2]]) { $anchors[$m[2]] = array(); }
				$anchors[$m[2]][$m[3]] = array($m[1],$m[4]); // link, label
				if ($debug) { w("<br>A:",1); wArr($m); }
			}
		} else if (!strstr($line,"<li><b><a name") && strstr($line,"<a name=\"")) {
			//echo $line;
			if (preg_match("/\<a name\=\"([\d\.A-Za-z]+\_*)\"\>(\<b\>|)(.+)(\<\/b\>|)\<\/a\>/",
				trim($f[$k]),$m)) { 
					//	<b><a name="2.0.1">EMF Release Build 2.0.1</a></b>
					// <b><a name="2.0.1_">SDO Release Build 2.0.1</a></b>
				if (!$anchors[$m[1]]) { $anchors[$m[1]] = array(); }
				$anchors[$m[1]][$m[3]] = array($m[1],$m[3]); // link, label
				$currentAnchor = array($m[1],$m[3]); // store nesting
				if ($debug) { w("<br>D:",1); wArr($m); }
			} else if (preg_match("/\<a name\=\"(([A-Z])([\d\.]+\_*))\"\>(\<b\>|)(.+)(\<\/b\>|)\<\/a\>/",
				trim($f[$k]).trim($f[$k+1]),$m)) { // have to combine two lines ...
					//	<a name="I200403081633"
					//	><b>Build I200403081633: EMF Bug Fixes and Improvements</b></a>
					//	<a name="I200403081633_"
					//	><b>Build I200403081633: SDO Bug Fixes and Improvements</b></a>
				if (!$anchors[$m[2]]) { $anchors[$m[2]] = array(); }
				$anchors[$m[1]][$m[5]] = array($m[1],$m[5]); // link, label
				$currentAnchor = array($m[1],$m[5]); // store nesting
				if ($debug) { w("<br>D:",1); wArr($m); }
			} else if (preg_match("/\<a name\=\"([a-z]+\_(\d+)([a-z]*))\"\>(.+)\<\/a\>/",$line,$m)) {
					//	<a name="emf_200n"
					//	><b>Build I200403081633: EMF Bug Fixes and Improvements</b></a>
					//	<a name="emf_200nn"
					//	><b>Build I200403081633: SDO Bug Fixes and Improvements</b></a>
				if (!$anchors[$m[2]]) { $anchors[$m[2]] = array(); }
				$anchors[$m[2]][$m[3]] = array($m[1],$m[4]); // link, label
				$currentAnchor = array($m[2],$m[3]); // store nesting
				if ($debug) { w("<br>C:",1); wArr($m); }
			} else if (preg_match("/\<a name\=\"([a-z]{3}\_([A-Z])([\d\.]+\_*))\"\>(\<b\>|)(.+)(\<\/b\>|)\<\/a\>/",
				trim($f[$k]).trim($f[$k+1]),$m)) { // have to combine two lines ...
					//	<a name="emf_I200403081633"
					//	><b>Build I200403081633: EMF Bug Fixes and Improvements</b></a>
					//	<a name="emf_I200403081633_"
					//	><b>Build I200403081633: SDO Bug Fixes and Improvements</b></a>
				if (!$anchors[$m[2]]) { $anchors[$m[2]] = array(); }
				$anchors[$m[1]][$m[5]] = array($m[1],$m[5]); // link, label
				$currentAnchor = array($m[1],$m[5]); // store nesting
				if ($debug) { w("<br>D':",1); wArr($m); }
			}
		} else if (strstr($line,"<a href=\"http://bugs.eclipse.org/bugs/show_bug.cgi?id=")) {
			//echo $line;
			if (preg_match("/\<a href\=\"(http\:\/\/bugs\.eclipse\.org\/bugs\/show\_bug\.cgi\?id\=\d+)\"\>(\d+)\<\/a\>/",$line,$m)) {
				if ($debug) { w("<br>E:",1); wArr($m); }
				$anchors[$currentAnchor[0]][$currentAnchor[1].$bugs] = array($m[1],"".$m[2]); // link, label
				$bugs++;
			}
		} else if (strstr($line,"http://bugs.eclipse.org/bugs/show_bug.cgi?id=")) {
			//	(Bugzilla <a target="bugz" 
			//	href="http://bugs.eclipse.org/bugs/show_bug.cgi?id=000000"
			//	>000000</a>)
			if (preg_match("/href\=\"(http\:\/\/bugs\.eclipse\.org\/bugs\/show\_bug\.cgi\?id\=\d+)\"\>(\d+)\<\/a\>/",
				trim($f[$k-1]).trim($f[$k]).trim($f[$k+1]),$m)) { // have to combine three lines ... 
				if ($debug) { w("<br>F:",1); wArr($m); }
				$anchors[$currentAnchor[0]][$currentAnchor[1].$bugs] = array($m[1],"".$m[2]); // link, label
				$bugs++;
			}
		} else if (strstr($line,"<li><b><a name")) {  // <li><b><a name="emf_200a_1">Migration from 1.1</a></b>
			preg_match("/\<li\>\<b\>\<a name\=\"(.+)\"\>(.+)\<\/a\>\<\/b\>/",$line,$m); // additional bullet items
			//echo $line;
			if ($debug) { w("<br>F:",1); wArr($m); }
			$anchors[$currentAnchor[0]][$otherAnchors] = array($m[1],$m[2]); 
			$otherAnchors++;
		}

	} 

	if (sizeof($f)>0) {
		// Generated: Table Of Contents
		$w = "<hr noshade size=1>";
		$w .= "<table summary=\"\" border=0 width=\"100%\">";
			$w .= '<tr><td colspan="5"><a name="toc"><b>Table Of Contents</b></a><a name=\"toc\">&nbsp;</a></td>'.
					"<td align=right><a class=\"metaLink\" href=\"#top\">top</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#toc\">toc</a></td>".
					'</tr>'."\n";
			//$w .= '<tr><td>&nbsp;&nbsp;</td><td colspan=\"3\">&#149; <a href="#top">Overview</a></td></tr>'."\n";

		$bugStarted = false;
		foreach ($anchors as $super => $anchor2) { // 200 -> a,b,c,d -> (href, label)
			foreach ($anchor2 as $sub => $anchor3) { // a -> (href, label)
				if ($anchor3[0]) { 
					if (strstr($anchor3[0],"bug")) {
						$lev = 3;
					} else if ($sub && strstr($anchor3[1],"Build")) {
							$lev = 2;
					} else if ($sub && stristr($anchor3[1],"What's New")) {
							$lev = 1;
					} else if ($sub) { 
							$lev = 3;
					} else { 
						$lev = 1;
					}
					if ($lev==3 && strstr($anchor3[0],"bug")) { 
						if (!$bugStarted) { 
							for ($i=0;$i<$lev;$i++) { 
								$w .= "<td>&nbsp;&nbsp;&nbsp;</td>";
							}
							$w .= '<td align=right><small>Bugzilla:</small></td><td width="100%"><table border=0><tr>'; 
						}
						$bugStarted=true;
						$w .= '<td colspan="'.'1'.'"><small><a target="bugzilla" href="'.$anchor3[0].'">'.$anchor3[1].'</a></small></td>'."\n";
					} else {
						if ($bugStarted) { $w .= "</tr></table></td></tr>\n"; }  // close nested table
						$bugStarted=false;
						$w .= '<tr>';

						for ($i=0;$i<$lev;$i++) { 
							$w .= "<td>&nbsp;&nbsp;&nbsp;</td>";
						}
						$w .= '<td width="100%" colspan="'.(5-$lev).'">'.($lev==3?"&#149; ":"").'<a href="#'.$anchor3[0].'">'.$anchor3[1].'</a></td></tr>'."\n";
					}
				}
			}
		}
		if ($bugStarted) { $w .= "</tr></table></td>"; $bugStarted = false; } // close nested table

		$w .= "<tr><td colspan=1>&nbsp;</td><td colspan=5><a href=\"#relnotes1\">Other Release Notes</a></td></tr></table>";
		echo $w;
	}

	foreach ($f as $line) {
		// parse & substitute...
		$line = preg_replace("/\.\.\/images/","$CVSpreEMF"."images",$line);
		echo $line; 
	} 
?>

<table summary=""><tr><td>&nbsp;&nbsp;</td><td>
<a name="relnotes1" class="category">Other Release Notes:</a> 
<?php 
	/*  only works on local folders
	$files = loadDirSimple($CVSpre."news","release-notes(.*)\.html","f");
	rsort($files); reset($files);
	*/

	// so hard code instead...
	$files = array(
		"release-notes2.1.0.html",
		"release-notes2.0.1.html",
		"release-notes2.0.0.html",
		"release-notes1.1.1.html",
		"release-notes1.1.0.html",
		"release-notes1.0.2.html",
		"release-notes1.0.1.html"
	);

	$i=0;
	foreach ($files as $file) { 
		if (!strstr($file,$ver)) {
			preg_match("/release-notes(.*)\.html/",$file,$m);
			$vver = $m[1];
			if ($i>0) { echo ', '; }
			echo '<a class="subcategory" href="'.$pre.'news-release-notes.php?ver='.$vver.'">'.$vver.'</a>';
			$i++;
		}
	}
	?></td></tr></table>

<?php include $pre."includes/footer.php";  ?>
<!-- $Id: news-release-notes.php,v 1.2 2004/12/07 23:29:08 nickb Exp $ -->
