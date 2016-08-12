    jQuery(document).ready(function() {
                jQuery('#meta-image-button').click(function() {
                    wp.media.editor.send.attachment = function(props, attachment) {
                        jQuery('.meta-image').val(attachment.url);
                    }
                    wp.media.editor.open(this);
                    return false;
                });
            });