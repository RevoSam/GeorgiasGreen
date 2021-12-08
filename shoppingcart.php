<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>My Shopping Cart</title>
    <link rel="icon" href="assets/GGLogoPicture.png" />
</head>

<body>
<div class="header"><a href="index.php"><img class = "header-image" src="assets/GGLogo.png" width="350"></a>
  <?php
        if (isset($_SESSION["firstname"])) {
          $name = $_SESSION["firstname"];
          echo '<div class="header-user-display">';
            echo "<h2>Welcome, {$name}!</h2>";
          echo "</div>";
        }
      ?>
  </div>
    <div class="blank"></div>
    <div class="row">
        <div class="col-4 menu">
            <div class="dropdown">
                <a id="firstLink" class="nav">Aisles</a>
                <div class="dropdown-content">
                    <a class="dropdown-menu" href="Ailes/Meat/Meat.php">Meat</a>
                    <a class="dropdown-menu" href="Ailes/FruitsVegetables/FruitsVegetables.php">Fruits & Vegetables</a>
                    <a class="dropdown-menu" href="Ailes/Bakery/Bakery.php">Bakery</a>
                    <a class="dropdown-menu" href="Ailes/Pantry/Pantry.php">Pantry</a>
                    <a class="dropdown-menu" href="Ailes/Dairy/Dairy.php">Dairy</a>
                    <a class="dropdown-menu" href="Ailes/CleaningSupplies/CleaningSupplies.php">Cleaning Supplies</a>
                </div>
            </div>
            <?php 
        if (isset($_SESSION["id_user"])) {
          echo '<a class="nav" href="login.php?logout=true">Log out</a>';
        }
        else {
         echo '<a class="nav" href="login.php">Sign in</a>';
        }
      ?>
            <a class="nav" href="shoppingcart.php">Check out</a>
            <input type="text" placeholder="Search for a product..." />
        </div>
    </div>

    <div class="cart-page">
        <div class="cart-container">
            <h2 id="cart-title">My Shopping Cart</h2>
            <table id= "cartTable" class="cart-item-container">
                <!--<tr>
                    <th colspan="2">Products</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                <tr>
                    <td>
                        <img src="assets/Meat Products/ChickenBP.png" alt="ChickenBreastPieces.img"
                            class="cart-item-image">
                    </td>
                    <td class="cart-item-name">
                        Chicken Breast Pieces
                    </td>
                    <td>
                        <div class="cart-item-quantity">
                            <button class="cart-item-quantity-button item1_button" value = "-" >-</button>
                            <input id = "item1" class="cart-item-quantity-input" type="text" placeholder="0" maxlength="3" minlength="1" value = "0">
                            <button class="cart-item-quantity-button item1_button" value = "+">+</button>
                        </div>
                    </td>
                    <td>
                        $<span id = "item1_price">13.99</span>
                    </td>
                    <td><span class="cart-item-delete">Delete</span></td>
                </tr>
                <tr>
                    <td>
                        <img src="assets/Fruits and Vegetables Products/Apple.png" alt="Apple.img"
                            class="cart-item-image">

                    </td>
                    <td class="cart-item-name">
                        Gala Apple
                    </td>
                    <td>
                        <div class="cart-item-quantity">
                            <button class="cart-item-quantity-button item2_button" value = "-">-</button>
                            <input id = "item2" class="cart-item-quantity-input" type="text" placeholder="0" maxlength="3" value = "0"
                                minlength="1">
                            <button class="cart-item-quantity-button item2_button" value = "+">+</button>
                        </div>
                    </td>
                    <td>
                        $<span id = "item2_price">0.79</span>
                    </td>
                    <td>
                        <span class="cart-item-delete">Delete</span>
                    </td>
                </tr>
                <tr>
                    <td><img src="assets/Meat Products/steak.png" alt=" steak.img" class="cart-item-image">
                    </td>
                    <td class="cart-item-name">
                        Steak (Beef)
                    </td>
                    <td>
                        <div class="cart-item-quantity">
                            <button class="cart-item-quantity-button item3_button" value = "-">-</button>
                            <input id = "item3" class="cart-item-quantity-input" type="text" placeholder="0" maxlength="3" value = "0"
                                minlength="1">
                            <button class="cart-item-quantity-button item3_button" value = "+">+</button>
                        </div>
                    </td>
                    <td>
                        $<span id = "item3_price">5.49</span>
                    </td>
                    <td>
                        <span class="cart-item-delete">Delete</span>
                    </td>-->
            </table>
        </div>
        <div class="cart-summary">
            <ul>
                <h2 id="cart-title">Order Summary</h2>

                <li>
                    <span class="cart-summary-name"># of items:</span> <span id = "nbrItems" class="cart-summary-value">3</span>
                </li>
                <li>
                    <span class="cart-summary-name">Subtotal:</span> <span class="cart-summary-value">$<span id = "subtotal">0.00</span></span>
                </li>
                <li>
                    <span class="cart-summary-name">Estimated GST (5%):</span> <span
                        class="cart-summary-value">$<span id ="gst_total">0.00</span></span>
                </li>
                <li>
                    <span class="cart-summary-name">Estimated QST (9.975%):</span> <span
                        class="cart-summary-value">$<span id = "qst_total">0.00</span></span>
                </li>
                <li>
                    <span class="cart-summary-name">Total:</span> <span class="cart-summary-value">$<span id ="total">0.00</span></span>
                </li>
            </ul>
            <span class="cart-summary-button">Checkout</span>
            <a href="index.php">
                <span class="cart-summary-button">Continue Shopping</span>
            </a>
        </div>
    </div>
    </div>
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
            <a href="#" style="padding: 5px;"><img src="assets/FBLogo.png"></a>
            <a href="#" style="padding: 5px;"><img src="assets/TwitterLogo.png"></a>
            <a href="#" style="padding: 5px;"><img src="assets/InstaLogo.png"></a>
            <a href="https://youtu.be/dQw4w9WgXcQ" style="padding: 5px;" target="_blank"><img
                    src="assets/YTLogo.png"></a>
        </div>
    </div>
    <script type = "text/javascript" src="scripts/script.js"></script>
</body>
</html>