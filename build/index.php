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
<h3>Building EMF</h3>

<?php	

	if ($_POST["build_Build_ID"] && $_POST["build_Build_ID"]=="-") { 
		$previewOnly="true"; // ie, DO NOT BUILD!
	}
	
	if (!$_POST["process"]=="build") { // page one, the form
			print "<p>To run a build, please complete the following form and click the Build button.</p>";
		} else { 
			echo "Your build is ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview":"").". <a href=\"/emf/build.php?\">Build another?</a>";
		}
?>

<!-- <br>If you would like to receive an email when the build completes, please enter your email address. -->

<p>
<?php 
	$PWD = "/home/www-data/emf-build";
	//$lockFile = $PWD."/start.sh.lock";
	if (is_file($lockFile)) { ?>
		<script language="javascript">
			int1 = setTimeout("document.location.href+='?'",30*1000);
			int2 = setInterval("document.forms[0].count.value=(document.forms[0].count.value-0)-1",1000);
		</script>
		
		<p align=center><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 BGCOLOR="#F4F4F4"><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/L2R.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD WIDTH=1 BGCOLOR="#000000" BACKGROUND="http://www.eclipse.org/emf/images/outlines/D2U.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD><TD><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD><TABLE CELLPADDING= CELLSPACING=0 BORDER=0><TR><TD STYLE="background-color: #F4F4F4; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px;">
			<table border=0><form>
			<tr>
				<td>&#160;&#160;&#160;</td>
				<td colspan=2><span class="alert">
				Sorry, another build is in progress. This page will refresh every <input type="text" class="field-invisible" size=1 value="30" name="count">seconds until the current build is complete.<br />
				<br />
				The current build is: <hr noshade size=1 />
				</td>
			</tr>
			<tr>
				<td>&#160;&#160;&#160;</td>
				<td>&#160;&#160;&#160;</td>
				<td><span class="alert">
<?php $f = file($lockFile); 
		foreach ($f as $v) {
			$vv = $v;
			//$vv = preg_replace("/\;/",";<br/ >",$vv);
			$vv = preg_replace("/\ \-/","<br/ >&#160;&#160;&#160;&#160;-",$vv);
			echo $vv; 
		} ?>	</td>
			</tr>
		</form></table>
	</TD></TR></TABLE></TD></TR></TABLE></TD><TD WIDTH=1 BGCOLOR='#000000' BACKGROUND="http://www.eclipse.org/emf/images/outlines/U2D.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/R2L.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR></TABLE></p>
	<script language="javascript">
		document.forms[0].count.value=30;
	</script>

<?php	include $pre."includes/footer.php";
		exit;
	}

	/** customization options here **/
	$buildOptionsFile = $pre."build.options.txt"; // read only

	// note that there must be a directory below this one called "data/" which is set to 777 permission so that files can be read (4)/written (2) via anon web user. x bit (1) must be set too so the dir is openable/viewable (766 won't work)

	$buildRequestsFileXML = ""; //"build.requests.xml";	// set filename to "" to disable XML file
	$buildRequestsFileCSV = ""; //"build.requests.csv";	// set filename to "" to disable CSV file
	$buildRequestsFileTXT = $PWD."/requests/build.requests.txt";	// set filename to "" to disable tabbed TXT file
	$eclipseURLsFile		 = $PWD."/requests/eclipse.urls.txt"; // read-write

	/** done customizing, shouldn't have to change anything below here **/

	$options = loadOptionsFromRemoteFiles($buildOptionsFile,$eclipseURLsFile);

	sort($options["RunTests"]); reset ($options["RunTests"]);

	if (!$_POST["process"]=="build") { // page one, the form

?>

<table>
	<form method=POST>
			<input type="hidden" name="process" value="build" />
			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/1.gif" /></td>
				<td>&#160;</td>
				<td><b>Branch & Type</b></td>
				<td>&#160;</td>
				<input name="build_Build_ID" type="hidden" size=8 maxlength=10 value="<?php 
						$branches = getBranches($options);
						foreach ($branches as $k => $b) { 
							echo $k; break; // echo the first one 
						}
				?>" onchange="this.value=this.value.replace(/[^0-9\.]/g,'');">
				<td colspan=3><select name="build_Branch" onchange="pickDefaultBuildID(this.options[this.selectedIndex].text)">
				<?php displayOptions($options["Branch"],true); ?>
				</select> &#160;
				<select name="build_Build_Type" onchange="pickDefaults(this.options[this.selectedIndex].value)">
				<?php displayOptions($options["BuildType"]); ?>
				</select></td>
			</tr>
			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/2.gif" /></td>
				<td>&#160;</td>
				<td><b>Eclipse URL</b><br><small>
					choose an <a target="_new" href="http://fullmoon.torolab.ibm.com/downloads/index.php">existing</a><br>
					URL or enter a <a target="_new" href="http://download.eclipse.org/downloads/index.php">new</a><br>
					one</td>
				<td>&#160;</td>
				<td colspan=3><small><select onchange="with(document.forms[0]) {build_Eclipse_URL_New.value = build_Eclipse_URL.options[build_Eclipse_URL.selectedIndex].value; }" style="font-size:9px" name="build_Eclipse_URL" size=8>
				<?php displayOptions($options["EclipseURL"]); ?>
				</select><br>
				<input style="font-size:9px" name="build_Eclipse_URL_New" size="60"></small></td>
			</tr>
			<tr><td colspan="6">&nbsp;</td></tr>

			<tr>
				<td rowspan="2" valign="top"><img src="<?php echo $WWWpre; ?>images/numbers/3.gif" /></td>
				<td rowspan="2">&nbsp;</td>
				<td colspan=1><b>JDK &amp; Basebuilder Branch</b></td>
				<td>&nbsp;</td>
				<td colspan="2"><select name="build_debug_java_home">
<?php 

	function jdkCompare($a, $b)
	{
	   if ($a == $b) {
	       return 0;
	   } else {
	   	  if (false!==strpos($b,"1.5")) return 1;
	   	  if (false!==strpos($b,"50")) return -1;
	   	  if (false!==strpos($b,"131")) return -1;
	   	  if (ord($a) < ord($b)) {
	   	  	return (fileatime("/opt/".$b) < fileatime("/opt/".$a) ? -1 : 1);
	   	  } else {
	   	  	return 1;
	   	  }
	   }
	}

	$JDKs = loadDirSimple("/opt",".*(jdk|j2sdk|java|Java).*(1.3|13|1.4|14|5.0).*","d"); usort($JDKs,"jdkCompare"); reset($JDKs); // include Sun and 1.3/5.0
	foreach ($JDKs as $jdk) { 
		if (realpath("/opt/".$jdk) == "/opt/".$jdk) { // not a link 
			$label = false!==strpos(strtolower($jdk),"ibm") ? "IBM ".str_replace("IBMJava2-","",str_replace("ibm-java2-ws-sdk-pj9xia32","",str_replace("ibm-java2-sdk-","",$jdk))) : "Sun ".$jdk;
			echo "<option ".($selected == "/opt/".$jdk ? "selected " : "")."value=\"/opt/".$jdk."\">$label</option>\n";
		}
	}
?>
				</select></td>
			</tr>
			<tr>
				<td colspan=1><a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">org.eclipse.releng.basebuilder</a> branch:<br><small>-basebuilderBranch</small></td>
				<td>&nbsp;</td>
				<td><input size="25" name="build_debug_basebuilder_branch" value="HEAD"></td>
				<td><small> Enter Tag/Branch/Version, eg., HEAD, M2_33, <br/>R3_2_maintenance, r321_v20060830 :: <a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">wiki</a></small></td>
			</tr>
			
			<tr><td colspan="6">&nbsp;</td></tr>

			<tr>
				<td rowspan="2" valign="top"><img src="<?php echo $WWWpre; ?>images/numbers/4.gif" /></td>
				<td rowspan="2">&nbsp;</td>
				<td><b>Build Alias</b><br><small>optional</small></td>
				<td>&nbsp;</td>
				<td><input name="build_Build_Alias" size=8></td>
				<td><small>
					Eg., for labelling Release builds as "2.0.1"<br> 
					instead of "R200408081212"</small></td>
			</tr>

			<tr>
				<td><b>Tag Build</b><br><small>
				optional</small></td>
				<td>&nbsp;</td>
				<td><select name="build_Tag_Build" size=1>
				<?php displayOptions($options["TagBuild"]); ?>
				</select></td>
				<td><small>If Yes, this tag will appear in CVS as "build_200405061234" <br>
				if No, CVS will NOT be tagged with this build's ID</small></td>
			</tr> 

			<tr><td colspan="6">&nbsp;</td></tr>


			<tr valign="top">
				<td><img src="http://www.eclipse.org/emf/images/numbers/5.gif" /></td>
				<td>&#160;</td>
				<td><b>Run Tests</b><br><small>
				optional</small></td>
				<td>&#160;</td>
				<td colspan="1">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests"]); ?>
				</select></td>

				<td><small>Standard JUnit Tests are added incrementally with bug fixes. 
				<br/><img src="http://www.eclipse.org/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				If yes to JUnit Tests, tests will be performed during build to
				validate results and will be refected in build results on download 
				page and build detail pages.
				<br/><img src="http://www.eclipse.org/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				If yes to JDK x.x Tests, EMF will be build using IBM JDK x.x, then 
				the EMF zips built with 1.4 will be run (and tested using the above 
				JUnit tests using IBM JRE x.x. For Standalone tests, the EMF 
				Standalone zip will be used instead of the SDK for running the same 
				standalone JUnit tests as are used by the JDK tests.
				<br/><img src="http://www.eclipse.org/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				Old tests include: BVT, FVT, SVT. If yes to Old Tests, when build 
				completes old tests will be run with new SDK zip &amp; selected eclipse SDK.
				</small></td>
			</tr> 

			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/6.gif" /></td>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td colspan="1"><input name="build_Email" size=25 maxlength=80></td>
				<td><small>If you would like to be notified when the build <br>
				(and/or tests) completes</small></td>
			</tr>

<?php if ($debug) { ?>
			<tr>
				<td colspan="6"><hr noshade size=1/></td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan="6"><table>
					<tr>
						<td colspan=1><b>Debug Options:</b></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.emf.releng.build branch:<br><small>-projRelengBranch</small></td>
						<td>&#160;</td>
						<td><input size="25" name="build_debug_emf_releng_branch" value=""></td><td><small> Enter Tag/Branch/Version, eg., build_200409171617, R2_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>old tests branch:<br><small>-emfOldTestsBranch</small></td>
						<td>&#160;</td>
						<td><input size="25" name="build_debug_emf_old_tests_branch" value=""></td><td><small> Enter Tag/Branch/Version, eg., R2_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.emf branch:<br><small>-emfBranch</small></td>
						<td>&#160;</td>
						<td><input size="25" name="build_debug_branch" value=""></td><td><small> Enter Tag/Branch/Version, eg., build_200409171617, R2_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>JUnit Tests Only (no build)?<br><small>-antTarget runTestsOnly</small></td>
						<td>&#160;</td>
						<td><input size="25" name="build_debug_runTestsOnly" value=""></td><td><small> Enter a build's datestamp, eg., 200411040245</small></td>
					</tr>
					<tr>
						<td colspan=1>Keep tempfiles?<br><small>-noclean</small></td>
						<td>&#160;</td>
						<td><input type="checkbox" name="build_debug_noclean" value="Y" checked></td>
					</tr>
				</table></td>
			</tr>
<?php } ?>

			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php if ($previewOnly) { echo "Preview Only"; } else { echo "Build"; } ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function selectEclipseURL() {
	with (document.forms[0]) {
		if (build_Eclipse_URL.selectedIndex<0 && build_Eclipse_URL_New.value=='') { 
			build_Eclipse_URL.selectedIndex=0;
		}
	}
}

onload=loadSelectedValues;

function loadSelectedValues() {
	with (document.forms[0]) { 
		document.forms[0].build_Run_Tests_JDK14.checked=true;
		document.forms[0].build_Run_Tests_JUnit.checked=true;
	}
}

function pickDefaults(val) {
	document.forms[0].build_Tag_Build.selectedIndex=(val=='N'?1:0); // Nightly = No; others = Yes
	if (val=='N') {
		document.forms[0].build_Run_Tests_JUnit.checked=true;
		document.forms[0].build_Run_Tests_JDK13.checked=false;
		document.forms[0].build_Run_Tests_JDK14.checked=true;
		document.forms[0].build_Run_Tests_JDK50.checked=false;
		document.forms[0].build_Run_Tests_Old.checked=false;
	} else if (val=='R' || val=='S') {
		document.forms[0].build_Run_Tests_JUnit.checked=true;
		document.forms[0].build_Run_Tests_JDK13.checked=false;
		document.forms[0].build_Run_Tests_JDK14.checked=true;
		document.forms[0].build_Run_Tests_JDK50.checked=true;
		document.forms[0].build_Run_Tests_Old.checked=true;
	} else if (val=='M' || val=='I') {
		document.forms[0].build_Run_Tests_JUnit.checked=true;
		document.forms[0].build_Run_Tests_JDK13.checked=false;
		document.forms[0].build_Run_Tests_JDK14.checked=true;
		document.forms[0].build_Run_Tests_JDK50.checked=true;
		document.forms[0].build_Run_Tests_Old.checked=true;
	}
}

function pickDefaultBuildID(val) {
	with (document.forms[0]) { 
		if (val.indexOf(" | ")>0) { 
			build_Build_ID.value=val.substring(val.indexOf(" | ")+3); // since the text label shown in the select box is not available for POST, store it here
		} else {
			build_Build_ID.value=val; // since the text label shown in the select box is not available for POST, store it here
		}
	}
}

function doSubmit() {
	answer = true;
	with (document.forms[0]) { 
		if (build_Run_Tests_JUnit.checked==false // if not running JUnit tests
			&& build_Build_Type.options[build_Build_Type.selectedIndex].value!='N' // and not a Nightly
			) {
				answer = confirm(
					'Are you sure you want to run a '+build_Build_Type.options[build_Build_Type.selectedIndex].text+"\n"+
					'build without running JUnit tests?');
		}
		if (answer && ( (build_Eclipse_URL_New.value && build_Eclipse_URL_New.value.indexOf("linux-gtk")<0) || 
				build_Eclipse_URL.options[build_Eclipse_URL.selectedIndex].value.indexOf("linux-gtk")<0 )
			) {
				answer = confirm(
					'Are you sure you want to run a build'+"\n"+
					'without a Linux GTK Eclipse driver?');
		}
	}
	//loadOptions();
	if (answer) { 
		document.forms[0].submit();
	} else {
		document.forms[0].build_Run_Tests_JUnit.focus();
	}
}

setTimeout('selectEclipseURL()',500);

</script>
<?php } else { // page two, form submission results
	
			// if a new URL is provided
			if ($_POST["build_Eclipse_URL_New"]) {

				// if new, append it into the build.options.txt file
				if ($_POST["build_Eclipse_URL_New"]!=$_POST["build_Eclipse_URL"]) {
					if (is_file($eclipseURLsFile)) { 
						$f = file($eclipseURLsFile);
					} else { 
						$f = array();
					}
					if (
						!in_array($_POST["build_Eclipse_URL_New"],$f) && 
						!in_array($_POST["build_Eclipse_URL_New"]."\n",$f) &&
						!in_array($_POST["build_Eclipse_URL_New"]."\r\n",$f) &&
						!in_array($_POST["build_Eclipse_URL_New"]."\n\r",$f) 
						) {
						$f = fopen($eclipseURLsFile,"a");
						fputs($f,$_POST["build_Eclipse_URL_New"]."\n");
						fclose($f);
					}
				}

				// then remove the value in the New field, and replace it into the Eclipse URL field
				$_POST["build_Eclipse_URL"] = $_POST["build_Eclipse_URL_New"];
				$_POST["build_Eclipse_URL_New"] = "";
			}

			$buildTimestamp = (
				$_POST["build_debug_runTestsOnly"] ? $_POST["build_debug_runTestsOnly"] : 
				date("YmdHi") 
			);

			$testOnlyTimeStamp = $_POST["build_debug_runTestsOnly"] ? "_".date("YmdHi") : "";

			$ID = $_POST["build_Build_Type"].$buildTimestamp;
			$BR = $_POST["build_Build_ID"]; 

		//$_POST["build_Build_ID"] = 	($_POST["build_Build_ID"]?$_POST["build_Build_ID"]:$_POST["build_Branch"].''.$_POST["build_Build_Type"]);
		$_POST["build_Build_ID"] = 	($_POST["build_Build_ID"]?$_POST["build_Build_ID"]:$_POST["build_Branch"]);

	// 2005-05-27: ensure that if we're building against maintenance branch, we use the right basebuilder, releng, and old tests
	if ($_POST["build_Branch"]=="R2_0_maintenance") {
		if ($_POST["build_debug_basebuilder_branch"]=="") {	$_POST["build_debug_basebuilder_branch"]  ="R3_0_maintenance"; }
		if ($_POST["build_debug_emf_releng_branch"]=="") {		$_POST["build_debug_emf_releng_branch"]   ="R2_0_maintenance"; }
		if ($_POST["build_debug_emf_old_tests_branch"]=="") {	$_POST["build_debug_emf_old_tests_branch"]="R2_0_maintenance"; }
	}
	// 2005-09-27: ensure that if we're building against maintenance branch, we use the right basebuilder, releng, and old tests
	if ($_POST["build_Branch"]=="R2_1_maintenance") {
		if ($_POST["build_debug_basebuilder_branch"]=="") {	$_POST["build_debug_basebuilder_branch"]  ="R3_1_maintenance"; }
		if ($_POST["build_debug_emf_releng_branch"]=="") {		$_POST["build_debug_emf_releng_branch"]   ="R2_1_maintenance"; }
		if ($_POST["build_debug_emf_old_tests_branch"]=="") {	$_POST["build_debug_emf_old_tests_branch"]="R2_1_maintenance"; } // 2006-01-04
	}

?>

<p align=center><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0 BGCOLOR="#F4F4F4"><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/L2R.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD WIDTH=1 BGCOLOR="#000000" BACKGROUND="http://www.eclipse.org/emf/images/outlines/D2U.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD><TD><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD><TABLE CELLPADDING= CELLSPACING=0 BORDER=0><TR><TD STYLE="background-color: #F4F4F4; padding-left:20px; padding-right:20px; padding-top:10px; padding-bottom:10px;">

<?php 
	echo "Your build is ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview.":""); 
	if (!$previewOnly) { 
?>
	Logfile is <a href="/tools/emf/downloads/drops/<?php echo $BR; ?>/<?php echo $ID; ?>/buildlog<?php echo $testOnlyTimeStamp; ?>.txt"><?php echo $PWD; ?>/tools/emf/downloads/drops/<?php echo $BR; ?>/<?php echo $ID; ?>/buildlog<?php echo $testOnlyTimeStamp; ?>.txt</a><br />
<?php } ?>

	Here's what you submitted:
<br />&#160;
	<?php 
			echo "<table>\n";
			if ($buildRequestsFileXML) { 
				$xml = "<build id=\"".$ID."\">\n";
				$xml .=	"\t<build_date value=\"".date("Y/m/d")."\" />\n";
				$xml .=	 "\t<build_time value=\"".date("H:i")."\" />\n";
			}
			if ($buildRequestsFileCSV) {
				$csvH = "ID,Date,Time";
				$csv = $ID.",".date("Y/m/d,H:i"); 
			}
			if ($buildRequestsFileTXT) {
				$txtH = "ID\tDate\tTime";
				$txt = $ID."\t".date("Y/m/d\tH:i"); 
			}
			$i=2;
			foreach ($_POST as $k => $v) {
				if (strstr($k,"build_") && trim($v)!="" && !strstr($k,"_Sel") ) { 
					$lab = preg_replace("/\_/"," ",substr($k,6));

					echo "<tr><td>&#149;&#160;</td><td><b>".$lab.":</b></td><td>".$v."</td></tr>\n";
					if ($buildRequestsFileXML) { $xml .="\t<".strtolower($k)." value=\"$v\" />\n"; }
					if ($buildRequestsFileCSV) { $csvH.= ($i>0?",":"") . $lab;	$csv .= ($i>0?",":"") . $v;  }
					if ($buildRequestsFileTXT) { $txtH.= ($i>0?"\t":"") . $lab; $txt .= ($i>0?"\t":"") . $v; }

					$i++;
				}
			} 

			echo "<tr><td>&#149;&#160;</td><td><b>Your IP:</b></td><td>".$_SERVER["REMOTE_ADDR"]."</td></tr>\n"; echo "</table>\n";
			if ($buildRequestsFileXML) { $xml .="\t<build_user_ip value=\"".$_SERVER["REMOTE_ADDR"]."\" />\n"; $xml .= "</build>\n"; }
			if ($buildRequestsFileCSV) { $csvH.=",User IP\n"; $csv .=",".$_SERVER["REMOTE_ADDR"]."\n"; }
			if ($buildRequestsFileTXT) { $txtH.="\tUser IP\n"; $txt .="\t".$_SERVER["REMOTE_ADDR"]."\n"; }

	?>
<br />

<a href="/emf/downloads/?sortBy=date&hlbuild=0#latest">You can view, explore, or download your build here</a>.

</TD></TR></TABLE></TD></TR></TABLE></TD><TD WIDTH=1 BGCOLOR='#000000' BACKGROUND="http://www.eclipse.org/emf/images/outlines/U2D.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="http://www.eclipse.org/emf/images/outlines/R2L.gif"><IMG BORDER=0 SRC="http://www.eclipse.org/emf/images/c.gif" WIDTH=1 HEIGHT=1></TD></TR></TABLE></p>

<?php 
			// then dump this data to an XML file for tracking/reporting
			if ($buildRequestsFileXML) {
				$f = fopen($buildRequestsFileXML,"a");
				fputs($f,$xml);
				fclose($f);
			}

			// then dump this data to a CSV file for tracking/reporting
			if ($buildRequestsFileCSV) {
				if (!file_exists($buildRequestsFileCSV) || filesize($buildRequestsFileCSV)<5) { $csv = $csvH.$csv; } // new file? do header
				$f = fopen($buildRequestsFileCSV,"a");
				fputs($f,$csv);
				fclose($f);
			}

			// then dump this data to a tabbed-text file for tracking/reporting
			if ($buildRequestsFileTXT) {
				if (!file_exists($buildRequestsFileTXT) || filesize($buildRequestsFileTXT)<5) { $txt = $txtH.$txt;	} // new file? do header
				$f = fopen($buildRequestsFileTXT,"a");
				fputs($f,$txt);
				fclose($f);
			}

			// push this file to cvs - can't be done automatically cuz of file perms. (www-data doesn't have access to CVS) - isntead, add instructions on email & output page

			echo "<hr noshade size=1>";


			$branches = getBranches($options);
			//foreach ($branches as $k => $b) { echo "$k => $b<br>"; }

			if ($branches["HEAD"] == $_POST["build_Branch"]) { $_POST["build_Branch"] = "HEAD"; }

			// fire the shell script...
			$output="";

			/** see http://ca3.php.net/manual/en/function.exec.php **/

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/tools/emf/downloads/drops/'.$BR.'/'.$ID.'/eclipse ;';
				$preCmd .= 'echo "buildVer='.$BR.'" > '.$PWD.'/tools/emf/downloads/drops/'.$BR.'/'.$ID.'/eclipse/transientProperties.txt ;';

				$cmd = ('bash -c "exec nohup setsid '.$PWD.'/scripts/start.sh -proj emf'.
					' -branch '.($_POST["build_debug_branch"]!=""?$_POST["build_debug_branch"]:$_POST["build_Branch"]).
					' -URL '.$_POST["build_Eclipse_URL"].
					($_POST["build_debug_runTestsOnly"]!=""? ' -antTarget runTestsOnly':
						($_POST["build_Run_Tests_JUnit"]=="Y"?' -antTarget run':' -antTarget runWithoutTest')
					).
					($_POST["build_Build_Alias"]?' -buildAlias '.$_POST["build_Build_Alias"]:"").	// 2.0.2, for example
					' -tagBuild '.($_POST["build_Tag_Build"]=="Yes"?"true":"false").		// new, 04/07/12
					' -buildType '.$_POST["build_Build_Type"].
					//' -javaHome /opt/sun/j2sdk1.4.2_03'. // on mp
					' -javaHome '.($_POST["build_debug_java_home"]!=""?$_POST["build_debug_java_home"]:$defaultJDK). // on emf
					' -downloadsDir '.$PWD.'/tools/emf/downloads'.
					' -buildDir '.$PWD.'/tools/emf/downloads/drops/'.$BR.'/'.$ID.
					' -buildTimestamp '.$buildTimestamp.
					($_POST["build_Run_Tests_JDK13"]=="Y"?' -runJDK13Tests '.$BR:''). // pass $BR to -runJDK13Tests flag
					($_POST["build_Run_Tests_JDK14"]=="Y"?' -runJDK14Tests '.$BR:''). // pass $BR to -runJDK13Tests flag
					($_POST["build_Run_Tests_JDK50"]=="Y"?' -runJDK50Tests '.$BR:''). // pass $BR to -runJDK50Tests flag
					($_POST["build_Run_Tests_Old"]=="Y"?' -runOldTests '.$BR:'').		// pass $BR to -runOldTests flag
					($_POST["build_Email"]!=""?' -email '.$_POST["build_Email"]:'').

					// three new debugging options as of oct 6
					($_POST["build_debug_basebuilder_branch"]!=""?' -basebuilderBranch '.$_POST["build_debug_basebuilder_branch"]:'').
					($_POST["build_debug_emf_releng_branch"]!=""?' -projRelengBranch '.$_POST["build_debug_emf_releng_branch"]:'').
					($_POST["build_debug_emf_old_tests_branch"]!=""?' -emfOldTestsBranch '.$_POST["build_debug_emf_old_tests_branch"]:'').
					($_POST["build_debug_noclean"]=="Y"?' -noclean':'').
					($_POST["build_debug_continuous_mode"]!=""?' -continuous '.$_POST["build_debug_continuous_mode"]:'').
					($testOnlyTimeStamp?' -testOnlyTimeStamp '.$testOnlyTimeStamp:'').

			// three output options: uncomment a line and comment out the other two.
					' >> '.$PWD.'/tools/emf/downloads/drops/'.$BR.'/'.$ID.'/buildlog'.$testOnlyTimeStamp.'.txt 2>&1 &"');	// logging to unique files
			//		' > /dev/null 2>&1 &"');											// no logging
			//		' 2>&1"', $output);													// store output as an array of text (then display in browser)

					if ($previewOnly) { 
						echo $preCmd."<br />";
					} else {
						exec($preCmd);
						$f = fopen($PWD.'/tools/emf/downloads/drops/'.$BR.'/'.$ID.'/buildlog'.$testOnlyTimeStamp.'.txt',"w");
						fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n");
						fclose($f);
					}

					if ($previewOnly) { 
						echo preg_replace("/\ \-/","<br> -",$cmd);
					} else {
						exec($cmd);
					}

					if ($output) { 
						foreach($output as $outputline){
							echo("$outputline<br>");
						}
					}

		} // end else 

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?debug\">debug build</a></li>\n";
print "<li><a href=\"?previewOnly\">preview build</a></li>\n";
print "<li><a href=\"?debug&previewOnly\">preview debug build</a></li>\n";
print "<li><a href=\"?\">normal build</a></li>\n";
print "</ul>\n";
print "</div>\n";
print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF - New Build";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

function displayCheckboxes($label,$options,$verbose=false) {
	$matches = null;
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
				echo "\n\t<input type=\"checkbox\" "."name=\"".$label."_".trim($matches[2])."\" value=\"Y\">".($verbose?trim($matches[2])." | ":"").trim($matches[1]);
			} else { // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
				echo "\n\t<input type=\"checkbox\" "."name=\"".$label."_".$opt."\" value=\"Y\">".$opt;
			}
			echo "<br/>\n";
		}
	}
}

function displayOptions($options,$verbose=false) {
	$matches = null;
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
				echo "\n\t<option ".($isSelected?"selected ":"")."value=\"".trim($matches[2])."\">".($verbose?trim($matches[2])." | ":"").trim($matches[1])."</option>";
			} else { // turn foo into <option value="foo">foo</option>
				echo "\n\t<option ".($isSelected?"selected ":"")."value=\"".$opt."\">".$opt."</option>";
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
	$matches = null;
	$options = array();
	$debug=-1;
	$doSection = "";

	foreach ($sp as $s) { 
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


?>
