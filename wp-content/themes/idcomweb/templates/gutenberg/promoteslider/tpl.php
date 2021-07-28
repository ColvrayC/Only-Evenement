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

$thetitle   = esc_html(get_field('title'));

$slider     = '';

if(have_rows('slider')){
    
    while(have_rows('slider')){
        
        the_row();
        
        $pretitle   = esc_html(get_sub_field('pretitle'));
        
        $pretitle   = $pretitle != '' ? '<span class="pretitle">'.$pretitle.'</span>' : '';
       
        $title      = esc_html(get_sub_field('title'));
        
        $desc       = wp_kses_post(get_sub_field('desc'));
        
        $link       = esc_url(get_sub_field('link'));
        
        $label      = esc_html(get_sub_field('label'));
        
        $target     = get_sub_field('target');
        
        $target     = $target ? ' target="_blank" rel="noopener"' : '';
        
        $btn_full   = get_sub_field('full_btn');
        
        $btn_full   = $btn_full ? '' : ' btn-empty';
        
        $img        = get_sub_field('img');
        
        if($link != '' && $label != ''){
            
            $tbtn       = '<p class="tbtn"><a href="'.$link.'" class="uppercase btn btn-lg btn-primary'.$btn_full.'" title="'.$title.'"'.$target.'>'.$label.' <i class="fas fa-long-arrow-alt-right"></i></a></p>';
            
            $btn_img    = '<a href="'.$link.'" title="'.$title.'" class="img"'.$target.'><img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class="imgcrop"/></a>';
            
        }else{
            
            $tbtn       = '';
            
            $btn_img    = '<div class="img"><img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class="imgcrop"/></div>';
            
        }
                
        $item       = '<div class="swiper-slide">
    <div class="data">
        '.$btn_img.'
        <div class="content">
            '.$pretitle.'
            <h2 class="fakeh4">'.$title.'</h2>
            <div class="desc">'.$desc.'</div>
            '.$tbtn.'
        </div>
    </div>
</div>';
        
        $slider     .= $item;
        
    }
    
}

?>
<section id="promote-<?php echo esc_html($id); ?>-slider" class="section promoteslider ef-bg ph48 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" data-idcom-js="idcomPromoteSlider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $title; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="the-promote-slider">
                    <div id="promote-<?php echo esc_html($id); ?>-slider-swiper" class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php echo $slider; ?>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>