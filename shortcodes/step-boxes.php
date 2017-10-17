<?php
/**
  * Donation Box Shortcode Template [cc_step_boxes]
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
 * Step Box Columns
 */
$allowed_columns = array( '1', '2', '3', '4' );

if (! in_array( $columns, $allowed_columns, true ) ) {
    $columns = '3';
}
?>
<div class="care-companion-step-boxes care-companion-step-boxes-grid column-<?php echo esc_attr( absint( $columns ) ); ?>">
    <div class="outer-wrapper">
        <div class="inner-wrapper">

            <?php if ( ! empty( $step_number ) ) { ?>
                <div class="step-number-wrapper">
                    <span class="step-number"><?php echo esc_html( $step_number ); ?></span>
                </div>
            <?php } ?>

            <div class="icon-wrapper">
                <i class="step-icon <?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <div class="title-wrapper">
                <h4 class="step-title"><?php echo esc_html( $title ); ?></h4>
            </div>
            <div class="content-wrapper">
                <p class="step-content"><?php echo esc_html( $content ); ?></p>
            </div>

            <?php if ( 'on' === $button_mode ) { ?>
                <a href="<?php echo esc_url( $link ); ?>" class="care-button care-companion-button"><?php echo esc_html( $link_text ); ?></a>
            <?php } else { ?>
                <div class="more-wrapper">
                    <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $link_text ); ?><i class="step-link-text-icon <?php echo esc_attr( $link_text_icon ); ?>"></i></a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
