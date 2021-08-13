/**
     * Top slider
     */
 function idcomTestimonial(){
    var $ = jQuery.noConflict();

    $('.testimonials_slider').each(function(){

        var $container  = $(this).attr('id');
        
        var $id         = $(this).attr('id')+'-topslider-swiper';
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  1,
            loop:                           true,
            speed:                          1000,

            direction:'vertical',
            watchOverflow:                  false,
            autoHeight:                     false,
            autoplay: {
                delay:                      6000,
                stopOnLastSlide:            false,
                disableOnInteraction:       true,
                reverseDirection:           false,
                waitForTransition:          false
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
           
        });

                
    });


    /*function setSlideHeight(that){
        jQuery('.swiper-slide').css({height:'auto'});
        var currentSlide = that.activeIndex;
        var newHeight = jQuery(that.slides[currentSlide]).height();

        jQuery('.swiper-wrapper,.swiper-slide').css({ height : newHeight })
        that.update();
    }*/
    
   
}