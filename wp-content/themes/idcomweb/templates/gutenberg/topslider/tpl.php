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

$link       = esc_url(get_field('link-1'));

$label      = esc_html(get_field('label-1'));

$link_2     = esc_url(get_field('link-2'));

$label_2    = esc_html(get_field('label-2'));

$sub_content_imgs = '';

$slider     = '';

if(have_rows('sub_content_imgs')){
    
    while(have_rows('sub_content_imgs')){
        
        the_row();
        $img = get_sub_field('img');

        
        $item = 
        '
        <img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" />
        ';

        $sub_content_imgs .= $item;
    }
}

if(have_rows('slider')){
    
    while(have_rows('slider')){
        
        the_row();
        $img        = get_sub_field('img');

        
        $item = 
        
        '
        <div class="swiper-slide">
            <div class="img">
                <div class="swiper-slide"> <img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class=""/></div>
                <div class="data">
                    <div class="overlay"></div>
                    <div class="content">
                    </div>
                </div>
            </div>
        </div>
        ';

        $slider .= $item;
    }
}

if($slider != ''){
?>
    <section  id="<?php echo esc_html($id); ?>-topslider" class="section topslider mht48 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s" data-idcom-js="idcomTopSlider">
        <div class="container-fluid">
            <div class="row">
                <!-- Start text on topslider -->
                <div class="topslider-content-text">
                        
                    <h2>WEDDING PLANNER – OFFICIANTE DE CÉRÉMONIE</h2>
                    <h1>Nous allons imaginer, une journée qui vous ressemble !</h1>
                    <p>Le grand jour approche à grand pas. Mais avant de vous dire oui, une imoportante organisation se dessine. Un mariage, ça ne s'improvise pas : vous devez penser à coordonner de nombreux prestataires, au meilleur prix, sur une date unique.</p>

                    <div class="d-sm-flex btn-content">
                        <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-first me-5" title="<?php echo $title; ?>"><?php echo $label; ?></a>
                        <a href="<?php echo $link_2; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-second" title="<?php echo $title; ?>"><?php echo $label_2; ?></a>
                    </div>

                </div>
                <!-- End text on top slider -->

                <!-- Start content swiper -->
                <div class="col-3"></div>
                <div class="col-lg-9 px-0 the-slider">
                    <div id="<?php echo esc_html($id); ?>-topslider-swiper" class="swiper-container" >
                        <div class="swiper-wrapper">
                            <?php echo $slider; ?>
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    
                    
                </div>
                <div class="swiper-button-next"></div>
                <!-- End content swiper -->
            </div>
            <!-- Start content sub content imgs -->
            <div class="row col-12 top-slider-sub-content-imgs">
                <div class="d-flex">
                    <?php echo $sub_content_imgs; ?>
                </div>
            </div>
            <!-- End content sub content imgs -->
            <img class="img-line" src="<?= home_url(); ?>/wp-content/uploads/2021/08/trait-vertical-2.png"/>
        </div>
    </section>

<?php
}
?>