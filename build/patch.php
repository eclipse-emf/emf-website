<?php /**/
$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
internalUseOnly();

$pre = "../";

require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());
ob_start();

$debug = isset($_GET["debug"]) ? 1 : 0;
$previewOnly = isset($_GET["previewOnly"]) ? 1 : 0;
$logfile = "";
$PR = "emf"; ?>

<div id="midcolumn">

<div class="homeitem3col">
<h3>Testing EMF Patched Builds</h3>

<?php

	if (!isset($_POST["process"]) || $_POST["process"]!="test") { // page one, the form
		print "<p>To test a build of EMF, please complete the following form and click the Run Tests button.</p>";
	} else {
		print "<p>Your tests are ".($previewOnly?"<b>NOT</b> ":"")."in progress".($previewOnly?", but the command is displayed below for preview":"").
			". <a href=\"?project=$PR".($debug?"&amp;debug=1":"").($previewOnly?"&amp;previewOnly=1":"")."\">Test another?</a></p>";
	}
?>

<p>
<?php

	$PWD = "/home/www-data/tests";
	$workDir = "/home/www-data/build/".$PR;

	/** customization options here **/
	$testsOptionsFile = $pre."build.options.txt"; // read only

	$dependenciesURLsFile = "/home/www-data/build/requests/dependencies.urls.txt"; // read-write, one shared file

	/** done customizing, shouldn't have to change anything below here **/

	$options = loadOptionsFromRemoteFiles($testsOptionsFile,$dependenciesURLsFile);
