<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF v1.0 Users' Guide";
		$ProjectName = array(
			"EMF Users' Guide",
			'<a class="indexsub" href="index-emf.php">Eclipse Modeling Framework</a> Documents, including <a class="indexsub" href="index-xsd.php">XSD</a> & <a class="indexsub" href="index-sdo.php">SDO</a>',
			'',
			"images/reference.gif"
			);
		include $pre."includes/header.php"; 
		?>
<style>
   .javaObj {
     font-family: courier new, courier, default;
     font-size: 13px;
     color: #333366;
     font-style: italic;
   }
   .figureImg{
     font-family: courier new, courier, default;
     font-size: 13px;
     color: #336666;
   }
   .tableHeading{
     font-family: courier new, courier, default;
     font-size: 13px;
     color: #666666;
   }
   .tableTitle{
     font-family: courier new, courier, default;
     font-size: 13px;
     color: #336666;
   }
   .extLink {
     font-family: courier new, courier, default;
     font-size: 13px;
     color: #336633;
     text-decoration:none;
   }
   a.extLink:hover {
     text-decoration: underline;
   }
   .metaLink {
     font-size: 12px;
     color: #3333ff;
     text-decoration:none;
   }
   .footnote {
     font-size: 10px;
     color: #3333ff;
     text-decoration:none;
   }
   a.metaLink:hover,a.footnote:hover {
     text-decoration: underline;
   }
   body, table, td, li, ul, ol {
     font-family: verdana, helvetica, helv, sans-serif, sans;
     font-size: 12px;
     color: #000000;
   }
	.section0 {
     font-size: 23px;
	}
	.section1 {
     font-size: 20px;
	}
	.section2 {
     font-size: 17px;
	}
	.section3 {
     font-size: 14px;
	}
