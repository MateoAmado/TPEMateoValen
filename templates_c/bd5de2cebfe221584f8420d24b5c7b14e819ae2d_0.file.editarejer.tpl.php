<?php
/* Smarty version 4.2.1, created on 2022-10-17 23:47:53
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\editarejer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634dcd89e93f01_36721659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd5de2cebfe221584f8420d24b5c7b14e819ae2d' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\editarejer.tpl',
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
function content_634dcd89e93f01_36721659 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;
<div class="form">
    <form action="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
/editar/confirmar" method="POST">
          <div class="formnombre">
          <h2>Editar ejercicio</h2>
          <label for="nombre_ej">Nombre del Ejercicio:</label>
          <input type="text" name="nombre_ejercicio" value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_ej;?>
">
          </div>
          <div class="formmusculo">
        <label for="nombre_musculo">Nombre del Musculo:</label>
        <select name="nombre_musculo">
        <?php if ((isset($_smarty_tpl->tpl_vars['ejercicio']->value->musculo_id))) {?>
          <option selected value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->musculo_id;?>
"><?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->nombre_musculo;?>
</option>
        <?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['musculos']->value, 'musculo');
$_smarty_tpl->tpl_vars['musculo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['musculo']->value) {
$_smarty_tpl->tpl_vars['musculo']->do_else = false;
?>
          <?php if (($_smarty_tpl->tpl_vars['musculo']->value->id != $_smarty_tpl->tpl_vars['ejercicio']->value->musculo_id)) {?>
               <option value="<?php echo $_smarty_tpl->tpl_vars['musculo']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['musculo']->value->nombre_musculo;?>
</option>
          <?php }?>
        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        </select>
          </div>
          <div class="formintensidad">
        <label for="Intensidad">Intensidad:</label>
        <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 3+1 - (1) : 1-(3)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
          <?php if (((isset($_smarty_tpl->tpl_vars['ejercicio']->value->intensidad_ej)) && $_smarty_tpl->tpl_vars['i']->value == $_smarty_tpl->tpl_vars['ejercicio']->value->intensidad_ej)) {?>
            <?php if (($_smarty_tpl->tpl_vars['i']->value == 1)) {?>
              <label for="Intensidad">Baja</label>
              <?php } elseif (($_smarty_tpl->tpl_vars['i']->value == 2)) {?>
                <label for="Intensidad">Media</label>
                <?php } else { ?>
                  <label for="Intensidad">Alta</label>
            <?php }?>
            <input checked value="<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->intensidad_ej;?>
" type="radio" name="Intensidad">
              <?php } else { ?>
                <?php if (($_smarty_tpl->tpl_vars['i']->value == 1)) {?>
                  <label for="Intensidad">Baja</label>
                  <?php } elseif (($_smarty_tpl->tpl_vars['i']->value == 2)) {?>
                    <label for="Intensidad">Media</label>
                    <?php } else { ?>
                      <label for="Intensidad">Alta</label>
                <?php }?>
              <input value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" type="radio" name="Intensidad">
          <?php }?>
        <?php }
}
?>
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
