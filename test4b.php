<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>Welcome to INFSCI 2710</title>
    </head>
    <body>
        <div class="page">
            <h3>Hello World!</h3>
            <form class="edit-form" name="queryInput" action="test4b.php" method="POST">
                <p>Select:<input type="text" name="select" required></p>
                <p>From:<input type="text" name="from" required></p>
                <p>Where:<input type="text" name="where" required></p>
                <input type="submit" value="submit">
            </form>
            <?php
            $select = $_POST["select"];
            $from = $_POST["from"];
            $where = $_POST["where"];
            if ($select == "" || $from == "")
            {
                die("Please provide input in select and from fields.");
            }
            // Generate sql
            $sql = "select ".$select." from ".$from;
            if (trim($where) != "" )
            {
                $sql = $sql." where ".$where;
            }
            echo "<p><font color=\"red\">".$sql."</font></p>";


            // Create connection
            $servername = "localhost";
            $username = "chrisFrye";
            $password = "Redteam58$";
            $conn = new mysqli($servername, $username, $password);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "<p><font color=\"red\">Connected successfully</font></p>";

            // Run a sql
            $result = $conn->query($sql);
            if ($result)
            {
                echo "<table border=1px>";
                while($row = $result->fetch_assoc())
                {
                    echo "<tr>";
                    foreach($row as $key=>$value)
                    {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            $result->free();

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </body>
</html>