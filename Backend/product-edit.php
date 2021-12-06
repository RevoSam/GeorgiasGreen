<?php
        $file_open_aisles = '../data/aisles.xml'; //'../../data/aisles.xml'
        $file_open_products = '../data/product.xml';

        error_reporting(E_ERROR | E_PARSE); 
        if (file_exists($file_open_products)) {
            //if it has a GET value
            
            $products = simplexml_load_file($file_open_products);
            if (isset($_GET['ID'])) {
                $product_id = $_GET['ID'];
                $product_to_load = $products->xpath('/products/product/pdt_id[.= "'. $product_id. '"]/parent::*')[0];
            }
        } else {
            exit('Failed to open ');
        }
    
        
    
        //POST FOR ADDING AN ITEM
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $code = $name = $price = $quantity = "";
            $codeErr = $nameErr = $priceErr = $quantityErr = "";

            if(empty($_POST['product-name'])) {
                $nameErr ="Required";
            } else{
               $name = $_POST['product-name']; 
            }
            if(empty($_POST['product-code'])) {
                $codeErr ="Required";
            } else{
               $code = $_POST['product-code']; 
            }
            if(empty($_POST['product-price'])) {
                $priceErr ="Required";
            } else{
               $price = $_POST['product-price']; 
            }
            if(empty($_POST['product-qty'])) {
                $quantityErr ="Required";
            } else{
               $quantity = $_POST['product-qty']; 
            }

        if(isset($_POST['add']) && !empty($_POST['product-name']) && !empty($_POST['product-code']) && !empty($_POST['product-price']) && !empty($_POST['product-qty'])) 
        {
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
            $image; //Get imagePath found above
            

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
                    $packageTag = $xml->createElement("pdt_packet_type","1/pkg");//pdt_package_type
                    $unitTag = $xml->createElement("pdt_unit","1"); //pdt_unit
                    $brandTag = $xml->createElement("pdt_brand_name",isGiven($brand));
                    $qtyTag = $xml->createElement("pdt_inventory",$quantity);
                    $originTag = $xml->createElement("pdt_origin",isGiven($origin));
                    $imgTag = $xml->createElement("img_path","..\..\assets/defaultPicture.jpg");//img_path
                    $absimgTag = $xml->createElement("abs_img_path","../assets/defaultPicture.jpg");
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
                $productTag->appendChild($absimgTag); //abs image path
            $rootTag->appendChild($productTag);

            $xml->save('../data/product.xml');
            header("Location: backstore.php");
        }
        
        //POST FOR EDITING AN ITEM
        else if(isset($_POST['edit']) && !empty($_POST['product-name']) && !empty($_POST['product-code']) && !empty($_POST['product-price']) && !empty($_POST['product-qty']))
        {
            
            $file_open_products = '../data/product.xml';
            $products = simplexml_load_file($file_open_products);
            foreach($_POST as $key=>$value)
            {
                $product_to_edit_id = $value;
            }
            $product_to_load = $products->xpath('/products/product/pdt_id[.= "'. $product_to_edit_id. '"]/parent::*')[0];
            

            //EDIT THE VALUES
            $product_to_load->pdt_id = $_POST['product-code'];
            $product_to_load->pdt_al_id = translateDpt($_POST['department']);
            $product_to_load->pdt_name = $_POST['product-name'];
            $product_to_load->pdt_short_description = $_POST['short-description'];
            $product_to_load->pdt_description = $_POST['long-description'];
            $product_to_load->pdt_price =  $_POST['product-price'];
            $product_to_load->pdt_brand_name = $_POST['product-brand'];
            $product_to_load->pdt_inventory = $_POST['product-qty'];
            $product_to_load->pdt_origin = $_POST['product-origin'];
            $product_to_load->img_path = $product_to_load->img_path;
            $product_to_load->abs_img_path = $product_to_load->abs_img_path;
            //EDIT THE VALUES

            $products->saveXML('../data/product.xml');
            header("Location: backstore.php");
        }
    }

        //HELPER FUNCTIONS
        function selectDepartment($pid,$aile){
            if($pid == $aile)
                return "selected";
        }

        function translateDpt($dptName)
        {
            if($dptName == "f-a-v")
                return 1;
            else if($dptName == "meat")
                return 2;
            else if($dptName == "backery")
                return 3;
            else if($dptName == "pantry")
                return 4;
            else if($dptName == "dairy")
                return 5;
            else
                return 6;
        }

        function getName(){
            if(isset($_GET['ID']))
            {
                $product_id = $_GET['ID'];
                return "edit value = $product_id";
            }
            else
            {
                return "add";
            }
        }

        function isGiven($element){
            if($element == "")
                return "-";
            return $element;
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
    <form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="sidebar">
        <img width="300" src="../assets/GGLogo.png" alt="">
        <p id="description-under-user-edit-logo">Add / Edit a product to the database</p>
    </div>
    <div class="right-side">
        <div id="picture-space">
            <img class = "circled-picture" style = "background-image:url(<?php echo $product_to_load->abs_img_path?>)">
        </div>
        <div class="med-container" id="brand">
            <label for="product-brand">Brand</label><br>
            <input type = text name = product-brand value = "<?php if(isset($_POST['product-brand'])) echo $_POST['product-brand']; else echo $product_to_load->pdt_brand_name ?>"> <!--if(isset($_POST['product-brand'])) echo $_POST['product-brand']; else echo "{$product_to_load->pdt_brand_name}"-->
        </div> 
        <div class="med-container" id="name">
            <label for="product-name">Name<span class="error"> *<?php echo $nameErr;?></span></label><br>
            <input type= text name= product-name value = "<?php if(isset($_POST['product-name'])) echo $_POST['product-name']; else echo $product_to_load->pdt_name; ?>">
        </div>
        <div class="xsml-container">
            <label for="product-code">Code<span class="error"> *<?php echo $codeErr;?></span></label><br>
            <input type= text name = product-code value = "<?php if(isset($_POST['product-code'])) echo $_POST['product-code']; else echo $product_to_load->pdt_id; ?>">
        </div>
        <div class="xsml-container">
            <label for="product-price">Quantity<span class="error"> *<?php echo $quantityErr;?></span></label><br>
            <input type= text name = product-qty pattern = "^[0-9]*" value = "<?php if(isset($_POST['product-qty'])) echo $_POST['product-qty']; else echo $product_to_load->pdt_inventory;?>">
        </div>
        <div class="sml-container">
            <label for="product-qty">Price<span class="error"> *<?php echo $priceErr;?></span></label><br>
            <input type= text name = product-price pattern = "^[0-9]*.[0-9]{2}" value = "<?php if(isset($_POST['product-price'])) echo $_POST['product-price']; else echo $product_to_load->pdt_price;?>">
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
            <input type= text name = product-origin value = "<?php if(isset($_POST['product-origin'])) echo $_POST['product-origin']; echo $product_to_load->pdt_origin; ?>">
        </div>
        <div class="sml-container">
            <label for="departement">Department</label><br>
            <select name="department" id="departement">
                <option value= "meat" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 2) echo "selected"; else if($product_to_load->pdt_al_id == 2) echo "selected";?>> Meat</option>
                <option value = "f-a-v" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 1) echo "selected"; else if($product_to_load->pdt_al_id == 1) echo "selected";?>>Fruits & Veggies</option>
                <option value= "backery" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 3) echo "selected"; else if($product_to_load->pdt_al_id == 3) echo "selected";?>>Backery</option>
                <option value= "pantry" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 4) echo "selected"; else if($product_to_load->pdt_al_id == 4) echo "selected";?>>Pantry</option>
                <option value= "dairy" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 5) echo "selected"; else if($product_to_load->pdt_al_id == 5) echo "selected";?>>Dairy</option>
                <option value = "cleaning-supplies" <?php if(isset($_POST['department']) && translateDpt($_POST['department']) == 6) echo "selected"; else if($product_to_load->pdt_al_id == 6) echo "selected";?>>Cleaning Supplies</option>
            </select>
        </div>
        <div class="large-container" id="short-description">
            <label for="short-description">Short Description</label><br>
            <input type= text name = short-description value = "<?php if(isset($_POST['short-description']))  echo $_POST['short-description']; else echo $product_to_load->pdt_short_description; ?>">
        </div>
        <div class="xlarge-container">
            <label for="long-description">Long Description</label><br>
            <textarea id = long-description name = long-description rows = 4 cols = 80><?php if(isset($_POST['long-description'])) echo $_POST['long-description']; else echo($product_to_load->pdt_description); ?> </textarea>
        </div>

        <div class="button-container">
            <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button>

            <!-- Do a PHP function to check name according to the name sent and give value of code -->
            <button type="submit" id="save-button" name = <?php echo(getName()) ?>>Save</button> 
            <!-- It depends if it has a get or no, if no get we add, if a get we modify-->
        </div>
    </div>
    </form>
</body>

</html>