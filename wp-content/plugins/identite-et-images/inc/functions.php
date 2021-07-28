<?php

/**
 * Inclusion des options par défaut
 */
require BOZPROD_ROOT_PATH.'/inc/options.php';

/**
 * Options
 */
global $bozprod_opts;

if(!get_option('bozprod_options')){
        
    add_option('bozprod_options',$bozprod_options,'','yes');
    
    $bozprod_opts = get_option('bozprod_options');
    
}else{
        
    $bozprod_opts = get_option('bozprod_options');
    
}

/**
 * Scripts css et js
 */
function bozprod_admin_scripts($hook){
    
    $boz_pages = array(
        'toplevel_page_bozprod'
    );
    
    if(in_array($hook,$boz_pages)){
        
        wp_enqueue_style('tagsinput_css',BOZPROD_ROOT_URL.'assets/js/tagsinput/jquery.tagsinput.css',array(),BOZPRODv,'all');
        wp_enqueue_style('select2_css','https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css',array(),BOZPRODv,'all');
        wp_enqueue_style('colorpicker_css',BOZPROD_ROOT_URL.'assets/js/colorpicker/css/colorpicker.css',array(),BOZPRODv,'all');
        
        wp_register_script('inputmask_js',BOZPROD_ROOT_URL.'assets/js/inputmask/jquery.inputmask.bundle.min.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('inputmask_js');
        
        wp_register_script('tagsinput_js',BOZPROD_ROOT_URL.'assets/js/tagsinput/jquery.tagsinput.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('tagsinput_js');
        
        wp_register_script('select2_js','https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('select2_js');
        
        wp_register_script('tinymce_js',BOZPROD_ROOT_URL.'assets/js/tinymce/tinymce.min.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('tinymce_js');
        
        wp_register_script('colorpicker_js',BOZPROD_ROOT_URL.'assets/js/colorpicker/js/colorpicker.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('colorpicker_js');
        
        wp_enqueue_style('font_awesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('boz_admin_css',BOZPROD_ROOT_URL.'assets/css/admin.css',array(),BOZPRODv,'all');
        
        wp_register_script('boz_admin_js',BOZPROD_ROOT_URL.'assets/js/admin.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('boz_admin_js');
        
    }
    
}

/**
 * Ajout du lien dans le menu
 */
function bozprod_build_menu(){
    
    $icon = base64_encode('<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 24.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 353.4 512" style="enable-background:new 0 0 353.4 512;" xml:space="preserve">
<g>
    <g>
        <path d="M351.5,345.2c-74.3-21.6-133.7-92.6-142.3-168.9c-0.3-2.9-0.3-5.8-0.9-8.7c-3.7-17.2-19.6-28.9-36.2-26.7
                c-17.6,2.3-30.6,17.9-28.9,35.9c9.9,107.2,85.1,193.9,172.5,225.5c7.1,2.5,15,2.6,22.5,3.8c-3.7,20.1-8.7,23.3-29.1,15.6
                c-65.5-24.8-115.1-68.5-149.9-129c-19.8-34.4-31.8-71.4-35.8-111c-3.2-31.3,16.4-57.1,46.8-60.8c28.7-3.6,54.5,17.7,58.6,48.2
                c1.1,8.1,1.7,16.5,3.8,24.3c15.8,58.7,50.9,101.3,106.6,126.3C354.8,326.5,355,326.2,351.5,345.2z"/>
        <path d="M352.4,284.3c0,6.1,0,12.2,0,19.9c-5.2-2-9.3-3-12.9-5c-53.4-29.3-86.3-73.2-94.9-134.3c-5.8-41.3-41.9-66.9-82.9-59.2
                c-34.2,6.4-59.3,42.8-55,73.2c3,21.4,4.8,43.3,3.8,64.9c-1.6,35-21.4,58.7-53.7,70.5c-17,6.2-35.3,8.9-54.8,13.6
                c0-8.6,0-14.5,0-21.2c10.8-2.1,21.8-3.8,32.5-6.4c41.5-10.1,59.3-33.7,57.4-76.5c-0.6-13-2.5-26-4.6-38.9
                c-8.2-50.8,31.7-93.5,74.4-99.6c50.4-7.2,96.3,25.6,102.6,74c7.1,54.5,35.4,94,82.5,121c1.3,0.7,2.5,1.5,3.7,2.3
                C351.1,283,351.7,283.7,352.4,284.3z"/>
        <path d="M352,257.5c-34.2-23-56.7-51.3-62.1-91c-7.4-53.8-39.5-91.3-88.9-102.3c-85.2-19-151.8,59.5-135.7,128
                c2.8,12,2.5,25.1,1.8,37.6c-1.5,26.1-14.8,42-39.9,48.9c-7.8,2.2-16,3-25.3,4.7c0-7.3,0-13.3,0-19.9c6.2-1.3,12.3-2.3,18.4-3.8
                c17.8-4.2,27.1-14,27.8-32.3c0.5-11.5-0.5-23.4-2.9-34.6C30.3,124.7,86.2,47,165.8,41.5C243,36.1,302.6,93.8,309,159.1
                c2.6,26.3,13.9,48.7,33.8,65.5C353.6,233.7,354.6,243.1,352,257.5z"/>
        <path d="M351.8,205.4c-11.5-12.6-16.4-26.2-17.7-41.7c-6.5-76.9-68.8-138.8-145.7-145.1C113.1,12.5,42.8,61.9,25.2,136.4
                c-5.6,23.6-3.9,48.9-4.9,73.5c-0.5,13-4.4,23.2-18,29C-5.3,160,2.8,87.1,71.8,36.5c57.1-41.9,120-48.1,183.5-16.4
                c63.4,31.6,95.2,85.5,98,156.3c0.3,8.2,0,16.5,0,24.7C353.2,201.9,352.7,202.8,351.8,205.4z"/>
        <path d="M319.1,441.7c-10.5,18.7-11.6,20-28,12c-23.4-11.4-46.8-23.2-68.5-37.6c-25.6-16.9-49.8-18.9-75.6-2.2
                c-28,18.1-59,28.6-91.6,34.7c-17,3.2-17,3.1-26.1-15.4c12.8-2.7,25.5-5.1,38-7.9c24.7-5.6,47.9-15.1,69.4-28.6
                c33-20.8,64.4-19.9,96.1,2.4C259,417.5,286.7,433,319.1,441.7z"/>
        <path d="M351.2,366.7c-1.3,6.1-2.4,11.2-4,19c-9.1-1.9-18.3-2.4-26.3-5.8C231.9,342,181,274.6,166.3,179.4
                c-1.1-7.4,0-14.5,8.7-15.4c9.1-1,10.4,6.2,11.4,13.4c8.9,64.7,40.1,116.4,91.6,155.9C302,351.8,322.1,360.6,351.2,366.7z"/>
        <path d="M62.5,472.2c21.3-7.1,41.7-12.9,61.3-20.8c13.4-5.3,25.8-13.2,38.4-20.3c15-8.5,28.9-7.6,43.7,1.2
                c24.4,14.6,49.6,27.9,74.4,41.8c1.5,0.9,3,1.8,4.7,2.7c-14.1,15.1-15.1,15.9-30.9,7.5c-19.6-10.5-38.8-21.8-57.4-33.7
                c-9.4-6-16.8-5.7-26.7-0.8c-23.7,11.8-48.2,22-72.4,32.9C83,489.4,71.7,485.2,62.5,472.2z"/>
        <path d="M14.8,408.3c-2.4-6.6-4.5-12.2-6.9-18.9c16.8-2.7,32-4.9,47.1-7.6c36.2-6.4,68.6-19.9,92-49.9c4.1-5.2,9.1-7.9,14.9-3.6
                c6.4,4.8,5.5,11.5,0.5,16.4c-10.9,10.8-21.6,22.4-34.2,31C94.4,398.7,54.9,403.4,14.8,408.3z"/>
        <path d="M3.6,367.3c-0.6-3.7-1.2-6-1.4-8.3c-0.2-3.4,0-6.7,0-11.1c13.1-2.3,26.4-4.2,39.5-6.9c32.1-6.7,60.9-19.3,80-47.9
                c3.5-5.3,8.3-8.7,14.7-4.8c7,4.4,6.2,10.6,1.9,16.2c-6.2,8-12.4,16.3-19.9,22.9C85.6,355.8,45.4,362.6,3.6,367.3z"/>
        <path d="M114.2,502.8c17.8-8.1,35.5-16.6,53.7-24.2c10.2-4.3,21-3.7,30.8,1.8c13.1,7.2,25.9,14.9,38.9,22.5
                c-14.6,10.8-22.1,12.2-35.9,2.4c-13.6-9.7-25.3-9.9-39.9-1.7C140.4,515.5,132.8,514.4,114.2,502.8z"/>
    </g>
</g>
</svg>');
    
    add_menu_page(__('identité','bozprod'), __('Identité','bozprod'),'edit_posts','bozprod','boz_home','data:image/svg+xml;base64,'.$icon, 3);
    
}

/**
 * Page des réglages de l'extension
 */
function boz_home(){
    
    if(!current_user_can('edit_posts')){
        
        wp_die(__('Vous n\'avez pas les permissions nécessaires pour accéder à cette page...','bozprod'));
        
    }else{
        
        include BOZPROD_ROOT_PATH.'/inc/settings.php';
        
    }
    
}

/**
 * Google fonts
 */
function bozprod_get_google_fonts(){
    
    global $google_font_api_key;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/webfonts/v1/webfonts?key=".$google_font_api_key);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Content-Type: application/json"
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    $fonts_list = json_decode(curl_exec($ch), true);
    $http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    if($http_code != 200){ exit(__('Erreur : impossible de charger les polices Google...', 'bozprod')); }

    return $fonts_list;
    
}

/**
 * Autoriser le téléversement d'images dans l'extension
 */
function bozprod_load_media_files(){
    
    wp_enqueue_media();
    
}

add_action('admin_enqueue_scripts', 'bozprod_load_media_files');

/**
 * Fonction de téléversement d'images
 */
function bozprod_image_uploader_field( $name, $value = '') {
    
    $image      = ' button">'.__('Ajouter une image','bozprod');
    $image_size = 'full';
    $display    = 'none';

    if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {

            // $image_attributes[0] - image URL
            // $image_attributes[1] - image width
            // $image_attributes[2] - image height

            $image = '"><img src="' . $image_attributes[0] . '" style="max-width:50%;display:block;" />';
            $display = 'inline-block';

    } 

    echo '<div class="bozuploader">
        <a href="javascript:void(0);" class="boz_upload_image_button' . $image . '</a>
        <input type="hidden" name="'.$name.'" id="'.$name.'" value="'.esc_attr($value).'" />
        <button class="boz_remove_image_button btn bg-danger btn-xs" style="margin-top:12px;display:inline-block;display:'.$display.';"><i class="fa fa-trash"></i> '.__('Supprimer','bozprod').'</button>
    </div>';
}

/**
 * Autoriser le téléversement de fichiers au format .svg
 */
function bozprod_mime_types($mimes) {
    
    $mimes['svg'] = 'image/svg+xml';
    
    return $mimes;
    
}

add_filter('upload_mimes', 'bozprod_mime_types');

/**
 * Redimensionnement et duplicata d'images
 */
function bozprod_resize_img($image_path,$image_dest,$max_size,$qualite,$type){

    if(!file_exists($image_path)) :
        return 'wrong_path';
    endif;

    if($image_dest == "") :
        $image_dest = $image_path;
    endif;
    
    $extensions = array('jpg','jpeg','png','gif');
    $mimes = array('image/jpeg','image/gif','image/png');

    $tab_ext = explode('.', $image_path);
    $extension  = strtolower($tab_ext[count($tab_ext)-1]);

    $image_data = getimagesize($image_path);

    if($extension == 'tmp' && in_array($image_data['mime'],$mimes)):
        copy($image_path,$image_dest);
        $image_path = $image_dest;

        $tab_ext = explode('.', $image_path);
        $extension  = strtolower($tab_ext[count($tab_ext)-1]);
    endif;

    if(in_array($extension,$extensions) && in_array($image_data['mime'],$mimes)) :

        $img_width = $image_data[0];
        $img_height = $image_data[1];

        if($img_width >= $img_height && $type != "height"):

            if($max_size >= $img_width) :
                return 'no_need_to_resize';
            endif;

            $new_width = $max_size;
            $reduction = (($new_width * 100) / $img_width);
            $new_height = round(( ($img_height * $reduction )/100 ),0);

        else:

            if($max_size >= $img_height) :
                return 'no_need_to_resize';
            endif;

            $new_height = $max_size;
            $reduction = ( ($new_height * 100) / $img_height );
            $new_width = round(( ($img_width * $reduction )/100 ),0);

        endif;

        $dest = imagecreatetruecolor($new_width, $new_height);

        switch($extension){
            case 'jpg':
            case 'jpeg':
                $src = imagecreatefromjpeg($image_path);
            break;
            case 'png':
                imagealphablending($dest, false);
                $src = imagecreatefrompng($image_path);
            break;
            case 'gif':
                $src = imagecreatefromgif($image_path);
            break;
        }
        
        if(imagecopyresampled($dest, $src, 0, 0, 0, 0, $new_width, $new_height, $img_width, $img_height)) :

            switch($extension){
                case 'jpg':
                case 'jpeg':
                    imagejpeg($dest , $image_dest, $qualite);
                break;
                case 'png':
                    imagesavealpha($dest, true);
                    imagepng($dest , $image_dest, $qualite);
                break;
                case 'gif':
                    imagegif($dest , $image_dest, $qualite);
                break;
            }

            return 'success';

        else:
            return 'resize_error';
        endif;

    else:
        return 'no_img';
    endif;
    
}

/**
 * Générer les favicons
 */
function bozprod_generate_favicons($favicon){
    
    require BOZPROD_ROOT_PATH.'/inc/class-php-ico.php';
    
    $url        = wp_get_attachment_url($favicon);
    
    $uploads    = wp_upload_dir();
    
    $file_path  = str_replace($uploads['baseurl'], $uploads['basedir'], $url);
    
    $sizes = array(16,32,70,96,120,128,152,167,180,192,196,228,270,310);
        
    for($i=0;$i<=count($sizes)-1;$i++){
        
        bozprod_resize_img($file_path,$uploads['basedir'].'/favicon-'.$sizes[$i].'.png',$sizes[$i],9,'auto');
        
    }
    
    for($i=0;$i<2;$i++){
        
        $ico = new PHP_ICO($uploads['basedir'].'/favicon-'.$sizes[$i].'.png');
    
        $ico->save_ico($uploads['basedir'].'/favicon-'.$sizes[$i].'.ico');
        
    }
            
}

/**
 * Insertion des favicons
 */
function bozprod_insert_favicons(){
    
    global $bozprod_opts;
    
    if($bozprod_opts['favicon'] != '' && is_numeric($bozprod_opts['favicon'])){
        
        $uploads    = wp_upload_dir();
    
        $sizes      = array(16,32,70,96,120,128,152,167,180,192,196,228,270,310);

        $links      = array(
            16  => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-16.png" sizes="16x16">',
            32  => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-32.png" sizes="32x32">',
            70  => '<meta name="msapplication-square70x70logo" content="UPLOAD_DIR/favicon-70.png" />',
            96  => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-96.png" sizes="96x96">',
            120 => '<link rel="apple-touch-icon" href="UPLOAD_DIR/favicon-120.png">',
            128 => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-128.png" sizes="128x128">',
            152 => '<link rel="apple-touch-icon" href="UPLOAD_DIR/favicon-152.png" sizes="152x152">',
            167 => '<link rel="apple-touch-icon" href="UPLOAD_DIR/favicon-167.png" sizes="167x167">',
            180 => '<link rel="apple-touch-icon" href="UPLOAD_DIR/favicon-180.png" sizes="180x180">',
            192 => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-192.png" sizes="192x192">',
            196 => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-196.png" sizes="196x196">',
            228 => '<link rel="icon" type="image/png" href="UPLOAD_DIR/favicon-228.png" sizes="228x228">',
            270 => '<meta name="msapplication-square270x270logo" content="UPLOAD_DIR/favicon-270.png" />',
            310 => '<meta name="msapplication-square310x310logo" content="UPLOAD_DIR/favicon-310.png" />'
        );

        $favicons = '<link rel="shortcut icon" href="'.$uploads['baseurl'].'/favicon-'.$sizes[0].'.ico" sizes="16x16">
<link rel="shortcut icon" href="'.$uploads['baseurl'].'/favicon-'.$sizes[1].'.ico" sizes="32x32">
';

        for($i=0;$i<=count($sizes)-1;$i++){

            if($i < count($sizes)-1){

                $favicons .= str_replace('UPLOAD_DIR',$uploads['baseurl'],$links[$sizes[$i]]).'
';

            }else{

                $favicons .= str_replace('UPLOAD_DIR',$uploads['baseurl'],$links[$sizes[$i]]).'
<meta name="msapplication-TileColor" content="#ffffff" />
<meta name="application-name" content="'.get_bloginfo('name').'" />';

            }

        }

        echo $favicons;
        
    }
        
}

add_action('wp_head', 'bozprod_insert_favicons', 1);

/**
 * Insérer les Google fonts
 */
function bozprod_insert_google_fonts($hook){
    
    global $bozprod_opts;
    
    if($bozprod_opts['embedfonts'] != ''){
        
        $query_args = array('family' => $bozprod_opts['embedfonts']);
        
	wp_register_style('google_fonts', add_query_arg($query_args, "https://fonts.googleapis.com/css2"), array(), null);
        
        wp_enqueue_style('google_fonts', add_query_arg($query_args, "https://fonts.googleapis.com/css2"), array(), null);
        
    }
    
}

add_action('wp_enqueue_scripts','bozprod_insert_google_fonts', 1);

/**
 * Insérer les Google fonts
 */
function bozprod_resize_img_overflow($hook){
    
    global $bozprod_opts;
    
    if($bozprod_opts['resizing'] == 'true'){
                
	wp_register_style('img_overflow',BOZPROD_ROOT_URL.'assets/css/img-overflow.css',array(),BOZPRODv,'all');
        wp_enqueue_style('img_overflow',BOZPROD_ROOT_URL.'assets/css/img-overflow.css');
        
        wp_register_script('img_overflow',BOZPROD_ROOT_URL.'assets/js/img-overflow.js',array('jquery'),BOZPRODv,true);
        wp_enqueue_script('img_overflow');
        
    }
    
}

add_action('wp_enqueue_scripts','bozprod_resize_img_overflow', 99);

/**
 * Mapping du titre à la description, la légende et le texte alternatif, et renommage des images (librairie)
 */
function bozprod_save_media($post_ID){
    
    global $wp;
    
    global $wpdb;
    
    global $bozprod_opts;
        
    if($bozprod_opts['images'] == 'true'){
                
        $exts       = array('jpg','jpeg','png','gif','svg');
    
        $file       = get_attached_file($post_ID);

        $name       = explode('/',$file);

        $name       = $name[count($name)-1];

        $data       = wp_get_attachment_metadata($post_ID);

        $path       = pathinfo($file);

        if(in_array($path['extension'],$exts)){

            $check = intval($wpdb->get_var("SELECT post_id FROM {$wpdb->postmeta} WHERE meta_value LIKE '%$name'"));

            if($check == $post_ID){

                $title      = ucfirst(get_the_title($post_ID));

                $new_name   = sanitize_title($title).'-'.$post_ID.'.'.$path['extension'];

                $newfile    = $path['dirname'].'/'.$new_name;

                rename($file,$newfile);

                update_attached_file($post_ID,$newfile);

                $data['file'] = str_replace($name,$new_name,$data['file']);

                if($path['extension'] != 'svg'){

                    foreach($data['sizes'] as $k => $v){

                        $size_name  = sanitize_title($title).'-'.$v['width'].'x'.$v['height'].'-'.$post_ID.'.'.$path['extension'];

                        $new_file   = $path['dirname'].'/'.$size_name;

                        $old_file   = $path['dirname'].'/'.$v['file'];

                        rename($old_file,$new_file);

                        $data['sizes'][$k]['file'] = $size_name;

                    }

                }

                wp_update_attachment_metadata($post_ID,$data);

                update_post_meta($post_ID, '_wp_attachment_image_alt', $title);

                $wpdb->update(
                    $wpdb->prefix.'posts',
                    array(
                        'post_content'  => $title,
                        'post_excerpt'  => $title,
                        'post_name'     => strtolower(sanitize_title($title)).'-'.$post_ID
                    ),
                    array('ID' => $post_ID)
                );

            }

        }
        
    }
        
}

add_action('edit_attachment', 'bozprod_save_media');

/**
 * Sauvegarde des options
 */
function bozprod_save_options(){
    
    global $bozprod_opts;
    
    $logo                   = isset($_POST['logo']) && $_POST['logo'] != '' ? intval($_POST['logo']) : '';
    $sublogo                = isset($_POST['sublogo']) && $_POST['sublogo'] != '' ? intval($_POST['sublogo']) : '';
    $favicon                = isset($_POST['favicon']) && $_POST['favicon'] != '' ? intval($_POST['favicon']) : '';
    $titlefont              = isset($_POST['titlefont']) ? intval($_POST['titlefont']) : 'none';
    $titlesize              = isset($_POST['titlesize']) ? intval($_POST['titlesize']) : 48;
    $menufont               = isset($_POST['menufont']) ? intval($_POST['menufont']) : 'none';
    $menusize               = isset($_POST['menusize']) ? intval($_POST['menusize']) : 18;
    $textfont               = isset($_POST['textfont']) ? intval($_POST['textfont']) : 'none';
    $textsize               = isset($_POST['textsize']) ? intval($_POST['textsize']) : 16;
    $images                 = isset($_POST['images']) ? sanitize_text_field($_POST['images']) : 'false';
    $resizing               = isset($_POST['resizing']) ? sanitize_text_field($_POST['resizing']) : 'false';
    
    $fonts                  = array(array($titlefont,$menufont,$textfont),array($titlesize,$menusize,$textsize));
    
    $fontdata               = bozprod_get_googlefont($fonts);
    
    $opts = array(
        'logo'                      => $logo,
        'sublogo'                   => $sublogo,
        'favicon'                   => $favicon,
        'titlefont'                 => $titlefont,
        'titlesize'                 => $titlesize,
        'menufont'                  => $menufont,
        'menusize'                  => $menusize,
        'textfont'                  => $textfont,
        'textsize'                  => $textsize,
        'embedfonts'                => $fontdata['embed'],
        'fontstyle'                 => $fontdata['style'],
        'images'                    => $images,
        'resizing'                  => $resizing
    );
    
    bozprod_generate_favicons($favicon);

    $bozprod_opts = $opts;

    update_option('bozprod_options',$bozprod_opts,'','yes');
    
    echo json_encode(array('ok',$fontdata['style']));
    
    wp_die();
    
}

add_action('wp_ajax_bozprod_save_options','bozprod_save_options');

/**
 * Génération du lien d'intégration des Google fonts
 */
function bozprod_get_googlefont($data){
        
    $fonts_list = bozprod_get_google_fonts();
    
    $fontdata = array(
        'embed'     => '',
        'style'     => ''
    );
        
    $link       = '';
    
    $style      = '';
    
    $n          = 0;
    
    $types      = array(
        0       => 'titlefont',
        1       => 'menufont',
        2       => 'textfont'
    );
    
    for($i=0; $i<count($data[0]); $i++){
        
        if($data[0][$i] != 'none' && is_numeric($data[0][$i])){
            
            $font = $fonts_list['items'][$data[0][$i]];
            
            if($i == 0){
                
                $style .= "@".$types[$i].": '".$font['family']."', ".$font['category'].";
@".$types[$i]."h1: ".$data[1][$i]."px;
@".$types[$i]."h2: ".round( $data[1][$i] - ( ($data[1][$i]-$data[1][2])/6 ) )."px;
@".$types[$i]."h3: ".round( $data[1][$i] - ( (($data[1][$i]-$data[1][2])/6) * 2 ) )."px;
@".$types[$i]."h4: ".round( $data[1][$i] - ( (($data[1][$i]-$data[1][2])/6) * 3 ) )."px;
@".$types[$i]."h5: ".round( $data[1][$i] - ( (($data[1][$i]-$data[1][2])/6) * 4 ) )."px;
@".$types[$i]."h6: ".round( $data[1][$i] - ( (($data[1][$i]-$data[1][2])/6) * 5 ) )."px;
";
                
            }else{
                
                $style .= "@".$types[$i].": '".$font['family']."', ".$font['category'].";
@".$types[$i]."size: ".$data[1][$i]."px;
";
                
            }
            
            if($n == 0){
                
                $link .= urlencode($font['family']);
                
            }else{
                
                $link .= '&family='.urlencode($font['family']);
                
            }
            
            $wght = '';
            
            for($j=0; $j<count($font['variants']); $j++){
                                
                if($font['variants'][$j] != 'italic' && ($font['variants'][$j] == 'regular' or is_numeric($font['variants'][$j]))){
                
                    if($font['variants'][$j] == 'regular'){

                        $val = 400;

                    }else{

                        $val = $font['variants'][$j];

                    }
                    
                    $style .= "@".$types[$i].$val.": ".$val.";
";
                    
                    $var = $wght == '' ? $val : ';'.$val;
                    
                    $wght .= $var;
                    
                }
                
            }
            
            if($wght != ''){ $link .= ':wght@'.$wght; }
            
            $n++;
            
        }
        
    }
        
    $link .= '&display=swap';
    
    $fontdata['embed'] = $link;
    
    $fontdata['style'] = $style;
    
    return $fontdata;
    
}

/**
 * Insérer le logo de l'entête
 */
function the_header_logo($class = 'logo'){
    
    global $bozprod_opts;
        
    if($bozprod_opts['logo'] != '' && is_numeric($bozprod_opts['logo'])){
                
        echo wp_get_attachment_image($bozprod_opts['logo'], 'full', '', array('class' => $class));
        
    }
    
}

/**
 * Insérer le logo du pied de page
 */
function the_footer_logo($class = 'sublogo'){
    
    global $bozprod_opts;
    
    if($bozprod_opts['sublogo'] != '' && is_numeric($bozprod_opts['sublogo'])){
        
        echo wp_get_attachment_image($bozprod_opts['sublogo'], 'full', '', array('class' => $class));
        
    }
    
}