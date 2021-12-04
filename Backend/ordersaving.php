<?php 
  if(isset($_POST['saveorder']))
  {
    if(isset($_POST['order']))
    {
      $order = $_POST['order'];
      $total = $_POST['total'];
      $status = $_POST['status'];
      $cancel = false;

        $file = '../data/order_products.xml';
        $xml = simplexml_load_file($file);
        $found = $xml->xpath('/order_products/order_product/order_id[.=' . $order . ']/parent::*');

        if (isset($_POST['productcodes']) && isset($_POST['qty']) && isset($_POST['price']))
        {
              $codes = $_POST['productcodes'];
              $qty = $_POST['qty'];
              $price = $_POST['price'];
              $count_xml = count($found);
              $count_order = count($codes);

            if ($count_xml == $count_order)
            {
              for($i = 0; $i < count($codes) ; $i++)
              {
              if ($codes[$i] != "" && $qty[$i] != "" && $price[$i] != "")
              {
                foreach($found as $product)
                {
                  if (strcmp($codes[$i], $product->order_product_id) == 0)
                  {
                    $product->order_qty = $qty[$i];
                  }
                }
              }
              }
            }
            elseif ($count_xml > $count_order) {
              foreach ($found as $product) {
                $toDelete = true;
                for($i = 0; $i < count($codes) ; $i++)
                {
                  if ($codes[$i] != "" && $qty[$i] != "" && $price[$i] != "")
                  {
                      if (strcmp($codes[$i], $product->order_product_id) == 0)
                      {
                        $toDelete = false;
                      }

                  }
                }
                if ($toDelete)
                {
                  if(!empty($product))
                  {
                    unset($product[0]);
                  }
                }
              }
              }
            elseif($count_xml < $count_order)
            {
              //ADDING PRODUCTS TO THE ORDER DETAILS
            }
        }
        else {
          foreach ($found as $product) {
            if(!empty($product))
            {
              unset($product[0]);
              $cancel = true;
            }
          }
        }

        $orderfile = '../data/orders.xml';
        $orderXml = simplexml_load_file($orderfile);
        
        $orderfound = $orderXml->xpath('/orders/order/order_number[.=' . $order . ']/parent::*');        
        $orderfound[0]->total = $total;
        if ($cancel)
        {
          $orderfound[0]->status = 'Cancelled';
          $orderfound[0]->total = 0;
        }
        $orderfound[0]->status = $status;
        $orderXml->saveXML();
        $orderXml->asXML($orderfile);

    }
    
//    echo var_dump( $_POST );
    $xml->saveXML();
    $xml->asXML($file);

    header("Location: order-list.php");
    exit();


  }
?>