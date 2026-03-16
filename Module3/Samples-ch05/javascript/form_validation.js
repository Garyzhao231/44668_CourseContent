"use strict"

function validate_form(inForm)
{
	let warnArr = document.getElementsByClassName("form_errors");
	let ndx;
	
	if (inForm.checkValidity() == false) 
	{
    	let elementsArr = inForm.querySelectorAll(':invalid');
    	let errCount = elementsArr.length - 1;
    	
		for (ndx = 0; ndx < warnArr.length; ndx++) 
		{
  			warnArr[ndx].innerHTML = "You are missing data in " + errCount + " fields in this form.";
  			warnArr[ndx].classList.add("required");
		}
	}
	else
	{
		for (ndx = 0; ndx < warnArr.length; ndx++) 
		{
  			warnArr[ndx].innerHTML = "";
  			warnArr[ndx].classList.remove("required");
		}
	}
}

function checkLength(inField, formField, fieldLength)
{
	if(inField.value.length > 0 && inField.value.length < fieldLength)
	{
		if(confirm("Is your " + formField + " actually " + inField.value + "? \n\n OK to confirm, Cancel to edit.")==false)
		{
			inField.value = '';
			setTimeout(function() { inField.focus(); }, 1);
		}
	}
}
