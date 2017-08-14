<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Underscores.me
 * @since Underscores.me 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div id="printable-content" class="care-companion-causes-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <header class="entry-header has-post-thumbnail">

                                    <?php if ( '' != get_the_post_thumbnail() ) : ?>

                                        <div class="entry-thumbnail">
                                            <?php the_post_thumbnail(); ?>
                                        </div>

                                    <?php endif; ?>

                                    <div class="information-section">

                                        <div class="row">

                                            <div class="left-section-wrapper col-md-9">
                                                <div class="action-section">
                                                    <span class="donation-action">
                                                        <i class="fa fa-heart primary care-companion-icon"></i>
                                                        <?php
                                                            $donation_count = care_companion_get_donations_count( care_companion_get_assigned_donation_form_id() );
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

                                                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

                                                <div class="donation-raised">

                                                    <span class="donation-caption"><?php echo esc_html( 'Raised:', 'care-companion' ); ?></span>

                                                    <span class="donation-value"><?php echo care_companion_get_formated_donation_income(); ?></span>
                                                    <span class="donation-value-separator"><?php echo esc_html( '/', 'care-companion' ); ?></span>
                                                    <span class="donation-value"><?php echo care_companion_get_formated_donation_goal(); ?></span>

                                                </div>

                                                <?php care_companion_donate_button( '', __( 'Donate Now', 'care-companion') ); ?>

                                            </div>

                                            <div class="right-section-wrapper col-md-3">
                                                <?php care_companion_single_progress_bar(); ?>
                                            </div>

                                        </div>

                                    </div>

                            	</header>

                                <header class="entry-header screen-reader-text">
                                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                                </header>

                                <div class="entry-description">
                                    <h1 class="entry-description-title"><?php echo esc_html( 'Causes Description:', 'care-companion' ); ?></h1>
                                    <?php esc_html( care_companion_causes_description() ); ?>
                                </div>

                                <div class="entry-content">
                                    <h1 class="entry-content-title"><?php echo esc_html( 'Causes Content:', 'care-companion' ); ?></h1>
                                    <?php the_content(); ?>
                                    <div class="clear-fix"></div>
                            	</div>

                            </article><!-- #post-## -->

                        </main>
                    </div>
                </div>
                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php
endwhile;
get_footer(); ?>
