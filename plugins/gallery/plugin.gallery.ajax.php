<?php
require_once('./../globals.plugins.php');

$max_width = 'auto'; //150px
$max_height = '70px';

switch($_POST['req']) {

	case 'loadGallery':
	
	  $gallery_id = $_POST['gallery_id'];
	
	  $pictures = $db->get_results('SELECT * FROM plugin_gallery_pictures WHERE plugin_gallery_id = '.$gallery_id.' AND plugin_gallery_picture_ts_delete IS NULL;');
	
	  //$db->debug();
	
	  if(count($pictures)>0)
    {
      //$content.="Fotos vorhanden";
      //print_r($pictures);
      $content.='<div class="gallery-thumbnails">';
      foreach($pictures as $pic)
      {
        $path = './../'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_filename;
    
        if($pic->plugin_gallery_picture_thumbnail_filename != "") 
          { $path_thumb = './../'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_thumbnail_filename; } else
          { $path_thumb = $path; }
        
    
       $content.='
        <div class="gallery" title="'.$pic->plugin_gallery_picture_description.'" style="margin:10px;float:left;border:1px solid black;max-width:'.$max_width.';max-height:'.$max_height.';" ref="'.$pic->plugin_gallery_picture_id.'">
          <a href="'.$path.'" class="gallerylink" rel="'.$gallery_id.'">
            <img style="max-width:'.$max_width.';max-height:'.$max_height.';" src="'.$path_thumb.'">
          </a>
          <div style="display:none;position:relative;background:white;opacity:0.5;border-top:1px solid black;margin-top:-25px;" class="gallery-edit-'.$pic->plugin_gallery_picture_id.'">
            <span title="bearbeiten" class="open-edit" onclick="openPictureEdit('.$pic->plugin_gallery_picture_id.')">'.icon('edit', 2).'</span><span style="float:right" title="l&ouml;schen" onclick="deletePicture('.$pic->plugin_gallery_picture_id.', '.$_POST['gallery_id'].')">'.icon('delete', 2).'</span>
          </div>
          <script>
            $( "#dialog-form-'.$pic->plugin_gallery_picture_id.'" ).dialog({
			        autoOpen: false,
			        buttons: 
			        {
				        "Beschreibung speichern": function() {
				          var description = $("#description_'.$pic->plugin_gallery_picture_id.'").val();
				          savePictureDescription(description, '.$pic->plugin_gallery_picture_id.', '.$_POST['gallery_id'].');
					        $( this ).dialog( "close" );
				        },
				        Cancel: function() {
					        $( this ).dialog( "close" );
				        }
			        }
		        });
          </script>
          <div class="dialogbox" id="dialog-form-'.$pic->plugin_gallery_picture_id.'" title="Beschreibung bearbeiten">
	          <form>
	            <img style="max-width:'.$max_width.';max-height:'.$max_height.';" src="'.$path_thumb.'"><br /><br />
		          <label for="description">Beschreibung</label>
		          <input type="text" name="description_'.$pic->plugin_gallery_picture_id.'" value="'.$pic->plugin_gallery_picture_description.'" id="description_'.$pic->plugin_gallery_picture_id.'" class="text ui-widget-content ui-corner-all" />
	          </form>
          </div>
          
        </div>
        ';
      }
      $content.='</div>';
    }
    else
    {
      $content.="Keine Fotos vorhanden";
    }
	
	  echo $content;
	
	break;
	
	default:
	 echo 0;
	break;
}
?>