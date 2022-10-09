<?php
/* Smarty version 4.2.1, created on 2022-10-09 21:45:41
  from 'C:\xampp\htdocs\TPE\TPEMateoValen\templates\musculo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634324e5457cf7_80260193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b5c871d0721a78d2ff8ce966ee4dbe7ab2cd2e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\TPEMateoValen\\templates\\musculo.tpl',
      1 => 1665344266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634324e5457cf7_80260193 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="flex">
        <div class="card">
          <h2><?php echo $_smarty_tpl->tpl_vars['musculo']->value->nombre_musculo;?>
</h2>
          <div class="popo">
          <h3><?php echo $_smarty_tpl->tpl_vars['musculo']->value->division_musculo;?>
</h3>
          </div>
          <div class="botones">
            <button>Editar</button>
            <button>Eliminar</button>
            </div>
        </div>
      </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
