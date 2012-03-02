<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) message('Login required','error');

switch($_POST['req']) {
  case 'miniprofile':
    $userss = $db->get_row('SELECT * FROM users WHERE user_id = "'.$_POST['userid'].'";');
    
    $output = "
      <table border='0' class='user_info' style='min-width:120px;'>
        <tr><td><b>Benutzer:</b></td><td>".$userss->user_name."</td></tr>
        ".((isset($userss->user_level))? '<tr><td><b>Rang:</b></td><td>'.$db->get_var('SELECT user_level_name FROM user_level WHERE user_level = '.$userss->user_level.';').'</td></tr>': '')."
        ".((isset($userss->user_firstname) && $userss->user_firstname != '' && $userss->user_firstname != '0')? '<tr><td><b>Vorname:</b></td><td>'.$userss->user_firstname.'</td></tr>':'')."
        ".((isset($userss->user_lastname) && $userss->user_lastname != '' && $userss->user_lastname != '0')? '<tr><td><b>Nachname:</b></td><td>'.$userss->user_lastname.'</td></tr>':'')."
        ".((isset($userss->user_street) && $userss->user_street != '' && $userss->user_street != '0')? '<tr><td><b>Stra&szlig;e:</b></td><td>'.$userss->user_street.' '.$userss->user_housenumber.'</td></tr>':'')."
        ".((isset($userss->user_city) && $userss->user_city != '' && $userss->user_city != '0')? '<tr><td><b>Stadt:</b></td><td>'.$userss->user_zipcode.' '.$userss->user_city.'</td></tr>':'')."
        ".((isset($userss->user_phone) && $userss->user_phone != '' && $userss->user_phone != '0')? '<tr><td><b>Telefon:</b></td><td>'.$userss->user_phone.'</td></tr>':'')."
        ".((isset($userss->user_mobile) && $userss->user_mobile != '' && $userss->user_mobile != '0')? '<tr><td><b>Handy:</b></td><td>'.$userss->user_mobile.'</td></tr>':'')."
        ".((isset($userss->user_web) && $userss->user_web != '' && $userss->user_web != '0')? '<tr><td><b>Web:</b></td><td>'.$userss->user_web.'</td></tr>':'')."
        ".((isset($userss->user_mail) && $userss->user_mail != '' && $userss->user_mail != '0')? '<tr><td><b>E-Mail:</b></td><td>'.$userss->user_mail.'</td></tr>':'')."
        ".((isset($user_level_name) && $user_level_name != '' && $user_level_name != '0')? '<tr><td><b>User-Level:</b></td><td>'.$user_level_name.'</td></tr>':'')."
      </table>";
  
    echo utf8_encode($output);
  
  break;

  case 'lng':
    echo l($_POST['str']);
  break;

  case 'changePluginStatus':
		$plugin_id = $_POST['plugin_id'];
		$status = $_POST['status'];
		
		$activate = $db->query('UPDATE plugins SET plugin_active = '.$status.' WHERE plugin_id = '.$plugin_id.'');
		
		if(!$activate)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
  
  

  case 'searchPages':
  
    $pages = $db->get_results('SELECT page_title FROM pages WHERE page_ts_delete IS NULL');
  
    //$pages = array('Home', 'News', 'Wer wir sind', 'Fanclub', 'amtm');
    //$pages = "['Home', 'News', 'Wer wir sind', 'Fanclub', 'amtm']";
    //echo json_encode($pages);
    
    $arr = '{"page_title":[';
    $i=1;
    foreach($pages as $page)
    {
      $arr.= '"'.$page->page_title.'"';
      if(count($pages) > $i) $arr.=',';
      $i++;
    }
    $arr.=']}';
    
    echo $arr;
    //echo var_dump($pages);
    //echo '[{"id":"1","value":"Home"},{"id":"1","value":"News"},{"id":"1","value":"Wer wir sind"},{"id":"1","value":"Fanclub"},{"id":"1","value":"amtm"}]';
  
  
  break;



	case 'updateMenuItemOrder':
	
	$orders = $_POST['id'];
	//echo print_r($_POST);
	
	$i=0;
	$save = false;
	//print_r($_POST);
	foreach($orders as $order)
	{
	  $order_number = $i+1;
	  
	  $sql = 'UPDATE pages SET menu_order_id = '.$order_number.', page_ts_update = NOW(), page_id_update = "'.$_SESSION['user_id'].'" WHERE page_id = '.$_POST['id'][$i].' AND menu_id = '.$_POST['menu_id'].';';
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
    $link_name    = $db->escape($_POST['link_name']);
    $change_type  = $db->escape($_POST['change_type']);
    $page_id      = $db->escape($_POST['page_id']);
    $extern_link  = $db->escape($_POST['extern_link']);
    $isvisible    = $db->escape($_POST['isvisible']);
    $link_target  = $db->escape($_POST['link_target']);
		$item_id      = $db->escape($_POST['item_id']);
		$new_menu     = $db->escape($_POST['new_menu']);
		$menu_id      = $db->escape($_POST['menu_id']);
		
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
	
	
	case 'deleteData':
		$id = $_POST['id'];
		$type = $_POST['type'];
		
		if($type == '' || $id == '') die(0);
		
		$delete = $db->query('UPDATE '.$type.((substr($type, -1)=='s')? '':'s').' SET '.$type.'_ts_delete = NOW(), '.$type.'_id_delete = "'.$_SESSION['user_id'].'" WHERE '.$type.'_id = '.$id.'');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
	break;
	
	
	case 'updateData':
		$id = $_POST['id'];
		$data = $_POST['data'];
		$type = $_POST['type'];
		$field = $_POST['field'];
		
		if($type == '' || $id == '') die(0);
		
		$delete = $db->query('UPDATE '.$type.((substr($type, -1)=='s')? '':'s').' SET '.$type.'_'.$field.' = "'.$data.'" WHERE '.$type.'_id = '.$id.'');
		
		if(!$delete)
		{ echo '0'; }
		else
		{ echo '1'; }
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
		
		
		$save = $db->query('UPDATE menus SET menu_name = "'.$db->escape($menu_name).'", menu_ts_update = NOW(), menu_id_update = "'.$_SESSION['user_id'].'" WHERE menu_id = '.$menu_id.';');
		
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