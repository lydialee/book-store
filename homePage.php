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
        <style>
            h1 {
                color: black;
                font-family: "Trebuchet MS";
                font-size: 200%;
            }
        </style>
        <title>Home page</title>

    </head>
    <body>
        <div>
            <div class="form">

                <center><h2>Book Purchase catalog</h2></center>
                <hr/>
                <div class="form-group">
                    <form method="post" action="homePage.php">
                        username: <input type="text" name="username"> <br>
                        password: <input type="text" name="password"> <br>
                        <input type="submit" name="submit" value="Submit">
                    </form>				
                </div>
                <hr/>			


            </div>
        </div>
        <div>
        <form method="post" action="createNewEmployee.php" autocomplete = "off">
				<div class="form-group" >
					<input type="submit" name = "register" department  = "btn-register" value="create employee" class="btn btn-primary" >			
				</div>			
			</form>
            <form method="post" action="createNewCustomer.php" autocomplete = "off">
				<div class="form-group" >
					<input type="submit" name = "register" department  = "btn-register" value=" new customer" class="btn btn-primary" >			
				</div>			
			</form>
        </div>
        <?php 
    if($enter==1)
    {
        echo "<h2>Your Input:</h2>";
		echo "Username: {$username} </br>";
		echo "password: {$password} </br>";
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
    </body>

</html>