</style>
<table align=center width="760"><tr><td><a name="top">&nbsp;</a><br>
<?php 
	$f = file($CVSpre."docs/UG/EMF_v1.0_Users_Guide.html");
	$addCR = 1;
	$anchor = 999;
	$anchors = array();
	$figures = array();
	$tables = array();
	$anchorLevels = array();
	foreach ($f as $line) { 
		if (preg_match("/(.*)\#\#FLASTMOD\#\#(.*)/",$line,$m)) {
			echo $m[1].date("M d, Y, \a\\t h:ia").$m[2]."<br />\n";
		} else if (preg_match("/(.*)(\FIGURE\ (\d+)([\.\ ])(.*))/",$line,$m)) {
			list($width, $height, $type, $attr) = getimagesize("images/EMFUG-".$m[3].".jpg");
			echo "<p align=center><a name=\"fig".$m[3]."\"><span class=\"figureImg\"><img src=\"images/EMFUG-".$m[3].".jpg\" $attr border=\"0\" alt=\"".$m[1].$m[2]."\"><br>".$m[1].$m[2]."</span></a></p>\n";
			$figures[$m[2]] = $m[3];
		} else if (preg_match("/(.*)(\TABLE\ (\d+)([\.\ ])(.*))/",$line,$m)) {
			echo "<p align=center><a name=\"table".$m[3]."\"><span class=\"tableTitle\">".$m[1].$m[2]."</span></a></p>\n";
			$tables[$m[2]] = $m[3];
		} else {
			if (strstr($line,"http://") || strstr($line,"http://")) {
				$line = preg_replace("/(http(s*)\:\/\/[^\ ]+([a-zA-Z0-9]+|\/|([^\ \.\,]+\.[^\ \.\,]+)))([\ \,\"]+|\.)/","<a class=\"extLink\" target=\"new\" href=\"$1\">$1</a>$5",$line);
			}
			if (preg_match("/(.*)(See )(Figure (\d+))\:(.*)$/",$line,$m)) { 
				if (!$anchors[$m[3]]) { 
					$anchor++;
					$anchors[$m[3]] = $anchor;
				}
				$line = $m[1].$m[2]."<a class=\"metaLink\" href=\"#fig".$m[4]."\">".$m[3]."</a>".($m[5]?": ".$m[5]:"");
			} else if (preg_match("/(.*)(See )([^\:]+)\:(.*)$/",$line,$m)) { 
				if (!$anchors[$m[3]]) { 
					$anchor++;
					$anchors[$m[3]] = $anchor;
				}
				$line = $m[1].$m[2]."<a class=\"metaLink\" href=\"#s".$anchors[$m[3]]."\">".$m[3]."</a>".($m[4]?". ".$m[4]:". ");
			} else if (preg_match("/(.*)(See )([^\.]+\.[^\.]+\<\/span\>)\.$/",$line,$m)) { // See Registering a <span class="javaObj">Resource.Factory</span>.
				if (!$anchors[$m[3]]) { 
					$anchor++;
					$anchors[$m[3]] = $anchor;
				}
				$line = $m[1].$m[2]."<a class=\"metaLink\" href=\"#s".$anchors[$m[3]]."\">".$m[3]."</a>".($m[4]?". ".$m[4]:". ");
			} else if (preg_match("/(.*)(See )([^\.]+)\.(.*)$/",$line,$m)) { 
				if (!$anchors[$m[3]]) { 
					$anchor++;
					$anchors[$m[3]] = $anchor;
				}
				$line = $m[1].$m[2]."<a class=\"metaLink\" href=\"#s".$anchors[$m[3]]."\">".$m[3]."</a>".($m[4]?". ".$m[4]:". ");
			}
			$line = preg_replace("/(\:\ \)|\.\ \))/",".)",$line);

			//wArr($anchors);
			if (strstr($line,"<b class=\"section1\">") || strstr($line,"<b class=\"section2\">") || strstr($line,"<b class=\"section3\">")) {
				preg_match("/((\<b class=\"section(\d)\"\>)(.+)(\<\/b\>))/",$line,$m);
				if (preg_match("/(.+)\<br\ {0,1}\/{0,1}\>(.+)/",$m[4],$n)) { // remove any breaks from the label
					$m4 = $n[1].$n[2];
				} else {
					$m4 = $m[4];
				}
				$line = 
						"<table cellspacing=0 cellpadding=0 border=0 width=\"100%\"><tr valign=top>".
							"<td nowrap><a name=\"s".$anchors[$m4]."\">".$m[2];
				if (!$anchorLevelCount) { 
					$anchorLevelCount[] = 0;
				} else {
					$anchorLevelCount[] = 
						($m[3]==2?$anchorLevelCount[sizeof($anchorLevelCount)-1] + 0.01:
							($m[3]==1?floor($anchorLevelCount[sizeof($anchorLevelCount)-1])+1:999)
						);
				}
				if (strlen($anchorLevelCount[sizeof($anchorLevelCount)-1])==3) { 
					$anchorLevelCount[sizeof($anchorLevelCount)-1].="0";
				}
				$line .= ($anchorLevelCount[sizeof($anchorLevelCount)-1]>0?$anchorLevelCount[sizeof($anchorLevelCount)-1]:"");
				$line .=	" ".$m[4].$m[5]."</a><br>&nbsp;</td>".	// must stay as $m[4], not $m4 - want this to include any <br /> tags
							"<td align=right><a class=\"metaLink\" href=\"#top\">top</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#toc\">toc</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tof\">tof</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tot\">tot</a></td>".
						"</tr></table>";
				$anchorLevels[$m4] = $anchorLevelCount[sizeof($anchorLevelCount)-1];
			}
			if (stristr($line,"<pre>") || stristr($line,"<table>") || stristr($line,"<li class=\"Bulleted\">")) {		$addCR=0;
			} else if (stristr($line,"</pre>") || stristr($line,"</table>") || stristr($line,"</ul>")) {					$addCR=1;	
			}
			echo "$line".(!stristr($line,"ul>")&&$addCR?"<br />\n":"");
		}
	}

	// Generated: Table Of Contents
	$w = "<a name=\"toc\">&nbsp;</a><hr noshade size=1>";
	$w .= "<table border=0 width=\"100%\">";
		$w .= '<tr><td colspan="4"><a href="#s"><b>Table Of Contents</b></a></td>'.
				"<td align=right><a class=\"metaLink\" href=\"#top\">top</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#toc\">toc</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tof\">tof</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tot\">tot</a></td>".
				'</tr>'."\n";
		//$w .= '<tr><td>&nbsp;&nbsp;</td><td colspan=\"3\">&#149; <a href="#top">Overview</a></td></tr>'."\n";
	foreach ($anchorLevels as $lab => $num) { 
		$w .= '<tr>';
		if ($anchorLevels[$lab]!=="") { 
			if (strstr($anchorLevels[$lab],".")) { 
				$lev=2;
			} else {
				$lev=1;
			}
		} else {
			$lev=3;
		}
		for ($i=0;$i<$lev;$i++) { 
			$w .= "<td>&nbsp;&nbsp;</td>";
		}
		$w .= '<td colspan="'.(4-$lev).'">'.$anchorLevels[$lab].' <a href="#s'.$anchors[$lab].'">'.$lab.'</a>'.($anchorLevels[$lab]===""?" (tbd)":"").'</td></tr>'."\n";
	}
	$w .= "</table>";
	echo $w;

	// Generated: Table Of Figures
	$w = "<a name=\"tof\">&nbsp;</a><hr noshade size=1>";
	$w .= "<table border=0 width=\"100%\">";
		$w .= '<tr><td colspan="1"><a href="#fig1"><b>Table Of Figures</b></a></td>'.
				"<td align=right><a class=\"metaLink\" href=\"#top\">top</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#toc\">toc</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tof\">tof</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tot\">tot</a></td>".
				'</tr>'."\n";
	foreach ($figures as $lab => $num) { 
		$w .= '<tr>';
		$w .= '<td colspan="1">&#149; <a href="#fig'.$num.'">'.$lab.'</a>'.'</td></tr>'."\n";
	}
	$w .= "</table>";
	echo $w;

	// Generated: Table Of Tables
	$w = "<a name=\"tot\">&nbsp;</a><hr noshade size=1>";
	$w .= "<table border=0 width=\"100%\">";
		$w .= '<tr><td colspan="1"><a href="#table1"><b>Table Of Tables</b></a></td>'.
				"<td align=right><a class=\"metaLink\" href=\"#top\">top</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#toc\">toc</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tof\">tof</a>&nbsp;|&nbsp;<a class=\"metaLink\" href=\"#tot\">tot</a></td>".
				'</tr>'."\n";
	foreach ($tables as $lab => $num) { 
		$w .= '<tr>';
		$w .= '<td colspan="1">&#149; <a href="#table'.$num.'">'.$lab.'</a>'.'</td></tr>'."\n";
	}
	$w .= "</table>";
	echo $w;

	echo "<hr noshade size=1>\n<p>&nbsp;</p>";

	//wArr($anchors);
?>

</td></tr></table>
<?php if ($print!="true") { 
					  include $pre."includes/footer.php";
} ?>
<!-- $Id: docs-EMF_v1.0_Users_Guide.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
