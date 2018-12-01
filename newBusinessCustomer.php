<?php
include('databaseConnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //used to show the sentences for the form that will be filled out
    $firstName = $lastName =$address=$city=$state=$zipcode=$email=$storeID=$jobTitle=$salary=" ";

    if($_POST["submit"])
    {
        $enter=1;	
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $zipcode = $_POST["zipcode"];
    $email = $_POST["email"];
    $customerType = 'business';
    $businessName = $_POST["businessName"];
    $businessCat = $_POST["businessCat"];
    $businessIncome = $_POST["businessIncome"];
    $marriage = "0";
    $gender = "0";
    $age = "0";
    $income = "0";
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Home page</title>
    </head>
    <body>

        <form method="post" action="createNewCustomer.php" autocomplete = "off"> 
            <h2> Enter new employee information</h2>
            username:<input type="text" name="username"> <br>
            password:<input type="text" name="password"><br>
            first name:<input type="text" name="firstName"> <br>
            last name:<input type="text" name="lastName"><br>
            address:<input type="text" name="address"><br>
            city:<input type="text" name="city"><br>
            state:<input type="text" name="state"><br>
            zipcode: <input type="number" name="zipcode"><br>
            email:<input type="text" name="email"><br>
            <br>
            Name of business <input type="text" name="businessName"><br>
            Type of business: <input type="text" name="businessCat"> <br>
            <br> <input type="radio" name="businessCat" value ="large business" checked> large business <br> 
            <input type="radio" name="businessCat" value ="small business"> small business <br> 
            <input type="radio" name="businessCat" value ="LLC"> LCC <br> 
            Business Income: <input type="number" name ="businessIncome"><br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        $query0 ="INSERT INTO Login (username, password) VALUES ('{$username}','{$password}')";
        $result0 = mysqli_query($connect, $query0);
        $query ="INSERT INTO customer(customerID, firstName, lastName, address, city, state, zipcode, email, customerType, businessName, businessIncome, businessCategory, marriage, age, gender, income) VALUES ('{$username}','{$firstName}','{$lastName}','{$address}','{$city}','{$state}','{$zipcode}','{$email}','{$customerType}','{$businessName}','{$businessIncome}','{$businessCat}','{$marriage}','{$age}','{$gender}','{$income}')";
        echo $query;
        $result = mysqli_query($connect, $query);
        if($result)
        {
            $_SESSION["username"]=$username;  
            echo $_SESSION["username"];
            header("Location: homePage.php");
        }
        ?>
    </body>
</html>