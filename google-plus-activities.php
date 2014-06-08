<?php
/**
 * Google Plus Activities List
 *
 * Google Plus activities list widget.
 *
 * @package   Google_Plus_Activities_List
 * @author    Derrick Gall <derrickorama@gmail.com>
 * @license   GPL-2.0+
 * @link      http://derrickorama.com/google-plus-activities-plugin
 * @copyright 2014 Derrick Gall
 *
 * @wordpress-plugin
 * Plugin Name:       Google Plus Activities List
 * Plugin URI:        http://derrickorama.com/google-plus-activities-plugin
 * Description:       Google Plus activities list widget.
 * Version:           0.0.1
 * Author:            Derrick Gall
 * Author URI:        http://derrickorama.com
 * Text Domain:       google-plus-activities
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/derrickorama
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

require_once( plugin_dir_path( __FILE__ ) . 'public/class-google-plus-activities.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 */
register_activation_hook( __FILE__, array( 'Google_Plus_Activities_List', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'Google_Plus_Activities_List', 'deactivate' ) );

add_action( 'plugins_loaded', array( 'Google_Plus_Activities_List', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-google-plus-activities-admin.php' );
	add_action( 'plugins_loaded', array( 'Google_Plus_Activities_List_Admin', 'get_instance' ) );

}
