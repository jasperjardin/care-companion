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
        $number_of_posts = $instance['number_of_posts'];

		if ( ! empty( $instance['title'] ) ) {

			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];

		}

        if ( empty( $number_of_posts ) || 0 === $number_of_posts ) {
            $number_of_posts = '5';
        }

        $event_args = array(
        	'numberposts' => $number_of_posts,
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

                        <div class="row care-companion-upcoming-event-inner-wrap">

                            <div class="col-md-4">
                                <?php if ( has_post_thumbnail( $event['ID'] ) ) { ?>
                                    <?php echo get_the_post_thumbnail( $event['ID'], 'full', array( 'class' => 'cc-event-thumbnail' ) ); ?>
                                <?php } else { ?>
                                    <div class="event-has-no-thumbnail"></div>
                                <?php } ?>
                            </div>

                            <div class="col-md-8">
                                <div class="cc-event-date">
                                    <span class='date'>
                                        <?php echo get_the_date( 'd', $event['ID'] ); ?>
                                    </span>
                                    <span class='month'>
                                        <?php echo get_the_date( 'M', $event['ID'] ); ?>
                                    </span>
                                </div>
                                <h4 class="cc-event-title">
                                    <a href="<?php echo esc_url( get_the_permalink( $event['ID'] ) ); ?>" title="<?php echo esc_attr( $event['post_title'] ); ?>">
                                        <?php echo esc_html( $event['post_title'] ); ?>
                                    </a>
                                </h4>
                                <?php care_companion_the_event_period( $event['ID'] ); ?>
                                <div class="cc-event-content">
                                    <?php echo care_companion_the_event_content( $event['ID'] ); ?>
                                </div>

                            </div>
                            
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
        <div class="clearfix"></div>

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
		$number_of_posts = ! empty( $instance['number_of_posts'] ) ? $instance['number_of_posts'] : '';
		?>
		<p>

			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'care-companion' ); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">

			<span class="help-text">
				<em><?php _e('You can use this field to enter the widget title.', 'care-companion' ); ?></em>
			</span>
		</p>

		<p>

			<label for="<?php echo $this->get_field_id( 'number_of_posts' ); ?>"><?php _e( 'Number of Post:', 'care-companion' ); ?></label>

			<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'number_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $number_of_posts  ); ?>">

			<span class="help-text">
				<em><?php _e('Enter the username of the member that you want to be featured.', 'care-companion' ); ?></em>
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
		$instance['number_of_posts'] = ( ! empty( $new_instance['number_of_posts'] ) ) ? strip_tags( $new_instance['number_of_posts'] ) : '';

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
