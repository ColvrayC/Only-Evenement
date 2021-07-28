<?php

/*******************************************************************************
 * 
 * Ad banner section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$link       = esc_url(get_field('link'));

$label      = esc_html(get_field('label'));

$anchor     = esc_html(get_field('anchor'));

$target     = get_field('target');

$img        = get_field('img');

if(is_array($img) && count($img) > 2 && $link != '' && $label != ''){

?>
<section id="<?php echo esc_html($id); ?>" class="section ad-banner wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.85s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo $link; ?>" class="banner" title="<?php echo $anchor; ?>"<?php if($target){ echo ' target="_blank" rel="noopener"'; } ?>>
                    <div class="img">
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
                    </div>
                    <div class="uppercase btn btn-secondary btn-lg">
                        <span><?php echo $label; ?></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<?php

}