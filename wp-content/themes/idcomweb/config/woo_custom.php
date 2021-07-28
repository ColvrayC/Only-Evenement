<?php

global $site_data;

/**
 * 
 */
function idcom_add_specific_menu_location_atts($atts, $item, $args){

    // if($args->theme_location == 'primary' OR $args->theme_location == 'secondary'){
    if($args->theme_location == 'header-menu'){
        
        $menu_items = array(139);
        
        if(in_array($item->ID, $menu_items)){
            
            $atts['data-barba-prevent'] = 'self';
            
        }
        
    }
    
    return $atts;
    
}

add_filter('nav_menu_link_attributes', 'idcom_add_specific_menu_location_atts', 10, 3);

/**
 * Add sidebar support
 */
function idcom_widgets_init(){
    
    register_sidebar(array(
        'name'          => __('Filtre par prix', 'idcomcrea'),
        'id'            => 'prices-filter',
        'description'   => __('Ajouter le filtre de prix Woocommerce ici.', 'idcomcrea'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title h5">',
        'after_title'   => '</h2>',
    ));
    
}

add_action('widgets_init', 'idcom_widgets_init');

/******************************************************************************************************************************************************************
 *
 *  Shop ACF options page
 *
 */

if(function_exists('acf_add_options_page')){
    
    acf_add_options_page(array(
        'page_title' 	=> __('Options boutique','idcomcrea'),
        'menu_title'	=> __('Options boutique','idcomcrea'),
        'menu_slug' 	=> 'idcomcrea-shop-settings',
        'capability'	=> 'edit_posts',
        'redirect'	=> false
    ));
    
}

/**
 * Nombre de produits par page
 */
function idcom_woo_loop_shop_per_page($cols){
    
    global $site_data;
    
    $cols = $site_data['products_per_page'];

    return $cols;
  
}

add_filter('loop_shop_per_page', 'idcom_woo_loop_shop_per_page', 20);

/**
 * Nombre de colonnes de produits
 */
if(!function_exists('loop_columns')){
    
    function loop_columns(){
        
        global $site_data;

        return $site_data['products_columns'];

    }
    
}

add_filter('loop_shop_columns', 'loop_columns', 999);

/**
 * Personnalisation du fil d'ariane
 */
function idcom_woocommerce_breadcrumbs(){
    
    return array(
        'delimiter'   => '<i class="fas fa-chevron-right"></i>',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => __('Accueil','idcomcrea')
        // 'home'        => '<i class="fa fa-home"></i>'// _x('<i class="fa fa-home"></i>', 'breadcrumb', 'woocommerce'),
    );
    
}

add_filter('woocommerce_breadcrumb_defaults', 'idcom_woocommerce_breadcrumbs');

/******************************************************************************************************************************************************************
 *
 *  Woocommerce open wrapper
 *
 */

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);

/**
 * Ouverture du wrapper
 */
