<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-12 01:03:59
         compiled from "./templates/message_page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4206864354e6d3e5f97b266-24533443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d1882daea0af39cbb325c72f4d99fad63d4991a' => 
    array (
      0 => './templates/message_page.tpl',
      1 => 1315517123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4206864354e6d3e5f97b266-24533443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mode' => 0,
    'message' => 0,
    'sid' => 0,
    'redirect' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e6d3e5f9da10',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e6d3e5f9da10')) {function content_4e6d3e5f9da10($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("headinclude.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<table style="width:100%;height:100%;font-size:1em;"><tr>
<td style="background-color:#eee;text-align:center;vertical-align:middle">
<div class="message-<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
" style="margin:auto;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
<br />
<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>

Klicken Sie <a href="<?php echo $_smarty_tpl->tpl_vars['redirect']->value;?>
">hier</a> um weitergeleitet zu werden</div>
</td>
</tr></table>
</body>
</html><?php }} ?>