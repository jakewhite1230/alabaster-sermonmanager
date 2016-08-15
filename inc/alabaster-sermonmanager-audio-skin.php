<?php
$audioFile = get_custom_field('sermon-audio-upload');
if(strpos($audioFile, 'https://api.soundcloud.com') !== false){
	include('alabaster-sermonmanager-audio-soundcloud.php');
}

$style_options = get_option('alabaster-sermonmanager-options');
if($style_options != '' ){
            $seekbar_style = $style_options['alabaster-sermonmanager-seekbar-color'];
            $dock_color_style = $style_options['alabaster-sermonmanager-dock-color'];
            $button_color_style = $style_options['alabaster-sermonmanager-button-color'];
 }

 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
 $sermonDate = get_custom_field("sermon_date");
 $sermonSpeaker = get_the_term_list($post->ID, 'speakers');
 $sermonSeries = get_the_term_list($post->ID, 'series');

 	 $audio = "<audio  id='alabaster-sermoncontrol-audio'>";
 	 $audio = $audio . "<source id='alabaster-sermoncontrol-audioSource' src='" . get_custom_field('meta-image') . "' type='audio/mp3'/>Your browser does not support the audio element. Please update browser.";
 	 $audio = $audio . "</audio>";
   $audio = $audio . "<div id='asm-player-body' class='clearfix'>";
   $audio = $audio . "<div id='asm-cover-image' style='background-image:url(". $feat_image .");'>";
   $audio = $audio . "<div id='asm-play-button' class='play asm-prime-bkg-color'>";
   $audio = $audio . "<p id='button-symbol' class='material-icons'>play_arrow</p>";
   $audio = $audio . "</div>";
   $audio = $audio . "</div>";
   $audio = $audio . "<div id='asm-body-content'>";
   $audio = $audio . "<div id='asm-content-buttons'>";
   $audio = $audio . "<a>";
   $audio = $audio . "<p id='asm-button-dwnld' class='asm-sec-color material-icons'>file_download</p>";
   $audio = $audio . "</a>";
   $audio = $audio . "<div id='asm-share-buttons'>";
   $audio = $audio . "<a>";
   $audio = $audio . "<p id='asm-share-twitter' class='socicon-twitter'></p>";
   $audio = $audio . "</a>";
   $audio = $audio . "<a>";
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
   $audio = $audio . "<span id='asm-content-scrub-bar' class='asm-sec-bkg-color' style='width:70%;'>";
   $audio = $audio . "<span id='asm-content-scrub-bar-current'class='asm-prime-bkg-color' style='width:25%'></span>";
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





	/*$audio = "<audio  id='alabaster-sermoncontrol-audio'>";
	$audio = $audio . "<source id='alabaster-sermoncontrol-audioSource' src='" . $audioFile . "' type='audio/mp3'/>Your browser does not support the audio element. Please update browser.";
	$audio = $audio . "</audio>";
	$audio = $audio . "<div id='alabaster-sermoncontrol-audio-controls' style='background:" . $dock_color_style ."' class='clearfix'>";
	$audio = $audio . "<div class='alabaster-sermoncontrol-audio-container'>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-play' class='glyphicon glyphicon-play'></button>";
	$audio = $audio . "<div class='seekbar clearfix'>";
	$audio = $audio . "<p style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-currentTime'>00:00:00</p>";
	$audio = $audio . "<input type='range' style='background:" . $seekbar_style ."' id='alabaster-sermoncontrol-audio-seekbar' value='0'>";
	$audio = $audio . "<p style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-duration'>00:00:00</p>";
	$audio = $audio . "</div>";
	$audio = $audio . "<a href='https://www.facebook.com/sharer/sharer.php?u=". get_permalink() . "' target='_blank'>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-share' class='glyphicon glyphicon-share pull-right'></button>";
	$audio = $audio . "</a>";
	$audio = $audio . "<a id='alabaster-sermoncontrol-audio-download-link' href='" . get_custom_field('sermon-audio-upload') . "'>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-download' class='glyphicon glyphicon-download hidden-xs pull-right'></button>";
	$audio = $audio . "</a>";
	$audio = $audio . "</div>";
	$audio = $audio . "</div>";
*/

?>
<style type="text/css">

.pageHeader h1{
	display: none;
}

#alabaster-sermoncontrol-audio-controls{
	width: 90%;
	background-color: #1e1e20;
	height: auto;
	padding:20px;
	border-radius: 5px;
	margin:auto;
	display: table;
	margin-bottom: 25px;
	min-height: 50px;
	position: relative;
	text-align: left;
}

.alabaster-sermoncontrol-audio-container{
	width: 100%;
	height: 10px;
	position: relative;
	display: table-cell;
	vertical-align: middle;
}

.seekbar{
	height: 20px;
	position: relative;
	margin: auto;
	display: inline-block;
	width: 75%;
	margin-left: 15px;
}


#alabaster-sermoncontrol-audio-controls p{
	color: #fff;
	float: left;
	font-size: 1em;
	margin: 0px 5px;
}

#alabaster-sermoncontrol-audio-controls input[type="range"] {
  -webkit-appearance: none; /* Hides the slider so that custom slider can be made */
}

#alabaster-sermoncontrol-audio-controls input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
}

#alabaster-sermoncontrol-audio-controls input[type="range"]:focus {
  outline: none; /* Removes the blue border. You should probably do some kind of focus styling for accessibility reasons though. */
}

#alabaster-sermoncontrol-audio-controls input[type="range"]::-ms-track {
  cursor: pointer;
  background: transparent; /* Hides the slider so custom styles can be added */
  border-color: transparent;
  color: transparent;
}

