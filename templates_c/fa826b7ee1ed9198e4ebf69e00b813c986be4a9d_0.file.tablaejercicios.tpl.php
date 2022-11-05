<?php
/* Smarty version 4.2.1, created on 2022-10-17 23:46:11
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\tablaejercicios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634dcd23472935_57453270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fa826b7ee1ed9198e4ebf69e00b813c986be4a9d' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\tablaejercicios.tpl',
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
function content_634dcd23472935_57453270 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <div>
   <div id="formulariofiltro">
   <h3 class="filtrado">Filtrar Ejercicios por Musculo: </h3>
   <form class="formselect" action="ejercicios/filtro" method="POST">

   <select name="nombre_musculo">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musculos']->value, 'musculo');
$_smarty_tpl->tpl_vars['musculo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['musculo']->value) {
$_smarty_tpl->tpl_vars['musculo']->do_else = false;
?>
         <?php if ((isset($_smarty_tpl->tpl_vars['elegido']->value)) && $_smarty_tpl->tpl_vars['elegido']->value == $_smarty_tpl->tpl_vars['musculo']->value->id) {?>
            <option selected value="<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['musculo']->value->nombre_musculo;?>
</option>
            <?php } else { ?>
               <option value="<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['musculo']->value->nombre_musculo;?>
</option>
         <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <input type="submit" value="Filtrar">
   </select>
   <p></p>
   </form>
   </div>
   <?php if ((isset($_SESSION['username'])) && $_SESSION['rol'] == "admin") {?>
   <a class="agregarej" href="ejercicios/agregar">Agregar ejercicio</a>
   <?php }?>
   </div>
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
          <?php if ((isset($_SESSION['username'])) && $_SESSION['rol'] == "admin") {?>
         <a href="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
/editar">Editar</a>
         <a href="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
/eliminar">Eliminar</a>
          <?php }?>
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
