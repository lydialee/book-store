<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";


?>


<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class="page">
            <a href="catalog.php"> home</a>  <br> 
                

            <h1><b>Shopping Cart :</b></h1>
            <table id = "table1">   
                <tr>
                    <th>Book ID</th>
                    <th>Book title</th>
                    <th>Quantity</th>
                    <th>price of book</th>
                    <th>Delete</th>
                </tr>
                <?php
                echo $username;
                $query = "SELECT shoppingCarts.cartID, book.bookID, book.bookTitle, ShoppingCarts.quantity, book.bookPrice FROM book, ShoppingCarts, customer WHERE customer.customerID = ShoppingCarts.customerID AND ShoppingCarts.bookID = book.bookID AND customer.customerID = '{$username}' ";
                include('databaseConnect.php');
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                    <td>".$row["bookID"]. "</td>
                                    <td>".$row["bookTitle"]. "</td>
                                    <td>" . $row["quantity"]. "</td>
                                    <td>" . $row["bookPrice"]. "</td>
                                    <td> <form method='post' action='deleteItem.php?cartID=".$row["cartID"]."'> "; 
                                echo " <input type='submit' name='submit' value='delete'></form></td>";
                                    echo "</tr>";
                }
                
                ?>
                <form method="post" action="purchase.php" autocomplete = "off">
                      <input type="submit" name="submit" value="Purchase">
                </form>
            </table>
        </div>
    </body>
</html>