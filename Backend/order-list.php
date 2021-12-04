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
        <p>Welcome User</p>
    </header>
    <aside>
        <img src="../assets/GGLogoPicture.png" onclick="location.href='../index.html'">
        <a href="backstore.html"><span class="glyphicon glyphicon-tags"></span>&nbsp&nbspusers</a>
        <a href="user-list.html"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspUsers</a>
        <a href="order-list.html"><span class="glyphicon glyphicon-credit-card"></span>&nbsp&nbspOrders</a>
    </aside>
    <div class="additional-components">
        <div class="additional-components">
            <button type="button" id = "button-header" onclick="location.href='order-edit.html'">Add Order</button>
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
                foreach($orders  as $order){
                    $order_number = $order->order_number;
                    $user_id = $order->user_id;
                    $user_found = $users->xpath('/users/user/id_user[.= ' . $user_id . ']/parent::*');
                    $fullname = $user_found[0]->firstname . ' ' . $user_found[0]->lastname;
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
                    <div class = "delete-container">
                        <button class = "delete-button"><p>DELETE</p></button>
                    </div>
                </div>';
                echo $htmlblock;
                }
            ?>
            <!-- 
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class = "order">
                <div class = "order-number-container">
                    ORDER NUMBER
                </div>
                <div class = "name-container">
                    FULL NAME
                </div>
                <div class = "date-container">
                    DATE
                </div>
                <div class = "status-container">
                    STATUS
                </div>
                <div class = "total-container">
                    TOTAL
                </div>
                <div class = "payment-type-container">
                    PAYMENT TYPE
                </div>
                <div class = "edit-container">
                    <button class = "edit-button" onclick="location.href='order-edit.html'"><p>EDIT</p></button>
                </div>
                <div class = "delete-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div> -->
        </div>
    </div>
    <footer>

    </footer>
    </div>
</body>
</html>

