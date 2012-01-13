<?php


function message($message, $mode, $position='1', $redirect=false, $home='index', $log=true)
{
global $tpl;

if($home = '' || $home = ' ') $home = 'index';

	if($log) writelog('message-'.$mode, $message);
	if(!$mode == "success" || !$mode == "error" || !$mode == "message")
	{
		error(l('Funktion "message()" nicht richtig definiert.').' $mode = '.$mode, __LINE__); // error(NACHRICHT, error sammeln JA/NEIN)
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

if(!$log) message(l('Es konnte kein Log angelegt werden. Bitte benachrichtigen Sie den Systemadministrator'), 'error', '', '', '', false);}
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
	if(!$menus) { message(l('Menü nicht verfügbar.'), 'error');  return false;} else {
		for($i=0; $i<count($menus); $i++)
		{
			if($menus[$i]->menu_item_right && !$user->right($menus[$i]->menu_item_right))
			{
				continue;
			}
			$menu_data[$i]['title'] = $menus[$i]->menu_item_title;
			$menu_data[$i]['id'] = $menus[$i]->menu_item_id;
			
			if(!$menus[$i]->menu_item_link)
			{ 
			  $menu_data[$i]['link'] = '?p='.$menus[$i]->menu_item_page;
			  $menu_data[$i]['page_id'] = $menus[$i]->menu_item_page; 
			}
			else 
			{ 
			  $menu_data[$i]['link'] = $menus[$i]->menu_item_link; 
			  $menu_data[$i]['page_id'] = '';
			}
			
			if(!$menus[$i]->menu_item_parent_page)
			{ $menu_data[$i]['parent_page'] = ''; }
			else { $menu_data[$i]['parent_page'] = $menus[$i]->menu_item_parent_page; }
			
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
	if(!$menus) { message(l('Menü nicht verfügbar.'), 'error');  return false;} else {
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

function getUsername($user_id)
{
  global $db;
  return $db->get_var("SELECT user_name FROM users WHERE user_id='".$user_id."';");
}

function genUserLevelDropdown($selected = '')
{
	global $db;
	$levels  = $db->get_results('SELECT * FROM user_level');
	
	$return = '<select name="user_level" id="user_level"><option value="">'.l('User Level wählen').'</option>';
	
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

function genPageDropdown($mainPages = false, $selected = '', $i='')
{
	global $db;
	
	$pages = genPageArray($mainPages);
	
	$name = ($mainPages == true)? 'page_parent':'page_id';
	$name.= ($i != '')? '_'.$i:'';
	
	$return = '<select class="pagedropdown" name="'.$name.'" id="'.$name.'"><option value="0">';
	if($mainPages == true)
	{ $return.= '- '.l('Hauptseite').' -'; } else
	{ $return.= l('Bitte wählen...'); }
	$return.= '</option>';
	
	$select = '';
	
	foreach($pages as $page)
	{
		if($selected != '' && $selected == $page->page_id) $select = ' selected';
		$return.= '<option value="'.$page->page_id.'"'.$select.'>';
		if($page->page_parent !=0) $return.= $db->get_var('SELECT page_title FROM pages WHERE page_id = '.$page->page_parent.';').' => ';
		$return.= $page->page_title;
		$return.= '</option>';
		$select = '';
	}
	
	$return.= '</select>';
	return $return;
}

function pageIsChild($page_id)
{
  $parent_id = $db->get_var('SELECT page_parent FROM pages WHERE page_ts_delete IS NULL AND page_id = '.$page_id.';');
  
  if($parent_id == '') { return false; } else { return $parent_id; }
}

function genPageArray($mainPages = false)
{
  global $db;
  if($mainPages == true) { $pages  = $db->get_results('SELECT * FROM pages WHERE page_parent = "0" AND page_ts_delete IS NULL'); }
	else { $pages  = $db->get_results('SELECT * FROM pages WHERE page_ts_delete IS NULL'); }
	
	return $pages;
}

function UF_date($timestamp) // Function for creating the FB-like-user-friedly-time-format (e.g. 'posted 2 minutes ago')
        {
        $maxdiff = '10'; //ab 10 sekunden wird nicht mehr nur 'gerade eben' ausgegeben
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
            $time.= 'etwa ';
            $diff = round($diff*10)/10;
            $diff = explode('.', $diff);
            $diff = $diff[0];
            if($diff < '2')
            { 
              $time.= l('einer Sekunde'); 
            } else { 
              $time.= $diff.' '.l('Sekunden'); 
            }
          }
          else
          {
            $diff = $diff/60; //umwandlung in minuten
            
            if($diff < '60')
            {
              $time.= 'etwa ';
              $diff = round($diff*10)/10;
              $diff = explode('.', $diff);
              $diff = $diff[0];
              if($diff < '2')
              { 
                $time.= l('einer Minute'); 
              } else { 
                $time.= $diff.' '.l('Minuten'); 
              }
            }
            else
            {
              $diff = $diff/60; //umwandlung in stunden
            
              if($diff < '24')
              {
                $time.= 'etwa ';
                $diff = round($diff*10)/10;
                $diff = explode('.', $diff);
                $diff = $diff[0];
                if($diff < '2')
                { 
                  $time.= l('einer Stunde'); 
                } else { 
                  $time.= $diff.' '.l('Stunden'); 
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
                    $time.= l('einem Tag'); 
                  } else { 
                    $time.= $diff.' '.l('Tagen'); 
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
                      $time.= l('einer Woche'); 
                    } else { 
                      $time.= $diff.' '.l('Wochen'); 
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
          $time = l('gerade eben');
        }
        
        return $time;
        }


function pagination($maxpage, $results='0', $maxresults = '0', $result_wording = 'Ergebnisse')
{
  $url=$_SERVER['REQUEST_URI'];
  $url = strpos($url, '?page=');
  if($url === false)
  {
    $replace = '&';
    $url = preg_replace('@page=[0-9]{0,5}[&]{0,1}@is', '', $_SERVER['REQUEST_URI']);
  }
  else
  {
    $replace = '?';
    $url = preg_replace('@page=[0-9]{0,5}[&]{0,1}@is', '', $_SERVER['REQUEST_URI']);
  }
  if(!isset($_GET['page'])) 
  { 
    $page = '1';  
  } 
  else 
  { 
    $page = $_GET['page']; 
  }
  
  $startval = (($page-1)*$maxresults)+1; 
	$endval = $page*$maxresults;

  if($endval > $maxresults) $endval = $results;

  if(substr($url, -1, 1) == '&') $url = substr($url, 0, -1);
  if(strpos($url, '?')) { $add = '&'; } else { $add = '?'; }

  $output = '<br /><span class="pagination">Seite: ';
  $url = 'http://'.$_SERVER['HTTP_HOST'].$url;
  //$output.= $url;
  if($page > '1') { 
    $output.= '<a href="'.$url.$add.'page='.($page-1).'">';
    $output.= '<';
    $output.= '</a> '; 
  } else { $output.= ' '; }
  
  for($i=0; $i < $maxpage; $i++)
  {
    if(($i+1) == $page) { $bold = true; } else { $bold = false; }
    
    if($bold == true) $output.= '<b>';
    if($page != ($i+1)) $output.= '<a href="'.$url.$add.'page='.($i+1).'">';
    $output.= ($i+1);
    if($page != ($i+1)) $output.= '</a>';
    if($bold == true) $output.= '</b>';
    $output.= ' ';
  }
  if($page < $maxpage) { $output.= ' <a href="'.$url.$add.'page='.($page+1).'">';
    $output.= '>';
    $output.= '</a> ';
  } else { $output.= ' '; }
  $output.= '</span>';

  $resultrange = $startval.'-'.($endval > $results? $results:$endval);
  
  if($resultrange != '0')
  {
    $output.= '<span class="resultcount">'.$result_wording.' '.$resultrange;
    if($maxresults != '0') $output.= ' von '.$results.'</span>';
  }
  $output.='<br />';
  return $output;
}

function l($str) // TBD: Language-Function
{
$search = array('ä','Ä','ü','Ü','ö','Ö','ß');
$replace = array('&auml;','&Auml;','&uuml;','&Uuml;','&ouml;','&Ouml;','&szlig;');

$str = str_replace($search, $replace, $str);


return $str;
}

function icon($icon, $mode='1', $ext='png')
{
	global $global_icon_folder;
	
	switch($icon)
	{
		case 'edit':
			$icon_file = 'Wrench';
		break;
		case 'info':
			$icon_file = 'Light-Off';
		break;
		case 'save':
			$icon_file = 'Computer-Hard-Drive';
		break;
		case 'minus':
			$icon_file = 'minus';
		break;
		case 'plus':
			$icon_file = 'plus';
		break;
		case 'login':
			$icon_file = 'Lock';
		break;
		case 'delete':
			$icon_file = 'Remove';
		break;
		case 'comment':
			$icon_file = 'Chat';
		break;
		case 'preview':
			$icon_file = 'Desktop';
		break;
		case 'check':
			$icon_file = 'Checkmark';
		break;
		case 'write':
			$icon_file = 'Pencil';
		break;
		case 'settings':
			$icon_file = 'Gear';
		break;
		case 'move':
			$icon_file = 'Arrow-Move';
		break;
		case 'upload':
			$icon_file = 'Upload';
		break;
		default:
			$icon_file = $icon;
		break;
	}
	
	if($mode == '1')
	{
	  return $global_icon_folder.'/'.$icon_file.'.'.$ext;
	}
	elseif($mode == '2')
	{
	  return '<img src="'.$global_icon_folder.'/'.$icon_file.'.'.$ext.'">';
	}
}

function getPageTitle($id)
{
  global $db;
	$name  = $db->get_var('SELECT page_title FROM pages WHERE page_id = "'.$id.'";');
	return $name;
}
?>