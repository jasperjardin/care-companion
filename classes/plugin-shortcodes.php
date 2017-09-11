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
        add_shortcode(
            'cc_recent_campaigns',
            array(
                $this,
                'registerCCRecentCampaigns'
            )
        );
        add_shortcode(
            'cc_successful_campaigns',
            array(
                $this,
                'registerCCSuccessfulCampaigns'
            )
        );
        add_shortcode(
            'cc_serch_form',
            array(
                $this,
                'registerCCSearchForm'
            )
        );
        add_shortcode(
            'cc_donate_button',
            array(
                $this,
                'registerCCDonateButton'
            )
        );
        return $this;
    }

    /**
     * This method registers the cc_donation_box shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCDonationBox( $atts )
    {

        $atts = shortcode_atts(
            array(
                'form_id' => '',
                'layout_style' => 'style-1',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'published_date' => 'true',

                'button_color' => '#eb5439',
                'button_text' => '',
                'button_title' => '',
                'button_class' => '',

                'progress_symbol' => '%',

                'progress_text' => 'Completed',
                'progress_text_size' => '45px',
                'progress_color' => '#eb543a',
                'progress_fill' => 'rgba(0, 0, 0, 0.5)',
                'progress_trail_color' => '#fff',
                'progress_shape' => 'LinePercent',
                'progress_stroke_width' => '5',
                'progress_trail_width' => '5',
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => '2000',

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

        return $this->display( $atts, $file );
    }

    /**
     * This method registers the cc_recent_campaigns shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCRecentCampaigns( $atts )
    {

        $atts = shortcode_atts(
            array(
                'number_of_posts' => 10,
                'columns' => '3',
                'published_date' => 'true',
                'progress_symbol' => '%',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'progress_color' => '#eb543a',
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => '5000',
            ),
            $atts,
            'cc_recent_campaigns'
        );

        $file = 'recent-campaigns.php';

        return $this->display( $atts, $file );
    }

    /**
     * This method registers the cc_successful_campaigns shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCSuccessfulCampaigns( $atts )
    {

        $atts = shortcode_atts(
            array(
                'number_of_posts' => 10,
                'columns' => '2',
                'published_date' => 'true',
                'progress_symbol' => '%',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'progress_color' => '#eb543a',
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => '5000',
            ),
            $atts,
            'cc_successful_campaigns'
        );

        $file = 'successful-campaigns.php';

        return $this->display( $atts, $file );
    }

    /**
     * This method registers the cc_serch_form shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCSearchForm( $atts )
    {

        $atts = shortcode_atts(
            array(
                'title' => __( 'Search for Causes', 'care-companion' ),
                'sub_title' => 'These days are all share them with me oh baby said ins knew it was much more than a hunch.',
                'color' => '',
                'background_image_url' => '',
                'search_text' => __( 'Keywords', 'care-companion' ),
                'search_button_text' => __( 'Search Here', 'care-companion' ),
            ),
            $atts,
            'cc_serch_form'
        );

        $file = 'donation-search.php';

        return $this->display( $atts, $file );
    }

    /**
     * This method registers the cc_donate_button shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCDonateButton( $atts )
    {

        $atts = shortcode_atts(
            array(
                'form_id' => '',
                'text' => __( 'Donate', 'care-companion' ),
                'title' => __( 'Donate', 'care-companion' ),
                'background_color' => '',
                'class_name' => '',

            ),
            $atts,
            'cc_donate_button'
        );

        $file = 'donate-button.php';

        return $this->display( $atts, $file );
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
