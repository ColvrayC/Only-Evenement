<?php

/*******************************************************************************
 * 
 * Posts slider section Gutenberg template
 * 
 */

global $wp;

global $wpdb;

global $ID;

global $site_data;

$id             = get_field('id');

$title          = esc_html(get_field('title'));

$count          = esc_html(get_field('count'));

$cat            = get_field('cat');

$label          = esc_html(get_field('label'));

$args = array(
    'cat'               => $cat,
    'orderby'           => 'ID',
    'order'             => 'DESC',
    'posts_per_page'    => $count,
    'post_status'       => 'publish'
);

$q = new WP_Query($args);

$slider = '';

if($q->have_posts()){
    
    while($q->have_posts()){
        
        $q->the_post();
        
        $cats = wp_get_post_categories(get_the_ID());
                
        $item = '<div class="swiper-slide" itemscope itemtype="http://schema.org/Article">
    <div class="content">
        <a href="'.get_the_permalink().'" class="link" title="'.get_the_title().'" itemprop="image" content="'.get_the_post_thumbnail_url(get_the_ID(), 'medium').'">
            '.get_the_post_thumbnail(get_the_ID(), 'medium', array( 'class' => 'imgcrop')).'
        </a>
        <div class="data">
            <div class="cat"><a href="'.get_category_link($cats[0]).'" class="category" title="'.get_cat_name($cats[0]).' - '.get_bloginfo().'">'.get_cat_name($cats[0]).'</a></div>
            <a href="'.get_the_permalink().'" class="post" title="'.get_the_title().'"><h3 class="fakeh5" itemprop="name">'.get_the_title().'</h3></a>
            <p class="excerpt">'.idcom_get_excerpt(120, get_the_ID()).'</p>
        </div>
    </div>
</div>';
        
        $slider .= $item;
        
    }
    
}

?>
<section id="<?php echo esc_html($id); ?>" class="section posts-slider de-bg ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s" data-idcom-js="idcomPostsSlider">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s"><?php echo $title; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="<?php echo esc_html($id); ?>-swiper" class="swiper-container ph56">
                    <div class="swiper-wrapper">
                        <?php echo $slider; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($label != '') : ?>
        <div class="row">
            <div class="col-12">
                <p class="tbtn">
                    <a href="<?php echo get_category_link($cat); ?>" title="<?php echo get_cat_name($cat).' - '.get_bloginfo(); ?>">
                        <?php echo $label; ?> <i class="fas fa-caret-right"></i>
                    </a>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>