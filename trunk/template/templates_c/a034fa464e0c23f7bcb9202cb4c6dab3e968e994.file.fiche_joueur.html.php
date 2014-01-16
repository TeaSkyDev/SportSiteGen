<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 13:11:16
         compiled from "fiche_joueur.html" */ ?>
<?php /*%%SmartyHeaderCode:79831347152d67ae4efc851-43734030%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a034fa464e0c23f7bcb9202cb4c6dab3e968e994' => 
    array (
      0 => 'fiche_joueur.html',
      1 => 1389787849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79831347152d67ae4efc851-43734030',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d67ae5023752_21064967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d67ae5023752_21064967')) {function content_52d67ae5023752_21064967($_smarty_tpl) {?><html>
<head>
	<meta charset="UTF-8">
	<title><?php echo $_smarty_tpl->tpl_vars['Title']->value;?>
</title>
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
					<li>
						<a href="news.php">News</a>
					</li>
					<li class="selected">
						<a href="equipe.php">Equipe</a>
					</li>
					<li>
						<a href="calendrier.php">Calendrier</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
				</ul>
			</div>
			<div class="body fiche_joueur">
				<div>
					<span>Nom du joueur</span> <a href="membre_equipe.php" id="paging">> Retour</a>
					<div>
						<span><img src="images/player7.png" alt=""></span>
						<h3>STAT</h3>
						<p>
							Bon Joueur !!
						</p>
						<div class="section">
							<h3>Historique</h3>
							<p>
								....
							</p>
							<p>
								....
							</p>
							<p>
								....
							</p>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<div class="news">
						<span>Dernière News</span>
						<ul>
							<li>
								<a href="news.php">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Nulla facilisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Nunc nec sem nisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Aliquam quam nulla</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.php">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
						</ul>
						<a href="news.php">Read More</a>
					</div>
					<div class="section">
						<span>Calendrier</span>
						<ul>
							<li>
								<a href="calendrier.php">A vs B</a> <span>23 July 2023 @ 9AM</span>
							</li>
							<li>
								<a href="calendrier.php">A vs C</a> <span>23 July 2023 @ 9AM</span>
							</li>
						</ul>
						<a href="calendrier.php">Voir Calendrier</a>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
				<ul>
					<li>
						<a href="news.php">News</a>
					</li>
					<li>
						<a href="equipe.php">Equipe</a>
					</li>
					<li>
						<a href="calendrier.php">Calendrier</a>
					</li>
					<li>
						<a href="about.php">About</a>
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
