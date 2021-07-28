<?php

add_filter('show_admin_bar', '__return_false');

/**********************************************
 * Gutenberg
 */

include dirname(__FILE__).'/gutenberg.php';

/**
 * Collecte des données globales du site
 */
global $site_data;

function idcom_get_global_site_data(){
    
    global $wp;
    
    $data = array(
        /* Données fixes */
        'proprietaire'              => get_option('proprietaire'),
        'siret'                     => get_option('siret'),
        'responsable'               => get_option('nom_prenom_responsable_publi'),
        'email_responsable'         => get_option('email'),
        'adresse'                   => get_option('adresse'),
        'codepostal'                => get_option('cp'),
        'ville'                     => get_option('ville'),
        'tel'                       => get_option('tel'),
        'email'                     => get_option('email'),
        'mobile'                    => get_option('mobile'),
        /* Données variables */
        'barba'                     => get_field('barba', 'option'),
        'preloader_display'         => get_field('preloader_display', 'option'),
        'barba_preloader'           => get_field('barba_preloader', 'option'),
        'barba_img_in'              => get_field('barba_img_in', 'option'),
        'barba_img_out'             => get_field('barba_img_out', 'option'),
        'barba_transition_type'     => get_field('barba_transition_type', 'option'),
        'barba_transition_duration' => get_field('barba_transition_duration', 'option'),
        'barba_transition_interval' => get_field('barba_transition_interval', 'option'),
        'birth'                     => get_field('birth', 'option'),
        'copyright'                 => get_field('copyright', 'option'),
        'gtag'                      => get_field('gtag', 'option'),
        'gsc'                       => get_field('gsc', 'option'),
        'facebook'                  => get_field('facebook', 'option'),
        'instagram'                 => get_field('instagram', 'option'),
        'twitter'                   => get_field('twitter', 'option'),
        'pinterest'                 => get_field('pinterest', 'option'),
        'tumblr'                    => get_field('tumblr', 'option'),
        'rss'                       => get_field('rss', 'option'),
        'posts_list'                => get_field('posts_list', 'option'),
        'post_btn_label'            => get_field('post_btn_label', 'option'),
        'share_buttons'             => get_field('share_buttons', 'option'),
        'blog_default_img'          => get_field('blog_default_img', 'option'),
        'blog_presubtitle'          => get_field('blog_presubtitle', 'option'),
        'blog_subtitle'             => get_field('blog_subtitle', 'option'),
        'blog_citation_active'      => get_field('blog_citation_active', 'option'),
        'blog_ad_active'            => get_field('blog_ad_active', 'option'),
        'blog_citation'             => get_field('blog_citation', 'option'),
        'blog_citation_author'      => get_field('blog_citation_author', 'option'),
        'blog_citation_img'         => get_field('blog_citation_img', 'option'),
        'blog_ad_link'              => get_field('blog_ad_link', 'option'),
        'blog_ad_label'             => get_field('blog_ad_label', 'option'),
        'blog_ad_anchor'            => get_field('blog_ad_anchor', 'option'),
        'blog_ad_target'            => get_field('blog_ad_target', 'option'),
        'blog_ad_img'               => get_field('blog_ad_img', 'option'),
        'posts_thumb_ratio'         => get_field('posts_thumb_ratio', 'option'),
        /* Boutique */
        'shop_active'               => get_field('shop_active', 'option'),
        'shop_catalog'              => get_field('shop_catalog', 'option'),
        'shop_cart_preview'         => get_field('shop_cart_preview', 'option'),
        'products_per_page'         => get_field('products_per_page', 'option'),
        'products_columns'          => get_field('products_columns', 'option'),
        'new_product_label'         => get_field('new_product_label', 'option'),
        'new_product_delay'         => get_field('new_product_delay', 'option'),
        'onsale_label'              => get_field('onsale_label', 'option'),
        'product_thumb_ratio'       => get_field('product_thumb_ratio', 'option'),
        'single_product_thumb_ratio'=> get_field('single_product_thumb_ratio', 'option'),
        'shop_title'                => get_field('shop_title', 'option'),
        'shop_default_img'          => get_field('shop_default_img', 'option'),
        'shop_presubtitle'          => get_field('shop_presubtitle', 'option'),
        'shop_subtitle'             => get_field('shop_subtitle', 'option'),
        'shop_citation_active'      => get_field('shop_citation_active', 'option'),
        'shop_ad_active'            => get_field('shop_ad_active', 'option'),
        'shop_citation'             => get_field('shop_citation', 'option'),
        'shop_citation'             => get_field('shop_citation', 'option'),
        'shop_citation_author'      => get_field('shop_citation_author', 'option'),
        'shop_citation_img'         => get_field('shop_citation_img', 'option'),
        'shop_ad_link'              => get_field('shop_ad_link', 'option'),
        'shop_ad_label'             => get_field('shop_ad_label', 'option'),
        'shop_ad_anchor'            => get_field('shop_ad_anchor', 'option'),
        'shop_ad_target'            => get_field('shop_ad_target', 'option'),
        'shop_ad_img'               => get_field('shop_ad_img', 'option'),
        'product_img_right'         => get_field('product_img_right', 'option'),
        'related_products'          => get_field('related_products', 'option'),
    );
    
    if(have_rows('data', 'option')){
        
        while(have_rows('data', 'option')){
            
            the_row();
            
            array_push($data['data'], array());
            
        }
        
    }
    
    return $data;
        
}

