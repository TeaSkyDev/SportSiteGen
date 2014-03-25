<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 15:46:47
         compiled from "templates/template1/html/profil_modif.html" */ ?>
<?php /*%%SmartyHeaderCode:99658709353318a07c95106-90926900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70eeb7ff41d59e4e2e87a411e45cd44fe5e6c117' => 
    array (
      0 => 'templates/template1/html/profil_modif.html',
      1 => 1395758803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99658709353318a07c95106-90926900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53318a07d57898_24437413',
  'variables' => 
  array (
    'Modif' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53318a07d57898_24437413')) {function content_53318a07d57898_24437413($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['Modif']->value=="pseudo") {?>
<form method="post" action="index.php?page=profil&v1=modif_pseudo&v2=true">
  <table class="partie" align="center">
    <tr>
      <th colspan="2"><h1>Modification du pseudo</h1></th>
    </tr>
    <tr>
      <th class="nomcase">Pseudo : </th><td><input type="text" name="pseudo"/></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" value="Modifier"/></th>
    </tr>
  </table>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['Modif']->value=="password") {?>
<form method="post" action="index.php?page=profil&v1=modif_password&v2=true">
  <table class="partie" align="center">
    <tr>
      <th colspan="2"><h1>Modification du mot de passe</h1></th>
    </tr>
    <tr>
      <th class="nomcase">Ancien mot de passe : </th>
      <td><input type="password" name="ancien_password"/></td>
    </tr>
    <tr>
      <th class="nomcase">Mot de passe : </th>
      <td><input type="password" name="password"/></td>
    </tr>
    <tr>
      <th class="nomcase">Vérification : </th>
      <td><input type="password" name="verif_password"/></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" value="Modifier"/></th>
    </tr>
  </table>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['Modif']->value=="mail") {?>
<form method="post" action="index.php?page=profil&v1=modif_mail&v2=true">
  <table class="partie" align="center">
    <tr>
      <th colspan="2"><h1>Modification du mail</h1></th>
    </tr>
    <tr>
      <th class="nomcase">Ancien mot du mail : </th>
      <td><input type="text" name="mail"/></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" value="Modifier"/></th>
    </tr>
  </table>
</form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['Modif']->value=="photo") {?>
<form method="post" action="index.php?page=profil&v1=modif_photo&v2=true" enctype="multipart/form-data">
  <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
  <table class="partie" align="center">
    <tr>
      <th colspan="2"><h1>Modification de la photo</h1></th>
    </tr>
    <tr>
      <th class="nomcase">Parcourir : </th>
      <td><input type="file" name="photo"/></td>
    </tr>
    <tr>
      <th colspan="2"><input type="submit" value="Modifier"/></th>
    </tr>
  </table>
</form>
<?php }?>
<?php }} ?>
