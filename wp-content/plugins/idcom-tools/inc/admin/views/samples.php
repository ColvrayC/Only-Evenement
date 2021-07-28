<?php

/**
 * UI instantiation
 */
$ui = array(
    'option'        => 'my_plugin',
    'setting'       => __('My fucking settings','wpmtbox'),
    'save'          => __('Save','wpmtbox'),
    'slug'          => __('This is a fucking plugin!','wpmtbox'),
    'link'          => 'https://www.01media.fr'
);

$wpmui  = new WPM_admin_ui($ui);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-check',
        'label'     => __('My checkboxes','wpmtbox'),
        'id'        => 'panel_1'
    )
);

$wpmui->panel($panel);

/**
 * Add a checkbox field
 */
$args = array(
    'el'                => 'checkbox',
    'id'                => 'wpm_checkbox',
    'title'             => 'My checkbox',
    'description'       => 'My checkbox description...',
    'label'             => 'My checkbox label'
);

$wpmui->add($args);

/**
 * Add a radio buttons field
 */
$args = array(
    'el'                => 'radio',
    'id'                => 'wpm_radio',
    'title'             => 'My radio buttons',
    'description'       => 'My radio buttons description...',
    'values'            => array('Option 1','Option 2','Option 3')
);

$wpmui->add($args);

/**
 * Add a range slider field
 */
$args = array(
    'el'                => 'range',
    'id'                => 'wpm_range',
    'title'             => 'My range slider',
    'description'       => 'My range slider description...',
    'data'              => array(
        'skin'                         => '',
        'prefix'                       => '',
        'postfix'                      => '',
        'max-postfix'                  => '',
        'decorate-both'                => '',
        'input-values-separator'       => '',
        'disable'                      => '',
        'extra-classes'                => '',
        'type'                         => '',
        'min'                          => '',
        'max'                          => '',
        'from'                         => '',
        'to'                           => '',
        'step'                         => '',
        'min-interval'                 => '',
        'max-interval'                 => '',
        'drag-interval'                => '',
        'values'                       => ''
    )
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-edit',
        'label'     => __('My textfields','wpmtbox'),
        'id'        => 'panel_2'
    )
);

$wpmui->panel($panel);

/**
 * Add a text input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_text',
    'title'             => 'My simple textfield',
    'description'       => 'My simple textfield description...',
    'placeholder'       => 'My placeholder',
    'type'              => 'text',
    'min'               => 5,
    'max'               => 32,
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add an email input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_email',
    'title'             => 'My simple email field',
    'description'       => 'My simple email field description...',
    'placeholder'       => 'My email',
    'type'              => 'email',
    'min'               => '',
    'max'               => '',
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a password input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_password',
    'title'             => 'My simple password field',
    'description'       => 'My simple password field description...',
    'placeholder'       => 'My password',
    'type'              => 'password',
    'min'               => '',
    'max'               => '',
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a number input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_number',
    'title'             => 'My simple number field',
    'description'       => 'My simple number field description...',
    'placeholder'       => 'My number',
    'type'              => 'number',
    'min'               => 5,
    'max'               => '',
    'float'             => 0,
    'step'              => '',
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a float input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_float',
    'title'             => 'My simple float field',
    'description'       => 'My simple float field description...',
    'placeholder'       => 'My float',
    'type'              => 'number',
    'min'               => 0.1,
    'max'               => 0.3,
    'float'             => 1,
    'step'              => 0.01,
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a textarea field
 */