$site_data = idcom_get_global_site_data();

/**
 * Prise en charge du téléversement de fichiers au format .svg
 */
function wpc_mime_types($mimes) {
    
    $mimes['svg'] = 'image/svg+xml';
    
    return $mimes;
    
}

add_filter('upload_mimes', 'wpc_mime_types');

/**
 * Page d'options pour la gestion des données globales du site (Header, Footer, etc.)
 */
if(function_exists('acf_add_options_page')){
    
    acf_add_options_page(array(
        'page_title' 	=> __('Options générales','idcomcrea'),
        'menu_title'	=> __('Options générales','idcomcrea'),
        'menu_slug' 	=> 'idcomcrea-global-site-settings',
        'capability'	=> 'edit_posts',
        'redirect'	=> false
    ));
    
}

/**
 * Fil d'ariane
 */
function the_breadcrumb(){

    $sep = '<i class="fa fa-chevron-right"></i>';

    if(!is_front_page()){
	
        echo '<div class="breadcrumbs animated fadeInDown faster">';
        
        // echo '<a href="'.get_option('home').'"><i class="fa fa-home"></i></a>'.$sep;
        
        echo '<a href="'.get_option('home').'">'.__('Accueil','idcomcrea').'</a>'.$sep;
	        
        if(is_404()){
            
            echo esc_html('Erreur 404','idcomcrea');
            
        }else if(is_search()){
            
            echo esc_html('Recherche :','idcomcrea').' "<strong>'.get_search_query(true).'</strong>"';
            
        }else if(is_category()){
            
            $cat = get_queried_object();
                                                            
            if($cat->category_parent > 0){
                
                $last_title = idcom_truncate_middle_string(single_cat_title('',false),36);
                
                echo '<a href="'.get_category_link($cat->category_parent).'" title="'.get_cat_name($cat->category_parent).'">'.get_cat_name($cat->category_parent).'</a>'.$sep.$last_title;
                                
            }else{
                
                single_cat_title();
                
            }
            
        }else if(is_singular() && !is_page()){
                        
            echo ucfirst(str_replace(array('post','Multiproduits','Produit unique'),array('','',''),get_post_type()));
            
        }else if(is_archive()){
            
            if(is_day()){
                
                printf(__('%s', 'idcomtheme'), get_the_date());
                
            }else if(is_month()){
                
                printf(__('%s', 'idcomtheme'), get_the_date(_x('F Y', 'format de date des archives mensuelles', 'idcomtheme')));
                
            }else if(is_year()){
                
                printf(__('%s', 'idcomtheme'), get_the_date(_x('Y', 'format de date des archives annuelles', 'idcomtheme')));
                
            }else{
                
                // _e('Archives', 'idcomtheme');
                // _e('Nos réalisations', 'idcomtheme');
                
            }
            
        }
        
        if(is_tag()){
            
            echo single_tag_title();
            
        }
	
        if(is_single()){
            
            $post_id = get_the_ID();
            
            $post_categories = wp_get_post_categories($post_id);
                        
            if(count($post_categories) > 0){
                                
                $cat = get_category($post_categories[0]);
                
                if($cat->category_parent > 0){
                    
                    echo '<a href="'.get_category_link($cat->category_parent).'" title="'.get_cat_name($cat->category_parent).'">'.get_cat_name($cat->category_parent).'</a>'.$sep.'<a href="'.get_category_link($post_categories[0]).'" title="'.$cat->name.'">'.$cat->name.'</a>';
                    
                }else{
                    
                    echo '<a href="'.get_category_link($post_categories[0]).'" title="'.$cat->name.'">'.$cat->name.'</a>';
                    
                }
            
            }
            
            echo $sep;
            
            the_title();
            
        }
	
        if(is_page()){
            
            $parent = wp_get_post_parent_id(get_the_ID());
            
            if($parent > 0){
                
                echo '<a href="'.get_the_permalink($parent).'">'.get_the_title($parent).'</a>';
                
                echo $sep;
                
                echo the_title();
                
            }else {
                
                echo the_title();
                
            }
                        
        }
	
        if(is_home()){
            
            global $post;
            
            $page_for_posts_id = get_option('page_for_posts');
            
            if($page_for_posts_id){ 
                
                $post = get_page($page_for_posts_id);
                
                setup_postdata($post);
                
                the_title();
                
                rewind_posts();
                
            }
            
        }

        echo '</div>';
        
    }
    
}

