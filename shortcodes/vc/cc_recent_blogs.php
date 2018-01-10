<?php
/**
 * Care Companion Recent Blogs
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Recent Blogs"),
		"base" => "cc_recent_blogs",
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
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Column Layout", "care_companion" ),
                "param_name" => "columns",
                "value" => __( '3' ),
                "description" => __( "Set the column layout to display the post.", "care_companion" ),
            ),
            // overlay_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Background Overlay", "care_companion" ),
                "param_name" => "overlay_color",
                "value" => __( '#000' ),
                "description" => __( "Select the background color for overlay section of the recent blogs.", "care_companion" ),
            ),
		)
	)
);
?>
