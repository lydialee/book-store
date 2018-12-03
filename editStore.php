<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";
echo $_GET[storeID];
$storeID = $_GET[storeID];

$query = "SELECT * FROM storeID WHERE storeID = '{$storeID}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){

    echo $row["storeID"];
    $regionID = $row["storeID"];
    echo "<br>";
    $address = $row["address"];
    echo $row["city"];
    echo "<br>";
    $city = $row["city"];
    echo $row["state"];
    echo "<br>";
    $state = $row["state"];
    echo $row["zipcode"];
    echo "<br>";
    $zipcode = $row["zipcode"];  
    echo $row["region"];
    echo "<br>";
    $region = $row["region"];
    echo $row["totalSalesmen"];
    echo "<br>";
    $totalSalesmen = $row["totalSalesmen"];
   
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>edit store</title>
    </head>
    <body>
        <form method="post" action="createStore.php" autocomplete = "off"> 

            <h2> Edit store information </h2>
            address:<input type="text" name="address" value = "<?php echo $address ?>" required><br>
            city:<input type="text" name="city" value = "<?php echo $city ?>" required><br>
            state:<input type="text" name="state" value = "<?php echo $state ?>" required><br>
            zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode?>"><br>
            region:<input type="text" name="region" value = "<?php echo $region ?>" required><br>
                <input type="submit" name="submit" value="Submit">
        </form>


        <?php 
    if($_POST["submit"])
    {
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zipcode = $_POST["zipcode"];
        $region = $_POST["region"];
        $regionManager = $_POST["manager"];
        $finalQuery = "UPDATE store SET address = '{$address}', city = '{$city}', state = '{$state}', zipcode = '{$zipcode}', region = '{$region}' WHERE storeID = '{$storeID}' ";
        $result = mysqli_query($connect, $finalQuery);
        if($result)
        {
            $_SESSION["updatedStore"]="updated region information!";  
           
            header("Location: catalog.php");
        }
    }


        ?>

    </body>

</html>
