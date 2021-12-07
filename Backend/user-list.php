<?php 
    session_start();
    if (isset($_SESSION["admin"])){
        if ($_SESSION["admin"] == 0) {
            header("location: ../index.php");
        }
    }
    else {
        header("location: ../index.php");
    }
?>

<?php 
  $file_open_users = '../data/users.xml';
  
  
  if (file_exists($file_open_users))
  {
    $users = simplexml_load_file($file_open_users);
  }
  else{
    exit('Failed to open ');
  }

  //Delete an item from the xml file
if(isset($_POST["delete"]))
{
    $xml = new DomDocument("1.0","UTF-8");
    $xml->load("../data/users.xml");
foreach($_POST as $key=>$value)
    {
        $product_to_delete_id = $value;
    }
    $xpath = new DOMXPATH($xml);

foreach($xpath->query("/users/user[id_user = '$product_to_delete_id']") as $node)
    {
        $node->parentNode->removeChild($node);
    }

    $xml->save("../data/users.xml");
    header("Location: user-list.php");
}

//Send the user to the edit page for the selected user using the user ID
if(isset($_POST["edit"])){
    foreach($_POST as $key=>$value)
    {
        $product_to_edit_id = $value;
    }
    header("Location: user-edit.php?ID={$product_to_edit_id}");
}

?>

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
<form method = "POST">
    <header>
    <?php
            if (isset($_SESSION["firstname"])){
                $name = $_SESSION["firstname"];
                echo "<p>Welcome {$name} </p>";
            }
            else {
                echo "<p>Welcome User</p>";
            }
        ?>
    </header>
    <aside>
        <img src="../assets/GGLogoPicture.png" onclick="location.href='../index.php'">
        <a href="backstore.php"><span class="glyphicon glyphicon-tags"></span>&nbsp&nbspProducts</a>
        <a href="user-list.php"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspUsers</a>
        <a href="order-list.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp&nbspOrders</a>
    </aside>
    <div class="additional-components">
        <div class="additional-components">
            <button type="button" id = "button-header" onclick="location.href='user-edit.php'">Add User</button>
            <input type="text" placeholder="Search..">
            <label for="search-keyword"><span class="glyphicon glyphicon-search"></span>&nbsp Search by keyword: </label> 
        </div>
    </div>
    
    <div class="margins">
        <div class="user-table">
            <div class="ailes">
                <p>ALL USERS</p>
            </div>

            

            <?php 
                foreach($users as $user){
                    $userID = $user->id_user;
                    $userAddID = $user->id_add_user;
                    $firstName = $user->firstname;
                    $lastName = $user->lastname;
                    $isAdmin = ($user->admin == 1) ? "Yes" : "No";
                    $email = $user->email;
                    $ggPoints = $user->points;
                    $address = $user->address;
                    $id = urlencode($user->id_user);
                    $url = htmlspecialchars("user-edit.php?ID=".$id );
                    //$url = htmlspecialchars("user-edit.php?ID=". $user->id_user );
                    $htmlblock = '<div class = "order">
                    <div class = "order-number-container">
                        <strong>USER ID:</strong> ' . $userID . '
                    </div>
                    <div class = "name-container">
                        <strong>First Name:</strong> ' . $firstName. '
                    </div>
                    <div class = "date-container">
                        <strong>Last Name:</strong> ' . $lastName . '
                    </div>
                    <div class = "status-container">
                        <strong>Is Admin?:</strong> ' . $isAdmin . '
                    </div>
                    <div class = "total-container">
                        <strong>Email:</strong> ' . $email . '
                    </div>
                    <div class = "payment-type-container">
                        <strong>GG Points:</strong> ' . $ggPoints . '
                    </div>
                    <div class = "total-container2">
                        <strong>Address:</strong> ' . $address . '
                    </div>
                    <div class = "action-container">
                        <button name = edit class = "edit-button" value = \''. $user->id_user . ' \' onclick = location.href=\'' . $url . '\'><p>EDIT</p></button>
                        <button type = submit name = delete  class = "delete-button" value = \''. $userID . '\'><p>DELETE</p></button>
                    </div>
                </div>';
                echo $htmlblock;
                }
            ?>
        </div>
    </div>
</form> 
</body>
</html>