<?php

/*******************************************************************************
 * 
 * Hook text section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id                 = get_field('id');

$presubtitle        = esc_html(get_field('presubtitle'));

$subtitle           = esc_html(get_field('subtitle'));

$hook               = esc_html(get_field('hook'));

$link               = esc_url(get_field('link'));

$label              = esc_html(get_field('label'));

$btn_full           = get_field('btn_full');

$btn_full           = $btn_full ? '' : ' btn-empty';

$target             = get_field('target');

$target             = $target ? ' target="_blank" rel="noopener"' : '';

?>
<section id="<?php echo esc_html($id); ?>" class="section hook-text archive-subtitle ph48 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.05s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="subtitle">
                    <span class="text-center"><?php echo $presubtitle; ?></span>
                    <h2 class="fakeh5 text-center"><?php echo $subtitle; ?></h2>
                    <p class="hook"><?php echo $hook; ?></p>
                </div>
            </div>
        </div>
        <?php if($link != '' && $label != '') : ?>
        <div class="row">
            <div class="col-12">
                <p class="tbtn">
                    <a href="<?php echo $link; ?>" class="uppercase btn btn-lg btn-secondary<?php echo $btn_full; ?>" title="<?php echo $subtitle; ?>"<?php echo $target; ?>>
                        <?php echo $label; ?> <i class="fas fa-long-arrow-alt-right"></i>
                    </a>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>