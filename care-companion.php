<?php
/**
 * Plugin Name: Care Companion
 * Plugin URI:  https://wordpress.org/plugins/care-companion/
 * Description: A companion plugin for the Care WordPress theme.
 * Version:     1.0.0
 * Author:      Dunhakdis
 * Author URI:  https://profiles.wordpress.org/dunhakdis/
 * Text Domain: care-companion
 * Domain Path: /languages
 * License:     GPL2
 *
 * PHP Version 5.4
 *
 * @category Care Companion
 * @package  Care Companion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/care-companion
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

if (! defined('ABSPATH')) {
    return;
}

// Setup plugin Constants.
define( 'CARE_COMPANION_NAME', 'Care Companion' );

define( 'CARE_COMPANION_VERSION', '1.0.0' );

define('CARE_COMPANION_DIR_PATH', trailingslashit(plugin_dir_path(__FILE__)));

define('CARE_COMPANION_PATH', plugin_dir_path(__FILE__));

// Require the plugin activation class.
require_once plugin_dir_path(__FILE__) . 'classes/plugin-activator.php';

// Require the loader class.
require_once plugin_dir_path(__FILE__) . 'classes/plugin-loader.php';

// Require the helper class.
require_once plugin_dir_path(__FILE__) . 'classes/plugin-helpers.php';

// The template tags.
require_once plugin_dir_path(__FILE__) . 'template-tags/template-tags.php';

// Setup activation hooks.
register_activation_hook( __FILE__, 'care_companion_activate' );

/**
 * Clear permalink on plugin activate.
 *
 * @return void
 */
function care_companion_activate()
{
    $plugin = new \DSC\CareCompanion\Activator();
    $plugin->activate();
    return;
}

// Bootstrap the plugin.
$plugin = new \DSC\CareCompanion\Loader();
$plugin->runner();
