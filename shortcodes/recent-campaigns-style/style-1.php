<div class="row main-container">

    <div class="col-md-12 donation-left-section">

        <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_primary_fill ); ?>"></div>

        <div class="progressbar-section" style="background-color: <?php echo esc_attr( $container_primary_fill ); ?>;">
            <div class="donation-raised">

                <span class="donation-value light"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>
                <span class="donation-caption light"><?php echo esc_html( 'Pledge', 'care-companion' ); ?></span>


            </div>

            <div class="care-companion-progress-bar care-companion-percent-line-bar" role="progressbar">
                <span class="percentage-circle <?php echo esc_attr( $progress_transition_style ); ?>" aria-valuenow="0<?php echo esc_attr( $progress_symbol ); ?>">
                </span>
            </div>

        </div>

        <?php if ( ! empty( $background_image ) ) { ?>
            <div class="donation-featured-image" style="background-image: url('<?php echo esc_attr( $background_image ); ?>');"></div>
        <?php } else { ?>
            <div class="donation-featured-image" style="background-color: <?php echo esc_attr( $container_fill ); ?>;">
                <i class="donation-icon fa fa-heart" style="color: <?php echo esc_attr( $progress_color ); ?>;"></i>
            </div>
        <?php }?>

        <div class="col-md-12 information-wrapper">
            <h1 class="donation-title">
                <a class="dark" href="<?php echo esc_url( get_permalink( $form_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $form_id ) ); ?>">
                    <?php echo esc_html( get_the_title( $form_id ) ); ?>
                </a>
            </h1>

            <div class="action-section">
                <span class="donation-action">
                    <i class="fa fa-heart primary care-companion-icon"></i>
                    <?php
                        $donation_count = care_companion_get_donations_count( $form_id );
                        echo sprintf( _n( '%d Donation', '%d Donations', $donation_count, 'care-companion' ), $donation_count );
                    ?>
                </span>

                <span class="donation-gap">
                    <?php echo esc_html( '|', 'care-companion' ); ?>
                </span>

                <span class="donation-action">
                    <?php care_companion_social_link(); ?>
                </span>

            </div>
        </div>
        <?php if ( 'true' === $donation_content ) { ?>
            <?php care_companion_give_the_content( $form_id ); ?>
        <?php } ?>

    </div>
</div>
