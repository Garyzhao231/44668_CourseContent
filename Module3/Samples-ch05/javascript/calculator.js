function displayMe(inVal)
{
	document.getElementById('display').value = document.getElementById('display').value + inVal;
}

function calculate()
{
	document.getElementById('display').value = Function("return " + document.getElementById('display').value)();
}

function clearMe()
{
	document.getElementById('display').value = '';
	document.getElementById('memory').value = '';
}

function switchSigns()
{
	document.getElementById('display').value = document.getElementById('display').value * -1;
}

function percentMe()
{
	document.getElementById('display').value = document.getElementById('display').value / 100;
}

function rememberMe()
{
	if(document.getElementById('memory').value)
	{
		displayMe(document.getElementById('memory').value);
	}
	else if (document.getElementById('display').value != '')
	{
		document.getElementById('memory').value = document.getElementById('display').value;
		document.getElementById('display').value = '';
	}
	
}

