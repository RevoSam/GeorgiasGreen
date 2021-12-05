<?php 
  if (isset($_POST['ordernumber']) && isset($_POST['DeleteOrder']))
  {
    $order = $_POST['ordernumber'];
    $file = '../data/orders.xml';
    $file_products = '../data/order_products.xml';
    $xml = new SimpleXMLElement(file_get_contents($file));
    $xml_products = simplexml_load_file($file_products);
    $found = $xml_products->xpath('/order_products/order_product/order_id[.=' . $order . ']/parent::*');

    $count = 0;
    foreach ($xml as $element) {
      if($element->order_number == $order)
      {
        unset($xml->order[$count]);
        break;
      }
      $count++;
    }

    foreach ($found as $product) {
      if(!empty($product))
      {
        unset($product[0]);
      }
    }
    
    $xml->saveXML();
    $xml->asXML($file);

    $xml_products->saveXML();
    $xml_products->asXML($file_products);

    header("Location: order-list.php");
    exit();
  }
?>