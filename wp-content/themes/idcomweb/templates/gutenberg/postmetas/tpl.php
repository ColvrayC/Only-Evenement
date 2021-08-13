<?php

/*******************************************************************************
 * 
 * Single post metas section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$date       = get_field('date');

$category   = get_field('category');

$views      = get_field('views');

$tags       = get_field('tags');

if($date){
    
    $the_date = '<i class="fas fa-calendar-alt"></i> '.get_the_date('d M Y', $ID);
    
}


    
    $the_cat    = '<a href="/blog/" title="Blog"><i class="fas fa-th-list"></i> Blog</a>';
    


if($views){
    
    $the_views = idcom_get_post_view();

    $the_views = '<i class="fas fa-eye"></i> '.$the_views;
    
}

if($tags){
    
    // Keywords
    $post_tags  = get_the_tags($ID);
    
    $the_tags   = '';

    for($i=0; $i<count($post_tags); $i++){
        
        /**
         * Si tags séparés d'une virgule
         * 
         * $separator = $i == count($post_tags)-1 ? '' : ', ';
         * 
         */

        $separator = $i == count($post_tags)-1 ? '' : '';
        
        $the_tags .= '<a href="'.get_tag_link($post_tags[$i]->term_id).'" class="tag">'.$post_tags[$i]->name.'</a>'.$separator;

    }
    
    // $the_tags    = $the_tags != '' ? '<i class="fas fa-tags"></i> '.$the_tags : '';
    
    $the_tags    = '<i class="fas fa-tags"></i> '.$the_tags;
    
}

?>
<section id="single-post-metas" class="section postmetas ph24 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="first-row">
                    <p class="part">
                        <?php if($date) : ?>
                        <span class="date wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.15s"><?php echo $the_date; ?></span>
                        <?php endif; ?>
                        <?php if($category) : ?>
                        <span class="cat wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s"><?php echo $the_cat; ?></span>
                        <?php endif; ?>
                        <?php if($views) : ?>
                        <span class="views wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.35s"><?php echo $the_views; ?></span>
                        <?php endif; ?>
                    </p>
                </div>
                <?php if($tags && $post_tags) : ?>
                <div class="last-row wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.45s">
                    <p class="part tags align-items-center"><?php echo $the_tags; ?></p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>