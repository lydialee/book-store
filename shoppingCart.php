<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";


?>


<html>
    <body>

        <h1><b>Shopping Cart :</b></h1>
        <table id = "table1">   
            <tr>
                <th>Book ID</th>
                <th>Book title</th>
                <th>Quantity</th>
                <th>price of book</th>
            </tr>
            <?php
            echo $username;
            $query = "SELECT book.bookID, book.bookTitle, ShoppingCarts.quantity, book.bookPrice FROM book, ShoppingCarts, customer WHERE customer.customerID = ShoppingCarts.customerID AND ShoppingCarts.bookID = book.bookID AND customer.customerID = '{$username}' ";
            include('databaseConnect.php');
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>
                                <td>".$row["bookID"]. "</td>
                                <td>".$row["bookTitle"]. "</td>
                                <td>" . $row["quantity"]. "</td>
                                <td>" . $row["bookPrice"]. "</td>
                                </tr>";
            }
            
            ?>
            <form method="post" action="purchase.php" autocomplete = "off">
                  <input type="submit" name="submit" value="Purchase">
            </form>
        </table>
    </body>
</html>