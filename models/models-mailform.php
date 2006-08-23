<?php 
function wmail($toname, $to, $fromname, $from, $subject, $message)
{
	global $sendMail;
	if ($sendMail)
	{
		/* headers are supposed to be \r\n terminated,
		but the message body is to use \n line termination, according to the rfc */
		$headers = "Content-type: text/plain; charset=iso-8859-1\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "From: \"$fromname\" <$from>\r\n";
		$headers .= "X-Sender: \"$fromname\" <$from>\r\n";
	
		// spoofing to avoid spam assassin filtering
		$headers .= "X-Mailer: Internet Mail Service (5.5.2653.19)\r\n";
		$headers .= "X-MimeOLE: Produced By Microsoft Exchange V6.0.6979.0\r\n";
		$headers .= "User-Agent: Mozilla/5.001 (Windows; U; NT4.0; en-us) Gecko/25250101\r\n";
	
		$headers .= "X-Priority: 3\r\n"; //1 Urgent Message, 3 Normal
		$headers .= "X-MSMail-Priority: High\r\n"; // fix for hotmail spam filters? 
		$headers .= "Return-Path: \"$fromname\" <$from>\r\n";
		$headers .= "Reply-To: \"$fromname\" <$from>\r\n";
	
		mail($recip, $subject, $message, $headers, "-f$to");
	}
}

if ($doit == 1)
{
	$debug = 0;
	$sendMail = 1;

	$fields = array();
	$message = "";
	$messageHTML = "";

	foreach (array_keys($validate) as $k)
	{
		$v = trim($_POST[$k]);
		if (get_magic_quotes_gpc())
		{
			$v = stripslashes($v);
		}

		if ($v != "http://")
		{
			$fields[$k] = $v;
		}
		$messageHTML .= "<li><b>".ucfirst($k)."</b> - $v</li>\n";
		$message .= "$k: $v\n";
	}

	if ($debug)
	{
		print_r($fields);
	}

	/* subject */
	$title = "Modeling Corner " . ($_POST["type"] == "model" ? "Submission" : "Review");
	$siteName = $_SERVER["SERVER_NAME"];
	$subject = "$title, " . date('M d/Y H:i:s');

	/* message */
	$messagePre = "\n$title, $date\n\nThe following $title was received from $siteName:\n\n";

	$XML = "";

	/* BEGIN CUSTOM CODE -- NOT GENERIC TO OTHER mailform.php IMPLEMENTATIONS */

	if ($_POST["type"] == "review")
	{
		$d = date("Y-m-d");
		$id = preg_replace("/ /", "", $fields["name"]) . date("YmdHis");
		$XML = <<<EOXML
<review reviewName="{$fields["review_title"]}" date="$d" rating="{$fields["rating"]}" modelID="{$fields["model_id"]}" reviewID="$id">
<text>{$fields["review"]}</text>
<reviewer>{$fields["name"]}</reviewer>
<reviewerURL>{$fields["website"]}</reviewerURL>
</review>

EOXML;
	}
	else if ($_POST["type"] == "model")
	{
		$d = date("Y-m-d");
		$id = preg_replace("/ /", "", $fields["name"]) . date("YmdHis");
		$XML = <<<EOXML

<!-- begin XML -->
<model modelName="{$fields["model_name"]}" date="$d" category="{$fields["project"]} {$fields["stype"]}" modelID="$id">
<text>{$fields["description"]}</text>
<modelURL>{$fields["model_url"]}</modelURL>
<thumbnailURL>{$fields["thumbnail_url"]}</thumbnailURL>
<screenshotURL>{$fields["screenshot_url"]}</screenshotURL>
<submitter>{$fields["name"]}</submitter> 
<submitterURL>{$fields["website"]}</submitterURL>
</model>
<!-- end XML -->

EOXML;
	}

	// send to site admin, from customer
	$recip = ($toname == "" ? "" : "\"$toname\" ") . "<" . $to . ">";
	$footer = "\n\n".'$Id: models-mailform.php,v 1.35 2006/08/23 01:41:03 nickb Exp $';
	wmail("Modeling Corner", "emf@divbyzero.com", $fields["name"], $fields["email"], $subject, $messagePre . $message . $XML . $footer);

	/* message */
	$messagePre = <<<EOTEXT
<p>

Thanks for your submission!

</p><p>

Your submission will be processed shortly - watch the Modeling Corner
for updates. Note that submissions are approved by the same people 
developing the code so please be patient!

</p><p>

If you don't hear from us or see your submission posted, 
please send your information to codeslave(at)ca.ibm.com.

</p><p>

Here's what you sent:

</p><p>

EOTEXT;

	echo $messagePre . $messageHTML;
	wmail($fields["name"], $fields["email"], $fields["name"], $fields["email"], $subject, $messagePre . $message);
}
?>
