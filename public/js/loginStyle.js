// ////////////////////////////////////////////////////////////////
//used to animate email and password in input field.

$(document).ready(function(){
  //initializing
    $("label[for='email'] > span").fadeOut(0);
    $("label[for='password'] > span").fadeOut(0);
});

$("input[type='email']").on('click',function(){
  $(this).attr('placeholder','');
  $("label[for='email'] > span").fadeIn(500,function(){
    //console.log('fadeout complete');
    // $(this).text(" Password: ");
  });
});

$("input[type='password']").on('click',function(){
  $(this).attr('placeholder','');
  $("label[for='password'] > span").fadeIn(500,function(){
    //console.log('fadeout complete');
    // $(this).text(" Password: ");
  });
});

// ////////////////////////////////////////////////////////////
