<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];

$orderNumber = $_GET["transactionID"];


$query = "SELECT * FROM transactions WHERE orderNumber = '{$orderNumber}'";

$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){


    $orderNumber = $row["orderNumber"];



    $salespersonID = $row["salespersonID"];

    $bookID = $row["bookID"];


    $bookQuantity = $row["bookQuantity"];

    $bookPrice = $row["bookPrice"];
    $customerID = $row["customerID"];

    $storeID= $row["storeID"];

}

$posting = $orderNumber;




?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Edit transaction</title>
    </head>
    <body>
        <div id="edit-book">
            <form method="post" action="editTransactions.php?posting=<?php echo $posting;?>" autocomplete = "off"> 
                <h2> Edit transaction</h2>
                Employee Username:<input type="text" name="salespersonID" value="<?php echo $salespersonID ?>"><br>
                BookID:<input type="text" name="bookID" value="<?php echo $bookID ?>"> <br>
                Quantity:<input type="text" name="bookQuantity" value="<?php echo $bookQuantity?>"><br>

                Store ID:<input type="text" name="storeID" value="<?php echo $storeID ?>"><br>
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
                <table id = "table1">   
                <tr>
                    <th>Book ID</th>
                    <th>Book title</th>
                    <th>Book Quantity</th>
                </tr>
                <?php 
    $storequery = "SELECT * FROM book";
                                         $storeresult = mysqli_query($connect, $storequery);
                                         while($storerow = mysqli_fetch_assoc($storeresult)){
                                             echo "<tr>";
                                             echo "<td>".$storerow["bookID"]. "</td>";
                                             echo "<td>".$storerow["bookTitle"]. "</td>";
                                             echo "<td>".$storerow["bookQuantity"]. "</td>";
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



                $salespersonID = $row["salespersonID"];

                $bookID = $row["bookID"];

                $bookQuantity = $row["bookQuantity"];

                $storeID= $_POST["storeID"];


                $checkStore = "SELECT * FROM store";
                $storeresult = mysqli_query($connect, $checkStore);
                while($row = mysqli_fetch_assoc($storeresult)){
                    if($row["storeID"]==$storeID)
                    {
                        $finalError == 0;
                    }
                }
                 $checkStore = "SELECT * FROM salesperons";
                $storeresult = mysqli_query($connect, $checkStore);
                while($row = mysqli_fetch_assoc($storeresult)){
                    if($row["salespersonID"]==$salespersonID)
                    {
                        $finalError == 0;
                    }
                }

                $bookquery = "SELECT * FROM book WHERE bookID = '{$bookID}'";
                echo $bookquery;
                $bookresult = mysqli_query($connect, $bookquery);

                while($bookrow = mysqli_fetch_assoc($bookresult)){
                    $bookPrice = $bookrow["bookPrice"];
                    bookError==0;
                } 
                $total = $bookPrice * $bookQuantity;

                if($finalError==0)
                {
                    $finalQuery = "UPDATE transactions SET salespersonID = '{$posting}', bookID= '{$bookID}', bookQuantity = '{$bookQuantity}',bookPrice = '{$total}',  storeID = '{$storeID}' WHERE orderNumber = '{$posting}' ";
                    echo $finalQuery;

                    $result = mysqli_query($connect, $finalQuery);
                    if($result)
                    {
                        $_SESSION["updated transaction"]="updated transaction information!";  

                        header("Location: transactions.php");
                    }


                }
                else{
                    echo "You may have selected a book that does not exist, store that does not exist, or employee does not exist. Please try again";
                }



            }
            ?>
        </div>

    </body>

</html>
