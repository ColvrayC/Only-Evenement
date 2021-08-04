<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id     = get_field('id');

$testimonials      = '';

if(have_rows('testimonials')){

    while(have_rows('testimonials')){
    
        the_row();

        $name   = get_sub_field('name');
        $text    = get_sub_field('text');
            
        $item = ' 
            <div id="testimonial-'.$id.'" class="col-12 col-md-6 col-lg-4">
                <div class="content-quote mx-auto">
                    <img src="'. home_url().'/wp-content/uploads/2021/08/quote-large.png">
                </div>

                <div class="content-name">
                    '.$name.'
                </div>

                <div class="content-text mx-auto">
                    '.$text.'
                </div>
            </div>';

        $testimonials .= $item;
        
    }   
}
?>
<section id="<?php echo esc_html($id); ?>" class="section testimonials wysiwyg wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
   
    <div class="container">
        <div class="content-title">
            <h2>Nos témoignages</h2>
        </div>
        <div class="row">
            <?= $testimonials ?>
        </div>
        <!-- Start Images Background -->
        <img class="img-bg img-bg-left" src="<?= home_url()?>/wp-content/uploads/2021/08/feuilles.png">
        <img class="img-bg img-bg-right" src="<?= home_url()?>/wp-content/uploads/2021/08/trait.png">
        <!-- End images background -->
    </div>
   
</section>