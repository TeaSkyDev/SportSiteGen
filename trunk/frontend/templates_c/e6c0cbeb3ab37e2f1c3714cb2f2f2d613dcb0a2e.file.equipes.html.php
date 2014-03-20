<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:46:26
         compiled from "templates/template1/html/equipes.html" */ ?>
<?php /*%%SmartyHeaderCode:1918220108532ab1f3803679-26537508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6c0cbeb3ab37e2f1c3714cb2f2f2d613dcb0a2e' => 
    array (
      0 => 'templates/template1/html/equipes.html',
      1 => 1395333983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1918220108532ab1f3803679-26537508',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1f38816c2_18822981',
  'variables' => 
  array (
    'Teams' => 0,
    'team' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1f38816c2_18822981')) {function content_532ab1f38816c2_18822981($_smarty_tpl) {?><table class="partie" align="center">
  <tr>
    <th id="matchs"><img src="templates/template1/images/gauche.png"/><span>EQUIPES</span><img src="templates/template1/images/droite.png"/></th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value) {
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
  <tr>
    <td>
      <a href="index.php?page=membre_equipe&id=<?php echo $_smarty_tpl->tpl_vars['team']->value['Id'];?>
"> <img id="avatar" src=../photos/<?php echo $_smarty_tpl->tpl_vars['team']->value['img'];?>
 alt=""  width="50" height="50" /><?php echo $_smarty_tpl->tpl_vars['team']->value['Nom'];?>
 </a>
    </td>
  </tr>
  <?php } ?>
</table>
<?php }} ?>
