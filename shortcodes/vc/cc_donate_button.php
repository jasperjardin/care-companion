<?php
/**
 * Care Companion Donate Button
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Donate Button"),
		"base" => "cc_donate_button",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/activity-stream.png' ),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
            // form_id
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Form ID", "care_companion" ),
                "param_name" => "form_id",
                "value" => __( '' ),
                "description" => __( "Type the Form ID of the donation form to link the donate button.", "care_companion" )
            ),
            // text
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
            // title
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
            // background_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Color", "care_companion" ),
                "param_name" => "background_color",
                "value" => __( '#eb543a' ),
                "description" => __( "Select the color for the donate button.", "care_companion" ),
            ),
            // class_name
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Class", "care_companion" ),
                "param_name" => "class_name",
                "value" => __( '' ),
                "description" => __( "Add a CSS classname to the donate button.", "care_companion" )
            ),
		)
	)
);
?>
