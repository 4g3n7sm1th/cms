<?php

$content.='
<script src="./../plugins/gallery/plugin.gallery.js" type="text/javascript"></script>
<script src="./../plugins/gallery/plugin.gallery.upload.js" type="text/javascript"></script>
<link href="./../plugins/gallery/plugin.gallery.upload.css" rel="stylesheet" type="text/css">	';

if(isset($_GET['edit']) && $_GET['edit']!='' && $_GET['edit']!='0')
{

  if(isset($_POST['bt_submit']))
  {
    
    $update = $db->query(
      "UPDATE plugin_gallerys 
          SET plugin_gallery_name = '".$db->escape($_POST['gallery_title'])."', 
              plugin_gallery_description = '".$db->escape($_POST['gallery_description'])."',
              plugin_gallery_ts_update = NOW(),
              plugin_gallery_id_update = ".$_SESSION['user_id']."
        WHERE plugin_gallery_id = ".$_GET['edit']."
      ;");
      
      //$db->debug();
      
    $db->query('UPDATE plugin2page 
                   SET page_id = '.$_POST['page_id'].'
                 WHERE plugin2page.plugin2page_value_name = "gallery_id" 
                   AND plugin2page.plugin_id = "'.$plugin_data->plugin_id.'"
                   AND plugin2page.plugin2page_value = "'.$_GET['edit'].'"
                ;');
      
      //$db->debug();
      
     $new_pictures = $db->get_results('SELECT * FROM plugin_gallery_pictures WHERE plugin_gallery_picture_new = 1 AND plugin_gallery_id = '.$_GET['edit'].' AND plugin_gallery_picture_ts_delete IS NULL; '); 
      
     if(count($new_pictures)>0)
     {
      $db->query('UPDATE plugin_gallery_pictures SET plugin_gallery_picture_new = 0');
      
      $feed_content = count($new_pictures).' neue Bilder in &bdquo;'.$_POST['gallery_title'].'&ldquo;<br />';
     
      $max_width = '60px'; //150px
      $max_height = '50px';
      if(count($new_pictures) < 3) 
      { $max_pics = count($new_pictures); } else
      { $max_pics = 3; }
     
      $i=0;
     
      $feed_content.='<div class="gallery-thumbnails" style="margin-bottom:-20px;">';
      foreach ($new_pictures as $pic)
      {
        if($max_pics <= $i) break;
        $path = './'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_filename;
    
        if($pic->plugin_gallery_picture_thumbnail_filename != "") 
          { $path_thumb = './'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_thumbnail_filename; } else
          { $path_thumb = $path; }
        
    
        $feed_content.='
          <div class="gallery" title="'.$pic->plugin_gallery_picture_description.'" style="margin:5px;float:left;max-width:'.$max_width.';max-height:'.$max_height.';" rel="'.$pic->plugin_gallery_picture_id.'">
            <a href="'.$path.'" class="gallerylink">
              <img style="max-width:'.$max_width.';max-height:'.$max_height.';border:1px solid black" src="'.$path_thumb.'">
            </a>
          </div>
          ';
          $i++;
        }
        $feed_content.='</div><br style="clear:left" />';
      
        $feedbar_insert = $db->query(
        'INSERT INTO feeds 
                  (feed_type, 
                   feed_link, 
                   feed_ts, 
                   feed_content)
           VALUES ("gallery",
                   "?p='.$_POST['page_id'].'",
                   NOW(),
                   "'.$db->escape($feed_content).'");
        ');
      }
    if(!$update)
    { message('Update fehlgeschlagen','error'); } else
    { message('Update erfolgreich','success'); }
  }
  
  
  $gallery = $db->get_row('SELECT * FROM plugin_gallerys 
                                   WHERE plugin_gallery_id = '.$_GET['edit'].';');
                              
  $gallery_info = $db->get_row('SELECT * FROM plugin2page 
                                   LEFT JOIN plugins ON plugin2page.plugin_id = plugins.plugin_id 
                                       WHERE plugin2page.plugin2page_value_name = "gallery_id" 
                                         AND plugin2page.plugin_id = "'.$plugin_data->plugin_id.'"
                                         AND plugin2page.plugin2page_value = "'.$_GET['edit'].'";');
  
  if(!$gallery_info->page_id)
  {
    $db->query('INSERT INTO plugin2page (plugin_id, plugin2page_value_name, plugin2page.plugin2page_value) 
                     VALUES ("'.$plugin_data->plugin_id.'", "gallery_id", "'.$_GET['edit'].'");');
  }
  
  
  $content.='zur&uuml;ck zur <a href="?action=plugins&plugin=gallery">Galerie-&Uuml;bersicht</a><br /><br />';

  $content.= '
  <script>$(document).ready(function() { loadGallery('.$_GET['edit'].'); createUploader('.$_GET['edit'].'); });</script>
  <form action="?action=plugins&plugin=gallery&edit='.$_GET['edit'].'" method="post">
  <div style="width:900px;float:left">
    <span title="Galerie-Titel"><input type="text" class="biginput" style="width:500px;font-size:20px;" value="'.$gallery->plugin_gallery_name.'" name="gallery_title"></span>
    <span title="Beschreibung"><input type="text" class="biginput" style="width:500px;font-size:14px;" value="'.$gallery->plugin_gallery_description.'" name="gallery_description"></span>
    <div style="width:150px;margin:10px;margin-top:-20px;float:right;">
    Seitenzuordnung:<br />
      '.genPageDropdown(false, $gallery_info->page_id).'
    </div>
    <input type="submit" value="Speichern" class="biginput" name="bt_submit" style="width:150px;margin:10px;margin-top:-20px;float:right;"><br style="clear:both;">
  </div>
  <span style="float:right;margin:10px" title="Bilder-Upload" onclick="toggleUpload()">'.icon('upload', 2).'</span>
  <br style="clear:left"><br />
  <hr style="width:80%;height:1px;background-color:lightgray;margin:0">
  <div id="upload" style="margin-right:-1px;float:right;width:250px;height:300px;border:1px solid lightgray;display:none;padding:10px;">
    <b>Bild-Upload</b><br /><br />
    <div id="picture_upload"></div>
  </div>
  <div id="gallery"></div>
  '; 
  
  
  
  $content.='</form>';
}
elseif(isset($_GET['new']))
{
  $db->query('INSERT INTO plugin_gallerys (plugin_gallery_ts_create, plugin_gallery_id_create) VALUES (NOW(), '.$_SESSION['user_id'].')');
 
  $gallery_id = $db->insert_id;
  
  header('Location: index.php?action=plugins&plugin=gallery&edit='.$gallery_id);
}
else
{
  $content.= '<b>Ihre Optionen:</b> <a href="?action=plugins&plugin=gallery&new=1">Galerie anlegen</a> - Plugin-Einstellungen &auml;ndern<br />';

  $gallerys = $db->get_results('SELECT * FROM plugin_gallerys WHERE plugin_gallery_ts_delete IS NULL');

  if(count($gallerys) > 0)
  {
    $content.= '<br /><h3>'.((count($gallerys)>1)? count($gallerys):"eine").' Galerie'.((count($gallerys)>1)? "n":"").' vorhanden:</h3>
    <table>
      <tr>
        <th style="width:30px;">&nbsp;</th>
        <th style="width:25px">ID</th>
        <th style="width:150px">Name</th>
        <th>Beschreibung</th>
        <th style="width:60px;">&nbsp;</th>
      </tr>';
  
    foreach($gallerys as $gallery)
    {
      $creator = ' von '.getUsername($gallery->plugin_gallery_id_create);
		  if($gallery->plugin_gallery_ts_update != '') { 
			  $change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($gallery->plugin_gallery_ts_update, "d.m.y, H:i").' Uhr'; 
			  $changer = ' von '.getUsername($gallery->plugin_gallery_id_update);
		  } 
		
		  $created = "<b>Erstellt:</b> <br />".date_mysql($gallery->plugin_gallery_ts_create, "d.m.y, H:i")." Uhr".$creator." ".$change.$changer;
  
      $content.= '
      <tr>
        <td><a href="?action=plugins&plugin=gallery&edit='.$gallery->plugin_gallery_id.'" title="Galerie bearbeiten">'.icon('edit', '2').'</a></td>
        <td>'.$gallery->plugin_gallery_id.'</td>
        <td style="text-align:left"><b>'.$gallery->plugin_gallery_name.'</b></td>
        <td>'.$gallery->plugin_gallery_description.'</td>
        <td>
          <span title="'.$created.'">'.icon('info', '2').'</span>
          <span title="'.l('Galerie löschen').'" onclick="deleteData(\'plugin_gallery\', '.$gallery->plugin_gallery_id.')">'.icon('delete', '2').'</span>
        </td>
      </tr>';
    } 
  
    $content.= '</table>';
  }
  else
  {
    message('Es sind noch keine Gallerien vorhanden', 'message');
  }
}

?>