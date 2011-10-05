<?php
include('./config.inc.php');

global $tpl;
global $db;
global $user;


include('./admin/libs/dbconnect.class.php');
$db = new ezSQL_mysql(DB_USER,DB_PASS,DB_NAME,DB_HOST.":".DB_PORT);

session_start();
include('./admin/libs/session.class.php');
$user = new flexibleAccess();

include('./admin/libs/template.class.php');

$tpl = new Smarty;

$tpl->debugging = false;
$tpl->caching = false;
$tpl->cache_lifetime = 120;
$tpl->assign('app_title', $app_pagename);

include('./admin/libs/functions.inc.php');

?>