<?php
/**
 * This class is used to integrate the plugin shortcode to Visual Composer plugin.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Care_Companion_Visual_Composer
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/care-companion
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

namespace DSC\CareCompanion;

if (! defined('ABSPATH')) {
    return;
}
/**
 * This class is used to integrate the plugin shortcode to Visual Composer plugin.
 *
 * @category CareCompanion\Care_Companion_Visual_Composer
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */
if( !class_exists( 'Care_Companion_Visual_Composer' ) ){

	class Care_Companion_Visual_Composer{

		/**
		 * Module Loader
		 */
		public function load( $module = '' ){
			require_once CARE_COMPANION_PATH . '/shortcodes/vc/' . $module . '.php';
		}

	}
}
?>
