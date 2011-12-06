<?php

// ################ Database-Configuration ################ 
$dbuser = "root"; // Username
$dbpass = "root"; // Password
$dbhost = "localhost"; // Host, mostly "localhost"
$dbport = "3306"; // Port for connecting to the Host
$dbname = "cms"; // Database-Name
$dbprefix = ""; // Prefix for Table-Name
// ################ Database-Configuration ################ 

// ################ General-Configuration ################# 
$app_mainpath = "http://localhost:8080/cms/"; // Main path
$app_mainpage = "index.php"; // Main-Page
$startpage = '1'; // Home-Page ID
$app_pagename = 'MCMS Demo';
error_reporting(E_ALL ^ E_NOTICE); //Normal-Debug
//error_reporting(E_ALL); //big-debug
//error_reporting(0); // Live
$global_icon_folder = "ico/new";
// ################ General-Configuration ################# 

// ################## User-Configuration ##################
$usrtimeout = '1800'; // Timeout before the user gets logged out (1800 = 30min)
// ################## User-Configuration ##################

// ################# Theme-Configuration ##################
$theme_dir = 'divo';
$theme_img_dir = $theme_dir;

$img_dir = $app_mainpath.'/images/'.$theme_img_dir;
$smarty_dir = 'admin/libs/'; // Smarty-Directory
$main_tpl_dir = './templates/';
$tpl_dir = $main_tpl_dir.$theme_dir;
// ################# Theme-Configuration ##################
?>