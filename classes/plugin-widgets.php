<?php
/**
 * This class handles the widget for the plugin.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\PluginWidgets
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/care-companion
 * @link     github.com/codehaiku/care-companion
 */

namespace DSC\CareCompanion;

if (! defined('ABSPATH')) {
    return;
}

/**
 * This class handles the shortcode funtionality of the plugin.
 *
 * @category CareCompanion\PluginWidgets
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

final class PluginWidgets
{
    public function __construct()
    {
        $this->required_files();

        add_action(
            'widgets_init',
            array(
                $this,
                'register_upcoming_events_widget'
            )
        );

    }

    public function required_files()
    {
        $widgets = array(
    		'care-companion-upcoming-events',
    	);

        foreach ( $widgets as $widget ) {
            require_once plugin_dir_path( dirname(__FILE__) ) . 'widgets/' . $widget . '.php';
        }

        return;
    }

    public function register_upcoming_events_widget() {

        if ( class_exists( 'Tribe__Events__Main' ) ) {
            register_widget( 'CareCompanionUpcomingEventsWidget' );
        }

        return;
    }
}
