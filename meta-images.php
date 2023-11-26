<?php

// Include the CMB2 library
require_once get_template_directory() . '/CMB2-2.10.1/init.php';


// Function to add the custom metabox
function cmb2_add_custom_metabox() {
    $prefix = '_cmb2_dp';

    // Define the metabox configuration
    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'drastic_photo_metabox',
        'title'        => esc_html__( 'Drastyczność zdjęcia', 'cmb2' ),
        'object_types' => array( 'attachment' ), // Show this metabox for attachments (media items)
        'context'      => 'normal', // normal - show the metabox below image, side - show the metabox in the sidebar
        'priority'     => 'high', // Display it above other metaboxes in the sidebar
    ) );

    // Add a field to the metabox for marking drastic photo
    $cmb->add_field( array(
        'name'    => esc_html__( 'Czy to zdjęcie jest drastyczne?', 'cmb2' ),
        'desc'    => esc_html__( 'Zaznacz jeśli jest to zdjęcie drastyczne.', 'cmb2' ),
        'id'      => $prefix . 'is_drastic_photo',
        'type'    => 'checkbox',
    ) );
}
add_action( 'cmb2_admin_init', 'cmb2_add_custom_metabox' );


// Function to save the custom metabox data
function cmb2_save_custom_metabox_data( $post_id ) {
    $prefix = '_cmb2_dp';

    // Check if the current user can edit the post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save the checkbox value as photo metadata
    if ( isset( $_POST[ $prefix . 'is_drastic_photo' ] ) ) {
        update_post_meta( $post_id, $prefix . 'is_drastic_photo', 1 );
    } else {
        delete_post_meta( $post_id, $prefix . 'is_drastic_photo' );
    }
}
add_action( 'cmb2_save_post_fields', 'cmb2_save_custom_metabox_data', 10, 1 );