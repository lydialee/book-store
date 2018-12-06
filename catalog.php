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
        include('databaseConnect.php');

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>calalog</title>
    </head>
    <body>
        <div class="page" id="catalog">
            <ul class="hyper-btns">
                <li class="cart">
                    <a href="shoppingCart.php" title="Shopping cart">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M958.8 402.6c-1.8-18.6-8.9-36.4-20.7-51.6-19-24.3-47.6-38.2-78.5-38.2H433.1c-1.8 0-3.6 0.3-5.4 0.5l-104.5 2.1-13.4-54c-16.5-66.6-76-113.2-144.6-113.2H97c-19.2 0-34.7 15.5-34.7 34.7s15.5 34.7 34.7 34.7h68.2c36.6 0 68.4 24.8 77.2 60.4l19.9 80.5c0 0.1 0 0.3 0.1 0.4l57.7 233c15.5 62.6 71.4 106.4 136 106.4H782c64.5 0 120.4-43.8 135.9-106.4l38.5-155.3c2.8-11.2 3.6-22.7 2.4-34zM415.3 737.2c-40.5 0-73.4 32.8-73.4 73.4 0 40.5 32.8 73.4 73.4 73.4 40.5 0 73.4-32.8 73.4-73.4-0.1-40.6-32.9-73.4-73.4-73.4zM809.8 737.2c-40.5 0-73.4 32.8-73.4 73.4 0 40.5 32.8 73.4 73.4 73.4 40.5 0 73.4-32.8 73.4-73.4 0-40.6-32.9-73.4-73.4-73.4z" /></svg>
                        <span class="icon-info">Cart</span>
                    </a>
                </li>
                <li class="edit">
                    <a href="editCustomer.php" title="Edit profile">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M512.3 320.5m-227.9 0a227.9 227.9 0 1 0 455.8 0 227.9 227.9 0 1 0-455.8 0ZM703 523c-49.9 47-116.9 75.9-190.7 75.9s-140.8-29-190.7-75.9C187.9 592.2 96.3 731.8 96.3 892.5c0 19.9 16.1 36 36 36h760.2c19.9 0 36-16.1 36-36-0.1-160.7-91.8-300.3-225.5-369.5z" /></svg>
                        <span class="icon-info">Profile</span>
                    </a>
                </li>
                <li class="trans">
                    <a href="transactions.php" title="All transactions">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg class="icon" width="128px" height="128.00px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path fill="#11286c" d="M513 63.8c-246.5 0-446.3 199.8-446.3 446.3S266.5 956.4 513 956.4s446.3-199.8 446.3-446.3S759.5 63.8 513 63.8z m163.4 297.4L596.6 441h34.9c19.1 0 34.6 15.5 34.6 34.6s-15.5 34.6-34.6 34.6h-83.9v44.2h83.9c19.1 0 34.6 15.5 34.6 34.6s-15.5 34.6-34.6 34.6h-83.9v96c0 19.1-15.5 34.6-34.6 34.6s-34.6-15.5-34.6-34.6v-96h-83.9c-19.1 0-34.6-15.5-34.6-34.6s15.5-34.6 34.6-34.6h83.9v-44.2h-83.9c-19.1 0-34.6-15.5-34.6-34.6s15.5-34.6 34.6-34.6h34.9l-79.8-79.8c-13.5-13.5-13.5-35.4 0-49 13.5-13.5 35.4-13.5 49 0L513 426.7l114.4-114.4c13.5-13.5 35.4-13.5 49 0 13.5 13.5 13.5 35.4 0 48.9z" /></svg>
                        <span class="icon-info">Trans</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="homePage.php" title="Logout">
                        <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg t="1544119098838" class="icon" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1910" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="128"><defs><style type="text/css"></style></defs><path fill="#11286c" d="M512 64C264.8 64 64 264.8 64 512s200.8 448 448 448 448-200.8 448-448S759.2 64 512 64z m-32 128h64v384h-64V192z m32 640c-176.8 0-320-143.2-320-320 0-131.2 79.2-244 192-293.6v72C307.2 334.4 256 417.6 256 512c0 140.8 115.2 256 256 256s256-115.2 256-256c0-94.4-51.2-177.6-128-221.6v-72c112.8 49.6 192 162.4 192 293.6 0 176.8-143.2 320-320 320z" p-id="1911"></path></svg>
                        <span class="icon-info">Logout</span>
                    </a>
                </li>
            </ul>
            
            <?php 
            $userquery = "SELECT * FROM salespersons WHERE salespersonID = '{$username}'";
         
            $userresult = mysqli_query($connect, $userquery);
            while($row = mysqli_fetch_assoc($userresult))
            {
              
                    echo "<a href='transactions.php'> view transactions </a>  <br> ";
                echo "<a href='employeeProfile.php'> View employee profile</a>  <br>" ;
                echo "<a href='createBook.php'> Create a book</a>  <br> ";
                 echo "<a href='store.php'> View stores </a>  <br> ";
                 echo "<a href='region.php'> view regions </a>  <br> ";
                 
            }
            $userquery = "SELECT * FROM customer WHERE customerID = '{$username}'";
         
            $userresult = mysqli_query($connect, $userquery);
            while($row = mysqli_fetch_assoc($userresult))
            {
                
                echo "<a href ='profile.php'> View profile</a><br>";
                echo "<a href='shoppingCart.php'> Click here for shopping cart</a>  <br>";
                
            }


            ?>

            <h1><b>Book List</b></h1>
            <p>Order by:</p>
            <form id="filters" method="post" action="catalog.php" autocomplete = "off">
                <input type="submit" name="submitType" value="type">
                <input type="submit" name="submitMaterial" value="material">
                <input type="submit" name="submitLowQuantity" value="lowest quantity">
                <input type="submit" name="submitHighQuantity" value="highest quantity">
                <input type="submit" name="submitLowPrice" value="lowest price">
                <input type="submit" name="submitHighPrice" value="highest price">
                <input type="submit" name="submitCity" value="city location">
            </form>
            <?php echo $_SESSION["bookQuantity"];
            
            $_SESSION["bookQuantity"]= " ";
            ?>
            <table id = "table1">   
                <tr>
                    <th>BookID</th>
                    <th>Book name</th>
                    <th>Book type</th>
                    <th>Book material</th>
                    <th>Book price</th>
                    <th>Books left</th>
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
                     $posting = $row["bookID"];
                    echo 
                       

                        "<tr>
                                <td>".$row["bookID"]. "</td>
                                
                                <td>" . $row["bookTitle"]. "</td>
                                <td>" . $row["bookType"]."</td>
                                <td>" . $row["bookMaterial"]."</td>
                                <td>$" . $row["bookPrice"]. "</td>
                                <td>" . $row["bookQuantity"]."</td>
                                 <td>" . $row["city"]."</td>";
                         $check = "SELECT * FROM customer WHERE customerID = '{$username}'";
                    $checkresult = mysqli_query($connect, $check);
                    while($row2 = mysqli_fetch_assoc($checkresult)){
                       $customerCheck =1;
                    }
                    if($customerCheck =1)
                    {
                         echo "<td> <form method='post' action='addToShoppingCart.php?bookID=".$row['bookID']."'> 
               <input type='number' name='quantity' value='1'> </td>"; 
                    echo "<td> <input type='submit' name='submit' value='Add to cart'></form></td>";
                    }
                    else{
                        echo "<td> </td>";
                         echo "<td> </td>";
                    }
                  
                  
                  
                   
                    
                    $check = "SELECT * FROM salespersons WHERE salespersonID = '{$username}'";
                    $checkresult = mysqli_query($connect, $check);
                    while($row = mysqli_fetch_assoc($checkresult)){
                        if($row["jobTitle"] == "administrator")
                        {

                            echo "<td> <form method='post' action='editBook.php?bookID=".$posting."'> "; 
                            echo " <input type='submit' name='submit' value='Edit'></form></td>";
                        }
                        if($row["jobTitle"] == "employee")
                        {

                            echo "<td> <form method='post' action='editBook.php?bookID=".$posting."'> "; 
                            echo " <input type='submit' name='submit' value='Edit'></form></td>";
                        }
                        if($row["jobTitle"] == "manager")
                        {

                            echo "<td> <form method='post' action='editBook.php?bookID=".$posting."'> "; 
                            echo " <input type='submit' name='submit' value='Edit'></form></td>";
                        }
                    }

                    echo "</tr>";

                }

                ?>

            </table>
        </div>
    </body>
</html>