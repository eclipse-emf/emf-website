<?php /* given data from bugzilla, generate a report of the open bugs and their prioritization / estimated time to complete / comments

get this to collect meta:
https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DNEW%26bug_status%3DASSIGNED%26bug_status%3DREOPENED%26order%3Dbugs.bug_status%2Cbugs.target_milestone%2Cbugs.bug_id%26query_format%3Dadvanced&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_opendate=on&column_reporter=on&column_rep_platform=on&column_assigned_to=on&column_votes=on&column_changeddate=on&column_resolution=on&column_bug_severity=on&column_priority=on&column_bug_status=on&column_short_desc=on&splitheader=0

which should repost to here:
https://bugs.eclipse.org/bugs/buglist.cgi?product=EMF,XSD&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&order=bugs.bug_status,bugs.target_milestone,bugs.bug_id&query_format=advanced

and to get buglist:

	<input type="hidden" name="buglist" value="43752,51210,61251,61639,61751,68396,72215,73143,74945,75617,75756,75921,75922,75923,75925,75929,75931,75933,76538,77518,78076,79089,79670,79768,80796,80806,81752,82597,82624,82626,82809,82899,83055,83223,83463,83591,83612,83714,83873,83876,83899,84119,84327,84563,84564,84813,84950,85852,82613,70862,82611,82615,82610,82614,85202">

then get() this:

https://bugs.eclipse.org/bugs/long_list.cgi?buglist=43752,51210,61251,61639,61751,68396,72215,73143,74945,75617,75756,75921,75922,75923,75925,75929,75931,75933,76538,77518,78076,79089,79670,79768,80796,80806,81752,82597,82624,82626,82809,82899,83055,83223,83463,83591,83612,83714,83873,83876,83899,84119,84327,84563,84564,84813,84950,85852,82613,70862,82611,82615,82610,82614,85202

to parse out [plan] values and fields missing from above (cuz curl() loses cookied values that bugzilla needs to display the correct columns)
*/

$contentType = $_GET["Content-Type"] ? $_GET["Content-Type"] : "text/xml"; // default or qs value

$usetmpfile=0; // defines whether or not to use pregen'd tmp files (1) or else to regen on the fly (0)
$createtmpfile=0; // if not using tmpfiles, defines whether to create new tmpfiles for next time's run (1) or not (0)

$bugz = array(); // $bugz[$num] = array(field => value, field2 => value2, ...);
$buglist = ""; // "75933,76538,77518,78076,79089, ... ";
$columns = array(
	"ID" => "ID",
	"Product" => "Product",
	"Component" => "Comp",
	"Version" => "Ver",
	"Target Milestone" => "TargetM",

	"Opened" => "Opened",
	"Reported By" => "Reporter",
	"Assigned To" => "Assignee",

	//"Votes" => "Votes",
	//"Changed Date" => "Changed",
	//"Resolution" => "Resolution",

	"Severity" => "Sev",
	"Priority" => "Pri",
	"Status" => "Stat",

	"Summary" => "Summary"
);
$additional_columns = array(
	"Plan Priority"=>"Plan-Priority",
	"Plan Estimate"=>"Plan-Estimate",
	"Plan Comments"=>"Plan-Comments"
);

$column_order = array( // column label => field name (mixed case version)
	"ID" => "ID",
	"Prod" => "Product",
	"Comp" => "Comp",
	"Ver" => "Ver",
	"TargetM" => "TargetM",

	"Opened" => "Opened",
	"Reported By" => "Reporter",
	"Assigned To" => "Assignee",

	"Sev" => "Sev",
	"Pri" => "Pri",
	"Stat" => "Stat",

	"Plan Priority"=>"Plan-Priority",
	"Plan Estim"=>"Plan-Estimate",
	"Plan Comments"=>"Plan-Comments",

	"Summary" => "Summary"
);

$committers = array(); // list of names that are valid committers; ignore comments posted by non-committers

getCommitterList(); //w("\$committers:",1); wArr($committers); w("");
getMetaAndBugList();
getPlanItems($columns); 
if ($contentType=="text/html") { 
	w("\$bugz:"); wArr($bugz);
} else if ($contentType=="text/xml") { 
	displayXML();
}

/************************************** FUNCTIONS ***********************************/

function getCommitterList() {
	global $committers,$usetmpfile,$createtmpfile;

	$projects = array("tools" => "EMF"); //, "technology" => "XSD");
	foreach ($projects as $folder => $project) { 
		if (!$usetmpfile) { 
			$html = file("http://www.eclipse.org/$folder/commit.html"); // wArr($html);
			if ($createtmpfile) { 
				$fh = fopen("/tmp/emf_plan.php_getCommittersList_$folder_$project.html","w");
				foreach ($html as $line) { 
					fputs($fh,$line."\n");
				}
				fclose($fh);
			}
		} else {
			$html = file("/tmp/emf_plan.php_getCommittersList_$folder_$project.html");
		}
		//w(sizeof($html),1);

		$loading=0;
		foreach ($html as $line) { 
			if (isIn($line,$project)) {
				$loading=1;
			} else if ($loading>0 && isIn($line,"<table")) { // now we start collecting names
				$loading=2;
			} else if ($loading>1 && isIn($line,"<td") && preg_match("/\<td[^\<\>]+\>\<b\>([^\<\>]+)\<\/b\>\<\/td\>/",$line,$m)) { // get the name
				$committers[$m[1]]=$m[1];
			} else if ($loading>1 && isIn($line,"</table>")) { // done
				break;
			}
		}
	}
}

