<?php
require('libs/globals.inc.php');

if(!$user->is_loggedin()) header("Location: login.php");

switch($_POST['req']) {
	
	case 'deletePage':
		$page_id = $_POST['page_id'];
		
		$db->query('UPDATE pages SET page_ts_delete = NOW() WHERE page_id = '.$page_id.'');
		
		echo '1';
	break;
}
?>