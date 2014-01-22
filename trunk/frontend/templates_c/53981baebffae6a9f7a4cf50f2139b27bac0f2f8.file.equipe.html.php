<?php /* Smarty version Smarty-3.1.16, created on 2014-01-21 10:17:37
         compiled from "html/equipe.html" */ ?>
<?php /*%%SmartyHeaderCode:105062645652de3b313fdd58-50757279%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53981baebffae6a9f7a4cf50f2139b27bac0f2f8' => 
    array (
      0 => 'html/equipe.html',
      1 => 1390295831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105062645652de3b313fdd58-50757279',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Equipe' => 0,
    'equipe' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de3b31490849_56400799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de3b31490849_56400799')) {function content_52de3b31490849_56400799($_smarty_tpl) {?>
<div class="body equipe">
  <div>
    <span>Equipe</span>
    <div class="section">
      <ul>
	<?php  $_smarty_tpl->tpl_vars['equipe'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['equipe']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Equipe']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['equipe']->key => $_smarty_tpl->tpl_vars['equipe']->value) {
$_smarty_tpl->tpl_vars['equipe']->_loop = true;
?>
	<li>
	  <a href="index.php?page=membre_equipe&id=<?php echo $_smarty_tpl->tpl_vars['equipe']->value['Id'];?>
"> <img src=<?php echo $_smarty_tpl->tpl_vars['equipe']->value['img'];?>
 alt=""> <?php echo $_smarty_tpl->tpl_vars['equipe']->value['Nom'];?>
 </a>
	</li>
	<?php } ?>
      </ul>
    </div>
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
</div>
</div>
</body>
</html>
<?php }} ?>
