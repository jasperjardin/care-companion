<?php
/**
  * Donation Box Shortcode Template [cc_recent_campaigns]
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
$allowed_styles = array( 'style-1', 'style-2' );
$background_image = '';

if (! in_array( $layout_style, $allowed_styles, true ) ) {
    $layout_style = 'style-1';
}

/**
 * Recent Campaigns Columns
 */
$allowed_columns = array( '1', '2', '3', '4' );

if (! in_array( $columns, $allowed_columns, true ) ) {
    $columns = '3';
}
/**
 * Progress Bar Transition Filter
 */
$allowed_progress_transition_style = array( 'linear', 'easeIn', 'easeOut', 'easeInOut' );

if (! in_array( $progress_transition_style, $allowed_progress_transition_style, true ) ) {
    $progress_transition_style = 'easeInOut';
}

/**
 * Query the Form
 */
$args = array(
	'numberposts' => $number_of_posts,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'give_forms',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args ); ?>
<ul class="care-companion-recent-campaigns-container">
    <?php if ( ! empty ( $recent_posts ) ) : ?>
        <?php
        foreach( $recent_posts as $recent ) {
            $form_id = $recent['ID'];
            $background_image = care_companion_get_featured_image_url( $form_id );
            $progress_donation = care_companion_get_donation_progress( $form_id );
        ?>

            <li class="care-companion-recent-campaigns care-companion-shortcode-grid column-<?php echo esc_attr( absint( $columns ) ); ?> care-companion-recent-campaigns-style <?php echo esc_attr( $layout_style ); ?>"
                data-form-id="<?php echo esc_attr( $form_id ); ?>"
                data-style="<?php echo esc_attr( $layout_style ); ?>"
                data-progress-symbol="<?php echo esc_attr( $progress_symbol ); ?>"

                data-progress-donation="<?php echo esc_attr( $progress_donation ); ?>"

                data-progress-color="<?php echo esc_attr( $progress_color ); ?>"

                data-progress-transition-duration="<?php echo esc_attr( $progress_transition_duration ); ?>"
                data-shortcode="cc_recent_campaigns"
            >
                <?php
                    if ( 'style-1' === $layout_style ) {
                        require( dirname( __FILE__ ) . '/recent-campaigns-style/style-1.php' );
                    }
                    if ( 'style-2' === $layout_style ) {
                        require( dirname( __FILE__ ) . '/recent-campaigns-style/style-2.php' );
                    }
                ?>

            </li>

            <?php wp_reset_postdata(); ?>

        <?php } ?>
    <?php else : ?>

        <li class="alert alert-info">
            <p>
                <?php esc_html_e(
                    'There are no items found in your donation form found.',
                    'care-companion'
                ); ?>
            </p>
        </li>
        <div class="clearfix"></div>

    <?php endif; ?>
</ul>
