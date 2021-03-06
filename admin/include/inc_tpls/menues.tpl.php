<?php
$tpl_menues_head = '<script type="text/javascript" src="js/menu.js"></script>';

$tpl_menues_form1 = "<form action='index.php?action=".$_GET['action']."&edit=".$_GET['edit']."' method='post'>
  <table>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Link-Name</td>
			<td>
			  <!--<img src='".icon('plus')."' id='newlink' title='Neuen Link zum Men&uuml; hinzuf&uuml;gen' onclick='addMenuItem(".$new_item_id.")'>-->
			  <img src='".icon('plus')."' id='newlink_disabled' title='Speichern Sie bitte erst den neuen Link' style='display:none'>
			</td>
		</tr><tbody class='content'>";
		
$tpl_menues_table = "
		<tr id='id_".$menu_item->page_id."'>
			<td style='width:50px'>
			  <img src='".icon('move')."' class='handle' style='cursor:move' title='Sortierung &auml;ndern'>
				<!--&nbsp;<a onclick='deleteMenuItem(".$menu_item->page_id.")'><img src='".icon('delete')."' title='L&ouml;schen'></a>-->
			</td>
			<td>".$menu_item->page_id."</td>
			<td id='menu_name".$menu_item->menu_item_id."'>
			  <span id='extend_option_".$menu_item->menu_item_id."' style='height:20px;float:left'>
			    ".$menu_item->page_title."
			  </span>
			  &nbsp;<img src='".icon('check')."' id='success_ico_".$menu_item->menu_item_id."' style='float:left;display:none'>
			  <div id='extended_option_".$menu_item->menu_item_id."' style='height:175px;float:left;display:none;'>
			    <table id='extended_option' style='width:500px;border:0'>
			    <tr>
			      <td style='width:80px;'>Link-Name:</td><td><input type='text' style='width:200px' class='tip' title='Link-Name' value='".$menu_item->menu_item_title."' id='link_name_".$menu_item->menu_item_id."'></td>
			      <td rowspan='7' style='width:50px;'>&nbsp;</td>
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
			        <td>Seite:</td><td>".$menu_item->genPageDropdown."</td>
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
			  <!--<img src='".icon('edit')."' title='Link bearbeiten' id='maximize".$menu_item->menu_item_id."' style='float:right;margin-top:3px;' onclick='extendMenuOptions(".$menu_item->menu_item_id.")'>-->
			  <img src='".icon('save')."' title='Link speichern' id='save".$menu_item->menu_item_id."' style='float:right;margin-top:3px;display:none' onclick='saveMenuOptions(".$menu_item->menu_item_id.")'>
			  <img src='".icon('minus')."' title='Editor einklappen' id='minimize".$menu_item->menu_item_id."' style='float:right;margin-right:3px;margin-top:3px;display:none' onclick='hideMenuOptions(".$menu_item->menu_item_id.")'>
			</td>
			<td>
			  <img src='".icon('info')."' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
		
$tpl_menues_tableend = "</tbody>
	</table>
	<input type='hidden' name='order_array' value='' id='order_array'>
	<input type='hidden' name='menu_id' value='".$_GET['edit']."' id='menu_id'>
	</form>";
	
$tpl_menues_tablehead = "
	<table>
		<tr style='font-weight:bold'>
			<td style='width:50px;'>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td style='width:20px;'>&nbsp;</td>
		</tr>";
		
$tpl_menues_tablelist = "
		<tr>
			<td>
				<a href='index.php?action=menues&edit=".$menu->menu_id."'><img src='".icon('settings')."' title='Men&uuml; \"".$menu->menu_name."\" bearbeiten'></a>
				&nbsp;<!--<a onclick='deleteMenu(".$menu->menu_id.")'>--><img src='".icon('delete')."' style='opacity:0.4' title='L&ouml;schen noch nicht m&ouml;glich'></a>
			</td>
			<td>".$menu->menu_id."</td>
			<td id='menu_name".$menu->menu_id."'><span>".$nochange_start."<img src='".icon('write')."' title='Namen &auml;ndern' onclick='editMenuName(".$menu->menu_id.")'>".$nochange_end."&nbsp;".$menu->menu_name."</span></td>
			<td><img src='".icon('info')."' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
?>