<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id                 = get_field('id');

$pretitle           = esc_html(get_field('pretitle'));

$title              = esc_html(get_field('title'));

$desc               = wp_kses_post(get_field('desc'));

$link               = esc_url(get_field('link'));

$label              = esc_html(get_field('label'));

$link_2     = esc_url(get_field('link_2'));

$label_2    = esc_html(get_field('label_2'));

$target             = get_field('target');

$btn                = get_field('btn_style');

$big                = get_field('big_img');

$small              = get_field('small_img');

$small_txt          = esc_html(get_field('small_text'));

$icon               = get_field('icon');

$istext             = get_field('istext');

$right              = get_field('right');

$icons = array(
    'calendrier'    => 'fas fa-calendar-alt',
    'utilisateur'   => 'fas fa-user',
    'validation'    => 'fas fa-check',
    'pouce levé'    => 'fas fa-thumbs-up',
    'panier'        => 'fas fa-shopping-cart',
    'info'          => 'fas fa-info-circle'
);

$iclass = $icons[$icon];

if($right){
    
    $imgwow = 'Left';
    
    $lft    = 'col-12 col-md-6 order-md-2 col-lg-6 order-lg-2';
    
    $rgt    = 'col-12 col-md-6 order-md-1 col-lg-6 order-lg-1';
    
}else{
    
    $imgwow = 'Right';
    
    $lft    = 'col-12 col-md-6 order-md-1 col-xxl-5 order-lg-1';
    
    $rgt    = 'col-12 col-md-6 order-md-2 col-xxl-7 order-lg-2';
    
}

?>
<section id="<?php echo esc_html($id); ?>" class="section dyptich-text ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s">
    <div class="container">
        <div class="row">
            <div class="<?php echo $lft; ?>">
                <?php if($pretitle != '') : ?>
                <span class="pretitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.85s">
                    <img src="<?= home_url(); ?>/wp-content/uploads/2021/07/start-quote.png">    
                    <?php echo $pretitle; ?>
                    <img src="<?= home_url(); ?>/wp-content/uploads/2021/07/end-quote.png"/>
                </span>
                <?php endif; ?>
                <div class="data">
                    
                    <h2 class=" wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s"><?php echo $title; ?></h2>
                    <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
                        <?php echo $desc; ?>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <div class="content-btns d-flex justify-content-between">
                        <p class="tbtn" title="<?php echo $title; ?>">
                            <a href="<?php echo $link; ?>" class="btn btn-lg btn-tertiary btn-empty uppercase wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.05s"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>>
                                <?php echo $label; ?> 
                            </a>
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
            <div class="<?php echo $rgt; ?>">
                <div class="pictures">
                    <div class="big-img wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.05s">
                        <img src="<?php echo esc_url($big['url']); ?>" alt="<?php echo esc_html($big['alt']); ?>" class="imgcrop"/>
                    </div>
                    
                    <div class="small-img wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        
                        <img src="<?php echo esc_url($small['url']); ?>" alt="<?php echo esc_html($small['alt']); ?>" class="imgcrop"/>
                        
                    </div>
                    <div class="small-img-bg-content small-img wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <div class="small-img-bg imgcrop"></div>
                    </div>

                   
                </div>
                <img class="img-spotted" src="<?= home_url(); ?>/wp-content/uploads/2021/08/tache-2.png"/>
            </div>
            
        </div>
    </div>
</section>