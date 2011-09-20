<?php

function smarty_function_menue($params, $template)
{
	if (empty($params['id'])) {
        trigger_error("menue: missing 'id' parameter");
        return;
    }
    
    $menus = menu($params['id']);
    echo '<ul>';
    foreach($menus as $menu)
    {
    echo '<li><a href="'.$menu['link'].'"'.$menu['target'].'>'.$menu['title'].'</a></li>';
    }
	echo '</ul>';
}
?>