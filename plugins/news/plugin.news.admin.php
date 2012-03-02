<?php

$content.='<script type="text/javascript" src="'.$app_folder.'plugins/news/plugin.news.js.php"></script>';

if(isset($_GET['edit']) && $_GET['edit']!='' && $_GET['edit']!='0')
{
  
  if($_GET['msg'] == 'savesuccess') message('Speichern erfolgreich','success'); 
  if($_GET['msg'] == 'saveerror') message('Speichern fehlgeschlagen','error');
  
  if(isset($_POST['news_save']))
  {
    if($_POST['comments_allowed'] == 'on') { $comments_allowed = '1'; } else { $comments_allowed = '0'; }
    if($_POST['display'] == 'on') { $display = '1'; } else { $display = '0'; }
  
    $update = $db->query(
      "UPDATE plugin_news 
          SET plugin_news_content = '".$db->escape(utf8_decode($_POST['news_content']))."', 
              plugin_news_title = '".$db->escape(utf8_decode($_POST['news_title']))."',
              plugin_news_comments_allowed = ".$comments_allowed.",
              plugin_news_display = ".$display." 
        WHERE plugin_news_id = ".$_GET['edit']."
      ;");
      
    if(!$update)
    { message('Update fehlgeschlagen','error');} else
    { message('Update erfolgreich','success'); }
  }
  $news = $db->get_row('SELECT * FROM plugin_news WHERE plugin_news_id = '.$_GET['edit'].';');
  
  $content.='zur&uuml;ck zur <a href="?action=plugins&plugin=news">News-&Uuml;bersicht</a><br /><br />';
  
  
  $content.='
  <form action="index.php?action=plugins&plugin=news&edit='.$_GET['edit'].'" method="post">
		<div style="float:right;margin-right:10px;" id="submitbox">
			<span><input id="comments" type="checkbox" name="comments_allowed"'.(($news->plugin_news_comments_allowed=='1')? 'checked="checked"':'').'><label for="comments">Kommentare erlaubt</label></span>
			<span><input id="display" type="checkbox" name="display"'.(($news->plugin_news_display=='1')? 'checked="checked"':'').'><label for="display">&Ouml;ffentlich anzeigen</label></span>
			
			<input type="submit" value="Speichern" name="news_save">
		</div>
		<div id="pages" style="float:left">
			<input type="text" id="titletext" style="color:black" value="'.$news->plugin_news_title.'" name="news_title"><br />
			<textarea id="editor_small" name="news_content">'.$news->plugin_news_content.'</textarea>
		</div>
	</form>
  ';
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
      VALUES ('".$db->escape($_POST['news_content'])."', 
              '".$db->escape($_POST['news_title'])."',
              ".$comments_allowed.",
              ".$display.",
              NOW(),
              '".$_SESSION['user_id']."')
      ;");
    
    $news_id = $db->insert_id;
    
    if($feedbar == '1')
    {  
      $feedbar_insert = $db->query(
      "INSERT INTO feeds 
                  (feed_type, 
                   feed_link, 
                   feed_ts, 
                   feed_content)
           VALUES ('news',
                   '?p=1&news_id=".$news_id."',
                   NOW(),
                   '".$db->escape(utf8_encode($_POST['news_content']))."');
      ");
      //$db->debug();
    }  
    
    header('Location: index.php?action=plugins&plugin=news&msg=savesuccess&edit='.$news_id);
    
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
			<textarea id="editor_small" name="news_content"></textarea>
		</div>
	</form>
  ';
}
else
{
  $content.= '<b>Ihre Optionen:</b> <a href="?action=plugins&plugin=news&new=1">News schreiben</a> - Einstellungen &auml;ndern<br />';

  $news = $db->get_results('SELECT * FROM plugin_news WHERE plugin_news_ts_delete IS NULL ORDER BY plugin_news_ts_create DESC');

  if(count($news) > 0)
  {
    $content.= '<br /><h3>'.count($news).' News vorhanden:</h3>
    <table>
      <tr>
        <th style="width:30px;">&nbsp;</th>
        <th style="width:25px">ID</th>
        <th>Titel</th>
        <th style="width:60px;">Autor</th>
        <th style="width:60px;">&nbsp;</th>
      </tr>';
  
    foreach($news as $new)
    {
      $creator = ' von '.getUsername($new->plugin_news_id_create);
		  if($new->plugin_news_ts_update != '') { 
			  $change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($pagess->plugin_news_ts_update, "d.m.y, H:i").' Uhr'; 
			  $changer = ' von '.getUsername($new->plugin_news_id_update);
		  } 
		
		  $created = "<b>Erstellt:</b> <br />".date_mysql($new->plugin_news_ts_create, "d.m.y, H:i")." Uhr".$creator." ".$change.$changer;
  
      $content.= '
      <tr>
        <td><a href="?action=plugins&plugin=news&edit='.$new->plugin_news_id.'" title="News bearbeiten">'.icon('edit', '2').'</a></td>
        <td>'.$new->plugin_news_id.'</td>
        <td style="text-align:left"><b>'.$new->plugin_news_title.'</b></td>
        <td><span class="miniprofile" rel="'.$new->plugin_news_id_create.'">'.getUsername($new->plugin_news_id_create).'</span></td>
        <td>
          <span title="'.$created.'">'.icon('info', '2').'</span>
          <span title="'.l('News löschen').'" onclick="deleteData(\'plugin_news\', '.$new->plugin_news_id.')">'.icon('delete', '2').'</span>
        </td>
      </tr>';
    } 
  
    $content.= '</table>';
  }
  else
  {
    message('Es sind noch keine News vorhanden', 'message');
  }
}

?>