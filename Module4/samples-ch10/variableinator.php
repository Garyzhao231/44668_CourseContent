<html>
	<head>
		<title>Variableinator</title>
	</head>
   
	<body>
		<h1>Variable Demo</h1> 	
		<p>
			<?php 
			// integer variables
			$integer1 = 12;
			$integer2 = 34;
			// string variables
			$string1 = "first string";
			$string2 = "second string";
			// float variables
			$float1 = 1.23;
			$float2 = 4.56;
			// a boolean variable
			$bool1 = true;
			// array variables
			$arr1 = array("one","two","three");
			$arr2 = array(4,5,6);
			
			echo "integer addition: ".($integer1+$integer2); 
			echo "<br/>";
			echo "string concatenation: ".$string1." ".$string2."!";
			echo "<br/>";
			echo "float division: ".($float1/$float2);
			echo "<br/>";
			echo "bool evaluation: ";
			var_export($bool1);
			echo "<br/>";
			echo "array display: ".$arr1[2];
			echo "<br/>";
			echo "array display: ".$arr2[2]; 
			?>
		</p>
	</body>
</html>