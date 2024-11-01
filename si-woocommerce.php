<?php
/*
Plugin Name: WooCommerce Invoicing Payments w/ Sprout Invoices
Plugin URI: https://sproutapps.co/sprout-invoices/woocommerce/
Description: A Sprout Invoices payment integration with WooCommerce checkout.
Author: Sprout Apps
Version: 1.0
Author URI: https://sproutapps.co
*/

/**
 * Plugin Info for updates
 */
define( 'SA_ADDON_WOOCOMMERCE_VERSION', '1.0' );
define( 'SA_ADDON_WOOCOMMERCE_DOWNLOAD_ID', 273988 );
define( 'SA_ADDON_WOOCOMMERCE_NAME', 'Sprout Invoices WooCommerce Products' );
define( 'SA_ADDON_WOOCOMMERCE_FILE', __FILE__ );
define( 'SA_ADDON_WOOCOMMERCE_PATH', dirname( __FILE__ ) );
define( 'SA_ADDON_WOOCOMMERCE_URL', plugins_url( '', __FILE__ ) );

// Load up after SI is loaded.
add_action( 'sprout_invoices_loaded', 'sa_load_woocommerce_tools' );
function sa_load_woocommerce_tools() {
	if ( ! class_exists( 'WC_Product' ) ) {
		return;
	}

	if ( ! class_exists( 'Woo_Payments_Integration' ) ) {
		require_once( 'inc/Woo_Invoice_Payments_Integration.php' );
		require_once( 'inc/Woo_Invoice_Payments.php' );
		Woo_Payments_Integration::init();

		require_once( 'template-tags/vat.php' );
		require_once( 'inc/Woo_Tools.php' );
		Woo_Tools::init();
	}
}
