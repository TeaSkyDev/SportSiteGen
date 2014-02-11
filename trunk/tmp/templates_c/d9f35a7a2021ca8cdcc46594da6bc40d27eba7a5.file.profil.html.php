<?php /* Smarty version Smarty-3.1.16, created on 2014-02-05 12:45:52
         compiled from "html/profil.html" */ ?>
<?php /*%%SmartyHeaderCode:65628052752de701931ecd3-18375293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9f35a7a2021ca8cdcc46594da6bc40d27eba7a5' => 
    array (
      0 => 'html/profil.html',
      1 => 1391599817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65628052752de701931ecd3-18375293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_52de70193a92f6_16114344',
  'variables' => 
  array (
    'Profil' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52de70193a92f6_16114344')) {function content_52de70193a92f6_16114344($_smarty_tpl) {?><div id="blanc">
  <h2 id="profil" align="center">Profil</h2>
  <table id="table" align="center">
    <?php if ($_smarty_tpl->tpl_vars['Profil']->value['modif']=="false") {?>
    <tr>
      <td><img src="<?php echo $_smarty_tpl->tpl_vars['Profil']->value['img'];?>
"/></td>
      <td>
        <table>
          <tr>
            <th>Pseudo : </th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['Pseudo'];?>
 <a href="index.php?page=profil&action=modif_Pseudo"><i>(modifier)</i></a></td>
          </tr>
          <tr>
            <th>Mail :</th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['Mail'];?>
 <a href="index.php?page=profil&action=modif_Mail"><i>(modifier)</i></a></td>
          </tr>
          <tr>
            <th>Status :</th><td><?php echo $_smarty_tpl->tpl_vars['Profil']->value['statu'];?>
</td>
          </tr>
        </table>
      </td>
    </tr>
    <?php } else { ?>
    <form method="post" action="index.php?page=profil&action=modif_<?php echo $_smarty_tpl->tpl_vars['Profil']->value['champ'];?>
">
      <tr>
        <th>Nouveau <?php echo $_smarty_tpl->tpl_vars['Profil']->value['champ'];?>
 : <input type="text" name="new_<?php echo $_smarty_tpl->tpl_vars['Profil']->value['champ'];?>
" /></th>
      </tr>
      <tr>
        <th><input type="submit" value="Valider" /></form></th>
</tr>
</form>
<?php }?>
</table>
 <div id="barregauche"></div>
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
<?php }} ?>
