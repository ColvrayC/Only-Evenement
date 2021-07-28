<?php

/*******************************************************************************
 * 
 * Citation section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$citation   = esc_html(get_field('citation'));

$author     = esc_html(get_field('author'));

$img        = get_field('img');

?>
<section id="<?php echo esc_html($id); ?>" class="section citation ph72 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.75s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="data">
                    <?php if(is_array($img) && count($img) > 2) : ?>
                    <div class="img wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.15s">
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_html($img['alt']); ?>"/>
                    </div>
                    <?php endif; ?>
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