<?php
session_start();
$username = $_SESSION["username"];
echo $username;
include('databaseConnect.php');
$bookID = $_GET[bookID];

$booksToBuy = $_POST[quantity];
if($booksToBuy <=0)
{
    $booksToBuy==1;
}
$query = "SELECT * FROM Book WHERE bookID = '{$bookID}'";
echo $query;
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    echo $row["bookQuantity"];
    $bookQuantities = $row["bookQuantity"];
    if($row["bookQuantity"]< $booksToBuy)
    {
        $_SESSION["bookQuantity"]= "You ordered too much quantity. Please choose again";
        header("Location: catalog.php");
    }

}
$orderNumber = " ";
$query = "Select * FROM shoppingCarts";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){
    $orderNumber = $row["cartID"] + 1;
}
if($orderNumber == " ")
{
    echo "nice";
    $orderNumber=1;
}


$addtoShop = "INSERT INTO shoppingCarts (cartID, customerID, bookID, quantity) VALUES ('{$orderNumber}','{$username}','{$bookID}','{$booksToBuy}')";
echo $addtoShop;
$result2 = mysqli_query($connect, $addtoShop);
if($result2)
{
    $bookQuantities = $bookQuantities - $booksToBuy;
    echo $bookQuantities;
    $finalQuery = "UPDATE Book SET bookQuantity ='{$bookQuantities}' WHERE bookID = '{$bookID}' ";
    echo $finalQuery;
    $result3 = mysqli_query($connect, $finalQuery);
    if($result3)
    {
        $_SESSION["addedToCart"] = "added to cart";
        header("Location: catalog.php");
    }

}

?>