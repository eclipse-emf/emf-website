<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

include("functions.php");

ob_start();

$validate = array(
	"model_name" => array("regex" => "/^.{6,100}$/", "errmsg" => "Your model, plugin or tool's name must be between 6 and 100 characters long."),
	"model_url" => array("regex" => "/^\S{15,200}$/", "errmsg" => "Your model, plugin or tool's URL must be between 15 and 200 characters long, and cannot contain spaces."),
	"description" => array("regex" => "/^.{15,1000}$/m", "errmsg" => "Your description must be between 15 and 1000 characters long."),
	"name" => array("regex" => "/^.{3,100}$/", "errmsg" => "Your name must be between 3 and 100 characters."),
	"email" => array("regex" => "/^[a-zA-Z0-9\-\.]+\@[a-zA-Z0-9\-\.]+(?:\.[a-zA-Z0-9]{2,})+$/", "errmsg" => "You must enter a valid email address."),
	"screenshot_url" => array("regex" => "/^.*$/", "errmsg" => "Invalid screenshot URL."),
	"thumbnail_url" => array("regex" => "/^.*$/", "errmsg" => "Invalid thumbnail URL."),
	"type" => array("regex" => "/^model$/", "errmsg" => "Invalid type."),
	"project" => array("regex" => "/^(?:EMF|XSD|SDO)$/", "errmsg" => "Invalid project."),
	"stype" => array("regex" => "/^(?:model|framework|tool|utility|example|other)$/", "errmsg" => "Invalid submission type."),
	"website" => array("regex" => "/^.*$/", "errmsg" => "Invalid website.")
);

$err = "";
if ($_POST["do_it"] == "yes")
{
	foreach (array_keys($validate) as $z)
	{
		if (!preg_match($validate[$z]["regex"], $_POST[$z]))
		{
			$err .= "<div class=\"error\">" . $validate[$z]["errmsg"] . "</div>\n";
		}
	}
}
?>
<div id="midcolumn">
	<div class="homeitem3col">
		<h3>Submit A Model, Framework, Tool, Utility, Example...</h3>
		<?php
		if ($err == "" ^ $_POST["do_it"] == "yes")
		{
			print $err;
		?>
		<form action="models-submit.php" method="post">
			<input type="hidden" name="do_it" value="yes"/>
			<input type="hidden" name="type" value="model"/>
			<div class="required">*</div> - required fields

			<div class="box">
				<div class="label">Contribution Name</div>
				<input<?php print put("model_name"); ?> class="textbox" type="text" name="model_name"/><div class="required">*</div>
			</div>
			<div class="box">
				<div class="label">Contribution Description</div>
				<textarea rows="10" cols="50" name="description"><?php print put("description", "", true); ?></textarea><div class="required">*</div>
			</div>
			<div class="box">
				<div class="label">Category</div>
				<select name="project">
					<?php
					$ops = array("EMF", "SDO", "XSD");
					foreach ($ops as $z)
					{
						print "<option " . ($_POST["project"] == $z ? "selected=\"selected\" " : "") . "value=\"$z\">$z</option>\n";
					}
					?>
				</select>
				<select name="stype">
					<?php
					$ops = array("model" => "Model", "framework" => "Framework",
						"tool" => "Tool", "utility" => "Utility",
						"example" => "Example", "other" => "Other");

					foreach (array_keys($ops) as $z)
					{
						print "<option " . ($_POST["stype"] == $z ? "selected " : "") . "value=\"$z\">$ops[$z]</option>\n";
					}
					?>
				</select>
			</div>

			<div class="box">
				<div class="label">Contribution URL</div>
				<input class="textbox" type="text"<?php print put("model_url", "http://"); ?> name="model_url"/><div class="required">*</div><br/>Path to your model, plugin or tool's site, for download or more information
			</div>
			<div class="box">
				<div class="label">Contribution Screenshot URL</div>
				<input class="textbox" type="text"<?php print put("screenshot_url", "http://"); ?> name="screenshot_url"/><br/>Path to a screenshot, if available
			</div>
			<div class="box">
				<div class="label">Contribution Thumbnail URL</div>
				<input class="textbox" type="text"<?php print put("thumbnail_url", "http://"); ?> name="thumbnail_url"/><br/>Path to a screenshot thumbnail, if available
			</div>

			<div class="box">
				<div class="label">Submitter Name</div>
				<input class="textbox" type="text"<?php print put("name"); ?> name="name"/><div class="required">*</div>
			</div>
			<div class="box">
				<div class="label">Submitter Email</div>
				<input class="textbox" type="text"<?php print put("email"); ?> name="email"/><div class="required">*</div><br/>Required to send confirmation of submission and for clarification or followup of submission, if necessary. Email is <b>NOT</b> posted to site.
			</div>
			<div class="box">
				<div class="label">Submitter Website</div>
				<input class="textbox" type="text"<?php print put("website"); ?> name="website"/>
			</div>

			<div class="box">
				<input id="submit" type="submit" value="Submit" name="Submit"/>
			</div>
		</form>
		<?php
		}
		else
		{
			$doit = 1; //protects models-mailform.php from direct access
			include("models-mailform.php");
		}
		?>
	</div>
</div>

<?php
$html = ob_get_contents();
ob_end_clean();

$pageTitle = "Eclipse Tools - EMF - Submit a Model, Framework, Tool, Utility, Example...";
$pageKeywords = ""; //TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/submit.css"/>');

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
