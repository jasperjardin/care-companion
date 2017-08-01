<?php
/**
 * This class executes during plugin activation to set the default value for the
 * Care Companion Settings.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Activator
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
 * Set the default value for the plugin settings inside
 * Settings > Care Companion
 *
 * @category CareCompanion\Activator
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

class Activator
{
    /**
     * Set default value for the Care Companion Settings
     * during the plugin activation if the options
     * are empty
     *
     * @return void
     */
    public function activate()
    {
        $post_type = new \DSC\CareCompanion\PostType();

        $post_type->registerPostTypeAndTaxonomies();
        flush_rewrite_rules();
        return;
    }
}
