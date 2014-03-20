<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:35:06
         compiled from "templates/template_1/html/membre_equipe.html" */ ?>
<?php /*%%SmartyHeaderCode:1274246974532b18ba92f8d5-05038794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '221176936a0ec268db70de4e86fab1ba4ebe7bdd' => 
    array (
      0 => 'templates/template_1/html/membre_equipe.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1274246974532b18ba92f8d5-05038794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MEquipe' => 0,
    'joueur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b18ba9a3ae5_75498822',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18ba9a3ae5_75498822')) {function content_532b18ba9a3ae5_75498822($_smarty_tpl) {?><div class="body equipe">
  <div>
    <span>Membre <a href="index.php?page=equipes"> Retour </a></span> 
    <div class="section">
      <?php  $_smarty_tpl->tpl_vars['joueur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['joueur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MEquipe']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['joueur']->key => $_smarty_tpl->tpl_vars['joueur']->value) {
$_smarty_tpl->tpl_vars['joueur']->_loop = true;
?>
      <ul>
	<li>
	  <a href="index.php?page=fiche_joueur&id=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['Id'];?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['joueur']->value['img'];?>
" alt=""> <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Prenom'];?>
 - <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Nom'];?>
 </a>
	</li>
      </ul>
      <?php } ?>
    </div>
  </div>


<?php }} ?>
