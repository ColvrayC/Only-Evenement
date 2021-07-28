/**
     * Top slider
     */
function idcomTopSlider(){
    var $ = jQuery.noConflict();
        
    $('.topslider').each(function(){
        
        var $container  = $(this).attr('id');
        
        var $id         = $(this).attr('id')+'-swiper';
        
        var swiper = new Swiper('#'+$id, {
            slidesPerView:                  1,
            loop:                           true,
            speed:                          1000,
            watchOverflow:                  false,
            autoHeight:                     false,
            autoplay: {
                delay:                      6000,
                stopOnLastSlide:            false,
                disableOnInteraction:       true,
                reverseDirection:           false,
                waitForTransition:          false
            },
            pagination: {
                el:             '#'+$container+' .swiper-pagination',
                clickable:      true,
                renderBullet:   function (index, className) {
                    return '<span class="' + className + '">' + (index + 1) + "</span>";
                },
            },
        });
                
    });
}