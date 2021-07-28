<?php

/*******************************************************************************
 * 
 * Prev/next posts section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

// Navigation -> next/prev
$prev_post  = get_previous_post();

$next_post  = get_next_post();

?>
<section id="prevnext-<?php echo esc_html($ID); ?>-posts" class="section prev-next-posts wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.95s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if($prev_post) : ?>
                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="post-nav-left">
                    <div class="img">
                        <?php echo get_the_post_thumbnail($prev_post->ID, 'medium', array('class' => 'imgcrop')); ?>
                        <div class="overlay"></div>
                    </div>
                    <div class="arrow">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="title">
                        <?php echo get_the_title($prev_post->ID); ?>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            <div class="col-12">
                <?php if($next_post) : ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>" class="post-nav-right">
                    <div class="img">
                        <?php echo get_the_post_thumbnail($next_post->ID, 'medium', array('class' => 'imgcrop')); ?>
                        <div class="overlay"></div>
                    </div>
                    <div class="arrow">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="title">
                        <?php echo get_the_title($next_post->ID); ?>
                    </div>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>