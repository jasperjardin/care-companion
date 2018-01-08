<?php
/**
 * This class is loads all the dependencies needed by the plugin.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Loader
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
 * This class is loads all the dependencies needed by the plugin.
 *
 * @category CareCompanion\Loader
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */
final class Loader
{
    /**
     * The loader is the one who regesters the handles the hooks of the plugin
     *
     * @since  1.0.0
     * @access protected
     * @var    AddFiltersActions    $loader    Handles and registers all hooks
     *                                         for the plugin.
     */
    protected $loader;

    /**
     * This is the unique indentifier of the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $care_companion    The string the plugin uses to identify
     *                                      the plugin.
     */
    protected $care_companion;

    /**
     * The current version of the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $version    The current version of the plugin.
     */
    protected $version;

    /**
     * This method is used to set the value of the properties and initialize
     * the methods listed below.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->care_companion = CARE_COMPANION_NAME;
        $this->version = CARE_COMPANION_VERSION;

        $this->loadDependencies();
        $this->setLocale();
        $this->setAdminHooks();
        $this->setPublicHooks();
    }
    /**
     * This method is used to load all the dependencies needed by the plugin.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function loadDependencies()
    {
        /**
         * This class that handles the arrangement of the actions and filters
         * of the core class of the plugin.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-add-action-filter.php';

        /**
         * This class handles the localization functionality of the plugin.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-i18n.php';

        /**
         * This class handles all the defined actions in the dashboard.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-admin.php';

        /**
         * This class handles all the defined ations and filters in the
         * frontend.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-public.php';

        /**
         * This class handles the registration of post_type and taxonomies.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-post-type.php';

        /**
         * This class handles the registration of the plugins metaboxes.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-metabox.php';

        /**
         * This class handles the registration of the Plugin Shortcodes.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-shortcodes.php';

        /**
         * This class handles the registration of the Plugin Widgets.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-widgets.php';

        /**
         * This class handles the registration of the Plugin Widgets.
         */
        include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-widgets.php';

        /**
         * This class handles the registration of the Plugin Widgets.
         */
         // if visual composer is present integrate our modules to it
         if ( ! defined( 'WPB_VC_VERSION' ) ) {
             include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-vc.php';
        }

        /**
         * This class handles the Plugin hooks.
         */
        // include_once plugin_dir_path(dirname(__FILE__)) . 'classes/plugin-action-hooks.php';

        $this->loader = new \DSC\CareCompanion\AddFiltersActions();

        new \DSC\CareCompanion\Language();

        new \DSC\CareCompanion\PluginShortcodes();

        new \DSC\CareCompanion\PluginWidgets();

        new \DSC\CareCompanion\Metabox();

    }

    /**
     * This method is used to load the localization file of the plugin.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setLocale()
    {
    }

    /**
     * This method is used to load all the actions and filters hooks in the
     * WordPress backend.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setAdminHooks()
    {
        $post_type = new \DSC\CareCompanion\PostType(
            $this->getName(),
            $this->getVersion(),
            $this->getLoader()
        );
        $plugin_admin = new \DSC\CareCompanion\Admin(
            $this->getName(),
            $this->getVersion(),
            $this->getLoader()
        );
        $this->loader->addAction(
            'admin_enqueue_scripts',
            $plugin_admin,
            'enqueueScripts'
        );
    }
    /**
     * This method is used to load all the actions and filters hooks in the
     * frontend.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function setPublicHooks()
    {
        $plugin_public = new \DSC\CareCompanion\PublicPages(
            $this->getName(),
            $this->getVersion(),
            $this->getLoader()
        );
        $this->loader->addAction(
            'wp_enqueue_scripts',
            $plugin_public,
            'setEnqueueStyles'
        );
        $this->loader->addAction(
            'wp_enqueue_scripts',
            $plugin_public,
            'setEnqueueScripts'
        );
        $this->loader->addAction(
            'wp_enqueue_scripts',
            $plugin_public,
            'setLocalizeScripts'
        );
    }
    /**
     * Run the loader to execute all of in the hooks plugin to WordPress.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function runner()
    {
        $this->loader->runner();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since  1.0.0
     * @access public
     * @return string care_companion The name of the plugin.
     */
    public function getName()
    {
        return $this->care_companion;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since  1.0.0
     * @access public
     * @return string loader    Orchestrates the hooks of the plugin.
     */
    public function getLoader()
    {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since  1.0.0
     * @access public
     * @return string version The version number of the plugin.
     */
    public function getVersion()
    {
        return $this->version;
    }
}
