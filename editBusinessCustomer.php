<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

$query = "SELECT * FROM customer WHERE customerID = '{$username}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    $firstName = $row["firstName"];
 
    $lastName = $row["lastName"];
  
    $address = $row["address"];
  
    $city = $row["city"];
 
    $state = $row["state"];
  
    $zipcode = $row["zipcode"];
 
    $email = $row["email"];
 
    $customerType = $row["customerType"];
  
    $businessName = $row["businessName"];
   
    $businessIncome = $row["businessIncome"];
   
    $businessCategory = $row["businessCategory"];
 
    $marriage = $row["marriage"];
   
    $age = $row["age"];
   
    $gender = $row["gender"];
  
    $income = $row["income"];
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>edit business customer</title>
    </head>
    <body>
        <div class="page">
            <form class="edit-form" method="post" action="editBusinessCustomer.php" autocomplete = "off"> 
                <h2> Enter new customer information</h2>
                first name:<input type="text" name="firstName" value = "<?php echo $firstName ?>" required><br>
                last name:<input type="text" name="lastName" value = "<?php echo $lastName ?>" required><br>
                address:<input type="text" name="address" value = "<?php echo $address ?>" required><br>
                city:<input type="text" name="city" value = "<?php echo $city ?>" required><br>
                state:<input type="text" name="state" value = "<?php echo $state ?>" required><br>
                zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode ?>" required><br>
                email:<input type="text" name="email" value = "<?php echo $email ?>" required><br>
                <br>
                Name of business: <input type="text" name="businessName" value = "<?php echo $businessName ?>" required><br>
                Type of business: <input type="text" name="businessCat" value = "<?php echo $businessCategory ?>" required><br>
                <br>
                Scale of business:
                <input type="radio" name="businessCat" value ="large business" checked> large business
                <input type="radio" name="businessCat" value ="small business"> small business
                <input type="radio" name="businessCat" value ="LLC"> LCC
                <br><br>
                Business Income: <input type="number" name ="businessIncome" value = "<?php echo $businessIncome?>" required><br>
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php 

        if($_POST["submit"])
        {
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zipcode = $_POST["zipcode"];
            $email = $_POST["email"];
            $businessName = $_POST["businessName"];
            $businessCategory = $_POST["businessCat"];
            $businessIncome = $_POST["businessIncome"];
     
           $finalQuery =" UPDATE customer SET firstName ='{$firstName}', lastName ='{$lastName}', address ='{$address}', city ='{$city}', state ='{$state}', zipcode ='{$zipcode}', email ='{$email}', businessName ='{$businessName}', businessIncome ='{$businessIncome}', businessCategory ='{$businessCategory}' WHERE customerID = '{$username}'";
          $result = mysqli_query($connect, $finalQuery);
            if($result)
            {
                $_SESSION["updatedProfile"]="updated profile information!";  
               
                header("Location: catalog.php");
            }
            

        }

            ?>
        </div>
    </body>
</html>