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

/**
 * Show if Give plugin is disabled.
 */
if ( ! class_exists( 'Give' ) ) { ?>
    <div class="care-companion-message alert alert-warning requires-plugin">
        <p>
            <?php esc_html_e(
                'The cc_donate_button shortcode requires the Give plugin to be installed and activated.',
                'care-companion'
            ); ?>
        </p>
    </div>
    <?php return; ?>
<?php }

care_companion_donate_button( $form_id, $button_text, $class_name, $button_title, $background_color );
