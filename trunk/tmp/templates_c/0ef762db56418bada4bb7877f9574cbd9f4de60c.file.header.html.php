<?php /* Smarty version Smarty-3.1.16, created on 2014-02-06 15:08:09
         compiled from "html/header.html" */ ?>
<?php /*%%SmartyHeaderCode:181489864052d911eb8d41e3-69223264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ef762db56418bada4bb7877f9574cbd9f4de60c' => 
    array (
      0 => 'html/header.html',
      1 => 1391695682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181489864052d911eb8d41e3-69223264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d911eba23526_99375717',
  'variables' => 
  array (
    'Info' => 0,
    'Post' => 0,
    'post' => 0,
    'Cal' => 0,
    'cal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d911eba23526_99375717')) {function content_52d911eba23526_99375717($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?><html>
  <head>
    <meta charset="UTF-8">
    <title>SportGen Template</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/body.css" type="text/css">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <link rel="stylesheet" href="css/footer.css" type="text/css">
      <style>
          .selected_result {
              border:1px solid black;
              width:100px;
              display: block;
              background-color: red;
          }
          .unselected_result {
              border:1px solid black;
              width:100px;
              display: block;
          }

      </style>
  </head>
  <body>
    <div class="background">
      <div class="page">
	<div class="header">
	  <ul>
	    <li <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='accueil') {?> class="selected" <?php }?>>
	      <a href="index.php">Home</a>
	    </li>
	    <li  <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='news') {?> class="selected" <?php }?>>
	      <a href="index.php?page=news">News</a>
	    </li>
	    <li <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='equipe') {?> class="selected" <?php }?>>
	      <a href="index.php?page=equipe">Equipe</a>
	    </li>
	    <li <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='calendrier') {?> class="selected" <?php }?>>
	      <a href="index.php?page=calendrier">Calendrier</a>
	    </li>
	    <li <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='about') {?> class="selected" <?php }?>>
	      <a href="index.php?page=about">About</a>
	    </li>
	    <?php if ($_smarty_tpl->tpl_vars['Info']->value['connected']=='false') {?>
	    <li >
	      <a href="index.php?page=connexion">Connexion</a>
	    </li>
	    <?php } else { ?>
	    <li <?php if ($_smarty_tpl->tpl_vars['Info']->value['page']=='profil') {?> class="selected" <?php }?>>
	    	<a href="index.php?page=profil"><?php echo $_smarty_tpl->tpl_vars['Info']->value['pseudo'];?>
</a>
	    </li>
	    <li>
	      <a href="index.php?page=deconnexion">Déconnexion</a>
	    </li>
	    <?php }?>
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
		<a href="index.php?page=news&id_news=<?php echo $_smarty_tpl->tpl_vars['post']->value['Id'];?>
&details=true"><?php echo $_smarty_tpl->tpl_vars['post']->value['titre'];?>
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
	      <?php  $_smarty_tpl->tpl_vars['cal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Cal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cal']->key => $_smarty_tpl->tpl_vars['cal']->value) {
$_smarty_tpl->tpl_vars['cal']->_loop = true;
?>
	      <li>
		<a href="index.php?page=calendrier&date="><?php echo $_smarty_tpl->tpl_vars['cal']->value['titre'];?>
</a> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['cal']->value['date'],"%d-%m-%Y @ %H:%M");?>
 </span>
	      </li>
	      <?php } ?>
	    </ul>
	    <a href="index.php?page=calendrier">Voir Calendrier</a>
	  </div>
	</div>

<?php }} ?>
