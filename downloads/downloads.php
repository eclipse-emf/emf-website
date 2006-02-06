<?php
	$pre = "../";
	$doHeaderAndFooter=1;
	
	$HTMLTitle = "Eclipse Tools - EMF Download Stats";
	$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
	
$TODOs = '<pre>
// TODO: TREND ANALYSIS - need slice-by-slice comparision instead of merging 
// data across group of slices, eg. 12 months in a year, 13 weeks in a quarter
// TODO: TREND PLOTS (simple HTML bar charts)

// TODO: add cookies to store selections so on return same options are again selected?
</pre>';
	
	class Timer { 
		/* thanks to http://ca.php.net/microtime -> ed [at] twixcoding [dot] com */
		// Starts, Ends and Displays Page Creation Time
		function getmicrotime() {
			list($usec, $sec) = explode(" ", microtime());
			return ((float)$usec + (float)$sec);
		}    
		function starttime() {
			$this->st = $this->getmicrotime();
		}
		function displaytime() {
		    $this->et = $this->getmicrotime();
		    return round(($this->et - $this->st), 3);
		}
	}
	
    $time = new Timer; $time->starttime();
    
    require_once($pre."includes/xmllib.php");

    $debug=$_GET["debug"]; if ($debug) $doHeaderAndFooter=0;

    $months=$_GET["month"]-0<0?date("m",strtotime("-1 month")):$_GET["month"]; 
    $weeks=$_GET["week"]-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$_GET["week"];
    $dates=$_GET["date"]-0<0?date("Ymd",strtotime("-1 day")):$_GET["date"];
    $type=$_GET["type"]?$_GET["type"]:"File"; // Domain or File
    $range=$_GET["range"]?$_GET["range"]:'mm'; 
    $rangeLimit=$_GET["rangeLimit"]?$_GET["rangeLimit"]:-1;
    $sortBy=$_GET["sortBy"]?$_GET["sortBy"]:"Hits";
    $groups=$_GET["groups"]?$_GET["groups"]:array(); if (!is_array($groups)) $groups = array($groups);
    $thresh=$_GET["thresh"]?$_GET["thresh"]:100; // minimum grouping for "others"
    $weighted=strlen($_GET["weighted"])>0?$_GET["weighted"]:true;
    
    $weights = array(
		"zip" => 1, 
		"jar" => array("2.0" => 51, "2.1" => 59, "2.2" => 65)
	);
    
    switch ($range) {
		case "ym":
			if (!$months) {
				$rangeLimit = $rangeLimit-0<0?date("m",strtotime("-1 month")):$rangeLimit;
			}
			for ($i=0;$i<=11;$i++) {
				$months[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:12+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
			} 
			break;
		case "hm":
			if (!$months) {
				$rangeLimit = $rangeLimit-0<0?date("m",strtotime("-1 month")):$rangeLimit;
			}
			for ($i=0;$i<=5;$i++) {
				$months[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:12+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
			} 
			break;
		case "qm":
			if (!$months) {
				$rangeLimit = $rangeLimit-0<0?date("m",strtotime("-1 month")):$rangeLimit;
			}
			for ($i=0;$i<=2;$i++) {
				$months[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:12+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
			} 
			break;
		case "mm":
			if (!$months) {
				$rangeLimit = $rangeLimit-0<0?date("m",strtotime("-1 month")):$rangeLimit;
				$months = array($rangeLimit);
			} 
			break;
		case "qw":
			if (!$weeks) {
				$rangeLimit = $rangeLimit-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$rangeLimit;
			}
			for ($i=0;$i<=12;$i++) {
				$weeks[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:52+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
			} 
			break;
		case "mw":
			if (!$weeks) {
				$rangeLimit = $rangeLimit-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$rangeLimit;
			}
			for ($i=0;$i<=3;$i++) {
				$weeks[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:52+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
			} 
			break;
		case "ww":
			if (!$weeks) {
				$rangeLimit = $rangeLimit-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$rangeLimit;
				$weeks = array($rangeLimit);
			}
			break;
		case "fd":
			if (!$dates) {
				$rangeLimit = $rangeLimit-0<0?date("Ymd",strtotime("-1 day")):$rangeLimit;
			}
			for ($i=0;$i<=13;$i++) {
				$dates[] = date("Ymd", strtotime("-".$i." day",strtotime($rangeLimit))); 
			} 
			break;
		case "wd":
			if (!$dates) {
				$rangeLimit = $rangeLimit-0<0?date("Ymd",strtotime("-1 day")):$rangeLimit;
			}
			for ($i=0;$i<=6;$i++) {
				$dates[] = date("Ymd", strtotime("-".$i." day",strtotime($rangeLimit))); 
			} 
			break;
		case "dd":
			if (!$dates) {
				$rangeLimit = $rangeLimit-0<0?date("Ymd",strtotime("-1 day")):$rangeLimit;
				$dates = array($rangeLimit);
			}
			break;
		default:
			break;
	}
	
	if ($months && !is_array($months)) $months = array($months);
	if ($weeks && !is_array($weeks)) $weeks = array($weeks);
	if ($dates && !is_array($dates)) $dates = array($dates);
    
    if (!$months && !$weeks && !$dates) {
    	$months=array(date("m",strtotime("-1 month")));
    }
        
    if (!$doHeaderAndFooter) {
    	include_once $pre."includes/scripts.php";
    }
        
    $filenames = array();
    
    // yearly-by-month (12), half-by-month (6), quarterly-by-month (3), 
    // [half-by-week (26)]?, quarterly-by-week (13), monthly-by-week (4 or 5),
    // [monthly-by-day (28-31)]?, fortnight-by-day (14), weekly-by-day (7) 
    // specific month, specific week, specific day 
      
    if ($months) {
    	foreach ($months as $month)	$filenames = array_merge($filenames,getDirContents("./xml/monthly","stats_".$type."_month_".$month));
    } else if ($weeks) { 
    	foreach ($weeks as $week) 	$filenames = array_merge($filenames,getDirContents("./xml/weekly","stats_".$type."_week_".$week)); 
    } else if ($dates) { 
    	foreach ($dates as $date) 	$filenames = array_merge($filenames,getDirContents("./xml/nightly","stats_".$type."_date_".$date));
    }
   	$filenames = array_unique($filenames); 
   
    if ($debug) {
		echo "type=$type, range=$range / rangeLimit=$rangeLimit <hr> ";
	    echo "month=";wArr($months); echo "<hr> week=";wArr($weeks); echo "<hr> date=";wArr($dates); echo "<hr>";
	    w(sizeof($filenames)." filenames found:",1);
	    wArr($filenames);
    }
            
            
    /** calculate data & summary values, and apply groupings if applicable **/
    $data = array();
    $summary = array();
    foreach ($filenames as $i => $filename) {
	    // open and read file
	  	$xml =& new xmlParser($filename);
		// parse document and return rootnode
		$doc =& $xml->getDocument();	//echo $doc->nodeName(); // data
		
		// want to get <file count="56308" url="org.eclipse.emf.ecore.edit_2.1.1.jar"/>
		// as $data["org.eclipse.emf.ecore.edit_2.1.1.jar"] += 56308; 
		$count=0;
		if ($doc->hasChildren()) {
			for ($i=0;$i<count($doc->children());$i++) {
				$node = $doc->children[$i];
				//echo $i.", ".$node->nodeName()."<br>";
				if ($node->nodeName()==strtolower($type)) { // "<file />" only
					if (array_key_exists("url",$node->attributes)) {
						if (in_array("groupSmall",$groups) && $node->getAttribute("count")<=$thresh) {
							$data["Other Files Under $thresh Hits Each"] += $node->getAttribute("count");
						} else {
							$weight = 1;
							if ($weighted) {
								$url = $node->getAttribute("url");
								if (false!==strpos($url,".zip")) {
									$weight = $weights["zip"];
								} else if (false!==strpos($url,".jar")) {
									$ver = 
										(false!==strpos($url,"_2.2.") ? "2.2" : 
											(false!==strpos($url,"_2.1.") ? "2.1" :
												(false!==strpos($url,"_2.0.") ? "2.0" : null // no other option
												) 
											) 
										);
									$weight = $ver?$weights["jar"][$ver]:1;
								}
							} 
							$EMFOrXSD="";
							if (in_array("groupVersion",$groups) && in_array("groupType",$groups)) {
								$url = $node->getAttribute("url");
								if (in_array("groupProject",$groups)) $EMFOrXSD = getEMFOrXSD($url);
								$url = split('[-_]',$url); $url = $EMFOrXSD.$url[sizeof($url)-1];
							} else if (in_array("groupVersion",$groups)) {
								$url = substr($node->getAttribute("url"),0,-4); // remove .jar or .zip
								if (in_array("groupProject",$groups)) $EMFOrXSD = getEMFOrXSD($url);
								$url = split('[-_]',$url); $url = $EMFOrXSD.$url[sizeof($url)-1];
							} else if (in_array("groupType",$groups)) {
								$url = $node->getAttribute("url");
								if (in_array("groupProject",$groups)) $EMFOrXSD = getEMFOrXSD($url);
								$url = $EMFOrXSD.substr($url,-3);
							} else if (in_array("groupProject",$groups)) {
								$url = getEMFOrXSD($node->getAttribute("url"));
							} else {
								$url = $node->getAttribute("url");
							} 
							$data[$url] += $node->getAttribute("count")/$weight; // weight by dividing by weight so that an emf 2.1.x jar counts for 1/59th value
						}
						//echo "\$data[".$node->getAttribute("url")."] += ".$node->getAttribute("count")."; <br>\n";
						$summary["weightedhits"] += $node->getAttribute("count")/$weight;
						$count++;
					} else if (array_key_exists("tld",$node->attributes)) { // "<domain />" only
						if (in_array("groupSmall",$groups) && $node->getAttribute("count")<=$thresh) {
							$data["Other Domains Under $thresh Hits Each"] += $node->getAttribute("count");
						} else {
							$tld = $node->getAttribute("tld");
							if (in_array("groupTLD",$groups)) {
								if (strlen($tld)<2) { 
									$tld = "Other Unknown Domains (<2)";
								} else if (strlen($tld)>4) {
									$tld = "Other Non-Standard Domains (>4)";
								}
							}
							$data[$tld] += $node->getAttribute("count");
						}
						//echo "\$data[".$node->getAttribute("tld")."] += ".$node->getAttribute("count")."; <br>\n";
						$summary["weightedhits"] += $node->getAttribute("count");
						$count++;
					}
				} else if ($node->nodeName()=="summary") { // "<summary />" only
					foreach ($node->attributes as $k => $v) if ($k=="count") $summary["hits"] += $v;
				}
			}
		}
    }
    $xml=null;
    $doc=null;
    $node=null;
    
    $summary["count"] += sizeof($data);
    $summary["weightedhits"] = round($summary["weightedhits"]);
    if ($sortBy=="Hits") { arsort($data); } else { ksort($data); } reset($data); 
    
    $data = adjustData($data);
    
/**********************************************************/

    if ($doHeaderAndFooter) { include ($pre."includes/header.php"); }
	
	// include detaildiv javascript    
    echo '<script type="text/javascript" src="http://www.eclipse.org/emf/includes/detaildiv.js"></script>'."\n";

    displayNav();
    displayResults($data, $summary);   
    
    if ($TODOs) echo "<p align=\"left\"><small>".$TODOs."</small></p>";
     
	if ($doHeaderAndFooter) { include ($pre."includes/footer.php"); }

/**********************************************************/

function displayNav() { 
	global $range,$rangeLimit,$type,$dates,$weeks,$months,$sortBy,$groups,$thresh,$weighted,$weights; 
?>

<script language="javascript">

function doOptions(field) { // hide or show the divs with options that apply ONLY to one type or the other
	field.focus();
	servOC('DomainOptions',0);	
	servOC('FileOptions',0);
}

</script>
<form method="get" name="statsForm">
<table width="600">
<tr>
	<td width="150"><b>Data Type:</b></td>
	<td>
		<input onfocus="doOptions(this)" type="radio" <?php echo ($type=='Domain'?'checked ':''); ?>value="Domain" name="type"> Domain (Countries)
		<input onfocus="doOptions(this)" type="radio" <?php echo ($type=='File'?'checked ':''); ?>value="File" name="type"> File (Zips &amp; Jars)
	</td>
</tr>

<tr>
	<td><b>Data Sort:</b></td>
	<td>
		<input type="radio" <?php echo ($sortBy=='Key'?'checked ':''); ?>value="Key" name="sortBy"> Domain or File 
		<input type="radio" <?php echo ($sortBy=='Hits'?'checked ':''); ?>value="Hits" name="sortBy"> Hits
	</td>
</tr>

<tr>
	<td><b>Hit Grouping:</b></td>
	<td>
		<input type="checkbox" <?php echo (in_array("groupSmall",$groups)?'checked ':''); ?>value="groupSmall" name="groups[]"> If Hits Under <input type="text" size="5" value="<?php echo $thresh; ?>" name="thresh"/>
	</td>
</tr>
<tr><td colspan="2"><hr noshade="noshade" size="1" width="100%"/></td></tr>

<tr valign="top" style="display:<?php echo $type=="File"?"show":"none"; ?>" id="ihtrFileOptions">
	<td width="150"><b>File Grouping:</b></td>
	<td>
		<input type="checkbox" <?php echo (in_array("groupProject",$groups)?'checked ':''); ?>value="groupProject" name="groups[]"> Files By Project (EMF, XSD)<br/>
		<input type="checkbox" <?php echo (in_array("groupVersion",$groups)?'checked ':''); ?>value="groupVersion" name="groups[]"> Files By Version (2.2.0, 2.1.2, etc.)<br/>
		<input type="checkbox" <?php echo (in_array("groupType",$groups)?'checked ':''); ?>value="groupType" name="groups[]"> Files By Type (UM Jars vs. Zips)<br/>
		<input type="radio" <?php echo ($weighted?'checked ':''); ?>value="1" name="weighted"> Files Weighted By Approx. # Files Per Release
		<input type="radio" <?php echo (!$weighted?'checked ':''); ?>value="0" name="weighted"> Unweighted<br/>
			&#160;&#160;&#160;&#160;&#160;&#160;[<?php 
				$d=0;
				foreach ($weights as $weight => $num) { 
					if (++$d > 1) { echo ", "; }
					echo "$weight = ".(!is_array($num)?$num:"");
					if (is_array($num)) {
						echo "{";
						$c=0;
						foreach ($num as $ver => $val) {
							if (++$c > 1) { echo ", "; }
							echo "EMF $ver = $val";
						}
						echo "}";
					}
				} ?>]<br/>

	</td>
</tr>

<tr style="display:<?php echo $type=="Domain"?"show":"none"; ?>" id="ihtrDomainOptions">
	<td width="150"><b>Domain Grouping:</b></td>
	<td>
		<input type="checkbox" <?php echo (in_array("groupTLD",$groups)?'checked ':''); ?>value="groupTLD" name="groups[]"> Domains By Type<br/>
	</td>
</tr>
<tr><td colspan="2"><hr noshade="noshade" size="1" width="100%"/></td></tr>

<tr>
	<td width="150"><b>Data Range:</b></td>
	<td>
		<select name="range" onchange="document.statsForm.rangeLimit.selectedIndex=0;document.statsForm.submit()">
<?php 
	$rangeOptions = array(
		// yearly-by-month (12), half-by-month (6), quarterly-by-month (3), a specific month (1) 
		"1 year (monthly)" => "ym",
		"1 half (monthly)" => "hm",
		"1 quarter (monthly)" => "qm",
		"1 month" => "mm",

	    // [half-by-week (26)]?, quarterly-by-week (13), monthly-by-week (4 or 5), a specific week (1)
		"1 quarter (weekly)" => "qw",
		"1 month (weekly)" => "mw",
		"1 week" => "ww",

	    // [monthly-by-day (28-31)]?, fortnight-by-day (14), weekly-by-day (7), a specific day (1)
		"1 fortnight (daily)" => "fd",
		"1 week (daily)" => "wd",
		"1 day" => "dd" 
	);
	
	foreach ($rangeOptions as $label => $value) {
		echo '		<option '.($range==$value?'selected ':'').'value="'.$value.'">'.$label.'</option>'."\n";
	} ?>
		</select> 
		
		&#160;
<?php 
			$vals = getDirContentsRange($type,$range,true); 
			echo '		<select name="rangeLimit" onchange="document.statsForm.submit()">'."\n";
			echo '			<option value="-1">Choose</option>'."\n";
			foreach ($vals as $label) {
				echo '		<option '.($rangeLimit==$label?'selected ':'').'value="'.$label.'">'.$label.'</option>'."\n";
			}
			echo '		</select>'."\n";
?>
		
		&#160;
		
		<input type="submit" value="Go!"/>
				
	</td>
</tr>
</table> 
</form>

<?php
	
} 

// Files / Hits / Percent or Domains / Hits / Percent
function displayResults($data, $summary) { 
	global $type,$filenames,$time,$pre,$weighted;
	
	if ($summary) {
		$bgc = array('#FFFFFF','#EEEEEE'); $i=0;

		$filelist = getFileList($filenames);
		$rowsp = ($weighted&&$summary["weightedhits"]!=$summary["hits"]?5:4);
		echo '<p><form name="filelist"><table border="0">'."\n".
			 '<tr bgcolor="navy"><td colspan="3"><b style="color:white">Totals</b></td></tr>'."\n".
			 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td colspan="2">Date'.(sizeof($filelist)>1?'s':'').' processed --&gt;</td>'.
			 '<td valign="top" rowspan="'.$rowsp.'">'.
	 		 	'<select name="filelist" size="'.$rowsp.'">'."\n";
		foreach ($filelist as $file) {
			echo "<option>$file</option>\n"; 
		}	
	 	echo 
	 		 '</select>' .
	 		 '</td></tr>'."\n";
			 
		echo
	 		 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>Total Hits</td><td>'.$summary["hits"].'</td></tr>'."\n".
	 		 ($weighted&&$summary["weightedhits"]!=$summary["hits"]?'<tr bgcolor="'.$bgc[(++$i)%2].'"><td>Weighted Hits</td><td>'.$summary["weightedhits"].'</td></tr>'."\n":'').
	 		 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>'.$type.'s / Groups</td><td>'.$summary["count"].'</td></tr>'."\n".
			 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>Elapsed Time</td><td>'.$time->displaytime().'s</td></tr>'."\n".
			 '</table></form></p>'."\n";

		$header= '<table width="600"><tr bgcolor="navy">' .
			'<td colspan=2><b style="color:white">'.$type.'s</b></td>' .
			'<td><b style="color:white">Hits</b></td>' .
			'<td colspan="2"><b style="color:white">Percent</b></td>' .
			'</tr>'."\n";
			
		echo $header;
		
		$i=0;
		$hits = $weighted?$summary["weightedhits"]:$summary["hits"];
		foreach ($data as $hit => $count) {
			if ($i && $i%100==0) echo '</table>'."\n".$header;
			echo '<tr bgcolor="'.$bgc[(++$i)%2].'">'."\n";
			echo '  <td width="25">'.$i.'</td>'."\n";
			echo '  <td width="100%">'.$hit.'</td>'."\n";
			$pc = (round($count/$hits*10000)/100);
			$col = (false!==strpos($hit,"xsd")?"orange":(false!==strpos($hit,"emf")?"green":"purple"));
			echo '  <td width="25" align="right">'.round($count).'</td>'."\n";
			echo '  <td width="25" align="right">'.$pc.'%</td>' ."\n";
			echo '  <td valign="middle" width="50" bgcolor="#FFFFFF">' .
					'<img alt="'.$pc.'%" src="http://www.eclipse.org/emf/images/misc/bar-' . $col .
					'.png" width="'.(round($pc)*150/100).'" height="10"/></td>'."\n";
			echo '</tr>'."\n";
		}
		echo "</table>\n";
	}

}

// move the "Other..." entry to the bottom of the array
function adjustData($data) {
	global $type;
	$last = array();
	$out = array();
	foreach ($data as $k => $v) {
		if (false!==strpos($k,"Other")) {
			$last[$k] = $v;
		} else {
			$out[$k] = $v;
		}
	}
	if (sizeof($last)>0) foreach ($last as $k => $v) $out[$k] = $v;
	return $out;
}

function getEMFOrXSD($url) {
	return 
		(false!==strpos($url,"xsd")&&false===strpos($url,"emf")?"xsd (only) ":
		(false!==strpos($url,"emf")?"emf (incl. SDK) ":
		""));
}

function getFileList() {
	global $type,$range,$filenames; 
	$r = substr($range,1); // "m", "w", or "d" //echo $r;
	$r1 = array("m" => "monthly", "w" => "weekly", "d" => "nightly");
	$r2 = array("m" => "month", "w" => "week", "d" => "date");
	$dir = "./xml/".$r1[$r];
	$pat = "stats_".$type."_".$r2[$r]."_";
	$vals = array(); 
	foreach ($filenames as $k => $value) {
		$vals[$k] = str_replace(".xml","",substr($value,strlen($dir."/".$pat)));
	}
	return $vals;
}

function getDirContentsRange($type,$range,$doTrim=false) { 
// for a given type, range, and limit, return ONLY the appropriate files 
	$r = substr($range,1); // "m", "w", or "d" //echo $r;
	$r1 = array("m" => "monthly", "w" => "weekly", "d" => "nightly");
	$r2 = array("m" => "month", "w" => "week", "d" => "date");
	$dir = "./xml/".$r1[$r];
	$pat = "stats_".$type."_".$r2[$r]."_";
	$vals = getDirContents($dir,$pat); 
	if ($r=="d") { rsort($vals); } else { sort($vals); } reset($vals);
	if ($doTrim) {
		$vals2 = array();
		foreach ($vals as $k => $value) {
			$vals2[$k] = str_replace(".xml","",substr($value,strlen($dir."/".$pat)));
		}
		$vals = $vals2;
	}
	return $vals;
}

function getDirContents($dir,$pat) { // array of files including dir prefix
$stuff = array();
if (is_dir($dir) && is_readable($dir)) { 
	ini_set("display_errors","0"); // suppress file not found errors
	$handle=opendir($dir);
	while (($file = readdir($handle))!==false) {
//			  echo $file.", $pat<br>\n";
	  if ( ($pat=="" || false!==strpos($file,$pat)) && $file!=".." && $file!=".") { 
		  $stuff[] = $dir."/".$file; 
	  }
	}
	closedir($handle); 
	ini_set("display_errors","1"); // and turn 'em back on.
	}
	return $stuff;
}

?>
<!-- $Id: downloads.php,v 1.5 2006/02/06 20:53:31 nickb Exp $ -->