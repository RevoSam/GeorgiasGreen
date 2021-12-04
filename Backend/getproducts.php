<?php 
  if(isset($_GET['ID']))
  {
    $id = $_GET['ID'];

    $file_open_products = '../data/product.xml';
    $products = simplexml_load_file($file_open_products);
    $values = "";

    foreach ($products as $product) {
      if (strcmp(strtolower($product->pdt_id), strtolower($id)) == 0){
        $values =  $product->pdt_name . '#' . $product->pdt_price;
        break;
      }
    }
    echo $values;
  }
?>