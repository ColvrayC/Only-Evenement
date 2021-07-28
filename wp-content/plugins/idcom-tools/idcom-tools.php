<?php
/**
 * Plugin Name: IDCOM TOOLS
 * Plugin URI: https://www.groupe-idcom/
 * Description: Extension proposant différents outils pratiques.
 * Version: 1.0.0
 * Author: Jonathan LUSY - IDCOM
 * Text Domain: idcomtools
 * Domain Path: /languages/
 * Author URI: https://www.groupe-idcom.fr/
 */

/**
 * Constants
 */
define('IDCOMTOOLS_ROOT_FILE', __FILE__);
define('IDCOMTOOLS_ROOT_PATH', dirname(__FILE__));
define('IDCOMTOOLS_ROOT_URL', plugins_url('/', __FILE__));
define('IDCOMTOOLS_PLUGIN_SLUG', basename(dirname(__FILE__)));
define('IDCOMTOOLS_PLUGIN_BASE', plugin_basename(__FILE__));
define('IDCOMTOOLS_PLUGIN_PAGE', admin_url().'admin.php?page=idcom_tools');
define('IDCOMTOOLSv', time());

global $plug_assets;

$plug_assets = array(
    'logo'      => IDCOMTOOLS_ROOT_URL.'assets/img/idcom-logo.svg',
    'alt'       => 'IDCOM Tools',
    'link'      => 'https://www.groupe-idcom.fr/',
    'slug'      => __('Des outils pratiques !','idcomtools'),
    'loader'    => IDCOMTOOLS_ROOT_URL.'assets/img/loaders/loader-5.svg',
);

include IDCOMTOOLS_ROOT_PATH.'/inc/functions.php';