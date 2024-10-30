<?php
/**
 * Plugin Name: Import Users to IContact
 * Plugin URI:
 * Description: This plugins will add import button into users listing and also admin can bulk import all users to IContact.
 * Version: 1.0
 * Author: Ankit Gupta, tkgupta
 * Author URI: https://github.com/ankit-competency/
 * License: GPL2
 */
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}

define( 'IUTI_DIRECTORY_VERSION', '1.0' );
define( 'IUTI_DIRECTORY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'IUTI_DIRECTORY_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

// Include the dependencies needed to instantiate the plugin.
foreach ( glob( plugin_dir_path( __FILE__ ) . 'admin/*.php' ) as $file ) {

    include_once $file;
}

add_action( 'plugins_loaded', 'IUTICustomAdminSettings' );

/**
 * Starts the plugin.
 *
 * @since 1.0.0
 */
function IUTICustomAdminSettings()
{
    $importDefaultTables = new IUTIImportDefaultTables();
    register_activation_hook( __FILE__, $importDefaultTables->createPluginDatabaseTable() );

    $hooks = new IUTIRegisterHooks();
    $hooks->init();

}
