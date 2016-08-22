<style type="text/css">
body{
	background-color: transparent;
}
</style>
<div class="wrap">

	<div id="icon-options-general" class="icon32"></div>
	<h2>Alabaster Sermons</h2>

	<div id="poststuff">

		<div id="post-body" class="metabox-holder columns-1">
			<div class="asm-settings-page-hero"  style="background-image:url('<?php echo plugins_url(); ?>/alabaster-sermon-manager/img/settings-page.jpg');">
				<div id="asm-settings-page-hero-logo">
					<img src="<?php echo plugins_url(); ?>/alabaster-sermon-manager/img/asm-logo.png" alt="alabaster sermon manager logo" />
					<p>
						Powerful sermon manager plugin for WordPress
					</p>
				</div>
			</div>
		</div>

	<div id="post-body" class="metabox-holder columns-1">
		<?php	/*** License activate button was clicked ***/
			    if (isset($_REQUEST['activate_license'])) {
			        $license_key = $_REQUEST['sample_license_key'];

			        // API query parameters
			        $api_params = array(
			            'slm_action' => 'slm_activate',
			            'secret_key' => YOUR_SPECIAL_SECRET_KEY,
			            'license_key' => $license_key,
			            'registered_domain' => $_SERVER['SERVER_NAME'],
			            'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
			        );

			        // Send query to the license manager server
			        $query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL));
			        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

			        // Check for error in the response
			        if (is_wp_error($response)){
			            echo "Unexpected Error! The query returned with an error.";
			        }

			        //var_dump($response);//uncomment it if you want to look at the full response

			        // License data.
			        $license_data = json_decode(wp_remote_retrieve_body($response));

			        // TODO - Do something with it.
			        //var_dump($license_data);//uncomment it to look at the data

			        if($license_data->result == 'success'){//Success was returned for the license activation

			            //Uncomment the followng line to see the message that returned from the license server
			            echo '<br />The following message was returned from the server: '.$license_data->message;

			            //Save the license key in the options table
			            update_option('sample_license_key', $license_key);
			        }
			        else{
			            //Show error to the user. Probably entered incorrect license key.

			            //Uncomment the followng line to see the message that returned from the license server
			            echo '<br />The following message was returned from the server: '.$license_data->message;
			        }

			    }
			    /*** End of license activation ***/

			    /*** License activate button was clicked ***/
			    if (isset($_REQUEST['deactivate_license'])) {
			        $license_key = $_REQUEST['sample_license_key'];

			        // API query parameters
			        $api_params = array(
			            'slm_action' => 'slm_deactivate',
			            'secret_key' => YOUR_SPECIAL_SECRET_KEY,
			            'license_key' => $license_key,
			            'registered_domain' => $_SERVER['SERVER_NAME'],
			            'item_reference' => urlencode(YOUR_ITEM_REFERENCE),
			        );

			        // Send query to the license manager server
			        $query = esc_url_raw(add_query_arg($api_params, YOUR_LICENSE_SERVER_URL));
			        $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

			        // Check for error in the response
			        if (is_wp_error($response)){
			            echo "Unexpected Error! The query returned with an error.";
			        }

			        //var_dump($response);//uncomment it if you want to look at the full response

			        // License data.
			        $license_data = json_decode(wp_remote_retrieve_body($response));

			        // TODO - Do something with it.
			        //var_dump($license_data);//uncomment it to look at the data

			        if($license_data->result == 'success'){//Success was returned for the license activation

			            //Uncomment the followng line to see the message that returned from the license server
			            echo '<br />The following message was returned from the server: '.$license_data->message;

			            //Remove the licensse key from the options table. It will need to be activated again.
			            update_option('sample_license_key', '');
			        }
			        else{
			            //Show error to the user. Probably entered incorrect license key.

			            //Uncomment the followng line to see the message that returned from the license server
			            echo '<br />The following message was returned from the server: '.$license_data->message;
			        }

			    }
			    /*** End of sample license deactivation ***/

			    ?>
			    <p>Please enter the license key for this product to activate it. You were given a license key when you purchased this item.</p>
			    <form action="" method="post">
			        <table class="form-table">
			            <tr>
			                <th style="width:100px;"><label for="sample_license_key">License Key</label></th>
			                <td ><input class="regular-text" type="text" id="sample_license_key" name="sample_license_key"  value="<?php echo get_option('sample_license_key'); ?>" ></td>
			            </tr>
			        </table>
			        <p class="submit">
			            <input type="submit" name="activate_license" value="Activate" class="button-primary" />
			            <input type="submit" name="deactivate_license" value="Deactivate" class="button" />
			        </p>
			    </form>
	</div>



  <?php $license_data = get_option('sample_license_key');
		if($license_data != ''){ ?>
			<div id="post-body" class="metabox-holder columns-2">

				<!-- main content -->
				<div id="post-body-content">

					<div class="meta-box-sortables ui-sortable">

						<div class="postbox">

							<h3><span>Color Options for Audio Player</span></h3>
							<div class="inside">
									<form name="alabaster-sermonmanager-colorForm" action="" method="post">
										<table>
											<input type="hidden" name="alabaster-sermonmanager-colorSubmit" value="Y" />
											<tr>
												<td>
													<label>Primary</label>
												</td>
												<td>
													<input type="text" value="<?php echo $primary_style; ?>" name="alabaster-sermonmanager-primary-color" class="my-color-field" id="primary-color-picker" data-default-color="#f05555" />
												</td>
											</tr>
											<tr>
												<td>
													<label>Secondary</label>
												</td>
												<td>
													<input type="text" name="alabaster-sermonmanager-secondary-color" id="secondary-color-picker" value="<?php echo $secondary_style; ?>" class="my-color-field" data-default-color="#656565" />
												</td>
											</tr>
											<tr>
												<td>
													<input class="button-primary" type="submit" name="SubmitColor" value="<?php esc_attr_e( 'Update Colors' ); ?>" />
												</td>
											</tr>
										</table>
									</form>

									<style>
									.asm-prime-bkg-color{
										background: <?php echo $primary_style; ?>;
									}
									.asm-prime-color{
										color:<?php echo $primary_style; ?>;
									}
									.asm-sec-bkg-color{
										background:<?php echo $secondary_style; ?>;
									}
									.asm-sec-color{
										color:<?php echo $secondary_style; ?>;
									}
									</style>

							</div> <!-- .inside -->

							<div id="asm-player-body" class="clearfix">
	        <div id="asm-cover-image" style="background-image:url('<?php echo plugins_url(); ?>/alabaster-sermon-manager/img/coverart.jpeg');">
	          <div id="asm-play-button" class="play asm-prime-bkg-color">
	            <p class="material-icons">play_arrow</p>
	          </div>
	        </div>
	        <div id="asm-body-content">
	          <div id="asm-content-buttons">
	            <a><p id="asm-button-dwnld" class="asm-sec-color material-icons">file_download</p></a>
	            <div id="asm-share-buttons">
	              <a><p id="asm-share-twitter" class="socicon-twitter"></p></a>
	              <a><p id="asm-share-facebook" class="socicon-facebook"></p></a>
	            </div>
	          </div>
	          <div id="asm-content-info">
	            <h1 id="asm-content-title" class="asm-prime-color">Who Is The Church?</h1>
	            <p id="asm-content-captions" class="asm-sec-color">
	              Be The Church | Pastor Bubba Jennings | 08.07.16
	            </p>
	          </div>
	          <div id="asm-content-scrub-controls" class="clearfix">
	            <div id="asm-scrub-pos-container" class="asm-sec-color">
	              <span id="asm-scrub-position-time">22:36</span>
	            </div>
	            <span id="asm-content-scrub-bar" class="asm-sec-bkg-color" style="width:70%;">
	              <span id="asm-content-scrub-bar-current"class="asm-prime-bkg-color" style="width:25%"></span>
	            </span>
	            <div id="asm-scrub-length-container" class="asm-sec-color">
	              <span id="asm-scrub-length">52:30</span>
	            </div>
	          </div>
	        </div>
	      </div>

						</div> <!-- .postbox -->

					</div> <!-- .meta-box-sortables .ui-sortable -->

				</div> <!-- post-body-content -->
				<!-- sidebar -->
				<div id="postbox-container-1" class="postbox-container">

					<div class="meta-box-sortables">

						<div class="postbox">

							<h3><span>Shortcodes</span></h3>
							<div class="inside">
								<h4>List Sermons</h4>
								<p>[alabaster_sermonmanager_sermons]</p>
								<h4>List Speakers</h4>
								<p>[alabaster_sermonmanager_speaker]</p>
								<h4>List Series</h4>
								<p>[alabaster_sermonmanager_series]</p>
							</div> <!-- .inside -->

						</div> <!-- .postbox -->

					</div> <!-- .meta-box-sortables -->

				</div> <!-- #postbox-container-1 .postbox-container -->


			</div> <!-- #post-body .metabox-holder .columns-2 -->

			<br class="clear">
		</div> <!-- #poststuff -->


	</div> <!-- .wrap -->

	<script type="text/javascript">
			var primaryStyle = document.getElementById('primary-color-picker');
			var secondaryStyle = document.getElementById('secondary-color-picker');
			var primaryStyleValue;
			var secondaryStyleValue;

		jQuery(document).ready(function($){

			var myOptions = {
	    // a callback to fire whenever the color changes to a valid color
	    change: function(event, ui){
	    	primaryStyleValue = primaryStyle.value;
	    	secondaryStyleValue = secondaryStyle.value;
	    	$('#asm-play-button').css('background-color', primaryStyleValue);
				$('#asm-content-scrub-bar-current').css('background-color', primaryStyleValue);
				$('#asm-content-title').css('color', primaryStyleValue);
	    	$('#asm-content-scrub-bar').css('background-color', secondaryStyleValue);
				$('#asm-button-dwnld').css('color', secondaryStyleValue);
				$('#asm-content-captions').css('color', secondaryStyleValue);
				$('#asm-scrub-position-time').css('color', secondaryStyleValue);
				$('#asm-scrub-length').css('color', secondaryStyleValue);
	    },
	   };
	    $('.my-color-field').wpColorPicker(myOptions);
	});
	</script>

	<script type="text/javascript">



	</script>
	<?php	} ?>
