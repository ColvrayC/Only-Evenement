<?php

/** 
 * WP MOUSE fields functions
 */

/**
 * Upload single image on settings pages (jpg, jpeg, png, gif, ico, svg)
 */
if(!function_exists('wpm_img_uploader_field')){
    
    function wpm_img_uploader_field($name, $value = ''){
        
        $uniqid     = md5(uniqid(rand(),true));
        $image_size = 'full';
        $display    = 'none';

        if($image_attributes = wp_get_attachment_image_src($value, $image_size)){

            $image = '<img src="'.$image_attributes[0].'" class="wpm-img-uploaded"/>';

        }else{
            
            $image = '';
            
        }

        echo '<div id="'.$uniqid.'" class="wpm-uploader">
            <a href="javascript:void(0);" class="wpm-upload-img-button" data-id="'.$uniqid.'" data-insert="'.__('Insérer une image','idcomtools').'" data-use="'.__('Utiliser cette image','idcomtools').'">'.__('Ajouter','idcomtools').'</a>
            <input type="hidden" name="'.$name.'" id="'.$name.'" class="wpm-img" data-id="'.$uniqid.'" value="'.esc_attr($value).'"/>
            <button class="wpm-remove-image-button" data-id="'.$uniqid.'">'.__('Retirer','idcomtools').'</button>
            '.$image.'
        </div>';
    }
    
}

/**
 * Upload images gallery on settings pages (jpg, jpeg, png, gif, ico, svg)
 */
