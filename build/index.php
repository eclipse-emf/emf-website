<?php

if (isset ($_GET["project"]) && $_GET["project"] == "uml2")
{
	header("Location: /modeling/mdt/uml2/build/");
	exit;	
}

$isEMFserver = (preg_match("/^emf(?:\.torolab\.ibm\.com)$/", $_SERVER["SERVER_NAME"]));
require_once ($_SERVER['DOCUMENT_ROOT'] . "/modeling/includes/scripts.php");
internalUseOnly();

$pre = "../";

require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());
ob_start();

$debug = isset ($_GET["debug"]) ? 1 : 0;
$previewOnly = isset ($_GET["previewOnly"]) ? 1 : 0;
$PR = "emf";
?>

<div id="midcolumn">

<div class="homeitem3col">
<h3>Building 
	<a style="color:white" href="?project=emf<?php print ($debug?"&amp;debug=1":"").($previewOnly?"&amp;previewOnly=1":""); ?>">EMF</a></h3>

<?php


if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
	print "<p>To run a build, please complete the following form and click the Build button.</p>";
} else
{
	print "<p>Your build is " . ($previewOnly ? "<b>NOT</b> " : "") . "in progress" . ($previewOnly ? ", but the command is displayed below for preview" : "") .
	". <a href=\"?project=$PR" . ($debug ? "&amp;debug=1" : "") . ($previewOnly ? "&amp;previewOnly=1" : "") . "\">Build another?</a></p>";
}

$workDir = "/home/www-data/build/" . $PR;

/** customization options here **/
$buildOptionsFile = is_file($pre . "../$PR/build.options.txt") ? $pre . "../$PR/build.options.txt" : "/var/www/www.eclipse.org/htdocs/emf/build.options.txt"; // read only

$dependenciesURLsFile = is_file($workDir . "/../emf/requests/dependencies.urls.txt") ? $workDir . "/../emf/requests/dependencies.urls.txt" : "requests/dependencies.urls.txt"; // read-write, one shared file

/** done customizing, shouldn't have to change anything below here **/

$options = loadOptionsFromRemoteFiles($buildOptionsFile, $dependenciesURLsFile);
$options["BuildType"] = array (
	"Release=R",
	"Stable=S",
	"Integration=I",
	"Maintenance=M",
	"Nightly=N|selected"
);

if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
?>

<table>
	<form method=POST name="buildForm">
			<input type="hidden" name="process" value="build" />
			<tr>
				<td colspan="4"></td>
				<td colspan="2">
					<div id="note" name="note" style="border:0;font-style:italic;font-weight:bold" readonly="readonly">&#160;</div>
				</td>
			</tr>
			
			<tr>
				<td><img src="/emf/images/numbers/1.gif" /></td>
				<td>&#160;</td>
				<td><b>Branch, Subproject &amp; Type</b></td>
				<td>&#160;</td>
				<input name="build_Branch" type="hidden" size="8" maxlength="10" onchange="this.value=this.value.replace(/[^0-9\.]/g,'');"/>
				<input name="build_Java_Home" type="hidden" size="20"/>
				<td colspan=3><select name="build_CVS_Branch" onchange="doBranchSelected(this,document.forms.buildForm.build_Build_Type)">
				<?php displayOptionsTriplet($options["BranchAndJDK"]); ?>
				</select> <br/>
				<select name="build_Project" onchange="document.location.href='?project='+this.options[this.selectedIndex].value+'<?php


	print ($debug ? "&amp;debug=1" : "") . ($previewOnly ? "&amp;previewOnly=1" : "");
