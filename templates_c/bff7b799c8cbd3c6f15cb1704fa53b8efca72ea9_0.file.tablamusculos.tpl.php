<?php
/* Smarty version 4.2.1, created on 2022-10-08 21:51:49
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\tablamusculos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341d4d5288cc6_16883173',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bff7b799c8cbd3c6f15cb1704fa53b8efca72ea9' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\tablamusculos.tpl',
      1 => 1665258704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6341d4d5288cc6_16883173 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
            <button>Editar</button>
            <button>Eliminar</button>
            </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
