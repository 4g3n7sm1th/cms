<?php

$page['users']['title'] = "Benutzer";

$content = "";
$content.= '<script type="text/javascript" src="js/users.js"></script>';

if(isset($_GET['new']))
{
	if($_POST['page_save'])
	{
		if($_POST['page_title'] != '' && $_POST['page_title'] != "Geben Sie hier den Titel an" && $_POST['page_content'] != '')
		{
			if($_POST['page_comments'] == 'on') { $page_comments = '1'; } else { $page_comments = '0'; }
			if($_POST['page_loginrequired'] == 'on') { $page_loginrequired = '1'; } else { $page_loginrequired = '0'; }
			
			$insert = $db->query('INSERT INTO pages (page_title, 
																							 page_content, 
																							 page_ts_create, 
																							 page_author, 
																							 page_comments, 
																							 page_loginrequired) 
																			 VALUES ("'.mysql_real_escape_string($_POST['page_title']).'",
																			 				 "'.mysql_real_escape_string($_POST['page_content']).'",
																			 				 NOW(),
																			 				 "'.$_SESSION['user_id'].'",
																			 				 '.mysql_real_escape_string($page_comments).',
																			 				 '.mysql_real_escape_string($page_loginrequired).');');
																			 				 
			if($insert) { message("Die Seite wurde erfolgreich gespeichert", 'success'); }
			else { message('Die Seite konnte nicht gespeichert werden', 'error'); }
		}
		else
		{ message("Bitte geben sie einen Titel und Inhalt an", 'error'); }
	}
	$content.='	<form action="index.php?action=pages&new=1" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span style="float:left;margin-left:10px;"><input id="loginrequired" type="checkbox" name="page_loginrequired"><label for="loginrequired">Login ben&ouml;tigt</label></span><br />
									<span style="float:left;margin-left:10px;"><input id="comments" type="checkbox" name="page_comments" checked><label for="comments">Kommentare erlaubt</label></span>
									</span>
									<input type="submit" value="Speichern" name="page_save">
								</div>
								<div id="pages" style="float:left">
									<input type="text" id="titletext" value="Geben Sie hier den Titel an" name="page_title"><br />
									<textarea class="tinymce" rows="25" cols="80" name="page_content"></textarea>
								</div>
							</form>';
}
elseif(isset($_GET['edit']))
{
	if($_POST['page_save'])
	{
		if($_POST['page_title'] != '' && $_POST['page_title'] != "Geben Sie hier den Titel an" && $_POST['page_content'] != '')
		{
			if($_POST['page_comments'] == 'on') { $page_comments = '1'; } else { $page_comments = '0'; }
			if($_POST['page_loginrequired'] == 'on') { $page_loginrequired = '1'; } else { $page_loginrequired = '0'; }
			
			$insert = $db->query('UPDATE pages SET page_title = "'.mysql_real_escape_string($_POST['page_title']).'", 
																						 page_content = "'.mysql_real_escape_string($_POST['page_content']).'", 
																						 page_ts_update = NOW(), 
																						 page_id_update = '.$_SESSION['user_id'].', 
																						 page_comments = '.mysql_real_escape_string($page_comments).', 
																						 page_loginrequired = '.mysql_real_escape_string($page_loginrequired).'
																			 WHERE page_id = '.mysql_real_escape_string($_GET['edit']).';');
																			 				 
			if($insert) { message("Die Seite wurde erfolgreich gespeichert", 'success'); }
			else { message('Die Seite konnte nicht gespeichert werden', 'error'); }
		}
		else
		{ message("Bitte geben sie einen Titel und Inhalt an", 'error'); }
	}
	
	$pages = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL AND page_id = '.mysql_real_escape_string($_GET['edit']).';');
	
	if($pages[0]->page_comments == '1') { $page_comments = ' checked'; } else { $page_comments = ''; }
	if($pages[0]->page_loginrequired == '1') { $page_loginrequired = ' checked'; } else { $page_loginrequired = ''; }
	
	$content.='	<form action="index.php?action=pages&edit='.$_GET['edit'].'" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span><input id="loginrequired" type="checkbox" name="page_loginrequired"'.$page_loginrequired.'><label for="loginrequired">Login ben&ouml;tigt</label></span><br />
									<span><input id="comments" type="checkbox" name="page_comments"'.$page_comments.'><label for="comments">Kommentare erlaubt</label></span>
									</span>
									<input type="submit" value="Speichern" name="page_save">
								</div>
								<div id="pages" style="float:left">
									<input type="text" id="titletext" style="color:black" value="'.$pages[0]->page_title.'" name="page_title"><br />
									<textarea class="tinymce" rows="25" cols="80" name="page_content">'.$pages[0]->page_content.'</textarea>
								</div>
							</form>';
}
else
{
	$pages = $db->get_results('SELECT * FROM users WHERE user_ts_delete IS NULL;');
	$content.= "<table id='users'><tr style='font-weight:bold'><td>&nbsp;</td><td>ID</td><td>Name</td><td>Erstellt</td><td>letzte Änderung</td><td>&nbsp;</td></tr>";
	foreach($pages as $pagess)
	{
		$creator = $db->get_var("SELECT user_name FROM users WHERE user_id = ".$pagess->user_id_create.";");
		if($pagess->page_ts_update != '') { 
			$change = date_mysql($pagess->user_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$pagess->user_id_update.";");
		} else { 
			$change = ''; 
			$changer = '';
		}
		$content.= "<tr><td><a href='index.php?action=pages&edit=".$pagess->page_id."'><img src='ico/color/reply.png' title='Seite \"".$pagess->page_title."\" bearbeiten'></a>&nbsp;<a onclick='deletePage(".$pagess->page_id.")'><img src='ico/color/action_delete.png' title='L&ouml;schen'></a></td>";
		$content.= "<td>".$pagess->user_id."</td><td>".$pagess->user_name."</td><td>".date_mysql($pagess->user_ts_create, "d.m.y, H:i")." Uhr von ".$creator."</td><td>".$change.$changer."</td><td>";
		if($pagess->user_active == '1') { $content.= "<img src='ico/color/login.png' title='Benutzer ist aktiviert'>"; } else { $content.= "<img src='ico/gray/login.png' title='Benutzer ist nicht aktiviert'>"; }		
		$content.= "</td></tr>";
	}
	$content.= "</table>";
}

$page['users']['content'] = $content;
?>