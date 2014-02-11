<?php /* Smarty version Smarty-3.1.16, created on 2014-01-21 13:21:54
         compiled from "html/fiche_joueur.html" */ ?>
<?php /*%%SmartyHeaderCode:168373628552de3cd55aa917-14254343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfca029f4afb2a759e3acf24bc3b85e3c39cd43f' => 
    array (
      0 => 'html/fiche_joueur.html',
      1 => 1390306912,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168373628552de3cd55aa917-14254343',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de3cd5609996_64466295',
  'variables' => 
  array (
    'joueur' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de3cd5609996_64466295')) {function content_52de3cd5609996_64466295($_smarty_tpl) {?>
<div class="body fiche_joueur">
  <div>
    <span><?php echo $_smarty_tpl->tpl_vars['joueur']->value['Prenom'];?>
 <?php echo $_smarty_tpl->tpl_vars['joueur']->value['Nom'];?>
</span> <a href="index.php?page=membre_equipe&equipe=&id=<?php echo $_smarty_tpl->tpl_vars['joueur']->value['IdTeam'];?>
" id="paging"> Retour</a>
    <div>
      <span><img src="<?php echo $_smarty_tpl->tpl_vars['joueur']->value['img'];?>
" alt=""></span>
      <h3>STAT</h3>
      <p>
	<?php echo $_smarty_tpl->tpl_vars['joueur']->value['Description'];?>

      </p>
      <div class="section">
	<h3>Info</h3>
	<p>
	  Poste: <?php echo $_smarty_tpl->tpl_vars['joueur']->value['poste'];?>

	</p>
	<p>
	  <?php echo $_smarty_tpl->tpl_vars['joueur']->value['descPoste'];?>

	</p>
	<p>
	  ....
	</p>
      </div>
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
