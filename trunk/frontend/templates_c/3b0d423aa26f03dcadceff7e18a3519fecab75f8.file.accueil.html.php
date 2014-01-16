<?php /* Smarty version Smarty-3.1.16, created on 2014-01-16 16:24:34
         compiled from "html/accueil.html" */ ?>
<?php /*%%SmartyHeaderCode:79957063352d7f905b3af86-18615992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b0d423aa26f03dcadceff7e18a3519fecab75f8' => 
    array (
      0 => 'html/accueil.html',
      1 => 1389885871,
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
    'Info' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d7f905bed2b0_96036188')) {function content_52d7f905bed2b0_96036188($_smarty_tpl) {?><html>
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
						<ul>
							<li>
								<a href="index.php?page=news&id_news=">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Nulla facilisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Nunc nec sem nisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Aliquam quam nulla</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="index.php?page=news&id_news=">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
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
			<div class="sidebar_co">
				<form action="index.php?page=connexion" method="post">
					<div id="connexion_menu">
					<td>
								<tr>
									<h3>CONNEXION</h3>
									<h3>Pseudo</h3>
									<td><input type="text" id="nickname" name="pseudo"></td>
								</tr>
								<tr>
									<h3>Mot de passe</h3>
									<td><input type="password" id="position" name="password"></td>
								</tr>
					</td>
					<br>
						<input type="submit" value="CONNEXION" id="application-submit">
					<br>
						<input type="button" value="S'INSCRIRE" onclick="document.location.href='index.php?page=inscription'">
					</div>
					
				</form>
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
</html><?php }} ?>
