<?php


function message($message, $mode, $position='1', $redirect=false, $home='index', $log=true)
{
global $tpl;

if($home = '' || $home = ' ') $home = 'index';

	if($log) writelog('message-'.$mode, $message);
	if(!$mode == "success" || !$mode == "error" || !$mode == "message")
	{
		error('Funktion "message()" nicht richtig definiert. $mode = '.$mode, __LINE__); // error(NACHRICHT, error sammeln JA/NEIN)
	}
	elseif($redirect == 'home')
	{
		$tpl->assign("message", $message);
		$tpl->assign("mode", $mode);
		$tpl->assign("position_message", $position);

		$tpl->display('index.tpl');
		return true;
	}
	elseif($redirect != false)
	{
		$tpl->assign("message", $message);
		$tpl->assign("mode", $mode);
		$tpl->assign("redirect", $redirect);

		$tpl->display('message_page.tpl');
		return true;
	}
	else
	{
		$tpl->assign("mode", $mode);
		$tpl->assign("message", $message);
		$tpl->assign("position_message", $position);
		return true;
	}
}

function error($message, $line, $save) //ToDo: $save=1 => error-saving
{
	writelog('error', $message.' in Zeile '.$line);
	if(!$save)
	{
		echo $message." in Zeile <b>".$line."</b><br>";
	}
}

function writelog($type, $content = '', $user='', $ts='NOW()', $ip='', $port='', $request='', $host='')
{
global $db;
if(!$ip) $ip = $_SERVER['REMOTE_ADDR'];
if(!$port) $port = $_SERVER['REMOTE_PORT'];
if(!$request) $request = $_SERVER['REQUEST_URI'];
if(!$host) $host = $_SERVER['REMOTE_HOST'];
if($content != 'Session: ') { $log = $db->query('INSERT INTO logs 
														  (log_type,
														   log_content, 
														   log_user, 
														   log_ts, 
														   log_port, 
														   log_request_url, 
														   log_host, 
														   log_ip) 
													VALUES ("'.$type.'", 
													        "'.$content.'", 
													        "'.$user.'", 
													        '.$ts.', 
													        "'.$port.'", 
													        "'.$request.'", 
													        "'.$host.'", 
													        "'.$ip.'");');

if(!$log) message('Es konnte kein Log angelegt werden. Bitte benachrichtigen Sie den Systemadministrator', 'error', '', '', '', false);}
}

function menu($menu_id)
{
	global $db;
	global $tpl;
	$menu_data = array();
	$menus = $db->get_results("SELECT * 
							 FROM menu_items
							WHERE menu_id = '".$menu_id."' 
							  AND menu_item_visible = '1'
							  AND menu_item_ts_delete IS NULL
						 ORDER BY menu_item_order_id");
	if(!$menus) { message('Menü nicht verfügbar.', 'error'); } else {
		for($i=0; $i<count($menus); $i++)
		{
		$menu_data[$i]['title'] = $menus[$i]->menu_item_title;
		if(!$menus->menu_item_link)
		{ $menu_data[$i]['link'] = '?p='.$menus[$i]->menu_item_page; }
		else { $menu_data[$i]['link'] = $menus[$i]->menu_item_link; }
		$menu_data[$i]['target'] = $menus[$i]->menu_item_target;
		}
	$tpl->assign('pos_menu',$menu_id);
	return $menu_data;
	}
}
?>