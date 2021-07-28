<?php

/*******************************************************************************
 * 
 * Search template
 * 
 */

global $wp_query;

global $site_data;

/**
* Thumbs ratio
*/
$thumb_ratios = array(
   '2:4 (portrait)'    => 'po24r',
   '2:3 (portrait)'    => 'po23r',
   '1:1 (carré)'       => 'square',
   '4:3 (paysage)'     => 'pa43r',
   '3:2 (paysage)'     => 'pa32r',
   '16:9 (paysage)'    => 'pa169r',
   '4:2 (paysage)'     => 'pa42r'
);

$thumb_class    = $thumb_ratios[$site_data['posts_thumb_ratio']];

$citation       = esc_html($site_data['blog_citation']);
    
$author         = esc_html($site_data['blog_citation_author']);

$citation_img   = esc_url($site_data['blog_citation_img']['url']);

$citation_alt   = esc_html($site_data['blog_citation_img']['alt']);

$ad_link        = esc_url($site_data['blog_ad_link']);

$ad_label       = esc_html($site_data['blog_ad_label']);

$ad_anchor      = esc_html($site_data['blog_ad_anchor']);

$ad_target      = $site_data['blog_ad_target'];

$ad_img         = $site_data['blog_ad_img'];

$bg             = esc_url($site_data['blog_default_img']['url']);
    
$bg_alt         = esc_html($header_img['blog_default_img']['alt']);

get_header();

?>
<section id="archive-main-title" class="section firsttitle wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container ohidden ph108">
        <img src="<?php echo $bg; ?>" alt="<?php echo $bg_alt; ?>" class="imgcrop"/>
        <div class="row">
            <div class="col-12">
                <div class="title cd-bg ph24 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
                    <h1 class="fakeh5 text-center"><?php echo esc_html(__('Recherche : ').get_search_query()); ?></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="bg ef-bg ph108">
        <?php the_breadcrumb(); ?>
    </div>
