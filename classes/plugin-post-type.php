<?php
/**
 * This class is used to register Post Type and Taxonomies.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\PostType
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
 * This class is used to register Post Type and Taxonomies.
 *
 * @category CareCompanion\PostType
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */
final class PostType
{
    /**
     * The loader that's responsible for maintaining and registering
     * all hooks that power the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string   $loader    Maintains and registers all
     *                               hooks for the plugin.
     */
    protected $loader;

    /**
     * The ID of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $name    The ID of this plugin.
     */
    private $name;

    /**
     * The version of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $version    The current version of this plugin.
     */
    private $version;

     /**
     * This method initialize the class and set its properties.
     * Attach all method below to their respective hooks.
     *
     * @param string  $name    The name of the plugin.
     * @param integer $version The version of this plugin.
     * @param string  $loader   The version of this plugin.
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    public function __construct($name= '', $version = '', $loader = '')
    {

        $this->loader = $loader;

        $this->name = $name;

        $this->version = $version;

        add_action( 'init', array( $this, 'registerPostTypeAndTaxonomies' ) );
    }
    /**
    * This method register CareCompanion Post Type and Taxonomies.
    *
    * @since  1.0.0
    * @access public
    * @return void
    */
    public function registerPostTypeAndTaxonomies()
    {
        // @todo add an Option Class to handle the Post Type and Taxonomy names
        // $care_companion_singular_option = Options::getKnbSingular();
        // $care_companion_plural_option = Options::getKnbPlural();
        // $care_companion_slug_option = Options::getKnbSlug();
        //
        // $category_singular_option = Options::getCategorySingular();
        // $category_plural_option = Options::getCategoryPlural();
        // $category_slug_option = Options::getCategorySlug();
        //
        // $tag_singular_option = Options::getTagSingular();
        // $tag_plural_option = Options::getTagPlural();
        // $tag_slug_option = Options::getTagSlug();

        $care_companion_singular_option = 'Cause';
        $care_companion_plural_option = 'Causes';
        $care_companion_slug_option = 'causes';

        $category_singular_option = 'Category';
        $category_plural_option = 'Categories';
        $category_slug_option = 'categories';

        $tag_singular_option = 'Tag';
        $tag_plural_option = 'Tags';
        $tag_slug_option = 'tags';

        $post_type_labels = array(
            'name' => _x(
                $care_companion_plural_option,
                'post type general name',
                'care-companion'
            ),
            'singular_name' => _x(
                $care_companion_singular_option,
                'post type singular name',
                'care-companion'
            ),
            'menu_name' => _x(
                'Causes',
                'admin menu',
                'care-companion'
            ),
            'name_admin_bar' => _x(
                'Causes',
                'add new on admin bar',
                'care-companion'
            ),
            'add_new' => _x(
                'Add New',
                'Causes',
                'care-companion'
            ),
            'add_new_item' => esc_html__(
                'Add New Cause',
                'care-companion'
            ),
            'new_item' => esc_html__(
                'New Cause',
                'care-companion'
            ),
            'edit_item' => esc_html__(
                'Edit Cause',
                'care-companion'
            ),
            'view_item' => esc_html__(
                'View Cause',
                'care-companion'
            ),
            'all_items' => esc_html__(
                'All Cause',
                'care-companion'
            ),
            'search_items' => esc_html__(
                'Search Cause',
                'care-companion'
            ),
            'parent_item_colon' => esc_html__(
                'Parent Cause:',
                'care-companion'
            ),
            'not_found' => esc_html__(
                'No Causes found.',
                'care-companion'
            ),
            'not_found_in_trash' => esc_html__(
                'No Causes found in Trash.',
                'care-companion'
            )
        );

        $post_type_args = array(
            'labels'             => $post_type_labels,
            'description'        => esc_html__(
                'Description.',
                'care-companion'
            ),
            'public'             => true,
            'publicly_queryable' => true,
            'menu_icon'          => 'dashicons-book-alt',
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array(
                'slug' => $care_companion_slug_option
            ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => true,
            'menu_position'      => null,
            'supports'           => array(
                'title',
                'editor',
                'author',
                'thumbnail',
                'excerpt',
                'comments',
                'page-attributes'
            )
        );

        register_post_type('dsc-causes', $post_type_args);

        $category_labels = array(
            'name' => _x(
                $category_plural_option,
                'taxonomy general name',
                'care-companion'
            ),
            'singular_name' => _x(
                $category_singular_option,
                'taxonomy singular name',
                'care-companion'
            ),
            'search_items' => esc_html__(
                'Search Categories',
                'care-companion'
            ),
            'all_items' => esc_html__(
                'All Categories',
                'care-companion'
            ),
            'parent_item' => esc_html__(
                'Parent Category',
                'care-companion'
            ),
            'parent_item_colon' => esc_html__(
                'Parent Category:',
                'care-companion'
            ),
            'edit_item' => esc_html__(
                'Edit Category',
                'care-companion'
            ),
            'update_item' => esc_html__(
                'Update Category',
                'care-companion'
            ),
            'add_new_item' => esc_html__(
                'Add New Category',
                'care-companion'
            ),
            'new_item_name' => esc_html__(
                'New Category Name',
                'care-companion'
            ),
            'menu_name' => esc_html__(
                'Categories',
                'care-companion'
            ),
        );

        $category_args = array(
            'hierarchical'      => true,
            'labels'            => $category_labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array('slug' => $category_slug_option),
        );

        register_taxonomy(
            'dsc-causes-categories',
            array('dsc-causes'),
            $category_args
        );

        $tag_labels = array(
            'name' => _x(
                $tag_plural_option,
                'taxonomy general name',
                'care-companion'
            ),
            'singular_name' => _x(
                $tag_singular_option,
                'taxonomy singular name',
                'care-companion'
            ),
            'search_items' => esc_html__(
                'Search Tags',
                'care-companion'
            ),
            'popular_items' => esc_html__(
                'Popular Tags',
                'care-companion'
            ),
            'all_items' => esc_html__(
                'All Tags',
                'care-companion'
            ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => esc_html__(
                'Edit Tag',
                'care-companion'
            ),
            'update_item' => esc_html__(
                'Update Tag',
                'care-companion'
            ),
            'add_new_item' => esc_html__(
                'Add New Tag',
                'care-companion'
            ),
            'new_item_name' => esc_html__(
                'New Tag Name',
                'care-companion'
            ),
            'separate_items_with_commas' => esc_html__(
                'Separate tag with commas',
                'care-companion'
            ),
            'add_or_remove_items' => esc_html__(
                'Add or remove tags',
                'care-companion'
            ),
            'choose_from_most_used' => esc_html__(
                'Choose from the most used tags',
                'care-companion'
            ),
            'not_found' => esc_html__(
                'No tags found.',
                'care-companion'
            ),
            'menu_name' => esc_html__(
                'Tags',
                'care-companion'
            ),
        );

        $tag_args = array(
            'hierarchical'          => false,
            'labels'                => $tag_labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite'               => array('slug' => $tag_slug_option),
        );

        register_taxonomy(
            'dsc-causes-tags',
            array('dsc-causes'),
            $tag_args
        );
    }
}