$options["BuildType"] = array (
	"Release=R",
	"Stable=S",
	"Integration=I",
	"Maintenance=M",
	"Nightly=N|selected"
);

	// remove JUnit option
	$options["RunTests"] = array_unique(array_merge($options["RunTests24"],$options["RunTests23"],$options["RunTests22"],$options["RunTests21"]));
	foreach ($options["RunTests"] as $o => $p) { //print "$o => $p<br>";
		if (false===strpos($p,"JUnit")) { $newopt["RunTests"][$o] = $p; }
	}
	$options["RunTests"] = $newopt["RunTests"];
	sort($options["RunTests"]); reset ($options["RunTests"]);

	if (!isset($_POST["process"]) || $_POST["process"]!="test") { // page one, the form

?>

<table cellspacing="0" cellpadding="3">
	<form method=POST enctype="multipart/form-data" name="patchForm">
			<input type="hidden" name="MAX_FILE_SIZE" value="5242880" /> <!-- 5M limit -->
			<input type="hidden" name="process" value="test" />
			<tr>
				<td colspan="2"></td>
				<td colspan="4">
					<div name="fullURL" id="fullURL" style="border:0;font-size:9px;" readonly="readonly">&#160;</div>
				</td>
			</tr>

			<tr valign="top">
				<td><img src="/modeling/images/numbers/1.gif" /></td>
				<td>&#160;</td>
				<td><b>Dependency&#160;URLs</b><br>

					<small>
					choose URLs (use <em>CTRL</em> <br>
					for multiple selections)</small>
					<table>
						<tr><td><b>Public</b></td><td><b>Mirror</b></td></tr>
						<?php $buildServer = array("www.eclipse.org","emf.torolab.ibm.com","emft.eclipse.org","download.eclipse.org"); ?>
						<tr>
							<td>&#160;&#149;&#160;<a href="http://download.eclipse.org/eclipse/downloads/">Eclipse</a></td>
							<td>&#160;&#149;&#160;<a href="http://fullmoon/downloads/">Eclipse</a></td>
						</tr>
						<tr>
							<td>&#160;&#149;&#160;<a href="http://<?php print $buildServer[0]; ?>/emf/downloads/?showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
							<td>&#160;&#149;&#160;<a href="http://<?php print $buildServer[1]; ?>/emf/downloads/?showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
						</tr>
					</table>
            <p><small>&#160;&#160;-- AND/OR --</small></p>
				</td>
				<td>&#160;</td>
				<td colspan=2>
				<small>
				<select multiple="multiple" style="font-size:9px" name="tests_Dependencies_URL[]" size="9" onchange="showfullURL(this.options[this.selectedIndex].value);">
				<?php displayURLs($options["DependenciesURL"]); ?>
				</select></td>
			</tr>
			<tr valign="top">
				<td colspan=2>&#160;</td>
				<td><small>
					paste full URL(s), one per<br>
					line or comma separated<br>
					(new values will be stored)</small>
				</td>
				<td>&#160;</td>
				<td colspan=2>
				<textarea name="tests_Dependencies_URL_New" cols="50" rows="2"></textarea>
				</td>
			</tr>
			<tr><td colspan="6">&#160;</td></tr>

			<tr bgcolor="#eeeeee">
				<td bgcolor="#ffffff" rowspan="1"><img src="http://www.eclipse.org/emf/images/numbers/2.gif" /></td>
				<td bgcolor="#ffffff" rowspan="1">&#160;</td>
				<td rowspan="1" valign="top"><b>Run Tests</b><br><small>
				at least one must be selected</small><br/><br/>
				<small><a id="divRunTestsToggle" name="divRunTestsToggle" href="javascript:toggleDetails()">More Info</a></small>
				<div id="divRunTestsDetail" name="divRunTestsDetail" style="display:none;border:0">
				<small>
				Selected tests will be run concurrently. Tests run on patched <br>
				builds will be listed on their respective test results pages, <br>
				marked with prefix 'P'. Note that JDK Tests are the subset of the <br>
				available JUnit tests that can be run standalone (without Eclipse).<br><br>
				For Old Tests, use Branch, eg., R2_0_maintenance (if blank, HEAD) and <br>
				specify JDK to use (if not default).
				</small>
				</div>
				</td>
				<td rowspan="1">&#160;</td>
				<td valign="top">
				<?php displayCheckboxes("tests_Run_Tests",$options["RunTests"],false,false); ?>
				<br>
				</td>
				<td rowspan="1" valign="top">

				<table>
					<tr>
						<td valign=top colspan=2><b>JDK 1.4 Tests Compiler Args</b></td></tr>
					<tr>
						<td>JDK:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_JDK14">
<?php
	//$JDKs = loadDirSimple("/opt",".*(jdk|j2sdk|java|Java).*(1.4|14).*","d"); rsort($JDKs); reset($JDKs); // include Sun
	$JDKs = loadDirSimple("/opt",".*(java|Java).*(14|1\.4).*","d"); sort($JDKs); reset($JDKs); // omit Sun
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
				</table>

				<table>
					<tr>
						<td valign=top colspan=2><b>JDK 5.0 Tests Compiler Args</b></td></tr>
					<tr>
						<td>Source version:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Source50">
						<option value="1.4">1.4</option>
						<option value="1.5" selected>1.5 (5.0)</option>
						</select></small></td>
					</tr>
					<tr>
						<td>Xlint (warnings) - use "-" options to<br/>
							suppress instead of enabling:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Xlint50">
						<option value="">Choose...</option>
						<option value="all">all</option>
						<option value="unchecked">unchecked</option>
						<option value="deprecation">deprecation</option>
						<option value="unchecked,deprecation">unchecked,deprecation</option>
						<option value="">none</option>
						<option selected value="-unchecked">-unchecked (default)</option>
						<option value="-deprecation">-deprecation</option>
						<option value="-unchecked,-deprecation">-unchecked,-deprecation</option>
						</select></small></td>
					</tr>
				</table>

				<table>
					<tr>
						<td valign=top colspan=2><b>JDK 6.0 Tests Compiler Args</b></td></tr>
					<tr>
						<td>Source version:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Source60">
						<option value="1.4">1.4</option>
						<option value="1.5">1.5 (5.0)</option>
						<option value="1.6" selected>1.6 (6.0)</option>
						</select></small></td>
					</tr>
					<tr>
						<td>Xlint (warnings) - use "-" options to<br/>
							suppress instead of enabling:</td>
						<td><small><select style="font-size:10px" name="tests_Compiler_Arg_Xlint60">
						<option value="">Choose...</option>
						<option value="all">all</option>
						<option value="unchecked">unchecked</option>
						<option value="deprecation">deprecation</option>
						<option value="unchecked,deprecation">unchecked,deprecation</option>
						<option value="">none</option>
						<option selected value="-unchecked">-unchecked (default)</option>
						<option value="-deprecation">-deprecation</option>
						<option value="-unchecked,-deprecation">-unchecked,-deprecation</option>
						</select></small></td>
					</tr>
				</table>

				<table>
					<tr>
						<td valign=top colspan=2><b>Old Tests Options</b></td></tr>
					<tr>
						<td>Old Tests branch:</td>
						<td><small><input style="font-size:10px" size="17" name="tests_debug_emf_old_tests_branch"></td>
					</tr>
					<tr>
						<td>Old Tests JDK:</td>
						<td><small><select style="font-size:10px" name="tests_debug_emf_old_tests_java_home" onchange="">
								<option value="/opt/sun-java2-6.0">sun-java2-6.0</option>
								<option value="/opt/sun-java2-5.0" selected>sun-java2-5.0</option>
								<option value="/opt/sun-java2-1.4">sun-java2-1.4</option>
								<option value="/opt/ibm-java2-6.0">ibm-java2-6.0</option>
								<option value="/opt/ibm-java2-5.0">ibm-java-5.0</option>
								<option value="/opt/ibm-java2-1.4">ibm-java2-1.4</option>
						</select></td>
					</tr>
				</table>

				</td>
			</tr>

			<tr valign=top>
				<td rowspan=2><img src="http://www.eclipse.org/emf/images/numbers/3.gif" /></td>
				<td rowspan=2>&#160;</td>
				<td rowspan=2><b>Patch Zip</b><br><small>
				optional</small></td>
				<td rowspan=2>&#160;</td>
				<td><input name="tests_Patch_Zipfile" type="file"></td>
				<td><small>If you would like to use a patch on top of the above EMF SDK,
				create a zip with base folders <b style="color:red">eclipse/plugins/</b> and/or <b style="color:red">eclipse/features/</b>,
				and upload it here. <b style="color:red">Limit 5M filesize</b>.
				</small></td>
			</tr>
			<tr valign=top>
				<td>
				<small>&#160;&#160;&#160;&#160; - or - </small><br/>
					<input name="tests_Patch_Zipfile_Name" type="text" size="20" maxlength="80"></td>
				<td>&#160;&#160;&#160;&#160;<small> - or - </small><br/>
				<small>SCP your patch file onto this server and place it in
				<b style="color:red">/home/www-data/oldtests/patches</b>.
				Your file must be readable by the web user. Enter either the full path or just the filename.
				</small></td>
			</tr>

			<tr>
				<td><img src="http://www.eclipse.org/emf/images/numbers/4.gif" /></td>
				<td>&#160;</td>
				<td bgcolor="#eeeeee"><b>Email Address</b><br><small>optional: if you would like to be<br />notified when the tests are complete</small></td>
				<td bgcolor="#eeeeee">&#160;</td>
				<td bgcolor="#eeeeee" colspan=2><input name="tests_Email" size=20 maxlength=80></td>
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

			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center>
					<input style="" type="button" value="<?php print ($previewOnly?"Preview":"Run"); ?> Tests" onclick="doSubmit()">
				</td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function showfullURL(val)
{
	fullURL = document.getElementById('fullURL');
	fullURL.innerHTML = val ? "&#160;--&gt; " + val + " &lt;--" : "&#160;";
}


function loadSelectedValues() {
	with (document.forms.patchForm) {
		document.forms.patchForm.tests_Run_Tests_JDK13.checked=false;
	}
}

setTimeout('loadSelectedValues()',500);

function doSubmit() {
	//loadOptions();
	document.forms.patchForm.submit();
}

function toggleDetails()
{
  toggle=document.getElementById("divRunTestsToggle");
  detail=document.getElementById("divRunTestsDetail");
  if (toggle.innerHTML=="More Info")
  {
    toggle.innerHTML="Hide Info";
    detail.style.display="";
  }
  else
  {
    toggle.innerHTML="More Info";
    detail.style.display="none";
  }
}

</script>
<?php } else { // page two, form submission results

  		$newDependencies = splitDependencies($_POST["tests_Dependencies_URL_New"]);
  		$testDependencyURLs = getTestDependencyURLs(isset($_POST["tests_Dependencies_URL"]) ? $_POST["tests_Dependencies_URL"] : null,$newDependencies,$dependenciesURLsFile);

  		$bits = explode(" ",$testDependencyURLs);
  		foreach ($bits as $bit) {
  		  if (false!==strpos($bit,"emf-")) {
  			  // need to calculate branch and buildID from the URL of the emf build: http://download.eclipse.org/modeling/emf/emf/downloads/drops/2.0/I200404291310/emf-sdo-xsd-SDK-I200404291310.zip
  			  $BR = preg_replace("!.+/downloads/drops/(\d+\.\d+\.\d+)/.+!","$1",$bit);
  			  $ID = preg_replace("!.+/downloads/drops/(\d+\.\d+\.\d+)/([IMNRS]\d{12})/.+!","$2",$bit);
  		    break;
  		  }
  	  }

			$uploaddir = '/home/www-data/oldtests/patches/';
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

			$testTimestamp = ($uploadfile?"P":"").date("YmdHi");

	if (!$previewOnly) {
?>
	<p>Logfile(s) are listed below.</p>

<?php } ?>

	<ul><li>Here's what you submitted:</li>

	<?php

		$logfile = $logfile ? $PWD.'/'.$logfile : "";

		print "<ul>\n";
		$i=2;
		foreach ($_POST as $k => $v) {
			if (strstr($k, "tests_") && !strstr($k, "_Sel") && (is_array($v) || trim($v) != "")) // tests_Dependencies_URL_New sets $v to an array; all others are strings
			{
				$lab = preg_replace("/\_/"," ",substr($k,6));
				$val = $k == "tests_Dependencies_URL_New" ? $newDependencies : $v;
				print "<li>";
				print (is_array($val)?
					"<b>".$lab.":</b>" . "<ul>\n<li><small>".join("</small></li>\n<li><small>",$val)."</small></li>\n</ul>\n" :
					"<div>".$val."</div>" . "<b>".$lab.":</b>");
				print "</li>\n";
				$i++;
			}
		}

		print "<li><div>".$_SERVER["REMOTE_ADDR"]."</div><b>Your IP:</b></li>\n";
		print "</ul>\n";
		print "</ul>\n";

	?>
<br />

Test results will he located here: <a href="/modeling/emf/build/tests/results.php?version=&amp;project=emf&amp;sortBy=date">BVT, FVT, SVT</a>,
<a href="/modeling/emf/build/tests/results-jdk.php?version=14&amp;project=emf&amp;sortBy=date">JDK 1.4</a>,
<a href="/modeling/emf/build/tests/results-jdk.php?version=50&amp;project=emf&amp;sortBy=date">JDK 5.0</a>,
<a href="/modeling/emf/build/tests/results-jdk.php?version=60&amp;project=emf&amp;sortBy=date">JDK 6.0</a>.

<?php
			/*** OLD TESTS ***/
			if (isset($_POST["tests_Run_Tests_Old"]) && $_POST["tests_Run_Tests_Old"]=="Y") {

				$PWD = "/home/www-data/tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid '.$PWD.'/scripts/start.sh'.
					' -downloadsDir /home/www-data/build/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					$testDependencyURLs.
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					(isset($_POST["tests_debug_emf_old_tests_java_home"]) && $_POST["tests_debug_emf_old_tests_java_home"]!=""?' -javaHome '.$_POST["tests_debug_emf_old_tests_java_home"]:'').
					(isset($_POST["tests_debug_emf_old_tests_branch"]) && $_POST["tests_debug_emf_old_tests_branch"]!=""?' -emfOldTestsBranch '.$_POST["tests_debug_emf_old_tests_branch"]:'').
					(isset($_POST["tests_Email"]) && $_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					(isset($_POST["tests_debug_noclean"]) && $_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

			// three output options: uncomment a line and comment out the other two.
					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

  			if ($previewOnly) {
  				print '</div><div class="homeitem3col">'."\n";
  				print "<h3>Build Command (Preview Only)</h3>\n";
  				print "<p><small><code>$preCmd</code></small></p>";
  			} else {
  				exec($preCmd);
  				$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
  			}

  			if ($previewOnly) {
  				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
  			} else {
  				exec($cmd);
  			}
				print '<ul><li><a href="/modeling/emf/emf/oldtests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a></li></ul>'."\n";
			}

			/*** JDK 1.3 TESTS ***/
			if (isset($_POST["tests_Run_Tests_JDK13"]) && $_POST["tests_Run_Tests_JDK13"]=="Y") {

				$PWD = "/home/www-data/jdk13tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid /home/www-data/build/emf/scripts/runJDK13Tests.sh'.
					' -downloadsDir /home/www-data/build/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					$testDependencyURLs.
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					(isset($_POST["tests_Email"]) && $_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					(isset($_POST["tests_debug_noclean"]) && $_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

  			if ($previewOnly) {
  				print '</div><div class="homeitem3col">'."\n";
  				print "<h3>Build Command (Preview Only)</h3>\n";
  				print "<p><small><code>$preCmd</code></small></p>";
  			} else {
  				exec($preCmd);
  				$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
  			}

  			if ($previewOnly) {
  				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
  			} else {
  				exec($cmd);
  			}
				print '<ul><li><a href="/modeling/emf/emf/jdk13tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a></li></ul>'."\n";

			}

			/*** JDK 1.4 TESTS ***/
			if (isset($_POST["tests_Run_Tests_JDK14"]) && $_POST["tests_Run_Tests_JDK14"]=="Y") {

				$PWD = "/home/www-data/jdk14tests";
				$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';

				$j9=false;
				$compiler = $_POST["tests_Compiler_JDK14"];
				if (false!==strpos($compiler,",")) {
					$compiler = explode(",",$compiler);
					$j9=(false!==strpos($compiler[1],"j9"));
					$compiler = $compiler[0];
				}

				// create the log dir before trying to log to it
				$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

				$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid /home/www-data/build/emf/scripts/runJDK14Tests.sh'.
					' -downloadsDir /home/www-data/build/downloads'.
					' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
					$testDependencyURLs.
					($uploadfile?' -emfPatchFile '.$uploadfile:'').
					(isset($_POST["tests_Email"]) && $_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
					(isset($_POST["tests_debug_noclean"]) && $_POST["tests_debug_noclean"]=="Y"?' -noclean':'').

					' -compiler '.$compiler.
					($_POST["tests_Compiler_Arg_Deprecation"]!=""?' -compilerArgDeprecation '.$_POST["tests_Compiler_Arg_Deprecation"]:'').
					($j9?' -runtimeArgJ9':'').

					' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

  			if ($previewOnly) {
  				print '</div><div class="homeitem3col">'."\n";
  				print "<h3>Build Command (Preview Only)</h3>\n";
  				print "<p><small><code>$preCmd</code></small></p>";
  			} else {
  				exec($preCmd);
  				$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
  			}

  			if ($previewOnly) {
  				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
  			} else {
  				exec($cmd);
  			}
				print '<ul><li><a href="/modeling/emf/emf/jdk14tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a></li></ul>'."\n";
			}

			/*** JDK 5.0/6.0 TESTS ***/
			for ($i = 5; $i <= 6; $i++) {
				if (isset($_POST["tests_Run_Tests_JDK" . $i . "0"]) && $_POST["tests_Run_Tests_JDK" . $i . "0"]=="Y") {
					$PWD = "/home/www-data/jdk" . $i . "0tests";
					$logfile = $BR.'/'.$ID.'/'.$testTimestamp.'/testlog.txt';

					// create the log dir before trying to log to it
					$preCmd = 'mkdir -p '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp;

					$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid /home/www-data/build/emf/scripts/runJDK' . $i . '0Tests.sh'.
						' -downloadsDir /home/www-data/build/downloads'.
						' -testDir '.$PWD.'/'.$BR.'/'.$ID.'/'.$testTimestamp.
						$testDependencyURLs.
						($uploadfile?' -emfPatchFile '.$uploadfile:'').
						(isset($_POST["tests_Email"]) && $_POST["tests_Email"]!=""?' -email '.$_POST["tests_Email"]:'').
						(isset($_POST["tests_debug_noclean"]) && $_POST["tests_debug_noclean"]=="Y"?' -noclean':'').
						(isset($_POST["tests_Compiler_Arg_Source" . $i . "0"]) && $_POST["tests_Compiler_Arg_Source" . $i . "0"] != "" ?
							' -compilerArgSource '.$_POST["tests_Compiler_Arg_Source" . $i . "0"] : '').
						(isset($_POST["tests_Compiler_Arg_Xlint" . $i . "0"]) && $_POST["tests_Compiler_Arg_Xlint" . $i . "0"] != "" ?
							' -compilerArgXlint '.$_POST["tests_Compiler_Arg_Xlint" . $i . "0"] : '').

						' >> '.$PWD."/".$logfile.' 2>&1 &"');	// logging to unique files

		  			if ($previewOnly) {
		  				print '</div><div class="homeitem3col">'."\n";
		  				print "<h3>Build Command (Preview Only)</h3>\n";
		  				print "<p><small><code>$preCmd</code></small></p>";
		  			} else {
		  				exec($preCmd);
		  				$f = fopen($PWD."/".$logfile,"w"); fputs($f,preg_replace("/\ \-/","\n  -",$cmd)."\n\n"); fclose($f);
		  			}

		  			if ($previewOnly) {
		  				print "<p><small><code>".preg_replace("/\ \-/","<br> -",$cmd)."</code></small></p>";
		  			} else {
		  				exec($cmd);
		  			}
					print '<ul><li><a href="/modeling/emf/emf/jdk' . $i . '0tests/'.$logfile.'">'.$PWD.'/'.$logfile.'</a></li></ul>'."\n";
				}
			}

		} // end else

print "</div>\n</div>\n";

print "<div id=\"rightcolumn\">\n";
print "<div class=\"sideitem\">\n";
print "<h6>Options</h6>\n";
print "<ul>\n";
print "<li><a href=\"?project=$PR&amp;debug=1\">debug test</a></li>\n";
print "<li><a href=\"?project=$PR&amp;previewOnly=1\">preview test</a></li>\n";
print "<li><a href=\"?project=$PR&amp;debug=1&amp;previewOnly=1\">preview debug test</a></li>\n";
print "<li><a href=\"?project=$PR\">normal test</a></li>\n";
print "</ul>\n";
print "</div>\n";

if ($isEMFserver) { include_once $pre."build/sideitems-common.php"; }

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
	if (isset($options["reversed"]) && $options["reversed"]) {
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

function loadOptionsFromRemoteFiles($file1,$file2) {
	$sp1 = file($file1);	if (!$sp1) { $sp1 = array(); }
	$sp2 = file($file2);	if (!$sp2) { $sp2 = array(); }
	$options = loadOptionsFromArray( array_merge($sp1,$sp2) );
	return $options;
}

function loadOptionsFromArray($sp) {
	$matches = null;
	$options = array();
	$debug=-1;
	$doSection = "";

	foreach ($sp as $s) {
		if (strpos($s,"#")===0) { // skip, comment line
		} else if (preg_match("/\[([a-zA-Z0-9\_\|]+)\]/",$s,$matches)) { // section starts
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

// if user submitted values by text entry, split them on newline, space or comma and return as an array
function splitDependencies($entered) {
	if (false!==strpos($entered,"\n")) {
		$entered = explode("\n",$entered);
	} else if (false!==strpos($entered," ")) {
		$entered = explode(" ",$entered);
	} else if (false!==strpos($entered,",")) {
		$entered = explode(",",$entered);
	} else {
		$entered = array($entered); // cast to array
	}
	return $entered;
}

// if user submitted values by selection, collect them
// if user submitted values by text entry, collect them and write back into file for storage
// return a string in the form "-eclipseURL http://... -emfFile http://..."
function getTestDependencyURLs($chosen, $entered, $file) {
	if (!$chosen) $chosen = array();
	if (!is_array($chosen)) $chosen = array($chosen); // cast to array if not already

	$origSize = 0;
	$newSize = 0;

	// load values from $entered into $chosen
	if ($entered) {
		$lines = trimmed_read($file);
		$origSize = sizeof($lines);
//		foreach ($lines as $line) print "<i>. $line</i><br/>\n";
		foreach ($entered as $url) {
			// add to $chosen
			$urlFixed = trim($url);
			if ($urlFixed) {
				$urlFixed = preg_replace("/.+:\/\/(fullmoon[^\/]+)\//","http://download.eclipse.org/",$urlFixed);
				$chosen[] = $urlFixed;
			}
			// add to file, if it exists and is writable
			if (is_writable($file) && sizeof($lines)>0 && !in_array($url,$lines)) {
				$catg = findCatg($urlFixed);
				if ($catg && $urlFixed) {
					$lines[] = "$catg=$urlFixed"; // don't add a blank entry!
				}
			}
		}
		$newSize = sizeof($lines);
	}

	$lines = array_unique($lines); // remove duplicate entries

//	foreach ($chosen as $e) print "<i>. $e</i><br/>\n";
	updateDependenciesFile($file,$lines,$newSize,$origSize);

	$ret = "";
	foreach ($chosen as $choice) {
	  if ($choice) {
	    if (false!==strpos($choice,"eclipse-SDK")) {
	      $ret .= " -eclipseURL ".$choice;
	    } else if (false!==strpos($choice,"emf-")) {
	      $ret .= " -emfFile ".preg_replace("!http://([^/]+)/(.+)!","/home/www-data/build/$2",$choice);
	    }
	  }
	}
	return $ret;
}

function trimmed_read($file) {
	$lines = array();
	if (is_writable($file) && is_readable($file)) {
		$f = fopen($file, "r");
		if ($f) {
			while (!feof($f) && ($line = trim(fgets($f, 4096))) ) $lines[] = $line;
			fclose($f);
		} else die( "Problem reading from: $file");
	}
	return $lines;
}

function findCatg($url) {
	$matches = array(
		"11gmf" => "GMF-",
		"10gef" => "GEF-",
		"09net4j" => "emft-net4j-",
		"08validation" => "emft-validation-",
		"07transaction" => "emft-transaction-",
		"06query" => "emft-query-",
		"05ocl" => "mdt-ocl-|emft-ocl-",
		"04orbit" => "orbit-",
		"03uml2" => "uml2-",
		"02emf" => "emf-sdo-xsd-",
		"01eclipse" => "eclipse-",
		"99other" => "/"
	);
	foreach ($matches as $catg => $match) {
		if (false!==strpos($url,$match) || preg_match("#(".$match.")#",$url)) {
			return $catg;
		}
	}
}

function updateDependenciesFile($file,$lines,$newSize,$origSize) {
	if (is_writable($file) && $lines && sizeof($lines)>0 && $newSize > $origSize) {
		$f = fopen($file, "w");
		foreach ($lines as $line) {
			fwrite($f,$line."\n");
		}
		fclose($f);
	}
}

function displayJDKOptions($options) {
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
			if (false!==substr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]+)\,([^\,]+)/",$opt,$matches);
				print "\n\t<option ".($isSelected?"selected ":"")."value=\"".trim($matches[3])."\">".
				  trim($matches[3]).
				  "</option>";
			} else { // turn foo into <option value="foo">foo</option>
				print "\n\t<option ".($isSelected?"selected ":"")."value=\"".$opt."\">".$opt."</option>";
			}
		}
	}
}

// compare project index, then datestamps
function compareURLs($a, $b) {
   $aPF = substr($a,0,strpos($a,"="));
   $bPF = substr($b,0,strpos($b,"="));
   $aDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/","$1",$a);
   $bDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/","$1",$b);
   return $aPF == $bPF ? ($aDS < $bDS ? 1 : -1) : ($aPF > $bPF ? 1 : -1);
}

function displayURLs($options,$verbose=false) {
	if ($options["reversed"]) {
		// pop that item out
		array_shift($options);
		$options = array_reverse($options);
	}

	usort($options, "compareURLs"); reset($options);
	//sort($options); reset($options);

	$matches=null;
	$currCatg="";
	foreach ($options as $o => $option) {
		$opt = $option;
		if (strstr($opt,"=")) {  // split line so that foo=bar becomes <option value="bar">foo</option>
			$matches=null;preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
			$catg = substr(trim($matches[1]), 2);
			if ($catg!=$currCatg) {
				if ($currCatg!="")
					print "\n\t<option "."value=\""."\"></option>";
				print "\n\t<option "."value=\""."\"> -- ".$catg." -- </option>";
				$currCatg=$catg;
			}
			print "\n\t<option "."value=\"".trim($matches[2])."\">".substr(trim($matches[2]),6+strpos(trim($matches[2]),"drops"))."</option>";
		} else if (strstr($opt,"http") && strstr($opt,"drops")) { // turn http://foo/bar.zip into <option value="http://foo/bar.zip">bar.zip</option>
			print "\n\t<option "."value=\"".$opt."\">".
				substr($opt,6+strpos($opt,"drops"))."</option>";
		} else { // turn foo into <option value="foo">foo</option>
			print "\n\t<option "."value=\"".$opt."\">".$opt."</option>";
		}
	}
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

?>
<!-- $Id: patch.php,v 1.41 2008/02/25 17:46:42 nickb Exp $ -->
