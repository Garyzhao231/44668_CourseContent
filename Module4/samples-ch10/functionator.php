<html>
	<head>
		<title>Functionator</title>
	</head>
   
	<body>
		<h1>Function Demo</h1> 	
		<p>
			<?php 
				//display a value using a function
				function showValue() {
  					echo "This is a value<br/>";
  					//return;
				}
				//display a value sent to the function
				function showInputValue($inVal) {
  					echo "input value: ".$inVal."<br/>";
  					//return;
				}
				//return the value of a calculation
				function returnVariableAddition($inVal1, $inVal2)
				{
					return ($inVal1 + $inVal2);
				}
				//run all of the functions from a single function
				function runFunctions()
				{
					showValue();
					showInputValue("I like cheese!");
					echo returnVariableAddition(2,2);
					
				}
				
				runFunctions();
			?>
		</p>
	</body>
</html>