$args = array(
    'el'                => 'textarea',
    'id'                => 'wpm_textarea',
    'title'             => 'My simple textarea field',
    'description'       => 'My simple textarea field description...',
    'placeholder'       => 'My textarea',
    'type'              => 'textarea',
    'min'               => 32,
    'max'               => 300,
    'rows'              => 4,
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a tags field
 */
$args = array(
    'el'                => 'tags',
    'id'                => 'wpm_tags',
    'title'             => 'My simple tags field',
    'description'       => 'My simple tags field description...',
    'min'               => 5,
    'max'               => 12
);

$wpmui->add($args);

/**
 * Add a fr phone mask input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_phone_mask_input_fr',
    'title'             => 'My simple fr phone mask input field',
    'description'       => 'My simple fr phone mask input field description...',
    'placeholder'       => 'My fr phone mask input',
    'type'              => 'tel',
    'class'             => 'fr-phone' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a siret input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_siret_mask_input_fr',
    'title'             => 'My siret mask input field',
    'description'       => 'My siret mask input field description...',
    'placeholder'       => 'My siret mask input',
    'type'              => 'text',
    'class'             => 'siret' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a siren input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_siren_mask_input_fr',
    'title'             => 'My siren mask input field',
    'description'       => 'My siren mask input field description...',
    'placeholder'       => 'My siren mask input',
    'type'              => 'text',
    'class'             => 'siren' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a siren input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_siren_mask_input_fr_2',
    'title'             => 'My siren mask input field',
    'description'       => 'My siren mask input field description...',
    'placeholder'       => 'My siren mask input',
    'type'              => 'text',
    'class'             => 'siren' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a fr date mask input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_mask_input_fr',
    'title'             => 'My simple fr mask input field',
    'description'       => 'My simple fr mask input field description...',
    'placeholder'       => 'My fr mask input',
    'type'              => 'fr-date',
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a us date mask input field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_mask_input_us',
    'title'             => 'My simple us mask input field',
    'description'       => 'My simple us mask input field description...',
    'placeholder'       => 'My us mask input',
    'type'              => 'us-date',
    'class'             => '' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a fr date picker field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_fr_date_picker',
    'title'             => 'My simple fr date picker field',
    'description'       => 'My simple fr date picker field description...',
    'placeholder'       => 'My fr date picker',
    'type'              => 'fr-date-picker',
    'class'             => 'md' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a us date picker field
 */
$args = array(
    'el'                => 'text',
    'id'                => 'wpm_us_date_picker',
    'title'             => 'My simple us date picker field',
    'description'       => 'My simple us date picker field description...',
    'placeholder'       => 'YYYY-MM-DD',
    'type'              => 'us-date-picker',
    'class'             => 'md' // lg, md, xs (blank = full)
);

$wpmui->add($args);

/**
 * Add a WP editor field
 */
$args = array(
    'el'                => 'wp-editor',
    'id'                => 'wpm_wp_editor',
    'title'             => 'My WP editor field',
    'description'       => 'My WP editor description...'
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-caret-down',
        'label'     => __('My selects','wpmtbox'),
        'id'        => 'panel_3'
    )
);

$wpmui->panel($panel);

/**
 * Add a simple select field
 */
$args = array(
    'el'                => 'select',
    'id'                => 'wpm_select',
    'title'             => 'My simple select field',
    'description'       => 'My simple select field description...',
    'options'           => array('Option 1','Option 2','Option 3'),
    'type'              => '',
    'class'             => ''
);

$wpmui->add($args);

/**
 * Add a multiple select field
 */
$args = array(
    'el'                => 'select',
    'id'                => 'wpm_multiple_select',
    'title'             => 'My multiple select field',
    'description'       => 'My multiple select field description...',
    'options'           => array('Option 1','Option 2','Option 3'),
    'type'              => 'multiple',
    'class'             => ''
);

$wpmui->add($args);

/**
 * Add a select 2 field
 */
$args = array(
    'el'                => 'select',
    'id'                => 'wpm_select_2',
    'title'             => 'My select 2 field',
    'description'       => 'My select 2 field description...',
    'options'           => array('Option 1','Option 2','Option 3'),
    'type'              => '',
    'class'             => 'select2'
);

$wpmui->add($args);

/**
 * Add a multiple select 2 field
 */
$args = array(
    'el'                => 'select',
    'id'                => 'wpm_multiple_select_2',
    'title'             => 'My multiple select 2 field',
    'description'       => 'My multiple select 2 field description...',
    'options'           => array('Option 1','Option 2','Option 3'),
    'type'              => 'multiple',
    'class'             => 'select2'
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-images',
        'label'     => __('My images','wpmtbox'),
        'id'        => 'panel_4'
    )
);

$wpmui->panel($panel);

/**
 * Add a single image field
 */
$args = array(
    'el'                => 'img',
    'id'                => 'wpm_img',
    'title'             => 'My img field',
    'description'       => 'My img description...'
);

