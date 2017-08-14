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
function care_companion_get_donation_forms( $orderby = '', $order = '' ) {
    $helper = '';
    $donation_forms = '';

    if ( empty ( $orderby ) ) {
        $orderby = 'name';
    }
    if ( empty ( $order ) ) {
        $order = 'ASC';
    }

    $helper = new \DSC\CareCompanion\Helper();
    $donation_forms = $helper->getDonationForms( $orderby, $order );

    if ( ! empty( $donation_forms ) ) {
        return $donation_forms;
    }
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

    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
        if ( empty( $form_id ) ) {
            return 0;
        }
    }

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

function care_companion_metabox_value( $meta_key = '', $post_id = '' ) {

    if ( empty( $post_id ) ) {
        $post_id = get_the_ID();
    }

    if ( !empty( $meta_key ) ) {
        return get_post_meta( $post_id, $meta_key, true);
    }

    return;
}
function care_companion_causes_description() {
    echo esc_html( care_companion_metabox_value('_care_companion_causes_description_meta_key') );
}
function care_companion_get_assigned_donation_form_id() {
    return care_companion_metabox_value('_care_companion_assigned_donation_form_meta_key');
}
function care_companion_single_progress_bar( $args = '' ) { ?>
    <?php
        $form_id = care_companion_get_assigned_donation_form_id();
        $progress_donation = care_companion_get_donation_progress( $form_id );

        if( empty( $args ) ) {
            $args = array(
                'text_color' => '#f8b864',
                'progress_symbol' => __( '%', 'care-companion' ),
                'progress_text' => __( 'Completed', 'care-companion' ),
                'progress_text_size' => '45px',
                'progress_color' => '#eb543a',
                'progress_fill' => 'transparent',
                'progress_trail_color' => '#e7e7e7',
                'progress_shape' => 'Circle',
                'progress_stroke_width' => 4,
                'progress_trail_width' => 4,
                'progress_transition_style' => 'easeInOut',
                'progress_transition_duration' => 5000
            );
        }
    ?>
    <?php if ( ! empty( $form_id ) ) { ?>
        <div class="care-companion-donation-box causes-single care-companion-progress-bar-container"
            progress-text-color ="<?php echo esc_attr( $args['text_color'] ); ?>"
            data-progress-symbol="<?php echo esc_attr( $args['progress_symbol'] ); ?>"

            data-progress-text="<?php echo esc_attr( $args['progress_text'] ); ?>"
            data-progress-text-size="<?php echo esc_attr( $args['progress_text_size'] ); ?>"
            data-progress-donation="<?php echo esc_attr( $progress_donation ); ?>"

            data-progress-color="<?php echo esc_attr( $args['progress_color'] ); ?>"
            data-progress-fill="<?php echo esc_attr( $args['progress_fill'] ); ?>"
            data-progress-trail-color="<?php echo esc_attr( $args['progress_trail_color'] ); ?>"
            data-progress-shape="<?php echo esc_attr( $args['progress_shape'] ); ?>"
            data-progress-stroke-width="<?php echo esc_attr( $args['progress_stroke_width'] ); ?>"
            data-progress-trail-width="<?php echo esc_attr( $args['progress_trail_width'] ); ?>"
            data-progress-transition-style="<?php echo esc_attr( $args['progress_transition_style'] ); ?>"
            data-progress-transition-duration="<?php echo esc_attr( $args['progress_transition_duration'] ); ?>"
            data-shortcode="cc_donation_box"
            >
            <div id="care-companion-progress-bar-<?php echo esc_attr( $form_id ); ?>" class="care-companion-progress-bar">
            </div>
        </div>
    <?php } ?>
<?php }

function care_companion_get_number_format_income( $form_id = '' ) {
    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
    }

    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return absint( $donation[ 'number-format-income' ] );
    }
    return;
}
function care_companion_get_donation_income( $form_id = '' ) {
    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
    }

    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['income'];
    }
    return;
}
function care_companion_get_formated_donation_income( $form_id = '' ) {

    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
        if ( empty( $form_id ) ) {
            return give_currency_filter(give_format_amount(0));
        }
    }

    if ( ! empty( $form_id ) ) {
        $currency_symbol = give_currency_symbol();
        $donation = care_companion_get_donation_info( $form_id );
        return $currency_symbol . $donation['income'];
    }
    return;
}

function care_companion_get_number_format_goal( $form_id = '' ) {
    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
    }

    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return absint( $donation[ 'number-format-goal' ] );
    }
    return;
}
function care_companion_get_donation_goal( $form_id = '' ) {
    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
    }

    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['goal'];
    }
    return;
}
function care_companion_get_formated_donation_goal( $form_id = '' ) {

    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
        if ( empty( $form_id ) ) {
            return give_currency_filter(give_format_amount(0));
        }
    }

    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );
        return $donation['formated-goal'];
    }
    return;
}

function care_companion_get_donation_progress( $form_id = '' ) {
    if ( ! empty( $form_id ) ) {
        $donation = care_companion_get_donation_info( $form_id );

        if ( 0 === absint($donation['income']) && 0 === absint($donation['goal']) ) {
            return $donation['progress'] = 0;
        }
        return $donation['progress'];
    }
    return;
}

