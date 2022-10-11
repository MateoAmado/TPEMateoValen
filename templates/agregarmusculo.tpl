{include 'header.tpl'};
<div class="w3-content" style="margin-top:80px;margin-bottom:80px">
</div>
<form class="formulario" action="musculos/agregar/confirmar" method="post">
    <label for="">Ingresar Nuevo Nombre:</label>
    <p></p>
    <input type="text" name="nombre">
    <p></p>
    <label for="">Ingresar Division/es</label>
    <input type="text" name="division">
    <input type="submit">
</form>
{include 'footer.tpl'};