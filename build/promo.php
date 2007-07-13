<?php

if (isset ($_GET["project"]) && $_GET["project"] == "uml2")
{
	header("Location: /modeling/mdt/uml2/build/promo.php");
	exit;	
}

$pre = "../";
require_once ($_SERVER['DOCUMENT_ROOT'] . "/emf/includes/scripts.php");
internalUseOnly();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");
$App = new App();
$Nav = new Nav();
$Menu = new Menu();
include ($App->getProjectCommon());
internalUseOnly();
ob_start();

$previewOnly = isset ($_GET["previewOnly"]) ? 1 : 0;
$PR = "emf";

// TODO: pull these values from promoteToEclipse.*.properties instead
$emails = array (
	"emf" => ""
);
	$users = array (// runs as, access IES map file repo as, ssh as
	"emf" => array (
		"nickb@emf.torolab.ibm.com",
		"nickb",
		"nboldt"
	)
);
?>
<div id="midcolumn">

<div class="homeitem3col">
<h3>Promote 
	<a style="color:white" href="?project=emf<?php print ($previewOnly?"&amp;previewOnly=1":""); ?>">EMF</a></h3>

<?php


if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
	print "<p>To promote, please complete the following form and click the Promote button.</p>";
} else
{
	print "<p>Your promotion is " . ($previewOnly ? "<b>NOT</b> " : "") . "in progress" . ($previewOnly ? ", but the command is displayed below for preview" : "") .
	". <a href=\"?project=$PR" . ($previewOnly ? "&amp;previewOnly=1" : "") . "\">Promote another?</a></p>";
}
?>

<p>
<?php


$workDir = "/home/www-data/build/" . $PR;

/** customization options here **/
$buildOptionsFile = is_file($pre . "../$PR/build.options.txt") ? $pre . "../$PR/build.options.txt" : $pre . "build.options.txt"; // read only

$dependenciesURLsFile = is_file($workDir . "/../emf/requests/dependencies.urls.txt") ? $workDir . "/../emf/requests/dependencies.urls.txt" : "requests/dependencies.urls.txt"; // read-write, one shared file

/** done customizing, shouldn't have to change anything below here **/

$options = loadOptionsFromRemoteFiles($buildOptionsFile, $dependenciesURLsFile);

//print "Branches:"; print_r($options["Branch"]);
$buildIDs = array ();
$buildIDs2 = array ();

foreach ($options["BranchAndJDK"] as $br)
{
	$bits = explode("=", $br);
	$BR = $bits[0];
	// define which build types to show:
	if (is_dir("$workDir/downloads/drops/$BR"))
	{
		$buildIDs = loadDirSimple("$workDir/downloads/drops/$BR", "([MISR]+\d{12})", "d"); // include N builds
		foreach ($buildIDs as $k => $bid)
		{
			if (is_dir("$workDir/downloads/drops/$BR/$bid/testresults/xml"))
			{ // no point adding them to the list if there's no data available!
				$buildcfgs = getBuildConfig("$workDir/downloads/drops/$BR/$bid/");
				if ($buildcfgs["branch"])
				{
					$buildIDs2[substr($bid, 1) . substr($bid, 0, 1)] = $BR . "/" . $bid . " | " . $buildcfgs["branch"];
				}
			}
		}
	}
}
$buildIDs = $buildIDs2;
if (sizeof($buildIDs) < 1)
{
	$buildIDs = array (
		"ERROR: No builds found!"
	);
}
krsort($buildIDs);
reset($buildIDs);

