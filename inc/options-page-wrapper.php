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
