<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:15:34
         compiled from "templates/template_1/html/calendrier.html" */ ?>
<?php /*%%SmartyHeaderCode:1280908696532ab1b6256be4-41361830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d32e60af12c23c52e7d3e34967e7d36174b5efd' => 
    array (
      0 => 'templates/template_1/html/calendrier.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1280908696532ab1b6256be4-41361830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1b62f8220_82939880',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1b62f8220_82939880')) {function content_532ab1b62f8220_82939880($_smarty_tpl) {?>
<div class="body calendrier">
  <div>
    <span>Calendrier</span>
    <div>
      <ul>
        <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
	<li>
	  <span><a href="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['event']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
</a></span>
	  <div>
	    <span><?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</span> <span><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</span>
	    <p>
              <?php echo $_smarty_tpl->tpl_vars['event']->value['contenu'];?>

	    </p>
	  </div>
	</li>
        <?php } ?>
      </ul>

    </div>
  </div>

<?php }} ?>
