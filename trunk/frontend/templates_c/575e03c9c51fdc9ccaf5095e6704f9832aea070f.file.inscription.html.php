<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:54:34
         compiled from "templates/template1/html/inscription.html" */ ?>
<?php /*%%SmartyHeaderCode:1534237558532b1cd1cdfb34-92271247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '575e03c9c51fdc9ccaf5095e6704f9832aea070f' => 
    array (
      0 => 'templates/template1/html/inscription.html',
      1 => 1395334470,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1534237558532b1cd1cdfb34-92271247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b1cd1d33132_89362175',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b1cd1d33132_89362175')) {function content_532b1cd1d33132_89362175($_smarty_tpl) {?><form method="post" action="index.php?page=inscription&action=insert">
	<table class="partie" align="center">
		<tr>
			<th colspan="2"><img src="templates/template1/images/gauche.png"/><span>INSCRIPTION</span><img src="templates/template1/images/droite.png"/></th>
		</tr>
		<tr>
			<th class="nomcase">Identifiant : </th><td><input type="text" name="pseudo"/></td>
		</tr>
		<tr>
			<th class="nomcase">Mail : </th><td><input type="email" name="email"/></td>
		</tr>
		<tr>
			<th class="nomcase">Mot de passe : </th><td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<th class="nomcase">Verification : </th><td><input type="password" name="password_verif"/></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" value="Ok"/></th>
		</tr>
	</table>
</form>
<?php }} ?>
