<?php
$page['dashboard']['title'] = "Dashboard";
$content = '';

$content.= 'Herzlich Wilkommen <span class="miniprofile" rel="'.$user->prop('user_id').'">'.utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')).'</span><br /><br />';

$data = getMasterserverData();

if(!$data)
{
  $content.='<h3>Verbindung zum Master-Server konnte nicht hergestellt werden!</h3>';
}
else
{
  $content.='<h3>'.$data->master_server.'</h3><br />';

  foreach($data->news as $news)
  {
    $content.='<div style="border:1px solid gray;margin: 10px 0;padding:10px;width:500px;">';
    $content.='<span style="font-weight:bold;font-size:16px;"><a href="'.$news->link.'" target="_blank">'.$news->title.'</a></span> <span style="font-size:10px">'.UF_date(strtotime($news->ts)).'</span><br />';
    $content.=$news->content;
    $content.='</div>';
  }
  $content.='<br />';
  
  if($data->versions->mcms > $config['app_version']) $content.= icon('cancel', 2).' Ihre MCMS-Version ist nicht aktuell!';
  if($data->versions->mcms <= $config['app_version']) $content.= icon('accept', 2).' Ihre MCMS-Version ist aktuell';
}

//$content.= print_r($_SESSION, true);

$page['dashboard']['content'] = $content;
?>