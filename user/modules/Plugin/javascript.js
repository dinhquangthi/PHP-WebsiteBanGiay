
(function($){
  ({
    init: function(){
			var self = this;

			$(function(){
				self.sliderBanner();
				self.viewMore();
				self.gallery();
				self.phanTrang();
				self.load_thanhPho();
				self.load_quan();
				
			});
    },
    
    sliderBanner: function() {
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
    },

    viewMore: function(){
      $('.details-btn').click(function () {
        $('html,body').stop().animate({
            scrollTop: $('.list-product').offset().top
        }, 800);
        event.preventDefault();
    });
    },

    gallery: function(){
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
    },

    phanTrang: function(){
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
    },

    load_thanhPho: function() {
      var xhr = new XMLHttpRequest();
      xhr.open('POST','http://localhost:5000/PHP-WebsiteBanGiay/tinh_tp.json',true);
      xhr.onload = function ()
        {
          var thanhPho = JSON.parse(xhr.responseText);
         
         $.each(thanhPho,function()
            {
              var key = Object.keys(this)[0];
              var value = this[key];
              var code = Object.keys(this)[4];
              var value2 = this[code];

              var op1 = document.createElement('option');
              op1.innerText = value;
              op1.setAttribute('value',value2);
              $('#thanhPho-list').append(op1);

            });
        }
        xhr.send();
    },

    load_quan: function() {
      $('#quan-list').innerHTML = '';
      var xhr = new XMLHttpRequest();
      xhr.open('POST','http://localhost:5000/PHP-WebsiteBanGiay/quan_huyen.json',true);
      xhr.onload = function (id)
        {
          var thanhPho = JSON.parse(xhr.responseText);
         
         $.each(thanhPho,function()
            {
              var key = Object.keys(this)[0];
              var value = this[key];
              var code = Object.keys(this)[4];
              var value2 = this[code];

              var op1 = document.createElement('option');
              op1.innerText = value;
              op1.setAttribute('value',value2);
              $('#quan-list').append(op1);

            });
        }
        xhr.send();
    }

  }.init());
}(jQuery));