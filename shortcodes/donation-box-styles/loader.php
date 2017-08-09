<?php
/**
 * Template for Progress Bars.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
?>

<?php if ( 'LinePercent' !== $progress_shape ) { ?>

    <div id="care-companion-progress-bar-<?php echo esc_attr( $form_id ); ?>" class="care-companion-progress-bar">
        <?php
            if ( 'Square' === $progress_shape ) {
                require( dirname( __FILE__ ) . '/svg/square.php' );
            }
            if ( 'Triangle' === $progress_shape ) {
                require( dirname( __FILE__ ) . '/svg/triangle.php' );
            }
            if ( 'Heart' === $progress_shape ) {
                require( dirname( __FILE__ ) . '/svg/heart.php' );
            }
        ?>
    </div>

<?php } else { ?>

    <div class="care-companion-progress-bar care-companion-percent-line-bar" role="progressbar" style="background-color: <?php echo esc_attr( $progress_trail_color ); ?>; height: <?php echo esc_attr( absint( $progress_trail_width ) . 'px' ); ?>;">
        <span class="percentage-circle <?php echo esc_attr( $progress_transition_style ); ?>" aria-valuenow="<?php echo esc_attr( $progress_donation ) . esc_attr( $progress_symbol ); ?>" style="background-color: <?php echo esc_attr( $progress_color ); ?>; height: <?php echo esc_attr( absint( $progress_stroke_width ) . 'px' ); ?>;">
        </span>
    </div>

<?php } ?>
