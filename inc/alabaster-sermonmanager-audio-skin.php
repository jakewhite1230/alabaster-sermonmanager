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

 	 $audio = "<audio  id='alabaster-sermoncontrol-audio'>";
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
	color: <?php echo $primary_style;?>;
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
	cursor: arrow;
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
#asm-content-scrub-bar{
	position: relative;
}
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

#asm-scrubbing-tooltip{
	position: absolute;
	width: auto;
	height:25px;
	color: #fff;
	top:-30px;
	text-align: center;
	padding: 10px;
	display:none;
	left:-23.5px;
	border-radius: 5px;
}

#asm-scrubbing-tooltip:after{
	content:'';
	 position: absolute;
	 top: 100%;
	 left: 0;
	 right: 0;
	 margin: 0 auto;
	 width: 0;
	 height: 0;
	 border-top: solid 5px <?php echo $secondary_style;?>;
	 border-left: solid 5px transparent;
	 border-right: solid 5px transparent;
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
