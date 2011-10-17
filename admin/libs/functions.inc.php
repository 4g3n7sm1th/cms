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
	global $user;
	$menu_data = array();
	$menus = $db->get_results("SELECT * 
							 FROM menu_items
							WHERE menu_id = '".$menu_id."' 
							  AND menu_item_visible = '1'
							  AND menu_item_ts_delete IS NULL
						 ORDER BY menu_item_order_id");
	if(!$menus) { message('Menü nicht verfügbar.', 'error');  return false;} else {
		for($i=0; $i<count($menus); $i++)
		{
			if($menus[$i]->menu_item_right && !$user->right($menus[$i]->menu_item_right))
			{
				continue;
			}
			$menu_data[$i]['title'] = $menus[$i]->menu_item_title;
			if(!$menus[$i]->menu_item_link)
			{ $menu_data[$i]['link'] = '?p='.$menus[$i]->menu_item_page; }
			else { $menu_data[$i]['link'] = $menus[$i]->menu_item_link; }
			$menu_data[$i]['target'] = $menus[$i]->menu_item_target;
		}
	$tpl->assign('pos_menu',$menu_id);
	return $menu_data;
	}
}

function admin_menu($menu_id = '')
{
	global $db;
	global $tpl;
	global $user;
	if(isset($_GET['action'])) { $admin_page = $_GET['action']; }else{ $admin_page = "home"; } ;
	$menu_data = array();
	$sql = "SELECT * 
	  				FROM admin_menu_items
					 WHERE menu_item_visible = '1' ";
	if($menu_id == '')				 
	{ $sql.=	"AND menu_page = '".$admin_page."' "; }
	else
	{ $sql.=	"AND menu_id = '".$menu_id."' "; }
	$sql.=    "AND menu_item_ts_delete IS NULL
				ORDER BY menu_item_order_id";
					 
					 
	$menus = $db->get_results($sql);
	if(!$menus) { message('Menü nicht verfügbar.', 'error');  return false;} else {
		for($i=0; $i<count($menus); $i++)
		{
			if($menus[$i]->menu_item_right && !$user->right($menus[$i]->menu_item_right))
			{
				continue;
			}
			$menu_data[$i]['title'] = htmlentities($menus[$i]->menu_item_title);
			if(!$menus[$i]->menu_item_link)
			{ $menu_data[$i]['link'] = '?p='.$menus[$i]->menu_item_page; }
			else { $menu_data[$i]['link'] = $menus[$i]->menu_item_link; }
			$menu_data[$i]['target'] = $menus[$i]->menu_item_target;
		}
	if(isset($notmain)) { $menu_id = '1'; }else{ $menu_id = '2'; }
	$tpl->assign('pos_menu',$menu_id);
	return $menu_data;
	}
}

function date_mysql($date, $format)
{
 $d = explode("-", $date);
 $time = explode(" ", $d[2]);
 $t = explode(":", $time[1]);
 $datetime_converted = date($format, mktime ($t[0],$t[1],$t[2],$d[1],$d[2],$d[0]));
 if($date == '0000-00-00 00:00')
 { return ''; } else
 { return $datetime_converted; }
}


function genUserLevelDropdown($selected = '')
{
	global $db;
	$levels  = $db->get_results('SELECT * FROM user_level');
	
	$return = '<select name="user_level" id="user_level"><option value="">User Level w&auml;hlen</option>';
	
	$select = '';
	
	foreach($levels as $level)
	{
		if($selected != '' && $selected == $level->user_level) $select = ' selected';
		$return.= '<option value="'.$level->user_level.'"'.$select.'>'.$level->user_level_name.'</option>';
	}
	
	$return.= '</select>';
	return $return;
}

function escape($str)
{
	$str = utf8_decode($str);
	$str = mysql_real_escape_string($str);
	$str = htmlentities($str);
	
	return $str;
}

?>