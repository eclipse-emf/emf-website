<?php $pre = ""; 
		$HTMLTitle = "Eclipse Tools - EMF and SDO - EMF Corner";
		$ProjectName = array(
			"EMF Corner",
			'Eclipse Modeling Framework',
			"EMF Corner",
			"" // defaults to Idea.jpg
			);
		include $pre."includes/header.php"; 
		
		?>

<style>@import url("../models/models.css");</style>
<script type="text/javascript" src="../models/models.js"></script>

	<table border="0" cellspacing="1" cellpadding="3">
		<form action="models-mailform.php" method="post">
			<input type=hidden name="h_Email_Title" value="Eclipse EMF Model Submission">
			<input type=hidden name="h_Email_Recipient_Name" value="EMFModelSubmit">
			<input type=hidden name="h_Email_Recipient_Email" value="emf-models@eclipse.org">
			<input type=hidden name="h_Site_Name" value="<?php echo $_SERVER["SERVER_NAME"]; ?>">
			<input type="hidden" name="h_Submission_Type" value="Model">
		<tr class="light-row" valign="top">
			<td colspan="3" class="">
				<b style="font-size:16px">Submit A Model, Framework, Tool, Utility, Example...</b>
				<br>&nbsp;&nbsp;&nbsp;<b class="red">*</b> - required fields<br>&nbsp;
			</td>
		</tr>

		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Contribution Name</h4></td>
			<td><input type="text" name="c_Model_Name" size="40"></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Contribution Description</h4></td>
			<td><textarea name="c_Text" rows="3" cols="40"></textarea></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Category</h4></td>
			<td><select name="c_Category1" onchange="if(this.selectedIndex==3){ document.forms[0].c_Category2.selectedIndex=5; }">
				<option value="EMF">EMF</option>
				<option value="SDO">SDO</option>
				<option value="XSD">XSD</option>
				<option value="General">General</option>
			</select>&nbsp;&nbsp;<select name="c_Category2" onchange="if(this.selectedIndex==5){ document.forms[0].c_Category1.selectedIndex=3; }">
				<option value="model">Model</option>
				<option value="framework">Framework</option>
				<option value="tool">Tool</option>
				<option value="utility">Utility</option>
				<option value="example">Example</option>
				<option value="discussion">Discussion</option>
				<option value="other">Other</option>
			</select></td>
			<td>&nbsp;</td>
		</tr>

		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_URL" size="40"><br><small>Path to your model, plugin or tool's site, for download or <br>more information</small></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;&nbsp;<!--<a href="../models/models-sample.xml">Sample XML</a>--></td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution Screenshot URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_Screenshot_URL" size="40"><br><small>Path to a screenshot, if available</small></td>
			<td>&nbsp;</td>
		</tr>
		<tr class="dark-row2" valign="top">
			<td colspan="1" class=""><h4>Contribution Thumbnail URL</h4></td>
			<td><input type="text" value="http://" name="c_Model_Thumbnail_URL" size="40"><br><small>Path to a screenshot thumbnail, if available</small></td>
			<td>&nbsp;</td>
		</tr>

		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Name</h4></td>
			<td><input type="text" name="c_Name" size="40"></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Email</h4></td>
			<td><input type="text" name="c_Email" size="40"><br><small>Required to send confirmation of submission and for clarification<br>or followup of submission, if necessary. Email <b>NOT</b> posted to site.</small></td>
			<td>&nbsp;<b class="red">*</b>&nbsp;</td>
		</tr>
		<tr class="dark-row" valign="top">
			<td colspan="1" class=""><h4>Submitter Website</h4></td>
			<td><input type="text" value="http://" name="c_Submitter_Website" size="40"></td>
			<td>&nbsp;</td>
		</tr>
	
		<tr class="dark-row2" valign="top">
			<td colspan="1" class="">&nbsp;</td>
			<td><input type="submit" onclick="return doModelSubmit();" value="Submit" name="Submit"></td>
			<td>&nbsp;</td>
		</tr>
		</form>
	</table>

<?php include $pre."includes/footer.php"; ?>
<!-- $Id: models-submit.php,v 1.1 2004/12/21 21:32:13 nickb Exp $ -->
