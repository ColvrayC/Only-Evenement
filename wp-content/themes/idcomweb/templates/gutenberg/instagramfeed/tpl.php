<?php

/*******************************************************************************
 * 
 * Instagram section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$pretitle       = esc_html(get_field('pretitle'));

$title          = esc_html(get_field('title'));

$desc           = wp_kses_post(get_field('desc'));

?>
<section id="<?php echo esc_html($id); ?>" class="section instagramfeed ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/ornament-bis.svg" alt="<?php _e('Instagram','idcomcrea'); ?>" class="ornament"/>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2"></div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="section-title">
                    <span class="uppercase pretitle text-center wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="1.5s"><?php echo $pretitle; ?></span>
                    <h2 class="fakeh4 text-center wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $title; ?></h2>
                </div>
                <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <?php echo $desc; ?>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-12 col-md-2 col-lg-2"></div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="idcom-instagram-feed wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
                    <?php echo do_shortcode('[instagram-feed]'); ?>
                </div>
            </div>
            <div class="col-12 col-md-2 col-lg-2"></div>
        </div>
    </div>
</section>