<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";
$date = date("Y-m-d H:i:s");
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Home page</title>
    </head>
    <body>

        <?php
        include('databaseConnect.php');
        $query = "SELECT book.bookID, book.bookTitle, ShoppingCarts.quantity, book.bookPrice FROM book, ShoppingCarts, customer WHERE customer.customerID = ShoppingCarts.customerID AND ShoppingCarts.bookID = book.bookID";
        $result = mysqli_query($connect, $query);

        $queryCustomer = "SELECT customer.firstName, customer.lastName
                From customer
                where customer.customerID = '{$username}'";
        $resultCustomer = mysqli_query($connect, $queryCustomer);
        while($row2 = mysqli_fetch_assoc($resultCustomer)){
            $firstName=$row2["firstName"];
            $lastName=$row2["lastName"];
        }

        $COUNTquery = "SELECT * FROM transactions";
        $COUNTresult = mysqli_query($connect, $COUNTquery);
        while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
            $orderNumber = $COUNTrow["orderNumber"];
        }
        $orderNumber++;


        while($row = mysqli_fetch_assoc($result)){

            $salespersonID = "online";
            $bookID = $row["bookID"];
            $bookQuantity = $row["quantity"];
            $bookPrice = $row["bookPrice"];
            $storeID=0;

            $queryFinal="INSERT INTO transactions (orderNumber, date, salespersonID, bookID, bookQuantity, bookPrice, customerID, fname, lname, storeID) VALUES ('{$orderNumber}','{$date}','{$salespersonID}','{$bookID}','{$bookQuantity}','{$bookPrice}','{$username}','{$firstName}','{$lastName}','{$storeID}')";
            echo $queryFinal;
             $resultFinal = mysqli_query($connect, $queryFinal);
              $orderNumber++;
          
            
            
           
        }
         $_SESSION["purchase"] = "confirmed purchase!!";


        $deleteQuery = "DELETE FROM ShoppingCarts WHERE customerID = '{$username}'";
        $deleteResults = mysqli_query($connect, $deleteQuery);
        header("Location: catalog.php");

        ?>

    </body>
</html>