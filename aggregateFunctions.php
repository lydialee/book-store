<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";
include('databaseConnect.php');
$totalSale = "Select book.bookID, book.bookTitle, SUM(transactions.bookPrice) as total from transactions, book WHERE book.bookID = transactions.bookID GROUP BY book.bookID, book.bookID";

$totalBookSum = "select book.bookID, book.bookTitle, SUM(transactions.bookQuantity)as total from transactions,book WHERE book.bookID = transactions.bookID GROUP BY book.bookID ORDER BY total DESC";

$totalStoreSum="select transactions.storeID,store.city, store.state, sum(bookPrice) AS total from Transactions, store WHERE store.storeID = transactions.storeID GROUP BY transactions.storeID, store.city, store.state";

$totalRegionSum ="select region.regionID, SUM(transactions.bookPrice) AS total from region, store, transactions WHERE store.region=region.regionID AND transactions.storeID = store.storeID GROUP BY region.regionID";

$totalBusiness = "select customer.businessCategory, SUM(transactions.bookQuantity) AS total from transactions, customer WHERE customer.customerID = transactions.customerID AND customer.customerType = 'business'  GROUP BY customer.businessCategory";

$salesPerEmployee = "Select salespersonID, COUNT(salespersonID) AS total from transactions GROUP BY salespersonID";

$employeePerStore = "Select store.storeID, salespersons.salespersonID, salespersons.fname, salespersons.lname FROM store, salespersons WHERE salespersons.storeID = store.storeID GROUP BY store.storeID, salespersons.salespersonID, salespersons.fname, salespersons.lname";

$storesPerRegion = "Select storeID, address,city, state, region from store GROUP BY region, address, storeID";

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Aggregate Functions</title>
    </head>
    <body>
        <div class="page">
            
            
            <link rel="stylesheet" type="text/css" href="static/css/style.css">
            <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
            <h1> Transactions overview</h1>
            <h3> Total sales for each book</h3>
            <table id = "table1">   
                <tr>
                    <th>Book ID</th>
                    <th>Book title</th>
                    <th>Total sales</th>

                </tr>
                <?php 
                $result = mysqli_query($connect, $totalSale);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["bookID"]. "</td>
                                        <td>" . $row["bookTitle"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>
            <h3> Total sales for each book</h3>
            <table id = "table1">   
                <tr>
                    <th>Book ID</th>
                    <th>Book title</th>
                    <th>Total quantity sold</th>

                </tr>
                <?php 
                $result = mysqli_query($connect, $totalBookSum);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["bookID"]. "</td>
                                        <td>" . $row["bookTitle"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>
            <h3> Total sales for each store</h3>
            <table id = "table1">   
                <tr>
                    <th>Store ID</th>
                    <th>city</th>
                    <th>state</th>
                    <th>total sales</th>


                </tr>
                <?php 
                $result = mysqli_query($connect, $totalStoreSum);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["storeID"]. "</td>
                                        <td>" . $row["city"]. "</td>
                                        <td>" . $row["state"]."</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>
            <h3> Total sales for each region</h3>
            <table id = "table1">   
                <tr>
                    <th>Region ID</th>

                    <th>total sales</th>


                </tr>
                <?php 
                $result = mysqli_query($connect, $totalRegionSum);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["regionID"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>
            <h3> Which business type is buying the most product</h3>
            <table id = "table1">   
                <tr>
                    <th>Business Type</th>

                    <th>Total amount bought</th>


                </tr>
                <?php 
                $result = mysqli_query($connect, $totalBusiness);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["businessCategory"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>

            <h3> Employee Sales information</h3>
            <table id = "table1">   
                <tr>
                    <th>Employee ID</th>

                    <th>total transactions completed</th>

                </tr>
                <?php 
                $result = mysqli_query($connect, $salesPerEmployee);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["salespersonID"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            <h3> Employee Sales information</h3>
            <table id = "table1">   
                <tr>
                    <th>Employee ID</th>

                    <th>total transactions completed</th>

                </tr>
                <?php 
                $result = mysqli_query($connect, $salesPerEmployee);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["salespersonID"]. "</td>
                                        <td>" . $row["total"]."</td>
                                        </tr>";
                }
                ?>
            </table>
            </table>

            <h3> Employee per store</h3>
            <table id = "table1">   
                <tr>
                    <th>Store ID</th>

                    <th>Employee ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    


                </tr>
                <?php 
                $result = mysqli_query($connect, $employeePerStore);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["storeID"]. "</td>
                                        <td>" . $row["salespersonID"]."</td>
                                        <td>" . $row["fname"]."</td>
                                        <td>" . $row["lname"]."</td>
                                        </tr>";
                }
                ?>
            </table>
                <h3> Store in each region</h3>
            <table id = "table1">   
                <tr>
                    <th>Store ID</th>
                    <th>Address </th>
     <th>city </th>
                     <th>state </th>
                    <th>Region</th>

                </tr>
                <?php 
                $result = mysqli_query($connect, $storesPerRegion);
                while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                        <td>".$row["storeID"]. "</td>
                                        <td>" . $row["address"]."</td>
                                        <td>" . $row["city"]."</td>
                                        <td>" . $row["state"]."</td>
                                        <td>" . $row["region"]."</td>
                                        </tr>";
                }
                ?>
            </table>
        </div>
    </body>

</html>
