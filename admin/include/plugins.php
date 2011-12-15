<?php
include('inc_tpls/plugins.tpl.php');
$plugin_path = '../plugins';

$page['plugins']['title'] = "Plugin-Verwaltung";

$content = "";
$content.= $tpl_page_head;

if(isset($_GET['plugin']))
{
  $plugin_inc = $plugin_path.'/'.$_GET['plugin'].'/plugin.inc.php';
	
	if(file_exists($plugin_inc)) 
	{ include($plugin_inc); } else
	{ message('Plugin '.$_GET['plugin'].': '.l('Dem Plugin fehlt die include-Datei!'), 'error'); }
	
	$plugin_data = $db->get_row("SELECT * FROM plugins WHERE plugin_identify = '".$_GET['plugin']."';");
	
	$path = $plugin_path.'/'.$plugin_data->plugin_folder.'/'.$plugin['admin_file'];
	if(file_exists($path)) 
	{ 
	  $page['plugins']['title'].= ' - '.$plugin['name'].'-Admin';
	  $plugin_admin = true;
	  include($path);
	}
	else
	{
	  message('Kein Plugin-Admin gefunden', 'error');
	}
}
else
{
  $files = scandir($plugin_path);

  //var_dump($files);

  $content.="<table id='users'>
		<tr style='font-weight:bold'>
			<td style='width:50px'>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td>&nbsp;</td>
		</tr>
		";

  $i=0;
  foreach($files as $file)
  {
	  $isdot = strpos($file, '.');
	
	  if($isdot != false || $file == '.' || $file == '..' || $file == '.DS_Store') { continue; }
	
	  $plugin_inc = $plugin_path.'/'.$file.'/plugin.inc.php';
	
	  if(file_exists($plugin_inc)) 
	  { include($plugin_inc); } else
	  { message('Plugin '.$file.': '.l('Dem Plugin fehlt die include-Datei!'), 'error'); }
	
	  $plugin_data = $db->get_row("SELECT * FROM plugins WHERE plugin_folder = '".$file."';");
	  if(!$plugin) message('Plugin '.$file.': '.l('Das Plugin wurde nicht korrekt installiert.'), 'error');
	
	  $path = $plugin_path.'/'.$plugin_data->plugin_folder.'/'.$plugin['admin_file'];
	  if(file_exists($path)) $plugin_admin = true;
	
	  $content.="
	  <tr>
	    <td>
				".(($plugin_admin == true && $plugin_data->plugin_active == 1)?"<a href='index.php?action=plugins&plugin=".$plugin_data->plugin_identify."'><img src='".icon('settings')."' title='Plugin-Optionen'></a>":"")."
				&nbsp;<a onclick='changePluginStatus(\"".(($plugin_data->plugin_active == 1)? "0":"1")."\",\"".$plugin_data->plugin_id."\")'><img src='".icon('check')."' style='opacity:".(($plugin_data->plugin_active == 1)? "1":"0.4")."' title='".(($plugin_data->plugin_active == 1)? l("Plugin deaktivieren"):l("Plugin aktivieren"))."'></a>
			</td>
			<td>".$plugin_data->plugin_id."</td>
			<td id='menu_name".$i."'><span>".$plugin['name']." (Version: ".$plugin['version'].")</span> </td>

			<td><img src='".icon('info')."' title='<b>Autor:</b> <br />".$plugin['author']." <br />(".$plugin['author_web'].")<br /><br /><b>Erstellt: </b><br />".$plugin['created']."'>
			</td>
		</tr>";
	
	  //$content.= $file.' - '.$plugin_name;
	  $content.='<br>';
	
	  $i++;
  }

  $content.='</table>';
}

$page['plugins']['content'] = $content;
?>