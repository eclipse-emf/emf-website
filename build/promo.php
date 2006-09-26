<?php
$pre = "../"; 
include $pre."includes/header.php"; 
internalUseOnly(); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$debug = isset($_GET["debug"]) ? 1 : 0;
$previewOnly = isset($_GET["previewOnly"]) ? 1 : 0; ?>

<div id="midcolumn">

<div class="homeitem3col">
<h3>Promote a Build</h3>


<?php	
	if (!$_POST["process"]=="build") { // page one, the form
			echo "<p>To promote, please complete the following form and click the Promote button.</p>";
		} else { 
			echo "<p>Your promotion is ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview":"").". <a href=\"/emf/secure/promo.php?\">Promote another?</a></p>";
		}
?>

<p>
<?php 
	$PWD = "/home/www-data/emf-build";

	/** customization options here **/
	$buildOptionsFile = $pre."build.options.txt"; // read only

	// note that there must be a directory below this one called "data/" which is set to 777 permission so that files can be read (4)/written (2) via anon web user. x bit (1) must be set too so the dir is openable/viewable (766 won't work)

	$eclipseURLsFile		 = $PWD."/requests/eclipse.urls.txt"; // read-write

	/** done customizing, shouldn't have to change anything below here **/

	$options = loadOptionsFromRemoteFiles($buildOptionsFile,$eclipseURLsFile);

	if ($_POST["build_Branch_And_Build_ID"]) { 
		$projRelengBranch = getprojRelengBranch($options["Branch"],$_POST["build_Branch_And_Build_ID"]);
		//echo "projRelengBranch = $projRelengBranch<br>";
		$_POST["build_EMF_Releng_Branch"] = $projRelengBranch;
	}

	//echo "Branches:"; wArr($options["Branch"]);
	foreach ($options["Branch"] as $br) { 
		$bits = explode("=",$br);
		$BR=$bits[0];
		//echo "BR = $BR<br>";

		// define which build types to show:
		if ($BR!="-" && is_dir("$PWD/tools/emf/downloads/drops/$BR")) {
			$buildIDs = loadDirSimple("$PWD/tools/emf/downloads/drops/$BR","([MISR]+\d{12})","d"); // include N builds
			//$buildIDs = loadDirSimple("$PWD/tools/emf/downloads/drops/$BR","([MISR]+\d{12})","d"); // omit N builds
			foreach ($buildIDs as $k => $bid) { 
				//echo $k.": ".substr($bid,1)."<br>";
				if (is_dir("$PWD/tools/emf/downloads/drops/$BR/$bid/testresults/xml")) { // no point adding them to the list if there's no data available!
					$buildIDs2[substr($bid,1)] = $BR."/".$bid;
				}
			}
		}
	}
	$buildIDs = $buildIDs2;
	krsort($buildIDs); reset($buildIDs);
	//echo "Build IDs:"; wArr($buildIDs);

	if (!$_POST["process"]=="build") { // page one, the form

?>

<table>
	<form method=POST>
			<input type="hidden" name="process" value="build" />
			<tr>
				<td>&#160;</td>
				<td><b>Branch &amp; Build ID</b></td>
				<td>&#160;</td>
				<td colspan=2>
				<select style="font-size:9px" name="build_Branch_And_Build_ID" size=5>
					<?php displayOptions($buildIDs,false,0); ?>
				</select></td>
			</tr>
			<input type="hidden" name="build_EMF_Releng_Branch" value="HEAD" />

			<tr>
				<td>&#160;</td>
				<td><b>Options</b><br><small></small></td>
				<td>&#160;</td>
				<td><input type="checkbox" name="build_Update_ISS_Map_File" value="Yes" checked="checked"> Update ISS Map File?<br/>
				<input type="checkbox" name="build_Announce_In_Newsgroup" value="Yes" checked="checked"> Announce In Newsgroup?</td>
				<td></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td><input name="build_Email" size=25 value="codeslave@ca.ibm.com,emerks@ca.ibm.com,marcelop@ca.ibm.com,davidms@ca.ibm.com,khussey@ca.ibm.com,walkerp@us.ibm.com"></td>
				<td><small>If you would like to be<br>notified when promotion done</small></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td colspan=5><b>Note</b>: Please ensure the build you intend to promote was done using the latest (or appropriate)<br>
				<a target="_check" class="highlight" href="http://download.eclipse.org/downloads/index.php">Eclipse SDK driver</a>, and that the <a target="_check" href="../../tools/emf/scripts/downloads.php?showAll=&sortBy=date#latest" class="highlight">automated JUnit tests</a> all passed 100%. <a target="_check" href="../../tests/results-jdk13.php" class="highlight">JDK1.3</a> and old <br>
				<a target="_check" href="../../tests/results.php" class="highlight">BVT/FVT/SVT tests</a> should have passed suffiently close to 100% to approve this promotion.
				
				<p><b>When done, don't forget to change any <a href="https://bugs.eclipse.org/bugs/colchange.cgi?rememberedquery=product%3DEMF%2CXSD%26bug_status%3DASSIGNED%26order%3Dbugs.bug_id%26query_format%3Dadvanced&column_changeddate=on&column_bug_severity=on&column_priority=on&column_rep_platform=on&column_bug_status=on&column_product=on&column_component=on&column_version=on&column_target_milestone=on&column_short_short_desc=on&splitheader=0">Assigned bugzillas</a> to Fixed.</b></p>

				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php echo $previewOnly?"Preview Only":"Promote"; ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function doSubmit() {
	answer = true;
	with (document.forms[0]) { 
		if (build_Branch_And_Build_ID.options[build_Branch_And_Build_ID.selectedIndex].value.indexOf("N")==0) {
			answer = confirm(
				'Are you sure you want to promote a Nightly build?');
			if (answer) { build_Branch_And_Build_ID.focus(); }
		}
	}
	if (answer) { 
			document.forms[0].submit();
	} else {
		// do nothing...
	}
}

onload=loadSelects;

function loadSelects() {
	with (document.forms[0]) { 
		build_Branch_And_Build_ID.selectedIndex=0;
	}
}
</script>
<?php } else { // page two, form submission results
	
?>

<p align=center><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 BGCOLOR="#F4F4F4"><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/L2R.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD WIDTH=1 BGCOLOR="#000000" BACKGROUND="http://www.eclipse.org/emf/images/outlines/D2U.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD><TD><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD><TABLE CELLPADDING= CELLSPACING=0 BORDER=0><TR><TD STYLE="background-color: #F4F4F4; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px;">

<?php 

	$BR = explode("/",$_POST["build_Branch_And_Build_ID"]);
	$ID = $BR[1];
	$BR = $BR[0];

	$logdir  = "/home/www-data/promo_logs/";
	$logfile = "promo_log_".$BR.".".$ID."_".date("YmdHis").".txt";

	echo "Your promotion is ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview.":""); 
	if (!$previewOnly) { 
?>
	Logfile is <?php echo $logdir.$logfile; ?><br />
<?php } ?>

	Here's what you submitted:
