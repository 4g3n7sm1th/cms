<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");

switch($_POST['req']) {
	case 'updateMenuItemOrder':
	
	$orders = $_POST['id'];
	//echo print_r($_POST);
	
	$i=0;
	$save = false;
	
	foreach($orders as $order)
	{
	  $order_number = $i+1;
	  
	  $sql = 'UPDATE menu_items SET menu_item_order_id = '.$order_number.', menu_item_ts_update = NOW(), menu_item_id_update = "'.$_SESSION['user_id'].'" WHERE menu_item_id = '.$_POST['dummy_link'][$i].' AND menu_id = '.$_POST['menu_id'].';';
	  //echo $sql;
	  $update = $db->query($sql);
	  
	  if($update)
	  { $save = true; }
	  
	  $i++;
	}
	
	if($save == true)
	  { $echo = '<span class="message-success">Sortierung erfolgreich aktualisiert</span>'; } else
	  { $echo = '<span class="message-error">Sortierung konnte nicht aktualisiert werden</span>'; }
	  
	echo $echo;
	
	break;
	
	case 'saveMenuOptions':
    $link_name =   escape($_POST['link_name']);
    $change_type = escape($_POST['change_type']);
    $page_id =     escape($_POST['page_id']);
    $extern_link = escape($_POST['extern_link']);
    $isvisible =   escape($_POST['isvisible']);
    $link_target = escape($_POST['link_target']);
		$item_id =     escape($_POST['item_id']);
		$new_menu =    escape($_POST['new_menu']);
		$menu_id =     escape($_POST['menu_id']);
		
		$max_order_id = $db->get_var('SELECT MAX(menu_item_order_id) FROM menu_items WHERE menu_id = "'.$menu_id.'"');
		
		if($new_menu == '0')
		{
		$sql = '
		UPDATE menu_items 
		   SET menu_item_title = "'.$link_name.'",
		       menu_item_link = "'.$extern_link.'",
		       menu_item_target = "'.$link_target.'",
		       menu_item_page = "'.$page_id.'",
		       menu_item_visible = "'.$isvisible.'"
		 WHERE menu_item_id = '.$item_id.';
		';
		}
		else
		{
		$sql = '
		INSERT INTO menu_items 
		           (menu_item_title,
		            menu_item_link,
		            menu_item_target,
		            menu_item_page,
		            menu_item_visible,
		            menu_id,
		            menu_item_order_id,
		            menu_item_ts_create,
		            menu_item_id_create)
		    VALUES ("'.$link_name.'",
		            "'.$extern_link.'",
		            "'.$link_target.'",
		            "'.$page_id.'",
		            "'.$isvisible.'",
		            "'.$menu_id.'",
		            "'.$max_order_id.'",
		            NOW(),
		            "'.$_SESSION['user_id'].'");
		';
		}
		
		
		$update = $db->query($sql);
		
		if(!$update)
		{ echo '0'; }
		else
		{ echo $link_name; }
		
	break;
	
	case 'deletePage':
		$page_id = $_POST['page_id'];
		
		$delete = $db->query('UPDATE pages SET page_ts_delete = NOW(), page_id_delete = "'.$_SESSION['user_id'].'" WHERE page_id = '.$page_id.'');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'deleteMenuItem':
		$menu_item_id = $_POST['menu_item_id'];
		
		$sql = 'UPDATE menu_items SET menu_item_ts_delete = NOW(), menu_item_id_delete = "'.$_SESSION['user_id'].'" WHERE menu_item_id = '.$menu_item_id.';';
		
		$delete = $db->query($sql);
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'deleteMenu':
		$menu_id = $_POST['menu_id'];
		
		$sql = 'UPDATE menues SET menu_ts_delete = NOW(), menu_id_delete = "'.$_SESSION['user_id'].'" WHERE menu_id = '.$menu_id.';';
		
		$delete = $db->query($sql);
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'deleteUser':
		$user_id = $_POST['user_id'];
		
		$delete = $db->query('UPDATE users SET user_ts_delete = NOW(), user_id_delete = "'.$_SESSION['user_id'].'", user_active = 0 WHERE user_id = '.$user_id.';');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'saveMenuName':
		
		$menu_name = $_POST['menu_name'];
		$menu_id = $_POST['menu_id'];
		
		
		$save = $db->query('UPDATE menus SET menu_name = "'.escape($menu_name).'", menu_ts_update = NOW(), menu_id_update = "'.$_SESSION['user_id'].'" WHERE menu_id = '.$menu_id.';');
		
		if(!$save)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	default:
	  echo '0';
	break;
}
?>