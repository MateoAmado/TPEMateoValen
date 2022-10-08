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
            <button>Editar</button>
            <button>Eliminar</button>
            </div>
        </div>
      {/foreach}
      </div>
{include 'footer.tpl'};