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

// LOAD TABLE
$(document).ready(function () {
  // add no-wrap class
  noWrap();
  // load datatable
  $(".table-striped").DataTable();
  setTimeout(() => {
    // hide search button
    $(".dataTables_filter").hide();
    // select the right customer in form
    let select = $("#customer-type");
    let driver = $(".driver-option");
    let store = $(".store-option");
    $("#customer-type").on("change", function () {
      if (select[0].selectedIndex == 0) {
        driver.hide();
        store.hide();
      } else if (select[0].selectedIndex == 1) {
        store.hide();
        driver.show();
      } else if (select[0].selectedIndex == 2) {
        driver.hide();
        store.show();
      }
    });
    // add form-select class
    $(".dataTables_length select").addClass("form-select");

    // add overflow table container
    let container = [];
    $(".table-container").each(function (i, e) {
      // create container
      container[i] = document.createElement("div");
      container[i].setAttribute("id", "overflow-table-container");
      container[i].setAttribute("style", "width: 100%; overflow: auto;");
      // add the container
      $(`#DataTables_Table_${i}`).before(container[i]);
      $(container[i]).append($(`#DataTables_Table_${i}`));
    });
  }, 100);
  $(".loading-screen").hide();
  $(document.body).css("overflow", "visible");
});

function noWrap() {
  $('.table').each((i, e)=>{
    let noWrapIndex = [];
    e.querySelectorAll("thead tr th").forEach((element, index) => {
      if (element.classList.contains("no-wrap")) {
        noWrapIndex.push(index);
      }
    });
    e.querySelectorAll("tbody tr").forEach((myele, myindex) => {
      noWrapIndex.forEach((element, index) => {
        myele.querySelectorAll("td").forEach((e, i) => {
          if (i == element) {
            e.classList.add("no-wrap");
          }
        });
      });
    });
  });
}
