<<<<<<< HEAD
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 01:09:37
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16696829334e810631a4a740-99943339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-21 19:37:37
         compiled from "./templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8616055644e7a20e1c02954-34450927%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 0
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5f63cf8bf5077cbe9e40e023158dd20352e878a' => 
    array (
      0 => './templates/login.tpl',
<<<<<<< HEAD
      1 => 1316556478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16696829334e810631a4a740-99943339',
=======
      1 => 1316555649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8616055644e7a20e1c02954-34450927',
>>>>>>> 0
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
<<<<<<< HEAD
  'unifunc' => 'content_4e810631a6358',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e810631a6358')) {function content_4e810631a6358($_smarty_tpl) {?><form action="login.php" method="post" id="login">
=======
  'unifunc' => 'content_4e7a20e1f1565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e7a20e1f1565')) {function content_4e7a20e1f1565($_smarty_tpl) {?><form action="login.php" method="post" id="login">
>>>>>>> 0
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