;$(function(){

  $('input, textarea').placeholder();

  // $(".thumbnail>a>img.dynamic-img").bind("mouseenter", function(){
  //   $(this).addClass("hover-rotate");
  // }).bind("mouseout", function() {
  //   $(this).removeClass("hover-rotate");
  // });

  $(".signup-btn").bind('click', function() {
    $("#loginTab li:first").addClass('active').siblings().removeClass('active');
    $("#sign-up").addClass('active').siblings().removeClass('active');
  });

  $(".login-btn").bind('click', function() {
    $("#loginTab li:first").removeClass('active').next().addClass('active');
    $("#log-in").addClass('active').siblings().removeClass('active');
  });

  // 滚动窗口来判断按钮显示或隐藏
  $(window).scroll(function() {
      if ($(this).scrollTop() > 150) {
          $('.back-to-top').fadeIn(100);
      } else {
          $('.back-to-top').fadeOut(100);
      }
  });

  // jQuery实现动画滚动
  $('.back-to-top').click(function(event) {
      event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 500);
  });

  $("ul.nav>li").bind('click', function() {
    $(this).addClass('active').siblings().removeClass('active');
  });


  







}); 