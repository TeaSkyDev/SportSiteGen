<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 15:52:16
         compiled from "templates/template1/html/match.html" */ ?>
<?php /*%%SmartyHeaderCode:1937811229532ab1f20cfee9-24372449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3455da66b52f3ff92ae198cb616f24416156091' => 
    array (
      0 => 'templates/template1/html/match.html',
      1 => 1395327128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1937811229532ab1f20cfee9-24372449',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1f2128912_98627625',
  'variables' => 
  array (
    'Match' => 0,
    'match' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1f2128912_98627625')) {function content_532ab1f2128912_98627625($_smarty_tpl) {?><table class="partie" align="center">
    <tr>
      <th id="matchs"><img src="templates/template1/images/gauche.png"/><span>MATCHS</span><img src="templates/template1/images/droite.png"/></th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Match']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value) {
$_smarty_tpl->tpl_vars['match']->_loop = true;
?>
    <tr>
      <td align="center" id="case"> 
	<span>Le <?php echo $_smarty_tpl->tpl_vars['match']->value['date'];?>
 à <?php echo $_smarty_tpl->tpl_vars['match']->value['Lieu'];?>
</span>
	<br><br>
	<mark><?php echo $_smarty_tpl->tpl_vars['match']->value['name1'];?>
</mark> - <?php echo $_smarty_tpl->tpl_vars['match']->value['point1'];?>
 | <?php echo $_smarty_tpl->tpl_vars['match']->value['point2'];?>
 - <mark><?php echo $_smarty_tpl->tpl_vars['match']->value['name2'];?>
</mark>
      </td>
      <?php } ?>
    </tr>

</table>
<?php }} ?>
