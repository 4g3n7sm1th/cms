<?php
include('config.inc.php');

global $tpl;
global $db;
global $user;


include('dbconnect.class.php');
$db = new ezSQL_mysql(DB_USER,DB_PASS,DB_NAME,DB_HOST.":".DB_PORT);

session_start();
include('session.class.php');
$user = new flexibleAccess();

include('template.class.php');

$tpl = new Smarty;

$tpl->debugging = false;
$tpl->caching = false;
$tpl->cache_lifetime = 120;
$tpl->assign('title', $app_pagename);

include('functions.inc.php');

?>