<?php
        $productExist = false;
        $file_open_aisles = '../data/aisles.xml'; //'../../data/aisles.xml'
        $file_open_products = '../data/product.xml';

        error_reporting(E_ERROR | E_PARSE); 
        if (file_exists($file_open_products)) {
            //if it has a GET value
            $productExist = true;
            $products = simplexml_load_file($file_open_products);
            if (isset($_GET['ID'])) {

                $product_id = $_GET['ID'];
                $product_to_load = $products->xpath('/products/product/pdt_id[.= "'. $product_id. '"]/parent::*')[0];
            }
        } else {
            exit('Failed to open ');
        }

        if(isset($_POST['insert']) && !$productExist) //Then we add the item
        {
            
            $code = $_POST['product-code'];
            $aile = $_POST['department']; //how to get the value
            $order;
            $name = $_POST['product-name'];
            $short_description = $_POST['short-description'];
            $long_description = $_POST['long-description'];
            $price = $_POST['product-price'];
            $pkg;
            $unit;
            $brand = $_POST['product-brand'];
            $quantity = $_POST['product-qty'];
            $origin = $_POST['product-origin'];
            $image;
            

            $xml = new DOMDocument("1.0","UTF-8");
            $xml->load("../data/product.xml");
            $rootTag = $xml->getElementsByTagName("products")->item(0);

                $productTag = $xml->createElement("product");
                    $codeTag = $xml->createElement("pdt_id",$code);
                    $aileTag = $xml->createElement("pdt_al_id", translateDpt($aile));//ADD SOMETHING ITS IMPORTANT
                    $orderTag = $xml -> createElement("pdt_order_name","");//pdt_order_number
                    $nameTag = $xml->createElement("pdt_name",$name);
                    $shortTag = $xml->createElement("pdt_short_description",$short_description);
                    $longTag = $xml->createElement("pdt_description",$long_description);
                    $priceTag = $xml->createElement("pdt_price",$price);
                    $packageTag = $xml->createElement("pdt_packet_type","");//pdt_package_type
                    $unitTag = $xml->createElement("pdt_unit",""); //pdt_unit
                    $brandTag = $xml->createElement("pdt_brand_name",$brand);
                    $qtyTag = $xml->createElement("pdt_inventory",$quantity);
                    $originTag = $xml->createElement("pdt_origin",$origin);
                    $imgTag = $xml->createElement("img_path","");//img_path

                //format
                $productTag->appendChild($codeTag); //pdt_id
                $productTag->appendChild($aileTag);//pdt_al_id
                $productTag->appendChild($orderTag);//pdt_order_number
                $productTag->appendChild($nameTag);//pdt_name
                $productTag->appendChild($shortTag);//pdt_short_description
                $productTag->appendChild($longTag);//pdt_description
                $productTag->appendChild($priceTag);//pdt_price
                $productTag->appendChild($packageTag);//pdt_package_type
                $productTag->appendChild($unitTag);//pdt_unit
                $productTag->appendChild($brandTag);//pdt_brand_name
                $productTag->appendChild($qtyTag);//pdt_ionventory
                $productTag->appendChild($originTag);//pdt_origin
                $productTag->appendChild($imgTag);//img_path
                
            $rootTag->appendChild($productTag);
            $xml->save('../data/product.xml');
            header("Location: backstore.php");
        }
        
        else if(isset($_POST['insert']) && $productExist) //Then we simply modify
        {
            echo "<h1> HGFBKSJGNBSDBNGKDSBG </h1>";
        }




        function selectDepartment($pid,$aile){
            if($pid == $aile)
                echo "selected";
        }

        function translateDpt($dptName)
        {
            if($dptName === "meat")
                return 1;
            else if($dptName === "f-a-v")
                return 2;
            else if($dptName === "backery")
                return 3;
            else if($dptName === "pantry")
                return 4;
            else if($dptName === "dairy")
                return 5;
            else
                return 6;
        }
