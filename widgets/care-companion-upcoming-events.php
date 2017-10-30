<?php

/**
 * Adds Care_Featured_Member_Widget widget.
 */
class CareCompanionUpcomingEventsWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'care_companion_upcoming_events_widget', // Base ID
			__( 'Care Companion: Upcoming Events', 'care-companion' ), // Name
			array(
                'description' => __( 'Use this widget to display upcoming events.', 'care-companion' )
            ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];

		}

        $event_args = array(
        	'numberposts' => '5',
        	'orderby' => 'post_date',
        	'order' => 'ASC',
        	'post_type' => 'tribe_events',
        	'post_status' => 'publish',
        	'suppress_filters' => true
        );
        $upcoming_events = wp_get_recent_posts( $event_args ); ?>


        <ul class="care-companion-upcoming-events">
            <?php if ( ! empty ( $upcoming_events ) ) : ?>
                <?php foreach( $upcoming_events as $event ) { ?>
                    <li class="care-companion-upcoming-event">

                        <div class="col-md-4">
                            <?php if ( has_post_thumbnail( $event['ID'] ) ) { ?>
                                <?php echo get_the_post_thumbnail( $event['ID'], 'full', array( 'class' => 'cc-event-thumbnail' ) ); ?>
                            <?php } else { ?>
                                <div class="event-has-no-thumbnail"></div>
                            <?php } ?>
                        </div>

                        <div class="col-md-8">
                            <h4 class="cc-event-title">
                                <a href="<?php echo esc_url( get_the_permalink( $event['ID'] ) ); ?>" title="<?php echo esc_attr( $event['post_title'] ); ?>">
                                    <?php echo esc_html( $event['post_title'] ); ?>
                                </a>
                            </h4>
                        </div>

                    </li>
                <?php } ?>

                    <?php wp_reset_query(); ?>

            <?php else : ?>

                <li class="alert alert-info">
                    <p>
                        <?php esc_html_e(
                            'There are no items found in your donation form found.',
                            'care-companion'
                        ); ?>
                    </p>
                </li>
                <div class="clearfix"></div>

            <?php endif; ?>
        </ul>

        <?php var_dump( $upcoming_events ); ?>

		<?php
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Upcoming Events', 'care-companion' );
		$username = ! empty( $instance['username'] ) ? $instance['username'] : '';
		?>
		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'care' ); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

			<span class="help-text">
				<em><?php _e('You can use this field to enter the widget title.', 'care' ); ?></em>
			</span>
		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'username' ); ?>"><?php _e( 'Username:', 'care' ); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'username' ); ?>" name="<?php echo $this->get_field_name( 'username' ); ?>" type="text" value="<?php echo esc_attr( $username  ); ?>">

			<span class="help-text">
				<em><?php _e('Enter the username of the member that you want to be featured.', 'care' ); ?></em>
			</span>

		</p>
		<?php
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = array();

		$instance['title']    = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['username'] = ( ! empty( $new_instance['username'] ) ) ? strip_tags( $new_instance['username'] ) : '';

		return $instance;
	}


	public function get_user( $user_login = "" ) {

		global $wpdb;

		$user = '';

		$id = bp_core_get_userid( $user_login );

		if ( $id ) {

			$user = bp_core_get_core_userdata( $id );

			if ( $user ) {
				return $user;
			} else {
				return false;
			}
		}


		return false;
	}

} // class CareCompanionEventsListWidget
