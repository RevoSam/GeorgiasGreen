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
  $file_open_orders = '../data/orders.xml';
  $file_open_users = '../data/users.xml';
  
  if (file_exists($file_open_orders) && file_exists($file_open_users))
  {
    $orders = simplexml_load_file($file_open_orders);
    $users = simplexml_load_file($file_open_users);
  }
  else{
    exit('Failed to open ');
  }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Order List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="order-list.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <header>
    <?php
            if (isset($_SESSION["firstname"])){
                $name = $_SESSION["firstname"];
                echo '<p class="user-display"> Welcome, '.$name.'! </p>';
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
        <?php 
        if (isset($_SESSION["id_user"])) {
          echo '<a href="../login.php?logout=true"><span class="glyphicon glyphicon-remove"></span>&nbsp&nbspLog Out</a>';
        }
        else {
         echo '<a class="nav" href="login.php">Sign in</a>';
        }
      ?>
    </aside>
    <div class="additional-components">
        <div class="additional-components">
            <button type="button" id = "button-header" onclick="location.href='order-edit.php'">Add Order</button>
            <input type="text" placeholder="Search..">
            <label for="search-keyword"><span class="glyphicon glyphicon-search"></span>&nbsp Search by keyword: </label> 
        </div>
    </div>
    <div class="margins">
        <div class="order-table">
            <div class="ailes">
                <p>Orders</p>
            </div>
            
            
            <?php 
                foreach($orders as $order){
                    $order_number = $order->order_number;
                    $fullname = $order->fullname;
                    $date = date("Y-M-d",strtotime($order->order_date));
                    $status = $order->status;
                    $total = $order->total;
                    $payment = $order->payment;
                    $url = htmlspecialchars("order-edit.php?ID=". $order->order_number );
                    $htmlblock = '<div class = "order">
                    <div class = "order-number-container">
                        ORDER NUMBER:' . $order_number . '
                    </div>
                    <div class = "name-container">
                        FULL NAME:' . $fullname . '
                    </div>
                    <div class = "date-container">
                        DATE:' . $date . '
                    </div>
                    <div class = "status-container">
                        STATUS:' . $status . '
                    </div>
                    <div class = "total-container">
                        TOTAL:' . $total . '
                    </div>
                    <div class = "payment-type-container">
                        PAYMENT TYPE:' . $payment . '
                    </div>
                    <div class = "edit-container">
                        <button class = "edit-button" onclick="location.href = \'' . $url . '\'"><p>EDIT</p></button>
                    </div>
                    <form id="deleteForm' . $order_number . '" method="POST">
                        <div class = "delete-container">
                            <input type="hidden" value= "' . $order_number . '" name="ordernumber">
                            <input class = "delete-button" type="submit" id="' . $order_number . '" value="DELETE" name="DeleteOrder">
                        </div>
                    </form>
                </div>';
                echo $htmlblock;
                }
            ?> 
        </div>
    </div>
    <footer>

    </footer>
    </div>
    <script type = "text/javascript" src="../scripts/orderlistscript.js"></script>
</body>
</html>

