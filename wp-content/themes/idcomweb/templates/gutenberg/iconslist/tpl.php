<?php

/*******************************************************************************
 * 
 * Base section Gutenberg template
 * 
 */

global $wp;

global $ID;

global $site_data;

$id         = get_field('id');

$title      = esc_html(get_field('title'));

$icons      = '';

if(have_rows('data')){
    
    while(have_rows('data')){
        
        the_row();
        
        $label      = esc_html(get_sub_field('label'));
        
        $icon       = get_sub_field('icon');
                
        if($icon['mime_type'] == 'image/svg+xml'){
            
            $icon_path  = wp_get_original_image_path($icon['ID']);
        
            $icon_data  = file_get_contents($icon_path);
            
            $data_icon  = '<div class="svg-icon">'.$icon_data.'</div>';
            
        }else{
            
            $data_icon = '<img src="'.esc_url($icon['url']).'" alt="'.esc_html($icon['alt']).'"/>';
            
        }
        
        $item       = '<div class="item">
    <div class="icon">'.$data_icon.'</div>
    <span>'.$label.'</span>
</div>';
        
        $icons      .= $item;   
        
    }
    
}

?>
<section id="<?php echo esc_html($id); ?>" class="section iconslist ph32 wow fadeIn" data-wow-duration="0.5s" data-wow-delay="1.25s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title fakeh5 text-center"><span><?php echo $title; ?></span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="data">
                    <?php echo $icons; ?>
                </div>
            </div>
        </div>
    </div>
</section>