<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 11:24:48
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12613156984e819660d414a0-01395514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1317109479,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12613156984e819660d414a0-01395514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'app_title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e819660d6a5b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e819660d6a5b')) {function content_4e819660d6a5b($_smarty_tpl) {?><?php if (!is_callable('smarty_function_menue')) include '/Applications/MAMP/htdocs/cms/libs/plugins/function.menue.php';
?><div id="mantel">
<div id="header">
<?php echo $_smarty_tpl->tpl_vars['app_title']->value;?>

</div>
<div id="menu">
<?php echo smarty_function_menue(array('id'=>1),$_smarty_tpl);?>

</div>
<div id="content">
<div id="sidebar">
<?php echo $_smarty_tpl->getSubTemplate ("sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php echo $_smarty_tpl->getSubTemplate ("message.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('position_actual'=>1), 0);?>
<?php }} ?>