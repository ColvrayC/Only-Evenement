<?php

/*******************************************************************************
 * 
 * Shortcode section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id        = get_field('id');

$shortcode = get_field('shortcode');

if($shortcode != ''){

?>
<section id="<?php echo esc_html($id); ?>" class="section shortcode ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3"></div>
            <div class="col-12 col-md-6 col-lg-6 wow fadeInUp" data-wow-duration="0.25s" data-wow-delay="1.5s">
                <?php echo do_shortcode($shortcode); ?>
            </div>
            <div class="col-12 col-md-3 col-lg-3"></div>
        </div>
    </div>
</section>
<?php

}