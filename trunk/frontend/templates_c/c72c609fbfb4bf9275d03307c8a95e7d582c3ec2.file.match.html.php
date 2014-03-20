<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:34:59
         compiled from "templates/template_1/html/match.html" */ ?>
<?php /*%%SmartyHeaderCode:782720578532b18b36d1568-96687204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c72c609fbfb4bf9275d03307c8a95e7d582c3ec2' => 
    array (
      0 => 'templates/template_1/html/match.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '782720578532b18b36d1568-96687204',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Match' => 0,
    'match' => 0,
    'NSimple' => 0,
    'Fiche' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b18b377eca9_22955405',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18b377eca9_22955405')) {function content_532b18b377eca9_22955405($_smarty_tpl) {?>
<div class="body equipe">
  <div>
    <span> Match </span>
    <div class="section">
      <table >
	<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Match']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value) {
$_smarty_tpl->tpl_vars['match']->_loop = true;
?>
	<tr>
          <td><a href="index.php?page=match&v1=lire_match&v2=<?php echo $_smarty_tpl->tpl_vars['match']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['match']->value['name1'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['point1'];?>
 | <?php echo $_smarty_tpl->tpl_vars['match']->value['point2'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['name2'];?>

		|||    <?php echo $_smarty_tpl->tpl_vars['match']->value['date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['comm'];?>
 </a> </td>
	  
	</tr>
	
	<?php } ?>
      </table>
      <?php if ($_smarty_tpl->tpl_vars['NSimple']->value['one']) {?>
      <table>
	<tr>
	  <td> Point Equipe 1 </td> <td> Point Equipe 2 </td> <td> Carton Equipe 1 </td> <td> Carton Equipe 2 </td> 
	</tr>
	<tr>
	  <td> <?php echo $_smarty_tpl->tpl_vars['Fiche']->value['Point1'];?>
 </td><td> <?php echo $_smarty_tpl->tpl_vars['Fiche']->value['Point2'];?>
 </td><td> <?php echo $_smarty_tpl->tpl_vars['Fiche']->value['NbCarton1'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['Fiche']->value['NbCarton2'];?>
</td>
	</tr>
      </table>
      <?php }?>
    </div>
  </div>

<?php }} ?>
