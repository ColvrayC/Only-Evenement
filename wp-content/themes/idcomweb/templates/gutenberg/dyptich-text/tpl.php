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
    
    $lft    = 'col-12 col-md-6 order-md-1 col-lg-6 order-lg-1';
    
    $rgt    = 'col-12 col-md-6 order-md-2 col-lg-6 order-lg-2';
    
}

?>
<section id="<?php echo esc_html($id); ?>" class="section dyptich-text ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s">
    <div class="container">
        <div class="row">
            <div class="<?php echo $lft; ?>">
                <div class="data">
                    <span class="pretitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.85s"><?php echo $pretitle; ?></span>
                    <h2 class="title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s"><?php echo $title; ?></h2>
                    <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
                        <?php echo $desc; ?>
                    </div>
                    <?php if($link != '' && $label != '') : ?>
                    <p class="tbtn" title="<?php echo $title; ?>">
                        <a href="<?php echo $link; ?>" class="uppercase btn btn-lg btn-secondary <?php if(!$btn){ echo 'btn-empty '; } ?>wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="1.05s"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>>
                            <?php echo $label; ?> <i class="fas fa-long-arrow-alt-right"></i>
                        </a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="<?php echo $rgt; ?>">
                <div class="pictures">
                    <div class="big-img wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.05s">
                        <img src="<?php echo esc_url($big['url']); ?>" alt="<?php echo esc_html($big['alt']); ?>" class="imgcrop"/>
                    </div>
                    <?php if(!$istext) : ?>
                    <div class="small-img wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <img src="<?php echo esc_url($small['url']); ?>" alt="<?php echo esc_html($small['alt']); ?>" class="imgcrop"/>
                    </div>
                    <?php else : ?>
                    <div class="small-txt cd-bg wow fadeIn<?php echo $imgwow; ?>" data-wow-duration="0.5s" data-wow-delay="1.25s">
                        <div class="data">
                            <p class="icon text-center"><i class="<?php echo $iclass; ?>"></i></p>
                            <p class="text-center"><?php echo $small_txt ?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>