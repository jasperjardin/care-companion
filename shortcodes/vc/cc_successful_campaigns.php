<?php
/**
 * Care Companion Successful Campaigns
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Successful Campaigns"),
		"base" => "cc_successful_campaigns",
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
                "value" => __( '10' ),
                "description" => __( "Set the number of posts to display.", "care_companion" ),
            ),
            // columns
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Column Layout", "care_companion" ),
                "param_name" => "columns",
                "value" => array(
                    __( '1 Column Layout', 'care_companion' ) => '1',
                    __( '2 Columns Layout', 'care_companion' ) => '2',
                    __( '3 Columns Layout', 'care_companion' ) => '3',
                    __( '4 Columns Layout', 'care_companion' ) => '4'
                ),
                "description" => __( "Set the column layout to display the post.", "care_companion" )
            ),
            // published_date
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Dispay Published Date", "care_companion" ),
                "param_name" => "published_date",
                "value" => array(
                    __( 'Enable', 'care_companion' ) => 'true',
                    __( 'Disable', 'care_companion' ) => 'false',
                ),
                "description" => __( "Enable or Disable the appearance of the published date on the successful campaigns.", "care_companion" ),
            ),
            // progress_symbol
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Bar Progress Symbol ", "care_companion" ),
                "param_name" => "progress_symbol",
                "value" => __( '%' ),
                "description" => __( "Customize the symbol for the progress bar.", "care_companion" )
            ),
            // container_fill
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Container Background Color", "care_companion" ),
                "param_name" => "container_fill",
                "value" => __( 'rgba(0, 0, 0, 0.75)' ),
                "description" => __( "Select the background color for the successful campaigns.", "care_companion" ),
            ),
            // container_primary_fill
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Background Overlay", "care_companion" ),
                "param_name" => "container_primary_fill",
                "value" => __( '#f8b864' ),
                "description" => __( "Select the background color for overlay section for the successful campaigns.", "care_companion" ),
            ),
            // progress_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Bar Color", "care_companion" ),
                "param_name" => "progress_color",
                "value" => __( '#eb543a' ),
                "description" => __( "Select the color for the donation progress of the progress bar.", "care_companion" ),
            ),
            // progress_transition_style
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Transition Style", "care_companion" ),
                "param_name" => "progress_transition_style",
                "value" => array(
                    __( 'Linear', 'care_companion' ) => 'linear',
                    __( 'EaseIn', 'care_companion' ) => 'easeIn',
                    __( 'EaseOut', 'care_companion' ) => 'easeOut',
                    __( 'EaseInOut', 'care_companion' ) => 'easeInOut',
                ),
                "description" => __( "Select the transition style for the progress bar.", "care_companion" )
            ),
            // progress_transition_duration
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Transition Duration", "care_companion" ),
                "param_name" => "progress_transition_duration",
                "value" => __( '5000' ),
                "description" => __( "Set the transition duration for the progress bar.", "care_companion" ),
            ),
		)
	)
);
?>
