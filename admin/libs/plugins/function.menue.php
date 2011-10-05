<?php

function smarty_function_menue($params, $template)
{
	if (empty($params['id'])) {
        trigger_error("menue: missing 'id' parameter");
        return;
    }
    
    $menus = menu($params['id']);
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