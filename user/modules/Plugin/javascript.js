$(function($){

    $(document).ready(function(){
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

    function handleClicks() {
        let clickCount = 1;
        $('.counter').text(clickCount);
        $('.click-incre').click(event => {
            clickCount += 1;
            $('.counter').text(clickCount);
        });
            
        $('.click-reduce').click(event => {
            if (clickCount > 1){
                clickCount -= 1;
            }  
            $('.counter').text(clickCount);
        });
    }
    $(handleClicks);

    $('.details-btn').click(function() {
        $('html,body').stop().animate({
            scrollTop: $('.list-product').offset().top
          }, 800);
          event.preventDefault();
    });

})
