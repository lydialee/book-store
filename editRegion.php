<?php
session_start();
include('databaseConnect.php');
$username = $_SESSION["username"];
echo $username;
echo "<br>";
echo $_GET[regionID];
$regionID = $_GET[regionID];

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
    echo "<br>";
}

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>edit region</title>
    </head>
    <body>
        <form method="post" action="createRegion.php" autocomplete = "off"> 
            <h2> Edit region location </h2>
            Region name:<input type="text" name="name" value = "<?php echo $regionName ?>" required><br>
            Region manager:<input type="text" name="manager" value = "<?php echo $regionManager ?>" required><br>
            <input type="submit" name="submit" value="Submit">
        </form>


        <?php 
    if($_POST["submit"])
    {
        $regionName = $_POST["name"];
        $regionManager = $_POST["manager"];
        $finalQuery = "UPDATE region SET regionName = '{$regionName}', regionManager = '{$regionManager}' WHERE regionID = '{$regionID}' ";
        $result = mysqli_query($connect, $finalQuery);
        if($result)
        {
            $_SESSION["updatedRegion"]="updated region information!";  
           
            header("Location: catalog.php");
        }
    }


        ?>

    </body>

</html>
