
//Define the player
var player = document.getElementById('alabaster-sermoncontrol-audio');
//play when play is clicked
var playBtn = document.getElementById('asm-play-button');
var playSymbol = document.getElementById('button-symbol');
//var pauseBtn = document.getElementById('alabaster-sermoncontrol-audio-pause');
var seekBar = document.getElementById('alabaster-sermoncontrol-audio-seekbar');
var displayCurrentTime = document.getElementById('asm-scrub-position-time');
var displayDuration = document.getElementById('asm-scrub-length');



//Play the sermon

/*playBtn.addEventListener('click', function(e){
	player.play();
});

//Pause the sermon
pauseBtn.addEventListener('click', function(e){
	player.pause();
});*/

playBtn.addEventListener('click', playSermon);

function playSermon(){
	if(player.paused){
		player.play();
		playSymbol.innerHTML = " ";
		playSymbol.innerHTML = "pause";
	}else{
		player.pause();
		playSymbol.innerHTML = " ";
		playSymbol.innerHTML = "play_arrow";
	}
}


//displayDuration.innerHTML = Math.floor(player.currentTime) + '/' + Math.floor(player.duration);


//Play video at seekbar point
/*seekBar.addEventListener('change', function(e){

var time = player.duration * (seekBar.value / 100);
player.currentTime = time;
});


//Move the seekbar according to sermon time
player.addEventListener('timeupdate', function(e){
		var value = 100 * (player.currentTime / player.duration);

 	seekBar.value = value;

	});



//Pause the sermon when scrubbing
seekBar.addEventListener('mousedown', function(e){
player.pause();

});

//Play the video after scrubbing finished
seekBar.addEventListener('mouseup', function(e){
player.pause();
playBtn.className = " ";
		playBtn.className = "glyphicon glyphicon-play";

});

/*
//Add volume control
volume.addEventListener('change', function(e){
	player.volume = volume.value;
})

seekBar.addEventListener('change', function(e){

	if(player.play){
		playBtn.className = " ";
		playBtn.className = "glyphicon glyphicon-pause"
	}

})



jQuery(document).ready(function($) {

 $(volume).hide();

$(volumeBtn).click(function(){

	$(volume).fadeToggle('show');

});

})

*/

player.addEventListener('loadeddata', function(e){
	var duration_sec_num = parseInt(this.duration, 10); // don't forget the second param
	var duration_hours   = Math.floor(duration_sec_num / 3600);
 	var duration_minutes = Math.floor((duration_sec_num - (duration_hours * 3600)) / 60);
	var duration_seconds = duration_sec_num - (duration_hours * 3600) - (duration_minutes * 60);
	if (duration_hours   < 10) {duration_hours   = "0"+duration_hours;}
    if (duration_minutes < 10) {duration_minutes = "0"+duration_minutes;}
    if (duration_seconds < 10) {duration_seconds = "0"+duration_seconds;}
    var duration_time    = duration_hours+':'+duration_minutes+':'+duration_seconds;
    displayDuration.innerHTML = duration_time;
})

player.addEventListener('timeupdate', function(){
	var current_sec_num = parseInt(this.currentTime, 10); // don't forget the second param
    var current_hours   = Math.floor(current_sec_num / 3600);
   	var current_minutes = Math.floor((current_sec_num - (current_hours * 3600)) / 60);
    var current_seconds = current_sec_num - (current_hours * 3600) - (current_minutes * 60);
	if (current_hours   < 10) {current_hours   = "0"+current_hours;}
    if (current_minutes < 10) {current_minutes = "0"+current_minutes;}
    if (current_seconds < 10) {current_seconds = "0"+current_seconds;}
		if(current_hours <= 0){
			var current_time = current_minutes+':'+current_seconds;
		}else{
				var current_time = current_hours+':'+current_minutes+':'+current_seconds;
			}
displayCurrentTime.innerHTML = current_time;
})
