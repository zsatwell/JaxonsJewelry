<!DOCTYPE html>
<html>
	<head>
		<!----- Meta Tags ----->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Jaxon's Jewelry Website" />
		<!----- Page Stlyes ----->
		<!--- CSS --->
		<style><?php include "styles.inc" ?></style>
		<!--- Fonts --->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Cookie&family=Yellowtail&display=swap" rel="stylesheet">
	</head>
	
	<body>
		<!----- Header Area ----->
		<?php include "header.inc"; ?>
		<!----- Main Content Area ----->
		<main>
			<div class="homeHeader">
				<div class="centered">
					<h1 class="pageTitle">Welcome to Jaxon's Jewelry!</h1>
				</div>
			</div>
			<div>
				<p> 
					Here at Jaxon's Jewelry, quality and service are our top priority. As a family business, we pride ourselves on providing exceptional service, and we treat every customer like family. The customer is always right! At Jaxon's we provide the highest quality jewelry to our customers, everything from rings, necklaces, and so much more!
				</p>
				<p>
					View our products, learn some more about who we are and what our mission is, or if you have a question reach out to us for a speedy answer! Whatever it is that you need, you can find it at Jaxon's Jewelry! 
				</p>
			</div>
			<div class="buttonContainer">
				<!-- Area for page links as styled buttons -->
				<a href="products.php" class="buttonText">Our Products</a>
				<a href="about.php" class="buttonText">About Us</a>
			</div>
		</main>
		<!----- Footer Area ----->
		<?php include "footer.inc"; ?>
		
	</body>
</html>