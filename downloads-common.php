<!-- $Id: downloads-common.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
<?php

	ini_set("display_errors","0"); 

	$doRefreshPage = false;
	echo doCSSAndJS();
	echo ($hideInstructions?"":doDownloadInstructions());
	echo '
  <table border=0 cellspacing=5 cellpadding=2 width="100%" >
  <tr> 
    <td align=LEFT valign=TOP colspan="3" bgcolor="#0080C0"><b><font color="#FFFFFF" face="Arial,Helvetica">Latest Downloads</font></b></td>
  </tr>
  </table>
	';

	$jdk13testsPWD="";
	//static assignments: test folder
	if ($_SERVER["HTTP_HOST"]=="emf.torolab.ibm.com" || $_SERVER["HTTP_HOST"]=="emf") {
		$testsPWD = "/home/www-data/tests/tools/emf/tests"; // path on emf.torolab.ibm.com ONLY
		$jdk13testsPWD = "/home/www-data/jdk13tests"; // path on emf.torolab.ibm.com ONLY
	}
	$jdk50testsPWD="";
	//static assignments: test folder
	if ($_SERVER["HTTP_HOST"]=="emf.torolab.ibm.com" || $_SERVER["HTTP_HOST"]=="emf") {
		$testsPWD = "/home/www-data/tests/tools/emf/tests"; // path on emf.torolab.ibm.com ONLY
		$jdk50testsPWD = "/home/www-data/jdk50tests"; // path on emf.torolab.ibm.com ONLY
	}
	$debug_echoPWD=0; // set 0 to hide (for security purposes!)

	$hadLoadDirSimpleError=1;	// container to store errors message boolean: have we echoed the loadDirSimple() error msg yet? 
										// if 1, omit error; if 0, echo up to 1 error (suppress additional ones)

	//dynamic assignments
	$PWD = getPWD("downloads/drops"); // see scripts.php
	
	$buildOptionsFile = $CVSpreEMF."build.options.txt"; // read only

	if (!$showMax) { $showMax = 5; } // max # of builds to show on the page
	$showBuildsIfDirNotExist = 0;

	$debug=-1;

	// get options file data
	$options = loadOptionsFromFile($buildOptionsFile);

	//if ($debug>0) { w("OPTIONS:",1); wArr($options,"<br>",true,""); w("<hr noshade size=1 />"); }

	// get build types from options file
	$buildTypes = getBuildTypes($options); 

	//if ($debug>0) { w("BUILD TYPES:",1); wArr($buildTypes,"<br>",true,""); w("<hr noshade size=1 />"); }

	// get branches from options file
	$branches = getBranches($options);
	//if ($debug>0) { w("BRANCHES:",1); wArr($branches,"<br>",true,""); w("<hr noshade size=1 />"); }

	/*$buildRequestsFileTXT = $CVSpreEMF."emf-build/requests/build.requests.txt";

	ini_set("display_errors","0"); // suppress file not found errors
	$buildDetails = file($buildRequestsFileTXT);
	ini_set("display_errors","1"); // and turn 'em back on.

	if (!$buildDetails) { 
		//echo "Error! <b>$buildRequestsFileTXT</b> not found!"; exit;
		$buildDetails = array();
	}*/ /* no longer being used */

	//if ($debug>0) { w("BUILD DETAILS:",1); wArr($buildDetails,"<br>",true,""); w("<hr noshade size=1 />"); }

	/*if ($sortBy!="date") {
		$builds = getBuildsFromDetails($buildDetails,$branches); // old method using the build.requests.txt file
		$builds = reorderArray($builds,$buildTypes);
		$latest = getLatest($builds);	
		$latest = reorderArray($latest,$buildTypes);
	} else {
		$builds = getBuildsFromDetails($buildDetails,""); // old method using the build.requests.txt file
		$builds = reorderArray($builds,"");
		$latest = array();
	}

	if ($debug>0) { w("LATEST:",1); wArr($latest,"<br>",true,""); w("<hr noshade size=1 />"); }
	if ($debug>0) { w("BUILDS:",1); wArr($builds,"<br>",true,""); w("<hr noshade size=1 />"); } */

	$sortBy  = array_key_exists("sortBy",$_GET)  ? $_GET["sortBy"]  : "";
	$showAll = array_key_exists("showAll",$_GET) ? $_GET["showAll"] : "";

	if ($sortBy!="date") {
		$builds = getBuildsFromDirs($branches);
		$builds = reorderArray($builds,$buildTypes);
		$latest = getLatest($builds);	
		$latest = reorderArray($latest,$buildTypes);
	} else {
		$builds = getBuildsFromDirs("");
		$builds = reorderArray($builds,"");
		$latest = array();
		$showMax = 10;
	}

	if ($debug>0) { w("LATEST:",1); wArr($latest,"<br>",true,""); w("<hr noshade size=1 />"); }
	if ($debug>0) { w("BUILDS:",1); wArr($builds,"<br>",true,""); w("<hr noshade size=1 />"); }

	$cols1 = '
	 <td><b>Build Name</b></td>
	 <td><b><a href="?showAll='.$showAll.'&sortBy=date#latest">Build Date</b></td>';

	ini_set("display_errors","1"); 

	$colsCommon = array();

	$colsCommon[0] = '
		 <td colspan=1><table width=30 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=1 align=center><b style="color:#B51464;">ALL</b></td>
			 </tr>
			 <tr>
				<td colspan=1 align=center><img src="'.$CVSpreEMF.'images/brace30.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b>SDK</b></td>
			 </tr>
		 </table></td>
		 ';

	$cols = array(
		"all" => '
		<!-- emf/sdo x 2 -->
		 <td colspan=2><table width=60 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=3 align=center><b style="color:#BF5FBF;">EMF&amp;SDO</b></td>
			 </tr>
			 <tr>
				<td colspan=3 align=center><img src="'.$CVSpreEMF.'images/brace60.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b>SDK</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b>RT</b><a href="#emfruntimenote" style="text-decoration:none;"><b style="color:#BF5FBF;">*</b></a></td>
			 </tr>
		 </table></td>

		 <!-- xsd x 2 -->
		 <td colspan=2><table width=60 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=3 align=center><b style="color:#18187D;">XSD</b></td>
			 </tr>
			 <tr>
				<td colspan=3 align=center><img src="'.$CVSpreEMF.'images/brace60.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b>SDK</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b>RT</b><a href="#xsdruntimenote" style="text-decoration:none;"><b style="color:#18187D;">*</b></a></td>
			 </tr>
		 </table></td>
		');
		 $colsCommon[1] = '
		 <td colspan=2><table width=60 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=3 align=center><b style="color:#B51464;">ALL</b></td>
			 </tr>
			 <tr>
				<td colspan=3 align=center><img src="'.$CVSpreEMF.'images/brace60.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b style="font-size:10px">Tests</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">Examples</b></td>
			 </tr>
			 <tr>
				<td colspan=3 align=center><img src="'.$CVSpreEMF.'images/c.gif" height=4 width=1></td>
			 </tr>
		 </table></td>'.
		 '<td colspan=2><b>&nbsp;&nbsp;&nbsp;&nbsp;Results</b></td>
		'.
		(strstr($SERVER_NAME,"emf.torolab.ibm.com")?'
		<td colspan=3><table width=120 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=5 align=center><b style="color:#B51464;">JDK 1.3 TESTS</b></td>
			 </tr>
			 <tr>
				<td colspan=5 align=center><img src="'.$CVSpreEMF.'images/brace90.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b style="font-size:10px">Build</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">JUnit</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">log</b></td>
			 </tr>
		</table></td>
		':'').
		(strstr($SERVER_NAME,"emf.torolab.ibm.com")?'
		<td colspan=5 align="left"><table width=160 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=9 align=center><b style="color:#B51464;">JDK 5.0 TESTS</b></td>
			 </tr>
			 <tr>
				<td colspan=9 align=center><img src="'.$CVSpreEMF.'images/brace150.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b style="font-size:10px">Build</b></td>
					<td><span style="font-size:2px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">JUnit</b></td>
					<td><span style="font-size:2px">&nbsp;&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">log</b></td>
					<td><span style="font-size:2px">&nbsp;&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">src</b></td>
					<td width=5><span style="font-size:2px">&nbsp;&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">warnings</b></td>
			 </tr>
		</table></td>
		':'').
		(strstr($SERVER_NAME,"emf.torolab.ibm.com")?'
		<td colspan=4><table width=120 cellspacing=0 cellpadding=0 border=0>
			 <tr>
				<td colspan=7 align=center><b style="color:#B51464;">OLD TESTS</b></td>
			 </tr>
			 <tr>
				<td colspan=7 align=center><img src="'.$CVSpreEMF.'images/brace90.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b style="font-size:10px">BVT</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">FVT</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">SVT</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b style="font-size:10px">log</b></td>
			 </tr>
		</table></td>
		':'').
		//(!strstr($SERVER_NAME,"emf.torolab.ibm.com")?'':'<td><b>Platf</b></td>').
		'';

	$cols2="";
	$cols2.=$colsCommon[0].$cols[$colSuf].$colsCommon[1]; 

if ($latest) { 
 ?>
 
<table width="100%" cellspacing=0 cellpadding=3 align=center><tr><td align=left>
<table cellspacing=3 cellpadding=0>
<tr valign=bottom>
		 <td><b><a href="?showAll=<?php echo $showAll; ?>&sortBy=type">Build Type</a><a name="latest">&nbsp;</a></b></td>
		 <?php echo $cols1."<td></td>".$cols2; ?>
</tr>

<?php
		ini_set("display_errors","0"); // suppress errors
		foreach($latest as $branch => $latest2) {
			if (sizeof($latest2)>0) {
				echo "<tr><td colspan=".(19+sizeof($filePre))."><hr noshade size=1></td></tr>\n";
			}
			ini_set("display_errors","0"); // suppress errors
			foreach($latest2 as $type => $ID) {
				$name = $buildTypes[$branch][$type];
				echo "<tr valign=bottom><td>$name</td>\n";
				$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

				//w("$PWD/$ID/index.html",1);

				// add labelling support for R builds being labelled 2.0.0 instead of R2004060601234
				/*if (substr($ID,0,1)=="R") { // release build...
					$IDlabel = strlen($branch)==3 ? "$branch.0" : $branch;
				} else {
					$IDlabel = $ID;
				}*/

				$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/","(\.zip)","f"); //wArr($zips_in_folder);
				// for testing, you can find a list of files like this:
				// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`
				$ziplabel = (sizeof($zips_in_folder)<1) ? $ID : 
					preg_replace("/(.+)\-([^\-]+)(\.zip)/","$2",$zips_in_folder[0]); // grab first entry

				// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
				$IDlabel = $ziplabel;

				ini_set("display_errors","0"); // suppress errors
				if (is_file("$PWD/$branch/$ID/index.html")) {
					echo "<td><a href=\"".$pre."downloads-viewer.php?s=$branch/$ID\">$IDlabel</a></td>\n";
				} else {
					echo "<td><a href=\"".$pre."../"."../../tools/emf/"."downloads/drops/"."$branch/$ID/eclipse/$ID\"><i>$IDlabel</i></a></td>\n";
				}

				echo "<td><small>".IDtoDateStamp($ID,0)."&nbsp;</small></td><td><small>[<a href=\"#goto".$branch.$type."\">more</a>]</small></td>\n";

				echo createFileLinks($dls,$PWD,$branch,$ID,$pre2,$filePre,$ziplabel);

				echo "<td align=right>".showBuildResults("$PWD/","$branch/$ID/")."</td>\n";
				//echo "<td>".(is_file("$PWD/../downloads/drops/"."$ID/buildlog.txt")?("&nbsp;<a href=\""."$PWD/../downloads/drops/"."$ID/buildlog.txt"."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"")."</td>\n";

				echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
					getJDK13TestResults("$jdk13testsPWD/","$branch/$ID/")."\n":'');

				echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
					getJDK50TestResults("$jdk50testsPWD/","$branch/$ID/")."\n":'');

				echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
					getOldTestResults("$testsPWD/","$branch/$ID/")."\n":'');

				/*echo (!strstr($SERVER_NAME,"emf.torolab.ibm.com")?'':
					"<td>".getPlatform($ID,$buildDetails)."</td>\n");*/

				echo "</tr>\n";
			}
		}
		ini_set("display_errors","1"); // turn 'em back on

?>
</table>
</table>

<?php if (!$hideInstructions) { requirementsNote(); } ?>

&nbsp;
<?php
} // end if $latest

		 $numHeaders = 0;
		 $k=-1;
		 foreach($builds as $t_branch => $builds2) {
			 foreach($builds2 as $t_type => $builds3) {
				 if ($numHeaders==0 || $sortBy!="date") { 
			 		 echo "<table cellspacing=3 cellpadding=0>";
				 }
				 if ($sortBy!="date") { 
					 $branch=$t_branch;
					 $type=$t_type;
					 $name = $buildTypes[$branch][$type];
					 echo "
					 <tr bgcolor=\"#999999\">
					 <td align=left width=\"30%\"><b><a name=\"goto".$branch.$type."\"><font color=\"#FFFFFF\" face=\"Arial,Helvetica\">".$name."s</font></b></a></td>
					 </tr>
					 <tr>
					 <td align=left>
					 <table cellspacing=3 cellpadding=0>";
				 }

				 if ($numHeaders==0 || $sortBy!="date") { 
					 echo "
					 <tr valign=bottom>".
					 ($sortBy=="date"?"<td><b><a href=\"?showAll=".$showAll."&sortBy=type#latest\">Type</a><a name=\"latest\">&nbsp;</a></b></td>":"")
					 .$cols1.$cols2;
					 $numHeaders++;
				 } 

				ini_set("display_errors","0"); // suppress file not found errors
				foreach($builds3 as $t_k => $t_ID) {

					if ($sortBy=="date") { // need to change some values around
						$ID = explode("/",$t_ID); // 2.0.1/M/M200407280859
						$branch=$ID[0];
						$type=$ID[1];
						$ID = $ID[2];
						$k++;
					} else {
						$ID = $t_ID;
						$k = $t_k;
					}

					if ($showAll || $k<$showMax) { 
						echo "<tr valign=bottom>";
								 
						$pre2 = (is_dir("$PWD/$branch/$ID/eclipse/$ID/") ? "eclipse/$branch/$ID/" : "");

						echo ($sortBy=="date"?"<td>".$type."</td>":"");

						// add labelling support for R builds being labelled 2.0.0 instead of R2004060601234
						/*if (substr($ID,0,1)=="R") { // release build...
							$IDlabel = strlen($branch)==3 ? "$branch.0" : $branch;
						} else {
							$IDlabel = $ID;
						}*/

						$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/","(\.zip)","f"); //wArr($zips_in_folder);
						// for testing, you can find a list of files like this:
						// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`

						$ziplabel = (sizeof($zips_in_folder)<1) ? $ID : 
							preg_replace("/(.+)\-([^\-]+)(\.zip)/","$2",$zips_in_folder[0]); // grab first entry

						// generalize for any relabelled build, thus 2.0.1/M200405061234/*-2.0.2.zip is possible; label = 2.0.2
						$IDlabel = $ziplabel;

						if (is_file("$PWD/$branch/$ID/index.html")) {
							echo "<td><a href=\"".$pre."downloads-viewer.php?s=$branch/$ID\">$IDlabel</a></td>\n";
						} else {
							echo "<td><a href=\"".$pre."../"."../../tools/emf/"."downloads/drops/"."$branch/$ID/eclipse/$ID\"><i>$IDlabel</i></a></td>\n";
						}
						
						echo "<td><small>".IDtoDateStamp($ID,1)."</small></td>\n";

						echo createFileLinks($dls,$PWD,$branch,$ID,$pre2,$filePre,$ziplabel);

						echo "<td align=right>".showBuildResults("$PWD/","$branch/$ID/")."</td>\n";
						//echo "<td>".(is_file("$PWD/../downloads/drops/"."$ID/buildlog.txt")?("&nbsp;<a href=\""."$PWD/../downloads/drops/"."$ID/buildlog.txt"."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"")."</td>\n";

						echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
							getJDK13TestResults("$jdk13testsPWD/","$branch/$ID/")."\n":'');

						echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
							getJDK50TestResults("$jdk50testsPWD/","$branch/$ID/")."\n":'');

						echo (strstr($SERVER_NAME,"emf.torolab.ibm.com")?
							getOldTestResults("$testsPWD/","$branch/$ID/")."\n":'');

						/*echo (!strstr($SERVER_NAME,"emf.torolab.ibm.com")?'':
							"<td>".getPlatform($ID,$buildDetails)."</td>\n");*/

						echo "</tr>\n";
					}
				}
				ini_set("display_errors","1"); // and turn 'em back on.

				if (sizeof($builds3)>$showMax) { 
					if (!$showAll || $showAll=="false") {
						echo "<tr><td>&nbsp;</td><td align=center><small>(<a href=\"$PHP_SELF?showAll=true&sortBy=$sortBy\">show all ".sizeof($builds3)." builds</a>)</small></td></tr>\n";
					} else {
						echo "<tr><td>&nbsp;</td><td align=center><small>(<a href=\"$PHP_SELF?showAll=&sortBy=$sortBy\">show only ".$showMax." builds </a>)</small></td></tr>\n";
					}
				}
				if ($sortBy!="date") { 
					echo "</table>";
					echo "</table>&nbsp;";
				}
			}
		}
		if ($sortBy=="date") { 
			if (sizeof($builds)>$showMax) {
				if (!$showAll || $showAll=="false") {
					echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td align=center><small>(<a href=\"$PHP_SELF?showAll=true&sortBy=$sortBy\">show all ".sizeof($builds)." builds</a>)</small></td></tr>\n";
				} else {
					echo "<tr><td>&nbsp;</td><td>&nbsp;</td><td align=center><small>(<a href=\"$PHP_SELF?showAll=&sortBy=$sortBy\">show only ".$showMax." builds </a>)</small></td></tr>\n";
				}
			}
			echo "</table>";
			echo "</table>&nbsp;";
		}

	if ($doRefreshPage) { ?>
<script language="javascript">
		// refresh every 60 seconds if there's a build in progress
		setTimeout('document.location.reload()',60*1000); 
</script>
<?php } ?>

<?php if ($sortBy=="date" && !$hideInstructions) { requirementsNote(); } ?>
<?php if (!$hideInstructions) { ?>
	<table><tr><td><small>
	If you have problems downloading the drops, try another <a href="../../../tools/emf/scripts/mirrors.php">mirror</a>, or contact the <a href="mailto:webmaster@eclipse.org">webmaster</a>. <br>
	<br>
			These are the minimum required downloads for using EMF, XSD and SDO.
			<!-- As of 04/04/22, EMF & SDO are bundled together into one package. -->
			<ul>
				<li><small>To use <b style="color:#BF5FBF">EMF</b> alone, you require only the EMF Runtime.</small></li>
				<li><small>To use <b style="color:#BF5FBF">EMF</b> w/ XSD models, you require both the EMF & XSD Runtimes.</small></li>
				<li><small>To use <b style="color:#18187D">XSD</b>, you require both the EMF & XSD Runtimes.</small></li>
				<li><small>To use <b style="color:#C7568E">SDO</b> alone, you require both the EMF & SDO Runtimes.</small></li>
				<li><small>To use <b style="color:#C7568E">SDO</b> w/ XSD models, you require all 3 Runtimes: EMF, SDO & XSD (or the SDK).</small></li>

			</ul>
	</small>
<?php } // end if !$hideInstructions ?>

	<small>All downloads are provided under the terms and conditions of the <br>
	<a href="http://www.eclipse.org/legal/notice.html">Eclipse.org Software User Agreement</a> unless otherwise specified. </small>

<?php if (!$hideInstructions) { ?>
	</td>
	<td valign=top><?php echo doLegend(); ?></td>
	</tr></table>
<?php } // end if !$hideInstructions ?> 

<?php include $pre."includes/footer.php"; ?>

<?php

/************************** METHODS *****************************************/

	function reorderArray($arr,$buildTypes) { 
		global $debug;
		// resort the 2D or 3D array (latest or builds), 
		// using branches as the sort order for 1D, and 
		// build types for 2D. 
		// If 3D, rsort() the last dimension

		/*if ($debug>0) { 
			wArr($buildTypes);
			w("<b>BEFORE:</b>",1);	wArr($arr,"<br>",true,""); w("<hr noshade size=1 />",1);
		}*/

		$new = array();

		if ($buildTypes) { 
			foreach ($buildTypes as $br => $types) {
				//w("br: $br -->");
				$new[$br] = array();

				foreach ($types as $bt => $names) {
					if (array_key_exists($br,$arr) && array_key_exists($bt,$arr[$br]) && $arr[$br][$bt]) {
						//w("bt: $bt -->");
						$new[$br][$bt] = $arr[$br][$bt];
						if (is_array($new[$br][$bt])) { 
							$new[$br][$bt] = array_unique($new[$br][$bt]);
							rsort($new[$br][$bt]); reset($new[$br][$bt]);

							//wArr($new[$br][$bt]);
						} else {
							//w($new[$br][$bt],1);
						}
					}
				}
			}
		} else {
			krsort($arr); reset($arr);
			foreach ($arr as $dt_id => $dirs) {
				foreach ($dirs as $br_ty => $list) {
					$br = substr($br_ty,0,-1);	// branch: 2.0 (all but last char)
					$ty = substr($br_ty,-1,1); // last char: N
					$dt = substr($dt_id,0,12); // 200404051234
					$dir = $ty.$dt;				// dir: N200404051234
					if ($debug>1) { echo "$dt_id => $br_ty => $list:".sizeof($list)." ... $br, $ty, $dir<br>\n"; }

					// want [dt][dt][br/ty/dir]
					if (!array_key_exists($dt,$new) || !is_array($new[$dt])) { $new[$dt] = array(); }
					if (!array_key_exists($dt,$new[$dt]) || !is_array($new[$dt][$dt])) { $new[$dt][$dt] = array(); }
					$new[$dt][$dt][] = $br."/".$ty."/".$list[0];
				}
			}
		}
		if ($debug>0) { 
			w("<b>AFTER:</b>",1); wArr($new,"<br>",true,""); w("<hr noshade size=1 />",1);
		}
		return $new;
	}

	function getBuildsFromDirs($branches) { 
		// sort the $builds into a 3D array

		global $PWD, $showBuildsIfDirNotExist, $sortBy, $debug;
		//wArr($buildDetails);

		$builds_temp = array();

		$branchDirs = loadDirSimple($PWD,".*","d");

		$buildDirs = array();
		foreach ($branchDirs as $branch) { 
			if ($branch!="OLD") { 
				$buildDirs[$branch] = loadDirSimple($PWD."/".$branch,"(I|N|S|R|M)\d{12}","d");
				//w("BUILD DIRS [$branch]:",1); wArr($buildDirs[$branch],"<br>",true,""); w("<hr noshade size=1 />");			
			}
		}

		if ($buildDirs && is_array($buildDirs)) {
			foreach ($buildDirs as $br => $dirList) { 
				foreach ($dirList as $i => $dir) { 
					$ty = substr($dir,0,1); // first char				// w($ty,1);

					if ($sortBy!="date") { 
						if (!array_key_exists($br,$builds_temp) || !$builds_temp[$br]) {				$builds_temp[$br] = array();				}//b[3.0]
						if (!array_key_exists($ty,$builds_temp[$br]) || !$builds_temp[$br][$ty]) { $builds_temp[$br][$ty] = array(); }			 //b[3.0][N]
						$builds_temp[$br][$ty][] = $dir;
					} else {
						$dttm = substr($dir,1); // last 12 digits		
						//if ($debug>1) { w("dttm = ".$dttm.", dir = ".$dir); }
						$a = $dttm.$ty;
						$b = $br.$ty;

						if (!array_key_exists($a,$builds_temp) || !$builds_temp[$a]) {				$builds_temp[$a] = array();				}
						if (!array_key_exists($b,$builds_temp[$a]) || !$builds_temp[$a][$b]) { $builds_temp[$a][$b] = array(); }
						$builds_temp[$a][$b][] = $dir;
						//if ($debug>1) { w(' -- $builds_temp['.$a.']['.$b.'][] = '.$dir.';',1); }
					}
				}
			}
		}

		//wArr($builds_temp); 

		return $builds_temp;
	}
	
	/*function getBuildsFromDetails($buildDetails,$branches) {
		// sort the $builds into a 3D array

		global $PWD, $showBuildsIfDirNotExist,$sortBy;
		//wArr($buildDetails);


		$builds_temp = array();

		if ($buildDetails && is_array($buildDetails)) {

			// ID	Date	Time	Branch	Build Type	Eclipse URL	Run Tests	Build ID	Email	User IP
			// 0	1		2		3			4				5				6				7			7			8
			foreach ($buildDetails as $i => $rows) { 
				if ($i>0) {
					$row = explode("\t",$rows);
					if ($showBuildsIfDirNotExist || 
						file_exists($PWD."/".$row[0])) {

						if ($sortBy!="date") { 
							$row[3] = $branches[$row[3]]; // alias "HEAD" to "2.0" 
							if (!$builds_temp[$row[3]]) {				$builds_temp[$row[3]] = array();				}//b[3.0]
							if (!$builds_temp[$row[3]][$row[4]]) { $builds_temp[$row[3]][$row[4]] = array(); }//b[3.0][N]
							$builds_temp[$row[3]][$row[4]][] = $row[0];
						} else {
							if (!is_array($builds_temp[$row[1].$row[2].$row[0]][$row[3].$row[4]]) 
								|| (is_array($builds_temp[$row[1].$row[2].$row[0]][$row[3].$row[4]]) && !in_array($row[0],$builds_temp[$row[1].$row[2].$row[0]][$row[3].$row[4]])
								) ) {
								$builds_temp[$row[1].$row[2].$row[0]][$row[3]." ".$row[4]][] = $row[0];
							}
						}
					} else {
						//w("NOT FOUND: ".$PWD."../"."../../tools/emf/"."downloads/drops/".$row[0],1);
					}
				}
			}
		}

		//wArr($builds_temp); 

		return $builds_temp;
	}*/

/*	function getPlatform($ID,$buildDetails) {
		foreach ($buildDetails as $i => $rows) { 
			if ($i>0) {
				$row = explode("\t",$rows);
				if ($row[0]==$ID) { 
					$url = $row[5];
					if (stristr($url,"linux-motif")) {			return "<small><a href=\"$url\" target=\"_new\">L-Mtf</a></small>"; 
					} else if (stristr($url,"linux-gtk")) {	return "<small><a href=\"$url\" target=\"_new\">L-Gtk</a></small>"; 
					} else if (stristr($url,"win32")) {			return "<small><a href=\"$url\" target=\"_new\">Win32</a></small>"; 
					}
				}
			}
		}
		return "";
	} */

	function getJDK13TestResults($testsPWD,$path) { // given a build ID, determine any test results for BVT, FVT, SVT
		global $pre, $CVSpreEMF;
		$mid = "../"."../../tools/emf/"."jdk13tests/"; // this is a symlink on the filesystem!

		// return four <td> cells, one per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log

		// $testsPWD is path to root of tests; $path defines 2.0/I200405131234/ ... also need to then check subdirs

		$ret = "";
		$tests = array ("build", "junit");
		$testDirs = array();
		if (is_dir($testsPWD.$path) && is_readable($testsPWD.$path)) { 
			$testDirs = loadDirSimple($testsPWD.$path,"\d{12}","d"); // get dirs
			rsort($testDirs); reset($testDirs);
		}

		$testDir=$testDirs[0];

		//w("--",1); 		w("path = ".$path,1);			wArr($testDirs);			w("file = ".$file,1);			w("",1);
		
		if (!is_file($testsPWD.$path.$testDir."/testlog.txt")) { 
			return 
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>";
		}

		$file = $testsPWD.$path.$testDir."/testlog.txt"; //w($file,1);

		if (is_file($file) && is_readable($file)) { 
			$f = file($file);
		} else { 
			$f = array();
		}

		$cnt=0;
		foreach ($tests as $t) {
			if ($cnt===0 || 
				(false===strpos($cnt,"F") && false===strpos($cnt,"E") && false===strpos($cnt,"P"))
				) { // nothing, or no E or F or P
				$cnt = getJDK13TestResultsFailureCount($f,$t);
				if ($cnt==="...") { 
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a style=\"text-decoration:none\" href=\"".($pre.$mid.$path.$testDir."/testlog.txt")."\"><span class=\"inprogress\">.&nbsp;.&nbsp;.</a>&nbsp;</td>"."\n";
				} else if ($cnt==="") { 
					$ret .= "<td bgcolor=\"#FFFFFF\"><span class=\"errors\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"."\n";
				} else if ($cnt===0) { 
					$ret .= "<td bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"success\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/check.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"Passed!\"></a>&nbsp;</td>"."\n";
				} else if (false!==strpos($cnt,"FAILED")) {
					$ret .= "<td bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/not.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"BUILD FAILED!\"></a>&nbsp;</td>"."\n";
				} else {
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><span class=\"errors\">".
						$cnt.
						"</span></a>&nbsp;</td>".
						"\n";
				}
			} else { // if we failed on the build, the JUnit stuff won't run (if javacFailOnError=true in runJDK13Tests.xml)
					$ret .= "<td valign=\"bottom\" bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"inprogress\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/question.gif\" width=\"9\" height=\"13\" border=\"0\" alt=\"Did Not Run - Previous Test Failed!\"></a>&nbsp;</td>"."\n";
			}

		}

		global $SERVER_NAME;
		$ret.="<td>".(is_file($testsPWD.$path.$testDir."/testlog.txt")?("<a href=\"".(strstr($SERVER_NAME,"emf.torolab.ibm.com")?"/emf/log-viewer.php?jdk13test=$path".$testDirs[0]."/":$pre.$mid.$path.$testDirs[0]."/testlog.txt")."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"<span class=\"buildlog\">&nbsp;&nbsp;&nbsp;</span>")."</td>";
		return $ret; 
	}

	function getJDK50TestResults($testsPWD,$path) { // given a build ID, determine any test results for BVT, FVT, SVT
		global $pre, $CVSpreEMF;
		$mid = "../"."../../tools/emf/"."jdk50tests/"; // this is a symlink on the filesystem!

		// return four <td> cells, one per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log

		// $testsPWD is path to root of tests; $path defines 2.0/I200405501234/ ... also need to then check subdirs

		$ret = "";
		$tests = array ("build", "junit");
		$testDirs = array();
		if (is_dir($testsPWD.$path) && is_readable($testsPWD.$path)) { 
			$testDirs = loadDirSimple($testsPWD.$path,"\d{12}","d"); // get dirs
			rsort($testDirs); reset($testDirs);
		}

		$testDir=$testDirs[0];

		//w("--",1); 		w("path = ".$path,1);			wArr($testDirs);			w("file = ".$file,1);			w("",1);
		
		if (!is_file($testsPWD.$path.$testDir."/testlog.txt")) { 
			return 
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>";
		}

		$file = $testsPWD.$path.$testDir."/testlog.txt"; //w($file,1);

		if (is_file($file) && is_readable($file)) { 
			$f = file($file);
		} else { 
			$f = array();
		}

		$cnt=0;
		foreach ($tests as $t) {
			if ($cnt===0 || 
				(false===strpos($cnt,"F") && false===strpos($cnt,"E") && false===strpos($cnt,"P"))
				) { // nothing, or no E or F or P
				$cnt = getJDK50TestResultsFailureCount($f,$t);
				if ($cnt==="...") { 
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a style=\"text-decoration:none\" href=\"".($pre.$mid.$path.$testDir."/testlog.txt")."\"><span class=\"inprogress\">.&nbsp;.&nbsp;.</a>&nbsp;</td>"."\n";
				} else if ($cnt==="") { 
					$ret .= "<td bgcolor=\"#FFFFFF\"><span class=\"errors\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>"."\n";
				} else if ($cnt===0) { 
					$ret .= "<td bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"success\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/check.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"Passed!\"></a>&nbsp;</td>"."\n";
				} else if (false!==strpos($cnt,"FAILED")) {
					$ret .= "<td bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/not.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"BUILD FAILED!\"></a>&nbsp;</td>"."\n";
				} else {
					$ret .= "<td bgcolor=\"#FFFFFF\">&nbsp;<a class=\"errors\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><span class=\"errors\">".
						$cnt.
						"</span></a>&nbsp;</td>".
						"\n";
				}
			} else { // if we failed on the build, the JUnit stuff won't run (if javacFailOnError=true in runJDK50Tests.xml)
					$ret .= "<td valign=\"bottom\" bgcolor=\"#FFFFFF\" align=center>&nbsp;<a class=\"inprogress\" href=\"".
						$pre.$mid.$path.
						$testDir.
						"/testlog.txt\"><img src=\"".$CVSpreEMF."images/question.gif\" width=\"9\" height=\"13\" border=\"0\" alt=\"Did Not Run - Previous Test Failed!\"></a>&nbsp;</td>"."\n";
			}

		}

		global $SERVER_NAME;
		$ret.="<td>".(is_file($testsPWD.$path.$testDir."/testlog.txt")?("<a href=\"".(strstr($SERVER_NAME,"emf.torolab.ibm.com")?"/emf/log-viewer.php?jdk50test=$path".$testDirs[0]."/":$pre.$mid.$path.$testDirs[0]."/testlog.txt")."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"<span class=\"buildlog\">&nbsp;&nbsp;&nbsp;</span>")."</td>";
		$ret .= "<td bgcolor=\"#FFFFFF\"><b style=\"font-size:10px\">".getCompilerArg($f,"Source")."</b></td>\n";
		$ret .= "<td bgcolor=\"#FFFFFF\"><b style=\"font-size:10px\">".getCompilerArg($f,"Xlint")."</b></td>\n";
		return $ret; 
	}

	function getOldTestResults($testsPWD,$path) { // given a build ID, determine any test results for BVT, FVT, SVT
		global $pre, $CVSpreEMF;
		$mid = "../"."../../tools/emf/"."tests/"; // this is a symlink on the filesystem!

		// return four <td> cells, one per test. if all passed, green check + link to log; if failures, red number (of failures) + link to log

		// $testsPWD is path to root of tests; $path defines 2.0/I200405131234/ ... also need to then check subdirs

		$ret = "";
		$tests = array ("bvt","fvt","svt");
		$testDirs = array();
		if (is_dir($testsPWD.$path) && is_readable($testsPWD.$path)) { 
			$testDirs = loadDirSimple($testsPWD.$path,"\d{12}","d"); // get dirs
			rsort($testDirs); reset($testDirs);
		}
		if (!is_file($testsPWD.$path.$testDirs[0]."/testlog.txt")) { 
			return 
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>".
				"<td bgcolor=\"#F4F4F4\">&nbsp;</td>";
		}


		/*w("--",1); 		w($path,1);			wArr($testDirs);			w($file,1);			w("",1);*/
		foreach ($tests as $t) {
			$cnt = getTestResultsFailureCount($testsPWD.$path,$testDirs,"results/".$t.".html");
			if ($cnt==="") { 
				$ret .= "<td><span class=\"errors\">&nbsp;&nbsp;&nbsp;</td>"."\n";
			} else if ($cnt===0) { 
				$ret .= "<td align=center>&nbsp;<a class=\"errors\" href=\"".
					$pre.$mid.$path.
					$testDirs[0].
					"/results/".
					$t.
					".html#_Test_Results\"><img src=\"".$CVSpreEMF."images/check.gif\" width=\"16\" height=\"12\" border=\"0\" alt=\"Passed!\"></a>&nbsp;</td>"."\n";
			} else {
				$ret .= "<td>&nbsp;<a class=\"errors\" href=\"".
					$pre.$mid.$path.
					$testDirs[0].
					"/results/".
					$t.
					".html#_Test_Results\"><span class=\"errors\">".
					$cnt.
					"&nbsp;F</span></a>&nbsp;</td>".
					"\n";
			}
		}

		global $SERVER_NAME;
		$ret.="<td>".(is_file($testsPWD.$path.$testDirs[0]."/testlog.txt")?("<a href=\"".(strstr($SERVER_NAME,"emf.torolab.ibm.com")?"/emf/log-viewer.php?test=$path".$testDirs[0]."/":$pre.$mid.$path.$testDirs[0]."/testlog.txt")."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"<span class=\"buildlog\">&nbsp;&nbsp;&nbsp;</span>")."</td>";
		return $ret; 
	}

	function getCompilerArg($f,$param) {
		foreach ($f as $line) { 
			if (false!==strpos($line,"[jdk50]")) { return ""; } // done... if we didn't find it, it's not there
			if (false!==strpos($line,"compilerArg".$param)) { 
				$bits = explode(" ",$line);
				return $bits[3];
			}
		}
		return "";
	}

	function getJDK50TestResultsFailureCount($f,$type="") {
		$fails=0;
		$errors=0;
		$notes=0;
		$warns=0;
		$isBuild=true;
		$isDone=false;
		if ($f && sizeof($f)>0) {
			foreach ($f as $line) { 
				// check first half of the log for build problems; second half for test problems. 
				// split on line with "runJUnitTests:"
				if (false!==strpos($line,"runJUnitTests:")) { // second half
					$isBuild=false;
				}
				if ($isBuild && $type=="build") {
					if (false!==strpos($line,"[javac]") && false!==strpos($line,"error")) { 
						preg_match("/\[javac\] (\d+) (fail|error).+/",$line,$m);
						if ($m[2]=="fail") { 
							$fails+=$m[1];
						} else if ($m[2]=="error") { 
							$errors+=$m[1];
						}
					} else if (false!==strpos($line,"[javac]") && false!==strpos($line,"warning")) { 
						preg_match("/\[javac\] (\d+) (warning).+/",$line,$m);
						if ($m[2]=="warning") { 
							$warns+=$m[1];
						}
					} else if (false!==strpos($line,"[javac]") && false!==strpos($line,"deprecate")) { 
						$notes+=1;
					} else if (false!==strpos($line,"BUILD FAILED")) {
						$fails="FAILED";
						$isDone=true;
						break;
					}
				} else if (!$isBuild && $type!="build") { 
					if (false!==strpos($line,"[java] There was ") || false!==strpos($line,"[java] There were ")) { 
						preg_match("/(was|were) (\d+) (fail|error).+/",$line,$m);
						if ($m[3]=="fail") { 
							$fails+=$m[2];
						} else if ($m[3]=="error") { 
							$errors+=$m[2];
						}
					} else if (false!==strpos($line,"BUILD FAILED")) {
						$fails="FAILED";
						$isDone=true;
						break;
					}
				}
				if (false!==strpos($line,"finished on:")) {
					$isDone=true;
				}
			}

			if (!$isDone) { 
				return "...";
			}
			//w("<b>$fails F, $errors E</b>",1);
			if ($fails===0 && $errors===0 && $notes===0 && $warns===0) { 
				return 0;
			} else {
				$ret="";
				if ($fails>0 && $fails!=="FAILED") { 
					$ret.= $fails."&nbsp;F";
				}
				if ($errors>0) { 
					if ($ret) { $ret.=",&nbsp;"; }
					$ret.= $errors."&nbsp;E";
				}
				if ($notes>0) { 
					if ($ret) { $ret.=",&nbsp;"; }
					$ret.= $notes."&nbsp;N";
				}
				if ($warns>0) { 
					if ($ret) { $ret.=",&nbsp;"; }
					$ret.= $warns."&nbsp;W";
				}
				if (!$ret && $fails==="FAILED") { 
					$ret = "FAILED";
				}
				//echo $ret."<br>";
				return $ret;
			}
		} else {
			return "";
		}
	}

	function getJDK13TestResultsFailureCount($f,$type="") {
		$fails=0;
		$errors=0;
		$notes=0;
		$isBuild=true;
		$isDone=false;
		if ($f && sizeof($f)>0) {
			foreach ($f as $line) { 
				// check first half of the log for build problems; second half for test problems. 
				// split on line with "runJUnitTests:"
				if (false!==strpos($line,"runJUnitTests:")) { // second half
					$isBuild=false;
				}
				if ($isBuild && $type=="build") {
					if (false!==strpos($line,"[javac]") && false!==strpos($line,"error")) { 
						preg_match("/\[javac\] (\d+) (fail|error).+/",$line,$m);
						if ($m[2]=="fail") { 
							$fails+=$m[1];
						} else if ($m[2]=="error") { 
							$errors+=$m[1];
						}
					} else if (false!==strpos($line,"[javac]") && false!==strpos($line,"deprecate")) { 
						$notes+=1;
					} else if (false!==strpos($line,"BUILD FAILED")) {
						$fails="FAILED";
						$isDone=true;
						break;
					}
				} else if (!$isBuild && $type!="build") { 
					if (false!==strpos($line,"[java] There was ") || false!==strpos($line,"[java] There were ")) { 
						preg_match("/(was|were) (\d+) (fail|error).+/",$line,$m);
						if ($m[3]=="fail") { 
							$fails+=$m[2];
						} else if ($m[3]=="error") { 
							$errors+=$m[2];
						}
					} else if (false!==strpos($line,"BUILD FAILED")) {
						$fails="FAILED";
						$isDone=true;
						break;
					}
				}
				if (false!==strpos($line,"finished on:")) {
					$isDone=true;
				}
			}

			if (!$isDone) { 
				return "...";
			}
			//w("<b>$fails F, $errors E</b>",1);
			if ($fails===0 && $errors===0 && $notes===0) { 
				return 0;
			} else {
				$ret="";
				if ($fails>0 && $fails!=="FAILED") { 
					$ret.= $fails."&nbsp;F";
				}
				if ($errors>0) { 
					if ($ret) { $ret.=",&nbsp;"; }
					$ret.= $errors."&nbsp;E";
				}
				if ($notes>0) { 
					if ($ret) { $ret.=",&nbsp;"; }
					$ret.= $notes."&nbsp;N";
				}
				if (!$ret && $fails==="FAILED") { 
					$ret = "FAILED";
				}
				//echo $ret."<br>";
				return $ret;
			}
		} else {
			return "";
		}
	}

	function getTestResultsFailureCount($path,$testDirs,$file) {
		$fails=0;
		$file = $path.$testDirs[0]."/".$file;
		if (is_file($file) && is_readable($file)) { 
			$f = file($file);
			foreach ($f as $line) { 
				if (strstr($line,">failed<")) { 
					$fails++;
				}
			}
			//w("<b>$fails</b>",1);
			return $fails;
		} else {
			return "";
		}
	}

	function getBranches($options) { 
		$arr = array();
		if ($options["Branch"] && is_array($options["Branch"])) {
			foreach ($options["Branch"] as $br => $branch) { 
					$arr[	getValueFromOptionsString($branch,"name")] = 
							getValueFromOptionsString($branch,"value");
			}
		}
		return $arr;
	}

	function getBuildTypes($options) { 
		$arr = array();
		if ($options["Branch"] && is_array($options["Branch"])) {
			foreach ($options["Branch"] as $br => $branch) { 
				foreach ($options["BuildType"] as $bt => $buildType) { 
					$v = getValueFromOptionsString($branch,"value");
					if (!array_key_exists($v,$arr) || !$arr[$v]) { 
						$arr[$v] = array();
					}
					$arr
						[$v]				// [2.0]
						[getValueFromOptionsString($buildType,"value")] =		// [N]
							$v. " " . 
							getValueFromOptionsString($buildType,"name") . " Build";
				}
			}
		}
		//wArr($arr);
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

	function listOptions($options,$bool) {
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
				preg_match("/([^\=]+)\=([^\=]*)/",$opt,$matches);
				if (!$bool) { 
					echo trim($matches[2]);
				} else { 
					echo trim($matches[1]);
				}
			} else { // turn foo into <option value="foo">foo</option>
				echo $opt;
			}
			echo "<br />";
		}
	}

	function loadOptionsFromFile($file) { 
		ini_set("display_errors","0"); // suppress file not found errors
		$sp = file($file);
		ini_set("display_errors","1"); // and turn 'em back on.
		if (!$sp) { $sp = array();	}
		$options = loadOptionsFromArray($sp);
		return $options;
	}

	function loadOptionsFromArray($sp) {
		global $debug;
		$options = array();
		//$debug=1;
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
					if ($debug>1) echo "Section: $s --> $doSection<br>";

					$options[$doSection] = array();
					if ($isReversed) { $options[$doSection]["reversed"] = $isReversed; }
				}
			} else if (!preg_match("/\[([a-zA-Z\_]+)\]/",$s,$matches)) { 
				if (strlen($s)>2) { 
					if ($debug>1) echo "Loading: $s<br>";
					$options[$doSection][] = trim($s);
				}
			}
		}

		return $options;
	}

	function getLatest($builds) { 
		// given a list of dirs, determine the most recent ones by date/time sequence 
		$latest = array();
		foreach ($builds as $branch => $builds2) {
			foreach ($builds2 as $type => $builds3) {
				arsort($builds3); reset($builds3);
				foreach ($builds3 as $k => $build) {
					if (!array_key_exists($branch,$latest) || !$latest[$branch]) { $latest[$branch] = array(); } //l[2.0]
					if (!array_key_exists($type,$latest[$branch]) || !$latest[$branch][$type]) { // found the first one
						$latest[$branch][$type] = $build;
						//w('latest['.$branch.']['.$type."] = $build",1);
						break 1;
					}
				}
			}
		}

		return $latest;
	}

	function IDtoDateStamp($ID,$style) { // given N200402121441, return date("D, j M Y -- H:i (O)")
		if ($ID && !preg_match("/\_/",$ID)) { 
			 $year = substr($ID, 1, 4);
			 $month = substr($ID, 5, 2);
			 $day = substr($ID, 7, 2);
			 $hour = substr($ID,9,2);
			 $minute = substr($ID,11,2);
			 $timeStamp = mktime($hour, $minute, 0, $month, $day, $year);
			 return date( ($style?"D, j M Y -- H:i (O)":'Y/m/d H:i'), $timeStamp);
		} else if ($ID && preg_match("/\_/",$ID)) { 
			 $year = substr($ID, 0, 4);
			 $month = substr($ID, 4, 2);
			 $day = substr($ID, 6, 2);
			 $hour = substr($ID,9,2);
			 $minute = substr($ID,11,2);
			 $timeStamp = mktime($hour, $minute, 0, $month, $day, $year);
			 return date( ($style?"D, j M Y -- H:i (O)":'Y/m/d H:i'), $timeStamp);
		} else { 
			return "";
		}
	}

	function createFileLinks($dls,$PWD,$branch,$ID,$pre2,$filePre,$ziplabel="") { // the new way - use a ziplabel pregen'd from a dir list!
		$uu=0;
		$echo_out="";

		if (!$ziplabel) { 
			$zips_in_folder = loadDirSimple("$PWD/$branch/$ID/","(\.zip)","f"); //wArr($zips_in_folder);
			// for testing, you can find a list of files like this:
			// `find /home/www-data/emf-build/tools/emf/downloads/drops/2.0.1 -type f -maxdepth 2 -name *.zip -name *emf-sdo-xsd-SDK*`

			$ziplabel = preg_replace("/(.+)\-([^\-]+)(\.zip)/","$2",$zips_in_folder[0]); // grab first entry
		}

		//echo "for $PWD/$branch/$ID/<b>".$zips_in_folder[0]."</b>, zip label is: <b>$ziplabel</b><br>";

		ini_set("display_errors","0"); // suppress errors
		foreach ($dls as $label => $u) {
			$echo_out .= "<td nowrap align=\"center\"";
			if ($u) { $u="-$u"; } // for compatibilty with uml2, where there's no "RT" value in $u
			if (is_file("$PWD/$branch/$ID/".$pre2.$filePre[$uu]."$u-$ziplabel.zip")) { // for compatibilty with uml2, where there's no "RT" value in $u
				$echo_out .= ">".fileFound("$PWD/","$branch/$ID/".$pre2.$filePre[$uu]."$u-$ziplabel.zip", // again, for uml2
						(strpos($label,$filePre[$uu])===0?$label:$filePre[$uu]." ".$label) );
			} else {
				$echo_out .= " bgcolor=\"#F0F0F0\">".fileNotFound(0);
			}
			$echo_out .= "</td>\n";
			$uu++;
		}
		ini_set("display_errors","0"); // suppress errors
		return $echo_out;
	}				

	function showBuildResults($PWD,$path) { // given path to /../downloads/drops/M200402021234/
		global $pre, $CVSpreEMF;
		$mid = "../"."../../tools/emf/"."downloads/drops/"; // this is a symlink on the filesystem!

		$warnings = 0;
		$errors = 0;
		$problems = 0;

		$result = "";
		$icon = "";

		$indexHTML = "";
		$testResultsPHP = "";
		$logfile = "";

		$link = "";
		$link2 = "";
		
		ini_set("display_errors","0"); // suppress errors
//		if (exist index.html in proper build dir) { 
		if (is_file($PWD.$path."index.html")) {
			$indexHTML = file($PWD.$path."index.html");
			$zips = loadDirSimple($PWD.$path,".zip","f"); // get files count
			$md5s = loadDirSimple($PWD.$path,".zip.md5","f"); // get files count
//			if (all zips exist) { 
			if (
					(sizeof($zips)==7  && sizeof($md5s)==7)				// new as of 04/22
				) {
				if (is_file($PWD.$path."buildlog.txt") && filesize($PWD.$path."buildlog.txt")<(3*1024*1024) ) { // if the log's too big, don't open it!
					$logfile = file($PWD.$path."buildlog.txt");
					foreach ($logfile as $lf) {
//						if (build log contains "BUILD FAILED") {
						if (strstr($lf,"BUILD FAILED")) {
//							display failed icon
							$icon = "not";
							$result = "FAILED"; // BUILD 
							break;
						}
					}
				}
//				check testResults.php for results
				if (is_file($PWD.$path."testResults.php")) {
					$testResultsPHP = file($PWD.$path."testResults.php");
					$link2 = $pre.$mid.$path."testResults.php";
					foreach ($testResultsPHP as $tr) {
						if (preg_match("/\<td\>(\d*)\<\/td\>\<td\>(\d*)\<\/td\>\<\/tr\>/",$tr)) {
							$rows = explode("<tr>",$tr); // break into pieces
							foreach ($rows as $r => $row) { 
								if (preg_match("/\<td\>(\d*)\<\/td\>\<td\>(\d*)\<\/td\>\<\/tr\>/",$row,$m)) {
									$errors   += $m[1];
									$warnings += $m[2];
								}
							}
							$problems = $warnings + $errors;
						}
					}
				}
//				if (errors found in testResults) { 
				if ($errors) { 
//					display failed icon
					$icon = "not";
					$result = "COMPILER ERROR";
//				} else if (warnings found in testResults) { 
				} else if ($warnings) { 
//					display check-maybe icon
					$icon = "check-maybe";
					$result = "";
//				} else if (no errors or warnings found in testResults) { 
				} else if (!$warnings && !$errors) { 
//					display check icon
					$icon = "check";
					$result = "";
				}

//				parse out the check/fail icons in index.html, if we haven't failed already
				if ($icon != "not") { 
					$link = "".$pre."downloads-viewer.php?s=".$path;
					$isAutomatedTestsSection=0;
					foreach ($indexHTML as $ih) { 
						if (strstr($ih,"<font size=\"-1\" color=\"#FF0000\">skipped</font>")) {
							$icon="check-maybe";
							$result="Skipped";
							break;
						} else if (strstr($ih,"<!-- Automated Tests -->")) { 
							$isAutomatedTestsSection=1;
						} else if (strstr($ih,"<!-- Examples -->")) { 
							$isAutomatedTestsSection=0;
						} else if ($isAutomatedTestsSection && strstr($ih,"FAIL.gif")) { 
							// if fail found for tests, display check-tests-failed icon
							$result = "TESTS FAILED";
							// change status only if we have no status or we've passed so far
							$icon = ($icon=="check"||!$icon)?"check-tests-failed":$icon; 
							$isAutomatedTestsSection=0;
						} else if (!$isAutomatedTestsSection && strstr($ih,"FAIL.gif")) {
							// if fail found for anything bt test, diplay fail icon
							$result = "FAILED"; // COMPILE 
							$icon = "not";
							break;
						}
					}
				}
//			} else if (not all zips exist) { 
			} else if (
					(sizeof($zips)==7  && sizeof($md5s)==7)				// new as of 04/22
				) { } else {
				if (is_file($PWD.$path."buildlog.txt") && filesize($PWD.$path."buildlog.txt")<(3*1024*1024) ) {
					$logfile = file($PWD.$path."buildlog.txt");
					foreach ($logfile as $lf) {
//						if (build log contains "BUILD FAILED") {
						if (strstr($lf,"BUILD FAILED")) {
//							display failed icon
							$icon = "not";
							$result = "FAILED"; // BUILD 
							break;
						}
					}
				}

//				parse out the check/fail icons in index.html, if we haven't failed already
				if ($icon != "not") { 
					$link = "".$pre."downloads-viewer.php?s=".$path;
					$isAutomatedTestsSection=0;
					foreach ($indexHTML as $ih) { 
						if (strstr($ih,"<!-- Automated Tests -->")) { 
							$isAutomatedTestsSection=1;
						} else if (strstr($ih,"<!-- Examples -->")) { 
							$isAutomatedTestsSection=0;
						} else if ($isAutomatedTestsSection && strstr($ih,"FAIL.gif")) { 
							// if fail found for tests, display check-tests-failed icon
							$result = "TESTS FAILED";
							// change status only if we have no status or we've passed so far
							$icon = ($icon=="check"||!$icon)?"check-tests-failed":$icon; 
							$isAutomatedTestsSection=0;
						} else if (!$isAutomatedTestsSection && strstr($ih,"FAIL.gif")) {
							// if fail found for anything bt test, diplay fail icon
							$result = "FAILED"; // COMPILE 
							$icon = "not";
							break;
						}
					}
				}
				if (!$icon)  {
//					display in progress icon & link to log
					$result = "In progress...";
					$icon = "question";
				}
			}
		} else { // if (index.html not exist) {
			if (is_file($PWD.$path."buildlog.txt") && filesize($PWD.$path."buildlog.txt")<(3*1024*1024) ) {
				$logfile = file($PWD.$path."buildlog.txt");
				foreach ($logfile as $lf) {
//						if (build log contains "BUILD FAILED") {
					if (strstr($lf,"BUILD FAILED")) {
//						display failed icon
						$icon = "not";
						$result = "FAILED"; // BUILD 
						break;
					}
				}
			}

			if (!$icon)  {
//				display in progress icon & link to log
				$result = "In progress...";
				$icon = "question";
			}
		}

		global $doRefreshPage;
		if ($icon=="question" && is_file($PWD.$path."buildlog.txt") && filesize($PWD.$path."buildlog.txt")<(3*1024*1024) ) { 
			/*w(
				strtotime("now")." [".date("Ymd, H:i:s")."] -".
				filemtime($PWD.$path."buildlog.txt")." [".date("Ymd, H:i:s",filemtime($PWD.$path."buildlog.txt"))."] =".
				(strtotime("now")-filemtime($PWD.$path."buildlog.txt")),1);*/
			if (!$logfile) { 
				$logfile = file($PWD.$path."buildlog.txt");
			}

			foreach ($logfile as $lf) {
				if (strstr($lf,"[start] start.sh finished on: ")) {
				//	display failed icon - not in progress anymore!
					$icon = "not";
					$result = "FAILED"; // BUILD 
					break;
				}
			}

			if ($result != "FAILED" && strtotime("now")-filemtime($PWD.$path."buildlog.txt")<3600) { 
				$doRefreshPage = true; 
			} else {
				//$result.=strtotime("now").",".filemtime($path."buildlog.txt");
				$mightHavePassed = 0;
				foreach ($logfile as $lf) {
					if (strstr($lf,"BUILD SUCCESSFUL")) {
						$mightHavePassed = 1;
					}
					if (strstr($lf,"BUILD FAILED")) {
//						display failed icon
						$icon = "not";
						$result = "FAILED"; // BUILD 
						break;
					} else if (strstr($lf,"[start] start.sh finished on: ")) {
//						display failed icon
						$icon = "not";
						$result = "FAILED"; // BUILD 
						break;
					}
				}
				if ($result != "FAILED" && $mightHavePassed) { 
					$result = "Stalled!";
					$icon = "check-maybe";
				} else if ($result != "FAILED" && !$mightHavePassed) { 
					$result = "FAILED";
					$icon = "not";
				}
			}
		}

		// return a string with icon, result, and counts (if applic)
		global $SERVER_NAME;
		if (false!==strpos($link,"buildlog.txt") && strstr($SERVER_NAME,"emf.torolab.ibm.com")) {
			$link = "/emf/log-viewer.php?build=$path"; 
		} else if (!$link) {	
			$link = $pre.$mid.$path."buildlog.txt"; 
		}
		if (!$link2) { $link2 = is_file($PWD.$path."testResults.php") ? $pre.$mid.$path."testResults.php" : $link; }

		$out = "";

		$out .= "<a href=\"".$link."\"><img src=\"".$CVSpreEMF."images/".$icon.".gif\" border=0></a>";

		// log file link
		$out .= (is_file($PWD.$path."buildlog.txt")?("&nbsp;<a href=\"".(strstr($SERVER_NAME,"emf.torolab.ibm.com")?"/emf/log-viewer.php?build=$path":$pre.$mid.$path."buildlog.txt")."\" class=\"buildlog\"><span class=\"buildlog\">log</span></a>"):"");

		$out .= "&nbsp;</td>";

		$out .= "<td><a href=\"".$link2."\" class=\"";
		$out .= $icon=="question"?
			"inprogress":
			($errors||$icon=="not"?
				"errors":
				($warnings||$result=="Skipped"?"warnings":"success")
			);
		$out .= "\"><span class=\"";
		$out .= $icon=="question"?
			"inprogress":
			($errors||$icon=="not"?
				"errors":
				($warnings||$result=="Skipped"?"warnings":"success")
			);
		$out .= "\">". $result;
		$out .= ($errors==0&&$warnings==0) && !$result ? "Success" : "";
		$out .= ($errors>0||$warnings>0) && $result ? ": " : "";
		$out .= $errors>0 ? "$errors E, $warnings W" : //"$problems P ($errors E, $warnings W)"
					($warnings>0 ? "$warnings W" : "");
		$out .= "</span></a>";

		ini_set("display_errors","1"); // suppress errors
		return $out;
	}

	function fileNotFound($bool) { 
		global $CVSpreEMF;
		return $bool?"<center><img src=\"'.$CVSpreEMF.'images/not.gif\" border=0 alt=\"File not found\"></center>":"";
	}
	function fileFound($PWD,$url,$label) { 
		global $pre, $CVSpreEMF;
		$mid = "../"."../../tools/emf/"."downloads/drops/"; // point at the tools/emf folder, not technology/xsd folder; this is a symlink on the filesystem!
		$suf = substr($label,0,11);
		if (strstr($label,"emf-sdo-xsd")){
			$suf = "all";
		} else if (strstr($label,"emf-sdo") || strstr($label,"emf")){
			$suf = "emf-sdo";
		} else if (strstr($label,"xsd")){
			$suf = "xsd";
		}
		return "<nobr><a href=\"download.php?dropFile=". urlencode($pre.$mid.$url) . "\"><img src=\"".$CVSpreEMF."images/dl-".$suf.".gif\" border=0 alt=\"Click to download ".$label."\"></a>".(is_file($PWD.$url.".md5")?"<a href=\"". $pre.$mid.$url . ".md5\"><img src=\"".$CVSpreEMF."images/MD5.gif\" border=0 alt=\"Click to download ".$label." MD5\"></a></nobr>":"");
	}