function idcom_woo_output_content_wrapper(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    $cat            = get_queried_object();
    
    $_woo           = !is_product_category() && !is_product() && $cat->parent == 0 ? 'home' : 'archive';
    
    global $g_header_img;
        
    global $g_custom_title;

    global $g_presubtitle;

    global $g_subtitle;
    
    global $g_shop_desc;
    
    global $g_citation;

    global $g_author;

    global $g_citation_bg;

    global $g_ad_link;

    global $g_ad_label;

    global $g_ad_anchor;

    global $g_ad_target;

    global $g_ad_img;
        
    /**
     * Default data
     */
    $g_header_img     = $site_data['shop_default_img'];
        
    $g_custom_title   = $site_data['shop_title'];
    
    $g_presubtitle    = $site_data['shop_presubtitle'];

    $g_subtitle       = $site_data['shop_subtitle'];
        
    $g_citation       = $site_data['shop_citation'];

    $g_author         = $site_data['shop_citation_author'];

    $g_citation_bg    = $site_data['shop_citation_img'];

    $g_ad_link        = $site_data['shop_ad_link'];

    $g_ad_label       = $site_data['shop_ad_label'];

    $g_ad_anchor      = $site_data['shop_ad_anchor'];

    $g_ad_target      = $site_data['shop_ad_target'];

    $g_ad_img         = $site_data['shop_ad_img'];

    /**
     * Shop data
     */
    if(is_product_category()){
        
        $term           = get_queried_object();
                
        $header_img     = get_field('img', $term->taxonomy.'_'.$term->term_id);
    
        $custom_title   = get_field('title', $term->taxonomy.'_'.$term->term_id);
        
        $custom_title   = $custom_title != '' ? $custom_title : $term->name;

        $presubtitle    = get_field('presubtitle', $term->taxonomy.'_'.$term->term_id);

        $subtitle       = get_field('subtitle', $term->taxonomy.'_'.$term->term_id);
        
        $citation       = esc_html(get_field('citation', $term->taxonomy.'_'.$term->term_id));

        $author         = esc_html(get_field('citation_author', $term->taxonomy.'_'.$term->term_id));

        $citation_bg    = get_field('citation_img', $term->taxonomy.'_'.$term->term_id);
        
        $ad_link        = esc_url(get_field('ad_link', $term->taxonomy.'_'.$term->term_id));

        $ad_label       = esc_html(get_field('ad_label', $term->taxonomy.'_'.$term->term_id));

        $ad_anchor      = esc_html(get_field('ad_anchor', $term->taxonomy.'_'.$term->term_id));

        $ad_target      = get_field('ad_target', $term->taxonomy.'_'.$term->term_id);

        $ad_img         = get_field('ad_img', $term->taxonomy.'_'.$term->term_id);
        
    }else if(is_product()){
        
        global $product;
                
        $header_img     = get_field('img');
            
        $custom_title   = get_field('title');

        $presubtitle    = get_field('presubtitle');

        $subtitle       = get_field('subtitle');
        
        $citation       = esc_html(get_field('citation'));

        $author         = esc_html(get_field('citation_author'));

        $citation_bg    = get_field('citation_img');
        
        $ad_link        = esc_url(get_field('ad_link'));

        $ad_label       = esc_html(get_field('ad_label'));

        $ad_anchor      = esc_html(get_field('ad_anchor'));

        $ad_target      = get_field('ad_target');

        $ad_img         = get_field('ad_img');
        
    }
    
    if($_woo == 'home'){
        
        $bg         = esc_url($g_header_img['url']);
    
        $bg_alt     = esc_html($g_header_img['alt']);
                
    }else{
        
        $bg         = is_array($header_img) && count($header_img) > 2 ? esc_url($header_img['url']) : esc_url($g_header_img['url']);
    
        $bg_alt     = is_array($header_img) && count($header_img) > 2 ? esc_html($header_img['alt']) : esc_html($g_header_img['alt']);

        $g_custom_title   = $custom_title != '' ? $custom_title : $g_custom_title;

        $g_presubtitle    = $presubtitle != '' ? $presubtitle : $g_presubtitle;

        $g_subtitle       = $subtitle != '' ? $subtitle : $g_subtitle;
        
    }
    
    if(is_product_tag()){
        
        $g_custom_title   = __('Mot-clé :','idcomcrea').' '.get_query_var('term');
        
        $g_presubtitle    = __('Résultats','idcomcrea');
        
        $g_subtitle       = __('Produits avec le mot-clé ').' « '.get_query_var('term').' »';
        
    }
    
?>
<!-- Titlebar -->
<section id="archive-main-title" class="section firsttitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container ohidden ph108">
        <img src="<?php echo $bg; ?>" alt="<?php echo $bg_alt; ?>" class="imgcrop"/>
        <div class="row">
            <div class="col-12">
                <div class="title cd-bg ph24 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <h1 class="fakeh5 text-center"><?php echo esc_html($g_custom_title); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg ef-bg ph108">
        <?php woocommerce_breadcrumb(); ?>
    </div>
</section>
<section id="archive-subtitle" class="section archive-subtitle ph48 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="subtitle">
                    <span class="text-center"><?php echo esc_html($g_presubtitle); ?></span>
                    <h2 class="fakeh5 text-center"><?php echo esc_html($g_subtitle); ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop -->
<section id="idcom-woo" class="woocommerce section ph32 <?php echo $_woo; ?> wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
<?php
    
}

