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
        <title>transactions</title>
    </head>
    <body>
        
        <div id="trans" class="page">
            <ul class="hyper-btns">
                <li class="cart">
                    <a href="shoppingCart.php" title="Shopping cart">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M958.8 402.6c-1.8-18.6-8.9-36.4-20.7-51.6-19-24.3-47.6-38.2-78.5-38.2H433.1c-1.8 0-3.6 0.3-5.4 0.5l-104.5 2.1-13.4-54c-16.5-66.6-76-113.2-144.6-113.2H97c-19.2 0-34.7 15.5-34.7 34.7s15.5 34.7 34.7 34.7h68.2c36.6 0 68.4 24.8 77.2 60.4l19.9 80.5c0 0.1 0 0.3 0.1 0.4l57.7 233c15.5 62.6 71.4 106.4 136 106.4H782c64.5 0 120.4-43.8 135.9-106.4l38.5-155.3c2.8-11.2 3.6-22.7 2.4-34zM415.3 737.2c-40.5 0-73.4 32.8-73.4 73.4 0 40.5 32.8 73.4 73.4 73.4 40.5 0 73.4-32.8 73.4-73.4-0.1-40.6-32.9-73.4-73.4-73.4zM809.8 737.2c-40.5 0-73.4 32.8-73.4 73.4 0 40.5 32.8 73.4 73.4 73.4 40.5 0 73.4-32.8 73.4-73.4 0-40.6-32.9-73.4-73.4-73.4z" /></svg>
                        <span class="icon-info">Cart</span>
                    </a>
                </li>
                <li class="edit">
                    <a href="editCustomer.php" title="Edit profile">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M512.3 320.5m-227.9 0a227.9 227.9 0 1 0 455.8 0 227.9 227.9 0 1 0-455.8 0ZM703 523c-49.9 47-116.9 75.9-190.7 75.9s-140.8-29-190.7-75.9C187.9 592.2 96.3 731.8 96.3 892.5c0 19.9 16.1 36 36 36h760.2c19.9 0 36-16.1 36-36-0.1-160.7-91.8-300.3-225.5-369.5z" /></svg>
                        <span class="icon-info">Profile</span>
                    </a>
                </li>
                <li class="trans">
                    <a href="transactions.php" title="All transactions">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M513 63.8c-246.5 0-446.3 199.8-446.3 446.3S266.5 956.4 513 956.4s446.3-199.8 446.3-446.3S759.5 63.8 513 63.8z m163.4 297.4L596.6 441h34.9c19.1 0 34.6 15.5 34.6 34.6s-15.5 34.6-34.6 34.6h-83.9v44.2h83.9c19.1 0 34.6 15.5 34.6 34.6s-15.5 34.6-34.6 34.6h-83.9v96c0 19.1-15.5 34.6-34.6 34.6s-34.6-15.5-34.6-34.6v-96h-83.9c-19.1 0-34.6-15.5-34.6-34.6s15.5-34.6 34.6-34.6h83.9v-44.2h-83.9c-19.1 0-34.6-15.5-34.6-34.6s15.5-34.6 34.6-34.6h34.9l-79.8-79.8c-13.5-13.5-13.5-35.4 0-49 13.5-13.5 35.4-13.5 49 0L513 426.7l114.4-114.4c13.5-13.5 35.4-13.5 49 0 13.5 13.5 13.5 35.4 0 48.9z" /></svg>
                        <span class="icon-info">Trans</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="homePage.php" title="Logout">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1544119098838" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1910" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128"><defs><style type="text/css"></style></defs><path fill="#11286c" d="M512 64C264.8 64 64 264.8 64 512s200.8 448 448 448 448-200.8 448-448S759.2 64 512 64z m-32 128h64v384h-64V192z m32 640c-176.8 0-320-143.2-320-320 0-131.2 79.2-244 192-293.6v72C307.2 334.4 256 417.6 256 512c0 140.8 115.2 256 256 256s256-115.2 256-256c0-94.4-51.2-177.6-128-221.6v-72c112.8 49.6 192 162.4 192 293.6 0 176.8-143.2 320-320 320z" p-id="1911"></path></svg>
                        <span class="icon-info">Logout</span>
                    </a>
                </li>
            </ul>

            <h1><b>Transactions</b></h1>
            <a href="aggregateFunctions.php" > Aggregate functions</a><br>
            <a href='createTransaction.php'> Create transaction</a>  <br>
            

            <form id="filters" method="post" action="transactions.php" autocomplete = "off">
                <p>Order by</p>
                <input type="submit" name="HighQuantity" value="high quantity">
                <input type="submit" name="LowQuantity" value="low quantity">
                <input type="submit" name="HighPrice" value="high price">
                <input type="submit" name="LowPrice" value="low price">
                <input type="submit" name="Customer" value="customer">
                <input type="submit" name="City" value="city">

            </form>
            <table id = "table1">   
                <tr>
                    <th>Order number</th>
                    <th>Date</th>
                    <th>Book title</th>
                    <th>Book quantity</th>
                    <th>Total price</th>
                    <th>Customer ID</th>
                       <th>Salesperson ID</th>
                    <th> Store location</th>
                    <th> Edit</th>


                </tr>
                <?php
                $query = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle";
                include('databaseConnect.php');
                $queryHighQuantity ="
    SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID GROUP BY transactions.orderNumber, transactions.date, book.bookTitle ORDER BY `transactions`.`bookQuantity` DESC";
                $queryLowQuantity = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
    ORDER BY `transactions`.`bookQuantity`  ASC";
                $queryHighPrice ="SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
    ORDER BY `totalPrice`  DESC";
                $queryLowPrice = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
    ORDER BY `totalPrice`  ASC";
                $queryCustomer ="SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle  
    ORDER BY customerID";
                $queryCity = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID
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
                                    <td>" . $row["salespersonID"]."</td>
                                     <td>" . $row["city"]."</td>";
                    
                    $check = "SELECT * FROM salespersons WHERE salespersonID = '{$username}'";

                    $checkresult = mysqli_query($connect, $check);
                    while($row2 = mysqli_fetch_assoc($checkresult)){
                        if($row2["jobTitle"] == "administrator")
                        {
                            echo "<td> <form method='post' action='editTransactions.php?transactionID=".$row['orderNumber']."'> "; 
                            echo " <input type='submit' name='submit' value='Edit'></form></td>";
                        }
                    }
                    echo "</tr>";
                }

                ?>

            </table>
        </div>
    </body>
</html>