/**
 * Couper une chaîne de caractères en son milieu
 */
function idcom_truncate_middle_string($str,$len){
    
    if(strlen($str) > $len){
        
        $cut = (strlen($str)-$len)+3;
        
        $string = substr_replace($str, '...', round((strlen($str)-$cut)/2), strlen($str)-$len);
        
    }else{
        
        $string = $str;
        
    }
    
    return $string;
    
}

/**
 * Header menu
 */
function idcomtheme_header_menu($id){
    
    if(is_numeric($id)){
        
        wp_nav_menu(array(
            'theme_location'  => 'header-menu',
            'menu'            => $id,
            'container'       => 'div',
            'container_id'    => 'header-menu-'.$id,
            'container_class' => 'header-menu',
            'menu_id'         => false,
            'menu_class'      => 'd-flex align-content-center flex-wrap align-items-center',
            'depth'           => 3,
            'fallback_cb'     => '',
            'walker'          => '',
            'items_wrap'      => '<a href="javascript:void(0);" id="hamburger"><i class="fas fa-bars"></i></a><ul id="%1$s" class="%2$s">%3$s<button type="button" id="close-menu"><i class="fa fa-times"></i></button></ul>',
        ));
        
    }
            
}

/**
 * Footer menu
 */
function idcomtheme_footer_menu($id){
    
    if(is_numeric($id)){
        
        wp_nav_menu(array(
            'theme_location'  => 'footer-menu',
            'menu'            => $id,
            'container'       => 'div',
            'container_id'    => 'footer-menu',
            'container_class' => 'bottom-menu',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav mr-auto',
            'depth'           => 1,
            'fallback_cb'     => 'bs4navwalker::fallback',
            'walker'          => new bs4navwalker()
        ));
        
    }
            
}

/**
 * Copyright
 */
function idcom_copyright(){
    
    global $site_data;    
    
    $copyright_year     = $site_data['birth'];
    
    $copyright_format   = $site_data['copyright'];
    
    $copyright_base     = '© ';
    
    $copyright          = $copyright_format && intval($copyright_year) < date('Y') ? $copyright_base.$copyright_year.'-'.date('Y') : $copyright_base.$copyright_year;
    
    echo $copyright;
    
}

/**
 * Nettoyer le titre du template Archive.php
 */
