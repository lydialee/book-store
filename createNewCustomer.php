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
    $customerType = 'non-business';
    $businessName = '0';
    $businessCat = '0';
    $businessIncome = '0';
    $marriage = $_POST["marriage"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $income = $_POST["income"];
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create new customer</title>
    </head>
    <body>
        <?php echo $_SESSION["error"];
        $_SESSION["error"]=" ";
        ?>

        <form method="post" action="createNewCustomer.php" autocomplete = "off"> 
            <h2> Enter new customer information</h2>
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
          <input type="radio" name="marriage" value ="not married" checked> not married <br> 
            <input type="radio" name="marriage" value ="married"> married <br> 
         
            <br> <input type="radio" name="gender" value ="male" checked> Male <br> 
            <input type="radio" name="gender" value ="female"> Female <br> 
            <input type="radio" name="gender" value ="other"> Other <br> 
            age: <input type="number" name="age"><br>
            Income: <input type="number" name ="income"><br>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if($_POST["submit"])
        {
            $query0 ="INSERT INTO Login (username, password) VALUES ('{$username}','{$password}')";
        $result0 = mysqli_query($connect, $query0);
        $query ="INSERT INTO customer(customerID, firstName, lastName, address, city, state, zipcode, email, customerType, businessName, businessIncome, businessCategory, marriage, age, gender, income) VALUES ('{$username}','{$firstName}','{$lastName}','{$address}','{$city}','{$state}','{$zipcode}','{$email}','{$customerType}','{$businessName}','{$businessIncome}','{$businessCat}','{$marriage}','{$age}','{$gender}','{$income}')";
        
        $result = mysqli_query($connect, $query);
        if($result)
        {
            $_SESSION["username"]=$username;  
            echo $_SESSION["username"];
            header("Location: homePage.php");
        }
        else{
            echo "username already chosen";
        }
            
        }
        
        ?>
    </body>
</html>