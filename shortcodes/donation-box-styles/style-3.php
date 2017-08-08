    <div class="row main-container">

        <div class="col-md-12 donation-left-section">

            <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_fill ); ?>"></div>

            <?php if ( 'true' === $published_date ) { ?>
                <span class="published-date primary">
                    <?php care_companion_published_date( $form_id ); ?>
                </span>
            <?php } ?>

            <h1 class="donation-title">
                <?php echo get_the_title( $form_id ); ?>
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
                    <i class="fa fa-share-alt primary care-companion-icon"></i>
                    <?php echo esc_html( 'Share', 'care-companion' ); ?>
                </span>
            </div>

            <?php care_companion_give_the_content( $form_id );  ?>

            <?php echo care_companion_donate_button( $form_id, 'Join Now', 'background-secondary' ); ?>

        </div>
        <div class="col-md-12 donation-right-section">

            <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_primary_fill ); ?>"></div>

            <div class="row">
                <div class="col-md-12 progressbar-section">

                    <?php if ( 'LinePercent' !== $progress_shape ) { ?>
                        <div id="care-companion-progress-bar" class="care-companion-progress-bar"></div>
                    <?php } else { ?>
                        <div class="care-companion-percent-line-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="8">
                            <span style="width: 8%;background-color:#2bc253" aria-valuenow="8%"></span>
                        </div>
                    <?php } ?>

                </div>
                <div class="col-md-12 donation-information-section">

                    <div class="donation-information">

                        <div class="donation-raised">

                            <span class="donation-caption"><?php echo esc_html( 'Raised:', 'care-companion' ); ?></span>

                            <span class="donation-value"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>

                        </div>

                        <div class="donation-goal">

                            <span class="donation-caption"><?php echo esc_html( 'Goal:', 'care-companion' ); ?></span>

                            <span class="donation-value"><?php echo care_companion_get_formated_donation_goal( $form_id ); ?></span>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
