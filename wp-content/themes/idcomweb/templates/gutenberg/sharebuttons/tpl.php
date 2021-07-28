<?php

/*******************************************************************************
 * 
 * Share buttons section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$colors     = get_field('colors');

$colors     = $colors ? ' insite' : '';

$type       = get_field('buttons_type');

$type       = $type ? ' round' : '';

?>
<section id="<?php echo esc_html($id); ?>" class="section share-buttons<?php echo $colors.$type ?> ph12 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.15s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[the_social_share_btn]'); ?>
            </div>
        </div>
    </div>
</section>