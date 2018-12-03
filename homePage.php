<?php 
session_start();
session_unset();
$finalError=0;
$usernameError = "";
$username = $password = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //used to show the sentences for the form that will be filled out
    if($_POST["submit"])
    {
        $enter=1;	


    }



    $username = $_POST["username"];
    $password = $_POST["password"];
}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Welcome to book store</title>
    </head>
    <body>
        <div id="home-page" class="page">
            <div class="form">
                <center><h1>Book Purchase catalog</h1></center>
                <hr/>
                <div class="form-group">
                    <form class="edit-form" method="post" action="homePage.php">
                        Username: <input type="text" name="username" required> <br>
                        Password: <input style="margin-top: 20px" type="text" name="password" required> <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>				
                </div>
                <hr/>
            </div>
            <div class="create">
                <form method="post" action="createNewEmployee.php" autocomplete = "off">
    				<div class="form-group" >
    					<input type="submit" name = "register" department  = "btn-register" value="Create employee" class="btn btn-primary" >			
    				</div>			
    			</form>
                <form method="post" action="createNewCustomer.php" autocomplete = "off">
    				<div class="form-group" >
    					<input type="submit" name = "register" department  = "btn-register" value="New customer" class="btn btn-primary" >			
    				</div>			
    			</form>
            </div>
        
            <?php 
                if($enter==1)
                {
                    echo "<h2>Your Input:</h2>";
                	echo "Username: {$username} </br>";
                	echo "Password: {$password} </br>";
                    if($finalError==0)
                	{
                		include('databaseConnect.php');
                        $query = "SELECT * FROM Login WHERE username = '{$username}' AND password = '{$_POST["password"]}' ";
                        echo $query;
                       
                        $result = mysqli_query($connect, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            $_SESSION["username"]=$username;  
                            echo $_SESSION["username"];
                          header("Location: catalog.php");
                        }
                        
                        echo "not correct";
                        
                        
                    }
                }
                    
            ?>
        </div>
    </body>

</html>
