<?php /* Smarty version Smarty-3.1.16, created on 2014-02-05 12:44:53
         compiled from "html/accueil.html" */ ?>
<?php /*%%SmartyHeaderCode:79957063352d7f905b3af86-18615992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b0d423aa26f03dcadceff7e18a3519fecab75f8' => 
    array (
      0 => 'html/accueil.html',
      1 => 1391599817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79957063352d7f905b3af86-18615992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d7f905bed2b0_96036188',
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d7f905bed2b0_96036188')) {function content_52d7f905bed2b0_96036188($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/gas/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?>
<div class="body news">
  <div>
    <span>News</span>
    <ul><?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
      <li>
	<a href="index.php?page=news&id_news="><img src= "<?php echo $_smarty_tpl->tpl_vars['news']->value['img'];?>
" alt=""></a>
	<div>
	  <h3><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
</h3>
	  <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['news']->value['date'],"%d-%m-%Y");?>
 <span></span></span>
	  <p>
	    <?php echo $_smarty_tpl->tpl_vars['news']->value['contenu'];?>

	  </p>
	  <a href="index.php?page=news&id_news=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&details=true">Read More</a>
	</div>
      </li>
      <?php } ?>
    </ul>
  </div>
  
</div>
<div class="footer">
  <div>
    <ul>
      <li>
	<a href="index.php?page=news">News</a>
      </li>
      <li>
	<a href="index.php?page=equipe">Equipe</a>
      </li>
      <li>
	<a href="index.php?page=calendrier">Calendrier</a>
      </li>
      <li>
	<a href="index.php?page=about">About</a>
      </li>
    </ul>
    <p>
      &#169; Akatsubaki 2013. All Rights Reserved
    </p>
  </div>
  <div class="connect">
    <span>Follow Us</span> <a href="" id="fb">fb</a> <a href="" id="twitter">twitter</a> <a href="" id="googleplus">google+</a> <a href="" id="contact">contact</a>
  </div>
</div>
</body>
</html>
<?php }} ?>
