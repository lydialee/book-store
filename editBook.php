<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

echo $_GET[bookID];
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
      echo $row["StoreID"];
    $StoreID = $row["StoreID"];
    echo "<br>";


}
echo "bookID =".$bookID;

$posting = $bookID;
echo "posting =".$posting;



?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create new employee</title>
    </head>
    <body>
        <div id="edit-book">
            <form method="post" action="editBook.php?posting=<?php echo $posting;?>" autocomplete = "off"> 

                    <h2> Edit a book </h2>
                    Book title: <input type="text" name="bookTitle" value = "<?php echo $bookTitle ?>"><br>
                    Type of book: <input type="text" name="bookType" value = "<?php echo $bookType ?>"><br>
                    Book material: <input type="text" name="bookMaterial" value = "<?php echo $bookMaterial ?>"><br>
                    Book price:  <input type="number" name="bookPrice" value = "<?php echo $bookPrice ?>"><br>
                    Quantity left in store: <input type="text" name="bookQuantity" value = "<?php echo $bookQuantity ?>"><br>
                    Store Location: <input type="number" name="StoreID" value = "<?php echo $StoreID ?>"><br>
                    <input type="submit" name="submit2" value="Submit">
            </form>

            <?php 
                if($_POST["submit2"])
                {
                    $posting = $_GET["posting"];
                    echo "posting: ".$posting;
                    $bookTitle = $_POST["bookTitle"];
                     $bookType = $_POST["bookType"];
                     $bookMaterial = $_POST["bookMaterial"];
                     $bookPrice = $_POST["bookPrice"];
                     $bookQuantity = $_POST["bookQuantity"];
                     $StoreID = $_POST["StoreID"];
                
                    $finalQuery = "UPDATE book SET bookTitle = '{$bookTitle}', bookType = '{$bookType}', bookMaterial = '{$bookMaterial}', bookPrice = '{$bookPrice}', bookQuantity = '{$bookQuantity}', StoreID = '{$StoreID}' WHERE bookID = '{$posting}' ";
                   echo $finalQuery;
                    $result = mysqli_query($connect, $finalQuery);
                    if($result)
                    {
                        $_SESSION["updatedBook"]="updated book information!";  
                       
                        header("Location: catalog.php");
                    }
                }
            ?>
        </div>

    </body>

</html>
