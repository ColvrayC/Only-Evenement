<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$title = esc_html(get_field('title'));
$desc = wp_kses_post(get_field('desc'));
$img = get_field('img');

?>
<section id="<?php echo esc_html($id); ?>" class="section article wysiwyg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <div class="content-title">
            <h2><?= $title ?></h2>
        </div>
        <div class="row mx-auto col-12 col-md-9">
            <div class="content-img">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
            </div>
            
            <div class="col-12">
             
             <?= $desc ?>

             
            </div>
        </div>
    </div>
</section>