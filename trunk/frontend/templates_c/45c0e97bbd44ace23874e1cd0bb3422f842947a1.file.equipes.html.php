<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:35:02
         compiled from "templates/template_1/html/equipes.html" */ ?>
<?php /*%%SmartyHeaderCode:1097920183532b18b6d6b000-58494183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45c0e97bbd44ace23874e1cd0bb3422f842947a1' => 
    array (
      0 => 'templates/template_1/html/equipes.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1097920183532b18b6d6b000-58494183',
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
  'unifunc' => 'content_532b18b6dd9b56_65529811',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18b6dd9b56_65529811')) {function content_532b18b6dd9b56_65529811($_smarty_tpl) {?>
<div class="body equipe">
  <div>
    <span>Equipe</span>
    <div class="section">
      <ul>
        <?php  $_smarty_tpl->tpl_vars['team'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['team']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Teams']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['team']->key => $_smarty_tpl->tpl_vars['team']->value) {
$_smarty_tpl->tpl_vars['team']->_loop = true;
?>
        <li>
          <a href="index.php?page=membre_equipe&id=<?php echo $_smarty_tpl->tpl_vars['team']->value['Id'];?>
"> <img src=<?php echo $_smarty_tpl->tpl_vars['team']->value['img'];?>
 alt=""> <?php echo $_smarty_tpl->tpl_vars['team']->value['Nom'];?>
 </a>
        </li>
        <?php } ?>
      </ul>
    </div>
    </div>
<?php }} ?>
