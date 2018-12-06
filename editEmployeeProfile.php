<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

$query = "SELECT * FROM salespersons WHERE salespersonID = '{$username}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){

    $firstName = $row["fname"];

    $lastName = $row["lname"];

    $address = $row["address"];

    $city = $row["city"];

    $state = $row["state"];

    $zipcode = $row["zipcode"];

    $email = $row["email"];

    $jobTitle = $row["jobTitle"];
    $storeID = $row["storeID"];
    $salary = $row["salary"];


}

?>
<html>
    <body>
        <head>
            <link rel="stylesheet" type="text/css" href="static/css/style.css">
            <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
            <title>Edit employee information</title>
        </head>
        <div class="page">
            <form class="edit-form" method="post" action="editEmployeeProfile.php" autocomplete = "off"> 
                <h2>Edit employee information</h2>
                first name:<input type="text" name="firstName" value = "<?php echo $firstName ?>" required><br>
                last name:<input type="text" name="lastName" value = "<?php echo $lastName ?>" required><br>
                address:<input type="text" name="address" value = "<?php echo $address ?>" required><br>
                city:<input type="text" name="city" value = "<?php echo $city ?>" required><br>
                state:<input type="text" name="state" value = "<?php echo $state ?>" required><br>
                zipcode: <input type="number" name="zipcode" value = "<?php echo $zipcode ?>" required><br>
                email:<input type="text" name="email" value = "<?php echo $email ?>" required><br>

                store location:<input type="number" name="storeID" value = "<?php echo $storeID ?>" required><br>
                salary:<input type="number" name="salary" value = "<?php echo $salary ?>" required><br>

                <br>

                <input type="submit" name="submit" value="Submit">
            </form>
            <table id = "table1">   
                <tr>
                    <th>StoreID</th>
                    <th>Store city</th>
                    <th>Store state</th>
                </tr>
                <?php 
        $storequery = "SELECT * FROM store";
                                  $storeresult = mysqli_query($connect, $storequery);
                                  while($storerow = mysqli_fetch_assoc($storeresult)){
                                      echo "<tr>";
                                      echo "<td>".$storerow["storeID"]. "</td>";
                                      echo "<td>".$storerow["city"]. "</td>";
                                      echo "<td>".$storerow["state"]. "</td>";
                                      echo "</tr>";
                                  }


                ?>
            </table>
            <?php 

            if($_POST["submit"])
            {
                $finalError=1;
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $address = $_POST["address"];
                $city = $_POST["city"];
                $state = $_POST["state"];
                $zipcode = $_POST["zipcode"];
                $email = $_POST["email"];

                $storeID = $_POST["storeID"];
                $salary = $_POST["salary"];

                $storequery = "SELECT * FROM store";
                $storeresult = mysqli_query($connect, $storequery);
                while($storerow = mysqli_fetch_assoc($storeresult)){
                    if ( $storerow["storeID"]==$storeID)
                    {
                        $finalError=0;
                    }
                }

                if($finalError=0)
                {
                    $finalQuery =" UPDATE salespersons SET fname ='{$firstName}', lname ='{$lastName}', address ='{$address}', city ='{$city}', state ='{$state}', zipcode ='{$zipcode}', email ='{$email}', storeID ='{$storeID}', salary ='{$salary}' WHERE salespersonID = '{$username}'";
                    echo $finalQuery;
                    $result = mysqli_query($connect, $finalQuery);
                    if($result)
                    {
                        $_SESSION["updatedProfile"]="updated profile information!";  

                        header("Location: catalog.php");
                    }
                }
                else{
                    echo "Store id does not exist";
                }



            }

            ?>
        </div>
    </body>
</html>