?>
<!DOCTYPE html>
<html>

<head>
    <title>backend-concept</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product-edit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <form method = "POST" action = "product-edit.php">
    <div class="sidebar">
        <img width="300" src="../assets/GGLogo.png" alt="">
        <p id="description-under-user-edit-logo">Add / Edit a product to the database</p>
    </div>
    <div class="right-side">
        <div id="picture-space">
            <?php echo "<img class = circled-picture style = \"background-image:url({$product_to_load->img_path});\">" ?>;
        </div>
        <div class="med-container" id="brand">
            <label for="product-brand">Brand</label><br>
            <?php echo "<input type = text name = product-brand value = \"{$product_to_load->pdt_brand_name}\">";?>
        </div> 
        <div class="med-container" id="name">
            <label for="product-name">Name</label><br>
            <?php echo "<input type= text name= product-name value = \"{$product_to_load->pdt_name}\">";?>
        </div>
        <div class="xsml-container">
            <label for="product-code">Code</label><br>
            <?php echo "<input type= text name = product-code value = \"{$product_to_load->pdt_id}\">";?>
        </div>
        <div class="xsml-container">
            <label for="product-price">Quantity</label><br>
            <?php echo "<input type= text name = product-qty value = \"{$product_to_load->pdt_inventory}\">";?>
        </div>
        <div class="sml-container">
            <label for="product-qty">Price</label><br>
            <?php echo "<input type= text name = product-price value = \"{$product_to_load->pdt_price}\">";?>
        </div>
        <div class="sml-container">
            <label for="isDiscount">On Discount</label><br>
            <select name="isDiscount" id="isDiscount">
                <option value="false">false</option>
                <option value="true">true</option>
            </select>
        </div>
        <div class="sml-container">
            <label for="product-discount">Discount</label><br>
            <input type="text" name="product-discount" disabled>
        </div>
        <div class="sml-container">
            <label for="product-discount-deadline">Until</label><br>
            <input type="date" id="product-discount-deadline" name="product-discount-deadline" disabled>
        </div>
        <div class="sml-container">
            <label for="product-origin">Origin</label><br>
            <?php echo "<input type= text name = product-origin value = \"{$product_to_load->pdt_origin}\">";?>
        </div>
        <div class="sml-container">
            <label for="departement">Department</label><br>
            <select name="department" id="departement">
                <option value= "meat" <?php selectDepartment($product_to_load->pdt_al_id,1);?>> Meat</option>
                <option value = "f-a-v" <?php selectDepartment($product_to_load->pdt_al_id,2);?>>Fruits & Veggies</option>
                <option value= "backery" <?php selectDepartment($product_to_load->pdt_al_id,3);?>>Backery</option>
                <option value= "pantry" <?php selectDepartment($product_to_load->pdt_al_id,4);?>>Pantry</option>
                <option value= "dairy" <?php selectDepartment($product_to_load->pdt_al_id,5);?>>Dairy</option>
                <option value = "cleaning-supplies" <?php selectDepartment($product_to_load->pdt_al_id,6);?>>Cleaning Supplies</option>
            </select>
        </div>
        <div class="large-container" id="short-description">
            <label for="short-description">Short Description</label><br>
            <?php echo "<input type= text name = short-description value = \"{$product_to_load->pdt_short_description}\">";?>
        </div>
        <div class="xlarge-container">
            <label for="long-description">Long Description</label><br>
            <?php echo " <textarea id = long-description name = long-description rows = 4 cols = 80>{$product_to_load->pdt_description}</textarea>";?>
        </div>
        <div class="button-container">
            <button type="submit" id="edit-picture">Edit Picture</button>
            <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button>
            <button type="submit" id="save-button" name = "insert">Save</button> 
            <!-- It depends if it has a get or no, if no get we add, if a get we modify-->
        </div>
    </div>
    </form>
</body>

</html>