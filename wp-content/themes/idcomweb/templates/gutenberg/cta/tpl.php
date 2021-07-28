<?php

/*******************************************************************************
 * 
 * Call To Action section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$pretitle       = esc_html(get_field('pretitle'));

$title          = esc_html(get_field('title'));

$list           = esc_html(get_field('data'));

$list           = explode(PHP_EOL, $list);

$icon           = get_field('icon');

$icons          = array(
    'Pas d\'icône'              => '',
    'Icône validé'              => 'fas fa-check',
    'Icône calendrier'          => 'fas fa-calendar-alt',
    'Icône utilisateur'         => 'fas fa-user',
    'Icône flèche à droite'     => 'fas fa-arrow-right'
);

$icon           = $icon != 'Pas d\'icône' ? '<i class="'.$icons[$icon].'"></i>' : '';

$link           = esc_url(get_field('link'));

$label          = esc_html(get_field('label'));

$btn_full       = get_field('btn_full');

$btn_full       = $btn_full ? '' : ' btn-empty';

$target         = get_field('target');

$target         = $target ? ' target="_blank" rel="noopener"' : '';

$img            = get_field('img');

$right          = get_field('img_right');

if($right){
    
    $i_class    = 'col-12 order-xs-2 col-xs-12 order-sm-2 col-md-6 order-md-2 col-lg-5 order-lg-2';
    
    $t_class    = 'col-12 order-xs-1 col-xs-12 order-sm-1 col-md-6 order-md-1 col-lg-7 order-lg-1';
    
}else{
    
    $i_class    = 'col-12 order-xs-1 col-xs-12 order-sm-1 col-md-6 order-md-1 col-lg-5 order-lg-1';
    
    $t_class    = 'col-12 order-xs-2 col-xs-12 order-sm-2 col-md-6 order-md-2 col-lg-7 order-lg-2';
    
}

?>
<section id="" class="section cta ef-bg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="<?php echo $i_class; ?>">
                <div class="img">
                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>" class="imgcrop"/>
                </div>
            </div>
            <div class="<?php echo $t_class; ?>">
                <div class="data">
                    <?php if($pretitle != '') : ?>
                    <span class="pretitle uppercase"><?php echo $pretitle; ?></span>
                    <?php endif; ?>
                    <h2 class="title fakeh3"><?php echo $title; ?></h2>
                    <?php if(count($list) > 0) : ?>
                    <ul>
                    <?php
                    
                    for($i=0; $i<count($list); $i++){
                        
                        ?>
                        <li><?php echo $icon.' '.$list[$i]; ?></li>
                        <?php
                        
                    }
                    
                    ?>
                    </ul>
                    <?php endif; ?>
                    <?php if($link != '' && $label != '') : ?>
                    <p class="tbtn">
                        <a href="<?php echo $link; ?>" class="uppercase btn btn-md btn-secondary<?php echo $btn_full; ?>">
                            <i class="fas fa-calendar-alt"></i> <?php echo $label; ?>
                        </a>
                    </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>