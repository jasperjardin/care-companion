<?php
/**
  * Donation Box Shortcode Template [cc_donate_button]
  *
  * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
  *
  * For the full copyright and license information, please view the LICENSE
  * file that was distributed with this source code.
  *
  * PHP Version 5.4
  *
  * @category CareCompanion
  * @package  CareCompanion
  * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
  * @author   Jasper J. <emailnotdisplayed@domain.tld>
  * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
  * @version  GIT:github.com/codehaiku/care-companion
  * @link     github.com/codehaiku/care-companion
  * @since    1.0
  */

if (! defined('ABSPATH') ) {
    exit;
}

extract( $atts );


care_companion_donate_button( $form_id, $text, $class_name, $title, $background_color );