add_filter('get_the_archive_title', function($title){    
    if(is_category()){    
        $title = single_cat_title('', false);    
    }elseif (is_tag()){    
        $title = single_tag_title('', false);    
    }elseif (is_author()){    
        $title = '<span class="vcard">'. get_the_author().'</span>';    
    }elseif (is_tax()){
        $title = sprintf(__( '%1$s'), single_term_title('', false));
    }elseif(is_post_type_archive()){
        $title = post_type_archive_title('', false);
    }
    return $title;
});

/**
 * Compteur de vues pour les articles
 */
function idcom_get_post_view(){
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    return $count;
}

function idcom_set_post_view(){
    $key        = 'post_views_count';
    $post_id    = get_the_ID();
    $count      = (int) get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

function idcom_posts_column_views($columns){
    $columns['post_views'] = __('Vues','idcomcrea');
    return $columns;
}

function idcom_posts_custom_column_views($column){
    if($column === 'post_views'){
        echo idcom_get_post_view();
    }
}

add_filter('manage_posts_columns', 'idcom_posts_column_views');

add_action('manage_posts_custom_column', 'idcom_posts_custom_column_views');

function idcom_count_views(){
    
    global $wp;
    
    if(is_page()){ idcom_set_post_view(); }
    
    if(is_single()){ idcom_set_post_view(); }
    
    if(class_exists('WooCommerce')){ if(is_product()){ idcom_set_post_view(); } }
    
}

/**
 * Supprimer les dimensions par défaut des thumbnails (liste des articles)
 */
function remove_thumbnail_dimensions($html, $post_id, $post_image_id){
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);

/**
 * Enregistrer un custom post type
 */
function idcom_post_type(){
    
    /*
    register_post_type('realisations',
        array(
            'labels'            => array(
                'name'          => __('Réalisations'),
                'singular_name' => __('Réalisation')
            ),
        'public'        => true,
        'has_archive'   => true,
        )
    );
     * 
     */
    
}

add_action('init', 'idcom_post_type');

/**
 * Ajouter les custom post types au flux RSS
 */
add_filter('request', 'idcom_myfeed_request');

function idcom_myfeed_request($qv){

    if(isset($qv['feed']) && !isset($qv['post_type'])){

        // $qv['post_type'] = array('post','produits');

    }

    return $qv;

}

/**
 * Purge automatique du cache d'Autoptimize
 */
if(class_exists('autoptimizeCache')){
    $myMaxSize = 256000;
    $statArr=autoptimizeCache::stats(); 
    $cacheSize=round($statArr[1]/1024);
    if ($cacheSize>$myMaxSize){
       autoptimizeCache::clearall();
       header("Refresh:0");
    }
}

/**
 * Formatage personnalisé d'extrait
 */
function idcom_post_excerpt($text, $content_length = 55, $remove_breaks = false){
    if ( '' != $text ) {
        $text = strip_shortcodes( $text );
        $text = excerpt_remove_blocks( $text );
        $text = apply_filters( 'the_content', $text );
        $text = str_replace(']]>', ']]&gt;', $text);
        $num_words = $content_length;
        $more = $excerpt_more ? $excerpt_more : null;
        if ( null === $more ) {
            $more = __( '&hellip;' );
        }
        $original_text = $text;
        $text = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $text );
        $text = strip_tags($text, '<p>,<strong>');
        if ( $remove_breaks )
            $text = preg_replace('/[\r\n\t ]+/', ' ', $text);
        $text = trim( $text );
        if ( strpos( _x( 'words', 'Word count type. Do not translate!' ), 'characters' ) === 0 && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
            $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
            preg_match_all( '/./u', $text, $words_array );
            $words_array = array_slice( $words_array[0], 0, $num_words + 1 );
            $sep = '';
        } else {
            $words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
            $sep = ' ';
        }
        if ( count( $words_array ) > $num_words ) {
            array_pop( $words_array );
            $text = implode( $sep, $words_array );
            $text = $text . $more;
        } else {
            $text = implode( $sep, $words_array );
        }
    }
    return $text;
}

/**
 * Générer un ID unique
 */
function idcom_unique_id(){
    
    $id = md5(uniqid(rand(), true));
    
    return $id;
    
}

