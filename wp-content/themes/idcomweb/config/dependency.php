<?php

require_once dirname( __FILE__ ) . '/../php/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'idcomcrea_register_required_plugins' );

function idcomcrea_register_required_plugins() {

	$plugins = array(

	

		array(

			'name'      => 'Wordpress SEO',

			'slug'      => 'wordpress-seo',

			'required'  => true,

		),

		/*array(

			'name'      => 'Page Builder',

			'slug'      => 'siteorigin-panels',

			'required'  => true,

		),

		array(

			'name'      => 'SiteOrigin Widgets Bundle',

			'slug'      => 'so-widgets-bundle',

			'required'  => true,

		),

		array(

			'name'      => 'Pagebuilder animate (basé sur WOW.js)',

			'slug'      => 'so-page-builder-animate',

			'required'  => false,

		),*/

		array(

			'name'      => 'Security',

			'slug'      => 'better-wp-security',

			'required'  => true,

		),

		array(

			'name'      => 'Redirection SEO',

			'slug'      => 'redirection',

			'required'  => false,

		),

		array(

			'name'      => 'Ninja Forms',

			'slug'      => 'ninja-forms',

			'required'  => true,

		),
		array(

			'name'      => 'WordFence pour les malware',

			'slug'      => 'wordfence',

			'required'  => true,

		),

		array(

			'name'      => '[Woocommerce] Boutique en ligne',

			'slug'      => 'woocommerce',

			'required'  => false,

		),

		array(

			'name'      => '[Woocommerce] Paniers abandonnés',

			'slug'      => 'woocommerce-abandoned-cart',

			'required'  => false,

		),

		/*array(

			'name'      => 'Bandeau Cookie',

			'slug'      => 'cookie-notice',

			'required'  => true,

		),*/

		array(

			'name'      => 'Site multilange',

			'slug'      => 'polylang',

			'required'  => false,

		),

		array(

			'name'      => 'Utilitaire traduction pour Site multilange',

			'slug'      => 'loco-translate',

			'required'  => false,

		),

		array(

			'name'      => 'Réorganisation des pages',

			'slug'      => 'wp-nested-pages',

			'required'  => false,

		),

		array(

			'name'      => 'ACF',

			'slug'      => 'advanced-custom-fields',

			'required'  => false,

		),


		array(

			'name'      => 'Google Analytics Dashboard',

			'slug'      => 'google-analytics-dashboard-for-wp',

			'required'  => false,

		),

		array(

			'name'      => 'Admin menu editor',

			'slug'      => 'admin-menu-editor',

			'required'  => false,

		),
		
		array(

			'name'      => 'Custom Post Type UI',

			'slug'      => 'custom-post-type-ui',

			'required'  => false,

		),

	);

	/*

	 * Array of configuration settings. Amend each line as needed.

	 *

	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard

	 * strings available, please help us make TGMPA even better by giving us access to these translations or by

	 * sending in a pull-request with .po file(s) with the translations.

	 *

	 * Only uncomment the strings in the config array if you want to customize the strings.

	 */

	$config = array(

		'id'           => 'idcomcrea_plugins',                 // Unique ID for hashing notices for multiple instances of TGMPA.

		'menu'         => 'admin_idcomcrea_plugins', // Menu slug.

		'parent_slug'  => 'admin_idcomcrea',            // Parent menu slug.

		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.

		'has_notices'  => false,                    // Show admin notices or not.

		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.

		'dismiss_msg'  => 'Masquer ce message',                      // If 'dismissable' is false, this message will be output at top of nag.

		'is_automatic' => true,                   // Automatically activate plugins after installation or not.

		'message'      => '',                      // Message to output right before the plugins table.

		

		'strings'      => array(

			'page_title'                      => "Plugin requis pour ce site",

			'menu_title'                      => "Plugins",

			// <snip>...</snip>

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.

		)

	);

	

	tgmpa( $plugins, $config );


}

?>