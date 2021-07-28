<?php

/**
 * Google fonts API key
 */
global $google_fonts_api_key;

$google_fonts_api_key = "AIzaSyB20V9raIPJIMKjylDhxjB7an4Bvmfds6k";

/**
 * Get Google fonts
 */
if(!function_exists('wpm_get_google_fonts')){
    
    function wpm_get_google_fonts(){
    
        global $google_fonts_api_key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.googleapis.com/webfonts/v1/webfonts?key=".$google_fonts_api_key);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        $fonts_list = json_decode(curl_exec($ch), true);
        $http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        if($http_code != 200){ exit(__('Erreur : impossible de charger les polices Google...', 'idcomspabooker')); }

        return $fonts_list;

    }
    
}

/**
 * Google fonts list
 */
global $google_fonts;

// $google_fonts = wpm_get_google_fonts();

/**
 * Generate uniqid with specific length
 */
if(!function_exists('wpm_uniqid')){
    
    function wpm_uniqid($l){
        
        $n  = ceil($l/32);
        
        $id = '';
        
        for($i=0; $i<$n; $i++){
            
            $id .= md5(uniqid(rand(),true));
            
        }
        
        return substr($id,0,$l);
        
    }
    
}

/**
 * Allow .svg upload
 */
if(!function_exists('wpm_mime_types')){
    
    function wpm_mime_types($mimes) {
    
        $mimes['svg'] = 'image/svg+xml';

        return $mimes;

    }

    add_filter('upload_mimes', 'wpm_mime_types');
    
}

/**
 * Embed remote video
 */
if(!function_exists('wpm_embed_remote_video')){
    
    function wpm_embed_remote_video(){
        
        $video = esc_url($_POST['video']);
        
        if($video != ''){
            
            $check = wpm_check_youtube_vimeo_video_link($video);
            
            if($check){
                
                $result = array(
                    'status'    => 1,
                    'alert'     => __('ok','idcomspabooker'),
                    'video'     => '<div class="wpm-remote-video video">'.wp_oembed_get($video).'</div>'
                );
                
            }else{
                
                $result = array(
                    'status'    => 0,
                    'alert'     => __('Veuillez renseigner correctement le lien YouTube ou Vimeo s.v.p., ex. : https://youtu.be/0cgcBCULWmw (YouTube) ou https://vimeo.com/191874955 (Vimeo)','idcomspabooker'),
                    'video'     => ''
                );
                
            }
            
        }else{
            
            $result = array(
                'status'    => 0,
                'alert'     => __('Veuillez renseigner un lien YouTube ou Vimeo s.v.p., ex. : https://youtu.be/0cgcBCULWmw (YouTube) ou https://vimeo.com/191874955 (Vimeo)','idcomspabooker'),
                'video'     => ''
            );
            
        }
        
        echo wp_send_json(json_encode($result));
    
        wp_die();
        
    }
    
    add_action('wp_ajax_wpm_embed_remote_video', 'wpm_embed_remote_video');

    add_action('wp_ajax_wpm_embed_remote_video','wpm_embed_remote_video');
    
}

/**
 * Check YouTube / Vimeo video link
 */
if(!function_exists('wpm_check_youtube_vimeo_video_link')){
    
    function wpm_check_youtube_vimeo_video_link($v){
        
        // Check YouTube
        if(strlen($v) == 28){

            return true;

        // Check Vimeo
        }else if(strlen($v) == 27){

            return true;

        }else{
            
            return false;
            
        }
        
    }
    
}

/**
 * Check string length from min && max
 */
