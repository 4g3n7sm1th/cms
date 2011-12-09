<?php
$page['dashboard']['title'] = "Dashboard";
$content = '';

$content.= 'Herzlich Wilkommen <span class="miniprofile" rel="'.$user->prop('user_id').'">'.utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')).'</span><br>';

//$content.= print_r($_SESSION, true);

$page['dashboard']['content'] = $content;
?>