function care_companion_donate_button( $form_id = '', $text = '', $class_name = '', $title = '', $background = '' ) {

    $style = '';

    if ( is_singular( 'dsc-causes' ) ) {
        $form_id = care_companion_get_assigned_donation_form_id();
        if ( empty( $form_id ) ) {
            return;
        }
    }

    if ( empty( $text ) ) {
        $text = esc_html( 'Donate', 'care-companion' );
    }

    if ( empty( $class_name ) ) {
        $class_name = 'donate';
    }

    if ( empty( $title ) ) {
        $title = esc_attr( 'Donate', 'care-companion' );
    }

    if ( ! empty( $background ) ) {
        $style = esc_attr( 'style=background-color:' . $background );
    }

    if ( ! empty( $form_id ) ) {
        $the_permalink = get_permalink( $form_id );

        echo '<a href="' . esc_url( $the_permalink ) . '#give-form-' . esc_attr( $form_id ) . '" class="care-companion-btn ' . esc_attr( $class_name ) . '"' . $style . ' title="' . esc_attr( $title ) . '" >' . esc_html( $text ) . '</a>';
    }

    return;
}

function care_companion_details_button( $form_id = '', $text = '', $class_name = '', $title = '', $background = '' ) {

    $style = '';

    if ( empty( $text ) ) {
        $text = esc_html( 'Details', 'care-companion' );
    }

    if ( empty( $class_name ) ) {
        $class_name = 'details';
    }

    if ( empty( $title ) ) {
        $title = esc_attr( 'Details', 'care-companion' );
    }

    if ( ! empty( $background ) ) {
        $style = esc_attr( 'style=background-color:' . $background );
    }


    if ( ! empty( $form_id ) ) {
        $the_permalink = get_permalink( $form_id );

        echo '<a href="' . esc_url( $the_permalink ) . '" class="care-companion-btn ' . esc_attr( $class_name ) . '"' . $style . ' title="' . esc_attr( $title ) . '" >' . esc_html( $text ) . '</a>';
    }

    return;
}

function care_companion_published_date( $form_id = '', $prefix_text = '', $suffix_text = '' ) {
    $time = '';
    $human_time = '';

    if ( empty( $form_id ) ) {
        $form_id = get_the_ID();
    }

    if ( empty( $prefix_text ) ) {
        $prefix_text = __( 'Published ', 'care-companion' );
    }

    if ( empty( $suffix_text ) ) {
        $suffix_text = __( ' ago', 'care-companion' );
    }

    if ( ! empty( $form_id ) ) {

        $time = get_post_time('U', true, $form_id );
        $human_time = human_time_diff( $time, current_time('timestamp') );

        echo sprintf( '%s %s %s', $prefix_text, $human_time, $suffix_text );
    }

    return;
}
function care_companion_published_date_box( $form_id = '', $column_left = '', $column_right = '', $separator = '' ) { ?>
    <?php

    if ( empty( $form_id ) ) {
        $form_id = get_the_ID();
    }

    if ( empty( $column_left ) ) {
        $column_left = 5;
    }
    if ( empty( $column_right ) ) {
        $column_right = 7;
    }
    if ( empty( $separator ) ) {
        $separator = esc_html( ', ', 'care-companion' );
    }
        $day = get_the_date( 'l', $form_id );
        $month = get_the_date( 'M', $form_id );
        $date = get_the_date( 'd', $form_id );
        $year = get_the_date( 'Y', $form_id );
        if ( ! empty( $form_id ) ) {
    ?>
        <div class="published-date-box border-primary dark">
            <div class="col-md-<?php echo esc_attr( absint( $column_left ) ); ?> left-section">
                <span class="date"><?php echo esc_html( $date ); ?></span>
            </div>
            <div class="col-md-<?php echo esc_attr( absint( $column_right ) ); ?> right-section">
                <span class="month"><?php echo esc_html( $month ) . $separator; ?></span>
                <span class="year"><?php echo esc_html( $year ); ?></span>
                <span class="day"><?php echo esc_html( $day ); ?></span>
            </div>
        </div>
    <?php } ?>

<?php }

function care_companion_get_featured_image_url( $form_id = '', $size = '' ) {

    $src = '';

    if ( empty( $size ) ) {
        $size = 'large';
    }

    if ( ! empty( $form_id ) ) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id( $form_id ), $size );
        return $src[0];
    }

    return;
}

function care_companion_get_featured_image( $form_id = '', $size = '', $class_name = '' ) {

    $attr = '';

    if ( empty( $size ) ) {
        $size = 'large';
    }

    if ( empty( $class_name ) ) {
        $class_name = 'care-companion-featured-image';
    }

    $attr = array(
        'class' => $class_name
    );

    if ( ! empty( $form_id ) ) {
        return get_the_post_thumbnail( $form_id, $size, $attr );
    }

    return;
}

function care_companion_get_donation_info( $form_id = '' ) {

    $form = new Give_Donate_Form( $form_id );
    $donation_income = '';
    $donation_goal = '';
    $donation_progress = '';
    $formated_donation_income = '';
    $formated_donation_goal = '';
    $number_format_income = '';
    $number_format_goal = '';
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

    if ( 0 != $income && 0 != $goal ) {
        $progress = apply_filters( 'care_companion_goal_amount_funded_percentage_output', round( ( $income / $goal ) * 100, 2 ), $form_id, $form );
    }

    // Set progress to 100 percentage if income > goal.
    if ( $income >= $goal ) {
    	$progress = 100;
    }

	if ( ! empty( $form_id ) ) :

        $number_format_income = $form->get_earnings();
        $number_format_goal = $form->get_goal();
        // Get formatted amount.
        $donation_income = give_human_format_large_amount( give_format_amount( $income ) );
        $donation_goal   = give_human_format_large_amount( give_format_amount( $goal ) );

        $formated_donation_income = give_currency_filter( $income );
        $formated_donation_goal = give_currency_filter( $goal );
        $donation_progress = round( $progress );

        $donation = array(
            'number-format-income' => $number_format_income,
            'number-format-goal' => $number_format_goal,
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
