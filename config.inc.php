<?php

// ################ Database-Configuration ################ 
$dbuser = "root"; // Username
$dbpass = "root"; // Password
$dbhost = "localhost"; // Host, mostly "localhost"
$dbport = "3306"; // Port for connecting to the Host
$dbname = "cms"; // Database-Name
$dbprefix = ""; // Prefix for Table-Name


$config['dbuser'] = "root"; // Username
$config['dbpass'] = "root"; // Password
$config['dbhost'] = "localhost"; // Host, mostly "localhost"
$config['dbport'] = "3306"; // Port for connecting to the Host
$config['dbname'] = "cms"; // Database-Name
$config['dbprefix'] = ""; // Prefix for Table-Name
// ################ Database-Configuration ################ 

// ################ General-Configuration ################# 
$app_server   = "http://localhost:8080";
$app_folder   = "/cms/";
$app_mainpath = $app_server.$app_folder; // Main path
$app_mainpage = "index.php"; // Main-Page
$app_pagename = 'MCMS Demo';

$config['app_version'] = '00200'; 
$config['master_server']= 'http://jk.lkraemer.de/master_server.php';
$config['app_server']   = "http://localhost:8080";
$config['app_folder']   = "/cms/";
$config['app_mainpath'] = $app_server.$app_folder; // Main path
$config['app_mainpage'] = "index.php"; // Main-Page
$config['app_pagename'] = 'MCMS Demo';

$config['startpage'] = '1'; // Home-Page ID
$config['global_icon_folder'] = "ico/new";
$config['global_upload_folder'] = "media/";

$startpage = '1'; // Home-Page ID
$global_icon_folder = "ico/new";
$global_upload_folder = "media/";

error_reporting(E_ALL ^ E_NOTICE); //Normal-Debug
//error_reporting(E_ALL); //big-debug
//error_reporting(0); // Live
// ################ General-Configuration ################# 

// ################## User-Configuration ##################
$usrtimeout = '1800'; // Timeout before the user gets logged out (1800 = 30min)

$config['usrtimeout'] = '1800'; // Timeout before the user gets logged out (1800 = 30min)
// ################## User-Configuration ##################

// ################# Theme-Configuration ##################
$config['theme_dir'] = 'divo';
$config['theme_img_dir'] = $theme_dir;

$config['img_dir'] = $app_mainpath.'/images/'.$theme_img_dir;
$config['smarty_dir'] = 'admin/libs/'; // Smarty-Directory
$config['main_tpl_dir'] = './templates/';
$config['tpl_dir'] = $main_tpl_dir.$theme_dir;


$theme_dir = 'divo';
$theme_img_dir = $theme_dir;

$img_dir = $app_mainpath.'/images/'.$theme_img_dir;
$smarty_dir = 'admin/libs/'; // Smarty-Directory
$main_tpl_dir = './templates/';
$tpl_dir = $main_tpl_dir.$theme_dir;
// ################# Theme-Configuration ##################
?>