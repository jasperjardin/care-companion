<?php
/**
 * Care Companion Donation Box
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Donation Box"),
		"base" => "cc_donation_box",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/donation-box.png' ),
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
				"description" => __( "Type the Form ID of your donation form to display the donation box.", "care_companion" )
			),
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
                    __( 'Style 2', 'care_companion' ) => 'style-2',
                    __( 'Style 3', 'care_companion' ) => 'style-3',
                    __( 'Style 4', 'care_companion' ) => 'style-4',
                    __( 'Style 5', 'care_companion' ) => 'style-5',
                ),
                "description" => __( "Select the style for the donation box.", "care_companion" )
            ),
            // width
            array(
				"type" => "textfield",
				"holder" => "",
				"class" => "",
				"admin_label" => true,
				"heading" => __( "Width", "care_companion" ),
				"param_name" => "width",
				"value" => __( '250px' ),
				"description" => __( "Set the width for the donation box, do not forget to add 'px', 'em' or '%' in the end of your value for the unit of the width. Available only for layout style 'style 3,' 'style 4,' and 'style 5.' ", "care_companion" ),
                "dependency" => array(
                    "element" => 'layout_style',
                    "value" => array(
                        'style-3',
                        'style-4',
                        'style-5'
                    )
                )
			),
            // spacing
            array(
				"type" => "textfield",
				"holder" => "",
				"class" => "",
				"admin_label" => true,
				"heading" => __( "Spacing", "care_companion" ),
				"param_name" => "spacing",
				"value" => __( '0' ),
				"description" => __( "Set the right margin for the donation box, do not forget to add 'px', 'em' or '%' in the end of your value for the unit of the margin. Available only for layout style 'style 3,' 'style 4,' and 'style 5.' ", "care_companion" ),
                "dependency" => array(
                    "element" => 'layout_style',
                    "value" => array(
                        'style-3',
                        'style-4',
                        'style-5'
                    )
                )
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
                "description" => __( "Select the background color for the donation box", "care_companion" ),
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
                "description" => __( "Select the background color for overlay section of the donation box", "care_companion" ),
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
                "description" => __( "Enable or Disable the appearance of the published date on the donation box.", "care_companion" ),
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
                "description" => __( "Enable or Disable the appearance of the content of the donation form on the donation box.", "care_companion" ),
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
                "description" => __( "Select the button color donation box", "care_companion" ),
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
            // progress_text
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Text ", "care_companion" ),
                "param_name" => "progress_text",
                "value" => __( 'Completed', 'care_companion' ),
                "description" => __( "Customize the text for the progress bar.", "care_companion" )
            ),
            // progress_text_size
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Text Size", "care_companion" ),
                "param_name" => "progress_text_size",
                "value" => __( '45px' ),
                "description" => __( "Set the text size for the progress text, do not forget to add 'px', 'em' or '%' in the end of your value for the unit of the text size.", "care_companion" ),
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
            // progress_fill
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Bar Background Fill", "care_companion" ),
                "param_name" => "progress_fill",
                "value" => __( 'rgba(0, 0, 0, 0.5)' ),
                "description" => __( "Select the color for the donation progress background of the progress bar.", "care_companion" ),
            ),
            // progress_trail_color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Trail Color", "care_companion" ),
                "param_name" => "progress_trail_color",
                "value" => __( '#ffffff' ),
                "description" => __( "Select the color for the donation progress trail of the progress bar.", "care_companion" ),
            ),
            // progress_shape
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Progress Shape", "care_companion" ),
                "param_name" => "progress_shape",
                "value" => array(
                    __( 'Line', 'care_companion' ) => 'Line',
                    __( 'Circle', 'care_companion' ) => 'Circle',
                    __( 'SemiCircle', 'care_companion' ) => 'SemiCircle',
                    __( 'Square', 'care_companion' ) => 'Square',
                    __( 'Triangle', 'care_companion' ) => 'Triangle',
                    __( 'Heart', 'care_companion' ) => 'Heart',
                    __( 'LinePercent', 'care_companion' ) => 'LinePercent',
                ),
                "description" => __( "Select the shape for the progress bar.", "care_companion" )
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
