<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the
 * plugin admin area. This file also includes all of the dependencies used by
 * the plugin, and defines a function that starts the plugin.
 *
 * @link              http://joehou.com
 * @package           CWF
 *
 * @wordpress-plugin
 * Plugin Name:       ElfSight Amazon Review Widget 
 * Plugin URI:        http://joehou.com
 * Description:       Add field for elfsight review class id 
 * Version:           1.0.0
 * Author:            Joe hou 
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

 

defined( 'WPINC' ) || die;

 

include_once 'admin/class-elfsight-amazon-review-widget-woocommerce-field.php';
include_once 'public/class-elfsight-amazon-review-widget-woocommerce-display.php';
 

add_action( 'plugins_loaded', 'elfsight_amazon_review_widget_start' );

/**

 * Start the plugin.

 */

function elfsight_amazon_review_widget_start() {

    if ( is_admin() ) {
        $admin = new Elfsight_Amazon_Review_Widget_Field( 'widgetid_text_field' );
        $admin->init();
    } else {
        $plugin = new Elfsight_Amazon_Review_Widget_WooCommerce_Display( 'widgetid_text_field' );
        $plugin->init();
    }
}
