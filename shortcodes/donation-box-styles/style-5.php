    <div class="row main-container">

        <div class="col-md-12 donation-left-section">

            <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_primary_fill ); ?>"></div>

            <div class="progressbar-section" style="background-color: <?php echo esc_attr( $container_primary_fill ); ?>;">
                <?php require( dirname( __FILE__ ) . '/loader.php' ); ?>
            </div>

            <?php if ( ! empty( $background_image ) ) { ?>
                <div class="donation-featured-image" style="background-image: url('<?php echo esc_attr( $background_image ); ?>');"></div>
            <?php } else { ?>
                <div class="donation-featured-image" style="background-color: <?php echo esc_attr( $container_fill ); ?>;">
                    <i class="donation-icon fa fa-heart" style="color: <?php echo esc_attr( $progress_color ); ?>;"></i>
                </div>
            <?php }?>

            <div class="col-md-12 information-wrapper">
                <div class="information-inner-wrap">
                    <div class="col-md-5 information-inner-wrap-left">
                        <h1 class="donation-title">
                            <a class="dark" href="<?php echo esc_url( get_permalink( $form_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $form_id ) ); ?>">
                                <?php echo esc_html( get_the_title( $form_id ) ); ?>
                            </a>
                        </h1>
                    </div>
                    <div class="col-md-7 information-inner-wrap-right">
                        <div class="donation-information">

                            <div class="donation-raised">

                                <span class="donation-caption dark"><?php echo esc_html( 'Raised:', 'care-companion' ); ?></span>

                                <span class="donation-value secondary"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>

                            </div>

                            <div class="donation-separator"></div>

                            <div class="donation-goal">

                                <span class="donation-caption dark"><?php echo esc_html( 'Goal:', 'care-companion' ); ?></span>

                                <span class="donation-value secondary"><?php echo care_companion_get_formated_donation_goal( $form_id ); ?></span>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="content-wrapper col-md-12 dark">
                    <?php if ( 'true' === $content ) { ?>
                        <?php care_companion_give_the_content( $form_id ); ?>
                    <?php } ?>
                </div>
                <div class="footer-wrapper col-md-12 dark">

                    <div class="donate-section col-md-5">
                        <?php echo care_companion_donate_button( $form_id, $button_text, $button_class, $button_title, $button_color ); ?>
                    </div>

                    <div class="action-section col-md-7">
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
            </div>

        </div>
    </div>
