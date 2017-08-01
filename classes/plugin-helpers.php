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
}
