<?php 
$pre = "../"; 
require_once($_SERVER['DOCUMENT_ROOT'] . "/emf/includes/header.php"); 
internalUseOnly(); 

$build = $_GET["build"]; 
$test = $_GET["test"]; 
$jdk13test = $_GET["jdk13test"]; 
$jdk14test = $_GET["jdk14test"]; 
$jdk50test = $_GET["jdk50test"]; 

if (!$build && !$test && !$jdk13test && !$jdk14test && !$jdk50test) { 
	exit;
}

$head = $_GET["head"]; 
$tail = $_GET["tail"]; 

if ($build && false===strpos($build,"..")) { 
	$logfile = "/var/www/tools/emf/downloads/drops/".$build."buildlog.txt";
	if (is_file($logfile) && is_readable($logfile)) {
		$log = getFileHeadTail($logfile);
	} else {
		print $build."buildlog.txt not found.";
		exit;
	}
} else if ($test && false===strpos($test,"..")) { 
	if (is_file("/var/www/tools/emf/tests/".$test)) { 
		$logfile = "/var/www/tools/emf/tests/".$test;
	} else {
		$logfile = "/var/www/tools/emf/tests/".$test."testlog.txt";
	}
	if (is_file($logfile) && is_readable($logfile)) {
		$log = getFileHeadTail($logfile);
	} else {
		print $test."testlog.txt not found.";
		exit;
	}
} else if ($jdk13test && false===strpos($jdk13test,"..")) { 
	$logfile = "/var/www/tools/emf/jdk13tests/".$jdk13test."testlog.txt";
	if (is_file($logfile) && is_readable($logfile)) {
		$log = getFileHeadTail($logfile);
	} else {
		print $jdk13test."testlog.txt not found.";
		exit;
	}
} else if ($jdk14test && false===strpos($jdk14test,"..")) { 
	$logfile = "/var/www/tools/emf/jdk14tests/".$jdk14test."testlog.txt";
	if (is_file($logfile) && is_readable($logfile)) {
		$log = getFileHeadTail($logfile);
	} else {
		print $jdk14test."testlog.txt not found.";
		exit;
	}
} else if ($jdk50test && false===strpos($jdk50test,"..")) { 
	$logfile = "/var/www/tools/emf/jdk50tests/".$jdk50test."testlog.txt";
	if (is_file($logfile) && is_readable($logfile)) {
		$log = getFileHeadTail($logfile);
	} else {
		print $jdk50test."testlog.txt not found.";
		exit;
	}
}

$reps = array(
	"o.e.emf" => "org.eclipse.emf",
	"o.e.e.r.build" => "org.eclipse.emf.releng.build",
	"o.e.r" => "org.eclipse.releng"
);

$reps2 = array(
	"dd" => "/home/www-data/emf-build/tools/emf/downloads/drops",
	"tests" => "/home/www-data/tests/tools/emf/tests",
	"jdk13tests" => "/home/www-data/jdk13tests",
	"jdk14tests" => "/home/www-data/jdk14tests",
	"jdk50tests" => "/home/www-data/jdk50tests"
);

$viewAs = "<tt style=\"font-size:11px\">".
	"<a href=\"$PHP_SELF"."?".getQS()."&head=30\">head -30</a> | ".
	"<a href=\"$PHP_SELF"."?".getQS()."&tail=30\">tail -30</a> | ".
	"<a href=\"/tools/emf/".
	($jdk50test?"jdk50tests/".$jdk50test."test":
		($jdk14test?"jdk14tests/".$jdk14test."test":
			($jdk13test?"jdk13tests/".$jdk13test."test":
				($test?"tests/".$test."test":
					"downloads/drops/".$build."build"
				)
			)
		)
	).
	"log.txt\">view unformatted</a>".
	"</tt><br/><br/>\n";
print $viewAs;
print "\n";

$j=0;
if ($log && is_array($log))
{
	foreach ($log as $i => $line) { 
		foreach ($reps as $rep => $fnd) { 
			if (false!==strpos($line,$fnd)){
				$line = preg_replace("!".$fnd."!","<i>{<a href=\"#[".$fnd."]#\">$rep</a>}</i>",$line);
			}
		}
	
		foreach ($reps2 as $rep => $fnd) { 
			if (false!==strpos($line,$fnd)){
				$line = preg_replace("!".$fnd."!"," \ \n\t<i>{<a href=\"#[".$fnd."]#\">$rep</a>}</i>",$line);
			}
		}
	
		if (
				false!==strpos($line,"Fail") || false!==strpos($line,"fail") || false!==strpos($line,"FAIL") ||
				false!==strpos($line,"Warning") || false!==strpos($line,"warning") || 
				false!==strpos($line,"Error") || false!==strpos($line,"error") || 
				false!==strpos($line,"could not") || false!==strpos($line,"No such") ||
				false!==strpos($line,"cannot") || false!==strpos($line,"usage:")
			) { 
			$line = preg_replace("/(FAILURE|Failure|failure|fail|Fail|Error|error|Warning|warning|could not|No such|cannot|usage:)/","<b style=\"color:orange;background-color:black\">".strtoupper("$1")."</b>",$line);
		}
	
		if (false!==strpos($line,"BUILD FAILED")) { 
			$line = preg_replace("/(BUILD FAILED)/","<b style=\"color:red\">$1</b>",$line);
		}
	
		if (false!==strpos($line,"BUILD SUCCESSFUL")) { 
			$line = preg_replace("/(BUILD SUCCESSFUL)/","<b style=\"color:GREEN\">$1</b>",$line);
		}
	
		if (false!==strpos($line,"[cvs] U")) { 
		//} else if (false!==strpos($line,"getFromCVS:")) { 
		} else if (trim($line)=="") {
		} else {
			$j++;
			print "<table width=\"100%\"><tr bgcolor=\"#".($j%2==0?"EEEEEE":"FFFFFF")."\" valign=\"top\"><td><a name=\"line".str_pad($j,4,"0",STR_PAD_LEFT)."\"><tt style=\"font-size:12px\">[<i style=\"color:purple\">".str_pad($j,4,"0",STR_PAD_LEFT)."</i>]</tt></a></td><td width=\"100%\"><pre style=\"font-size:12px\">".wordwrap($line,90,"\n")."</pre></td></tr></table>\n";
		}
	}	
}
print "\n";
print $viewAs;

/**************************************************/

function getFileHeadTail($file) { 
	$log=null;
	global $head,$tail;
	if ($head) { 
		exec("head -".$head." $file",$log); return $log;
	} else if ($tail) { 
		exec("tail -".$tail." $file",$log); return $log;
	} else {
		return file($file);
	}
}

function getQS() {
	global $_GET;
	$string = "";
	foreach ($_GET as $k => $v) { 
		if ($k != "head" && $k != "tail") { 
			if ($string) { $string .= "&"; }
			$string .= $k."=".$v;
		}
	}
	return $string;
}

?>