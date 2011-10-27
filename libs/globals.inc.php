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

define('SMARTY_DIR', $smarty_dir); // Smarty-Dir
$tpl = new Smarty;
$tpl->setTemplateDir(array(
                           'theme' => $tpl_dir,
                           'main' => $main_tpl_dir, 
                            ));

$tpl->debugging = false;
$tpl->caching = false;
$tpl->cache_lifetime = 120;


$tpl->assign('img_dir', $img_dir);
$tpl->assign('app_title', $app_pagename);
$tpl->assign('app_path', $app_mainpath);

include('./admin/libs/functions.inc.php');
include('./libs/functions.inc.php');
?>