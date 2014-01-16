<?php /* Smarty version Smarty-3.1.16, created on 2014-01-16 17:19:28
         compiled from "html/header.html" */ ?>
<?php /*%%SmartyHeaderCode:108545583652d8001189fc25-58096370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef762db56418bada4bb7877f9574cbd9f4de60c' => 
    array (
      0 => 'html/header.html',
      1 => 1389889145,
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
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d80011929a01_29221127')) {function content_52d80011929a01_29221127($_smarty_tpl) {?><html>
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
			<?php }} ?>
