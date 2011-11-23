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
    
    if($menu_id == '0') 
   	{ 
   	  echo '<ul'.$class_ul.'>';
   		$sql = "SELECT * FROM pages WHERE page_parent = '".$page_id."' AND page_ts_delete IS NULL";
   		$pages = $db->get_results($sql);
   		
   		if($pages == '') { $pages = $db->get_results("SELECT * FROM pages WHERE page_id = '".$page_id."' AND page_ts_delete IS NULL"); }
   		
   		$i=1;
   		$class='a';
   		$liclass = '';
   		
   		if($pages != '')
   		{  		
        $sql = 'SELECT page_title FROM pages WHERE page_id = "'.$pages[0]->page_parent.'" AND page_ts_delete IS NULL';
        //echo $sql;
   		  $parent_name = $db->get_var($sql);
   		  if($parent_name != '' && $pages != '') echo '<span class="page_menu_title">'.$parent_name.':</span>';

   		
   		  foreach($pages as $page)
   		  {
   		    echo '<li class="menu-'.$class.'" id="link_'.$page->page_title.'"><a href="?p='.$page->page_id.'">'.$page->page_title.'</a>';
   		    if($page->page_id != '' && $page->page_id == $page_id) echo '<div class="menu-'.$class.$liclass.'" id="selected"></div>';
   		    echo '</li>';
   		    if($class == 'a') { $class = 'b'; } else { $class = 'a'; }
   	      $i++;
   	    }
   	  }
   		
   		echo '</ul>';
   	}
   	else
   	{
    
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
   		   
   		   $liclass = '';
   		 
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
}
?>