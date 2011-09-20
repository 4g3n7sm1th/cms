<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 23:42:33
         compiled from "./templates/message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11088632634e6e7cc987f182-42387486%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '307e94de9d9422c0f17f6de190a1290c1d763e58' => 
    array (
      0 => './templates/message.tpl',
      1 => 1315780692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11088632634e6e7cc987f182-42387486',
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
  'unifunc' => 'content_4e6e7cc98bb11',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6e7cc98bb11')) {function content_4e6e7cc98bb11($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['position_actual']->value==$_smarty_tpl->tpl_vars['position_message']->value){?>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='error'){?><div class="message-error"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='success'){?><div class="message-success"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php if ($_smarty_tpl->tpl_vars['mode']->value=='message'){?><div class="message"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</div><?php }?>
<?php }?><?php }} ?>