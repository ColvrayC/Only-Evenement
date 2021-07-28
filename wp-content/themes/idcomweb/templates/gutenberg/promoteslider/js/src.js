function idcomPromoteSlider(){
    
    /**
     * Promote slider
     */
    
    var $ = jQuery.noConflict();
    
    $('.promoteslider').each(function(){
        
        var $container  = $(this).attr('id');
        
        var $id         = $(this).attr('id')+'-swiper';
                    
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  1,
            loop:                           true,
            speed:                          1000,
            watchOverflow:                  false,
            autoHeight:                     false,
            navigation: {
                nextEl:                     '#'+$container+' .swiper-button-next',
                prevEl:                     '#'+$container+' .swiper-button-prev',
            },
            pagination: {
                el:                         '#'+$container+' .swiper-pagination',
                clickable:                  true,
            },
            autoplay: {
                delay:                      5000,
                stopOnLastSlide:            false,
                disableOnInteraction:       true,
                reverseDirection:           false,
                waitForTransition:          false
            },
//            breakpoints: {
//                0: {
//                  slidesPerView: 1,
//                  spaceBetween: 0,
//                },
//                768: {
//                  slidesPerView: 2,
//                  spaceBetween: 0,
//                },
//                1140: {
//                  slidesPerView: 3,
//                  spaceBetween: 0,
//                },
//            },
        });

    });
    
}