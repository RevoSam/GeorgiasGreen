<!DOCTYPE html>
<html>
    <head>
        <title>Edit orders</title>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="order-edit.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class = "sidebar">
            <img width="300" src="../assets/GGLogo.png" alt="">
           <p id="description-under-user-edit-logo">Add / Edit an order to the database</p>
        </div>
        <div class = "right-side">
            <div class = "xlarge-container">
                <input type="text" name="order-number-heading" placeholder="ORDER NUMBER: 12494325" disabled>
            </div>
            <div class = "xlarge-container">
                <input type="text" name="name" placeholder="NAME : FIRST NAME & LAST NAME" disabled>
            </div>
            <div class = "medium-container">
                <input type="text" name="date" placeholder="DATE : DAY / MONTH / YEAR" disabled>
            </div>
            <div class = "medium-container">
                <input type="text" name="status" placeholder="STATUS : IN PROGRESS " disabled>
            </div>
            <div class = "xlarge-container" id = "purchase-list">
                <div class = "purchase-list">
                    <!--ITEM 1-->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>

                     <!--ITEM 2-->
                     <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM3-->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM 4 -->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM 5 -->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                     <!--ITEM 6 -->
                     <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM 2-->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM3-->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM 4 -->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ITEM 5 -->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                     <!--ITEM 6 -->
                    <div class = "item">
                        <div class = "product-code">
                            PRODUCT CODE
                            <input type = "text" name = "product-code" placeholder="product code" disabled>
                        </div>
                        <div class = "product-name">
                            PRODUCT NAME
                            <input type = "text" name = "product-name" placeholder="product name" disabled>
                        </div>
                        <div class = "product-count">
                            COUNT 
                            <input type="number" name="count" placeholder="10" min = "0">
                        </div>
                        <div class = "product-bought-price">
                            UNIT PRICE
                            <input type = "text" name = "bought-price" placeholder = "10$">
                        </div>
                        <div class = "tax-price">
                            TAX
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class ="total-product-price">
                            TOTAL
                            <input type = "text" name = "bought-price" placeholder = "10$" disabled>
                        </div>
                        <div class = "delete-product">
                            <button type="button">Delete</button>
                        </div>
                    </div>
                    <!--ADD A PRODUCT TO THE ORDER-->
                    <div id="add-to-order">
                        <button type="button" id="add-to-order">Add Product</button>
                    </div>
                </div>
            </div>
            <div class = "medium-container final-line">
                <input type="text" name="payment-type" placeholder="PAYMENT TYPE : DEBIT" disabled>
            </div>
            <div class = "medium-container final-line">
                <input type="text" name="total-amount" placeholder="TOTAL : 10000000$ " disabled>
            </div>
            <div class = "xlarge-container final-line">
                <button type="button" id="save-button">Save</button>
                <button type="button" id="cancel-button" onclick="location.href='backstore.php'">Cancel</button>
            </div>
        </div>
    </body>
</html>