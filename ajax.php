<?php
require('libs/globals.inc.php');

switch($_POST['req']) {

	case 'loadFacebookFeed':
	
	  $feed_type = 'facebook';
    $fail = false;
    $exists = '';
    $url = 'http://www.facebook.com/feeds/page.php?id=213869231395&format=rss20';
    $feed = fetch_fb_feed($url, 5);

    $i=1;
    foreach($feed as $fb)
    {
  
        $sql = 'SELECT feed_link FROM feeds WHERE feed_link = "'.$fb['link'].'" LIMIT 1;';

        $exists = $db->get_var($sql);
  
        if($exists == false)
        {
          $insert = $db->query("INSERT INTO feeds 
                                           (feed_type, 
                                            feed_link, 
                                            feed_ts, 
                                            feed_content)
                                    VALUES ('".$feed_type."',
                                            '".$fb['link']."',
                                            '".date('Y-m-d H:i:s', strtotime($fb['date']))."',
                                            '".$fb['desc']."');");
          if($insert == false) $fail = true;
        }
        else { $exists = $i.', '; }
  
      $i++;
    }

    if($fail == true) { echo 'error'; } elseif($exists != '') { echo 'exist'; } else { echo 'success'; }

  break;

  case 'loadTwitterFeed':
  
    $username = "ildivofanclub";
        $limit = 5;
        $feed_type = 'twitter';
        
        $m_array = array(
        'Jan' => '1',
        'Feb' => '2',
        'Mar' => '3',
        'Apr' => '4',
        'May' => '5',
        'Jun' => '6',
        'Jul' => '7',
        'Aug' => '8',
        'Sep' => '9',
        'Oct' => '10',
        'Nov' => '11',
        'Dec' => '12');
        
        $feed = 'http://twitter.com/statuses/user_timeline.rss?screen_name='.$username.'&count='.$limit;
        //echo $feed;
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $feed );
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        $tweets = $file_contents;
        
        $tweet = explode("<item>", $tweets);
        //$tcount = count($tweet) – 1;
        //echo var_dump($tweet);
        $i=1;
        $pubdate = UF_date(time()-90000990);
        
      foreach($tweet as $tweets) {
        if(empty($tweet[$i])) break;
        $endtweet = explode("</item>", $tweet[$i]);
        $pub = explode("<pubDate>", $endtweet[0]);
        $pub = explode("</pubDate>", $pub[1]);
        
        $link = explode("<link>", $endtweet[0]);
        $link = explode("</link>", $link[1]);
 
        $pubdate = strtotime($pub[0]);
        $propertime = date('Y-m-d H:i:s', $pubdate);
 
 
        $title = explode("<title>", $endtweet[0]);
        $content = explode("</title>", $title[1]);
        //$content[0] = substr($content[0],0, 70);
        
        $content[0] = trim($content[0]);
        
        $content[0] = preg_replace("/(http:\/\/|(www\.))(([^\s<]{4,100})[^\s<]*)/", '<a href="http://$2$3" >$4</a>', $content[0]);
        $content[0] = preg_replace("/@(\w+)/", "<a href=\"http://www.twitter.com/\\1\" >@\\1</a>", $content[0]);
        
        $content[0] = str_replace($username.': ', '', $content[0]);
        $mytweets[] = $content[0]; 
        
        
        /*echo '<li>';
        echo '"'.$content[0].'..."';
        echo ', geschrieben ';
        echo $datetime;
        echo '</li>';
        echo $link[0];*/
        
        $sql = 'SELECT feed_link FROM feeds WHERE feed_link = "'.$link[0].'" LIMIT 1;';

        $exists = $db->get_var($sql);
  
        if($exists == false)
        {
          $insert = $db->query("INSERT INTO feeds 
                                           (feed_type, 
                                            feed_link, 
                                            feed_ts, 
                                            feed_content)
                                    VALUES ('".$feed_type."',
                                            '".$link[0]."',
                                            '".$propertime."',
                                            '".$content[0]."');");
          if($insert == false) $fail = true;
        }
        else { $exists = $i.', '; }
        
        $i++;
      }
    if($fail == true) { echo 'error'; } elseif($exists != '') { echo 'exist'; } else { echo 'success'; }
  
  break;
  
  case 'getFeeds':
  
    $feeds = $db->get_results('SELECT * FROM feeds ORDER BY feed_ts DESC LIMIT 15');
   
    foreach($feeds as $feed)
	  {

	  $add = '';
	  $target = '';
	  if($feed->feed_type == "twitter" || $feed->feed_type == 'facebook') $target = ' target="_blank"';
	  
	  $feedcontent = $feed->feed_content;
	  //$feedcontent = html_entity_decode($feedcontent);
	  
	  if($feed->feed_type == 'news')
	  { continue; }
	  
	  if($feed->feed_type == 'gallery')
	  {
	    $feedtitle = utf8_encode(strip_tags(trim($feedcontent)));
	  }
	  else
	  {

	  
	    preg_match('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', $feedcontent, $feedcontent_link);
	    //$feedcontent = preg_replace('/<a\s[^>]*href=\"([^\"]*)\"[^>]*>(.*)<\/a>/siU', '', $feedcontent);
	  
	    //print_r($feedcontent_link);
	  
	  
	    
	    
	    //$feedcontent = $feedcontent.' '.$feedcontent_link[1].' ';
	    //$feedcontent = str_replace(array('<','>'), ' ', $feedcontent);
	    $feedcontent = utf8_encode(strip_tags(trim($feedcontent), '<br><br /><br/>'));
	    
	    $feedtitle = $feedcontent;
	    
	    $feedcontent = str_replace(array('<br>','<br />','<br/>'), ' ', $feedcontent);
	    
	    
	    if(strlen($feedcontent) > 80)
	    {
	      $add = '...';
	      $feedcontent = substr($feedcontent, 0, 75);	 
	    }
	    
	    
	    
	  } 
	  echo '<div id="feed" '.(($feedtitle != "")? "class='feedtitle' title='".$feedtitle."'":"").'>
            <a href="'.$feed->feed_link.'"'.$target.'><b>'.ucfirst($feed->feed_type).':</b> '.$feedcontent.$add.'</a>
            <br /><span class="feedtime">'.UF_date(strtotime($feed->feed_ts)).'</span>
            <!--<span class="feedoptions"><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;</a></span>-->
          </div>';
    $feedcontent_long ="";
    }
  
  break;
}
?>