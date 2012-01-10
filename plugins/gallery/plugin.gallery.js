$(document).ready(function() {
  
});

function openPictureEdit(pic_id)
{
  $("#dialog-form-"+pic_id).dialog( "open" );
}

function loadGallery(gallery_id) {
  $.ajax({
    type: "POST",
    url: './../plugins/gallery/plugin.gallery.ajax.php',
    async:true,
    data: 'req=loadGallery&gallery_id='+encodeURIComponent(gallery_id),
    success: function(result) {

      if(result!='0') 
      {
      	$('#gallery').html(result);
      	loadGallerys();
      	$.yoxview.update();
      	loadTitle();
      }
      else
      {
      	msg = "Fehler!";
      	type= 'error';
      	message(msg, type);
      }
      
      return true;
    }
  });
}

function toggleUpload() {

  if($("#upload").css('display') == 'none')
  {
    $("#upload").show("slide", { direction: "right" }, 1000);
  }
  else
  {
    $("#upload").hide("slide", { direction: "right" }, 1000);
  }
}

function createUploader (galleryid) {      
            var uploader = new qq.FileUploader({
                element: document.getElementById('picture_upload'),
                action: './../plugins/gallery/plugin.gallery.upload.php',
                params: { gallery_id: galleryid },
                allowedExtensions: ['jpg', 'jpeg', 'png', 'gif'],
                debug: true,
                onComplete: function() { loadGallery(galleryid); }
            });           
}

function deletePicture(picture_id, gallery_id)
{
  deleteData('plugin_gallery_picture', picture_id, 'false');
  setTimeout(function(){ loadGallery(gallery_id); }, 200);
}

function savePictureDescription(description, picture_id, gallery_id)
{
  updateData('plugin_gallery_picture', 'description', description, picture_id, 'false');
  setTimeout(function(){ loadGallery(gallery_id); }, 200);
}