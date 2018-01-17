<?php
/**
 * Care Companion Recent Campaigns
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Recent Campaigns"),
		"base" => "cc_recent_campaigns",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/recent-campaigns.png' ),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
            // layout_style
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Layout Style", "care_companion" ),
                "param_name" => "layout_style",
                "value" => array(
                    __( 'Style 1', 'care_companion' ) => 'style-1',
                    __( 'Style 2', 'care_companion' ) => 'style-2'
                ),
                "description" => __( "Select the style for the recent campaigns.", "care_companion" )
            ),
            // donation_content
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Dispay Content", "care_companion" ),
                "param_name" => "donation_content",
                "value" => array(
                    __( 'Enable', 'care_companion' ) => 'true',
                    __( 'Disable', 'care_companion' ) => 'false',
                ),
                "description" => __( "Enable or Disable the appearance of the content section of the donation form on the recent campaigns.", "care_companion" ),
            ),
            // button_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Color", "care_companion" ),
                "param_name" => "button_color",
                "value" => __( '#eb543a' ),
                "description" => __( "Select the button color for the donate button", "care_companion" ),
            ),
            // button_text
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Label", "care_companion" ),
                "param_name" => "button_text",
                "value" => __( 'Donate Now', 'care_companion' ),
                "description" => __( "Customize the label for the donate button.", "care_companion" )
            ),
            // button_title
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Title on Hover", "care_companion" ),
                "param_name" => "button_title",
                "value" => __( 'Donate Now', 'care_companion' ),
                "description" => __( "Customize the title for the donate button when hover.", "care_companion" )
            ),
            // button_class
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Class", "care_companion" ),
                "param_name" => "button_class",
                "value" => __( '' ),
                "description" => __( "Add a CSS classname to the donate button.", "care_companion" )
            ),
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
                "description" => __( "Enable or Disable the appearance of the published date on the recent campaigns.", "care_companion" ),
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
                "description" => __( "Select the background color for the recent campaigns.", "care_companion" ),
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
                "description" => __( "Select the background color for overlay section of the recent campaigns.", "care_companion" ),
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
            // progress_trail_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Trail Color", "care_companion" ),
                "param_name" => "progress_trail_color",
                "value" => __( '#f8b765' ),
                "description" => __( "Select the color for the donation progress trail of the progress bar.", "care_companion" ),
            ),
            // progress_stroke_width
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Stroke Width", "care_companion" ),
                "param_name" => "progress_stroke_width",
                "value" => __( '5' ),
                "description" => __( "Set the stroke width for the progress bar. Do Not add any unit in the end of your value because the unit is automaticaly set to 'px'.", "care_companion" ),
            ),
            // progress_trail_width
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Trail Width", "care_companion" ),
                "param_name" => "progress_trail_width",
                "value" => __( '5' ),
                "description" => __( "Set the trail width for the progress bar. Do Not add any unit in the end of your value because the unit is automaticaly set to 'px'.", "care_companion" ),
            ),
		)
	)
);
?>
