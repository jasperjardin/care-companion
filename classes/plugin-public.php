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
    }
    /**
     * This method enqueue the CSS filess for the frontend of the Reference plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function setEnqueueStyles()
    {
        $shortcodes = array( 'cc_donation_box', 'cc_recent_campaigns' );

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
     * This method enqueue the JS files for the frontend of the Reference plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function setEnqueueScripts()
    {
        $post = Helper::globalPost();
        $shortcodes = array( 'cc_donation_box', 'cc_recent_campaigns' );

        if (empty($breadcrumbs_separator_option)) {
            $breadcrumbs_separator_option = "/";
        }

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
            )) {
                wp_register_script(
                    $this->name,
                    plugin_dir_url(dirname(__FILE__)) . 'assets/js/care-companion.js',
                    array('jquery'),
                    $this->version,
                    false
                );
                wp_enqueue_script($this->name);
            }
            
            if ( has_shortcode( $post->post_content, 'cc_donation_box' ) ) {
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
        if (self::isPluginComponentActive(
            'dsc-causes',
            'dsc-causes',
            array(
                'dsc-causes-categories',
                'dsc-causes-tags'
            ),
            'cc_donation_box'
        )) {
            $classes[] = 'dsc-causes';
        }

        if (is_singular('dsc-causes')) {
            $classes[] = 'dsc-causes';
        }

        return $classes;
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
