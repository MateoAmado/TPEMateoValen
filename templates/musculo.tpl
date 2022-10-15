{include 'header.tpl'}
    <div class="flex">
        <div class="card">
          <h2>{$musculo->nombre_musculo}</h2>
          <div class="popo">
          <h3>{$musculo->division_musculo}</h3>
          </div>
          <div class="botones">
          {if isset($smarty.session.username) && $smarty.session.rol=="admin"}
            <a href="musculos/{$musculo->id}/editar">Editar</a>
            <a href="musculos/{$musculo->id}/eliminar">Eliminar</a>
             {/if}
            </div>
        </div>
      </div>
{include 'footer.tpl'};