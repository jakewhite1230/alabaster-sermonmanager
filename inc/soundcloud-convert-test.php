<script src="http://connect.soundcloud.com/sdk.js"></script>
<script>
(function($) {
	$("#post").submit(function (e) {
		e.preventDefault();
		var client_id = "13d37723b439fa80075ce6af15dd7998";
		SC.initialize({
		       client_id: client_id
		   });
		SC.get("/resolve/?url=<?php echo $audioFile) ?>", {limit: 1}, function(result){
			jQuery( document ).ready(function( $ ) {
		            var slash = "/";
		            var newAudio = result.uri + slash + 'stream?client_id=' + client_id;
		           $('#sermon-audio-upload').val(newAudio);
		           });



		});	
		$(this).submit(); 
	});
});
</script>