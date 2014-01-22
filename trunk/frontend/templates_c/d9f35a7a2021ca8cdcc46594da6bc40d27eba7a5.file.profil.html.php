<?php /* Smarty version Smarty-3.1.16, created on 2014-01-21 14:03:21
         compiled from "html/profil.html" */ ?>
<?php /*%%SmartyHeaderCode:65628052752de701931ecd3-18375293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f35a7a2021ca8cdcc46594da6bc40d27eba7a5' => 
    array (
      0 => 'html/profil.html',
      1 => 1390308913,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65628052752de701931ecd3-18375293',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Profil' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de70193a92f6_16114344',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de70193a92f6_16114344')) {function content_52de70193a92f6_16114344($_smarty_tpl) {?><h2 align="center">Profil</h2>
<table align="center">
    <tr>
        <td><img src="<?php echo $_smarty_tpl->tpl_vars['Profil']->value['img'];?>
"/></td>
        <td>
            <table>
                <tr>
                    <th>Pseudo : </th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['Pseudo'];?>
</td>
                </tr>
                <tr>
                    <th>Mail :</th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mail'];?>
</td>
                </tr>
                <tr>
                    <th>Status :</th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['statu'];?>
</td>
                </tr>
            </table>
        </td>
    </tr>
</table><?php }} ?>
