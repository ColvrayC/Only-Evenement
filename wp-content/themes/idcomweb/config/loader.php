<?php

@ini_set('upload_max_size', '128M');

@ini_set('post_max_size', '128M');

@ini_set('max_execution_time', '1800');

define('IDCOMv',time());

function idcomcrea_chargement_bases(){
    
    global $site_data;
    
//    wp_enqueue_style('icons_font', get_template_directory_uri().'/fonts/icons/style.css',array(),IDCOMv,'all');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_style('main-style', get_template_directory_uri().'/less/index.php?fichier=style');
    
    /* Greensock */
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('cssrule-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/CSSRulePlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('draggable-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/Draggable.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('easel-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/EaselPlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('motionpath-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/MotionPathPlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('pixi-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/PixiPlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('text-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/TextPlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('scrollto-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollToPlugin.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('scrolltrigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', array('jquery'), IDCOMv, true);
//    wp_enqueue_script('easepack-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/EasePack.min.js', array('jquery'), IDCOMv, true);
    
    /* jQuery UI Sortable */
//    wp_enqueue_script('jquery-ui-sortable');
    
    /* Leaflet */
//    wp_enqueue_style('leaflet-css', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.min.css',array(),IDCOMv,'all');
//    wp_enqueue_script('leaflet-js', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet-src.min.js', array('jquery'), IDCOMv, true);
    
    /* Magnific popup */
//    wp_enqueue_style('magnific-popup-css', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',array(),IDCOMv,'all');
//    wp_enqueue_script('magnific-popup-js', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), IDCOMv, true);
    
    /* Photoswipe */
    wp_enqueue_style('pswp-css', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.css',array(),IDCOMv,'all');
    wp_enqueue_style('pswp-skin-css', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/default-skin/default-skin.min.css',array(),IDCOMv,'all');
    wp_enqueue_script('pswp-js', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js', array('jquery'), IDCOMv, true);
    wp_enqueue_script('pswp-ui-js', 'https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js', array('jquery'), IDCOMv, true);
    
    /* Swiper */
    wp_enqueue_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.css',array(),IDCOMv,'all');
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.0/swiper-bundle.min.js', array('jquery'), IDCOMv, true);
    
    /* Chart JS */
//    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js@2.8.0', array('jquery'), IDCOMv, true);
    
    /* ION RANGE SLIDER */
//    wp_enqueue_style('ionrangeslider','https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css',array(),IDCOMv,'all');
//    wp_register_script('ionrangeslider','https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js',array('jquery'),IDCOMv,true);
//    wp_enqueue_script('ionrangeslider');
    
    /* Scroll Magic */
//    wp_enqueue_script('scrollmagic-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array('jquery'), IDCOMv, true);
    
    /* Bootstrap */
    wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js', array('jquery'), IDCOMv, true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js', array('jquery'), IDCOMv, true);
    
    /* BARBA JS */
    if($site_data['barba']){
        
        /* GL Slideshow */
        wp_enqueue_script('glslideshow-js', 'https://cdn.jsdelivr.net/npm/GLSlideshow@2.1.0/dist/gl-slideshow.min.js', array(), IDCOMv, true);
                
        wp_enqueue_script('barba-js', 'https://cdn.jsdelivr.net/npm/@barba/core', array('jquery'), IDCOMv, true);
        
    }
    
    /* Site */
    wp_enqueue_script('script', get_template_directory_uri().'/js/functions.js', array('jquery'), IDCOMv, true);
    wp_enqueue_script('main-script', get_template_directory_uri().'/js/main.js', array('jquery'), IDCOMv, true);
    wp_localize_script('main-script','idcomajax', array('ajax_url' => admin_url('admin-ajax.php')));
    
//    if($site_data['barba']){
//        
//        wp_enqueue_script('barba', get_template_directory_uri().'/js/barba.js', array ('jquery'), IDCOMv, true);
//        
//    }else{
//        
//        wp_enqueue_script('nobarba', get_template_directory_uri().'/js/nobarba.js', array ('jquery'), IDCOMv, true);
//        
//    }
    
    foreach(json_decode(IDCOM_OUTILS,true) as $c=>$v){
        
        if(get_option("idcom_plugin_".$c,"false") == "true"){
            
            if(!empty($v["cdn"]["css"])){
                
                wp_enqueue_style($c,$v["cdn"]["css"]);
                
            }	
            
            if(!empty($v["cdn"]["js"])){
                
                wp_enqueue_script($c,$v["cdn"]["js"],array('jquery'), $v["ver"], true);
                
            }
            
        }
        
    }
    
//    if($site_data['barba']){
//        
//        wp_enqueue_script('barba', get_template_directory_uri().'/js/barba.js', array ('jquery'), IDCOMv, true);
//        
//    }else{
//        
//        wp_enqueue_script('nobarba', get_template_directory_uri().'/js/nobarba.js', array ('jquery'), IDCOMv, true);
//        
//    }
        
}

add_action('wp_enqueue_scripts', 'idcomcrea_chargement_bases');