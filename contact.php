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
			<div class="contactHeader">
				<div class="centered">
					<h1 class="pageTitle">Contact Us</h1>
				</div>
			</div>
			<div>
				<p>
					We are always looking to answer any questions, or provide any assistance we can to our customers! Have a question? Don't hesitate to contact us either in store, or with our handy online message form!
				</p>
			</div>
			<div>
                <?php
                $Name = "";
                $Email = "";
                $PhoneNum = "";
                $Message = "";

                $NameError = "";
                $EmailError = "";
                $PhoneNumError = "";
                $MessageError = "";

                // Name input validation
                if(isset($_GET['submit'])){
                    if(empty($_GET['custName'])){
                        $NameError = "* Please enter your name";
                    } else{
                        $Name = ($_GET['custName']);
                    }
                }

                // Email input validation
                if(isset($_GET['submit'])){
                    if(empty($_GET['custEmail'])){
                        $EmailError = "* Please enter your email";
                    } else{
                        $Email = ($_GET['custEmail']);
                    }
                }

                // Phone number validation
                if(isset($_GET['submit'])){
                    if(empty($_GET['custPhone'])){
                        $PhoneNumError = "* Please enter your phone number";
                    } else{
                        $PhoneNum = ($_GET['custPhone']);
                    }
                }

                // Message validation
                if(isset($_GET['submit'])){
                    if(empty($_GET['custMessage'])){
                        $MessageError = "* Please enter your message";
                    } else{
                        $Message = ($_GET['custMessage']);
                    }
                }


                ?>
				<form name="form" method="get" >
					<fieldset>
						<legend>Send us a message!</legend>
						<!-- Customer contact -->
						<label for="custName">Name:</label>
						<input type="text" name="custName" value="<?php echo $Name ?>"><span><?php echo " " . $NameError ?></span></br></br>
						<label for="custEmail">Email:</label>
						<input type="text" name="custEmail" value="<?php echo $Email ?>"><span><?php echo " " . $EmailError ?></span></br></br>
						<label for="custPhone">Phone Number:</label>
						<input type="number" name="custPhone" value="<?php echo $PhoneNum ?>"><span><?php echo " " . $PhoneNumError ?></span></br></br>
						
						<!-- Customer message -->
						<label for="custMessage">Your Message:</label>
						<input type="text" name="custMessage" value="<?php echo $Message ?>"><span><?php echo " " . $MessageError ?></span></br>
						
						<!-- Submit and Reset buttons -->
						<input type="submit" name="submit" value="Submit" class="formButton">
						<input type="reset" class="formButton"></br>
						<div>
							<?php
								//  user defined function
								function formInput($a, $b){
									echo "Thank you for your message $a! We will send a respond soon to $b.</br>";
								}
								if(isset($_GET['submit'])){
									$FormInfo = formInput(($_GET['custName']), ($_GET['custEmail']));
									echo $FormInfo;
								}
									
							?>
						</div>
					</fieldset>
				</form>

			</div>
		</main>
		<!----- Footer Area ----->
		<?php include "footer.inc"; ?>
		
	</body>
</html>