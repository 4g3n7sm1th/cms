<?php

function smarty_function_adminmenue($params, $template)
{
	if (empty($params['id']) && $params['page'] == 'true') { $menu_id = '0'; $class = 'class = "page_menu"'; } else { $menu_id = $params['id']; $class = ''; }
    $menus = admin_menu($menu_id);
    if(!$menus) { echo "Fehler beim Laden des Menüs (ID: ".$params['id'].")"; }
    else {
   	 echo '<ul'.$class.'>';
   		 foreach($menus as $menu)
   		 {
   			 echo '<li><a href="'.$menu['link'].'"'.$menu['target'].'>'.$menu['title'].'</a></li>';
   		 }
		 echo '</ul>';
		}
}
?>