?>'">
					<option <?php print $PR == "emf" ? "selected " : ""; ?>value="emf">EMF</option>
				</select>
				<select name="build_Build_Type" onchange="pickDefaults(this.options[this.selectedIndex].value)">
				<?php displayOptions($options["BuildType"]); ?>
				</select></td>
			</tr>

			<tr>
				<td colspan="2"></td>
				<td colspan="4">
					<div name="fullURL" id="fullURL" style="border:0;font-size:9px;" readonly="readonly">&#160;</div>
				</td>
			</tr>
			
			<tr valign="top">
				<td><img src="/modeling/images/numbers/2.gif" /></td>
				<td>&#160;</td>
				<td><b>Dependency URLs</b><br>
				
					<small>
					choose URLs (use <em>CTRL</em> <br> 
					for multiple selections)</small>
					<table>
						<tr><td><b>Public</b></td><td><b>Mirror</b></td></tr>
						<?php $buildServer = array("www.eclipse.org","emf.torolab.ibm.com","emft.eclipse.org","download.eclipse.org"); ?>
						<tr>						
							<td> &#149; <a href="http://download.eclipse.org/eclipse/downloads/">Eclipse</a></td>
							<td> &#149; <a href="http://fullmoon/downloads/">Eclipse</a></td>
						</tr>
						<tr>						
							<td> &#149; <a href="http://<?php print $buildServer[0]; ?>/modeling/emf/downloads/?project=emf&amp;showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
							<td> &#149; <a href="http://<?php print $buildServer[1]; ?>/modeling/emf/downloads/?project=emf&amp;showAll=&amp;sortBy=date&amp;hlbuild=0#latest">EMF</a></td>
						</tr>						
					</table>
            <p><small>&#160;&#160;-- AND/OR --</small></p>
				</td>
				<td>&#160;</td>
				<td colspan=2>
				<small>
				<select multiple="multiple" style="font-size:9px" name="build_Dependencies_URL[]" size="9" onchange="showfullURL(this.options[this.selectedIndex].value);">
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
				<textarea name="build_Dependencies_URL_New" cols="50" rows="2"></textarea>
				</td>
			</tr>
			<tr><td colspan="6">&#160;</td></tr>

			<tr>
				<td rowspan="2" valign="top"><img src="/modeling/images/numbers/3.gif" /></td>
				<td rowspan="2">&#160;</td>
				<td colspan=1>
        <a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">org.eclipse.releng.basebuilder</a> branch:<br><small>-basebuilderBranch</small>				
				</td>
				<td>&#160;</td>
				<td><input size="20" name="build_debug_basebuilder_branch" value="<?php echo isset($options["BaseBuilderBranch"]) ? $options["BaseBuilderBranch"][0] : ""; ?>"></td>
				<td><small> <a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder"><img alt="updated" src="/modeling/images/updated.gif" border="0"></a> Enter Tag or Branch, eg., 
				v20071108, v20070614,<br/>r322_v20070104, R3_1_maintenance, R3_0_maintenance :: <a href="http://wiki.eclipse.org/index.php/Platform-releng-basebuilder">wiki</a></small></td>
			</tr>
			<tr><td colspan="6">&#160;</td></tr>

			<tr>
				<td rowspan="2" valign="top"><img src="/modeling/images/numbers/4.gif" /></td>
				<td rowspan="2">&#160;</td>
				<td><b>Build Alias</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td><input name="build_Build_Alias" size=8></td>
				<td><small>
					Eg., for labelling Release builds as "2.0.1"<br> 
					instead of "R200408081212"</small></td>
			</tr>

			<tr>
				<td><b>Tag Build</b><br><small>
				optional</small></td>
				<td>&#160;</td>
				<td><select name="build_Tag_Build" size=1>
				<?php displayOptions($options["TagBuild"]); ?>
				</select></td>
				<td><small>If Yes, this tag will appear in CVS as "build_200405061234".<br/>If No, CVS will NOT be tagged with this build's ID</small></td>
			</tr> 

			<tr><td colspan="6">&#160;</td></tr>


			<tr valign="top">
				<td><img src="/emf/images/numbers/5.gif" /></td>
				<td>&#160;</td>
				<td><b>Run Tests</b><br><small>
				optional</small></td>
				<td>&#160;</td>
				
				<?php if ($PR == "emf") { ?>
				<td colspan="1">
				<div name="divRunTests24" id="divRunTests24" style="display:none;border:0">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests24"],"_24"); ?>
				</div>
				<div name="divRunTests23" id="divRunTests23" style="display:none;border:0">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests23"],"_23"); ?>
				</div>
				<div name="divRunTests22" id="divRunTests22" style="display:none;border:0">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests22"],"_22"); ?>
				</div>
				<div name="divRunTests21" id="divRunTests21" style="display:none;border:0">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests21"],"_21"); ?>
				</div>
				<div name="divRunTests20" id="divRunTests20" style="display:none;border:0">
				<?php displayCheckboxes("build_Run_Tests",$options["RunTests20"],"_20"); ?>
				</div>
				</td>
				<td><small><a id="divRunTestsToggle" name="divRunTestsToggle" href="javascript:toggleDetails()">More Info</a></small>
				<div id="divRunTestsDetail" name="divRunTestsDetail" style="display:none;border:0">
				<small>Standard JUnit Tests are added incrementally with bug fixes. 
				<br/><img src="/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				If yes to JUnit Tests, tests will be performed during build to
				validate results and will be refected in build results on download 
				page and build detail pages.
				<br/><img src="/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				If yes to JDK x.x Tests, EMF will be build using IBM JDK x.x, then 
				the EMF zips built with 1.4 will be run (and tested using the above 
				JUnit tests using IBM JRE x.x. For Standalone tests, the EMF
				Standalone on runtime zip(s) will be used instead of the SDK for
				running the same standalone JUnit tests as are used by the JDK tests.
				<br/><img src="/emf/images/c.gif" width="1" height="3" border="0" alt=""><br/>
				Old tests include: BVT, FVT, SVT. If yes to Old Tests, when build 
				completes old tests will be run with new SDK zip &amp; selected eclipse SDK.
				</small>
				</div>
				</td>
				
				<?php } ?>
			</tr> 

			<tr>
				<td><img src="/emf/images/numbers/6.gif" /></td>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td colspan="1"><input name="build_Email" size="20" maxlength="80"/></td>
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
						<td colspan=3><b>Debug Options:</b></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.<?php print $PR; ?> branch:<br><small>-branch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_debug_CVS_Branch" value=""></td>
						<td><small> Override value above; enter Tag/Branch/Version, eg., build_200409171617, R2_0_maintenance</small></td>
					</tr>
					<tr>
						<td colspan=1>org.eclipse.<?php print $PR; ?>.releng branch:<br><small>-projRelengBranch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_debug_proj_releng_branch" value=""></td>
						<td><small> Enter Tag/Branch/Version, eg., build_200409171617, R2_0_maintenance</small></td>
					</tr>
					<?php if ($PR == "emf") { ?>
					<tr>
						<td colspan=1>old tests branch:<br><small>-emfOldTestsBranch</small></td>
						<td>&#160;</td>
						<td><input size="15" name="build_debug_emf_old_tests_branch" value=""></td>
						<td><small> Enter Tag/Branch/Version, eg., R2_0_maintenance</small></td>
					</tr>
					<?php } ?>
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
				<td colspan=2 align=center><input type="button" value="<?php if ($previewOnly) { print "Preview Only"; } else { print "Build"; } ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">

function setNote(val) 
{
  note = document.getElementById('note');
  note.innerHTML = "";
}


function showfullURL(val)
{
	fullURL = document.getElementById('fullURL');
	fullURL.innerHTML = val ? "&#160;--&gt; " + val + " &lt;--" : "&#160;";
}

function pickDefaults(val) {
	document.forms.buildForm.build_Tag_Build.selectedIndex=(val=='N'?1:0); // Nightly = No; others = Yes
	divNum=branchToDivNum();
	if (val=='N') {
		setCheckbox("build_Run_Tests_JUnit",true,divNum);
		setCheckbox("build_Run_Tests_JDK14",false,divNum);
		setCheckbox("build_Run_Tests_JDK50",false,divNum);
		/*setCheckbox("build_Run_Tests_Binary",false,divNum);
		setCheckbox("build_Run_Tests_Source",false,divNum);*/
		setCheckbox("build_Run_Tests_Old",false,divNum);
	} else {
		setCheckbox("build_Run_Tests_JUnit",true,divNum);
		setCheckbox("build_Run_Tests_JDK14",true,divNum);
		setCheckbox("build_Run_Tests_JDK50",true,divNum);
		/*setCheckbox("build_Run_Tests_Binary",true,divNum);
		setCheckbox("build_Run_Tests_Source",true,divNum);*/
		setCheckbox("build_Run_Tests_Old",true,divNum);
	}
}

function branchToDivNum() 
{
  return document.forms.buildForm.build_Branch.value.substring(0,3).replace(".","");
}

function setCheckbox(field,bool,divNum) 
{
	if (document.forms.buildForm && document.forms.buildForm.elements[field] && document.forms.buildForm.elements[field].type=="checkbox")
	{
		document.forms.buildForm.elements[field].checked=bool;
	} else {
	  elem = document.getElementById(field+(divNum?"_"+divNum:""));
	  if (elem && elem.style.display != "none") {
	    elem.checked=bool;
	  }
	}
}

function doBranchSelected(field,field2) {
  val=field.options[field.selectedIndex].text;
  br=pickDefaultBranch(val);
  pickDefaultJavaHome(val);
  toggleCheckboxes(br);
  val2=field2.options[field2.selectedIndex].value;
  pickDefaults(val2)
}

function pickDefaultBranch(val) {
	with (document.forms.buildForm) { 
		if (val.indexOf(" | ")>0) { 
			build_Branch.value=val.substring(val.indexOf(" | ")+3,val.lastIndexOf(" | ")); // since the text label shown in the select box is not available for POST, store it here
		} else {
			build_Branch.value=val; // since the text label shown in the select box is not available for POST, store it here
		}
	  return build_Branch.value;
	}
}

function pickDefaultJavaHome(val) {
	with (document.forms.buildForm) { 
		if (val.indexOf(" | ")>0) { 
			build_Java_Home.value=val.substring(3+val.lastIndexOf(" | ")); // since the text label shown in the select box is not available for POST, store it here
		} else {
			build_Java_Home.value=val; // since the text label shown in the select box is not available for POST, store it here
		}
		return build_Java_Home.value;
	}
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

function toggleCheckboxes(val) {
  divs = new Array(
    "divRunTests24",
    "divRunTests23",
    "divRunTests22",
    "divRunTests21",
    "divRunTests20",
    "divRunTests"
  );
  divNum=branchToDivNum(); 
  for (i=0; i<divs.length; i++) {
    elem = document.getElementById(divs[i]);
    if (elem) 
    {
      elem.style.display = divs[i] == "divRunTests"+divNum ? "" : "none";
    }
  }
}

function doSubmit() {
	answer = true;
  divNum=branchToDivNum(); 
	with (document.forms.buildForm) { 
  	tofocus="build_Run_Tests_JUnit"+(divNum?"_"+divNum:"");
	  if (!elements[tofocus]){
  	  tofocus="build_Run_Tests_JUnit";
 	  }
		if (elements[tofocus] && elements[tofocus].checked==false // if not running JUnit tests
			&& build_Build_Type.options[build_Build_Type.selectedIndex].value!='N' // and not a Nightly
			) {
				answer = confirm(
					'Are you sure you want to run a '+build_Build_Type.options[build_Build_Type.selectedIndex].text+"\n"+
					'build without running JUnit tests?');
		} else {
		  tofocus=null;
		}
	}
	//loadOptions();
	if (answer) { 
		document.forms.buildForm.submit();
	} else if (tofocus) {
		document.forms.buildForm.elements[tofocus].focus();
	}
}

function doOnLoadDefaults() {
  doBranchSelected(document.forms.buildForm.build_CVS_Branch,document.forms.buildForm.build_Build_Type);
  field=document.forms.buildForm.build_Build_Type;
  pickDefaults(field.options[field.selectedIndex].value);
  field=document.forms.buildForm.build_Project;    setNote(field.options[field.selectedIndex].text);
}

setTimeout('doOnLoadDefaults()',500);

</script>
<?php


} else
{ // page two, form submission results

	/****************************** END OF PAGE ONE / START OF PAGE TWO **********************************/

	$newDependencies = splitDependencies(isset ($_POST["build_Dependencies_URL_New"]) ? $_POST["build_Dependencies_URL_New"] : "");
	$dependencyURLs = getDependencyURLs(isset ($_POST["build_Dependencies_URL"]) ? $_POST["build_Dependencies_URL"] : "", $newDependencies, $dependenciesURLsFile);

	$buildTimestamp = date("YmdHi");

	$ID = $_POST["build_Build_Type"] . $buildTimestamp;
	$BR = $_POST["build_Branch"];
	$PR = isset ($_GET["project"]) && $_GET["project"] ? $_GET["project"] : (isset ($_POST["build_Project"]) ? $_POST["build_Project"] : "");

	$BR_suffix = "_" . str_replace(".", "", substr($BR, 0, 3));

	$logfile = '/downloads/drops/' . $BR . '/' . $ID . '/buildlog.txt';

	if ($PR == "emf")
	{
		if ($_POST["build_CVS_Branch"] == "R2_0_maintenance")
		{
			if ($_POST["build_debug_basebuilder_branch"] == "")
			{
				$_POST["build_debug_basebuilder_branch"] = "R3_0_maintenance";
			}
			if ($_POST["build_debug_emf_releng_branch"] == "")
			{
				$_POST["build_debug_emf_releng_branch"] = "R2_0_maintenance";
			}
			if ($_POST["build_debug_emf_old_tests_branch"] == "")
			{
				$_POST["build_debug_emf_old_tests_branch"] = "R2_0_maintenance";
			}
		}
		if ($_POST["build_CVS_Branch"] == "R2_1_maintenance")
		{
			if ($_POST["build_debug_basebuilder_branch"] == "")
			{
				$_POST["build_debug_basebuilder_branch"] = "R3_1_maintenance";
			}
			if ($_POST["build_debug_emf_releng_branch"] == "")
			{
				$_POST["build_debug_emf_releng_branch"] = "R2_1_maintenance";
			}
			if ($_POST["build_debug_emf_old_tests_branch"] == "")
			{
				$_POST["build_debug_emf_old_tests_branch"] = "R2_1_maintenance";
			}
		}
		if ($_POST["build_CVS_Branch"] == "R2_2_maintenance")
		{
			if ($_POST["build_debug_basebuilder_branch"] == "")
			{
				$_POST["build_debug_basebuilder_branch"] = "R3_2_maintenance";
			}
			if ($_POST["build_debug_emf_releng_branch"] == "")
			{
				$_POST["build_debug_emf_releng_branch"] = "R2_2_maintenance";
			}
			if ($_POST["build_debug_emf_old_tests_branch"] == "")
			{
				$_POST["build_debug_emf_old_tests_branch"] = "R2_2_maintenance";
			}
		}
	} else
	{
		// ...?
	}
?>

<?php


	if (!$previewOnly)
	{
?>
	<p>Logfile is <a href="<?php print '/tools/'.$PR.$logfile; ?>"><?php print $workDir.$logfile; ?></a></p>
	
<?php } ?>

	<ul>
		<li><a href="/modeling/<?php print $PR == "emf" ? $PR : "mdt"; ?>/downloads/?project=emf&amp;sortBy=date&amp;hlbuild=0#latest">You can view, explore, or download your build here</a>.
		Here's what you submitted:</li>

	<?php


		print "<ul>\n";
		foreach ($_POST as $k => $v)
		{
			if (strstr($k, "build_") && !strstr($k, "_Sel"))
			{
				if ((is_array($v) && sizeof($v) > 0) || (!is_array($v) && $v != ""))
				{
					$lab = preg_replace("/\_/", " ", substr($k, 6));
					$val = $k == "build_Dependencies_URL_New" ? $newDependencies : $v;
					print "<li>";
					print (is_array($val) ? "<b>" .
					$lab . ":</b>" . "<ul>\n<li><small>" . join("</small></li>\n<li><small>", $val) . "</small></li>\n</ul>\n" : "<div>" .
					$val . "</div>" . "<b>" . $lab . ":</b>");
					print "</li>\n";
				}
			}
		}

		print "<li><div>" . $_SERVER["REMOTE_ADDR"] . "</div><b>Your IP:</b></li>\n";
		print "</ul>\n";
		print "</ul>\n";

		$branches = getBranches($options);
		//foreach ($branches as $k => $b) { print "$k => $b<br>"; }

		if (isset ($branches["HEAD"]) && isset ($_POST["build_CVS_Branch"]) && $branches["HEAD"] == $_POST["build_CVS_Branch"])
		{
			$_POST["build_CVS_Branch"] = "HEAD";
		}

		// fire the shell script...

		/** see http://ca3.php.net/manual/en/function.exec.php **/

		// create the log dir before trying to log to it
		$preCmd = 'mkdir -p ' . $workDir . '/downloads/drops/' . $BR . '/' . $ID . '/eclipse ;';

		$cmd = '/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid ' . $workDir . '/scripts/start.sh -proj ' . $PR .
		' -branch ' . (isset ($_POST["build_debug_CVS_Branch"]) && $_POST["build_debug_CVS_Branch"] != "" ? $_POST["build_debug_CVS_Branch"] : (isset ($_POST["build_CVS_Branch"]) ? $_POST["build_CVS_Branch"] : "")) .
		$dependencyURLs .
		 ((isset ($_POST["build_Run_Tests_JUnit"]) && $_POST["build_Run_Tests_JUnit"] == "Y") || (isset ($_POST["build_Run_Tests_JUnit" . $BR_suffix]) && $_POST["build_Run_Tests_JUnit" . $BR_suffix] == "Y") ? ' -antTarget run' : ' -antTarget runWithoutTest') .
			 ($_POST["build_Build_Alias"] ? ' -buildAlias ' . $_POST["build_Build_Alias"] : "") . // 2.0.2, for example
		' -tagBuild ' . ($_POST["build_Tag_Build"] == "Yes" ? "true" : "false") . // new, 04/07/12
	' -buildDir ' . $workDir . '/downloads/drops/' . $BR . '/' . $ID .
		' -buildTimestamp ' . $buildTimestamp .
		' -buildType ' . $_POST["build_Build_Type"] . ' -javaHome ' . $_POST["build_Java_Home"] .
		' -downloadsDir /home/www-data/build/downloads';
		// /home/www-data/build/downloads

		$fields = array (
			"-runJDK13Tests" => "build_Run_Tests_JDK13",
			"-runJDK14Tests" => "build_Run_Tests_JDK14",
			"-runJDK50Tests" => "build_Run_Tests_JDK50",
			"-runOldTests" => "build_Run_Tests_Old"
				// TODO: add build_Run_Tests_Binary & build_Run_Tests_Source
		);
		foreach ($fields as $flag => $field)
		{
			// $_POST["build_Run_Tests_JDK50"] or $_POST["build_Run_Tests_JDK50_23"] == "Y" 
			if ((isset ($_POST[$field]) && $_POST[$field] == "Y") || (isset ($_POST[$field . $BR_suffix]) && $_POST[$field . $BR_suffix] == "Y"))
			{
				$cmd .= ' ' . $flag . ' ' . $BR; // -runJDK50Tests M200612341234
			}
		}

		$fields = array (
			"-basebuilderBranch" => "build_debug_basebuilder_branch",
			"-projRelengBranch" => "build_debug_proj_releng_branch",
			"-emfOldTestsBranch" => "build_debug_emf_old_tests_branch",
			"-email" => "build_Email"
		);
		foreach ($fields as $flag => $field)
		{
			// $_POST["build_debug_basebuilder_branch"] != "" 
			if (isset ($_POST[$field]) && $_POST[$field] != "")
			{
				$cmd .= ' ' . $flag . ' ' . $_POST[$field]; // -basebuilderBranch foo
			}
		}

		$cmd .= (isset ($_POST["build_debug_noclean"]) && $_POST["build_debug_noclean"] == "Y" ? ' -noclean' : '') .
		' >> ' . $workDir . $logfile . ' 2>&1 &"'; // logging to unique files

		if ($previewOnly)
		{
			print '</div><div class="homeitem3col">' . "\n";
			print "<h3>Build Command (Preview Only)</h3>\n";
			print "<p><small><code>$preCmd</code></small></p>";
		} else
		{
			exec($preCmd);
		}

		if ($previewOnly)
		{
			print "<p><small><code>" . preg_replace("/\ \-/", "<br> -", $cmd) . "</code></small></p>";
		} else
		{
			exec($cmd);
		}

	} // end else 

	print "</div>\n</div>\n";

	print "<div id=\"rightcolumn\">\n";

	print "<div class=\"sideitem\">\n";
	print "<h6>Options</h6>\n";
	print "<ul>\n";
	print "<li><a href=\"?project=$PR&amp;debug=1\">debug build</a></li>\n";
	print "<li><a href=\"?project=$PR&amp;previewOnly=1\">preview build</a></li>\n";
	print "<li><a href=\"?project=$PR&amp;debug=1&previewOnly=1\">preview debug build</a></li>\n";
	print "<li><a href=\"?project=$PR\">normal build</a></li>\n";
	print "</ul>\n";
	print "</div>\n";

	if ($isEMFserver)
	{
		include_once $pre . "build/sideitems-common.php";
	}

	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "EMF - New Build";
	$pageKeywords = "";
	$pageAuthor = "Nick Boldt";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

	/************************** METHODS *****************************************/

	// if user submitted values by text entry, split them on newline, space or comma and return as an array
	function splitDependencies($entered)
	{
		if (false !== strpos($entered, "\n"))
		{
			$entered = explode("\n", $entered);
		} else
			if (false !== strpos($entered, " "))
			{
				$entered = explode(" ", $entered);
			} else
				if (false !== strpos($entered, ","))
				{
					$entered = explode(",", $entered);
				} else
				{
					$entered = array (
						$entered
					); // cast to array
				}
		return $entered;
	}

	// if user submitted values by selection, collect them
	// if user submitted values by text entry, collect them and write back into file for storage
	// return a string in the form "-URL http://... -URL http://..."
	function getDependencyURLs($chosen, $entered, $file)
	{
		if (!$chosen)
			$chosen = array ();
		if (!is_array($chosen))
			$chosen = array (
				$chosen
			); // cast to array if not already 

		$origSize = 0;
		$newSize = 0;

		// load values from $entered into $chosen
		if ($entered)
		{
			$lines = trimmed_read($file);
			$origSize = sizeof($lines);
			//		foreach ($lines as $line) print "<i>. $line</i><br/>\n";
			foreach ($entered as $url)
			{
				// add to $chosen
				$urlFixed = trim($url);
				if ($urlFixed)
				{
					$urlFixed = preg_replace("/.+:\/\/(fullmoon[^\/]+)\//", "http://download.eclipse.org/", $urlFixed);
					$chosen[] = $urlFixed;
				}
				// add to file, if it exists and is writable
				if (is_writable($file) && sizeof($lines) > 0 && !in_array($url, $lines))
				{
					$catg = findCatg($urlFixed);
					if ($catg && $urlFixed)
					{
						$lines[] = "$catg=$urlFixed"; // don't add a blank entry!
					}
				}
			}
			$newSize = sizeof($lines);
		}

		$lines = array_unique($lines); // remove duplicate entries

		//	foreach ($chosen as $e) print "<i>. $e</i><br/>\n";
		updateDependenciesFile($file, $lines, $newSize, $origSize);

		$ret = "";
		foreach ($chosen as $choice)
		{
			if ($choice)
				$ret .= " -URL " . $choice;
		}
		return $ret;
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

	function updateDependenciesFile($file, $lines, $newSize, $origSize)
	{
		if (is_writable($file) && $lines && sizeof($lines) > 0 && $newSize > $origSize)
		{
			$f = fopen($file, "w");
			foreach ($lines as $line)
			{
				fwrite($f, $line . "\n");
			}
			fclose($f);
		}
	}

	function displayCheckboxes($label, $options, $divSuffix = "")
	{
		$matches = null;
		if (isset ($options["reversed"]) && $options["reversed"])
		{
			// pop that item out
			array_shift($options);
			$options = array_reverse($options);
		}

		foreach ($options as $o => $option)
		{
			$opt = $option;
			$isSelected = false;
			if (!preg_match("/\-\=[\d\.]+/", $opt))
			{
				if (strstr($opt, "="))
				{ // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
					$matches = null;
					preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
					print "\n\t<input id=\"" . $label . "_" . trim($matches[2]) . $divSuffix . "\" type=\"checkbox\" " . "name=\"" . $label . "_" . trim($matches[2]) . $divSuffix . "\" value=\"Y\">" . trim($matches[1]);
				} else
				{ // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
					print "\n\t<input id=\"" . $label . "_" . $opt . $divSuffix . "\" type=\"checkbox\" " . "name=\"" . $label . "_" . $opt . $divSuffix . "\" value=\"Y\">" . $opt;
				}
				print "<br/>\n";
			}
		}
	}

	function displayOptions($options, $verbose = false)
	{
		$matches = null;
		if ($options["reversed"])
		{
			// pop that item out
			array_shift($options);
			$options = array_reverse($options);
		}

		foreach ($options as $o => $option)
		{
			$opt = $option;
			$isSelected = false;
			if (!preg_match("/\-\=[\d\.]+/", $opt))
			{
				if (strstr($opt, "|selected"))
				{ // remove the |selected keyword
					$isSelected = true;
					$opt = substr($opt, 0, strpos($opt, "|selected"));
				}
				if (strstr($opt, "="))
				{ // split line so that foo=bar becomes <option value="bar">foo</option>
					$matches = null;
					preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
					print "\n\t<option " . ($isSelected ? "selected " : "") . "value=\"" . trim($matches[2]) . "\">" .
					 ($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]) .
					"</option>";
				} else
					if (strstr($opt, "http") && strstr($opt, "drops"))
					{ // turn http://foo/bar.zip into <option value="http://foo/bar.zip">bar.zip</option>
						print "\n\t<option " . ($isSelected ? "selected " : "") . "value=\"" . $opt . "\">" .
						substr($opt, 6 + strpos($opt, "drops")) . "</option>";
					} else
					{ // turn foo into <option value="foo">foo</option>
						print "\n\t<option " . ($isSelected ? "selected " : "") . "value=\"" . $opt . "\">" . $opt . "</option>";
					}
			}
		}
	}

	function displayOptionsTriplet($options)
	{
		$matches = null;
		if ($options["reversed"])
		{
			// pop that item out
			array_shift($options);
			$options = array_reverse($options);
		}

		foreach ($options as $o => $option)
		{
			$opt = $option;
			$isSelected = false;
			if (!preg_match("/\-\=[\d\.]+/", $opt))
			{
				if (strstr($opt, "|selected"))
				{ // remove the |selected keyword
					$isSelected = true;
					$opt = substr($opt, 0, strpos($opt, "|selected"));
				}
				if (false !== substr($opt, "="))
				{ // split line so that foo=bar becomes <option value="bar">foo</option>
					$matches = null;
					preg_match("/([^\=]+)\=([^\=]+)\,([^\,]+)/", $opt, $matches);
					print "\n\t<option " . ($isSelected ? "selected " : "") . "value=\"" . trim($matches[2]) . "\">" .
					trim($matches[2]) . " | " . trim($matches[1]) . " | " . trim($matches[3]) .
					"</option>";
				} else
				{ // turn foo into <option value="foo">foo</option>
					print "\n\t<option " . ($isSelected ? "selected " : "") . "value=\"" . $opt . "\">" . $opt . "</option>";
				}
			}
		}
	}

	// compare project index, then datestamps
	function compareURLs($a, $b)
	{
		$aPF = substr($a, 0, strpos($a, "="));
		$bPF = substr($b, 0, strpos($b, "="));
		$aDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/", "$1", $a);
		$bDS = preg_replace("/.+([0-9]{12}|[0-9]{8}\-[0-9]{4}).+/", "$1", $b);
		return $aPF == $bPF ? ($aDS < $bDS ? 1 : -1) : ($aPF > $bPF ? 1 : -1);
	}

	function displayURLs($options, $verbose = false)
	{
		if ($options["reversed"])
		{
			// pop that item out
			array_shift($options);
			$options = array_reverse($options);
		}

		usort($options, "compareURLs");
		reset($options);
		//sort($options); reset($options);

		$matches = null;
		$currCatg = "";
		foreach ($options as $o => $option)
		{
			$opt = $option;
			if (strstr($opt, "="))
			{ // split line so that foo=bar becomes <option value="bar">foo</option>
				$matches = null;
				preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
				$catg = substr(trim($matches[1]), 2);
				if ($catg != $currCatg)
				{
					if ($currCatg != "")
						print "\n\t<option " . "value=\"" . "\"></option>";
					print "\n\t<option " . "value=\"" . "\"> -- " . $catg . " -- </option>";
					$currCatg = $catg;
				}
				print "\n\t<option " . "value=\"" . trim($matches[2]) . "\">" . substr(trim($matches[2]), 6 + strpos(trim($matches[2]), "drops")) . "</option>";
			} else
				if (strstr($opt, "http") && strstr($opt, "drops"))
				{ // turn http://foo/bar.zip into <option value="http://foo/bar.zip">bar.zip</option>
					print "\n\t<option " . "value=\"" . $opt . "\">" .
					substr($opt, 6 + strpos($opt, "drops")) . "</option>";
				} else
				{ // turn foo into <option value="foo">foo</option>
					print "\n\t<option " . "value=\"" . $opt . "\">" . $opt . "</option>";
				}
		}
	}

	function trimmed_read($file)
	{
		$lines = array ();
		if (is_writable($file) && is_readable($file))
		{
			$f = fopen($file, "r");
			if ($f)
			{
				while (!feof($f) && ($line = trim(fgets($f, 4096))))
					$lines[] = $line;
				fclose($f);
			} else
				die("Problem reading from: $file");
		}
		return $lines;
	}

	function loadOptionsFromFile($file1)
	{ // fn not used
		$sp = array ();
		if (is_file($file1))
		{
			$sp = file($file1);
		}
		$options = loadOptionsFromArray($sp);
		return $options;
	}

	function loadOptionsFromRemoteFiles($file1, $file2)
	{
		$sp1 = file($file1);
		if (!$sp1)
		{
			$sp1 = array ();
		}
		$sp2 = file($file2);
		if (!$sp2)
		{
			$sp2 = array ();
		}
		$options = loadOptionsFromArray(array_merge($sp1, $sp2));
		return $options;
	}

	function loadOptionsFromArray($sp)
	{
		$matches = null;
		$options = array ();
		$debug = -1;
		$doSection = "";

		foreach ($sp as $s)
		{
			if (strpos($s, "#") === 0)
			{ // skip, comment line
			} else
				if (preg_match("/\[([a-zA-Z0-9\_\|]+)\]/", $s, $matches))
				{ // section starts
					if (strlen($s) > 2)
					{
						$isReversed = false;
						if (strstr($s, "|reversed"))
						{ // remove the |reversed keyword
							$isReversed = true;
							$doSection = trim($matches[1]);
							$doSection = substr($doSection, 0, strpos($doSection, "|reversed"));
						} else
						{
							$doSection = trim($matches[1]);
						}
						if ($debug > 0)
							print "Section: $s --> $doSection<br>";

						$options[$doSection] = array ();
						if ($isReversed)
						{
							$options[$doSection]["reversed"] = $isReversed;
						}
					}
				} else
					if (!preg_match("/\[([a-zA-Z\_]+)\]/", $s, $matches))
					{
						if (strlen($s) > 2)
						{
							if ($debug > 0)
								print "Loading: $s<br>";
							$options[$doSection][] = trim($s);
						}
					}
		}

		return $options;
	}

	function getBranches($options)
	{
		foreach ($options["BranchAndJDK"] as $br => $branch)
		{
			$arr[getValueFromOptionsString($branch, "name")] = getValueFromOptionsString($branch, "value");
		}
		return $arr;
	}

	function getValueFromOptionsString($opt, $nameOrValue)
	{
		if (strstr($opt, "|selected"))
		{ // remove the |selected keyword
			$opt = substr($opt, 0, strpos($opt, "|selected"));
		}
		if (strstr($opt, "="))
		{ // split the name=value pairs, if present
			if ($nameOrValue == "name" || $nameOrValue === 0)
			{
				$opt = substr($opt, 0, strpos($opt, "="));
			} else
				if ($nameOrValue == "value" || $nameOrValue == 1)
				{
					$opt = substr($opt, strpos($opt, "=") + 1);
				}
		}
		return $opt;
	}
?>
