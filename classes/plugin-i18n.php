<?php
/**
 * This class handles the translation file used by the plugin
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Language
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
 * This class handles the translation file of the plugin
 *
 * @category CareCompanion\Language
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

final class Language
{
    public function __construct()
    {
        add_action(
            'plugins_loaded',
            array(
                $this,
                'loadTextDomain'
            )
        );
    }

    /**
     * This file declares an action hook for wordpress
     * to know that there is a localisation going on here
     *
     * @since  1.0
     * @access public
     *
     * @return void
     */
    public function loadTextDomain() {

        load_plugin_textdomain( 'care-companion', false, CARE_COMPANION_DIR_PATH . '\languages' );

        // load_plugin_textdomain( 'care-companion', false, basename( dirname( __FILE__ ) ) . '/languages' );
        return;
    }
}
