<?php
$audioFile = get_custom_field('sermon-audio-upload');
if(strpos($audioFile, 'https://api.soundcloud.com') !== false){
	include('alabaster-sermonmanager-audio-soundcloud.php');
}

$style_options = get_option('alabaster-sermonmanager-options');
if($style_options != '' ){
            $primary_style = $style_options['alabaster-sermonmanager-primary-color'];
            $secondary_style = $style_options['alabaster-sermonmanager-secondary-color'];

 }

 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
 $sermonDate = get_custom_field("sermon_date");
 $sermonSpeaker = get_the_term_list($post->ID, 'speakers');
 $sermonSeries = get_the_term_list($post->ID, 'series');

 	 $audio = 				 "<audio  id='alabaster-sermoncontrol-audio'>";
 	 $audio = $audio . "<source id='alabaster-sermoncontrol-audioSource' src='" . $audioFile . "' type='audio/mp3'/>Your browser does not support the audio element. Please update browser.";
 	 $audio = $audio . "</audio>";
   $audio = $audio . "<div id='asm-player-body' class='clearfix'>";
   $audio = $audio . "<div id='asm-cover-image' style='background-image:url(". $feat_image .");'>";
   $audio = $audio . "<div id='asm-play-button' class='play asm-prime-bkg-color'>";
   $audio = $audio . "<p id='button-symbol' class='material-icons'>play_arrow</p>";
   $audio = $audio . "</div>";
   $audio = $audio . "</div>";
   $audio = $audio . "<div id='asm-body-content'>";
   $audio = $audio . "<div id='asm-content-buttons'>";
	 $audio = $audio . "<a id='asm-audio-download-link' href='". get_custom_field('sermon-audio-upload') ."'>";
   $audio = $audio . "<p id='asm-button-dwnld' class='asm-sec-color material-icons'>file_download</p>";
   $audio = $audio . "</a>";
   $audio = $audio . "<div id='asm-share-buttons'>";
   $audio = $audio . "<a href='https://twitter.com/share?url=" . get_permalink() . "&text=Listen%20to%20" . get_the_title() . "' target='_blank'>";
   $audio = $audio . "<p id='asm-share-twitter' class='socicon-twitter'></p>";
   $audio = $audio . "</a>";
   $audio = $audio . "<a href='https://www.facebook.com/sharer/sharer.php?u=". get_permalink() . "' target='_blank'>";
   $audio = $audio . "<p id='asm-share-facebook' class='socicon-facebook'></p>";
   $audio = $audio . "</a>";
   //Close share buttons
   $audio = $audio . "</div>";
	 $audio = $audio . "</div>";
   $audio = $audio . "<div id='asm-content-info'>";
   $audio = $audio . "<h1 id='asm-content-title' class='asm-prime-color'>".get_the_title()."</h1>";
   $audio = $audio . "<p id='asm-content-captions' class='asm-sec-color'>".$sermonSeries." | ".$sermonSpeaker." | ".$sermonDate."</p>";
   //Close info
   $audio = $audio . "</div>";
   $audio = $audio . "<div id='asm-content-scrub-controls' class='clearfix'>";
   $audio = $audio . "<div id='asm-scrub-pos-container' class='asm-sec-color'>";
   $audio = $audio . "<span id='asm-scrub-position-time'>00:00</span>";
   //Close position container
   $audio = $audio . "</div>";
   $audio = $audio . "<span id='asm-content-scrub-bar' class='asm-sec-bkg-color' style='width:75%'>";
	 $audio = $audio . "<span id='asm-scrubbing-tooltip' class='asm-sec-bkg-color'>00:00</span>";
   $audio = $audio . "<span id='asm-content-scrub-bar-current'class='asm-prime-bkg-color' style='width:0px'></span>";
   //Close Scrub bar
   $audio = $audio . "</span>";
   $audio = $audio . "<div id='asm-scrub-length-container' class='asm-sec-color'>";
   $audio = $audio . "<span id='asm-scrub-length'>00:00</span>";
   //Close scrub length
   $audio = $audio . "</div>";
   //Close controls
   $audio = $audio . "</div>";
   //Close content
   $audio = $audio . "</div>";
   //Close player body
   $audio = $audio . "</div>";





	?>
<style>
.asm-prime-bkg-color{
	background:<?php echo $primary_style;?>;
}
.asm-prime-color{
	color:<?php echo $primary_style;?>;
}
.asm-sec-bkg-color{
	background:<?php echo $secondary_style;?>;
}
.asm-sec-color{
	color:<?php echo $secondary_style;?>;
}
</style>
