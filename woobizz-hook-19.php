<?php
/*
Plugin Name: Woobizz Hook 19 
Plugin URI: http://woobizz.com
Description: Use order number as invoice number
Author: Woobizz
Author URI: http://woobizz.com
Version: 1.0.2
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
//Hook19 Function
add_filter( 'wpo_wcpdf_invoice_number', 'wpo_wcpdf_format_invoice_number', 20, 4 );
function wpo_wcpdf_format_invoice_number( $invoice_number, $order_number, $order_id, $order_date ) {
    return $order_number;
}
