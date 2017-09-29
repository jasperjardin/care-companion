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
 * Recent Blogs Columns
 */
$allowed_columns = array( '1', '2', '3', '4' );

if (! in_array( $columns, $allowed_columns, true ) ) {
    $columns = '3';
}

/**
 * Query the Form
 */
$args = array(
	'numberposts' => $number_of_posts,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'post',
	'post_status' => 'publish',
	'suppress_filters' => true
);

$id = '';
$background_image = '';
$recent_author_data = '';
$recent_author = '';

$recent_posts = wp_get_recent_posts( $args ); ?>
<ul class="care-companion-recent-blogs-container">
    <?php if ( ! empty ( $recent_posts ) ) : ?>
        <?php
        foreach( $recent_posts as $recent ) {
            $id = $recent['ID'];
            $recent_author_data = get_user_by( 'ID', $recent["post_author"] );
            $recent_author = $recent_author_data->display_name;
            $background_image = care_companion_get_featured_image_url( $id );
        ?>
            <li class="care-companion-recent-blogs care-companion-recent-blogs-grid column-<?php echo esc_attr( absint( $columns ) ); ?>">

                <div class="row main-container">

                    <div class="col-md-12 donation-left-section">
                        <div class="featured-image-section">
                            
                            <a href="<?php echo esc_url( get_permalink( $id ) ); ?>" title="<?php echo esc_attr( get_the_title( $id ) ); ?>">
                                <div class="background-overlay" style="background-color:<?php echo esc_attr( $overlay_color ); ?>">
                                    <div class="background-overlay-inner-wrap">
                                        <i class="featured-icon fa fa-picture-o light"></i>
                                    </div>
                                </div>
                            </a>

                            <?php if ( ! empty( $background_image ) ) { ?>
                                <img class="featured-image" src="<?php echo esc_attr( $background_image ); ?>" alt="<?php echo esc_attr( get_the_title( $id ) ); ?>">
                            <?php } else { ?>
                                <div class="featured-image no-featured-image">
                                    <i class="featured-icon fa fa-picture-o"></i>
                                </div>
                            <?php }?>

                        </div>

                        <div class="col-md-12 information-wrapper">
                            <h1 class="blog-title">
                                <a class="dark" href="<?php echo esc_url( get_permalink( $id ) ); ?>" title="<?php echo esc_attr( get_the_title( $id ) ); ?>">
                                    <?php echo esc_html( get_the_title( $id ) ); ?>
                                </a>
                            </h1>

                            <div class="action-section">
                                <span class="date-posted"><i class="fa fa-calendar primary care-companion-icon"></i><?php echo get_the_date( 'F j, Y', $id ); ?></span>

                                <span class="action-separator"><?php echo esc_html( '|', 'care-companion' ); ?></span>

                                <span class="author"> <?php echo esc_html( 'By ', 'care-companion' ) . $recent_author; ?> </span>
                            </div>
                        </div>

                    </div>
                </div>

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
