<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
    <path class="care-companion-heart-trail" fill-opacity="0" stroke-width="1" stroke="transparent" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
    <path class="care-companion-heart" fill-opacity="0" stroke-width="3" stroke="transparent" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
</svg>
<span class="percentage-path <?php echo esc_attr( $progress_transition_style . ' ' . $progress_shape ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>">
    <?php if ( ! empty( $progress_text ) ) { ?>
        <span class="completed-text">
            <?php echo esc_html( $progress_text ); ?>
        </span>
    <?php } ?>
</span>