<br />&#160;
	<?php 
			echo "<table>\n";
			$i=2;
			foreach ($_POST as $k => $v) {
				if (strstr($k,"build_") && trim($v)!="" && !strstr($k,"_Sel")) { 
					$lab = str_replace("_"," ",substr($k,6));
					$v = str_replace(",",", ",$v);

					echo "<tr><td>&#149;&#160;</td><td><b>".$lab.":</b></td><td>".$v."</td></tr>\n";
					$i++;
				}
			} 

			echo "<tr><td>&#149;&#160;</td><td><b>Your IP:</b></td><td>".$_SERVER["REMOTE_ADDR"]."</td></tr>\n"; echo "</table>\n";
	?>
<br />

<a href="/emf/downloads/?sortBy=date&hlbuild=0#latest">You can view, explore, or download your build here</a>.

<p><b>NOTE:</b> If you are redirected to a fullmoon mirror, you may not see the new build for at least an hour.</p>

</TD></TR></TABLE></TD></TR></TABLE></TD><TD WIDTH=1 BGCOLOR='#000000' BACKGROUND="http://www.eclipse.org/emf/images/outlines/U2D.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/R2L.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR></TABLE></p>

<?php 
			// push this file to cvs - can't be done automatically cuz of file perms. (www-data doesn't have access to CVS) - isntead, add instructions on email & output page

			echo "<hr noshade size=1>";

			// fire the shell script...
			$output="";

			/** see http://ca3.php.net/manual/en/function.exec.php **/

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$logdir.';';

				$cmd = ('bash -c "exec nohup setsid ssh nickb@emf.torolab.ibm.com'.
					' \"cd '.
						$PWD.'/scripts; ./promoteToEclipse.sh'.
						' -emf -Q'.
						' -branch '.$BR.
						' -buildID '.$ID.
						' -user nickb'.
						' -userIES nboldt'.
						($_POST["build_Update_ISS_Map_File"]!=""?'':' -noies').
						($_POST["build_Announce_In_Newsgroup"]!=""?' -announce':'').
					// ' -noies -nodrop -noscripts -nobugz -noCheckInNews -nodocs'.
					//' -jarsonly -debug 2'. // for debugging only
						($_POST["build_Email"]!=""?' -email '.$_POST["build_Email"]:'').
					' \"'.
					' >> '.$logdir.$logfile.' 2>&1 &"');	// logging to unique files

					if ($previewOnly) { 
						echo $preCmd."<br />";
					} else {
						exec($preCmd);
						$f = fopen($logdir.$logfile,"w");
						fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n");
						fclose($f);
					}

					if ($previewOnly) { 
						echo preg_replace("/\ \-/","<br> -",$cmd);
					} else {
						exec($cmd); // disable here to prevent operation
					}

					if ($output) { 
						foreach($output as $outputline){
							echo("$outputline<br>");
						}
					}

		}

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?debug\">debug promo</a></li>\n";
print "<li><a href=\"?previewOnly\">preview promo</a></li>\n";
print "<li><a href=\"?debug&previewOnly\">preview debug promo</a></li>\n";
print "<li><a href=\"?\">normal promo</a></li>\n";
print "</ul>\n";
print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF - Testing EMF Patched Builds";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

