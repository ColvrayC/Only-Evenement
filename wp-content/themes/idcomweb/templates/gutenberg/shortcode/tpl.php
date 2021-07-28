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
<section id="<?php echo esc_html($id); ?>" class="section shortcode ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-duration="0.25s" data-wow-delay="1.25s">
                <?php echo do_shortcode($shortcode); ?>
            </div>
        </div>
    </div>
</section>
<?php

}