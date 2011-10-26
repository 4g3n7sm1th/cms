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
			
			if($menus[$i]->menu_item_target == '1')
			{ $menu_data[$i]['target'] = ' target="_blank"'; }
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
			
			if($menus[$i]->menu_item_target == '1')
			{ $menu_data[$i]['target'] = ' target="_blank"'; }
		}
	if(isset($notmain)) { $menu_id = '1'; }else{ $menu_id = '2'; }
	$tpl->assign('pos_menu',$menu_id);
	return $menu_data;
	}
}

function date_mysql($date, $format)
{
 if($date == '0000-00-00 00:00')
 { return ''; } else {
 $d = explode("-", $date);
 $time = explode(" ", $d[2]);
 $t = explode(":", $time[1]);
 $datetime_converted = date($format, mktime ($t[0],$t[1],$t[2],$d[1],$d[2],$d[0]));
 
 return $datetime_converted; 
 
 }
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

function escape($str, $html = 0)
{
	$str = utf8_decode($str);
	$str = mysql_real_escape_string($str);
	if($html) $str = htmlentities($str);
	
	return $str;
}

function UF_date($timestamp) // Function for creating the FB-like-user-friedly-time-format (e.g. 'posted 2 minutes ago')
        {
        $maxdiff = '10000'; //ab 10 sekunden wird nicht mehr nur 'gerade eben' ausgegeben
        $now = time();
        
        $diff = $now-$timestamp;
        $start = $timestamp;

        $time = '';
        
        if($diff > $maxdiff)
        {
          $time = 'vor ';
          
          $diff = $diff/1; //umwandlung in sekunden
          
          if($diff < '60')
          {
            $time.= 'ca. ';
            $diff = round($diff*10)/10;
            $diff = explode('.', $diff);
            $diff = $diff[0];
            $time.= $diff.' Sekunde';
            if($diff < '2')
            { 
              $time.= 'einer Sekunde'; 
            } else { 
              $time.= $diff.' Sekunden'; 
            }
          }
          else
          {
            $diff = $diff/60; //umwandlung in minuten
            
            if($diff < '60')
            {
              $time.= 'ca. ';
              $diff = round($diff*10)/10;
              $diff = explode('.', $diff);
              $diff = $diff[0];
              if($diff < '2')
              { 
                $time.= 'einer Minute'; 
              } else { 
                $time.= $diff.' Minuten'; 
              }
            }
            else
            {
              $diff = $diff/60; //umwandlung in stunden
            
              if($diff < '24')
              {
                $diff = round($diff*10)/10;
                $diff = explode('.', $diff);
                $diff = $diff[0];
                if($diff < '2')
                { 
                  $time.= 'einer Stunde'; 
                } else { 
                  $time.= $diff.' Stunden'; 
                }
              }
              else
              {
                $diff = $diff/24; //umwandlung in tage
            
                if($diff < '14')
                {
                  $diff = round($diff*10)/10;
                  $diff = explode('.', $diff);
                  $diff = $diff[0];
                  if($diff < '2')
                  { 
                    $time.= 'einem Tag'; 
                  } else { 
                    $time.= $diff.' Tagen'; 
                  }
                }
                else
                {
                  $diff = $diff/7; //umwandlung in Wochen
            
                  if($diff < '2')
                  {
                    $diff = round($diff*10)/10;
                    $diff = explode('.', $diff);
                    $diff = $diff[0];
                    if($diff < '2')
                    { 
                      $time.= 'einer Woche'; 
                    } else { 
                      $time.= $diff.' Wochen'; 
                    }
                  }
                  else
                  {
                    $time = 'am '.date('d.m.Y', $start); //falls unterschied > 2 Wochen: ausgabe des datums
                  }
                }
              }
            }
          }
          
        }
        else
        {
          $time = 'gerade eben';
        }
        
        return $time;
        }

?>