add_action('woocommerce_before_main_content', 'idcom_woo_output_content_wrapper', 10);

/******************************************************************************************************************************************************************
 *
 *  Shop listing
 *
 */

add_filter('woocommerce_show_page_title', '__return_null');

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

remove_action('woocommerce_before_shop_loop' , 'woocommerce_result_count', 20);

remove_action('woocommerce_after_shop_loop' , 'woocommerce_result_count', 20);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

/*

add_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

add_action('woocommerce_before_shop_loop', 'wc_print_notices', 10);
add_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10); 
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10); 
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

*/

function idcom_hide_sale_flash(){ return false; }

add_filter('woocommerce_sale_flash', 'idcom_hide_sale_flash');

/**
 * Personnalisation de la miniature produit
 */
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

function idcom_woo_template_loop_product_thumbnail(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    global $product;
    
    /**
     * Thumbs ratio
     */
    $thumb_ratios = array(
        '2:4 (portrait)'    => 'po24r',
        '2:3 (portrait)'    => 'po23r',
        '1:1 (carré)'       => 'square',
        '4:3 (paysage)'     => 'pa43r',
        '3:2 (paysage)'     => 'pa32r',
        '16:9 (paysage)'    => 'pa169r',
        '4:2 (paysage)'     => 'pa42r'
    );
    
    $thumb_class    = $thumb_ratios[$site_data['product_thumb_ratio']];
        
    $delay          = idcom_get_published_days($product);
            
    $thumb          = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'medium_large');
    
    $onsale         = $product->is_on_sale() ? ($delay < $site_data['new_product_delay'] ? '<span class="onsale-product moved">'.$site_data['onsale_label'].'</span>' : '<span class="onsale-product">'.$site_data['onsale_label'].'</span>') : '';
        
    if($onsale != ''){
        
        $title_class = ' moved';
        
    }else if($delay < $site_data['new_product_delay']){
        
        $title_class = ' moved';
        
    }else{
        
        $title_class = '';
        
    }

?>
<div class="product-thumb <?php echo $thumb_class; ?>">
    <img src="<?php echo esc_url($thumb[0]); ?>" alt="<?php echo $product->get_name(); ?>" title="<?php echo $product->get_name().' - '.get_bloginfo(); ?>" class="imgcrop"/>
</div>
<?php echo $onsale; ?>
<?php if($delay < $site_data['new_product_delay']) : ?>
<span class="new-product<?php if($onsale != ''){ echo ' moved'; } ?>"><?php echo esc_html($site_data['new_product_label']); ?></span>
<?php endif; ?>
<div class="product-title<?php echo $title_class; ?>">
    <h2 class="fakeh6"><?php echo $product->get_name(); ?></h2>
</div>
<div class="product-excerpt">
    <p class="text-center"><?php echo idcom_get_woo_excerpt(160); ?></p>
</div>
<?php
    
}

add_action('woocommerce_before_shop_loop_item_title', 'idcom_woo_template_loop_product_thumbnail', 10);

if($site_data['shop_catalog']){
    
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    
    function idcom_woo_template_loop_product_catalog_link(){
        
        global $woocommerce;
        
        global $product;
        
?>
<a href="<?php echo get_permalink($product->get_id()); ?>" class="button product_type_simple add_to_cart_button ajax_add_to_cart"><?php echo esc_html('Voir le produit','idcomcrea'); ?></a>
<?php
        
    }
    
    add_action('woocommerce_after_shop_loop_item', 'idcom_woo_template_loop_product_catalog_link', 10);
    
}

/******************************************************************************************************************************************************************
 *
 *  Woocommerce close wrapper
 *
 */

remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function idcom_woo_output_content_wrapper_end(){
    
    global $site_data;
    
    global $g_citation;

    global $g_author;

    global $g_citation_bg;

    global $g_ad_link;

    global $g_ad_label;

    global $g_ad_anchor;

    global $g_ad_target;

    global $g_ad_img;
    
    $ad_link        = esc_url($g_ad_link);

    $ad_label       = esc_html($g_ad_label);

    $ad_anchor      = esc_html($g_ad_anchor);

    $ad_target      = $g_ad_target;

    $ad_img         = $g_ad_img;

    $citation       = esc_html($g_citation);

    $author         = esc_html($g_author);

    $citation_img   = esc_url($g_citation_bg['url']);

    $citation_alt   = esc_html($g_citation_bg['alt']);
    
?>
    </div>
</section>
<?php if($site_data['shop_ad_active']) : ?>
<!-- Ad banner -->
<section id="archive-ad-banner" class="section ad-banner wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.85s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo $ad_link; ?>" class="banner" title="<?php echo $ad_anchor; ?>"<?php if($ad_target){ echo ' target="_blank" rel="noopener"'; } ?>>
                    <div class="img">
                        <img src="<?php echo esc_url($ad_img['url']); ?>" alt="<?php echo esc_html($ad_img['alt']); ?>"/>
                    </div>
                    <div class="uppercase btn btn-secondary btn-lg">
                        <span><?php echo $ad_label; ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php

endif;

if($site_data['shop_citation_active']) :

?>
<!-- Citation -->
<section id="archive-citation" class="section citation ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data">
                    <div class="img wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.15s">
                        <img src="<?php echo $citation_img; ?>" alt="<?php echo $citation_alt; ?>"/>
                    </div>
                    <div class="text">
                        <q class="proverb fakeh4 text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
                            <?php echo $citation; ?>
                        </q>
                        <?php if($author != '') : ?>
                        <p class="author text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
                            <?php echo $author; ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

endif;
    
}

add_action('woocommerce_after_main_content', 'idcom_woo_output_content_wrapper_end', 10);

/******************************************************************************************************************************************************************
 *
 *  Single product
 *
 */

/**
 * Personnalisation des images sur la page produit
 */

// Suppression des images par défaut
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);
remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

// Suppression des produits relatifs
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_product', 20);

function idcom_remove_woo_related_products(){
    
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    
    // remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
    
    // remove_action('woocommerce_after_single_product_summary', 'storefront_upsell_display', 15);
    
}