if(!function_exists('wpm_check_string_length')){
    
    function wpm_check_string_length($str, $min = '', $max = ''){
        
        $is_min = $min != '' && is_numeric($min) ? true : false;
        
        $is_max = $max != '' && is_numeric($max) ? true : false;
        
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($str !== ''){
            
            $len = strlen($str);
        
            if($is_min && $is_max){

                if($len < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur : la chaîne <span class="highlighted">%1$s</span> doit compter entre <span class="error">%2$s</span> et <span class="error">%3$s</span> caractères.','idcomspabooker'), $str, $min, $max)
                    );

                }else if($len > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur : la chaîne <span class="highlighted">%1$s</span> doit compter entre <span class="error">%2$s</span> et <span class="error">%3$s</span> caractères.','idcomspabooker'), $str, $min, $max)
                    );

                }

            }else if($is_min && !$is_max){

                if($len < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur : la chaîne <span class="highlighted">%1$s</span> doit compter au minimum <span class="error">%2$s</span> caractères.','idcomspabooker'), $str, $min)
                    );

                }

            }else if(!$is_min && $is_max){

                if($len > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur : la chaîne <span class="highlighted">%1$s</span> doit compter au maximum <span class="error">%2$s</span> caractères.','idcomspabooker'), $str, $max)
                    );

                }

            }
        
        }
        
        return $response;
        
    }
    
}

/**
 * Check tags length from min && max
 */
if(!function_exists('wpm_check_tags_length')){
    
    function wpm_check_tags_length($tags, $min = '', $max = ''){
        
        $is_min = $min != '' && is_numeric($min) ? true : false;
        
        $is_max = $max != '' && is_numeric($max) ? true : false;
        
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($tags != ''){
        
            $tags_len = explode(',',$tags);

            if($is_min && $is_max){

                if(count($tags_len) < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des mots-clés <span class="highlighted">%1$s</span> : vous devez renseigner entre <span class="error">%2$s</span> et <span class="error">%3$s</span> mots-clés.','idcomspabooker'), $tags, $min, $max)
                    );

                }else if(count($tags_len) > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des mots-clés <span class="highlighted">%1$s</span> : vous devez renseigner entre <span class="error">%2$s</span> et <span class="error">%3$s</span> mots-clés.','idcomspabooker'), $tags, $min, $max)
                    );

                }

            }else if($is_min && !$is_max){

                if(count($tags_len) < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des mots-clés <span class="highlighted">%1$s</span> : vous devez renseigner au minimum <span class="error">%2$s</span> mots-clés.','idcomspabooker'), $tags, $min)
                    );

                }

            }else if(!$is_min && $is_max){

                if(count($tags_len) > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des mots-clés <span class="highlighted">%1$s</span> : vous devez renseigner au maximum <span class="error">%2$s</span> mots-clés.','idcomspabooker'), $tags, $max)
                    );

                }

            }
        
        }
        
        return $response;
        
    }
    
}

/**
 * Check medias length from min && max
 */
if(!function_exists('wpm_check_medias_length')){
    
    function wpm_check_medias_length($medias, $min = '', $max = '', $media){
        
        $is_min = $min != '' && is_numeric($min) ? true : false;
        
        $is_max = $max != '' && is_numeric($max) ? true : false;
        
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($medias != ''){
        
            $medias_len = explode(',',$medias);

            if($is_min && $is_max){

                if(count($medias_len) < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des %4$s <span class="highlighted">%1$s</span> : vous devez renseigner entre <span class="error">%2$s</span> et <span class="error">%3$s</span> %4$s.','idcomspabooker'), $medias, $min, $max, $media)
                    );

                }else if(count($medias_len) > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des %4$s <span class="highlighted">%1$s</span> : vous devez renseigner entre <span class="error">%2$s</span> et <span class="error">%3$s</span> %4$s.','idcomspabooker'), $medias, $min, $max, $media)
                    );

                }

            }else if($is_min && !$is_max){

                if(count($medias_len) < $min){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des %3$s <span class="highlighted">%1$s</span> : vous devez renseigner au minimum <span class="error">%2$s</span> %3$s.','idcomspabooker'), $medias, $min, $media)
                    );

                }

            }else if(!$is_min && $is_max){

                if(count($medias_len) > $max){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie des %3$s <span class="highlighted">%1$s</span> : vous devez renseigner au maximum <span class="error">%2$s</span> %3$s.','idcomspabooker'), $medias, $max, $media)
                    );

                }

            }
        
        }
        
        return $response;
        
    }
    
}

