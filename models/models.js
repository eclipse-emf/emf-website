function submitNewReview(ModelID,ModelName) {
	//alert("Not implemented yet!");
	document.location.href='models-review.php?ModelID='+ModelID+'&name='+escape(ModelName);
}

function doModelSubmit() { 
	/* ensure that model name, model URL, description, submitter name, submitter email are not blank
	*/
	with (document.forms[0]) { 
		if (c_Model_Name.value=="" || c_Model_Name.value.length<6)
		{
			alert("Your model, plugin or tool's name must be at least 6 chars long.");
			c_Model_Name.focus();
			return false;
		}
		else if (c_Model_URL.value=="" || c_Model_URL.value.length<15)
		{
			alert("Your model, plugin, or tool's URL must be at least 15 chars long.");
			c_Model_URL.focus();
			return false;
		}
		else if (c_Text.value=="" || c_Text.value.length<15)
		{
			alert("Your model's description must be at least 15 chars long.");
			c_Text.focus();
			return false;
		}
		else if (c_Name.value=="" || c_Name.value.length<3)
		{
			alert("Your name cannot be blank.");
			c_Name.focus();
			return false;
		} 
		else if (c_Email.value=="" || c_Email.value.length<3 || !isValidEmail(c_Email.value))
		{
			alert("Valid email address required for confirming your submission.");
			c_Email.focus();
			return false;
		} else {
			return true;
		}
	}

}

function doModelReviewSubmit() { 
	/* ensure that a rating has been entered, 
		that a review has at least 5 words (20 chars) and 
		that the reviewer's name is not blank
	*/
	with (document.forms[0]) { 
		if (c_Name.value=="" || c_Name.value.length<3)
		{
			alert("Your name cannot be blank.");
			c_Name.focus();
			return false;
		} 
		else if (c_Email.value=="" || c_Email.value.length<3 || !isValidEmail(c_Email.value))
		{
			alert("Valid email address required for confirming your submission.");
			c_Email.focus();
			return false;
		} 
		else if (c_Text.value=="" || c_Text.value.length<20)
		{
			alert("Your review's text must be at least 20 chars long.");
			c_Text.focus();
			return false;
		}
		else if (c_Rating.selectedIndex<1 || c_Rating.options[c_Rating.selectedIndex].value=="")
		{
			alert("You must choose a rating.");
			c_Rating.focus();
			return false;
		} else {
			return true;
		}
	}

}

function isValidEmail(str) { 
  var reg1 = /(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/; // not valid
  var reg2 = /^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/; // valid
  return (!reg1.test(str) && reg2.test(str)); // if syntax is valid, true; else false
}
