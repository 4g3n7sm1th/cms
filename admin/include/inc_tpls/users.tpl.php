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
				<a href='index.php?action=users&edit=".$userss->user_id."'><img src='ico/color/reply.png' title='Benutzer \"".$userss->user_name."\" bearbeiten'></a>
				&nbsp;<a onclick='deleteUser(".$userss->user_id.")'><img src='ico/color/action_delete.png' title='L&ouml;schen'></a>
			</td>
			<td>".$userss->user_id."</td>
			<td><img src='ico/color/search.png' style='margin-bottom:-4px' title='".$user_info."' class='miniprofile'>&nbsp;".$userss->user_name."</td>
			<td><img src='ico/".$user_active_color."/login.png' title='".$user_active_title."'>&nbsp;<img src='ico/ico_help.png' title='".$created.$creator." ".$change.$changer."'>
			</td>
		</tr>";
?>