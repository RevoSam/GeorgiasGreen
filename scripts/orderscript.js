"use strict";
window.addEventListener("load", initialize);
var products_order = new Array();

function initialize() {
  let deletebtns = document.getElementsByClassName("deleteBtns");
  let qtybtns = document.getElementsByClassName("qtyfields");

  for (var i = 0; i < deletebtns.length; i++) {
    deletebtns[i].addEventListener("click", deleteRow);
    products_order.push(deletebtns[i].getAttribute("id"));
  }
  for (var i = 0; i < qtybtns.length; i++) {
    qtybtns[i].addEventListener("change", modifyQty);
  }
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
  //var ttl = document.getElementById("total_order");
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
  let product_TTLs = document.getElementsByClassName("productexts");
  var total = 0;
  for (var i = 0; i < products_order.length; i++) {
    total +=
      Math.round(
        (parseFloat(product_TTLs[i].value, 10) + Number.EPSILON) * 1000
      ) / 1000;
  }
  ttl.value = total;
}
