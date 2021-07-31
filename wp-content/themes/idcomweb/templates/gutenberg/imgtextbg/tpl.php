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

$desc       = wp_kses_post(get_field('desc'));

$link       = esc_url(get_field('link'));

$label      = esc_html(get_field('label'));

$bg     = get_field('bg');

$img      = get_field('img');


$testimonials   = get_field('testimonials');


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
                        <?php echo $desc; ?>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <p class="tbtn">
                        <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase" title="<?php echo $title; ?>"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>><?php echo $label; ?></a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End Right Text -->
            <?php else : ?>
            <!-- Start Left Text -->
            <div class="col-12 col-lg-6">
                <div class="content right">
                    <div class="heading">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="desc">
                        <?php echo $desc; ?>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <p class="tbtn">
                        <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase" title="<?php echo $title; ?>"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>><?php echo $label; ?></a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
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