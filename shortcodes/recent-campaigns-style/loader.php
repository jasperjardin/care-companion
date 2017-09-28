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

<?php if ( 'style-2' === $layout_style ) { ?>
    <?php
        $filtered_progress_trail_color = $progress_trail_color;
        $filtered_progress_trail_width = esc_attr( absint( $progress_trail_width ) . 'px' );
        $filtered_progress_stroke_width = esc_attr( absint( $progress_stroke_width ) . 'px' );
    ?>
    <div class="care-companion-progress-bar care-companion-percent-line-bar" role="progressbar" style="height: <?php echo $filtered_progress_trail_width; ?>;">
        <span class="percentage-circle <?php echo esc_attr( $progress_transition_style ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>" style="background-color: <?php echo esc_attr( $container_primary_fill ); ?>; height: <?php echo $filtered_progress_stroke_width; ?>;">
        </span>
    </div>

<?php } ?>
