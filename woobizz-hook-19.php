<?php
/*
Plugin Name: Woobizz Hook 19 
Plugin URI: http://woobizz.com
Description: Use order number as invoice number
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.1
Text Domain: woobizzhook19
Domain Path: /lang/
*/
//Prevent direct acces
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Load translation
add_action( 'plugins_loaded', 'woobizzhook19_load_textdomain' );
function woobizzhook19_load_textdomain() {
  load_plugin_textdomain( 'woobizzhook19', false, basename( dirname( __FILE__ ) ) . '/lang' ); 
}
//Check if WooCommerce is active
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	//echo "woocommerce is active";
    add_action( 'wp_head', 'woobizzhook19_add_checkout_thumbnail',1);
}else{
	//Show message on admin
	//echo "woocommerce is not active";
	add_action( 'admin_notices', 'woobizzhook19_admin_notice' );
}
//Hook19 Notice
function woobizzhook19_admin_notice() {
    ?>
    <div class="notice notice-error is-dismissible">
        <p><?php _e( 'Woobizz Hook 19 needs WooCommerce to work properly, If you do not use this plugin you can disable it!', 'woobizzhook19' ); ?></p>
    </div>
    <?php
}
//Hook19 Function
add_filter( 'wpo_wcpdf_invoice_number', 'wpo_wcpdf_format_invoice_number', 20, 4 );
function wpo_wcpdf_format_invoice_number( $invoice_number, $order_number, $order_id, $order_date ) {
    return $order_number;
}