/**
 * Check email address
 */
if(!function_exists('wpm_check_email_address')){
    
    function wpm_check_email_address($email){
        
        $list   = explode("@",$email);
    
        $domain = $list[1];
        
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($email != ''){
            
            if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email)){
            
                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie de l\'adresse email <span class="highlighted">%1$s</span> : l\'email n\'est pas correctement saisi.','idcomspabooker'), $email)
                );

            }else if(!wpm_check_mx_server($domain)){

                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie de l\'adresse email <span class="highlighted">%1$s</span> : le nom de domaine <span class="error">%2$s</span> ne semble pas être valide.','idcomspabooker'), $email, $domain)
                );

            }
            
        }
        
        return $response;
        
    }
    
}

/**
 * Check domain name
 */
if(!function_exists('wpm_check_mx_server')){
    
    function wpm_check_mx_server($domain){
        
        if(!checkdnsrr($domain,"MX")&& !checkdnsrr($domain,"A")){
        
            return false;

        }else{

            return true;

        }
        
    }
    
}

/**
 * Check number (INT and FLOAT)
 */
if(!function_exists('wpm_check_number')){
    
    function wpm_check_number($n, $min = '', $max = ''){
        
        $is_min = $min != '' && is_numeric($min) ? true : false;

        $is_max = $max != '' && is_numeric($max) ? true : false;

        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($n != ''){
            
            if(is_numeric($n)){
                
                if($is_min && $is_max){
                    
                    if($n < $min){
                        
                        $response = array(
                            'status'        => false,
                            'notice'        => sprintf(__('Erreur sur la saisie du nombre <span class="highlighted">%1$s</span> : la valeur saisie doit être entre <span class="error">%2$s</span> et <span class="error">%3$s</span>.','idcomspabooker'), $n, $min, $max)
                        );

                    }else if($n > $max){
                        
                        $response = array(
                            'status'        => false,
                            'notice'        => sprintf(__('Erreur sur la saisie du nombre <span class="highlighted">%1$s</span> : la valeur saisie doit être entre <span class="error">%2$s</span> et <span class="error">%3$s</span>.','idcomspabooker'), $n, $min, $max)
                        );

                    }
                    
                }else if($is_min && !$is_max){
                    
                    if($n < $min){
                        
                        $response = array(
                            'status'        => false,
                            'notice'        => sprintf(__('Erreur sur la saisie du nombre <span class="highlighted">%1$s</span> : la valeur saisie doit être supérieure ou égale à <span class="error">%2$s</span>.','idcomspabooker'), $n, $min)
                        );

                    }
                    
                }else if(!$is_min && $is_max){
                    
                    if($n > $max){
                        
                        $response = array(
                            'status'        => false,
                            'notice'        => sprintf(__('Erreur sur la saisie du nombre <span class="highlighted">%1$s</span> : la valeur saisie doit être inférieure ou égale à <span class="error">%2$s</span>.','idcomspabooker'), $n, $max)
                        );

                    }
                    
                }
                
            }else{
                
                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie du nombre <span class="highlighted">%1$s</span> : la valeur saisie n\'est pas un <span class="error">nombre</span>.','idcomspabooker'), $n)
                );
                
            }
            
        }
        
        return $response;
        
    }
    
}

/**
 * Check date (FR and US formats)
 */
if(!function_exists('wpm_check_date')){
    
    function wpm_check_date($date, $format){
                
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($date != ''){
                        
            $d = explode('-',$date);
                        
            if(count($d) !== 3){
                
                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie de la date <span class="highlighted">%1$s</span> : la date saisie est incorrecte.','idcomspabooker'), $date)
                );
        
            }else if(count($d) === 3 && is_numeric($d[0]) && is_numeric($d[1]) && is_numeric($d[2])){
                
                if($format == 'fr-date'){

                    $check = checkdate((int)$d[1] , (int)$d[0], (int)$d[2]);

                }else if($format == 'us-date'){

                    $check = checkdate((int)$d[1] , (int)$d[2], (int)$d[0]);

                }

                if(!$check){

                    $response = array(
                        'status'        => false,
                        'notice'        => sprintf(__('Erreur sur la saisie de la date <span class="highlighted">%1$s</span> : la date saisie est incorrecte.','idcomspabooker'), $date)
                    );

                }
                
            }else{
                
                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie de la date <span class="highlighted">%1$s</span> : la date saisie est incorrecte.','idcomspabooker'), $date)
                );
                
            }
            
        }
        
        return $response;
                
    }
    
}

