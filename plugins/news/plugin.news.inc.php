<?php
  $maxresults = '5';

	$news_count = $db->get_var("SELECT COUNT(plugin_news_id) as count FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_delete_ts IS NULL");
	$news_pages = $news_count / $maxresults;
	
	$pages = explode('.', $news_pages);
	
	if(!$pages[1]) { $page_count = $pages[0]; } else { $page_count = $pages[0]+1; }
	
	if(isset($_GET['page'])) 
	{ $page_n = $_GET['page']; 
	  $startval = ($page_n-1)*$maxresults; 
	  $endval = $page_n*$maxresults; 
	} else { 
	  $page_n = '1'; 
	  $startval = '0'; 
	  $endval = $maxresults; 
	}
	if($startval == '0') $startval = '1';
	if($endval > $maxresults) $endval = $news_count;
	
	$resultrange = $startval.'-'.$endval;
	
	$output.= pagination($page_count, $resultrange, $news_count, 'News');

  $sql = "SELECT * FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_delete_ts IS NULL ORDER BY plugin_news_create_ts DESC LIMIT ".$startval.", ".$endval.";";

	$new = $db->get_results($sql);
	$count = count($new);
	foreach($new as $news)
	{
		$author_id = $db->get_var("SELECT plugin_news_create_id FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_id = '".$news->plugin_news_id."';");
		$author = $db->get_var("SELECT user_name FROM users WHERE user_id = '".$author_id."';");
		$created = UF_date(strtotime($news->plugin_news_create_ts));
		
		include($plugin_folder.'plugin.news.tpl.php');
		$output .= $tpl_plugin_news;
	}
	$output .= '<br />';
	//$plugins[plugin_news]=$tpl->display('login.tpl');
	
	$output.= pagination($page_count, $resultrange, $news_count, 'News');
	$plugins[plugin_news]=$output;

?>