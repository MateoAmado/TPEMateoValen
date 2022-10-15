{include 'header.tpl'}
{if isset($smarty.session.username) && $smarty.session.rol=="admin"}
  <a class="agregarmusculo" href="musculos/agregar">Agregar musculo</a>
{/if}
    <div class="flex">
    {foreach $musculos as $musculo}
        <div class="card">
          <h2>{$musculo->nombre_musculo}</h2>
          <div class="popo">
          <h3>{$musculo->division_musculo}</h3>
          </div>
          <a href="musculos/{$musculo->id}">Leer mas</a>
          <div class="botones">
          {if isset($smarty.session.username) && $smarty.session.rol=="admin"}
            <a href="musculos/{$musculo->id}/editar">Editar</a>
            <a href="musculos/{$musculo->id}/eliminar">Eliminar</a>
          {/if}
            </div>
        </div>
      {/foreach}
      </div>
{include 'footer.tpl'};