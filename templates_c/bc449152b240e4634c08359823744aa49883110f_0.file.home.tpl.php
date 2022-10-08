<?php
/* Smarty version 4.2.1, created on 2022-10-08 22:44:36
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6341e1341277d0_52370529',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc449152b240e4634c08359823744aa49883110f' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\home.tpl',
      1 => 1665261865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6341e1341277d0_52370529 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<base href="'.BASE_URL.'">
    <div class="flex">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ejercicios']->value, 'ejercicio');
$_smarty_tpl->tpl_vars['ejercicio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ejercicio']->value) {
$_smarty_tpl->tpl_vars['ejercicio']->do_else = false;
?>
        <div class="card">
          <h2><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_ej;?>
</h2>
          <div class="popo">
          <h3><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_musculo;?>
</h3>
          <h3>Intensidad:
          <?php if (($_smarty_tpl->tpl_vars['ejercicio']->value->intensidad_ej == 1)) {?>
             Baja
         <?php } elseif (($_smarty_tpl->tpl_vars['ejercicio']->value->intensidad_ej == 2)) {?>
            Media
         <?php } else { ?>
            Alta
         <?php }?></h3>
          <h3><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->seccion_ej;?>
</h3>
          </div>
          <a href="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
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
?>;

<?php }
}
