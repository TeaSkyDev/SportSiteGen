<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 14:44:04
         compiled from "templates/debug/html/profil_modif.html" */ ?>
<?php /*%%SmartyHeaderCode:187783549753318824b762b5-96421819%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c159a449357bf2a02361030dad156f7c88f0cdc' => 
    array (
      0 => 'templates/debug/html/profil_modif.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187783549753318824b762b5-96421819',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Modif' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53318824c40f75_91262554',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53318824c40f75_91262554')) {function content_53318824c40f75_91262554($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['Modif']->value=="pseudo") {?>
    <form method="post" action="index.php?page=profil&v1=modif_pseudo&v2=true">
    <table align="center">
        <tr>
            <th colspan="2">Modification du pseudo</th>
        </tr>
        <tr>
            <th>Pseudo : </th>
            <td><input type="text" name="pseudo"/></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" value="Modifier"/></th>
        </tr>
    </table>
    </form>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['Modif']->value=="password") {?>
<form method="post" action="index.php?page=profil&v1=modif_password&v2=true">
    <table align="center">
        <tr>
            <th colspan="2">Modification du mot de passe</th>
        </tr>
        <tr>
            <th>Ancien mot de passe : </th>
            <td><input type="password" name="ancien_password"/></td>
        </tr>
        <tr>
            <th>Mot de passe : </th>
            <td><input type="password" name="password"/></td>
        </tr>
        <tr>
            <th>Vérification : </th>
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
    <table align="center">
        <tr>
            <th colspan="2">Modification du mail</th>
        </tr>
        <tr>
            <th>Ancien mot du mail : </th>
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
    <table align="center">
        <tr>
            <th colspan="2">Modification de la photo</th>
        </tr>
        <tr>
            <th>Parcourir : </th>
            <td><input type="file" name="photo"/></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" value="Modifier"/></th>
        </tr>
    </table>
</form>
<?php }?>
<?php }} ?>
