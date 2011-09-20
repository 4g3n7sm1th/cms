<?php /* Smarty version Smarty 3.1-RC1, created on 2011-09-05 19:58:18
         compiled from "./templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4508047044e650dba4627c8-55174700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a4f6f0d327fc7bc3ea86f63906a1bf934ca50c7' => 
    array (
      0 => './templates/footer.tpl',
      1 => 1315245009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4508047044e650dba4627c8-55174700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'loggedin' => 1,
    'username' => 1,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty 3.1-RC1',
  'unifunc' => 'content_4e650dba49398',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4e650dba49398')) {function content_4e650dba49398($_smarty_tpl) {?>

</div>
<div id="sidebar">
<?php echo '/*%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/<?php if ($_smarty_tpl->tpl_vars[\'loggedin\']->value==true){?>/*/%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/';?>Herzlich Wilkommen, <?php echo '/*%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/<?php echo $_smarty_tpl->tpl_vars[\'username\']->value;?>
/*/%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/';?>.<?php echo '/*%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/<?php }else{ ?>/*/%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/';?>Hallo Gast<?php echo '/*%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/<?php }?>/*/%%SmartyNocache:4508047044e650dba4627c8-55174700%%*/';?><br />
</div>
</div>
<div id="footer">
Copyright &copy; by juliankern.com - Powered by MCMS Final 1 - Powered bei MNetwork Final 1
</div>
</div>
</body>
</html>
<?php }} ?>