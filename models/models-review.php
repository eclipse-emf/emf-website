<?php include "includes/header.php"; ?>

<style>@import url("models.css");</style>
<script type="text/javascript" src="models.js"></script>

	<table border="0" cellspacing="1" cellpadding="3" width="560">
		<form action="models-mailform.php" method="post">
			<input type=hidden name="h_Email_Title" value="Eclipse EMF Model Review">
			<input type=hidden name="h_Email_Recipient_Name" value="EMFModelReview">
			<input type=hidden name="h_Email_Recipient_Email" value="emf-models@eclipse.org">
			<input type=hidden name="h_Site_Name" value="<?php echo $_SERVER["SERVER_NAME"]; ?>">
			<input type="hidden" name="h_Submission_Type" value="Review">
		<tr class="light-row" valign="top">
			<td colspan="3" class="">
				<b style="font-size:16px">Submit A Review</b>
				<br>&nbsp;&nbsp;&nbsp;<b class="red">*</b> - required fields<br>&nbsp;
			</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Contribution Name &amp; ID</h4></td>
			<td><input style="color:#7f7f7f" readonly type="text" value="<?php echo $_GET["name"]; ?>" name="c_Model_Name">&nbsp;&nbsp;<input style="color:#7f7f7f" readonly type="text" value="<?php echo $_GET["ModelID"]; ?>" name="c_Model_ID"></td>
			<td>&nbsp;</td>
		</tr>

		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Review Title</h4></td>
			<td><input type="text" name="c_Review_Title" size="54" value="<?php echo $_GET["name"]; ?> Review"></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Review Text</h4></td>
			<td><textarea name="c_Text" rows="3" cols="40"></textarea></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Rating</h4></td>
			<td><select name="c_Rating">
				<option value="">Choose...</option>
				<option value="10">10 out of 10!</option>
				<option value="9">9</option>
				<option value="8">8</option>
				<option value="7">7</option>
				<option value="6">6</option>
				<option value="5">5</option>
				<option value="4">4</option>
				<option value="3">3</option>
				<option value="2">2</option>
				<option value="1">1</option>
			</select></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>

		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Reviewer Name</h4></td>
			<td><input type="text" name="c_Name" size="40"></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Reviewer Email</h4></td>
			<td><input type="text" name="c_Email" size="40"><br><small>Required to send confirmation of submission and for clarification<br>or followup of submission, if necessary. Email <b>NOT</b> posted to site.</small></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Reviewer Website</h4></td>
			<td><input type="text" value="http://" name="c_Reviewer_Website" size="40"></td>
			<td>&nbsp;</td>
		</tr>

		<tr class="dark-row2" valign="top">
			<td colspan="1" class="">&nbsp;</td>
			<td><input type="submit" onclick="return doModelReviewSubmit();" value="Submit Review" name="Submit"></td>
			<td>&nbsp;</td>
		</tr>
		</form>
	</table>

<?php include "../includes/footer.html"; ?>
<!-- $Id: models-review.php,v 1.4 2004/12/23 02:23:19 nickb Exp $ -->
