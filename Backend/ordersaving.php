<?php 
    if(isset($_POST['saveorder']))
  {
    if(isset($_POST['order']))
    {
      echo 'Order IN' . '<br>';
      $order = $_POST['order'];
      $total = $_POST['total'];
      $status = $_POST['status'];
      $payment = $_POST['payment'];
      $cancel = false;

        $file = '../data/order_products.xml';
        $xml = simplexml_load_file($file);
        $found = $xml->xpath('/order_products/order_product/order_id[.=' . $order . ']/parent::*');

        if (isset($_POST['productcodes']) && isset($_POST['qty']) && isset($_POST['price']))
        {
              echo 'In Here' . '<br>';
              $codes = $_POST['productcodes'];
              $qty = $_POST['qty'];
              $price = $_POST['price'];
              $count_xml = count($found);
              $count_order = count($codes);

            if ($count_xml == $count_order)
            {
              echo 'Altering Qtys' . '<br>';
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
              echo 'Deleting some' . '<br>';
              foreach ($found as $product) {
                $toDelete = true;
                for($i = 0; $i < count($codes) ; $i++)
                {
                  if ($codes[$i] != "" && $qty[$i] != "" && $price[$i] != "")
                  {
                      if (strcmp($codes[$i], $product->order_product_id) == 0)
                      {
                        echo $product->order_product_id . ' to keep ' . '<br>';
                        $toDelete = false;
                      }

                  }
                }
                if ($toDelete)
                {
                  echo $product->order_product_id . ' to be deleted ' . '<br>';
                  if(!empty($product))
                  {
                    unset($product[0]);
                  }
                }
              }
              }
            elseif($count_xml < $count_order)
            {
              echo 'Adding some' . '<br>';
              for($i = 0; $i < count($codes) ; $i++)
              {
                if ($codes[$i] != "" && $qty[$i] != "" && $price[$i] != "")
                {
                  $new = true;
                  foreach($found as $product)
                  {
                    if (strcmp($codes[$i], $product->order_product_id) == 0)
                    {
                      $product->order_qty = $qty[$i];
                      $new = false;
                    }

                  }
                  if($new)
                  {
                    $id = 0;
                    $id =  $xml->childNodes->length;
                    $id += 1;
                    $newproduct = $xml->addChild('order_product');
                    $newproduct->addChild('id', $id);
                    $newproduct->addChild('order_id',$order);
                    $newproduct->addChild('order_product_id',$codes[$i]);
                    $newproduct->addChild('order_qty',$qty[$i]);
                    $newproduct->addChild('price',$price[$i]);
                  }
                
              }
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
        $orderfound[0]->status = $status;
        $orderfound[0]->payment = $payment;
        if ($cancel)
        {
          $orderfound[0]->status = 'Cancelled';
          $orderfound[0]->total = 0;
        }
        
        $orderXml->saveXML();
        $orderXml->asXML($orderfile);

    }
    
//    echo var_dump( $_POST );
    $xml->saveXML();
    $xml->asXML($file);

    header("Location: order-list.php");
    exit();


  }
}
?>