<?php
add_action( 'add_meta_boxes', 'audio_upload' );
function audio_upload() {
    add_meta_box(
        'audio_upload',
        __( 'Sermon Audio', 'prfx-textdomain' ),
        'audio_upload_content',
        'sermons',
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
    <label for="sermon-audio-upload" class="prfx-row-title"><?php _e( 'Audio File Link', 'prfx-textdomain' )?></label>
    <input type="text" name="sermon-audio-upload" id="sermon-audio-upload" value="<?php if ( isset ( $prfx_stored_meta['sermon-audio-upload'] ) ) echo $prfx_stored_meta['sermon-audio-upload'][0]; ?>" />
    <input type="button" id="sermon-audio-upload-button" class="button" value="<?php _e( 'Choose or Upload a File', 'prfx-textdomain' )?>" />
    <button type="button" id="sermon-audio-soundcloud-conversion" class="button"/><i class="fa fa-soundcloud"></i>Convert SoundCloud Link</button>
</p>
<style>
    #sermon-audio-soundcloud-conversion{
        background-color: #f50;
        border-color: #f50;
        color: #fff;
    }
    #sermon-audio-soundcloud-conversion i{
    padding-right:10px;
}
</style>
<script src="http://connect.soundcloud.com/sdk.js"></script>
<script src="https://use.fontawesome.com/e8cbf9f68e.js"></script>
<script>
(function($) {
    $('#sermon-audio-soundcloud-conversion').click(function(){
        var client_id = "13d37723b439fa80075ce6af15dd7998";
        var soundCloudSource = $('#sermon-audio-upload').val();
        SC.initialize({
               client_id: client_id
           });
        SC.get("/resolve/?url=" + soundCloudSource, {limit: 1}, function(result){
            var slash = "/";
            var newAudio = result.uri + slash + 'stream?client_id=' + client_id;
            $('#sermon-audio-upload').val(newAudio);
        })

    })
})(jQuery);
jQuery(document).ready(function() {
                jQuery('#sermon-audio-upload-button').click(function() {
                    wp.media.editor.send.attachment = function(props, attachment) {
                        jQuery('.sermon-audio-upload').val(attachment.url);
                    }
                    wp.media.editor.open(this);
                    return false;
                });
            });
</script>

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
if( isset( $_POST[ 'sermon-audio-upload' ] ) ) {

$audioFile = $_POST[ 'sermon-audio-upload'];
if (strpos($audioFile,'?dl=1') !== false) {
    update_post_meta( $post_id, 'sermon-audio-upload', $audioFile );

} else if(strpos($audioFile, 'https://www.dropbox.com') == true) {
    $audioFile = $_POST[ 'sermon-audio-upload'] . '?dl=1';
    update_post_meta( $post_id, 'sermon-audio-upload', $audioFile );
} //else if(strpos($audioFile, 'https://soundcloud.com') !== false){
   // include('soundcloud-convert-test.php');
   // update_post_meta( $post_id, 'sermon-audio-upload', $audioFile );
//}
else{
    update_post_meta( $post_id, 'sermon-audio-upload', $audioFile );
}




}

}
add_action( 'save_post', 'prfx_meta_save' );