/**
 * Déplacer la metabox YOAST SEO au bas de la page
 */
function wpcover_move_yoast(){
    return 'low';
}
add_filter('wpseo_metabox_prio', 'wpcover_move_yoast');

/**
 * Renseigner la description SEO automatiquement dans YOAST SEO (exemple pour les produits, à partir d'un champ ACF)
 */
function add_yoast_description($post_id){
    
    /*
    global $wp;
    
    global $woocommerce;
    
    if(get_post_type($post_id) == 'product'){
        
        $mask       = get_field('seo_description', 'option');
        
        $product    = get_the_title($post_id);
                
        $categories = wp_get_post_terms($post_id, 'product_cat', array('fields' => 'names'));
        
        $cats       = implode(', ',$categories);
        
        $meta_desc  = str_replace(array('PRODUCT','PCATS'),array($product,$cats),$mask);
        
        $_POST[ "yoast_wpseo_metadesc" ] = $meta_desc;
        
    }
     * 
     */
        
}

add_action('save_post', 'add_yoast_description');

/**
 * Get full url of current page
 */
function idcom_get_url(){
    
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';
    
    $url      = $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    
    return $url;
    
}

/**
 * get uri of current page
 */
function idcom_get_uri(){
    
    $url = idcom_get_url();
    
    $uri = str_replace(site_url(), '', $url);
    
    return $uri;
    
}

/**
 * Formatage de l'extrait
 */
function idcom_get_excerpt($len, $id = ''){
    
    if($id != ''){
        
        $excerpt = get_the_excerpt($id);
    
        $excerpt = $excerpt != '' ? $excerpt : get_the_content('','',$id);
        
    }else{
        
        $excerpt = get_the_excerpt();
    
        $excerpt = $excerpt != '' ? $excerpt : get_the_content();
        
    }
            
    // $excerpt = preg_replace(" ([.*?])",'',$excerpt);
    
    $excerpt = strip_shortcodes($excerpt);
    
    $excerpt = strip_tags($excerpt);
    
    if(strlen($excerpt) > $len){
        
        $excerpt = substr($excerpt, 0, $len);
    
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));

        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

        $excerpt = $excerpt.' [...]';
        
    }
    
    return $excerpt;
    
}

/**
 * Création du slug de la page courante (URI) pour attribution dans le div "container" (Barba)
 */
function idcom_create_current_slug(){
    
    global $post;
    
    $slug = $post->post_name;
    
    // $slug = sanitize_text_field(idcom_get_uri());
    
    return $slug;
    
}

/**
 * Insertion du logo dans le lien du milieu, dans le menu principal
 */
function idcom_insert_logo_in_main_menu($items, $args){
    
    global $site_data;
    
    foreach($items as $k => $object){
        
        if(191 == $object->ID){
            
            $object->title = return_the_header_logo().'<span>'.esc_html($site_data['logo_subtitle']).'</span>';
                        
        }
        
    }
    
    return $items;
    
}

add_filter('wp_nav_menu_objects', 'idcom_insert_logo_in_main_menu', 10, 2);

/**
 * Affichage/masquage de l'aperçu du panier
 */
function idcom_preview_cart_is_active(){
    
    global $site_data;
    
    if(!$site_data['shop_active']){
        
        return false;
        
    }else{
        
        $check  = 0;
    
        $check  = $site_data['shop_catalog'] ? 1 : 0;
        
        if(!$site_data['shop_cart_preview']){ $check += 1; }
        
        if($check > 0){
            
            return false;
            
        }else{
            
            return true;
            
        }
        
    }
        
}

/**
 * Inclusion des fichiers Woocommerce
 */
if(class_exists('WooCommerce')){

    /**********************************************
     * 
     * Inclusion du fichier de gestion Woocommerce
     * 
     */
    include dirname( __FILE__ ).'/woo_custom.php';

    /**********************************************
     * 
     * Inclusion du fichier de gestion de l'aperçu du panier Woocommerce
     * 
     */
    include dirname( __FILE__ ).'/woo_cart_preview.php';

}