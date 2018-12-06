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
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create new employee</title>
    </head>
    <body>
        <div id="create-employee" class="page">
            <form class="edit-form" method="post" action="createNewEmployee.php" autocomplete = "off"> 
                <h2> Enter new employee information</h2>
                username: <input type="text" name="username" required><br>
                password: <input type="text" name="password" required><br>
                first name: <input type="text" name="firstName" required><br>
                last name: <input type="text" name="lastName" required><br>
                address: <input type="text" name="address" required><br>
                city: <input type="text" name="city" required><br>
                state: <input type="text" name="state" required><br>
                zipcode:  <input type="number" name="zipcode" required><br>
                email: <input type="text" name="email" required><br>
                Store Location: <input type="number" name="storeID" required><br>

                jobTitle: <input type="radio" name="jobTitle" value="employee" checked> 
                salary:<input type="number" name="salary" required>
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <table id = "table1">   
            <tr>
                <th>SalespersonID</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Job title</th>
            </tr>
            <?php 
            $storequery = "SELECT * FROM store";
            $storeresult = mysqli_query($connect, $storequery);
            while($row = mysqli_fetch_assoc($storeresult)){
                echo "<tr>";
                echo "<td>".$row["storeID"]. "</td>";
                echo "<td>".$row["address"]. "</td>";
                echo "<td>".$row["city"]. "</td>";
                echo "<td>".$row["state"]. "</td>";

                echo "</tr>";
            }


            ?>
        </table>
        <?php
        if($_POST["submit"])
        {
            $finalError=1;
            echo $storeID;
            $checkStore = "SELECT * FROM store";
            $storeresult = mysqli_query($connect, $checkStore);
            while($row = mysqli_fetch_assoc($storeresult)){
                if($row["storeID"]==$storeID)
                {
                    $finalError = 0;

                }
            }

            $query0 ="INSERT INTO Login (username, password) VALUES ('{$username}','{$password}')";

            $result0 = mysqli_query($connect, $query0);
            if($result0)
            {
                if($finalError ==0)
                {
                    $query ="INSERT INTO salespersons (salespersonID, fname, lname, address, city, state, zipcode, email, jobtitle, storeID, salary) VALUES ('{$username}','{$firstName}','{$lastName}','{$address}','{$city}','{$state}','{$zipcode}','{$email}','employee','{$storeID}','{$salary}')";
                    echo $query;
                    $result = mysqli_query($connect, $query);
                    if($result)
                    {

                        $query = "SELECT * from store WHERE storeID = '{$storeID}'";
                        $result = mysqli_query($connect, $query);
                        while($row2 = mysqli_fetch_assoc($result)){
                            $change = $row2["totalSalesmen"];
                        }
                        $change= $change + 1;
                        $query = "UPDATE store SET totalSalesmen ='{$change}' WHERE storeID = '{$storeID}'";
                        $result2 = mysqli_query($connect, $query);
                        if($result2)
                        {
                            $_SESSION["username"]=$username;  
                            echo $_SESSION["username"];
                            header("Location: homePage.php");
                        }



                    }




                }
                else{

                    echo "store doesnt exist ";
                }

            }
            else{

                echo "username already chosen ";
            }



        }




        ?>
    </body>
</html>