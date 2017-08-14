<?php
/**
 * This class is used to register metabox, sanitized metabox value and
 * update metabox value.
 *
 * (c) Dunhakdis <dunhakdis@useissuestabinstead.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * PHP Version 5.4
 *
 * @category CareCompanion\Metabox
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @version  GIT:github.com/codehaiku/care-companion
 * @link     github.com/codehaiku/care-companion
 * @since    1.0
 */

namespace DSC\CareCompanion;

if (! defined('ABSPATH')) {
    return;
}
/**
 * This class is used to register metabox, sanitized metabox value and
 * update metabox value.
 *
 * @category CareCompanion\Metabox
 * @package  CareCompanion
 * @author   Dunhakdis Software Creatives <emailnotdisplayed@domain.tld>
 * @author   Jasper J. <emailnotdisplayed@domain.tld>
 * @license  http://opensource.org/licenses/gpl-license.php  GNU Public License
 * @link     github.com/codehaiku/care-companion
 */
final class Metabox
{

    /**
     * Reference metabox class constructor
     */
    public function __construct()
    {
        add_action('add_meta_boxes', array( $this, 'CareCompanionAddCustomBox'));
        add_action('save_post', array( $this, 'CareCompanionSavePostdata'));
	}

    /**
     * Add meta box
     *
     * @param post $post The post object
     * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
     */
    public function CareCompanionAddCustomBox()
    {
        $post_type = 'dsc-causes';

        add_meta_box(
            'care_companion_causes_description_field',
            esc_html__( 'Causes Description', 'care-companion' ),
            array( $this, 'CareCompanionCausesDescriptionField' ),
            $post_type,
            'advanced',
            'low'
        );
        add_meta_box(
            'care_companion_assigned_donation_form_field',
            esc_html__( 'Assign Donation Form', 'care-companion' ),
            array( $this, 'CareCompanionAssignedDonationFormField' ),
            $post_type,
            'side',
            'high'
        );
    }

    public function CareCompanionCausesDescriptionField( $post )
    {

        // Make sure the form request comes from WordPress
        wp_nonce_field( basename( __FILE__ ), 'care_companion_causes_description_nonce' );

        $value = get_post_meta($post->ID, '_care_companion_causes_description_meta_key', true);
        ?>
        <label class="screen-reader-text" for="care_companion_causes_description"><?php esc_html_e('Causes Description', 'care-companion'); ?></label>

        <textarea class="widefat" cols="50" rows="5" name="care_companion_causes_description" id="care_companion_causes_description"><?php echo esc_html( $value ); ?></textarea>

        <p class="howto"><?php esc_html_e('Add description for the cause.', 'care-companion'); ?></p>

        <?php

    }

    public function CareCompanionAssignedDonationFormField( $post )
    {
        $donation_forms = Helper::getDonationForms();

        // Make sure the form request comes from WordPress
        wp_nonce_field( basename( __FILE__ ), 'care_companion_assigned_donation_form_nonce' );

        $value = get_post_meta($post->ID, '_care_companion_assigned_donation_form_meta_key', true);
        ?>
        <label class="screen-reader-text" for="care_companion_causes_description"><?php esc_html_e('Assign a Donation Form', 'care-companion'); ?></label>

        <select name="care_companion_assigned_donation_form" id="care_companion_assigned_donation_form" class="postbox">

            <option value=""><?php esc_html_e('— None —', 'care-companion'); ?></option>

            <?php foreach ($donation_forms as $donation_form): ?>
                <option value="<?php esc_attr_e( $donation_form['id'] ); ?>" <?php selected( $value, $donation_form['id'] ); ?>><?php esc_html_e( $donation_form['post_title'] ); ?></option>
            <?php endforeach; ?>

        </select>

        <p class="howto"><?php esc_html_e('Assign a donation form for the causes.', 'care-companion'); ?></p>

        <?php

    }

    public function CareCompanionSavePostdata($post_id)
    {
        $sanitized_care_companion_causes_description_nonce = filter_input( INPUT_POST, 'care_companion_causes_description_nonce', FILTER_SANITIZE_STRING );
        $sanitized_care_companion_causes_description = filter_input( INPUT_POST, 'care_companion_causes_description', FILTER_SANITIZE_STRING );

        $sanitized_care_companion_assigned_donation_form_nonce = filter_input( INPUT_POST, 'care_companion_assigned_donation_form_nonce', FILTER_SANITIZE_STRING );
        $sanitized_care_companion_assigned_donation_form = filter_input( INPUT_POST, 'care_companion_assigned_donation_form', FILTER_SANITIZE_STRING );

        // verify taxonomies meta box nonce
        if ( !isset( $sanitized_care_companion_causes_description_nonce ) || !wp_verify_nonce( $sanitized_care_companion_causes_description_nonce, basename( __FILE__ ) ) ){
            return;
        }
        if ( array_key_exists( 'care_companion_causes_description', $_POST ) ) {
            update_post_meta( $post_id, '_care_companion_causes_description_meta_key', $sanitized_care_companion_causes_description );
        }

        if ( !isset( $sanitized_care_companion_assigned_donation_form_nonce ) || !wp_verify_nonce( $sanitized_care_companion_assigned_donation_form_nonce, basename( __FILE__ ) ) ){
            return;
        }
        if ( array_key_exists( 'care_companion_assigned_donation_form', $_POST ) ) {
            update_post_meta( $post_id, '_care_companion_assigned_donation_form_meta_key', $sanitized_care_companion_assigned_donation_form );
        }
    }
}
