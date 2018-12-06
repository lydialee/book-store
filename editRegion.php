<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";
echo $_GET[regionID];
$regionID = $_GET[regionID];
$posting = $regionID;
echo "posting =".$posting;

$query = "SELECT * FROM region WHERE regionID = '{$regionID}'";
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_assoc($result)){

    echo $row["regionID"];
    $regionID = $row["regionID"];
    echo "<br>";
    echo $row["regionName"];
    $regionName = $row["regionName"];
    echo "<br>";
    echo $row["regionManager"];
    $regionManager = $row["regionManager"];
    $previousManager = $regionManager;
    echo "<br>";
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Edit region location</title>
    </head>
    <body>
        <div class="page">
            <form class="edit-form" method="post" action="editRegion.php?posting=<?php echo $posting;?>&previous=<?php echo $previousManager ?>" autocomplete = "off">
                <h2> Edit region location </h2>
                Region name:<input type="text" name="name" value = "<?php echo $regionName ?>"><br>
                Region manager ID:<input type="text" name="manager" value = "<?php echo $regionManager ?>"><br>
                <input type="submit" name="submit2" value="submit">
            </form>
            <h3> Current managers</h3>
            <table id = "table1">   
                <tr>
                    <th>SalespersonID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Region ID</th>
                </tr>
                <?php 
        $employeequery = "SELECT salespersons.salespersonID, salespersons.fname, salespersons.lname, region.regionID  FROM salespersons, region WHERE salespersonID=region.regionManager";
                                   $employeeresult = mysqli_query($connect, $employeequery);
                                   while($row = mysqli_fetch_assoc($employeeresult)){

                                       echo "<tr>";
                                       echo "<td>".$row["salespersonID"]. "</td>";
                                       echo "<td>".$row["fname"]. "</td>";
                                       echo "<td>".$row["lname"]. "</td>";
                                       echo "<td>".$row["regionID"]. "</td>";
                                       echo "</tr>"; 
                                   }
                ?>
            </table>
            <h3> Employees</h3>
            <table id = "table1">   
                <tr>
                    <th>SalespersonID</th>
                    <th>First name</th>
                    <th>Last name</th>

                </tr>
                <?php 
                $employeequery = "Select * from salespersons WHERE jobTitle = 'employee'";
                $employeeresult = mysqli_query($connect, $employeequery);
                while($row = mysqli_fetch_assoc($employeeresult)){

                    echo "<tr>";
                    echo "<td>".$row["salespersonID"]. "</td>";
                    echo "<td>".$row["fname"]. "</td>";
                    echo "<td>".$row["lname"]. "</td>";
                    echo "</tr>";    
                }

                ?>
            </table>

            <?php 
            if($_POST["submit2"])
            {
                echo "hello";
                $finalError=1;
                $posting = $_GET["posting"];
                echo $posting;
                $previousManager = $_GET["previous"];
                echo "posting: ".$posting;
                $regionName = $_POST["name"];
                $regionManager = $_POST["manager"];

                $query = "SELECT * FROM salespersons WHERE salespersonID = '{$regionManager}'";
                echo $query;
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($result)){
                    if($regionManager == $row["salespersonID"])
                    {
                        $finalError=0;
                    }
                }
                echo $finalError;

                $query = "SELECT * FROM salespersons WHERE salespersonID = '{$regionManager}'";
                $result = mysqli_query($connect, $query);
                while($row = mysqli_fetch_assoc($result)){
                    if($row["jobTitle"]=="employee")
                    {
                        $finalError=0;
                    }
                }
                echo $finalError;

                if($finalError==0){
                    $finalQuery = "UPDATE region SET regionName = '{$regionName}', regionManager = '{$regionManager}' WHERE regionID = '{$posting}' ";
                    echo $finalQuery;
                    $result = mysqli_query($connect, $finalQuery);
                    if($result)
                    {
                        $query = "UPDATE salespersons SET jobTitle ='manager'WHERE salespersonID = '{$regionManager}'";
                        $result = mysqli_query($connect, $query);
                        $query = "UPDATE salespersons SET jobTitle ='employee'WHERE salespersonID = '{$previousManager}'";
                        $result = mysqli_query($connect, $query);


                        $_SESSION["updatedRegion"]="updated region information!";  

                        header("Location: region.php");
                    }

                }

            }


            ?>
        </div>
    </body>

</html>
