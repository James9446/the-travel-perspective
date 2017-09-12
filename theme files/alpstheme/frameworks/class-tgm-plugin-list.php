<?php
/**
 * Include TGM Class
 */

require_once get_template_directory() . '/frameworks/class-tgm-plugin-activation.php';

/**
 * Register Required Plugins
 */

add_action( 'tgmpa_register', 'alpstheme_register_required_plugins' );

function alpstheme_register_required_plugins() {

	$plugins = array(

		array(
			'name'               => 'Alps themes',
			'slug'               => 'alpsthemes',
			'source'             => esc_url('http://www.alpsdesigns.com/alpsthemes.zip'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'Bootstrap for Contact form 7',
			'slug'               => 'bootstrap-for-contact-form-7',
			'source'             => esc_url('https://wordpress.org/plugins/bootstrap-for-contact-form-7/'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'Instagram Feed',
			'slug'               => 'instagram-feed',
			'source'             => esc_url('https://wordpress.org/plugins/instagram-feed/'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'One Click Demo Import',
			'slug'               => 'one-click-demo-import',
			'source'             => esc_url('https://wordpress.org/plugins/one-click-demo-import/'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'Contact Form 7',
			'slug'               => 'contact-form-7',
			'source'             => esc_url('https://wordpress.org/plugins/contact-form-7/'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'Advanced Custom Fields',
			'slug'               => 'advanced-custom-fields',
			'source'             => esc_url('https://wordpress.org/plugins/advanced-custom-fields/'),
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),

	);

	$config = array(
		'id'           => 'alpstheme',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
