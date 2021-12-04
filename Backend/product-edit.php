<?php
        $file_open_aisles = '../data/aisles.xml'; //'../../data/aisles.xml'
        $file_open_products = '../data/product.xml';

        error_reporting(E_ERROR | E_PARSE); 
        if (file_exists($file_open_products)) {
            $products = simplexml_load_file($file_open_products);
            if (isset($_GET['ID'])) {

                $product_id = $_GET['ID'];
                $product_to_load = $products->xpath('/products/product/pdt_id[.= "'. $product_id. '"]/parent::*')[0];
            }
        } else {
            exit('Failed to open ');
        }

        function selectDepartment($pid,$aile){
            if($pid == $aile)
                echo "selected";
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
    <div class="sidebar">
        <img width="300" src="../assets/GGLogo.png" alt="">
        <p id="description-under-user-edit-logo">Add / Edit a product to the database</p>
    </div>
    <div class="right-side">

        
        <!-- PLACED ID IN EDIT BUTTON -->
        <!-- NO ID IN ADD BUTTON -->
        <!-- CHECK IF IT HAS AN ID -->
        <!-- IF NO ID THEN CREATE A BLANK PAGE TO INPUT VALUE -->

        <div id="picture-space">
            <div class="circled-picture">
                <p> Put product picture here</p>
            </div>
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
            <select name="departement" id="departement">
                
                <option value= "meat" <?php selectDepartment($product_to_load->pdt_al_id,1);?>> Meat</option>
                <option value = "f-a-v" <?php selectDepartment($product_to_load->pdt_al_id,2);?>>Fruits & Veggies</option>
                <option value= "backery" <?php selectDepartment($product_to_load->pdt_al_id,3);?>>Backery</option>
                <option value= "pantry" <?php selectDepartment($product_to_load->pdt_al_id,4);?>>Pantry</option>
                <option value= "dairy" <?php selectDepartment($product_to_load->pdt_al_id,5);?>>Dairy</option>
                <option value = "cleaning-supplies" <?php selectDepartment($product_to_load->pdt_al_id,6);?>>Cleaning Supplies</option>
    <!--
                //IF product_to_load->pdt_al_id = 1 > Meat
                //IF product_to_load->pdt_al_id = 2 > Fruits
                //IF product_to_load->pdt_al_id = 3 > Backery
                //IF product_to_load->pdt_al_id = 4 > Pantry
                //IF product_to_load->pdt_al_id = 5 > Cleaning Supplies
    -->
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
            <button type="button" id="edit-picture">Edit Picture</button>
            <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button>
            <button type="button" id="save-button">Save</button>
        </div>
    </div>
</body>

</html>