<?php

$tpl_page_head = '<script type="text/javascript" src="js/pages.js"></script>';

$tpl_page_form1 = '	<form action="index.php?action=pages&new=1" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span style="float:left;margin-left:10px;"><input id="loginrequired" type="checkbox" name="page_loginrequired"><label for="loginrequired">Login ben&ouml;tigt</label></span><br />
									<span style="float:left;margin-left:10px;"><input id="comments" type="checkbox" name="page_comments" checked><label for="comments">Kommentare erlaubt</label></span>
									<span style="float:left;margin-left:10px;">
									  '.$page_dropdown.'
									  <label for="page_parent">&Uuml;ber-Seite</label></span>
									</span>
									<input type="submit" value="Speichern" name="page_save">
								</div>
								<div id="pages" style="float:left">
									<input type="text" id="titletext" value="Geben Sie hier den Titel an" name="page_title"><br />
									<textarea class="tinymce" rows="25" cols="80" name="page_content"></textarea>
								</div>
							</form>';

$tpl_page_form2 = '	<form action="index.php?action=pages&edit='.$_GET['edit'].'" method="post">
								<div style="float:right;margin-right:10px;" id="submitbox">
									<span><input id="loginrequired" type="checkbox" name="page_loginrequired"'.$page_loginrequired.'><label for="loginrequired">Login ben&ouml;tigt</label></span><br />
									<span><input id="comments" type="checkbox" name="page_comments"'.$page_comments.'><label for="comments">Kommentare erlaubt</label></span>
									<span style="float:left;margin-left:10px;">
									  '.$page_dropdown.'
									  <label for="page_parent">&Uuml;ber-Seite</label></span>
									</span>
									<input type="submit" value="Speichern" name="page_save">
								</div>
								<div id="pages" style="float:left">
									<input type="text" id="titletext" style="color:black" value="'.$pages[0]->page_title.'" name="page_title"><br />
									<textarea class="tinymce" rows="25" cols="80" name="page_content">'.$pages[0]->page_content.'</textarea>
								</div>
							</form>';
							
$tpl_page_tablehead = "
	<table id='pages'>
		<tr style='font-weight:bold'>
			<td style='width:80px;'>&nbsp;</td>
			<td style='width:25px;'>ID</td>
			<td>Name</td>
			<td style='width:60px;' title='Der Inhalt der Seite wird durch das eingestellte Plugin &uuml;berschrieben'>Plugin</td>
			<td style='width:70px;'>&nbsp;</td>
		</tr>";
		
		$tpl_page_tablehead_menu_edit = "
	<table id='pages'>
		<tr style='font-weight:bold'>
			<td style='width:20px !important'>&nbsp;</td>
			<td style='width:25px;'>ID</td>
			<td>Name</td>
			<td style='width:20px !important'>&nbsp;</td>
		</tr>";

$tpl_page_tablebody = "
		<tr>
			<td>
				<a href='index.php?action=pages&edit=".$pagess->page_id."'><img src='ico/new/Wrench.png' title='Seite \"".$pagess->page_title."\" bearbeiten'></a>
				&nbsp;<a href='".$app_mainpath.$app_mainpage."?p=".$pagess->page_id."' target='_blank'><img src='ico/new/Desktop.png' title='Live-Vorschau'></a>
				&nbsp;<a onclick='deletePage(".$pagess->page_id.")'><img src='ico/new/Remove.png' title='L&ouml;schen'></a>
			</td>
			<td>".$pagess->page_id."</td>
			<td>".$pagess->page_title."</td>
			<td>".$pagess->page_function."</td>
			<td><img src='ico/new/Lock.png' style='opacity:".(($login_ico_color == 'gray')? '0.4':'1')."' title='".$login_ico_title."'>&nbsp;<img src='ico/new/chat.png' style='opacity:".(($comment_ico_color == 'gray')? '0.4':'1')."' title='".$comment_ico_title."'>
			<img src='ico/new/Light-Off.png' title='".$created."'>
			</td>
		</tr>";
		
$tpl_page_tablebody_menu_edit = "
		<tr>
			<td>
				<a href='index.php?action=menues&edit=".$_GET['edit']."&umenu=".$pagess->page_id."'><img src='ico/color/reply.png' title='Untermen&uuml; f&uuml;r \"".$pagess->page_title."\" bearbeiten'></a>
			</td>
			<td>".$pagess->page_id."</td>
			<td>".$pagess->page_title."</td>
			<td>
			<img src='ico/ico_help.png' title='".$created."'>
			</td>
		</tr>";

?>