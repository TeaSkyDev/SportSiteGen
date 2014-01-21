<?php /* Smarty version Smarty-3.1.16, created on 2014-01-21 10:15:48
         compiled from "html/calendrier.html" */ ?>
<?php /*%%SmartyHeaderCode:48471480552de3ac412ae44-05870894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbc69496ce385dc874fc2e24a7b0f1a7dedbae92' => 
    array (
      0 => 'html/calendrier.html',
      1 => 1390295726,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48471480552de3ac412ae44-05870894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Event' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de3ac41a9ad1_34392199',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de3ac41a9ad1_34392199')) {function content_52de3ac41a9ad1_34392199($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/cadorel/www/SportSiteGen/trunk/tpl/libs/plugins/modifier.date_format.php';
?>
			<div class="body calendrier">
				<div>				
					<span>Calendrier</span>
					<div>			
						<ul><?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Event']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
							<li>
								<span><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
</span>
								<div>
									<span><?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</span> <span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['date'],"%A - %d-%m-%Y %H:%M");?>
</span>
									<p>
										<?php echo $_smarty_tpl->tpl_vars['event']->value['contenu'];?>

									</p>
								</div>
							</li>	
							<?php } ?>
						</ul>
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
