<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 15:13:51
         compiled from "templates/template_1/html/accueil.html" */ ?>
<?php /*%%SmartyHeaderCode:184591733532ab1af80ddb9-75138453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb4bf4e87c1bd9957be4659947be619d3d9d9090' => 
    array (
      0 => 'templates/template_1/html/accueil.html',
      1 => 1395755006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184591733532ab1af80ddb9-75138453',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1af8cc031_90490871',
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1af8cc031_90490871')) {function content_532ab1af8cc031_90490871($_smarty_tpl) {?><div class="body news">
  <div>
    <span>News</span>
    <ul>
      <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
      <li>
	<a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
"><img src="images/news1.jpg" alt=""></a>
	<div>
	  <h3><a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
</a></h3>
	  <span><?php echo $_smarty_tpl->tpl_vars['news']->value['date'];?>
</span>
	  <p>
	    <?php echo $_smarty_tpl->tpl_vars['news']->value['contenu'];?>

	  </p>
	  <a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
">Read More</a>
	</div>
      </li>
      <?php } ?>
    </ul>
	
  </div>
  
<?php }} ?>
