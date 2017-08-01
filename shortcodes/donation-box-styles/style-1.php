<div class="care-companion donation-box <?php echo esc_attr( $style ); ?>">

    <div class="row">

        <div class="col-md-6">
            <h1 class="donation-title">
                <?php echo get_the_title( $form_id ); ?>
            </h1>

            <?php care_companion_give_the_content( $form_id );  ?>
            <div class="action-section">
                <span class="donation-action">
                    <i class="fa fa-heart primary care-companion-icon"></i>
                    <?php
                        $donation_count = care_companion_get_donations_count( $form_id );
                        echo sprintf( _n( '%d Donation', '%d Donations', $donation_count, 'care-companion' ), $donation_count );
                    ?>
                </span>

                <span class="donation-separator">
                    <?php echo esc_html( '|', 'care-companion' ); ?>
                </span>

                <span class="donation-action">
                    <i class="fa fa-share-alt primary care-companion-icon"></i>
                    <?php echo esc_html( 'Share', 'care-companion' ); ?>
                </span>
            </div>
        </div>
        <div class="col-md-6">

        </div>
    </div>

</div>