function getMetaAndBugList() {
	global $bugz,$buglist,$usetmpfile,$createtmpfile;

	if (!$usetmpfile) { 
		$html = https_file("https://bugs.eclipse.org/bugs/buglist.cgi?product=EMF,XSD&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&order=bugs.bug_status,bugs.target_milestone,bugs.bug_id&query_format=advanced"); // wArr($html);
		if ($createtmpfile) { 
			$fh = fopen("/tmp/emf_plan.php_getMetaAndBugList.html","w");
			foreach ($html as $line) { 
				fputs($fh,$line."\n");
			}
			fclose($fh);
		}
	} else {
		$html = file("/tmp/emf_plan.php_getMetaAndBugList.html");
	}
	//w(sizeof($html),1);

	$loading=0;
	$bugnum="";
	//echo "<pre>";
	// foreach ($html as $line) { echo $line; }
	$cols = array(
		"Severity", "Priority", "Platform", "Assignee", "Status", "Resolution", "Summary"
	);
	foreach ($html as $line) { 
		// look for the following values: ID, Sev, Pri, Plt, Assignee, Status, Resolution, Summary
		if (isIn($line,"show_bug.cgi?id=")) { // link to bug means start of a bug entry row
			$loading=1;
			if (preg_match("/id=(\d+)/",$line,$m)) { 
				$bugnum=$m[1];
				$bugz[$bugnum] = array("ID" => $bugnum);
			} else {
				$bugnum="n/a";
				$bugz[$bugnum] = array("ID" => $bugnum);
			}
		} else if (isIn($line,"</tr>")) { // end of a row
			$loading=0;
			$col=0; // reset column pointer
		} else if ($loading && isIn($line,"<td>")) { 
			//w($line);
			$bugz[$bugnum][$cols[$col]] = trim(str_replace("<td>","",str_replace("<nobr>","",str_replace("</nobr>","",$line))));
			//w("\$bugz[".$bugnum."][".$cols[$col]."] = ".$bugz[$bugnum][$cols[$col]],"\n");
			$col++; // increment to next column pointer
		} else if (isIn($line,"name=\"buglist\"")) { // also list of bugs
			//w("<pre>$line</pre>");
			$buglist=str_replace("\">","",str_replace("<input type=\"hidden\" name=\"buglist\" value=\"","",trim($line)));
			//w($buglist);
		}
	}
	//echo "</pre>";

}

