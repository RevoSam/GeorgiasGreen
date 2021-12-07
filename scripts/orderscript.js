"use strict";
window.addEventListener("load", initialize);
window.addEventListener("click", initialize);
var products_order = new Array();

function initialize() {
  let deletebtns = document.getElementsByClassName("deleteBtns");
  let qtybtns = document.getElementsByClassName("qtyfields");

  for (var i = 0; i < deletebtns.length; i++) {
    deletebtns[i].addEventListener("click", deleteRow);
    if (products_order.indexOf(deletebtns[i].getAttribute("id")) === -1) {
      products_order.push(deletebtns[i].getAttribute("id"));
    }
  }
  for (var i = 0; i < qtybtns.length; i++) {
    qtybtns[i].addEventListener("change", modifyQty);
  }

  document.getElementById("add_order").addEventListener("click", addProduct);
  changeEventNewProducts();
  document
    .getElementById("productselection")
    .addEventListener("change", loadProducts);
}

function changeEventNewProducts() {
  document.getElementById("productqty").addEventListener("change", function () {
    var ext = document.getElementById("extproduct");
    ext.value =
      (parseInt(this.value, 10) *
        Math.round(
          (parseFloat(document.getElementById("productprice").value, 10) +
            Number.EPSILON) *
            100
        )) /
      100;
  });
}

function init() {
  document.getElementById("add_order").addEventListener("click", addProduct);

  changeEventNewProducts();

  document
    .getElementById("productselection")
    .addEventListener("change", loadProducts);
}

function loadProducts() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let values = this.responseText.split("#");

      document.getElementById("productname").innerHTML = values[0];
      document.getElementById("productname").value = values[0];

      document.getElementById("productprice").innerHTML = values[1];
      document.getElementById("productprice").value = values[1];

      var ext =
        parseInt(document.getElementById("productqty").value, 10) *
        parseFloat(values[1], 10);

      document.getElementById("extproduct").innerHTML = ext;
      document.getElementById("extproduct").value = ext;
    }
  };
  xmlhttp.open(
    "GET",
    "getproducts.php?ID=" + this[this.selectedIndex].value,
    true
  );
  xmlhttp.send();
}

function deleteRow() {
  if (window.confirm("Are you sure you want to delete this item?")) {
    this.parentNode.parentNode.remove();
    const index = products_order.indexOf(this.getAttribute("id"));
    if (index > -1) {
      products_order.splice(index, 1);
    }
    updateTTL();
  }
}

function modifyQty() {
  var ext = document.getElementById(this.getAttribute("id") + "ext");
  ext.value =
    (parseInt(this.value, 10) *
      Math.round(
        (parseFloat(
          document.getElementById(this.getAttribute("id") + "price").value,
          10
        ) +
          Number.EPSILON) *
          100
      )) /
    100;

  updateTTL();
}

function updateTTL() {
  var ttl = document.getElementById("total_order");
  ttl.value = 0;
  var product_TTLs = document.getElementsByClassName("productexts");
  var total = 0;
  for (var i = 0; i < products_order.length; i++) {
    total +=
      Math.round(
        (parseFloat(product_TTLs[i].value, 10) + Number.EPSILON) * 100
      ) / 100;
  }
  ttl.value = total;
}

function addProduct(event) {
  event.preventDefault();
  var optionSelected =
    document.getElementById("productselection").selectedIndex;

  if (parseInt(optionSelected, 10) != 0) {
    var target = document.getElementById("listOfProducts");
    var id_product = document.getElementById("productselection").value;
    var productName = document.getElementById("productname").value;
    var order_qty = document.getElementById("productqty").value;
    var product_price = document.getElementById("productprice").value;
    var ext = parseInt(order_qty, 10) * parseFloat(product_price, 10);

    var addedproducts = document.getElementsByClassName("qtyfields");
    let existingProduct;
    var flag = true;

    for (var i = 0; i < addedproducts.length; i++) {
      if (addedproducts[i].getAttribute("ID") == id_product) {
        existingProduct = addedproducts[i];
        flag = false;
        break;
      }
    }

    if (flag) {
      target.innerHTML +=
        "<div class = 'item' id='" +
        id_product +
        "'><div class = 'product-code'> PRODUCT CODE" +
        "<input type='text' name='productcodes[]' value='" +
        id_product +
        "' readonly></div>" +
        "<div class = 'product-name'>PRODUCT NAME <input type='text' name='productnames[]' value='" +
        productName +
        "' readonly></div>" +
        "<div class = 'product-count'>COUNT<input id='" +
        id_product +
        "' class = 'qtyfields' step = '1' type='number' name='qty[]' value='" +
        order_qty +
        "' min = '0'></div>" +
        "<div class = 'product-bought-price'>UNIT PRICE<input type = 'text' id='" +
        id_product +
        "price" +
        "' name='price[]' value='" +
        product_price +
        "'></div>" +
        "<div class ='total-product-price'>EXT<input class='productexts' type='text' id='" +
        id_product +
        "ext" +
        "' name = 'ext[]' value='" +
        ext +
        "' readonly></div>" +
        "<div class = 'delete-product'><button class = 'deleteBtns' type='button' id='" +
        id_product +
        "'>Delete</button></div></div>";
    } else {
      var price = document.getElementById(id_product + "price");
      var extend = document.getElementById(id_product + "ext");
      existingProduct.value =
        parseInt(existingProduct.value, 10) + parseInt(order_qty, 10);

      extend.value =
        parseFloat(price.value, 10) * parseInt(existingProduct.value, 10);
    }
    updateTTL();
  }
  if (products_order.indexOf(id_product) === -1) {
    products_order.push(id_product);
  }
}
