<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

$query = "SELECT * FROM customer WHERE customerID = '{$username}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    echo $row["customerID"];
    echo "<br>";
    echo $row["firstName"];
    $firstName = $row["firstName"];
    echo "<br>";
    echo $row["lastName"];
    echo "<br>";
    $lastName = $row["lastName"];
    echo $row["address"];
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
    echo $row["email"];
    echo "<br>";
    $email = $row["email"];
    echo $row["customerType"];
    echo "<br>";
    $customerType = $row["customerType"];
    echo $row["businessName"];
    echo "<br>";
    $businessName = $row["businessName"];
    echo $row["businessIncome"];
    echo "<br>";
    $businessIncome = $row["businessIncome"];
    echo $row["businessCategory"];
    echo "<br>";
    $businessCategory = $row["businessCategory"];
    echo $row["marriage"];
    echo "<br>";
    $marriage = $row["marriage"];
    echo $row["age"];
    echo "<br>";
    $age = $row["age"];
    echo $row["gender"];
    echo "<br>";
    $gender = $row["gender"];
    echo $row["income"];
    echo "<br>";
    $income = $row["income"];
}

?>
<html>
    <body>

        <form method="post" action="editBusinessCustomer.php" autocomplete = "off"> 
            <h2> Enter new customer information</h2>
            first name:<input type="text" name="firstName" value = "<?php echo $firstName ?>"> <br>
            last name:<input type="text" name="lastName" value = "<?php echo $lastName ?>"><br>
            address:<input type="text" name="address" value = "<?php echo $address ?>"><br>
            city:<input type="text" name="city" value = "<?php echo $city ?>"><br>
            state:<input type="text" name="state" value = "<?php echo $state ?>"><br>
            zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode ?>"><br>
            email:<input type="text" name="email" value = "<?php echo $email ?>"><br>
            <br>
            Name of business <input type="text" name="businessName" value = "<?php echo $businessName ?>"><br>
            Type of business: <input type="text" name="businessCat" value = "<?php echo $businessCategory ?>"> <br>
            <br> <input type="radio" name="businessCat" value ="large business" checked> large business <br> 
            <input type="radio" name="businessCat" value ="small business"> small business <br> 
            <input type="radio" name="businessCat" value ="LLC"> LCC <br> 
            Business Income: <input type="number" name ="businessIncome" value = "<?php echo $businessIncome?>"><br>
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
    </body>
</html>