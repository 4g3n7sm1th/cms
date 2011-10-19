<?php

$page['menues']['title'] = "Men&uuml;s";

$content = "";
$content.= '<script type="text/javascript" src="js/menu.js"></script>';
$content.= '';

if(isset($_GET['edit']))
{
  $page['menues']['title'].= ' - Links bearbeiten';
	
	$menu_items = $db->get_results('SELECT * FROM menu_items WHERE menu_item_ts_delete IS NULL AND menu_id = '.escape($_GET['edit']).' ORDER BY menu_item_order_id ASC;');
	$new_item_id = $db->get_var('SELECT MAX(menu_item_id) FROM menu_items');
	$new_item_id = $new_item_id+1;
	
	$content.="<form action='index.php?action=".$_GET['action']."&edit=".$_GET['edit']."' method='post'><table id='users'>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Link-Name</td>
			<td>
			  <img src='ico/color/action_add.png' id='newlink' title='Neuen Link zum Men&uuml; hinzuf&uuml;gen' onclick='addMenuItem(".$new_item_id.")'>
			  <img src='ico/gray/action_add.png' id='newlink_disabled' title='Speichern Sie bitte erst den neuen Link' style='display:none'>
			</td>
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
		
		$content.= "
		<tr id='id_".$i."'>
			<td style='width:50px'>
			  <img src='ico/color/arrow_updown.png' class='handle' style='cursor:move' title='Sortierung &auml;ndern'>
				&nbsp;<a onclick='deleteMenuItem(".$menu_item->menu_item_id.")'><img src='ico/color/action_delete.png' title='L&ouml;schen'></a>
			</td>";
		$content.= "
			<td>".$menu_item->menu_item_id."</td>
			<td id='menu_name".$menu_item->menu_item_id."'>
			  <span id='extend_option_".$menu_item->menu_item_id."' style='height:20px;float:left'>
			    ".$menu_item->menu_item_title."
			  </span>
			  &nbsp;<img src='ico/color/action_check.png' id='success_ico_".$menu_item->menu_item_id."' style='float:left;display:none'>
			  <div id='extended_option_".$menu_item->menu_item_id."' style='height:175px;float:left;display:none'>
			    <table id='extended_option' style='width:350px'>
			    <tr>
			      <td>Link-Name:</td><td><input type='text' style='width:200px' class='tip' title='Link-Name' value='".$menu_item->menu_item_title."' id='link_name_".$menu_item->menu_item_id."'></td>
			    </tr>
			    <tr>
			      <td>Link-Typ:</td>
			      <td>  
			        <select style='width:200px' id='change_type_".$menu_item->menu_item_id."' name='change_type_".$menu_item->menu_item_id."' onchange='changeMenuType(".$menu_item->menu_item_id.")'>
			          <option value='0'>Link-Typ w&auml;hlen...</option>
			          <option value='page'".$menu_ispage.">Seiten-Verlinkung</option>
			          <option value='extern'".$menu_islink.">Externer Link</option>
			        </select>
			      </td>
			    </tr>
			    <tr id='page_link_".$menu_item->menu_item_id."' style='display:none'>
			        <td>Seiten-ID:</td><td><input style='width:200px' type='text' id='page_id_".$menu_item->menu_item_id."' class='tip' title='Page-ID' value='".$menu_item_page."'></td>
			    </tr>
			    <tr id='extern_link_".$menu_item->menu_item_id."' style='display:none'>
			        <td>Link-URL:</td><td><input style='width:200px' type='text' class='tip' title='Link-URL' id='extern_link_loc_".$menu_item->menu_item_id."' value='".$menu_item_link."'></td>
			    </tr>
			    <tr id='dummy_link_".$menu_item->menu_item_id."'>
			      <td colspan='3'>&nbsp;</td>
			    </tr>
			    <tr>
			      <td>Sichtbar:</td>
			      <td>
			        <select name='isvisible' id='isvisible_".$menu_item->menu_item_id."'>
			          <option value='0'".$menu_item_visible0.">Versteckt</option>
			          <option value='1'".$menu_item_visible1.">Sichtbar</option>
			        </select>
			      </td>
			    </tr>
			    <tr>
			      <td>Link-Ziel:</td>
			      <td>
			        <select name='link_target' id='link_target_".$menu_item->menu_item_id."' title='&Ouml;ffnen in neuem Fenster?'>
			          <option value='0'".$menu_item_target0.">gleiches Fenster</option>
			          <option value='1'".$menu_item_target1.">neues Fenster</option>
			        </select>
			      </td>
			    </tr>
			  </table>
			  </div>
			  <img src='ico/color/reply.png' title='Link bearbeiten' id='maximize".$menu_item->menu_item_id."' style='float:right;margin-top:3px;' onclick='extendMenuOptions(".$menu_item->menu_item_id.")'>
			  <img src='ico/color/save.png' title='Link speichern' id='save".$menu_item->menu_item_id."' style='float:right;margin-top:3px;display:none' onclick='saveMenuOptions(".$menu_item->menu_item_id.")'>
			  <img src='ico/color/minimize.png' title='Editor einklappen' id='minimize".$menu_item->menu_item_id."' style='float:right;margin-right:3px;margin-top:3px;display:none' onclick='hideMenuOptions(".$menu_item->menu_item_id.")'>
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
	<input type='hidden' name='order_array' value='' id='order_array'>
	<input type='hidden' name='menu_id' value='".$_GET['edit']."' id='menu_id'>
	</form>";
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
				&nbsp;<!--<a onclick='deleteMenu(".$menu->menu_id.")'>--><img src='ico/gray/action_delete.png' title='L&ouml;schen noch nicht m&ouml;glich'></a>
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