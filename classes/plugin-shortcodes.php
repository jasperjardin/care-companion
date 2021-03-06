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
        // if visual composer is present integrate our modules to it
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action(
                'vc_before_init',
                array(
                    $this,
                    'vc_integration'
                )
            );
        }

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
            'cc_search_form',
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
        add_shortcode(
            'cc_recent_blogs',
            array(
                $this,
                'registerCCRecentBlogs'
            )
        );
        add_shortcode(
            'cc_step_boxes',
            array(
                $this,
                'registerCCStepBoxes'
            )
        );
        add_shortcode(
            'cc_upcoming_events',
            array(
                $this,
                'registerCCUpcomingEvents'
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
                'width' => '',
                'spacing' => '0',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'published_date' => 'true',
                'donation_content' => 'true',

                'button_color' => '#eb543a',
                'button_text' => '',
                'button_title' => '',
                'button_class' => '',

                'progress_symbol' => '%',

                'progress_text' => 'Completed',
                'progress_text_size' => '45px',
                'progress_color' => '#eb543a',
                'progress_fill' => 'rgba(0, 0, 0, 0.5)',
                'progress_trail_color' => '#fff',
                'progress_shape' => 'Circle',
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
                'layout_style' => 'style-1',
                'donation_content' => 'false',

                'button_color' => '#eb543a',
                'button_text' => '',
                'button_title' => '',
                'button_class' => '',

                'number_of_posts' => 10,
                'columns' => '3',
                'published_date' => 'true',
                'progress_symbol' => '%',
                'container_fill' => 'rgba(0, 0, 0, 0.75)',
                'container_primary_fill' => '#f8b864',
                'progress_color' => '#eb543a',
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => '3000',
                'progress_trail_color' => '#f8b765',
                'progress_stroke_width' => '5',
                'progress_trail_width' => '5',
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
                'progress_transition_duration' => '3000',
            ),
            $atts,
            'cc_successful_campaigns'
        );

        $file = 'successful-campaigns.php';

        return $this->display( $atts, $file );
    }

    /**
     * This method registers the cc_search_form shortcode.
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
                'size' => '1',
                'sub_title' => 'These days are all share them with me oh baby said ins knew it was much more than a hunch.',
                'color' => '',
                'background_color' => '',
                'background_image_url' => '',
                'search_text' => __( 'Keywords', 'care-companion' ),
                'search_button_text' => __( 'Search Here', 'care-companion' ),
            ),
            $atts,
            'cc_search_form'
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
                'button_text' => __( 'Donate Now', 'care-companion' ),
                'button_title' => __( 'Donate Now', 'care-companion' ),
                'background_color' => '',
                'class_name' => '',
                'link' => '',

            ),
            $atts,
            'cc_donate_button'
        );

        $file = 'donate-button.php';

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
    public function registerCCRecentBlogs( $atts )
    {

        $atts = shortcode_atts(
            array(
                'number_of_posts' => '10',
                'columns' => '3',
                'overlay_color' => '#000',
            ),
            $atts,
            'cc_recent_blogs'
        );

        $file = 'recent-blogs.php';

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
    public function registerCCStepBoxes( $atts, $content = null )
    {

        $atts = shortcode_atts(
            array(
                'columns' => '1',
                'step_number' => '',
                'title' => '',
                'description' => '',
                'text_color' => '',
                'background_color' => '',
                'no_margin' => 'true',
                'icon' => 'fa fa-user',
                'image_url' => '',
                'background_image_url' => '',
                'link' => '#',
                'link_text' => __( 'Learn More', 'care-companion' ),
                'link_text_color' => '#fff',
                'link_text_icon' => 'fa fa-angle-double-right',
                'button_mode' => 'false',
                'button_color' => '#f8b864'
            ),
            $atts,
            'cc_step_boxes'
        );

        $file = 'step-boxes.php';

        return $this->display( $atts, $file, $content );
    }

    /**
     * This method registers the cc_upcoming_events shortcode.
     *
     * @param array $atts The attributes for the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the set attributes for the shortcode.
     */
    public function registerCCUpcomingEvents( $atts )
    {

        $atts = shortcode_atts(
            array(
                'number_of_posts' => '5',
                'read_more' => 'enable',
            ),
            $atts,
            'cc_upcoming_events'
        );

        $file = 'upcoming-events.php';

        return $this->display( $atts, $file );
    }

    /**
     * This method sets the template for the plugin shortcode.
     *
     * @param array $atts  The attributes for the shortcode.
     * @param string $file The file name that contains the mark-up of the shortcode.
     *
     * @since  1.0.0
     * @access public
     * @return array $atts Returns the current buffer contents.
     */
    public function display( $atts, $file, $content = null )
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

    public function vc_integration() {
		$vc_modules = new \DSC\CareCompanion\Care_Companion_Visual_Composer();
        // donation box
        $vc_modules->load( 'cc_donation_box' );
        // recent campaigns
        $vc_modules->load( 'cc_recent_campaigns' );
        // successful campaigns
        $vc_modules->load( 'cc_successful_campaigns' );
        // search form
        $vc_modules->load( 'cc_search_form' );
        // donate button
        $vc_modules->load( 'cc_donate_button' );
        // recent blogs
        $vc_modules->load( 'cc_recent_blogs' );
        // step boxes
        $vc_modules->load( 'cc_step_boxes' );
        // upcoming events
        $vc_modules->load( 'cc_upcoming_events' );
    }
}
