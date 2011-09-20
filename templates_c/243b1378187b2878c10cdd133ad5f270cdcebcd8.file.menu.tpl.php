<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 19:46:34
         compiled from "./templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4683298344e6e457a7161c6-76991067%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '243b1378187b2878c10cdd133ad5f270cdcebcd8' => 
    array (
      0 => './templates/menu.tpl',
      1 => 1315776370,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4683298344e6e457a7161c6-76991067',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'position' => 0,
    'pos_menu' => 0,
    'menus' => 0,
    'menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e6e457a74427',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6e457a74427')) {function content_4e6e457a74427($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['position']->value==$_smarty_tpl->tpl_vars['pos_menu']->value){?>
<ul>
<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value){
?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['link'];?>
"<?php echo $_smarty_tpl->tpl_vars['menu']->value['target'];?>
><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a></li>
<?php }} ?>
</ul>
<?php }?>
<?php }} ?>