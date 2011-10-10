<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");

switch($_POST['req']) {
	
	case 'deletePage':
		$page_id = $_POST['page_id'];
		
		$delete = $db->query('UPDATE pages SET page_ts_delete = NOW() WHERE page_id = '.$page_id.'');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'deleteUser':
		$user_id = $_POST['user_id'];
		
		$delete = $db->query('UPDATE users SET user_ts_delete = NOW(), user_active = 0 WHERE user_id = '.$user_id.';');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	case 'saveMenuName':
		
		$menu_name = $_POST['menu_name'];
		$menu_id = $_POST['menu_id'];
		
		
		$save = $db->query('UPDATE menus SET menu_name = "'.escape($menu_name).'" WHERE menu_id = '.$menu_id.';');
		
		if(!$save)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
}
?>