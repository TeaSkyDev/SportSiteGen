<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 15:13:10
         compiled from "templates/template1/html/profil.html" */ ?>
<?php /*%%SmartyHeaderCode:1064862670532af776ebccc2-93478800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4efb9bc3ded3033a11a1c54a5bcc1abc37589d94' => 
    array (
      0 => 'templates/template1/html/profil.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1064862670532af776ebccc2-93478800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Profil' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532af77701b685_39117237',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532af77701b685_39117237')) {function content_532af77701b685_39117237($_smarty_tpl) {?><table align="center">
	<tr>
		<th><?php echo $_smarty_tpl->tpl_vars['Profil']->value['Id'];?>
 - <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Pseudo'];?>
</th>
	</tr>
	<tr>
		<td>Mail : <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mail'];?>
</td>
	</tr>
	<tr>
		<td>Mdp : <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mdp'];?>
</td>
	</tr>
</table><?php }} ?>
