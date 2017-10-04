<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
    <path class="care-companion-triangle-trail" d="M 50,2 L 98,98 L 2,98 L 50,2" stroke="transparent" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 310.663, 310.663; stroke-dashoffset: 0; stroke-linecap: round;"></path>
    <path class="care-companion-triangle" d="M 50,2 L 98,98 L 2,98 L 50,2" stroke="transparent" stroke-width="1" fill-opacity="0"></path>
</svg>
<span class="percentage-path <?php echo esc_attr( $progress_transition_style . ' ' . $progress_shape ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>">
    <?php if ( ! empty( $progress_text ) ) { ?>
        <span class="completed-text">
            <?php echo esc_html( $progress_text ); ?>
        </span>
    <?php } ?>
</span>
