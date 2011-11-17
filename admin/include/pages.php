<?php
include('inc_tpls/pages.tpl.php');


$page['pages']['title'] = l("Seiten");

$content = "";
$content.= $tpl_page_head;

if(isset($_GET['new']))
{
$page['pages']['title'].= " - ".l("neue Seite");
  $page_dropdown = genPageDropdown(true);
  
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
																							 page_loginrequired,
																							 page_parent) 
																			 VALUES ("'.mysql_real_escape_string($_POST['page_title']).'",
																			 				 "'.mysql_real_escape_string($_POST['page_content']).'",
																			 				 NOW(),
																			 				 "'.$_SESSION['user_id'].'",
																			 				 '.mysql_real_escape_string($page_comments).',
																			 				 '.mysql_real_escape_string($page_loginrequired).',
																			 				 "'.$_POST['page_parent'].'");');
																			 				 
			if($insert) { message("Die Seite wurde erfolgreich gespeichert", 'success'); }
			else { message('Die Seite konnte nicht gespeichert werden', 'error'); }
		}
		else
		{ message("Bitte geben sie einen Titel und Inhalt an", 'error'); }
	}
	include('inc_tpls/pages.tpl.php');
	$content.= $tpl_page_form1;
}
elseif(isset($_GET['edit']))
{
$page['pages']['title'].= " - Seite bearbeiten";

$pages = $db->get_row('SELECT * FROM pages WHERE page_ts_delete IS NULL AND page_id = '.mysql_real_escape_string($_GET['edit']).';');
$page_dropdown = genPageDropdown(true, $pages->page_parent);


	if($_POST['page_save'])
	{
		if($_POST['page_title'] != '' && $_POST['page_title'] != "Geben Sie hier den Titel an" && $_POST['page_content'] != '')
		{
			if($_POST['page_comments'] == 'on') { $page_comments = '1'; } else { $page_comments = '0'; }
			if($_POST['page_loginrequired'] == 'on') { $page_loginrequired = '1'; } else { $page_loginrequired = '0'; }
			
			$insert = $db->query('UPDATE pages SET page_title = "'.mysql_real_escape_string($_POST['page_title']).'", 
																						 page_content = "'.$_POST['page_content'].'", 
																						 page_ts_update = NOW(), 
																						 page_id_update = '.$_SESSION['user_id'].', 
																						 page_comments = '.mysql_real_escape_string($page_comments).', 
																						 page_loginrequired = '.mysql_real_escape_string($page_loginrequired).',
																						 page_parent = "'.$_POST['page_parent'].'"
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
	
	include('inc_tpls/pages.tpl.php');
	$content.= $tpl_page_form2;
}
else
{
	$pages = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL;');
	
	include('inc_tpls/pages.tpl.php');
	$content.= $tpl_page_tablehead;
	
	foreach($pages as $pagess)
	{
		$creator = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$pagess->page_author.";");
		if($pagess->page_ts_update != '') { 
			$change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($pagess->page_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$pagess->page_id_update.";");
		} else { 
			$change = ''; 
			$changer = '';
		}
		
		$created = "<b>Erstellt:</b> <br />".date_mysql($pagess->page_ts_create, "d.m.y, H:i")." Uhr".$creator." ".$change.$changer;
		
		if($pagess->page_loginrequired == '1') { 
		      $login_ico_color = "color";
				  $login_ico_title = 'Seite ist nur eingeloggten Nutzern zug&auml;nglich'; 
				} else {
				  $login_ico_color = "gray";
				  $login_ico_title = 'Seite ist jedem zug&auml;nglich'; 
		    }
		    
		if($pagess->page_comments == '1') { 
		      $comment_ico_color = "color";
				  $comment_ico_title = 'Kommentare erlaubt'; 
				} else { 
				  $comment_ico_color = "gray";
				  $comment_ico_title = 'Kommentare nicht erlaubt';  }
		
		include('inc_tpls/pages.tpl.php');
		$content.= $tpl_page_tablebody;
	}
	$content.= "
	</table>";
}

$page['pages']['content'] = $content;
?>