<?php /* Smarty version Smarty-3.1.16, created on 2014-01-28 08:28:15
         compiled from "html/news.html" */ ?>
<?php /*%%SmartyHeaderCode:113030903752d7fb085def72-96736192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72900632c234ccb7d0c92dfcd1f08d58f37474f1' => 
    array (
      0 => 'html/news.html',
      1 => 1390894091,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113030903752d7fb085def72-96736192',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d7fb08648936_98079328',
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
    'Pages' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d7fb08648936_98079328')) {function content_52d7fb08648936_98079328($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?><form method="post" action="index.php?page=news&research=true">
    <input type="text" autocomplete="off" name="val" id="champ_recherche" /><input type="submit" value="Rechercher" />
</form>
<div id="output" class="hide result"></div>
<script type="text/javascript" src="js/oXHR.js"></script>
<script type="text/javascript" src="js/news_research.js"></script>

<div class="body news">

  <div>
    <span>News</span>
    <ul><?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
      <li>
	<a href="index.php?page=news&id_news=<?php echo $_smarty_tpl->tpl_vars['news']->value['id'];?>
&details=true"><img src= "<?php echo $_smarty_tpl->tpl_vars['news']->value['img'];?>
" alt=""></a>
	<div>
	  <h3>N°<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
 | <?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
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
      -<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?> <a href="index.php?page=news&page_news=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a> - <?php } ?>
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
