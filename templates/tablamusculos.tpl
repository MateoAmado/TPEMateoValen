{include 'header.tpl'}
    <div class="flex">
    {foreach $musculos as $musculo}
        <div class="card">
          <h2>{$musculo->nombre_musculo}</h2>
          <div class="popo">
          <h3>{$musculo->division_musculo}</h3>
          </div>
          <a href="musculos/{$musculo->id}">Leer mas</a>
          <div class="botones">
            <a href="musculos/{$musculo->id}/editar">Editar</a>
            <a href="musculos/{$musculo->id}/eliminar">Eliminar</a>
            </div>
        </div>
      {/foreach}
      </div>
      <a href="musculos/agregar">Agregar musculo</a>
{include 'footer.tpl'};