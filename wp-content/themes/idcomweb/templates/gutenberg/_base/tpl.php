<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id     = get_field('id');

?>
<section id="<?php echo esc_html($id); ?>" class="section wysiwyg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                
            </div>
        </div>
    </div>
</section>