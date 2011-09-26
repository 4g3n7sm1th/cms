<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 01:09:37
         compiled from "./templates/sidebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17819112664e8106319d20f3-45305466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a8bf3dcf0d9fbcbe009e3384a5482d8181bddfc' => 
    array (
      0 => './templates/sidebar.tpl',
      1 => 1316556478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17819112664e8106319d20f3-45305466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loggedin' => 0,
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e810631a0c64',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e810631a0c64')) {function content_4e810631a0c64($_smarty_tpl) {?><?php if (!is_callable('smarty_function_menue')) include '/Applications/MAMP/htdocs/cms/libs/plugins/function.menue.php';
?><?php echo $_smarty_tpl->getSubTemplate ("message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('position_actual'=>2), 0);?>

Herzlich Wilkommen, 
<?php if ($_smarty_tpl->tpl_vars['loggedin']->value==true){?><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
.<?php }else{ ?>Gast<?php }?><br />
<?php echo smarty_function_menue(array('id'=>2),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['loggedin']->value==true){?><ul><li><a href="?action=logout&p=<?php echo $_GET['p'];?>
">Logout</a></li></ul><br /><?php }else{ ?>
<?php echo $_smarty_tpl->getSubTemplate ("login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }?>
<br />
<?php }} ?>