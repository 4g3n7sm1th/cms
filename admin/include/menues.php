<?php
include('inc_tpls/menues.tpl.php');

$page['menues']['title'] = l('Menüs');

$content = "";
$content.= $tpl_menues_head;
$content.= '';

if(isset($_GET['edit']))
{
  if($_GET['edit'] == '0')
  {
    if(isset($_GET['umenu']))
    {
      $page['menues']['title'].= ' - '.l('Untermenü-Punkte bearbeiten');
	
	$menu_items = $db->get_results('
	    SELECT * 
	      FROM menu_items 
	INNER JOIN menu_item2page 
	        ON menu_items.menu_item_id = menu_item2page.menu_item_id 
	     WHERE menu_id = 0 
	       AND menu_item2page.page_id = '.$_GET['umenu'].' 
	       AND menu_item_ts_delete IS NULL 
	  ORDER BY menu_item_order_id;');
	  
	if(!$menu_items) { $content.=l('Es wurden keine Menüpunkte gefunden.'); }
	else
	{
	  
	$new_item_id = $db->get_var('SELECT MAX(menu_item_id) FROM menu_items');
	$new_item_id = $new_item_id+1;
	
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_form1;
		
	$i=1;	
	foreach($menu_items as $menu_item)
	{
		$creator = ' von '.getUsername($menu_item->menu_item_id_create);
		$created = '<b>'.l('Erstellt').':</b> <br />'.date_mysql($menu_item->menu_item_ts_create, "d.m.y, H:i").' '.l('Uhr');
		if($menu_item->menu_item_ts_update != '') { 
			$change = '<br /><br /><b>'.l('Letzte Änderung').': </b><br />'.date_mysql($menu_item->menu_item_ts_update, "d.m.y, H:i").' '.l('Uhr'); 
			$changer = ' '.l('von').' '.getUsername($menu_item->menu_item_id_update);
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
	}
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_tableend;
    }
    else
    {
    $page['menues']['title'].= ' - '.l('Untermenüs bearbeiten');
	
	  $pages = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL;');
	
	  include('inc_tpls/pages.tpl.php');
	  $content.= $tpl_page_tablehead_menu_edit;
	
  	foreach($pages as $pagess)
  	{
		  $creator = ' von '.getUsername($pagess->page_author);
		  if($pagess->page_ts_update != '') { 
			  $change = '<br /><br /><b>'.l('Letzte Änderung').': </b><br />'.date_mysql($pagess->page_ts_update, "d.m.y, H:i").' '.l('Uhr'); 
			  $changer = ' '.l('von').' '.getUsername($pagess->page_id_update);
		  } else { 
			  $change = ''; 
			  $changer = '';
		  }
		
		  $created = "<b>Erstellt:</b> <br />".date_mysql($pagess->page_ts_create, "d.m.y, H:i")." Uhr".$creator." ".$change.$changer;
		
		    if($pagess->page_loginrequired == '1') { 
		      $login_ico_color = "color";
				  $login_ico_title = l('Seite ist nur eingeloggten Nutzern zugänglich'); 
				} else {
				  $login_ico_color = "gray";
				  $login_ico_title = l('Seite ist jedem zugänglich'); 
		    }
		    
		    if($pagess->page_comments == '1') { 
		      $comment_ico_color = "color";
				  $comment_ico_title = l('Kommentare erlaubt'); 
				} else { 
				  $comment_ico_color = "gray";
				  $comment_ico_title = l('Kommentare nicht erlaubt');  }
		
		  include('inc_tpls/pages.tpl.php');
		  $content.= $tpl_page_tablebody_menu_edit;
	    }
	  $content.= "
	  </table>";
	  }
  }
  else
  {
  $page['menues']['title'].= ' - '.l('Links bearbeiten');
	
	$menu_items = $db->get_results('SELECT * FROM menu_items WHERE menu_item_ts_delete IS NULL AND menu_id = '.escape($_GET['edit']).' ORDER BY menu_item_order_id ASC;');
	$new_item_id = $db->get_var('SELECT MAX(menu_item_id) FROM menu_items');
	$new_item_id = $new_item_id+1;
	
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_form1;
		
	$i=1;	
	foreach($menu_items as $menu_item)
	{
		$creator = ' von '.getUsername($menu_item->menu_item_id_create);
		$created = '<b>'.l('Erstellt').':</b> <br />'.date_mysql($menu_item->menu_item_ts_create, "d.m.y, H:i").' '.l('Uhr');
		if($menu_item->menu_item_ts_update != '') { 
			$change = '<br /><br /><b>'.l('Letzte Änderung').': </b><br />'.date_mysql($menu_item->menu_item_ts_update, "d.m.y, H:i").' '.l('Uhr'); 
			$changer = ' von '.getUsername($menu_item->menu_item_id_update);
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
		
		$menu_item->genPageDropdown = genPageDropdown(false, $menu_item_page, $i);
		
		include('inc_tpls/menues.tpl.php');
		$content.= $tpl_menues_table;
	$i++;
	}
	include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_tableend;
	}
}
else
{
$menues = $db->get_results('SELECT * FROM menus WHERE menu_ts_delete IS NULL AND menu_id <> "0";');
  include('inc_tpls/menues.tpl.php');
	$content.= $tpl_menues_tablehead;
	foreach($menues as $menu)
	{
		$creator = ' von '.getUsername($menu->menu_id_create);
		$created = '<b>'.l('Erstellt').':</b> <br />'.date_mysql($menu->menu_ts_create, "d.m.y, H:i").' '.l('Uhr');
		if($menu->menu_ts_update != '') { 
			$change = '<br /><br /><b>'.l('Letzte Änderung').': </b><br />'.date_mysql($menu->menu_ts_update, "d.m.y, H:i").' '.l('Uhr'); 
			$changer = ' von '.getUsername($menu->menu_id_update);
		} else { 
			$change = ''; 
			$changer = '';
		}
		
		include('inc_tpls/menues.tpl.php');
		$content.= $tpl_menues_tablelist;
	}
	
	/*$content.= "
	</table><br /><br />&nbsp;&nbsp;&nbsp;&nbsp;<b>Seiten-Untermen&uuml;:</b><br />".$tpl_menues_tablehead;
	
	$menu->menu_id = '0';
	$menu->menu_name = 'Untermen&uuml;s (Seitenspezifisch)';
	$created = '';
	$creator = '';
	$changed = '';
	$changer = '';
	$nochange_start = '<!--';
	$nochange_end = '-->';
	
	include('inc_tpls/menues.tpl.php');
	$content.=$tpl_menues_tablelist;*/
	
	$content.= '</table>';
	 
}

$page['menues']['content'] = $content;
?>