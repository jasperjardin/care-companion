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
     * @return array $form_ids Returns the shortcode parameters.
     */
    public static function getShortcodeFormID( $post_content = '', $shortcode = '' )
    {
        $temporary_holder = array();
        $parameters = array();
        $form_ids = array();

        preg_match_all("/\[" . $shortcode . " (.+?)\]/", $post_content, $temporary_holder );

        foreach ( $temporary_holder[1] as $holder ){
            $parameters[] = explode( ' ', $holder );
        }

        foreach ( $parameters as $param ) {
            foreach ( $param as $value ) {

                // Allow $value that contains 'form_id'
                if( strpos( $value, 'form_id' ) !== false ) {

                    // Stripping out all characters from a variable, leaving only numbers
                    $form_ids[] = preg_replace( '/[^0-9.]+/', '', $value );
                }
            }
        }

        return $form_ids;
    }

    /**
     * This method extracts the parameter of a shortcode into an array.
     *
     * @since  1.0.0
     * @access public
     * @return array $sanitize_ids Returns the shortcode parameters.
     */
    public static function getRecentCampaignID( $post_content = '', $shortcode = '' )
    {
        $temporary_holder = array();
        $sanitize_ids = array();
        if ( 'cc_successful_campaigns' === $shortcode ) {
            preg_match_all( "/\[" . $shortcode . "\]/", $post_content, $temporary_holder );
        } else {
            preg_match_all( "/\[" . $shortcode . " (.+?)\]/", $post_content, $temporary_holder );
        }

        foreach ( $temporary_holder[0] as $value ) {
            $ids = self::getHTMLAttributeValue( 'data-form-id', esc_html( do_shortcode( $value ) ) );

            foreach ( $ids as $id ) {
                preg_match_all('!\d+!', $id, $matched);
                $sanitize_ids[] = implode( '', $matched[0] );
            }
        }
        return $sanitize_ids;
    }

    /**
     * This method fetch the value of a parameter.
     *
     * @param $attrib the attribute name
     * @param $tag the HTML tag
     *
     * @since  1.0.0
     * @access public
     * @return array $match Returns the attribute value.
     */
    public static function getHTMLAttributeValue( $attrib, $tag ){

        //get attribute from html tag
        $re = '/'.$attrib.'=["\']?([^"\' ]*)["\' ]/is';
        preg_match_all( $re, $tag, $match );

        if ( $match ) {
            return $match[1];
        } else {
            return false;
        }

        return;
    }
}
