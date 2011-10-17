<?php

$page['menues']['title'] = "Men&uuml;s";

$content = "";
$content.= '<script type="text/javascript" src="js/menu.js"></script>';
$content.= '';

if(isset($_GET['edit']))
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
	
	$menu_items = $db->get_results('SELECT * FROM menu_items WHERE menu_item_ts_delete IS NULL AND menu_id = '.escape($_GET['edit']).';');
	
	$content.="<table id='users'>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td>&nbsp;</td>
		</tr><tbody class='content'>";
		
	$i=1;	
	foreach($menu_items as $menu_item)
	{
		$creator = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$menu_item->menu_item_id_create."");
		$created = '<b>Erstellt:</b> <br />'.date_mysql($menu_item->menu_item_ts_create, "d.m.y, H:i").' Uhr';
		if($menu_item->menu_item_ts_update != '') { 
			$change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($menu_item->menu_item_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$menu_item->menu_item_id_update.";");
		} else { 
			$change = ''; 
			$changer = '';
		}
		
		$content.= "
		<tr id='id_".$i."'>
			<td style='width:70px'>
			  <img src='ico/color/arrow_updown.png' class='handle' style='cursor:move' title='Sortierung &auml;ndern'>
				&nbsp;<a href='index.php?action=menues&edit=".$menu_item->menu_item_id."'><img src='ico/ico_settings.png' title='Men&uuml; \"".$menu_item->menu_item_title."\" bearbeiten'></a>
				&nbsp;<a onclick='deleteMenu(".$menu->menu_id.")'><img src='ico/color/action_delete.png' title='L&ouml;schen'></a>
			</td>";
		$content.= "
			<td>".$menu_item->menu_item_id."</td>
			<td id='menu_name".$menu_item->menu_item_id."'>
			  <div id='extend_option_".$menu_item->menu_item_id."' style='height:20px;overflow:hidden;float:left'>
			    <span><img src='ico/color/reply.png' title='Namen &auml;ndern' onclick='editMenuName(".$menu->menu_id.")'>&nbsp;".$menu_item->menu_item_title."</span>
			    <br /><br />
			    <select id='change_type_".$menu_item->menu_item_id."' name='change_type_".$menu_item->menu_item_id."' onchange='changeMenuType(".$menu_item->menu_item_id.")'>
			            <option value='0'>Link-Typ w&auml;hlen...</option>
			            <option value='page'>Seiten-Verlinkung</option>
			            <option value='extern'>Externer Link</option>
			          </select>
			          
			    <span id='page_link_".$menu_item->menu_item_id."' style='display:none'><input type='text' name='page_id' class='tip' title='Page-ID'></span>
			    <span id='extern_link_".$menu_item->menu_item_id."' style='display:none'><input type='text' class='tip' title='Link-URL' name='extern_link_loc'></span>
			    <br />
			    <input type='checkbox' name='isvisible' id='isvisible'> Sichtbar
			  </div>
			  <img src='ico/color/maximize.png' id='maximize".$menu_item->menu_item_id."' style='float:right;margin-top:3px;' onclick='extendMenuOptions(".$menu_item->menu_item_id.")'>
			  <img src='ico/color/minimize.png' id='minimize".$menu_item->menu_item_id."' style='float:right;margin-top:3px;display:none' onclick='hideMenuOptions(".$menu_item->menu_item_id.")'>
			</td>
			<td>
			  <img src='ico/ico_help.png' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
	$i++;
	}
	$content.= "
	</tbody>
	</table>
	<input type='hidden' name='order_array' value='' id='order_array'>";
}
else
{
$menues = $db->get_results('SELECT * FROM menus WHERE menu_ts_delete IS NULL;');
	$content.= "
	<table id='users'>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td>&nbsp;</td>
		</tr>";
	foreach($menues as $menu)
	{
		$creator = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$menu->menu_id_create."");
		$created = '<b>Erstellt:</b> <br />'.date_mysql($menu->menu_ts_create, "d.m.y, H:i").' Uhr';
		if($menu->menu_ts_update != '') { 
			$change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($menu->menu_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$menu->menu_id_update.";");
		} else { 
			$change = ''; 
			$changer = '';
		}
		
		$content.= "
		<tr>
			<td>
				<a href='index.php?action=menues&edit=".$menu->menu_id."'><img src='ico/ico_settings.png' title='Men&uuml; \"".$menu->menu_name."\" bearbeiten'></a>
				&nbsp;<a onclick='deleteMenu(".$menu->menu_id.")'><img src='ico/color/action_delete.png' title='L&ouml;schen'></a>
			</td>";
		$content.= "
			<td>".$menu->menu_id."</td>
			<td id='menu_name".$menu->menu_id."'><span><img src='ico/color/reply.png' title='Namen &auml;ndern' onclick='editMenuName(".$menu->menu_id.")'>&nbsp;".$menu->menu_name."</span></td>
			<td><img src='ico/ico_help.png' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
	}
	$content.= "
	</table>";
}

$page['menues']['content'] = $content;
?>