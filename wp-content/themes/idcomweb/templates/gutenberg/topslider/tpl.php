<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$subtitle   = esc_html(get_field('subtitle'));

$title      = esc_html(get_field('title'));

$desc       = get_field('desc');

$link_1     = esc_url(get_field('link-1'));

$label_1    = esc_html(get_field('label-1'));

$link_2     = esc_url(get_field('link-2'));

$label_2    = esc_html(get_field('label-2'));

$slider     = '';

if(have_rows('slider')){
    
    while(have_rows('slider')){
        
        the_row();
        $img        = get_sub_field('img');

        $item = 
        '<div class="swiper-slide">
            <div class="img">
                <img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class="imgcrop"/>
            </div>
            <div class="data">
                <img src="'.esc_url($subimg['url']).'" alt="'.esc_html($subimg['alt']).'" class="imgcrop"/>
                <div class="overlay"></div>
                <div class="content">
                   
                </div>
            </div>
        </div>';
        
        $slider .= $item;
    }
}

?>
<section id="<?php echo esc_html($id); ?>" class="section wysiwyg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" data-idcom-js="idcomTopSlider">
    <div class="container">
        <div class="row">
            <div class="col-12 the-slider">
                <div id="<?php echo esc_html($id); ?>-topslider-swiper" class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php echo $slider; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>