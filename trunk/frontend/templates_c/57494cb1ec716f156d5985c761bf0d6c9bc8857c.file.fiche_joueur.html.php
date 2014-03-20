<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:35:07
         compiled from "templates/template_1/html/fiche_joueur.html" */ ?>
<?php /*%%SmartyHeaderCode:1801147629532b18bb6e79e3-51120907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57494cb1ec716f156d5985c761bf0d6c9bc8857c' => 
    array (
      0 => 'templates/template_1/html/fiche_joueur.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1801147629532b18bb6e79e3-51120907',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'joueur' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b18bb762257_26267030',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18bb762257_26267030')) {function content_532b18bb762257_26267030($_smarty_tpl) {?><div class="body fiche_joueur">
  <div>
    <span><?php echo $_smarty_tpl->tpl_vars['joueur']->value['Prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Nom'];?>
 <a href="index.php?page=membre_equipe&id=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['IdTeam'];?>
"> Retour </a> </span>
    <div>
      <span><img src=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['img'];?>
 alt=""></span>
      <h3>STAT</h3>
      <p>
	<?php echo $_smarty_tpl->tpl_vars['joueur']->value['Description'];?>

      </p>
      </div>
    </div>

<?php }} ?>
