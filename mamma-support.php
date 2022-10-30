<?php
/**
 * Description: Allows the website to Display support tutorial
 * Plugin Name: Mamma Support
 * Pluign URI: http://mamma-marketing.ie
 * Version: 1.0.0
 * Requires at least: 6.0.0
 * Requires PHP: 7
 * Author: Mamma Marketing
 * Author URI: http://mamma-marketing.ie
 */


 if ( !defined( 'ABSPATH' ) ) die;


 define( 'MMS_VERSION', '1.0.0' );


 function mms_activation() {
     require_once plugin_dir_path( __FILE__ ) . 'includes/class-mms-activator.php';
     MMS_Activator::activate();
 }
 register_activation_hook( __FILE__, 'mms_activation' );


 function mms_deactivate() {

     require_once plugin_dir_path( __FILE__ ) . 'includes/class-mms-deactivator.php';
     MMS_Deactivator::deactivate();
 }
 register_deactivation_hook( __FILE__, 'mms_deactivate' );


 require_once( plugin_dir_path( __FILE__ ) . 'includes/class-mms.php' );

 function run_mms() {
     $mms = new MMS();
     $mms->run();
 }

 // run the plugin
 run_mms();
