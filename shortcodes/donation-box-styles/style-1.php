    <div class="row main-container">

        <div class="col-md-6 donation-left-section">

            <?php if ( 'true' === $published_date ) { ?>
                <span class="published-date primary">
                    <?php care_companion_published_date( $form_id ); ?>
                </span>
            <?php } ?>

            <h1 class="donation-title">
                <?php echo esc_html( get_the_title( $form_id ) ); ?>
            </h1>

            <?php if ( 'true' === $donation_content ) { ?>
                <?php care_companion_give_the_content( $form_id ); ?>
            <?php } ?>

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
        <div class="col-md-6 donation-right-section">

            <div class="row">
                <div class="col-md-4 progressbar-section">
                    <?php require( dirname( __FILE__ ) . '/loader.php' ); ?>
                </div>
                <div class="col-md-8 donation-information-section">

                    <div class="donation-information">

                        <div class="donation-raised">

                            <span class="donation-caption primary"><?php echo esc_html( 'Raised', 'care-companion' ); ?></span>

                            <span class="donation-value"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>

                        </div>

                        <div class="donation-separator"></div>

                        <div class="donation-goal">

                            <span class="donation-caption primary"><?php echo esc_html( 'Goal', 'care-companion' ); ?></span>

                            <span class="donation-value"><?php echo care_companion_get_formated_donation_goal( $form_id ); ?></span>

                        </div>

                    </div>

                    <?php echo care_companion_donate_button( $form_id, $button_text, $button_class, $button_title, $button_color ); ?>

                </div>

            </div>
        </div>
    </div>
