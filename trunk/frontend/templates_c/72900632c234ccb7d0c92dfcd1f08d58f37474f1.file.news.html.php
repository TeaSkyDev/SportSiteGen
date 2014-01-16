<?php /* Smarty version Smarty-3.1.16, created on 2014-01-16 16:32:37
         compiled from "html/news.html" */ ?>
<?php /*%%SmartyHeaderCode:113030903752d7fb085def72-96736192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '72900632c234ccb7d0c92dfcd1f08d58f37474f1' => 
    array (
      0 => 'html/news.html',
      1 => 1389886343,
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
    'Post' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d7fb08648936_98079328')) {function content_52d7fb08648936_98079328($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/gas/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?><html>
<head>
	<meta charset="UTF-8">
	<title>SportGen Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/body.css" type="text/css">
	<link rel="stylesheet" href="css/header.css" type="text/css">
	<link rel="stylesheet" href="css/footer.css" type="text/css">
</head>
<body>
	<div class="background">
		<div class="page">
			<div class="header">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li class="selected">
						<a href="index.php?page=news">News</a>
					</li>
					<li>
						<a href="index.php?page=equipe">Equipe</a>
					</li>
					<li>
						<a href="index.php?page=calendrier">Calendrier</a>
					</li>
					<li >
						<a href="index.php?page=about">About</a>
					</li>
				</ul>
			</div>
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