function doLegend() { 
	global $SERVER_NAME, $pre, $CVSpreEMF; ?>
	<table bgcolor="#FFFFFF">
		<tr><td colspan=5><b>Icon Legend</b></td></tr>
		<tr>
			<td bgcolor="#ffffff" align=center><img src="<?php echo $CVSpreEMF; ?>images/dl-emf-sdo.gif" width="18" height="20" border="0" alt="EMF Package"></td><td><small>Combined EMF & SDO Package</small></td>
			<td>&nbsp;</td>
			<td bgcolor="#ffffff" valign=top align=center><img src="<?php echo $CVSpreEMF; ?>images/check.gif" width="16" height="12" border="0" alt="Build successful"></td><td><small>Success!</small></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff" align=center><img src="<?php echo $CVSpreEMF; ?>images/dl-xsd.gif" width="18" height="20" border="0" alt="XSD Package"></td><td><small>XSD Package</small></td>
			<td>&nbsp;</td>
			<td bgcolor="#ffffff" valign=top align=center><img src="<?php echo $CVSpreEMF; ?>images/not.gif" width="16" height="12" border="0" alt="Build failed"></td><td><small>Failed</small></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff" valign=top align=center><img src="<?php echo $CVSpreEMF; ?>images/dl-all.gif" width="18" height="20" border="0" alt="Combined EMF, XSD, SDO package"></td><td><small>Combined EMF, XSD, SDO package</small></td>
			<td>&nbsp;</td>
			<td bgcolor="#ffffff" align=center><small class="errors"><u>18&nbsp;E</u></small></td><td><small>Errors</small></td>
		</tr>
		<tr>
			<td bgcolor="#ffffff" align=center align=center><img src="<?php echo $CVSpreEMF; ?>images/MD5.gif" width="12" height="20" border="0" alt="MD5 signature"></td><td><small>MD5 signature</small></td>
			<td>&nbsp;</td>
			<td bgcolor="#ffffff" align=center><small class="buildlog"><u>log</u></small></td><td><small>Build Log</small></td>
		</tr>
	</table>
<?php 
} 

