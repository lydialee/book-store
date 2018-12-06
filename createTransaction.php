<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";
$date = date("Y-m-d H:i:s");


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create transaction</title>
    </head>
    <body>
        <div class="page">
            <form class="edit-form" method="post" action="createTransaction.php" autocomplete = "off"> 
                <h2> Enter in transaction from your store</h2>
                BookID:<input type="text" name="bookID" required><br>
                Quantity:<input type="text" name="bookQuantity" required><br>
                Store ID:<input type="text" name="storeID" required><br>
                <br>
                <input type="submit" name="submit" value="Submit">
            </form>
            <?php
            if($_POST["submit"])
            {
                $bookError==1;
                $customerError=1;
                $storeID = $_POST["storeID"];
                $customerID = "inStore";
                $salespersonID = $username;
                $bookID =$_POST["bookID"];
                 $bookQuantity = $_POST["bookQuantity"];
                $COUNTquery = "SELECT * FROM transactions";
                $COUNTresult = mysqli_query($connect, $COUNTquery);
                while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
                    $orderNumber = $COUNTrow["orderNumber"];
                }
                $orderNumber++;
               
                echo $orderNumber;
                echo "<br>";
                echo $bookID;
                $bookquery = "SELECT * FROM book WHERE bookID = '{$bookID}'";
                echo $bookquery;
                $bookresult = mysqli_query($connect, $bookquery);
               
                while($bookrow = mysqli_fetch_assoc($bookresult)){
                    $bookPrice = $bookrow["bookPrice"];
                    bookError==0;
                } 
               echo $bookPrice;
                 $customerquery = "SELECT * FROM customer WHERE customerID = '{$customerID}'";
                $customerresult = mysqli_query($connect, $customerquery);
                while($customerrow = mysqli_fetch_assoc($customerresult)){
                    $customerFirstName = $customerrow["firstName"];
                    $customerLastName = $customerrow["lastName"];
                     $customerError==1;
                } 
                
                $queryFinal="INSERT INTO transactions (orderNumber, date, salespersonID, bookID, bookQuantity, bookPrice, customerID, fname, lname, storeID) VALUES ('{$orderNumber}','{$date}','{$salespersonID}','{$bookID}','{$bookQuantity}','{$bookPrice}','{$customerID}','{$customerFirstName}','{$customerLastName}','{$storeID}')";
               $resultFinal = mysqli_query($connect, $queryFinal);
                $_SESSION["purchase"] = "confirmed purchase!!";
                 header("Location: catalog.php");
            }
            ?>
        </div>
    </body>
</html>