<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
            <div class="eventHeader">
                <div class="centered">
                    <h1 class="pageTitle">Community Events</h1>
                </div>
            </div>
            <!-- Information area -->
            <section>
                <div>
                    <p>
                        Here at Jaxon's Jewelry, we are all about community. That is why we like to give back, and host fun and exciting challenges and events for the valued members of our community.
                    </p>
                    <p>
                        If you are interested in helping host an event, or have an idea for a new one, reach out! We are always looking for feedback and help in providing services for our customers and community!
                    </p>
                </div>
                <div>
                    <h3>August 2022 Events:</h3>
                    <p>
                        <strong>Birthstone Challenge!</strong>
                    </p>
                    <p>
                        To celebrate the open house of our new location, we are hosting a birthstone challenge! Simply enter in the required information below to be entered!
                    </p>
                </div>
            </section>
            <!-- Validates the form fields -->
            <?php
            // Creates empty variables to wait until for form input to fill
            // form variables
            $firstName = "";
            $lastName = "";
            $phoneNum = "";
            $birthday = "";
            // error variables
            $firstNameError = "";
            $lastNameError = "";
            $phoneNumError = "";
            $birthdayError = "";
            // form action
            $formAction = "";
            // first name validation
            if(isset($_POST['eventSubmit'])){
                if(empty($_POST['first_name'])){
                    $firstNameError = "* Please enter your first name";
                } else{
                    $firstName = ($_POST['first_name']);
                }
            }
            // last name validation
            if(isset($_POST['eventSubmit'])){
                if(empty($_POST['last_name'])){
                    $lastNameError = "* Please enter your last name";
                } else{
                    $lastName = ($_POST['last_name']);
                }
            }
            // phone number validation
            if(isset($_POST['eventSubmit'])){
                if(empty($_POST['phoneNum'])){
                    $phoneNumError = "* Please enter your phone number";
                    if(strlen($_POST['phoneNum']) < 12){
                        $phoneNumError = "* You must have 12 characters";
                    }
                } else{
                    $phoneNum = ($_POST['phoneNum']);
                }
            }
            // birthday validation
            if(isset($_POST['eventSubmit'])){
                if(empty($_POST['birthday'])){
                    $birthdayError = "* Please enter your birthday";
                } else{
                    $birthday = ($_POST['birthday']);
                }
            }
            // Creates a variable to hold the form action, and if all variables are filled will echo the variable into the form action to send to another page
                if(isset($_POST['first_name']) && (isset($_POST['last_name'])) && (isset($_POST['phoneNum'])) && (isset($_POST['birthday']))){
                    $formAction = "eventFormValidation.php";
            }

            ?>
            <!-- Form area -->
            <section>
                <fieldset>
                    <legend>Enter for a chance to win!</legend>
                    <form name="eventForm" method="post" action="<?php echo $formAction ?>">
                        <p>First Name: <input type="text" name="first_name" value="<?php echo $firstName ?>"><?php echo " " . $firstNameError ?></p>
                        <p>Last Name: <input type="text" name="last_name"  value="<?php echo $lastName ?>"><?php echo " " . $lastNameError ?></p>
                        <p>Phone Number: <input type="tel" placeholder="999-999-9999" name="phoneNum"  value="<?php echo $phoneNum ?>"><?php echo " " . $phoneNumError ?></p>
                        <p>Birthday: <input placeholder="YYYY-MM-DD" name="birthday"  value="<?php echo $birthday ?>"><?php echo " " . $birthdayError ?></p>
                        <p><input type="submit" name="eventSubmit" class="formButton"><input type="reset" class="formButton"> </p>
                    </form>
                <p><a href="eventParticipants.php">Show Participants</a> </p>
                </fieldset>
            </section>
		</main>
		<!----- Footer Area ----->
		<?php include "footer.inc"; ?>
		
	</body>
</html>