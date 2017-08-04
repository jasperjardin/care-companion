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


function care_companion_get_donation_income( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['income'];
    }
    return;
}
function care_companion_get_formated_donation_income( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $currency_symbol = give_currency_symbol();
        $donation = care_companion_get_donation_info( $form_id );
        return $currency_symbol . $donation['income'];
    }
    return;
}
function care_companion_get_donation_goal( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['goal'];
    }
    return;
}
function care_companion_get_formated_donation_goal( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['formated-goal'];
    }
    return;
}
function care_companion_get_donation_progress( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['progress'];
    }
    return;
}

function care_companion_donate_button( $form_id = '' ) {
    $the_permalink = get_permalink( $form_id );

    echo '<a href="' . esc_url( $the_permalink ) . '#give-form-' . esc_attr( $form_id ) . '" class="care-button care-companion-btn donate">' . esc_html( 'Donate', 'care-companion' ) . '</a>';

    return;
}

function care_companion_get_donation_info( $form_id = '' ) {

    $form = new Give_Donate_Form( $form_id );
    $donation_income = '';
    $donation_goal = '';
    $donation_progress = '';
    $formated_donation_income = '';
    $formated_donation_goal = '';
    $donation = array();

    /**
     * Filter the form income
     *
     * @since 1.0.0
     */
    $income = apply_filters( 'care_companion_goal_amount_raised_output', $form->get_earnings(), $form_id, $form );

    /**
     * Filter the form
     *
     * @since 1.0.0
     */
    $goal = apply_filters( 'care_companion_goal_amount_target_output', $form->goal, $form_id, $form );

    /**
     * Filter the goal progress output
     *
     * @since 1.0.0
     */

    $progress = 0;

    if ( 0 != $income ) {
        $progress = apply_filters( 'care_companion_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 2 ), $form_id, $form );
    }

    // Set progress to 100 percentage if income > goal.
    if ( $income >= $goal ) {
    	$progress = 100;
    }

	if ( ! empty( $form_id ) ) :

        // Get formatted amount.
        $donation_income = give_human_format_large_amount( give_format_amount( $income ) );
        $donation_goal   = give_human_format_large_amount( give_format_amount( $goal ) );

        $formated_donation_income = give_currency_filter( $income );
        $formated_donation_goal = give_currency_filter( $goal );
        $donation_progress = round( $progress );

        $donation = array(
            'income' => $donation_income,
            'goal' => $donation_goal,
            'formated-income' => $formated_donation_income,
            'formated-goal' => $formated_donation_goal,
            'progress' => $donation_progress,
        );

        return $donation;

    endif;

    return;
}
