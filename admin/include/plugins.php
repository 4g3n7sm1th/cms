<?php
include('inc_tpls/plugins.tpl.php');
$plugin_path = '../plugins';

$page['plugins']['title'] = "Plugin-Verwaltung";

$content = "";
$content.= $tpl_page_head;


$files = scandir('../plugins');
$files[] = 'testdatei.txt';

//var_dump($files);

foreach($files as $file)
{
	$isdot = strpos($file, '.');
	
	if($isdot != false || $file == '.' || $file == '..' || $file == '.DS_Store') { continue; }
	
	$plugin_inc = $plugin_path.'/'.$file.'/plugin.inc.php';
	
	if(file_exists($plugin_inc)) 
	{ include($plugin_inc); } else
	{ $content.= 'Dem Plugin "'.$file.'" fehlt die include-Datei!'; }
	
	$content.= $file.' - '.$plugin_name;
	$content.='<br>';
}


$page['plugins']['content'] = $content;
?>