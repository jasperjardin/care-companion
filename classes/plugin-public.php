<?php
/**
 * This class is executed in the Loader class to enqueue scripts and initialize
 * hooks for the frontend of the plugin.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\PublicPages
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
 * This class handles the frontend funtionality.
 *
 * @category CareCompanion\PublicPages
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

final class PublicPages
{

    /**
     * The loader is the one who regesters the handles the hooks of the plugin
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $loader    Handles and registers all
     *                                         hooks for the plugin.
     */
    private $loader;

    /**
     * The ID of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $name    The ID of this plugin.
     */
    private $name;

    /**
     * The current version of the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $version    The current version of the plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string  $name    The name of the plugin.
     * @param integer $version The version of this plugin.
     * @param string  $loader  The version of this plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct($name, $version, $loader)
    {

        $this->loader = $loader;
        $this->name = $name;
        $this->version = $version;

        add_filter('body_class', array($this, 'setBodyClass'));

        /**
         * Templates
         */
         add_filter( 'template_include', array( $this, 'template_loader' ) );
    }
    /**
     * This method enqueue the CSS filess for the frontend of the plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function setEnqueueStyles()
    {
        $shortcodes = self::getShortcodes();

        foreach ( $shortcodes as $shortcode ) {
            if (self::isPluginComponentActive(
                'dsc-causes',
                'dsc-causes',
                array(
                    'dsc-causes-categories',
                    'dsc-causes-tags'
                ),
                $shortcode
            ) ||
            is_active_widget( false, false, 'care_companion_upcoming_events_widget', true ) ) {
                wp_enqueue_style(
                    $this->name,
                    plugin_dir_url(dirname(__FILE__)) . 'assets/css/care-companion.css',
                    array(),
                    $this->version,
                    'all'
                );
            }
        }

        return;
    }

    /**
     * This method enqueue the JS files for the frontend of the plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function setEnqueueScripts()
    {
        $post = Helper::globalPost();
        $shortcodes = self::getShortcodes();
        $shortcodes_social_sharer = array( 'cc_donation_box', 'cc_recent_campaigns', 'cc_successful_campaigns' );

        if (!isset($post)) {
            return;
        }

        foreach ( $shortcodes as $shortcode ) {
            if (self::isPluginComponentActive(
                'dsc-causes',
                'dsc-causes',
                array(
                    'dsc-causes-categories',
                    'dsc-causes-tags'
                ),
                $shortcode
            ) ||
            is_active_widget( false, false, 'care_companion_upcoming_events_widget', true ) ) {
                wp_register_script(
                    $this->name,
                    plugin_dir_url(dirname(__FILE__)) . 'assets/js/care-companion.js',
                    array('jquery'),
                    $this->version,
                    false
                );
                wp_enqueue_script($this->name);

                wp_register_script(
                    'care-companion-share-count',
                    plugin_dir_url(dirname(__FILE__)) . 'assets/js/share-count.js',
                    array('jquery'),
                    $this->version,
                    false
                );

                foreach ( $shortcodes_social_sharer as $shortcode ) {
                    if ( has_shortcode( $post->post_content, $shortcode ) ) {
                        wp_enqueue_script( 'care-companion-share-count' );
                    }
                }

            }

            if ( is_singular( 'dsc-causes' ) || has_shortcode( $post->post_content, 'cc_donation_box' ) ) {
                wp_enqueue_script(
                    'care-conpanion-progress',
                    plugin_dir_url(dirname(__FILE__)) . 'assets/js/progressbar.min.js',
                    array('jquery'),
                    $this->version,
                    false
                );
            }
        }
        return;
    }

    /**
     * This method enqueue theLocalization Scripts for the frontend of the plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function setLocalizeScripts( $id = '' )
    {
        $post = Helper::globalPost();
        $post_content = '';

        if ( ! is_null( $post ) ) {
            $post_content = $post->post_content;
        }

        $shortcodes = array( 'cc_donation_box', 'cc_recent_campaigns', 'cc_successful_campaigns' );

        $form_ids = '';
        $sharer_url = array();
        $translation_array = array();

        if (!isset($post)) {
            return;
        }

        foreach ( $shortcodes as $shortcode ) {

            $form_ids = Helper::getShortcodeFormID( $post_content, $shortcode );

            if ( 'cc_recent_campaigns' === $shortcode || 'cc_successful_campaigns' === $shortcode ) {
                $form_ids = Helper::getRecentCampaignID( $post_content, $shortcode );
            }

            if (self::isPluginComponentActive(
                'dsc-causes',
                'dsc-causes',
                array(
                    'dsc-causes-categories',
                    'dsc-causes-tags'
                ),
                $shortcode
            )) {

                foreach ( $form_ids as $form_id ) {

                    $title = get_the_title( $form_id );

                    $permalink = get_the_permalink( $form_id );

                    $fb_sharer_url = sprintf("https://www.facebook.com/sharer/sharer.php?u=%s", $permalink );

                    $tw_sharer_url = sprintf("http://twitter.com/share?text=%s&url=%s", esc_attr( $title ), $permalink );

                    $li_sharer_url = sprintf("https://www.linkedin.com/shareArticle?mini=true&url=%s&title=%s", $permalink, esc_attr( $title ) );

                    $gp_sharer_url = sprintf("https://plus.google.com/share?url=%s", $permalink );

                    $rd_sharer_url = sprintf("http://www.reddit.com/submit?url=%s&title=%s", $permalink, esc_attr( $title ) );

                    // Localize the script with new data.
                    $sharer_url = array(
                        'fb_sharer_url' => $fb_sharer_url,
                        'tw_sharer_url' => $tw_sharer_url,
                        'li_sharer_url' => $li_sharer_url,
                        'gp_sharer_url' => $gp_sharer_url,
                        'rd_sharer_url' => $rd_sharer_url,
                    );

                    $translation_array['form_'.$form_id] = $sharer_url;
                }


                // Attach localisation to our main script.
                if ( has_shortcode( $post_content, $shortcode ) ) {
                    wp_localize_script( $this->name, 'care_companion_sharer_js_vars', $translation_array );
                }

                // Enqueued script with localized data.
                wp_enqueue_script( 'care_companion_sharer_js_vars' );
            }
        }

        return;
    }

    /**
     * This method sets the body_class for knowledgebase post type.
     *
     * @param string|array $classes One or more classes to add to the class
     *                              attribute, separated by a single space.
     *
     * @since  1.0.0
     * @access public
     * @return string|array $classes Returns the $classes and set the body_class
     *                               for knowledgebase pages.
     */
    public function setBodyClass($classes)
    {
        $shortcodes = self::getShortcodes();

        foreach ( $shortcodes as $shortcode ) {
            if (self::isPluginComponentActive(
                'dsc-causes',
                'dsc-causes',
                array(
                    'dsc-causes-categories',
                    'dsc-causes-tags'
                ),
                $shortcode
            )) {
                $classes[] = 'dsc-causes';
            }
        }

        if (is_singular('dsc-causes')) {
            $classes[] = 'dsc-causes';
        }

        return $classes;
    }

    /**
     * This method returns an array of the plugin shortcodes.
     *
     * @since  1.0.0
     * @access public
     * @return string $shortcodes Returns an array of the plugin shortcodes.
     */
    public function getShortcodes()
    {
        $shortcodes = array(
            'cc_donation_box',
            'cc_recent_campaigns',
            'cc_successful_campaigns',
            'cc_serch_form',
            'cc_donate_button',
            'cc_recent_blogs',
            'cc_step_boxes',
            'cc_upcoming_events',
        );

        return $shortcodes;
    }

    /**
     * Load a template.
     *
     * Handles rendering of the plugin template usage so that the plugin can use its own template instead of the theme.
     *
     * Templates are in the 'templates' folder. looks for theme
     * overrides in /theme/dsc-causes/ by default.
     *
     * @access public
     *
     * @param  mixed  $template
     *
     * @return string $template
     */
    public static function template_loader( $template ) {
        $find = array( 'care-companion.php' );
        $file = '';

        if ( is_single() && get_post_type() == 'dsc-causes' ) {
            $file   = 'single-dsc-causes.php';
            $find[] = $file;
            $find[] = apply_filters( 'care_companion_template_path', 'dsc-causes/' ) . $file;
        }

        if ( $file ) {
            $template = locate_template( array_unique( $find ) );
            if ( ! $template ) {
                $template = CARE_COMPANION_PATH . '/templates/' . $file;
            }
        }

        return $template;
    }

    /**
     * This method returns the condition required to check a page.
     *
     * @param string Optional $archive   The name of post type to check the
     *                                   archive page.
     * @param string Optional $singular  The name of post type to check the
     *                                   single page.
     * @param array Optional $tax       The name of taxonomy to check the
     *                                   archive page.
     * @param array Optional $shortcode The name of shortcode to check the
     *                        archive page.
     *
     * @since  1.0.0
     * @access public
     * @return string $condition Returns the condition required to check a page.
     */
    public function isPluginComponentActive(
        $archive = '',
        $singular = '',
        $tax = array(),
        $shortcode = array()
    ) {
        $post = Helper::globalPost();

        if (!isset($post)) {
            return;
        }

        $condition = is_post_type_archive($archive) ||
                     is_singular($singular) ||
                     is_tax($tax) ||
                     has_shortcode($post->post_content, $shortcode);

        return $condition;
    }
}