function doCSSAndJS() { ?>
<style>
	.inprogress {
		font-size: 10px; color: navy; font-weight: bold;
	}
	.buildlog {
		font-size: 10px; color: purple; font-weight: bold;
	}
	.warnings {
		font-size: 10px; color: orange; font-weight: bold;
	}
	.errors {
		font-size: 10px; color: red; font-weight: bold;
	}
	.success {
		font-size: 10px; color: #009933; font-weight: bold;
	}
	.header {
		font-size: 14px; color: #0080C0; font-weight: bold;
	}
	a.bluebartext, .bluebartext {
		font-size:12px; font-weight: bold; color: #FFFFFF;
	}
	a.bluebartext:hover,a.indexsub:hover {
		text-decoration: none;
	}
</style>
<script language="javascript" src="includes/popup.js"></script>
<?php } ?>
<?php function doDownloadInstructions() { 
	global $pageTitle, $pre, $CVSpreEMF; ?>
<p align=center><TABLE CELLPADDING=0 CELLSPACING=0 align=center BORDER=0 BGCOLOR="#EEEEEE" width="95%"><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="<?php echo $CVSpreEMF; ?>images/outlines/L2R.gif"><a name="install-instructions"><IMG BORDER=0 SRC="<?php echo $CVSpreEMF; ?>images/c.gif" WIDTH=1 HEIGHT=1></a></TD></TR><TR><TD WIDTH=1 BGCOLOR="#000000" BACKGROUND="<?php echo $CVSpreEMF; ?>images/outlines/D2U.gif"><IMG BORDER=0 SRC="<?php echo $CVSpreEMF; ?>images/c.gif" WIDTH=1 HEIGHT=1></TD><TD><TABLE CELLPADDING=0 CELLSPACING=0 BORDER=0><TR><TD>



	<table cellspacing=0 cellpadding=5>
		<tr valign=top bgcolor="#EEEEEE">
		<td colspan=2>
			<b class="header">Download & Installation Requirements - </b><b style="color:#ff4444">PLEASE READ!</b>
		</td>
		</tr>
		<tr valign=top bgcolor="#FFFFFF">
		<td><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/newhov_obj.gif"></td>
		<td><b>First-time users</b> can get started quickly by simply downloading the combined <b style="color:#B51464">ALL</b> SDK bundle (includes Source, Runtime and Docs for <b style="color:#BF5FBF">EMF</b>, <b style="color:#18187D">XSD</b>, and <b style="color:#C7568E">SDO</b>). <a href="downloads-build-types.php">What Build Type do I want?</a>
		<br/><br/>
		If you are not located in Canada, or you find this site is slow, please choose an <a href="../../../tools/emf/scripts/mirrors.php">EMF/SDO/XSD mirror site</a> closer to you.
		
		</td>
		</tr>
		<tr valign=top bgcolor="#EEEEEE">
		<td><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/featureshov_obj.gif"></td>
		<td>
			EMF, SDO, and XSD 2.0.0 require <a href="http://eclipse.org/downloads/" target="_eclipse">Eclipse 3.0</a> and <b>JDK 1.4</b>.<br><br>Older builds of EMF 2.0 may require earlier builds of Eclipse 3.0 - to see or download the Eclipse build used for a particular package, click the link under <b>Build Name</b> and check the <b>Requirements</b> section. If you require <i><b>older EMF or XSD downloads</b></i>, including 1.x releases, go here:
				<i><a href="http://dev.eclipse.org/viewcvs/indextools.cgi/~checkout~/emf-home/downloads/dl.html">EMF</a></i> & <i><a href="http://dev.eclipse.org/viewcvs/indextech.cgi/~checkout~/xsd-home/downloads/dl.html">XSD</a></i>.</td>
		</tr>
		<tr valign=top bgcolor="#FFFFFF">
		<td><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/NLpack.gif"></td>
		<td>
			<table><tr>
				<td colspan=3 align=center><b style="color:#BF5FBF;">EMF&amp;SDO</b></td>
				<td rowspan="8">
				<?php 
			if (strtotime("Sept 24, 2004")>strtotime("-3 weeks")) { 
			echo '<b>Sept&nbsp;24<sup>th</sup></b> &nbsp;-&nbsp; <img src="http://www.eclipse.org/images/new.gif" width="31" height="14">';
			} ?> IBM has contributed <a name="NLS">translations</a> of the Eclipse Tool Project EMF (including SDO) &amp; the Eclipse Technology Project XSD.<br/><br/>
				The language pack is distributed as a feature which you can install by downloading the zip file, unzipping it into your Eclipse directory and restarting Eclipse. This language pack contains translations for German, Spanish, French, Italian, Japanese, Korean, Portuguese (Brazil), Traditional Chinese and Simplified Chinese. <br/><br/>
				These translations are based on the EMF, SDO and XSD 2.0.0 builds but should work with all subsequent 2.0 maintenance releases. If new strings are added to EMF, SDO or XSD after 2.0.0, they will not show up as translated in the 2.0.x stream when you install this language pack.<br><br>
				Click the links at left to download the appropriate NL pack(s) you require.
				</td>
			</tr>
			<tr>
				<td colspan=3 align=center><img src="<?php echo $CVSpreEMF; ?>images/brace60.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b>SDK</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b>RT</b><a href="#emfruntimenote" style="text-decoration:none;"><b style="color:#BF5FBF;">*</b></a></td>
			 </tr>
			<tr><td><a href="download.php?dropFile=../../../tools/emf/downloads/drops/NLpack-emf-sdo-SDK-2.0.0.zip"><img src="<?php echo $CVSpreEMF; ?>/images/dl-emf-sdo.gif" border=0 alt="EMF/SDO 2.0.0 SDK NLS pack"></a></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				<td><a href="download.php?dropFile=../../../tools/emf/downloads/drops/NLpack-emf-sdo-runtime-2.0.0.zip"><img src="<?php echo $CVSpreEMF; ?>/images/dl-emf-sdo.gif" border=0 alt="EMF/SDO 2.0.0 Runtime NLS pack"></a></td>
			</tr>
			 <tr>
				<td colspan=3 align=center><b style="color:#18187D;">XSD</b></td>
			 </tr>
			<tr>
				<td colspan=3 align=center><img src="<?php echo $CVSpreEMF; ?>images/brace60.gif"></td>
			 </tr>
			 <tr align=center>
				 <td width=30><b>SDK</b></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				 <td width=30><b>RT</b><a href="#xsdruntimenote" style="text-decoration:none;"><b style="color:#18187D;">*</b></a></td>
			 </tr>
			<tr>
				<td><a href="download.php?dropFile=../../../tools/emf/downloads/drops/NLpack-xsd-SDK-2.0.0.zip"><img src="<?php echo $CVSpreEMF; ?>/images/dl-xsd.gif" border=0 alt="XSD 2.0.0 SDK NLS pack"></a></td>
					<td><span style="font-size:2px">&nbsp;</span></td>
				<td><a href="download.php?dropFile=../../../tools/emf/downloads/drops/NLpack-xsd-runtime-2.0.0.zip"><img src="<?php echo $CVSpreEMF; ?>/images/dl-xsd.gif" border=0 alt="XSD 2.0.0 Runtime NLS pack"></a></td>
			</tr>
			</table>
		</td>
		</tr>
		<tr valign=top bgcolor="#EEEEEE">
		<td><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/rcpapphov_obj.gif"></td>
		<td><b><a style="background-color:yellow;color:black" href="javascript:void(popWin('../../../tools/emf/scripts/downloads-xerces.php',770,500))">Click here if you load or import model(s) from XML Schema.</a></b> 
				<br>The Crimson DOM implementation in (some versions of) the Sun JDK has a bug in the implementation of 
				<tt>hasAttributeNS</tt>. To resolve this, <a href="javascript:void(popWin('../../../tools/emf/scripts/downloads-xerces.php',770,500))">click here for details</a>. This bug can be seen, <i>when importing a model from XML Schema</i>, as either:
					<ul>
					<li>a null pointer exception, or
					<li>the error message "Specify a valid XML Schema and try loading again".
					</ul>
				</span>
		</td>
		</tr>
<!--		<tr valign=top bgcolor="#EEEEEE">
		<td><img src="<?php echo $CVSpreEMF; ?>images/eclipse-icons/featureshov_obj.gif"></td>
		<td>
			<b>May&nbsp;20<sup>th</sup></b> &nbsp;-&nbsp; <?php 
			if (strtotime("May 20, 2004")>strtotime("-3 weeks")) { 
			echo '<img src="http://www.eclipse.org/images/new.gif" width="31" height="14">';
			} ?>
		As of <b>Build I200405200923</b>, <a href="http://download2.eclipse.org/downloads/drops/I-I20040520-200405200800/index.php" target="_eclipse">Eclipse 3.0 I200405200010, M9, or later</a> 
					is required. Prior builds of EMF 2.0 require <a href="http://download2.eclipse.org/downloads/drops/S-3.0M8-200403261517/index.php" target="_eclipse">Eclipse 3.0M8</a> or later. To see (or download) the build of Eclipse that was used to build a particular EMF, SDO, or XSD package, click the link under <b>Build Name</b> and check the <b>Requirements</b> section. EMF and XSD 2.0 require <b>JDK 1.4</b> (as does Eclipse 3.0).</td>
		</tr>
<?php if (strtotime("May 20, 2004")>strtotime("-6 weeks")) { 
		echo '
		<tr valign=top BGCOLOR="#EEEEEE">
		<td><img src="'.$CVSpreEMF.'images/eclipse-icons/pluginhov_obj.gif"></td>
		<td><b>May&nbsp;20<sup>th</sup></b> &nbsp;-&nbsp; ';
			if (strtotime("May 20, 2004")>strtotime("-3 weeks")) { 
			echo '<img src="http://www.eclipse.org/images/new.gif" width="31" height="14">';
			}
			echo '
	<a href="https://bugs.eclipse.org/bugs/show_bug.cgi?id=62422">In order to support Rich Client Platform</a>, the <tt>org.eclipse.emf.edit.ui</tt> plugin now optionally requires <tt>org.eclipse.core.resources</tt> and <tt>org.eclipse.ui.ide</tt> and <b style="background-color:yellow;color:black">no longer exports these imports</b>.  As a result, any exisiting .editor project\'s <tt>plugin.xml</tt> must be updated to explicitly specify these two required plugins. <br>See <a href="http://dev.eclipse.org/viewcvs/indextools.cgi/~checkout~/org.eclipse.emf/plugins/org.eclipse.emf.ecore.editor/plugin.xml"><tt>org.eclipse.emf.ecore.editor/plugin.xml</tt></a> for how it should look.
		</td>
		</tr>
			';
	} ?>
<?php if (strtotime("May 20, 2004")>strtotime("-6 weeks")) { 
		echo '
		<tr valign=top bgcolor="#FFFFFF">
		<td><img src="'.$CVSpreEMF.'images/eclipse-icons/javadevhov_obj.gif"></td>
		<td><b>May&nbsp;20<sup>th</sup></b> &nbsp;-&nbsp; ';
			if (strtotime("May 20, 2004")>strtotime("-3 weeks")) { 
			echo '<img src="http://www.eclipse.org/images/new.gif" width="31" height="14">';
			}
			echo '
			Runtime bundles no longer contain docs. See SDK bundles for Runtime, Source, and docs. <a href="docs.php#references">Javadocs</a> are still available online, updated with every new build.';
				echo '
			<br><b>April&nbsp;28<sup>th</sup></b> &nbsp;-&nbsp; To better meet the needs of our users, EMF & SDO have been combined into one Runtime and one SDK packages, instead of two of each. XSD packages are still available separately.';
		echo '
		</td>
		</tr>
			';
		}
?> -->
	</table>
	
</TD></TR></TABLE></TD><TD WIDTH=1 BGCOLOR='#000000' BACKGROUND="<?php echo $CVSpreEMF; ?>images/outlines/U2D.gif"><IMG BORDER=0 SRC="<?php echo $CVSpreEMF; ?>images/c.gif" WIDTH=1 HEIGHT=1></TD></TR><TR><TD COLSPAN=3 BGCOLOR="#000000" HEIGHT=1 BACKGROUND="<?php echo $CVSpreEMF; ?>images/outlines/R2L.gif"><IMG BORDER=0 SRC="<?php echo $CVSpreEMF; ?>images/c.gif" WIDTH=1 HEIGHT=1></TD></TR></TABLE></p>
<?php } ?>

<?php function requirementsNote() { ?>
<!-- requirements note -->
<table><tr><td>
<b style="color:#BF5FBF;">*</b><a name="emfruntimenote">&nbsp;</a><i><b>Please note:</b></i> Use of XSD requires the EMF Runtime (RT) Package, or the complete SDK. <br>
<b style="color:#18187D;">*</b><a name="xsdruntimenote">&nbsp;</a><i><b>Please note:</b></i> Use of XML Schema (XSD) models with EMF or SDO, requires the XSD Runtime (RT) Package, or the complete SDK.  <br>
</td></tr></table>
<?php } ?>