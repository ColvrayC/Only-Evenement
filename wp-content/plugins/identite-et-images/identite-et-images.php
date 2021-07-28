<?php
/**
 * Plugin Name: Identité et images
 * Plugin URI: https://bozprod.eu/
 * Description: Gestion du logo principal, du favicon, des fonts et des images de la bibliothèque.
 * Version: 1.0.0
 * Author: Jonathan LUSY
 * Text Domain: bozprod
 * Domain Path: /languages/
 * Author URI: https://ainfographie.com/
 */

/**
 * Constantes
 */
define('BOZPROD_ROOT_FILE', __FILE__);
define('BOZPROD_ROOT_PATH', dirname(__FILE__));
define('BOZPROD_ROOT_URL', plugins_url('/', __FILE__));
define('BOZPRODv', '1.0.0');
define('BOZPROD_PLUGIN_SLUG', basename(dirname(__FILE__)));
define('BOZPROD_PLUGIN_BASE', plugin_basename(__FILE__));
define('BOZPROD_PLUGIN_PAGE',admin_url().'admin.php?page=bozprod');

function bozprod_load_plugin_textdomain(){
    load_plugin_textdomain('bozprod', false, basename(dirname(__FILE__)).'/languages'); 
}
add_action('plugins_loaded', 'bozprod_load_plugin_textdomain');

include BOZPROD_ROOT_PATH.'/inc/functions.php';

/**
 * Ajout du menu en back-office
 */
add_action('admin_menu','bozprod_build_menu');

/**
 * Inclusion des scripts css et js
 */
add_action('admin_enqueue_scripts','bozprod_admin_scripts');