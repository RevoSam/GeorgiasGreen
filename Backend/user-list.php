<!DOCTYPE html>
<html>

<head>
    <title>User List - Georgia's Greens</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user-list.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <header>
        <p>Welcome User</p>
    </header>
    <aside>
        <img src="../assets/GGLogoPicture.png" onclick="location.href='../index.php'">
        <a href="backstore.php"><span class="glyphicon glyphicon-tags"></span>&nbsp&nbspProducts</a>
        <a href="user-list.php"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspUsers</a>
        <a href="order-list.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp&nbspOrders</a>
    </aside>
    <div class="additional-components">
        
        <form action="user-edit.php">
            <button>Add User</button>
        </form>
        <input type="text" placeholder="Search..">
        <label for="search-keyword"><span class="glyphicon glyphicon-search"></span>&nbsp Search User: </label> 
    </div>
    
    <div class="margins">
        <div class="inventory-table">
            <div class="ailes">
                <p>ALL USERS</p>
            </div>
                <table class="user-table">
                    <tr>
                        <th>Name</th>
                        <th>User ID</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Delivery Address</th>
                        <th>GG points</th>
                        <th>Actions</th>
                    </tr>

                    <tr>
                        <td>Samuel L. Jackson</td>
                        <td>GG102394</td>
                        <td>muthafrucka989@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>188</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>

                    <tr>
                        <td>Kirk Langstrom</td>
                        <td>GG385712</td>
                        <td>manbat2016@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>200</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>

                    <tr>
                        <td>Mohammad Kamran</td>
                        <td>GG349481</td>
                        <td>mh1994nano@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>50</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>

                    <tr>
                        <td>Lisa Carbonaro</td>
                        <td>GG458194</td>
                        <td>lisacarbonaroper@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>100</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>

                    <tr>
                        <td>Raphael Theroux</td>
                        <td>GG102910</td>
                        <td>raphtheroux@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>154</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>

                    <tr>
                        <td>Aafreen Massoud</td>
                        <td>GG867578</td>
                        <td>aafusnafu999@gmail.com</td>
                        <td>*************</td>
                        <td>123 Streetname, City, Country</td>
                        <td>0</td>
                        <td>
                            <input type="button" value="EDIT">
                            <input type="button" value="DELETE">
                        </td>
                    </tr>
                </table>
                
            
        </div>
</body>
</html>