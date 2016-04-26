<?php
add_action( 'add_meta_boxes', 'audio_upload' );
function audio_upload() {
    add_meta_box( 
        'audio_upload',
        __( 'Sermon Audio', 'prfx-textdomain' ),
        'audio_upload_content',
        'alabaster-sermons',
        'normal',
        'high'
    );
}

function audio_upload_content( $post ) {
  // Enqueue Datepicker + jQuery UI CSS

wp_nonce_field( basename( __FILE__ ), 'sermon_audio_nonce' ); 

$prfx_stored_meta = get_post_meta( $post->ID );
    ?>
 
   <p>
    <label for="meta-image" class="prfx-row-title"><?php _e( 'Example File Upload', 'prfx-textdomain' )?></label>
    <input type="text" name="meta-image" id="meta-image" value="<?php if ( isset ( $prfx_stored_meta['meta-image'] ) ) echo $prfx_stored_meta['meta-image'][0]; ?>" />
    <input type="button" id="meta-image-button" class="button" value="<?php _e( 'Choose or Upload a File', 'prfx-textdomain' )?>" />
</p>
 
    <?php


}

/**
 * Loads the image management javascript
 */
function prfx_image_enqueue() {
    global $typenow;
    if( $typenow == 'sermons' ) {
        wp_enqueue_media();
 
        // Registers and enqueues the required javascript.
        wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'alabaster-sermonmanager-audio-upload.js' , array( 'jquery' ), '1.0.0', true );
        wp_localize_script( 'meta-box-image', 'meta_image',
            array(
                'title' => __( 'Choose or Upload a File' ),
                'button' => __( 'Use this file' ),
            )
        );
        wp_enqueue_script( 'meta-box-image' );
    }
}
add_action( 'admin_enqueue_scripts', 'prfx_image_enqueue' );





function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'sermon_audio_nonce' ] ) && wp_verify_nonce( $_POST[ 'sermon_date_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    
    // Checks for input and saves if needed
if( isset( $_POST[ 'meta-image' ] ) ) {

$audioFile = $_POST[ 'meta-image'];
if (strpos($audioFile,'?dl=1') !== false) {
    update_post_meta( $post_id, 'meta-image', $audioFile );
    
} else {
    $audioFile = $_POST[ 'meta-image'] . '?dl=1';
    update_post_meta( $post_id, 'meta-image', $audioFile );
}




}
 
}
add_action( 'save_post', 'prfx_meta_save' );
