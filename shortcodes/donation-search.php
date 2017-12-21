<?php
/**
  * Donation Box Shortcode Template [cc_search_form]
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
                'The cc_search_form shortcode requires the Give plugin to be installed and activated.',
                'care-companion'
            ); ?>
        </p>
    </div>
    <?php return; ?>
<?php }

/**
 * Donation Search Columns
 */
$allowed_columns = array( '1', '2', '3', '4' );

if (! in_array( $columns, $allowed_columns, true ) ) {
    $columns = '1';
}

$style_background = '';

if ( ! empty ( $background_color ) ) {
    $style_background = 'style="background: ' . esc_attr( $background_color ) . '"';
}

if ( ! empty ( $background_image_url ) ) {
    $style_background = 'style="background-image: url(' . esc_attr( $background_image_url ) . ')"';
} ?>

<div class="care-companion-search-field care-companion-shortcode-grid column-<?php echo esc_attr( absint( $columns ) ); ?>" <?php echo $style_background; ?> >
    <h1 class="search-title primary">
        <?php esc_html_e( $title ); ?>
    </h1>

    <?php if ( empty ( $color ) ) : ?>
        <p class="search-subtitle">
            <?php esc_html_e( $sub_title ); ?>
        </p>
    <?php else: ?>
        <p class="search-subtitle" style="color: <?php esc_attr_e( $color ); ?>;">
            <?php esc_html_e( $sub_title ); ?>
        </p>
    <?php endif; ?>

    <form role="search" class="care-companion-search-form" action="<?php echo site_url('/'); ?>" method="get" id="searchform">
        <input type="text" class="search-field" name="s" placeholder="<?php esc_attr_e( $search_text ); ?>"/>
        <input type="hidden" name="post_type" value="give_forms" />

        <button class="button search-button background-primary" type="submit" form="searchform" id="care_companion_search_submit" value="<?php esc_attr_e( $search_button_text ); ?>"><i class="fa fa-search search-icon"></i><?php esc_html_e( $search_button_text ); ?></button>
    </form>

</div>
