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

$link_2     = esc_url(get_field('link_2'));

$label_2    = esc_html(get_field('label_2'));

$img        = get_field('img');

$is_right   = get_field('is_right');

$text_in_img  = get_field('text_in_img');



?>
<section id="<?php echo esc_html($id); ?>" class="section imgtext mht96 mhb64 pb-0 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid">
        <div class="row">
            <?php if($is_right) : ?>
             <!-- Start left Image -->
            <div class="col-12 col-lg-6 my-5 my-lg-0 text-center order-2 order-lg-1">
                <div class="img">
                    <?php if($text_in_img) : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img-with-text imgcrop" />
                    <?php else : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"  />
                    <?php endif; ?>
                </div>
            </div>
            <!-- End left Text -->

            <!-- Start Right Text -->
            <div class="col-12 col-lg-6 order-1 order-lg-2">
                <div class="content mx-auto">
                    <div class="heading">
                        <h4><?php echo $title; ?></h4>
                    </div>
                    <div class="desc mx-auto">
                        <?php echo $desc; ?>
                    </div>

                    <?php if($link != '' && $link_2 != '') : ?>
                        <div class="d-md-flex justify-content-between">
                    <?php endif; ?>

                    <?php if($link != '' && $label != '') : ?>
                        <p class="tbtn">
                            <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase"><?php echo $label; ?></a>
                        </p>
                    <?php endif; ?>

                    <?php if($link_2 != '' && $label_2 != '') : ?>
                        <p class="tbtn">
                            <a href="<?php echo $link_2; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-right"><?php echo $label_2; ?></a>
                        </p>
                    <?php endif; ?>

                    <?php if($link != '' && $link_2 != '') : ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End Right Text -->

            <?php else : ?>

            <!-- Start Left Text -->
            <div class="col-12 col-lg-6">
                <div class="content mx-auto">
                    <div class="heading">
                        <h3><?php echo $title; ?></h3>
                    </div>
                    <div class="desc desc-left mx-auto">
                        <?php echo $desc; ?>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <div class="content-btns d-flex justify-content-between">
                        <p class="tbtn">
                            <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase"><?php echo $label; ?></a>
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
            <!-- End Left Text -->

            <!-- Start right Image -->
            <div class="col-12 col-lg-6 mt-5 mt-lg-0 text-center">
                <div class="img">
                    <?php if($text_in_img) : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img-with-text imgcrop" />
                    <?php else : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"  />
                    <?php endif; ?>
                </div>
            </div>
            <!-- End right Text -->

           
            <?php endif; ?>
        </div>
    </div>
</section>