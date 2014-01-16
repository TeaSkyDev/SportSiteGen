<?php /* Smarty version Smarty-3.1.16, created on 2014-01-16 16:54:49
         compiled from "html/header.html" */ ?>
<?php /*%%SmartyHeaderCode:108545583652d8001189fc25-58096370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef762db56418bada4bb7877f9574cbd9f4de60c' => 
    array (
      0 => 'html/header.html',
      1 => 1389887686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108545583652d8001189fc25-58096370',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d80011929a01_29221127',
  'variables' => 
  array (
    'Info' => 0,
    'Post' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d80011929a01_29221127')) {function content_52d80011929a01_29221127($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/gas/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
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
					<li class="selected">
						<a href="index.php">Home</a>
					</li>
					<li>
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
					<?php if ($_smarty_tpl->tpl_vars['Info']->value['connected']=='false') {?>
					<li >
						<a href="index.php?page=connexion">Connexion</a>
					</li>
					<?php } else { ?>
					<li >
						<a href="index.php?page=deconnexion"><?php echo $_smarty_tpl->tpl_vars['Info']->value['pseudo'];?>
 - Déconnexion</a>
					</li>
					<?php }?>
				</ul>
			</div>
			<div class="body home">
				
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
			</div><?php }} ?>
