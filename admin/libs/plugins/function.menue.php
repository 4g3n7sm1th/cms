<?php

function smarty_function_menue($params, $template)
{
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
   		   if($menu_id == '0') if($menu['parent_page'] == '' || $page_id != $menu['parent_page']) { continue; }
   		   if($i == 1 && $menu_id == '0') { $page_name = getPageTitle($page_id); echo '<span class="page_menu_title">'.$page_name.':</span>'; }
   		   
   			 echo '<li class="menu-'.$class.'" id="link_'.$menu['title'].'"><a href="'.$menu['link'].'"'.$menu['target'].'>'.$menu['title'].'</a></li>';
   			 if($class == 'a') { $class = 'b'; } else { $class = 'a'; }
   			 $i++;
   		 }
		 echo '</ul>';
		}
}
?>