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
																							 page_parent,
																							 menu_id) 
																			 VALUES ("'.utf8_decode($db->escape($_POST['page_title'])).'",
																			 				 "'.utf8_decode($db->escape($_POST['page_content'])).'",
																			 				 NOW(),
																			 				 "'.$_SESSION['user_id'].'",
																			 				 '.$page_comments.',
																			 				 '.$page_loginrequired.',
																			 				 "'.$_POST['page_parent'].'",
																			 				 "'.$_POST['menu_id'].'");');
																			 				 
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
$page_dropdown = genPageDropdown(false, $pages->page_parent);


	if($_POST['page_save'])
	{
		if($_POST['page_title'] != '' && $_POST['page_title'] != "Geben Sie hier den Titel an" && $_POST['page_content'] != '')
		{
			if($_POST['page_comments'] == 'on') { $page_comments = '1'; } else { $page_comments = '0'; }
			if($_POST['page_loginrequired'] == 'on') { $page_loginrequired = '1'; } else { $page_loginrequired = '0'; }
			
			if($_POST['page_id'] == 0)
			{
			  $menu_id = $_POST['menu_id'];
			}
			else
			{
			  $menu_id = $db->get_var("SELECT menu_id FROM pages WHERE page_id = '".getMainPage($_POST['page_id'])."';");
			}
			
			
			$insert = $db->query('UPDATE pages SET page_title = "'.utf8_decode($db->escape($_POST['page_title'])).'", 
																						 page_content = "'.utf8_decode($db->escape($_POST['page_content'])).'", 
																						 page_ts_update = NOW(), 
																						 page_id_update = '.$_SESSION['user_id'].', 
																						 page_comments = '.$page_comments.', 
																						 page_loginrequired = '.$page_loginrequired.',
																						 page_parent = "'.$_POST['page_id'].'",
																						 menu_id = "'.$_POST['menu_id'].'"
																			 WHERE page_id = '.$_GET['edit'].';');
																			 				 
			if($insert) { message("Die Seite wurde erfolgreich gespeichert", 'success'); }
			else { message('Die Seite konnte nicht gespeichert werden', 'error'); }
		}
		else
		{ message("Bitte geben sie einen Titel und Inhalt an", 'error'); }
	}
	
	$pages = $db->get_row('SELECT * FROM pages WHERE page_ts_delete IS NULL AND page_id = '.mysql_real_escape_string($_GET['edit']).';');
	
	if($pages->page_comments == '1') { $page_comments = ' checked'; } else { $page_comments = ''; }
	if($pages->page_loginrequired == '1') { $page_loginrequired = ' checked'; } else { $page_loginrequired = ''; }
	
	include('inc_tpls/pages.tpl.php');
	$content.= $tpl_page_form2;
}
else
{
	$pages = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL ORDER BY page_title;');
	
	include('inc_tpls/pages.tpl.php');
	$content.= $tpl_page_tablehead;
	
	foreach($pages as $pagess)
	{
		$creator = ' von '.getUsername($pagess->page_author);
		if($pagess->page_ts_update != '') { 
			$change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($pagess->page_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.getUsername($pagess->page_id_update);
		} else { 
			$change = ''; 
			$changer = '';
		}
		
		$created = "<b>Erstellt:</b> <br />".date_mysql($pagess->page_ts_create, "d.m.y, H:i")." Uhr".$creator." ".$change.$changer;
		
		$page_plugin = $db->get_var('SELECT plugin_name FROM plugins INNER JOIN plugin2page ON plugin2page.plugin_id = plugins.plugin_id WHERE plugin2page.page_id = '.$pagess->page_id.';');
		
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