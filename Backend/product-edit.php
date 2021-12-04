<!DOCTYPE html>
<html>
    <head>
        <title>backend-concept</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="product-edit.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class = "sidebar">
            <img width="300" src="../assets/GGLogo.png" alt="">
           <p id="description-under-user-edit-logo">Add / Edit a product to the database</p>
        </div>
        <div class = "right-side">


        <!-- PLACED ID IN EDIT BUTTON -->
            <!-- NO ID IN ADD BUTTON -->
            <!-- CHECK IF IT HAS AN ID -->
            <!-- IF NO ID THEN CREATE A BLANK PAGE TO INPUT VALUE -->

        <?php  

            $id = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'],"=",0)+1 , strlen($_SERVER['REQUEST_URI']));
        
            echo $id; //check if id match an item in the listen

        ?> 
      
      
            
            <div id="picture-space">
                <div class = "circled-picture">
                    <p> Put product picture here</p>
                </div>
            </div>
            <div class = "med-container" id ="brand">
                <label for = "product-brand">Brand</label><br>
                <input type="text" name="product-brand">
            </div>
            <div class = "med-container" id = "name">
                <label for = "product-name">Name</label><br>
                <input type="text" name="product-name">
            </div>
            <div class = "xsml-container">
                <label for = "product-code">Code</label><br>
                <input type="text" name="product-code">
            </div>
            <div class = "xsml-container">
                <label for = "product-price">Quantity</label><br>
                <input type="text" name="product-price">
            </div>
            <div class = "sml-container">
                <label for = "product-qty">Price</label><br>
                <input type="text" name="product-qty">
            </div>
            <div class = "sml-container">
                <label for="isDiscount">On Discount</label><br>
                <select name="isDiscount" id="isDiscount">
                  <option value="false">false</option>
                  <option value="true">true</option>
                </select> 
            </div>
            <div class = "sml-container">  
                <label for = "product-discount">Discount</label><br>
                <input type="text" name="product-discount">
            </div>
            <div class = "sml-container">
                <label for="product-discount-deadline">Until</label><br>
                <input type="date" id="product-discount-deadline" name="product-discount-deadline"> 
            </div>
            <div class = "sml-container">
                <label for = "product-origin">Origin</label><br>
                <input type="text" name="product-origin">
            </div>
            <div class = "sml-container">
                <label for="departement">Department</label><br>
                <select name="departement" id="departement">
                  <option value="meat">Meat</option>
                  <option value="f-a-v">Fruits & Veggies</option>
                  <option value="backery">Backery</option>
                  <option value="pantry">Pantry</option>
                  <option value="dairy">Dairy</option>
                  <option value="cleaning-supplies">Cleaning Supplies</option>
                </select> 
            </div>
            <div class = "large-container" id="short-description">
                <label for = "short-description">Short Description</label><br>
                <input type="text" name="short-description">
            </div>
            <div class = "xlarge-container">
                <label for="long-description">Long Description</label><br>
                <textarea id="long-description" name="long-description" rows="4" cols="80"></textarea> 
            </div>
            <div class = "button-container">
                <button type="button" id="edit-picture">Edit Picture</button>
                <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button> 
                <button type="button"id="save-button">Save</button> 
            </div>
        </div>
    </body>
</html>