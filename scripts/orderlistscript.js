"use strict";

window.addEventListener("load", init);
window.addEventListener("click", init);

function init() {
  var buttons = document.getElementsByClassName("delete-button");
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener("click", submitForm);
  }
}

function submitForm(event) {
  event.preventDefault();
  if (window.confirm("Are you sure you want to delete this item?")) {
    var form = document.getElementById("deleteForm" + this.getAttribute("id"));
    console.log(form.getAttribute("ID"));
    form.action = "deleteorder.php";
    form.submit();
  }
}
