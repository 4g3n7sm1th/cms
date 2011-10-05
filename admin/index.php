<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");

$tpl->assign("username",utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')));

$tpl->display('index.tpl');
?>