<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 18:27:00
         compiled from "templates/template1/html/accueil.html" */ ?>
<?php /*%%SmartyHeaderCode:177414526653298c857b5976-32495470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '977f1b5af92350f2784da0936d34e32632d7e5f8' => 
    array (
      0 => 'templates/template1/html/accueil.html',
      1 => 1395336327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177414526653298c857b5976-32495470',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53298c85861023_16770840',
  'variables' => 
  array (
    'News' => 0,
    'news' => 0,
    'Events' => 0,
    'event' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53298c85861023_16770840')) {function content_53298c85861023_16770840($_smarty_tpl) {?><table align="center">

  <section id="slideshow">  
    <div class="container">  
      <div class="c_slider"></div>  
      <div class="slider">  
	<figure>
	  <img src="templates/template1/images/slide1.jpg" title="1" alt="1" width="700" height="467" />
	  <figcaption>Jean-Mi joue les goals</figcaption>
	</figure><!--
		   --><figure>  
	  <img src="templates/template1/images/slide2.jpg" title="2" alt="2" width="700" height="467" />
	  <figcaption>Jean-Mi en pleinne action</figcaption>  
	</figure><!--
		   --><figure> 
	  <img src="templates/template1/images/slide3.jpg" title="3" alt="3" width="700" height="467" />
	  <figcaption>Jean-Mi qui court</figcaption>  
	</figure><!--
		   --><figure>
	  <img src="templates/template1/images/slide4.jpg" title="4" alt="4" width="700" height="467" />
	  <figcaption>Jean-Mi regarde son adversaire</figcaption>
	</figure>
      </div>  
    </div>
    <span id="timeline"></span>  
  </section> 
  
  <table class="partie" align="center">
    <tr>
      <th><img src="templates/template1/images/gauche.png"/><span>NEWS</span><img src="templates/template1/images/droite.png"/></th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['news'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['news']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['News']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['news']->key => $_smarty_tpl->tpl_vars['news']->value) {
$_smarty_tpl->tpl_vars['news']->_loop = true;
?>
    <tr>
      <td><a href="index.php?page=news&v1=lire_news&v2=<?php echo $_smarty_tpl->tpl_vars['news']->value['Id'];?>
"><u><?php echo $_smarty_tpl->tpl_vars['news']->value['titre'];?>
</u></a> - <i><?php echo $_smarty_tpl->tpl_vars['news']->value['date'];?>
</i></td>
    </tr>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['news']->value['contenu'];?>
</td>
    </tr>
    <?php } ?>
  </table>

  <table class="partie" align="center">
    <tr>
      <th><img src="templates/template1/images/gauche.png"/><span>CALENDRIER</span><img src="templates/template1/images/droite.png"/></th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Events']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value) {
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
    <tr>
      <th><u><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
 - <?php echo $_smarty_tpl->tpl_vars['event']->value['location'];?>
</u> - <i><?php echo $_smarty_tpl->tpl_vars['event']->value['date'];?>
</i></th>
    </tr>
    <tr>
      <td><?php echo $_smarty_tpl->tpl_vars['event']->value['contenu'];?>
</td>
    </tr>
    <?php } ?>
  </table>
<?php }} ?>
