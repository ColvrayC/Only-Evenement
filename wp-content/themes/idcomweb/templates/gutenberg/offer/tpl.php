<?php

/*******************************************************************************
 * 
 * Text + images section Gutenberg template
 * 
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$title      = esc_html(get_field('title'));

$subtitle      = esc_html(get_field('title'));

$container_text = '';

$offers = '';


if(have_rows('offer')){
    while(have_rows('offer')){
        the_row();

        $title  = get_sub_field('title');
        $price  = get_sub_field('price');
        $label  = get_sub_field('label');
        $link  = get_sub_field('link');


        if(have_rows('steps')){
            while(have_rows('steps')){
                the_row();
                $title  = get_sub_field('title');
                $desc  = get_sub_field('desc');
            }
        }

            $item = 
            '
            <h4>'.$title.'</h4>
            <p>'.$description.'</p>
            ';
        

        $offers .= $item;
    }
}

if(have_rows('texts')){
    while(have_rows('texts')){
        the_row();

        $subtitle  = get_sub_field('subtitle');

        $description  = get_sub_field('description');
        if($subtitle != ''){
            $item = 
            '
            <h4>'.$subtitle.'</h4>
            <p>'.$description.'</p>
            ';
        }
        else{
            $item = 
            '
            <p>'.$description.'</p>
            ';
        }
        $container_text .= $item;
    }
}

?>
<section id="<?php echo esc_html($id); ?>" class="section imgtext mht96 mhb64 pb-0 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid">
        <div class="row">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="row">
             <!-- Start offers -->
            <div class="col-12 col-lg-6 my-5 my-lg-0 text-center order-2 order-lg-1">
            
            </div>
            <!-- End offers -->

            <!-- Start Text -->
            <div class="col-12 col-lg-6 order-1 order-lg-2">
            <div class="content right">
                    <div class="heading">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="desc">
                        <?php echo  $container_text; ?>
                    </div>
                </div>
            <!-- End Text -->
        </div>
    </div>
</section>