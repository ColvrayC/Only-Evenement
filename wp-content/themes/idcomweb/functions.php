<?php
define("IDCOMCREA",get_option("etat_site","dev"));
if(IDCOMCREA=="dev"){
	include dirname( __FILE__ ) . "/config/init.php";
}
include dirname( __FILE__ ) . "/config/plugins.php";
include dirname( __FILE__ ) . "/config/lock.php";
include dirname( __FILE__ ) . "/config/admin.php";
include dirname( __FILE__ ) . "/config/dependency.php";
include dirname( __FILE__ ) . "/config/utils.php";
include dirname( __FILE__ ) . "/config/help.php";
include dirname( __FILE__ ) . "/config/shortcode.php";
include dirname( __FILE__ ) . "/config/custom.php";
include dirname( __FILE__ ) . "/config/loader.php";
if ( class_exists( 'WooCommerce' ) ) {
	include dirname( __FILE__ ) . "/config/woocommerce.php";
}
?>