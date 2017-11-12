<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              tutexp.com
 * @since             1.0.0
 * @package           Tapospassword_less
 *
 * @wordpress-plugin
 * Plugin Name:       tapospasswordless login
 * Plugin URI:        tutexp.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            tapos
 * Author URI:        tutexp.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       tapospassword_less
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-tapospassword_less-activator.php
 */
function activate_tapospassword_less() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tapospassword_less-activator.php';
	Tapospassword_less_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-tapospassword_less-deactivator.php
 */
function deactivate_tapospassword_less() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-tapospassword_less-deactivator.php';
	Tapospassword_less_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_tapospassword_less' );
register_deactivation_hook( __FILE__, 'deactivate_tapospassword_less' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-tapospassword_less.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-tapospassword_less-shortcode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' ) ) {
    echo "hell";
    require_once( dirname( __FILE__ ) . '/ReduxFramework/sample/sample-config.php' );
}
function run_tapospassword_less() {



	$plugin = new Tapospassword_less();
	$plugin->run();
    $admin = new Tapospassword_less_Admin($plugin->get_plugin_name(),$plugin->get_version());

	$shortCode = new Tapospassword_less_ShortCode();
	$shortCode->formDisplayShortCode();

}
run_tapospassword_less();
