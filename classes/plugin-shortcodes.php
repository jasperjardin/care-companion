<?php
/**
 * This class is executes the plugin shortcodes.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\PluginShortcodes
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
 * @category CareCompanion\PluginShortcodes
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

final class PluginShortcodes
{
    /**
     * Attach all Reference action hooks to the following
     * class methods listed in __construct to register the plugins shortcodes.
     *
     * @since  1.0.0
     * @access public
     * @return object $this Returns the current object.
     */
    public function __construct()
    {
        add_shortcode(
            'cc_donation_box',
            array(
                $this,
                'registerCCDonationBox'
            )
        );
        return $this;
    }

    /**
     * This method registers the reference_loop shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCDonationBox($atts)
    {

        $atts = shortcode_atts(
            array(
                'form_id' => '',
                'style' => 'style-1',
            ),
            $atts,
            'cc_donation_box'
        );

        $file = 'donation-box.php';

        return $this->display($atts, $file);
    }
    /**
     * This method sets the template for the reference_loop shortcode.
     *
     * @param array $atts  The attributes for the shortcode.
     * @param string $file The file name that contains the mark-up of the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the current buffer contents.
     */
    public function display($atts, $file)
    {

        ob_start();

        $template = CARE_COMPANION_DIR_PATH . 'shortcodes/' . $file;

        if ($theme_template = locate_template(
            array('care-companion/shortcodes/' . $file )
        )
        ) {
            $template = $theme_template;
        }

        include $template;

        return ob_get_clean();
    }
}
