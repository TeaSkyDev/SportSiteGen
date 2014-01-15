<?php /* Smarty version Smarty-3.1.16, created on 2014-01-15 13:01:24
         compiled from "news.html" */ ?>
<?php /*%%SmartyHeaderCode:131585384852d677d3f120d9-00204164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70d00cb2e9f170373c2c61ebf7b269f45bbe36c1' => 
    array (
      0 => 'news.html',
      1 => 1389787278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131585384852d677d3f120d9-00204164',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d677d4068124_59061585',
  'variables' => 
  array (
    'Title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d677d4068124_59061585')) {function content_52d677d4068124_59061585($_smarty_tpl) {?><html>
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
						<a href="news.php">News</a>
					</li>
					<li>
						<a href="equipe.php">Equipe</a>
					</li>
					<li>
						<a href="calendrier.php">Calendrier</a>
					</li>
					<li >
						<a href="about.php">About</a>
					</li>
				</ul>
			</div>
			<div class="body news">
				<div>
					<span>News</span>
					<ul>
						<li>
							<a href="news_simple.php"><img src="images/news1.jpg" alt=""></a>
							<div>
								<h3>Article Test</h3>
								<span>25 Déc 2013 | Posted by <span>Akatsubaki</span></span>
								<p>
									Ce Site est merveilleux !!!!!!
								</p>
								<a href="news_simple.php">Read More</a>
							</div>
					</ul>
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
