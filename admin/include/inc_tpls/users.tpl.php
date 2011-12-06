<?php
$tpl_users_head = '<script type="text/javascript" src="js/users.js"></script>';

$tpl_users_form1 = '	<form id="newuser" action="index.php?action=users&new=1" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span style="float:left;margin-left:10px;"><input id="user_active" type="checkbox" name="user_active"><label for="user_active">User aktiviert</label></span><br />
									<span style="float:left;margin-left:10px;">'.genUserLevelDropdown().'</span>
									</span>
									<input type="submit" value="Benutzer speichern" name="user_save">
								</div>
								<div id="users" style="float:left">
									<table>
										<tr><td colspan="2"><b>Login-Daten</b></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>Benutzername*:</td><td><input type="text" name="user_name"></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>Passwort:</td><td><input type="password" name="user_password"></td></tr>
										<tr title="ben&ouml;tigtes Feld<br />Wiederholung des Passworts"><td>Passwort (Wiederholung):</td><td><input type="password" name="user_password_wh" id="user_password_wh"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2"><b>Benutzerdaten</b></td></tr>
										<tr><td>Vorname:</td><td><input type="text" name="user_firstname"></td></tr>
										<tr><td>Nachname:</td><td><input type="text" name="user_lastname"></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>E-Mail*:</td><td><input type="text" name="user_mail"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2"><b>Pers&ouml;nliche-Daten</b></td></tr>
										<tr><td>Stra&szlig;e / Hausnummer:</td><td><input type="text" name="user_street" style="width:170px"><input type="text" name="user_housenumber" style="width:30px"></td></tr>
										<tr><td>PLZ / Stadt:</td><td><input type="text" name="user_zipcode" style="width:50px"><input type="text" name="user_city" style="width:150px"></td></tr>
										<tr><td>Telefon:</td><td><input type="text" name="user_phone"></td></tr>
										<tr><td>Mobiltelefon:</td><td><input type="text" name="user_mobile"></td></tr>
										<tr><td>Homepage:</td><td><input type="text" name="user_web"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2">*= ben&ouml;tigte Felder</td></tr>
									</table>
								</div>
							</form>';

$tpl_users_form2 = '	<form id="edituser" action="index.php?action=users&edit='.$_GET['edit'].'" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span style="float:left;margin-left:10px;"><input id="user_active" type="checkbox" name="user_active"'.$user_active.'><label for="user_active">User aktiviert</label></span><br />
									<span style="float:left;margin-left:10px;">'.genUserLevelDropdown($users->user_level).'</span>
									</span>
									<input type="submit" value="Benutzer speichern" name="user_save">
								</div>
								<div id="users" style="float:left">
									<table>
										<tr><td colspan="2"><b>Login-Daten</b></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>Benutzername*:</td><td><input type="text" name="user_name" value="'.$users->user_name.'"></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>Passwort:</td><td><input type="password" name="user_password"></td></tr>
										<tr title="ben&ouml;tigtes Feld<br />Wiederholung des Passworts"><td>Passwort (Wiederholung):</td><td><input type="password" name="user_password_wh" id="user_password_wh"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2"><b>Benutzerdaten</b></td></tr>
										<tr><td>Vorname:</td><td><input type="text" name="user_firstname" value="'.$users->user_firstname.'"></td></tr>
										<tr><td>Nachname:</td><td><input type="text" name="user_lastname" value="'.$users->user_lastname.'"></td></tr>
										<tr title="ben&ouml;tigtes Feld"><td>E-Mail*:</td><td><input type="text" name="user_mail" value="'.$users->user_mail.'"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2"><b>Pers&ouml;nliche-Daten</b></td></tr>
										<tr><td>Stra&szlig;e / Hausnummer:</td><td><input type="text" name="user_street" style="width:170px" value="'.$users->user_street.'"><input type="text" name="user_housenumber" style="width:30px" value="'.$users->user_housenumber.'"></td></tr>
										<tr><td>PLZ / Stadt:</td><td><input type="text" name="user_zipcode" style="width:50px" value="'.$users->user_zipcode.'"><input type="text" name="user_city" style="width:150px" value="'.$users->user_city.'"></td></tr>
										<tr><td>Telefon:</td><td><input type="text" name="user_phone" value="'.$users->user_phone.'"></td></tr>
										<tr><td>Mobiltelefon:</td><td><input type="text" name="user_mobile" value="'.$users->user_mobile.'"></td></tr>
										<tr><td>Homepage:</td><td><input type="text" name="user_web" value="'.$users->user_web.'"></td></tr>
										<tr><td colspan="2">&nbsp;</td></tr>
										<tr><td colspan="2">*= ben&ouml;tigte Felder</td></tr>
									</table>
								</div>
							</form>';
							
