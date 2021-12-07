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
  $file_open_products = '../data/product.xml';
  $file_open_orders_products = '../data/order_products.xml';
  $file_open_orders = '../data/orders.xml';
    $file_open_aisles = '../data/aisles.xml';

  if (file_exists($file_open_products) && file_exists($file_open_orders))
  {
    $editing = false;
    $operation = "Adding";
    $products = simplexml_load_file($file_open_products);
    $aisles = simplexml_load_file($file_open_aisles);
    if (isset($_GET['ID']))
    {
      $editing = true;
      $operation = "Editing";
      $order_found = "";
      $order_id = $_GET['ID'];
      $orders = simplexml_load_file($file_open_orders);
      
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
                $order_number= null;
                $fullname = null;
                $date = date("Y-M-d");
                $status = "null";
                $payment = "null";
                if ($editing)
                {
                    $order_number = $order_found[0]->order_number;
                    $fullname =$order_found[0]->fullname;
                    $date = date("Y-M-d",strtotime($order_found[0]->order_date));
                    $status = $order_found[0]->status;
                    $payment = $order_found[0]->payment;
                }
            ?>
            <form action="ordersaving.php" method="POST">
                <div class = "xlarge-container">
                    <span>Order number: </span><input type="text" name="order" placeholder="<?php echo $order_number ?? "Auto Generated"; ?>" value="<?php echo $order_number; ?>" readonly>
                </div>
                <div class = "xlarge-container">
                <span>Customer's Full name: </span>
                    <input type="text" name="fullname" placeholder="Full name" value="<?php echo $fullname;?>">
                </div>
                <div class = "medium-container">
                <span>Date: </span>
                    <input type="text" name="date" value="<?php echo $date;?>" readonly>
                </div>
                <div class = "medium-container">
                    <span>Status: </span>
                        <select name="status" style="width:100%;">
                            <?php 
                            $options = array("Pending", "Shipped", "Cancelled", "Fulfilled", "Ready");
                            foreach ($options as $option) {
                                if (strcmp(strtolower($option), strtolower($status)) == 0)
                                {
                                    echo "<option selected value='$option'>$option</option>";
                                }
                                else{
                                    echo "<option value=$option>$option</option>";
                                }
                                
                            }?>
                        </select>
                </div>
            
                <div class = "xlarge-container" id = "purchase-list">
                    <div id = "listOfProducts" class = "purchase-list">
                        <!-- Paste here -->
                        <?php 
                        $TTL = 0;
                        if($editing)
                        {
                            $orders_products = simplexml_load_file($file_open_orders_products);
                            
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
                                    
                                    $ext = $oproduct->order_qty * $oproduct->price;
                                    $TTL += $ext;
                                    $htmlblock = '<div class = "item" id="' . $oproduct->order_product_id . '">
                                    <div class = "product-code">
                                    PRODUCT CODE
                                    <input type="text" name="productcodes[]" value="' . $oproduct->order_product_id . '" readonly>
                                    </div>
                                    <div class = "product-name">
                                        PRODUCT NAME
                                        <input type="text" name="productnames[]" value="' . $foundproduct[0]->pdt_name . '" readonly>
                                    </div>
                                    <div class = "product-count">
                                        COUNT 
                                        <input id="' . $oproduct->order_product_id . '" class = "qtyfields" step = "1" type="number" name="qty[]" value="' . $oproduct->order_qty . '" min = "0">
                                    </div>
                                    <div class = "product-bought-price">
                                        UNIT PRICE
                                        <input type = "text" id="' . $oproduct->order_product_id . 'price' . '"name = "price[]" value = "' . $oproduct->price . '">
                                    </div>
                                    <div class ="total-product-price">
                                        EXT
                                        <input class = "productexts" type = "text" id="' . $oproduct->order_product_id . 'ext' . '" name = "ext[]" placeholder = "' . $ext . '" value = "' . $ext . '" readonly>
                                    </div>
                                    <div class = "delete-product">
                                        <button class = "deleteBtns" type="button" id="' . $oproduct->order_product_id . '">Delete</button>
                                    </div>
                                    </div>';
                                    echo $htmlblock;
                                }
                            }
                        }
                        
                        ?>
                    </div>
                    <div  class = "purchase-list" >
                                <div id = "listAddingProducts" class = "item">
                                    <div class = "product-code">
                                        PRODUCT CODE
                                        <select id="productselection" style="width:100%;">
                                            <option selected>Select a Product</option>
                                            <?php
                                                $aisles;
                                                $last_item = 0;
                                                $foundaisle;
                                                foreach ($products as $product) {
                                                    if (strcmp($product->pdt_al_id, $last_item) != 0)
                                                    {
                                                        foreach ($aisles->aisle as $aisle) {
                                                            if (strcmp($aisle->al_id, $product->pdt_al_id) == 0)
                                                            {
                                                                $foundaisle = $aisle;
                                                                break;
                                                            }
                                                        }
                                                        echo "<optgroup label='" . $foundaisle->al_name . "'>";
                                                        
                                                    }
                                                    
                                                    echo "<option value='$product->pdt_id'>$product->pdt_id</option>";
                                                    if (strcmp($product->pdt_al_id, $last_item) != 0)
                                                    {
                                                        echo "</optgroup>";
                                                    }
                                                    $last_item = $product->pdt_al_id;
                                                }
                                            ?>
                                        </select>
                                        
                                    </div>
                                    <div class = "product-name">
                                        PRODUCT NAME
                                        <input id="productname" type="text" name="productnames[]" readonly>
                                    </div>
                                    <div class = "product-count">
                                        COUNT 
                                        <input id="productqty" step = "1" type="number" name="qty[]" value="1" min = "0">
                                    </div>
                                    <div class = "product-bought-price">
                                        UNIT PRICE
                                        <input type = "text" id="productprice" name = "price[]" value = "">
                                    </div>
                                    <div class = "tax-price">
                                    </div>
                                    <div class ="total-product-price">
                                        EXT
                                        <input type = "text" id="extproduct" name = "ext[]" >
                                    </div>
                                    <div class = "delete-product">
                                    </div>
                                </div>
                        <div id="add-to-order">
                            <button type="button" id="add_order">Add Product</button>
                        </div>
                    </div>
                    
                </div>
                <div class = "medium-container final-line">
                    <span>Payment type</span>
                    <select name="payment" style="width:100%;">
                        <?php 
                            $options = array("Cash", "Debit", "Credit", "Interac");
                            foreach ($options as $option) {
                                if (strcmp(strtolower($option), strtolower($payment)) == 0)
                                {
                                    echo "<option selected value='$option'>$option</option>";
                                }
                                else
                                {
                                    echo "<option value='$option'>$option</option>";
                                }
                            }
                        ?>
                    </select>
                    <!-- <input type="text" name="payment" value="<?php echo $payment;?>" readonly> -->
                </div>
                <div class = "medium-container final-line">
                    <span>Total</span>
                    <input id="total_order" type="text" name="total" value="<?php echo $TTL;?> " readonly>
                </div>
                <div class = "xlarge-container final-line">
                    <input type="submit" id="save-button" value="save" name="saveorder">
                    <button type="button" id="cancel-button" onclick="location.href='order-list.php'">Cancel</button>
                </div>
                <input type="hidden" name="operation" value="<?php echo $operation?>">
            </form>
        </div>
        <script type = "text/javascript" src="../scripts/orderscript.js"></script>
    </body>
</html>