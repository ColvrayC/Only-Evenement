function idcomRelatedPosts(){
    
    /**
     * Related posts slider
     */
    
    var $ = jQuery.noConflict();
    
    $('.related-posts').each(function(){
        
        var $id = $(this).attr('id')+'-swiper';
                
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  4,
            loop:                           true,
            speed:                          1000,
            watchOverflow:                  false,
            autoHeight:                     false,
//            navigation: {
//                nextEl:                     '.swiper-button-next',
//                prevEl:                     '.swiper-button-prev',
//            },
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
                600: {
                  slidesPerView: 2,
                  spaceBetween: 0,
                },
                992: {
                  slidesPerView: 3,
                  spaceBetween: 0,
                },
                1200: {
                  slidesPerView: 4,
                  spaceBetween: 0,
                },
            },
        });

    });
    
}