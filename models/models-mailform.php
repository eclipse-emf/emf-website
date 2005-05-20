<?php 

// check submitted data, then write back to browser that it's all good.

$debug=0;
$sendMail=1;

$fields = array();
$info = array();

$date = date('M d/Y H:i:s');
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
//$yourEmail = $info["Email Recipient Email"]; 
//$to  = $info["Email Recipient Name"]." <".$yourEmail.">";

// test
//if ($debug) {
//	$yourEmail = "codeslave@emf.torolab.ibm.com";
//	$to  = "Test <".$yourEmail.">";
//}

// emf-models@eclipse.org no longer working?
$yourEmail = "codeslave@ca.ibm.com"; 
$to  = "EMF Corner Submissions "." <".$yourEmail.">,";

/* subject */
$title = $info["Email Title"];
$siteName = $info["Site Name"];
$subject = $title.", ".$date;

/* message */
$message = '';
$messagePre = '
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

$headers = "";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "X-Sender: <".$sender.">\n";

	// spoofing to avoid spam assassin filtering
	$headers .= "X-Mailer: Internet Mail Service (5.5.2653.19)\n";
	$headers .= "X-MimeOLE: Produced By Microsoft Exchange V6.0.6979.0\n";
	$headers .= "User-Agent: Mozilla/5.001 (windows; U; NT4.0; en-us) Gecko/25250101\n";

$headers .= "X-Priority: 3\n"; //1 Urgent Message, 3 Normal
$headers .= "X-MSMail-Priority: High\n"; // fix for hotmail spam filters? 
$headers .= "Return-Path: <".$sender.">\n";
$headers .= "Reply-To: \"$senderN\" <".$sender.">\n";
$headers .= "From: \"$senderN\" <".$sender.">\n";

if ($sendMail) { mail("$yourEmail,nick@divbyzero.com", $subject, $messagePre.$message, $headers, "-f$yourEmail"); }

/* message */
$messagePre = '
Thanks for your submission! 

Your submission will be processed shortly - watch the EMF Corner site
for updates. Note that submissions are approved by the same people 
developing EMF, SDO and XSD, so please be patient!

If you don\'t hear from us or see your submission posted, 
please send your information to codeslave(at)ca.ibm.com.

Here\'s what you sent:
';

		$pre="../"; include "../includes/header.php"; 

echo '	<table border="0" cellspacing="1" cellpadding="3" width="560">
		<tr><td>';
echo "<span>";
echo "<pre>".$messagePre.preg_replace("/\</","&lt;",$message)."</pre>";
echo "</span>";
echo "<p><a href=\"models.xml\">Back to EMF Corner</a></p>\n\n";
echo '</td></tr></table>';

		$pre="../"; include "../includes/footer.php"; 

// send receipt to customer, from form
if ($sender && strstr($sender,"@")) { 
	$headers = "";
	//$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
	$headers .= "MIME-Version: 1.0\n";
	$headers .= "X-Sender: <".$yourEmail.">\n";

	// spoofing to avoid spam assassin filtering
	$headers .= "X-Mailer: Internet Mail Service (5.5.2653.19)\n";
	$headers .= "X-MimeOLE: Produced By Microsoft Exchange V6.0.6979.0\n";
	$headers .= "User-Agent: Mozilla/5.001 (windows; U; NT4.0; en-us) Gecko/25250101\n";

	$headers .= "X-Priority: 3\n"; //1 Urgent Message, 3 Normal
	$headers .= "X-MSMail-Priority: High\n"; // fix for hotmail spam filters? 
	$headers .= "Return-Path: <".$yourEmail.">\n";
	$headers .= "Reply-To: $to\n";
	$headers .= "From: $to\n";

	$to = "".$senderN." <".$sender.">";
	if ($sendMail) { mail($to, $subject, $messagePre.$message, $headers,"-f$sender"); }
}

function strip($in) { 
	return preg_replace("/(\\\\(\'|\"))/","\\2",trim($in));
}

// <!-- $Id: models-mailform.php,v 1.21 2005/05/20 22:51:47 nickb Exp $ -->
?>