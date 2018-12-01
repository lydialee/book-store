<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";
$added = $_SESSION["addedToCart"];
echo $added;

$purchase = $_SESSION["purchase"];
echo $purchase;
$uname = strip_tags($username);
$uname = htmlspecialchars($username);


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create new employee</title>
    </head>
    <body>
        <a href="shoppingCart.php"> Click here for shopping cart</a>  <br> 
         <a href="catalog.php"> Click here for main menu</a>  <br>  
        <h1><b>Transactions</b></h1>
        <form method="post" action="transactions.php" autocomplete = "off">

            <input type="submit" name="HighQuantity" value="Order by high quantity">
            <input type="submit" name="LowQuantity" value="Order by low quantity">
            <input type="submit" name="HighPrice" value="Order by high price">
             <input type="submit" name="LowPrice" value="Order by low price">
            <input type="submit" name="Customer" value="Order by customer">
            <input type="submit" name="City" value="Order by city">
          
        </form>
        <table id = "table1">   
            <tr>
                <th>Order number</th>
                <th>Date</th>
                <th>Book title</th>
                 <th>Book quantity</th>
                <th>Total price</th>
                <th>Customer ID</th>
                  <th> Store location</th>
                

            </tr>
            <?php
            $query = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle";
            include('databaseConnect.php');
            $queryHighQuantity ="
SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID GROUP BY transactions.orderNumber, transactions.date, book.bookTitle ORDER BY `transactions`.`bookQuantity` DESC";
            $queryLowQuantity = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
ORDER BY `transactions`.`bookQuantity`  ASC";
            $queryHighPrice ="SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
ORDER BY `totalPrice`  DESC";
            $queryLowPrice = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
ORDER BY `totalPrice`  ASC";
            $queryCustomer ="SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
ORDER BY customerID";
            $queryCity = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
            GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
ORDER BY city";
   
            $result = mysqli_query($connect, $query);
            if($_POST["HighQuantity"])
            {
                $result = mysqli_query($connect, $queryHighQuantity );
            }
            if($_POST["LowQuantity"])
            {
                $result = mysqli_query($connect, $queryLowQuantity );
            }
            if($_POST["HighPrice"])
            {
                $result = mysqli_query($connect, $queryHighPrice);
            }
              if($_POST["LowPrice"])
            {
                $result = mysqli_query($connect, $queryLowPrice);
            }
            if($_POST["Customer"])
            {
                $result = mysqli_query($connect, $queryCustomer);
            }
            if($_POST["City"])
            {
                $result = mysqli_query($connect, $queryCity);
            }
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>
                                <td>".$row["orderNumber"]. "</td>
                                <td>" . $row["date"]. "</td>
                                <td>" . $row["bookTitle"]."</td>
                                <td>" . $row["bookQuantity"]."</td>
                                <td>$" . $row["totalPrice"]. "</td>
                                <td>" . $row["customerID"]."</td>
                                 <td>" . $row["city"]."</td>";
            }

            ?>

        </table>
    </body>
</html>