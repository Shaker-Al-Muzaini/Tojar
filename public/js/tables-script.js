// PADDING TOP IN MOBILE
setTimeout(() => {
  if(localStorage.getItem('body-padding-top') == 'true'){
    document.body.classList.add('body-padding-top');
  }else{
    document.body.classList.remove('body-padding-top');
  }
  window.ondeviceorientation = function(){
    if(localStorage.getItem('body-padding-top') == 'true'){
      document.body.classList.add('body-padding-top');
    }else{
      document.body.classList.remove('body-padding-top');
    }
  }
  window.onresize = function(){
    if(localStorage.getItem('body-padding-top') == 'true'){
      document.body.classList.add('body-padding-top');
    }else{
      document.body.classList.remove('body-padding-top');
    }
  }
}, 100);
// load datatable
$(document).ready(function () {
  $(".table-striped").DataTable();
});

// load add button onload
$(document).ready(loadBtn);

// add button load function
function loadBtn() {
  let btn = [];
  $(".table-container").each(function (i, e) {
    // create the btn-add
    btn[i] = document.createElement("button");
    btn[i].textContent = "+ إضافة صف جديد";
    btn[i].setAttribute("type", "button");
    btn[i].classList.add("btn", "btn-add");

    setTimeout(() => {
      // add class to search btn
      $(`#DataTables_Table_${i}_filter label input`).addClass("form-control");
      $(`#DataTables_Table_${i}_filter label input`).addClass("search-width");
      // add form-select class
      $('.dataTables_length select').addClass('form-select');
      // add the btn-add
      $(`#DataTables_Table_${i}_filter`).before(btn[i]);
    }, 100);
  });
}
