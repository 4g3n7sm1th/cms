<?php

// ################ Database-Configuration ################ 
$dbuser = "root"; // Username
$dbpass = "root"; // Password
$dbhost = "localhost"; // Host, mostly "localhost"
$dbport = "3306"; // Port for connecting to the Host
$dbname = "cms"; // Database-Name
$dbprefix = ""; // Prefix for Table-Name
// ################ Database-Configuration ################ 

// ################ General-Configuration ################ 
$app_mainpath = "http://localhost:8080/cms/"; // Main path
$app_mainpage = "index.php"; // Main-Page
$global_icon_folder = "ico/new";
$startpage = '1'; // Home-Page ID
$app_pagename = 'MCMS Demo';
error_reporting(E_ALL ^ E_NOTICE); //Normal-Debug
//error_reporting(E_ALL); //big-debug
//error_reporting(0); // Live
// ################ General-Configuration ################ 

// ################ User-Configuration ################
$usrtimeout = '1800'; // Timeout before the user gets logged out (1800s = 30min)
// ################ User-Configuration ################
?>