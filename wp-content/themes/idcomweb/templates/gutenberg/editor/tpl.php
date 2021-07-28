<?php

/*******************************************************************************
 * 
 * WYSIWYG editor section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id      = get_field('id');

$content = wp_kses_post(get_field('wysiwyg'));

?>
<section id="<?php echo esc_html($id); ?>" class="section wysiwyg ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</section>