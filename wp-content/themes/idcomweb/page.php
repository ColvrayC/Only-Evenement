<?php

/*******************************************************************************
 * 
 * Page template
 * 
 */

global $ID;

global $site_data;

get_header();

$is_shop = false;

if(class_exists('WooCommerce')){
    
    if(idcom_check_woo_pages()){ $is_shop = true; }
    
}

if($is_shop){
    
    global $site_data;
    
    $img = $site_data['shop_default_img'];

?>
<section id="titlebar-section" class="section titlebar ab-bg ph32 mhb72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" data-idcom-js="">
    <?php if(is_array($img) && count($img) > 2) : ?>
    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="imgcrop"/>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-duration="0.25s" data-wow-delay="1.5s">
                <h1 class="text-center"><?php echo get_the_title(); ?></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 wow fadeInDown" data-wow-duration="0.25s" data-wow-delay="1.5s">
                <?php the_breadcrumb(); ?>
            </div>
        </div>
    </div>
</section>
<?php

}

the_content();

if($is_shop){

    // ...
    
}

get_footer();