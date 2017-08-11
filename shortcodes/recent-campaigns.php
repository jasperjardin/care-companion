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
    'post_type' => 'give_forms'
);

$args = array(
	'numberposts' => $number_of_posts,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'give_forms',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args ); ?>

<?php if ( ! empty ( $recent_posts ) ) : ?>
    <?php
    foreach( $recent_posts as $recent ) {
        $form_id = $recent['ID'];
        $background_image = care_companion_get_featured_image_url( $form_id );
        $progress_donation = care_companion_get_donation_progress( $form_id );
    ?>

        <div class="care-companion-recent-campaigns care-companion-recent-campaigns-grid column-<?php echo esc_attr( absint( $columns ) ); ?>"
            data-form-id="<?php echo esc_attr( $form_id ); ?>"
            data-progress-symbol="<?php echo esc_attr( $progress_symbol ); ?>"

            data-progress-donation="<?php echo esc_attr( $progress_donation ); ?>"

            data-progress-color="<?php echo esc_attr( $progress_color ); ?>"

            data-progress-transition-duration="<?php echo esc_attr( $progress_transition_duration ); ?>"
            data-shortcode="cc_recent_campaigns"
        >
            <div class="row main-container">

                <div class="col-md-12 donation-left-section">

                    <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_primary_fill ); ?>"></div>

                    <div class="progressbar-section" style="background-color: <?php echo esc_attr( $container_primary_fill ); ?>;">
                        <div class="donation-raised">

                            <span class="donation-value light"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>
                            <span class="donation-caption light"><?php echo esc_html( 'Pledge', 'care-companion' ); ?></span>


                        </div>

                        <div class="care-companion-progress-bar care-companion-percent-line-bar" role="progressbar">
                            <span class="percentage-circle <?php echo esc_attr( $progress_transition_style ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>">
                            </span>
                        </div>

                    </div>

                    <?php if ( ! empty( $background_image ) ) { ?>
                        <div class="donation-featured-image" style="background-image: url('<?php echo esc_attr( $background_image ); ?>');"></div>
                    <?php } else { ?>
                        <div class="donation-featured-image" style="background-color: <?php echo esc_attr( $container_fill ); ?>;">
                            <i class="donation-icon fa fa-heart" style="color: <?php echo esc_attr( $progress_color ); ?>;"></i>
                        </div>
                    <?php }?>

                    <div class="col-md-12 information-wrapper">
                        <h1 class="donation-title">
                            <?php echo get_the_title( $form_id ); ?>
                        </h1>

                        <div class="action-section">
                            <span class="donation-action">
                                <i class="fa fa-heart primary care-companion-icon"></i>
                                <?php
                                    $donation_count = care_companion_get_donations_count( $form_id );
                                    echo sprintf( _n( '%d Donation', '%d Donations', $donation_count, 'care-companion' ), $donation_count );
                                ?>
                            </span>

                            <span class="donation-gap">
                                <?php echo esc_html( '|', 'care-companion' ); ?>
                            </span>

                            <span class="donation-action">
                                <i class="fa fa-share-alt primary care-companion-icon"></i>
                                <?php echo esc_html( 'Share', 'care-companion' ); ?>
                            </span>

                        </div>
                    </div>

                </div>
            </div>

        </div>

        <?php wp_reset_postdata(); ?>

    <?php } ?>
<?php else : ?>

<div class="alert alert-info">
    <p>
        <?php esc_html_e(
            'There are no items found in your donation form found.',
            'care-companion'
        ); ?>
    </p>
</div>

<div class="clearfix"></div>
<?php endif; ?>
