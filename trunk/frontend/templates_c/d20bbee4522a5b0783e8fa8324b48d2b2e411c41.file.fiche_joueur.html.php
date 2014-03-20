<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 18:10:37
         compiled from "templates/template1/html/fiche_joueur.html" */ ?>
<?php /*%%SmartyHeaderCode:1568654554532b06baee8f17-94843312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd20bbee4522a5b0783e8fa8324b48d2b2e411c41' => 
    array (
      0 => 'templates/template1/html/fiche_joueur.html',
      1 => 1395335435,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1568654554532b06baee8f17-94843312',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532b06bb04d612_98985762',
  'variables' => 
  array (
    'joueur' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b06bb04d612_98985762')) {function content_532b06bb04d612_98985762($_smarty_tpl) {?><div class="body fiche_joueur">
  <div class="membre">
    <img src="templates/template1/images/gauche.png"/><span><b><?php echo $_smarty_tpl->tpl_vars['joueur']->value['Prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Nom'];?>
</b></span><img src="templates/template1/images/droite.png"/>
    <br><br>
    <a href="index.php?page=membre_equipe&id=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['IdTeam'];?>
"> Retour </a> </span>
<div>
  <br><br><br>
  <span><img src="<?php echo $_smarty_tpl->tpl_vars['joueur']->value['img'];?>
" alt="" width="150"></span>
  <h3 id="stats">STATS</h3>
  <p>
    <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Description'];?>

  </p>
</div>
</div>

<?php }} ?>
