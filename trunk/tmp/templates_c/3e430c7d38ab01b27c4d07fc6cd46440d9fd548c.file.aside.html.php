<?php /* Smarty version Smarty-3.1.16, created on 2014-01-17 09:18:22
         compiled from "html/aside.html" */ ?>
<?php /*%%SmartyHeaderCode:68928046052d80864484437-72596252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e430c7d38ab01b27c4d07fc6cd46440d9fd548c' => 
    array (
      0 => 'html/aside.html',
      1 => 1389946699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68928046052d80864484437-72596252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d808645335a9_34410652',
  'variables' => 
  array (
    'Post' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d808645335a9_34410652')) {function content_52d808645335a9_34410652($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?>
  <div class="sidebar">
    <div class="news">
      <span>Dernière News</span>
      <ul><?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Post']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
	<li>
	  <a href="index.php?page=news&id_news="><?php echo $_smarty_tpl->tpl_vars['post']->value['titre'];?>
</a> <span>Posted on <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date'],"%d-%m-%Y");?>
</span>
	</li>
	<?php } ?>
      </ul>
      <a href="index.php?page=news">Read More</a>
    </div>
    <div class="section">
      <span>Calendrier</span>
      <ul>
	<li>
	  <a href="index.php?page=calendrier&date=">A vs B</a> <span>23 July 2023 @ 9AM</span>
	</li>
	<li>
	  <a href="index.php?page=calendrier&date=">A vs C</a> <span>23 July 2023 @ 9AM</span>
	</li>
      </ul>
      <a href="index.php?page=calendrier">Voir Calendrier</a>
    </div>
  </div>
</div>
<?php }} ?>
