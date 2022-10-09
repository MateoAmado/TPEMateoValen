<?php
/* Smarty version 4.2.1, created on 2022-10-09 23:05:26
  from 'C:\xampp\htdocs\TPE\TPEMateoValen\templates\editarejer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63433796d98e10_45011974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91534fee7f8e57c66d2b4ec02212f1c908973dcf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPE\\TPEMateoValen\\templates\\editarejer.tpl',
      1 => 1665349113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_63433796d98e10_45011974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;
<div class="form">
    <form action="confirmar/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
" method="POST">
          <div class="formnombre">
          <h2>Editar ejercicio</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ejercicio" value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_ej;?>
">
          </div>
          <div class="formmusculo">
        <label for="nombre_musculo">Nombre del Musculo:</label>
        <select name="nombre_musculo">
            <option value="1">Pecho</option>
            <option value="2">Espalda</option>
            <option value="3">Piernas</option>
            <option value="4">Biceps</option>
            <option value="5">Triceps</option>
            <option value="6">Hombros</option>
        </select>
          </div>
          <div class="formintensidad">
        <label for="Intensidad">Intensidad:</label>
          <p>Baja</p>
          <input type="radio" name="Intensidad" value="1">
          <p>Meida</p>
          <input type="radio" name="Intensidad" value="2">
          <p>Alta</p>
          <input type="radio" name="Intensidad" value="3">
          </div>
          <div class="formseccion">
            <label for="seccion">Seccion del Ejercicio:</label>
          <input type="text" name="seccion" id="" value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->seccion_ej;?>
">
          <label for="descripcion">Descripcion del Ejercicio:</label>
          <input type="text" name="descripcion" id="" value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->descripcion_ej;?>
">
          </div>
          <input type="submit">
        </form>
        </div>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
