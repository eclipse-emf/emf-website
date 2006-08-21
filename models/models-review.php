<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php"); require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");  require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); $App = new App(); $Nav = new Nav(); $Menu = new Menu(); include($App->getProjectCommon());

include("functions.php");

ob_start();

$validate = array(
	"model_id" => array("regex" => "/^\S+\d{14}$/", "errmsg" => "Invalid model id."),
	"review_title" => array("regex" => "/^.{3,200}$/", "errmsg" => "Your review title must be between 3 and 200 characters long."),
	"review" => array("regex" => "/^.{15,1000}$/m", "errmsg" => "Your review must be between 15 and 1000 characters long."),
	"rating" => array("regex" => "/^(?:[1-9]|10)$/", "errmsg" => "You must choose a rating."),
	"name" => array("regex" => "/^.{3,100}$/", "errmsg" => "Your name must be between 3 and 100 characters."),
	"email" => array("regex" => "/^[a-zA-Z0-9\-\.]+\@[a-zA-Z0-9\-\.]+(?:\.[a-zA-Z0-9]{2,})+$/", "errmsg" => "You must enter a valid email address."),
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
		<h3>Submit a review for <?php print $_GET["name"]; ?></h3>
		<?php
		if ($err == "" ^ $_POST["do_it"] == "yes")
		{
			print $err;
		?>
		<form action="models-review.php<?php print "?name=" . $_GET["name"] . "&amp;ModelID=" . $_GET["ModelID"]; ?>" method="post">
			<input type="hidden" name="type" value="review"/>
			<input type="hidden" name="do_it" value="yes"/>
			<input type="hidden" value="<?php echo $_GET["ModelID"]; ?>" name="model_id"/>
			<div class="required">*</div> - required fields<br/>

			<div class="box">
				<div class="label">Review Title</div>
				<input class="textbox" type="text" name="review_title"<?php print put("review_title", $_GET["name"] . " Review"); ?>/><div class="required">*</div>
			</div>

			<div class="box">
				<div class="label">Review Text</div>
				<textarea name="review" rows="3" cols="40"><?php print put("review", "", true); ?></textarea><div class="required">*</div>
			</div>

			<div class="box">
				<div class="label">Rating</div>
				<select name="rating">
				<?php
					$ops = array(
						"Choose..." => "", "10 out of 10!" => 10,
						"9" => 9, "8" => 8, "7" => 7, "6" => 6, "5" => 5,
						"4" => 4, "3" => 3, "2" => 2, "1" => 1
					);
					
					foreach (array_keys($ops) as $z)
					{
						print "<option " . ($_POST["rating"] == $ops[$z] ? "selected=\"selected\" " : "") . "value=\"$ops[$z]\">$z</option>\n";
					}
				?>
				</select>
				<div class="required">*</div>
			</div>

			<div class="box">
				<div class="label">Reviewer Name</div>
				<input class="textbox" type="text" name="name"<?php print put("name"); ?>/><div class="required">*</div>
			</div>

			<div class="box">
				<div class="label">Reviewer Email</div>
				<input class="textbox" type="text" name="email"<?php print put("email"); ?>/><div class="required">*</div><br/>
				Required to send confirmation of submission and for clarification or followup of submission, if necessary. Email <b>NOT</b> posted to site.
			</div>

			<div class="box">
				<div class="label">Reviewer Website</div>
				<input class="textbox" type="text"<?php print put("website", "http://"); ?> name="website"/>
			</div>

			<input type="submit" value="Submit Review"/>
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

$pageTitle = "Eclipse Tools - EMF - Submit a Review";
$pageKeywords = ""; //TODO: add something here
$pageAuthor = "Neil Skrypuch";

$App->AddExtraHtmlHeader('<link rel="stylesheet" type="text/css" href="/emf/includes/submit.css"/>');

$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
