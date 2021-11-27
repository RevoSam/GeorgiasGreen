<!DOCTYPE html>
<html>
    <head>
        <title>backend-concept</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="user-edit.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class = "sidebar">
            <img width="300" src="../assets/GGLogo.png" alt="">
           <p id="description-under-user-edit-logo">Add a user to the database</p>
        </div>
        <div class = "right-side">
        
           
            <div class = "med-container" id = "name">
                <label for = "product-name">Name</label><br>
                <input type="text" name="product-name">
            </div>
            <div class = "xsml-container">
                <label for = "product-code">Password</label><br>
                <input type="text" name="product-code">
            </div>
            <div class = "xsml-container">
                <label for = "product-price">Email</label><br>
                <input type="text" name="product-price">
            </div>
            <div class = "sml-container">
                <label for = "product-qty">Address</label><br>
                <input type="text" name="product-qty">
            </div>
            <div class = "sml-container">
                <label for="isDiscount">GG points</label><br>
                <input type="text" name="product-qty">
            </div>
            
            <div class = "button-container">
                <button type="button" id="cancel-button" onclick="location.href='user-list.php'">Cancel</button> 
                <button type="button"id="save-button">Save</button>
            </div>
        </div>
    </body>
</html>