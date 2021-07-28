<?php

/*******************************************************************************
 * 
 * Video section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id             = get_field('id');

$title          = esc_html(get_field('title'));

$desc           = wp_kses_post(get_field('desc'));

$video          = get_field('video');

$check_video    = substr($video, 0, 3);

$check_video    = $check_video == '<if' ? 'iframe' : 'mp4';

$right          = get_field('right');

if($right){
    
    $t_class    = 'col-12 col-md-6 order-md-1 col-lg-6 order-lg-1';
    
    $v_class    = 'col-12 col-md-6 order-md-2 col-lg-6 order-lg-2';
    
}else{
    
    $t_class    = 'col-12 col-md-6 order-md-2 col-lg-6 order-lg-2';
    
    $v_class    = 'col-12 col-md-6 order-md-1 col-lg-6 order-lg-1';
    
}

?>
<section id="<?php echo esc_html($id); ?>" class="section video ef-bg ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
    <div class="container">
        <?php if($desc == '') : ?>
        <div class="row">
            <div class="col-12">
                <h2 class="text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $title; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3"></div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="resp-video<?php if($check_video == 'mp4'){ echo ' local'; } ?>">
                    <?php echo $video; ?>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-3"></div>
        </div>
        <?php elseif($desc != '') : ?>
        <div class="row">
            <div class="<?php echo $t_class; ?>">
                <h2 class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $title; ?></h2>
                <div class="desc wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <?php echo $desc; ?>
                </div>
            </div>
            <div class="<?php echo $v_class; ?>">
                <div class="resp-video<?php if($check_video == 'mp4'){ echo ' local'; } ?>">
                    <?php echo $video; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>