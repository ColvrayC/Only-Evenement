<?php

/*******************************************************************************
 * 
 * First title section Gutenberg template
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
<section id="<?php echo esc_html($id); ?>" class="section firsttitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container ohidden ph108">
        <?php if(is_array($img) && count($img) > 2) : ?>
        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="imgcrop"/>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <div class="title cd-bg ph24 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <h1 class="fakeh5 text-center"><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg ef-bg ph108">
        <?php if($breadcrumb){ the_breadcrumb(); } ?>
    </div>
</section>