<?php
add_action( 'add_meta_boxes', 'date_field' );
function date_field() {
    add_meta_box(
        'date_field',
        __( 'Sermon Date', 'myplugin_textdomain' ),
        'date_field_content',
        'sermon',
        'normal',
        'high'
    );
}

function date_field_content( $post ) {
  // Enqueue Datepicker + jQuery UI CSS

wp_nonce_field( basename( __FILE__ ), 'sermon_date_nonce' );
wp_enqueue_script( 'jquery-ui-datepicker' );
wp_enqueue_style( 'jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/smoothness/jquery-ui.css', true);

// Retrieve current date for sermon
$sermon_date = get_post_meta( $post->ID, 'sermon_date', true  );

?>
<script>
jQuery(document).ready(function(){
jQuery('#sermon_date').datepicker({
dateFormat : 'm-dd-yy'
});
});
</script>
<table>
<tr>
<td style="width: 100%">Choose Date</td>
<td>
<input type="text" name="sermon_date" id="sermon_date" value="<?php echo $sermon_date; ?>" /></td>
</tr>
</table>

<?php
}

add_action( 'save_post', 'save_sermon_date', 10, 2 );

/* Save the meta box's post metadata. */
function save_sermon_date( $post_id, $post ) {

  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['sermon_date_nonce'] ) || !wp_verify_nonce( $_POST['sermon_date_nonce'], basename( __FILE__ ) ) )
    return $post_id;

  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );

  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

  /* Get the posted data and sanitize it for use as an HTML class. */
  $new_meta_value = ( isset( $_POST['sermon_date'] ) ? sanitize_html_class( $_POST['sermon_date'] ) : '' );

  /* Get the meta key. */
  $meta_key = 'sermon_date';

  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );

  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );

  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value )
    update_post_meta( $post_id, $meta_key, $new_meta_value );

  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value )
    delete_post_meta( $post_id, $meta_key, $meta_value );
}
