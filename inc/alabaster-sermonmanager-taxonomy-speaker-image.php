<?php
/* Add Image Upload to speakers Taxonomy */
 
// Add Upload fields to "Add New Taxonomy" form
function add_speakers_image_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="speakers-image"><?php _e( 'Speaker Image:', 'speakers' ); ?></label>
		<input type="text" name="speakers-image" id="speakers_image" class="speakers-image" value="<?php echo $speakersimage; ?>">
		<input class="upload_image_button button" name="_add_speakers_image" id="_add_speakers_image" type="button" value="Select/Upload Image" />
		<script>
			jQuery(document).ready(function() {
				jQuery('#_add_speakers_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('.speakers-image').val(attachment.url);
					}
					wp.media.editor.open(this);
					return false;
				});
			});
		</script>
	</div>
<?php
}
add_action( 'speakers_add_form_fields', 'add_speakers_image_field', 10, 2 );

add_action('created_speakers', 'save_speakers_image_meta', 10, 2);
add_action('edited_speakers', 'edit_speakers_image_meta', 10, 2);

function save_speakers_image_meta($term_id, $tt_id){
	if(isset($_POST['speakers-image']) && '' !== $_POST['speakers-image']){
		$group = $_POST['speakers-image'];
		update_term_meta($term_id, 'speakers-image', $group, true);
	}
}

function edit_speakers_image_meta($term_id, $tt_id){
	if(isset($_POST['speakers-image']) && '' !== $_POST['speakers-image']){
		$group = $_POST['speakers-image'];
		update_term_meta($term_id, 'speakers-image', $group);
	}
}

add_filter('manage_edit-speakers_columns', 'add_speakers_image_column');

function add_speakers_image_column($columns){
	$columns['speakers-image'] = __('speakers Image', 'my_plugin');
	return $columns;
}

add_filter('manage_speakers_custom_column', 'add_speakers_image_preview_column_content', 10, 3);

function add_speakers_image_preview_column_content($content, $column_name, $term_id){
	 if( $column_name !== 'speakers-image' ){
        return $content;
    }

    $term_id = absint( $term_id );
	$speakers_image = get_term_meta( $term_id, 'speakers-image', true );
	$speakers_image_display = "<img style='width:100%;' src='";
	$speakers_image_display .= $speakers_image;
	$speakers_image_display .= "'>";

    if( !empty( $speakers_image) ){
        $content .= $speakers_image_display;
    }

    return $content;
}
// Add Upload fields to "Edit Taxonomy" form
function speakers_image_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$speakers_image = get_term_meta( $t_id, 'speakers-image', true); ?>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="_speakers_image"><?php _e( 'speakers Image', 'journey' ); ?></label></th>
		<td>
			<input type="text" name="speakers-image" id="speakers_image" class="speakers-image" value="<?php echo $speakers_image; ?>">
		<input class="upload_image_button button" name="_add_speakers_image" id="_add_speakers_image" type="button" value="Select/Upload Image" />
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"></th>
		<td style="height:150px;">
			<style>
				div.img-wrap {
					background: url('http://placehold.it/960') no-repeat center; 
					background-size:cover; 
					max-width: 450px;  
					width: 100%; 
					height: 100%; 
					overflow:hidden; 
				}
				div.img-wrap img {
					max-width: 450px;
				}
			</style>
			<div class="img-wrap">
				<img src="<?php echo $speakers_image; ?>" id="speakers-img">
			</div>
			<script>
			jQuery(document).ready(function() {
				jQuery('#_add_speakers_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('#speakers-img').attr("src",attachment.url)
						jQuery('.speakers-image').val(attachment.url)
					}
					wp.media.editor.open(this);
					return false;
				});
			});
			</script>
		</td>
	</tr>
<?php
}
add_action( 'speakers_edit_form_fields', 'speakers_image_edit_meta_field', 10, 2 );