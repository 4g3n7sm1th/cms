<<<<<<< HEAD
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-27 01:09:37
         compiled from "./templates/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20569144934e810631a11091-39614427%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-21 19:37:38
         compiled from "./templates/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20896864444e7a20e251d1e4-51803897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> 0
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '307e94de9d9422c0f17f6de190a1290c1d763e58' => 
    array (
      0 => './templates/message.tpl',
<<<<<<< HEAD
      1 => 1316556478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20569144934e810631a11091-39614427',
=======
      1 => 1316555649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20896864444e7a20e251d1e4-51803897',
>>>>>>> 0
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'position_actual' => 0,
    'position_message' => 0,
    'mode' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
<<<<<<< HEAD
  'unifunc' => 'content_4e810631a43d8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e810631a43d8')) {function content_4e810631a43d8($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['position_actual']->value==$_smarty_tpl->tpl_vars['position_message']->value){?>
=======
  'unifunc' => 'content_4e7a20e25da6a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e7a20e25da6a')) {function content_4e7a20e25da6a($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['position_actual']->value==$_smarty_tpl->tpl_vars['position_message']->value){?>
>>>>>>> 0
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='error'){?><div class="message-error"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='success'){?><div class="message-success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='message'){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php }?><?php }} ?>