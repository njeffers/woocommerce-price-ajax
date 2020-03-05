<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://nickjeffers.com
 * @since             1.0.0
 * @package           Woocommerce_Price_Ajax
 *
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Price AJAX
 * Plugin URI:        http://nickjeffers.com
 * Description:       Visually updates product and cart pricing when quantities are changed.
 * Version:           1.0.0
 * Author:            Nick Jeffers
 * Author URI:        http://nickjeffers.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woocommerce-price-ajax
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'WOOCOMMERCE_PRICE_AJAX_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woocommerce-price-ajax-activator.php
 */
function activate_woocommerce_price_ajax() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-price-ajax-activator.php';
	Woocommerce_Price_Ajax_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woocommerce-price-ajax-deactivator.php
 */
function deactivate_woocommerce_price_ajax() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-price-ajax-deactivator.php';
	Woocommerce_Price_Ajax_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woocommerce_price_ajax' );
register_deactivation_hook( __FILE__, 'deactivate_woocommerce_price_ajax' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woocommerce-price-ajax.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woocommerce_price_ajax() {

	$plugin = new Woocommerce_Price_Ajax();
	$plugin->run();

}
run_woocommerce_price_ajax();
