<?php
	$pre = "../";
	$doHeaderAndFooter=1;
	
	$HTMLTitle = "Eclipse Tools - EMF Download Stats";
	$ProjectName = array("EMF","Eclipse Modeling Framework","Download Stats");
	
	// TODO: add cookies to store selections so on return same options are again selected?
	
	// TODO: figure out another way to get at the data - Domain stats are killing the display engine
		// if Domain, use for f in `find `; do cat|grep; done to get subset of data? filter by first letter?

	ini_set("max_execution_time",300); // increase max duration of script
	ini_set("memory_limit", 8388608*2); // increase mem limit
	
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
    $threshType=$_GET["threshType"]?$_GET["threshType"]:"Hits"; 
    
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
//		case "hw":
//			if (!$weeks) {
//				$rangeLimit = $rangeLimit-0<0?exec("date --date=\"\$(date +%Y-%m-%d) -1 week\" +%U"):$rangeLimit;
//			}
//			for ($i=0;$i<=25;$i++) {
//				$weeks[] = str_pad($rangeLimit-$i>0?$rangeLimit-$i:52+$rangeLimit-$i,2,"0",STR_PAD_LEFT); 
//			} 
//			break;
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
//		case "md":
//			if (!$dates) {
//				$rangeLimit = $rangeLimit-0<0?date("Ymd",strtotime("-1 day")):$rangeLimit;
//			}
//			for ($i=0;$i<=29;$i++) {
//				$dates[] = date("Ymd", strtotime("-".$i." day",strtotime($rangeLimit))); 
//			} 
//			break;
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
    $summary = array();	$summary[0] = array();
    $filelist = getFileList($filenames); // wArr($filelist);
    foreach ($filenames as $f => $filename) {
    	$FID = $filelist[$f];
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
					if (array_key_exists("f",$node->attributes)) {
						$EMFOrXSD="";
						if (in_array("groupVersion",$groups) && in_array("groupType",$groups)) {
							$url = substr($node->getAttribute("f"),0,-4); // remove .jar or .zip
							$url = split('[-_]',$url);
							$url = $url[sizeof($url)-1]."|".getFileType($node->getAttribute("f"));
						} else if (in_array("groupVersion",$groups)) {
							$url = substr($node->getAttribute("f"),0,-4); // remove .jar or .zip
							$url = split('[-_]',$url); $url = $url[sizeof($url)-1];
						} else if (in_array("groupType",$groups)) {
							$url = getFileType($node->getAttribute("f"));
						} else {
							$url = $node->getAttribute("f");
						} 
						$data[$url] += $node->getAttribute("n");
						$count++;
					} else if (array_key_exists("c",$node->attributes) || array_key_exists("d",$node->attributes)) { // "<domain />" or "<country />" only
						$tld = $node->getAttribute("c")?$node->getAttribute("c"):$node->getAttribute("d");
						if (in_array("groupTLD",$groups)) {
							if (array_key_exists("c",$node->attributes)) {
								if (strlen($tld)<2) $tld = "Other Unknown (<2)";
								else if (strlen($tld)>4) $tld = "Other Non-Standard (>4)";
							} else {
								$last = explode(".",$tld); $last = $last[sizeof($last)-1];
								if ($last-0==0 && $last!="?") $tld = "$last|$tld"; else $tld = "?|?";
							}
						}
						$data[$tld] += $node->getAttribute("n");
						$count++;
					}
				} else if ($node->nodeName()=="summary") { // "<summary />" only
					foreach ($node->attributes as $k => $v) {
						if ($k=="n") {
							$summary[0]["hits"] += $v;
							if (!is_array($summary[$FID])) $summary[$FID] = array();
							$summary[$FID]["hits"] += $v;
						}
					}
				}
			}
		}
    }
    $xml=null;
    $doc=null;
    $node=null;
    
    $summary[0]["count"] += sizeof($data);
    ksort($summary); reset($summary);
    	
    if ($sortBy=="Hits") { arsort($data); } else { ksort($data); } reset($data); 
    
    $data = adjustData($data);
    
