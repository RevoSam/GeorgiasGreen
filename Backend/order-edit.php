<?php 
  $file_open_products = '../data/product.xml';
  $file_open_orders_products = '../data/order_products.xml';
  $file_open_orders = '../data/orders.xml';
  $file_open_users = '../data/users.xml';
  if (file_exists($file_open_products) && file_exists($file_open_orders))
  {
    if (isset($_GET['ID']))
    {
      $order_found = "";
      $order_id = $_GET['ID'];
      $orders = simplexml_load_file($file_open_orders);
      $users = simplexml_load_file($file_open_users);
      $products = simplexml_load_file($file_open_products);
      foreach ($orders->order as $order){
        if ($order->order_number == $order_id)
        {
          $order_found =  $order;
        }
      }
      if (!$order_found){
        header('HTTP/1.0 404 Not Found');
        // readfile('../Products/404.php');
        // exit();
      }
    }
    else{
        header('HTTP/1.0 404 Not Found');
    //   readfile('../Products/404.php');
    //   exit();
    }
  }
  else{
    exit('Failed to open ');
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit orders</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="order-edit.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class = "sidebar">
            <img width="300" src="../assets/GGLogo.png" alt="">
           <p id="description-under-user-edit-logo">Add / Edit an order to the database</p>
        </div>
        <div class = "right-side">
            <?php
                $order_number = $order_found[0]->order_number;
                $user_id = $order_found[0]->user_id;
                $user_found = $users->xpath('/users/user/id_user[.= ' . $user_id . ']/parent::*');
                $fullname = $user_found[0]->firstname . ' ' . $user_found[0]->lastname;
                $date = date("Y-M-d",strtotime($order_found[0]->order_date));
                $status = $order_found[0]->status;
                $payment = $order_found[0]->payment;
            ?>
            <div class = "xlarge-container">
                <input type="text" name="order-number-heading" placeholder="ORDER NUMBER: <?php echo $order_number; ?>" disabled>
            </div>
            <div class = "xlarge-container">
                <input type="text" name="name" placeholder="NAME : <?php echo $fullname;?>" disabled>
            </div>
            <div class = "medium-container">
                <input type="text" name="date" placeholder="DATE : <?php echo $date;?>" disabled>
            </div>
            <div class = "medium-container">
                <input type="text" name="status" placeholder="STATUS : <?php echo $status;?> " disabled>
            </div>
            <div class = "xlarge-container" id = "purchase-list">
                <div class = "purchase-list">
                    <?php 
                    $orders_products = simplexml_load_file($file_open_orders_products);
                    $TTL = 0;
                    foreach($orders_products->order_product as $oproduct){
                        if ($oproduct->order_id == $order_id)
                        {
                            $foundproduct = "";
                            foreach($products->product as $item){
                                
                                if (strcmp($item->pdt_id, $oproduct->order_product_id) == 0)
                                {
                                    $foundproduct = $item;
                                    break;
                                }
                            }
                            //$foundproduct = $products->xpath('/products/product/pdt_id[.= ' . $oproduct->order_product . ']/parent::*');
                            $ext = $oproduct->order_qty * $oproduct->price;
                            $TTL += $ext;
                            $htmlblock = '<div class = "item" id="' . $oproduct->order_product_id . '">
                            <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="' . $oproduct->order_product_id . '" disabled>
                            </div>
                            <div class = "product-name">
                                PRODUCT NAME
                                <input type = "text" name = "product-name" placeholder="' . $foundproduct[0]->pdt_name . '" disabled>
                            </div>
                            <div class = "product-count">
                                COUNT 
                                <input id="' . $oproduct->order_product_id . '" class = "qtyfields" step = "1" type="number" name="count" value="' . $oproduct->order_qty . '" min = "0">
                            </div>
                            <div class = "product-bought-price">
                                UNIT PRICE
                                <input type = "text" id="' . $oproduct->order_product_id . 'price' . '"name = "bought-price" value = "' . $oproduct->price . '">
                            </div>
                            <div class ="total-product-price">
                                EXT
                                <input class = "productexts" type = "text" id="' . $oproduct->order_product_id . 'ext' . '" name = "bought-price" placeholder = "' . $ext . '" value = "' . $ext . '" disabled>
                            </div>
                            <div class = "delete-product">
                                <button class = "deleteBtns" type="button" id="' . $oproduct->order_product_id . '">Delete</button>
                            </div>
                            </div>';
                            echo $htmlblock;
                        }
                    }
                    ?>
                    <div id="add-to-order">
                        <button type="button" id="add-to-order">Add Product</button>
                    </div>
                </div>
            </div>
            <div class = "medium-container final-line">
                <input type="text" name="payment-type" placeholder="PAYMENT TYPE :<?php echo $payment;?>" disabled>
            </div>
            <div class = "medium-container final-line">
                <input id="total_order" type="text" name="total-amount" placeholder="TOTAL : <?php echo $TTL;?> " disabled>
            </div>
            <div class = "xlarge-container final-line">
                <button type="button" id="save-button">Save</button>
                <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button>
            </div>
        </div>
        <script type = "text/javascript" src="../scripts/orderscript.js"></script>
    </body>
</html>