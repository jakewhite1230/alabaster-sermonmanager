<script src="http://connect.soundcloud.com/sdk.js"></script>

<script>
(function($) {
   var client_id = "13d37723b439fa80075ce6af15dd7998";
   var audioSource = '<?php echo get_custom_field('sermon-audio-upload') ?>';
   var downloadSource = audioSource.replace('stream', 'download');
   console.log(downloadSource);
   $(document).ready(function(){
    $('#alabaster-sermoncontrol-audio-download-link').attr('href', downloadSource);
   });
   
})( jQuery );
</script>