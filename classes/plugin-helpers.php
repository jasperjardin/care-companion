<?php
/**
 * This class is used to display value, fetch data and set conditions.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Helper
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/care-companion
 * @link     github.com/codehaiku/care-companion
 */

namespace DSC\CareCompanion;

use \WP_Query;

if (! defined('ABSPATH')) {
    return;
}

/**
 * This class is used to display value, fetch data and set conditions.
 *
 * @category CareCompanion\Helper
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */
final class Helper
{
    /**
     * This method is used to fetch the knowledgebase taxonomies.
     *
     * @since  1.0.0
     * @access public
     * @return object $post Returns the global $post.
     */
    public static function globalPost()
    {
        global $post;

        return $post;
    }
    /**
     * This method is used to fetch the knowledgebase taxonomies.
     *
     * @since  1.0.0
     * @access public
     * @return string $term Returns the global $term.
     */
    public static function globalTerm()
    {
        global $term;

        return $term;
    }
    /**
     * This method is used to fetch the knowledgebase taxonomies.
     *
     * @since  1.0.0
     * @access public
     * @return object $wp_query Returns the global $wp_query.
     */
    public static function globalWpQuery()
    {
        global $wp_query;

        return $wp_query;
    }

    /**
     * This method is used to fetch the Donation Forms.
     *
     * @since  1.0.0
     * @access public
     * @return array $published_forms Returns the $published_forms.
     */
    public static function getDonationForms( $orderby = '', $order = '' )
    {
        $args = '';
        $forms = '';
        $posts = '';

        if ( empty ( $orderby ) ) {
            $orderby = 'name';
        }
        if ( empty ( $order ) ) {
            $order = 'ASC';
        }

        $args = array(
            'post_type' => 'give_forms',
            'post_status' => 'publish',
        	'orderby' => $orderby,
        	'order' => $order,
        );

        $forms = new WP_Query( $args );

        $published_forms = $forms->posts;

        $filtered_forms = array();
        if ( ! empty( $published_forms ) ) {
            foreach ( $published_forms as $key ) {
                $filtered_forms[ $key->ID ] = array(
                    'id' => $key->ID,
                    'post_title' => $key->post_title
                );
            }
            return $filtered_forms;
        }
        return;
    }



    /**
     * This method extracts the parameter of a shortcode into an array.
     *
     * @since  1.0.0
     * @access public
     * @return array $params Returns the shortcode parameters.
     */
    public static function getShortcodeParameter( $post_content = '', $shortcode = '' )
    {
        // @not_finished
        // $post_content = 'Irrelevant tekst... [sublimevideo class="sublime" poster="http://video.host.com/_previews/600x450/sbx-60025-00-da-ANA.png" src1="http://video.host.com/_video/H.264/LO/sbx-60025-00-da-ANA.m4v" src2="(hd)http://video.host.com/_video/H.264/HI/sbx-60025-00-da-ANA.m4v" width="560" height="315"] ..more irrelevant text.';

        $temporary_holder = array();
        // preg_match("/\[sublimevideo (.+?)\]/", $post_content, $temporary_holder );
        preg_match("/\[" . $shortcode . " (.+?)\]/", $post_content, $temporary_holder );

        $temporary_holder = array_pop( $temporary_holder );
        $temporary_holder = explode( " ", $temporary_holder );

        $params = array();

        foreach ( $temporary_holder as $holder ){
            list( $opt, $val ) = explode( "=", $holder );
            $params[$opt] = trim($val, '"');

        }

        return $params;
    }
}
