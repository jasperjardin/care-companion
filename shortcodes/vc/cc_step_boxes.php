<?php
/**
 * Care Companion Step Boxes
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Step Boxes"),
		"base" => "cc_step_boxes",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/activity-stream.png' ),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
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
                "description" => __( "Set the column layout to display the step box.", "care_companion" )
            ),
            // step_number
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Step Number", "care_companion" ),
                "param_name" => "step_number",
                "value" => '',
                "description" => __( "Set the step number for the step box.", "care_companion" ),
            ),
            // title
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Title", "care_companion" ),
                "param_name" => "title",
                "value" => '',
                "description" => __( "Set the title for the step box.", "care_companion" ),
            ),
            // description
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Description", "care_companion" ),
                "param_name" => "description",
                "value" => '',
                "description" => __( "Add describe to the step box.", "care_companion" ),
            ),
            // text_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Text Color", "care_companion" ),
                "param_name" => "text_color",
                "value" => __( '' ),
                "description" => __( "Select the text color for the step box.", "care_companion" ),
            ),
            // background_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Background Color", "care_companion" ),
                "param_name" => "background_color",
                "value" => __( '' ),
                "description" => __( "Select the background color for the step box.", "care_companion" ),
            ),
            // no_margin
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "No Margin", "care_companion" ),
                "param_name" => "no_margin",
                "value" => array(
                    __( 'Enable', 'care_companion' ) => 'true',
                    __( 'Disable', 'care_companion' ) => 'false',
                ),
                "description" => __( "Enable or Disable the margin for the step box.", "care_companion" ),
            ),
            // icon
            array(
                "type" => "iconpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Step Box Icon", "care_companion" ),
                "param_name" => "icon",
                "value" => 'fa fa-user',
                "description" => __( "Select the icon for the step box.", "care_companion" ),
            ),
            // image_url
            array(
                "type" => "attach_image",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Icon Image URL", "care_companion" ),
                "param_name" => "image_url",
                "value" => __( '' ),
                "description" => __( "Add custom icon image to the step box. Use this if you want to use custom image for an icon.", "care_companion" ),
            ),
            // background_image_url
            array(
                "type" => "attach_image",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Background Image URL", "care_companion" ),
                "param_name" => "background_image_url",
                "value" => __( '' ),
                "description" => __( "Add background image to the step box.", "care_companion" ),
            ),
            // link
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Link URL", "care_companion" ),
                "param_name" => "link",
                "value" => '',
                "description" => __( "Type the URL for the step box link.", "care_companion" ),
            ),
            // link_text
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Link Label", "care_companion" ),
                "param_name" => "link_text",
                "value" => __( 'Learn More', 'care-companion' ),
                "description" => __( "Type the label for the step box link.", "care_companion" ),
            ),
            // link_text_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Link Text Color", "care_companion" ),
                "param_name" => "link_text_color",
                "value" => '#ffffff',
                "description" => __( "Select the text color for the step box link.", "care_companion" ),
            ),
            // link_text_icon
            array(
                "type" => "iconpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Link Icon", "care_companion" ),
                "param_name" => "link_text_icon",
                "value" => 'fa fa-angle-double-right',
                "description" => __( "Select the icon for the step box link.", "care_companion" ),
            ),
            // button_mode
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Mode", "care_companion" ),
                "param_name" => "button_mode",
                "value" => array(
                    __( 'Disable', 'care_companion' ) => 'false',
                    __( 'Enable', 'care_companion' ) => 'true',
                ),
                "description" => __( "Enable or Disable button mode to make the link become a button.", "care_companion" ),
            ),
            // button_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Button Color", "care_companion" ),
                "param_name" => "button_color",
                "value" => '#f8b864',
                "description" => __( "Select the button color for the step box link.", "care_companion" ),
            ),
		)
	)
);
?>
