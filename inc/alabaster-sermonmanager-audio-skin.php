
<?php
$style_options = get_option('alabaster-sermonmanager-options');
if($style_options != '' ){
            $seekbar_style = $style_options['alabaster-sermonmanager-seekbar-color'];
            $dock_color_style = $style_options['alabaster-sermonmanager-dock-color'];
            $button_color_style = $style_options['alabaster-sermonmanager-button-color'];
 }

	$audio = "<audio  id='alabaster-sermoncontrol-audio'>";
	$audio = $audio . "<source id='alabaster-sermoncontrol-audioSource' src='" . get_custom_field('meta-image') . "' type='audio/mp3'/>Your browser does not support the audio element. Please update browser.";
	$audio = $audio . "</audio>";
	$audio = $audio . "<div id='alabaster-sermoncontrol-audio-controls' style='background:" . $dock_color_style ."' class='clearfix'>";
	$audio = $audio . "<div class='alabaster-sermoncontrol-audio-container'>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-play' class='glyphicon glyphicon-play'></button>";
	$audio = $audio . "<div class='seekbar clearfix'>";
	$audio = $audio . "<p id='alabaster-sermoncontrol-audio-currentTime'>00:00:00</p>";
	$audio = $audio . "<input type='range' style='background:" . $seekbar_style ."' id='alabaster-sermoncontrol-audio-seekbar' value='0'>";
	$audio = $audio . "<p id='alabaster-sermoncontrol-audio-duration'>00:00:00</p>";
	$audio = $audio . "</div>";
	$audio = $audio . "<a href='https://www.facebook.com/sharer/sharer.php?u=". get_permalink() . "' target='_blank'>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-share' class='glyphicon glyphicon-share pull-right'></button>";
	$audio = $audio . "</a>";
	$audio = $audio . "<a href='" . get_custom_field('meta-image') . "' download>";
	$audio = $audio . "<button type='button' style='color:". $button_color_style ."' id='alabaster-sermoncontrol-audio-download' class='glyphicon glyphicon-download hidden-xs pull-right'></button>";
	$audio = $audio . "</a>";
	$audio = $audio . "</div>";
	$audio = $audio . "</div>";


?>

<!-- <script type="text/javascript">
	jQuery(document).ready(function($){


		window.onload = function(){
			var source = $('#alabaster-sermoncontrol-audioSource').attr('src');
			var source = source + '?dl=1';
			console.log(source);
			audio.load();
		}

	});


</script> -->



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


/*

#alabaster-sermoncontrol-audio-volume{
  width: 75px;
  height: 10px;
  padding: 0px;
  position: relative;
  z-index: 100;
  border-radius: 15px;
  margin: 0px;
  background: #DC3522;
  top: -45px;
 
  -webkit-transform:rotate(270deg); 
     -moz-transform:rotate(270deg); 
     -o-transform:rotate(270deg); 
     -ms-transform:rotate(270deg); 
     transform:rotate(270deg); 
}
*/

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