<?php
	$pre = "../";
	
	// TODO: need timeperiod-by-timeperiod comparision instead of merges; thus 
	// compare JUST the overall numbers between 2 months, or 4 weeks, or daily within a week, etc.
	// TODO: add plots
		
	// TODO: filter all .jar files into one group, all .zip in another
	// TODO: filter by file version / release, with or without grouping by .zip/.jar
	// TODO: filter if # hits < 100 
	
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

//    include ($pre."includes/header.php");
    
    $months=$_GET["month"]-0<0?date("m",strtotime("-1 month")):$_GET["month"]; 
    $weeks=$_GET["week"]-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$_GET["week"];
    $dates=$_GET["date"]-0<0?date("Ymd",strtotime("-1 day")):$_GET["date"];
    $type=$_GET["type"]?$_GET["type"]:"Domain"; // Domain or File
    $range=$_GET["range"]?$_GET["range"]:'mm'; 
    $rangeLimit=$_GET["rangeLimit"]?$_GET["rangeLimit"]:-1;
    $sortBy=$_GET["sortBy"]?$_GET["sortBy"]:"Hits";
    
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
				$dates[] = date("Ymd", strtotime($rangeLimit . " -".$i." day")); 
			} 
			break;
		case "wd":
			if (!$dates) {
				$rangeLimit = $rangeLimit-0<0?date("Ymd",strtotime("-1 day")):$rangeLimit;
			}
			for ($i=0;$i<=6;$i++) {
				$dates[] = date("Ymd", strtotime($rangeLimit . " -".$i." day")); 
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
   
    /*
	echo "type=$type, range=$range / rangeLimit=$rangeLimit <hr> ";
    echo "month=";wArr($months); echo "<hr> week=";wArr($weeks); echo "<hr> date=";wArr($dates); echo "<hr>";
    w(sizeof($filenames)." filenames found:",1);
    wArr($filenames);
    */
    
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
				if ($node->nodeName()==strtolower($type)) { // "<file />" or "<domain />" only
					if (array_key_exists("url",$node->attributes)) {
						$data[$node->getAttribute("url")] += $node->getAttribute("count");
						//echo "\$data[".$node->getAttribute("url")."] += ".$node->getAttribute("count")."; <br>\n";
						$count++;
					} else if (array_key_exists("tld",$node->attributes)) {
						$data[$node->getAttribute("tld")] += $node->getAttribute("count");
						//echo "\$data[".$node->getAttribute("tld")."] += ".$node->getAttribute("count")."; <br>\n";
						$count++;
					}
				} else if ($node->nodeName()=="summary") { // "<summary />" only
					foreach ($node->attributes as $k => $v) {
						if ($k=="count") { 
							$summary["hits"] += $v;
						} else {
							$summary["type"] = $k;
						}
					}
				}
			}
		}
    }
    $xml=null;
    $doc=null;
    $node=null;
    
    $summary["count"] += sizeof($data);
    if ($sortBy=="Hits") { arsort($data); } else { ksort($data); } reset($data); 
    
    displayNav();
    
    displayResults($data, $summary);   
    
    echo "<p align=\"right\"><small>".$time->displaytime()."s</small></p>";
     
//    include ($pre."includes/footer.php");

/**********************************************************/

function displayResults($data, $summary) { 
	global $type;
	
	if ($summary) {

		echo '<p>Total Hits: '.$summary["hits"].' for '.$summary["count"].' unique '.$summary["type"].'</p>'."\n";

		$header= '<table width="600"><tr bgcolor="navy">' .
			'<td colspan=2><b style="color:white">'.ucfirst($summary["type"]).'</b></td>' .
			'<td><b style="color:white">Hits</b></td>' .
			'</tr>'."\n";
			
		echo $header;
		
		$i=0;
		foreach ($data as $hit => $count) {
			if ($i && $i%200==0)
				echo '</table>'."\n".$header;
			
			$i++;
			echo '<tr bgcolor="'.($i%2==1?'#EEEEEE':'#FFFFFF').'">'."\n";
			echo '  <td width="25">'.$i.'</td>'."\n";
			echo '  <td width="550">'.$hit.'</td>'."\n";
			echo '  <td width="25">'.$count.'</td>'."\n";
			echo '</tr>'."\n";
		}
		echo "</table>\n";
	}

}

function displayNav() { 
	global $range,$rangeLimit,$type,$dates,$weeks,$months,$sortBy; 
?>

<table>
<form method="get" name="statsForm">
<tr>
	<td><b>Data Type:</b></td>
	<td>
		<input type="radio" <?php echo ($type=='Domain'?'checked ':''); ?>value="Domain" name="type"> Domain (Countries)
		<input type="radio" <?php echo ($type=='File'?'checked ':''); ?>value="File" name="type"> File (Zips &amp; Jars)
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
	<td><b>Data Range:</b></td>
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
			$vals = getDirContentsRange($type,$range,$rangeLimit,true); 
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
</form>
</table> 

<?php
	
} 

function getDirContentsRange($type,$range,$rangeLimit,$doTrim=false) { 
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


?>