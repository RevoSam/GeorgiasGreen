<?php 
    session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="backstore.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <header>
        <?php
            if (isset($_SESSION["firstname"])){
                $name = $_SESSION["firstname"];
                echo "<p>Welcome {$name} </p>";
            }
            else {
                echo "<p>Welcome User</p>";
            }
        ?>
    </header>
    <aside>
        <img src="../assets/GGLogoPicture.png" onclick="location.href='../index.php'">
        <a href="backstore.php"><span class="glyphicon glyphicon-tags"></span>&nbsp&nbspProducts</a>
        <a href="user-list.php"><span class="glyphicon glyphicon-user"></span>&nbsp&nbspUsers</a>
        <a href="order-list.php"><span class="glyphicon glyphicon-credit-card"></span>&nbsp&nbspOrders</a>
    </aside>
    <div class="additional-components">
        <button type="button" id = "button-header" onclick="location.href='product-edit.php'">Add product</button>
        <input type="text" placeholder="Search..">
        <label for="search-keyword"><span class="glyphicon glyphicon-search"></span>&nbsp Search by keyword: </label> 
    </div>
    <div class="margins">
        <div class="inventory-table">
            <div class="ailes">
                <p>Meat</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="ailes">
                <p>Fruits and Vegetables</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="ailes">
                <p>Bakery</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="ailes">
                <p>Pantry</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="ailes">
                <p>Dairy</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="ailes">
                <p>Cleaning Supplies</p>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
            <div class="product">
                <div class="brand-container">
                    <p>BRAND</p>
                </div>
                <div class="name-container">
                    <p>NAME</p>
                </div>
                <div class="department-container">
                    <p>DEPARTMENT</p>
                </div>
                <div class="price-container">
                    <p>PRICE</p>
                </div>
                <div class="small-container">
                    <p>QTY</p>
                </div>
                <div class="origin-container">
                    <p>ORIGIN</p>
                </div>
                <div class="small-container">
                    <button class = "edit-button" onclick="location.href='product-edit.php'"><p>EDIT</p></button>
                </div>
                <div class="small-container">
                    <button class = "delete-button"><p>DELETE</p></button>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>