<?php
    
    $max_width = 'auto'; //150px
    $max_height = '120px';

    if(isset($_GET['p']) && $_GET['p'] != '')
    { $page_id = $_GET['p']; } else
    { $page_id = 0; }

    $gallery_id = $db->get_var('SELECT plugin2page_value 
                                  FROM plugin2page 
                                 WHERE plugin_id = '.$plugin->plugin_id.' 
                                   AND page_id = '.$page_id.'
                                   AND plugin2page_value_name = "gallery_id";');
                                   
	  $gallery = $db->get_row('SELECT * FROM plugin_gallerys WHERE plugin_gallery_id = '.$gallery_id.';');
	  $pictures = $db->get_results('SELECT * FROM plugin_gallery_pictures WHERE plugin_gallery_id = '.$gallery_id.' AND plugin_gallery_picture_ts_delete IS NULL;');
	
	  //$db->debug();
	
	  if(count($pictures)>0)
    {
      //$content.="Fotos vorhanden";
      //print_r($pictures);
      $content.='
      <h1>'.$gallery->plugin_gallery_name.'</h1>
      '.$gallery->plugin_gallery_description.'<br /><br />
      <div class="gallery-thumbnails" style="margin-left:-10px;">';
      foreach($pictures as $pic)
      {
        $path = './'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_filename;
    
        if($pic->plugin_gallery_picture_thumbnail_filename != "") 
          { $path_thumb = './'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_thumbnail_filename; } else
          { $path_thumb = $path; }
        
    
       $content.='
        <div class="gallery" title="'.$pic->plugin_gallery_picture_description.'" style="margin:10px;float:left;max-width:'.$max_width.';max-height:'.$max_height.';" rel="'.$pic->plugin_gallery_picture_id.'">
          <a href="'.$path.'" class="gallerylink"  rel="'.$gallery_id.'">
            <img style="max-width:'.$max_width.';max-height:'.$max_height.';" src="'.$path_thumb.'">
          </a>
        </div>
        ';
      }
      $content.='</div>';
    }
    else
    {
      $content.="Keine Fotos vorhanden";
    }
	
	  $plugins[plugin_gallery]=$content;

?>