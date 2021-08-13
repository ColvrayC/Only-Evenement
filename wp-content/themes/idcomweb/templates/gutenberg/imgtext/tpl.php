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

$vertical_align_img =  get_field('vertical_align_img');

$img_before    = get_field('img_before');

$badge         = get_field('badge');



?>
<section id="<?php echo esc_html($id); ?>" class="section imgtext mht96 mhb64 pb-0 wow fadeIn <?php if($img_before) : ?> pt-0 <?php endif; ?>" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid">
        <div class="row">
            <?php if($is_right) : ?>
             <!-- Start left Image -->
            <div class="col-12 col-lg-6 my-lg-5 mt-5 text-center <?php if($img_before) : ?>  mb-5 <?php else : ?>  order-lg-1 order-2 <?php endif; ?> <?php if($vertical_align_img) : ?> d-lg-flex align-items-lg-center<?php endif; ?>">
                <div class="img">
                    <?php if($text_in_img) : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img-with-text " />
                    <?php else : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"  />
                        <?php if($badge) : ?>
                        <img class="badges mt-0" src="<?= home_url()?>/wp-content/uploads/2021/08/badge-coaching.png"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End left Text -->

            <!-- Start Right Text -->
            <div class="col-12 col-lg-6 <?php if($img_before) : ?> <?php else : ?>order-lg-2 order-1  <?php endif; ?>">
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
            <div class="col-12 col-lg-6 <?php if($img_before) : ?> order-lg-1 order-2 <?php endif; ?>">
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
            <div class=" col-12 col-lg-6 mt-5 mt-lg-0 text-center <?php if($img_before) : ?> order-lg-2 order-1 mb-5 <?php else: ?> order-lg-1 order-2 <?php endif; ?> <?php if($vertical_align_img) : ?> d-lg-flex align-items-lg-center<?php endif; ?>">
                <div class="img">
                    <?php if($text_in_img) : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="img-with-text " />
                    <?php else : ?>
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"  />
                        <?php if($badge) : ?>
                        <img class="badges mt-0" src="<?= home_url()?>/wp-content/uploads/2021/08/badge-coaching.png"/>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- End right Text -->

           
            <?php endif; ?>
        </div>
    </div>
</section>