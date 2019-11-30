
(function ($) {
  var maCodeTP;
  var maCodeQuan;
  var maCodePhuong;

  ({
    init: function () {
      var self = this;

      $(function () {
        self.sliderBanner();
        self.viewMore();
        self.setSmoothScroll();
        self.gallery();
        self.gallery2();
        self.phanTrang();
        self.pagiDisable();
        self.validatePassword();
        self.load_thanhPho();
        $('#thanhPho-list').change(function () {
          self.load_quan($(this));
          maCodeQuan = maCodeTP;
        });
        $('#quan-list').change(function () {
          self.load_phuong($(this));
          maCodePhuong = maCodeQuan;
        });
        self.searchFixed();


      });
    },
    searchFixed: function () {
      var searchTop = $('.search-product').offset().top;
      $(window).scroll(function(){
        if ($(this).scrollTop() > searchTop) {
          $('.search-product').addClass('col-4 search-fixed');
        } else {
          $('.search-product').removeClass('col-4 search-fixed');
        }
    });
    },

    sliderBanner: function () {
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

    setSmoothScroll: function () {
      var anchors = $('a[href^="#"]');
      var win = $(window);
      win.on('load', function () {
        anchors.each(function () {
          var hash = this.hash;
          var hashOffset;

          $(this).on('click', function (e) {
            e.preventDefault();
            hashOffset = (hash === '') ? { top: 0, left: 0 } : $(hash).offset();
            $('html, body').animate({ scrollTop: hashOffset.top }, 400, 'swing');
          });
        });
      });
    },

    viewMore: function () {
      $('.details-btn').click(function () {
        $('html,body').stop().animate({
          scrollTop: $('.list-product').offset().top
        }, 800);
        event.preventDefault();
      });
    },

    gallery: function () {
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
        loop: true,
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

    gallery2: function () {
      var productOthers = new Swiper('.product-others', {
        slidesPerView: 3,
        spaceBetween: 80,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      });
    },

    phanTrang: function () {
      //viet cho nut next
      var next = $('.nutnext');
      $('.nutnext').click(function () {
        var tranghientai = $('.active');
        var trangtieptheo = $('.active').next();
        var laygiatri = $('.active').next().attr('href');
        $(this).attr('href', laygiatri);
        $('.active').removeClass('active');
        trangtieptheo.addClass('active');

      });
      //viet cho nut prev
      var prev = $('.nutprev');
      $('.nutprev').click(function () {
        var tranghientai = $('.active');
        var trangtruoc = $('.active').prev();
        var laygiatri = $('.active').prev().attr('href');
        $(this).attr('href', laygiatri);
        $('.active').removeClass('active');
        trangtruoc.addClass('active');
      });
    },

    load_thanhPho: function () {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost:5000/PHP-WebsiteBanGiay/JSON/tinh_tp.json', true);
      xhr.onload = function () {
        var thanhPho = JSON.parse(xhr.responseText);
        $.each(thanhPho, function (index, value) {
          $("#thanhPho-list").attr('value', value.code + '-' + value.name);
          $("#thanhPho-list").append('<option selected value="' + value.code + '-' + value.name + '">' + value.name + '</option>');
        });
      }
      xhr.send();
    },

    load_quan: function ($this) {

      maCodeTP = ($this).find(":selected").attr('value').slice(0, 2);

      $('#thanhPho-list').attr("value", maCodeTP);

      $('#quan-list option').remove();
      $('#phuong-list option').remove();
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost:5000/PHP-WebsiteBanGiay/JSON/quan_huyen.json', true);
      xhr.onload = function () {
        var quan = JSON.parse(xhr.responseText);

        $.each(quan, function (index, value2) {
          if (value2.parent_code == maCodeQuan) {
            $("#quan-list").append('<option selected value="' + value2.code + '-' + value2.name + '">' + value2.name + '</option>');
          }
        });
      }
      xhr.send();
    },

    load_phuong: function ($this) {

      maCodeQuan = ($this).find(":selected").attr('value').slice(0, 3);
      // console.log(maCodeQuan);
      $('#quan-list').attr("value", maCodeQuan);

      $('#phuong-list option').remove();
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'http://localhost:5000/PHP-WebsiteBanGiay/JSON/xa_phuong.json', true);
      xhr.onload = function () {
        var phuong = JSON.parse(xhr.responseText);

        $.each(phuong, function (index, value3) {
          if (value3.parent_code == maCodeQuan) {
            $("#phuong-list").append('<option value="' + value3.code + '-' + value3.name + '">' + value3.name + '</option>');
          }
        });
      }
      xhr.send();
    },

    pagiDisable: function () {
      var dis = $('.pagination .active');
      dis.addClass('disabled');
    },

    validatePassword: function () {
      var barr = $('.progress-bar');
      var notipwrd = $('#notiPass');

      $("#password").keyup(function () {
        var password = $("#password").val().length;
        if(password >= 1){
          $('#check1').removeClass('d-none');
        }
        else{
          $('#check1').addClass('d-none');
        }
        if (password <= 4 && password >= 1) {
          $('.progress').removeClass('d-none');
          notipwrd.removeClass('d-none');
          barr.attr("style", "width: 25%");
          $('.progress-bar').addClass('bg-danger');
          notipwrd.text('Bảo mật kém');
          notipwrd.addClass('text-danger');
        }
        else if (password <= 8 && password >= 5) {
          $('.progress-bar').removeClass('bg-danger bg-success');
          barr.attr("style", "width: 50%");
          $('.progress-bar').addClass('bg-warning');
          notipwrd.text('Bảo mật ổn');
          notipwrd.removeClass('text-danger');
          notipwrd.addClass('text-warning');
        }
        else if (password > 8) {
          $('.progress-bar').removeClass('bg-warning');
          barr.attr("style", "width: 100%");
          $('.progress-bar').addClass('bg-success');
          notipwrd.text('Bảo mật tốt');
          notipwrd.removeClass('text-warning');
          notipwrd.addClass('text-success');
        }
        else if (password < 1) {
          $('.progress').addClass('d-none');
          notipwrd.addClass('d-none');
        }
      });

     $('#rePassword').keyup(function () {
        if($('#rePassword').val() == $("#password").val()){
          $('#errorWarning').addClass('d-none');
          $('#checkSucess').removeClass('d-none');
        }
        else {
          $('#checkSucess').addClass('d-none');
          $('#errorWarning').removeClass('d-none');
        }
     });

    }





  }.init());
}(jQuery));