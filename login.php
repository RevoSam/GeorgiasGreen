<?php
  session_start();
  if (isset($_GET["logout"])){
    session_destroy();
    header('location:login.php?status=1');
  }
  
  if (isset($_POST["Login"])){
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $file = 'data/users.xml';
    $xml = simplexml_load_file($file);

    $user = $xml->xpath('//user[email="'.$email.'"][password="'.$password.'"]');


    if (count($user) == 0) {
      header("location: login.php?error=wronglogin");
      exit();
    }
    else if (count($user) == 1){
      session_start();
      $_SESSION["id_user"] = strval($user[0]->id_user);
      $_SESSION["id_add_user"] = strval($user[0]->id_add_user);
      $_SESSION["firstname"] = strval($user[0]->firstname);
      $_SESSION["lastname"] = strval($user[0]->lastname);
      $_SESSION["admin"] = strval($user[0]->admin);
      $_SESSION["email"] = strval($user[0]->email);
      $_SESSION["password"] = strval($user[0]->password);
      $_SESSION["points"] = strval($user[0]->points);

      if ($user[0]->admin == 1) {
        header("location: Backend\backstore.php");
        exit();
      }
      else {
        header("location: index.php");
        exit();
      }
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="styles.css" />
  <title>User Login</title>
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
  <div class="login-page">
  <?php 
      if (isset($_GET["error"])) {
        echo '<p style="color: red;"> The information you have entered in incorrect. Please try again. </p>';
      }
    ?>
    <form class="login" action="" method="post">
      <h2><label for="email">Enter your email:</label></h2>
      <input type="text" id="email" name="email" placeholder="example@gmail.com" value="">
      <h2><label for="pass">Enter your password:</label></h2>
      <input type="password" id="pass" name="pass" value=""><br>
      <button>
      <a class="forgot-pass" href="forgotpassword.php">Forgot your password?</a></button>
      <input class="login-submit" type="submit" name="Login" value="Log in">
      <a href="signup.php">Don't have an account? Sign up here</a>
    </form>
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
      <a href="https://youtu.be/dQw4w9WgXcQ" style="padding: 5px;" target="_blank"><img src="assets/YTLogo.png"></a>
    </div>
  </div>
</body>

</html>
