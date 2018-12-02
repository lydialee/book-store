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
        <title>create region</title>
    </head>
    <body>

        <form method="post" action="createRegion.php" autocomplete = "off"> 

            <h2> Enter a new region location </h2>
            Region name:<input type="text" name="name"><br>
            Region manager:<input type="text" name="manager"><br>
           
                <input type="submit" name="submit" value="Submit">
        </form>
        <?php

        if($_POST["submit"])
        {

            $COUNTquery = "SELECT * FROM region";
            $COUNTresult = mysqli_query($connect, $COUNTquery);
            while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
                $regionNumber = $COUNTrow["regionID"];
            }
             $regionNumber++;
            $name = $_POST["name"];
            $manager = $_POST["manager"];
           
            
            $addtoRegion = "INSERT INTO region (regionID, regionName, regionManager) VALUES ('{$regionNumber}','{$name}','{$manager}')";
            echo $addtoRegion;
             $result = mysqli_query($connect, $addtoRegion);
            if($result)
            {
                $_SESSION["addedRegion"] = "added region location";
                 header("Location: catalog.php");
                
            }
            

        }
        ?>
    </body>
</html>