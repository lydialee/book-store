<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";



?>
<html>
    <body>

        <form method="post" action="createBook.php" autocomplete = "off"> 

            <h2> Enter a new book </h2>
            Book title:<input type="text" name="bookTitle" required ><br>
            Type of book:<input type="text" name="bookType" required ><br>
            Book material:<input type="text" name="bookMaterial" required ><br>
            Book price: <input type="number" name="bookPrice"><br>
            Quantity left in store:<input type="text" name="bookQuantity" required ><br>
            Store Location:<input type="text" name="storeID" required ><br>
            <input type="submit" name="submit2" value="Submit">
        </form>
        <?php

        if($_POST["submit"])
        {

            $COUNTquery = "SELECT * FROM book";
            $COUNTresult = mysqli_query($connect, $COUNTquery);
            while($COUNTrow = mysqli_fetch_assoc($COUNTresult)){
                $bookNumber = $COUNTrow["bookID"];
            }

            $bookNumber++;
            $bookTitle = $_POST["bookTitle"];
            $bookType = $_POST["bookType"];
            $bookMaterial = $_POST["bookMaterial"];
            $bookPrice = $_POST["bookPrice"];
            $bookQuantity = $_POST["bookQuantity"];
            $storeID = $_POST["storeID"];
            $addtoBook = "INSERT INTO book (bookID, bookTitle, bookMaterial, bookPrice, bookQuantity, StoreID) VALUES ('{$bookNumber}','{$bookTitle}','{$bookMaterial}','{$bookPrice}','{$bookQuantity}','{$storeID}')";
            echo $addtoBook;
            $result = mysqli_query($connect, $addtoBook);
            if($result)
            {
                $_SESSION["addedStore"] = "added to catalog";
                header("Location: catalog.php");

            }


        }
        ?>
    </body>
</html>