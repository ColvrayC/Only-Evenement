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

$shortcode       = get_field('shortcode');


?>
<section id="<?php echo esc_html($id); ?>" class="section testimonial-form mht96 mhb64 wow fadeIn pt-5" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid">
        <div class="row">
            <!-- image left -->
            
            
            <div class="col-lg-3 d-none d-md-block">
                <img class="img-bg img-bg-left" src="<?= home_url()?>/wp-content/uploads/2021/08/tache-1.png">
            </div>
            <div class="col-12 col-md-8 col-lg-6 content-form mx-auto">
                <div class="content right"> 
                    <h2><?= $title ?></h2>
                    <div class="form">
                        <?php echo do_shortcode($shortcode); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-none d-md-block">
            <img class="img-bg img-bg-right" src="<?= home_url()?>/wp-content/uploads/2021/08/tache-2.png">
            </div>

        </div>
      
        
    </div>
</section>
