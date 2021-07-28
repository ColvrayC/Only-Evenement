<?php

/**
 * Include admin fields class
 */
require IDCOMTOOLS_ROOT_PATH.'/inc/lib/wpm_fields_class.php';

/**
 * Include admin fields functions
 */
require IDCOMTOOLS_ROOT_PATH.'/inc/lib/wpm_fields_func.php';

/**
 * Include global functions
 */
require IDCOMTOOLS_ROOT_PATH.'/inc/lib/wpm_func.php';

/**
 * Include content spinning class
 */
// require IDCOMTOOLS_ROOT_PATH.'/inc/lib/wpm_spintax.php';

/**
 * Include application code
 */
require IDCOMTOOLS_ROOT_PATH.'/inc/app.php';

/**
 * Load text domain
 */
function idcomtools_load_plugin_textdomain(){
    
    load_plugin_textdomain('idcomtools', false, basename(dirname(__FILE__)).'/languages'); 
    
}

add_action('plugins_loaded', 'idcomtools_load_plugin_textdomain');

/**
 * Includes default options
 */
// include IDCOMTOOLS_ROOT_PATH.'/inc/options.php';

/**
 * Options
 */
/*
global $idcomtools_opts;

if(!get_option('idcomtools_options')){
        
    add_option('idcomtools_options',$idcomtools_options,'','yes');
    
    $idcomtools_opts = get_option('idcomtools_options');
    
}else{
        
    $idcomtools_opts = get_option('idcomtools_options');
    
}
*/

/**
 * Encode/decode opts
 */
function idcomtools_encode_opt($opt){
    $enc = base64_encode(serialize($opt));
    return $enc;
}

function idcomtools_decode_opt($opt){
    $dec = unserialize(base64_decode($opt));
    return $dec;
}

/**
 * Session
 */
if(session_status() == PHP_SESSION_NONE) { session_start(); }

if(!isset($_SESSION['idcomtools'])){
        
    $_SESSION['idcomtools'] = array();
        
}

/**
 * Link to settings in plugin description
 */
function idcomtools_plugin_row_meta($links, $file){
    
    if(strpos($file, 'idcom-tools.php') !== false){
        
        $new_links = array(
            
            '<a href="#" target="_blank">'.__('Yeah!','idcomtools').'</a>'
            
        );

        $links = array_merge($links, $new_links);
        
    }

    return $links;
}

add_filter('plugin_row_meta', 'idcomtools_plugin_row_meta', 10, 2);

function idcomtools_action_links($links_array, $plugin_file_name){
    
    array_unshift($links_array, '<a href="https://www.groupe-idcom.fr" target="_blank" rel="noopener">'.__('Plus d\'options','idcomtools').'</a>');

    array_unshift($links_array, '<a href="'.admin_url().'admin.php?page=wpmtbox">'.__('Réglages','idcomtools').'</a>');
    
    // array_unshift($links_array, '<a href="https://www.groupe-idcom.fr" target="_blank" rel="noopener"><img src="https://wpmouse.com/wp-content/uploads/2020/09/wpmouse.com-logo.svg" alt="WP MOUSE" style="display:inline-block;width:40px;height:auto;"/></a>');
    
    return $links_array;
    
}

add_action('plugin_action_links_idcom-tools/idcom-tools.php', 'idcomtools_action_links', 10, 2);

// var_dump(plugin_basename(__FILE__));

/**
 * Admin menu
 */
function idcomtools_admin_menu(){
    
    $icon = base64_encode('');
        
    add_menu_page(__('IDCOM Tools','idcomtools'), __('IDCOM Tools','idcomtools'), 'manage_options', 'idcom_tools', 'idcomtools_admin_page', 'data:image/svg+xml;base64,'.$icon, 4);
        
}

add_action('admin_menu','idcomtools_admin_menu');

/**
 * Scripts css et js (admin)
 */
