// PADDING TOP IN MOBILE
window.onload = function(){
  setTimeout(() => {
    getPaddinglocalStorage();
    window.ondeviceorientation = function () {
      getPaddinglocalStorage();
    };
    window.onresize = function () {
      getPaddinglocalStorage();
    };
  }, 100);
}
function getPaddinglocalStorage(){
  if (localStorage.getItem("body-padding-top") == "true") {
    document.body.classList.add("body-padding-top");
  } else {
    document.body.classList.remove("body-padding-top");
  }
}

// load datatable
$(document).ready(function () {
  // add no-wrap class
  noWrap();
  // load data table
  $(".table-striped").DataTable();
  let btn = [];
  let container = [];
  $(".table-container").each(function (i, e) {
    // create the btn-add
    btn[i] = document.createElement("button");
    btn[i].textContent = "+ ����� �� ����";
    btn[i].setAttribute("type", "button");
    btn[i].classList.add("btn", "btn-add");
    // create container
    container[i] = document.createElement("div");
    container[i].setAttribute("id", "overflow-table-container");
    container[i].setAttribute("style", "width: 100%; overflow: auto;");

    setTimeout(() => {
      // add class to search btn
      $(`#DataTables_Table_${i}_filter label input`).addClass("form-control");
      $(`#DataTables_Table_${i}_filter label input`).addClass("search-width");
      // add form-select class
      $(".dataTables_length select").addClass("form-select");
      // add the btn-add
      $(`#DataTables_Table_${i}_filter`).before(btn[i]);
      // add the container
      $(`#DataTables_Table_${i}`).before(container[i]);
      $(container[i]).append($(`#DataTables_Table_${i}`));
    }, 100);
  });
  $('.loading-screen').hide();
  $(document.body).css('overflow', 'visible');
});

function noWrap() {
  let noWrapIndex = [];
  document.querySelectorAll("thead tr th").forEach((element, index) => {
    if (element.classList.contains("no-wrap")) {
      noWrapIndex.push(index);
    }
  });
  document.querySelectorAll("tbody tr").forEach((myele, myindex) => {
    noWrapIndex.forEach((element, index) => {
      myele.querySelectorAll("td").forEach((e, i) => {
        if (i == element) {
          e.classList.add("no-wrap");
        }
      });
    });
  });
}
