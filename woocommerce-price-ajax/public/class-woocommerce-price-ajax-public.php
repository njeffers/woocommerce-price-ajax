<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Woocommerce_Price_Ajax
 * @subpackage Woocommerce_Price_Ajax/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Woocommerce_Price_Ajax
 * @subpackage Woocommerce_Price_Ajax/public
 * @author     Nick Jeffers <nick@nickjeffers.com>
 */
class Woocommerce_Price_Ajax_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $woocommerce_price_ajax    The ID of this plugin.
	 */
	private $woocommerce_price_ajax;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $woocommerce_price_ajax       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $woocommerce_price_ajax, $version ) {

		$this->woocommerce_price_ajax = $woocommerce_price_ajax;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->woocommerce_price_ajax, plugin_dir_url( __FILE__ ) . 'css/woocommerce-price-ajax-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->woocommerce_price_ajax, plugin_dir_url( __FILE__ ) . 'js/woocommerce-price-ajax-public.js', array( 'jquery' ), $this->version, false );


		if( is_singular( 'product' ) ) {
			$localized_array['baseurl'] = esc_url( home_url() );
			$localized_array['product_id'] =  __( get_the_ID(), 'wordpress-shuttle' );
			wp_localize_script( $this->woocommerce_price_ajax, 'ws_woocommerce', $localized_array );

		}

	}

}
