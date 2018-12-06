<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";



?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>

    </head>
    <body>

        <form method="post" action="createRegion.php" autocomplete = "off"> 

            <h2> Enter a new region location </h2>
            Region name:<input type="text" name="name"><br>
            Region manager ID:<input type="number" name="manager"><br>

            <input type="submit" name="submit" value="Submit">
        </form>
        <table id = "table1">   
            <tr>
                <th>SalespersonID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Job title</th>
            </tr>
            <?php 
            $employeequery = "SELECT * FROM salespersons";
            $employeeresult = mysqli_query($connect, $employeequery);
            while($row = mysqli_fetch_assoc($employeeresult)){
                echo "<tr>";
                echo "<td>".$row["salespersonID"]. "</td>";
                echo "<td>".$row["fname"]. "</td>";
                echo "<td>".$row["lname"]. "</td>";
                echo "<td>".$row["jobTitle"]. "</td>";
                echo "</tr>";
            }


            ?>
        </table>
        <?php

        if($_POST["submit"])
        {
            $finalError = 1;
            $name = $_POST["name"];
            $manager = $_POST["manager"];

            $employeequery = "SELECT * FROM salespersons";
            $employeeresult = mysqli_query($connect, $employeequery);
            while($row = mysqli_fetch_assoc($employeeresult)){
                if($manager == $row["salespersonID"])
                {
                    $finalError= 0;
                }
            }
            $COUNTquery = "SELECT * FROM region";
            $COUNTresult = mysqli_query($connect, $COUNTquery);
            while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
                $regionNumber = $COUNTrow["regionID"];
            }
            $regionNumber++;

            if($finalError = 0)
            {
                $addtoRegion = "INSERT INTO region (regionID, regionName, regionManager) VALUES ('{$regionNumber}','{$name}','{$manager}')";
                echo $addtoRegion;
                $result = mysqli_query($connect, $addtoRegion);
                if($result)
                {
                    $_SESSION["addedRegion"] = "added region location";
                    header("Location: catalog.php");

                }

            }


        }
        ?>
    </body>
</html>