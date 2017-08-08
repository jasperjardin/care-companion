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
                'layout_style' => 'style-3',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'published_date' => 'true',

                'progress_symbol' => '%',

                'progress_text' => 'Completed',
                'progress_text_size' => '45px',
                'progress_color' => '#eb543a',
                'progress_fill' => 'rgba(0, 0, 0, 0.5)',
                'progress_trail_color' => '#fff',
                'progress_shape' => 'LinePercent',
                'progress_stroke_width' => '4',
                'progress_trail_width' => '4',
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => '1400',

                'progress_advance_animation' => 'false',
                'progress_start_color' => '#333',
                'progress_start_width' => '1',
                'progress_end_color' => '#eb543a',
                'progress_end_width' => '4',
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
