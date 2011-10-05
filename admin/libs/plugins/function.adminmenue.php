<?php

function smarty_function_adminmenue($params, $template)
{
	if (empty($params['id'])) { $menu_id = ''; } else { $menu_id = $params['id']; }
    $menus = admin_menu($menu_id);
    if(!$menus) { echo "Fehler beim Laden des Menüs (ID: ".$params['id'].")"; }
    else {
   	 echo '<ul>';
   		 foreach($menus as $menu)
   		 {
   			 echo '<li><a href="'.$menu['link'].'"'.$menu['target'].'>'.$menu['title'].'</a></li>';
   		 }
		 echo '</ul>';
		}
}
?>