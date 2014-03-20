<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 17:34:57
         compiled from "templates/template_1/html/news.html" */ ?>
<?php /*%%SmartyHeaderCode:1256953524532b18b16f3db0-91289727%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f45512b4e3b08e3e3bfde45f1c8f774c4b3c58a9' => 
    array (
      0 => 'templates/template_1/html/news.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1256953524532b18b16f3db0-91289727',
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
  'unifunc' => 'content_532b18b1794889_28374514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532b18b1794889_28374514')) {function content_532b18b1794889_28374514($_smarty_tpl) {?><div class="body news">
  <div>
    <span>News</span>
    <table align="center">
      <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
      <tr>
	<td><a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
"><img src=<?php echo $_smarty_tpl->tpl_vars['news']->value['img'];?>
/><u><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
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
  <?php } else { ?>
  <p>Vous devez être connecté pour poster un commentaire. <a href="index.php?page=connexion">Se connecter</a></p><br>

  <?php }?>
  <?php }?>
</table>
</div>




<?php }} ?>
