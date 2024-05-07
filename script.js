
$(document).ready(function() {
    var dropArea = $('#drag-area');
    var browseFiles = $('#browseFiles');
  
    browseFiles.on('click',function(){
      $('#fileInput').click();
    });
  
    dropArea.on('dragenter dragover', function(event) {
      event.preventDefault();
      dropArea.addClass('highlight');
    });
  
    dropArea.on('dragleave drop', function(event) {
      event.preventDefault();
      dropArea.removeClass('highlight');
    });
  
    dropArea.on('drop', function(event) {
      event.preventDefault();
      dropArea.removeClass('highlight');
      var files = event.originalEvent.dataTransfer.files;
      handleFiles(files);
    });
  
    $('#fileInput').on('change', function() {
      var files = $(this)[0].files;
      handleFiles(files);
    });
  
    function handleFiles(files) {
      for (var i = 0; i < files.length; i++) {
        uploadFile(files[i]);
      }
    }
  
    function uploadFile(file) {
      var formData = new FormData();
      formData.append('file', file);
  
      $.ajax({
        url: 'uploader.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        
        success: function(response) {
          $('#upload-success').html(response);
        }
      });
    }
  });
  
  