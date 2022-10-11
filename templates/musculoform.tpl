{include 'header.tpl'};
<div class="w3-content" style="margin-top:80px;margin-bottom:80px">
</div>
<form class="formulario" action="musculos/{$musculo->id}/editar/confirmar" method="post">
    <label for="">Ingresar Nuevo Nombre:</label>
    <p></p>
    <input type="text" name="nombre" value="{$musculo->nombre_musculo}">
    <p></p>
    <label for="">Ingresar su Division/es</label>
    <input type="text" name="division" value="{$musculo->division_musculo}">
    <input type="submit">
</form>
{include 'footer.tpl'};