$tpl_users_tablehead = "
	<table id='users'>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td>&nbsp;</td>
		</tr>";
		
$tpl_users_tablefoot = "
		<tr>
			<td>
				<a href='index.php?action=users&edit=".$userss->user_id."'><img src='".icon('edit')."' title='Benutzer \"".$userss->user_name."\" bearbeiten'></a>
				&nbsp;<a onclick='deleteUser(".$userss->user_id.")'><img src='".icon('delete')."' title='L&ouml;schen'></a>
			</td>
			<td>".$userss->user_id."</td>
			<td><img src='".icon('info')."' style='margin-bottom:-4px' class='bigtip' title='miniprofile_".$userss->user_id."'>&nbsp;".$userss->user_name."</td>
			<div id='miniprofile_".$userss->user_id."' style='display:none'>
                Benutzer: <b>'.$userss->user_name.'</b><br />
                <br />
                <table border='0' id='user_info'>
                ".((isset($userss->user_level))? $db->get_var('SELECT user_level_name FROM user_level WHERE user_level = '.$userss->user_level.';'): '')."
                
                ".((isset($userss->user_firstname) && $userss->user_firstname != '' && $userss->user_firstname != '0')? '<tr><td><b>Vorname:</b></td><td>'.$userss->user_firstname.'</td></tr>':'')."
                ".((isset($userss->user_lastname) && $userss->user_lastname != '' && $userss->user_lastname != '0')? '<tr><td><b>Nachname:</b></td><td>'.$userss->user_lastname.'</td></tr>':'')."
                ".((isset($userss->user_street) && $userss->user_street != '' && $userss->user_street != '0')? '<tr><td><b>Stra&szlig;e:</b></td><td>'.$userss->user_street.' '.$userss->user_housenumber.'</td></tr>':'')."
                ".((isset($userss->user_city) && $userss->user_city != '' && $userss->user_city != '0')? '<tr><td><b>Stadt:</b></td><td>'.$userss->user_zipcode.' '.$userss->user_city.'</td></tr>':'')."
                ".((isset($userss->user_phone) && $userss->user_phone != '' && $userss->user_phone != '0')? '<tr><td><b>Telefon:</b></td><td>'.$userss->user_phone.'</td></tr>':'')."
                ".((isset($userss->user_mobile) && $userss->user_mobile != '' && $userss->user_mobile != '0')? '<tr><td><b>Handy:</b></td><td>'.$userss->user_mobile.'</td></tr>':'')."
                ".((isset($userss->user_web) && $userss->user_web != '' && $userss->user_web != '0')? '<tr><td><b>Web:</b></td><td>'.$userss->user_web.'</td></tr>':'')."
                ".((isset($userss->user_mail) && $userss->user_mail != '' && $userss->user_mail != '0')? '<tr><td><b>E-Mail:</b></td><td>'.$userss->user_mail.'</td></tr>':'')."
                ".((isset($user_level_name) && $user_level_name != '' && $user_level_name != '0')? '<tr><td><b>User-Level:</b></td><td>'.$user_level_name.'</td></tr>':'')."
                </table>
			</div>
			<td><img src='".icon('login')."' style='opacity:".(($user_active_color == 'gray')? '0.4':'1')."' title='".$user_active_title."'>&nbsp;<img src='".icon('info')."' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
?>