<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template-
 * 
 */

global $wp;

global $ID;

global $site_data;

$id            = get_field('id');

$title         = get_field('title');

$description   = esc_html(get_field('description'));

$pictures      = '';

if(have_rows('pictures')){

    while(have_rows('pictures')){
    
        the_row();

        $filter   = get_sub_field('filter');
        $imgs    = get_sub_field('imgs');

        $n = 0;

        foreach ($imgs as $img){ 
            
            $item = '
            <div id="pic-'.$id.'-'.$n.'" class="picture pswpi wow fadeIn" data-wow-duration="0.5s" data-id="'.$n.'" data-cropped="true" data-caption="'.esc_html($img['alt']).'" data-src="'.$img['url'].'" data-width="100" data-height="100">
                <figure class="img" title="'.esc_html($img['alt']).'" itemprop="associatedMedia" itemscope itemtype="https://schema.org/ImageObject">
                    <img src="'.$img['sizes']['medium_large'].'" itemprop="thumbnail" alt="'.esc_html($img['alt']).'" class="imgcrop"/>
                    <div class="overlay"><i class="icon-eye"></i></div>
                    <figcaption itemprop="caption description">'.esc_html($img['alt']).'</figcaption>
                </figure>
            </div>';

            $pictures .= $item;
            $n++;
          } 
 
    }   
}
?>
<section id="<?php echo esc_html($id); ?>" class="section gallery mh120 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s" data-idcom-js="idcomPicturesGallery">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="heading mhb48">
                    <h2 class="text-center"><?php echo $title; ?></h2>
                    <?php if($description != '') : ?>
                    <p class="pretitle uppercase text-center"><?php echo $description; ?></p>
                    <?php endif; ?>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div id="gallery-<?php echo esc_html($id); ?>" class="img-gallery">
                    <?php echo $pictures; ?>
                </div>
            </div>
        </div>
    </div>
</section>