$wpmui->add($args);

/**
 * Add an images gallery field
 */
$args = array(
    'el'                => 'img_gallery',
    'id'                => 'wpm_img_gallery',
    'title'             => 'My img field',
    'description'       => 'My img description...',
    'min'               => 1,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add an images gallery field
 */
$args = array(
    'el'                => 'img_gallery',
    'id'                => 'wpm_img_gallery_2',
    'title'             => 'My img field',
    'description'       => 'My img description...',
    'min'               => 2,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-palette',
        'label'     => __('My colors','wpmtbox'),
        'id'        => 'panel_5'
    )
);

$wpmui->panel($panel);

/**
 * Add a simple color field
 */
$args = array(
    'el'                => 'color',
    'id'                => 'wpm_color',
    'title'             => 'My color field',
    'description'       => 'My color description...',
    'alpha'             => false
);

$wpmui->add($args);

/**
 * Add a rgba color field
 */
$args = array(
    'el'                => 'color',
    'id'                => 'wpm_rgba_color',
    'title'             => 'My rgba color field',
    'description'       => 'My rgba color description...',
    'alpha'             => true
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-headphones-alt',
        'label'     => __('My audio','wpmtbox'),
        'id'        => 'panel_6'
    )
);

$wpmui->panel($panel);

/**
 * Add a single audio field
 */
$args = array(
    'el'                => 'audio',
    'id'                => 'wpm_audio',
    'title'             => 'My audio field',
    'description'       => 'My audio description...'
);

$wpmui->add($args);

/**
 * Add an audio playlist field
 */
$args = array(
    'el'                => 'audio_playlist',
    'id'                => 'wpm_audio_playlist',
    'title'             => 'My audio playlist field',
    'description'       => 'My audio playlist description...',
    'min'               => 1,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add an audio playlist field
 */
$args = array(
    'el'                => 'audio_playlist',
    'id'                => 'wpm_audio_playlist_2',
    'title'             => 'My audio playlist field',
    'description'       => 'My audio playlist description...',
    'min'               => 2,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-film',
        'label'     => __('My video','wpmtbox'),
        'id'        => 'panel_7'
    )
);

$wpmui->panel($panel);

/**
 * Add a single video field
 */
$args = array(
    'el'                => 'video',
    'id'                => 'wpm_video',
    'title'             => 'My video field',
    'description'       => 'My video description...'
);

$wpmui->add($args);

/**
 * Add a video playlist field
 */
$args = array(
    'el'                => 'video_playlist',
    'id'                => 'wpm_video_playlist',
    'title'             => 'My video playlist field',
    'description'       => 'My video playlist description...',
    'min'               => 3,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add a video playlist field
 */
$args = array(
    'el'                => 'video_playlist',
    'id'                => 'wpm_video_playlist_2',
    'title'             => 'My video playlist field',
    'description'       => 'My video playlist description...',
    'min'               => 2,
    'max'               => 10
);

$wpmui->add($args);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-font',
        'label'     => __('My fonts','wpmtbox'),
        'id'        => 'panel_8'
    )
);

$wpmui->panel($panel);

/**
 * Add a select 2 field for Google fonts
 */
$args = array(
    'el'                => 'select',
    'id'                => 'wpm_google_fonts_1',
    'title'             => 'My Google fonts field',
    'description'       => 'My Google fonts field description...',
    'options'           => 'fonts',
    'type'              => '',
    'class'             => 'select2 gfonts'
);

$wpmui->add($args);

$args = array(
    'el'                => 'select',
    'id'                => 'wpm_google_fonts_2',
    'title'             => 'My Google fonts field',
    'description'       => 'My Google fonts field description...',
    'options'           => 'fonts',
    'type'              => '',
    'class'             => 'select2 gfonts'
);

$wpmui->add($args);

$args = array(
    'el'                => 'select',
    'id'                => 'wpm_google_fonts_3',
    'title'             => 'My Google fonts field',
    'description'       => 'My Google fonts field description...',
    'options'           => 'fonts',
    'type'              => '',
    'class'             => 'select2 gfonts'
);

$wpmui->add($args);

/**
 * Output panels
 */
$wpmui->output();