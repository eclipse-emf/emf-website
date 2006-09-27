<?php
$pre = "../"; 
include $pre."includes/header.php"; 
internalUseOnly(); 

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$debug = isset($_GET["debug"]) ? 1 : 0;
$previewOnly = isset($_GET["previewOnly"]) ? 1 : 0; 
$PR = "emf"; ?>

<div id="midcolumn">

<div class="homeitem3col">
<h3>Testing EMF Patched Builds</h3>

<?php

	if (!$_POST["process"]=="build") { // page one, the form
		print "<p>To test a build of EMF, please complete the following form and click the Run Tests button.</p>";
	} else {
		print "<p>Your tests are ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview":"").
			". <a href=\"?project=$PR".($debug?"&amp;debug=1":"").($previewOnly?"&amp;previewOnly=1":"")."\">Test another?</a></p>";
	}
?>

<p>
<?php

	$PWD = "/home/www-data/tests";

	/** customization options here **/
	$testsOptionsFile = $pre."build.options.txt"; // read only

	$testsRequestsFileTXT = $PWD."/requests/build.requests.txt";	// set filename to "" to disable tabbed TXT file
	$eclipseURLsFile		 = $PWD."/requests/eclipse.urls.txt"; // read-write
	$emfURLsFile			 = $PWD."/requests/emf.urls.txt"; // read-write

	/** done customizing, shouldn't have to change anything below here **/

	$options = loadOptionsFromRemoteFiles($testsOptionsFile,$eclipseURLsFile,$emfURLsFile);

	// remove JUnit option
	foreach ($options["RunTests"] as $o => $p) { //print "$o => $p<br>";
		if (false===strpos($p,"JUnit")) { $newopt["RunTests"][$o] = $p; }
	}
	$options["RunTests"] = $newopt["RunTests"];
	sort($options["RunTests"]); reset ($options["RunTests"]);

	if (!$_POST["process"]=="test") { // page one, the form

?>

<table>
	<form method=POST enctype="multipart/form-data" name="patchForm">
			<input type="hidden" name="MAX_FILE_SIZE" value="5242880" /> <!-- 5M limit -->
			<input type="hidden" name="process" value="test" />
			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/1.gif" /></td>
				<td>&#160;</td>
				<td><b>Eclipse URL</b><br><small>choose an existing URL<br />or enter a new one</td>
				<td>&#160;</td>
				<td colspan=2><small><select onchange="with(document.forms.patchForm) {tests_Eclipse_URL_New.value = tests_Eclipse_URL.options[tests_Eclipse_URL.selectedIndex].value; }" style="font-size:9px" name="tests_Eclipse_URL" size=8>
				<?php displayOptions($options["EclipseURL"]); ?>
				</select><br>
				<input style="font-size:9px" name="tests_Eclipse_URL_New" size="60"></small></td>
			</tr>
			<tr bgcolor="#eeeeee">
				<td bgcolor="#ffffff"><img src="http://www.eclipse.org/emf/images/numbers/2.gif" /></td>
				<td bgcolor="#ffffff">&#160;</td>
				<td><b>EMF URL</b><br><small>choose an existing URL<br />or enter a new one</td>
				<td>&#160;</td>
				<td colspan=2><small><select onchange="with(document.forms.patchForm) {tests_EMF_URL_New.value = tests_EMF_URL.options[tests_EMF_URL.selectedIndex].value; }" style="font-size:9px" name="tests_EMF_URL" size=8>
				<?php displayOptions($options["EMFURL"]); ?>
				</select><br>
				<input style="font-size:9px" name="tests_EMF_URL_New" size="60"></small></td>
			</tr>
			<tr valign=top>
				<td rowspan=2><img src="http://www.eclipse.org/emf/images/numbers/3.gif" /></td>
				<td rowspan=2>&#160;</td>
				<td rowspan=2><b>Patch Zip</b><br><small>
				optional</small></td>
				<td rowspan=2>&#160;</td>
				<td><input name="tests_Patch_Zipfile" type="file"></td>
				<td><small style="font-size:9pt">If you would like to use a patch on top of the above EMF SDK, <br>
				create a zip with base folders <b style="font-size:9pt;color:red">eclipse/plugins/</b> and/or <b style="font-size:9pt;color:red">eclipse/features/</b>, <br>
				and upload it here. <b style="font-size:9pt;color:red">Limit 5M filesize</b>.
				</small></td>
			</tr>
			<tr valign=top>
				<td>
				<small>&#160;&#160;&#160;&#160; - or - </small><br/>
					<input name="tests_Patch_Zipfile_Name" type="text" size="25" maxlength="80"></td>
				<td>&#160;&#160;&#160;&#160;<small> - or - </small><br/>
				SCP your patch file onto this server and place it in <br/>
				<b style="font-size:9pt;color:red">/home/www-data/tests/tools/emf/patches</b>.<br>
				Your file must be readable by the web user. Enter either <br/>the full path or just the filename.</br>
				</small></td>
			</tr>
			<tr bgcolor="#eeeeee">
				<td bgcolor="#ffffff" rowspan="3"><img src="http://www.eclipse.org/emf/images/numbers/4.gif" /></td>
				<td bgcolor="#ffffff" rowspan="3">&#160;</td>
				<td rowspan="3" valign="top"><b>Run Tests</b><br><small>
				at least one must be selected</small></td>
				<td rowspan="3">&#160;</td>
				<td>
				<?php displayCheckboxes("tests_Run_Tests",$options["RunTests"],false,$isEMFbuildServer); ?>
				<br> Old Tests branch: <input style="font-size:10px" size="17" name="tests_debug_emf_old_tests_branch">
				</td>
				<td rowspan="1" valign="top">Selected tests will be run concurrently. Tests run on patched <br>
				builds will be listed on their respective test results pages, <br>
				marked with prefix 'P'. Note that JDK Tests are the subset of the <br>
				available JUnit tests that can be run standalone (without Eclipse).<br><br>
				For Old Tests, use Branch, eg., R2_0_maintenance (if blank, HEAD)</td>
			</tr>

			<tr>
				<td bgcolor="#eeeeee">
				<input type="checkbox" name="tests_Run_Tests_Perf" value="Y">Perf Tests, using Automated <br> Tests from build: <input style="font-size:10px" size="19" name="tests_Run_Tests_Perf_ID"><br/>
				Test continuously for <input style="font-size:10px" size="2" name="tests_Run_Tests_Perf_Repeats" value="<?php print $isEMFbuildServer?"":"10"; ?>"> builds?</td>
				<td bgcolor="#eeeeee" rowspan="1" valign="top">
				eg., to run tests on EMF 2.1.0/I200503130300 using the tests from<br/>
				<b>2.1.0/I200505150500</b>, select the EMF I200503130300 driver above, <br/>
				and enter the build ID at left as '<b>2.1.0/I200505150500</b>'. Leave blank<br/>
				to test using the above build's tests. If 'continous' box is blank, run only<br/>
				once; otherwise run up to specified number of tests.</td>
			</tr>

			<tr bgcolor="#eeeeee">
				<td colspan=1><table>
					<tr>
						<td valign=top colspan=2><b>JDK 1.4 Compiler Args</b></td></tr>
					<tr>
						<td>JDK:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_JDK14">
<?php 
	//$JDKs = loadDirSimple("/opt",".*(jdk|j2sdk|java|Java).*(1.4|14).*","d"); rsort($JDKs); reset($JDKs); // include Sun
	$JDKs = loadDirSimple("/opt",".*(java).*(14).*","d"); sort($JDKs); reset($JDKs); // omit Sun
	$selected = realpath("/opt/ibm-java2-1.4");
	foreach ($JDKs as $jdk) { 
		if (!is_link("/opt/".$jdk)) { 
			$label = false!==strpos(strtolower($jdk),"ibm") ? "IBM ".str_replace("ibm-java2-ws-sdk-pj9xia32","",$jdk) : "Sun ".$jdk;
			print "<option value=\"/opt/".$jdk."\">$label</option>\n";
			if (false!==strpos(strtolower($jdk),"ibm")) {
				print "<option ".($selected == "/opt/".$jdk ? "selected " : "")."value=\"/opt/".$jdk.",j9\">$label with j9".($selected == "/opt/".$jdk ? " (latest)" : "")."</option>\n";
			}
		}
	}
?>
						</select></small></td>
					</tr>
					<tr>
						<td colspan=2><input checked type="checkbox" name="tests_Compiler_Arg_Deprecation" value="Y"> Use -deprecation flag</td>
					</tr>
				</table></td>
				<td colspan=1><table>
					<tr>
						<td valign=top colspan=2><b>JDK 5.0 Compiler Args</b></td></tr>
					<tr>
						<td>Source version:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Source">
						<option value="1.4">1.4</option>
						<option value="1.5" selected>1.5 (aka 5.0)</option>
						</select></small></td>
					</tr>

					<tr>
						<td>Xlint (warnings):</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Xlint">
						<option value="">Choose...</option>
						<option value="all">all</option>
						<option selected value="unchecked">unchecked (default)</option>
						<option value="deprecation">deprecation</option>
						<option value="unchecked,deprecation">unchecked,deprecation</option>
						</select></small></td>
					</tr>
				</table></td>
			</tr>
			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/5.gif" /></td>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional: if you would like to be<br />notified when the tests are complete</small></td>
				<td>&#160;</td>
				<td colspan=2><input name="tests_Email" size=25 maxlength=80></td>
			</tr>

<?php if ($debug) { ?>
			<tr>
				<td colspan="6"><hr noshade size=1/></td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan="5"><table>
					<tr>
						<td colspan=1><b>Debug Options:</b></td>
					</tr>
					<tr>
						<td colspan=1>Keep tempfiles?<br><small>-noclean</small></td>
						<td>&#160;</td>
						<td><input type="checkbox" name="tests_debug_noclean" value="Y"></td>
					</tr>
				</table></td>
			</tr>
<?php } ?>

		<?php $testsInProgress = checkIfTestsInProgress();
				if ($testsInProgress) { ?>
			<tr>
				<td>&#160;</td>
				<td colspan=6 align=left>
						<b style="color:red">There are tests in progress. Please make sure that running your tests will not overlap performance testing, or you may skew the results.</b><br>
						<?php print $testsInProgress."<br>"; ?>
				</td>
			</tr>
		<?php } ?>
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center>
					<input style="<?php if ($testsInProgress) { print 'color:red;font-weight:bold'; } ?>" type="button" value="<?php print ($previewOnly?"Preview":"Run"); ?> Tests" onclick="doSubmit()">
				</td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function selectEclipseURL() {
	with (document.forms.patchForm) {
		if (tests_Eclipse_URL.selectedIndex<0 && tests_Eclipse_URL_New.value=='') {
			tests_Eclipse_URL.selectedIndex=0;
		}
	}
}
function selectEMFURL() {
	with (document.forms.patchForm) {
		if (tests_EMF_URL.selectedIndex<0 && tests_EMF_URL_New.value=='') {
			tests_EMF_URL.selectedIndex=0;
		}
	}
}

function loadSelectedValues() {
	with (document.forms.patchForm) { 
		document.forms.patchForm.tests_Run_Tests_Perf.checked=<?php print $isEMFbuildServer?"false":"true"; ?>;
		document.forms.patchForm.tests_Run_Tests_JDK13.checked=false;
	}
}

setTimeout('selectEclipseURL();selectEMFURL();loadSelectedValues()',500);

function doSubmit() {
	//loadOptions();
	document.forms.patchForm.submit();
}

/*
function loadOptions() { // only used by the select box for the Build Options
	// due to a bug in the way that multiple options are collected in PHP, stuff the list into a text field instead.
	with (document.forms.patchForm){
		str = "";
		cnt=0;
		for (i=0;i<tests_tests_Options_Sel.length;i++) {
			if (tests_tests_Options_Sel[i].selected) {
				if (cnt>0) { str += ","; }
				str += tests_tests_Options_Sel[i].value;
				cnt++;
			}
		}
		tests_tests_Options.value = str;
	}
}
*/

</script>
<?php } else { // page two, form submission results

			// if a new URL is provided
			if ($_POST["tests_Eclipse_URL_New"]) {

				// if new, append it into the build.options.txt file
				if ($_POST["tests_Eclipse_URL_New"]!=$_POST["tests_Eclipse_URL"]) {
					if (is_file($eclipseURLsFile)) {
						$f = file($eclipseURLsFile);
					} else {
						$f = array();
					}
					if (
						!in_array($_POST["tests_Eclipse_URL_New"],$f) &&
						!in_array($_POST["tests_Eclipse_URL_New"]."\n",$f) &&
						!in_array($_POST["tests_Eclipse_URL_New"]."\r\n",$f) &&
						!in_array($_POST["tests_Eclipse_URL_New"]."\n\r",$f)
						) {
						$f = fopen($eclipseURLsFile,"a");
						fputs($f,$_POST["tests_Eclipse_URL_New"]."\n");
						fclose($f);
					}
				}

				// then remove the value in the New field, and replace it into the Eclipse URL field
				$_POST["tests_Eclipse_URL"] = $_POST["tests_Eclipse_URL_New"];
				$_POST["tests_Eclipse_URL_New"] = "";
			}

			// if a new URL is provided (this time for EMF, not EMF
			if ($_POST["tests_EMF_URL_New"]) {

				// if new, append it into the build.options.txt file
				if ($_POST["tests_EMF_URL_New"]!=$_POST["tests_EMF_URL"]) {
					if (is_file($emfURLsFile)) {
						$f = file($emfURLsFile);
					} else {
						$f = array();
					}
					if (
						!in_array($_POST["tests_EMF_URL_New"],$f) &&
						!in_array($_POST["tests_EMF_URL_New"]."\n",$f) &&
						!in_array($_POST["tests_EMF_URL_New"]."\r\n",$f) &&
						!in_array($_POST["tests_EMF_URL_New"]."\n\r",$f)
						) {
						$f = fopen($emfURLsFile,"a");
						fputs($f,$_POST["tests_EMF_URL_New"]."\n");
						fclose($f);
					}
				}

				// then remove the value in the New field, and replace it into the EMF URL field
				$_POST["tests_EMF_URL"] = $_POST["tests_EMF_URL_New"];
				$_POST["tests_EMF_URL_New"] = "";
			}

			$uploaddir = '/home/www-data/tests/tools/emf/patches/';
			if ($_FILES['tests_Patch_Zipfile']['name']) {
				$uploadfile = $uploaddir . basename($_FILES['tests_Patch_Zipfile']['name']);

				if ($debug) {
					print '<pre>';
					print 'File upload details:'."\n";
					print_r($_FILES);
					print "</pre>";
				}
				if (move_uploaded_file($_FILES['tests_Patch_Zipfile']['tmp_name'], $uploadfile) && chmod($uploadfile,0744)) {
					print "<b style=\"color:green\">File successfully uploaded.</b>\n";
				} else {
					print "<b style=\"color:red\">Problem uploading &amp; copying your file from ".$_FILES['tests_Patch_Zipfile']['tmp_name']." to ".$uploadfile."!</b>\n";
				}
			} else if ($_POST["tests_Patch_Zipfile_Name"]) {
				$uploadfile = $_POST["tests_Patch_Zipfile_Name"];
				if (false===strpos($uploadfile,$uploaddir)) {
					$uploadfile = $uploaddir.$uploadfile;
				}
			} else {
				$uploadfile="";
			}

			// need to calculate branch and buildID from the URL of the emf build: http://download.eclipse.org/tools/emf/downloads/drops/2.0/I200404291310/emf-sdo-xsd-SDK-I200404291310.zip
			$ID = explode ("/",$_POST["tests_EMF_URL"]);
			//print $_POST["tests_EMF_URL"];
			//foreach($ID as $k => $i) { print "$k: $i<br>"; }
			$BR = $ID[7];
			$ID = $ID[8];

			$testTimestamp = ($uploadfile?"P":"").date("YmdHi");

	print "Your tests are ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview.":".");
	if (!$previewOnly) {
?>
	Logfile(s) are listed below.

<?php } ?>

	Here's what you submitted:
