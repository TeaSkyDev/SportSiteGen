<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 13:12:12
         compiled from "news_simple.html" */ ?>
<?php /*%%SmartyHeaderCode:7841854352d67b070e9e39-53423509%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '01cfa5cf60cae278a88a423f82a9e460557a4dfd' => 
    array (
      0 => 'news_simple.html',
      1 => 1389787928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7841854352d67b070e9e39-53423509',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d67b0714d710_50824714',
  'variables' => 
  array (
    'Title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d67b0714d710_50824714')) {function content_52d67b0714d710_50824714($_smarty_tpl) {?><html>
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
					<li class="selected">
						<a href="news.html">News</a>
					</li>
					<li>
						<a href="equipe.html">Equipe</a>
					</li>
					<li>
						<a href="calendrier.html">Calendrier</a>
					</li>
					<li >
						<a href="about.html">About</a>
					</li>
				</ul>
			</div>
			<div class="body news_simple">
				<div>
					<span>News</span> <a href="news.html" id="paging">> Back</a>
					<div>
						<img src="images/news_photo.jpg" alt="">
						<h3>Joyeux Noël</h3>
						<span>25 Déc 2013| Posté par <span>Akatsubaki</span></span>
						<p>
							OHOHOHOHOHOHHOHHOHHOHHOHH
						</p>
					</div>
					<div class="section">
						<h5>Commentaire</h5>
						<h4>Com 1</h4>
						<span>Posté le 25 Déc 2013</span>
						<p>
							MERRY CHRISTMAS
						</p>
					</div>
					<form action="index.php">
						<span>Ajouter un commentaire</span>
						<label for="name">
							<input type="text" id="name">
							Nom</label>
						<label for="email">
							<input type="text" id="email">
							Email</label>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
						<input type="submit" value="Submit Comment">
					</form>
				</div>
				<div class="sidebar">
					<div class="news">
						<span>Dernière News</span>
						<ul>
							<li>
								<a href="news.html">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Nulla facilisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Nunc nec sem nisi</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Aliquam quam nulla</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Lorem ipsum dolor sit</a> <span>Posted on 23 July 2023</span>
							</li>
							<li>
								<a href="news.html">Donec condimentum</a> <span>Posted on 23 July 2023</span>
							</li>
						</ul>
						<a href="news.html">Read More</a>
					</div>
					<div class="section">
						<span>Calendrier</span>
						<ul>
							<li>
								<a href="calendrier.html">A vs B</a> <span>23 July 2023 @ 9AM</span>
							</li>
							<li>
								<a href="calendrier.html">A vs C</a> <span>23 July 2023 @ 9AM</span>
							</li>
						</ul>
						<a href="calendrier.html">Voir Calendrier</a>
					</div>
				</div>
			</div>
			<div class="footer">
				<div>
				<ul>
					<li>
						<a href="news.html">News</a>
					</li>
					<li>
						<a href="equipe.html">Equipe</a>
					</li>
					<li>
						<a href="calendrier.html">Calendrier</a>
					</li>
					<li>
						<a href="about.html">About</a>
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
