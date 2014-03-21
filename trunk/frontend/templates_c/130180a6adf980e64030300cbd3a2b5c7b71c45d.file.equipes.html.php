<?php /* Smarty version Smarty-3.1.16, created on 2014-03-21 08:26:03
         compiled from "templates/debug/html/equipes.html" */ ?>
<?php /*%%SmartyHeaderCode:305848701532be98b27ae10-19933863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '130180a6adf980e64030300cbd3a2b5c7b71c45d' => 
    array (
      0 => 'templates/debug/html/equipes.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '305848701532be98b27ae10-19933863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Teams' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532be98b2e22c0_32721048',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532be98b2e22c0_32721048')) {function content_532be98b2e22c0_32721048($_smarty_tpl) {?><table align="center">
	<?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value) {
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
	<tr>
		<td><b><?php echo $_smarty_tpl->tpl_vars['team']->value['Nom'];?>
</b></td>
	</tr>
	<?php } ?>
</table><?php }} ?>
