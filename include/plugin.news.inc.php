<?php
	$new = $db->get_results("SELECT * FROM plugin_".$plugin->plugin_identify." ORDER BY plugin_news_id DESC LIMIT 5;");
	$count = count($new);
	foreach($new as $news)
	{
		$author_id = $db->get_var("SELECT plugin_news_create_id FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_id = '".$news->plugin_news_id."';");
		$author = $db->get_var("SELECT user_name FROM users WHERE user_id = '".$author_id."';");
		$created = UF_date(strtotime($news->plugin_news_create_ts));
		
		include('plugin.news.tpl.php');
		$output .= $tpl_plugin_news;
	}
	$output .= '<br />'.$count.' News gefunden';
	//$plugins[plugin_news]=$tpl->display('login.tpl');
	$plugins[plugin_news]=$output;
?>