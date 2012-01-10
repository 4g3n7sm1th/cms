<?php
include('./../globals.plugins.php');

function updateGalleryDB($gallery_id, $path, $thumb_name)
{
  global $db;

  $sql = "INSERT INTO plugin_gallery_pictures 
                         (plugin_gallery_id, 
                          plugin_gallery_picture_description,
                          plugin_gallery_picture_name,
                          plugin_gallery_picture_filename,
                          plugin_gallery_picture_thumbnail_filename,
                          plugin_gallery_picture_ts_create,
                          plugin_gallery_picture_id_create) 
                  VALUES (".$gallery_id.",
                          '[Ohne Titel]',
                          '[Ohne Titel]',
                          '".$path."',
                          '".$thumb_name."',
                          NOW(),
                          '".$_SESSION['user_id']."');
                          ";

  //echo $sql;
  
  $db->query($sql); 
}

function make_thumb($src,$dest,$desired_width)
    {
      $img = new Zubrag_image;

      // initialize
      $img->max_y = $desired_width;

      // generate thumbnail
      $img->GenerateThumbFile($src, $dest);
    }

?>