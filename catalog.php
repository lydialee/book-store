<?php
session_start();
$username = $_SESSION["username"];
echo $username;
echo "<br>";
$added = $_SESSION["addedToCart"];
echo $added;

$purchase = $_SESSION["purchase"];
$bookInformation = $_SESSION["updatedBook"];
echo $purchase;
echo $bookInformation;
$_SESSION["updatedBook"]= " ";
$_SESSION["purchase"] = " ";
$_SESSION["addedToCart"] = " ";
$uname = strip_tags($username);
$uname = htmlspecialchars($username);


?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="static/css/style.css" + "<?= md5(time()) ?>">
        <link rel="shortcut icon" href="static/images/favicon.ico" type="image/x-icon"/>
        <title>create new employee</title>
    </head>
    <body>
        <div class="page" id="catalog">
            
            <?php 
            $userquery = "SELECT * FROM customer WHERE customerID = '{$username}'";
            $userresult = mysqli_query($connect, $userquery);
            ?>
            
            <ul class="btns">
                <li class="cart">
                    <a href="shoppingCart.php" title="Shopping cart">
                        <img class="icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGlkPSJDYXBhXzEiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYwIDYwOyIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgNjAgNjAiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0xMS42OCwxM2wtMC44MzMtNWgtMi45OUM3LjQxMSw2LjI4LDUuODU5LDUsNCw1QzEuNzk0LDUsMCw2Ljc5NCwwLDlzMS43OTQsNCw0LDRjMS44NTksMCwzLjQxMS0xLjI4LDMuODU4LTNoMS4yOTRsMC41LDMgIEg5LjYxNGw1LjE3MSwyNi4wMTZjLTIuNDY1LDAuMTg4LTQuNTE4LDIuMDg2LTQuNzYsNC40NzRjLTAuMTQyLDEuNDA1LDAuMzIsMi44MTIsMS4yNjgsMy44NThDMTIuMjQyLDQ4LjM5NywxMy41OTQsNDksMTUsNDloMiAgYzAsMy4zMDksMi42OTEsNiw2LDZzNi0yLjY5MSw2LTZoMTFjMCwzLjMwOSwyLjY5MSw2LDYsNnM2LTIuNjkxLDYtNmg0YzAuNTUzLDAsMS0wLjQ0NywxLTFzLTAuNDQ3LTEtMS0xaC00LjM1ICBjLTAuODI2LTIuMzI3LTMuMDQzLTQtNS42NS00cy00LjgyNCwxLjY3My01LjY1LDRoLTExLjdjLTAuODI2LTIuMzI3LTMuMDQzLTQtNS42NS00cy00LjgyNCwxLjY3My01LjY1LDRIMTUgIGMtMC44NDIsMC0xLjY1Mi0wLjM2Mi0yLjIyNC0wLjk5M2MtMC41NzctMC42MzktMC44NDgtMS40NjEtMC43NjEtMi4zMTZjMC4xNTItMS41MDksMS41NDYtMi42OSwzLjE3My0yLjY5aDAuNzkxICBjMC4wMTQsMCwwLjAyNSwwLDAuMDM5LDBoMzguOTk0QzU3Ljc2Myw0MSw2MCwzOC43NjMsNjAsMzYuMDEzVjEzSDExLjY4eiBNNCwxMWMtMS4xMDMsMC0yLTAuODk3LTItMnMwLjg5Ny0yLDItMnMyLDAuODk3LDIsMiAgUzUuMTAzLDExLDQsMTF6IE00Niw0NWMyLjIwNiwwLDQsMS43OTQsNCw0cy0xLjc5NCw0LTQsNHMtNC0xLjc5NC00LTRTNDMuNzk0LDQ1LDQ2LDQ1eiBNMjMsNDVjMi4yMDYsMCw0LDEuNzk0LDQsNHMtMS43OTQsNC00LDQgIHMtNC0xLjc5NC00LTRTMjAuNzk0LDQ1LDIzLDQ1eiBNNTgsMzYuMDEzQzU4LDM3LjY2LDU2LjY2LDM5LDU1LjAxMywzOUgxNi44MjFsLTQuNzctMjRINThWMzYuMDEzeiIvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjxnLz48Zy8+PGcvPjwvc3ZnPg==" alt="">
                    </a>
                </li>
                <li class="edit">
                    <a href="editCustomer.php" title="Edit profile">
                        <img class="icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUxMiA1MTIiIGhlaWdodD0iNTEycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiB3aWR0aD0iNTEycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0yNTcuMTA3LDVDMTE4LjQ3Myw1LDYuMTA5LDExNy4zNjUsNi4xMDksMjU1Ljk5OEM2LjEwOSwzOTQuNjMxLDExOC40NzMsNTA3LDI1Ny4xMDcsNTA3ICBzMjUwLjk5OC0xMTIuMzcsMjUwLjk5OC0yNTEuMDAyQzUwOC4xMDUsMTE3LjM2NSwzOTUuNzQsNSwyNTcuMTA3LDV6IE0yNTcuMTA3LDI1LjkxN2MxMjYuODY4LDAsMjMwLjA4MiwxMDMuMjE0LDIzMC4wODIsMjMwLjA4MiAgYzAsNTUuODE1LTE5Ljk5NywxMDcuMDQzLTUzLjE5LDE0Ni45MjZjLTIyLjkzOS05LjU4LTc3LjA4OS0yOC4zNzItMTEwLjYwOS0zOC4yNjljLTIuODU5LTAuODk4LTMuMzA5LTEuMDQyLTMuMzA5LTEyLjk0ICBjMC05LjgyNiw0LjA0NC0xOS43MjEsNy45ODctMjguMDk2YzQuMjY5LTkuMSw5LjMzNC0yNC4zOTksMTEuMTUzLTM4LjEyNmM1LjA4Ni01LjkwNCwxMi4wMS0xNy41NDcsMTYuNDYzLTM5LjczOSAgYzMuOTAxLTE5LjU1OSwyLjA4My0yNi42NzctMC41MS0zMy4zNTdjLTAuMjY2LTAuNzA1LTAuNTUyLTEuMzk5LTAuNzU2LTIuMDk0Yy0wLjk4MS00LjU4NiwwLjM2Ny0yOC40MTMsMy43MTgtNDYuODk5ICBjMi4zMDgtMTIuNjg1LTAuNTkzLTM5LjY1OC0xOC4wNTctNjEuOTcyYy0xMS4wMy0xNC4xMDUtMzIuMTMxLTMxLjQxNi03MC42NzUtMzMuODI2bC0yMS4xNDEsMC4wMiAgYy0zNy44OTEsMi4zOTEtNTkuMDEyLDE5LjcwMS03MC4wNDIsMzMuODA2Yy0xNy40NjQsMjIuMzE1LTIwLjM2NCw0OS4yODgtMTguMDU2LDYxLjk2M2MzLjM3LDE4LjQ5NSw0LjY5OCw0Mi4zMjIsMy43MzgsNDYuODE2ICBjLTAuMjA0LDAuNzg2LTAuNDksMS40ODEtMC43NzYsMi4xODZjLTIuNTc0LDYuNjgtNC40MTIsMTMuNzk4LTAuNDksMzMuMzU3YzQuNDMyLDIyLjE5MiwxMS4zNTcsMzMuODM2LDE2LjQ2MywzOS43MzkgIGMxLjc5OCwxMy43MjYsNi44NjQsMjkuMDI2LDExLjE1MywzOC4xMjZjMy4xMjUsNi42NTksNC41OTYsMTUuNzE4LDQuNTk2LDI4LjUyNWMwLDExLjg5OC0wLjQ1LDEyLjA0Mi0zLjEyNiwxMi44ODkgIGMtMzQuNjYzLDEwLjIzNC04OS44MzQsMzAuMTctMTEwLjQwNCwzOS4xNzhjLTMzLjg0Ni00MC4wNjYtNTQuMjkzLTkxLjc4NS01NC4yOTMtMTQ4LjIxMiAgQzI3LjAyNSwxMjkuMTMsMTMwLjIzOSwyNS45MTcsMjU3LjEwNywyNS45MTd6IE05Ni40NzQsNDIwLjUxNmMyMy41NTItOS42MTUsNzAuNTEyLTI2LjM2NSwxMDEuMzU1LTM1LjQ3NSAgYzE3LjkzNS01LjY1OCwxNy45MzUtMjAuNzYzLDE3LjkzNS0zMi44OTZjMC0xMC4wNi0wLjY5NC0yNC44OS02LjU3Ny0zNy40MzFjLTQuMDQ1LTguNTg5LTguNjYyLTIzLjMxNy05LjY4Mi0zNC44NDcgIGMtMC4yMjUtMi42OTYtMS40OTEtNS4xODgtMy41MzQtNi45NjVjLTIuOTYyLTIuNTk1LTguOTg4LTEyLjA5My0xMi44MjgtMzEuMjUyYy0zLjA0My0xNS4xNjctMS43NTYtMTguNDg2LTAuNTEtMjEuNjkzICBjMC41MzEtMS4zNjksMS4wNDItMi43MTcsMS40NTEtNC4yMzljMi41MTItOS4xODEtMC4yODctMzkuMzQxLTMuMzMtNTYuMDdjLTEuMzI3LTcuMjcyLDAuMzQ3LTI3LjkzMywxMy45NTEtNDUuMzM3ICBjMTIuMTk0LTE1LjU5NSwzMC42NTktMjQuMjg3LDU0LjIxMS0yNS43ODhsMTkuODM0LTAuMDIxYzI0LjE4NSwxLjUyMiw0Mi42NSwxMC4yMTQsNTQuODY1LDI1LjgwOSAgYzEzLjYwNCwxNy40MDQsMTUuMjU5LDM4LjA2NSwxMy45Myw0NS4zNDZjLTMuMDIzLDE2LjcyLTUuODQyLDQ2Ljg3OS0zLjMzLDU2LjA1YzAuNDMsMS41MzIsMC45MTksMi44OCwxLjQ1MSw0LjI0OSAgYzEuMjQ3LDMuMjA2LDIuNTMzLDYuNTI2LTAuNDksMjEuNjkzYy0zLjgzOSwxOS4xNi05Ljg4NiwyOC42NTgtMTIuODQ4LDMxLjI1MmMtMi4wMjIsMS43NzctMy4yODgsNC4yNjktMy41MzQsNi45NjUgIGMtMS4wMDEsMTEuNTMtNS42MTcsMjYuMjU4LTkuNjYxLDM0Ljg0N2MtNC42MzcsOS44NTYtOS45NjgsMjIuOTgtOS45NjgsMzcuMDAyYzAsMTIuMTM0LDAsMjcuMjM5LDE4LjExOCwzMi45NDggIGMyOS41MTYsOC43MjIsNzYuNzAxLDI0LjkzLDEwMS42MjEsMzQuNzNjLTQxLjYwOCw0MS4xOTktOTguNzgxLDY2LjY5MS0xNjEuNzk3LDY2LjY5MSAgQzE5NC42NjQsNDg2LjA4NCwxMzcuOTgxLDQ2MS4wNDIsOTYuNDc0LDQyMC41MTZ6IiBmaWxsPSIjMzc0MDREIi8+PC9zdmc+" alt="">
                    </a>
                </li>
                <li class="trans">
                    <a href="transactions.php" title="All transactions">
                        <img class="icon" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMC8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvVFIvMjAwMS9SRUMtU1ZHLTIwMDEwOTA0L0RURC9zdmcxMC5kdGQnPjxzdmcgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgMjAwIDIwMCIgaGVpZ2h0PSIyMDBweCIgaWQ9IkxheWVyXzEiIHZlcnNpb249IjEuMCIgdmlld0JveD0iMCAwIDIwMCAyMDAiIHdpZHRoPSIyMDBweCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PGcgaWQ9Ik5ld19TeW1ib2wiLz48ZyBpZD0iTmV3X1N5bWJvbF8xXyIvPjxnIGlkPSJOZXdfU3ltYm9sXzEiLz48ZyBpZD0iTmV3X1N5bWJvbF85XzJfIi8+PGcgaWQ9Ik5ld19TeW1ib2xfNyIvPjxnIGlkPSJOZXdfU3ltYm9sXzlfMV8iLz48ZyBpZD0iTmV3X1N5bWJvbF85Ii8+PGcgaWQ9Ik51ZXZvX3PDrW1ib2xvIi8+PGcgaWQ9Ik5ld19TeW1ib2xfMTAiLz48ZyBpZD0iTmV3X1N5bWJvbF8xMiIvPjxnIGlkPSJOZXdfU3ltYm9sXzE0Ii8+PGcgaWQ9Ik5ld19TeW1ib2xfMTUiLz48ZyBpZD0iTmV3X1N5bWJvbF8xNiIvPjxnIGlkPSJOZXdfU3ltYm9sXzE3XzFfIi8+PGcgaWQ9Ik5ld19TeW1ib2xfMTgiLz48ZyBpZD0iTmV3X1N5bWJvbF8xOSIvPjxnIGlkPSJOZXdfU3ltYm9sXzE3Ii8+PGc+PGc+PGc+PHBhdGggZD0iTTEzOSw5N0g2MlYyOWwxMi41LDEwLjJsMTIuNi0xMC4zTDEwMCwzOS42bDEyLjgtMTAuOEwxMjUsMzkuM2wxNC0xMi4xVjk3eiBNNjUsOTRoNzFWMzMuNmwtMTEsOS42bC0xMi4zLTEwLjVMMTAwLDQzLjUgICAgIEw4Ny4yLDMyLjdMNzQuNSw0My4xTDY1LDM1LjRWOTR6Ii8+PC9nPjwvZz48Zz48Zz48cGF0aCBkPSJNMTQ3LDEwNkg1NFY5NGg5M1YxMDZ6IE01NywxMDNoODd2LTZINTdWMTAzeiIvPjwvZz48L2c+PGc+PGc+PHBhdGggZD0iTTE0NywxNDQuM2MwLDItMS43LDMuNy0zLjcsMy43aC0xOS42Yy0yLDAtMy43LTEuNy0zLjctMy43di01LjZjMC0yLDEuNy0zLjcsMy43LTMuN2gxOS42YzIsMCwzLjcsMS43LDMuNywzLjdWMTQ0LjN6ICAgICAgTTE0NCwxMzguN2MwLTAuNC0wLjMtMC43LTAuNy0wLjdoLTE5LjZjLTAuNCwwLTAuNywwLjMtMC43LDAuN3Y1LjZjMCwwLjQsMC4zLDAuNywwLjcsMC43aDE5LjZjMC40LDAsMC43LTAuMywwLjctMC43VjEzOC43eiIvPjwvZz48L2c+PGc+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI4LjEiIHg9IjEwOC41IiB5PSI2My40Ii8+PC9nPjwvZz48Zz48Zz48cG9seWdvbiBwb2ludHM9Ijc3LjIsNjMuNCAxMDYuNiw2My40IDEwNi42LDYzLjQgMTA2LjYsNjYuNSA3Ny4yLDY2LjUgICAgICIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI0NiIgeD0iNzcuMiIgeT0iNTguMyIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI1LjIiIHg9IjEyMC45IiB5PSI1MyIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI0MS40IiB4PSI3Ny4yIiB5PSI1MyIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI4LjEiIHg9IjEwOC41IiB5PSI3My44Ii8+PC9nPjwvZz48Zz48Zz48cG9seWdvbiBwb2ludHM9Ijc3LjIsNzcgMTA2LjYsNzcgMTA2LjYsNzcgMTA2LjYsNzMuOCA3Ny4yLDczLjggICAgICIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI0NiIgeD0iNzcuMiIgeT0iNzkiLz48L2c+PC9nPjxnPjxnPjxyZWN0IGhlaWdodD0iMy4xIiB3aWR0aD0iNS4yIiB4PSIxMjAuOSIgeT0iODQuMiIvPjwvZz48L2c+PGc+PGc+PHJlY3QgaGVpZ2h0PSIzLjEiIHdpZHRoPSI0MS40IiB4PSI3Ny4yIiB5PSI4NC4yIi8+PC9nPjwvZz48L2c+PGc+PGc+PHBhdGggZD0iTTE2MiwxNzNIMzd2LTcyLjZDMzcsODYuOSw0OC43LDc1LDYzLjgsNzIuN2wwLjMsM0M1MC40LDc3LjcsNDAsODguNCw0MCwxMDAuNFYxNzBoMTE5di02OS42YzAtMTEuNy04LjctMjEuNy0yMS40LTI0LjQgICAgIGwwLjUtMi45YzE0LjIsMywyMy45LDE0LjIsMjMuOSwyNy4zVjE3M3oiLz48L2c+PC9nPjxnPjxnPjxyZWN0IGhlaWdodD0iMyIgd2lkdGg9IjkwIiB4PSI1NyIgeT0iMTE5Ii8+PC9nPjwvZz48L2c+PC9zdmc+" alt="">
                    </a>
                </li>
            </ul>

            <h1><b>Book List</b></h1>
            <p>Order by:</p>
            <form id="filters" method="post" action="catalog.php" autocomplete = "off">
                <input type="submit" name="submitType" value="type">
                <input type="submit" name="submitMaterial" value="material">
                <input type="submit" name="submitLowQuantity" value="lowest quantity">
                <input type="submit" name="submitHighQuantity" value="highest quantity">
                <input type="submit" name="submitLowPrice" value="lowest price">
                <input type="submit" name="submitHighPrice" value="highest price">
                <input type="submit" name="submitCity" value="city location">
            </form>
            <table id = "table1">   
                <tr>
                    <th>BookID</th>
                    <th>Book name</th>
                    <th>Book type</th>
                    <th>Book material</th>
                    <th>Book price</th>
                    <th>Number of Books left</th>
                    <th>Store Location</th> 
                    <th>Quantity to buy</th>
                    <th>Add to Cart</th>
                    <th>Edit Book</th>

                </tr>
        </div>
            <?php
            $query = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID ";

            $queryType = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity
            ORDER BY book.bookType";

            $queryMaterial = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity
            ORDER BY book.bookMaterial";

            $queryLowQuantity = "
SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity ORDER BY `book`.`bookQuantity` ASC";

            $queryHighQuantity = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity ORDER BY `book`.`bookQuantity` DESC";

                $queryPriceHigh = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
            GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity  
            ORDER BY `book`.`bookPrice`  DESC";

            $queryPriceLow = "SELECT book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity,store.city,store.state FROM book, store WHERE store.storeID = book.StoreID
                GROUP BY book.bookID, book.bookTitle,book.bookType, book.bookMaterial, book.bookPrice, book.bookQuantity  
                ORDER BY `book`.`bookPrice`  ASC";

            include('databaseConnect.php');
            $result = mysqli_query($connect, $query);
            if($_POST["submitType"])
            {
                $result = mysqli_query($connect, $queryType);
            }
            if($_POST["submitMaterial"])
            {
                $result = mysqli_query($connect, $queryMaterial);
            }
            if($_POST["submitLowQuantity"])
            {
                $result = mysqli_query($connect, $queryLowQuantity);
            }
              if($_POST["submitHighQuantity"])
            {
                $result = mysqli_query($connect, $queryHighQuantity);
            }
            if($_POST["submitLowPrice"])
            {
                $result = mysqli_query($connect, $queryPriceLow);
            }
            if($_POST["submitHighPrice"])
            {
                $result = mysqli_query($connect, $queryPriceHigh);
            }
            while($row = mysqli_fetch_assoc($result)){
                echo 
                    "<tr>
                                <td>".$row["bookID"]. "</td>
                                <td>" . $row["bookTitle"]. "</td>
                                <td>" . $row["bookType"]."</td>
                                <td>" . $row["bookMaterial"]."</td>
                                <td>$" . $row["bookPrice"]. "</td>
                                <td>" . $row["bookQuantity"]."</td>
                                 <td>" . $row["city"]."</td>";
                echo "<td> <form method='post' action='addToShoppingCart.php?bookID=".$row['bookID']."'> 
               <input type='number' name='quantity'> </td>"; 
                echo "<td> <input class='autoWidth' type='submit' name='submit' value='+'></form></td>";
                echo "<td> <form method='post' action='editBook.php?bookID=".$row['bookID']."'> "; 
                echo " <input class='autoWidth' type='submit' name='submit' value='Edit'></form></td>";
                echo "</tr>";

            }

            ?>

        </table>
    </body>
</html>