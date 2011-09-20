<?php
	$new = $db->get_results("SELECT * FROM plugin_".$plugin->plugin_identify." ORDER BY plugin_news_id DESC LIMIT 5;");

	foreach($new as $news)
	{
		$output .= '<h3>'.$news->plugin_news_title.'</h3>';
		$output .= $news->plugin_news_content.'<br />';
		$author_id = $db->get_var("SELECT plugin_news_create_id FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_id = '".$news->plugin_news_id."';");
		$author = $db->get_var("SELECT user_name FROM users WHERE user_id = '".$author_id."';");
		$output .= 'Autor: '.$author.'<br />';
		
		
	}
	$plugins[plugin_news]=$tpl->display('login.tpl');;
?>