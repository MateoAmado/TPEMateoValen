<?php
/* Smarty version 4.2.1, created on 2022-10-08 21:51:49
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\musculo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341d4d5c639c3_67493551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f44f53d1bd93d0877a148be5a70130ac8a22b221' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\musculo.tpl',
      1 => 1665256944,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6341d4d5c639c3_67493551 (Smarty_Internal_Template $_smarty_tpl) {
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
