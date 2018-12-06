<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";



?>
<html>
    <body>
        <?php  $query = "SELECT * FROM salespersons WHERE salespersonID='{$username}' ";
                $result2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_assoc($result2)){
                    if ($row2["jobTitle"]=="administrator")
                    {
                       echo "<a href='createRegion.php'> Create region </a>  <br> "; 
                    }


                }?>
        
        <table id = "table1">   
            <tr>
                <th>Region ID</th>
                <th>Region name</th>
                <th>Region manager</th>
           

            </tr>

            <?php 

            $query = "SELECT* from region";
            $result = mysqli_query($connect, $query);
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>

                                <td>".$row["regionID"]. "</td>
                                <td>".$row["regionName"]. "</td>
                                <td>" . $row["regionManager"]. "</td>
                                ";

                $query = "SELECT * FROM salespersons WHERE salespersonID='{$username}' ";
                $result2 = mysqli_query($connect, $query);
                while($row2 = mysqli_fetch_assoc($result2)){
                    if ($row2["jobTitle"]=="administrator")
                    {
                        echo "<td> <form method='post' action='editRegion.php?regionID=".$row['regionID']."'> "; 
                        echo "<input type='submit' name='submit' value='Edit'></form></td>";
                    }


                }
                echo "</tr>";


            }

            ?>
        </table>



    </body>
</html>