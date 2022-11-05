<?php
/* Smarty version 4.2.1, created on 2022-10-17 23:46:12
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\tablamusculos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634dcd24bc6d52_82744865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bff7b799c8cbd3c6f15cb1704fa53b8efca72ea9' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\tablamusculos.tpl',
      1 => 1666042983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634dcd24bc6d52_82744865 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
if ((isset($_SESSION['username'])) && $_SESSION['rol'] == "admin") {?>
  <a class="agregarmusculo" href="musculos/agregar">Agregar musculo</a>
<?php }?>
    <div class="flex">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musculos']->value, 'musculo');
$_smarty_tpl->tpl_vars['musculo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['musculo']->value) {
$_smarty_tpl->tpl_vars['musculo']->do_else = false;
?>
        <div class="card">
          <h2><?php echo $_smarty_tpl->tpl_vars['musculo']->value->nombre_musculo;?>
</h2>
          <div class="popo">
          <h3><?php echo $_smarty_tpl->tpl_vars['musculo']->value->division_musculo;?>
</h3>
          </div>
          <a href="musculos/<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
">Leer mas</a>
          <div class="botones">
          <?php if ((isset($_SESSION['username'])) && $_SESSION['rol'] == "admin") {?>
            <a href="musculos/<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
/editar">Editar</a>
            <a href="musculos/<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
/eliminar">Eliminar</a>
          <?php }?>
            </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
