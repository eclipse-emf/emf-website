<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF/XSD/SDO Builds".($s?" - Build $s Results":"");
		include $pre."includes/header.php" ?>

<?php 
		$PWD = getPWD("downloads/drops"); // see scripts.php

		$base = $pre."../downloads/drops/";
		$base2 = addcslashes($base,"\.\/"); //	echo "<i><b>".$base2."</b></i>";											// new 04/19
		$dlURL = "/tools/emf/scripts/download.php?viewer=true&dropFile=";													// new 04/19
		if ($s && is_file($PWD."/".$s."/index.html")) {
			$f = file($PWD."/".$s."/index.html"); 
				$pat = "/".preg_replace("/\./","\\\.",preg_replace("/\//","\\\/",$base.$s))."\/http/";
			foreach ($f as $line) {
				$line = preg_replace("/href\ *\=\ *\"/","href=\"".$base.$s."/",$line);
				$line = preg_replace("/src\ *\=\ *\"/","border=0 src=\"".$base.$s."/",$line);
				$line = preg_replace($pat,"http",$line);
				$line = preg_replace("/href\=\"".$base2."([^\"]+\.zip)\"/","href=\"$dlURL$base"."$1"."\"",$line); // new 04/19
				echo $line; 
			}
		} else {
			// no file or file not found
			echo "File $s not found!";
		}
?>

<?php include $pre."includes/footer.php" ?>

<!-- $Id: downloads-viewer.php,v 1.1 2004/12/07 22:03:03 nickb Exp $ -->
