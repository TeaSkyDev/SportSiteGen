<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:34:45
         compiled from "templates/template_1/html/tournoi.html" */ ?>
<?php /*%%SmartyHeaderCode:1461318178532b18a50d0030-91326700%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b33e266d77e6c6e9ed3ff12ac6a4524f1868ce69' => 
    array (
      0 => 'templates/template_1/html/tournoi.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1461318178532b18a50d0030-91326700',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Tournoi' => 0,
    'tour' => 0,
    'Match' => 0,
    'match' => 0,
    'NSimple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b18a51b2422_32036763',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18a51b2422_32036763')) {function content_532b18a51b2422_32036763($_smarty_tpl) {?><div class="body equipe">
  <div>
    <span> Tournoi </span>
    <table >
      <?php  $_smarty_tpl->tpl_vars['tour'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tour']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Tournoi']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tour']->key => $_smarty_tpl->tpl_vars['tour']->value) {
$_smarty_tpl->tpl_vars['tour']->_loop = true;
?>
      <tr>
	<td><a href="index.php?page=tournois&v1=lire_tourn&v2=<?php echo $_smarty_tpl->tpl_vars['tour']->value['Id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['tour']->value['Nom'];?>
</a> - <?php echo $_smarty_tpl->tpl_vars['tour']->value['DateDebut'];?>
 / <?php echo $_smarty_tpl->tpl_vars['tour']->value['DateFin'];?>
 </td>
      </tr>
      <tr> 
	<td> <?php echo $_smarty_tpl->tpl_vars['tour']->value['Description'];?>
 </td>
      </tr>
      <?php } ?>
    </table>
    <table>
      <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Match']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value) {
$_smarty_tpl->tpl_vars['match']->_loop = true;
?>
      <tr>
	<td> <a href="index.php?page=match&id=<?php echo $_smarty_tpl->tpl_vars['match']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['match']->value['name1'];?>
 vs <?php echo $_smarty_tpl->tpl_vars['match']->value['name2'];?>
 ||| <?php echo $_smarty_tpl->tpl_vars['match']->value['date'];?>
 </a></td>
      </tr>
      <tr>
	<td>Description: <?php echo $_smarty_tpl->tpl_vars['match']->value['comm'];?>
 </td>
      </tr>

      <?php } ?>
    </table>
    <?php if ($_smarty_tpl->tpl_vars['NSimple']->value['one']==1) {?>
    <canvas id="arbre" width="900" height="500"></canvas>
    <script src="js/BinaryTree.js"></script>
    <?php }?>
  </div>
<?php }} ?>
