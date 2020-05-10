tinymce.init({
  selector: '#textarea',
  height: 400,
  // width:1000,
 theme: 'silver',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons',
  image_advtab: true,
  images_upload_credentials: true,
  automatic_uploads: true,
  // add custom filepicker only to Image dialog
file_picker_types: 'image',
file_picker_callback: function(cb, value, meta) {
  var input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('accept', 'image/*');

  input.onchange = function() {
    var file = this.files[0];
    var reader = new FileReader();
    
    reader.onload = function () {
      var id = 'blobid' + (new Date()).getTime();
      var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
      var base64 = reader.result.split(',')[1];
      var blobInfo = blobCache.create(id, file, base64);
      blobCache.add(blobInfo);

      // call the callback and populate the Title field with the file name
      cb(blobInfo.blobUri(), { title: file.name });
    };
    reader.readAsDataURL(file);
  };
  
  input.click();
},

// enable automatic uploads of images represented by blob or data URIs
 // without images_upload_url set, Upload tab won't show up
 images_upload_url: 'post_upload.php',
  
 // override default upload handler to simulate successful upload
 images_upload_handler: function (blobInfo, success, failure) {
     var xhr, formData;
   
     xhr = new XMLHttpRequest();
     xhr.withCredentials = false;
     xhr.open('POST', 'post_upload.php');
   
     xhr.onload = function() {
         var json;
     
         if (xhr.status != 200) {
             failure('HTTP Error: ' + xhr.status);
             return;
         }
     
         json = JSON.parse(xhr.responseText);
     
         if (!json || typeof json.location != 'string') {
             failure('Invalid JSON: ' + xhr.responseText);
             return;
         }
     
         success(json.location);
     };
   
     formData = new FormData();
     formData.append('file', blobInfo.blob(), blobInfo.filename());
   
     xhr.send(formData);
 },

});