function idcomtools_admin_scripts($hook){
    
    $idcomtools_pages  = array(
        'toplevel_page_idcom_tools',
        // 'user-edit.php'
    );
    
    $path   = IDCOMTOOLS_ROOT_URL.'assets';
    
    if(in_array($hook,$idcomtools_pages)){
                
        wp_enqueue_style('idcomtools_admin',$path.'/css/admin.css',array(),IDCOMTOOLSv,'all');
        wp_enqueue_style('font_awesome','https://use.fontawesome.com/releases/v5.0.10/css/all.css');
        
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        
        /*
        wp_register_script('gsap','https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('gsap');
        
        wp_register_script('gsap-draggable','https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/Draggable.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('gsap-draggable');
        
        wp_register_script('wpm-gsap',$path.'/js/gsap.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('wpm-gsap');
        
        wp_register_script('sortablejs',$path.'/js/sortablejs/Sortable.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('sortablejs');
         * 
         */
        
        wp_register_script('wpm',$path.'/js/wpm.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('wpm');
        
        wp_enqueue_script('jquery-ui-sortable');
        
//        wp_register_script('popmotion','https://unpkg.com/popmotion@9.0.2/dist/popmotion.global.min.js',array('jquery'),IDCOMTOOLSv,true);
//        wp_enqueue_script('popmotion');
//        
//        wp_register_script('flubber','https://unpkg.com/flubber@0.3.0',array('jquery'),IDCOMTOOLSv,true);
//        wp_enqueue_script('flubber');
                
        wp_enqueue_style('select2','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',array(),IDCOMTOOLSv,'all');
        wp_register_script('select2','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('select2');
                
        wp_register_script('inputmask',$path.'/js/inputmask/jquery.inputmask.bundle.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('inputmask');
        
        wp_enqueue_style('tagsinput',$path.'/js/tagsinput/jquery.tagsinput.css',array(),IDCOMTOOLSv,'all');
        wp_register_script('tagsinput',$path.'/js/tagsinput/jquery.tagsinput.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('tagsinput');
        
        wp_enqueue_style('ionrangeslider','https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css',array(),IDCOMTOOLSv,'all');
        wp_register_script('ionrangeslider','https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('ionrangeslider');
        
        wp_enqueue_script('jquery-ui-datepicker');
        
        wp_register_script('rgbacolorpicker',$path.'/js/rgbacolorpicker/wp-color-picker-alpha.min.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('rgbacolorpicker');
        
        wp_register_script('idcomtools_admin',$path.'/js/admin.js',array('jquery'),IDCOMTOOLSv,true);
        wp_enqueue_script('idcomtools_admin');
        
    }
    
}

add_action('admin_enqueue_scripts','idcomtools_admin_scripts');

/**
 * Scripts css et js (front)
 */
function idcomtools_front_scripts($hook){
    
    $path   = IDCOMTOOLS_ROOT_URL.'assets';
    
    wp_register_style('idcomtools_front_css',$path.'/css/front.css',array(),IDCOMTOOLSv,'all');
    wp_enqueue_style('idcomtools_front_css',$path.'/css/front.css');
    
    wp_register_style('tagsinput_front_css',$path.'/js/tagsinput/jquery.tagsinput.css',array(),IDCOMTOOLSv,'all');
    wp_enqueue_style('tagsinput_front_css',$path.'/js/tagsinput/jquery.tagsinput.css');
    
    wp_enqueue_style('select2_front_css','https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css',array(),IDCOMTOOLSv,'all');
    
//    wp_register_script('popmotion_js','https://unpkg.com/popmotion@9.0.2/dist/popmotion.global.min.js',array('jquery'),IDCOMTOOLSv,true);
//    wp_enqueue_script('popmotion_js');
//    
//    wp_register_script('flubber_js','https://unpkg.com/flubber@0.3.0',array('jquery'),IDCOMTOOLSv,true);
//    wp_enqueue_script('flubber_js');
    
    wp_register_script('inputmask_front_js',$path.'/js/inputmask/jquery.inputmask.bundle.min.js',array('jquery'),IDCOMTOOLSv,true);
    wp_enqueue_script('inputmask_front_js');
    
    wp_register_script('tagsinput_front_js',$path.'/js/tagsinput/jquery.tagsinput.js',array('jquery'),IDCOMTOOLSv,true);
    wp_enqueue_script('tagsinput_front_js');
    
    wp_register_script('select2_front_js','https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js',array('jquery'),IDCOMTOOLSv,true);
    wp_enqueue_script('select2_front_js');
        
    wp_register_script('idcomtools_front_js',$path.'/js/front.js',array('jquery'),IDCOMTOOLSv,true);
    wp_enqueue_script('idcomtools_front_js');
    wp_localize_script('idcomtools_front_js','idcomtboxajax', array('ajax_url' => admin_url('admin-ajax.php')));
    
}

// add_action('wp_enqueue_scripts','idcomtools_front_scripts');

/**
 * Settings page
 */
function idcomtools_admin_page(){
    
    if(!current_user_can('edit_posts')){
        
        wp_die(__('Vous n\'avez pas les permissions nécessaires pour accéder à cette page...','idcomtools'));
        
    }else{
        
        include IDCOMTOOLS_ROOT_PATH.'/inc/admin/models/settings.php';
        
    }
    
}