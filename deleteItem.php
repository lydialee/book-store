<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";


$cartID = $_GET["cartID"];

$query = "SELECT * FROM shoppingCarts WHERE cartID = '{$cartID}'";

$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    $bookQuantity = $row["quantity"];
    $bookID = $row["bookID"];
    
}
echo $bookQuantity;
echo $bookID;
$query = "SELECT * FROM book WHERE bookID = '{$bookID}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    $bookQuantities = $row["bookQuantity"];    
}
$bookQuantities= $bookQuantities + $bookQuantity;
echo $bookQuantities;
 $finalQuery = "UPDATE Book SET bookQuantity ='{$bookQuantities}' WHERE bookID = '{$bookID}' ";
$result = mysqli_query($connect, $finalQuery);

$query = "DELETE FROM shoppingCarts WHERE cartID = '{$cartID}'";

$result = mysqli_query($connect, $query);
if($result)
{
    header("Location: shoppingCart.php");
}
   







?>