<br />&#160;
	<?php

		$logfile = $PWD.'/'.$logfile;

			print "<table>\n";
			if ($testsRequestsFileTXT) {
				$txtH = "ID\tDate\tTime";
				$txt = $testTimestamp."\t".date("Y/m/d\tH:i");
			}
			$i=2;
			foreach ($_POST as $k => $v) {
				if (strstr($k,"tests_") && trim($v)!="" && !strstr($k,"_Sel") ) {
					$lab = preg_replace("/\_/"," ",substr($k,6));

					print "<tr><td>&#149;&#160;</td><td><b>".$lab.":</b></td><td>".$v."</td></tr>\n";
					if ($testsRequestsFileTXT) { $txtH.= ($i>0?"\t":"") . $lab; $txt .= ($i>0?"\t":"") . $v; }
					$i++;
				}
			}

			if ($uploadfile) {
				print "<tr><td>&#149;&#160;</td><td><b>Patch Zipfile:</b></td><td>".$uploadfile."</td></tr>\n";
			}
			print "<tr><td>&#149;&#160;</td><td><b>Your IP:</b></td><td>".$_SERVER["REMOTE_ADDR"]."</td></tr>\n"; print "</table>\n";
			if ($testsRequestsFileTXT) { $txtH.="\tUser IP\n"; $txt .="\t".$_SERVER["REMOTE_ADDR"]."\n"; }

	?>
