<?php 
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

	$subprojs = array("EMF" => "emf","SDO" => "sdo","XSD" => "xsd");

  if ($isWWWserver) 
	{ 
  	ob_start();

		$PWD = "/home/data/httpd/download.eclipse.org/tools/emf/";
		$jdPWD = "/downloads/download.php?file=/tools/emf/";

		print '<div id="midcolumn">
<div class="homeitem3col">
<h3>Javadoc</h3>
<ul>
';
		foreach ($subprojs as $label => $subproj) {
				print '<li><b> '.$label.'</b>'."\n";
				$vers = loadDirSimple("$PWD$subproj/javadoc","","d"); rsort($vers); reset($vers);
				foreach ($vers as $ver) {
					print '<ul><li><a href="'.$jdPWD.$subproj.'/javadoc/'.$ver.'/">'.$subproj.' '.$ver.'</a></li></ul>'."\n";
				}
				print '</li>'."\n";
		}

  	print "</ul>\n";
  
  	print "</div></div>\n";
  	
  	$html = ob_get_contents();
  	ob_end_clean();
  	
  	$pageTitle = "EMF - Javadoc";
  	$pageKeywords = ""; 
  	$pageAuthor = "Nick Boldt";
  	
  	$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/downloads.css"/>' . "\n");
  	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
	}
	else
	{
		$PWD = "../../tools/emf/";
		
		// REDIRECT to latest version of javadoc for the specified path
  	if ($_SERVER["QUERY_STRING"]) 
  	{
  		// given       http://emf.torolab.ibm.com/tools/emf/xsd/javadoc?org/eclipse/xsd/package-summary.html#details
  		// or                    http://emf.torolab.ibm.com/emf/javadoc?org/eclipse/xsd/package-summary.html#details
  		// serve http://emf.torolab.ibm.com/tools/emf/xsd/javadoc/2.1.0/org/eclipse/xsd/package-summary.html#details (latest version)
  		
  		$subprojsR = array_reverse($subprojs,true);
  		foreach ($subprojsR as $label => $projct) {
  		  if (false!==strpos($_SERVER["QUERY_STRING"],$subproj)) {
    		  $vers = loadDirSimple($PWD . $projct . "/javadoc","(\d\.\d|\d\.\d\.\d+)","d");
    		  break;
    		}
      }  		
  		if (sizeof($vers)>0) { 
  			rsort($vers);
  			header("Location: ".$PWD. $projct . "/javadoc/" . $vers[0] . "/" . str_replace("//","/",str_replace("..","",$_SERVER["QUERY_STRING"])));
  		} else {
  			header("Location: http://www.eclipse.org/emf/javadoc/");
  		}
  		exit;
  	} 
	}
	
?>