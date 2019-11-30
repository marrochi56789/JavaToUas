
// -------------------------------------------------------------------------------------------------------------
//                                     LOGIN ADMIN HOME
// -------------------------------------------------------------------------------------------------------------
function openNav() {
    document.getElementById("mySidenav-home2").style.width = "0";
  document.getElementById("mySidenav-home").style.width = "220px";
  document.getElementById("main-home").style.marginLeft = "220px";
 

}

function closeNav() {
  document.getElementById("mySidenav-home").style.width = "0";
  document.getElementById("main-home").style.marginLeft= "0";

}
function openNav2() {
    document.getElementById("mySidenav-home").style.width = "0";
    document.getElementById("mySidenav-home2").style.width = "220px";
    document.getElementById("main-home").style.marginLeft = "220px";

  
  }
  
  function closeNav2() {
    document.getElementById("mySidenav-home2").style.width = "0";
    document.getElementById("main-home").style.marginLeft= "0";
  
  }
// ------------ eye show and eye hide CHECKBOX
$(document).ready(function(){		
    $('.loginjs').click(function(){
        if($(this).is(':checked')){
            $('#upass').attr('type','text');
        }else{
            $('#upass').attr('type','password');
        }
    });
    $('.lupasjs').click(function(){
      if($(this).is(':checked')){
          $('#upasss').attr('type','text');
      }else{
          $('#upasss').attr('type','password');
      }
  });
});


// document.addEventListener('DOMContentLoaded', function() {
//   var elems = document.querySelectorAll('.sidenav');
//   var instances = M.Sidenav.init(elems, options);
// });



$(document).ready(function(){
  $('.sidenav').sidenav();
});