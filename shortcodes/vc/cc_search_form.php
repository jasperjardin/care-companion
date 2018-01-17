<?php
/**
 * Care Companion Search Form
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __( "Care Companion Search Form"),
		"base" => "cc_search_form",
		"class" => "",
		"admin_label" => true,
		"category" => __( 'Care Companion' ),
		"icon" => plugins_url( 'care-companion/assets/css/images/search-form.png' ),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
            // title
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Title", "care_companion" ),
                "param_name" => "title",
                "value" => __( 'Search for Causes', 'care-companion' ),
                "description" => __( "Set the title for the search form.", "care_companion" ),
            ),
            // size
            array(
                "type" => "dropdown",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Search Form Size", "care_companion" ),
                "param_name" => "size",
                "value" => array(
                    __( 'Full Size', 'care_companion' ) => '1',
                    __( 'Half Size', 'care_companion' ) => '2'
                ),
                "description" => __( "Set the size for the search form.", "care_companion" )
            ),
            // sub_title
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Sub-title", "care_companion" ),
                "param_name" => "sub_title",
                "value" => __( 'Search for Causes', 'care-companion' ),
                "description" => __( "Set the sub-title for the search form.", "care_companion" ),
            ),
            // color
            array(
                "type" => "colorpicker",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Text Color", "care_companion" ),
                "param_name" => "color",
                "value" => __( '' ),
                "description" => __( "Select the text color for the search form.", "care_companion" ),
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
                "description" => __( "Select the background color for the search form.", "care_companion" ),
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
                "description" => __( "Add background image to the search form.", "care_companion" ),
            ),
            // search_text
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Search Placeholder", "care_companion" ),
                "param_name" => "search_text",
                "value" => __( 'Search for Causes', 'care-companion' ),
                "description" => __( "Set the placeholder for the search form.", "care_companion" ),
            ),
            // search_button_text
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "admin_label" => true,
                "heading" => __( "Search Button Label", "care_companion" ),
                "param_name" => "search_button_text",
                "value" => __( 'Search Here', 'care-companion' ),
                "description" => __( "Set the label for the search button.", "care_companion" ),
            )
		)
	)
);
?>
