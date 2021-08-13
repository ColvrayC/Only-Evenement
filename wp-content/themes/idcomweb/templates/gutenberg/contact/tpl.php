<?php

/*******************************************************************************
 * 
 * Contact section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id              = get_field('id');

$title           = get_field('title');

$img_left        = get_field('img_left');

$img_right       = get_field('img_right');

$profile_img     = get_field('profile_img');

$shortcode       = get_field('shortcode');

$header_imgs     = '';

if(have_rows('header_imgs')){

    while(have_rows('header_imgs')){
    
        the_row();

        $img   = get_sub_field('img');
            
        $item = ' 
                <div>
                    <img src="'. $img['url'].'" alt="'. $img['alt'].'"> 
                </div>
            ';

        $header_imgs .= $item;
        
    }   
}

?>
<section id="<?php echo esc_html($id); ?>" class="section contact mht96 mhb64 mt-5 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid px-0">
        <!-- Start Images -->
        <div class="d-flex content-header">
            <?= $header_imgs?>
        </div>
        <!-- End images -->

        <!-- Start form -->
        <div class="row">
            <!-- image left -->
            <div class="col-2 img-left">
                <img src="<?= $img_left['url']?>" alt="<?= $img_left['alt']?>"> 
            </div>
            <!-- Infos  -->
            <div class="col-12 col-xl-3  content-infos">
                <div class="mx-auto">
                    <img src="<?= $profile_img['url']?>" alt="<?= $profile_img['alt']?>"> 
                    <h3 class="black-color"><?= $site_data['proprietaire'] ?></h3>
                    <h4 class="title">Votre wedding planner & officiante de cérémonie</h4>

                    <div class="info">
                        <h4 class="title">Email</h4>
                        <a href="mailto:<?php echo $site_data['email'] ?>"><?php echo $site_data['email']?></a>
                    </div>

                    <div class="info">
                        <h4 class="title">Téléphone</h4>
                        <a href="tel:<?php echo $site_data['mobile'] ?>"><?php echo $site_data['mobile']?></a>
                        
                    </div>

                    <div class="info">
                        <h4 class="title">Adresse</h4>
                        <span><?= $site_data['codepostal'] ?> <?= $site_data['ville'] ?></span>
                    </div>

                    <div class="social">
                        <div class="px-0 row">
                            <h4 class="black-color">Nous suivre</h4>
                        </div>
                        <div class="social-icons d-flex">
                            <?php if($site_data['facebook'] != '') : ?>

                            <a href="<?php echo esc_url($site_data['facebook']); ?>" class="right-btn" title="<?php echo esc_html('Facebook'); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook"></i></a>

                            <?php endif; ?>

                            <?php if($site_data['instagram'] != '') : ?>

                            <a href="<?php echo esc_url($site_data['instagram']); ?>" class="right-btn" title="<?php echo esc_html('Instagram'); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>

                            <?php endif; ?>

                            <?php if($site_data['twitter'] != '') : ?>

                            <a href="<?php echo esc_url($site_data['twitter']); ?>" class="right-btn" title="<?php echo esc_html('Twitter'); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>

                            <?php endif; ?>

                            <?php if($site_data['pinterest'] != '') : ?>

                            <a href="<?php echo esc_url($site_data['pinterest']); ?>" class="right-btn" title="<?php echo esc_html('Pinterest'); ?>" target="_blank" rel="noopener"><i class="fab fa-pinterest"></i></a>

                            <?php endif; ?>

                            <?php if($site_data['tumblr'] != '') : ?>

                            <a href="<?php echo esc_url($site_data['tumblr']); ?>" class="right-btn" title="<?php echo esc_html('Tumblr'); ?>" target="_blank" rel="noopener"><i class="fab fa-tumblr"></i></a>

                            <?php endif; ?>

                            <?php if($site_data['rss']) : ?>

                            <a href="/feed/" class="right-btn" title="<?php echo esc_html('Tumblr'); ?>" target="_blank"><i class="fas fa-rss"></i></a>

                            <?php endif; ?>
                        </div>
                    </div>
                            </div>


            </div>
            <!-- form -->
            <div class="col-12 col-xxl-5">
                <div class="content right"> 
                    <div class="form-title">
                        <h2><?= $title?></h2>
                        <hr>
                    </div>
                    <div class="form mx-auto">
                        <?php echo do_shortcode($shortcode); ?>
                    </div>
                </div>
            </div>

            <!-- image right -->
            <div class="col-2 img-right">
                <img src="<?= $img_right['url']?>" alt="<?= $img_right['alt']?>"> 
            </div>
        </div>
        <!-- End form -->
    </div>
</section>
