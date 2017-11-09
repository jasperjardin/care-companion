<?php
/**
  * Upcoming Events Shortcode Template [cc_upcoming_events]
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

if ( 'enable' === $read_more ) {
    $read_more = true;
} else {
    $read_more = false;
}

$post_thumbnail = '';

/**
 * Query the Form
 */
$event_args = array(
    'numberposts' => $number_of_posts,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_type' => 'tribe_events',
    'post_status' => 'publish',
    'suppress_filters' => true
);

/**
 * Show if Give plugin is disabled.
 */
if ( ! class_exists( 'Tribe__Events__Main' ) ) { ?>
    <div class="care-companion-message alert alert-info requires-plugin">
        <p>
            <?php esc_html_e(
                'The cc_upcoming_events shortcode requires the The Events Calendar plugin to be installed and activated.',
                'care-companion'
            ); ?>
        </p>
    </div>
    <?php return; ?>
<?php }

$upcoming_events = wp_get_recent_posts( $event_args ); ?>

<ul class="care-companion-upcoming-events shortcode-element">
    <?php if ( ! empty ( $upcoming_events ) ) : ?>
        <?php foreach( $upcoming_events as $event ) { ?>
            <li class="care-companion-upcoming-event">

                <?php if ( ! has_post_thumbnail( $event['ID'] ) ) {
                    $post_thumbnail = 'no-thumbnail';
                } else {
                    $post_thumbnail = 'has-thumbnail';
                } ?>
                <div class="row care-companion-upcoming-event-inner-wrap <?php echo esc_attr( $post_thumbnail ); ?>">

                    <div class="col-md-4 content-wrapper-left" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( $event['ID'] ), 'full' ); ?>');">
                        <?php if ( has_post_thumbnail( $event['ID'] ) ) { ?>
                            <?php echo get_the_post_thumbnail( $event['ID'], 'full', array( 'class' => 'cc-event-thumbnail' ) ); ?>
                        <?php } else { ?>
                            <div class="event-has-no-thumbnail"></div>
                        <?php } ?>
                    </div>

                    <div class="col-md-8 content-wrapper-right">
                        <div class="cc-event-date">
                            <span class='date'>
                                <?php echo get_the_date( 'd', $event['ID'] ); ?>
                            </span>
                            <span class='month'>
                                <?php echo get_the_date( 'M', $event['ID'] ); ?>
                            </span>
                        </div>
                        <h4 class="cc-event-title">
                            <a href="<?php echo esc_url( get_the_permalink( $event['ID'] ) ); ?>" title="<?php echo esc_attr( $event['post_title'] ); ?>">
                                <?php echo esc_html( $event['post_title'] ); ?>
                            </a>
                        </h4>
                        <?php care_companion_the_event_period( $event['ID'] ); ?>
                        <div class="cc-event-content">
                            <?php echo care_companion_the_event_content( $event['ID'], $read_more ); ?>
                        </div>

                    </div>

                </div>

            </li>
        <?php } ?>

            <?php wp_reset_query(); ?>

    <?php else : ?>

        <li class="care-companion-message alert alert-info nothing-found">
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
<div class="clearfix"></div>
