<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 23:42:33
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15413219854e6e7cc960a8c3-51314704%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
      1 => 1315693189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15413219854e6e7cc960a8c3-51314704',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'get_action' => 0,
    'get_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e6e7cc965e04',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6e7cc965e04')) {function content_4e6e7cc965e04($_smarty_tpl) {?><form action="login.php" method="post" id="login">
<h3>Login</h3>
<label for="username">Username:</label><input type="text" size="20" name="username"><br />
<label for="password">Passwort:</label><input type="password" size="20" name="password"><br />
<br />
<label style="width: 120px;"><input type="checkbox" name="remember">Remember me</label>
<input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['get_action']->value;?>
">
<input type="hidden" name="page" value="<?php echo $_smarty_tpl->tpl_vars['get_page']->value;?>
">
<input type="submit" value="Login" name="loginsubmit"><br />
<br />
<a href="#register.php" style="float:right">Registrieren</a>

</form><?php }} ?>