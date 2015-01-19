;$(function(){

  $('input, textarea').placeholder();

  // 登录时检查此邮箱是否存在
  $("#login-email").blur(function(){
    var email = $("#login-email").val();
    if(email!=""){
      $.get('check_email_exists.php?action=loginCheckEmail',
       {email: $("#login-email").val() } ,
       function(data,textStatus){
        $("#alertmsg").html(data);
      });
    }
  }); 


  // 注册时检查邮箱是否可用
  $("#signup-email").blur(function(){
    var email = $("#signup-email").val();
    if(email!=""){
      $.get('check_email_exists.php?action=signupCheckEmail',
       {email: $("#signup-email").val() } ,
       function(data,textStatus){
        $("#alertmsg").html(data);
      });
    }
  });

  $("#loginBtn").click(function() {
    $.post('login.php?action=login', {
      email: $("#signup-email").val(), 
      password: $("#signup-password").val()
      }, function(data, textStatus) {
        $("#alertmsg").html(data);
    });
  });




});



