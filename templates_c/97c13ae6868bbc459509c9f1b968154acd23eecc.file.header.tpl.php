<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 23:42:33
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13130014344e6e7cc980b251-19550270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
      1 => 1315847352,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13130014344e6e7cc980b251-19550270',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e6e7cc982bb8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6e7cc982bb8')) {function content_4e6e7cc982bb8($_smarty_tpl) {?><?php if (!is_callable('smarty_function_menue')) include '/Applications/MAMP/htdocs/cms/libs/plugins/function.menue.php';
?><div id="mantel">
<div id="header">
Head-Bereich
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