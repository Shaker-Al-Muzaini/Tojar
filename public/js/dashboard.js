// PADDING TOP IN MOBILE
if(document.body.offsetWidth <= 767.9){
  localStorage.setItem('body-padding-top', 'true');
  document.querySelector('#sidebarMenu').classList.remove('compressed');
}else{
  localStorage.setItem('body-padding-top', 'false')
}
window.ondeviceorientation = function(){
  if(document.body.offsetWidth <= 767.9){
    localStorage.setItem('body-padding-top', 'true');
    document.querySelector('#sidebarMenu').classList.remove('compressed');
  }else{
    localStorage.setItem('body-padding-top', 'false')
  }
}
window.onresize = function(){
  if(document.body.offsetWidth <= 767.9){
    localStorage.setItem('body-padding-top', 'true');
    document.querySelector('#sidebarMenu').classList.remove('compressed');
  }else{
    localStorage.setItem('body-padding-top', 'false')
  }
}

// ACTIVE LINK background-color
let links = document.querySelectorAll('.nav.flex-column .nav-link');

links.forEach(function(el){
  el.addEventListener('click', function(){
    if(this.id == 'logout'){
      return false;
    }
    links.forEach((e)=>{
      e.classList.remove('active');
    });
    el.classList.add('active');
  });
});

// DIRECTING SIDEBAR LINKS
document.querySelector('#tubes-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/tubes.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});
document.querySelector('#customers-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/customers.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});
document.querySelector('#store-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/warehouse.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});
document.querySelector('#branches-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/branches.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});
document.querySelector('#distribution-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/distribution.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});
document.querySelector('#employees-link').addEventListener('click', function(){
  document.querySelector('iframe').setAttribute('src', 'src/employees.html');
  if(document.body.offsetWidth <= 767.9){
    document.querySelector('.navbar-toggler').click();
  }
});

// 
document.querySelector('.btn-menu').addEventListener('click', function(){
  document.querySelector('#sidebarMenu').classList.toggle('compressed');
});