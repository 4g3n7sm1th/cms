<?php

if(isset($_GET['edit']) && $_GET['edit']!='' && $_GET['edit']!='0')
{

  if(isset($_POST['news_save']))
  {
    if($_POST['comments_allowed'] == 'on') { $comments_allowed = '1'; } else { $comments_allowed = '0'; }
    if($_POST['display'] == 'on') { $display = '1'; } else { $display = '0'; }
  
    $update = $db->query(
      "UPDATE plugin_news 
          SET plugin_news_content = '".escape($_POST['news_content'])."', 
              plugin_news_title = '".escape($_POST['news_title'])."',
              plugin_news_comments_allowed = ".$comments_allowed.",
              plugin_news_display = ".$display." 
        WHERE plugin_news_id = ".$_GET['edit']."
      ;");
      
    if(!$update)
    { message('Update fehlgeschlagen','error'); } else
    { message('Update erfolgreich','success'); }
  }
  $gallery = $db->get_row('SELECT * FROM plugin_gallery WHERE plugin_gallery_id = '.$_GET['edit'].';');
  $pictures = $db->get_results('SELECT * FROM plugin_gallery_pictures WHERE plugin_gallery_id = '.$_GET['edit'].';');
  
  
  $content.='zur&uuml;ck zur <a href="?action=plugins&plugin=gallery">Galerie-&Uuml;bersicht</a><br /><br />';

  $content.= '
  <form action="?action=plugins&plugin=gallery&edit='.$_GET['edit'].'" method="post">
  <div style="width:700px;">
    <span title="Galerie-Titel"><input type="text" class="biginput" style="width:500px;font-size:20px;" value="'.$gallery->plugin_gallery_name.'" name="gallery_title"></span>
    <span title="Beschreibung"><input type="text" class="biginput" style="width:500px;font-size:14px;" value="'.$gallery->plugin_gallery_description.'" name="gallery_description"></span>
    <input type="submit" value="Speichern" class="biginput" name="bt_submit" style="width:150px;margin:10px;margin-top:-20px;float:right;">
  </div>
  <br /><br />'; 
  
  if(count($pictures)>0)
  {
    //$content.="Fotos vorhanden";
    //print_r($pictures);
    foreach($pictures as $pic)
    {
      $path = './../'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_filename;
    
      if($pic->plugin_gallery_picture_thumbnail_filename != "") 
        { $path_thumb = './../'.$global_upload_folder.'images/'.$pic->plugin_gallery_picture_thumbnail_filename; } else
        { $path_thumb = $path; }
        
    
      $content.='
      <div style="float:left;border:1px solid black;margin:10px;" href="'.$path.'" class="gallery" title="'.$pic->plugin_gallery_picture_description.'">
        <img style="width:150px;" src="'.$path_thumb.'">
      </div>';
    }
  }
  else
  {
    $content.="Keine Fotos vorhanden";
  }
  
  $content.='</form>';
}
elseif(isset($_GET['new']))
{
  if(isset($_POST['news_save']))
  {
    if($_POST['comments_allowed'] == 'on') { $comments_allowed = '1'; } else { $comments_allowed = '0'; }
    if($_POST['display'] == 'on') { $display = '1'; } else { $display = '0'; }
    if($_POST['feedbar'] == 'on') { $feedbar = '1'; } else { $feedbar = '0'; }
  
    $news_insert = $db->query(
 "INSERT INTO plugin_news 
             (plugin_news_content, 
              plugin_news_title, 
              plugin_news_comments_allowed, 
              plugin_news_display,
              plugin_news_ts_create,
              plugin_news_id_create)
      VALUES ('".escape($_POST['news_content'])."', 
              '".escape($_POST['news_title'])."',
              ".$comments_allowed.",
              ".$display.",
              NOW(),
              '".$_SESSION['user_id']."')
      ;");
    
    if($feedbar == '1')
    {  
      $feedbar_insert = $db->query(
      "INSERT INTO feeds 
                  (feed_type, 
                   feed_link, 
                   feed_ts, 
                   feed_content)
           VALUES ('news',
                   '?p=1&news_id=".$db->insert_id."',
                   NOW(),
                   '".strip_tags(substr($_POST['news_content'], 0, 100))."');
      ");
      //$db->debug();
    }  
    
    
    if(!$news_insert)
    { message('Update fehlgeschlagen','error'); } else
    { message('Update erfolgreich','success'); }
  }

  $content.='
  <form action="index.php?action=plugins&plugin=news&new=1" method="post">
		<div style="float:right;margin-right:10px;" id="submitbox">
			<span><input id="comments" type="checkbox" name="comments_allowed" checked="checked"><label for="comments">Kommentare erlaubt</label></span>
			<span><input id="display" type="checkbox" name="display" checked="checked"><label for="display">&Ouml;ffentlich anzeigen</label></span>
			<span><input id="feedbar" type="checkbox" name="feedbar" checked="checked"><label for="display">In die Feedbar posten</label></span>
			<input type="submit" value="Speichern" name="news_save">
		</div>
		<div id="pages" style="float:left">
			<input type="text" id="titletext" style="color:black" title="News-Titel" value="" name="news_title"><br />
			<textarea class="editor-small" rows="25" cols="80" name="news_content"></textarea>
		</div>
	</form>
  ';
}
else
{
  $content.= '<b>Ihre Optionen:</b> <a href="?action=plugins&plugin=gallery&new=1">Galerie anlegen</a> - Plugin-Einstellungen &auml;ndern<br />';

  $gallerys = $db->get_results('SELECT * FROM plugin_gallery WHERE plugin_gallery_ts_delete IS NULL');

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
			  $change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($gallery->plugin_gallerys_ts_update, "d.m.y, H:i").' Uhr'; 
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
          <span title="'.l('News löschen').'" onclick="deleteData(\'plugin_news\', '.$gallery->plugin_gallery_id.')">'.icon('delete', '2').'</span>
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