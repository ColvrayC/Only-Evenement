<?php

/*******************************************************************************
 * 
 * List section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$title      = esc_html(get_field('title'));

$list       = esc_html(get_field('list'));

$list       = explode(PHP_EOL, $list);

$column     = get_field('column');

$icon       = get_field('icon');

$icons      = array(
    'Pas d\'icône'              => '',
    'Icône validé'              => 'fas fa-check',
    'Icône calendrier'          => 'fas fa-calendar-alt',
    'Icône utilisateur'         => 'fas fa-user',
    'Icône flèche à droite'     => 'fas fa-arrow-right'
);

$icon       = $icon != 'Pas d\'icône' ? '<i class="'.$icons[$icon].'"></i>' : '';



?>
<section id="" class="section listsection ph32 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title fakeh5 text-center"><span><?php echo $title; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <?php if($column) : ?>
            <div class="col-12">
                <ul class="<?php if($column){ echo 'center'; } ?>">
                    <?php
                    
                    for($i=0; $i<count($list); $i++){
                        
                    ?>
                    <li><?php echo $icon.' '.$list[$i]; ?></li>
                    <?php
                        
                    }
                    
                    ?>
                </ul>
            </div>
            <?php else : ?>
            <div class="col-12 col-md-1 col-lg-2"></div>
            <div class="col-12 col-md-5 col-lg-4">
                <ul class="<?php if(!$column){ echo 'bicolumns'; } ?>">
                    <?php
                
                    for($i=0; $i<(ceil(count($list)/2)); $i++){

                    ?>
                    <li><?php echo $icon.' '.$list[$i]; ?></li>
                    <?php

                    }

                    ?>
                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-4">
                <ul class="<?php if(!$column){ echo 'bicolumns'; } ?>">
                    <?php
                
                    for($i=(floor(count($list)/2)+1); $i<count($list); $i++){

                    ?>
                    <li><?php echo $icon.' '.$list[$i]; ?></li>
                    <?php

                    }

                    ?>
                </ul>
            </div>
            <div class="col-12 col-md-1 col-lg-2"></div>
            <?php endif; ?>
        </div>
    </div>
</section>