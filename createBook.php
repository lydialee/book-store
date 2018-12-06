<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";




?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create book</title>
    </head>
    <body>
        <form method="post" action="createBook.php" autocomplete = "off"> 

            <h2> Enter a new book </h2>
            Book title:<input type="text" name="bookTitle"><br>
           <br>Type of Book: <select name="bookType">
                <option value="fiction">fiction</option>
                <option value="non-fiction">non-fiction</option>
                <option value="comic">comic</option>
                <option value="textbook">textbook</option>
            <option value="magazine">magazine</option></select>
            
            
          <br>Book type: <select name="bookMaterial">
                <option value="paperback">paperback</option>
                <option value="hardcover">hardcover</option>
            <br></select><br>
                
            Book price: <input type="number" name="bookPrice"><br>
            Quantity left in store:<input type="number" name="bookQuantity"><br>
            Store Location ID:<input type="number" name="storeID"><br>
            <input type="submit" name="submit2" value="Submit">
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

        if($_POST["submit2"])
        {
            $finalError = 1;
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
            $checkStore = "SELECT * FROM store";
            $storeresult = mysqli_query($connect, $checkStore);
            while($row = mysqli_fetch_assoc($storeresult)){
                if($row["storeID"]==$storeID)
                {
                    $finalError == 0;
                }
            }
            
            if(finalError == 0){
                
                $addtoBook = "INSERT INTO book (bookID, bookTitle, bookMaterial, bookPrice, bookQuantity, StoreID) VALUES ('{$bookNumber}','{$bookTitle}','{$bookMaterial}','{$bookPrice}','{$bookQuantity}','{$storeID}')";

                $result = mysqli_query($connect, $addtoBook);
                if($result)
                {
                    $_SESSION["addedStore"] = "added to catalog";
                    header("Location: catalog.php");

                }

            }
            echo "You might have a incorrect variable or chosen a store that does not exist. Please try again";


        }
        ?>
    </body>
</html>