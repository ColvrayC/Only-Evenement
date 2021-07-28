<?php

/* 
 * WP MOUSE fields generator class
 */
if(!class_exists('WPM_admin_ui')){
    
    class WPM_admin_ui {
    
        /**
         * vars
         */    
        public      $option;

        public      $data;

        public      $setting;

        public      $save;

        public      $slug;

        public      $link;

        public      $panel;

        public      $el;

        public      $tpl;

        public      $tabs       = '';

        public      $panels     = '';

        public      $ui         = array();

        public function __construct($options){

            $this->option       = $options['option'];

            $this->setting      = $options['setting'];

            $this->save         = $options['save'];

            $this->slug         = $options['slug'];

            $this->link         = $options['link'];

            if(!get_option($this->option)){

                $this->data     = array();

            }else{

                $this->data     = get_option($this->option);

            }

        }

        /**
         * Register a panel
         */
        public function panel($panel){

            /**
             * $panel = array(
             *     'tab'       => array(
             *         'icon'      => 'fas fa-check',
             *         'label'     => 'My panel',
             *         'id'        => 'panel_id'
             *     )
             * );
             */

            $panel['fields'] = array();

            array_push($this->ui,$panel);

        }

        /**
         * Add field to panel
         */
        public function add($el){

            /**
             * Checkbox field:
             * $args = array(
             *      'el'                => 'checkbox',
             *      'id'                => 'wpm_checkbox',
             *      'title'             => 'My checkbox',
             *      'description'       => 'My checkbox description...',
             *      'label'             => 'My checkbox label'
             *  );
             */

            /**
             * Radio buttons field:
             * $args = array(
             *      'el'                => 'radio',
             *      'id'                => 'wpm_radio',
             *      'title'             => 'My radio buttons',
             *      'description'       => 'My radio buttons description...',
             *      'values'            => array('Option 1','Option 2','Option 3')
             *  );
             */

            /**
             * Range slider field:
             * $args = array(
             *      'el'                => 'range',
             *      'id'                => 'wpm_range',
             *      'title'             => 'My range slider',
             *      'description'       => 'My range slider description...',
             *      'data'              => array(
             *          'skin'                         => '',
             *          'prefix'                       => '',
             *          'postfix'                      => '',
             *          'max-postfix'                  => '',
             *          'decorate-both'                => '',
             *          'input-values-separator'       => '',
             *          'disable'                      => '',
             *          'extra-classes'                => '',
             *          'type'                         => '',
             *          'min'                          => '',
             *          'max'                          => '',
             *          'from'                         => '',
             *          'to'                           => '',
             *          'step'                         => '',
             *          'min-interval'                 => '',
             *          'max-interval'                 => '',
             *          'drag-interval'                => '',
             *          'values'                       => ''
             *      )
             *  );
             */

            /**
             * Input text field (text, email, password):
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_text',
             *      'title'             => 'My simple textfield',
             *      'description'       => 'My simple textfield description...',
             *      'placeholder'       => 'My placeholder',
             *      'type'              => 'text', // text, email, password
             *      'min'               => '',
             *      'max'               => '',
             *      'class'             => '' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * Input number/float field:
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_text',
             *      'title'             => 'My simple textfield',
             *      'description'       => 'My simple textfield description...',
             *      'placeholder'       => 'My placeholder',
             *      'type'              => 'number',
             *      'min'               => '',
             *      'max'               => '',
             *      'float'             => 0, // 0 => INT, 1 => float
             *      'step'              => '', // if INT => 1 or 2 or 3, etc., if float: 0.1 or 0.01 or 0.001 or 0.0001, etc.
             *      'class'             => '' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * Textarea field:
             * $args = array(
             *      'el'                => 'textarea',
             *      'id'                => 'wpm_textarea',
             *      'title'             => 'My simple textarea field',
             *      'description'       => 'My simple textarea field description...',
             *      'placeholder'       => 'My textarea',
             *      'type'              => 'textarea',
             *      'min'               => '',
             *      'max'               => '',
             *      'rows'              => '',
             *      'class'             => '' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * Tags field:
             * $args = array(
             *      'el'                => 'tags',
             *      'id'                => 'wpm_tags',
             *      'title'             => 'My simple tags field',
             *      'description'       => 'My simple tags field description...',
             *      'min'               => '',
             *      'max'               => ''
             *  );
             */

            /**
             * Fr phone mask input field:
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_phone_mask_input_fr',
             *      'title'             => 'My simple fr phone mask input field',
             *      'description'       => 'My simple fr phone mask input field description...',
             *      'placeholder'       => 'My fr phone mask input',
             *      'type'              => 'tel',
             *      'class'             => 'fr-phone' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * Siret / Siren input field:
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_siret_input_fr',
             *      'title'             => 'My siret mask input field',
             *      'description'       => 'My siret mask input field description...',
             *      'placeholder'       => 'My siret mask input',
             *      'type'              => 'text',
             *      'class'             => '' // add "siret" for siret, "siren" for siren / lg, md, xs (blank = full)
             *  );
             */

            /**
             * Fr and US date mask input field:
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_mask_input_fr',
             *      'title'             => 'My simple fr mask input field',
             *      'description'       => 'My simple fr mask input field description...',
             *      'placeholder'       => 'My fr mask input',
             *      'type'              => 'fr-date', // fr-date or us-date
             *      'class'             => '' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * Fr and US date picker field:
             * $args = array(
             *      'el'                => 'text',
             *      'id'                => 'wpm_fr_date_picker',
             *      'title'             => 'My simple fr date picker field',
             *      'description'       => 'My simple fr date picker field description...',
             *      'placeholder'       => 'My fr date picker',
             *      'type'              => 'fr-date-picker', // fr-date-picker or us-date-picker
             *      'class'             => '' // lg, md, xs (blank = full)
             *  );
             */

            /**
             * WP editor field:
             * $args = array(
             *      'el'                => 'wp-editor',
             *      'id'                => 'wpm_wp_editor',
             *      'title'             => 'My WP editor field',
             *      'description'       => 'My WP editor description...'
             *  );
             */

            /**
             * Simple/multiple select field (included select2):
             * $args = array(
             *      'el'                => 'select',
             *      'id'                => 'wpm_select',
             *      'title'             => 'My simple select field',
             *      'description'       => 'My simple select field description...',
             *      'options'           => array('Option 1','Option 2','Option 3'),
             *      'type'              => '', // <- multiple
             *      'class'             => ''  // select2 to embed select2
             *  );
             */

            /**
             * Single image field:
             * $args = array(
             *      'el'                => 'img',
             *      'id'                => 'wpm_img',
             *      'title'             => 'My img field',
             *      'description'       => 'My img description...'
             *  );
             */

            /**
             * Images gallery field:
             * $args = array(
             *      'el'                => 'img_gallery',
             *      'id'                => 'wpm_img_gallery',
             *      'title'             => 'My img field',
             *      'description'       => 'My img description...',
             *      'min'               => 1,
             *      'max'               => 10
             *  );
             */

            /**
             * Color field (hexa or rgba):
             * $args = array(
             *      'el'                => 'color',
             *      'id'                => 'wpm_color',
             *      'title'             => 'My color field',
             *      'description'       => 'My color description...',
             *      'alpha'             => false // false = hexa, true = rgba
             *  );
             */

            /**
             * Single audio field:
             * $args = array(
             *      'el'                => 'audio',
             *      'id'                => 'wpm_audio',
             *      'title'             => 'My audio field',
             *      'description'       => 'My audio description...'
             *  );
             */

            /**
             * Audio playlist field:
             * $args = array(
             *      'el'                => 'audio_playlist',
             *      'id'                => 'wpm_audio_playlist',
             *      'title'             => 'My audio playlist field',
             *      'description'       => 'My audio playlist description...',
             *      'min'               => 1,
             *      'max'               => 10
             *  );
             */

            /**
             * Single video field:
             * $args = array(
             *      'el'                => 'video',
             *      'id'                => 'wpm_video',
             *      'title'             => 'My video field',
             *      'description'       => 'My video description...'
             *  );
             */

            /**
             * Video playlist field:
             * $args = array(
             *      'el'                => 'video_playlist',
             *      'id'                => 'wpm_video_playlist',
             *      'title'             => 'My video playlist field',
             *      'description'       => 'My video playlist description...',
             *      'min'               => 1,
             *      'max'               => 10
             *  );
             */

            array_push($this->ui[count($this->ui)-1]['fields'],$el);

        }

        /**
         * Build panel fields
         */
        public function panel_fields($fields,$i,$panel_id){

            global $google_fonts;

            $fields_data    = '';

            $output_fields  = '';

            $class          = $i == 0 ? ' active' : '';
            
            $panel_class    = $class;

            $tpl            = '<div class="form-group">
        <div class="label">
            <span class="title">_TITLE_</span>
            <span class="info"> <i class="fas fa-info-circle"></i> _DESC_</span>
        </div>
        _FIELD_
    </div>';

            for($j=0; $j<count($fields); $j++){

                /**
                 * Output checkbox
                 */
                if($fields[$j]['el'] == 'checkbox'){

                    $checked = $this->data[$panel_id][$fields[$j]['id']] != NULL ? ($this->data[$panel_id][$fields[$j]['id']] == 'true' ? ' checked' : '') : '';

                    $field = '<div class="input checkbox">
        <label>
            <input type="checkbox" id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'"'.$checked.'/>
            <div class="slider"></div>
            <span>'.$fields[$j]['label'].'</span>
        </label>
    </div>';

                /**
                 * Output radio buttons
                 */
                }else if($fields[$j]['el'] == 'radio'){

                    $options = '';

                    for($x=0; $x<count($fields[$j]['values']); $x++){

                        $checked = $this->data[$panel_id][$fields[$j]['id']] != NULL ? ($this->data[$panel_id][$fields[$j]['id']] == $fields[$j]['values'][$x] ? ' checked' : '') : '';

                        $options .= '<label><input type="radio" id="'.$fields[$j]['id'].'_'.($x+1).'" name="'.$fields[$j]['id'].'"'.$checked.'/> <span>'.$fields[$j]['values'][$x].'</span></label>';

                    }

                    $field = '<div class="input radio"><p>'.$options.'</p></div>';

                /**
                 * Output range slider
                 */
                }else if($fields[$j]['el'] == 'range'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $skin  = $fields[$j]['data']['skin'] == '' ? 'flat' : $fields[$j]['data']['skin'];

                    $field = '<div class="input ionrs">
        <input type="text" id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" data-skin="'.$skin.'" data-prefix="'.$fields[$j]['data']['prefix'].'" data-postfix="'.$fields[$j]['data']['postfix'].'" data-max-postfix="'.$fields[$j]['data']['max-postfix'].'" data-decorate-both="'.$fields[$j]['data']['decorate-both'].'" data-input-values-separator="'.$fields[$j]['data']['input-values-separator'].'" data-disable="'.$fields[$j]['data']['disable'].'" data-extra-classes="'.$fields[$j]['data']['extra-classes'].'" data-type="'.$fields[$j]['data']['type'].'" data-min="'.$fields[$j]['data']['min'].'" data-max="'.$fields[$j]['data']['max'].'" data-from="'.$fields[$j]['data']['from'].'" data-to="'.$fields[$j]['data']['to'].'"  data-step="'.$fields[$j]['data']['step'].'" data-min-interval="'.$fields[$j]['data']['min-interval'].'" data-max-interval="'.$fields[$j]['data']['max-interval'].'" data-drag-interval="'.$fields[$j]['data']['drag-interval'].'" data-values="'.$fields[$j]['data']['values'].'" class="ionrangeslider" value="'.$value.'"/>
    </div>';

                /**
                 * Output textfield (text, email, password, number, float, fr & us mask input date, fr & us date picker)
                 */
                }else if($fields[$j]['el'] == 'text'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $types = array('text','email','password');

                    if($fields[$j]['type'] == 'number'){

                        $step = $fields[$j]['step'] != '' ? ' step="'.$fields[$j]['step'].'"' : '';

                        $atts = 'min="'.$fields[$j]['min'].'" max="'.$fields[$j]['max'].'" '.$step;

                        $class= '';

                        $type = $fields[$j]['type'];

                        $counter = '';

                    }else if($fields[$j]['type'] == 'tel'){

                        $atts = 'minlength="'.$fields[$j]['min'].'" maxlength="'.$fields[$j]['max'].'"';

                        $class= '';

                        $type = $fields[$j]['type'];

                        $counter = '';

                    }else if($fields[$j]['type'] == 'tel'){

                        $atts = 'minlength="14" maxlength="14"';

                        $class= '';

                        $type = $fields[$j]['type'];

                        $counter = '';

                    }else if(in_array($fields[$j]['type'],$types)){

                        $atts = 'minlength="'.$fields[$j]['min'].'" maxlength="'.$fields[$j]['max'].'"';

                        $class= '';

                        $type = $fields[$j]['type'];

                        $counter = '<span class="counter" data-counter="'.$fields[$j]['id'].'">'.strlen($value).'</span>';

                    }else{

                        $atts = 'minlength="10" maxlength="10"';

                        $class= ' '.$fields[$j]['type'];

                        $type = 'text';

                        $counter = '<span class="counter" data-counter="'.$fields[$j]['id'].'">'.strlen($value).'</span>';

                    }

                    $field = '<div class="input text">
        <input type="'.$type.'" id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" class="'.$fields[$j]['class'].$class.'" placeholder="'.$fields[$j]['placeholder'].'" '.$atts.' value="'.$value.'"/>
        '.$counter.'
    </div>';

                /**
                 * Output textarea
                 */
                }else if($fields[$j]['el'] == 'textarea'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $counter = '<span class="counter" data-counter="'.$fields[$j]['id'].'">'.strlen($value).'</span>';

                    $field = '<div class="input textarea">
        <textarea id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" class="'.$fields[$j]['class'].'" rows="'.$fields[$j]['rows'].'" placeholder="'.$fields[$j]['placeholder'].'" minlength="'.$fields[$j]['min'].'" maxlength="'.$fields[$j]['max'].'">'.$value.'</textarea>
        '.$counter.'
    </div>';

                /**
                 * Output tags
                 */
                }else if($fields[$j]['el'] == 'tags'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $field = '<div class="input tags">
        <input type="text" id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" min="'.$fields[$j]['min'].'" max="'.$fields[$j]['max'].'" value="'.$value.'"/>
    </div>';

                /**
                 * Output WP editor
                 */
                }else if($fields[$j]['el'] == 'wp-editor'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $wpeditor = array(
                        'textarea_name' => $fields[$j]['id'],
                        'media_buttons' => true,
                        'textarea_rows' => 15,
                        'tinymce'       => array(
                            'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,alignjustify,separator,link,unlink,undo,redo',
                            'toolbar2'      => '',
                            'toolbar3'      => ''
                        ),
                    );

                    ob_start();

                    wp_editor($value, $fields[$j]['id'], $wpeditor);

                    $editor = ob_get_clean();

                    $field = '<div class="input wpeditor">'.$editor.'</div>';

                /**
                 * Output select (single & multiple select / select 2) 
                 */
                }else if($fields[$j]['el'] == 'select'){

                    $preview = '';

                    $multiple = $fields[$j]['type'] == 'multiple' ? ' '.$fields[$j]['type'] : '';

                    $options  = '';

                    if($fields[$j]['type'] == 'multiple'){

                        $values = explode(',',$this->data[$panel_id][$fields[$j]['id']]);

                    }

                    if($fields[$j]['options'] === 'fonts'){

                        for($x=0; $x<count($google_fonts['items']); $x++){

                            $selected = $this->data[$panel_id][$fields[$j]['id']] != NULL ? ($this->data[$panel_id][$fields[$j]['id']] == $x ? ' selected' : '') : '';

                            $options .= '<option value="'.$x.'"'.$selected.'>'.$google_fonts['items'][$x]['family'].'</option>';

                        }

                        $preview = '<div class="preview-font" style="" data-font="'.$google_fonts['items'][$this->data[$panel_id][$fields[$j]['id']]]['family'].'">
        <div class="positive">
            <h1>'.__('Mon magnifique titre','idcomtools').'</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="negative">
            <h1>'.__('Mon magnifique titre','idcomtools').'</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
    </div>';

                    }else{
                        
                        $vals = isset($fields[$j]['values']) && count($fields[$j]['values']) > 0 ? $fields[$j]['values'] : NULL;

                        for($x=0; $x<count($fields[$j]['options']); $x++){

                            if($fields[$j]['type'] == 'multiple'){

                                if($vals != NULL){
                                    
                                    $selected = in_array($fields[$j]['values'][$x], $values) ? ' selected' : '';
                                    
                                }else{
                                    
                                    $selected = in_array($fields[$j]['options'][$x], $values) ? ' selected' : '';
                                    
                                }

                            }else{
                                
                                if($vals != NULL){
                                    
                                    $selected = $this->data[$panel_id][$fields[$j]['id']] != NULL ? ($this->data[$panel_id][$fields[$j]['id']] == $fields[$j]['values'][$x] ? ' selected' : '') : '';
                                    
                                }else{
                                    
                                    $selected = $this->data[$panel_id][$fields[$j]['id']] != NULL ? ($this->data[$panel_id][$fields[$j]['id']] == $fields[$j]['options'][$x] ? ' selected' : '') : '';
                                    
                                }

                            }
                            
                            if($vals != NULL){
                                
                                $options .= '<option value="'.$fields[$j]['values'][$x].'"'.$selected.'>'.$fields[$j]['options'][$x].'</option>';
                                
                            }else{
                                
                                $options .= '<option value="'.$fields[$j]['options'][$x].'"'.$selected.'>'.$fields[$j]['options'][$x].'</option>';
                                
                            }

                        }

                    }

                    $field = '<div class="input select">
            <select id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" class="'.$fields[$j]['class'].'"'.$multiple.'>
                '.$options.'
            </select>
            '.$preview.'
        </div>';

                /**
                 * Output image
                 */
                }else if($fields[$j]['el'] == 'img'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_img_uploader_field($fields[$j]['id'],$value);

                    $img = ob_get_clean();

                    $field = '<div class="input img">
        '.$img.'
    </div>';

                /**
                 * Output images gallery
                 */
                }else if($fields[$j]['el'] == 'img_gallery'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_img_gallery_uploader_field($fields[$j]['id'],$value,$fields[$j]['min'],$fields[$j]['max']);

                    $gallery = ob_get_clean();

                    $field = '<div class="input gallery">
        '.$gallery.'
    </div>';

                /**
                 * Output color (hexa & rgba)
                 */
                }else if($fields[$j]['el'] == 'color'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    $atts  = $fields[$j]['alpha'] ? ' class="color-picker" data-alpha-enabled="true"' : '';

                    $field = '<div class="input hexacolor">
        <input type="text" id="'.$fields[$j]['id'].'" name="'.$fields[$j]['id'].'" '.$atts.'value="'.$value.'"/>
    </div>';

                /**
                 * Output single audio
                 */
                }else if($fields[$j]['el'] == 'audio'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_audio_uploader_field($fields[$j]['id'], $value);

                    $audio = ob_get_clean();

                    $field = '<div class="input audio">
        '.$audio.'
    </div>';

                /**
                 * Output audio playlist
                 */
                }else if($fields[$j]['el'] == 'audio_playlist'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_audio_playlist_uploader_field($fields[$j]['id'], $value, $fields[$j]['min'], $fields[$j]['max']);

                    $audio_playlist = ob_get_clean();

                    $field = '<div class="input audio-playlist">
        '.$audio_playlist.'
    </div>';

                /**
                 * Output single video
                 */
                }else if($fields[$j]['el'] == 'video'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_video_uploader_field($fields[$j]['id'],$value);

                    $video = ob_get_clean();

                    $field = '<div class="input video">
        '.$video.'
    </div>';

                /**
                 * Output video playlist
                 */
                }else if($fields[$j]['el'] == 'video_playlist'){

                    $value = $this->data[$panel_id][$fields[$j]['id']] != NULL ? $this->data[$panel_id][$fields[$j]['id']] : '';

                    ob_start();

                    wpm_video_playlist_uploader_field($fields[$j]['id'],$value, $fields[$j]['min'], $fields[$j]['max']);

                    $video_playlist = ob_get_clean();

                    $field = '<div class="input video-playlist">
        '.$video_playlist.'
    </div>';

                }

                $output_fields  .= str_replace(array('_TITLE_','_DESC_','_FIELD_'),array($fields[$j]['title'],$fields[$j]['description'],$field),$tpl);

                $field_data     = $j < 1 ? $fields[$j]['id'].'|'.$fields[$j]['el'] : ','.$fields[$j]['id'].'|'.$fields[$j]['el'];

                $fields_data    .= $field_data;

            }

            $panel = '<div id="p_'.($i+1).'" data-id="'.$panel_id.'" data-option="'.$this->option.'" data-fields="'.$fields_data.'" class="panel'.$panel_class.'">'.$output_fields.'</div>';

            return $panel;

        }

        /**
         * Output UI
         */
        public function output(){

            global $plug_assets;

            for($i=0; $i<count($this->ui); $i++){

                $active = $i == 0 ? ' active' : '';

                $this->tabs   .= '<li class="setting'.$active.'" data-tab="p_'.($i+1).'"><span><i class="'.$this->ui[$i]['tab']['icon'].'"></i> <span>'.$this->ui[$i]['tab']['label'].'</span></span></li>';

                $this->panels .= $this->panel_fields($this->ui[$i]['fields'],$i,$this->ui[$i]['tab']['id']);

            }

            $this->tpl = '<div class="wrap wpm">
    <div class="row header">
        <div class="saving-notice">
            <span class="saving">'.__('Sauvegarde des données','idcomtools').'</span>
            <img src="'.esc_url($plug_assets['loader']).'" alt="WPM Loader" class="loader"/>
        </div>
        <div class="sidebar">
            <img src="'.esc_url($plug_assets['logo']).'" alt="'.esc_html($plug_assets['alt']).'" class="logo"/> <span>'.esc_html('Satellites','idcomtools').' <span class="version">'.IDCOMTOOLSv.'</span></span>
        </div>
        <div class="content">
            <span><i class="fas fa-sliders-h"></i> '.$this->setting.'</span>
            <button type="button" id="save_settings">
                <i class="fas fa-check"></i> '.$this->save.'
            </button>
        </div>
    </div>
    <div class="row settings">
        <!-- buttons -->
        <ul class="sidebar">
            '.$this->tabs.'
        </ul>
        <!-- panels -->
        <div class="content">
            '.$this->panels.'
        </div>
    </div>
    <!-- FOOTER -->
    <div class="row footer">
        <div class="sidebar">
            <img src="'.esc_url($plug_assets['logo']).'" alt="'.esc_html($plug_assets['alt']).'" class="logo"/> <span>'.esc_html($plug_assets['alt']).'</span>
        </div>
        <div class="content">
            <span><i class="fas fa-thumbs-up"></i> <span>'.$this->slug.'</span></span>
            <a href="'.$this->link.'" id="plugin_link" target="_blank" rel="noopener">
                <i class="fas fa-link"></i> '.esc_html($plug_assets['alt']).'
            </a>
        </div>
    </div>
</div>
<div id="wpm-notice">
    <div class="wpm-notice">
        <p class="wpm-message"></p>
        <a href="javascript:void(0);" class="button">'.__('Ok c\'est noté','idcomtools').'</a>
    </div>
</div>
<div id="wpm-loader">
    <div class="wpm-loader">
        <img src="'.esc_url($plug_assets['logo']).'" alt=""/>
    </div>
</div>';

            echo $this->tpl;

        }

    }
    
}