</section>
<section id="archive-subtitle" class="section archive-subtitle ph48 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.5s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="subtitle">
                    <span class="text-center"><?php echo __('Résultat de votre recheche'); ?></span>
                    <h2 class="fakeh5 text-center"><?php $count = $GLOBALS['wp_query']->found_posts < 2 ? $GLOBALS['wp_query']->found_posts.' '.__('Résultat pour votre recherche.') : $GLOBALS['wp_query']->found_posts.' '.__('résultats pour votre recherche.'); echo $count; ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section posts-archive ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <?php if($site_data['posts_list']) : ?>
        <div class="row">
            <?php
            
            if(have_posts()){
                
                while(have_posts()){
                    
                    the_post();
                    
                    $type = get_post_type(get_the_ID());
                    
                    if($type == 'post'){
                    
                        $cats = wp_get_post_categories(get_the_ID());

                    }
                    
            ?>
            <div class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <article class="post-content">
                    <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'idcomcrea'), the_title_attribute('echo=0')); ?>" itemprop="url" rel="bookmark" class="img <?php echo $thumb_class; ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'imgcrop')); ?>
                    </a>
                    <div class="data">
                        <?php if($type == 'post') : ?>
                        <div class="cat"><a href="<?php echo get_category_link($cats[0]); ?>" class="uppercase category" title="<?php echo get_cat_name($cats[0]).' - '.get_bloginfo(); ?>"><i class="fas fa-th-list"></i> <?php echo get_cat_name($cats[0]); ?></a></div>
                        <?php elseif($type == 'page') : ?>
                        <div class="cat"><a href="<?php the_permalink(); ?>" class="uppercase category" title="<?php echo get_the_title().' - '.get_bloginfo(); ?>"><i class="fas fa-eye"></i> <?php _e('Lire','idcomcrea'); ?></a></div>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'idcomcrea'), the_title_attribute('echo=0')); ?>" itemprop="url" rel="bookmark" class="post-link">
                            <h2 class="fakeh5 menu"><?php the_title(); ?></h2>
                        </a>
                        <p class="excerpt">
                            <?php echo idcom_get_excerpt(160); ?>
                        </p>
                    </div>
                    <p class="tbtn">
                        <a href="<?php echo the_permalink(); ?>" class="uppercase btn btn-lg btn-secondary btn-empty"><?php echo esc_html($site_data['post_btn_label']); ?></a>
                    </p>
                </article>
            </div>
            <?php
                    
                }
                
            }else{
                
            ?>
            <div class="col-12">
                <div class="noposts ph56">
                    <p class="text-center"><?php _e('Aucun article...'); ?></p>
                </div>
            </div>
            <?php
                
            }
            
            ?>
        </div>
        <?php else : ?>
        <?php
        
        if(have_posts()){
            
            while(have_posts()){
                
                the_post();
                
                $type = get_post_type(get_the_ID());
                    
                if($type == 'post'){

                    $cats = wp_get_post_categories(get_the_ID());

                }
                                
        ?>
        <article class="row inline-post">
            <div class="col-12 col-md-5 col-lg-5 imgpart">
                <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'idcomcrea'), the_title_attribute('echo=0')); ?>" itemprop="url" rel="bookmark" class="img <?php echo $thumb_class; ?>">
                    <?php the_post_thumbnail('medium', array('class' => 'imgcrop')); ?>
                </a>
            </div>
            <div class="col-12 col-md-7 col-lg-7 contentpart">
                <div class="data">
                    <?php if($type == 'post') : ?>
                    <div class="cat"><a href="<?php echo get_category_link($cats[0]); ?>" class="uppercase category" title="<?php echo get_cat_name($cats[0]).' - '.get_bloginfo(); ?>"><i class="fas fa-th-list"></i> <?php echo get_cat_name($cats[0]); ?></a></div>
                    <?php elseif($type == 'page') : ?>
                    <div class="cat"><a href="<?php the_permalink(); ?>" class="uppercase category" title="<?php echo get_the_title().' - '.get_bloginfo(); ?>"><i class="fas fa-eye"></i> <?php _e('Lire','idcomcrea'); ?></a></div>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('%s', 'idcomcrea'), the_title_attribute('echo=0')); ?>" itemprop="url" rel="bookmark" class="post-link">
                        <h2 class="fakeh4 menu"><?php the_title(); ?></h2>
                    </a>
                    <p class="excerpt">
                        <?php echo idcom_get_excerpt(240); ?>
                    </p>
                </div>
                <p class="tbtn">
                    <a href="<?php echo the_permalink(); ?>" class="uppercase btn btn-lg btn-secondary btn-empty"><?php echo esc_html($site_data['post_btn_label']); ?></a>
                </p>
            </div>
        </article>
        <?php
                
            }
            
        }else{
            
        ?>
        <div class="row">
            <div class="col-12">
                <div class="noposts ph56">
                    <p class="text-center"><?php _e('Aucun article...'); ?></p>
                </div>
            </div>
        </div>
        <?php
            
        }
        
        ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <p id="pagination" class="text-center">
                <?php

                global $wp_query;

                $big = 999999999; 

                echo paginate_links(array(
                    'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'    => '?paged=%#%',
                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                    'next_text' => '<i class="fa fa-angle-right"></i>',
                    'current'   => max( 1, get_query_var('paged') ),
                    'total'     => $wp_query->max_num_pages
                ));

                ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php if($site_data['blog_ad_active']) : ?>
<!-- Ad banner -->
<section id="archive-ad-banner" class="section ad-banner wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.85s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo $ad_link; ?>" class="banner" title="<?php echo $ad_anchor; ?>"<?php if($ad_target){ echo ' target="_blank" rel="noopener"'; } ?>>
                    <div class="img">
                        <img src="<?php echo esc_url($ad_img['url']); ?>" alt="<?php echo esc_html($ad_img['alt']); ?>"/>
                    </div>
                    <div class="uppercase btn btn-secondary btn-lg">
                        <span><?php echo $ad_label; ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php

endif;

if($site_data['blog_citation_active']) :

?>
<!-- Citation -->
<section id="archive-citation" class="section citation ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data">
                    <div class="img wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.15s">
                        <img src="<?php echo $citation_img; ?>" alt="<?php echo $citation_alt; ?>"/>
                    </div>
                    <div class="text">
                        <q class="proverb fakeh4 text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
                            <?php echo $citation; ?>
                        </q>
                        <?php if($author != '') : ?>
                        <p class="author text-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
                            <?php echo $author; ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

endif;

get_footer();