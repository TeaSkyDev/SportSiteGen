<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:16:32
         compiled from "templates/template1/html/news.html" */ ?>
<?php /*%%SmartyHeaderCode:59931722532ab1f0c1d930-21686243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4706bef335f6a8ae1a48bed7637392d47077f5e1' => 
    array (
      0 => 'templates/template1/html/news.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59931722532ab1f0c1d930-21686243',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
    'Com' => 0,
    'com' => 0,
    'NSimple' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1f0cd5991_38995183',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1f0cd5991_38995183')) {function content_532ab1f0cd5991_38995183($_smarty_tpl) {?><table class="partie" align="center">
  <tr>
    <th><img src="templates/template1/images/gauche.png"/><span>NEWS</span><img src="templates/template1/images/droite.png"/></th>
  </tr>
  <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
  <tr>
    <td><a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
"><u><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
</u></a> - <i><?php echo $_smarty_tpl->tpl_vars['news']->value['date'];?>
</i></td>
  </tr>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['news']->value['contenu'];?>
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
</u></a> - <i><?php echo $_smarty_tpl->tpl_vars['com']->value['date'];?>
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
  <th><form action="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['NSimple']->value['Id'];?>
&news_com=true" method="post" >
  <textarea name="message" id="message" cols="30" rows="10" ></textarea><br/>
  <input type="hidden" name="id_news" value="<?php echo $_smarty_tpl->tpl_vars['NSimple']->value['Id'];?>
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
