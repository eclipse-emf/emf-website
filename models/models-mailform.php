<?php 

// check submitted data, then write back to browser that it's all good.

$debug=0;
$sendMail=1;

$fields = array();
$info = array();

$date = date('M d/Y H:i:s',strtotime("+3 hours") );
$fields["Date"] = $date; 

foreach ($HTTP_POST_VARS as $k => $v) {
	if (preg_match("/^c\_(.*)$/",$k,$matches)){
		$lab = preg_replace("/\_/"," ",$matches[1]);
		//echo $lab."<br>";
		if (trim($v)!="http://") { 
			$fields[$lab] = strip($v);
		}
	}
}
foreach ($HTTP_POST_VARS as $k => $v) {
	if (preg_match("/^h\_(.*)$/",$k,$matches)){
		$lab = preg_replace("/\_/"," ",$matches[1]);
		//echo $lab."<br>";
		if (trim($v)!="http://") { 
			$info[$lab] = strip($v);
		}
	}
}

$type = $info["Submission Type"];

if ($debug) {
	echo "<span>";
	foreach ($fields as $field => $data) {
    echo $field." = ".$data."<br>\n"; 
  }
	foreach ($info as $field => $data) {
    echo $field." = ".$data."<br>\n"; 
  }
  echo "</span>";
}

/* recipients */

//live
$yourEmail = $info["Email Recipient Email"]; 
$to  = $info["Email Recipient Name"]." <".$yourEmail.">";

// test
if ($debug) {
	$yourEmail = "codeslave@emf.torolab.ibm.com";
	$to  = "Test <".$yourEmail.">";
}

/* subject */
$title = $info["Email Title"];
$siteName = $info["Site Name"];
$subject = $title.", ".$date;

/* message */
$message = '
'.$title.', '.$date.'

The following '.$title.' was received from '.$siteName.':

';
/*for ($i=0;$i<sizeof($fields);$i++) {
	if ($i>0) { $message .= ","; }
	$message .=$fields[$i];
}
$message .='<br>';*/

$XML = "";

foreach ($fields as $field => $data) {

	// pretty output
	if (preg_match("/Choose from\.\.\./",$data[$i])) { $data[$i] = ""; }
	$message .="".$field.": ".preg_replace("/(\\\\(\'|\"))/","\\2",$data)."\n";

	// plain easy-to-parse output
	/*if ($i>0) { $XML .= "\t"; }
	$XML .= preg_replace("/(\\\\(\'|\"))/","\\2",$data);
	$i++;*/
}

/* BEGIN CUSTOM CODE -- NOT GENERIC TO OTHER mailform.php IMPLEMENTATIONS */

// xml output, using... '.$fields[""].'
if ($type=="Review") { 
	$XML.='
  <review 
     reviewName="'.$fields["Review Title"].'" 
     date="'.date("Y-m-d").'" 
     rating="'.$fields["Rating"].'" 
     modelID="'.$fields["Model ID"].'" 
     reviewID="'.preg_replace("/\ /","",$fields["Name"]).date("YmdHis").'">
    <text>'.$fields["Text"].'</text>
    <reviewer>'.$fields["Name"].'</reviewer>
    <reviewerURL>'.$fields["Reviewer Website"].'</reviewerURL>
  </review>
';
} else if ($type=="Model") {
	$XML.='
  <model 
     modelName="'.$fields["Model Name"].'" 
     date="'.date("Y-m-d").'" 
     category="'.$fields["Category1"].' '.$fields["Category2"].'" 
     modelID="'.preg_replace("/\ /","",$fields["Name"]).''.date("YmdHis").'">
    <text>'.$fields["Text"].'</text>
    <modelURL>'.$fields["Model URL"].'</modelURL>
    <thumbnailURL>'.$fields["Model Thumbnail URL"].'</thumbnailURL>
    <screenshotURL>'.$fields["Model Screenshot URL"].'</screenshotURL>
    <submitter>'.$fields["Name"].'</submitter> 
    <submitterURL>'.$fields["Submitter Website"].'</submitterURL>
  </model>
';
}

$message .='
<!-- begin XML -->
'.$XML.'
<!-- end XML -->';

/* END CUSTOM CODE -- NOT GENERIC TO OTHER mailform.php IMPLEMENTATIONS */

//echo $message;
if ($debug>0) { echo "<pre>".preg_replace("/\</","&lt;",$XML)."</pre>"; }

// send to site admin, from customer

$senderN = $fields["Name"];
$sender = $fields["Email"];

$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "X-Sender: <".$sender.">\n";
//$headers .= "X-Mailer: PHP/".phpversion()."\n"; //mailer - Notes seems to think this is spam.
$headers .= "X-Priority: 3\n"; //1 Urgent Message, 3 Normal
$headers .= "X-MSMail-Priority: High\n"; // fix for hotmail spam filters? 
$headers .= "Return-Path: <".$sender.">\n";
$headers .= "Reply-To: \"$senderN\" <".$sender.">\n";
$headers .= "From: \"$senderN\" <".$sender.">\n";

if ($sendMail) { mail($to, $subject, $message, $headers, "-f$yourEmail"); }

/* message */
$message = '

<html>
<head>
 <title>'.$title.', '.$date.'</title>
</head>
<body>
<p>

Thanks for your submission! 
<br><br>
Your submission will be processed shortly - watch the EMF Corner site
for updates. Note that submissions are approved by the same people 
developing EMF, SDO and XSD, so please be patient!
<br><br>
Once approved, your submission should appear within 24 hrs.
<br><br>
Here\'s what you sent:
<br><br>
';
foreach ($fields as $field => $data) {
	$message .="<b>".$field.":</b> ".preg_replace("/(\\\\(\'|\"))/","\\2",$data)."<br>";
}
$message .='

</body>
</html>
';

		include "includes/header.php"; 

echo '	<table border="0" cellspacing="1" cellpadding="3" width="560">
		<tr><td>';
echo "<span>";
echo $message;
echo "</span>";
echo "<p><a href=\"models.xml\">Back to EMF Corner</a></p>\n\n";
echo '</td></tr></table>';

		include "../includes/footer.html"; 

// send receipt to customer, from form
if ($sender && strstr($sender,"@")) { 
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "X-Sender: <".$yourEmail.">\n";
		//$headers .= "X-Mailer: PHP/".phpversion()."\n"; //mailer - Notes seems to think this is spam.
		$headers .= "X-Priority: 3\n"; //1 Urgent Message, 3 Normal
		$headers .= "X-MSMail-Priority: High\n"; // fix for hotmail spam filters? 
		$headers .= "Return-Path: <".$yourEmail.">\n";
		$headers .= "Reply-To: $to\n";
		$headers .= "From: $to\n";

		$to = "".$senderN." <".$sender.">";
		if ($sendMail) { mail($to, $subject, $message, $headers,"-f$sender"); }
}

// write data to file as well: OMITTED
/* $fileOut = "";
$i=0;
foreach ($fields as $field => $data) {
	if ($i>0) { $fileOut .= "\t"; }
	$fileOut .= preg_replace("/(\\\\(\'|\"))/","\\2",$data);
	$i++;
}
$f = fopen("./data/".$info["Data Name"].".txt","a");
fputs($f,$fileOut."\n");
fclose($f); */

function strip($in) { 
	return preg_replace("/(\\\\(\'|\"))/","\\2",trim($in));
}

// <!-- $Id: models-mailform.php,v 1.7 2005/01/05 20:39:10 nickb Exp $ -->
?>