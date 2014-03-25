<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 15:13:37
         compiled from "templates/debug/html/profil.html" */ ?>
<?php /*%%SmartyHeaderCode:481856732533186bd817541-47027687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ae01c99c91ac42813014edb904f331cf6811357' => 
    array (
      0 => 'templates/debug/html/profil.html',
      1 => 1395755205,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '481856732533186bd817541-47027687',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_533186bd9475b9_60270912',
  'variables' => 
  array (
    'Profil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533186bd9475b9_60270912')) {function content_533186bd9475b9_60270912($_smarty_tpl) {?><table align="center">
  <tr>
    <th>PROFIL</th>
  </tr>
  <tr>
    <td><img src="../photos/utilisateurs/<?php echo $_smarty_tpl->tpl_vars['Profil']->value['Photo'];?>
"/><i><a href="index.php?page=profil&v1=modif_photo">(modifier)</a></i></td>
  </tr>
  <tr>
    <td>Pseudo : <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Pseudo'];?>
 <i><a href="index.php?page=profil&v1=modif_pseudo">(modifier)</a></i></td>
  </tr>
  <tr>
    <td>Mail : <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mail'];?>
 <i><a href="index.php?page=profil&v1=modif_mail">(modifier)</a></i></td>
  </tr>
  <tr>
    <td>Mdp : <?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mdp'];?>
 <i><a href="index.php?page=profil&v1=modif_password">(modifier)</a></i></td>
  </tr>
</table>
<?php }} ?>
