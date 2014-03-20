<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 18:11:42
         compiled from "templates/template1/html/membre_equipe.html" */ ?>
<?php /*%%SmartyHeaderCode:696017771532af56a94b373-25779329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18a0b669a839fd3cbbc66f41e3f4d53a91c7fe95' => 
    array (
      0 => 'templates/template1/html/membre_equipe.html',
      1 => 1395335497,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '696017771532af56a94b373-25779329',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532af56a9da5e1_82851097',
  'variables' => 
  array (
    'MEquipe' => 0,
    'joueur' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532af56a9da5e1_82851097')) {function content_532af56a9da5e1_82851097($_smarty_tpl) {?><div>
  <div class="membre">
    <img src="templates/template1/images/gauche.png"/><span><b>MEMBRES</b></span><img src="templates/template1/images/droite.png"/>
    <a href="index.php?page=equipes"><br><br>Retour </a> 
    <div class="section">
      <ul>
	<?php  $_smarty_tpl->tpl_vars['joueur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['joueur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MEquipe']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['joueur']->key => $_smarty_tpl->tpl_vars['joueur']->value) {
$_smarty_tpl->tpl_vars['joueur']->_loop = true;
?>
	<li>
	  <a href="index.php?page=fiche_joueur&id=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['Id'];?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['joueur']->value['img'];?>
" alt="" width="150"> <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Nom'];?>
 </a>
	</li>
	<?php } ?>
      </ul>
    </div>
  </div>


<?php }} ?>
