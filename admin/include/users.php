<?php
include('inc_tpls/users.tpl.php');


$page['users']['title'] = "Benutzer";

$content = "";
$content.= $tpl_users_head;

if(isset($_GET['new']))
{
	if($_POST['user_save'])
	{
		if(
			$_POST['user_name'] != '' && 
			$_POST['user_password'] != "" &&  
			$_POST['user_password_wh'] != '' &&
			$_POST['user_mail'] != '' &&
			$_POST['user_level'] != ''
			)
		{
			if($_POST['user_active'] == 'on') { $user_active = '1'; } else { $user_active = '0'; }
			
			if($_POST['user_password'] != $_POST['user_password_wh'])
			{ message('Das Passwort stimmt nicht mit der Wiederholung überein','error'); }
			else
			{
			
			$insert = $db->query('INSERT INTO users (user_name,
																							 user_pass,
																							 user_firstname,
																							 user_lastname,
																							 user_street,
																							 user_housenumber,
																							 user_phone,
																							 user_mobile,
																							 user_web,
																							 user_zipcode,
																							 user_city,
																							 user_mail,
																							 user_ts_create,
																							 user_id_create,
																							 user_active,
																							 user_level) 
																			 VALUES ("'.mysql_real_escape_string($_POST['user_name']).'",
																			 				 "'.mysql_real_escape_string(md5($_POST['user_password'])).'",
																			 				 "'.mysql_real_escape_string($_POST['user_firstname']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_lastname']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_street']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_housenumber']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_phone']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_mobile']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_web']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_zipcode']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_city']).'",
																			 				 "'.mysql_real_escape_string($_POST['user_mail']).'",
																			 				 NOW(),
																			 				 "'.$_SESSION['user_id'].'",
																			 				 '.mysql_real_escape_string($user_active).',
																			 				 '.mysql_real_escape_string($_POST['user_level']).');');
																			 				 
			if($insert) { message("Der Benutzer wurde erfolgreich gespeichert", 'success'); }
			else { message('Der Benutzer konnte nicht gespeichert werden', 'error'); }
			}
		}
		else
		{ message("Bitte füllen sie alle benötigten Felder aus", 'error'); }
	}
	include('inc_tpls/users.tpl.php');
	$content.= $tpl_users_form1;
}
elseif(isset($_GET['edit']))
{
	if($_POST['user_save'])
	{
		if(
				$_POST['user_name'] != '' && 
				$_POST['user_mail'] != '' &&
				$_POST['user_level'] != ''
			)
		{
			if($_POST['user_active'] == 'on') { $user_active = '1'; } else { $user_active = '0'; }
			
			if($_POST['user_password'] != $_POST['user_password_wh'])
			{ message('Das Passwort stimmt nicht mit der Wiederholung überein','error'); }
			else
			{
			$sql = 'UPDATE users SET user_name = "'.mysql_real_escape_string($_POST['user_name']).'",';
			if($_POST['user_password'] != '') 
			 								 { $sql.= 'user_pass = "'.mysql_real_escape_string(md5($_POST['user_password'])).'",'; }
												 $sql.= 'user_firstname = "'.mysql_real_escape_string(utf8_decode($_POST['user_firstname'])).'",
																 user_lastname = "'.mysql_real_escape_string(utf8_decode($_POST['user_lastname'])).'",
																 user_street = "'.mysql_real_escape_string(utf8_decode($_POST['user_street'])).'",
																 user_housenumber = "'.mysql_real_escape_string(utf8_decode($_POST['user_housenumber'])).'",
																 user_phone = "'.mysql_real_escape_string(utf8_decode($_POST['user_phone'])).'",
																 user_mobile = "'.mysql_real_escape_string(utf8_decode($_POST['user_mobile'])).'",
																 user_web = "'.mysql_real_escape_string(utf8_decode($_POST['user_web'])).'",
																 user_zipcode = "'.mysql_real_escape_string(utf8_decode($_POST['user_zipcode'])).'",
																 user_city = "'.mysql_real_escape_string(utf8_decode($_POST['user_city'])).'",
																 user_mail = "'.mysql_real_escape_string(utf8_decode($_POST['user_mail'])).'",
																 user_ts_update = NOW(),
																 user_id_update = "'.$_SESSION['user_id'].'",
																 user_active = '.mysql_real_escape_string($user_active).'
													 WHERE user_id = '.$_GET['edit'].';';
			
			$insert = $db->query($sql);
																			 				 
			if($insert) { message("Der Benutzer wurde erfolgreich gespeichert", 'success'); }
			else { message('Der Benutzer konnte nicht gespeichert werden', 'error'); }
			}
		}
		else
		{ message("Bitte füllen sie alle nötigen Felder aus", 'error'); }
	}
	
	$users = $db->get_row('SELECT * FROM users WHERE user_ts_delete IS NULL AND user_id = '.mysql_real_escape_string($_GET['edit']).';');
	
	if($users->user_active) { $user_active = ' checked'; } else { $user_active = ''; }
	
	if($users->user_housenumber == '0') $users->user_housenumber = '';
	if($users->user_zipcode == '0') $users->user_zipcode = '';
	if($users->user_phone == '0') $users->user_phone = '';
	if($users->user_mobile == '0') $users->user_mobile = '';
	
	include('inc_tpls/users.tpl.php');
	$content.= $tpl_users_form2;
}
else
{
	$users = $db->get_results('SELECT * FROM users WHERE user_ts_delete IS NULL;');
	include('inc_tpls/users.tpl.php');
	$content.= $tpl_users_tablehead;
	foreach($users as $userss)
	{
		$creator = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$userss->user_id_create."");
		$created = '<b>Erstellt:</b> <br />'.date_mysql($userss->user_ts_create, "d.m.y, H:i").' Uhr';
		if($userss->user_ts_update != '') { 
			$change = '<br /><br /><b>Letzte Änderung: </b><br />'.date_mysql($userss->user_ts_update, "d.m.y, H:i").' Uhr'; 
			$changer = ' von '.$db->get_var("SELECT user_name FROM users WHERE user_id = ".$userss->user_id_update.";");
		} else { 
			$change = ''; 
			$changer = '';
		}
		$user_info = '
		Benutzer: <b>'.$userss->user_name.'</b><br />
		<br />
		<table border="0" id="user_info">';
		if(isset($userss->user_level)) $user_level_name = $db->get_var('SELECT user_level_name FROM user_level WHERE user_level = '.$userss->user_level.';');
		
		if(isset($userss->user_firstname) && $userss->user_firstname != '' && $userss->user_firstname != '0') $user_info.= '<tr><td><b>Vorname:</b></td><td>'.$userss->user_firstname.'</td></tr>';
		if(isset($userss->user_lastname) && $userss->user_lastname != '' && $userss->user_lastname != '0') $user_info.= '<tr><td><b>Nachname:</b></td><td>'.$userss->user_lastname.'</td></tr>';
		if(isset($userss->user_street) && $userss->user_street != '' && $userss->user_street != '0') $user_info.= '<tr><td><b>Stra&szlig;e:</b></td><td>'.$userss->user_street.' '.$userss->user_housenumber.'</td></tr>';
		if(isset($userss->user_city) && $userss->user_city != '' && $userss->user_city != '0') $user_info.= '<tr><td><b>Stadt:</b></td><td>'.$userss->user_zipcode.' '.$userss->user_city.'</td></tr>';
		if(isset($userss->user_phone) && $userss->user_phone != '' && $userss->user_phone != '0') $user_info.= '<tr><td><b>Telefon:</b></td><td>'.$userss->user_phone.'</td></tr>';
		if(isset($userss->user_mobile) && $userss->user_mobile != '' && $userss->user_mobile != '0') $user_info.= '<tr><td><b>Handy:</b></td><td>'.$userss->user_mobile.'</td></tr>';
		if(isset($userss->user_web) && $userss->user_web != '' && $userss->user_web != '0') $user_info.= '<tr><td><b>Web:</b></td><td>'.$userss->user_web.'</td></tr>';
		if(isset($userss->user_mail) && $userss->user_mail != '' && $userss->user_mail != '0') $user_info.= '<tr><td><b>E-Mail:</b></td><td>'.$userss->user_mail.'</td></tr>';
		if(isset($user_level_name) && $user_level_name != '' && $user_level_name != '0')$user_info.= '<tr><td><b>User-Level:</b></td><td>'.$user_level_name.'</td></tr>';
		$user_info.= '</table>';
		
		if($userss->user_active == '1') { 
		    $user_active_color = 'color';
		    $user_active_title ='Benutzer ist aktiviert';
		  } else {
				$user_active_color = 'gray';
		    $user_active_title ='Benutzer ist nicht aktiviert';
		  }	
		
		include('inc_tpls/users.tpl.php');
		
		$content.= $tpl_users_tablefoot;
	}
	$content.= "
	</table>";
}

$page['users']['content'] = $content;
?>