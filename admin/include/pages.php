<?php

$page['pages']['title'] = "Seiten";

$content = "";
$pages = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL;');


$content.= "<table style='border:1px solid black'><tr style='font-weight:bold'><td>&nbsp;</td><td>ID</td><td>Name</td><td title='Der Inhalt der Seite wird durch das eingestellte Plugin &uuml;berschrieben'>Plugin</td><td>Autor</td><td>Erstellt</td>&nbsp;</td></tr>";
foreach($pages as $pagess)
{
	$creator = $db->get_var("SELECT user_name FROM users WHERE user_id = ".$pagess->page_author.";");
	$content.= "<tr><td><a href='index.php?action=pages&edit=".$pagess->page_id."'><img src='ico/color/reply.png' title='Seite \"".$pagess->page_title."\" bearbeiten'></a>&nbsp;<a href='".$app_mainpath.$app_mainpage."?p=".$pagess->page_id."' target='_blank'><img src='ico/color/application.png' title='Live-Vorschau'></a></td>";
	$content.= "<td>".$pagess->page_id."</td><td>".$pagess->page_title."</td><td>".$pagess->page_function."</td><td>".$creator."</td><td>".date_mysql($pagess->page_ts_create, "d.m.y, H:i")." Uhr</td>";
	if($pagess->page_loginrequired == '1') $content.= "<td><img src='ico/color/login.png' title='Seite ist nur eingeloggten Nutzern zug&auml;nglich'></td>";
	$content.= "</tr>";
}
$content.= "</table>";

$page['pages']['content'] = $content;
?>