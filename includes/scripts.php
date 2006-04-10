<?php 

	// $Id: scripts.php,v 1.13 2006/04/10 17:00:59 nickb Exp $ 

	function getPWD($suf="") {
		$PWD="";
		global $_SERVER;

		$debug_echoPWD=1; // set 0 to hide (for security purposes!)

		//dynamic assignments
		$PWD = preg_replace("/(.+\/)scripts\/[^\/]+\.php/","$1",$_SERVER["SCRIPT_FILENAME"]); // strip php filename from path 
		$PWD = $PWD.$suf;

		if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { echo "<!-- Found[1dyn]: PWD -->"; $debug_echoPWD=0; }

		//static assignments
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			if ($_SERVER["HTTP_HOST"]=="emf.torolab.ibm.com" || $_SERVER["HTTP_HOST"]=="emf") {
				$PWD = "/home/www-data/emf-build/tools/emf/downloads/drops"; 
			} else if ($_SERVER["HTTP_HOST"]=="download1.eclipse.org") {
				$PWD = "/home/data/httpd/download.eclipse.org/tools/emf/".$suf;
			} else if ($_SERVER["HTTP_HOST"]=="fullmoon.torolab.ibm.com") {
				$PWD = "/home/www/tools/emf/".$suf; 
			}
		}

		if ($debug_echoPWD && is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { echo "<!-- Found[2stat]: PWD -->"; $debug_echoPWD=0; }

		//try a default guess: /home/www, two options
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			$PWD = "/home/data/httpd/download.eclipse.org/"; 
			if (is_dir($PWD) && is_readable($PWD)) { 
				// try 1:
				$PWD = "/home/data/httpd/download.eclipse.org/tools/emf/".$suf; // default path

				if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
					if ($debug_echoPWD ) { echo "<!-- Found[3def-a]: PWD -->"; $debug_echoPWD=0; }
				} else {
					// try 2:
					$PWD = "/home/www/eclipse/tools/emf/".$suf; // default path
					if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
						if ($debug_echoPWD ) { echo "<!-- Found[3def-b]: PWD -->"; $debug_echoPWD=0; }
					}
				}
			}
		}

		//try a second default guess: /var/www, two options
		if (!is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			$PWD = "/var/www/"; 
			if (is_dir($PWD) && is_readable($PWD)) { 
				// try 1:
				$PWD = "/var/www/tools/emf/".$suf; // default path

				if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
					if ($debug_echoPWD) { echo "<!-- Found[4def-a]: PWD -->"; $debug_echoPWD=0; }
				} else {
					// try 2:
					$PWD = "/var/www/eclipse/tools/emf/".$suf; // default path
					if (is_dir($PWD) && is_readable($PWD) && ($suf!="logs" || is_writable($PWD)) ) { 
						if ($debug_echoPWD) { echo "<!-- Found[4def-b]: PWD -->"; $debug_echoPWD=0; }
					}
				}
			}
		}

		if ($PWD=="" || !is_dir($PWD) || !is_readable($PWD) || ($suf=="logs" && !is_writable($PWD)) ) { 
			echo "<!-- PWD not found! -->";
		}

		//okay, give up
		/*if ($PWD=="" || !is_dir($PWD) || !is_readable($PWD)) { 
				$dir = $PWD;
				echo "<p> Directory ($dir) <b>".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))."</b> on mirror: <b>".$_SERVER["HTTP_HOST"]."</b>! </p>";
				echo "<p> Please report this error to <a href=\"mailto:codeslave@ca.ibm.com?Subject=Directory ($dir) ".(!is_dir($dir)?"NOT FOUND":(!is_readable($dir)?"NOT READABLE":"PROBLEM"))." in scripts.php::getPWD() on mirror ".$_SERVER["HTTP_HOST"]."\">codeslave@ca.ibm.com</a>, or make directory readable. </p>";
				exit;
		}*/

		return $PWD;
	}

	// load a directory into an array of filenames or subdir names
	//usage: getDirList("./some-folder/","(\.html)","f"); // get files
	//usage: getDirList("./some-folder/","(folderExt)","d"); // get dirs
	function loadDir($dir,$ext,$type) {	// 2D array, not 1D
		//$index=0;
		$stuff = array();
		if (is_dir($dir)) { 
			// FIXED FEB 04 - must use krsort on returned dirs to sort by KEY, not VALUE
			//$i=0;
			$handle=opendir($dir);
			while (($file = readdir($handle))!==false) {
				//echo $file;
			  if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $type=="f") { 
				  $i=filemtime("$dir/$file"); // new, Jan 3
					  $stuff[substr($file,0,1)]["f".$i] = "$file"; 
				  //$index++;
				  //w("$index, $dir, $file, f$i",1);
			  } else if ( ($ext=="" || preg_match("/".$ext."$/",$file)) && $file!=".." && $file!="." && $type=="d") {
				  $i=filemtime("$dir/$file"); // new, Jan 3
					  $stuff[substr($file,0,1)]["d".$i] = "$file"; 
				  //$index++;
				  //w("$index, $dir, $file, d$i",1);
			  }
			}
			closedir($handle); 
		} 
		return $stuff;
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

	function getFile($file) {
		global $WWWpre, $WWWprePhysical, $isEclipseCluster;
		$fp = false;
		$contents = "";
		if ($isEclipseCluster) { 
			$fp = fopen($WWWprePhysical . $file, "r");
		} else {
			$fp = fopen($WWWpre . $file, "r");
		}
		if ($fp !== false) {
		    while (!feof($fp)) { $contents .= fread($fp, 4096); }
			fclose($fp);
			if (false!==strpos($contents,"\n")) return explode("\n", $contents);
		}
		return array($contents);
	}

	function getNews($lim,$key,$style="horiz",$divider="") {
		global $CVSpre,$pre,$isWWWserver; 
		$xml = getFile("news/news.xml"); 
		if (!$xml) {
			$xml = array();
		}
		$xmlCollect=0;
		$xmlItems = array();
		$xmlCurrentDate=null;
		foreach ($xml as $line) { 
			$m=null;
			if (preg_match("/\<news date\=\"([^\"]+)\" showOn\=\"([^\"]+)\"\>/",$line,$m)) { // start of item, date
				if (strstr($m[2],",")) {
					$keys = explode(",",$m[2]);
				} else {
					$keys = array($m[2]);
				}
				if ($key=="all" || in_array($key,$keys)) { // only show 'em if they match
					$xmlCollect = 1;
					$xmlCurrentDate = $m[1];
					$xmlItems[] = array($m[1] => "");
				}
			} else if ($key=="all" && preg_match("/\<news date\=\"([^\"]+)\"\>/",$line,$m)) { // start of item, date
				$xmlCollect = 1;
				$xmlCurrentDate = $m[1];
				$xmlItems[] = array($m[1] => "");
			} else if ($xmlCollect && !preg_match("/\<\/news\>/",$line,$m)) { // while collecting contents
				$line = preg_replace("/href=\"\#latest/","href=\""."downloads.php#latest",$line);
				//$line = preg_replace("/href=\"\#(emf\_3)/","href=\"whatsnew.php?ver=3.x#emf_3",$line);
				//$line = preg_replace("/href=\"\#([IMNRS]\d{12})/","href=\""."news-release-notes.php?ver=2.0.0#$1",$line); // not needed
				$line = preg_replace("/href=\"\#emf\_((\d)(\d)(\d))/","href=\""."news-release-notes.php?ver=$2.$3.$4#emf_$1",$line);
				if (preg_match("/href=\"downloads.php\"/",$line) && !preg_match("/href=\"http/",$line)) { 
					$line = preg_replace("/href=\"/","href=\"".($isWWWserver?"http://download.eclipse.org/tools/emf/scripts/":$pre),$line);
				} else if (preg_match("/href=\".+\.php\"/",$line) && !preg_match("/href=\"http/",$line)) { 
					$line = preg_replace("/href=\"/","href=\"$pre",$line);
				} else if (preg_match("/href=\".+\.php\?.+\=.+\.html(#[a-zA-Z0-9\_\.]+|#|)\"/",$line) && !preg_match("/href=\"http/",$line)) { 
					// a link such as docs.php?doc=docs/../faq/index.html - no moleste!
				} else if (preg_match("/href=\".+\.html(#[a-zA-Z0-9\_\.]+|#|)\"/",$line) && !preg_match("/href=\"http/",$line)) { 
					$line = preg_replace("/href=\"/","href=\"$CVSpre",$line);
				}
				$xmlItems[sizeof($xmlItems)-1][$xmlCurrentDate] .= $line;
			} else if (preg_match("/\<\/news\>/",$line,$m)) { // end of item
				$xmlCollect = 0;
			} 
		}
		if ($style=="horiz") { 
			echo "<table>";
			foreach ($xmlItems as $i => $pair) { 
				if ($lim<0 || $i<$lim) {
					echo "<tr valign=top>";
					foreach ($pair as $date => $contents) { 
						if (date("Y",strtotime($date))<date("Y")) { 
							echo '<td><span class="'.($key=="whatsnew"?"normal":"").'"><b>'.
								date( ($key=="whatsnew"?"M":"F").'\&\n\b\s\p\;j\<\s\u\p\>S\<\/\s\u\p\>, Y',
								strtotime($date)).'</b></span></td>'."\n";
						} else {
							echo '<td><span class="'.($key=="whatsnew"?"normal":"").'"><b>'.
								date( ($key=="whatsnew"?"M":"F").'\&\n\b\s\p\;j\<\s\u\p\>S\<\/\s\u\p\>', 
								strtotime($date)).'</b></span></td>'."\n";
						}
						echo '<td><span class="'.($key=="whatsnew"?"normal":"").'">&#160;-&#160;</span></td>'."\n";
						echo '<td><span class="'.($key=="whatsnew"?"normal":"").'">';
						if (strtotime($date)>strtotime("-3 weeks")) { 
							echo '<img src="http://www.eclipse.org/emf/images/new.gif" width="31" height="14">';
						}
						echo $contents.'</span></td>'."\n";
					}
					echo "</tr>";
				}
			}
			echo "</table>";
		} else if ($style=="vert") { 
			foreach ($xmlItems as $i => $pair) { 
				if ($lim<0 || $i<$lim) {
					echo "<tr valign=top>";
					foreach ($pair as $date => $contents) { 
						echo "<td>";
						if (strtotime($date)>strtotime("-3 weeks")) { 
							echo '<img src="http://www.eclipse.org/emf/images/new.gif" width="31" height="14">';
						}
						if (date("Y",strtotime($date))<date("Y")) { 
							echo '<span class="'.($key=="whatsnew"?"normal":"").'"><b>'.
								date( ($key=="whatsnew"?"M":"F").'\&\n\b\s\p\;j\<\s\u\p\>S\<\/\s\u\p\>, Y',
								strtotime($date)).'</b></span> - '."\n";
						} else {
							echo '<span class="'.($key=="whatsnew"?"normal":"").'"><b>'.
								date( ($key=="whatsnew"?"M":"F").'\&\n\b\s\p\;j\<\s\u\p\>S\<\/\s\u\p\>', 
								strtotime($date)).'</b></span> - '."\n";
						}
						echo '<span class="'.($key=="whatsnew"?"normal":"").'">';
						echo $contents.'</span></td>'."\n";
					}
					echo "</tr>\n";
					echo $divider;
				}
			}
		}
	}
	
?>