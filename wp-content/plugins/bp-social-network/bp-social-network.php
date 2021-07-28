<?php
/**
 * Plugin Name: Social Network
 * Plugin URI: https://bozprod.eu/
 * Description: Gestion des liens vers les réseaux sociaux et des boutons de partage sur les réseaux sociaux.
 * Version: 1.0.0
 * Author: Jonathan LUSY
 * Text Domain: bpsocial
 * Domain Path: /languages/
 * Author URI: https://ainfographie.com/
 */

/**
 * Constantes
 */
define('BPSN_ROOT_FILE', __FILE__);
define('BPSN_ROOT_PATH', dirname(__FILE__));
define('BPSN_ROOT_URL', plugins_url('/', __FILE__));
define('BPSNv', '1.0.0');
define('BPSN_PLUGIN_SLUG', basename(dirname(__FILE__)));
define('BPSN_PLUGIN_BASE', plugin_basename(__FILE__));
define('BPSN_PLUGIN_PAGE',admin_url().'admin.php?page=bozprod-social-network');

function bpsn_load_plugin_textdomain(){
    load_plugin_textdomain('bpsocial', false, basename(dirname(__FILE__)).'/languages'); 
}
add_action('plugins_loaded', 'bpsn_load_plugin_textdomain');

include BPSN_ROOT_PATH.'/inc/functions.php';

/**
 * Ajout du menu en back-office
 */
add_action('admin_menu','bpsn_build_menu');

/**
 * Inclusion des scripts css et js en back office
 */
add_action('admin_enqueue_scripts','bpsn_admin_scripts');

/**
 * Inclusion des scripts css et js en front office
 */
add_action('wp_enqueue_scripts','bpsn_front_scripts', 2);