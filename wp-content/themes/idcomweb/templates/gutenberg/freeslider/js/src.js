function idcomFreeSlider(){
    
    /**
     * Free slider
     */
    
    var $ = jQuery.noConflict();
    
    $('.freeslider').each(function(){
        
        var $container  = $(this).attr('id');
        
        var $id         = $(this).attr('id')+'-swiper';
        
        var $loop       = $('#'+$id).attr('data-loop') == 'true' ? true : false;
            
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  3,
            loop:                           $loop,
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
            breakpoints: {
                0: {
                  slidesPerView: 1,
                  spaceBetween: 0,
                },
                768: {
                  slidesPerView: 2,
                  spaceBetween: 0,
                },
                1140: {
                  slidesPerView: 3,
                  spaceBetween: 0,
                },
            },
        });

    });
    
}