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
  <title>Georgia's Greens</title>
  <link rel="icon" href="assets/GGLogoPicture.png">
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
  <div class="body">
    <div class="ailes_wrapper">
      <h2>Start Browsing</h2>
      <h1>Browse our Aisles</h1>
      <div class="ailes_block">
        <ul>
          <li>
            <div class="aile">
              <a href="Ailes/FruitsVegetables/FruitsVegetables.php"><img src="assets/vegetables.jpg"></a>
              <h3>Vegetables and Fruits</h3>
            </div>
          </li>

          <li>
            <div class="aile">
              <a href="Ailes/Meat/Meat.php"><img src="assets/Meat.jpg"></a>
              <h3>Meat</h3>
            </div>
          </li>

          <li>
            <div class="aile">
              <a href="Ailes/Bakery/Bakery.php"><img src="assets/Bakery.jpg"></a>
              <h3>Bakery</h3>
            </div>
          </li>

          <li>
            <div class="aile">
              <a href="Ailes/Pantry/Pantry.php"><img src="assets/Pantry.jpg"></a>
              <h3>Pantry</h3>
            </div>
          </li>

          <li>
            <div class="aile">
              <a href="Ailes/Dairy/Dairy.php"><img src="assets/Dairy.jpg"></a>
              <h3>Dairy</h3>
            </div>
          </li>

          <li>
            <div class="aile">
              <a href="Ailes/CleaningSupplies/CleaningSupplies.php"><img src="assets/Cleaning.jpg"></a>
              <h3>Cleaning Supplies</h3>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer">
    <div id="link-list-left">
      <p><strong>Useful Links</strong></p>
      <a href="Backend/backstore.php">Go to Backstore</a></a><br>
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
      <a href="https://youtu.be/dQw4w9WgXcQ" style="padding: 5px;" target="_blank"><img src="assets/YTLogo.png"></a>
    </div>
  </div>
</body>

</html>
