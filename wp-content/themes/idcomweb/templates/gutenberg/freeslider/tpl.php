<?php

/*******************************************************************************
 * 
 * Free slider section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id             = get_field('id');

$first_title    = get_field('first_title');

$slider         = '';

if(have_rows('slider')){
    
    $n = 1;
    
    $i = 1;
    
    while(have_rows('slider')){
        
        the_row();
        
        $img        = get_sub_field('img');
        
        $title      = esc_html(get_sub_field('title'));
        
        $link       = esc_url(get_sub_field('link'));
        
        $target     = get_sub_field('target');
        
        $target     = $target ? ' target="_blank" rel="noopener"' : '';
        
        $class      = $n == 1 ? ' cd-bg' : ' de-bg';
        
        $h          = $first_title && $i == 1 ? 'h1' : 'h2';
        
        $item       = '<div class="swiper-slide">
    <a href="'.$link.'" class="data"'.$target.'>
        <img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class="imgcrop"/>
        <'.$h.' class="fakeh6'.$class.'">'.$title.'</'.$h.'>
    </a>
</div>';
        
        $slider     .= $item;
        
        $n++;
        
        $n = $n == 3 ? 1 : $n;
        
        $i++;
        
    }
    
}

if($slider != ''){

?>
<section id="<?php echo esc_html($id); ?>-freeslider" class="section freeslider wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s" data-idcom-js="idcomFreeSlider">
    <div class="container">
        <div class="row">
            <div class="col-12 the-slider">
                <div id="<?php echo esc_html($id); ?>-freeslider-swiper" class="swiper-container" data-loop="<?php if($first_title){ echo 'false'; }else{ echo 'true'; } ?>">
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
    <div class="bg ef-bg ph108">
        <?php if($first_title){ the_breadcrumb(); } ?>
    </div>
</section>
<?php

}