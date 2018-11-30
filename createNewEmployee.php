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
        $storeID = $_POST["storeID"];
        $jobTitle = $_POST["jobTitle"];
        $salary = $_POST["salary"];
}


?>
<html>
    <body>
        <form method="post" action="createNewEmployee.php" autocomplete = "off"> 
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
            Store Location<br><select name="storeID">
            <option value="1">Philadelphia</option>
            <option value="2">Pittsburgh</option>
            <option value="3">Boston</option>
            <option value="4">New York</option>
      
            </select><br><br>
            jobTitle<br> <input type="radio" name="jobTitle" value="employee" checked> employee
            <input type="radio" name="jobTitle" value="manager"> manager 
            <input type="radio" name="jobTitle" value="administrator"> administrator<br>
            salary:<input type="number" name="salary">
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php

        echo $firstName;
        echo $lastName;
        echo $address;
        echo $city;
        echo $state;
        echo $zipcode;
        echo $email;
        echo $storeID;
        echo $jobTitle;
        echo $salary;
      
        $query0 ="INSERT INTO Login (username, password) VALUES ('{$username}','{$password}')";
        
        $result0 = mysqli_query($connect, $query0);

        $query ="INSERT INTO salespersons (salespersonID, fname, lname, address, city, state, zipcode, email, jobtitle, storeID, salary) VALUES ('{$username}','{$firstName}','{$lastName}','{$address}','{$city}','{$state}','{$zipcode}','{$email}','{$jobTitle}','{$storeID}','{$salary}')";


       
        $result = mysqli_query($connect, $query);
        if($result)
        {
            $_SESSION["username"]=$username;  
            echo $_SESSION["username"];
            header("Location:homePage.php");
        }


        ?>
    </body>
</html>