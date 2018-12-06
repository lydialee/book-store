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
        <title>store</title>
    </head>
    <body><?php  $query = "SELECT * FROM salespersons WHERE salespersonID='{$username}' ";
                $result2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_assoc($result2)){
                    if ($row2["jobTitle"]=="administrator")
                    {
                     echo "<a href='createStore.php'> Create store location </a>  <br> "; 
                    }


                }?>
        
        <table id = "table1">   
            <tr>

                <th>Store address</th>
                <th>Store city</th>
                <th>Store state</th>
                <th>Store zipcode</th>
                <th>Store region</th>
                <th>Total salesmen</th> 
                <th>Edit Information</th>
            </tr>

            <?php 

            $query = "SELECT * FROM store ";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>
                                <td>".$row["address"]. "</td>
                                <td>" . $row["city"]. "</td>
                                <td>" . $row["state"]."</td>
                                <td>" . $row["zipcode"]."</td>
                                <td>" . $row["region"]. "</td>
                                <td>" . $row["totalSalesmen"]."</td>";
                $query = "SELECT * FROM salespersons WHERE salespersonID='{$username}' ";
                $result2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_assoc($result2)){
                    if ($row2["jobTitle"]=="administrator")
                    {
                        echo "<td> <form method='post' action='editStore.php?storeID=".$row['storeID']."'> "; 
                        echo " <input type='submit' name='submit' value='Edit'></form></td>";
                    }


                }



                echo "</tr>";


            }

            ?>
        </table>



    </body>
</html>