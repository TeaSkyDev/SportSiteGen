<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:15:55
         compiled from "templates/template1/html/calendrier.html" */ ?>
<?php /*%%SmartyHeaderCode:2048183177532ab1cbbfbd98-79345709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '533aafd2bfa4afe81ed2176b838fe89e9adf3035' => 
    array (
      0 => 'templates/template1/html/calendrier.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2048183177532ab1cbbfbd98-79345709',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Events' => 0,
    'event' => 0,
    'Com' => 0,
    'com' => 0,
    'NSimple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1cbcb9cb2_14116573',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1cbcb9cb2_14116573')) {function content_532ab1cbcb9cb2_14116573($_smarty_tpl) {?><table class="partie" align="center">
    <tr>
        <th><img src="templates/template1/images/gauche.png"/><span>CALENDRIER</span><img src="templates/template1/images/droite.png"/></th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
    <tr>
        <td><a href="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['event']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</a> - <i><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</i></td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['contenu'];?>
</td>
    </tr>
    <?php } ?>
</table>
<table align="center">
  <?php  $_smarty_tpl->tpl_vars['com'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['com']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Com']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['com']->key => $_smarty_tpl->tpl_vars['com']->value) {
$_smarty_tpl->tpl_vars['com']->_loop = true;
?>
  <tr>
    <td><u><?php echo $_smarty_tpl->tpl_vars['com']->value['utilisateur'];?>
</u> - <i><?php echo $_smarty_tpl->tpl_vars['com']->value['date'];?>
</td>
  </tr>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['com']->value['contenu'];?>
</td>
  </tr>
  <?php } ?>
</table>
<?php if ($_smarty_tpl->tpl_vars['NSimple']->value['one']==1) {?>
<?php if ($_smarty_tpl->tpl_vars['NSimple']->value['connected']==1) {?>
<table align="center">
  <tr>
  <th><form action="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['NSimple']->value['Id'];?>
&news_com=true" method="post" >
  <textarea name="message" id="message" cols="30" rows="10" ></textarea><br/>
  <input type="hidden" name="id_cal" value="<?php echo $_smarty_tpl->tpl_vars['NSimple']->value['Id'];?>
" />
  <input type="submit" value="Commenter"/>
</form>
  </th>
  </tr>
</table>
<?php } else { ?>
<span> Vous devez être connecté pour poster un commentaire. <a href="index.php?page=connexion">Se connecter</a></span><br>

<?php }?>
<?php }?>

<?php }} ?>
