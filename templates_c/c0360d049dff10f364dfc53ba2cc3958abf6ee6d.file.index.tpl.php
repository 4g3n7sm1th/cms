<<<<<<< HEAD
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 01:09:37
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11926535724e8106318a4c86-45883440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-21 19:37:38
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20778387834e7a20e20a0f65-38143789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 0
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
<<<<<<< HEAD
      1 => 1316556478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11926535724e8106318a4c86-45883440',
=======
      1 => 1316555649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20778387834e7a20e20a0f65-38143789',
>>>>>>> 0
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pagetitle' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
<<<<<<< HEAD
  'unifunc' => 'content_4e8106318fbcc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e8106318fbcc')) {function content_4e8106318fbcc($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("headinclude.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
=======
  'unifunc' => 'content_4e7a20e211946',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e7a20e211946')) {function content_4e7a20e211946($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("headinclude.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
>>>>>>> 0

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h1><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</h1>
<br />
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>