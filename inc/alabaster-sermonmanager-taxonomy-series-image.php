<?php
 /**
 * Load media files needed for Uploader
 */
function load_wp_media_files() {
  wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
/* Add Image Upload to Series Taxonomy */
 
// Add Upload fields to "Add New Taxonomy" form
function add_series_image_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="series-image"><?php _e( 'Series Image:', 'journey' ); ?></label>
		<input type="text" name="series-image" id="series_image" class="series-image" value="<?php echo $seriesimage; ?>">
		<input class="upload_image_button button" name="_add_series_image" id="_add_series_image" type="button" value="Select/Upload Image" />
		<script>
			jQuery(document).ready(function() {
				jQuery('#_add_series_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('.series-image').val(attachment.url);
					}
					wp.media.editor.open(this);
					return false;
				});
			});
		</script>
	</div>
<?php
}
add_action( 'series_add_form_fields', 'add_series_image_field', 10, 2 );

add_action('created_series', 'save_series_image_meta', 10, 2);
add_action('edited_series', 'edit_series_image_meta', 10, 2);

function save_series_image_meta($term_id, $tt_id){
	if(isset($_POST['series-image']) && '' !== $_POST['series-image']){
		$group = $_POST['series-image'];
		update_term_meta($term_id, 'series-image', $group, true);
	}
}

function edit_series_image_meta($term_id, $tt_id){
	if(isset($_POST['series-image']) && '' !== $_POST['series-image']){
		$group = $_POST['series-image'];
		update_term_meta($term_id, 'series-image', $group);
	}
}

add_filter('manage_edit-series_columns', 'add_series_image_column');

function add_series_image_column($columns){
	$columns['series-image'] = __('Series Image', 'my_plugin');
	return $columns;
}

add_filter('manage_series_custom_column', 'add_series_image_preview_column_content', 10, 3);

function add_series_image_preview_column_content($content, $column_name, $term_id){
	 if( $column_name !== 'series-image' ){
        return $content;
    }

    $term_id = absint( $term_id );
	$series_image = get_term_meta( $term_id, 'series-image', true );
	$series_image_display = "<img style='width:100%;' src='";
	$series_image_display .= $series_image;
	$series_image_display .= "'>";

    if( !empty( $series_image) ){
        $content .= $series_image_display;
    }

    return $content;
}
// Add Upload fields to "Edit Taxonomy" form
function series_image_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$series_image = get_term_meta( $t_id, 'series-image', true); ?>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="_series_image"><?php _e( 'Series Image', 'journey' ); ?></label></th>
		<td>
			<input type="text" name="series-image" id="series_image" class="series-image" value="<?php echo $series_image; ?>">
		<input class="upload_image_button button" name="_add_series_image" id="_add_series_image" type="button" value="Select/Upload Image" />
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
				<img src="<?php echo $series_image; ?>" id="series-img">
			</div>
			<script>
			jQuery(document).ready(function() {
				jQuery('#_add_series_image').click(function() {
					wp.media.editor.send.attachment = function(props, attachment) {
						jQuery('#series-img').attr("src",attachment.url)
						jQuery('.series-image').val(attachment.url)
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
add_action( 'series_edit_form_fields', 'series_image_edit_meta_field', 10, 2 );