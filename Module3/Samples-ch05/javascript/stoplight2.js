"use strict"

function makeLight(inColor) 
{
	clearLights();
   	document.getElementById(inColor + "Light").style.background = inColor;
}

function clearLights()
{
	var lightsArr = document.getElementsByClassName("light");
	let ndx;
	for (ndx = 0; ndx < lightsArr.length; ndx++) 
	{
  		lightsArr[ndx].style.backgroundColor = "";
	}
}

