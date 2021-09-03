/**
 * Photoswipe function
 */
var initPhotoswipeGallery = function(index, target){

    var gallery;

    var pswpElement = document.querySelectorAll('.pswp')[0];

    // define options (if needed)
    var options = {
        history:                    false,
        focus:                      false,
        showHideOpacity:            true,
        clickToCloseNonZoomable:    true,
        showAnimationDuration:      0,
        hideAnimationDuration:      0,
        tapToClose:                 true,
        spacing:                    0,
        loop:                       true,
        index:                      0,
        shareEl:                    false
    };

    var items = [];

    for(var i=0; i<jQuery('#'+target+' .pswpi').length; i++){

        var cur_elem    = jQuery('#'+target+' .pswpi')[i];
        var lI          = cur_elem.getAttribute('data-src');
        var wI          = cur_elem.getAttribute('data-width');
        var hI          = cur_elem.getAttribute('data-height');
        var tI          = cur_elem.getAttribute('data-caption');

        items.push({src:lI, w:wI, h:hI, title:tI});

    }

    // Initialize and open PhotoSwipe
    gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default ,items, options);

    gallery.init();

    gallery.goTo(index);

}

/**
 * Init js
 */
function idcomInit(){
            
    /**
     * Font awesome
     */
    var script      = document.createElement('script');
    script.src      = 'https://kit.fontawesome.com/c13b3539ea.js';
    script.type     = 'text/javascript';
    document.getElementsByTagName('head')[0].appendChild(script);
    
    /* Plugins */
    var $ = jQuery.noConflict();
    
    $.extend($.fn, {

        mainMenu: function(){

            this.each(function(){

                var $id = $(this).attr('id');

                // Desktop
                if(!window.matchMedia('(max-width: 991px)').matches){

                    if($('#'+$id+' > ul').length){

                        $('#'+$id).hover(function(){

                            $('#'+$id+' > ul').stop(true,true).slideDown(250);

                        }, function(){

                            $('#'+$id+' > ul').stop(true,true).slideUp(150);

                        });

                    }

                }

            });

            return this;

        },

        /**
        * Main menu (mobile)
        */
        mobileMenu: function(){

            this.each(function(){

                var $id = $(this).attr('id');

                // Tablet & mobile
                if(window.matchMedia('(max-width: 991px)').matches){

                    $('#'+$id+' > ul > .menu-item-has-children > a').click(function(e){

                        e.preventDefault();

                        e.stopPropagation();

                        var $this = $(this).parent();

                        if($($this).find('ul').is(':visible')){

                            $($this).find('ul').slideUp(150);

                        }else{

                            $($this).find('ul').slideDown(250);

                        }


                    });

                }

            });

            return this;

        },

    });

    $(document).ready(function($){
        
        setTimeout(function(){ $('.main').removeAttr('style'); }, 2000);
        
        idcom_woo_cart_preview();
                
        /**
         * IDCOM loader
         */
        function loadingProgress(){
            
            var $n = parseInt($('#idcom-loader').attr('data-loading'));
            
            $('#idcom-loader').attr('data-loading',$n+1);
            
            $('#idcom-loader > .progress').css({'width':($n+2)+'%'});
            
            $('#idcom-loader > .progress, #idcom-loader > .counter').css({'opacity':(($n+2)/100)});
            
            $('#idcom-loader > .counter > p').html(($n+1)+'<span>%</span>');
            
            if(($n+1) < 100){
            
                setTimeout(loadingProgress, parseInt($('#idcom-loader').attr('data-timeout')));

            }
            
        }
        
        function idcomLoader($d){

            if($('#idcom-loader').length){

                var $x = $d/100;

                $('#idcom-loader').attr('data-timeout',$x);

                setTimeout(loadingProgress, $x);

                setTimeout(function(){

                    setTimeout(function(){

                        $('#idcom-loader').fadeOut(250);

                    }, $d/5);

                }, $d);

            }

        }

        idcomLoader(1000);
        
        /**
         * Sticky main menu
         */
        $(window).scroll(function(){
            
            var scrollH = jQuery('header').outerHeight();
            
            if($(window).scrollTop() > scrollH){
               
               $('header').addClass('sticky');
                               
            }else{
                
                $('header').removeClass('sticky');
                                
            }
            
        });
        
        /**
         * Tooltips
         */
        $('[data-toggle="tooltip"]').tooltip();

        /**
        * Main menu
        */
        jQuery('.header-menu > ul > li').mainMenu();

        jQuery('.header-menu').mobileMenu();

        if(jQuery('#hamburger').is(':visible')){

            jQuery('#hamburger').click(function(){

                jQuery('.header-menu > ul').addClass('visible');

            });

            jQuery('.header-menu > ul #close-menu').click(function(){

                jQuery('.header-menu > ul').removeClass('visible');

            });

        }
        
        /**
         * WOW init
         */
        wow = new WOW({
            boxClass:     'wow',
            animateClass: 'animated',
            offset:       0,
            mobile:       true,
            live:         true
        });

        wow.init();

        /**
        * Go to top button
        */
        if($('#gototop').length){

            var btn = $('#gototop');

            $(window).scroll(function(){

                if($(window).scrollTop() > 300){

                    btn.show();

                }else{

                    btn.hide();

                }

            });

            btn.on('click', function(e){

                e.preventDefault();

                $('html, body').animate({scrollTop:0}, '300');

            });

        }

        /**
        * Search
        */
        if($('.search-the-site').length){

            $('.search-the-site').click(function(){

                $('#site-search').fadeIn(500, function(){

                    $('#site-search input').focus();

                });

                $('#site-search #closesearch').click(function(){

                    $('#site-search').fadeOut(250, function(){

                        $('#site-search input').val('');

                    });

                });

            });

        }
        
        /**
         * Init the Instagram feed
         */
        function idcom_get_instagram_feed(){
            
            setTimeout(function(){
                
                if($('.idcom-instagram-feed').length && typeof sbi_init != 'undefined'){
                    
                    sbi_init();
                
                }else{
                    
                    $('.idcom-instagram-feed').hide();
                    
                }
            
            }, 1500);
                        
        }
        
        idcom_get_instagram_feed();
        
        /**
         * Product images slider
         */
        if($('#the-product-slider').length){
            
            var galleryThumbs = new Swiper('.gallery-thumbs', {
                spaceBetween:           10,
                slidesPerView:          4,
                loop:                   true,
                freeMode:               true,
                loopedSlides:           5,
                watchSlidesVisibility:  true,
                watchSlidesProgress:    true,
            });
            
            var galleryTop = new Swiper('.gallery-top', {
                spaceBetween:           10,
                loop:                   true,
                loopedSlides:           5,
                navigation: {
                    nextEl:             '.swiper-button-next',
                    prevEl:             '.swiper-button-prev',
                },
                thumbs: {
                    swiper:             galleryThumbs,
                },
            });
            
            $('.gallery-top .zoom').click(function(){
                
                var $parent = $(this).parent().parent().attr('id');
                                                
                var $id     = $(this).parent().find('figure').index();
                                
                initPhotoswipeGallery($id, $parent);
                
            });
            
        }
        
        if($('.single-product-image').length){
            
            $('.single-product-image .zoom').click(function(){
                
                var $parent = $(this).parent().attr('id');
                                                
                var $id     = $(this).parent().find('figure').index();
                                
                initPhotoswipeGallery($id, $parent);
                
            });
            
        }
        
        if($('.woo-related-products').length){
                    
            var swiper = new Swiper('#the-related-products', {
                slidesPerView:                  4,
                loop:                           true,
                spaceBetween:                   20,
                speed:                          1000,
                watchOverflow:                  false,
                autoHeight:                     false,
//              navigation: {
//                  nextEl:                     '.swiper-button-next',
//                  prevEl:                     '.swiper-button-prev',
//              },
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
                    },
                    600: {
                      slidesPerView: 2,
                    },
                    992: {
                      slidesPerView: 3,
                    },
                    1200: {
                      slidesPerView: 4,
                    },
                },
            });
            
        }
        
        $('.add_to_cart_button, .woocommerce-cart-form__cart-item > .product-remove > .remove').click(function(){
            
            setTimeout(function(){
                
                var updateCart = {
                    action:     'idcom_update_cart_counter'
                };

                $.ajax({
                    type:           'POST',
                    url:            idcomajax.ajax_url,
                    dataType:       'json',
                    data:           updateCart,
                    success: function(data){

                        dataResult = $.parseJSON(data);

                        $('.ibtn.cart > .cart-counter').html(dataResult.count);

                        if(dataResult.label == 'ok'){

                            $('.ibtn.cart > .cart-counter').removeClass('hidden');

                        }else{

                            $('.ibtn.cart > .cart-counter').addClass('hidden');

                        }

                    }

                });
                
            }, 2000);
            
        });
        
    });
    
    /* Insert logo in middle */ 
    jQuery(document).ready(function() {
        var i = 1;
        var middle = Math.round(Math.floor(jQuery("#menu-menu-principal li").length / 2));
        $('ul li').each(function() {
            if(i == middle) {
                var outerHTML = $("#logo-wrapper").prop("outerHTML");
                $("#logo-wrapper")[0].remove();
                jQuery(this).after(outerHTML);
            }
            i++;
        });
    });

    jQuery( function() {
        // now doc is ready, make selection
        // use another selector, not .isotope,
        // since that is dynamically added in Isotope v1
        var $grid = jQuery('#realisations .grid-isotope');
        // use imagesLoaded, instead of window.load
        $grid.imagesLoaded( function() {
            $grid.isotope({
                itemSelector: '.realisation',
                layoutMode: 'fitRows',
                initLayout: true
            });
            jQuery('#realisations .categories').on('change', function() {
                var filterValue = jQuery( this )[0].value;
                console.log(filterValue);
                $grid.isotope({ filter: filterValue });
            });
            jQuery('#realisations .categories').each( function( i, buttonGroup ) {
                var $buttonGroup = jQuery( buttonGroup );
                $buttonGroup.on( 'change', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    jQuery( this ).addClass('is-checked');
                });
            });
        })
    });

    /*jQuery('#realisations .grid-isotope').infiniteScroll({
        path: ".next",
        append: '.realisation',
        status: '.scroller-status',
        history: false,
        scrollThreshold: false,
        button: '.next',
        debug: true
    });


    $grid.on( 'load.infiniteScroll', function( event, response, path ) {
        var $items=jQuery(response).find('.realisation');
            $items.imagesLoaded( function() {
                $grid.append( $items );
                $grid.isotope( 'insert', $items );
        });
    });*/

        
}