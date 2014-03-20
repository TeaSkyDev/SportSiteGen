<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:15:44
         compiled from "templates/debug/html/connexion.html" */ ?>
<?php /*%%SmartyHeaderCode:1988179050532ab1c0808039-46737389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1d4dc470fb99bd38f81daea01f649fb5152d07ab' => 
    array (
      0 => 'templates/debug/html/connexion.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1988179050532ab1c0808039-46737389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1c0867c21_15866360',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1c0867c21_15866360')) {function content_532ab1c0867c21_15866360($_smarty_tpl) {?><form method="post" action="index.php?page=connexion&action=verif">
<table align="center">
	<tr>
		<th colspan="2">CONNEXION</th>
	</tr>
	<tr>
		<th>Pseudo : </th><td><input type="text" name="pseudo"/></td>
	</tr>
	<tr>
		<th>Mdp : </th><td><input type="password" name="password"/></td>
	</tr>
	<tr>
		<th colspan="2"><input type="submit" value="Valider"/></th>
	</tr>
</table>
</form>
<?php }} ?>
