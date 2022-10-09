<?php
/* Smarty version 4.2.1, created on 2022-10-09 21:59:29
  from 'C:\xampp\htdocs\TPE\TPEMateoValen\templates\ejercicio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63432821e14b39_96262221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4d118310d3041f3853cbd655e1f7076c1f120b75' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\TPEMateoValen\\templates\\ejercicio.tpl',
      1 => 1665345568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63432821e14b39_96262221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;
    <div class="flex">
    <div class="card">
          <h2><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_ej;?>
</h2>
          <div class="popo">
          <h3><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_musculo;?>
</h3>
          <h3>Intesidad:
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
            <p><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->descripcion_ej;?>
</p>
            <div class="botones">
            <button>Editar</button>
            <button>Eliminar</button>
            </div>
        </div>
    </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
