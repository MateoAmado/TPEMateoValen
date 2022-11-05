<?php
/* Smarty version 4.2.1, created on 2022-10-15 03:06:20
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\confirmar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634a078c215f79_47078834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b33ec62ca410706704db225a1a49e3f3782dc596' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\confirmar.tpl',
      1 => 1665785780,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_634a078c215f79_47078834 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;
<h2><?php echo $_smarty_tpl->tpl_vars['texto']->value;?>
</h2>
<?php if (((isset($_smarty_tpl->tpl_vars['ejercicios']->value)))) {?>
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
          </div>
          <a href="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
">Leer mas</a>
          <div class="botones">
         <a href="ejercicios/<?php echo $_smarty_tpl->tpl_vars['ejercicio']->value->id_ejer;?>
/eliminar">Eliminar</a>
            </div>
        </div>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>   
    </div> 
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
