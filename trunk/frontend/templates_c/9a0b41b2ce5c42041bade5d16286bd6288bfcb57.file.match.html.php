<?php /* Smarty version Smarty-3.1.16, created on 2014-03-21 08:26:02
         compiled from "templates/debug/html/match.html" */ ?>
<?php /*%%SmartyHeaderCode:1544396854532be98a93bbc7-36532484%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a0b41b2ce5c42041bade5d16286bd6288bfcb57' => 
    array (
      0 => 'templates/debug/html/match.html',
      1 => 1395231509,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1544396854532be98a93bbc7-36532484',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Match' => 0,
    'match' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532be98a9d3b36_69775730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532be98a9d3b36_69775730')) {function content_532be98a9d3b36_69775730($_smarty_tpl) {?><table align="center">
    <tr>
        <th>Match</th>
    </tr>
    <?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['match']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Match']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value) {
$_smarty_tpl->tpl_vars['match']->_loop = true;
?>
    <tr>
            <td align="center"><u><?php echo $_smarty_tpl->tpl_vars['match']->value['name1'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['point1'];?>
 | <?php echo $_smarty_tpl->tpl_vars['match']->value['point2'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['name2'];?>

	    	     |||    <?php echo $_smarty_tpl->tpl_vars['match']->value['date'];?>
 - <?php echo $_smarty_tpl->tpl_vars['match']->value['comm'];?>
 </td>

    </tr>

    <?php } ?>
</table>
<?php }} ?>
