<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo $_GET[bookID];
$bookID = $_GET[bookID];
echo $_POST[quantity];
$booksToBuy = $_POST[quantity];

include('databaseConnect.php');

    $addtoShop = "INSERT INTO ShoppingCarts (customerID, bookID, quantity) VALUES ('{$username}','{$bookID}','{$booksToBuy}')";
    echo $addtoShop;
    $result = mysqli_query($connect, $addtoShop);
    if($result)
    {
        $_SESSION["addedToCart"] = "added to cart";
       header("Location: catalog.php");
    }

?>