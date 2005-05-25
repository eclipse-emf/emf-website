<?php $pre="../"; include "../includes/header.php"; ?>

<style>@import url("models.css");</style>
<script type="text/javascript" src="models.js"></script>

	<table border="0" cellspacing="1" cellpadding="3" width="560">
		<form action="models-mailform.php" method="post">
			<input type=hidden name="h_Email_Title" value="Eclipse EMF Corner Submission">
			<input type=hidden name="h_Email_Recipient_Name" value="EMFCornerSubmit">
			<input type=hidden name="h_Email_Recipient_Email" value="emf-models@eclipse.org">
			<input type=hidden name="h_Site_Name" value="<?php echo $_SERVER["SERVER_NAME"]; ?>">
			<input type="hidden" name="h_Submission_Type" value="Model">
		<tr class="light-row" valign="top">
			<td colspan="3" class="">
				<b style="font-size:16px">Submit A Model, Framework, Tool, Utility, Example...</b>
				<br>&#160;&#160;&#160;<b class="red">*</b> - required fields<br>&#160;
			</td>
		</tr>

		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Contribution Name</h4></td>
			<td><input type="text" name="c_Model_Name" size="40"></td>
			<td>&#160;<b class="red">*</b>&#160;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Contribution Description</h4></td>
			<td><textarea name="c_Text" rows="3" cols="40"></textarea></td>
			<td>&#160;<b class="red">*</b>&#160;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Category</h4></td>
			<td><select name="c_Category1" onchange="if(false && this.selectedIndex==3){ document.forms[0].c_Category2.selectedIndex=5; }">
				<option value="EMF">EMF</option>
				<option value="SDO">SDO</option>
				<option value="XSD">XSD</option>
<!--				<option value="General">General</option> -->
			</select>&#160;&#160;<select name="c_Category2" onchange="if(false && this.selectedIndex==5){ document.forms[0].c_Category1.selectedIndex=3; }">
				<option value="model">Model</option>
				<option value="framework">Framework</option>
				<option value="tool">Tool</option>
				<option value="utility">Utility</option>
				<option value="example">Example</option>
<!--				<option value="discussion">Discussion</option> -->
				<option value="other">Other</option>
			</select></td>
			<td>&#160;</td>
		</tr>

		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_URL" size="40"><br><small>Path to your model, plugin or tool's site, for download or <br>more information</small></td>
			<td>&#160;<b class="red">*</b>&#160;&#160;<!--<a href="models-sample.xml">Sample XML</a>--></td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution Screenshot URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_Screenshot_URL" size="40"><br><small>Path to a screenshot, if available</small></td>
			<td>&#160;</td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution Thumbnail URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_Thumbnail_URL" size="40"><br><small>Path to a screenshot thumbnail, if available</small></td>
			<td>&#160;</td>
		</tr>

		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Name</h4></td>
			<td><input type="text" name="c_Name" size="40"></td>
			<td>&#160;<b class="red">*</b>&#160;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Email</h4></td>
			<td><input type="text" name="c_Email" size="40"><br><small>Required to send confirmation of submission and for clarification<br>or followup of submission, if necessary. Email <b>NOT</b> posted to site.</small></td>
			<td>&#160;<b class="red">*</b>&#160;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Website</h4></td>
			<td><input type="text" value="http://" name="c_Submitter_Website" size="40"></td>
			<td>&#160;</td>
		</tr>
	
		<tr class="dark-row2" valign="top">
			<td colspan="1" class="">&#160;</td>
			<td><input type="submit" onclick="return doModelSubmit();" value="Submit" name="Submit"></td>
			<td>&#160;</td>
		</tr>
		</form>
	</table>

<?php $pre="../"; include "../includes/footer.php"; ?>
<!-- $Id: models-submit.php,v 1.10 2005/05/25 19:07:06 nickb Exp $ -->
