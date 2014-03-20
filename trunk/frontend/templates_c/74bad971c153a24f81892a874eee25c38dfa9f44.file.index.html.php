<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:15:27
         compiled from "templates/template_1/index.html" */ ?>
<?php /*%%SmartyHeaderCode:1733614812532ab1af8fb898-99975794%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74bad971c153a24f81892a874eee25c38dfa9f44' => 
    array (
      0 => 'templates/template_1/index.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1733614812532ab1af8fb898-99975794',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Name' => 0,
    'Header' => 0,
    'menu' => 0,
    'Content' => 0,
    'AsideNews' => 0,
    'it' => 0,
    'AsideCal' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532ab1af9630d6_69773204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532ab1af9630d6_69773204')) {function content_532ab1af9630d6_69773204($_smarty_tpl) {?><html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
    <link rel="stylesheet" href="templates/template_1/css/style.css" type="text/css">
    <link rel="stylesheet" href="templates/template_1/css/body.css" type="text/css">
    <link rel="stylesheet" href="templates/template_1/css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
    <script type="text/javascript" src="js/fonction.js"></script>
  </head>
  <body>
    <div class="background">
      <div class="page">
	<div class="header">
	  <ul>
	    <?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
	    <li>
	      <a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a>
	    </li>
	    <?php } ?>
	  </ul>
	</div>
	<?php echo $_smarty_tpl->tpl_vars['Content']->value;?>

	<div class="sidebar">
	  <div class="news">
	    <span>Dernière News</span>
	    <ul>
	      <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
	      <li>
		<a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['it']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</a> <span><?php echo $_smarty_tpl->tpl_vars['it']->value['date'];?>
</span>
	      </li>
	      <?php } ?>
	    </ul>
	    <a href="index.php?page=news">Read More</a>
	  </div>
	  <div class="section">
	    <span>Calendrier</span>
	    <ul>
	      <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideCal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
	      <li>
		<a href="index.php?page=calendrier&v1=lire_event&v2=<?php echo $_smarty_tpl->tpl_vars['it']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</a> <span><?php echo $_smarty_tpl->tpl_vars['it']->value['date'];?>
</span>
	      </li>
	      <?php } ?>
	    </ul>
	    <a href="index.php?page=calendrier">Voir Calendrier</a>
	  </div>
	</div>
      </div>
      
      
    </div>
</div>
</body>
</html>
<?php }} ?>
