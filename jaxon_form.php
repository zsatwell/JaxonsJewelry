<!DOCTYPE html>
<html>
	<head>
		<!----- Meta Tags ----->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Jaxon's Jewelry PHP Outputs" />
		<title>Jaxon's Jewelry PHP Outputs</title>
	</head>
	
	<body>
		<?php
			// Module 2 - Conditional Statements, Arrays, and Loops
			// Echos out the values from the form, and the different array values
			// Conditional Statements
			$Name = $_GET['name'];
			$Email = $_GET['email'];
			$Message = $_GET['message'];
			// Form name 
			if($Name == ""){
				echo "<p>No name entered.</p>";
			} else{
				echo "<p><strong>Your name is:</strong> $Name</p>";
			}
			// Form email
			if($Email == ""){
				echo "<p>No email entered.</p>";
			} else{
				echo "<p><strong>Your email is:</strong> $Email</p>";
			}
			// Form message
			if($Message == ""){
				echo "<p>You have no message.</p>";
			}else{
				echo "<p><strong>Your message is:</strong> $Message</p>";
			}
			
			// PHP Array
			$metal = array("Gold", "Silver", "Platinum", "Titanium", "Stainless Steel");
			$gemstones = array("Diamond", "Ruby", "Emerald", "Sapphire", "Amethyst");
			
			// PHP Loops
			// $metal
			echo "<strong>Our metal selection:</strong><br>";
			for ($m = 0; $m < 5; ++$m){
				echo $metal[$m], "<br>";
			}
			// $gemstones
			echo "<strong><br>Our gemstone selection:</strong><br>";
			for ($g = 0; $g < 5; ++$g){
				echo $gemstones[$g], "<br>";
			}
		?>
	</body>
</html>