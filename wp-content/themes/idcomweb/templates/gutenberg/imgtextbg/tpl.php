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

$testimonials   = get_field('testimonials');

$container_text = '';

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
<section id="<?php echo esc_html($id); ?>" class="section imgtextbg mht96 mhb64 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" style="background-image: url(<?php echo esc_url($bg['url']); ?>);<?php if($testimonials == false) : ?>margin-left: 2%;background-position: left;<?php else : ?>margin-right:2%;background-position: right;<?php endif; ?>">
    <div class="container-fluid">
        <div class="row">
            <?php if($testimonials == false) : ?>
             <!-- Start Right Image -->
            <div class="col-12 col-lg-6 text-center">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
            </div>
            <!-- End Right Text -->

            <!-- Start Right Text -->
            <div class="col-12 col-lg-6">
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
            <div class="col-12 col-lg-6">
                <div class="content right">
                    <div class="heading">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="desc">
                        <?php echo $container_text; ?>
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
            <img class="img-line img-line-right <? if($has_subtitle) : ?>img-line-whith-subtitles<?php endif; ?>" src="<?= home_url()?>/wp-content/uploads/2021/08/trait-horizontal-2.png">
            <!-- End Left Text -->

            <!-- Start Left Image -->
            <div class="col-12 col-md-6 text-center">
                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
            </div>
            <!-- End Left Text -->

           
            <?php endif; ?>
        </div>
    </div>
</section>