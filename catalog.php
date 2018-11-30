<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";
$added = $_SESSION["addedToCart"];
echo $added;

$purchase = $_SESSION["purchase"];
$bookInformation = $_SESSION["updatedBook"];
echo $purchase;
echo $bookInformation;
$_SESSION["updatedBook"]= " ";
$_SESSION["purchase"] = " ";
$_SESSION["addedToCart"] = " ";
$uname = strip_tags($username);
$uname = htmlspecialchars($username);


?>
<html>
    <body>
        <a href="shoppingCart.php"> Click here for shopping cart</a>  <br> 
        
        <?php 
        $userquery = "SELECT * FROM customer WHERE customerID = '{$username}'";
        $userresult = mysqli_query($connect, $userquery);
        ?>
        <a href="editCustomer.php"> Edit profile</a>  <br> 
        <a href="transactions.php"> Click here for all transactions</a>  <br>  
        <h1><b>Book List</b></h1>
        <form method="post" action="catalog.php" autocomplete = "off">

            <input type="submit" name="submitType" value="Order by type">
            <input type="submit" name="submitMaterial" value="Order by material">
            <input type="submit" name="submitLowQuantity" value="Order by lowest quantity">
             <input type="submit" name="submitHighQuantity" value="Order by highest quantity">
            <input type="submit" name="submitLowPrice" value="Order by lowest price">
            <input type="submit" name="submitHighPrice" value="Order by highest price">
            <input type="submit" name="submitCity" value="order by city location">
        </form>
        <table id = "table1">   
            <tr>
                <th>BookID</th>
                <th>Book name</th>
                <th>Book type</th>
                <th>Book material</th>
                <th>Book price</th>
                <th>Number of Books left</th>
                <th>Store Location</th> 
                <th>Quantity to buy</th>
                <th>Add to Cart</th>
                <th>Edit Book</th>

            </tr>
            <?php
            $query = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID ";

            $queryType = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity
            ORDER BY book.bookType";

            $queryMaterial = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity
            ORDER BY book.bookMaterial";

            $queryLowQuantity = "
SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity ORDER BY `book`.`bookQuantity` ASC";

            $queryHighQuantity = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity ORDER BY `book`.`bookQuantity` DESC";

                $queryPriceHigh = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity  
            ORDER BY `book`.`bookPrice`  DESC";

            $queryPriceLow = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
                GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity  
                ORDER BY `book`.`bookPrice`  ASC";

            include('databaseConnect.php');
            $result = mysqli_query($connect, $query);
            if($_POST["submitType"])
            {
                $result = mysqli_query($connect, $queryType);
            }
            if($_POST["submitMaterial"])
            {
                $result = mysqli_query($connect, $queryMaterial);
            }
            if($_POST["submitLowQuantity"])
            {
                $result = mysqli_query($connect, $queryLowQuantity);
            }
              if($_POST["submitHighQuantity"])
            {
                $result = mysqli_query($connect, $queryHighQuantity);
            }
            if($_POST["submitLowPrice"])
            {
                $result = mysqli_query($connect, $queryPriceLow);
            }
            if($_POST["submitHighPrice"])
            {
                $result = mysqli_query($connect, $queryPriceHigh);
            }
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>
                                <td>".$row["bookID"]. "</td>
                                <td>" . $row["bookTitle"]. "</td>
                                <td>" . $row["bookType"]."</td>
                                <td>" . $row["bookMaterial"]."</td>
                                <td>$" . $row["bookPrice"]. "</td>
                                <td>" . $row["bookQuantity"]."</td>
                                 <td>" . $row["city"]."</td>";
                echo "<td> <form method='post' action='addToShoppingCart.php?bookID=".$row['bookID']."'> 
               <input type='int' name='quantity'> </td>"; 
                echo "<td> <input type='submit' name='submit' value='Add to cart'></form></td>";
                echo "<td> <form method='post' action='editBook.php?bookID=".$row['bookID']."'> "; 
                echo " <input type='submit' name='submit' value='Edit'></form></td>";
                echo "</tr>";

            }

            ?>

        </table>
    </body>
</html>