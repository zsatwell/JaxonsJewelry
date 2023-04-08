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
<div>
    <?php
        // Connects to the server and logs into the "root" user, or displays an error message
        $JaxConnect = @mysqli_connect("localhost", "zsatwell_admin", "jaxAdmin101") or die("<p>There was an error connecting to the server. Please return to the previous page and try again.</p>" . "<p>Error code" . mysqli_connect_errno() . ":" . mysqli_connect_error() . "</p>");

        // Creates the database if successfully connected to the server.
        // Creates the database if not previously created
        $JJName = "zsatwell_JaxonJewelry";
        if(!mysqli_select_db($JaxConnect, $JJName)) {
            $DataCreate = "CREATE DATABASE $JJName";
            $Result = @mysqli_query($JaxConnect, $DataCreate) or die("<p>Unable to execute the query. Please try again.</p>" . "<p>Error code " . mysqli_errno($JaxConnect) . ":" . mysqli_error($JaxConnect)) . "</p>";
            mysqli_select_db($JaxConnect, $JJName);
        }

        // Creates the database table if it hasn't already been created, and include the 4 fields from the events form. Displays an error message if needed, and writes the data to the table.
        $JaxTable = "participants";
        $DataCreate = "SELECT * FROM $JaxTable";
        $Result = @mysqli_query($JaxConnect, $DataCreate);
        if(!$Result){
            $DataCreate = "CREATE TABLE $JaxTable (countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(25), last_name VARCHAR(25), phone_num VARCHAR(12), birthday DATE)";
            $QueryResult = @mysqli_query($JaxConnect, $DataCreate) or die("<p>Unable to create the specified table.</p>" . "<p>Error code " . mysqli_errno($JaxConnect) . ":" . mysqli_error($JaxConnect)). "</p>";
        }

        // Adds the form input into the table, and closes the connection with the database. Displays an error if needed
        $FirstName = ($_POST['first_name']);
        $LastName = ($_POST['last_name']);
        $PhoneNum = ($_POST['phoneNum']);
        $Birthday = ($_POST['birthday']);

        $DataCreate = "INSERT INTO $JaxTable VALUES(NULL, '$FirstName', '$LastName', '$PhoneNum', '$Birthday')";
        $Result = @mysqli_query($JaxConnect, $DataCreate) or die ("<p>Unable to execute the query.</p>" . "<p>Error code " . mysqli_errno($JaxConnect) . ":" . mysqli_error($JaxConnect)). "</p>";

        // Once everything is created without errors, displays a message for the user
        echo "<h2>Thank you for entering our Birthstone Challenge " . $FirstName . "!</h2>";
        // Closes the database
        mysqli_close($JaxConnect);
    ?>
</div>
<!----- Footer Area ----->
<?php include "footer.inc"; ?>

</body>
</html>
