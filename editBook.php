<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];

$bookID = $_GET[bookID];

$query = "SELECT * FROM book WHERE bookID = '{$bookID}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){

    echo $row["bookTitle"];
    $bookTitle = $row["bookTitle"];
    echo "<br>";
    echo $row["bookType"];
    $bookType = $row["bookType"];
    echo "<br>";
    echo $row["bookMaterial"];
    $bookMaterial = $row["bookMaterial"];
    echo "<br>";
    echo $row["bookPrice"];
    $bookPrice = $row["bookPrice"];
    echo "<br>";
    echo $row["bookQuantity"];
    $bookQuantity = $row["bookQuantity"];
    echo "<br>";
    $storeID = $row["StoreID"];
    echo $row["storeID"];
   
    echo "<br>";


}


$posting = $bookID;




?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>edit book</title>
    </head>
    <body>
        <div id="edit-book">
            <form method="post" action="editBook.php?posting=<?php echo $posting;?>" autocomplete = "off"> 
                Book title:<input type="text" name="bookTitle" value = "<?php echo $bookTitle ?>"><br>
                <br>Type of Book: <select name="bookType">
                <option value="fiction">fiction</option>
                <option value="non-fiction">non-fiction</option>
                <option value="comic">comic</option>
                <option value="textbook">textbook</option>
                <option value="magazine">magazine</option></select>


                <br>Book material: <select name="bookMaterial">
                <option value="paperback">paperback</option>
                <option value="hardcover">hardcover</option>
                <br></select><br>

                Book price: <input type="number" name="bookPrice" value = "<?php echo $bookPrice ?>"><br>
                Quantity left in store:<input type="number" name="bookQuantity" value = "<?php echo $bookQuantity ?>"><br>
                Store Location ID:<input type="number" name="storeID" value = "<?php echo $storeID ?>"><br>
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
                $FinalError==1;
                $posting = $_GET["posting"];
                echo "posting: ".$posting;
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
                if($finalError==0)
                {
                    $finalQuery = "UPDATE book SET bookTitle = '{$bookTitle}', bookType = '{$bookType}', bookMaterial = '{$bookMaterial}', bookPrice = '{$bookPrice}', bookQuantity = '{$bookQuantity}', StoreID = '{$storeID}' WHERE bookID = '{$posting}' ";
                    echo $finalQuery;

                    $result = mysqli_query($connect, $finalQuery);
                    if($result)
                    {
                        $_SESSION["updatedBook"]="updated book information!";  

                        header("Location: catalog.php");
                    }


                }



            }
            ?>
        </div>

    </body>

</html>
