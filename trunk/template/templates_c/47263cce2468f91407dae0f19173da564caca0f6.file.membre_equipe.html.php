<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 13:11:16
         compiled from "membre_equipe.html" */ ?>
<?php /*%%SmartyHeaderCode:55073964352d67a4ec6c6b2-24498719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47263cce2468f91407dae0f19173da564caca0f6' => 
    array (
      0 => 'membre_equipe.html',
      1 => 1389787872,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55073964352d67a4ec6c6b2-24498719',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d67a4ece6564_76987250',
  'variables' => 
  array (
    'Title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d67a4ece6564_76987250')) {function content_52d67a4ece6564_76987250($_smarty_tpl) {?><html>
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
			<div class="body equipe">
				<div>
					<span>Membre</span> <a href="equipe.php" id="paging">> Retour</a>
					<div class="section">
						<ul>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player1.png" alt=""> Joueur 1 </a>
							</li>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player2.png" alt=""> Joueur 2 </a>
							</li>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player3.png" alt="">  Joueur 3 </a>
							</li>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player4.png" alt=""> Joueur 4 </a>
							</li>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player5.png" alt=""> Joueur 5 </a>
							</li>
							<li>
								<a href="fiche_joueur.php"> <img src="images/player6.png" alt=""> Joueur 6 </a>
							</li>
						</ul>
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
