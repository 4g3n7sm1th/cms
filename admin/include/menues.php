<?php
include('inc_tpls/menues.tpl.php');

$page['menues']['title'] = "Men&uuml;s";

$content = "";
$content.= $tpl_menues_head;
$content.= '';

if(isset($_GET['edit']))
{
  $page['menues']['title'].= ' - Links bearbeiten';
	
	$menu_items = $db->get_results('SELECT * FROM menu_items WHERE menu_item_ts_delete IS NULL AND menu_id = '.escape($_GET['edit']).' ORDER BY menu_item_order_id ASC;');
	$new_item_id = $db->get_var('SELECT MAX(menu_item_id) FROM menu_items');
	$new_item_id = $new_item_id+1;
	
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_form1;
		
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
		
		if($menu_item->menu_item_page != '0')
		{ $menu_item_page = $menu_item->menu_item_page; } else
		{ $menu_item_page = ''; }
		
		if($menu_item->menu_item_link != '0')
		{ $menu_item_link = $menu_item->menu_item_link; } else
		{ $menu_item_link = ''; }
		
		if($menu_item->menu_item_visible == '1')
		{ $menu_item_visible0 = ''; $menu_item_visible1 = ' selected'; } 
		elseif($menu_item->menu_item_visible == '0')
		{ $menu_item_visible0 = ' selected'; $menu_item_visible1 = ''; }
		
		if($menu_item->menu_item_target == '1')
		{ $menu_item_target0 = ''; $menu_item_target1 = ' selected'; } 
		elseif($menu_item->menu_item_target == '0')
		{ $menu_item_target0 = ' selected'; $menu_item_target1 = ''; }
		
		if($menu_item->menu_item_page == '0' && $menu_item->menu_item_link != '0')
		{ $menu_islink = ' selected'; $menu_ispage = ''; } 
		elseif($menu_item->menu_item_page != '0' && $menu_item->menu_item_link == '0')
		{ $menu_islink = ''; $menu_ispage = ' selected="selected"'; }
		else
		{ $menu_islink = ''; $menu_ispage = ''; }
		
		include('inc_tpls/menues.tpl.php');
		$content.= $tpl_menues_table;
	$i++;
	}
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_tableend;
	
}
else
{
$menues = $db->get_results('SELECT * FROM menus WHERE menu_ts_delete IS NULL;');
  include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_tablehead;
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
		
		include('inc_tpls/menues.tpl.php');
		$content.= $tpl_menues_tablelist;
	}
	$content.= "
	</table>";
}

$page['menues']['content'] = $content;
?>