<?php

/*******************************************************************************
 * 
 * News section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$title      = esc_html(get_field('title'));

$all        = get_field('all');

$highlighted = '';





if($all){
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'posts_per_page'    => 6,
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_status'       => 'publish',
        'post__not_in'      => array($h_ID),
        'paged'             => $paged,
        'nopaging'          => false,
    );
    }
else{
    $args = array(
        'posts_per_page'    => 2,
        'orderby'           => 'post_date',
        'order'             => 'DESC',
        'post_status'       => 'publish'
    );
}

global $q;

$q = new WP_Query($args);

?>
<section id="<?php echo esc_html($id); ?>" class="section news ph56 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <div class="container">
        <div class="content-title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="row">
            <?php if($all) : ?>
                <?php
                if($q->have_posts()){
                                            
                    while($q->have_posts()){
                        $q->the_post();
                        ?>
                        <div class="col-12 col-md-6 article">
                            <a href="<?php echo get_the_permalink(); ?>" title="" class="post">
                            
                                <div class="thumb">
                                    <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array('class' => '')); ?>
                                </div>
                                <div class="heading">
                                    <div class="d-flex justify-content-left align-items-baseline">
                                        <hr>
                                        <h6>Article / <?php echo get_the_date('d.m.Y') ?></h6>
                                    </div>
                                    <div class="d-flex justify-content-left align-items-baseline">
                                        <hr style="visibility: collapse">
                                        <h3 class=""><?php echo get_the_title(); ?></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                }
                ?>
          
           
                <p id="pagination" class="text-center">
                    <?php

                    global $q;
                    
                    $big = 999999999;

                    echo paginate_links(array(
                        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format'    => '?paged=%#%',
                        'prev_text' => '<i class="fas fa-long-arrow-alt-left"></i><span class="prev-button">AVANT</span>',
                        'next_text' => '<span class="next-button">APRÈS</span><i class="fas fa-long-arrow-alt-right"></i>',
                        'current'   => max(1, get_query_var('paged')),
                        'total'     => $q->max_num_pages
                    ));

                    ?>
                </p>
                <!-- imgs bk -->
                <img class="img-spotted" src="<?= home_url(); ?>/wp-content/uploads/2021/08/tache-1.png"/>
                <img class="img-line" src="<?= home_url(); ?>/wp-content/uploads/2021/08/trait-vertical-2.png"/>
                <?php if ($q->post_count > 5) : ?>
                    <img class="img-spotted-bottom" src="<?= home_url(); ?>/wp-content/uploads/2021/08/tache-1.png"/>
                    <img class="img-line-bottom" src="<?= home_url(); ?>/wp-content/uploads/2021/08/trait-inverse.png"/>
                <?php endif; ?>

            <?php else : ?>
                <div class="not-all row">
                    <?php
                    if($q->have_posts()){
                                                
                        while($q->have_posts()){
                            $q->the_post();
                            $q_ID   = get_the_ID();
                            ?>
                            <div class="col-12 col-md-6 article">
                                <a href="<?php echo get_the_permalink(); ?>" title="" class="post">
                                
                                    <div class="thumb">
                                        <div class="content-img">
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'large', array('class' => '')); ?>
                                        
                                            <div class="date-post">
                                                <? setlocale(LC_TIME, "fr_FR"); ?>
                                                <h6 class="date-number"><?php echo get_the_date('d') ?></h6>
                                                <span class="date-month"><?php echo mb_substr(get_the_date(strftime("F")),0, 3); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="heading">
                                        <h3 class=""><?php echo get_the_title(); ?></h3>
                                       
                                        <div class="d-flex justify-content-left align-items-baseline">
                                            <?= idcom_get_excerpt(200,$q_ID);?>
                                        </div>
                                        
                                    </div>
                                    
                                </a>
                                <div class="tbtn test">
                                    <a href="<?php echo get_the_permalink(); ?>" title="<?php echo esc_html('Toutes les actualités','idcomcrea'); ?>" class="btn btn-lg btn-tertiary btn-empty uppercase btn-right">EN SAVOIR PLUS</a>
                                </div>
                            </div>
                            
                           
                         <?php
                        }
                    }
                    ?>
                    <img class="img-spotted-left" src="<?= home_url()?>/wp-content/uploads/2021/08/tache-2.png">
                    <img class="img-spotted-right" src="<?= home_url()?>/wp-content/uploads/2021/08/tache-1.png">
                </div>
            <?php endif; ?>
        </div>
       
    </div>
</section>