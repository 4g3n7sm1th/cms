<?php
  $maxresults = '10';
  $maxresults_comments = '10';

if(isset($_GET['news_id']))
{
  $news = $db->get_row('SELECT * FROM plugin_news WHERE plugin_news_id = "'.$_GET['news_id'].'"');
  $author = getUsername($news->plugin_news_id_create);
	
	$comment_count = $db->get_var("SELECT COUNT(plugin_news_comment_id) FROM plugin_news_comments WHERE plugin_news_comment_ts_delete IS NULL AND plugin_news_comment_news_id = '".$news->plugin_news_id."';");
	$comment_pages = $comment_count / $maxresults_comments;
	
	$pages = explode('.', $comment_pages);
	
	if(!$pages[1]) { $page_count = $pages[0]; } else { $page_count = $pages[0]+1; }
	
	if(isset($_GET['page'])) 
	{ $page_n = $_GET['page']; 
	  $startval = ($page_n-1)*$maxresults_comments; 
	  $endval = $page_n*$maxresults_comments; 
	} else { 
	  $page_n = '1'; 
	  $startval = '0'; 
	  $endval = $maxresults_comments; 
	}
	
	if(isset($_POST['comment_submit']))
	{
	  $insert = $db->query("INSERT INTO plugin_news_comments 
	                                   (plugin_news_comment_content, 
	                                    plugin_news_comment_id_create, 
	                                    plugin_news_comment_ts_create,
	                                    plugin_news_comment_news_id) 
	                            VALUES ('".$db->escape($_POST['comment_content'])."',
	                                    '".$_SESSION['user_id']."',
	                                    NOW(),
	                                    '".$_GET['news_id']."');");
	  
	  if($insert == true) 
	  { message(l('erfolgreich gespeichert!'), 'success'); } else
	  { message(l('Fehler beim speichern!'), 'success'); }
	}
	
	
	$comments = $db->get_results("SELECT * FROM plugin_news_comments WHERE plugin_news_comment_ts_delete IS NULL AND plugin_news_comment_news_id = '".$news->plugin_news_id."' ORDER BY plugin_news_comment_ts_create DESC LIMIT ".$startval.", ".$endval.";");
	$count = count($comments);
	
	$created = UF_date(strtotime($news->plugin_news_ts_create));
	
	$news_content_new = $news->plugin_news_content;
		
	include($plugin_folder.'plugin.news.tpl.php');
	$output .= $tpl_plugin_news_overview_link;
	$output .= $tpl_plugin_news_start;
	$output .= $tpl_plugin_news;
	
	$output .= '<hr>';
	
	if($user->is_loggedin())
	{
	  $output .= '<b>Kommentar schreiben:</b>';
	  $output .= '
	  <form action="?p='.$_GET['p'].'&news_id='.$_GET['news_id'].'" method="POST">
	    <textarea name="comment_content" style="width:400px;height:50px"></textarea>
	    <br />
	    <input type="submit" name="comment_submit" value="Kommentar speichern">
	  </form>';
	}
	else
	{
	  $output .= 'Um diese News Kommentieren zu können müssen sie eingeloggt sein.';
	}
	
	$output .= '<hr><h4>Kommentare:</h4>';
	
	if(count($comments) > 0)
	{
	  $output.= pagination($page_count, $comment_count, $maxresults_comments , l('Kommentare'));
	
	  foreach($comments as $comment)
	  {
	    $comment_autor = getUsername($comment->plugin_news_comment_id_create);
	    $comment_created = UF_date(strtotime($comment->plugin_news_comment_ts_create));
	
	    $output .= '<div class="comment"><h6>von '.$comment_autor.' '.$comment_created.'</h6>'.$comment->plugin_news_comment_content.'</div>';
	  }
	
	  $output.= pagination($page_count, $comment_count, $maxresults_comments , l('Kommentare'));
	
	}
	else
	{
	  $output.= '<br />keine Kommentare vorhanden';
	}
	$output .= $tpl_plugin_news_end;
}
else
{

	$news_count = $db->get_var("SELECT COUNT(plugin_news_id) as count FROM plugin_".$plugin->plugin_identify." WHERE plugin_news_ts_delete IS NULL");
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
	if($endval > $maxresults) $endval = $news_count;
	
	$resultrange = $startval.'-'.$endval;
	
	$output.= pagination($page_count, $news_count, $maxresults, 'News');

  $sql = "SELECT * FROM plugin_".$plugin->plugin_identify." 
           WHERE plugin_news_ts_delete IS NULL 
        ORDER BY plugin_news_ts_create DESC 
           LIMIT ".$startval.", ".$endval.";";

	$new = $db->get_results($sql);
	$count = count($new);
	foreach($new as $news)
	{
		$author = getUsername($news->plugin_news_id_create);
		$created = UF_date(strtotime($news->plugin_news_ts_create));
		
		$commentcount = $db->get_var(
		'SELECT COUNT(plugin_news_comment_id) 
		   FROM plugin_news_comments 
		  WHERE plugin_news_comment_news_id = "'.$news->plugin_news_id.'" 
		    AND plugin_news_comment_ts_delete IS NULL;');
		//$db->debug();
		
		$commentcount = ($commentcount == '0' || $commentcount == '')? 'keine':$commentcount;
		
		$news_content = explode('<!-- pagebreak -->', $news->plugin_news_content);
		$news_content_new = stripslashes($news_content[0]);
		//$news_content_new = $news->plugin_news_content;
		
		include($plugin_folder.'plugin.news.tpl.php');
		$output .= $tpl_plugin_news_start;
		$output .= $tpl_plugin_news;
		$output .= $tpl_plugin_news_commentcount;
		$output .= $tpl_plugin_news_readmore;
		$output .= $tpl_plugin_news_end;
	}
	$output .= '<br />';
	//$plugins[plugin_news]=$tpl->display('login.tpl');
	
	$output.= pagination($page_count, $news_count, $maxresults, 'News');
	$output.= '<br /><br />';
}
$plugins[plugin_news]=$output;
?>