/* Special styling for WebKit/Blink */
#alabaster-sermoncontrol-audio-controls input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  border: 1px solid #000000;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #fff;
  cursor: pointer;
  margin-top: 0px; /* You need to specify a margin in Chrome, but in Firefox and IE it is automatic */
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d; /* Add cool effects to your sliders! */
}

/* All the same stuff for Firefox */
#alabaster-sermoncontrol-audio-controls input[type="range"]::-moz-range-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #fff;
  cursor: pointer;
}

/* All the same stuff for IE */
#alabaster-sermoncontrol-audio-controls input[type="range"]::-ms-thumb {
  box-shadow: 1px 1px 1px #000000, 0px 0px 1px #0d0d0d;
  border: 1px solid #000000;
  height: 16px;
  width: 16px;
  border-radius: 50%;
  background: #fff;
  cursor: pointer;
}




#alabaster-sermoncontrol-audio-controls button{
	background-color: transparent;
	border:0px;
	color: #fff;
	font-size: 1.5em;
	display: inline-block;
}


#alabaster-sermoncontrol-audio-controls button:focus,
#alabaster-sermoncontrol-audio-controls button:active{
	outline: none !important;
}


#alabaster-sermoncontrol-audio-seekbar{
	width: 50%;
	height: 10px;
	background: #DC3522;
	float: left;
	border-radius: 15px;
	margin: 0px 10px;
	top: 25%;
  	position: relative;

}

@media(max-width: 991px){
	#alabaster-sermoncontrol-audio-seekbar{
	width: 50%;
	}
}

@media(max-width: 767px){
	#alabaster-sermoncontrol-audio-controls{
		width: 100%;
		padding-left: 0px;
		padding-right: 0px;
	}

	.seekbar{
	height: 15px;
	position: relative;
	margin: auto;
	width: 70%;
	}

	#alabaster-sermoncontrol-audio-controls p{
		font-size: .6em;
	}

	#alabaster-sermoncontrol-audio-controls button{
	background-color: transparent;
	border:0px;
	color: #fff;
	font-size: 1em;

	}

	#alabaster-sermoncontrol-audio-seekbar{
	width: 45%;
	}


}
</style>
<style>
#asm-player-body{
	background:#f5f5f5;
	font-family: 'Source Sans Pro', sans-serif;
	width: 75%;
	margin: auto;
	display: block;
	position: relative;
	min-height: 185px;
	height: auto;
}
#asm-cover-image{
	width: 25%;
	background-size: cover;
	background-position: center center;
	display: block;
	height: 185px;
	float: left;
	position: relative;
}
#asm-play-button{
	color: #ffffff;
	height: 60px;
	width: 60px;
	border-radius: 50%;
	position: absolute;
	right: -30px;
	top: 50%;
	transform: translateY(-50%);
	-webkit-box-shadow: 0px 0px 9px 1px rgba(47,47,47,0.5);  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
	-moz-box-shadow:    0px 0px 9px 1px rgba(47,47,47,0.5);  /* Firefox 3.5 - 3.6 */
	box-shadow: 0px 0px 9px 1px rgba(47,47,47,0.5);
	transition: all ease-in 0.5s;
}
#asm-play-button:hover{
	box-shadow: none;
	transition: all ease-in 0.5s;
}

#asm-play-button p{
	position: relative;
	margin: 0px;
	top: 50%;
	transform: translateY(-50%);
	text-align: center;
	display: block;
	font-size: 2.5rem;
}

#asm-body-content{
	float: left;
	margin-left: 45px;
	width: 68%;
	position: relative;
	height: 185px;
}
#asm-content-buttons{
	position: absolute;
	width: 100%;
	top: 10px;
}
#asm-content-buttons p{
	margin-top: 0px;
}
#asm-share-buttons{
	float: right;
}
#asm-share-buttons a{
	float: left;
}
#asm-button-dwnld{
	transition: all ease-in 0.3s;
}
#asm-button-dwnld:hover{
	transition: all ease-in 0.3s;
	/*Replace with prime color*/
	color: #f05555;
}

#asm-share-twitter{
	color:#00aced;
	margin: 0px 5px;
}
#asm-share-facebook{
	color:#3b5998;
	margin: 0px 5px;
}
#asm-content-info{
	width: 100%;
	position: absolute;
	top: 50%;
	transform:translateY(-50%);
}
#asm-content-title{
	margin: 0px;
}
#asm-content-captions{
	margin-top: 0px;
}
#asm-content-scrub-controls{
	line-height: 0.3;
	width: 100%;
	position: absolute;
	bottom: 25px;
}
#asm-scrub-pos-container,
#asm-scrub-length-container,
#asm-content-scrub-bar{
	float: left;
	display: block;
	box-sizing: content-box;
}

#asm-scrub-pos-container,
#asm-scrub-length-container{
	width: auto;
	text-align: center;
}

#asm-scrub-pos-container{
	margin-right: 10px;
}
#asm-scrub-length-container{
	margin-left: 10px;
}


#asm-content-scrub-bar,
#asm-content-scrub-bar-current{
	height: 7px;
	display: block;
	border-radius: 30px;
}
.asm-prime-bkg-color{
	background:#f05555;
}
.asm-prime-color{
	color:#f05555;
}
.asm-sec-bkg-color{
	background:#656565;
}
.asm-sec-color{
	color:#656565;
}

#asm-player-body .clearfix:after {
	 visibility: hidden;
	 display: block;
	 font-size: 0;
	 content: " ";
	 clear: both;
	 height: 0;
	 }
#asm-player-body .clearfix { display: inline-block; }
/* start commented backslash hack \*/
* html #asm-player-body .clearfix { height: 1%; }
#asm-player-body .clearfix { display: block; }
/* close commented backslash hack */
</style>
