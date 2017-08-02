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
            <div id="care-companion-progress-bar" class="care-companion-progress-bar">
                <!--
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
                        <path fill-opacity="0" stroke-width="1" stroke="#bbb" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
                        <path id="care-companion-heart-shape-loader" fill-opacity="0" stroke-width="3" stroke="#ED6A5A" d="M81.495,13.923c-11.368-5.261-26.234-0.311-31.489,11.032C44.74,13.612,29.879,8.657,18.511,13.923  C6.402,19.539,0.613,33.883,10.175,50.804c6.792,12.04,18.826,21.111,39.831,37.379c20.993-16.268,33.033-25.344,39.819-37.379  C99.387,33.883,93.598,19.539,81.495,13.923z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
                        <path id="care-companion-triangle-shape-loader" d="M 50,2 L 98,98 L 2,98 L 50,2" stroke="#eee" stroke-width="1" fill-opacity="0"></path><path d="M 50,2 L 98,98 L 2,98 L 50,2" stroke="#0FA0CE" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 310.663, 310.663; stroke-dashoffset: 0; stroke-linecap: round;"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewBox="0 0 100 100">
                        <path id="care-companion-square-shape-loader" d="M 1.5,2 L 98,2 L 98,98 L 2,98 L 2,2" stroke="#eee" stroke-width="1" fill-opacity="0"></path><path d="M 0,2 L 98,2 L 98,98 L 2,98 L 2,4" stroke="#ED6A5A" stroke-width="4" fill-opacity="0" style="stroke-dasharray: 384, 384; stroke-dashoffset: 0;"></path>
                    </svg>
                    -->
            </div>
        </div>
    </div>