function getPlanItems($extrafields=array()) {
	global $bugz,$buglist,$committers,$usetmpfile,$createtmpfile;

	if (!$usetmpfile) { 
		$html = https_file("https://bugs.eclipse.org/bugs/long_list.cgi?buglist=$buglist"); // wArr($html);
		if ($createtmpfile) { 
			$fh = fopen("/tmp/emf_plan.php_getPlanItems.html","w");
			foreach ($html as $line) { 
				fputs($fh,$line."\n");
			}
			fclose($fh);
		}
	} else {
		$html = file("/tmp/emf_plan.php_getPlanItems.html");
	}
	//w(sizeof($html),1);

	$loading=0;
	$commenter = "";
	foreach ($html as $line) { 
		if (isIn($line,"<font size=\"+3\">Bug ")) { // name of bug means start of a bug 
			if (preg_match("/\<font size\=\"\+3\"\>Bug\ (\d+)/",$line,$m)) { 
				$bugnum=$m[1];
			} else {
				$bugnum="n/a";
			}
			//w("<b>BUG: $bugnum</b>",1);
		} else if (sizeof($extrafields)>0 && isIn($line,"<b>") && isIn($line,"</b>&nbsp;")) {
			//w($line,1);
			if (preg_match("/\<b\>(.+)\:\<\/b\>\&nbsp\;(.+)/",$line,$m)) {
				$key = $m[1];
				$val = $m[2];
				//w("<i>$key = $val</i>",1);
				if (array_key_exists($key,$extrafields)) {
					$bugz[$bugnum][$extrafields[$key]] = trim($val);
					//w("\$bugz[$bugnum][".$extrafields[$key]."] = ".htmlentities($bugz[$bugnum][$extrafields[$key]]),1);
				} else {
					//w("key $key not collected.",1);
				}
			}
		} else if (isIn($line,"<a href=\"mailto:") && preg_match("/\"mailto\:([a-zA-Z0-9\_\-\.]+\&\#64\;[a-zA-Z0-9\_\-\.]+)\"\>([a-zA-Z\ ]+)\<\/a\>/",$line,$m)) { // <a href="mailto:merks&#64;ca.ibm.com">Ed Merks</a> -- trap for bug commenter
			$commenter = $m[2]; //w("commenter = $commenter",1);
		} else if (in_array($commenter,$committers) && isIn($line,"[plan")) { // get plan items
			//w($line,1);
			if (!isIn($line,"/]")) { 
				$loading=1;
			}
			if (preg_match("/pri\=(\d)/",$line,$m)) { // [plan pri=2 est=2w/]
				$bugz[$bugnum]["Plan-Priority"] = $m[1];
			}
			if (preg_match("/est=(\d+[dwm])/",$line,$m)) { // [plan pri=2 est=2w/]
				$bugz[$bugnum]["Plan-Estimate"] = $m[1];
			}
			if (preg_match("/](.+)\[\/plan\]/",$line,$m)) { // [plan pri=2 est=1d]This is mostly done already.[/plan]
				$bugz[$bugnum]["Plan-Comments"] = $m[1];
				$loading=0;
			} else if (preg_match("/](.+)/",$line,$m)) { // [plan pri=2 est=1d]This is mostly done already.[/plan]
				$bugz[$bugnum]["Plan-Comments"] = $m[1];
			}
			$ret = trimTrail($bugz[$bugnum]["Plan-Comments"],$loading); $bugz[$bugnum]["Plan-Comments"] = $ret[0]; $loading = $ret[1]; $ret = "";

			//w("\$bugz[$bugnum][Plan Estimate] = ".$bugz[$bugnum]["Plan Estimate"],1);
			//w("\$bugz[$bugnum][Plan Priority] = ".$bugz[$bugnum]["Plan Priority"],1);
			//w("\$bugz[$bugnum][Plan-Comments] = ".htmlentities($bugz[$bugnum]["Plan-Comments"]),1);
		} else if (in_array($commenter,$committers) && $loading) { // collect more plan item content (if necessary)
			//w($line,1);
			if (preg_match("/(.+)\[\/plan\]/",$line,$m)) { // [plan pri=2 est=1d]This is mostly done already.[/plan]
				$bugz[$bugnum]["Plan-Comments"] .= " ".$m[1];
				$loading=0;
				$commenter = "";
			} else { 
				$bugz[$bugnum]["Plan-Comments"] .= " ".$line;
			}
			$ret = trimTrail($bugz[$bugnum]["Plan-Comments"],$loading); $bugz[$bugnum]["Plan-Comments"] = $ret[0]; $loading = $ret[1]; $ret = "";
			//w("\$bugz[$bugnum][Plan-Comments] = ".htmlentities($bugz[$bugnum]["Plan-Comments"]),1);
		}
	}
	//wArr($bugz);

}

function displayXML() {
	global $bugz,$columns,$additional_columns,$column_order;
	header('Content-type: text/xml');
	echo '<?xml version="1.0" encoding="UTF-8"?>
<?xml-stylesheet type="text/xsl" href="plan.xsl"?>
<!-- $Id: plan.php,v 1.4 2005/02/19 08:33:20 nickb Exp $ -->
<plan>
	<modified>$'.'Date'.': '.
		date("Y/m/d H:i:s T").' $'.'</modified>

	<product-def product="EMF" label="EMF Development Plan" />
	<product-def product="XSD" label="XSD Development Plan" />

'; ?><?php
	foreach ($column_order as $label => $col) {
		if (in_array($col,$columns)) {
			echo "\t\t<column-def column=\"".strtolower($col)."\" label=\"".$label."\"/>\n";
		} else if (in_array($col,$additional_columns)) {
			echo "\t\t<column-def column=\"".strtolower($col)."\" label=\"".$label."\"/>\n";
		}
	}
	echo "\n";
	foreach ($bugz as $bugnum => $data) { 
		echo "\t<bug>\n";
		foreach ($column_order as $col) {
			if (in_array($col,$columns)) {
				echo "\t\t<".strtolower($col).">".$data[$col]."</".strtolower($col).">\n";
			} else if (in_array($col,$additional_columns)) {
				echo "\t\t<".strtolower($col).">".$data[$col]."</".strtolower($col).">\n";
			}
		}
		echo "\t</bug>\n";
	}
	echo '</plan>
';
}

function trimTrail($in,$loading) {
	if (isIn($in,"[/plan]")) { // trim off at this point, set loading to 0
		$in = substr($in,0,strpos($in,"[/plan]"));
		$loading=0;
	}
	if (isIn($in,"</pre>")) { // trim off at this point, set loading to 0
		$in = substr($in,0,strpos($in,"</pre>"));
	}
	return array($in,$loading);
}

//*** usual stuff ***//

	function isIn($haystack,$needle) {
		return (false!==strpos($haystack,$needle));
	}

	function https_file($url) {
		ini_set("display_errors","0"); // suppress file not found errors
		// $html = file("https://..."); // only works in php 4.3.1 and later
		// new for PHP 4.1.2 with libcurl on emf.torolab.ibm.com
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$text = curl_exec($ch);
		curl_close($ch);
		$html = preg_split("/\n/",$text);
		ini_set("display_errors","1"); // and turn 'em back on.
		return $html;
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