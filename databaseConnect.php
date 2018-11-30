<?php



$host = "localhost"; 
$user = "danchen";
$password = "";
$dbname = "library";

$connect = mysqli_connect($host, $user, $password, $dbname);
if(mysqli_connect_errno()){
	die("Database connection failed: ".
		mysqli_connect_error() . 
			" (" . mysqli_connect_errno(). ")"
);
}
else{
echo "connected to the database";
echo "</br>";
}
?>