add_action('init', 'idcom_remove_woo_related_products', 10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

/**
 * Images du produit
 */
function idcom_woo_show_product_images(){
    
    global $wp;
    
    global $woocommerce;
    
    global $product;
    
    global $site_data;
    
    $onsale = $product->is_on_sale() ? '<div class="product-onsale"><p>'.__('En promo !','idcomcrea').'</p></div>' : '';
    
    $delay  = idcom_get_published_days($product);
    
    $new    = $delay < $site_data['new_product_delay'] ? '<div class="new-product"><p>'.$site_data['new_product_label'].'</p></div>' : '';
    
    if($site_data['product_img_right']){
    
?>
<div class="row img-and-summary">
    <div class="col-12 col-md-6 col-lg-6">
<?php
    
    }else{
        
?>
<div class="row img-and-summary">
    <div class="col-12 col-md-6 col-lg-6">
        <?php idcom_woo_get_product_images(); ?>
    </div>
    <div class="col-12 col-md-6 col-lg-6">
<?php
        
    }

}

add_action('woocommerce_before_single_product_summary', 'idcom_woo_show_product_images', 20);

if($site_data['shop_catalog']){
    
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
 
    remove_action('woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30);
    
    remove_action('woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30);
    
    remove_action('woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30);
    
    remove_action('woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30);
    
    remove_action('woocommerce_single_variation', 'woocommerce_single_variation', 10);
    
    remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
    
    function idcom_woo_template_single_contact_button(){
        
?>
<a href="<?php echo get_permalink(14); ?>" class="btn btn-primary btn-lg mht12 mhb32" target="_blank" title="<?php echo esc_html('Prendre contact','idcomcrea'); ?>"><?php echo esc_html('Contactez-nous','idcomcrea'); ?></a>
<?php
        
    }
    
    add_action('woocommerce_single_product_summary', 'idcom_woo_template_single_contact_button', 30);
    
}

/**
 * Clôture du conteneur "images + description" du produit 
 */
function idcom_woo_template_single_sharing(){
    
    global $wp;
    
    global $woocommerce;
    
    global $product;
    
    global $site_data;
    
    if($site_data['product_img_right']){
        
?>
        <div class="share-buttons">
            <?php echo do_shortcode('[the_social_share_btn]'); ?>
        </div>
    </div>
</div>
<div class="col-12 col-md-6 col-lg-6">
    <?php idcom_woo_get_product_images(); ?>
</div>
<?php
        
    }else{
        
?>
        <div class="share-buttons">
            <?php echo do_shortcode('[the_social_share_btn]'); ?>
        </div>
    </div>
</div>
<?php
        
    }
    
}

add_action('woocommerce_single_product_summary', 'idcom_woo_template_single_sharing', 50);

/**
 * Produits relatifs
 */
function idcom_woo_output_related_product(){
    
    global $wp;
    
    global $woocommerce;
    
    global $product;
    
    global $site_data;
    
    $related_title  = $site_data['related_products'] != '' ? esc_html($site_data['related_products']) : __('Produits relatifs','idcomcrea');
    
    $current_id     = $product->get_id();
    
    /**
     * Requête
     */
    $related    = wc_get_related_products($product->id, $site_data['related_products_count']);
    
    $upsells    = $product->get_upsells();
    
    $related    = count($upsells) > 0 ? $upsells : $related;
    
?>
<div class="woo-related-products">
    <div class="row">
        <div class="col-12">
            <h2 class="fakeh4 text-center"><?php echo $related_title; ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php if(count($related) > 0) : ?>
            <div id="the-related-products" class="swiper-container">
                <div class="swiper-wrapper">
                <?php

                for($i=0; $i<count($related); $i++){

                    idcom_create_product_slider_item($related[$i]);

                }

                ?>
                </div>
            </div>
            <?php else : ?>
            <p class="alert-message text-center">
                <?php echo esc_html('Il n\'y a aucun produit relatif...'); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php
    
}

add_action('woocommerce_after_single_product_summary', 'idcom_woo_output_related_product', 20);

/******************************************************************************************************************************************************************
 *
 *  Woocommerce IDCOM custom functions
 *
 */

/**
 * Fonction d'obtention du nombre de jours de publication d'un produit
 */
function idcom_get_published_days($id){
    
    global $wp;
    
    global $woocommerce;
    
    $published  = strtotime(get_the_date('Y-m-d', $id->get_id()));
    
    $date       = strtotime(date('Y-m-d'));
    
    $delay      = ($date - $published) / 86400;
    
    return $delay;
    
}

/**
 * Formatage de l'extrait des produits
 */
function idcom_get_woo_excerpt($len){
    
    global $product;
    
    $excerpt = $product->post->post_excerpt;
            
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
 * Obtention et affichage des images du produit
 */
function idcom_woo_get_product_images(){
    
    global $wp;
    
    global $woocommerce;
    
    global $product;
    
    global $site_data;
    
    /**
     * Images ratio
     */
    $thumb_ratios = array(
        '2:4 (portrait)'    => 'po24r',
        '2:3 (portrait)'    => 'po23r',
        '1:1 (carré)'       => 'square',
        '4:3 (paysage)'     => 'pa43r',
        '3:2 (paysage)'     => 'pa32r',
        '16:9 (paysage)'    => 'pa169r',
        '4:2 (paysage)'     => 'pa42r'
    );
    
    $thumb_class    = $thumb_ratios[$site_data['single_product_thumb_ratio']];
    
    $top_slider     = '';
    
    $thumbs_slider  = '';
        
    $featured_img   = get_post_thumbnail_id($product->get_id());

    $gallery        = $product->get_gallery_attachment_ids();
    
    // Image grand format
    $img            = wp_get_attachment_image_src($featured_img, 'full');

    // Miniature de l'image
    $thumb          = wp_get_attachment_image_src($featured_img, 'medium_large');
    
    // Alt text selon nom du produit
    $alt_name       = $product->get_name();

    // Alt text de l'image (si renseigné)
    $alt_img        = get_post_meta($featured_img, '_wp_attachment_image_alt', true);

    $alt            = $alt_name.' - '.esc_html('Photo N°','idcomcrea').'1';
        
    if(count($gallery) > 0){
    
        $top_slider     .= '<div id="product-0-img" class="swiper-slide pswpi '.$thumb_class.'" data-id="0" data-caption="'.$alt.'" data-src="'.$img[0].'" data-width="'.$img[1].'" data-height="'.$img[2].'">
    <figure class="img" title="'.$alt.'" itemprop="associatedMedia" itemscope itemtype="https://schema.org/ImageObject">
        <img src="'.$thumb[0].'" itemprop="thumbnail" alt="'.$alt.'" class="imgcrop"/>
        <figcaption itemprop="caption description">'.$alt.'</figcaption>
    </figure>
    <a href="javascript:void(0);" class="zoom"><i class="fas fa-search"></i></a>
</div>';
    
        $thumbs_slider  .= '<div class="swiper-slide">
    <div class="img '.$thumb_class.'">
        <img src="'.$thumb[0].'" alt="'.$alt.'" class="imgcrop"/>
    </div>
</div>';
    
        for($i=0; $i<count($gallery); $i++){
            
            $alt_img         = get_post_meta($gallery[$i], '_wp_attachment_image_alt', true);
    
            $alt             = $alt_name.' - '.esc_html('Photo N°','idcomcrea').($i+2);

            $img             = wp_get_attachment_image_src($gallery[$i], 'full');

            $thumb           = wp_get_attachment_image_src($gallery[$i], 'medium_large');
            
            $top_slider     .= '<div id="product-'.($i+1).'-img" class="swiper-slide pswpi '.$thumb_class.'" data-id="'.($i+1).'" data-caption="'.$alt.'" data-src="'.$img[0].'" data-width="'.$img[1].'" data-height="'.$img[2].'">
    <figure class="img" title="'.$alt.'" itemprop="associatedMedia" itemscope itemtype="https://schema.org/ImageObject">
        <img src="'.$thumb[0].'" itemprop="thumbnail" alt="'.$alt.'" class="imgcrop"/>
        <figcaption itemprop="caption description">'.$alt.'</figcaption>
    </figure>
    <a href="javascript:void(0);" class="zoom"><i class="fas fa-search"></i></a>
</div>';
    
            $thumbs_slider  .= '<div class="swiper-slide">
    <div class="img '.$thumb_class.'">
        <img src="'.$thumb[0].'" alt="'.$alt.'" class="imgcrop"/>
    </div>
</div>';
            
        }
    
        $slider = '<div id="the-product-slider" class="product-img-slider">
    <div class="swiper-container gallery-top">
        <div class="swiper-wrapper">
            '.$top_slider.'
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <div class="swiper-container gallery-thumbs">
        <div class="swiper-wrapper">
            '.$thumbs_slider.'
        </div>
    </div>
</div>';
    
    }else{
                
        $slider = '<div id="the-product-image" class="single-product-image '.$thumb_class.'">
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" class="pswpi" data-id="0" data-caption="'.$alt.'" data-src="'.$img[0].'" data-width="'.$img[1].'" data-height="'.$img[2].'">
        <img src="'.$thumb[0].'" alt="'.$alt.'" class="imgcrop" itemprop="thumbnail"/>
    </figure>
    <a href="javascript:void(0);" class="zoom"><i class="fas fa-search"></i></a>
</div>';
        
    }
    
    echo $slider;
    
}

/**
 * Fonction de génération des items du slider des produits relatifs
 */
function idcom_create_product_slider_item($d){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    /**
     * Images ratio
     */
    $thumb_ratios = array(
        '2:4 (portrait)'    => 'po24r',
        '2:3 (portrait)'    => 'po23r',
        '1:1 (carré)'       => 'square',
        '4:3 (paysage)'     => 'pa43r',
        '3:2 (paysage)'     => 'pa32r',
        '16:9 (paysage)'    => 'pa169r',
        '4:2 (paysage)'     => 'pa42r'
    );
    
    $thumb_class    = $thumb_ratios[$site_data['product_thumb_ratio']];
    
    $prod       = wc_get_product($d);
                    
    $id         = $prod->get_id();

    $thumbnail  = wp_get_attachment_image_src(get_post_thumbnail_id($id), 'medium_large')[0];

    $alt        = get_post_meta(get_post_thumbnail_id($id), '_wp_attachment_image_alt', true);

    $q          = $prod->get_stock_quantity();

    $stock      = $q > 0 ? '<span class="stock instock">'.__('En stock','idcomcrea').'</span>' : '<span class="stock outofstock">'.__('Rupture de stock','idcomcrea').'</span>';
        
    $prod_link  = get_permalink($id);
    
    $delay      = idcom_get_published_days($prod);
        
    $new        = $delay < $site_data['new_product_delay'] ? '<span class="newproduct">'.esc_html($site_data['new_product_label']).'</span>' : '';
    
    $onsale     = $prod->is_on_sale() ? '<span class="onsale">'.__('Promo !','idcomcrea').'</span>' : '';
    
?>
<div class="swiper-slide">
    <a href="<?php echo $prod_link; ?>" class="imglink <?php echo $thumb_class; ?>" title="<?php echo $prod->get_name(); ?>">
        <img src="<?php echo $thumbnail; ?>" alt="<?php echo $prod->get_name(); ?>" class="imgcrop"/>
    </a>
    <a href="<?php echo $prod_link; ?>" class="titlelink" title="<?php echo $prod->get_name(); ?>">
        <h3 class="fakeh6 text-center"><?php echo $prod->get_name(); ?></h3>
    </a>
    <p class="price text-center">
        <?php echo $prod->get_price_html(); ?>
    </p>
    <p class="tbtn text-center">
        <a href="<?php echo $prod_link; ?>" class="uppercase btn btn-md btn-primary" title="<?php echo $prod->get_name(); ?>">
            <?php echo __('Découvrir','idcomcrea'); ?>
        </a>
    </p>
</div>
<?php
    
}

/**
 * Shortcodes de colonnes dans les tabs Woocommerce
 */
function idcom_woo_tabs_column_start(){
    
    $start = '<div class="idcom-tabs-column">';
    
    ob_start();
    echo $start;
    return ob_get_clean();
    
}

add_shortcode('START', 'idcom_woo_tabs_column_start');

function idcom_woo_tabs_column_end(){
    
    $end = '</div>';
    
    ob_start();
    echo $end;
    return ob_get_clean();
    
}

add_shortcode('END', 'idcom_woo_tabs_column_end');

/**
 * Vérification si la page est une page Woocommerce
 */
function idcom_check_woo_pages(){
    
    global $wp;
    
    global $woocommerce;
    
    global $site_data;
    
    if(is_checkout()){ return true; }
    
    if(is_account_page()){ return true; }
    
    if(is_cart()){ return true; }
    
    return false;
    
}

/**
 * Activation/désactivation de la boutique
 */
global $shop_active;

$shop_active = get_field('shop_active', 'option');

function idcom_redirect_inactive_shop(){
    
    global $shop_active;
    
    if(!$shop_active){
        
        if(!is_user_logged_in() && (is_woocommerce() || is_cart() || is_checkout() || is_account_page())){
        
            wp_redirect(site_url());
            
            exit;
            
        }
        
    }
        
}
add_action('template_redirect','idcom_redirect_inactive_shop');