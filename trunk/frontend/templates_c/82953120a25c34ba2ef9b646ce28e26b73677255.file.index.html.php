<?php /* Smarty version Smarty-3.1.16, created on 2014-03-20 10:15:41
         compiled from "templates/debug/index.html" */ ?>
<?php /*%%SmartyHeaderCode:54895307353298bbf25b066-71119526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82953120a25c34ba2ef9b646ce28e26b73677255' => 
    array (
      0 => 'templates/debug/index.html',
      1 => 1395306762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54895307353298bbf25b066-71119526',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53298bbf283834_40543668',
  'variables' => 
  array (
    'Name' => 0,
    'Style' => 0,
    'style' => 0,
    'Header' => 0,
    'menu' => 0,
    'Connect' => 0,
    'connect' => 0,
    'Content' => 0,
    'AsideNews' => 0,
    'it' => 0,
    'AsideCal' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53298bbf283834_40543668')) {function content_53298bbf283834_40543668($_smarty_tpl) {?><html>
  <header>
    <title><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php  $_smarty_tpl->tpl_vars['style'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['style']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Style']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['style']->key => $_smarty_tpl->tpl_vars['style']->value) {
$_smarty_tpl->tpl_vars['style']->_loop = true;
?>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
" type="text/css">
    <?php } ?>
  </header>
  <body>
    <div id="fond">
      <div class="ruban">    
        <h2><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</h2>    
      </div>    
      <div class="ruban_gauche"></div>
      <div class="ruban_droit"></div>
    </div>
    <!-- <h1 align="center"><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</h1> -->
    <table align="center">
      <tr>
	<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Header']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
?>
	<td><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value['title'];?>
</a></td>
	<?php } ?>
	<?php  $_smarty_tpl->tpl_vars['connect'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['connect']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Connect']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['connect']->key => $_smarty_tpl->tpl_vars['connect']->value) {
$_smarty_tpl->tpl_vars['connect']->_loop = true;
?>
	<td><a href="<?php echo $_smarty_tpl->tpl_vars['connect']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['connect']->value['title'];?>
</a></td>
	<?php } ?>
      </tr>
    </table>
    <?php echo $_smarty_tpl->tpl_vars['Content']->value;?>

    <table align="center" class="aside">
        <tr>
            <th>LAST NEWS</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideNews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
        <tr>
	        <td><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</td>
        </tr>
        <?php } ?>
        <tr>
            <th>LAST EVENTS</th>
        </tr>
        <?php  $_smarty_tpl->tpl_vars['it'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['it']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['AsideCal']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['it']->key => $_smarty_tpl->tpl_vars['it']->value) {
$_smarty_tpl->tpl_vars['it']->_loop = true;
?>
        <tr>
	        <td><?php echo $_smarty_tpl->tpl_vars['it']->value['titre'];?>
</td>
        </tr>
        <?php } ?>
    </table>
  </body>
</html>
<?php }} ?>
