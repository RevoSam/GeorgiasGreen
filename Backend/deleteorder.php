<?php 
  if (isset($_POST['ordernumber']) && isset($_POST['DeleteOrder']))
  {
    $order = $_POST['ordernumber'];
    $file = '../data/orders.xml';
    $xml = new SimpleXMLElement(file_get_contents($file));
    //$found = $xml->xpath('/orders/order/order_number[.=' . $order . ']/parent::*');

    $count = 0;
    foreach ($xml as $element) {
      if($element->order_number == $order)
      {
        unset($xml->order[$count]);
        break;
      }
      $count++;
    }
    
    $xml->saveXML();
    echo $xml->asXML($file);
    header("Location: order-list.php");
    exit();
  }
?>