(function( $ ) {
	'use strict';

	$(document).ready( function(){


		// This is called out of the gate, as the price doesn't accurately show after adding to cart and getting redirected back to the product page
		if( $(".single-product .input-text.qty").length > 0 ) {
			ws_get_price();
		}

		// if we change the qty on a single product page
		$(".single-product .input-text.qty").on('change', ws_get_price);

		// if we update the qty on the cart page, let's force a cart update by triggering a button click
		jQuery('.woocommerce-cart div.woocommerce').on('change', 'input.qty', function(){
			setTimeout( function() {
				jQuery('[name="update_cart"]').trigger('click');
			}, 300 );
		});

	});




	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

})( jQuery );


function ws_get_price() {

	// console.log( JSON.stringify(e));
	qty = jQuery(".input-text.qty").val();
	// console.log(ws_woocommerce.product_id);

	if( qty ) {
		jQuery.ajax({
			method: 'POST',
			url: ws_woocommerce.baseurl + '/wp-json/shuttle/v1/getPrice/',
			data: {
				product_id: ws_woocommerce.product_id,
				product_qty: qty
			},
			success: function (data) {
				jQuery('.woocommerce-Price-amount')[0].lastChild.textContent = data;
				console.log(data);
			}
		});
	}

}