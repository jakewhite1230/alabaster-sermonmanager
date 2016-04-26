<style type="text/css">
body{
	background-color: transparent;
}
</style>
<div class="wrap">
	
	<div id="icon-options-general" class="icon32"></div>
	<h2>Alabaster Sermon Manager</h2>
	
	<div id="poststuff">
	
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
												<label>Seekbar</label>
											</td>
											<td>
												<input type="text" value="<?php echo $seekbar_style; ?>" name="alabaster-sermonmanager-seekbar-color" class="my-color-field" id="seekbar-color-picker" data-default-color="#DC3522" />
											</td>
										</tr>
										<tr>
											<td>
												<label>Dock</label>	
											</td>
											<td>
												<input type="text" name="alabaster-sermonmanager-dock-color" id="dock-color-picker" value="<?php echo $dock_color_style; ?>" class="my-color-field" data-default-color="#1e1e20" />
											</td>
										</tr>
										<tr>
											<td>
												<label>Buttons</label>
											</td>
											<td>
												<input type="text" name="alabaster-sermonmanager-button-color"  id="button-color-picker" value="<?php echo $button_color_style; ?>" class="my-color-field" data-default-color="#ffffff" /><br>
											</td>
										</tr>
										<tr>
											<td>
												<input class="button-primary" type="submit" name="SubmitColor" value="<?php esc_attr_e( 'Update Colors' ); ?>" />
											</td>
										</tr>
									</table>
								</form>



						</div> <!-- .inside -->

						<div id='alabaster-sermoncontrol-audio-controls' style='background:<?php echo $dock_color_style; ?>; margin-left:10px;' class='clearfix'>
								<div class='alabaster-sermoncontrol-audio-container'>
									<button type='button' style='color:<?php echo $button_color_style; ?>' id='alabaster-sermoncontrol-audio-play' class='glyphicon glyphicon-play alabaster-sermoncontrol-button'></button>
									<div class='seekbar clearfix'>
										<p id='alabaster-sermoncontrol-audio-currentTime'>00:00:00</p>
										<input type='range' style='background:<?php echo $seekbar_style; ?>' id='alabaster-sermoncontrol-audio-seekbar' value='0'>
										<p id='alabaster-sermoncontrol-audio-duration'>00:03:00</p>
									</div>
									<button type='button' style='color:<?php echo $button_color_style; ?>' id='alabaster-sermoncontrol-audio-share' class='glyphicon glyphicon-share pull-right alabaster-sermoncontrol-button'></button>
									<button type='button' style='color:<?php echo $button_color_style; ?>' id='alabaster-sermoncontrol-audio-download' class='glyphicon glyphicon-download hidden-xs pull-right alabaster-sermoncontrol-button'></button>
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
		var seekbarStyle = document.getElementById('seekbar-color-picker');
		var dockStyle = document.getElementById('dock-color-picker');
		var buttonStyle = document.getElementById('button-color-picker');
		var seekbarStyleValue;
		var dockStyleValue;
		var buttonStyleValue;
	
	jQuery(document).ready(function($){

		var myOptions = {
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){
    	seekbarStyleValue = seekbarStyle.value;
    	dockStyleValue = dockStyle.value;
    	buttonStyleValue = buttonStyle.value;
    	$('#alabaster-sermoncontrol-audio-seekbar').css('background-color', seekbarStyleValue);
    	$('#alabaster-sermoncontrol-audio-controls').css('background-color', dockStyleValue);
    	$('.alabaster-sermoncontrol-button').css('color', buttonStyleValue);
    },
   };
    $('.my-color-field').wpColorPicker(myOptions);
});
</script>

<script type="text/javascript">



</script>