if (!isset ($_POST["process"]) || !$_POST["process"] == "build")
{ // page one, the form
?>

<table>
	<form method=POST name="promoForm">
			<input type="hidden" name="process" value="build" />
			<tr>
				<td>&#160;</td>
				<td><b><?php echo strtoupper($PR); ?> Build Version, ID &amp; Branch</b></td>
				<td>&#160;</td>
				<td colspan=2>
				<select style="font-size:9px" name="build_Version_Build_ID_And_Branch" size="8">
					<?php displayOptions($buildIDs,false,0); ?>
				</select></td>
			</tr>

			<tr valign="top">
				<td>&#160;</td>
				<td><b>Options</b><br><small></small></td>
				<td>&#160;</td>
				<td colspan="2"><p><input type="checkbox" name="build_Update_ISS_Map_File" value="Yes" checked="checked"> Update ISS Map File? 
				<small><select style="font-size:9px" name="build_IES_CVS_Branch" size="1">
					<?php displayOptions($options["BranchIES"],false,0); ?>
				</select></small></p>
				<p><input type="checkbox" name="build_Announce_In_Newsgroup" value="Yes" checked="checked"> Announce In Newsgroup?</p>
				<p><input type="checkbox" name="build_Update_Coordinated_Update_Site" value="Yes"> Update Coordinated Update Site? 
				<small><select style="font-size:9px" name="build_Coordinated_Site_Name" size="1">
					<?php displayOptions(array("europa","callisto"),false,0); ?>
				</select></small></p>
				<p><input type="checkbox" name="build_Close_Bugz_Only" value="Yes" onclick="doOnclickBugzonly(this.checked)"> Move Assigned Bugs to Fixed? (-bugzonly)</p></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td><b>Email Address</b><br><small>optional</small></td>
				<td>&#160;</td>
				<td><input name="build_Email" size=25 value="<?php echo $emails[$PR]; ?>"></td>
				<td><small>If you would like to be<br>notified when promotion done</small></td>
			</tr>

			<tr>
				<td>&#160;</td>
				<td colspan=5><p><b>Note</b>: Please ensure the build you intend to promote was done using the <br/>
				<a target="_check" class="highlight" href="/emf/build/?project=<?php echo $PR; ?>">latest (or appropriate) driver(s)</a>, 
				and that the <a target="_check" href="/<?php echo $PR; ?>/downloads/?project=<?php echo $PR; ?>&amp;sortBy=date&amp;hlbuild=0#latest" class="highlight">all tests have passed</a>.</p>
				
				<p><b>When done, don't forget to change any ASSIGNED bugzillas to FIXED.</b></p>

				</td>
			</tr>
			<tr>
				<td>&#160;</td>
				<td colspan=2 align=center><input type="button" value="<?php print $previewOnly?"Preview Only":"Promote"; ?>" onclick="doSubmit()"></td>
			</tr>
			<tr>
				<td>&#160;</td>
			</tr>
	</form>
</table>
<script language="javascript">
function doSubmit() {
	answer = true;
	with (document.forms.promoForm) { 
		if (build_Version_Build_ID_And_Branch.options[build_Version_Build_ID_And_Branch.selectedIndex].value.indexOf("N")==0) {
			answer = confirm(
				'Are you sure you want to promote a Nightly build?');
			if (answer) { build_Version_Build_ID_And_Branch.focus(); }
		}
	}
	if (answer) { 
			document.forms.promoForm.submit();
	} else {
		// do nothing...
	}
}

function doOnclickBugzonly(booln) {
	with (document.forms.promoForm) {
		build_Update_ISS_Map_File.disabled=booln;
		build_IES_CVS_Branch.disabled=booln;
		build_Announce_In_Newsgroup.disabled=booln;
		build_Update_Coordinated_Update_Site.disabled=booln;
		build_Coordinated_Site_Name.disabled=booln;
		build_Email.disabled=booln;
	} 
}

onload=loadSelects;

function loadSelects() {
	with (document.forms.promoForm) { 
		build_Version_Build_ID_And_Branch.selectedIndex=0;
	}
}
</script>
<?php


} else
{ // page two, form submission results

	$BR = explode(" | ", $_POST["build_Version_Build_ID_And_Branch"]);
	$cvsbranch = $BR[1];
	$BR = explode("/", $BR[0]);
	$ID = $BR[1];
	$BR = $BR[0];
	// echo "got: cvsbranch: $cvsbranch, ID: $ID, BR: $BR<br/>";

	$logdir = "/home/www-data/promo_logs/";
	$logfile = "promo_log_" . $BR . "." . $ID . "_" . date("YmdHis") . ($_POST["build_Close_Bugz_Only"] != "" ? '_bugzonly' : '') . ".txt";

	if (!$previewOnly)
	{
?>
	<p>Logfile is <?php print $logdir.$logfile; ?></p>
<?php } ?>

	<ul>
		<li><a href="/<?php print $PR; ?>/downloads/?project=<?php print $PR; ?>&amp;sortBy=date&amp;hlbuild=0#latest">You can view, explore, or download your build here</a>.
			Here's what you submitted:</li>
	<?php


		print "<ul>\n";
		foreach ($_POST as $k => $v)
		{
			if (strstr($k, "build_") && trim($v) != "" && !strstr($k, "_Sel"))
			{
				$lab = str_replace("_", " ", substr($k, 6));
				$val = false !== strpos($v, ",") ? explode(",", $v) : $v;

				print "<li>";
				print (is_array($val) ? "<b>" .
				$lab . ":</b>" . "<ul>\n<li>" . join("</li>\n<li>", $val) . "</li>\n</ul>\n" : "<div>" .
				$val . "</div>" . "<b>" . $lab . ":</b>");
				print "</li>\n";
			}
		}
		print "<li><div>" . $_SERVER["REMOTE_ADDR"] . "</div><b>Your IP:</b>\n";
		print "</ul>\n";
?>
	</ul>
		
	<p><b>NOTE:</b> If you are redirected to a fullmoon mirror, you may not see the new build for at least an hour.</p>

<?php


		// fire the shell script...
		/** see http://ca3.php.net/manual/en/function.exec.php **/

		// create the log dir before trying to log to it
		$preCmd = 'mkdir -p ' . $logdir . ';';

		$cmd = ('/bin/bash -c "exec /usr/bin/nohup /usr/bin/setsid ssh ' . $users[$PR][0] .
		' \"cd ' .
			$workDir . '/../emf/scripts; ./promoteToEclipse.sh' . // one script, not two.
		' -sub ' . $PR .
		' -Q' .
		' -cvsbranch ' . $cvsbranch .
		' -branch ' . $BR .
		' -buildID ' . $ID .
		' -user ' . $users[$PR][1] .
		 ($_POST["build_Update_ISS_Map_File"]   != "" ? ' -userIES ' . $users[$PR][2] : '') .
		 ($_POST["build_IES_CVS_Branch"]        != "" ? ' -branchIES ' . $_POST["build_IES_CVS_Branch"] : '') .
		 ($_POST["build_Close_Bugz_Only"]       != "" ? ' -bugzonly' : '') .
		 ($_POST["build_Update_ISS_Map_File"]   != "" ? '' : ' -noIES') .
		 ($_POST["build_Announce_In_Newsgroup"] != "" ? ' -announce' : '') .
		 ($_POST["build_Update_Coordinated_Update_Site"] != "" ? ' -coordsite ' . $_POST["build_Coordinated_Site_Name"] : '') .
		 ($_POST["build_Email"] != "" ? ' -email ' . $_POST["build_Email"] : '') .
		' \"' .
		' >> ' . $logdir . $logfile . ' 2>&1 &"'); // logging to unique files

		if ($previewOnly)
		{
			print '</div><div class="homeitem3col">' . "\n";
			print "<h3>Build Command (Preview Only)</h3>\n";
			print "<p><small><code>$preCmd</code></small></p>";
		} else
		{
			exec($preCmd);
			$f = fopen($logdir . $logfile, "w");
			fputs($f, preg_replace("/\ \-/", "\n  -", $cmd) . "\n\n");
			fclose($f);
		}

		if ($previewOnly)
		{
			print "<p><small><code>" . preg_replace("/\ \-/", "<br> -", $cmd) . "</code></small></p>";
		} else
		{
			exec($cmd); // disable here to prevent operation
		}
	}

	print "</div>\n</div>\n";

	print "<div id=\"rightcolumn\">\n";
	print "<div class=\"sideitem\">\n";
	print "<h6>Options</h6>\n";
	print "<ul>\n";
	print "<li><a href=\"?project=$PR&amp;previewOnly=1\">preview promo</a></li>\n";
	print "<li><a href=\"?project=$PR\">normal promo</a></li>\n";
	print "</ul>\n";
	print "</div>\n";

	if ($isEMFserver)
	{
		include_once $pre . "build/sideitems-common.php";
	}

	print "</div>\n";

	$html = ob_get_contents();
	ob_end_clean();

	$pageTitle = "EMF - Promote a Build";
	$pageKeywords = "";
	$pageAuthor = "Nick Boldt";

	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="' . $pre . 'includes/downloads.css"/>' . "\n");
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);

	/************************** METHODS *****************************************/

	function displayCheckboxes($label, $options, $verbose = false, $checked = false)
	{
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
				if (strstr($opt, "="))
				{ // split line so that foo=bar becomes <input type="checkbox" name="bar" value="Y">foo
					$matches = null;
					preg_match("/([^\=]+)\=([^\=]*)/", $opt, $matches);
					print "\n\t<input " . ($checked ? "checked " : "") . "type=\"checkbox\" " . "name=\"" . $label . "_" . trim($matches[2]) . "\" value=\"Y\">" . ($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]);
				} else
				{ // turn foo into <input type="checkbox" name="foo" value="Y">foo</option>
					print "\n\t<input " . ($checked ? "checked " : "") . "type=\"checkbox\" " . "name=\"" . $label . "_" . $opt . "\" value=\"Y\">" . $opt;
				}
				print "<br/>\n";
			}
		}
	}

	function displayOptions($options, $verbose = false, $selected = -1)
	{
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
					print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . trim($matches[2]) . "\">" . ($verbose ? trim($matches[2]) . " | " : "") . trim($matches[1]) . "</option>";
				} else
				{ // turn foo into <option value="foo">foo</option>
					print "\n\t<option " . ($isSelected || $selected == $o ? "selected " : "") . "value=\"" . $opt . "\">" . $opt . "</option>";
				}
			}
		}
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

	function loadOptionsFromRemoteFile($file1)
	{ // fn not used
		$sp1 = file($file1);
		if (!$sp1)
		{
			$sp1 = array ();
		}
		$options = loadOptionsFromArray($sp1);
		return $options;
	}

	function loadOptionsFromArray($sp)
	{
		$options = array ();
		$doSection = "";
		global $debug;

		foreach ($sp as $s)
		{
			$matches = null;
			if (strpos($s, "#") === 0)
			{ // skip, comment line
			} else
				if (preg_match("/\[([a-zA-Z\_\|]+)\]/", $s, $matches))
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

	function getprojRelengBranch($branches, $br_id)
	{ // { 2.1.0=HEAD|selected, 2.0.3=R2_0_maintenance, ... }, 2.0.3/M200506021148
		if (false === strpos($br_id, "/") || sizeof($branches) < 1)
		{
			return "HEAD";
		}
		$BR = explode("/", $br_id);
		$BR = $BR[0]; // 2.0.3
		foreach ($branches as $br)
		{
			if (false !== strpos($br, $BR) && false !== strpos($br, "=") && false === strpos($br, "-"))
			{
				$cvsBranch = explode("=", $br);
				$cvsBranch = $cvsBranch[1]; // HEAD|selected, R2_0_maintenance
				if (false === strpos($cvsBranch, "|"))
				{
					return $cvsBranch; // R2_0_maintenance
				} else
				{
					$cvsBranch = explode("|", $cvsBranch);
					return $cvsBranch[0]; // HEAD
				}
			}
		}
		return "HEAD";
	}

	function getBuildConfig($dir)
	{
		$results = array ();
		// get data from build.cfg, turn into array of name/value pairs
		if (!is_file($dir . "build.cfg"))
		{
			return $results;
		}
		$data = file($dir . "build.cfg");
		foreach ($data as $line)
		{
			$bits = explode("=", $line);
			if (sizeof($bits) == 2)
			{
				$results[$bits[0]] = $bits[1];
			}
		}
		return $results;
	}
?>
