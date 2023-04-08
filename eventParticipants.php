<!DOCTYPE html>
<html>
<head>
    <!----- Meta Tags ----->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Jaxon's Jewelry Website" />
    <!----- Page Styles ----->
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
<div class="participantPage">
    <?php
        // Connects to the server
        $JaxConnect = @mysqli_connect("localhost", "zsatwell_admin", "jaxAdmin101") or die("<p>There was an error connecting to the server.</p>" . "<p>Error code " . mysqli_connect_errno() . ":" . mysqli_connect_errno()) . "<.p>";

        // Connects to the JaxonJewelry database. If database doesn't exist, a message prints that the database has no entries
        $JJName = "zsatwell_JaxonJewelry";
        if(!@mysqli_select_db($JaxConnect, $JJName)) die("<p>There are no registered participants yet!</p>");

        // Selects all the records in the participants table. If no records, prints a message saying there are no participants
        $JaxTable = "participants";
        $DataCreate = "SELECT * FROM $JaxTable";
        $Result = @mysqli_query($JaxConnect, $DataCreate);
        if(mysqli_num_rows($Result) == 0){
            die("<p>There are no registered participants yet!</p>");
        }

        // Creates the table with full name (first and last concat), phone, DOB, Area code, eligibility, birth month birthstone
        // Pulls the current date as yyyy-mm-dd
        $CurrentDate = date("F, d, Y");
        echo "<p>As of today: " . $CurrentDate . ", the following participants have registered.</p>";
        // table headers
        echo "<table>";
        echo "<tr><th>Name</th><th>Phone</th><th>DOB</th><th>Area Code</th><th>Eligible</th><th>Birth Month</th><th>Birthstone</th></tr>";
        $TableRows = mysqli_fetch_assoc($Result);
        // creats and fills table rows
        do{
            // Pulls the first 3 numbers from phone_num to get area code
            $AreaCode = substr($TableRows['phone_num'], 0, 3);
            // eligibility
            if($AreaCode == 325){
                $Eligible = "Yes";
            } else{
                $Eligible = "No";
            }
            // determines the birth month of user
            // creates 2D array of months and gems
            $MonthGem = array(
                    array("January", "Garnet"),
                    array("February", "Amethyst"),
                    array("March", "Aquamarine"),
                    array("April", "Diamond"),
                    array("May", "Emerald"),
                    array("June", "Pearl"),
                    array("July", "Ruby"),
                    array("August", "Peridot"),
                    array("September", "Sapphire"),
                    array("October", "Opal"),
                    array("November", "Topaz"),
                    array("December", "Tanzanite")
            );
            $BirthNum = substr($TableRows['birthday'], 5, 2);
            if($BirthNum == 01){
                $BirthMonth = $MonthGem[0][0];
                $BirthGem = $MonthGem[0][1];
            }
            if($BirthNum == 02){
                $BirthMonth = $MonthGem[1][0];
                $BirthGem = $MonthGem[1][1];
            }
            if($BirthNum == 03){
                $BirthMonth = $MonthGem[2][0];
                $BirthGem = $MonthGem[2][1];
            }
            if($BirthNum == 04){
                $BirthMonth = $MonthGem[3][0];
                $BirthGem = $MonthGem[3][1];
            }
            if($BirthNum == 05){
                $BirthMonth = $MonthGem[4][0];
                $BirthGem = $MonthGem[4][1];
            }
            if($BirthNum == 06){
                $BirthMonth = $MonthGem[5][0];
                $BirthGem = $MonthGem[5][1];
            }
            if($BirthNum == 07){
                $BirthMonth = $MonthGem[6][0];
                $BirthGem = $MonthGem[6][1];
            }
            if($BirthNum == 8){
                $BirthMonth = $MonthGem[7][0];
                $BirthGem = $MonthGem[7][1];
            }
            if($BirthNum == 9){
                $BirthMonth = $MonthGem[8][0];
                $BirthGem = $MonthGem[8][1];
            }
            if($BirthNum == 10){
                $BirthMonth = $MonthGem[9][0];
                $BirthGem = $MonthGem[9][1];
            }
            if($BirthNum == 11){
                $BirthMonth = $MonthGem[10][0];
                $BirthGem = $MonthGem[10][1];
            }
            if($BirthNum == 12){
                $BirthMonth = $MonthGem[11][0];
                $BirthGem = $MonthGem[11][1];
            }

            // determines the birth stone of the user
            echo "<tr><td>{$TableRows['first_name']} {$TableRows['last_name']}</td>";
            echo "<td>{$TableRows['phone_num']}</td>";
            echo "<td>{$TableRows['birthday']}</td>";
            echo "<td>$AreaCode</td>";
            echo "<td>$Eligible</td>";
            echo "<td>$BirthMonth</td>";
            echo "<td>$BirthGem</td></tr>";
            $TableRows = mysqli_fetch_assoc($Result);
        } while ($TableRows);

        mysqli_free_result($Result);
        mysqli_close($JaxConnect);
        echo "<p><a href='events.php'>Back to events</a></p>";
        ?>
</div>
</body>
</html>
