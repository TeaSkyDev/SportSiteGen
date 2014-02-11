<?php /* Smarty version Smarty-3.1.16, created on 2014-01-28 08:47:17
         compiled from "html/news_simple.html" */ ?>
<?php /*%%SmartyHeaderCode:203264929852d9318ff0f693-88705632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '340a0caa6fec70174f8138dc6592ba27e49f6d87' => 
    array (
      0 => 'html/news_simple.html',
      1 => 1390895221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203264929852d9318ff0f693-88705632',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52d93190051b70_21684554',
  'variables' => 
  array (
    'News' => 0,
    'Coms' => 0,
    'coms' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52d93190051b70_21684554')) {function content_52d93190051b70_21684554($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?>
			<div class="body news_simple">
				<div>
					<span>News</span> <a href="index.php?page=news" id="paging">> Back</a>
					<div>
						<img src="<?php echo $_smarty_tpl->tpl_vars['News']->value['img'];?>
" alt="">
						<h3><?php echo $_smarty_tpl->tpl_vars['News']->value['titre'];?>
</h3>
						<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['News']->value['date'],"%d-%m-%Y");?>
 | Posté par <span><?php echo $_smarty_tpl->tpl_vars['News']->value['auteur'];?>
</span></span>
						<p>
							<?php echo $_smarty_tpl->tpl_vars['News']->value['contenu'];?>

						</p>
					</div>
					
					<div class="section">
						<h5>Commentaires</h5>
						<?php  $_smarty_tpl->tpl_vars['coms'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['coms']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Coms']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['coms']->key => $_smarty_tpl->tpl_vars['coms']->value) {
$_smarty_tpl->tpl_vars['coms']->_loop = true;
?>
						<span>Posté par <?php echo $_smarty_tpl->tpl_vars['coms']->value['auteur'];?>
 le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['coms']->value['date'],"%d-%m-%Y à %H:%M");?>
</span>
						<p>
							<?php echo $_smarty_tpl->tpl_vars['coms']->value['contenu'];?>

						</p>
						
						<?php } ?>
					</div>
					
					<?php if ($_smarty_tpl->tpl_vars['News']->value['connected']=='true') {?>
					<form action="index.php?page=news&new_com=true" method="post">
						<span>Ajouter un commentaire</span>
						<textarea name="message" id="message" cols="30" rows="10"></textarea>
						<input type="hidden" name="id_news" value="<?php echo $_smarty_tpl->tpl_vars['News']->value['Id'];?>
"/>
						<input type="submit" value="Commenter"/>
					</form>
					<?php } else { ?>
					<span>Vous devez être connecté pour poster un commentaire. <a href="index.php?page=connexion">Se connecter</a></span><br>
					<?php }?>
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
</body>
</html>
<?php }} ?>
