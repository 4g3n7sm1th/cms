<?php
$page['dashboard']['title'] = "Dashboard";
$content = '';

$content.= 'Herzlich Wilkommen '.utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname')).'<br>';

$content.= print_r($_SESSION, true);

$page['dashboard']['content'] = $content;
?>