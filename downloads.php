<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF, XSD, SDO - Download an EMF, SDO or XSD Build";
		$ProjectName = array(
			"EMF, SDO, XSD",
			'Eclipse Modeling Framework, including SDO & XSD',
			'Downloading EMF, SDO & XSD',
			""
			);

			$pageTitle = 'Latest Downloads';
			
			$filePre = array ( // file prefixes - also defines the DL image to use, and image alt tag
				"emf-sdo-xsd",	
				"emf-sdo",			
				"emf-sdo",			
				"xsd",			
				"xsd",			
				"emf-sdo-xsd",	
				"emf-sdo-xsd"	
			);

			$dls = array(
				"SDK (Runtime, Source, Docs)" => "SDK",
				"EMF & SDO SDK" => "SDK",
				"EMF & SDO Runtimes" => "runtime",
				"XSD SDK" => "SDK",
				"XSD Runtime" => "runtime",
				"Automated Tests" => "Automated-Tests",
				"Examples" => "Examples" 
			);

			$colSuf = "all";

		include $pre."includes/header.php";
		include $pre."downloads-common.php"; 
?>
<!-- $Id: downloads.php,v 1.2 2004/12/07 23:32:13 nickb Exp $ -->
