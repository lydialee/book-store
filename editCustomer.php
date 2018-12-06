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
        <title>edit customer</title>
    </head>
    <body>
        <div id="edit-cus">
            <form method="post" action="editCustomer.php" autocomplete = "off"> 
                <h1> Enter new customer information</h1>
                first name:<input type="text" name="firstName" value = "<?php echo $firstName ?>"> <br>
                last name:<input type="text" name="lastName" value = "<?php echo $lastName ?>"><br>
                address:<input type="text" name="address" value = "<?php echo $address ?>"><br>
                city:<input type="text" name="city" value = "<?php echo $city ?>"><br>
                state:<input type="text" name="state" value = "<?php echo $state ?>"><br>
                zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode ?>"><br>
                email:<input type="text" name="email" value = "<?php echo $email ?>"><br>
                marriage: <input type="text" name="marriage" value = "<?php echo $marriage ?>"> <br>
                <br>
                gender:
                    <input type="radio" name="gender" value ="male" checked> Male
                    <input type="radio" name="gender" value ="female"> Female
                    <input type="radio" name="gender" value ="other"> Other
                <br>
                <br>
                age: <input type="number" name="age" value = "<?php echo $age ?>"><br>
                Income: <input type="number" name ="income" value = "<?php echo $income ?>"><br>
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        
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
        $marriage = $_POST["marriage"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $income = $_POST["income"];
       $finalQuery =" UPDATE customer SET firstName ='{$firstName}', lastName ='{$lastName}', address ='{$address}', city ='{$city}', state ='{$state}', zipcode ='{$zipcode}', email ='{$email}', marriage ='{$marriage}', gender ='{$gender}', age ='{$age}', income ='{$income}' WHERE customerID = '{$username}'";
      $result = mysqli_query($connect, $finalQuery);
        if($result)
        {
            $_SESSION["updatedProfile"]="updated profile information!";  
           
            header("Location: catalog.php");
        }
        

    }

        ?>
    </body>
</html>