<?php /* Smarty version Smarty-3.1.16, created on 2014-03-21 08:39:34
         compiled from "templates/template1/index.html" */ ?>
<?php /*%%SmartyHeaderCode:65845914553298c858b5dc0-40369328%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57e66c29187aee2acb7c10323dd61b8d9152fa1d' => 
    array (
      0 => 'templates/template1/index.html',
      1 => 1395387571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65845914553298c858b5dc0-40369328',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53298c858d6171_60051209',
  'variables' => 
  array (
    'Name' => 0,
    'Style' => 0,
    'style' => 0,
    'Header' => 0,
    'menu' => 0,
    'Connect' => 0,
    'connect' => 0,
    'Content' => 0,
    'AsideNews' => 0,
    'it' => 0,
    'AsideCal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53298c858d6171_60051209')) {function content_53298c858d6171_60051209($_smarty_tpl) {?>
<html>

  <header>
    <title><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php  $_smarty_tpl->tpl_vars['style'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['style']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Style']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['style']->key => $_smarty_tpl->tpl_vars['style']->value) {
$_smarty_tpl->tpl_vars['style']->_loop = true;
?>
	<link rel="icon" type="image/png" href="templates/template1/images/favicon.png" />
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" type="text/css">
    <?php } ?>
  </header>
  
  
  <body>
    <center>
      <a style="text-decoration:none;" href="index.php?page=accueil">
	<img id="img" src="templates/template1/images/hockey.png" title="Illustration" alt="Illustration">
	<h1 id="titre"><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</h1>
      </a>
      <nav id="menu">
	<ul>
	  <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
	  <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
<br></a></li>
	  <?php } ?>
	</ul>
      </nav>
      
      <nav id="top">
	<?php  $_smarty_tpl->tpl_vars['connect'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['connect']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Connect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['connect']->key => $_smarty_tpl->tpl_vars['connect']->value) {
$_smarty_tpl->tpl_vars['connect']->_loop = true;
?>
	<li><a href="<?php echo $_smarty_tpl->tpl_vars['connect']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['connect']->value['title'];?>
</a></li>
	<?php } ?>
      </nav>
      
      
      <?php echo $_smarty_tpl->tpl_vars['Content']->value;?>

      
      <table class="aside">
	<tr>
	  <th>LAST NEWS</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
	<tr class="lienaside">
	  <td><a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['it']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</td>
	</tr>
	<?php } ?>
	<tr>
	  <th>LAST EVENTS</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideCal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
	<tr class="lienaside">
	  <td><a href="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['it']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</td>
	</tr>
	<?php } ?>
      </table>
      
      
    </center>
  </body>
  
</html>
<?php }} ?>
