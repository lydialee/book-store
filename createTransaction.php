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
        <form method="post" action="createTransaction.php" autocomplete = "off"> 
            <h2> Enter in transaction from your store</h2>
            Employee Username:<input type="text" name="salespersonID" required><br>
            BookID:<input type="text" name="bookID" required><br>
            Quantity:<input type="text" name="bookQuantity" required><br>
            CustomerID:<input type="text" name="customerID" required><br>
            Store Location<br><select name="storeID">
            <option value="1">Philadelphia</option>
            <option value="2">Pittsburgh</option>
            <option value="3">Boston</option>
            <option value="4">New York</option>
            </select>
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
        if($_POST["submit"])
        {
            $storeID = $_POST["storeID"];
            $customerID = $_POST["customerID"];
            $salespersonID = $_POST["salespersonID"];
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
            } 
           echo $bookPrice;
             $customerquery = "SELECT * FROM customer WHERE customerID = '{$customerID}'";
            $customerresult = mysqli_query($connect, $customerquery);
            while($customerrow = mysqli_fetch_assoc($customerresult)){
                $customerFirstName = $customerrow["firstName"];
                $customerLastName = $customerrow["lastName"];
                
            } 
            
            $queryFinal="INSERT INTO transactions (orderNumber, date, salespersonID, bookID, bookQuantity, bookPrice, customerID, fname, lname, storeID) VALUES ('{$orderNumber}','{$date}','{$salespersonID}','{$bookID}','{$bookQuantity}','{$bookPrice}','{$customerID}','{$customerFirstName}','{$customerLastName}','{$storeID}')";
           $resultFinal = mysqli_query($connect, $queryFinal);
            $_SESSION["purchase"] = "confirmed purchase!!";
             header("Location: catalog.php");
        }
        ?>
    </body>
</html>