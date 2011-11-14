<?php

function smarty_function_menue($params, $template)
{
global $db;

	if (empty($params['id']) && empty($params['page'])) {
        trigger_error("menue: missing 'id' parameter");
        return;
    }
    
    if(!isset($_GET['p'])) { $page_id = '1'; } else { $page_id = $_GET['p']; }
    
    if(empty($params['id']) && $params['page'] == 'true') {
    $menu_id = '0';
    $class_ul = ' class="page_menu"';
    } else { $menu_id = $params['id']; $class_ul = ''; }
    
    $menus = menu($menu_id);
    if(!$menus) { echo "Fehler beim Laden des Menüs (ID: ".$params['id'].")"; }
    else {
      $i=1;
   	 echo '<ul'.$class_ul.'>';
   	   $class='a';
   		 foreach($menus as $menu)
   		 {
   		   $pages = $db->get_var('SELECT menu_item2page_id FROM menu_item2page WHERE menu_item_id = "'.$menu['id'].'" AND page_id = "'.$page_id.'";');
          
         $parents = $db->get_results('SELECT * FROM menu_item2page WHERE menu_item_id = "'.$menu['id'].'";');
         if($menu_id == '0') 
   		   { 
          foreach($parents as $parent)
          {   		
            $sql = 'SELECT menu_item_title FROM menu_items WHERE menu_item_page = "'.$parent->page_id.'" AND menu_item_parent_page = "0" AND menu_item_ts_delete IS NULL';
            //echo $sql;
   		      $parent_name = $db->get_var($sql);
   		      if($parent_name != '' && $pages != '') echo '<span class="page_menu_title">'.$parent_name.':</span>';
   		    }
   		   }
   		   
   		   $liclass = '';
   		   if($menu_id == '0') 
   		   { 
   		    $liclass = ' umenu';
   		    if($menu['parent_page'] == '' || !$pages) { continue; } 
   		   }
   		   //if($i == 1 && $menu_id == '0') { $page_name = getPageTitle($page_id); echo '<span class="page_menu_title">'.$page_name.':</span>'; }
   		   
   			 echo '<li class="menu-'.$class.'" id="link_'.$menu['title'].'"><a href="'.$menu['link'].'"'.$menu['target'].'>'.$menu['title'].'</a>';
   			 if($menu['page_id'] != '' && $menu['page_id'] == $page_id) echo '<div class="menu-'.$class.$liclass.'" id="selected"></div>';
   			 echo '</li>';
   			 if($class == 'a') { $class = 'b'; } else { $class = 'a'; }
   			 $i++;
   		 }
		 echo '</ul>';
		}
}
?>