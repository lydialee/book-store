<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";
echo $_GET[storeID];
$storeID = $_GET[storeID];
$posting = $storeID;
echo "posting =".$posting;

$query = "SELECT * FROM store WHERE storeID = '{$storeID}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){


    $regionID = $row["storeID"];

    $address = $row["address"];

    $city = $row["city"];

    $state = $row["state"];

    $zipcode = $row["zipcode"];  

    $region = $row["region"];

    $totalSalesmen = $row["totalSalesmen"];

}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>

    </head>
    <body>
        <form method="post" action="editStore.php?posting=<?php echo $posting;?>" autocomplete = "off"> 

            <h2> Edit store information </h2>
            address:<input type="text" name="address" value = "<?php echo $address ?>"><br>
            city:<input type="text" name="city" value = "<?php echo $city ?>"><br>
            state:<input type="text" name="state" value = "<?php echo $state ?>"><br>
            zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode?>"><br>
            region:<input type="text" name="region" value = "<?php echo $region ?>"><br>
            <input type="submit" name="submit2" value="Submit">
        </form>
        <table id = "table1">   
            <tr>
                <th>RegionID</th>
                <th>Region name</th>

            </tr>
            <?php 
    $employeequery = "SELECT * FROM region";
                           $employeeresult = mysqli_query($connect, $employeequery);
                           while($row = mysqli_fetch_assoc($employeeresult)){
                               echo "<tr>";
                               echo "<td>".$row["regionID"]. "</td>";
                               echo "<td>".$row["regionName"]. "</td>";

                               echo "</tr>";
                           }


            ?>
        </table>

        <?php 
        if($_POST["submit2"])
        {
            $posting = $_GET["posting"];
            echo "posting: ".$posting;
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zipcode = $_POST["zipcode"];
            $region = $_POST["region"];

            $finalQuery = "UPDATE store SET address = '{$address}', city = '{$city}', state = '{$state}', zipcode = '{$zipcode}', region = '{$region}' WHERE storeID = '{$posting}' ";
            $result = mysqli_query($connect, $finalQuery);
            if($result)
            {
                $_SESSION["updatedStore"]="updated store information!";  

                header("Location: catalog.php");
            }
        }


        ?>

    </body>

</html>
