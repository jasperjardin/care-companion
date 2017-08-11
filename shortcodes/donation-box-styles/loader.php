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

<?php if ( 'style-4' === $layout_style || 'style-5' === $layout_style || 'LinePercent' === $progress_shape ) { ?>
    <?php
        $filtered_progress_color = $progress_color;
        $filtered_progress_trail_color = $progress_trail_color;
        $filtered_progress_trail_width = esc_attr( absint( $progress_trail_width ) . 'px' );
        $filtered_progress_stroke_width = esc_attr( absint( $progress_stroke_width ) . 'px' );

        if ( 'style-4' === $layout_style || 'style-5' === $layout_style) {
            $filtered_progress_color = '';
            $filtered_progress_trail_color = '';
            $filtered_progress_trail_width = '';
            $filtered_progress_stroke_width = '';
        }
    ?>
    <div class="care-companion-progress-bar care-companion-percent-line-bar" role="progressbar" style="background-color: <?php echo esc_attr( $filtered_progress_trail_color ); ?>; height: <?php echo $filtered_progress_trail_width; ?>;">
        <span class="percentage-circle <?php echo esc_attr( $progress_transition_style ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>" style="background-color: <?php echo esc_attr( $filtered_progress_color ); ?>; height: <?php echo $filtered_progress_stroke_width; ?>;">
        </span>
    </div>

<?php } ?>

<?php if ( 'style-4' !== $layout_style && 'style-5' !== $layout_style ) { ?>

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

        <?php } ?>

<?php } ?>
