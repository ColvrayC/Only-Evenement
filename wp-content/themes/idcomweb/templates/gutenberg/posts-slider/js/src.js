function idcomPostsSlider(){
    
    /**
     * Posts slider
     */
    
    var $ = jQuery.noConflict();
    
    $('.posts-slider').each(function(){
        
        var $id = $(this).attr('id')+'-swiper';
            
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  3,
            loop:                           true,
            speed:                          1000,
            watchOverflow:                  false,
            autoHeight:                     false,
            navigation: {
                nextEl:                     '.swiper-button-next',
                prevEl:                     '.swiper-button-prev',
            },
            autoplay: {
                delay:                      6000,
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