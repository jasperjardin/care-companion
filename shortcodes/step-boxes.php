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

$style_background = '';
$style_step_number_background = '';
$style_text_color = '';

if ( 'true' === $no_margin ) {
    $no_margin = 'no-margin';
}

if ( ! empty ( $text_color ) ) {
    $style_text_color = 'style="color: ' . esc_attr( $text_color ) . '"';
}

if ( ! empty ( $background_color ) ) {
    $style_background = 'style="background-color: ' . esc_attr( $background_color ) . '"';
    $style_step_number_background = 'style="background-color: ' . esc_attr( $background_color ) . '"';
}

$vc_background_image_url = '';
$vc_image_url = '';

// Check the value if numeric and get the attached image.
if ( is_numeric( $image_url ) || is_numeric( $background_image_url )) {
    $vc_image_url = wp_get_attachment_image_src($image_url, "large");
    $image_url = $vc_image_url[0];

    $vc_background_image_url = wp_get_attachment_image_src($background_image_url, "large");
    $background_image_url = $vc_background_image_url[0];
}

if ( ! empty ( $background_image_url ) ) {
    $style_background = 'style="background-image: url(' . esc_attr( $background_image_url ) . ')"';
} ?>

<div class="care-companion-step-boxes care-companion-shortcode-grid column-<?php echo esc_attr( absint( $columns ) ) . ' ' . esc_attr( $no_margin ); ?>" <?php echo $style_background; ?>>
    <div class="outer-wrapper">
        <div class="inner-wrapper">

            <?php if ( ! empty( $step_number ) ) { ?>
                <div class="step-number-wrapper">
                    <span class="step-number" <?php echo $style_background; ?> ><?php echo esc_html( $step_number ); ?></span>
                </div>
            <?php } ?>

            <div class="icon-wrapper">
                <?php if ( empty( $image_url ) ) { ?>
                    <i class="step-icon <?php echo esc_attr( $icon ); ?>"></i>
                <?php } else { ?>
                    <img class="step-icon image" src="<?php echo esc_url( $image_url ); ?>">
                <?php }?>
            </div>

            <div class="title-wrapper">
                <h4 class="step-title" <?php echo $style_text_color; ?>><?php echo esc_html( $title ); ?></h4>
            </div>
            <div class="content-wrapper">
                <p class="step-content" <?php echo $style_text_color; ?>><?php echo esc_html( $description ); ?></p>
            </div>

            <?php if ( 'true' === $button_mode ) { ?>
                <a href="<?php echo esc_url( $link ); ?>" class="care-button care-companion-button" style="background-color: <?php echo esc_attr( $button_color ); ?>; color: <?php echo esc_attr( $link_text_color ); ?>"><?php echo esc_html( $link_text ); ?></a>
            <?php } else { ?>
                <div class="more-wrapper">
                    <a href="<?php echo esc_url( $link ); ?>" style="color: <?php echo esc_attr( $link_text_color ); ?>"><?php echo esc_html( $link_text ); ?><i class="step-link-text-icon <?php echo esc_attr( $link_text_icon ); ?>"></i></a>
                </div>
            <?php } ?>

        </div>
    </div>
</div>
