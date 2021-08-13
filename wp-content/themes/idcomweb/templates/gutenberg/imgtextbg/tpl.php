<?php

/*******************************************************************************
 * 
 * Text + images section Gutenberg template
 * 
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$title      = esc_html(get_field('title'));

$texts       = wp_kses_post(get_field('texts'));

$link       = esc_url(get_field('link'));

$label      = esc_html(get_field('label'));

$link_2       = esc_url(get_field('link_2'));

$label_2      = esc_html(get_field('label_2'));

$bg     = get_field('bg');

$img      = get_field('img');

$badge         = get_field('badge');

$vertical_align_img =  get_field('vertical_align_img');

$testimonials   = get_field('testimonials');

$img_before    = get_field('img_before');

$container_text = '';
$testimonials_slider     = '';

if(have_rows('testimonials_slider')){
    
    while(have_rows('testimonials_slider')){
        
        the_row();
        $name = get_sub_field('name');
        $desc = get_sub_field('desc');

        
        $item_slider = 
        '
            <div class="swiper-slide"> 
            <div class="content-quote">
                <img class="quote" src="'.home_url().'/wp-content/uploads/2021/08/white-quotepng.png"/>
                </div>
                <p>'.esc_html($desc).'</p>

                <div class="name">'.esc_html($name).'</div>
            </div>
        ';

        $testimonials_slider .= $item_slider;
    }
}

$has_subtitle = false;
if(have_rows('texts')){
    while(have_rows('texts')){
        the_row();

        $subtitle  = get_sub_field('subtitle');

        $description  = get_sub_field('description');
        if($subtitle != ''){
            $has_subtitle = true;
            $item = 
            '
            <h4>'.$subtitle.'</h4>
            <p>'.$description.'</p>
            ';
        }
        else{
            $item = 
            '
            <p>'.$description.'</p>
            ';
        }
        $container_text .= $item;
    }
}

?>
<section id="<?php echo esc_html($id); ?>" class="section imgtextbg  testimonials_slider slider mht96 mhb64 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" style="background-image: url(<?php echo esc_url($bg['url']); ?>);<?php if($testimonials == false) : ?>margin-left: 2%;background-position: left;<?php else : ?>margin-right:2%;background-position: right;<?php endif; ?>" data-idcom-js="idcomTestimonial">
    <div class="container-fluid">
        <div class="row">
            <?php if($testimonials == false) : ?>
                <!-- Start left Image -->
                <div class="col-12 col-lg-6 text-center <?php if($img_before) : ?> mb-0 <?php else: ?> order-lg-1 order-2 <?php endif; ?> <?php if($vertical_align_img) : ?> d-lg-flex align-items-lg-center <?php else : ?>position-relative<?php endif; ?>">
                    <div class="position-relative <?php if($img_before == false) : ?> mt-5 <?php else:?> mt-7 <?php endif; ?>">
                        <img class="img-left mt-0" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
                        <?php if($badge) : ?>
                        <img class="badges mt-0" src="<?= home_url()?>/wp-content/uploads/2021/08/badge-coaching.png"/>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- End left Image -->

                <!-- Start Right Text -->
                <div class="col-12 col-lg-6 <?php if($img_before) : ?> order-lg-1 order-2 <?php else: ?> order-lg-2 order-1 <?php endif; ?>">
                    <div class="content right">
                        <div class="heading">
                            <h2><?php echo $title; ?></h2>
                        </div>
                        <div class="desc">
                            <?php echo  $container_text; ?>
                        </div>
                        <?php if($link != '' && $label != '') : ?>
                        <div class="content-btns d-flex justify-content-between">
                            <p class="tbtn">
                                <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase" title="<?php echo $title; ?>"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>><?php echo $label; ?></a>
                            </p>
                            <?php endif; ?>
                            <?php if($link_2 != '' && $label_2 != '') : ?>
                                <p class="tbtn">
                                    <a href="<?php echo $link_2; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-right"><?php echo $label_2; ?></a>
                                </p>
                            <?php endif; ?>
                        <?php if($link != '' && $label != '') : ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <img class="img-line <? if($has_subtitle) : ?>img-line-whith-subtitles<?php endif; ?>" src="<?= home_url()?>/wp-content/uploads/2021/08/trait-horizontal.png">
                <!-- End Right Text -->
            <?php else : ?>

            <!-- Start Left Text -->
            <div class="  testimonials mt-5 col-12 col-lg-6">
                <div class="content right">
                    <div class="heading">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="desc">
                        <div id="<?php echo esc_html($id); ?>-topslider-swiper" class="swiper-container" >
                            <div class="swiper-wrapper">
                                <?php echo $testimonials_slider; ?>
                            </div>
                        </div>
                        <div class="swiper-btn swiper-button-prev"></div>
                        <div class="swiper-btn swiper-button-next"></div>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <div class="content-btns d-flex justify-content-between">
                        <p class="tbtn" style="z-index:10">
                            <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase" title="<?php echo $title; ?>"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>><?php echo $label; ?></a>
                        </p>
                        <?php endif; ?>
                        <?php if($link_2 != '' && $label_2 != '') : ?>
                            <p class="tbtn" style="z-index:10">
                                <a href="<?php echo $link_2; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-right"><?php echo $label_2; ?></a>
                            </p>
                        <?php endif; ?>
                    <?php if($link != '' && $label != '') : ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <img class="img-line img-line-right <? if($has_subtitle) : ?>img-line-whith-subtitles<?php endif; ?>" src="<?= home_url()?>/wp-content/uploads/2021/08/trait-horizontal-2.png">
            <!-- End Left Text -->
            
            <!-- Start right Image -->

            <div class=" section-testimonial col-12 col-lg-6 text-center <?php if($vertical_align_img) : ?> d-lg-flex align-items-lg-center <?php else : ?>position-relative<?php endif; ?>">
                <div class="position-relative  <?php if($img_before == false) : ?> mt-2 <?php else:?> mt-7 <?php endif; ?>">
                    <img class="img-right mt-0" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
                    <?php if($badge) : ?>
                    <img class="badges-right  mt-0" src="<?= home_url()?>/wp-content/uploads/2021/08/badge-coaching.png"/>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End right Text -->

           
            <?php endif; ?>
        </div>
    </div>
</section>