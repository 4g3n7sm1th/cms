<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");

if(isset($_GET['action'])) 
{
	$path = "include/".$_GET['action'].".php";
	if(file_exists($path)) { include($path); } else { message("Die Datei ".$path." konnte nicht gefunden werden", 'error'); }
	
	$tpl->assign("content",utf8_encode($page[$_GET['action']]['content']));
	$tpl->assign("pagetitle",utf8_encode($page[$_GET['action']]['title']));
}

$tpl->assign("username",utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')));

$tpl->display('index.tpl');
?>