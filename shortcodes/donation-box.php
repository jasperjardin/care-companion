<?php
/**
  * Donation Box Shortcode Template [cc_donation_box form_id='100' style="style-1"]
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
 * Donation Box Style Filter
 */
$allowed_styles = array( 'style-1', 'style-2', 'style-3', 'style-4', 'style-5' );
$background_image = '';

if (! in_array( $layout_style, $allowed_styles, true ) ) {
    $layout_style = 'style-1';
}

/**
 * Add background image
 */
$background_image = care_companion_get_featured_image_url( $form_id );

/**
 * Progress Bar Shape Filter
 */
$allowed_progress_shape = array( 'Line', 'Circle', 'SemiCircle', 'Square', 'Triangle', 'Heart', 'LinePercent' );

if (! in_array( $progress_shape, $allowed_progress_shape, true ) ) {
    $progress_shape = 'Circle';
}

if ( 'style-4' === $layout_style || 'style-5' === $layout_style ) {
    $progress_shape = 'LinePercent';
}

/**
 * Progress Bar Transition Filter
 */
$allowed_progress_transition_style = array( 'linear', 'easeIn', 'easeOut', 'easeInOut' );

if (! in_array( $progress_transition_style, $allowed_progress_transition_style, true ) ) {
    $progress_transition_style = 'easeInOut';
}

$progress_donation = care_companion_get_donation_progress( $form_id );

/**
 * Query the Form
 */
$args = array(
    'p' => $form_id,
    'post_type' => 'give_forms'
);

/**
 * Show if Give plugin is disabled.
 */
if ( ! class_exists( 'Give' ) ) { ?>
    <div class="care-companion-message alert alert-warning requires-plugin">
        <p>
            <?php esc_html_e(
                'The cc_donation_box shortcode requires the Give plugin to be installed and activated.',
                'care-companion'
            ); ?>
        </p>
    </div>
    <?php return; ?>
<?php }

/**
* Show if Give plugin is disabled.
*/
if ( empty( $form_id ) ) { ?>
    <div class="care-companion-message alert alert-warning empty-form-id">
        <p>
            <?php esc_html_e(
                'Using cc_donation_box shortcode requires the form_id parameter to be a valid form ID and the form must exist.',
                'care-companion'
            ); ?>
        </p>
    </div>
    <?php return; ?>
<?php }

$form = new WP_Query( $args ); ?>

<?php if ( $form->have_posts() ) : ?>
    <div class="care-companion-donation-box <?php echo esc_attr( $layout_style ); ?> <?php echo esc_attr( $progress_shape ); ?>"
        data-style="<?php echo esc_attr( $layout_style ); ?>"
        data-form-id="<?php echo esc_attr( $form_id ); ?>"
        data-progress-symbol="<?php echo esc_attr( $progress_symbol ); ?>"

        data-progress-text="<?php echo esc_attr( $progress_text ); ?>"
        data-progress-text-size="<?php echo esc_attr( $progress_text_size ); ?>"
        data-progress-donation="<?php echo esc_attr( $progress_donation ); ?>"

        data-progress-color="<?php echo esc_attr( $progress_color ); ?>"
        data-progress-fill="<?php echo esc_attr( $progress_fill ); ?>"
        data-progress-trail-color="<?php echo esc_attr( $progress_trail_color ); ?>"
        data-progress-shape="<?php echo esc_attr( $progress_shape ); ?>"
        data-progress-stroke-width="<?php echo esc_attr( $progress_stroke_width ); ?>"
        data-progress-trail-width="<?php echo esc_attr( $progress_trail_width ); ?>"
        data-progress-transition-style="<?php echo esc_attr( $progress_transition_style ); ?>"
        data-progress-transition-duration="<?php echo esc_attr( $progress_transition_duration ); ?>"
        data-progress-advance-animation="<?php echo esc_attr( $progress_advance_animation ); ?>"
        data-progress-start-color="<?php echo esc_attr( $progress_start_color ); ?>"
        data-progress-start-width="<?php echo esc_attr( $progress_start_width ); ?>"
        data-progress-end-color="<?php echo esc_attr( $progress_end_color ); ?>"
        data-progress-end-width="<?php echo esc_attr( $progress_end_width ); ?>"
        data-shortcode="cc_donation_box"

        <?php if ( 'style-1' === $layout_style ) { ?>
            style="background-color: <?php echo esc_attr( $container_fill ); ?>;"
        <?php } ?>
        <?php if ( 'style-2' === $layout_style ) { ?>
            style="background-image: url('<?php echo esc_attr( $background_image ); ?>');"
        <?php } ?>
        <?php if ( !empty( $width ) ) { ?>
            <?php if ( 'style-3' === $layout_style || 'style-4' === $layout_style || 'style-5' === $layout_style ) { ?>
                style="
                    width: <?php echo esc_attr( $width ); ?>;
                    margin-right: <?php echo esc_attr( $spacing ); ?>;
                "
            <?php } ?>
        <?php } ?>
    >
        <?php
            if ( 'style-1' === $layout_style ) {
                require( dirname( __FILE__ ) . '/donation-box-styles/style-1.php' );
            }
            if ( 'style-2' === $layout_style ) {
                require( dirname( __FILE__ ) . '/donation-box-styles/style-2.php' );
            }
            if ( 'style-3' === $layout_style ) {
                require( dirname( __FILE__ ) . '/donation-box-styles/style-3.php' );
            }
            if ( 'style-4' === $layout_style ) {
                require( dirname( __FILE__ ) . '/donation-box-styles/style-4.php' );
            }
            if ( 'style-5' === $layout_style ) {
                require( dirname( __FILE__ ) . '/donation-box-styles/style-5.php' );
            }
        ?>

    </div>

    <?php wp_reset_postdata(); ?>

<?php else : ?>

<div class="care-companion-message alert alert-info nothing-found">
    <p>
        <?php esc_html_e(
            'There are no donation form found.',
            'care-companion'
        ); ?>
    </p>
</div>

<div class="clearfix"></div>
<?php endif; ?>
