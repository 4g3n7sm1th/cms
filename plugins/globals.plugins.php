<?php
// ###############################
//      ONLY FOR INCLUSION
//         BY PLUGINS!!
//   does not (!) work standalone
// ###############################


require_once('./../../config.inc.php');

global $tpl;
global $db;
global $user;


require_once('./../../admin/libs/dbconnect.class.php');
$db = new ezSQL_mysql(DB_USER,DB_PASS,DB_NAME,DB_HOST.":".DB_PORT);

session_start();
require_once('./../../admin/libs/session.class.php');
$user = new flexibleAccess();

require_once('./../../admin/libs/functions.inc.php');
require_once('./../../libs/functions.inc.php');

?>