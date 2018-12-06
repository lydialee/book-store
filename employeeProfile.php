<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

?>

<html>
    <body>
       
    
  
        <h1> Employee profile </h1>
        <a href="editEmployeeProfile.php"> edit employee</a><br>
        <a href="catalog.php"> home</a> 
        <br>
        <?php 
        $userquery = "SELECT * FROM salespersons WHERE salespersonID = '{$username}'";
        $userresult = mysqli_query($connect, $userquery);

        while($row = mysqli_fetch_assoc($userresult)){
            echo "User ID: ".$row["salespersonID"];
            echo "<br>";
            echo "<br>";
            echo "firstName: ".$row["fname"];
            echo "<br>";
            echo "<br>";
            echo "lastName: ".$row["lname"];
            echo "<br>";
            echo "<br>";
            echo "address: ".$row["address"];
            echo "<br>";
            echo "<br>";
            echo "city: ".$row["city"];
            echo "<br>";
            echo "<br>";
            echo "state: ".$row["state"];
            echo "<br>";
            echo "<br>";
            echo "zipcode: ".$row["zipcode"];
            echo "<br>";
            echo "<br>";
            echo "email: ".$row["email"];
            echo "<br>";
            echo "<br>";
             echo "Job title: ".$row["jobTitle"];
            echo "<br>";
            echo "<br>";
             echo "Store assigned: ".$row["storeID"];
            echo "<br>";
            echo "<br>";
          
            echo "Salary: ".$row["salary"];

        }
        ?>

    </body>
</html>