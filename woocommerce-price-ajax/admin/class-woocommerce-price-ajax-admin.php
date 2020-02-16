<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Woocommerce_Price_Ajax
 * @subpackage Woocommerce_Price_Ajax/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woocommerce_Price_Ajax
 * @subpackage Woocommerce_Price_Ajax/admin
 * @author     Your Name <email@example.com>
 */
class Woocommerce_Price_Ajax_Admin {

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
	 * @param      string    $woocommerce_price_ajax       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $woocommerce_price_ajax, $version ) {

		$this->woocommerce_price_ajax = $woocommerce_price_ajax;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Price_Ajax_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Price_Ajax_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->woocommerce_price_ajax, plugin_dir_url( __FILE__ ) . 'css/woocommerce-price-ajax-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woocommerce_Price_Ajax_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woocommerce_Price_Ajax_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->woocommerce_price_ajax, plugin_dir_url( __FILE__ ) . 'js/woocommerce-price-ajax-admin.js', array( 'jquery' ), $this->version, false );

	}


	public function woocommerce_price_ajax_get_price_endpoint(){

		register_rest_route( 'shuttle/v1', '/getPrice/', array(
//		register_rest_route( 'shuttle/v1', '/price/(?P<id>\d+)/(?P<qty>\d+)', array(
			'methods' => 'POST',
			'callback' => array( $this, 'my_awesome_func' ),
			'args' => array(
				'product_id' => array(
					'validate_callback' => function($param, $request, $key) {
						return is_numeric( $param );
					}
				),
				'product_qty' => array(
					'validate_callback' => function($param, $request, $key) {
						return is_numeric( $param );
					}
				),
			),
		) );

	}


	public function my_awesome_func( WP_REST_Request $request ) {

		$product_id = $request->get_param( 'product_id' );
		$product_qty = $request->get_param( 'product_qty' );

		$product = wc_get_product( $product_id );

		$price = $product_qty * $product->get_price();

		return apply_filters( 'formatted_woocommerce_price', number_format( $price, wc_get_price_decimals(),
			wc_get_price_decimal_separator(), wc_get_price_thousand_separator() ),
			$price,
			wc_get_price_decimals(),
			wc_get_price_decimal_separator(), wc_get_price_thousand_separator() );

	}


}
