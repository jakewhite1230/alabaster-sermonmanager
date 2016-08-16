
//Define the player
var player = document.getElementById('alabaster-sermoncontrol-audio');
//play when play is clicked
var playBtn = document.getElementById('asm-play-button');
var playSymbol = document.getElementById('button-symbol');
var scrubbingTooltip = document.getElementById('asm-scrubbing-tooltip');
//var pauseBtn = document.getElementById('alabaster-sermoncontrol-audio-pause');
var seekBar = document.getElementById('asm-content-scrub-bar');
var positionBar = document.getElementById('asm-content-scrub-bar-current');
var displayCurrentTime = document.getElementById('asm-scrub-position-time');
var displayDuration = document.getElementById('asm-scrub-length');
var playerBody = document.getElementById('asm-player-body');

//Play the sermon


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

//Play video at seekbar point
seekBar.addEventListener('click', function(e){
var percent = e.offsetX / this.offsetWidth;
var time = percent * player.duration;
player.currentTime = time;
});


//Move the seekbar according to sermon time
player.addEventListener('timeupdate', updateProgress, false);

function updateProgress(){
	var value = 0;
	if (player.currentTime > 0){
		value = (100 / player.duration) * player.currentTime;
	}
	positionBar.style.width = value + "%";
}

var clicking = false;
//Pause the sermon when scrubbing
seekBar.addEventListener('mousedown', function(e){
	clicking = true;
	var percent = e.offsetX / this.offsetWidth;
	var time = percent * player.duration;
	if (player.currentTime > 0){
		var value = (100 / player.duration) * player.currentTime;
	}
	player.currentTime = time;
	player.pause();
	playSymbol.innerHTML = " ";
	playSymbol.innerHTML = "play_arrow";
	scrubbingTooltip.style.display = 'block';
	scrubbingTooltip.style.left = (positionBar.clientWidth - (scrubbingTooltip.clientWidth / 2)) + "px";
	seekBar.style.cursor = "default";
});


seekBar.addEventListener('contextmenu', function(e){
	clicking = false;
	scrubbingTooltip.style.display = 'none';
});
seekBar.addEventListener('mouseleave', function(e){
	clicking = false;
	scrubbingTooltip.style.display = 'none';
});


seekBar.addEventListener('mousemove', function(e){
if(clicking == false){
	return;
} else{
	var percent = e.offsetX / this.offsetWidth;
	var time = percent * player.duration;
	player.currentTime = time;
	if (player.currentTime > 0){
		value = (100 / player.duration) * player.currentTime;
	}
	positionBar.style.width = value + "%";
	scrubbingTooltip.style.display = 'block';
  scrubbingTooltip.style.left = (positionBar.clientWidth - (scrubbingTooltip.clientWidth / 2)) + "px";
	seekBar.style.cursor = "default";
	}

});
//Play the video after scrubbing finished
seekBar.addEventListener('mouseup', function(e){
clicking = false;
var percent = e.offsetX / this.offsetWidth;
var time = percent * player.duration;
player.currentTime = time;
console.log(time);
scrubbingTooltip.style.display = 'none';
player.play();
playSymbol.innerHTML = " ";
playSymbol.innerHTML = "pause";
});


player.addEventListener('loadeddata', function(e){
	var duration_sec_num = parseInt(this.duration, 10); // don't forget the second param
	var duration_hours   = Math.floor(duration_sec_num / 3600);
 	var duration_minutes = Math.floor((duration_sec_num - (duration_hours * 3600)) / 60);
	var duration_seconds = duration_sec_num - (duration_hours * 3600) - (duration_minutes * 60);
	if (duration_hours   < 10) {duration_hours   = "0"+duration_hours;}
    if (duration_minutes < 10) {duration_minutes = "0"+duration_minutes;}
    if (duration_seconds < 10) {duration_seconds = "0"+duration_seconds;}
    var duration_time    = duration_hours+':'+duration_minutes+':'+duration_seconds;
		if(duration_hours <= 0){
			var duration_time = duration_minutes+':'+duration_seconds;
		}else{
				var duration_time = duration_hours+':'+duration_minutes+':'+duration_seconds;
			}
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
scrubbingTooltip.innerHTML = current_time;
})
