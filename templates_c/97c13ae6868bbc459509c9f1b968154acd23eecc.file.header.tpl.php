<<<<<<< HEAD
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 01:09:37
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12002324354e8106319aa599-75910240%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-21 19:37:38
         compiled from "./templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10156774624e7a20e21e2d84-27323189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 0
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c13ae6868bbc459509c9f1b968154acd23eecc' => 
    array (
      0 => './templates/header.tpl',
<<<<<<< HEAD
      1 => 1316556478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12002324354e8106319aa599-75910240',
=======
      1 => 1316555649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10156774624e7a20e21e2d84-27323189',
>>>>>>> 0
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
<<<<<<< HEAD
  'unifunc' => 'content_4e8106319c885',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e8106319c885')) {function content_4e8106319c885($_smarty_tpl) {?><?php if (!is_callable('smarty_function_menue')) include '/Applications/MAMP/htdocs/cms/libs/plugins/function.menue.php';
=======
  'unifunc' => 'content_4e7a20e22d282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e7a20e22d282')) {function content_4e7a20e22d282($_smarty_tpl) {?><?php if (!is_callable('smarty_function_menue')) include '/Applications/MAMP/htdocs/cms/libs/plugins/function.menue.php';
>>>>>>> 0
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