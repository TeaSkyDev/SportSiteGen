<?php /* Smarty version Smarty-3.1.16, created on 2014-01-21 10:24:39
         compiled from "html/membre_equipe.html" */ ?>
<?php /*%%SmartyHeaderCode:178693696152de3b3339d808-01552881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3394003c1369a9bd323106dcaad51bee7a8522b8' => 
    array (
      0 => 'html/membre_equipe.html',
      1 => 1390296013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178693696152de3b3339d808-01552881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de3b334053a1_61929386',
  'variables' => 
  array (
    'Membre' => 0,
    'membre' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de3b334053a1_61929386')) {function content_52de3b334053a1_61929386($_smarty_tpl) {?>
<div class="body equipe">
  <div>
    <span>Membre</span> <a href="index.php?page=equipe" id="paging">> Retour</a>
    <div class="section">
      <ul>
	<?php  $_smarty_tpl->tpl_vars['membre'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['membre']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Membre']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['membre']->key => $_smarty_tpl->tpl_vars['membre']->value) {
$_smarty_tpl->tpl_vars['membre']->_loop = true;
?>
	<li>
	  <a href="index.php?page=fiche_joueur&id=<?php echo $_smarty_tpl->tpl_vars['membre']->value['Id'];?>
"> <img src="<?php echo $_smarty_tpl->tpl_vars['membre']->value['img'];?>
" alt=""><?php echo $_smarty_tpl->tpl_vars['membre']->value['Nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['membre']->value['Prenom'];?>
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
