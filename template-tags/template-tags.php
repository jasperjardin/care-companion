<?php
/**
 * Care Companion Template Tags
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

if (! defined('ABSPATH')) {
    return;
}

function care_companion_give_the_content( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $form = get_post( $form_id );
        $form_content_meta = get_post_meta( $form_id, '_give_form_content', true );

        ?>
        <div class="donation-content">
            <?php
                if ( has_excerpt( $form_id ) ) {
                    echo $form->post_excerpt;
                } else {
                    echo $form_content_meta;
                }
            ?>

        </div>

    <?php
    }
}

function care_companion_get_donations_count( $form_id = '' ) {
    $give_payment_object = care_companion_get_give_object( 'give_payment', '_give_payment_form_id', $form_id );

    return $give_payment_object->post_count;
}

function care_companion_get_give_object( $post_type = '', $meta_key = '', $meta_value = '', $meta_compare = '' ) {

    if ( ! empty( $meta_compare ) ) {
        $meta_compare = '=';
    }

    if ( ! empty( $meta_key ) ) {
        $args = array(
            'post_type'    => $post_type,
            'meta_key'     => $meta_key,
            'meta_value'   => $meta_value,
            'meta_compare' => $meta_compare,
        );

        $query = new WP_Query( $args );

        return $query;
    }

    return;
}

function care_companion_replace_first_text_occurance($search, $replace, $source) {

    $explode = explode( $search, $source );
    $shift = array_shift( $explode );
    $implode = implode( $search, $explode );
    return $shift.$replace.$implode;

}