<br />

Test results will he located here: <a href="/tests/results.php#goto<?php print $BR."".substr($ID,0,1); ?>">BVT, FVT, SVT</a>, <a href="/tests/results-jdk13.php#goto<?php print $BR."".substr($ID,0,1); ?>">JDK 1.3</a>, <a href="/tests/results-jdk14.php#goto<?php print $BR."".substr($ID,0,1); ?>">JDK 1.4</a>, <a href="/tests/results-jdk50.php#goto<?php print $BR."".substr($ID,0,1); ?>">JDK 5.0</a>, <a href="/tests/results-perf.php#goto<?php print $BR."".substr($ID,0,1); ?>">Perf Tests</a>.

<?php
			// then dump this data to a tabbed-text file for tracking/reporting
			if ($testsRequestsFileTXT) {
				if (!file_exists($testsRequestsFileTXT) || filesize($testsRequestsFileTXT)<5) { $txt = $txtH.$txt;	} // new file? do header
				$f = fopen($testsRequestsFileTXT,"a");
				fputs($f,$txt);
				fclose($f);
			}

			// push this file to cvs - can't be done automatically cuz of file perms. (www-data doesn't have access to CVS) - isntead, add instructions on email & output page

			print "<hr noshade size=1>";

			/*** OLD TESTS ***/
			if ($_POST["tests_Run_Tests_Old"]=="Y") {

				$PWD = "/home/www-data/tests";
				$logfile = 'tools/emf/tests/'.$BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';
				print '<a href="/'.$logfile.'">'.$PWD.'/'.$logfile.'</a><br />'."\n";

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/tools/emf/tests/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('bash -c "exec nohup setsid '.$PWD.'/scripts/start.sh'.
					' -downloadsDir /home/www-data/emf-build/tools/emf/downloads'.
					' -testDir '.$PWD.'/tools/emf/tests/'.$BR.'/'.$ID.'/'.$testTimestamp.
					' -eclipseURL '.$_POST["tests_Eclipse_URL"].
					' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]).
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					($_POST["tests_debug_emf_old_tests_branch"]!=""?' -emfOldTestsBranch '.$_POST["tests_debug_emf_old_tests_branch"]:'').
					($_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					($_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

			// three output options: uncomment a line and comment out the other two.
					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files
					if ($previewOnly) { print $preCmd."<br />"; } else {
						exec($preCmd);
						$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
					}
					if ($previewOnly) { print preg_replace("/\ \-/","<br> -",$cmd)."<hr noshade size=1/>"; } else { exec($cmd); }
			}

			/*** JDK 1.3 TESTS ***/
			if ($_POST["tests_Run_Tests_JDK13"]=="Y") {

				$PWD = "/home/www-data/jdk13tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';
				print '<a href="/tools/emf/jdk13tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a><br />'."\n";

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('bash -c "exec nohup setsid /home/www-data/emf-build/scripts/runJDK13Tests.sh'.
					' -downloadsDir /home/www-data/emf-build/tools/emf/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					' -eclipseURL '.$_POST["tests_Eclipse_URL"].
					' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]).
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					($_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					($_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

					if ($previewOnly) { print $preCmd."<br />"; } else {
						exec($preCmd);
						$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
					}
					if ($previewOnly) { print preg_replace("/\ \-/","<br> -",$cmd)."<hr noshade size=1/>"; } else { exec($cmd); }
			}

			/*** JDK 1.4 TESTS ***/
			if ($_POST["tests_Run_Tests_JDK14"]=="Y") {

				$PWD = "/home/www-data/jdk14tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';
				print '<a href="/tools/emf/jdk14tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a><br />'."\n";

				$j9=false;
				$compiler = $_POST["tests_Compiler_JDK14"];
				if (false!==strpos($compiler,",")) {
					$compiler = explode(",",$compiler);
					$j9=(false!==strpos($compiler[1],"j9"));
					$compiler = $compiler[0];
				}

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('bash -c "exec nohup setsid /home/www-data/emf-build/scripts/runJDK14Tests.sh'.
					' -downloadsDir /home/www-data/emf-build/tools/emf/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					' -eclipseURL '.$_POST["tests_Eclipse_URL"].
					' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]).
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					($_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					($_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

					' -compiler '.$compiler.
					($_POST["tests_Compiler_Arg_Deprecation"]!=""?' -compilerArgDeprecation '.$_POST["tests_Compiler_Arg_Deprecation"]:'').
					($j9?' -runtimeArgJ9':'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

					if ($previewOnly) { print $preCmd."<br />"; } else {
						exec($preCmd);
						$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
					}
					if ($previewOnly) { print preg_replace("/\ \-/","<br> -",$cmd)."<hr noshade size=1/>"; } else { exec($cmd); }
			}

			/*** JDK 5.0 TESTS ***/
			if ($_POST["tests_Run_Tests_JDK50"]=="Y") {
				$PWD = "/home/www-data/jdk50tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';
				print '<a href="/tools/emf/jdk50tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a><br />'."\n";

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('bash -c "exec nohup setsid /home/www-data/emf-build/scripts/runJDK50Tests.sh'.
					' -downloadsDir /home/www-data/emf-build/tools/emf/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					' -eclipseURL '.$_POST["tests_Eclipse_URL"].
					' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]).
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					($_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					($_POST["tests_debug_noclean"]=="Y"?' -noclean':'').
					($_POST["tests_Compiler_Arg_Source"]!=""?' -compilerArgSource '.$_POST["tests_Compiler_Arg_Source"]:'').
					($_POST["tests_Compiler_Arg_Xlint"]!=""?' -compilerArgXlint '.$_POST["tests_Compiler_Arg_Xlint"]:'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

					if ($previewOnly) { print $preCmd."<br />"; } else {
						exec($preCmd);
						$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
					}
					if ($previewOnly) { print preg_replace("/\ \-/","<br> -",$cmd)."<hr noshade size=1/>"; } else { exec($cmd); }
			}

			/*** PERF TESTS ***/
			if ($_POST["tests_Run_Tests_Perf"]=="Y") {
				$PWD = "/home/www-data/perftests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';
				print '<a href="/tools/emf/perftests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a><br />'."\n";

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				// print path to logfile into lockfile
				$preCmd2 = 'print '.$PWD."/".$logfile." > ".$PWD."/perftests.lock";

				$tBR = $BR;
				$tID = $ID;

				if ($_POST["tests_Run_Tests_Perf_ID"]!="") {
					if (false!==strpos($_POST["tests_Run_Tests_Perf_ID"],"/")) {
						$tID = explode("/",$_POST["tests_Run_Tests_Perf_ID"]);
						$tBR = $tID[0]; $tID = $tID[1];
					} else {
						$tBR = $BR; $tID = $_POST["tests_Run_Tests_Perf_ID"];
					}
				}

				$cmd = ('bash -c "exec nohup setsid /home/www-data/emf-build/scripts/runPerfTests.sh'.
					' -downloadsDir /home/www-data/emf-build/tools/emf/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					' -eclipseURL '.$_POST["tests_Eclipse_URL"].
//					' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]).
					($isEMFbuildServer?
						' -emfFile '.preg_replace("!http://([^/]+)/(.+)!","/home/www-data/emf-build/$2",$_POST["tests_EMF_URL"]):
						' -emfURL '.$_POST["tests_EMF_URL"]
					).
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					($_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					($_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

					($isEMFbuildServer?
						' -testFile /home/www-data/emf-build/tools/emf/downloads/drops/'.$tBR.'/'.$tID.'/emf-sdo-xsd-Automated-Tests-'.$tID.'.zip':
						' -testURL http://emf.torolab.ibm.com/tools/emf/downloads/drops/'.$tBR.'/'.$tID.'/emf-sdo-xsd-Automated-Tests-'.$tID.'.zip'
					).

					($_POST["tests_Run_Tests_Perf_Repeats"]!=""?
						' -continuous '.$_POST["tests_Run_Tests_Perf_Repeats"]
					:'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files
					if ($previewOnly) {
						print $preCmd."<br />"; print $preCmd2."<br />"; 
					} else {
						exec($preCmd); exec($preCmd2);
						$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
					}
					if ($previewOnly) { print preg_replace("/\ \-/","<br> -",$cmd)."<hr noshade size=1/>"; } else { exec($cmd); }
			}

		} // end else 
		
print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?project=$PR&amp;debug\">debug test</a></li>\n";
print "<li><a href=\"?project=$PR&amp;previewOnly\">preview test</a></li>\n";
print "<li><a href=\"?project=$PR&amp;debug&previewOnly\">preview debug test</a></li>\n";
print "<li><a href=\"?project=$PR\">normal test</a></li>\n";
print "</ul>\n";
print "</div>\n";

include_once "sideitems-common.php";

print "</div>\n";

$html = ob_get_contents();
ob_end_clean();

$pageTitle = "EMF - Testing EMF Patched Builds";
$pageKeywords = "";
$pageAuthor = "Nick Boldt";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

/************************** METHODS *****************************************/

function displayCheckboxes($label,$options,$verbose=false,$isChecked=false) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option) {
		$opt = $option;
		$isSelected = false;
		if (false===strpos($opt,"JUnit")) { // disabled for now
			if (!preg_match("/\-\=[\d\.]+/",$opt)) {
				if (strstr($opt,"=")) {  // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
					$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
					print "\n\t<input".($isChecked?" checked":"")." type=\"checkbox\" "."name=\"".$label."_".trim($matches[2])."\" value=\"Y\">".($verbose?trim($matches[2])." | ":"").trim($matches[1]);
				} else { // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
					print "\n\t<input".($isChecked?" checked":"")." type=\"checkbox\" "."name=\"".$label."_".$opt."\" value=\"Y\">".$opt;
				}
				print "<br/>\n";
			}
		}
	}
}

function displayOptions($options) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	foreach ($options as $o => $option) {
		$opt = $option;
		$isSelected = false;
		if (strstr($opt,"|selected")) {  // remove the |selected keyword
			$isSelected=true;
			$opt = substr($opt,0,strpos($opt,"|selected"));
		}
		if (strstr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
			$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
			print "\n\t<option ".($isSelected?"selected ":"")."value=\"".trim($matches[2])."\">".trim($matches[1])."</option>";
		} else { // turn foo into <option value="foo">foo</option>
			print "\n\t<option ".($isSelected?"selected ":"")."value=\"".$opt."\">".$opt."</option>";
		}
	}
}

function loadOptionsFromFiles($file1,$file2) { // fn not used
	$sp = array();
	if (is_file($file1)) { $sp = file($file1); }
	if (is_file($file2)) { $sp = array_merge($sp,file($file2));	}
	$options = loadOptionsFromArray($sp);
	return $options;
}
function loadOptionsFromFile($file1) { // fn not used
	$sp = array();	if (is_file($file1)) { $sp = file($file1); }
	$options = loadOptionsFromArray($sp);
	return $options;
}

function loadOptionsFromRemoteFiles($file1,$file2,$file3) {
	$sp1 = file($file1);	if (!$sp1) { $sp1 = array(); }
	$sp2 = file($file2);	if (!$sp2) { $sp2 = array(); }
	$sp3 = array(); if ($file3) { $sp3 = file($file3);	if (!$sp3) { $sp3 = array(); } }
	$options = loadOptionsFromArray( array_merge($sp1,$sp2,$sp3) );
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
	$debug=isset($debug)?$debug:0; //1
	
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
				if ($debug>0) print "Section: $s --> $doSection<br>";

				$options[$doSection] = array();
				if ($isReversed) { $options[$doSection]["reversed"] = $isReversed; }
			}
		} else if (!preg_match("/\[([a-zA-Z\_]+)\]/",$s,$matches)) {
			if (strlen($s)>2) {
				if ($debug>0) print "Loading: $s<br>";
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

	function return_bytes($val) {
		$val = trim($val);
		$last = $val{strlen($val)-1};
		switch($last) {
			 case 'k':
			 case 'K':
				  return (int) $val * 1024;
			 case 'm':
			 case 'M':
				  return (int) $val * 1048576;
			 default:
				  return $val;
		}
	}

	function checkIfTestsInProgress() {
		global $SERVER_NAME;

		// look for lockfiles in the testing dirs; if any found, return a warning about overlapping tests
		$lockfiles = array(
			"/home/www-data/perftests/perftests.lock"=> "/tests/results-perf.php"
		);
		foreach ($lockfiles as $lockfile => $resultspage) {
			if (is_file($lockfile)) {
				$oc = file($lockfile);
				$oc = str_replace("/home/www-data/","http://".$SERVER_NAME."/tools/emf/",$oc[0]);
				$o .= '&#160;&#160;*&#160;<a href="'.$resultspage.'">Results</a>&#160;&#160;*&#160;<a href="'.$oc.'">'.$oc.'</a><br/>'."\n";
			}
		}

		return $o;
	}

?>
<!-- $Id: patch.php,v 1.3 2006/09/27 22:04:40 nickb Exp $ -->
