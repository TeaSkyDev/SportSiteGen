<?php /* Smarty version Smarty-3.1.16, created on 2014-01-16 10:41:38
         compiled from "test.html" */ ?>
<?php /*%%SmartyHeaderCode:186101046852d65c6c052f90-52125425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5017803b9ee9b00cc52db4a18a64b71cfc076fd7' => 
    array (
      0 => 'test.html',
      1 => 1389865296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186101046852d65c6c052f90-52125425',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d65c6c100e19_16324589',
  'variables' => 
  array (
    'Titre' => 0,
    'liste_news' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d65c6c100e19_16324589')) {function content_52d65c6c100e19_16324589($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?><html>

<h1> <?php echo $_smarty_tpl->tpl_vars['Titre']->value;?>
 </h1>

<?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['liste_news']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
<h1><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
</h1>
<p> a ete ecrit le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d-%m-%Y");?>

<br/><?php echo $_smarty_tpl->tpl_vars['news']->value['contenu'];?>
<?php } ?></p>

</html>
<?php }} ?>
