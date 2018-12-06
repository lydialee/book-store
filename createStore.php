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

        <form method="post" action="createStore.php" autocomplete = "off"> 

            <h2> Enter a new store location </h2>
            address:<input type="text" name="address"><br>
            city:<input type="text" name="city"><br>
            state:<input type="text" name="state"><br>
            zipcode: <input type="number" name="zipcode"><br>
            region:<input type="number" name="region"><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <table id = "table1">   
            <tr>
                <th>regionID</th>
                <th>regionName</th>

            </tr>
            <?php 
            $storequery = "SELECT * FROM region";
            $storeresult = mysqli_query($connect, $storequery);
            while($storerow = mysqli_fetch_assoc($storeresult)){
                echo "<tr>";
                echo "<td>".$storerow["regionID"]. "</td>";
                echo "<td>".$storerow["regionName"]. "</td>";


                echo "</tr>";
            }


            ?>
        </table>
        <?php

        if($_POST["submit"])
        {

            $finalError=1;
            $COUNTquery = "SELECT * FROM store";
            $COUNTresult = mysqli_query($connect, $COUNTquery);
            while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
                $storeNumber = $COUNTrow["storeID"];
            }
            $storeNumber++;
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zipcode = $_POST["zipcode"];
            $region = $_POST["region"];

            $storequery = "SELECT * FROM region";
            $storeresult = mysqli_query($connect, $storequery);
            while($storerow = mysqli_fetch_assoc($storeresult)){
                if($region == $storerow["regionID"])
                {
                    $finalError=0;
                }
            }

            echo $finalError;
            echo "</tr>";
            if($finalError==0)
            {
                $addtoStore = "INSERT INTO store (storeID, address, city, state, zipcode, region, totalSalesmen) VALUES ('{$storeNumber}','{$address}','{$city}','{$state}','{$zipcode}','{$region}''0')";
                echo $addtoStore;
                $result = mysqli_query($connect, $addtoStore);
                if($result)
                {
                    $_SESSION["addedStore"] = "added store location";
                    header("Location: catalog.php");

                }

            }
            else{
                echo "region does not exist";
            }

        }
        ?>
    </body>
</html>