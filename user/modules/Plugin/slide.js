$(function() {

    // sau 3s tu dong chuyen slide
    thoigian = setInterval(function() {
    $('.next').trigger('click');
  }, 4000)

      // click nut next de chuyen slide
    $('.next').click(function(event) {
      //huy bo thoi gian tu chuyen slide
    clearInterval(thoigian);

    var sau = $('.active').next();
    var sau1= $('.active-1').next();

    if (sau.length == 0) {
      $('.active').addClass('bienmatubentrai').one('webkitAnimationEnd', function(event) {
        $('.bienmatubentrai').removeClass('bienmatubentrai');
      });

      $('.active-1').removeClass('active-1');
      $('.banner-img .slide-img:nth-child(1)').addClass('divaotubenphai').one('webkitAnimationEnd', function(event) {
        // bo class active
        $('.active').removeClass('active');
        $('.divaotubenphai').addClass('active').removeClass('divaotubenphai');
      });
      $('.details .details-btn:nth-child(1)').addClass('active-1');
    } else {
      // code cho phan addClass ban dau
      $('.active').addClass('bienmatubentrai').one('webkitAnimationEnd', function(event) {
        $('.bienmatubentrai').removeClass('bienmatubentrai');
      });
      $('.active-1').removeClass('active-1');
      sau.addClass('divaotubenphai').one('webkitAnimationEnd', function(event) {
        // bo class active
        $('.active').removeClass('active');
        $('.divaotubenphai').addClass('active').removeClass('divaotubenphai');
      });
      sau1.addClass('active-1');
    }
  }); // end-nut-next

  // click nut previous de chuyen slide
  $('.prev').click(function(event) {
    var truoc = $('.active').prev();
    var truoc1= $('.active-1').prev();
      clearInterval(thoigian);

      if (truoc.length == 0) {
      $('.active').addClass('bienmatubenphai').one('webkitAnimationEnd', function(event) {
        $('.bienmatubenphai').removeClass('bienmatubentrai');
      });
        $('.active-1').removeClass('active-1');
      $('.banner-img .slide-img:nth-child(3)').addClass('divaotubentrai').one('webkitAnimationEnd', function(event) {
        // bo class active
        $('.active').removeClass('active');
        $('.divaotubentrai').addClass('active').removeClass('divaotubentrai');
      });
        $('.details .details-btn:nth-child(3)').addClass('active-1');
    } else {
      // code cho phan addClass ban dau
      $('.active').addClass('bienmatubenphai').one('webkitAnimationEnd', function(event) {
        $('.bienmatubenphai').removeClass('bienmatubenphai');
      });

      $('.active-1').removeClass('active-1');
      truoc.addClass('divaotubentrai').one('webkitAnimationEnd', function(event) {
        // bo class active
        $('.active').removeClass('active');
        $('.divaotubentrai').addClass('active').removeClass('divaotubentrai');
      });
      truoc1.addClass('active-1');
    }
  });
});