/**********************************************************/

    if ($doHeaderAndFooter) { include ($pre."includes/header.php"); }
	
	// include javascript, etc.  
    echo '
<script type="text/javascript" src="http://www.eclipse.org/emf/includes/detaildiv.js"></script>
<script type="text/javascript" src="http://www.eclipse.org/emf/includes/tooltip.js"></script>
<link rel="stylesheet" href="http://www.eclipse.org/emf/includes/tooltip.css" type="text/css"/>
<div id="dhtmltooltip"></div>
';

    displayNav();
    displayResults($data, $summary);  
    
    echo '<p align=right><small style="font-size:9px">'.$time->displaytime().'s</small></p>'."\n";
    
	if ($doHeaderAndFooter) { include ($pre."includes/footer.php"); }

/**********************************************************/

function displayNav() { 
	global $range,$rangeLimit,$type,$dates,$weeks,$months,$sortBy,$groups,$thresh,$threshType; 
?>

<script language="javascript">

// hide or show the divs with options that apply ONLY to one type or the other
prevChecked='<?php echo $type; ?>';
function doOptions(field,newVal) { 
	if (!field.checked && newVal.indexOf(prevChecked)<0) {
		prevChecked=newVal;
		servOC('DomainOptions',0); servOC('FileOptions',0);
	}
}

function doSort() { 
	document.forms.statsForm.sortBy[0].checked = true;
}

function showXML(dateStamp,type,range) {
	winTarg="_blank";
	document.target=winTarg; 
	range = range.substr(1,1); //alert(document.target+"\n"+dateStamp+","+type+","+range);
	xmlfile = (range=="d" ? 
				"nightly/stats_"+type+"_date_"+dateStamp+".xml" : 
				(range=="w" ? 
					"weekly/stats_"+type+"_week_"+dateStamp+".xml" : 
					(range=="m" ? 
						"monthly/stats_"+type+"_month_"+dateStamp+".xml" : 
						""
					)
				)
			);
	if (xmlfile) { //alert(xmlfile);
		window.open("./xml/"+xmlfile,winTarg);
	}
	document.target="_self"; 
}

</script>
<form method="get" name="statsForm">
<table width="600">
<tr>
	<td width="150"><b>Data Type:</b></td>
	<td><table>
		<tr><td><input onfocus="doOptions(this,'Domain/Country')" type="radio" <?php echo ($type=='Country'?'checked ':''); ?>value="Country" name="type">By Country</td><td>[Fast!]</td></tr>
		<tr><td><input onfocus="doOptions(this,'File')" type="radio" <?php echo ($type=='File'?'checked ':''); ?>value="File" name="type"> By File (Zips &amp; Jars)</td><td>[Medium]</td></tr>
		<tr><td><input onfocus="doOptions(this,'Domain/Country')" type="radio" <?php echo ($type=='Domain'?'checked ':''); ?>value="Domain" name="type"> Domain</td><td>[Very Slow! 
			- Use Only 1 Month Of Data Or Less]</td></tr>
	</table></td>
</tr>
<tr><td colspan="2"><hr noshade="noshade" size="1" width="100%"/></td></tr>

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
		<input type="radio" <?php echo ($threshType=='Hits'?'checked ':''); ?>value="Hits" name="threshType"> Hits 
		<input type="radio" <?php echo ($threshType=='Percent'?'checked ':''); ?>value="Percent" name="threshType"> Percent
		
	</td>
</tr>
<tr><td colspan="2"><hr noshade="noshade" size="1" width="100%"/></td></tr>

<tr valign="top" style="display:<?php echo $type!="File"?"none":"show"; ?>" id="ihtrFileOptions">
	<td width="150"><b>File Grouping:</b></td>
	<td>
		<input type="checkbox" <?php echo (in_array("groupVersion",$groups)?'checked ':''); ?>value="groupVersion" name="groups[]"> Files By Version (2.2.0, 2.1.2, etc.)<br/>
		<input type="checkbox" <?php echo (in_array("groupType",$groups)?'checked ':''); ?>value="groupType" name="groups[]"> Files By Type (UM Jars vs. Zips)<br/>
	</td>
</tr>

<tr style="display:<?php echo $type!="File"?"show":"none"; ?>" id="ihtrDomainOptions">
	<td width="150"><b>Domain &amp; Country Grouping:</b></td>
	<td>
		<input type="checkbox" <?php echo (in_array("groupTLD",$groups)?'checked ':''); ?>value="groupTLD" name="groups[]"> By TLD - best to <a href="javascript:doSort()">sort by Domain</a>, not Hits<br/>
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
//		"1 year (monthly)" => "ym",
//		"1 half (monthly)" => "hm",
		"1 quarter (monthly)" => "qm",
		"1 month" => "mm",

	    // half-by-week (26), quarterly-by-week (13), monthly-by-week (4 or 5), a specific week (1)
//		"1 half (weekly)" => "hw", // server timeout - too much data
		"1 quarter (weekly)" => "qw",
		"1 month (weekly)" => "mw",
		"1 week" => "ww",

	    // monthly-by-day (30), fortnight-by-day (14), weekly-by-day (7), a specific day (1)
//	    "1 month (30 days)" => "md", // server timeout - too much data
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
	global $type,$filelist,$time,$pre,$thresh,$threshType,$groups,$range;
	
	if ($summary) {
		
		/**** TOTALS ****/
		
		$bgc = array('#FFFFFF','#EEEEEE'); $i=0;
		$rowsp = 4;
		$wid=600;
		echo '<p><form name="filelistFrm"><table border="0">'."\n".
			 '<tr bgcolor="navy"><td colspan="4"><b style="color:white">Totals</b><a name="totals"></a></td></tr>'."\n".
			 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td colspan="2">Date'.(sizeof($filelist)>1?'s':'').' processed --&gt;</td>'.
			 '<td valign="top" rowspan="'.$rowsp.'" bgcolor="#FFFFFF">'.
	 		 	'<select name="filelist" size="'.$rowsp.'">'."\n";
		foreach ($filelist as $i => $file) {
			echo '<option'.(!$i?' selected':'').'>'.$file.'</option>'."\n"; 
		}	
	 	echo 
	 		 '</select></td>' ."\n".
	 		 '<td bgcolor="#FFFFFF"><input name="showxml" value="Show XML" onclick="showXML(document.forms.filelistFrm.filelist.options[document.forms.filelistFrm.filelist.selectedIndex].text,\''.$type.'\',\''.$range.'\')" type="button"></td>' ."\n".
	 		 '</tr>'."\n";
			 
		echo
	 		 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>Total Hits</td><td align="right">'.number_format($summary[0]["hits"]).'</td></tr>'."\n".
	 		 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>'.$type.' Groups</td><td align="right">'.number_format($summary[0]["count"]).'</td></tr>'."\n".
			 '<tr bgcolor="'.$bgc[(++$i)%2].'"><td>Elapsed Time (s)</td><td align="right">'.$time->displaytime().'</td></tr>'."\n".
			 '</table></form></p>'."\n";
			 
		/**** PLOTS ****/
		
		if ($range!="mm" && $range!="ww" && $range!="dd") { // nothing to plot
			
			$cols = sizeof($filelist);
			echo '<table border="0" cellspacing="0" cellpadding="2">' . '<tr bgcolor="navy"><td colspan="'.$cols.'"><b style="color:white">Trends &nbsp; &nbsp; &nbsp;</b><a name="plots"></a></td></tr>'."\n";
			
			echo '<tr valign="bottom">'."\n";
			
			$filelistR = $filelist; krsort($filelistR); reset($filelistR);
			$hmax=0;
			foreach ($filelistR as $num) { // $num = date stamp
				foreach ($summary[$num] as $i => $j) { if ($i=="hits") {
					$h = round($j/($summary[0][$i]-0)*10000)/100; $hmax=$hmax>$h?$hmax:$h;
				} }
			}
			foreach ($filelistR as $num) { // $num = date stamp
				$summ = $summary[$num]; 
				$col = "blue";
				foreach ($summ as $i => $j) {
					if ($i=="hits") {
						$h = round($j/($summary[0][$i]-0)*10000)/100;
						echo '<td align="center">'
//								.'<small style="font-size:9px"">'.
							//$j.", ".($summary[0][$i]-0).", ".$hmax.", ".
//								vert($h."%").'</small><br/>'
							;
							 
						echo '<a href="#plots" onMouseover="ddrivetip(\''.$j. '<br/>'.$h.'%\'); return true;" onMouseout="hideddrivetip(); return true;">' .
							'<img border="0" alt="'.$j.'" src="http://www.eclipse.org/emf/images/misc/bar-' . $col .
							'-vert.png" height="'.round($h/$hmax*100).'" width="8"/></a>';
						echo '</td>'."\n";
					}
				}
			}
			$r = substr($range,1);
			echo '</tr>'."\n";
			echo '<tr valign="top">'."\n";
			foreach ($filelistR as $num) { // $num = date stamp
				$label = "";
				echo '<td colspan="1" align="center"><small style="font-size:9px"">'; 
				switch ($r) {
					case "d":
						echo vert(substr($num,-4)." ".substr(date("D",strtotime($num)),0,1));
						$label = "Days";
						break;
					case "w":
						echo $num;
						$label = "Weeks";
						break;
					case "m":
						echo $num."<br/>".getMonth($num);
						$label = "Months";
						break;
					default:
						break;
				};
				echo '</small></td>'."\n";
			}
			echo '</tr>'."\n".'<tr valign="top"><td align="center" colspan="'.$cols.'"><small style="font-size:9px"">'.$label.'</small></td>';
			echo "</table>\n";
		} 
		
		/**** DATA ****/

		$header= '<table width="'.$wid.'"><tr bgcolor="navy">' .
			'<td colspan='.((in_array("groupType",$groups) && $type=="File")||(in_array("groupTLD",$groups) && $type=="Domain")?3:2).'><b style="color:white">'.$type.'</b></td>' .
			'<td><b style="color:white">Hits</b></td>' .
			'<td colspan="2"><b style="color:white">Percent</b></td>' .
			'</tr>'."\n";
			
		echo $header;
		
		$i=0;
		$hits = $summary[0]["hits"];
		$others = 0;
		
		$tldImages = array("ca", "de", "edu", "es", "fr", "gov", "it","jp","nl","uk","us");
		
		foreach ($data as $hit => $count) {
			if ($i && $i%100==0) echo '</table>'."\n".$header;
			$pc = (round($count/$hits*10000)/100);
			if (in_array("groupSmall",$groups) && 
				( ($count<=$thresh && $threshType=="Hits") || ($pc<=$thresh && $threshType=="Percent") )
				) {
				$others += $count;
			} else { 
				echo '<tr bgcolor="'.$bgc[(++$i)%2].'">'."\n";
				echo '  <td width="25">'.$i.'</td>'."\n";
				if (false!==strpos($hit,"|")) {
					$hit2 = explode("|",$hit);
					echo '  <td width="10"><nobr>'.
						(false!==strpos($hit2[1],"ibm.com")?
							'<img border=0 valign=middle src="http://www.eclipse.org/emf/images/tld/i-ibm.gif" height=12 width=12><img border=0 valign=middle src="http://www.eclipse.org/emf/images/c.gif" height=1 width=4>':
							(in_array($hit2[0],$tldImages)?
								'<img border=0 valign=middle src="http://www.eclipse.org/emf/images/tld/'.$hit2[0].'.png" height=14 width=14><img border=0 valign=middle src="http://www.eclipse.org/emf/images/c.gif" height=1 width=2>':
								'<img border=0 valign=middle src="http://www.eclipse.org/emf/images/c.gif" height=1 width=16>')).
						(strlen($hit2[0])==2?'<a href="http://www.iana.org/root-whois/'.$hit2[0].'.htm">'.$hit2[0].'</a>':$hit2[0]).
						'</nobr></td><td width="'.($wid-195).'">'.$hit2[1].'</td>'."\n";
				} else {
					echo '  <td width="'.($wid-175).'"><nobr>'.
						(in_array($hit,$tldImages)?
								'<img border=0 valign=middle src="http://www.eclipse.org/emf/images/tld/'.$hit.'.png" height=14 width=14><img border=0 valign=middle src="http://www.eclipse.org/emf/images/c.gif" height=1 width=2>':
								'<img border=0 valign=middle src="http://www.eclipse.org/emf/images/c.gif" height=1 width=16>').
						(strlen($hit)==2?'<a href="http://www.iana.org/root-whois/'.$hit.'.htm">'.$hit.'</a>':$hit).
						'</nobr></td>'."\n";
				}
				$col = (false!==strpos($hit,"xsd")?"orange":(false!==strpos($hit,"emf")?"green":"purple"));
				echo '  <td width="25" align="right">'.number_format(round($count)).'</td>'."\n";
				echo '  <td width="25" align="right">'.$pc.'%</td>' ."\n";
				echo '  <td valign="middle" width="100" bgcolor="#FFFFFF">' .
						'<img alt="'.$pc.'%" src="http://www.eclipse.org/emf/images/misc/bar-' . $col .
						'.png" width="'.round($pc).'" height="10"/></td>'."\n";
				echo '</tr>'."\n";
			}
		}

		// extracted "others" :: Other Files Under $thresh Hits Each
		if (in_array("groupSmall",$groups)) {
			echo '</table>'."\n".$header;
			$hit = "Other ".$type." Under ".$thresh." ".$threshType." Each";
			$count = $others;
			echo '<tr bgcolor="'.$bgc[(++$i)%2].'">'."\n";
			echo '  <td width="25">'.$i.'</td>'."\n";
			echo '  <td width="'.($wid-175).'">'.$hit.'</td>'."\n";
			$pc = (round($count/$hits*10000)/100);
			$col = "purple";
			echo '  <td width="25" align="right">'.number_format(round($count)).'</td>'."\n";
			echo '  <td width="25" align="right">'.$pc.'%</td>' ."\n";
			echo '  <td valign="middle" width="100" bgcolor="#FFFFFF">' .
					'<img alt="'.$pc.'%" src="http://www.eclipse.org/emf/images/misc/bar-' . $col .
					'.png" width="'.round($pc).'" height="10"/></td>'."\n";
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

function getFileType($url) {
	$matches = array(
		"Standalone Zip" => "emf-sdo-xsd-Standalone-",
		"Full SDK Zip" 	 => "emf-sdo-xsd-SDK-",
		"EMF SDK Zip" 	 => "emf-sdo-SDK-",
		"EMF RT Zip" 	 => "emf-sdo-runtime-",
		"EMF Update Manager Jar" 	 => "org.eclipse.emf.ecore", 
		"XSD SDK Zip" 	 => "xsd-SDK-",
		"XSD RT Zip" 	 => "xsd-runtime-",
		"XSD Update Manager Jar" 	 => "org.eclipse.xsd");
	foreach ($matches as $label => $match) {
		if (false!==strpos($url,$match)) return $label;	
	} 
	return "Other Files";
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

function vert($s,$sep="<br/>") { // return a column of letters from a string $s
	foreach (preg_split('//', $s, -1, PREG_SPLIT_NO_EMPTY) as $k => $c) {
		if ($k) $o .= $sep; 
		$o .= $c;
	}
	return $o;
}

function getMonth($m) { 
	$months = array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	return $months[$m-0];
}

?>
<!-- $Id: downloads.php,v 1.19 2006/02/16 21:50:34 nickb Exp $ -->