"use strict";

function submitForm(action) {
  if (window.confirm("Are you sure you want to delete this item?")) {
    var form = document.getElementById("deleteForm");
    form.action = action;
    form.submit();
  }
}
