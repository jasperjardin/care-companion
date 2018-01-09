<div class="row main-container">

    <div class="col-md-12 donation-left-section">

        <div class="background-overlay" style="background-color:<?php echo esc_attr( $container_primary_fill ); ?>"></div>

        <?php if ( ! empty( $background_image ) ) { ?>
            <div class="donation-featured-image" style="background-image: url('<?php echo esc_attr( $background_image ); ?>');"></div>
        <?php } else { ?>
            <div class="donation-featured-image" style="background-color: <?php echo esc_attr( $container_fill ); ?>;">
                <i class="donation-icon fa fa-heart" style="color: <?php echo esc_attr( $progress_color ); ?>;"></i>
            </div>
        <?php }?>

        <div class="col-md-12 information-wrapper">

            <div class="progressbar-section">
                <?php require( dirname( __FILE__ ) . '/loader.php' ); ?>
            </div>

            <h1 class="donation-title">
                <a class="dark" href="<?php echo esc_url( get_permalink( $form_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $form_id ) ); ?>">
                    <?php echo esc_html( get_the_title( $form_id ) ); ?>
                </a>
            </h1>
            <div class="donation-information">

                <div class="donation-raised">

                    <span class="donation-caption dark"><?php echo esc_html( 'Raised:', 'care-companion' ); ?></span>

                    <span class="donation-value dark"><?php echo care_companion_get_formated_donation_income( $form_id ); ?></span>

                </div>

                <div class="donation-goal">

                    <span class="donation-slash"><?php echo esc_html( '/', 'care-companion' ); ?></span>

                    <span class="donation-value dark"><?php echo care_companion_get_formated_donation_goal( $form_id ); ?></span>

                </div>

            </div>

            <div class="donation-content">
                <?php if ( 'true' === $donation_content ) { ?>
                    <?php care_companion_give_the_content( $form_id ); ?>
                <?php } ?>
            </div>

            <?php echo care_companion_donate_button( $form_id, $button_text, $button_class, $button_title, $button_color ); ?>

        </div>

    </div>
</div>