/**
 * Check phone
 */
if(!function_exists('wpm_check_phone')){
    
    function wpm_check_phone($phone){
        
        $response = array(
            'status'        => true,
            'notice'        => ''
        );
        
        if($phone != ''){
            
            $tel    = explode('.',$phone);
    
            $first  = array('01','02','03','04','05','06','07','09');

            $all    = array(
                '01','02','03','04','05','06','07','09','10',
                '11','12','13','14','15','16','17','19','20',
                '21','22','23','24','25','26','27','29','30',
                '31','32','33','34','35','36','37','39','40',
                '41','42','43','44','45','46','47','49','50',
                '51','52','53','54','55','56','57','59','60',
                '61','62','63','64','65','66','67','69','70',
                '71','72','73','74','75','76','77','79','80',
                '81','82','83','84','85','86','87','89','90',
                '91','92','93','94','95','96','97','99'
            );

            $error = 0;

            for($i=0; $i<count($tel); $i++){

                if($i == 0 && !in_array($tel[$i],$first)){

                    $error++;

                }else if($i > 0 && !in_array($tel[$i],$all)){

                    $error++;

                }

            }

            if($error > 0){

                $response = array(
                    'status'        => false,
                    'notice'        => sprintf(__('Erreur sur la saisie du numéro de téléphone <span class="highlighted">%1$s</span> : le numéro semble être incorrect.','idcomspabooker'), $phone)
                );

            }
            
        }
        
        return $response;
        
    }
    
}

/**
 * Get WP Pages list
 */
if(!function_exists('wpm_get_wp_pages')){
    
    function wpm_get_wp_pages(){
        
        $pages = get_pages();
        
        return $pages;
                
    }
    
}

/**
 * Sort WP pages for setting dropdown
 */
if(!function_exists('wpm_get_wp_pages_for_setting')){
    
    function wpm_get_wp_pages_for_setting(){
        
        $pages  = get_pages();
        
        $p      = array(
            'id'    => array(),
            'page'  => array()
        );
        
        for($i=0; $i<count($pages); $i++){
            
            array_push($p['id'], $pages[$i]->ID);
            
            array_push($p['page'], $pages[$i]->post_title);
            
        }
       
        return $p;
        
    }
    
}

/**
 * Get WP first level posts categories
 */
if(!function_exists('wpm_get_wp_posts_cats')){
    
    function wpm_get_wp_posts_cats(){
        
        $cats = get_terms( 
            'category', 
            array(
                'parent'        => 0,
                'hide_empty'    => false,
                'orderby'       => 'name',
                'order'         => 'ASC'
            )
        );
        
    }
    
}

/**
 * Output simple image
 */
if(!function_exists('wpm_output_img')){
    
    function wpm_output_img($id, $size = '', $class = ''){
                
        $sizes = array('thumbnail','medium','large','full');
        
        $s = !in_array($size, $sizes) ? 'medium' : $size;
        
        return wp_get_attachment_image($id, $s, false, array('class' => $class));
        
    }
    
}

/**
 * Output simple video
 */
if(!function_exists('wpm_output_video')){
    
    function wpm_output_video($id){
        
        $check = wpm_check_youtube_vimeo_video_link($id);
        
        if($check){
                
            $video = '<div class="wpm-remote-video video">'.wp_oembed_get($id).'</div>';

        }else{
            
            $url    = wp_get_attachment_url($id);

            $mime   = get_post_mime_type($id);

            $video  = '<video class="local-video video" controls><source src="'.$url.'" type="'.$mime.'"></video>';

        }
        
        return $video;
        
    }
    
}