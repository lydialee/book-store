<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";



?>
<html>
    <body>

        <form method="post" action="createStore.php" autocomplete = "off"> 

            <h2> Enter a new store location </h2>
            address:<input type="text" name="address"><br>
            city:<input type="text" name="city"><br>
            state:<input type="text" name="state"><br>
            zipcode: <input type="number" name="zipcode"><br>
            region:<input type="text" name="region"><br>
                <input type="submit" name="submit" value="Submit">
        </form>
        <?php

        if($_POST["submit"])
        {

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
            
            $addtoStore = "INSERT INTO store (storeID, address, city, state, zipcode, region) VALUES ('{$storeNumber}','{$address}','{$city}','{$state}','{$zipcode}','{$region}')";
            echo $addtoStore;
             $result = mysqli_query($connect, $addtoStore);
            if($result)
            {
                $_SESSION["addedStore"] = "added store location";
                 header("Location: catalog.php");
                
            }

        }
        ?>
    </body>
</html>