<?php

/**
 * Inclusion des options par défaut
 */
require BPSN_ROOT_PATH.'/inc/options.php';

/**
 * Options
 */
global $bpsn_opts;

if(!get_option('bozprodsn_options')){
        
    add_option('bozprodsn_options',$bpsn_options,'','yes');
    
    $bpsn_opts = get_option('bozprodsn_options');
    
}else{
        
    $bpsn_opts = get_option('bozprodsn_options');
    
}

/**
 * Scripts css et js en back office
 */
function bpsn_admin_scripts($hook){
    
    $bpsn_pages = array(
        'toplevel_page_bozprod-social-network'
    );
    
    if(in_array($hook,$bpsn_pages)){
        
        wp_enqueue_style('tagsinput_css',BPSN_ROOT_URL.'assets/js/tagsinput/jquery.tagsinput.css',array(),BPSNv,'all');
        wp_enqueue_style('select2_css','https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css',array(),BPSNv,'all');
        wp_enqueue_style('colorpicker_css',BPSN_ROOT_URL.'assets/js/colorpicker/css/colorpicker.css',array(),BPSNv,'all');
        
        wp_register_script('inputmask_js',BPSN_ROOT_URL.'assets/js/inputmask/jquery.inputmask.bundle.min.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('inputmask_js');
        
        wp_register_script('tagsinput_js',BPSN_ROOT_URL.'assets/js/tagsinput/jquery.tagsinput.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('tagsinput_js');
        
        wp_register_script('select2_js','https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('select2_js');
        
        wp_register_script('tinymce_js',BPSN_ROOT_URL.'assets/js/tinymce/tinymce.min.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('tinymce_js');
        
        wp_register_script('colorpicker_js',BPSN_ROOT_URL.'assets/js/colorpicker/js/colorpicker.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('colorpicker_js');
        
        wp_enqueue_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('boz_admin_css',BPSN_ROOT_URL.'assets/css/admin.css',array(),BPSNv,'all');
        
        wp_register_script('boz_admin_js',BPSN_ROOT_URL.'assets/js/admin.js',array('jquery'),BPSNv,true);
        wp_enqueue_script('boz_admin_js');
        
    }
    
}

/**
 * Scripts css et js en front office
 */
function bpsn_front_scripts($hook){
        
    wp_register_style('bpsn_front',BPSN_ROOT_URL.'assets/icons/style.css',array(),BPSNv,'all');
    wp_enqueue_style('bpsn_front',BPSN_ROOT_URL.'assets/icons/style.css');
    
    wp_register_style('bpsn_icons',BPSN_ROOT_URL.'assets/css/bpsn-style.css',array(),BPSNv,'all');
    wp_enqueue_style('bpsn_icons',BPSN_ROOT_URL.'assets/css/bpsn-style.css');
    
}

/**
 * Ajout du lien dans le menu
 */
function bpsn_build_menu(){
    
    $icon = base64_encode('<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 24.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path d="M426.9,7.6c-41.9,0-75.8,33.9-75.8,75.8c0,0.8,0,1.7,0.1,2.5L133.1,204.4c-12.6-9.2-28.1-14.7-44.8-14.7
	c-41.9,0-75.8,33.9-75.8,75.8c0,41.9,33.9,75.8,75.8,75.8c16.3,0,31.4-5.2,43.8-13.9L276,413c-0.5,3.4-0.7,6.8-0.7,10.3
	c0,41.9,33.9,75.8,75.8,75.8c41.9,0,75.8-33.9,75.8-75.8c0-41.9-33.9-75.8-75.8-75.8c-14.7,0-28.3,4.2-39.9,11.4l-147.3-87.6
	c0.1-1.9,0.2-3.8,0.2-5.7c0-1.5-0.1-2.9-0.1-4.4l216.6-117.8c12.8,9.9,28.9,15.8,46.3,15.8c41.9,0,75.8-33.9,75.8-75.8
	C502.7,41.5,468.8,7.6,426.9,7.6z"/>
</svg>');
    
    add_menu_page(__('Social','bpsocial'), __('Social','bpsocial'),'edit_posts','bozprod-social-network','bpsn_home','data:image/svg+xml;base64,'.$icon, 2);
    
}

/**
 * Page des réglages de l'extension
 */
function bpsn_home(){
    
    if(!current_user_can('edit_posts')){
        
        wp_die(__('Vous n\'avez pas les permissions nécessaires pour accéder à cette page...','bpsocial'));
        
    }else{
        
        include BPSN_ROOT_PATH.'/inc/settings.php';
        
    }
    
}

/**
 * Sauvegarde des options
 */
function bpsn_save_options(){
    
    global $bpsn_opts;
    
    $facebook                       = isset($_POST['facebook']) ? sanitize_text_field($_POST['facebook']) : 'false';
    $twitter                        = isset($_POST['twitter']) ? sanitize_text_field($_POST['twitter']) : 'false';
    $linkedin                       = isset($_POST['linkedin']) ? sanitize_text_field($_POST['linkedin']) : 'false';
    $tumblr                         = isset($_POST['tumblr']) ? sanitize_text_field($_POST['tumblr']) : 'false';
    $pinterest                      = isset($_POST['pinterest']) ? sanitize_text_field($_POST['pinterest']) : 'false';
    $instagram                      = isset($_POST['instagram']) ? sanitize_text_field($_POST['instagram']) : 'false';
    $youtube                        = isset($_POST['youtube']) ? sanitize_text_field($_POST['youtube']) : 'false';
    $vimeo                          = isset($_POST['vimeo']) ? sanitize_text_field($_POST['vimeo']) : 'false';
    $rss                            = isset($_POST['rss']) ? sanitize_text_field($_POST['rss']) : 'false';
    $btn_facebook                   = isset($_POST['btn_facebook']) ? sanitize_text_field($_POST['btn_facebook']) : 'false';
    $btn_twitter                    = isset($_POST['btn_twitter']) ? sanitize_text_field($_POST['btn_twitter']) : 'false';
    $btn_linkedin                   = isset($_POST['btn_linkedin']) ? sanitize_text_field($_POST['btn_linkedin']) : 'false';
    $btn_tumblr                     = isset($_POST['btn_tumblr']) ? sanitize_text_field($_POST['btn_tumblr']) : 'false';
    $btn_pinterest                  = isset($_POST['btn_pinterest']) ? sanitize_text_field($_POST['btn_pinterest']) : 'false';
    $btn_mail                       = isset($_POST['btn_mail']) ? sanitize_text_field($_POST['btn_mail']) : 'false';
    
    $opts = array(
        'facebook'                      => $facebook,
        'twitter'                       => $twitter,
        'linkedin'                      => $linkedin,
        'tumblr'                        => $tumblr,
        'pinterest'                     => $pinterest,
        'instagram'                     => $instagram,
        'youtube'                       => $youtube,
        'vimeo'                         => $vimeo,
        'rss'                           => $rss,
        'btn-facebook'                  => $btn_facebook,
        'btn-twitter'                   => $btn_twitter,
        'btn-linkedin'                  => $btn_linkedin,
        'btn-tumblr'                    => $btn_tumblr,
        'btn-pinterest'                 => $btn_pinterest,
        'btn-mail'                      => $btn_mail
    );
    
    $bpsn_opts = $opts;
    
    update_option('bozprodsn_options',$bpsn_opts,'','yes');
    
    echo 'ok';
    
    wp_die();
    
}

add_action('wp_ajax_bpsn_save_options','bpsn_save_options');

/**
 * Inclusion des liens vers les réseaux sociaux
 */
function bpsn_insert_social_links($atts = [], $content = null, $tag = ''){
    
    global $bpsn_opts;
    
    if(!empty($atts)){ extract($atts); }
    
    $arr = array(
        'facebook',
        'twitter',
        'linkedin',
        'tumblr',
        'pinterest',
        'instagram',
        'youtube',
        'vimeo',
        'rss'
    );
    
    $links = '';
    
    for($i=0; $i<count($arr); $i++){
        
        $link = $bpsn_opts[$arr[$i]] != '' ? '<a href="'.$bpsn_opts[$arr[$i]].'" class="bpsn-link '.$arr[$i].'" target="_blank" rel="noopener"><i class="icon-'.$arr[$i].'"></i></a>' : '';
        
        $links .= $link;
        
    }
    
    if(!empty($atts)){ $class = $atts['class'] != '' ? $atts['class'] : ''; }else{ $class = ''; }
    
    $links = '<div id="bpsn-social-links"><p class="'.$class.'">'.$links.'</p></div>';
    
    ob_start();
    echo $links;
    return ob_get_clean();
    
}

add_shortcode('the_social_links', 'bpsn_insert_social_links');

/**
 * Inclusion des liens vers les réseaux sociaux
 */
function bpsn_insert_social_share_buttons($atts){
    
    global $wp;
    
    global $bpsn_opts;
    
    extract($atts);
    
    $url    = urlencode(get_the_permalink());
    $title  = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
    $media  = urlencode(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    
    $arr = array(
        'btn-facebook'                  => '<a href="https://www.facebook.com/sharer/sharer.php?u='.$url.'" class="bpsn-link facebook" target="_blank" rel="noopener"><i class="icon-facebook"></i></a>',
        'btn-twitter'                   => '<a href="https://twitter.com/intent/tweet?text='.$title.'&amp;url='.$url.'&amp;via='.get_bloginfo('name').'" class="bpsn-link twitter" target="_blank" rel="noopener"><i class="icon-twitter"></i></a>',
        'btn-linkedin'                  => '<a href="https://www.linkedin.com/shareArticle/?mini=true&url='.$url.'" class="bpsn-link linkedin" target="_blank" rel="noopener"><i class="icon-linkedin"></i></a>',
        'btn-tumblr'                    => '<a href="https://www.tumblr.com/share/link?url='.$url.'" class="bpsn-link tumblr" target="_blank" rel="noopener"><i class="icon-tumblr"></i></a>',
        'btn-pinterest'                 => '<a href="https://pinterest.com/pin/create/button/?url='.$url.'&amp;media='.$media.'&amp;description='.$title.'" class="bpsn-link pinterest" target="_blank" rel="noopener"><i class="icon-pinterest"></i></a>',
        'btn-mail'                      => '<a href="mailto:?subject='.__('Je partage :','bpsocial').' '.$title.'&body='.__('Hello, ce lien pourrait t\'intéresser :','bpsocial').' '.$url.'" class="bpsn-link mail" target="_blank" rel="noopener"><i class="icon-mail"></i></a>'
    );
    
    $links = '';
    
    foreach($arr as $k => $v){
        
        if($bpsn_opts[$k] == 'true'){
            
            $links .= $v;
            
        }
        
    }
    
    $heading = $atts['title'] != '' ? '<p class="heading"><i class="icon-share"></i> '.$atts['title'].'</p>' : '';
    
    $links = '<div id="bpsn-social-share-buttons">'.$heading.'<p>'.$links.'</p></div>';
    
    ob_start();
    echo $links;
    return ob_get_clean();
    
}

add_shortcode('the_social_share_btn', 'bpsn_insert_social_share_buttons');