function displayCheckboxes($label,$options,$verbose=false,$checked=false) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option) {
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/",$opt)) { 
			if (strstr($opt,"=")) {  // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
				$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
				echo "\n\t<input ".($checked?"checked ":"")."type=\"checkbox\" "."name=\"".$label."_".trim($matches[2])."\" value=\"Y\">".($verbose?trim($matches[2])." | ":"").trim($matches[1]);
			} else { // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
				echo "\n\t<input ".($checked?"checked ":"")."type=\"checkbox\" "."name=\"".$label."_".$opt."\" value=\"Y\">".$opt;
			}
			echo "<br/>\n";
		}
	}
}

function displayOptions($options,$verbose=false,$selected=-1) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option) {
		$opt = $option;
		$isSelected = false;
		if (!preg_match("/\-\=[\d\.]+/",$opt)) { 
			if (strstr($opt,"|selected")) {  // remove the |selected keyword
				$isSelected=true;
				$opt = substr($opt,0,strpos($opt,"|selected"));
			}
			if (strstr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
				echo "\n\t<option ".($isSelected||$selected==$o?"selected ":"")."value=\"".trim($matches[2])."\">".($verbose?trim($matches[2])." | ":"").trim($matches[1])."</option>";
			} else { // turn foo into <option value="foo">foo</option>
				echo "\n\t<option ".($isSelected||$selected==$o?"selected ":"")."value=\"".$opt."\">".$opt."</option>";
			}
		}
	}
}

