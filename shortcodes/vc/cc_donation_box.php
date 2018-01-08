<?php
/**
 * Care Companion Donation Box
 *
 * @since 1.0
 */
vc_map(
	array(
		"name" => __("Care Companion Donation Box"),
		"base" => "cc_donation_box",
		"class" => "",
		"admin_label" => true,
		"category" => __('Care Companion'),
		"icon" => plugins_url('../assets/css/images/activity-stream.png', __FILE__),
		'admin_enqueue_js' => array(),
		'admin_enqueue_css' => array(),
		"params" => array(
				array(
					"type" => "textfield",
					"holder" => "",
					"class" => "",
					"admin_label" => true,
					"heading" => __("Title", "gears"),
					"param_name" => "title",
					"value" => __('Members Activity Stream'),
					"description" => __("Leave blank to disable widget title.", "gears")
				)
			)
	)
);
?>
