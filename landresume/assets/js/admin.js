jQuery(document).ready(function($){

  var mediaUploader;

  $( '#upload-button' ).on( 'click', function(e) {
    e.preventDefault();

    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frame = wp.media({
      title: 'Choose a Resume File (PDF)',
      button: {
        text: 'Choose PDF'
      },
      multiple: false
    });

    mediaUploader.on( 'select', function() {
      var attachment = mediaUploader.state().get('selection').first().toJSON();
      $( '#resume-file' ).val(attachment.url);
      $( '#resume-file-selected' ).text(attachment.url);
      $( '#resume-file-selected' ).attr('href', attachment.url);
    });

    mediaUploader.open();
  });

});