function loadOptionsFromFile($file1) { // fn not used
	$sp = array();	if (is_file($file1)) { $sp = file($file1); }
	$options = loadOptionsFromArray($sp);
	return $options;
}

function loadOptionsFromRemoteFiles($file1,$file2) { 
	$sp1 = file($file1);	if (!$sp1) { $sp1 = array(); }
	$sp2 = file($file2);	if (!$sp2) { $sp2 = array(); }
	$options = loadOptionsFromArray( array_merge($sp1,$sp2) );
	return $options;
}

function loadOptionsFromRemoteFile($file1) { // fn not used
	$sp1 = file($file1);	if (!$sp1) { $sp1 = array(); }
	$options = loadOptionsFromArray($sp1);
	return $options;
}

function loadOptionsFromArray($sp) {
	$options = array();
	$doSection = "";
	$debug=isset($debug)?$debug:0; // 1

	foreach ($sp as $s) { 
		$matches=null;
		if (strpos($s,"#")===0) { // skip, comment line
		} else if (preg_match("/\[([a-zA-Z\_\|]+)\]/",$s,$matches)) { // section starts
			if (strlen($s)>2) { 
				$isReversed = false;
				if (strstr($s,"|reversed")) {  // remove the |reversed keyword
					$isReversed=true;
					$doSection = trim($matches[1]);
					$doSection = substr($doSection,0,strpos($doSection,"|reversed"));
				} else {
					$doSection = trim($matches[1]);
				}
				if ($debug>0) echo "Section: $s --> $doSection<br>";

				$options[$doSection] = array();
				if ($isReversed) { $options[$doSection]["reversed"] = $isReversed; }
			}
		} else if (!preg_match("/\[([a-zA-Z\_]+)\]/",$s,$matches)) { 
			if (strlen($s)>2) { 
				if ($debug>0) echo "Loading: $s<br>";
				$options[$doSection][] = trim($s);
			}
		}
	}

	return $options;
}

	function getBranches($options) { 
		foreach ($options["Branch"] as $br => $branch) { 
				$arr[	getValueFromOptionsString($branch,"name")] = 
						getValueFromOptionsString($branch,"value");
		}
		return $arr;
	}

	function getValueFromOptionsString($opt,$nameOrValue) { 
		if (strstr($opt,"|selected")) {  // remove the |selected keyword
			$opt = substr($opt,0,strpos($opt,"|selected"));
		}
		if (strstr($opt,"=")) {  // split the name=value pairs, if present
			if ($nameOrValue=="name" || $nameOrValue===0) { 
				$opt = substr($opt,0,strpos($opt,"="));
			} else if ($nameOrValue=="value" || $nameOrValue==1) { 
				$opt = substr($opt,strpos($opt,"=")+1);
			}
		}
		return $opt;
	}

	function getprojRelengBranch($branches, $br_id) { // { 2.1.0=HEAD|selected, 2.0.3=R2_0_maintenance, ... }, 2.0.3/M200506021148
		if (false===strpos($br_id,"/") || sizeof($branches)<1) { 
			return "HEAD";
		}
		$BR = explode("/",$br_id); $BR = $BR[0]; // 2.0.3
		foreach ($branches as $br) { 
			if (false!==strpos($br,$BR) && false!==strpos($br,"=") && false===strpos($br,"-")) {
				$cvsBranch=explode("=",$br); $cvsBranch=$cvsBranch[1]; // HEAD|selected, R2_0_maintenance
				if (false===strpos($cvsBranch,"|")) { 
					return $cvsBranch; // R2_0_maintenance
				} else {
					$cvsBranch=explode("|",$cvsBranch); return $cvsBranch[0]; // HEAD
				}
			}
		}
		return "HEAD";
	}
	

?>
