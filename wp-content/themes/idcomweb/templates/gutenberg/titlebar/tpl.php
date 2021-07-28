<?php

/*******************************************************************************
 * 
 * Titlebar section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$title      = esc_html(get_field('title'));

$title      = $title != '' ? $title : get_the_title();

$breadcrumb = get_field('breadcrumb');

$img        = get_field('bg_img');

?>
<section id="<?php echo esc_html($id); ?>" class="section titlebar ab-bg ph32 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" data-idcom-js="">
    <?php if(is_array($img) && count($img) > 2) : ?>
    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="imgcrop"/>
    <?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInUp" data-wow-duration="0.25s" data-wow-delay="1.5s">
                <h1 class="text-center"><?php echo $title; ?></h1>
            </div>
        </div>
        <?php if($breadcrumb) : ?>
        <div class="row">
            <div class="col-12 wow fadeInDown" data-wow-duration="0.25s" data-wow-delay="1.5s">
                <?php the_breadcrumb(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>