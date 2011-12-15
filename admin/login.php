<?php
require('libs/globals.inc.php');

if($_POST['loginsubmit'])
{
	$redirect = "index.php";
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
	if($page && $action) { $redirect .='?'.$page.'&'.$post; }
	elseif($page && !$action) { $redirect .='?'.$page; }
	elseif(!$page && $action) { $redirect .='?'.$action; }
	if($login == true) message($meldung, "success", '', $redirect); 
	$error = 'Beim Login ist ein Fehler aufgetreten.';
	
	if($login == false) message('Ihr Benutzername oder Ihr Passwort ist falsch', 'error', '', 'login.php');
	}
}
elseif($_GET['action'] == 'logout')
{
	$logout = $user->logout();
	message("Sie wurden erfolgreich ausgeloggt.", 'success', '2', './../index.php');
}
else
{
	$tpl->display('login.tpl');
}
?>