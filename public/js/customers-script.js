// PADDING TOP IN MOBILE
if(localStorage.getItem('body-padding-top') == 'true'){
  document.body.classList.add('body-padding-top');
}else{
  document.body.classList.remove('body-padding-top')
}
window.onresize = function(){
  if(localStorage.getItem('body-padding-top') == 'true'){
    document.body.classList.add('body-padding-top');
  }else{
    document.body.classList.remove('body-padding-top')
  }
}

// load datatable
$(document).ready(function () {
  $(".table-striped").DataTable();
  $(".dataTables_filter").hide();
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
  setTimeout(() => {
    // add form-select class
    $(".dataTables_length select").addClass("form-select");
  }, 100);
});