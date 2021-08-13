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

$title_2      = esc_html(get_field('subtitle'));

$container_text = '';

$offers = '';


if(have_rows('offers')){
    while(have_rows('offers')){ 
        the_row();

        $title_offer  = get_sub_field('title_offer');
        $price  = get_sub_field('price');
        $label  = get_sub_field('label');
        $link  = get_sub_field('link');

        $item = '
        <div class="section-offer col-12 col-sm-6">
            <div class="content-offer">
                <div class="header">
                    <h5>Formule<br>'.$title_offer.'</h5>
                </div>
        ';

        if(have_rows('steps')){
            $i = 0;
            $item .= ' 
            <div class="content-offer-desc">
            ';
            while(have_rows('steps')){
                the_row();
                $subtitle_offer  = get_sub_field('subtitle_offer');
                $desc  = get_sub_field('desc');

                $item .= '
                    <h6>'.$subtitle_offer.'</h6>
                    <p>'.$desc.'</p>
                ';

                $i++;
            }
            $item .= ' 
            </div>
            ';
        }
        $item .= '
                <div class="price">'.$price.'</div> 
                <div class="subtitle-price">le rendez-vous</div> 
                <div class="tbtn">
                    <a class="btn btn-lg btn-tertiary btn-empty uppercase btn-first" href="'.$link.'">'.$label.'</a> 
                </div>
            </div>
        </div>
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
            ';

            if($description != ''){
            $item .=$description;
            };
        }
    
        $container_text .= $item;
    }
}

?>
<section id="<?php echo esc_html($id); ?>" class="section offer mht96 mhb64 pb-0 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container-fluid">
        <div class="row">
            <h2 class="main-title"><?php echo $title; ?></h2>
        </div>
        <div class="row">
            <div class="row mx-auto col-12 col-lg-7 col-xl-6">
             <!-- Start offers -->
            <?= $offers ?>
            </div>
    
            <!-- End offers -->

            <!-- Start  Text -->
            <div class="col-12 col-lg-5 col-xl-6">
            <div class="content right">
                    <div class="heading">
                        <h2><?php echo $title_2; ?></h2>
                    </div>
                    <div class="desc">
                        <?php echo  $container_text; ?>
                    </div>
                </div>
            <!-- End Text -->
        </div>
    </div>
</section>