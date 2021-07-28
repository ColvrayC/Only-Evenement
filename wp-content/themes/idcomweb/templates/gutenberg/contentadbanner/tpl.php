<?php

/*******************************************************************************
 * 
 * Content + ad banner section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id             = get_field('id');

$pretitle       = esc_html(get_field('pretitle'));

$title          = esc_html(get_field('title'));

?>
<section id="<?php echo esc_html($id); ?>" class="section contentadbanner ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <?php if($pretitle != '') : ?>
                    <span class="pretitle text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s"><?php echo $pretitle; ?></span>
                    <?php endif; ?>
                    <h2 class="text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $title; ?></h2>
                </div>
            </div>
        </div>
        <?php
        
        if(have_rows('content')){
            
            while(have_rows('content')){
                
                the_row();
                
                $title          = esc_html(get_sub_field('title'));
                
                $desc           = wp_kses_post(get_sub_field('desc'));
                
                $link           = esc_url(get_sub_field('link'));
                
                $label          = esc_html(get_sub_field('label'));
                
                $target         = get_sub_field('target');
                
                $target         = $target ? ' target="_blank" rel="noopener"' : '';
                
                $btn_full       = get_sub_field('btn_full');
                
                $btn_full       = $btn_full ? '' : ' btn-empty';
                
                $img            = get_sub_field('img');
                
                $img            = is_array($img) && count($img) > 2 ? '<img src="'.esc_url($img['url']).'" alt="'.esc_html($img['alt']).'" class="imgcrop"/>' : '';
                
                $ad_link        = esc_url(get_sub_field('ad_link'));
                
                $ad_label       = esc_html(get_sub_field('ad_label'));
                
                $ad_anchor      = esc_html(get_sub_field('ad_anchor'));
                
                $ad_target      = get_sub_field('ad_target');
                
                $ad_target      = $ad_target ? ' target="_blank" rel="noopener"' : '';
                                
                $ad_img         = get_sub_field('ad_img');
                
                $ad_img         = is_array($ad_img) && count($ad_img) > 2 ? '<img src="'.esc_url($ad_img['url']).'" alt="'.esc_html($ad_img['alt']).'" class="imgcrop"/>' : '';
                
                $right          = get_sub_field('right');
                
                if($right){
                    
                    $ad_class   = 'col-12 order-2 order-sm-2 col-md-4 order-md-2 col-lg-4 order-lg-2';
                    
                    $ct_class   = 'col-12 order-1 order-sm-1 col-md-8 order-md-1 col-lg-8 order-lg-1';
                    
                }else{
                    
                    $ad_class   = 'col-12 order-2 order-sm-2 col-md-4 order-md-1 col-lg-4 order-lg-1';
                    
                    $ct_class   = 'col-12 order-1 order-sm-1 col-md-8 order-md-2 col-lg-8 order-lg-2';
                    
                }
                
        ?>
        <div class="row subsection">
            <?php if($ad_link != '' && $ad_img != '') : ?>
            <div class="<?php echo $ad_class; ?>">
                <a href="<?php echo $ad_link; ?>" class="banner wow fadeInDown" data-wow-duration="0.5s" data-wow-delay="1.5s" title="<?php echo $ad_anchor; ?>"<?php echo $ad_target; ?>>
                    <div class="img">
                        <?php echo $ad_img; ?>
                    </div>
                    <div class="uppercase btn btn-secondary btn-lg">
                        <span><?php echo $ad_label; ?></span>
                    </div>
                </a>
            </div>
            <div class="<?php echo $ct_class; ?>">
                <div class="subtitle">
                    <h3 class="fakeh5 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s"><?php echo $title; ?></h3>
                </div>
                <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
                    <?php echo $desc; ?>
                </div>
                <?php if($link != '' && $label != '') : ?>
                <p class="tbtn wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.35s">
                    <a href="<?php echo $link; ?>" class="uppercase btn btn-lg btn-secondary<?php echo $btn_full; ?>"<?php echo $target; ?>><?php echo $label; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
                </p>
                <?php endif; ?>
                <?php if($img != '') : ?>
                <div class="img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <?php echo $img; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php else : ?>
            <div class="col-12 col-md-2 col-lg-2"></div>
            <div class="col-12 col-md-8 col-lg-8">
                <div class="subtitle">
                    <h3 class="fakeh5 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s"><?php echo $title; ?></h3>
                </div>
                <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
                    <?php echo $desc; ?>
                </div>
                <?php if($link != '' && $label != '') : ?>
                <p class="tbtn wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.35s">
                    <a href="<?php echo $link; ?>" class="uppercase btn btn-lg btn-secondary<?php echo $btn_full; ?>"<?php echo $target; ?>><?php echo $label; ?> <i class="fas fa-long-arrow-alt-right"></i></a>
                </p>
                <?php endif; ?>
                <?php if($img != '') : ?>
                <div class="img wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <?php echo $img; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-2 col-lg-2"></div>
            <?php endif; ?>
        </div>
        <?php
                
            }
            
        }
        
        ?>
    </div>
</section>