<?php
/**
 * Plugin Name: Bizuno Skins
 * Plugin URI: https://www.phreesoft.com/products/wordpress-bizuno-skins
 * Description: A set of alternate skins for the Bizuno Accounting plugin based on the EasyUI GUI
 * Version: 1.0.0
 * Author: PhreeSoft, Inc.
 * Author URI: http://www.PhreeSoft.com
 * Text Domain: bizuno
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Domain Path: /locale
 */

if (!defined( 'ABSPATH' )) { die( 'No script kiddies please!' ); }

/**
 * Retrieves the list of skins and adds them to the running list
 * @param array $skins
 * @return modified $skins
 */
function bizunoSkinsGetList(&$skins=[]) {
    $path = plugin_dir_path( __FILE__ );
    $choices = scandir($path.'skins/');
    foreach ($choices as $choice) {
        if (!in_array($choice, ['.','..']) && is_dir($path."skins/$choice")) {
            $skins[] = ['id'=>$choice, 'text'=>ucwords(str_replace('-', ' ', $choice))];
        }
    }
}

/**
 * Returns the URL of the skin folder from the plugin
 * @return type
 */
function bizunoSkinPath() {
    return plugin_dir_url( __FILE__ ) . 'skins/';
}

/**
 * Things to do upon plugin activation
 */
register_activation_hook( __FILE__ , 'bizuno_skins_activate' );
function bizuno_skins_activate() {

}

/**
 * Things to do upon plugin deactivation
 */
register_deactivation_hook(__FILE__ , 'bizuno_skins_deactivate' );
function bizuno_skins_deactivate() {

}
