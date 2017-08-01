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

// Filter allowed Styles.
$allowed_styles = array( "style-1", "style-2", "style-3" );

if (! in_array( $style, $allowed_styles, true ) ) {
    $style = 'style-1';
}

$args = array(
    'p' => $form_id,
    'post_type' => 'give_forms'
);

$form = new WP_Query( $args ); ?>

<?php if ( $form->have_posts() ) : ?>

    <?php
        if ( 'style-1' === $style ) {
            require_once( dirname( __FILE__ ) . '/donation-box-styles/style-1.php' );
        }
        if ( 'style-2' === $style ) {
            require_once( dirname( __FILE__ ) . '/donation-box-styles/style-2.php' );
        }
        if ( 'style-3' === $style ) {
            require_once( dirname( __FILE__ ) . '/donation-box-styles/style-3.php' );
        }
    ?>

    <?php wp_reset_postdata(); ?>

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
