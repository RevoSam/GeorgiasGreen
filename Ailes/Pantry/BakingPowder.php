<!--<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="..\..\styles.css" />
    <link rel="icon" href="..\..\assets/GGLogo.png" />
    <title>Georgia's Greens</title>
    <link rel="icon" href="../../assets/GGLogoPicture.png" />
  </head>
  <body>
    <div class="header"><a href="..\..\index.php"><img src = "..\..\assets/GGLogo.png" width="350"></a></div>
    <div class="blank"></div>
    <div class="row">
      <div class="col-4 menu">
        <div class="dropdown">
          <a id="firstLink" class="nav">Aisles</a>
          <div class="dropdown-content">
            <a class="dropdown-menu" href="../Meat/Meat.php">Meat</a>
            <a class="dropdown-menu" href="../FruitsVegetables/FruitsVegetables.php">Fruits & Vegetables</a>
            <a class="dropdown-menu" href="../Bakery/Bakery.php">Bakery</a>
            <a class="dropdown-menu" href="../Pantry/Pantry.php">Pantry</a>
            <a class="dropdown-menu" href="../Dairy/Dairy.php">Dairy</a>
            <a class="dropdown-menu" href="../CleaningSupplies/CleaningSupplies.php">Cleaning Supplies</a>
          </div>
        </div>
        <a class="nav" href="../../login.php">Sign in</a>
        <a class="nav" href="../../shoppingcart.php">Check out</a>
        <input type="text" placeholder="Search for a product..." />
      </div>
    </div>
    <div class="body">
      <div class="item_wrapper">
        <img id="productImg" src="../../assets/Pantry/BakingPowder.png">
        <div class="item_details">
        <h2 class="brand">Georgia's Greens</h2>
        <span class="item_description">Baking Powder</span>
        
        
        <span id = "price" class = "item_price">$9.49</span></span>
        
        
        <span class="item_price_insight">$9.49/ea</span>
        <div id="quantity-modifier">
          <p style="margin-bottom: 0px; font-size: large;">Quantity: </p>
          <input class="plus-minus-button" type="button" value="-">
          <input id="quantity-text" type="text" placeholder="1" value=1>
          <input  class="plus-minus-button" type="button" value="+">
          
          
          <p  style="margin-bottom: 0px; font-size: large;">Item Total:<br> </p>
          <input  id = "total" type = "text" value = "9.49$" disabled = "disabled" style = "padding:10px;">
        
        
        </div>
        <a href="" id="add2Cart" class="button" ">Add to Cart</a>
        <div class="more-desc">
          <hr>
          <a class="show-more" href="">Show More</a>
        </div>
        <div id = "content-description" class="hideContent">
          <h2 class="brand description">Product Description</h2>
          <p class="product_description">Baking Powder</p>
          <br>
          <span class="item_number">Product Number: GGPP001_PK</span>
        </div>
    </div>
</div></div>
    <div class="footer">
      <div id="link-list-left">
        <p><strong>Useful Links</strong></p>
        <a href="#">Page 1</a></a><br>
        <a href="#">Page 2</a></a><br>
        <a href="#">Page 3</a></a><br>
        <a href="#">Page 4</a></a><br>
        <a href="#">Page 5</a></a><br>
        <a href="#">Page 6</a></a><br>
        <a href="#">Page 7</a></a><br>
        <a href="#">Page 8</a></a><br>
      </div>

      <div id="link-list-right">
        <p><strong>Useful Links</strong></p>
        <a href="#">Page X</a></a><br>
        <a href="#">Page 2</a></a><br>
        <a href="#">Page 3</a></a><br>
        <a href="#">Page 4</a></a><br>
        <a href="#">Page 5</a></a><br>
        <a href="#">Page 6</a></a><br>
        <a href="#">Page 7</a></a><br>
        <a href="#">Page 8</a></a><br>
      </div>

      <div id="contact-info">
        <p><strong>OUR SOCIALS</strong></p><br>
        <a href="#" style="padding: 5px;"><img src = "..\..\assets/FBLogo.png"></a>
        <a href="#" style="padding: 5px;"><img src = "..\..\assets/TwitterLogo.png"></a>
        <a href="#" style="padding: 5px;"><img src = "..\..\assets/InstaLogo.png"></a>
        <a href="https://youtu.be/dQw4w9WgXcQ" style="padding: 5px;" target="_blank"><img src = "..\..\assets/YTLogo.png"></a>
      </div>
  </div>
  <script src="../../scripts/script.js"></script>
  </body>
</html>