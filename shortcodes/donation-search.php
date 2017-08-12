<?php
/**
  * Donation Box Shortcode Template [cc_serch_form]
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
?>
<?php if ( empty ( $background_image_url ) ) : ?>
    <div class="care-companion-search-field">
<?php else: ?>
    <div class="care-companion-search-field" style="background-image: url('<?php echo esc_attr( $background_image_url ); ?>');">
<?php endif; ?>

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
