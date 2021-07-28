<?php

/**
 * UI instantiation
 */
$ui = array(
    'option'        => 'idcom_spabooker',
    'setting'       => __('Connexion à Spa Booker','idcomspabooker'),
    'save'          => __('Sauvergarder','idcomspabooker'),
    'slug'          => __('Extension de connexion à Spa Booker','idcomspabooker'),
    'link'          => 'https://www.groupe-idcom.fr'
);

$wpmui  = new WPM_admin_ui($ui);

/**
 * Add a tab/panel
 */
$panel  = array(
    'tab'       => array(
        'icon'      => 'fas fa-cogs',
        'label'     => __('API Mindbody','idcomspabooker'),
        'id'        => 'mindbody'
    )
);

$wpmui->panel($panel);

/**
 * Add a checkbox field
 */
$args = array(
    'el'                => 'checkbox',
    'id'                => 'zobby',
    'title'             => __('Connecter à Spa Booker','idcomspabooker'),
    'description'       => __('Cochez ce réglage pour activer la connexion et la synchronisation à Spa Booker.','idcomspabooker'),
    'label'             => __('Connecter et synchroniser avec Spa Booker','idcomspabooker')
);

$wpmui->add($args);

/**
 * Output panels
 */
$wpmui->output();