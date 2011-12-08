<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");
if(!$user->right('admin.panel')) message(l('Sie haben nicht die Berechtigung das Admin-Panel zu betreten'), "error", '', 'login.php');

if(isset($_GET['action'])) { $action =  $_GET['action']; } else { $action = 'dashboard'; }

	$path = "include/".$action.".php";
	if(file_exists($path)) { include($path); } else { message("Die Datei ".$path." konnte nicht gefunden werden", 'error'); }
	
	$tpl->assign("content",utf8_encode($page[$action]['content']));
	$tpl->assign("pagetitle",utf8_encode($page[$action]['title']));

$tpl->display('index.tpl');
?>