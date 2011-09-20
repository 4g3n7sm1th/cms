<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 23:42:33
         compiled from "./templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19150951014e6e7cc9664e90-24169496%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0360d049dff10f364dfc53ba2cc3958abf6ee6d' => 
    array (
      0 => './templates/index.tpl',
      1 => 1315693332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19150951014e6e7cc9664e90-24169496',
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
  'unifunc' => 'content_4e6e7cc96836f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6e7cc96836f')) {function content_4e6e7cc96836f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("headinclude.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<h1><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</h1>
<br />
<?php echo $_smarty_tpl->tpl_vars['content']->value;?>


<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>