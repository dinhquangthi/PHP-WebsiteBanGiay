$(function ($) {

    $(document).ready(function () {
        $(window).scrollTop(0);
    });
    $('#my-slider').sliderPro({
        width: 1366,
        height: 600,
        arrows: true,
        fade: true,
        autoplay: true,
        autoplayDelay: 5000,
        responsive: true,
        autoScaleLayers: false,
        fadeArrows: false
    });

    new WOW().init();

  
   

    $('.details-btn').click(function () {
        $('html,body').stop().animate({
            scrollTop: $('.list-product').offset().top
        }, 800);
        event.preventDefault();
    });
    function gallery(){
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 3,
            loop: false,
            freeMode: true,
            loopedSlides: 3, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
          });
          var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
            loop:true,
            loopedSlides: 4, //looped slides should be the same
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
            thumbs: {
              swiper: galleryThumbs,
            },
          });
    }
    gallery();

    // Ham Confirm 
    function myConfirm() {
      var txt;
      var r = confirm("Bạn phải đăng nhập mới thực hiện được chức năng này");
      if (r == true) {
        location.href='login.php'
      } else {
        location.href='index.php'
      }
    }
    // Phan trang
     //viet cho nut next
  var next = $('.nutnext');
  $('.nutnext').click(function() {
      var tranghientai = $('.active');
    var trangtieptheo = $('.active').next();
    var laygiatri =$('.active').next().attr('href');
    $(this).attr('href', laygiatri);
    $('.active').removeClass('active');
    trangtieptheo.addClass('active');
 
  });
  //viet cho nut prev
  var prev = $('.nutprev');
  $('.nutprev').click(function() {
    var tranghientai = $('.active');
    var trangtruoc = $('.active').prev();
    var laygiatri =$('.active').prev().attr('href');
    $(this).attr('href', laygiatri);
    $('.active').removeClass('active');
    trangtruoc.addClass('active');
  });
    // Ajax load thanh pho 
   
    
})
