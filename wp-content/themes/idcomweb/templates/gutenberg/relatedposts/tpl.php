<?php

/*******************************************************************************
 * 
 * Related posts section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$title          = esc_html(get_field('title'));

$title          = strlen($title) > 0 ? $title : __('Articles relatifs','idcomcrea');

$count          = get_field('count');

$random         = get_field('random');

$full           = get_field('full');

$container      = $full ? 'fluid-container' : 'container';

$mgb            = !$full ? ' mgbottom' : '';

// Related posts
if($random){
    
    $args = array(
        'post_type'         => 'post',
        'posts_per_page'    => 12,
        'post_status'       => 'publish',
        'post__not_in'      => array($ID),
        'orderby'           => 'rand'
    );
    
}else{
    
    $args = array(
        'post_type'         => 'post',
        'posts_per_page'    => 12,
        'post_status'       => 'publish',
        'post__not_in'      => array($ID),
        'orderby'           => 'date',
        'order'             => 'DESC'
    );
    
}

$q = new WP_Query($args);

$slider = '';

while($q->have_posts()){
    
    $q->the_post();
        
    $item = '<div class="swiper-slide">
    <a href="'.get_the_permalink().'" class="picture" title="'.get_the_title().'">
        '.get_the_post_thumbnail(get_the_ID(), 'large', array('class' => 'imgcrop')).'
        <div class="data">
           
        </div>
        <div class="heading position-relative">
            <div class="d-flex justify-content-left align-items-baseline">
              
                <h6>Article / '.get_the_date('d.m.Y') .'</h6>
            </div>
            <div class="d-flex justify-content-left align-items-baseline">
               
                <h3 class="">'.get_the_title().'</h3>
            </div>
        </div>
    </a>
    
</div>';
    
    $slider .= $item;
        
}

wp_reset_postdata();

if($slider != ''){
    
    $the_ID = 'related-'.strval($ID).'-posts';
    
?>
<section id="<?php echo $the_ID; ?>" class="section related-posts wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s" data-idcom-js="idcomRelatedPosts">
    <div class="<?php echo $container; ?>">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center related-posts"><?php echo $title; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="<?php echo $the_ID; ?>-swiper" class="swiper-container<?php echo $mgb; ?>">
                    <div class="swiper-wrapper">
                        <?php echo $slider; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

}