if(!function_exists('wpm_img_gallery_uploader_field')){
    
    function wpm_img_gallery_uploader_field($name, $values = '', $min = '', $max = ''){
        
        $v = $values != '' ? explode(',',$values) : 0;
        
        $min    = intval($min) > 0 ? $min : '';
        
        $max    = intval($max > 0) ? $max : '';
        
        $uniqid = md5(uniqid(rand(),true));
        
        $html   = htmlentities('<div id="uniqid" class="pic">
    <input type="hidden" name="wpmtbox-img_xxx" id="wpmtbox-img_xxx" class="wpm-gallery-img" value="">
    <a href="javascript:void(0);" class="add" data-insert="'.__('Insérer une image','idcomtools').'" data-use="'.__('Utiliser cette image','idcomtools').'"><i class="fas fa-plus"></i></a>
    <a href="javascript:void(0);" class="remove"><i class="fas fa-trash"></i></a>
</div>',ENT_QUOTES);
                                        
        if($v != 0){
                        
            echo '<div id="'.$name.'" class="wpm-gallery g-sortable" data-values="'.$values.'" data-id="'.$uniqid.'" data-min="'.$min.'" data-max="'.$max.'" data-html="'.$html.'" data-max-alert="'.esc_html('Vous avez atteint le nombre maximum d\'images...','idcomtools').'">';
            
            for($i=0; $i<count($v); $i++){
                
                $id = wpm_uniqid(5);
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="pic">
    <input type="hidden" name="wpmtbox-img_'.$id.'" id="wpmtbox-img_'.$id.'" class="wpm-gallery-img" value="'.$v[$i].'">
    <a href="javascript:void(0);" class="add hidden" data-insert="'.__('Insérer une image','idcomtools').'" data-use="'.__('Utiliser cette image','idcomtools').'"><i class="fas fa-plus"></i></a>
    <a href="javascript:void(0);" class="remove"><i class="fas fa-trash"></i></a>
    <img class="" src="'.wp_get_attachment_image_src($v[$i],'medium')[0].'"/>
</div>';
                
            }
            
            if(count($v) < $max){
                
                $id = wpm_uniqid(5);
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="pic">
    <input type="hidden" name="wpmtbox-img_'.$id.'" id="wpmtbox-img_'.$id.'" class="wpm-gallery-img" value="">
    <a href="javascript:void(0);" class="add" data-insert="'.__('Insérer une image','idcomtools').'" data-use="'.__('Utiliser cette image','idcomtools').'"><i class="fas fa-plus"></i></a>
    <a href="javascript:void(0);" class="remove"><i class="fas fa-trash"></i></a>
</div>';
                
            }
            
            echo '</div>
<div id="'.$name.'_counter" class="gallery-counter"><span class="count">'.count($v).' / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
            
        }else{
                        
            echo '<div id="'.$name.'" class="wpm-gallery g-sortable" data-values="" data-id="'.$uniqid.'" data-min="'.$min.'" data-max="'.$max.'" data-html="'.$html.'" data-max-alert="'.esc_html('Vous avez atteint le nombre maximum d\'images...','idcomtools').'">';
            
            for($i=0; $i<$min; $i++){
                
                $id = wpm_uniqid(5);
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="pic">
    <input type="hidden" name="wpmtbox-img_'.$id.'" id="wpmtbox-img_'.$id.'" class="wpm-gallery-img" value="">
    <a href="javascript:void(0);" class="add" data-insert="'.__('Insérer une image','idcomtools').'" data-use="'.__('Utiliser cette image','idcomtools').'"><i class="fas fa-plus"></i></a>
    <a href="javascript:void(0);" class="remove"><i class="fas fa-trash"></i></a>
</div>';
                
            }
            
            echo '</div>
<div id="'.$name.'_counter" class="gallery-counter"><span class="count">0 / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
                        
        }
        
    }
    
}

/**
 * Upload single audio on settings pages (mp3, m4a, ogg, wav)
 */
if(!function_exists('wpm_audio_uploader_field')){
    
    function wpm_audio_uploader_field($name, $value = ''){
        
        $uniqid = md5(uniqid(rand(),true));
        
        if($value != ''){
            
            $metadata   = get_post_meta($value, "_wp_attachment_metadata");
            
            $url        = wp_get_attachment_url($value);
            
            $filename   = basename(get_attached_file($value));
                        
            echo '<div id="'.$uniqid.'" class="wpm-audio-uploader" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">
    <a href="javascript:void(0);" class="wpm-upload-audio-button hidden" data-id="'.$uniqid.'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="'.$name.'" id="'.$name.'" value="'.esc_attr($value).'"/>
    <div class="audio visible"><audio controls src="'.$url.'"></audio></div>
    <p class="audio-name">'.$filename.'</p>
    <button class="wpm-remove-audio-button visible" data-id="'.$uniqid.'">'.__('Retirer','idcomtools').'</button>
</div>';
        
        }else{
        
            echo '<div id="'.$uniqid.'" class="wpm-audio-uploader" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">
    <a href="javascript:void(0);" class="wpm-upload-audio-button" data-id="'.$uniqid.'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="'.$name.'" id="'.$name.'" value="'.esc_attr($value).'"/>
    <div class="audio"></div>
    <p class="audio-name"></p>
    <button class="wpm-remove-audio-button" data-id="'.$uniqid.'">'.__('Retirer','idcomtools').'</button>
</div>';
            
        }
        
    }
    
}

/**
 * Upload audio playlist on settings pages (mp3, m4a, ogg, wav)
 */
if(!function_exists('wpm_audio_playlist_uploader_field')){
    
    function wpm_audio_playlist_uploader_field($name, $values = '', $min = '', $max = ''){
        
        $v = $values != '' ? explode(',',$values) : 0;
        
        $min    = intval($min) > 0 ? $min : '';
        
        $max    = intval($max > 0) ? $max : '';
        
        $uniqid = md5(uniqid(rand(),true));
        
        $html   = htmlentities('<div id="uniqid" class="wpm-audio-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-audio-track-button" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="wpmtbox-audio_xxx" id="wpmtbox-audio_xxx" class="wpm-audio-track" value=""/>
    <p class="audio-track-name" data-src=""></p>
    <button class="wpm-remove-audio-track-button">'.__('Retirer','idcomtools').'</button>
</div>',ENT_QUOTES);
        
        if($v != 0){
            
            echo '<div id="'.$name.'" class="wpm-audio-playlist a-sortable" data-values="" data-id="'.$uniqid.'" data-min="'.$min.'" data-max="'.$max.'" data-html="'.$html.'" data-max-alert="'.esc_html('Vous avez atteint le nombre maximum de sons...','idcomtools').'">
<div class="audio-player">
    <audio controls src="'.wp_get_attachment_url($v[0]).'"></audio>
</div>
';
            
            for($i=0; $i<count($v); $i++){
                
                $id         = wpm_uniqid(5);
                
                $metadata   = get_post_meta($v[$i], "_wp_attachment_metadata");
            
                $url        = wp_get_attachment_url($v[$i]);

                $filename   = basename(get_attached_file($v[$i]));
                
                $class      = $i == 0 ? ' active' : '';
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="wpm-audio-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-audio-track-button hidden" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="wpmtbox-audio_'.$id.'" id="wpmtbox-audio_'.$id.'" class="wpm-audio-track" value="'.esc_attr($v[$i]).'"/>
    <p class="audio-track-name visible'.$class.'" data-src="'.esc_url($url).'">'.$filename.'</p>
    <button class="wpm-remove-audio-track-button visible">'.__('Retirer','idcomtools').'</button>
</div>';
                
            }
            
            if(count($v) < $max){
                
                $id = wpm_uniqid(5);
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="wpm-audio-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-audio-track-button" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="wpmtbox-audio_'.$id.'" id="wpmtbox-audio_'.$id.'" class="wpm-audio-track" value=""/>
    <p class="audio-track-name" data-src=""></p>
    <button class="wpm-remove-audio-track-button">'.__('Retirer','idcomtools').'</button>
</div>';
                
            }
            
            echo '</div>
<div id="'.$name.'_counter" class="audio-playlist-counter"><span class="count">'.count($v).' / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
            
        }else{
            
            echo '<div id="'.$name.'" class="wpm-audio-playlist a-sortable" data-values="" data-id="'.$uniqid.'" data-min="'.$min.'" data-max="'.$max.'" data-html="'.$html.'" data-max-alert="'.esc_html('Vous avez atteint le nombre maximum de sons...','idcomtools').'">
<div class="audio-player">
    <audio controls src=""></audio>
</div>';
            
            for($i=0; $i<$min; $i++){
                
                $id = wpm_uniqid(5);
                
                echo '<div id="'.$uniqid.'_'.$id.'" class="wpm-audio-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-audio-track-button" data-insert="'.__('Insérer un son','idcomtools').'" data-use="'.__('Utiliser ce son','idcomtools').'">'.__('Ajouter','idcomtools').'</a>
    <input type="hidden" name="wpmtbox-audio_'.$id.'" id="wpmtbox-audio_'.$id.'" class="wpm-audio-track" value=""/>
    <p class="audio-track-name" data-src=""></p>
    <button class="wpm-remove-audio-track-button">'.__('Retirer','idcomtools').'</button>
</div>';
                
            }
            
            echo '</div>
<div id="'.$name.'_counter" class="audio-playlist-counter"><span class="count">0 / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
            
        }
        
    }
    
}

/**
 * Upload single video on settings pages (mp4, m4v, mov, avi, mpg, ogv, 3gp, 3g2)
 */
if(!function_exists('wpm_video_uploader_field')){
    
    function wpm_video_uploader_field($name, $value = ''){
        
        $uniqid = md5(uniqid(rand(),true));
        
        if($value != ''){
            
            if(is_numeric($value)){
                                
                $url    = wp_get_attachment_url($value);
                
                $mime   = get_post_mime_type($value);
                
                $video  = '<video class="local-video video" width="100%" height="100%" controls><source src="'.$url.'" type="'.$mime.'"></video>';
                
            }else{
                
                $video  = '<div class="wpm-remote-video video">'.wp_oembed_get(esc_url($value)).'</div>';
                
            }
                        
            $del_class  = ' visible';
            
            $add_class  = ' hidden';
            
        }else{
            
            $video      = '';
                        
            $del_class  = '';
            
            $add_class  = '';
            
        }
        
        echo '<div id="'.$uniqid.'" class="wpm-video-uploader">
    <a href="javascript:void(0);" class="wpm-upload-video-button'.$add_class.'" data-id="'.$uniqid.'">'.__('Ajouter','idcomtools').'</a>
    <button class="wpm-remove-video-button'.$del_class.'" data-id="'.$uniqid.'">'.__('Retirer','idcomtools').'</button>
    '.$video.'
</div>
<div id="'.$uniqid.'_back" class="wpm-video-uploader-data" data-insert="'.__('Insérer une vidéo','idcomtools').'" data-use="'.__('Utiliser cette vidéo','idcomtools').'">
    <input type="text" class="remote-video" placeholder="'.__('YouTube ou Vimeo...','idcomtools').'" data-id="'.$uniqid.'"/>
    <input type="hidden" name="'.$name.'" id="'.$name.'" class="wpm-video" data-id="'.$uniqid.'" value="'.esc_url($value).'"/>
    <a href="javascript:void(0);" class="wpm-upload-video-library" data-id="'.$uniqid.'">'.__('Médiathèque','idcomtools').'</a>
    <a href="javascript:void(0);" class="cancel" data-id="'.$uniqid.'">'.__('Annuler','idcomtools').'</a>
</div>';
        
    }
    
}

/**
 * Upload video playlist on settings pages (mp4, m4v, mov, avi, mpg, ogv, 3gp, 3g2)
 */
if(!function_exists('wpm_video_playlist_uploader_field')){
    
    function wpm_video_playlist_uploader_field($name, $values = '', $min = '', $max = ''){
        
        $v = $values != '' ? explode(',',$values) : 0;
        
        $min    = intval($min) > 0 ? $min : '';
        
        $max    = intval($max > 0) ? $max : '';
        
        $uniqid = md5(uniqid(rand(),true));
        
        $html   = htmlentities('<div class="video-item '.$name.'"><div id="uniqid" class="wpm-video-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-video-button" data-id="uniqid">'.__('Ajouter','idcomtools').'</a>
    <button class="wpm-remove-video-button" data-id="uniqid">'.__('Retirer','idcomtools').'</button>
</div>
<div id="uniqid_back" class="wpm-video-playlist-uploader-data" data-insert="'.__('Insérer une vidéo','idcomtools').'" data-use="'.__('Utiliser cette vidéo','idcomtools').'">
    <input type="text" class="remote-video" placeholder="'.__('YouTube ou Vimeo...','idcomtools').'" data-id="uniqid"/>
    <input type="hidden" class="wpm-video video-playlist_'.$name.'" data-name="'.$name.'" data-id="uniqid" value=""/>
    <a href="javascript:void(0);" class="wpm-upload-video-library" data-id="uniqid">'.__('Médiathèque','idcomtools').'</a>
    <a href="javascript:void(0);" class="cancel" data-id="uniqid">'.__('Annuler','idcomtools').'</a>
</div></div>',ENT_QUOTES);
        
        if($v != 0){
            
            echo '<div class="videos">';
            
            for($i=0; $i<count($v); $i++){
                
                $id         = wpm_uniqid(5);
                            
                if(is_numeric($v[$i])){

                    $url    = wp_get_attachment_url($v[$i]);

                    $mime   = get_post_mime_type($v[$i]);

                    $video  = '<video class="local-video video" width="100%" height="100%" controls><source src="'.$url.'" type="'.$mime.'"></video>';

                }else{

                    $video  = '<div class="wpm-remote-video video">'.wp_oembed_get(esc_url($v[$i])).'</div>';

                }

                $del_class  = '';

                $add_class  = ' hidden';
                
                echo '<div class="video-item '.$name.'"><div id="'.$uniqid.'_'.$id.'" class="wpm-video-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-video-button'.$add_class.'" data-id="'.$uniqid.'_'.$id.'">'.__('Ajouter','idcomtools').'</a>
    <button class="wpm-remove-video-button'.$del_class.'" data-id="'.$uniqid.'_'.$id.'">'.__('Retirer','idcomtools').'</button>
    '.$video.'
</div>
<div id="'.$uniqid.'_'.$id.'_back" class="wpm-video-playlist-uploader-data" data-insert="'.__('Insérer une vidéo','idcomtools').'" data-use="'.__('Utiliser cette vidéo','idcomtools').'">
    <input type="text" class="remote-video" placeholder="'.__('YouTube ou Vimeo...','idcomtools').'" data-id="'.$uniqid.'_'.$id.'"/>
    <input type="hidden" class="wpm-video video-playlist_'.$name.'" data-name="'.$name.'" data-id="'.$uniqid.'_'.$id.'" value="'.$v[$i].'"/>
    <a href="javascript:void(0);" class="wpm-upload-video-library" data-id="'.$uniqid.'_'.$id.'">'.__('Médiathèque','idcomtools').'</a>
    <a href="javascript:void(0);" class="cancel" data-id="'.$uniqid.'_'.$id.'">'.__('Annuler','idcomtools').'</a>
</div></div>';

            }
                        
            if(count($v) < $max){
                
                $id         = wpm_uniqid(5);
                
                echo '<div class="video-item '.$name.'"><div id="'.$uniqid.'_'.$id.'" class="wpm-video-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-video-button" data-id="'.$uniqid.'_'.$id.'">'.__('Ajouter','idcomtools').'</a>
    <button class="wpm-remove-video-button" data-id="'.$uniqid.'_'.$id.'">'.__('Retirer','idcomtools').'</button>
</div>
<div id="'.$uniqid.'_'.$id.'_back" class="wpm-video-playlist-uploader-data" data-insert="'.__('Insérer une vidéo','idcomtools').'" data-use="'.__('Utiliser cette vidéo','idcomtools').'">
    <input type="text" class="remote-video" placeholder="'.__('YouTube ou Vimeo...','idcomtools').'" data-id="'.$uniqid.'_'.$id.'"/>
    <input type="hidden" class="wpm-video video-playlist_'.$name.'" data-name="'.$name.'" data-id="'.$uniqid.'_'.$id.'" value=""/>
    <a href="javascript:void(0);" class="wpm-upload-video-library" data-id="'.$uniqid.'_'.$id.'">'.__('Médiathèque','idcomtools').'</a>
    <a href="javascript:void(0);" class="cancel" data-id="'.$uniqid.'_'.$id.'">'.__('Annuler','idcomtools').'</a>
</div></div>';
                
            }
            
            echo '</div>';
            
            echo '<input type="hidden" id="'.$name.'" value="'.$values.'" data-id="'.$uniqid.'" data-html="'.$html.'"/>
<div id="'.$name.'_counter" class="video-playlist-counter" data-min="'.$min.'" data-max="'.$max.'"><span class="count">'.count($v).' / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
            
        }else{
            
            echo '<div class="videos">';
            
            for($i=0; $i<$min; $i++){
                
                $id         = wpm_uniqid(5);
                
                $video      = '';

                $del_class  = '';

                $add_class  = '';
                
                echo '<div class="video-item '.$name.'"><div id="'.$uniqid.'_'.$id.'" class="wpm-video-playlist-uploader">
    <a href="javascript:void(0);" class="wpm-upload-video-button'.$add_class.'" data-id="'.$uniqid.'_'.$id.'">'.__('Ajouter','idcomtools').'</a>
    <button class="wpm-remove-video-button'.$del_class.'" data-id="'.$uniqid.'_'.$id.'">'.__('Retirer','idcomtools').'</button>
    '.$video.'
</div>
<div id="'.$uniqid.'_'.$id.'_back" class="wpm-video-playlist-uploader-data" data-insert="'.__('Insérer une vidéo','idcomtools').'" data-use="'.__('Utiliser cette vidéo','idcomtools').'">
    <input type="text" class="remote-video" placeholder="'.__('YouTube ou Vimeo...','idcomtools').'" data-id="'.$uniqid.'_'.$id.'"/>
    <input type="hidden" class="wpm-video video-playlist_'.$name.'" data-name="'.$name.'" data-id="'.$uniqid.'_'.$id.'" value=""/>
    <a href="javascript:void(0);" class="wpm-upload-video-library" data-id="'.$uniqid.'_'.$id.'">'.__('Médiathèque','idcomtools').'</a>
    <a href="javascript:void(0);" class="cancel" data-id="'.$uniqid.'_'.$id.'">'.__('Annuler','idcomtools').'</a>
</div></div>';
                
            }
            
            echo '</div>';
            
            echo '<input type="hidden" id="'.$name.'" value="" data-id="'.$uniqid.'" data-html="'.$html.'"/>
<div id="'.$name.'_counter" class="video-playlist-counter" data-min="'.$min.'" data-max="'.$max.'"><span class="count">0 / '.$max.'</span> <span class="min">min. : '.$min.'</span></div>';
            
        }
        
    }
    
}

/**********************************************************************************
 *  
 *  Save panel settings
 * 
 *********************************************************************************/

if(!function_exists('wpm_save_panel_settings')){
    
    function wpm_save_panel_settings(){
        
        global $wp;
        
        global $wpdb;
        
        $data = $_POST;
        
        $option         = sanitize_text_field($_POST['option']);
        
        $sub_option     = sanitize_text_field($_POST['sub_option']);
        
        $opts           = !get_option($option) ? array() : get_option($option);
        
        $sub_opts       = array();
                        
        $excluded       = array('action','option','sub_option');
        
        $response = array(
            'status'        => 1,
            'notice'        => __('Données sauvegardées','idcomtools')
        );
        
        foreach($data as $k => $v){
            
            if(!in_array($k,$excluded)){
                
                if($v[1] == 'checkbox'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : 'false';
                                        
                }else if($v[1] == 'radio'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                                        
                }else if($v[1] == 'range'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                }else if($v[1] == 'text' && $v[4] === ''){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? stripslashes(sanitize_text_field($v[0])) : '';
                                        
                    $check = wpm_check_string_length($value, $v[2], $v[3]);

                    if(!$check['status']){

                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );

                    }
                    
                }else if($v[1] == 'text' && $v[4] !== ''){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? stripslashes(sanitize_text_field($v[0])) : '';
                    
                    $check = wpm_check_date($value, $v[4]);

                    if(!$check['status']){

                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );

                    }
                    
                }else if($v[1] == 'number'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_number($value, $v[2], $v[3]);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'email'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_email_address($value);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'password'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_string_length($value, $v[2], $v[3]);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'tel'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? stripslashes(sanitize_text_field($v[0])) : '';
                    
                    $check = wpm_check_phone($value);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'textarea'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? stripslashes(sanitize_text_field($v[0])) : '';
                    
                    $check = wpm_check_string_length($value, $v[2], $v[3]);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'tags'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? stripslashes(sanitize_text_field($v[0])) : '';
                    
                    $check = wpm_check_tags_length($value, $v[2], $v[3]);
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'wpeditor'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? wp_kses_post(stripslashes($v[0])) : '';
                    
                }else if($v[1] == 'select'){
                                        
                    $value = isset($v[0]) && $v[0] != NULL ? (is_array($v[0]) ? sanitize_text_field(implode(',',$v[0])) : sanitize_text_field($v[0])) : '';
                    
                }else if($v[1] == 'img'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                }else if($v[1] == 'img_gallery'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_medias_length($value, $v[2], $v[3], __('image(s)','idcomtools'));
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'color'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                }else if($v[1] == 'audio'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                }else if($v[1] == 'audio_playlist'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_medias_length($value, $v[2], $v[3], __('son(s)','idcomtools'));
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }else if($v[1] == 'video'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                }else if($v[1] == 'video_playlist'){
                    
                    $value = isset($v[0]) && $v[0] != NULL ? sanitize_text_field($v[0]) : '';
                    
                    $check = wpm_check_medias_length($value, $v[2], $v[3], __('vidéo(s)','idcomtools'));
                    
                    if(!$check['status']){
                        
                        $response = array(
                            'status'        => 0,
                            'notice'        => $check['notice']
                        );
                        
                    }
                    
                }
                
                $sub_opts[$k] = $value;
                
            }
            
        }
        
        $opts[$sub_option] = $sub_opts;
                
        if($response['status'] === 1){
            
            update_option($option,$opts,'','yes');
            
        }
        
        echo json_encode($response);
    
        wp_die();
        
    }
    
    add_action('wp_ajax_wpm_save_panel_settings','wpm_save_panel_settings');
    
}