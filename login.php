<?php
require('libs/globals.inc.php');


if($_POST['loginsubmit'])
{
	$remember = false;
	if($_POST['page']) {$page= 'p='.$_POST['page'];}else{$page='';}
	if($_POST['action']) {$action = 'action='.$_POST['action'];}else{$action='';}
	$tpl->assign('test', 'test');
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(!$username) { message("Bitte geben Sie einen Benutzernamen ein.", 'error', '1', 'home'); }
	elseif(!$password) { message("Bitte geben Sie ein Passwort ein.", 'error', '1', 'home'); } else {
	if($_POST['remember']) $remember = true;
	$login = $user->login($username, $password, $remember);
	
	$meldung = "Sie wurden erfolgreich eingeloggt.";
	$redirect = $app_mainpage;
	if($page && $action) { $redirect .='?'.$page.'&'.$post; }
	elseif($page && !$action) { $redirect .='?'.$page; }
	elseif(!$page && $action) { $redirect .='?'.$action; }
	if($login) message($meldung, "success", '', $redirect); 
	$error = 'Beim Login ist ein Fehler aufgetreten.';
	
	if(!$login) message($error, 'error');
	}
}
else
{
	$tpl->display('login_page.tpl');
}
?>