<?php
$page['dashboard']['title'] = "Dashboard";
$content = '';

$content.= 'Herzlich Wilkommen '.utf8_encode($user->prop('user_firstname').' '.$user->prop('user_lastname'));

$page['dashboard']['content'] = $content;
?>