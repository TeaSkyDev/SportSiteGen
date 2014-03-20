<?php /* Smarty version Smarty-3.1.16, created on 2014-03-19 13:21:19
         compiled from "templates/debug/html/accueil.html" */ ?>
<?php /*%%SmartyHeaderCode:89362340653298bbf1b3d24-41423101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '780a29c3cb333abb44cc06823270a473caa7631e' => 
    array (
      0 => 'templates/debug/html/accueil.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89362340653298bbf1b3d24-41423101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
    'Events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53298bbf232861_25005966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53298bbf232861_25005966')) {function content_53298bbf232861_25005966($_smarty_tpl) {?><table align="center">
    <tr>
        <th>NEWS</th>
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
    <tr>
        <th>CALENDRIER</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
    <tr>
        <td><a href="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['event']->value['Id'];?>
"><u><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</u></a> - <i><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</i></td>
    </tr>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['event']->value['contenu'];?>
</td>
    </tr>
    <?php } ?>
</table>
<?php }} ?>
