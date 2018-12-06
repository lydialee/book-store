<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";

?>

<html>
    <body>
       
         <?php 
        $userquery = "SELECT * FROM customer WHERE customerID = '{$username}'";
        $userresult = mysqli_query($connect, $userquery);
         while($row = mysqli_fetch_assoc($userresult)){
             $customertype=$row["customerType"];
             if($customertype == "non business"){
                 echo "<a href='editCustomer.php'> edit profile</a>";
             }
             if($customertype == "business"){
                  echo "<a href='editBusinessCustomer.php'> edit profile</a>";
             }

         }
        
        ?>
      
        <h1> User profile </h1>
        <?php 
        $userquery = "SELECT * FROM customer WHERE customerID = '{$username}'";
        $userresult = mysqli_query($connect, $userquery);

        while($row = mysqli_fetch_assoc($userresult)){
            echo "User ID: ".$row["customerID"];
            echo "<br>";
            echo "<br>";
            echo "firstName: ".$row["firstName"];
            echo "<br>";
            echo "<br>";
            echo "lastName: ".$row["lastName"];
            echo "<br>";
            echo "<br>";
            echo "address: ".$row["address"];
            echo "<br>";
            echo "<br>";
            echo "city: ".$row["city"];
            echo "<br>";
            echo "<br>";
            echo "state: ".$row["state"];
            echo "<br>";
            echo "<br>";
            echo "zipcode: ".$row["zipcode"];
            echo "<br>";
            echo "<br>";
            echo "email: ".$row["email"];
            echo "<br>";
            echo "<br>";
            $customertype=$row["customerType"];

            if($customertype == "non business"){
                echo "marriage: ".$row["marriage"];
                echo "<br>";
                echo "<br>";
                echo "age: ".$row["age"];
                echo "<br>";
                echo "<br>";
                echo "gender: ".$row["gender"];
                echo "<br>";
                echo "<br>";

            }
            if($customertype == "business"){

                echo "Business name: ".$row["businessName"];
                echo "<br>";
                echo "<br>";
                echo "Business income: ".$row["businessIncome"];
                echo "<br>";
                echo "<br>";
                echo "Business: category ".$row["businessCategory"];
                echo "<br>";
                echo "<br>";
            }
            echo "Income: ".$row["income"];

        }
        
        
        ?>
    <table id = "table1">   
                <tr>
                    <th>Order number</th>
                    <th>Date</th>
                    <th>Book title</th>
                    <th>Book quantity</th>
                    <th>Total price</th>
                    <th>Customer ID</th>
                       <th>Salesperson ID</th>
                    <th> Store location</th>
                   


                </tr>
        <?php 
         $query = "SELECT transactions.orderNumber, transactions.date, book.bookTitle, transactions.bookQuantity, transactions.bookPrice * transactions.bookQuantity AS totalPrice, transactions.customerID, store.city, transactions.salespersonID  FROM transactions, book, store WHERE book.bookID = transactions.bookID AND store.storeID = transactions.storeID AND transactions.customerID = '{$username}'
                GROUP BY transactions.orderNumber, transactions.date, book.bookTitle";
        $result = mysqli_query($connect, $query);
        
        while($row = mysqli_fetch_assoc($result)){
                    echo 
                        "<tr>
                                    <td>".$row["orderNumber"]. "</td>
                                    <td>" . $row["date"]. "</td>
                                    <td>" . $row["bookTitle"]."</td>
                                    <td>" . $row["bookQuantity"]."</td>
                                    <td>$" . $row["totalPrice"]. "</td>
                                    <td>" . $row["customerID"]."</td>
                                    <td>" . $row["salespersonID"]."</td>
                                     <td>" . $row["city"]."</td>";
        }
        
        
        
        
        
        
        ?>
        </table>
    </body>
</html>