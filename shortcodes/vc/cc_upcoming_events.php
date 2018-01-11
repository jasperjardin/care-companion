<?php
/**
 * Care Companion Upcoming Events
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Upcoming Events"),
		"base" => "cc_upcoming_events",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/activity-stream.png' ),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
            // number_of_posts
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Number of Posts", "care_companion" ),
                "param_name" => "number_of_posts",
                "value" => __( '5' ),
                "description" => __( "Set the number of posts to display.", "care_companion" ),
            ),
            // read_more
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Enable Read More", "care_companion" ),
                "param_name" => "read_more",
                "value" => array(
                    __( 'Enable', 'care_companion' ) => 'enable',
                    __( 'Disable', 'care_companion' ) => 'disable'
                ),
                "description" => __( "Enable or Disable the appearance of the Read More link.", "care_companion" )
            )
		)
	)
);
?>
