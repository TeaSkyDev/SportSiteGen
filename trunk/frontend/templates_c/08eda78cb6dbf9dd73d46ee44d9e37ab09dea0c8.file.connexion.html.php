<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 14:51:58
         compiled from "templates/template1/html/connexion.html" */ ?>
<?php /*%%SmartyHeaderCode:1697094772532af27e411733-31265059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '08eda78cb6dbf9dd73d46ee44d9e37ab09dea0c8' => 
    array (
      0 => 'templates/template1/html/connexion.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1697094772532af27e411733-31265059',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532af27e4867f6_55295726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532af27e4867f6_55295726')) {function content_532af27e4867f6_55295726($_smarty_tpl) {?><form method="post" action="index.php?page=connexion&action=verif">
	<table class="partie" align="center">
		<tr>
			<th colspan="2"><img src="templates/template1/images/gauche.png"/><span>CONNEXION</span><img src="templates/template1/images/droite.png"/></th>
		</tr>
		<tr>
			<th class="nomcase">Identifiant : </th><td><input type="text" name="pseudo"/></td>
		</tr>
		<tr>
			<th class="nomcase">Mot de passe : </th><td><input type="password" name="password"/></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" value="ok"/></th>
		</tr>
	</table>
</form><?php }} ?>
