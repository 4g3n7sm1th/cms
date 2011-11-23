<?php
include('inc_tpls/plugins.tpl.php');
$plugin_path = '../plugins';

$page['plugins']['title'] = "Plugin-Verwaltung";

$content = "";
$content.= $tpl_page_head;


$files = scandir('../plugins');
$files[] = 'testdatei.txt';

//var_dump($files);

$content.="<table id='users'>
		<tr style='font-weight:bold'>
			<td>&nbsp;</td>
			<td style='width:25px'>ID</td>
			<td>Name</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
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
	
	$plugin = $db->get_row("SELECT * FROM plugins WHERE plugin_folder = '".$file."';");
	if(!$plugin) message('Plugin '.$file.': '.l('Das Plugin wurde nicht korrekt installiert.'), 'error');
	
	$content.="<td>
				<a href='index.php?action=menues&edit=1'><img src='ico/ico_settings.png' title='Men&uuml; bearbeiten'></a>
				&nbsp;<!--<a onclick='deleteMenu(1)'>--><img src='ico/gray/action_delete.png' title='L&ouml;schen noch nicht m&ouml;glich'></a>
			</td>
			<td>".$plugin->plugin_id."</td>
			<td id='menu_name".$i."'><span>".$plugin_name." (Version: ".$plugin_version.")</span></td>

			<td><img src='ico/ico_help.png' title='<b>Autor:</b> <br />".$plugin_author." <br />(".$plugin_author_web.")<br /><br /><b>Erstellt: </b><br />".$plugin_created."'>
			</td>";
	
	$content.= $file.' - '.$plugin_name;
	$content.='<br>';
	
	$i++;
}

$content.='</tr></table>';

$page['plugins']['content'] = $content;
?>