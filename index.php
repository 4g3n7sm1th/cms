<?php
require('libs/globals.inc.php');
$tpl->force_compile = true;

if(!$_GET['p']){ $pages = $startpage; } else { $pages = $_GET['p']; }

$tpl->assign("username",utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')));

if($_GET['action'] == 'logout')
{
	$logout = $user->logout();
	message("Sie wurden erfolgreich ausgeloggt.", 'success', '2', 'index.php?p='.$pages);
}

$page = $db->get_row('SELECT * FROM pages WHERE page_id = '.mysql_real_escape_string($pages).';');
if(!$page) message("Diese Seite konnte leider nicht gefunden werden.", 'error');


if($page->page_function == '') {
	if($page->page_loginrequired == '1' && $user->is_loggedin() == false)
	{ message('Um diese Seite betrachten zu können müssen Sie eingeloggt sein.', 'error'); }
	else
	{
		
		$tpl->assign("content",utf8_encode($page->page_content));
		$tpl->assign("pagetitle",utf8_encode($page->page_title));
	}
}
elseif(isset($page->page_function))
{
	$plugin = $db->get_row("SELECT *
							  FROM plugins
							 WHERE plugin_name = '".$page->page_function."';");
	if(!$plugin) message("Fehler beim Laden des Plugins (".$page->page_function.", DB)",'error');
	$plugin_folder='plugins/';
	if($plugin->plugin_folder) $plugin_folder.= $plugin->plugin_folder.'/';
	$inc_path = $plugin_folder.'plugin.'.$plugin->plugin_identify.'.inc.php';
	$inc = include($inc_path);
	if(!$inc) message("Fehler beim Laden des Plugins (".$plugin->plugin_name.", '".$inc_path."')",'error');
	$tpl->assign("content",$plugins['plugin_'.$page->page_function]);
	$tpl->assign("pagetitle",utf8_encode($page->page_title));
}



$tpl->assign("loggedin",$user->is_loggedin());
$tpl->assign("get_page",$pages);
if($_GET['action'] != 'logout') $tpl->assign("get_action",$_GET['action']);
$tpl->assign('title', $app_pagename);
$tpl->display('index.tpl');
?>
